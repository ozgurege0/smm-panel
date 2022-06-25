<?php 
$id = $_GET['id'];
if($id){
$duyuru = $vt->cek('ASSOC', 'duyurular', '*', 'where id=?', array($id));
if($duyuru){
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
					<h4 class="page-title mb-2"><i class="dripicons-broadcast mr-2"></i>Duyuru Düzenle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Duyuru Düzenle</li>
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
							<strong>Duyuru Düzenle</strong> 
						</div>
						<div class="card-body">
							<?php
							$guncelle = @$_POST['guncelle'];
							$message = "GOREVLE";
							if($guncelle){
								$aciklama = $_POST['aciklama'];
								$baslik = $_POST['baslik'];
								$onay = $_POST['onay'];
								if(!$baslik || !$aciklama || !$onay){
									$message = 'bos';
								}else{
									$guncel = $vt->guncelle('0', 'duyurular', 'baslik,aciklama,onay', 'where id=?', array($baslik,$aciklama,$onay,$id));
									if($guncel){
										$message = 'basarili';
									}else{
										$message = 'basarisiz';
									}
								}
							}
							if($message == 'basarili'){
								echo '<div class="form-group">
										<div class="alert alert-success">Güncelleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
									</div>';
									header('refresh:3;url=../duyurular');
							}else if($message == 'basarisiz'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Değişiklik Yapılmadı Yönlendiriliyorsunuz..</div>
									</div>';
									header('refresh:1;url=');
							}else if($message == 'bos'){
								echo '<div class="form-group">
										<div class="alert alert-warning">Boş bırakmayınız.</div>
									</div>';
									header('refresh:1;url=');
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Başlık</span>
										</div>
										<input type="text" id="text-input" name="baslik" class="form-control" value="<?=$duyuru['baslik']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">İçerik</span>
										</div>
										<textarea name="aciklama" rows="10" class="form-control"><?=$duyuru['aciklama']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kategori Durumu</span>
										</div>
										<select name="onay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											if($duyuru['onay'] == 1){
												echo '<option>Aktif</option>
												<option value="1" selected>Pasif</option>
												';
											}else if($duyuru['onay'] == 0){
												echo '<option selected>Aktif</option>
												<option value="1">Pasif</option>
												';
											}
											?>
										</select>
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Güncelle">
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
<?php
}else{
echo 'Böyle bir duyuru yok!';
}
}else{echo 'HATA.';
}?>
