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
						<h4 class="page-title mb-2"><i class="dripicons-tags mr-2"></i>Servis Listesi</h4>  
						<div class="">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
								<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
								<li class="breadcrumb-item active">Servis Listesi</li>
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
								<input type="text" class="form-control" id="ravertan-input" placeholder="Aradığınız servisi yazın..">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="single-post-details-item dark-bg"><!-- blog single content -->
							<div class="entry-content">
								<div class="card-body" style="overflow: auto;">
									<table class="table table-bordered table-striped table-hover ravertan-arama">
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
											<b><center>'.$row->baslik.'</center></b>
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
												<td style="text-align:center;color:white;"><a type="button" data-target="#servis'.$row2->id.'" class="modal-effect btn btn-primary btn-sm" data-toggle="modal" data-effect="effect-scale">Açıklama</a></td>
											</tr>					
											<!-- Modal -->
											<div class="modal fade" id="servis'.$row2->id.'">
												<div class="modal-dialog modal-xl">
													<div class="modal-content">
														<a style="color:white;" class="modal-header">
															<b class="pm-ikon">'.$name.'</b>
														</a>
														<a style="color:white;" class="modal-body">
															'.nl2br($row2->aciklama).'  
														</a>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Kapat</button>
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
			</div><!-- container -->
			<footer class="footer text-center text-sm-left">
				&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
			</footer>
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
		</div>
		<!-- end page content -->
	</div>
	<!-- end page-wrapper -->
