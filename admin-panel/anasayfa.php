<?php 
include "../inc/api.php";
$api = new Api();
$api->api_url = $ayar['apiurl'];
$api->api_key = $ayar['apikey'];

$bakiye = $api->balance();
$bakiye1 = json_decode(json_encode($bakiye), true);

$bugun = date("Y-m-d");
$cevir = strtotime('-1 day',strtotime($bugun));
$dun = date("Y-m-d",$cevir);
$uye = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "", array());
$siparis = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "", array());
$destek = $vt->cek("KAYITSAY", "destek", "COUNT(*) id", "where onay=?", array(1));
$servisler = $vt->cek("KAYITSAY", "servisler", "COUNT(*) id", "where onay=?", array(0));
$dunuye = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "where tarih=?", array($dun));
$bugunuye = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "where tarih=?", array($bugun));
if($bugunuye > $dunuye){$uyevar = $bugunuye-$dunuye;$renk = 'success';$icon = 'top-right';}else{$uyevar = $dunuye-$bugunuye;$renk = 'danger'; $icon = 'bottom-left';}
$dunsiparis = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where tarih=?", array($dun));
$bugunsiparis = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "where tarih=?", array($bugun));
if($bugunsiparis > $dunsiparis){$siparisvar = $bugunsiparis-$dunsiparis;$renk = 'success';$icon = 'top-right';}else{$siparisvar = $dunsiparis-$bugunsiparis;$renk = 'danger'; $icon = 'bottom-left';}

$karzarardurum = $vt->cek("ASSOC", "orders", "SUM(api_ucret),SUM(ucret)","", array());
$apiodenen = $karzarardurum['SUM(api_ucret)'];
$fark = $karzarardurum['SUM(ucret)'];
$karzarar = $fark-$apiodenen;
if($karzarar > '0'){
  $artıeksi='+'; $zrenk = 'success';$zicon = 'top-right';$zyazi = 'Kar';
}else if($karzarar < '0'){$artıeksi='-';$zrenk = 'danger';$zicon = 'bottom-left';$zyazi = 'Zarar';}
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
					<h4 class="page-title mb-2"><i class="mdi mdi-home mr-2"></i>Ana Sayfa</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
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
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-warning d-inline-block rounded">Toplam Üye</p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$uye?></h2> 
									</div>
								</div><!--end col-->
								<div class="col-4 align-self-center">
									<div class="icon-info text-right">
										<i class="dripicons-user bg-soft-warning"></i>
									</div>
								</div><!--end col-->
							</div><!--end row-->
						</div><!--end card-body-->                                                                   
					</div><!--end card-->
				</div><!--end col-->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-danger d-inline-block rounded">Toplam Sipariş</p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$siparis?></h2> 
									</div>
								</div><!--end col-->
								<div class="col-4 align-self-center">
									<div class="icon-info text-right">
										<i class="mdi mdi-shopping bg-soft-danger"></i>
									</div>
								</div><!--end col-->
							</div><!--end row-->
						</div><!--end card-body-->                                                                   
					</div><!--end card-->
				</div><!--end col-->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-purple d-inline-block rounded">Toplam Bekleyen Destek</p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$destek?></h2> 
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
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-primary d-inline-block rounded">Toplam Servis</p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$servisler?></h2> 
									</div>
								</div><!--end col-->
								<div class="col-4 align-self-center">
									<div class="icon-info text-right">
										<i class="dripicons-tags bg-soft-primary"></i>
									</div>
								</div><!--end col-->
							</div><!--end row-->
						</div><!--end card-body-->                                                                   
					</div><!--end card-->
				</div><!--end col-->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-info d-inline-block rounded">Api bakiyesi</p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$bakiye1['balance']?> ₺</h2> 
									</div>
								</div><!--end col-->
								<div class="col-4 align-self-center">
									<div class="icon-info text-right">
										<i class="dripicons-card bg-soft-info"></i>
									</div>
								</div><!--end col-->
							</div><!--end row-->
						</div><!--end card-body-->                                                                   
					</div><!--end card-->
				</div><!--end col-->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body mb-0">
							<div class="row">                                            
								<div class="col-8 align-self-center">
									<div class="">
										<h4 class="mt-0 header-title"><p class="px-4 py-1 bg-soft-success d-inline-block rounded"><?=$zyazi?></p></h4>
										<h2 class="mt-0 font-weight-bold"><?=$artıeksi.$karzarar?> ₺</h2> 
									</div>
								</div><!--end col-->
								<div class="col-4 align-self-center">
									<div class="icon-info text-right">
										<i class="dripicons-card bg-soft-success"></i>
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
											<th class="border-top-0">Kullanıcı Adı</th>
											<th class="border-top-0">Sipariş Numarası</th>
											<th class="border-top-0">Servis Numarası</th>
											<th class="border-top-0">Link/Kullanıcı</th>
											<th class="border-top-0">Miktar</th>
											<th class="border-top-0">Fiyat</th>
											<th class="border-top-0">Kar/Kazanç</th>                                    
											<th class="border-top-0">Durum</th>
											<th class="border-top-0">Tarih</th>
										</tr><!--end tr-->
									</thead>
									<tbody>
										<?php 
										$uyeler = $vt->cek('OBJ_ALL', 'orders', '*', 'ORDER BY id DESC LIMIT 10', array());
										foreach($uyeler as $row){
										$username = $vt->cek('ASSOC', 'uyeler', 'username', 'where id=?', array($row->user_id));
										if($row->durum == "3"){
											$durum = '<span class="badge badge-boxed  badge-soft-info">Devam etmekte</span>';
										}else if($row->durum == "2"){
											$durum = '<span class="badge badge-boxed  badge-soft-danger">İptal Edildi</span>';
										}else if($row->durum == "1"){
											$durum = '<span class="badge badge-boxed  badge-soft-success">Kısmi Tamamlandı</span>';
										}else if($row->durum == "0"){
											$durum = '<span class="badge badge-boxed  badge-soft-success">Tamamlandı</span>';
										}else{
											$durum = '<span class="badge badge-boxed  badge-soft-warning">Yeni Sipariş</span>';
										}
										$kar = $row->ucret-$row->api_ucret;
										?>
										<tr>
											<td><?=$username['username']?></td>
											<td><?=$row->order_id?></td>
											<td><?=$row->service_id?></td>
											<td><?=$row->link?></td>
											<td><?=$row->miktar?></td>
											<td><?=$row->ucret?> ₺</td>
											<td><?=$kar?> ₺</td>
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
			&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
