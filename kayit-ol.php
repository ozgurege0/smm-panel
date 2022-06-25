<?php 
include "inc/config.php";
$vt = new db();
session_start();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
if($_SESSION){
   header('refresh:0;url='.$ayar['url'].'/kullanici-panel/anasayfa');
}else{
$siparis = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "", array());
$uye = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "", array());
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
								<h4 class="mt-0 mb-1">Kayıt Ol</h4>
								<p class="text-muted mb-0">Bilgilerinizi girip kayıt olabilirsin.</p>
							</div>
						</div>                            
						<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
						<script>
						$(document).ready(function(){
						$("#button").on("click", function(){ // buton idli elemana tıklandığında
						var gonderilenform = $("#gonderilenform").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı

						$.ajax({
						url:'inc/form/kayitol.php', // serileştirilen değerleri ajax.php dosyasına
						type:'POST', // post metodu ile 
						data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
						success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
						$("#message").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
						}
						});

						});
						});
						</script>
						<div id="message"></div>
						<form class="form-horizontal my-4" id="gonderilenform">
							<div class="form-group">
								<label for="username">Adınız Soyadınız</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
									</div>
									<input type="text" class="form-control" id="firstname" value="" name="adsoyad" placeholder="Adınız Soyadınız">
								</div>                                    
							</div>
							<div class="form-group">
								<label for="username">Kullanıcı Adınız</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon2"><i class="mdi mdi-account-outline font-16"></i></span>
									</div>
									<input type="text" class="form-control" id="username" value="" name="username" placeholder="Kullanıcı Adınız">
								</div>                                    
							</div>
							<div class="form-group">
								<label for="username">E-Posta Adresiniz</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon3"><i class="mdi mdi-email-outline font-16"></i></span>
									</div>
									<input type="email" class="form-control" id="email" value="" name="email" placeholder="E-Posta Adresiniz">
								</div>                                    
							</div>
							<div class="form-group">
								<label for="Mobile-number">Telefon Numaranız</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon4"><i class="mdi mdi-cellphone-iphone font-16"></i></span>
									</div>
									<input type="text" class="form-control" id="skype" value="" name="telefon" maxlength="11" placeholder="Telefon Numaranız">
								</div>                                
							</div>
							<div class="form-group">
								<label for="userpassword">Şifreniz</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon4"><i class="mdi mdi-key font-16"></i></span>
									</div>
									<input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz">
								</div>                                
							</div>
							<div class="form-group">
								<label for="userpassword">Şifreniz Tekrar</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon5"><i class="mdi mdi-key font-16"></i></span>
									</div>
									<input type="password" class="form-control" id="confirm" name="passwordr" placeholder="Şifreniz Tekrar">
								</div>                                
							</div>
							<div class="form-group mb-0 row">
								<div class="col-12 mt-2">
									<button class="btn btn-primary btn-block waves-effect waves-light" type="button" id="button">Kayıt Ol <i class="fas fa-sign-in-alt ml-1"></i></button>
								</div>
							</div>                            
						</form>
					</div>
					<div class="m-3 text-center bg-light p-3 text-primary">
						<h5 class="">Hesabın var mı? </h5>
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
					<p class="font-14 mt-3">Hesabın var mı? <a href="giris-yap" class="text-primary">Hemen Giriş Yap</a></p>
					<div class="col-12 mt-2">
						<a href="/" class="btn btn-primary btn-block waves-effect waves-light">Ana Sayfa'ya Dön <i class="fa fa-home"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?=$ayar['site_kodlari']?>
	<!-- End Log In page -->
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