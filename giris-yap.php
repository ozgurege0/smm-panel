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
								<h4 class="mt-0 mb-1">Giriş Yap</h4>
								<p class="text-muted mb-0">Bilgilerinizi girip giriş yapabilirsiniz.</p>
							</div>
						</div>                            
						<?php 
						$message = "4"; 
						if($_POST){
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						if(!$username || !$password){
							$message = '3';
						}else{
							$sorgu = $vt->cek("ASSOC", "uyeler", "id,username,password", "where username=? and password=?", array($username,$password));
							if($sorgu){
								$sorgu2 = $vt->cek("ASSOC", "uyeler", "id,onay", "where id=? and onay=?", array($sorgu['id'],0));
								$sorgu3 = $vt->cek("ASSOC", "uyeler", "id,onay", "where id=? and onay=?", array($sorgu['id'],3));
								if($sorgu2 || $sorgu3){
									if($sorgu3){
										@session_start();
										$_SESSION['id'] = $sorgu3['id'];
									}else{
										@session_start();
										$_SESSION['id'] = $sorgu2['id'];
									}
									$message = "0";
								}else{
									$message = "2";
								}
							}else{
								$message = "1";
							}
						}
						}
						if($message == 0){
						echo '
						<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
							<div class="alert-text">
								<strong>Başarılı!</strong> Giriş Yapıldı Yönlendiriliyorsunuz.
							</div>                                            
						</div>
						<meta http-equiv="refresh" content="2;URL=kullanici-panel/anasayfa">
						';
						}else if($message == 1){
						echo '
						<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
							<div class="alert-text">
								<strong>Başarısız!</strong> Bilgilerinizi kontrol ediniz.
							</div>                                            
						</div>
						';
						}else if($message == 2){
						echo '
						<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
							<div class="alert-text">
								<strong>Başarısız!</strong> E Mail onaylamalısınız.
							</div>                                            
						</div>
						';
						}else if($message == 3){
						echo '
						<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
							<div class="alert-text">
								<strong>Uyarı!</strong> Boş alan bırakmayınız.
							</div>                                            
						</div>
						';
						}
						?>
						<form class="form-horizontal my-4" method="POST">
							<div class="form-group">
								<label for="username">Kullanıcı Adınız</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Kullanıcı Adınız" name="username">
								</div>                                    
							</div>
							<div class="form-group">
								<label for="userpassword">Şifreniz</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
									</div>
									<input type="password" class="form-control" placeholder="Şifreniz" name="password">
								</div>                                
							</div>
							<div class="form-group row mt-4">
								<div class="col-sm-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" name="LoginForm[remember]" value="1" id="check">
										<label class="custom-control-label" for="check">Beni Hatırla</label>
									</div>
								</div>
								<div class="col-sm-6 text-right">
									<a href="sifreunuttum" class="text-muted font-13"><i class="mdi mdi-lock"></i> Şifremi Unuttum</a>                                    
								</div>
							</div>
							<div class="form-group mb-0 row">
								<div class="col-12 mt-2">
									<button class="btn btn-primary btn-block waves-effect waves-light" type="submit" id="button">Giriş Yap <i class="fas fa-sign-in-alt ml-1"></i></button>
								</div>
							</div>                            
						</form>
					</div>
					<div class="m-3 text-center bg-light p-3 text-primary">
						<h5 class="">Hesabın yok mu? </h5>
						<hr>
						<a href="kayit-ol" class="btn btn-primary btn-round waves-effect waves-light">Kayıt Ol</a>                
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
					<p class="font-14 mt-3">Hesabın yok mu? <a href="kayit-ol" class="text-primary">Hemen Kayıt Ol</a></p>
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