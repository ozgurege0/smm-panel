<?php 
$cevapid = $_GET['id'];
$cevap = $vt->cek('ASSOC', 'destek', '*', 'where id=? and user_id=?', array($cevapid,$_SESSION['id']));
$uye = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
if($cevap){
    $destek = $vt->cek('ASSOC', 'destek', '*', 'where id=?', array($cevap['id']));
    if($destek['konu'] == 1){
        $konu = 'Sipariş';
    }else if($destek['konu'] == 0){
        $konu = 'Diğer';
    }
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
					<h4 class="page-title mb-2"><i class="mdi mdi-ticket mr-2"></i>Destek Talebi</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Destek Talebi</li>
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
							<strong>Başlık: <?=$destek['baslik']?></strong>
						</div>
						<div class="card-body">
							<div class="alert alert-outline-success alert-success-shadow mb-0 alert-dismissible fade show" role="alert">
								<p><?=nl2br($destek['mesaj'])?></p>
								<hr>
								<p><b>Konu : </b><?=$konu?></p>
								<p><b>Tarih : </b><?=$destek['tarih']?></p>
							</div>
							<div style="padding-top: 20px;"></div>
							<?php 
								$cevaplar = $vt->cek("OBJ_ALL", "destek_cevap", "*", "where destek_id=? and destek_uye_id=? ORDER BY tarih ASC", array($destek['id'],1));
								if($cevaplar){
									foreach ($cevaplar as $row) {
										if($row->cevaplayan == "admin"){
											$renk = "purple";
										}else{
											$renk = "success";
										}
							?>
							<div class="alert alert-outline-<?=$renk?> mb-0" role="alert">
								<p><?=nl2br($row->cevap)?></p>
								<hr>
								<p><b>Cevaplayan : </b><?=$row->cevaplayan?></p>
								<p><b>Tarih : </b><?=$row->tarih?></p>
							</div>
							<div style="padding-top: 20px;"></div>
							<?php }} ?>
							<?php 
							$user = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
							$message = "GOREVLEGELSİN";
							
							if($_POST){
								$mesaj = $_POST['mesaj'];
								if(!$mesaj){
									echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-warning">Boş bırakmayınız.</div>
									</div></div>';
									header('refresh:1;url=');
								}else{
									$ekle = $vt->ekle('destek_cevap', 'destek_id,destek_uye_id,cevaplayan,cevap', array($destek['id'], 1, $user['username'], $mesaj));
									if($ekle){
										echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-success">Destek talebinize cevap yazdınız. En kısa sürede cevaplanıcaktır.</div>
									</div></div>';
										header('refresh:1;url=');
										$guncel = $vt->guncelle('0', 'destek', 'onay', 'where id=?', array(1,$destek['id']));
									}else{
										echo '<div class="col-lg-12"><div class="form-group">
										<div class="alert alert-danger">HATA.</div>
									</div></div>';
									header('refresh:1;url=');
									}
								}
							}
							
							?>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Mesaj</span>
										</div>
										<textarea name="mesaj" id="textarea-input" rows="5" class="form-control" placeholder="Mesajınızı yazınız"></textarea>
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
<?php }else{echo '<div class="content">
            <div class="animated fadeIn">
                <div class="row"><div class="col-md-12"><div class="form-group">
                            <div class="alert alert-warning">Yanlış yer!</div>
                        </div></div></div><!-- .row -->
                        </div><!-- .animated -->
                    </div>'; header('refresh:2;url=../destek-taleplerim');}?>