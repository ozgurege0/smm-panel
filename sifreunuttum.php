<?php 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'assets/vendor/autoload.php';
$mail = new PHPMailer();
include "inc/config.php";
$vt = new db();
session_start();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
if($_SESSION){
   header('refresh:0;url='.$ayar['url'].'/kullanici-panel/anasayfa');
}else{
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
								<h4 class="mt-0 mb-1">Şifremi Unuttum</h4>
								<p class="text-muted mb-0">Bilgilerinizi girip şifrenizi sıfırlayabilirsiniz.</p>
							</div>
						</div>                            
						<?php 
						$message = "5";
						if($_POST){
						$email = $_POST['email'];
						if(!$email){
							$message = "3";
						}else{
							$email = $vt->cek('ASSOC', 'uyeler', 'id,email', 'where email=?', array($email));
							if($email){
								$gonderme = $vt->cek('ASSOC', 'uyeler', 'id,onay', 'where onay!=2', array($email['id']));
								if($gonderme){
									$onaycode = $vt->cek('ASSOC', 'uyeler', 'id,username,email,onay_code', 'where id=?', array($email['id']));
									$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
									$str = str_shuffle($str);
									$str = substr($str, 0, 10);
									$onaykodu = $str;
									$mail->IsSMTP();
									$mail->SMTPAuth = true;
									$mail->Host = $shost;
									$mail->Port = $sport;
									$mail->Username = $seposta;
									$mail->Password = $ssifre;
									$mail->SetFrom($mail->Username, $ayar['baslik']);
									$mail->AddAddress($onaycode['email'], $onaycode['username']);
									$mail->CharSet = 'UTF-8';
									$mail->Subject = $ayar['baslik'].' | Şifre Yenileme';
									$mail->MsgHTML('
									<p style="text-align: center;"><span style="font-size: 18pt;"><strong>'.$ayar['baslik'].' | Yeni Yenileme</strong></span></p>
									<p style="text-align: left;"><span style="font-size: 14pt;">Sifre sıfırlama linkiniz: <strong><a href="'.$ayar['url'].'/sifre.php?code='.$onaykodu.'">Tıkla</a></strong></span></p>
									');
									if($mail->Send()) {
										$message = '0';
										$onay = '2';
										$guncelle = $vt->guncelle('0', 'uyeler', 'onay,onay_code', 'where id=?', array($onay,$onaykodu, $onaycode['id']));
									} else {
										$message = '1';
									}
								}else{
									$message = '4';
								}
							}else{
								$message = '2';
							}
						}
						}
						if($message == 0){
						echo '
						<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
							<div class="alert-text">
								<strong>Başarılı!</strong> Şifre yenileme maili gönderildi. Yönlendiriliyorsunuz.
							</div>                                            
						</div>
						<meta http-equiv="refresh" content="2;URL=giris-yap">
						';
						}else if($message == 1){
						echo '
						<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
							<div class="alert-text">
								<strong>Başarısız!</strong> Mail gönderilirken bir hata oldu.
							</div>                                            
						</div>
						';
						}else if($message == 2){
						echo '
						<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
							<div class="alert-text">
								<strong>Uyarı!</strong> Böyle bir mail yok. Lütfen tekrar deneyiniz.
							</div>                                            
						</div>
						';
						}else if($message == 3){
						echo '
						<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
							<div class="alert-text">
								<strong>Uyarı!</strong> Boş bırakmayınız.
							</div>                                            
						</div>
						';
						}else if($message == 4){
						echo '
						<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
							<div class="alert-text">
								<strong>Uyarı!</strong> Mail zaten gönderildi.
							</div>                                            
						</div>
						';
						}
						?>
						<form class="form-horizontal my-4" method="post">
							<div class="form-group">
								<label for="username">E-Posta Adresiniz</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon3"><i class="mdi mdi-email-outline font-16"></i></span>
									</div>
									<input class="form-control" type="text" name="email" placeholder="E-Posta Adresiniz">
								</div>                                    
							</div>
							<div class="form-group mb-0 row">
								<div class="col-12 mt-2">
									<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Şifremi Sıfırla <i class="mdi mdi-key font-16"></i></button>
								</div>
							</div>                            
						</form>
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
<?php } ?>