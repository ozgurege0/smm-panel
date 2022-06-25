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
					<h4 class="page-title mb-2"><i class="mdi mdi-cart mr-2"></i>Yeni Sipariş</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item"><a href="kullanici-panel/anasayfa">Ana Sayfa</a></li>
							<li class="breadcrumb-item active">Yeni Sipariş</li>
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
						<div class="card-body">
							<h4 class="mt-0 header-title">Yeni Sipariş</h4>
							<p class="text-muted mb-4">
								Bu bölümde yeni şiparişinizi oluşturabilirsiniz.
							</p>
						   <?php 
							include '../inc/api.php';
							$api = new Api();
							$api->api_url = $ayar['apiurl'];
							$api->api_key = $ayar['apikey'];
							$str = "0123456789";
							$str = str_shuffle($str);
							$str = substr($str, 0, 10);
							$orderid = $str;
							$siparis = @$_POST['siparis'];
						   if($siparis){
							@$service = $_POST['servis'];
							$link = $_POST['link'];
							$miktar = $_POST['miktar'];
							$ucret = $_POST['ucret'];
							$servis = $vt->cek('ASSOC', 'servisler', 'service,min,max,rate', 'where service=?', array($service));
						   
							if(!$service || !$link || !$miktar || !$ucret){
								echo '<div class="alert alert-warning">Boş bırakmayınız.</div>';
							}else{
								if($servis){
									if($miktar > $servis['max']){
										echo '<div class="alert alert-warning">Maksimum sayıyı geçmeyiniz.</div>';
									}else{
										if($miktar < $servis['min']){
											echo '<div class="alert alert-warning">Minimum sayıdan az olamaz.</div>';
										}else{
											$fiyatsorgu = $servis['rate']*$miktar*0.001;
											$bakiyesorgu = $vt->cek('ASSOC', 'uyeler', 'bakiye', 'where id=?', array($_SESSION['id']));
											if($bakiyesorgu['bakiye'] < floatval($fiyatsorgu)){
												echo '<div class="alert alert-warning">Bakiyeniz yetersiz. Lütfen bakiye yükleyip tekrar sipariş geçiniz.</div>';
											}else{
												$order = $api->order(array('service' => $service, 'link' => $link, 'quantity' => $miktar));
												$fiyat = $fiyatsorgu;
												if($order){
													$array = json_decode(json_encode($order), true);
													$orderid2 = $array['order'];
													if($orderid2){
														$ekle = $vt->ekle('orders', 'order_id,user_id,service_id,link,miktar,ucret,durum', array($orderid2,$_SESSION['id'], $service,$link,$miktar,$fiyat,4));
													
														header('refresh:0;url=siparis/'.$orderid2);
														$yenibakiye = $bakiyesorgu['bakiye']-floatval($fiyatsorgu);
														$vt->guncelle('0', 'uyeler', 'bakiye', 'where id=?', array($yenibakiye,$_SESSION['id']));
													}else{
														echo '<div class="alert alert-danger">HATA!. Hata kodu : 200321. Admin panelinden destek oluşturabilirsiniz.</div>';
													}
												}else{
													echo '<div class="alert alert-danger">HATA.</div>';
												}
											}
										}
									}
									}else{
										echo 'servisyok';
									}
								}
							}
							?>
							<form method="POST">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kategori</span>
										</div>
										<select class="form-control" id="input" onchange="random_function()">
											<?php $category = $vt->cek('OBJ_ALL', 'kategoriler', '*', 'where onay=?', array(0));
											echo '<option>Kategori Seç</option>';
											foreach($category as $row){
											echo '<option value="'.$row->id.'">'.$row->baslik.'</option>';
											}?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Servis</span>
										</div>
										<select class="form-control" id="output" name="servis" onchange="random_function1()">
											<option>Servis Seç</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="alert alert-service" id="service_description" style="padding: 15px 25px; border-radius: 15px;font-size: 12px;">
											<label for="service_description" class="control-label"><b>Servis Açıklaması</b></label>
											<div id="aciklama" class="service-description border-solid border-rounded">
												<?php 
												$aciklama = $vt->cek('OBJ_ALL', 'servisler', 'id,aciklama', 'where onay=?', array(0));
												foreach($aciklama as $row){
												echo '<div id="aciklamaid-'.$row->id.'" style="display:none;">'.nl2br($row->aciklama).'</div>';
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanıcı/Link</span>
										</div>
										<input class="form-control" name="link" placeholder="Kullanıcı/Link giriniz." type="text" id="field-orderform-fields-link">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Miktar</span>
										</div>
										<input class="form-control" name="miktar" placeholder="Miktar giriniz." type="number" id="miktar" name="miktar">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span id="minmax"  class="badge badge-boxed  badge-soft-warning"></span>
									</div>
								</div>
								<input type="hidden" id="servisucret" name="servisucret">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Ücret</span>
										</div>
										<input type="text" class="form-control" id="ucret" name="ucret" readonly="">
										<div class="input-group-append">
												<span class="input-group-text">₺</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input type="submit" name="siparis" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Sipariş Ver" />
									</div>
								</div>
							</form><!--end form-->
						</div><!--end card-body-->
					</div><!--end card-->
				</div><!--end col-->
			</div><!--end row-->
		</div><!-- container -->
		<footer class="footer text-center text-sm-left">
			&copy; 2022 <?=$ayar['baslik']?> <span class="text-muted d-none d-sm-inline-block float-right">Ozgur_Medya <i class="mdi mdi-heart text-danger"></i> ile kodlanmıştır.</span>
		</footer>
		<script>
		function random_function()
		{
			var a = document.getElementById("input");
			var inputval = a.options[a.selectedIndex].value;
			var text = a.options[a.selectedIndex].text;
			if(inputval==="Kategori Seç")
			{
				var arr=["ravertanx"];
			}
			<?php 
			$kategoriler = $vt->cek("OBJ_ALL", "kategoriler", "id,baslik", "where onay=?", array(0));
			foreach($kategoriler as $row){
				echo 'else if(inputval==="'.$row->id.'"){var arr=[';
				$cek = $vt->cek('OBJ_ALL', 'servisler', '*', 'where category=? and onay=?', array($row->id,0));
				foreach($cek as $row2){
					$string = '"'.$row2->name.' | '.$row2->rate.' ₺",';
					echo ''.$string.'';
				} 
				echo '];arr2=[';
				$cek = $vt->cek('OBJ_ALL', 'servisler', '*', 'where category=? and onay=?', array($row->id,0));
				foreach($cek as $row2){
					echo '"'.$row2->service.'",';
				} 
				echo '];';
			
				echo '}';
			}
			?>
			var string="";
			var string2="";
			string2="<option>Servisi Seç</option>";
			for(i=0;i<arr.length;i++)
			{
				string=string+"<option value="+arr2[i]+">"+arr[i]+"</option>";
			}
			document.getElementById("output").innerHTML=string2+string;
		}
		function random_function1()
		{
			var e = document.getElementById("output");
			var value = e.options[e.selectedIndex].value;
			var text = e.options[e.selectedIndex].text;
			if(value==="ravertan")
			{
				var arr4=["ravertansc"];
			}<?php 
			$kategoriler = $vt->cek("OBJ_ALL", "servisler", "id,service,min,max,aciklama,rate", "where onay=?", array(0));
			foreach($kategoriler as $row){
				$idsorgu = $vt->cek("OBJ_ALL", "servisler", "id", "where onay=? and id!=?", array(0,$row->id));
				echo 'else if(value==="'.$row->service.'"){
					var arr4=["Min : '.$row->min.' - Max : '.$row->max.'","'.$row->rate.'"];
					document.getElementById("aciklamaid-'.$row->id.'").style.display = "block";';
					foreach($idsorgu as $row2){
					echo '
					document.getElementById("aciklamaid-'.$row2->id.'").style.display = "none";';
					}
				echo '}';
			}
			?>
			string2=arr4[0];
			string4=arr4[1];      
			document.getElementById("minmax").innerHTML=string2;
			document.getElementById("servisucret").value=string4;
		}
		function bakiye(){
			var odul = document.getElementById("servisucret").value;
			var uye = document.getElementById("miktar").value;
			var FLOATsayi = 0.1;
			if(odul == "" || uye == ""){
				document.getElementById("ucret").value = "0";
			}else{
				var toplam = parseFloat(odul) * parseInt(uye) * parseFloat(0.001);
				document.getElementById("ucret").value = toplam.toFixed(4);
			}
		}
		setInterval("bakiye()", 100);
		</script>
	</div>
	<!-- end page content -->
</div>
<!-- end page-wrapper -->
