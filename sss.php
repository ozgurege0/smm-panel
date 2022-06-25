<?php 
include "inc/config.php";
$vt = new db();
session_start();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
if($_SESSION){
   header('refresh:0;url='.$ayar['url'].'/kullanici-panel/sss');
}else{
$siparis = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "", array());
$uye = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "", array());
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noarchive">
    <title><?=$ayar['baslik']?> | <?=$ayar['title']?></title>
    <!-- favicon -->
    <link rel="shortcut icon" href="<?=$ayar['favicon']?>" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- icofont -->
    <link rel="stylesheet" href="assets/css/fontawesome.5.7.2.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style2.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext">
    <link href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="linearicons.css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<?=$ayar['analytics']?>
</head>

<body>
    
    <nav class="navbar navbar-area navbar-expand-lg nav-absolute white nav-style-01">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="/" class="logo">
                        <img src="<?=$ayar['logo']?>" width="200px" alt="logo">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appside_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="appside_main_menu">
                <ul class="navbar-nav">
                    <li><a href="/">Ana Sayfa</a></li>
					<li><a href="servis-listesi">Servis Listesi</a></li>
                    <li><a href="kullanim-sozlesmesi">Kullanım Koşulları</a></li>
                    <li class="button-wrapper">
						 <a href="giris-yap">Giriş Yap</a>
                    </li>
                    <li class="button-wrapper">
                        <a href="kayit-ol" class="boxed-btn btn-rounded">Kayıt Ol</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<!-- breadcrumb area start -->
<div class="breadcrumb-area breadcrumb-bg extra">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Sık Sorulan Sorular</h1>
                    <ul class="page-navigation">
                        <li><a href="/"> Ana Sayfa</a></li>
                        <li>Sık Sorulan Sorular</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<div class="page-content-area padding-top-50 padding-bottom-50 dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="single-post-details-item dark-bg"><!-- blog single content -->
					<div class="entry-content">
						<p><?=nl2br($ayar['sss'])?></p>
					</div>
				</div> 
            </div>
        </div>
    </div>
</div>
 
<!-- footer area start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget about_widget">
                        <a href="/" class="footer-logo"><img width="200px" src="<?=$ayar['logo']?>" alt="logo"></a>
                        <p>Sosyal Medyada Yükselmenin Tadını Çıkarın!</p>
                        <ul class="social-icon">
                            <li><a href="<?=$ayar['site_facebook']?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?=$ayar['site_twitter']?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?=$ayar['site_instagram']?>"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">Linkler</h4>
                        <ul>
                            <li><a href="/"><i class="fas fa-chevron-right"></i> Ana Sayfa</a></li>
                            <li><a href="giris-yap"><i class="fas fa-chevron-right"></i> Giriş Yap</a></li>
                            <li><a href="kayit-ol"><i class="fas fa-chevron-right"></i> Kayıt Ol</a></li>
                            <li><a href="sifreunuttum"><i class="fas fa-chevron-right"></i> Şifremi Unuttum</a></li>
                            <li><a href="servis-listesi"><i class="fas fa-chevron-right"></i> Servisler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">Yardım</h4>
                        <ul>
                            <li><a href="kullanim-sozlesmesi"><i class="fas fa-chevron-right"></i> Kullanım Sözleşmesi</a></li>
                            <li><a href="sss"><i class="fas fa-chevron-right"></i> Sık Sorulan Sorular</a></li>
                            <li><a href="kullanici-panel/destek-talebi-olustur"><i class="fas fa-chevron-right"></i> Destek Talebi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">İletişim</h4>
                        <ul>
                            <li><a href="mailto:<?=$ayar['email']?>"><i class="ti-email"></i> <?=$ayar['email']?></a></li>
                            <li><a href="tel:<?=$ayar['iletisim_cep']?>"><i class="ti-mobile"></i> <?=$ayar['iletisim_cep']?></a></li>
                            <li><a href="javascript:void(0);"><i class="ti-location-arrow"></i> <?=$ayar['iletisim_adres']?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area"><!-- copyright area -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-inner"><!-- copyright inner wrapper -->
                        <div class="left-content-area"><!-- left content area -->
                            &copy; Copyrights 2022 <?=$ayar['baslik']?> Tüm haklar saklıdır.
                        </div><!-- //. left content aera -->
                        <div class="right-content-area"><!-- right content area -->
                            Designed by <i class="ti-heart"></i> <strong> Ozgur_Medya</strong>
                        </div><!-- //. right content area -->
                    </div><!-- //.copyright inner wrapper -->
                </div>
            </div>
        </div>
    </div><!-- //. copyright area -->
</footer>
<!-- footer area end -->
<?=$ayar['site_kodlari']?>

	<div class='preloader w-100 h-100 position-fixed bg-white d-flex align-items-center justify-content-center' style='z-index:1000;right:0;top:0;left:0;bottom:0;'>
		<div class="spinner-border text-purple" style="width:3.0rem;height:3.0rem;border-width:5px"></div>
	</div>
	<script>
	document.addEventListener('DOMContentLoaded', () => {
		$('.preloader').fadeOut(750, () => {$('.preloader').remove();});
	});
	</script>

  <!-- back to top area start -->
  <div class="back-to-top">
        <i class="fas fa-angle-up"></i>
  </div>
  <!-- back to top area end -->

    <!-- jquery -->
    <script src="assets/js/jquery.js"></script>
    <!-- popper -->
    <script src="assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- contact js-->
    <script src="assets/js/contact.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <!-- way points js-->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- counterup js-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- main -->
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>
