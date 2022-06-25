<?php 
$id = $_GET['id'];
if($id){
$uye = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($id));
if($uye){
?>
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
					<h4 class="page-title mb-2"><i class="dripicons-user mr-2"></i>Üye Düzenle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Üye Düzenle</li>
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
							<strong>Üye Düzenle</strong> 
						</div>
						<div class="card-body">
							<?php
							$guncelle = @$_POST['guncelle'];
							$guncelle2 = @$_POST['guncelle2'];
							$message = "GOREVLE";
							if($guncelle){
								$adsoyad = $_POST['adsoyad'];
								$username = $_POST['username'];
								$email = $_POST['email'];
								$numara = $_POST['numara'];
								$bakiye = $_POST['bakiye'];
								$hesaponay = $_POST['hesaponay'];
								if(!$adsoyad || !$username || !$email || !$numara || !$hesaponay ){
									$message = 'bos';
								}else if(strlen($adsoyad) < 1 || strlen($adsoyad) > 50){
									$message = 'adsoyad';
								}else if(strlen($username) < 1 || strlen($username) > 18){
									$message = 'username';
								}else if(empty($username)){
									$message = 'username2';
								}else if(!checkspecial($username)){
									$message = 'username3';
								}else if(strlen($numara) == 11){
									$usernamesorgu = $vt->cek('ASSOC','uyeler', 'username', 'where username=? and id!=?', array($username, $id));
									if($usernamesorgu){
										$message = 'uservar';
									}else{
										$emailsorgu = $vt->cek('ASSOC', 'uyeler', 'email', 'where email=? and id!=?', array($email,$id));
										if($emailsorgu){
											$message = 'emailvar';
										}else{
											$telefonsorgu = $vt->cek('ASSOC','uyeler', 'telefon', 'where telefon=? and id!=?', array($numara,$id));
											if($telefonsorgu){
												$message = 'telefonvar';
											}else{
												$guncelle1 = $vt->guncelle('0', 'uyeler', 'adsoyad,username,email,telefon,bakiye,onay', 'where id=?', array(
													$adsoyad,
													$username,
													$email,
													$numara,
													$bakiye,
													$hesaponay,
													$id
												));
												if($guncelle1){
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
								echo '
									<div class="form-group">
                                        <div class="alert alert-success">Üye düzenleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
                                    </div>';
									header('refresh:4;url=../uyeler');
							}else if($message == 'basarisiz'){
                                echo '<div class="form-group">
                                        <div class="alert alert-danger">Bir işlemde bulunmadınız. Yönlendiriliyorsunuz.</div>
                                    </div>
							  <meta http-equiv="refresh" content="2;">';
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
									</div>';
							}else if($message == 'username'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Kullanıcı adı 1 ile 18 karakter arası olmalı.</div>
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
										<div class="alert alert-warning">Ad Soyad 1 karakterden kısa olamaz.</div>
									</div>';
							}else if($message == 'telefon'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Telefon 11 karakter olmalı.</div>
									</div>';
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ad Soyad</span>
										</div>
										<input type="text" id="text-input" name="adsoyad" class="form-control" value="<?=$uye['adsoyad']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanıcı Adı</span>
										</div>
										<input type="text" id="text-input" name="username" class="form-control" value="<?=$uye['username']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">E Mail</span>
										</div>
										<input type="text" id="text-input" name="email" class="form-control" value="<?=$uye['email']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Numara</span>
										</div>
										<input type="number" id="text-input" name="numara" class="form-control" value="<?=$uye['telefon']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Bakiye</span>
										</div>
										<input type="text" id="odul" name="bakiye" class="form-control" value="<?=$uye['bakiye']?>">
										<div class="input-group-append">
												<span class="input-group-text">₺</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Hesap Durum</span>
										</div>
										<select name="hesaponay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											if($uye['onay'] == 1){
												echo '<option>Onaylı</option>
												<option value="1" selected>Onaysız</option>
												<option value="2">Hesabı Engelle</option>
												<option value="3">Admin Yap</option>';
											}else if($uye['onay'] == 0){
												echo '<option selected>Onaylı</option>
												<option value="1">Onaysız</option>
												<option value="2">Hesabı Engelle</option>
												<option value="3">Admin Yap</option>';
											}else if($uye['onay'] == 2){
												echo '<option>Onaylı</option>
												<option value="1">Onaysız</option>
												<option value="2" selected>Hesabı Engelle</option>
												<option value="3">Admin Yap</option>';
											}else if($uye['onay'] == 3){
												echo '<option>Onaylı</option>
												<option value="1">Onaysız</option>
												<option value="2">Engelle</option>
												<option value="3" selected>Admin Yap</option>';
											}
											?>
										</select>
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Güncelle">
							</form>
						</div>
					</div>    
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<strong>Üye Şifre Düzenle</strong> 
						</div>
						<div class="card-body">
							<?php
							$guncelle2 = @$_POST['guncelle2'];
							$message = "GOREVLE";
							if($guncelle2){
								$yenisifre = $_POST['yenisifre'];
								$yenisifret = $_POST['yenisifret'];
								if(!$yenisifre || !$yenisifret){
									$message = 'bos';
								}else if($yenisifre == $yenisifret){
									if(strlen($yenisifre) < 4 || strlen($yenisifre) > 18){
										$message = 'kısa';
									}else{
										$sifre = md5($yenisifre);
										$guncelle2 = $vt->guncelle('0', 'uyeler', 'password', 'where id=?', array($sifre, $id));
										if($guncelle2){
											$message = 'basarili';
										}else{
											$message = 'basarisiz';
										}
									}
								}else{
									$message = 'uyusmuyor';
								}
							}
							if($message == 'basarili'){
								echo '
									<div class="form-group">
                                        <div class="alert alert-success">Üye düzenleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
                                    </div>';
									header('refresh:4;url=../uyeler');
							}else if($message == 'basarisiz'){
                                echo '<div class="form-group">
                                        <div class="alert alert-danger">Bir işlemde bulunmadınız. Yönlendiriliyorsunuz.</div>
                                    </div>
							  <meta http-equiv="refresh" content="2;">';
							}else if($message == 'bos'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Boş bırakmayınız.</div>
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
											<span class="input-group-text">Yeni şifre</span>
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
								<input type="submit" name="guncelle2" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Güncelle">
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
<?php
}else{
echo 'Böyle bir üye yok!';
}
}else{echo 'HATA.';
}
?>