<?php
$ayar2 = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
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
					<h4 class="page-title mb-2"><i class="mdi mdi-image"></i> Logo ve Favicon Ayarları</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Logo ve Favicon Ayarları</li>
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
							<strong>Logo ve Favicon Ayarları</strong> 
						</div>
						<div class="card-body">
							<?php
							$ayar = $vt->cek('ASSOC', 'ayarlar', 'url,logo,favicon', '', array());
								$guncelle = @$_POST['guncelle'];
								$message = "GOREVLE";
								if($guncelle){
									if($_FILES["logod"]["type"]){
										$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
										$str = str_shuffle($str);
										$str = substr($str, 0, 10);
										$yeniad = $str;
										$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
										$str = str_shuffle($str);
										$str = substr($str, 0, 10);
										$yeniad2 = $str;
										$boyut       = 700000;
										$dosyaUzantisi  = substr($_FILES["logod"]["name"],-4,4);
										$dosyaAdi       = $yeniad.'.'.$dosyaUzantisi;
										$dosyaYolu      = "../assets/logo_ve_favicon/".$dosyaAdi;
										$dosyaYolu3     = "assets/logo_ve_favicon/".$dosyaAdi;
										
										if($_FILES["logod"]["size"] > $boyut){
											$message = "boyut";
										}else{
											$tipi = $_FILES["logod"]["type"];
											if($tipi == "image/ico" || $tipi == "image/png"){
												if(is_uploaded_file($_FILES["logod"]["tmp_name"])){
													$yukle = move_uploaded_file($_FILES["logod"]["tmp_name"], $dosyaYolu);
													if($yukle){
														
														$dosyaYolu2 = $ayar['url'].'/'.$dosyaYolu3;
														$onay = '0';
														$guncelle = $vt->guncelle('0', 'ayarlar', 'logo', 'where id=?', array($dosyaYolu2,1));
														if($guncelle){
															$message = "basarili";
														}else{
															$message = "basarisiz";
														}
													}else{
														$message = "hata";
													}
												}else{
													$message = "yuklemehatasi";
												}
											}else{
												$message = "uzanti";
											}
										}
									}
									if($_FILES["favd"]["type"]){
										$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
										$str = str_shuffle($str);
										$str = substr($str, 0, 10);
										$yeniad2 = $str;
										$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
										$str = str_shuffle($str);
										$str = substr($str, 0, 10);
										$yeniad2 = $str;
										$boyut       = 700000;
										$dosyaUzantisi6  = substr($_FILES["favd"]["name"],-4,4);
										$dosyaAdi6       = $yeniad2.'.'.$dosyaUzantisi6;
										$dosyaYolu6      = "../assets/logo_ve_favicon/".$dosyaAdi6;
										$dosyaYolu7     = "assets/logo_ve_favicon/".$dosyaAdi6;
										if($_FILES["favd"]["size"] > $boyut){
											$message = "boyut";
										}else{
											$tipi = $_FILES["favd"]["type"];
											if($tipi == "image/ico" || $tipi == "image/png"){
												if(is_uploaded_file($_FILES["favd"]["tmp_name"])){
													$yukle2 = move_uploaded_file($_FILES["favd"]["tmp_name"], $dosyaYolu6);
													if($yukle2){
														$dosyaYolu8 = $ayar['url'].'/'.$dosyaYolu7;
														$onay = '0';
														$guncelle = $vt->guncelle('0', 'ayarlar', 'favicon', 'where id=?', array($dosyaYolu8,1));
														if($guncelle){
															$message = "basarili";
														}else{
															$message = "basarisiz";
														}
													}else{
														$message = "hata";
													}
												}else{
													$message = "yuklemehatasi";
												}
											}else{
												$message = "uzanti";
											}
										}
									}
							}
							if($message == 'basarili'){
								echo '<div class="form-group">
										<div class="alert alert-success">Güncelleme işlemi başarılı. Yönlendiriliyorsunuz.</div>
									</div>';
									header('refresh:4;url=');
							}else if($message == 'hata'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Güncelleme işlemi hatalı.</div>
									</div>';
							}else if($message == 'bos'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Lütfen boş bırakmayınız.</div>
									</div>';
							}else if($message == 'uzanti'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Sadece png uzantılı resim yükleyebilirsiniz.</div>
									</div>';
							}else if($message == 'yuklemehatasi'){
								echo '<div class="form-group">
										<div class="alert alert-danger">Değişiklik yapmadınız.</div>
									</div>';
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şuanki Logo</span>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="<?=$ayar['logo']?>" style="width:100px"/>
									</div>
									<div style="padding-top: 15px;"></div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Logo Değiştir</span>
										</div>
									   <input class="form-control" type="file" name="logod" />
									</div>
									<div style="padding-top: 15px;"></div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şuanki Favicon</span>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="<?=$ayar['favicon']?>" style="width:20px"/>
									</div>
									<div style="padding-top: 15px;"></div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Favicon Değiştir</span>
										</div>
									   <input class="form-control" type="file" name="favd" />
									</div>
								</div>
								<input type="submit" name="guncelle" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
							</form>
						</div>
					</div>    
				</div>
			</div>
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2022 <?=$ayar2['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
