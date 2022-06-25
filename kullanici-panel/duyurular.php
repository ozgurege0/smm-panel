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
						<h4 class="page-title mb-2"><i class="dripicons-broadcast mr-2"></i>Duyurular</h4>  
						<div class="">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
								<li class="breadcrumb-item active">Duyurular</li>
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
                    <?php 
                    $duyurular = $vt->cek('OBJ_ALL', 'duyurular', '*', 'where onay=?', array(0));
                    foreach($duyurular as $row){
                        echo '
						<div class="col-md-12">
							<div class="ribbon-1">
								<div class="ribbon-box">
									<div class="ribbon ribbon-mark ribbon-icon bg-primary"><i class="dripicons-broadcast"></i></div>
									<div class="ribbon ribbon-mark ribbon-right bg-primary">'.$row->baslik.'</div>
									<p class="mb-0">'.nl2br($row->aciklama).'</p>
								</div>
							</div>
						</div>
						';
                    }
                    ?>
				</div> <!--end row--> 
			</div><!-- container -->
			<footer class="footer text-center text-sm-left">
				&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
			</footer>
		</div>
		<!-- end page content -->
	</div>
	<!-- end page-wrapper -->
