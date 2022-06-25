<?php 
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$paytrbilgi = json_decode($ayar['paytr']);
$merchantid = $paytrbilgi->merchant_id;
$merchantkey = $paytrbilgi->merchant_key;
$merchantsalt = $paytrbilgi->merchant_salt;
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
					<h4 class="page-title mb-2"><i class="dripicons-card"></i> PayTR Ayarları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">PayTR Ayarları</li>
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
							<strong>PayTR Ayarları</strong> 
						</div>
						<div class="card-body">
						<?php
						$ayar2 = $vt->cek('ASSOC', 'ayarlar', 'url,logo,favicon', '', array());
							$guncelle = @$_POST['guncelle'];
							$message = "GOREVLE";
							if($guncelle){
								$pmerchantid = $_POST['merchantid'];
								$pmerchantkey = $_POST['merchantkey'];
								$pmerchantsalt = $_POST['merchantsalt'];
								if(!$pmerchantid || !$pmerchantkey || !$pmerchantsalt){
									$message = 'bos';
								}else{
									$paytr = array(
										'merchant_id' => $pmerchantid,
										'merchant_key' => $pmerchantkey,
										'merchant_salt' => $pmerchantsalt
										);
										$guncelle = $vt->guncelle('0', 'ayarlar', 'paytr', '', array(json_yap($paytr)));
										if($guncelle){
											$message = 'basarili';
										}else{
											$message = 'hata';
										}
								}
							}
							if($message == 'basarili'){
							echo '<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
								<div class="alert-text">
									İşleminiz başarıyla yapıldı. Yönlendiriliyorsunuz.
								</div>                                            
							</div>
							<meta http-equiv="refresh" content="2;">
							';
							}else if($message == 'hata'){
							echo '<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
								<div class="alert-text">
									Değişiklik Yapılmadı.
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
											<span class="input-group-text">Merchant Id</span>
										</div>
										<input type="text" id="text-input" name="merchantid" class="form-control" value="<?=$merchantid?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Merchant Key</span>
										</div>
										<input type="text" id="text-input" name="merchantkey" class="form-control" value="<?=$merchantkey?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Merchant Salt</span>
										</div>
										<input type="text" id="text-input" name="merchantsalt" class="form-control" value="<?=$merchantsalt?>">
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
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