<!-- Top Bar End -->
<div class="page-wrapper-img">
	<div class="page-wrapper-img-inner">
		<div class="sidebar-user media">                    
			<img src="assets/images/users/17.jpg" alt="user" class="rounded-circle img-thumbnail mb-1">
			<span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
			<div class="media-body align-item-center">
				<h5><?=$user['adsoyad']?></h5>
				<ul class="list-unstyled list-inline mb-0 mt-2">
					<li class="list-inline-item">
						<a href="kullanici-panel/account" class=""><i class="mdi mdi-account"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="kullanici-panel/siparislerim" class=""><i class="mdi mdi-shopping"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="kullanici-panel/cikis-yap" class=""><i class="mdi mdi-power"></i></a>
					</li>
				</ul>
			</div>                    
		</div>
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="float-right align-item-center mt-2">
						<a href="kullanici-panel/yeni-siparis" class="btn btn-info px-4 align-self-center report-btn">Yeni Sipariş</a>
					</div>
					<h4 class="page-title mb-2"><i class="mdi mdi-account mr-2"></i>Profil</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Profil</li>
						</ol>
					</div>                                      
				</div><!--end page title box-->
			</div><!--end col-->
		</div><!--end row-->
		<!-- end page title end breadcrumb -->
	</div><!--end page-wrapper-img-inner-->
</div><!--end page-wrapper-img-->

<div class="page-wrapper">
	<div class="page-wrapper-inner">
		<!-- Navbar Custom Menu -->
		<div class="navbar-custom-menu">
			<div class="container-fluid">
				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu list-unstyled">
						<?php include "menu.php"; ?>
					</ul>
					<!-- End navigation menu -->
				</div> <!-- end navigation -->
			</div> <!-- end container-fluid -->
		</div>
		<!-- end left-sidenav-->
	</div>
	<!--end page-wrapper-inner -->
	<!-- Page Content-->
	<div class="page-content">
		<div class="container-fluid"> 
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<strong>Profil Bilgileriniz</strong> 
						</div>
						<div class="card-body">
							<?php 
							$veri = $vt->cek('ASSOC', 'uyeler', 'adsoyad,username,password,email,telefon', 'where id=?', array($_SESSION['id']));
							$guncelle = @$_POST['guncelle'];
							$message = "GOREVLE";
							if($guncelle){
								$adsoyad = $_POST['adsoyad'];
								$telefon = $_POST['telefon'];
								if(!$adsoyad || !$telefon){
									$message = 'bos';
								}else if(strlen($adsoyad) < 8 || strlen($adsoyad) > 50){
										$message = 'adsoyad';
									}else if(strlen($telefon) == 11){
										$guncelle = $vt->guncelle('0', 'uyeler', 'adsoyad,telefon', 'where id=?', array($adsoyad,$telefon,$_SESSION['id']));
										if($guncelle){
											$message = 'basarili';
										}else{
											$message = 'hata';
										}
								}else{
									$message = 'telefon';
								}
							}
							if($message == 'bos'){
								echo '<div class="alert alert-warning">Boş bırakmayınız.</div>';
								header('refresh:2;url=');
							}else if($message == 'adsoyad'){
								echo '<div class="alert alert-warning">Ad Soyad 8 karakterden küçük olamaz.</div>';
							}else if($message == 'telefon'){
								echo '<div class="alert alert-warning">Telefon 11 karakterden oluşmalıdır.</div>';
							}else if($message == 'hata'){
								echo '<div class="alert alert-danger">Değişiklik Yapıldı.</div>';
								header('refresh:2;url=');
							}else if($message == 'basarili'){
								echo '<div class="alert alert-success">Bilgileriniz başarıyla güncellenmiştir.</div>';
								header('refresh:2;url=');
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Adınız Soyadınız</span>
										</div>
										<input type="text" id="text-input" name="adsoyad" value="<?=$veri['adsoyad']?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanıcı Adı</span>
										</div>
										<input type="text" id="text-input" disabled value="<?=$veri['username']?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">E Mail</span>
										</div>
										<input type="text" id="text-input" disabled value="<?=$veri['email']?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Telefon</span>
										</div>
										<input type="text" id="text-input" name="telefon" maxlength="11" value="<?=$veri['telefon']?>" class="form-control">
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
							</form>
						</div>
						<div class="card-header">
							<strong>Şifre Değiştirme</strong> 
						</div>
						<div class="card-body card-block">
							<?php 
							$veri = $vt->cek('ASSOC', 'uyeler', 'adsoyad,username,password,email,telefon', 'where id=?', array($_SESSION['id']));
							$guncelle2 = @$_POST['guncelle2'];
							$message = "GOREVLE";
							if($guncelle2){
								$mevcutsifre = $_POST['sifre'];
								$yenisifre = $_POST['yenisifre'];
								$yenisifret = $_POST['yenisifret'];
								if(!$mevcutsifre || !$yenisifre || !$yenisifret){
									$message = 'bos';
								}else if(md5($mevcutsifre) == $veri['password']){
									if(strlen($yenisifre) < 8 || strlen($yenisifre) > 18){
										$message = 'kısa';
									}else{
										if($yenisifre == $yenisifret){
											$sifre = md5($yenisifre);
											$sifreguncelle = $vt->guncelle('0', 'uyeler', 'password', 'where id=?', array($sifre,$_SESSION['id']));
											if($sifreguncelle){
												$message = 'basarili';
											}else{
												$message = 'hata';
											}
										}else{
											$message = 'uyusmuyor';
										}
									}           
								}else{
									$message = 'mevcutsifrehata';
								}
							}
							if($message == 'bos'){
								echo '<div class="alert alert-warning">Boş bırakmayınız.</div>';
								header('refresh:2;url=');
							}else if($message == 'hata'){
								echo '<div class="alert alert-danger">HATA.</div>';
							}else if($message == 'basarili'){
								echo '<div class="alert alert-success">Bilgileriniz başarıyla güncellenmiştir.</div>';
								header('refresh:2;url=');
							}else if($message == 'uyusmuyor'){
								echo '<div class="alert alert-warning">Yeni şifre birbiriyle uyuşmuyor.</div>';
							}else if($message == 'mevcutsifrehata'){
								echo '<div class="alert alert-danger">Mevcut şifreniz hatalı. Lütfen tekrar deneyiniz.</div>';
							}else if($message == 'kısa'){
								echo '<div class="alert alert-danger">Mevcut şifreniz 8 ile 18 karakter arasında olmalıdır.</div>';
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Mevcut Şifreniz</span>
										</div>
										<input type="password" id="password-input" name="sifre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Yeni Şifre</span>
										</div>
										<input type="password" id="password-input" name="yenisifre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Yeni Şifre Tekrar</span>
										</div>
										<input type="password" id="password-input" name="yenisifret" class="form-control">
									</div>
								</div>
								<input type="submit" name="guncelle2" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
							</form>
						</div>
					</div>    
				</div>
			</div>
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ravertan <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->