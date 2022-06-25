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
					<h4 class="page-title mb-2"><i class="dripicons-folder-open mr-2"></i>Kategori Ekle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Kategori Ekle</li>
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
							<strong>Kategori Ekle</strong> 
						</div>
						<div class="card-body">
							<?php
							$message = 'GOREVLEGELSİN';
							if($_POST){
							   $baslik = $_POST['baslik'];
							   $onay = $_POST['onay'];
							   if(!$baslik || !$onay){
								   $message = 'bos';
							   }else{
								   $sorgu = $vt->cek('ASSOC', 'kategoriler', 'baslik', 'where baslik=?', array($baslik));
								   if($sorgu){
									   $message = 'kategorivar';
								   }else{
									   $ekle = $vt->ekle('kategoriler', 'baslik,onay', array($baslik,$onay));
									   if($ekle){
										   $message = 'basarili';
									   }else{
										   $message = 'basarisiz';
									   }
								   }
							   }
							}  
							if($message == 'basarili'){
								echo '<div class="form-group">
										<div class="alert alert-success">Kategori ekleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
									</div>';
									header('refresh:3;url=kategoriler');
							}else if($message == 'basarisiz'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Kategori ekleme işlemi hatalı.</div>
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
										<div class="alert alert-warning">Böyle bir kategori zaten mevcut.</div>
									</div>
									<meta http-equiv="refresh" content="2;">';
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kategori Adı</span>
										</div>
										<input type="text" id="text-input" name="baslik" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kategori Durumu</span>
										</div>
										<select name="onay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<option>Aktif</option>
											<option value="1">Pasif</option>
										</select>
									</div>
								</div>
								<button type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light">Kategoriyi Ekle</button>
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