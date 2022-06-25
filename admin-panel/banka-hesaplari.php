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
					<h4 class="page-title mb-2"><i class="mdi mdi-bank"></i> Banka Hesapları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Banka Hesapları</li>
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
							<h4 class="header-title mt-0 mb-3">Banka Hesapları</h4>
							<div class="form-group">
								<a href="bankahesabi-ekle"><button class="btn btn-success btn-block" type="submit">Banka Hesabı Ekle</button></a>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="ravertan-input" placeholder="Aradığınız banka hesabını yazın..">
							</div>
							<div class="table-responsive">
								<table class="table table-hover mb-0 ravertan-arama">
									<thead class="thead-light">
                                            <th>#</th>
                                            <th>Banka Adı</th>
											<th>Hesap Sahibi</th>
											<th>Durum</th>
											<th>Tarih</th>
											<th>Düzenle</th>
											<th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $vericek = $vt->cek('OBJ_ALL', 'banka', '*', '', array());
                                        foreach($vericek as $row){
                                            if($row->onay == 1){
                                                $durum = '<span class="badge badge-boxed  badge-soft-danger">Pasif</span>';
                                            }else if($row->onay == 0){
                                                $durum = '<span class="badge badge-boxed  badge-soft-success">Aktif</span>';
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$row->id?></td>
                                            <td><?=$row->banka_adi?></td>
											<td><?=$row->alıcı_adi?></td>
                                            <td><?=$durum?></td>
											<td><?=$row->tarih?></td>
											<td><a class="btn btn-info btn-xs" href="bankahesabi-duzenle/<?=$row->id?>">Düzenle</a></td>
											<td><a class="btn btn-danger btn-xs" onclick="return confirm('<?=$row->banka_adi?> adlı banka hesabını silmek istediğinize eminmisiniz?');" href="bankahesabi-sil/<?=$row->id?>">Sil</a></td>
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
