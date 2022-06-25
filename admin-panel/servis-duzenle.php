<?php 
$id = $_GET['id'];
if($id){
$service = $vt->cek('ASSOC', 'servisler', '*', 'where id=?', array($id));
if($service){
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
					<h4 class="page-title mb-2"><i class="dripicons-tags mr-2"></i>Servis Düzenle</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="home">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Servis Düzenle</li>
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
							<strong>Servis Düzenle</strong> 
						</div>
						<div class="card-body">
							<?php
							$guncelle = @$_POST['guncelle'];
							$message = "GOREVLE";
							if($guncelle){
							$serviceno = $_POST['serviceno'];
							$baslik = $_POST['baslik'];
							$fiyat = $_POST['fiyat'];
							$aciklama = $_POST['aciklama'];
							$min = $_POST['min'];
							$max = $_POST['max'];
							$kategori = $_POST['kategori'];
							$onay = $_POST['onay'];
							$manuelayar = $_POST['manuelayar'];
							if(!$serviceno || !$baslik || !$fiyat || !$min || !$max || !$onay || !$manuelayar){
							$message = 'bos';
							}else{
							$kontrol1 = $vt->cek('ASSOC', 'servisler', 'service', 'where id=? and service!=?', array($id,$serviceno));
							if($kontrol1){
							$message = 'servisvar';
							}else{
							$guncelle = $vt->guncelle('0', 'servisler', 'service,name,rate,aciklama,min,max,category,manuelayar,onay', 'where id=?', array(
							$serviceno,
							$baslik,
							$fiyat,
							$aciklama,
							$min,
							$max,
							$kategori,
							$manuelayar,
							$onay,
							$id
							));
							if($guncelle){
							$message = 'basarili';
							}else{
							$message = 'basarili';
							}
							}
							}
							}
							if($message == 'basarili'){
							echo '<div class="sweet-overlay" tabindex="-1" style="opacity: 1.07; display: block;"></div>
							<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -178px;"><div class="sa-icon sa-error" style="display: none;">
							<span class="sa-x-mark">
							<span class="sa-line sa-left"></span>
							<span class="sa-line sa-right"></span>
							</span>
							</div><div class="sa-icon sa-warning" style="display: none;">
							<span class="sa-body"></span>
							<span class="sa-dot"></span>
							</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success animate" style="display: block;">
							<span class="sa-line sa-tip animateSuccessTip"></span>
							<span class="sa-line sa-long animateSuccessLong"></span>

							<div class="sa-placeholder"></div>
							<div class="sa-fix"></div>
							</div><div class="sa-icon sa-custom" style="display: none; background-image: url(&quot;../assets/images/users/1.jpg&quot;); width: 80px; height: 80px;"></div><h2>Başarılı!</h2>
							<p style="display: block;">İşleminiz başarıyla yapıldı. Yönlendiriliyorsunuz.</p>
							<fieldset>
							<input type="text" tabindex="3" placeholder="">
							<div class="sa-input-error"></div>
							</fieldset><div class="sa-error-container">
							<div class="icon">!</div>
							<p>Not valid!</p>
							</div><div class="sa-button-container">
							<button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
							<div class="sa-confirm-button-container">
							<button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Kapat</button><div class="la-ball-fall">
							<div></div>
							<div></div>
							<div></div>
							</div>
							</div>
							</div></div>';
							header('refresh:3;url=../servisler');
							}else if($message == 'basarisiz'){
							echo '<div class="sweet-overlay" tabindex="-1" style="opacity: 1.07; display: block;"></div>
							<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -169px;"><div class="sa-icon sa-error animateErrorIcon" style="display: block;">
							<span class="sa-x-mark animateXMark">
							<span class="sa-line sa-left"></span>
							<span class="sa-line sa-right"></span>
							</span>
							</div><div class="sa-icon sa-warning pulseWarning" style="display: none;">
							<span class="sa-body pulseWarningIns"></span>
							<span class="sa-dot pulseWarningIns"></span>
							</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
							<span class="sa-line sa-tip"></span>
							<span class="sa-line sa-long"></span>

							<div class="sa-placeholder"></div>
							<div class="sa-fix"></div>
							</div><div class="sa-icon sa-custom" style="display: none; background-image: url(&quot;../assets/images/users/1.jpg&quot;); width: 80px; height: 80px;"></div><h2>HATA!</h2>
							<p style="display: block;">İşleminiz başarısız.</p>
							<fieldset>
							<input type="text" tabindex="3" placeholder="">
							<div class="sa-input-error"></div>
							</fieldset><div class="sa-error-container">
							<div class="icon">!</div>
							<p>Not valid!</p>
							</div><div class="sa-button-container">
							<button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
							<div class="sa-confirm-button-container">
							<button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Kapat</button><div class="la-ball-fall">
							<div></div>
							<div></div>
							<div></div>
							</div>
							</div>
							</div></div>
							<meta http-equiv="refresh" content="2;">';

							}else if($message == 'servisvar'){

							echo '<div class="sweet-overlay" tabindex="-1" style="opacity: 1.07; display: block;"></div>
							<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -169px;"><div class="sa-icon sa-error animateErrorIcon" style="display: block;">
							<span class="sa-x-mark animateXMark">
							<span class="sa-line sa-left"></span>
							<span class="sa-line sa-right"></span>
							</span>
							</div><div class="sa-icon sa-warning pulseWarning" style="display: none;">
							<span class="sa-body pulseWarningIns"></span>
							<span class="sa-dot pulseWarningIns"></span>
							</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
							<span class="sa-line sa-tip"></span>
							<span class="sa-line sa-long"></span>

							<div class="sa-placeholder"></div>
							<div class="sa-fix"></div>
							</div><div class="sa-icon sa-custom" style="display: none; background-image: url(&quot;../assets/images/users/1.jpg&quot;); width: 80px; height: 80px;"></div><h2>HATA!</h2>
							<p style="display: block;">Böyle bir servis numarası zaten mevcut.</p>
							<fieldset>
							<input type="text" tabindex="3" placeholder="">
							<div class="sa-input-error"></div>
							</fieldset><div class="sa-error-container">
							<div class="icon">!</div>
							<p>Not valid!</p>
							</div><div class="sa-button-container">
							<button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
							<div class="sa-confirm-button-container">
							<button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Kapat</button><div class="la-ball-fall">
							<div></div>
							<div></div>
							<div></div>
							</div>
							</div>
							</div></div>
							<meta http-equiv="refresh" content="2;">';

							}else if($message == 'bos'){

							echo '<div class="sweet-overlay" tabindex="-1" style="opacity: 1.07; display: block;"></div>
							<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -169px;"><div class="sa-icon sa-error animateErrorIcon" style="display: block;">
							<span class="sa-x-mark animateXMark">
							<span class="sa-line sa-left"></span>
							<span class="sa-line sa-right"></span>
							</span>
							</div><div class="sa-icon sa-warning pulseWarning" style="display: none;">
							<span class="sa-body pulseWarningIns"></span>
							<span class="sa-dot pulseWarningIns"></span>
							</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
							<span class="sa-line sa-tip"></span>
							<span class="sa-line sa-long"></span>

							<div class="sa-placeholder"></div>
							<div class="sa-fix"></div>
							</div><div class="sa-icon sa-custom" style="display: none; background-image: url(&quot;../assets/images/users/1.jpg&quot;); width: 80px; height: 80px;"></div><h2>HATA!</h2>
							<p style="display: block;">Boş bırakmayınız.</p>
							<fieldset>
							<input type="text" tabindex="3" placeholder="">
							<div class="sa-input-error"></div>
							</fieldset><div class="sa-error-container">
							<div class="icon">!</div>
							<p>Not valid!</p>
							</div><div class="sa-button-container">
							<button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
							<div class="sa-confirm-button-container">
							<button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Kapat</button><div class="la-ball-fall">
							<div></div>
							<div></div>
							<div></div>
							</div>
							</div>
							</div></div>
							<meta http-equiv="refresh" content="2;">';
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Numarası</span>
										</div>
										<input type="text" id="text-input" name="serviceno" class="form-control" value="<?=$service['service']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Adı</span>
										</div>
										<input type="text" id="text-input" name="baslik" class="form-control" value="<?=$service['name']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Fiyatı</span>
										</div>
										<input type="text" id="text-input" name="fiyat" class="form-control" value="<?=$service['rate']?>">
										<div class="input-group-append">
												<span class="input-group-text">₺</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Açıklaması</span>
										</div>
										<textarea name="aciklama" id="textarea-input" rows="9" class="form-control"><?=$service['aciklama']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Min</span>
										</div>
										<input type="text" id="odul" name="min" class="form-control" value="<?=$service['min']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Max</span>
										</div>
										<input type="text" id="odul" name="max" class="form-control" value="<?=$service['max']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Kategorisi</span>
										</div>
										<select name="kategori" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											$kategori = $vt->cek('OBJ_ALL', 'kategoriler', '*', '', array());
											foreach($kategori as $row){
											if($row->id == $service['category']){
											$select = 'selected';
											}else{
											$select = '';
											}
											echo '<option value="'.$row->id.'" '.$select.'>'.$row->baslik.'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis Durumu</span>
										</div>
										<select name="onay" id="select" class="form-control">
											<option value="0">Seçiniz</option>
											<?php 
											if($service['onay'] == 1){
											echo '<option>Aktif</option>
											<option value="1" selected>Pasif</option>
											';
											}else if($service['onay'] == 0){
											echo '<option selected>Aktif</option>
											<option value="1">Pasif</option>
											';
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Bakiyeyi Manuel Ayarla</span>
										</div>
									<select name="manuelayar" id="select" class="form-control">
										<option value="0">Seçiniz</option>
										<?php 
										if($service['onay'] == 1){
										echo '<option>Aktif</option>
										<option value="1" selected>Pasif</option>
										';
										}else if($service['onay'] == 0){
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
echo 'Böyle bir servis yok!';
}
}else{echo 'HATA.';
}
?>
