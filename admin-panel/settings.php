<?php
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$pbilgi = json_decode($ayar['payment']);
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
					<h4 class="page-title mb-2"><i class="mdi mdi-cogs"></i> Site Ayarları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Site Ayarları</li>
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
							<strong>Site Ayarları</strong> 
						</div>
						<div class="card-body">
							<?php
							$site_ayari = @$_POST['site_ayari'];
							$message = "GOREVLE";
							if($site_ayari){
								$baslik = $_POST['baslik'];
								$title = $_POST['title'];
								$url = $_POST['url'];
								$desc = $_POST['desc'];
								$keyw = $_POST['keyw'];
								$email = $_POST['email'];
								$iletisim_cep = $_POST['iletisim_cep'];
								$iletisim_adres = $_POST['iletisim_adres'];
								$site_facebook = $_POST['site_facebook'];
								$site_twitter = $_POST['site_twitter'];
								$site_instagram = $_POST['site_instagram'];
								$min_odemetutari = $_POST['min_odemetutari'];
								$tarih = date('d.m.Y H:i:s');
								$paytr      = $_POST['paytr'];
								$shopier      = $_POST['shopier'];
								$analytics      = $_POST['analytics'];
								$site_kodlari      = $_POST['site_kodlari'];
								$onlineodeme    = $_POST['onlineodeme'];
								$havale    = $_POST['havale'];
								if(!$title || !$url || !$baslik || !$paytr || !$shopier || !$onlineodeme || !$havale){
									echo '<div class="alert alert-warning">Boş bırakma</div>';
								}else{
									if($paytr == 2){
										$paytr = 0;
									}
									if($shopier == 2){
										$shopier = 0;
									}
									if($onlineodeme == 2){
										$onlineodeme = 0;        
									} 
									if($havale == 2){
										$havale = 0;        
									}   
									$payment = [        
										'paytr' => $paytr,
										'shopier' => $shopier,
										'onlineodeme' => $onlineodeme,
										'havale' => $havale
									];
									$guncelle = $vt->guncelle('0', 'ayarlar', 'baslik,title,url,description,keyw,email,iletisim_cep,iletisim_adres,site_facebook,site_twitter,site_instagram,min_odemetutari,payment,analytics,site_kodlari,tarih', 'where id=?', array($baslik,$title,$url,$desc,$keyw,$email,$iletisim_cep,$iletisim_adres,$site_facebook,$site_twitter,$site_instagram,$min_odemetutari,json_encode($payment),$analytics,$site_kodlari,$tarih,1));
									if($guncelle){
										echo '<div class="alert alert-success">Site Ayarları Başarıyla Kaydedildi.</div>';
										echo '<meta http-equiv="refresh" content="2;">';
										die;
									}else{
										echo '<div class="alert alert-success">Zaten aynı veriler kayıtlı.</div>';
									}
								}
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Site Adı</span>
										</div>
										<input type="text" id="text-input" name="baslik" class="form-control" value="<?=$ayar['baslik']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Title</span>
										</div>
										<input type="text" id="text-input" name="title" class="form-control" value="<?=$ayar['title']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Site Linki</span>
										</div>
										<input type="text" id="text-input" name="url" class="form-control" value="<?=$ayar['url']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Site Açıklaması</span>
										</div>
										<input type="text" id="text-input" name="desc" class="form-control" value="<?=$ayar['description']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Site Anahtar Kelimeleri</span>
										</div>
										<input type="text" id="text-input" name="keyw" class="form-control" value="<?=$ayar['keyw']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">İletişim Mail</span>
										</div>
										<input type="text" id="text-input" name="email"class="form-control" value="<?=$ayar['email']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">İletişim Telefon</span>
										</div>
										<input type="text" id="text-input" name="iletisim_cep"class="form-control" value="<?=$ayar['iletisim_cep']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">İletişim Adres</span>
										</div>
										<input type="text" id="text-input" name="iletisim_adres"class="form-control" value="<?=$ayar['iletisim_adres']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Facebook Adresi</span>
										</div>
										<input type="text" id="text-input" name="site_facebook"class="form-control" value="<?=$ayar['site_facebook']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Twitter Adresi</span>
										</div>
										<input type="text" id="text-input" name="site_twitter"class="form-control" value="<?=$ayar['site_twitter']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">İnstagram Adresi</span>
										</div>
										<input type="text" id="text-input" name="site_instagram"class="form-control" value="<?=$ayar['site_instagram']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Analytics Kodu</span>
										</div>
										<textarea name="analytics" rows="3" class="form-control"><?=$ayar['analytics']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Site Kodları</span>
										</div>
										<textarea name="site_kodlari" rows="3" placeholder="Örnek: Whatsapp, Canlı Destek Kodları" class="form-control"><?=$ayar['site_kodlari']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Shopier ile ödeme</span>
										</div>
										<select class="form-control" name="shopier">
											<option>Seçiniz</option>
											<option value="1" <?= ($pbilgi->shopier == 1) ? "selected" : null ?>>Aktif</option>
											<option value="2" <?= ($pbilgi->shopier == 0) ? "selected" : null ?>>Pasif</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">PayTR ile ödeme</span>
										</div>
										<select class="form-control" name="paytr">
											<option>Seçiniz</option>
											<option value="1" <?= ($pbilgi->paytr == 1) ? "selected" : null ?>>Aktif</option>
											<option value="2" <?= ($pbilgi->paytr == 0) ? "selected" : null ?>>Pasif</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Online Ödeme</span>
										</div>
										<select class="form-control" name="onlineodeme">
											<option>Seçiniz</option>
											<option value="1" <?= ($pbilgi->onlineodeme == 1) ? "selected" : null ?>>Aktif</option>
											<option value="2" <?= ($pbilgi->onlineodeme == 0) ? "selected" : null ?>>Pasif</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Havale EFT ile ödeme</span>
										</div>
										<select class="form-control" name="havale">
											<option>Seçiniz</option>
											<option value="1" <?= ($pbilgi->havale == 1) ? "selected" : null ?>>Aktif</option>
											<option value="2" <?= ($pbilgi->havale == 0) ? "selected" : null ?>>Pasif</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Min Ödeme Tutarı</span>
										</div>
										<input type="text" id="text-input" name="min_odemetutari"class="form-control" value="<?=$ayar['min_odemetutari']?>">
									</div>
								</div>
								<input type="submit" name="site_ayari" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
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