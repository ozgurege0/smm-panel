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
					<h4 class="page-title mb-2"><i class="dripicons-ticket"></i> Tüm Destek Talepleri</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Tüm Destek Talepleri</li>
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
							<h4 class="header-title mt-0 mb-3">Tüm Destek Talepleri</h4>
							<div class="form-group">
								<input type="text" class="form-control" id="ravertan-input" placeholder="Aradığınız desteği yazın..">
							</div>
							<div class="table-responsive">
								<table class="table table-hover mb-0 ravertan-arama">
									<thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Konu</th>
                                            <th>Başlık</th>
											<th>Tarih</th>
                                            <th>Durum</th>
											<th>Görüntüle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $vericek = $vt->cek('OBJ_ALL', 'destek', '*', '', array());
                                        foreach($vericek as $row){
                                            if($row->onay == 1){
                                                $durum = '<span class="badge badge-boxed  badge-soft-warning">Bekliyor</span>';
                                            }else if($row->onay == 0){
                                                $durum = '<span class="badge badge-boxed  badge-soft-success">Yanıtlandı</span>';
                                            }
                                            if($row->konu == 1){
                                                $konu = 'Sipariş';
                                            }else if($row->konu == 2){
                                                $konu = 'Diğer';
                                            }else if($row->konu == 3){
                                                $konu = 'Ödeme';
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$row->id?></td>
                                            <td><?=$konu?></td>
                                            <td><?=mb_substr($row->baslik,0,20)?></td>
											<td><?=$row->tarih?></td>
                                            <td><?=$durum?></td>
											<td><a class="btn btn-info btn-xs" href="cevap/<?=$row->id?>">Görüntüle</a></td>
											<td><a class="btn btn-danger btn-xs" onclick="return confirm('Destek talebini silmek istediğinize eminmisiniz?');" href="destek-sil/<?=$row->id?>">Sil</a></td>
                                        </tr>
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
			&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
