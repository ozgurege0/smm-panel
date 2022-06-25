<?php 
session_start();
header('Set-Cookie: ' . session_name() . '=' . session_id() . '; SameSite=None; Secure', false);
include '../inc/config.php';
$vt = new db();
function generate_shopier_form($data){
		$api_key  = $data->apikey;
		$secret  = $data->apisecret;
		$user_registered = date("Y.m.d");
		$time_elapsed = time() - strtotime($user_registered);
		$buyer_account_age = (int)($time_elapsed/86400);
		$currency = 0;
		$dataArray = $data;

		$productinfo = $data->item_name;
		$producttype = 1;


		$productinfo = str_replace('"','',$productinfo);
		$productinfo = str_replace('"','',$productinfo);
		$current_language=0;
		$current_lan=0;
		$modul_version=('1.0.4');
		@srand(time(NULL));
		$random_number=rand(1000000,9999999);
		$args = array(
			'API_key' => $api_key,
			'website_index' => $data->website_index,
			'platform_order_id' => $data->order_id,
			'product_name' => $productinfo,
			'product_type' => $producttype,
			'buyer_name' => $data->buyer_name,
			'buyer_surname' => $data->buyer_surname,
			'buyer_email' => $data->buyer_email,
			'buyer_account_age' => $buyer_account_age,
			'buyer_id_nr' => 0,
			'buyer_phone' => $data->buyer_phone,
			'billing_address' => $data->billing_address,
			'billing_city' => $data->city,
			'billing_country' => "TR",
			'billing_postcode' => "",
			'shipping_address' => $data->billing_address,
			'shipping_city' => $data->city,
			'shipping_country' => "TR",
			'shipping_postcode' => "",
			'total_order_value' => $data->ucret,
			'currency' => $currency,
			'platform' => 0,
			'is_in_frame' => 1,
			'current_language'=>$current_lan,
			'modul_version'=>$modul_version,
			'random_nr' => $random_number
		);

		$data = $args["random_nr"].$args["platform_order_id"].$args["total_order_value"].$args["currency"];
		$signature = hash_hmac("SHA256",$data,$secret,true);
		$signature = base64_encode($signature);
		$args['signature'] = $signature;

		$args_array = array();
		foreach($args as $key => $value){
			$args_array[] = "<input type='hidden' name='$key' value='$value'/>";
		}
		if( !empty($dataArray->apikey) && !empty($dataArray->apisecret) && !empty($dataArray->website_index) ){
			$_SESSION["data"]["payment_shopier"]  = true;

			return '<html> <!doctype html><head> <meta charset="UTF-8"> <meta content="True" name="HandheldFriendly"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="robots" content="noindex, nofollow, noarchive" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" /> <title lang="tr">Güvenli Ödeme Sayfası</title><body><head>
			<form action="https://www.shopier.com/ShowProduct/api_pay4.php" method="post" id="shopier_payment_form" style="display: none">' . implode('', $args_array) .
			'<script>setInterval(function(){document.getElementById("shopier_payment_form").submit();},2000)</script></form></body></html>';
		}

	}

	if($_SESSION && $_POST){

		$user = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));

		if($user){

			$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());

			if($_POST['tutar'] >= 0){

				if($_POST['method'] == "paytr"){

					$paytrbilgi = json_decode($ayar['paytr']);
					$merchantid = $paytrbilgi->merchant_id;
					$merchantkey = $paytrbilgi->merchant_key;
					$merchantsalt = $paytrbilgi->merchant_salt;

					$post = $_POST;
					$merchant_id 	= $merchantid;
					$merchant_key 	= $merchantkey;
					$merchant_salt	= $merchantsalt;
					$email = $user['email'];
					$payment_amount	= $post['tutar']*100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.

					$sayi1 = rand(1000,9999);
					$sayi2 = rand(1000,9999);
					$sayi3 = rand(1000,9999);
					$sayi4 = rand(10,99);

					$rasgelesayi = "21".$sayi1.$sayi2.$sayi3.$sayi4; 
					$merchant_oid = $rasgelesayi;
					$user_name = $user['adsoyad'];
					$user_address = "Türkiye / İstanbul / Esenler";
					$user_phone = $_POST['telefon'];
					$merchant_ok_url = $ayar['url'].'/kullanici-panel/bakiye-yuklendi';
					$merchant_fail_url = $ayar['url'].'/kullanici-panel/bakiye-hata';
					$user_basket = base64_encode(json_encode(array(array("Bakiye Yükleme İşlemi", $post['tutar'], 1) )));
					if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
						$ip = $_SERVER["HTTP_CLIENT_IP"];
					} elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
						$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
					} else {
						$ip = $_SERVER["REMOTE_ADDR"];
					}
					$user_ip=$ip;
					$timeout_limit = "30";
					$debug_on = 0;
					$test_mode = 0;
					$no_installment	= 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın
					$max_installment = 0;
					$currency = "TL";
					$hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
					$paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
					$post_vals=array(
						'merchant_id'=>$merchant_id,
						'user_ip'=>$user_ip,
						'merchant_oid'=>$merchant_oid,
						'email'=>$email,
						'payment_amount'=>$payment_amount,
						'paytr_token'=>$paytr_token,
						'user_basket'=>$user_basket,
						'debug_on'=>$debug_on,
						'no_installment'=>$no_installment,
						'max_installment'=>$max_installment,
						'user_name'=>$user_name,
						'user_address'=>$user_address,
						'user_phone'=>$user_phone,
						'merchant_ok_url'=>$merchant_ok_url,
						'merchant_fail_url'=>$merchant_fail_url,
						'timeout_limit'=>$timeout_limit,
						'currency'=>$currency,
						'test_mode'=>$test_mode
					);
					
					$ch=curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1) ;
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
					curl_setopt($ch, CURLOPT_TIMEOUT, 20);
					$result = @curl_exec($ch);

					if(curl_errno($ch))
						die("PAYTR IFRAME connection error. err:".curl_error($ch));

					curl_close($ch);
					
					$result = json_decode($result,1);
					if($result['status'] =='success'){
						$ekle = $vt->ekle('odemeler', 'uye_email,uye_numara,uye_adsoyad,siparis_no,tutar,onay,mesaj,method', array(
							$email,
							$user_phone,
							$user_name,
							$merchant_oid,
							$_POST['tutar'],
							1,
							0,
							'paytr'
						));

					}else{
						die("PAYTR IFRAME failed. reason:".$result['reason']);
					}
					if($result['status']=='success'){
						$link = "https://www.paytr.com/odeme/guvenli/".$result['token'];
						echo '3 saniye içerisinde ödeme sayfasına yönlendirileceksiniz.';
						header('refresh:3;url='.$link);
					}else{
						echo 'Hata oluştu.';
						die();
					}

				}elseif($_POST['method'] == "havale"){
					$ekle = $vt->ekle('odemeler', 'uye_email,uye_numara,uye_adsoyad,siparis_no,tutar,onay,mesaj,method', array(
						$user['email'],
						$_POST['telefon'],
						$user["adsoyad"],
						0,
						$_POST['tutar'],
						1,
						0,
						'havale'
					));

					if($insert){
						echo 'Ödeme bildiriminiz başarıyla kaydedildi, yönetici onayından sonra bakiyeniz hesabınıza eklenecektir.';
						header('refresh:3;url=../online-odeme');
					}else{
						echo 'Ödeme bildiriminiz alınamadı, lütfen daha sonra tekrar deneyiniz.';
						header('refresh:3;url=../online-odeme');
					}

				}elseif($_POST['method'] == "shopier"){
					
					$shopierb = json_decode($ayar['shopier']);
					$isim = $user["adsoyad"];
					$mail = $user['email'];
					$tel = $_POST["telefon"];
					$_SESSION['tutar'] = $tutar = $_POST["tutar"];
					$_SESSION['eskibakiye'] = $user['bakiye'];
					$sipno = rand();
					$urun = 'SMM Bakiye';

					include 'shopierAPI.php'; 
					$shopier = new Shopier($shopierb->key, $shopierb->secret);
					$shopier->setBuyer([ 
					'id' => $sipno, 
					'paket' => $urun, 
					'first_name' => $isim, 'last_name' => $isim, 'email' => $mail, 'phone' => $tel]); 
					$shopier->setOrderBilling([
					'billing_address' => $adres, //Kullanıcının adresi
					'billing_city' => 'İstanbul/Esenler',
					'billing_country' => 'Türkiye', 
					'billing_postcode' => '34000', 
					]);
					$shopier->setOrderShipping([
					'shipping_address' => $adres, 
					'shipping_city' => 'İstanbul', 
					'shipping_country' => 'Türkiye/Esenler', 
					'shipping_postcode' => '34000', 
					]);
					$ekle = $vt->ekle('odemeler', 'uye_email,uye_numara,uye_adsoyad,siparis_no,tutar,onay,mesaj,method', array(
						$user['email'],
						$_POST['telefon'],
						$user['adsoyad'],
						$sipno,
						$_POST['tutar'],
						1,
						0,
						'shopier'
					));
					die($shopier->run($sipno, $tutar, 'shopierNotify.php')); 
					

			}else{

				echo 'Minimum 10 TL tutarında ödeme yapabilirsiniz.';
				header('refresh:3;url=online-odeme');

			}

		}else{

			echo 'Minimum tutar 10 TL!';
			header('refresh:3;url=online-odeme');

		}

	}else{
		echo 'Böyle bir üye bulunmuyor!';
			header('refresh:3;url=online-odeme');
	}
}else{
	echo 'Oturum açmanız gerekmektedir.!';
			header('refresh:3;url=online-odeme');
}