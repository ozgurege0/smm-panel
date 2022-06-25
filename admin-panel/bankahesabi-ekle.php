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
					<h4 class="page-title mb-2"><i class="mdi mdi-bank mr-2"></i>Banka Hesabı Ekle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Banka Hesabı Ekle</li>
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
							<strong>Banka Hesabı Ekle</strong> 
						</div>
						<div class="card-body">
							<?php
							$message = 'GOREVLEGELSİN';
							  if($_POST){
								$banka = $_POST['banka'];
								$logo = $_POST['logo'];
								$aliciadi = $_POST['aliciadi'];
								$hesapno = $_POST['hesapno'];
								$iban = $_POST['iban'];
								$subeadi = $_POST['subeadi'];
								$subekodu = $_POST['subekodu'];
								if(!$banka || !$logo || !$aliciadi || !$hesapno || !$iban || !$subeadi || !$subekodu){
									$message = 'bos';
								}else{
									$ekle = $vt->ekle('banka', 'banka_adi,logo,alıcı_adi,hesap_no,iban,sube_adi,sube_kodu,onay', array($banka,$logo,$aliciadi,$hesapno,$iban,$subeadi,$subekodu,0));
									if($ekle){
									  $message = 'basarili';
									}else{
									  $message = 'basarisiz';
									}
								}
							}
							if($message == 'basarili'){
								echo '<div class="form-group">
										<div class="alert alert-success">Banka Hesabı ekleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
									</div>';
									header('refresh:3;url=banka-hesaplari');
							}else if($message == 'basarisiz'){
								echo '
									<div class="form-group">
										<div class="alert alert-danger">Banka hesabı ekleme işlemi hatalı.</div>
									</div>
							  <meta http-equiv="refresh" content="2;">';
							}else if($message == 'bos'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Boş bırakmayınız.</div>
									</div>
									<meta http-equiv="refresh" content="2;">';
							}
							else if($message == 'kategorivar'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Böyle bir banka hesabı zaten mevcut.</div>
									</div>
									<meta http-equiv="refresh" content="2;">';
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Banka Adı</span>
										</div>
										<input type="text" id="text-input" name="banka" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Banka Logo</span>
										</div>
										<input type="text" id="text-input" name="logo" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Alıcı Adı</span>
										</div>
										<input type="text" id="text-input" name="aliciadi" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Hesap No</span>
										</div>
										<input type="text" id="text-input" name="hesapno" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">IBAN</span>
										</div>
										<input type="text" id="text-input" name="iban" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şube Adı</span>
										</div>
										<input type="text" id="text-input" name="subeadi" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Sube Kodu</span>
										</div>
										<input type="text" id="text-input" name="subekodu" class="form-control">
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block btn-square  waves-effect waves-light">Banka Hesabını Ekle</button>
							</form>
						</div>
					</div>    
				</div>
			</div>
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
