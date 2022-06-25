<?php 
$id = $_GET['id'];
if($id){
$banka = $vt->cek('ASSOC', 'banka', '*', 'where id=?', array($id));
if($banka){
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
					<h4 class="page-title mb-2"><i class="mdi mdi-bank mr-2"></i>Banka Hesabı Düzenle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Banka Hesabı Düzenle</li>
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
							<strong>Banka Hesabı Düzenle</strong> 
						</div>
						<div class="card-body">
							<?php
                            $guncelle = @$_POST['guncelle'];
                            $message = "GOREVLE";
                            if($guncelle){
                                $banka_adi = $_POST['banka_adi'];
                                $logo = $_POST['logo'];
                                $alıcı_adi = $_POST['alıcı_adi'];
                                $hesap_no = $_POST['hesap_no'];
                                $iban = $_POST['iban'];
                                $sube_adi = $_POST['sube_adi'];
                                $sube_kodu = $_POST['sube_kodu'];
								$onay = $_POST['onay'];

								$guncel = $vt->guncelle('0', 'banka', 'banka_adi,logo,alıcı_adi,hesap_no,iban,sube_adi,sube_kodu,onay', 'where id=?', array($banka_adi,$logo,$alıcı_adi,$hesap_no,$iban,$sube_adi,$sube_kodu,$onay,$id));
								if($guncel){
									$message = 'basarili';
								}else{
									$message = 'basarisiz';
								}
                            }
							if($message == 'basarili'){
								echo '<div class="form-group">
										<div class="alert alert-success">Güncelleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
									</div>';
									header('refresh:3;url=../banka-hesaplari');
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
											<span class="input-group-text">Banka Adı</span>
										</div>
										<input type="text" id="text-input" name="banka_adi" class="form-control" value="<?=$banka['banka_adi']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Banka Logo</span>
										</div>
										<input type="text" id="text-input" name="logo" class="form-control" value="<?=$banka['logo']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Alıcı Adı</span>
										</div>
										<input type="text" id="text-input" name="alıcı_adi" class="form-control" value="<?=$banka['alıcı_adi']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Hesap No</span>
										</div>
										<input type="text" id="text-input" name="hesap_no" class="form-control" value="<?=$banka['hesap_no']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">IBAN</span>
										</div>
										<input type="text" id="text-input" name="iban" class="form-control" value="<?=$banka['iban']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şube Adı</span>
										</div>
										<input type="text" id="text-input" name="sube_adi" class="form-control" value="<?=$banka['sube_adi']?>">l">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Sube Kodu</span>
										</div>
										<input type="text" id="text-input" name="sube_kodu" class="form-control" value="<?=$banka['sube_kodu']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Banka Hesap Durumu</span>
										</div>
										<select name="onay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											if($banka['onay'] == 1){
												echo '<option>Aktif</option>
												<option value="1" selected>Pasif</option>
												';
											}else if($banka['onay'] == 0){
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
			&copy; 2021 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ravertan <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
<?php
}else{
echo 'Böyle bir banka hesabı yok!';
}
}else{echo 'HATA.';
}?>