<?php 
include "inc/config.php";
$vt = new db();
session_start();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
if($_SESSION){
   header('refresh:0;url='.$ayar['url'].'/kullanici-panel/servis-listesi');
}else{
$text = json_decode(@$ayar['text_areas'], true);
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
    <!-- icon -->
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
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
	<?=$ayar['analytics']?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
					<li class="current-menu-item"><a href="servis-listesi">Servis Listesi</a></li>
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
                    <h1 class="page-title">Servis Listesi</h1>
                    <ul class="page-navigation">
                        <li><a href="/"> Ana Sayfa</a></li>
                        <li>Servis Listesi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->
<div class="page-content-area padding-top-30 padding-bottom-30 dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="services-list">
					<ul>
						<li class="services-list-filter instagram" data-services-filter="instagram">
							<i class="fab fa-instagram"></i>
						</li>
						<li class="services-list-filter facebook" data-services-filter="facebook">
							<i class="fab fa-facebook-square"></i>
						</li>
						<li class="services-list-filter twitter" data-services-filter="twitter">
							<i class="fab fa-twitter"></i>
						</li>
						<li class="services-list-filter youtube" data-services-filter="youtube">
							<i class="fab fa-youtube"></i>
						</li>
						<li class="services-list-filter tiktok" data-services-filter="tiktok">
							<i class="fa fa-music"></i>
						</li>
						<li class="services-list-filter spotify" data-services-filter="spotify">
							<i class="fab fa-spotify"></i>
						</li>
						<li class="services-list-filter twitch" data-services-filter="twitch">
							<i class="fab fa-twitch"></i>
						</li>
						<li class="services-list-filter telegram" data-services-filter="telegram">
							<i class="fab fa-telegram-plane"></i>
						</li>
						<li class="services-list-filter soundcloud" data-services-filter="soundcloud">
							<i class="fab fa-soundcloud"></i>
						</li>
						<li class="services-list-filter discord" data-services-filter="discord">
							<i class="fab fa-discord"></i>
						</li>                                          
					</ul>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<input type="text" class="form-control" id="serv-inp" placeholder="Aradığınız servisi yazın..">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-content-area dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="single-post-details-item dark-bg"><!-- blog single content -->
					<div class="entry-content">
						<div class="card-body" style="overflow: auto;">
							<table class="table table-bordered table-striped table-hover km-mtable">
								<thead>
									<tr>
										<th style="color:white;">Servis Kodu</th>
										<th style="color:white;">Servis Adı</th>
										<th style="color:white;">1000 Adet Ücreti</th>
										<th style="color:white;">Minimum Sipariş</th>
										<th style="color:white;">Maximum Sipariş</th>
										<th style="color:white;">Açıklama</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$kategoriler = $vt->cek("OBJ_ALL", "kategoriler", "id,baslik", "where onay=?", array(0));
									foreach($kategoriler as $row){
									echo '<tr><td class="catName " colspan="6"><div style="color:red;">
									<center>'.$row->baslik.'</center>
									</div></td></tr>';
									$cek = $vt->cek('OBJ_ALL', 'servisler', '*', 'where category=? and onay=?', array($row->id,0));
									foreach($cek as $row2){
									$duzenle = $row2->name;
									$eski = '?';
									$yeni = '🔥';
									$name = str_replace($eski, $yeni, $duzenle);
									echo '
									<tr class="text-left" style="font-size:15px;">
										<td style="color:white;">'.$row2->service.'</td>
										<td class="pm-ikon" style="color:white;">'.$name.'</td>
										<td style="text-align:center;color:white;">'.$row2->rate.'₺</td>
										<td style="text-align:center;color:white;">'.$row2->min.'</td>
										<td style="text-align:center;color:white;">'.$row2->max.'</td>
										<td style="text-align:center;color:white;"><a type="button" data-target="#servis'.$row2->id.'" class="modal-effect btn btn-secondary btn-sm" data-toggle="modal" data-effect="effect-scale">Açıklama</a></td>
									</tr>					
									<!-- Modal -->
									<div class="modal fade" id="servis'.$row2->id.'">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<b class="pm-ikon">'.$name.'</b>
												</div>
												<div class="modal-body">
													'.nl2br($row2->aciklama).' 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-dark btn-block" data-dismiss="modal">Kapat</button>
												</div>
											</div>
										</div>
									</div> 
									';
									}
									}
									?>
								</tbody>
							</table>
						</div>
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
                        <a href="/" class="footer-logo"><img src="<?=$ayar['logo']?>" alt="logo"></a>
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
                            &copy; Copyrights 2021 <?=$ayar['baslik']?> Tüm haklar saklıdır.
                        </div><!-- //. left content aera -->
                        <div class="right-content-area"><!-- right content area -->
                            Designed by <i class="ti-heart"></i> <strong> Ravertan</strong>
                        </div><!-- //. right content area -->
                    </div><!-- //.copyright inner wrapper -->
                </div>
            </div>
        </div>
    </div><!-- //. copyright area -->
</footer>
<!-- footer area end -->
<?=$ayar['site_kodlari']?>
<script>
function ikon(opt) {
	var ikon = "";
	if (opt.indexOf("Instagram") >= 0) {
		ikon = "<span class=\"fs-ig\"><i class=\"fab fa-instagram\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("YouTube") >= 0) {
		ikon = "<span class=\"fs-yt\"><i class=\"fab fa-youtube\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Facebook") >= 0) {
		ikon = "<span class=\"fs-fb\"><i class=\"fab fa-facebook-square\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Youtube") >= 0) {
		ikon = "<span class=\"fs-yt\"><i class=\"fab fa-youtube\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Twitter") >= 0) {
		ikon = "<span class=\"fs-tw\"><i class=\"fab fa-twitter\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Google") >= 0) {
		ikon = "<span class=\"fs-gp\"><i class=\"fab fa-google-plus\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Swarm") >= 0) {
		ikon = "<span class=\"fs-fsq\"><i class=\"fab fa-forumbee\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Dailymotion") >= 0) {
		ikon = "<span class=\"fs-dm\"><i class=\"fab fa-hospital-o\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Periscope") >= 0) {
		ikon = "<span class=\"fs-pc\"><i class=\"fab fa-map-marker\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Soundcloud") >= 0) {
		ikon = "<span class=\"fs-sc\"><i class=\"fab fa-soundcloud\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Vine") >= 0) {
		ikon = "<span class=\"fs-vn\"><i class=\"fab fa-vine\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Spotify") >= 0) {
		ikon = "<span class=\"fs-sp\"><i class=\"fab fa-spotify\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Snapchat") >= 0) {
		ikon = "<span class=\"fs-snap\"><i class=\"fab fa-snapchat-square\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Pinterest") >= 0) {
		ikon = "<span class=\"fs-pt\"><i class=\"fab fa-pinterest-p\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("iTunes") >= 0) {
		ikon = "<span class=\"fs-apple\"><i class=\"fab fa-apple\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Müzik") >= 0) {
		ikon = "<span class=\"fs-music\"><i class=\"fab fa-music\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Vimeo") >= 0) {
		ikon = "<span class=\"fs-videmo\"><i class=\"fab fa-vimeo\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Ekşi") >= 0) {
		ikon = "<span class=\"fs-eksi\"><i class=\"fab fa-tint\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Telegram") >= 0) {
		ikon = "<span class=\"fs-telegram\"><i class=\"fab fa-telegram\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Twitch") >= 0) {
		ikon = "<span class=\"fs-twc\"><i class=\"fab fa-twitch\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Zomato") >= 0) {
		ikon = "<span class=\"fs-zom\"><i class=\"fab fa-cutlery\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Amazon") >= 0) {
		ikon = "<span class=\"fs-amaz\"><i class=\"fab fa-amazon\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Tumblr") >= 0) {
		ikon = "<span class=\"fs-tumb\"><i class=\"fab fa-tumblr-square\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Yandex") >= 0) {
		ikon = "<span class=\"fs-yndx\"><i class=\"fab fa-yoast\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Linkedin") >= 0) {
		ikon = "<span class=\"fs-lnk\"><i class=\"fab fa-linkedin\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("Yahoo") >= 0) {
		ikon = "<span class=\"fs-yahoo\"><i class=\"fab fa-yahoo\" aria-hidden=\"true\"></i> </span>";
	} else if (opt.indexOf("TikTok") >= 0) {
		ikon = "<span class=\"fs-music\"><i class=\"fa fa-music\"></i> </span>";
	} else if (opt.indexOf("tiktok") >= 0) {
		ikon = "<span class=\"fs-music\"><i class=\"fa fa-music\"></i> </span>";
	} else if (opt.indexOf("Discord") >= 0) {
		ikon = "<span class=\"fs-discord\"><i class=\"fab fa-discord\"></i> </span>";
	} else if (opt.indexOf("discord") >= 0) {
		ikon = "<span class=\"fs-discord\"><i class=\"fab fa-discord\"></i> </span>";
	} else {
		ikon = "<span class=\"\"><i class=\"far fa-star\" aria-hidden=\"true\"></i> </span>  ";
	}
	return ikon;
}
$(document).ready(function() {
	$(".pm-ikon").each(function() {
		var ico = ikon($(this).text());
		$(this).html(ico + $(this).text() );
		console.log($(this).text());
	});	
});
</script>
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
    <script type="text/javascript" src="https://cdn.mypanel.link/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/servislistesi.js"></script>
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
<?php } ?>
</html>