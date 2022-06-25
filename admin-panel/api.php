<?php 
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
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
					<h4 class="page-title mb-2"><i class="dripicons-link"></i> Api Ayarları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Api Ayarları</li>
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
							<strong>Api Ayarları</strong> 
						</div>
						<div class="card-body">
							<?php
							$ayar2 = $vt->cek('ASSOC', 'ayarlar', 'komisyon,apiurl,apikey', '', array());
							$guncelle = @$_POST['guncelle'];
							$message = "GOREVLE";
							if($guncelle){
								$komisyon = $_POST['komisyon'];
								$apiurl = $_POST['apiurl'];
								$apikey = $_POST['apikey'];
								if(!$komisyon || !$apiurl || !$apikey){
									$message = 'bos';
								}else{
									$guncelle = $vt->guncelle('0', 'ayarlar', 'komisyon,apiurl,apikey', '', array($komisyon,$apiurl,$apikey));
									if($guncelle){
										$message = 'basarili';
									}else{
										$message = 'basarili';
									}
								}
							}
							if($message == 'basarili'){
							echo '<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
								<div class="alert-text">
									İşleminiz başarıyla yapıldı. Yönlendiriliyorsunuz.
								</div>                                            
							</div>';
								header('refresh:3;url=api');
							}else if($message == 'hata'){
							echo '<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
								<div class="alert-text">
									İşleminiz başarısız ya da değişiklik yapılmadı.
								</div>                                            
							</div>
							<meta http-equiv="refresh" content="2;">
							';
							}else if($message == 'bos'){
							echo '
							<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
								<div class="alert-text">
									Boş bırakmayınız.
								</div>                                            
							</div>
							  <meta http-equiv="refresh" content="2;">';
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Api URL</span>
										</div>
										<input type="text" id="text-input" name="apiurl" class="form-control" value="<?=$ayar2['apiurl']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Api Key</span>
										</div>
										<input type="text" id="text-input" name="apikey" class="form-control" value="<?=$ayar2['apikey']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Komisyon Oranı</span>
										</div>
										<input type="text" id="text-input" name="komisyon" class="form-control" value="<?=$ayar2['komisyon']?>">
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
							</form>
						</div>
					</div>    
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<strong>Manuel Api Komutları</strong> 
						</div>
						<div class="card-body">
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<script type="text/javascript">
										function Kategoricek(){
											var newWindow2=window.open("<?=$ayar['url']?>/cron/kategorileri-cek.php","_blank","left=500,top=350,menubar=no,toolbar=no,titlebar=no,location=no,status=no,height=100,width=600");
										}
										</script>
										<input class="btn btn-purple btn-block btn-square  waves-effect waves-light" type="button" value="Kategorileri Çek" onclick="Kategoricek()" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<script type="text/javascript">
										function Serviscek(){
											var newWindow2=window.open("<?=$ayar['url']?>/cron/servisleri-cek.php","_blank","left=500,top=350,menubar=no,toolbar=no,titlebar=no,location=no,status=no,height=100,width=600");
										}
										</script>
										<input class="btn btn-purple btn-block btn-square  waves-effect waves-light" type="button" value="Servisleri Çek" onclick="Serviscek()" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<script type="text/javascript">
										function ServisListesiniguncelle(){
											var newWindow2=window.open("<?=$ayar['url']?>/cron/servis-listesini-guncelle.php","_blank","left=500,top=350,menubar=no,toolbar=no,titlebar=no,location=no,status=no,height=100,width=600");
										}
										</script>
										<input class="btn btn-purple btn-block btn-square  waves-effect waves-light" type="button" value="Servis Listesini Güncelle" onclick="ServisListesiniguncelle()" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<script type="text/javascript">
										function Servisfiyatiniguncelle(){
											var newWindow2=window.open("<?=$ayar['url']?>/cron/servis-fiyatini-guncelle.php","_blank","left=500,top=350,menubar=no,toolbar=no,titlebar=no,location=no,status=no,height=100,width=600");
										}
										</script>
										<input class="btn btn-purple btn-block btn-square  waves-effect waves-light" type="button" value="Servis Fiyatını Güncelle" onclick="Servisfiyatiniguncelle()" />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<script type="text/javascript">
										function Siparisguncelle(){
											var newWindow2=window.open("<?=$ayar['url']?>/cron/siparis-guncelle.php","_blank","left=500,top=350,menubar=no,toolbar=no,titlebar=no,location=no,status=no,height=100,width=600");
										}
										</script>
										<input class="btn btn-purple btn-block btn-square  waves-effect waves-light" type="button" value="Sipariş Güncelle" onclick="Siparisguncelle()" />
									</div>
								</div>
							</form>
						</div><!--end card-body-->
					</div><!--end card-->
				</div> <!-- end col -->
			</div> <!-- end row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<strong>Cronlar</strong> 
						</div>
						<div class="card-body">
							<div class="alert icon-custom-alert alert-outline-info alert-info-shadow" role="alert">
								<div class="alert-text">
									Bilgilendirme
									<hr>
									<p>1. Kategorileri çekmektedir. (1.Adım)</p>
									<p>2. Servisleri ve fiyatları çekmektedir. (2.Adım)</p>
									<p>3. Komisyon fiyatları güncellemektedir. (3.Adım)</p>
									<p>4. Panelinizde ki servis listesini güncellemektedir. (4.Adım)</p>
									<p>5. Siparişlerin durumunu güncellemektedir. (5.Adım)</p>
								</div>                                            
							</div>
							<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
								<div class="alert-text">
									<?=$ayar['url']?>/cron/kategorileri-cek.php
									<hr>
									<?=$ayar['url']?>/cron/servisleri-cek.php
									<hr>
									<?=$ayar['url']?>/cron/servis-fiyatini-guncelle.php
									<hr>
									<?=$ayar['url']?>/cron/servis-listesini-guncelle.php
									<hr>
									<?=$ayar['url']?>/cron/siparis-guncelle.php
								</div>                                            
							</div>
						</div><!--end card-body-->
					</div><!--end card-->
				</div> <!-- end col -->
			</div> <!-- end row -->
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ravertan <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->