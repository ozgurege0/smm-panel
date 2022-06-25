<?php 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'assets/vendor/autoload.php';
$mail = new PHPMailer();
include "inc/config.php";
$vt = new db();
$code = $_GET['code'];
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$sbilgi = json_decode($ayar['sifre_mail']);
$mbilgi = json_decode($ayar['mailbilgi']);
$seposta = $sbilgi->eposta;
$ssifre = $sbilgi->sifre;
$shost = $mbilgi->host;
$sport = $mbilgi->port;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8" />
	<title><?=$ayar['baslik']?> | <?=$ayar['title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?=$ayar['description']?>">
	<meta name="keyword" content="<?=$ayar['keyw']?>">
	<meta name="author" content="<?=$ayar['email']?>">

	<!-- App favicon -->
	<link rel="icon" href="<?=$ayar['favicon']?>">

	<!-- App css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
	<?=$ayar['analytics']?>
</head>
<body class="account-body">
	<!-- Log In page -->
	<div class="row vh-100">
		<div class="col-lg-3  pr-0">
			<div class="card mb-0 shadow-none">
				<div class="card-body">
					<div class="px-3">
						<div class="media">
							<a href="/" class="logo logo-admin"><img src="<?=$ayar['favicon']?>" height="55" alt="logo" class="my-3"></a>
							<div class="media-body ml-3 align-self-center">                                                                                                                       
								<h4 class="mt-0 mb-1">Yeni Şifre</h4>
								<p class="text-muted mb-0">Bu bölümde yeni şifre gönderilme kısmı içermektedir.</p>
							</div>
						</div>                            
						<?php 
						$kontrol = $vt->cek('ASSOC', 'uyeler', 'id,username,email,onay_code', 'where onay_code=?', array($code));
						if($kontrol){
							$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
							$str = str_shuffle($str);
							$str = substr($str, 0, 8);
							$yenisifre = md5($str);
							$guncelle = $vt->guncelle('0', 'uyeler', 'password', 'where id=?', array($yenisifre,$kontrol['id']));
							$mail->IsSMTP();
							$mail->SMTPAuth = true;
							$mail->Host = $shost;
							$mail->Port = $sport;
							$mail->Username = $seposta;
							$mail->Password = $ssifre;
							$mail->SetFrom($mail->Username, $ayar['baslik']);
							$mail->AddAddress($kontrol['email'], $kontrol['username']);
							$mail->CharSet = 'UTF-8';
							$mail->Subject = $ayar['baslik'].' | Yeni Sifre';
							$mail->MsgHTML('
							<p style="text-align: center;"><span style="font-size: 18pt;"><strong>'.$ayar['baslik'].' | Yeni Sifre</strong></span></p>
							<p style="text-align: left;"><span style="font-size: 14pt;">Yeni Şifreniz: <strong>'.$str.'</strong></span></p>
							');
							if($guncelle && $mail->Send()){
								$message = '0';
								$onay = '0';
								$guncelle2 = $vt->guncelle('0', 'uyeler', 'onay,onay_code', 'where id=?', array($onay,null,$kontrol['id']));
							}else{
								$message = '2';
							}
						}else{
							
							$message = '1';
						}
						if($message == 0){
							echo '
								<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
									<div class="alert-text">
										<strong>Başarılı!</strong> Yeni şifreniz mailinize gönderildi. Yönlendiriliyorsunuz.
									</div>                                            
								</div>
								';
								header('refresh:2;url=/');
						}else if($message == 1){
							echo '<div class="form-group">
									<div class="alert alert-danger">Böyle bir şifre yenileme isteği yok! Yönlendiriliyorsunuz.</div>
								</div>';
								header('refresh:2;url=/');
						}else if($message == 2){
							echo '<div class="form-group">
									<div class="alert alert-danger">Hata.</div>
								</div>';
						}
						?>
					</div>
					<div class="m-3 text-center bg-light p-3 text-primary">
						<h5 class="">Şifreni hatırladın mı? </h5>
						<hr>
						<a href="giris-yap" class="btn btn-primary btn-round waves-effect waves-light">Giriş Yap</a>                
					</div>
					<div class="m-3 text-center bg-light p-3 text-primary">
						<h5>İletişim Adresilerimiz</h5>
						<hr>
						<p class="font-13">Email:</strong> <?=$ayar['email']?></p>
						<p class="font-13">Telefn:</strong> <?=$ayar['iletisim_cep']?></p>
						<p class="font-13">Adres:</strong> <?=$ayar['iletisim_adres']?></p>
						<div class="account-social text-center">
							<ul class="list-inline mb-4">
								<li class="list-inline-item">
									<a href="<?=$ayar['site_facebook']?>" class="">
										<i class="fab fa-facebook-f facebook"></i>
									</a>                                    
								</li>
								<li class="list-inline-item">
									<a href="<?=$ayar['site_twitter']?>" class="">
										<i class="fab fa-twitter twitter"></i>
									</a>                                    
								</li>
								<li class="list-inline-item">
									<a href="<?=$ayar['site_instagram']?>" class="">
										<i class="fab fa-instagram google"></i>
									</a>                                    
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-9 p-0 d-flex justify-content-center">
			<div class="accountbg d-flex align-items-center"> 
				<div class="account-title text-white text-center">
					<img src="<?=$ayar['favicon']?>" alt="favicon" class="thumb-sm">
					<h4 class="mt-3">Hoşgeldiniz</h4>
					<div class="border w-25 mx-auto border-primary"></div>
					<p class="font-14 mt-3">Şifreni hatırladın mı? <a href="giris-yap" class="text-primary">Hemen Giriş Yap</a></p>
					<div class="col-12 mt-2">
						<a href="/" class="btn btn-primary btn-block waves-effect waves-light">Ana Sayfa'ya Dön <i class="fa fa-home"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Log In page -->
	<?=$ayar['site_kodlari']?>
	<div class='preloader w-100 h-100 position-fixed bg-white d-flex align-items-center justify-content-center' style='z-index:1000;right:0;top:0;left:0;bottom:0;'>
		<div class="spinner-border text-purple" style="width:3.0rem;height:3.0rem;border-width:5px"></div>
	</div>
	<script>
	document.addEventListener('DOMContentLoaded', () => {
		$('.preloader').fadeOut(750, () => {$('.preloader').remove();});
	});
	</script>

	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/waves.min.js"></script>
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>
</html>