<?php 
include "../inc/config.php";
$vt = new db();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
session_start();
if($_SESSION){
   $user = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<base href="<?=$ayar['url']?>/kullanici-panel">
	<meta charset="utf-8" />
	<title><?=$ayar['baslik']?> | <?=$ayar['title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?=$ayar['description']?>">
	<meta name="keyword" content="<?=$ayar['keyw']?>">
	<meta name="author" content="<?=$ayar['email']?>">

	<!-- App favicon -->
	<link rel="icon" href="<?=$ayar['favicon']?>">

	<link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

	<!-- App css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<?=$ayar['analytics']?>
</head>

<body>
	<!-- Top Bar Start -->
	<div class="topbar">
		 <!-- Navbar -->
		 <nav class="navbar-custom">
			<!-- LOGO -->
			<div class="topbar-left">
				<a href="kullanici-panel/anasayfa" class="logo">
					<span>
						<img src="<?=$ayar['logo']?>" alt="logo-small" width="130px">
					</span>
				</a>
			</div>
			<ul class="list-unstyled topbar-nav float-right mb-0">
				<li class="dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
						<img src="assets/images/users/17.jpg" alt="profile-user" class="rounded-circle" /> 
						<span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<?php 
							$adminsorgu = $vt->cek('ASSOC', 'uyeler', 'id,onay', 'where id=?', array($_SESSION['id']));
							if($adminsorgu['onay'] == '3'){
						?>
						<a class="dropdown-item" href="admin-panel/anasayfa"><i class="mdi mdi-cogs text-muted mr-2"></i> Admin Panel</a>
						<?php } ?>
						<a class="dropdown-item" href="kullanici-panel/account"><i class="dripicons-user text-muted mr-2"></i> Profil</a>
						<a class="dropdown-item" href="kullanici-panel/online-odeme"><i class="dripicons-wallet text-muted mr-2"></i> Bakiye Yükle</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="kullanici-panel/cikis-yap"><i class="dripicons-exit text-muted mr-2"></i> Çıkış Yap</a>
					</div>
				</li>
				<li class="dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" href="kullanici-panel/cikis-yap"><i class="mdi mdi-power"> Çıkış Yap</i></a>
				</li>
				<li class="menu-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle nav-link" id="mobileToggle">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</li>    
			</ul>
		</nav>
		<!-- end navbar-->
	</div>
	<?php 
	$sayfa = @$_GET["g"];
	switch($sayfa){
		case "anasayfa";
		include "anasayfa.php";
		break;
		case "yeni-siparis";
		include "yeni-siparis.php";
		break;
		case "siparis";
		include "siparis.php";
		break;
		case "siparislerim";
		include "siparislerim.php";
		break;
		case "online-odeme";
		include "online-odeme.php";
		break;
		case "banka-hesaplari";
		include "banka-hesaplari.php";
		break;
		case "odeme-talepleri";
		include "odeme-talepleri.php";
		break;
		case "destek-talebi-olustur";
		include "destek-talebi-olustur.php";
		break;
		case "destek-talepleri";
		include "destek-talepleri.php";
		break;
		case "cevap";
		include "cevap.php";
		break;
		case "account";
		include "account.php";
		break;
		case "bakiye_yuklendi";
		include "bakiye_yuklendi.php";
		break;
		case "bakiye_hata";
		include "bakiye_hata.php";
		break;
		case "servis-listesi";
		include "servis-listesi.php";
		break;
		case "kullanim-sozlesmesi";
		include "kullanim-sozlesmesi.php";
		break;
		case "sss";
		include "sss.php";
		break;
		case "duyurular";
		include "duyurular.php";
		break;
		case "cikis-yap";
		include "cikis-yap.php";
		break;
		default;
		include "anasayfa.php";
		break;
	}
	?>
	<?=$ayar['site_kodlari']?>
	<div class='preloader w-100 h-100 position-fixed bg-white d-flex align-items-center justify-content-center' style='z-index:1000;right:0;top:0;left:0;bottom:0;'>
		<div class="spinner-border text-purple" style="width:3.0rem;height:3.0rem;border-width:5px"></div>
	</div>
	<script>
	document.addEventListener('DOMContentLoaded', () => {
		$('.preloader').fadeOut(750, () => {$('.preloader').remove();});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#ravertan-input").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$(".ravertan-arama tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	$('.services-list-filter').click(function(){

		var dataFilter=$(this).data("services-filter");
		  console.log(dataFilter);
			var value = dataFilter;
			$(".ravertan-arama tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
	   });
	</script>
	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/waves.min.js"></script>
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	<script src="assets/plugins/moment/moment.js"></script>
	<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
	<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
	<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
	<script src="assets/pages/jquery.dashboard.init.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="kullanici-panel/js/jquery.emojiarea.js"></script>
    <script src="kullanici-panel/js/emoji-picker.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/servislistesi.js"></script>

</body>
</html>
<?php }else{header('refresh:0;url=../');} ?>