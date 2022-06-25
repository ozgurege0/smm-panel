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
						<h4 class="page-title mb-2"><i class="mdi mdi-home mr-2"></i>Ana Sayfa</h4>  
						<div class="">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
								<li class="breadcrumb-item active">Ana Sayfa</li>
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
					$harcanan = $vt->sorgu('SELECT SUM(ucret) FROM orders where user_id=?', array($_SESSION['id']))->fetchColumn();
					$siparis2 = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=?", array($_SESSION['id']));
					$tickets = $vt->cek("KAYITSAY", "destek", "COUNT(*) id", "where user_id=?", array($_SESSION['id']));
					$tamamlanan = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=0", array($_SESSION['id']));
					$islemde = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=3", array($_SESSION['id']));
					$devametmekte = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=3", array($_SESSION['id']));
					$bekliyor = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=0", array($_SESSION['id']));
					$kısmi = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=1", array($_SESSION['id']));
					$iptal = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where user_id=? and durum=2", array($_SESSION['id']));
					?>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body mb-0">
								<div class="row">                                            
									<div class="col-8 align-self-center">
										<div class="">
											<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-warning d-inline-block rounded">Bakiyeniz</p></h4>
											<h2 class="mt-0 font-weight-bold"><?=$user['bakiye']?> ₺</h2> 
										</div>
									</div><!--end col-->
									<div class="col-4 align-self-center">
										<div class="icon-info text-right">
											<i class="dripicons-wallet bg-soft-warning"></i>
										</div>
									</div><!--end col-->
								</div><!--end row-->
							</div><!--end card-body-->                                                                   
						</div><!--end card-->
					</div><!--end col-->

					<div class="col-lg-6">
						<div class="card">
							<div class="card-body mb-0">
								<div class="row">                                            
									<div class="col-8 align-self-center">
										<div class="">
											<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-danger d-inline-block rounded">Harcanan Bakiye</p></h4>
											<h2 class="mt-0 font-weight-bold"><?=$harcanan?> ₺</h2> 
										</div>
									</div><!--end col-->
									<div class="col-4 align-self-center">
										<div class="icon-info text-right">
											<i class="dripicons-wallet bg-soft-danger"></i>
										</div>
									</div><!--end col-->
								</div><!--end row-->
							</div><!--end card-body-->                                                                   
						</div><!--end card-->
					</div><!--end col-->
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body mb-0">
								<div class="row">                                            
									<div class="col-8 align-self-center">
										<div class="">
											<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-info d-inline-block rounded">Toplam Sipariş</p></h4>
											<h2 class="mt-0 font-weight-bold"><?=$siparis2?> Adet</h2> 
										</div>
									</div><!--end col-->
									<div class="col-4 align-self-center">
										<div class="icon-info text-right">
											<i class="dripicons-shopping-bag bg-soft-info"></i>
										</div>
									</div><!--end col-->
								</div><!--end row-->
							</div><!--end card-body-->                                                                   
						</div><!--end card-->
					</div><!--end col-->
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body mb-0">
								<div class="row">                                            
									<div class="col-8 align-self-center">
										<div class="">
											<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-purple d-inline-block rounded">Toplam Destek</p></h4>
											<h2 class="mt-0 font-weight-bold"><?=$tickets?> Adet</h2> 
										</div>
									</div><!--end col-->
									<div class="col-4 align-self-center">
										<div class="icon-info text-right">
											<i class="dripicons-ticket bg-soft-purple"></i>
										</div>
									</div><!--end col-->
								</div><!--end row-->
							</div><!--end card-body-->                                                                   
						</div><!--end card-->
					</div><!--end col-->                            
				</div><!--end row-->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body new-user order-list">
								<h4 class="header-title mt-0 mb-3">Son 10 Sipariş</h4>
								<div class="table-responsive">
									<table class="table table-hover mb-0">
										<thead class="thead-light">
											<tr>
												<th class="border-top-0">Sipariş Numarası</th>
												<th class="border-top-0">Kullanıcı/Link</th>
												<th class="border-top-0">Fiyat</th>
												<th class="border-top-0">Başlangıç</th>
												<th class="border-top-0">Kalan Miktar</th>                                    
												<th class="border-top-0">Servis Adı</th>
												<th class="border-top-0">Durum</th>
												<th class="border-top-0">Tarih</th>
											</tr><!--end tr-->
										</thead>
										<tbody>
											<?php
											$veri = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
											$vericek = $vt->cek('OBJ_ALL', 'orders', '*', 'where user_id=? ORDER BY id DESC LIMIT 10', array($_SESSION['id']));
											foreach($vericek as $row){
												$baslik = $vt->cek('ASSOC', 'servisler', 'name,service', 'where service=?', array($row->service_id));
												if($row->durum == "3"){
													$durum = '<span class="badge badge-boxed  badge-soft-info">Devam etmekte</span>';
												}else if($row->durum == "2"){
													$durum = '<span class="badge badge-boxed  badge-soft-danger">İptal Edildi</span>';
												}else if($row->durum == "1"){
													$durum = '<span class="badge badge-boxed  badge-soft-success">Kısmi Tamamlandı</span>';
												}else if($row->durum == "0"){
													$durum = '<span class="badge badge-boxed  badge-soft-success">Tamamlandı</span>';
												}else if($row->durum == "4"){
													$durum = '<span class="badge badge-boxed  badge-soft-warning">Siparişiniz Alındı</span>';
												}
											?>
											<tr>
												<td><?=$row->order_id?></td>
												<td><?=$row->link?></td>
												<td><?=$row->ucret?> ₺</td>
												<td><?=$row->baslangic?></td>
												<td><?=$row->kalan?></td>
												<td><?=$baslik['name']?></td>
												<td><?=$durum?></td>
												<td><?=tarih($row->tarih)?></td>
											</tr><!--end tr-->
											<?php } ?>
										</tbody>
									</table> <!--end table-->                                               
								</div><!--end /div-->
							</div><!--end card-body-->
						</div><!--end card-->
					</div><!--end col-->
				</div><!--end row-->
			</div><!-- container -->
			<footer class="footer text-center text-sm-left">
				&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ravertan <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
			</footer>
		</div>
		<!-- end page content -->
	</div>
	<!-- end page-wrapper -->