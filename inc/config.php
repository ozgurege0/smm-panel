<?php 

ob_start();
	
$dbhost = "localhost:3306"; //Veritabanın bulunduğu host
$dbuser = "root"; //Veritabanı Kullanıcı Adı
$dbpass = ""; //Veritabanı Şifresi
$dbdata = "smm"; //Veritabanı Adı

include("dbclass.php"); //veritabani class dosyamızı dahil ediyoruz
$bag = new db();



?>