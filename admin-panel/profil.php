<?php
date_default_timezone_set('Europe/Istanbul');
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$uyebilgi = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
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
					<h4 class="page-title mb-2"><i class="dripicons-user"></i> Profil</h4>  
					<div class="">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="anasayfa">Kullanıcı Panel</a></li>
							<li class="breadcrumb-item active">Profil</li>
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
					<?php 
					$uyebilgi = $vt->cek('ASSOC', 'uyeler', '*', 'where id=?', array($_SESSION['id']));
                    $uyelikbilgi = @$_POST['uyelikbilgi'];
                    $sifre = @$_POST['sifre'];
                    if($sifre){
                        $mevcutsifre = $_POST['sifre'];
                        $yenisifre = $_POST['yenisifre'];
                        $yenisifret = $_POST['yenisifret'];
                        if(!$mevcutsifre || !$yenisifre || !$yenisifret){
                            echo '<div class="alert alert-warning">Boş bırakma</div>';
                        }else if(md5($mevcutsifre) == $veri['password']){
                            if(strlen($yenisifre) < 8 || strlen($yenisifre) > 18){
                                echo '<div class="alert alert-warning">Şifreniz çok kısa</div>';
                            }else{
                                if($yenisifre == $yenisifret){
                                    $sifre = md5($yenisifre);
                                    $sifreguncelle = $vt->guncelle('0', 'uyeler', 'password', 'where id=?', array($sifre,$_SESSION['id']));
                                    if($sifreguncelle){
                                        echo '<div class="alert alert-success">Şifreniz başarıyla değiştirilmiştir.</div>';
                                    }else{
                                        echo '<div class="alert alert-danger">HATA</div>';
                                    }
                                }else{
                                    echo '<div class="alert alert-warning">Şifreniz birbiriyle uyuşmuyor.</div>';
                                }
                            }           
                        }else{
                            echo '<div class="alert alert-warning">Mevcut şifre hatalı.</div>';
                        }
                    }
                    if($uyelikbilgi){
                        $adsoyad = $_POST['adsoyad'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $telefon = $_POST['telefon'];
                        $bakiye = $_POST['bakiye'];
                        if(!$adsoyad || !$username || !$email || !$telefon || !$bakiye){
                            echo '<div class="alert alert-warning">Boş bırakma</div>';
                        }else{
                            $usernamesorgu = $vt->cek('ASSOC','uyeler', 'username', 'where username=? and id!=?', array($username, $_SESSION['id']));
                            if($usernamesorgu){
                                echo '<div class="alert alert-warning">Zaten böyle bir kullanıcı adı var.</div>';
                            }else{
                                $emailsorgu = $vt->cek('ASSOC', 'uyeler', 'email', 'where email=? and id!=?', array($email,$_SESSION['id']));
                                if($emailsorgu){
                                    echo '<div class="alert alert-warning">Zaten böyle bir email var.</div>';
                                }else{
                                    $telefonsorgu = $vt->cek('ASSOC','uyeler', 'telefon', 'where telefon=? and id!=?', array($telefon,$_SESSION['id']));
                                    if($telefonsorgu){
                                        echo '<div class="alert alert-warning">Zaten böyle bir telefon var.</div>';
                                    }else{
                                        $guncelle = $vt->guncelle('0', 'uyeler', 'adsoyad,username,email,telefon,bakiye', 'where id=?', array($adsoyad,$username,$email,$telefon,$bakiye,$_SESSION['id']));
                                        if($guncelle){
                                            echo '<div class="alert alert-success">Hesap bilgileri başarıyla güncellendi.</div>';
                                            echo '<meta http-equiv="refresh" content="2;">';
                                            die;
                                        }else{
                                            echo '<div class="alert alert-danger">Zaten aynı bilgiler kayıtlı.</div>';
                                            echo '<meta http-equiv="refresh" content="2;">';
                                            die;
                                        }
                                    }
                                }
                            }       
                        }
                    }
					?>
					<div class="card">
						<div class="card-header">
							<strong>Profil Bilgileriniz</strong> 
						</div>
						<div class="card-body">
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Adınız Soyadınız</span>
										</div>
										<input type="text" id="text-input" name="adsoyad" class="form-control" value="<?=$uyebilgi['adsoyad']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Kullanıcı Adı</span>
										</div>
										<input type="text" id="text-input" name="username" class="form-control" value="<?=$uyebilgi['username']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">E Mail</span>
										</div>
										<input type="text" id="text-input" name="email" class="form-control" value="<?=$uyebilgi['email']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Telefon</span>
										</div>
										<input type="text" id="text-input" name="telefon" class="form-control" value="<?=$uyebilgi['telefon']?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Bakiye</span>
										</div>
										<input type="text" id="text-input" name="bakiye" class="form-control" value="<?=$uyebilgi['bakiye']?>">
									</div>
								</div>
								<input type="submit" name="uyelikbilgi" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
							</form>
						</div>
						<div class="card-header">
							<strong>Şifre Değiştirme</strong> 
						</div>
						<div class="card-body card-block">
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Mevcut Şifreniz</span>
										</div>
										<input type="password" id="password-input" name="mevcutsifre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Yeni Şifre</span>
										</div>
										<input type="password" id="password-input" name="yenisifre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Yeni Şifre Tekrar</span>
										</div>
										<input type="password" id="password-input" name="yenisifret" class="form-control">
									</div>
								</div>
								<input type="submit" name="sifre" class="btn btn-primary btn-block btn-square  waves-effect waves-light" value="Kaydet">
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