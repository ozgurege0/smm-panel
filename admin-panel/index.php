<?php 
session_start();
include "../inc/config.php";
$vt = new db();
if($_SESSION){
    $adminsorgu = $vt->cek('ASSOC', 'uyeler', 'id,onay', 'where id=?', array($_SESSION['id']));
    if($adminsorgu['onay'] == '3'){
        $ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
        $user = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));

?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<base href="<?=$ayar['url']?>/admin-panel/">
	<meta charset="utf-8" />
	<title><?=$ayar['baslik']?> | <?=$ayar['title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?=$ayar['description']?>">
	<meta name="keyword" content="<?=$ayar['keyw']?>">
	<meta name="author" content="<?=$ayar['email']?>">

	<!-- App favicon -->
	<link rel="icon" href="<?=$ayar['favicon']?>">

	<link href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
	<link href="../assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

	<!-- App css -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<?=$ayar['analytics']?>
</head>

<body>
	<!-- Top Bar Start -->
	<div class="topbar">
		 <!-- Navbar -->
		 <nav class="navbar-custom">
			<!-- LOGO -->
			<div class="topbar-left">
				<a href="anasayfa" class="logo">
					<span>
						<img src="<?=$ayar['logo']?>" alt="logo-small" width="120px">
					</span>
				</a>
			</div>
			<ul class="list-unstyled topbar-nav float-right mb-0">
				<li class="dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
						<img src="../assets/images/users/17.jpg" alt="profile-user" class="rounded-circle" /> 
						<span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profil"><i class="dripicons-user text-muted mr-2"></i> Profil</a>
						<a class="dropdown-item" href="settings"><i class="dripicons-wallet text-muted mr-2"></i> Site Ayarları</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout"><i class="dripicons-exit text-muted mr-2"></i> Çıkış Yap</a>
					</div>
				</li>
				<li class="dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" href="logout"><i class="mdi mdi-power"> Çıkış Yap</i></a>
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
	$sayfa = @$_GET["ravertan"];
	switch($sayfa){
		case "metinler";
		include "metinler.php";
		break;
		case "profil";
		include "profil.php";
		break;
		case "smtp";
		include "smtp.php";
		break;
		case "banka-hesaplari";
		include "banka-hesaplari.php";
		break;
		case "uyeler";
		include "uyeler.php";
		break;
		case "uye-duzenle";
		include "uye-duzenle.php";
		break;
		case "uye-ekle";
		include "uye-ekle.php";
		break;
		case "uye-sil";
		include "uye-sil.php";
		break;
		case "servisler";
		include "servisler.php";
		break;
		case "servis-duzenle";
		include "servis-duzenle.php";
		break;
		case "servis-sil";
		include "servis-sil.php";
		break;
		case "servis-ekle";
		include "servis-ekle.php";
		break;
		case "siparisler";
		include "siparisler.php";
		break;
		case "odemeler";
		include "odemeler.php";
		break;
		case "kategori-duzenle";
		include "kategori-duzenle.php";
		break;
		case "kategori-sil";
		include "kategori-sil.php";
		break;
		case "kategori-ekle";
		include "kategori-ekle.php";
		break;
		case "kategoriler";
		include "kategoriler.php";
		break;
		case "bekleyen-destek";
		include "bekleyen-destek.php";
		break;
		case "destek-talepleri";
		include "destek-talepleri.php";
		break;
		case "destek-sil";
		include "destek-sil.php";
		break;
		case "cevap";
		include "cevap.php";
		break;
		case "duyurular";
		include "duyurular.php";
		break;
		case "duyuru-duzenle";
		include "duyuru-duzenle.php";
		break;
		case "duyuru-ekle";
		include "duyuru-ekle.php";
		break;
		case "duyuru-sil";
		include "duyuru-sil.php";
		break;
		case "logout";
		include "logout.php";
		break;
		case "settings";
		include "settings.php";
		break;
		case "logo";
		include "logo.php";
		break;
		case "paytr";
		include "paytr.php";
		break;
		case "shopier";
		include "shopier.php";
		break;
		case "api";
		include "api.php";
		break;
		case "sayfa";
		include "sayfa.php";
		break;
		case "bankahesabi-ekle";
		include "bankahesabi-ekle.php";
		break;
		case "shopier";
		include "shopier.php";
		break;
		case "bankahesabi-duzenle";
		include "bankahesabi-duzenle.php";
		break;
		case "bankahesabi-sil";
		include "bankahesabi-sil.php";
		break;
		case "bakiyeonay";
		include "bakiyeonay.php";
		break;
		case "bakiyeonaylama";
		include "bakiyeonaylama.php";
		break;
		case "iletisim-mesajlari";
		include "iletisim-mesajlari.php";
		break;
		case "iletisim-sil";
		include "iletisim-sil.php";
		break;
		case "siparis-fitrele";
		include "siparis-fitrele.php";
		break;
		case "destek";
		include "destek.php";
		break;
		default;
		include "anasayfa.php";
		break;
	}
	?>
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
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/waves.min.js"></script>
	<script src="../assets/js/jquery.slimscroll.min.js"></script>
	<script src="../assets/pages/jquery.form-upload.init.js"></script>
	<script src="../assets/plugins/dropify/js/dropify.min.js"></script>

	<script src="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	<script src="../assets/plugins/moment/moment.js"></script>
	<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
	<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
	<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
	<script src="../assets/pages/jquery.dashboard.init.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
	<!-- App js -->
	<script src="../assets/js/app.js"></script>

</body>
</html>
<?php        
    }else{
        header('refresh:0;url=giris-yap');
    } }else {header('refresh:0;url=giris-yap');
} ?>