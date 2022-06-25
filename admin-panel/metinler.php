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
					<h4 class="page-title mb-2"><i class="dripicons-pencil"></i> Metin Ayarı</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Metin Ayarı</li>
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
							<strong>Metin Ayarı</strong> 
						</div>
						<div class="card-body">
							<?php
							$anasayfa = @$_POST['anasayfa'];
							if($anasayfa){
								$kullanim_sozlesmesi = $_POST['kullanim_sozlesmesi'];
								$sss = $_POST['sss'];
								if(!$kullanim_sozlesmesi || !$sss){
									echo '<div class="alert alert-warning">Boş bırakma</div>';
								}else{                                       
									$guncelle = $vt->guncelle('0', 'ayarlar', 'kullanim_sozlesmesi,sss', 'where id=?', array($kullanim_sozlesmesi,$sss,1));
									if($guncelle){
										echo '<div class="alert alert-success">Metin Ayarları Başarıyla Kaydedildi.</div>';
										echo '<meta http-equiv="refresh" content="2;">';
									}else{
										echo '<div class="alert alert-danger">Zaten aynı veriler kayıtlı.</div>';
									}
								}
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanım Sözleşmesi</span>
										</div>
										<textarea name="kullanim_sozlesmesi" rows="10" class="form-control"><?=$ayar['kullanim_sozlesmesi']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Sık Sorulan Sorular</span>
										</div>
										<textarea name="sss" rows="10" class="form-control"><?=$ayar['sss']?></textarea>
									</div>
								</div>
								<input type="submit" name="anasayfa" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
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
