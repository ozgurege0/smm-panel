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
					<h4 class="page-title mb-2"><i class="dripicons-card"></i> Ödeme Talebi Onayla</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Ödeme Talebi Onayla</li>
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
				<div class="col-12">
					<?php 
					$getid = $_GET["id"];
						if($getid){
							$kontrol = $vt->cek("ASSOC", "odemeler", "*" ,"where id=?", array($getid));
							if($kontrol){
								$uyemail = $kontrol['uye_email'];
								$eskibakiye = $vt->cek('ASSOC', 'uyeler', 'bakiye', 'where email=?', array($uyemail));
								$eskibakiyeuye = $eskibakiye['bakiye'];
								$yenibakiye = $eskibakiyeuye+$kontrol['tutar'];
								
								$guncelle = $vt->guncelle('0','uyeler', 'bakiye', 'where email=?', array($yenibakiye,$uyemail));
								$guncelle2 = $vt->guncelle('0','odemeler', 'onay,mesaj', 'where id=?', array('0','Onaylandı', $kontrol['id']));
								if($guncelle || $guncelle2){
									echo '<div class="form-group">
										<div class="alert alert-success">Ödeme talebi başaryırla onaylandı!</div>
									</div>';
								header('refresh:2;url=../odemeler'); 
								}else{
									echo '<div class="form-group">
										<div class="alert alert-danger">HATA!</div>
									</div>';
								header('refresh:2;url=../odemeler'); 
								}
							}else{
								echo '<div class="form-group">
										<div class="alert alert-danger">HATA. Böyle bir ödeme yok!'.$_GET['id'].'</div>
									</div>';
								header('refresh:2;url=../odemeler'); 
							}  
						}else{
							echo '<div class="form-group">
										<div class="alert alert-warning">Yanlış değer.</div>
									</div>';
							header('refresh:2;url=../odemeler');   
						} 
					?>
				</div><!--end col-->
			</div><!--end row-->
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
