<?php 
$payments = $vt->cek('ASSOC', 'ayarlar', 'payment', '', array());
$payment = json_decode($payments['payment']);
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
					<h4 class="page-title mb-2"><i class="mdi mdi-credit-card mr-2"></i>Banka Hesapları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<strong>Ödeme Bildirimi</strong> 
						</div>
						<div class="card-body">
							<div class="alert alert-info">Minimum bakiye yükleme tutarı <?=$ayar['min_odemetutari']?> ₺'dir.</div>
							<?php 
							if($_POST){
							if(!$_POST['adsoyad'] || !$_POST['tutar'] || !$_POST['banka']){
								echo '<div class="alert alert-warning">Boş bırakmayınız</div>';
							}else{
								$ekle = $vt->ekle('odemeler', 'uye_email,uye_numara,uye_adsoyad,siparis_no,tutar,onay,mesaj,method', array(
									$user['email'],
									$user['telefon'],
									$_POST['adsoyad'],
									0,
									$_POST['tutar'],
									1,
									0,
									$_POST['banka']
								));

								if($ekle){
									echo '<div class="alert alert-success">Ödeme bildiriminiz başarıyla kaydedildi, yönetici onayından sonra bakiyeniz hesabınıza eklenecektir.</div>';
									header('refresh:3;url=odeme-talepleri');
								}else{
									echo '<div class="alert alert-success">Ödeme bildiriminiz alınamadı, lütfen daha sonra tekrar deneyiniz.</div>';
									header('refresh:3;url=banka-hesaplari');
								}
							}
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ödeme Yapılan Banka</span>
										</div>
										<select class="form-control" name="banka">
											<option>Seçiniz</option>';
											<?php 
											$banklist = $vt->cek('OBJ_ALL', 'banka', '*', 'where onay=?', array(0));
											foreach($banklist as $row){
											echo '<option value="'.$row->banka_adi.'">'.$row->banka_adi.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ad Soyad</span>
										</div>
										<input type="text" class="form-control" name="adsoyad" placeholder="Ödeme Yapan Ad Soyad" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ödeme Yapılan Tutar</span>
										</div>
										<input type="number" class="form-control" name="tutar" min="<?=$ayar['min_odemetutari']?>" placeholder="Ödeme Tutarı" required>
									</div>
								</div>
								<input type="submit" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Ödeme Bildirini Gönder">
							</form>
						</div>
					</div>    
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<strong>Banka Hesapları</strong> 
						</div>
					</div>    
				</div>
			</div>
			<div class="row">
				<?php 
				$box = $vt->cek('OBJ_ALL', 'banka', '*', 'where onay=?', array(0));
				foreach($box as $row2){
				?>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<?php 
							echo '<div class="box '.$row2->banka_adi.'" style="display: block;">
							<table class="table table-bordered table-banks">
							<tbody>
							<tr class="api-list">
							<td><span class="f-bg">Banka Görseli</span></td>
							<td><img src="'.$row2->logo.'" width="50px" class="img-fluid"></td>
							</tr>
							<tr class="api-list">
							<td><span class="f-bg">Banka Adı</span></td>
							<td>'.$row2->banka_adi.'</td>
							</tr>
							<tr class="api-list">
							<td><span class="f-bg">Şube Kodu</span></td>
							<td>'.$row2->sube_kodu.'</td>
							</tr>
							<tr class="api-list">
							<td><span class="f-bg">Hesap No</span></td>
							<td>'.$row2->hesap_no.'</td>
							</tr>
							<tr class="api-list">
							<td><span class="f-bg">Hesap Sahibi</span></td>
							<td>'.$row2->alıcı_adi.'</td>
							</tr>
							<tr class="api-list">
							<td><span class="f-bg">IBAN</span></td>
							<td>'.$row2->iban.'</td>
							</tr>
							</tbody>
							</table>
							</div>';
							?>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
