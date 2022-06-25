<!-- Top Bar End -->
<div class="page-wrapper-img">
	<div class="page-wrapper-img-inner">
		<div class="sidebar-user media">                    
			<img src="../assets/images/users/17.jpg" alt="user" class="rounded-circle img-thumbnail mb-1">
			<span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
			<div class="media-body align-item-center">
				<h5><?=$user['adsoyad']?></h5>
				<ul class="list-unstyled list-inline mb-0 mt-2">
					<li class="list-inline-item">
						<a href="profil" class=""><i class="mdi mdi-account"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="settings" class=""><i class="mdi mdi-cogs"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="logout" class=""><i class="mdi mdi-power"></i></a>
					</li>
				</ul>
			</div>                    
		</div>
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title mb-2"><i class="dripicons-user mr-2"></i>Üye Ekle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Üye Ekle</li>
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
							<strong>Üye Ekle</strong> 
						</div>
						<div class="card-body">
							<?php
							$message = 'GOREVLEGELSİN';
								if($_POST){
									$adsoyad = $_POST['adsoyad'];
									$username = $_POST['username'];
									$email = $_POST['email'];
									$telefon = $_POST['numara'];
									$password = $_POST['password'];
									$passwordr = $_POST['passwordr'];
									if(!$adsoyad || !$username || !$email || !$telefon || !$password || !$passwordr){
										$message = 'bos';
									}else if(strlen($adsoyad) < 1 || strlen($adsoyad) > 50){
											$message = 'adsoyad';
										}else if(strlen($username) < 1 || strlen($username) > 18){
											$message = 'username';
										}else if(empty($username)){
											$message = 'username2';
										}else if(!checkspecial($username)){
											$message = 'username3';
										}else if(strlen($password) < 1 || strlen($password) > 18){
											$message = 'password';
										}else if($password != $passwordr){
											$message = 'passwordr';
										}else if(strlen($telefon) == 11){
											$usernamesorgu = $vt->cek('ASSOC','uyeler', 'username', 'where username=?', array($username));
											if($usernamesorgu){
												$message = 'uservar';
											}else{
												$emailsorgu = $vt->cek('ASSOC', 'uyeler', 'email', 'where email=?', array($email));
												if($emailsorgu){
													$message = 'emailvar';
												}else{
													$telefonsorgu = $vt->cek('ASSOC','uyeler', 'telefon', 'where telefon=?', array($telefon));
													if($telefonsorgu){
														$message = 'telefonvar';
													}else{
														$onay = '0';
														$yenisifre = md5($password);
														$kayit = $vt->ekle('uyeler', 'adsoyad,username,email,telefon,password,bakiye,onay', array($adsoyad,$username,$email,$telefon,$yenisifre,0,$onay));
														if($kayit){
															$message = 'basarili';
														}else{
															$message = 'basarisiz';
														}
														
													}
												}
											}
										}else{
											$message = 'telefon';
										}
								}
								if($message == 'basarili'){
									echo '<div class="form-group">
											<div class="alert alert-success">Üye ekleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
										</div>';
										header('refresh:3;url=uyeler');
								}else if($message == 'basarisiz'){
									echo '<div class="form-group">
											<div class="alert alert-danger">Üye ekleme işlemi hatalı.</div>
										</div>';
								}else if($message == 'uservar'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Böyle bir kullanıcı zaten mevcut.</div>
										</div>';
								}else if($message == 'emailvar'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Böyle bir email zaten mevcut.</div>
										</div>';
								}else if($message == 'telefonvar'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Böyle bir numara zaten mevcut.</div>
										</div>';
								}else if($message == 'bos'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Boş bırakmayınız.</div>
										</div>
										<meta http-equiv="refresh" content="2;">';
								}else if($message == 'username'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Kullanıcı adı 5 ile 18 karakter arası olmalı.</div>
										</div>';
								}else if($message == 'username2'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Kullanıcı adında boşluk olmamalı.</div>
										</div>';
								}else if($message == 'username3'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Kullanıcı adı Türkçe karakter içermemeli.</div>
										</div>';
								}else if($message == 'adsoyad'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Ad Soyad 8 karakterden kısa olamaz.</div>
										</div>';
								}else if($message == 'telefon'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Telefon 11 karakter olmalı.</div>
										</div>';
								}else if($message == 'uyusmuyor'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Şifreler birbiriyle uyuşmuyor.</div>
										</div>';
								}else if($message == 'kısa'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Mevcut şifreniz 8 ile 18 karakter arasında olmalıdır.</div>
										</div>';
								}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ad Soyad</span>
										</div>
										<input type="text" id="text-input" name="adsoyad" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanıcı Adı</span>
										</div>
										<input type="text" id="text-input" name="username" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">E Mail</span>
										</div>
										<input type="text" id="text-input" name="email" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Numara</span>
										</div>
										<input type="number" id="text-input" name="numara" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şifre</span>
										</div>
										<input type="password" id="odul" name="password" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şifre Tekrar</span>
										</div>
										<input type="password" id="odul" name="passwordr" class="form-control">
									</div>
								</div>
								<button type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light">Üye'yi Ekle</button>
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