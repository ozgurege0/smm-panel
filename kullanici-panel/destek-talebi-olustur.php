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
					<h4 class="page-title mb-2"><i class="mdi mdi-ticket mr-2"></i>Destek Talebi Oluştur</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Destek Talebi Oluştur</li>
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
							<strong>Destek Talebi Oluştur</strong> 
						</div>
						<div class="card-body">
							<?php 
							$message = "GOREVLE";
							if($_POST){
								$konu = $_POST['konu'];
								$baslik = $_POST['baslik'];
								$mesaj = $_POST['mesaj'];
								if(!$konu || !$baslik || !$mesaj){
									$message = 'bos';
								}else{
									if(strlen($baslik) < 8){
										$message = "konukısa";
									}else{
										if($konu == "1" || $konu == "2" || $konu == "3"){
											$ekle = $vt->ekle('destek', 'user_id,konu,baslik,mesaj,onay', array($_SESSION['id'],$konu,$baslik,$mesaj,1));
											if($ekle){
												$message = 'basarili';
											}else{
												$message = 'basarisiz';
											}
										}else{
											$message = 'hata';
										}
									}
								}
							}
							if($message == 'basarili'){
								echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-success">Destek talebiniz alınmıştır. En kısa sürede cevaplanıcaktır.</div>
									</div></div>';
									header('refresh:2;url=destek-talepleri');
							}else if($message == 'basarisiz'){
								echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-danger">HATA.</div>
									</div></div>';
							}else if($message == 'hata'){
								echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-danger">HATA.</div>
									</div></div>';
							}else if($message == 'bos'){
								echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-warning">Lütfen boş bırakmayınız.</div>
									</div></div>';
							}else if($message == 'konukısa'){
								echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-warning">Başlık 8 karakterden kısa olamaz.</div>
									</div></div>';
							}
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Konu</span>
										</div>
                                        <select name="konu" id="select" class="form-control">
                                            <option value="1">Sipariş</option>
											<option value="3">Ödeme</option>
											<option value="2">Diğer</option>
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Başlık</span>
										</div>
										<input type="text"name="baslik" class="form-control" placeholder="Destek başlığını yazınız" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Mesaj</span>
										</div>
										<textarea name="mesaj" id="textarea-input" rows="9" class="form-control" placeholder="Mesajınızı yazınız" required></textarea>
									</div>
								</div>
								<input type="submit" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Mesajı Gönder">
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