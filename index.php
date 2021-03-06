<?php 
include "inc/config.php";
$vt = new db();
session_start();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
if($_SESSION){
   header('refresh:0;url='.$ayar['url'].'/kullanici-panel/anasayfa');
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
                    <li class="current-menu-item"><a href="/">Ana Sayfa</a></li>
					<li><a href="servis-listesi">Servis Listesi</a></li>
                    <li><a href="kullanim-sozlesmesi">Kullan??m Ko??ullar??</a></li>
                    <li class="button-wrapper">
						 <a href="giris-yap">Giri?? Yap</a>
                    </li>
                    <li class="button-wrapper">
                        <a href="kayit-ol" class="boxed-btn btn-rounded">Kay??t Ol</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

    <!-- header area start  -->
    <header class="header-area header-bg dark-home-1">
        <div class="shape-1"><img src="assets/img/shape/01.png" alt=""></div>
        <div class="shape-2"><img src="assets/img/shape/02.png" alt=""></div>
        <div class="shape-3"><img src="assets/img/shape/03.png" alt=""></div>
        <div class="header-right-image">
            <img src="assets/img/mobile-image-4.png" alt="header right image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-inner">
                        <h4 style="color:white;">Sosyal Medya???da y??kselmek mi istiyorsun?</h4>
                        <p>T??rkiye???nin en geli??mi?? Sosyal Medya Paneli ile Tan??????n. </p>
						<p>7/24 Deste??i ve G??venilir altyap??s?? ile her an hizmetinizde.</p>
						<p>??stelik pek ??ok serviste piyasadaki en ucuz smm panel sitesiyiz !</p>
                        <div class="btn-wrapper wow fadeInUp">
                            <a href="giris-yap" class="boxed-btn btn-rounded">Giri?? Yap</a>
                            <a href="kayit-ol" class="boxed-btn btn-rounded blank">Kay??t Ol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end  -->

<!-- why choose area start -->
<section class="video-area dark-bg white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title white"><!-- section title -->
                    <span class="subtitle">Nas??l ??al??????r?</span>
                    <p>Alt b??l??mden inceleyebilirsiniz.</p>
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="single-why-us-item white margin-top-60 fadeInUp wow"><!-- single why us item -->
                    <div class="content">
                        <h4 class="title">??cretsiz Kay??t Olun</h4>
                        <p>??cretsiz kay??t olun ve giri?? yap??n.</p>
                    </div>
                </div><!-- //. single why us item -->
                <div class="single-why-us-item white fadeInUp wow"><!-- single why us item -->
                    <div class="content">
                        <h4 class="title">Bakiye Y??kleyin</h4>
                        <p>Tamamen g??venli bir ??ekilde bakiye y??kleyin.</p>
                    </div>
                </div><!-- //. single why us item -->
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="single-why-us-item white margin-top-60 fadeInUp wow"><!-- single why us item -->
                    <div class="content">
                        <h4 class="title">Sipari??inizi Olu??turun</h4>
                        <p>Sipari?? k??sm??ndan sipari??inizi olu??turun.</p>
                    </div>
                </div><!-- //. single why us item -->
                <div class="single-why-us-item white fadeInUp wow"><!-- single why us item -->
                    <div class="content">
                        <h4 class="title">Keyfinize Bak??n!</h4>
                        <p>Sipari?? sonras?? arkan??za yaslan??n.</p>
                    </div>
                </div><!-- //. single why us item -->
            </div>
        </div>
    </div>
</section>
<!-- why choose area end -->

<!-- video area start -->
<section class="video-area dark-bg white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-with-video">
                    <div class="img-wrap">
                        <img src="assets/img/graphic2.png" alt="resim">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content-area ">
                    <span class="subtitle">Y??KSELMEYE HAZIRLANIN</span>
                    <p>Y??zlerce servisiyle Instagram, Twitter, Facebook, Youtube ba??ta olmak ??zere bir ??ok alanda hizmet vermektedir. Sizin i??in y??llard??r olan tecr??belerimiz ile en ucuz sosyal medya hizmeti sunuyoruz. </p>
                    <p>Hizmetler adeta doping etkisi yaratarak sizleri fenomen olma yolunda yukar??lara ta????yacakt??r. Sunmu?? oldu??umuz servisler gayet uygun fiyatl?? olmakla birlikte en kaliteli ??ekilde sizlere hizmet sunmaktay??z.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- video area end -->

<!-- counterup area start -->
<section class="counterup-area dark-bg">
    <div class="container">
        <div class="row">
			<?php
			$uyelericek = $vt->cek("KAYITSAY", "uyeler", "COUNT(*) id", "", array());
			$siparislericek = $vt->cek("KAYITSAY", "orders", "COUNT(*) id", "", array());
			$servislericek = $vt->cek("KAYITSAY", "servisler", "COUNT(*) id", "", array());
			$destekcek = $vt->cek("KAYITSAY", "destek", "COUNT(*) id", "", array());
			?>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter-item white"><!-- single counter item -->
                    <div class="icon">
                        <i class="dripicons-user-group"></i>
                    </div>
                    <div class="content">
                        <span class="count-num"><?=$uyelericek;?></span>
                        <h4 class="title">Toplam ??ye</h4>
                    </div>
                </div><!-- //. single counter item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter-item white"><!-- single counter item -->
                    <div class="icon">
                        <i class="dripicons-shopping-bag"></i>
                    </div>
                    <div class="content">
                        <span class="count-num"><?=$siparislericek;?></span>
                        <h4 class="title">Toplam Sipari??</h4>
                    </div>
                </div><!-- //. single counter item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter-item white"><!-- single counter item -->
                    <div class="icon">
                        <i class="dripicons-document"></i>
                    </div>
                    <div class="content">
                        <span class="count-num"><?=$servislericek;?></span>
                        <h4 class="title">Toplam Servis</h4>
                    </div>
                </div><!-- //. single counter item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-counter-item white"><!-- single counter item -->
                    <div class="icon">
                        <i class="dripicons-ticket"></i>
                    </div>
                    <div class="content">
                        <span class="count-num"><?=$destekcek;?></span>
                        <h4 class="title">Toplam Destek</h4>
                    </div>
                </div><!-- //. single counter item -->
            </div>
        </div>
    </div>
</section>
<!-- counterup area end -->

<!-- team member area start -->
<section class="team-member-area dark-bg" id="team">
    <div class="bg-shape-1">
        <img src="assets/img/bg/team-shape-dark.png" alt="">
    </div>
    <div class="bg-shape-2">
        <img src="assets/img/bg/contact-map-bg-dark.png" alt="">
    </div>
    <div class="bg-shape-3 fadeInLeft wow">
        <img src="assets/img/contact-mobile-bg.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-area-wrapper white" id="contact"><!-- contact area wrapper -->
                    <span class="subtitle">??leti??im</span>
                    <p>Bu b??l??mden bize mesaj g??nderebilirsiniz.</p>
                    <form method="post" enctype="multipart/form-data" class="contact-form sec-margin">
						<?php
						$message = 'GOREVLEGELS??N';
								if($_POST){
									$adsoyad = $_POST['adsoyad'];
									$mailadresi = $_POST['mailadresi'];
									$mesaj = $_POST['mesaj'];
									if(!$adsoyad || !$mailadresi || !$mesaj){
									$message = 'bos';
									}else{
										if(strlen($mesaj) < 8){
											$message = "konuk??sa";
											}else{
											$ekle = $vt->ekle('iletisim_formu', 'adsoyad,mailadresi,mesaj', array($adsoyad,$mailadresi,$mesaj));
											if($ekle){
												$message = 'basarili';
											}else{
												$message = 'basarisiz';
											}
										}
									}
								}
								if($message == 'basarili'){
									echo '<div class="form-group">
											<div class="alert alert-success">Mesajn??z G??nderilmi??tir. En k??sa s??rede cevaplan??cakt??r..</div>
										</div>';
										header('refresh:14;url=/');
								}else if($message == 'basarisiz'){
									echo '<div class="form-group">
											<div class="alert alert-danger">Mesaj G??nderilemedi</div>
										</div>';
								}else if($message == 'bos'){
									echo '<div class="form-group">
											<div class="alert alert-warning">Bo?? b??rakmay??n??z.</div>
										</div>';
								}else if($message == 'konuk??sa'){
									echo '<div class="col-lg-12"><div class="form-group">
											<div class="alert alert-warning">Mesaj 8 karakterden k??sa olamaz.</div>
										</div></div>';
								}
						?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad??n??z">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="mailadresi" class="form-control" placeholder="Mail Adresiniz">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group textarea">
                                    <textarea name="mesaj" class="form-control" cols="30" rows="10" placeholder="Mesaj??n??z"></textarea>
                                </div>
                                <button class="submit-btn  btn-rounded gd-bg-1" type="submit">Mesaj?? G??nder</button>
                            </div>
                        </div>
                    </form>
                </div><!-- //. contact area wrapper -->
            </div>
        </div>
    </div>
</section>
<!-- team member area end -->
<!-- footer area start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget about_widget">
                        <a href="/" class="footer-logo"><img width="200px" src="<?=$ayar['logo']?>" alt="logo"></a>
                        <p>Sosyal Medyada Y??kselmenin Tad??n?? ????kar??n!</p>
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
                            <li><a href="giris-yap"><i class="fas fa-chevron-right"></i> Giri?? Yap</a></li>
                            <li><a href="kayit-ol"><i class="fas fa-chevron-right"></i> Kay??t Ol</a></li>
                            <li><a href="sifreunuttum"><i class="fas fa-chevron-right"></i> ??ifremi Unuttum</a></li>
                            <li><a href="servis-listesi"><i class="fas fa-chevron-right"></i> Servisler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">Yard??m</h4>
                        <ul>
                            <li><a href="kullanim-sozlesmesi"><i class="fas fa-chevron-right"></i> Kullan??m S??zle??mesi</a></li>
                            <li><a href="sss"><i class="fas fa-chevron-right"></i> S??k Sorulan Sorular</a></li>
                            <li><a href="kullanici-panel/destek-talebi-olustur"><i class="fas fa-chevron-right"></i> Destek Talebi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget nav_menus_widget">
                        <h4 class="widget-title">??leti??im</h4>
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
                            &copy; Copyrights 2022 <?=$ayar['baslik']?> T??m haklar sakl??d??r.
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

	<!-- End Log In page -->
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
