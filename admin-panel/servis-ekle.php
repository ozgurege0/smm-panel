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
					<h4 class="page-title mb-2"><i class="dripicons-tags mr-2"></i>Servis Ekle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Servis Ekle</li>
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
							<strong>Servis Ekle</strong> 
						</div>
						<div class="card-body">
							<?php

							$message = 'GOREVLEGELSİN';

							if($_POST){

								$serviceno = $_POST['serviceno'];

								$baslik = $_POST['baslik'];

								$fiyat = $_POST['fiyat'];

								$aciklama = $_POST['aciklama'];

								$min = $_POST['min'];

								$max = $_POST['max'];

								$kategori = $_POST['kategori'];

								$onay = $_POST['onay'];

								if(!$serviceno || !$baslik || !$fiyat || !$aciklama || !$min || !$max || !$kategori || !$onay){

									$message = 'bos';

								}else{

									$kontrol1 = $vt->cek('ASSOC', 'servisler', 'service', 'where service=?', array($serviceno));

									if($kontrol1){

										$message = 'servisvar';

									}else{

										$guncelle = $vt->ekle('servisler', 'service,name,rate,aciklama,min,max,category,onay', array(

											$serviceno,

											$baslik,

											$fiyat,

											$aciklama,

											$min,

											$max,

											$kategori,

											$onay

										));

										if($guncelle){

											$message = 'basarili';

										}else{

											$message = 'basarisiz';

										}

									}

								}

							}

							if($message == 'basarili'){

								echo '<div class="form-group">

										<div class="alert alert-success">Servis ekleme işlemi başarılı. Yönlendiriliyorsunuz.</div>

									</div>';

									header('refresh:3;url=servisler');

							}else if($message == 'basarisiz'){

								echo '<div class="form-group">

										<div class="alert alert-danger">Servis ekleme işlemi hatalı.</div>

									</div>
									<meta http-equiv="refresh" content="2;">';

							}else if($message == 'bos'){

								echo '<div class="form-group">

										<div class="alert alert-warning">Boş bırakmayınız.</div>

									</div>
									<meta http-equiv="refresh" content="2;">';

							}

							else if($message == 'servisvar'){

								echo '<div class="form-group">

										<div class="alert alert-warning">Böyle bir servis zaten mevcut.</div>

									</div>
									<meta http-equiv="refresh" content="2;">';

							}

							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Numarası</span>
										</div>
										<input type="text" id="text-input" name="serviceno" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Adı</span>
										</div>
										<input type="text" id="text-input" name="baslik" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Fiyatı</span>
										</div>
										<input type="text" id="text-input" name="fiyat" class="form-control">
										<div class="input-group-append">
												<span class="input-group-text">₺</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Açıklaması</span>
										</div>
										<textarea name="aciklama" rows="9" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Min</span>
										</div>
										<input type="text" id="odul" name="min" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Max</span>
										</div>
										<input type="text" id="odul" name="max" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Kategorisi</span>
										</div>
										<select name="kategori" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											$kategori = $vt->cek('OBJ_ALL', 'kategoriler', '*', '', array());
											foreach($kategori as $row){
											if($row->id == $service['category']){
											$select = 'selected';
											}else{
											$select = '';
											}
											echo '<option value="'.$row->id.'" '.$select.'>'.$row->baslik.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Durumu</span>
										</div>
										<select name="onay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<option>Aktif</option>
											<option value="1">Pasif</option>
										</select>
									</div>
								</div>
								<button type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light">Servisi Ekle</button>
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
