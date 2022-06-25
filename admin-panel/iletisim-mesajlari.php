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
					<h4 class="page-title mb-2"><i class="mdi mdi-phone"></i> İletişim Mesajları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">İletişim Mesajları</li>
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
							<h4 class="header-title mt-0 mb-3">İletişim Mesajları</h4>
							<div class="form-group">
								<input type="text" class="form-control" id="ravertan-input" placeholder="Aradığınız iletişi mesajını yazın..">
							</div>
							<div class="table-responsive">
								<table class="table table-hover mb-0 ravertan-arama">
									<thead class="thead-light">
                                            <th>#</th>
                                            <th>Ad Soyad</th>
                                            <th>Mail Adresi</th>
											<th>Mesaj</th>
											<th>Tarih</th>
											<th>Görüntüle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $vericek = $vt->cek('OBJ_ALL', 'iletisim_formu', '*', '', array());
                                        foreach($vericek as $row){
                                        ?>
                                        <tr>
                                            <td><?=$row->id?></td>
											<td><?=$row->adsoyad?></td>
											<td><?=$row->mailadresi?></td>
											<td><?=kisalt($row->mesaj,'20')?></td>
											<td><?=$row->iletisim_tarihi?></td>
											<td><button type="button" data-target="#iletisim<?=$row->id?>" class="btn btn-info btn-xs" data-toggle="modal">Görüntüle</button>
												<!-- Modal -->
												<div class="modal fade" id="iletisim<?=$row->id?>">
													<div class="modal-dialog modal-xl">
														<div class="modal-content">
															<a style="color:white;" class="modal-header">
																<b class="pm-ikon">İletişim Mesajı</b>
															</a>
															<a style="color:white;" class="modal-body">
																<?=nl2br($row->mesaj)?>
																<hr>
																Ad Soyad : <?=$row->adsoyad?><br>
																Mail Adresi : <?=$row->mailadresi?>
															</a>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Kapat</button>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td><a class="btn btn-danger btn-xs" onclick="return confirm('Mesajı silmek istediğinize eminmisiniz?');" href="iletisim-sil/<?=$row->id?>">Sil</a></td>
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
			&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ravertan <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->