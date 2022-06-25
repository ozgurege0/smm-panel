<?php
$veri = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
?>
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
						<h4 class="page-title mb-2"><i class="mdi mdi-credit-card mr-2"></i>Ödeme Taleplerim</h4>  
						<div class="">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
								<li class="breadcrumb-item active">Ödeme Taleplerim</li>
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
						<div class="card">
							<div class="card-body new-user order-list">
								<h4 class="header-title mt-0 mb-3">Ödeme Talepleri</h4>
								<div class="form-group">
									<input type="text" class="form-control" id="ravertan-input" placeholder="Aradığınız ödeme talebini yazın..">
								</div>
								<div class="table-responsive">
									<table class="table table-hover mb-0 ravertan-arama">
										<thead class="thead-light">
											<tr>
												<th class="border-top-0">#</th>
												<th class="border-top-0">İşlem Numarası</th>
												<th class="border-top-0">Ad Soyad</th>
												<th class="border-top-0">Tutar</th>
												<th class="border-top-0">Ödeme Yöntemi</th>
												<th class="border-top-0">Durum</th>
												<th class="border-top-0">Tarih</th>
											</tr><!--end tr-->
										</thead>
										<tbody>
											<?php 
											$odemeler = $vt->cek("OBJ_ALL", "odemeler", "*", "where uye_email=?", array($user['email']));
											foreach($odemeler as $row){
												if($row->onay == '1'){
													$durum = '<span class="badge badge-boxed  badge-soft-info">Onay Bekliyor</span>';
												}else if($row->onay == '2'){
													$durum = '<span class="badge badge-boxed  badge-soft-danger">İptal Edildi</span>';
												}else{
													$durum = '<span class="badge badge-boxed  badge-soft-success">Onaylandı</span>';
												}
												echo '
												<tr class="text-left" style="font-size:15px;">
													<td>'.$row->id.'</td>
													<td>'.$row->siparis_no.'</td>
													<td>'.$row->uye_adsoyad.'</td>
													<td>'.$row->tutar.' ₺</td>
													<td>'.$row->method.'</td>
													<td>'.$durum.'</td>
													<td>'.$row->tarih.'</td>
												</tr>';
											}
											?>
										</tbody>
									</table> <!--end table-->                                               
								</div><!--end /div-->
							</div><!--end card-body-->
						</div><!--end card-->
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
