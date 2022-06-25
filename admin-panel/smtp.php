<?php
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$sbilgi = json_decode($ayar['sifre_mail']);
$mbilgi = json_decode($ayar['mailbilgi']);
$seposta = $sbilgi->eposta;
$ssifre = $sbilgi->sifre;
$shost = $mbilgi->host;
$sport = $mbilgi->port;
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
					<h4 class="page-title mb-2"><i class="dripicons-mail"></i> SMTP Ayarı</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">SMTP Ayarı</li>
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
							<strong>SMTP Ayarı</strong> 
						</div>
						<div class="card-body">
							<?php
							$email = @$_POST['email'];
							if($email){
								$smail = @$_POST['smail'];
								$ssifre = @$_POST['ssifre'];
								$host = @$_POST['shost'];
								$port = @$_POST['sport'];
								$tarih = date('d.m.Y H:i:s');
								if(!$smail || !$ssifre || !$host || !$port){
									echo '<div class="alert alert-warning">Boş bırakma</div>';
									echo '<meta http-equiv="refresh" content="2;">';
								}else{
									$sifre = array(
										'eposta' => $smail,
										'sifre' => $ssifre
										);
									$mailbilgi = array(
										'host' => $host,
										'port' => $port
										);
									$guncelle = $vt->guncelle('0', 'ayarlar', 'sifre_mail,mailbilgi,tarih', '', array(json_yap($sifre),json_yap($mailbilgi),$tarih));
									if($guncelle){
										 echo '<meta http-equiv="refresh" content="2;">';
										echo '<div class="alert alert-success">SMTP Ayarları Başarıyla kaydedildi.</div>';
									}else{
										echo '<div class="alert alert-success">Zaten aynı veriler kayıtlı.</div>';
										echo '<meta http-equiv="refresh" content="2;">';
									}
								}
							}
							?>
							<form method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Mail</span>
										</div>
										<input type="text" id="text-input" name="smail" class="form-control" value="<?=$seposta?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Şifre</span>
										</div>
										<input type="text" id="text-input" name="ssifre" class="form-control" value="<?=$ssifre?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Host</span>
										</div>
										<input type="text" id="text-input" name="shost" class="form-control" value="<?=$shost?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Port</span>
										</div>
										<input type="text" id="text-input" name="sport" class="form-control" value="<?=$sport?>">
									</div>
								</div>
								<input type="submit" name="email" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
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