<?php
include '../../inc/config.php';
$vt = new db();
$adsoyad = $_POST['adsoyad'];
$username = $_POST['username'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$password = $_POST['password'];
$passwordr = $_POST['passwordr'];
if(!$adsoyad || !$username || !$email || !$telefon || !$password || !$passwordr){
    $message = '5';
}else if(strlen($adsoyad) < 8 || strlen($adsoyad) > 50){
        $message = 'adsoyad';
    }else if(strlen($username) < 5 || strlen($username) > 18){
        $message = 'username';
    }else if(empty($username)){
        $message = 'username2';
    }else if(!checkspecial($username)){
        $message = 'username3';
    }else if(strlen($password) < 8 || strlen($password) > 18){
        $message = 'password';
    }else if($password != $passwordr){
        $message = 'passwordr';
    }else if(strlen($telefon) == 11){
        $usernamesorgu = $vt->cek('ASSOC','uyeler', 'username', 'where username=?', array($username));
        if($usernamesorgu){
            $message = 'uservar';
        }else{
            $emailsorgu = $vt->cek('ASSOC', 'uyeler', 'email', 'where email=?', array($email));
            if($emailsorgu){
                $message = 'emailvar';
            }else{
                $telefonsorgu = $vt->cek('ASSOC','uyeler', 'telefon', 'where telefon=?', array($telefon));
                if($telefonsorgu){
                    $message = 'telefonvar';
                }else{
                    $str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
                    $str = str_shuffle($str);
                    $str = substr($str, 0, 10);
                    $onay_code = $str;
                    $onay = '0';
                    $yenisifre = md5($password);
                    $kayit = $vt->ekle('uyeler', 'adsoyad,username,email,telefon,password,bakiye,onay_code,onay', array($adsoyad,$username,$email,$telefon,$yenisifre,0,$onay_code,$onay));
                    if($kayit){
                        $message = 'basarili'; 
                    }else{
                        $message = 'basarisiz';
                    }
                }
            }
        }
    }else{
        $message = 'telefon';
    }

if($message == 'basarili'){
echo '
	<div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
		<div class="alert-text">
			<strong>Başarılı!</strong> Kayıt Oldunuz. Yönlendiriliyorsunuz.
		</div>                                            
	</div>
 	<meta http-equiv="refresh" content="2;URL=giris-yap">';
}else if($message == 'basarisiz'){
echo '
<div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow" role="alert">
	<div class="alert-text">
		<strong>Başarısız!</strong> Kayıt Olamadınız.
	</div>                                            
</div>
';
}else if($message == 'telefon'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Telefon 11 karakter olmalı.
	</div>                                            
</div>
';
}else if($message == 'password'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Şifre 8 ile 18 karakter arası olmalı.
	</div>                                            
</div>
';
}else if($message == 'username'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Kullanıcı adı 5 ile 18 karakter arası olmalı.
	</div>                                            
</div>
';
}else if($message == 'username2'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Kullanıcı adında boşluk olmamalı.
	</div>                                            
</div>
';
}else if($message == 'username3'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Kullanıcı adı Türkçe karakter içermemeli.
	</div>                                            
</div>
';
}else if($message == 'passwordr'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Şifreler uyuşmuyor.
	</div>                                            
</div>
';
}else if($message == 'adsoyad'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Ad Soyad 8 karakterden kısa olamaz.
	</div>                                            
</div>
';
}else if($message == '5'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Boş bırakmayınız.
	</div>                                            
</div>
';
}else if($message == 'uservar'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Böyle bir kullanıcı zaten mevcut.
	</div>                                            
</div>
';
}else if($message == 'emailvar'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Böyle bir email zaten mevcut.
	</div>                                            
</div>
';
}else if($message == 'telefonvar'){
echo '
<div class="alert icon-custom-alert alert-outline-warning alert-warning-shadow" role="alert">
	<div class="alert-text">
		<strong>Uyarı!</strong> Böyle bir numara zaten mevcut.
	</div>                                            
</div>
';
}
?>