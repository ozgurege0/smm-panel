<?php 
session_start();
header('Set-Cookie: ' . session_name() . '=' . session_id() . '; SameSite=None; Secure', false);
include "../inc/config.php";
$vt = new db();
$ayar = $vt->cek('ASSOC', 'ayarlar', '*', '', array());
$shopierb = json_decode($ayar['shopier']);

$status = $_POST["status"];
$invoiceId = $_POST["platform_order_id"];
$transactionId = $_POST["payment_id"];
$installment = $_POST["installment"];
$signature = $_POST["signature"];


$url = $ayar['url'];
$locationtrue = $url."/kullanici-panel/bakiye-yuklendi";
$locationfalse = $url."kullanici-panel/bakiye-hata";


$data = $_POST["random_nr"] . $_POST["platform_order_id"] . $_POST["total_order_value"] . $_POST["currency"];
$signature = base64_decode($signature);
$expected = hash_hmac('SHA256', $data, $shopierb->secret, true);
if ($signature == $expected) {
$status = strtolower($status);
if ($status == "success") {
$query = $vt->cek('ASSOC', 'odemeler', '*', 'where siparis_no=?', array($invoiceId));

        if($query){
            $userQuery = $vt->cek('ASSOC', 'uyeler', '*', 'where email=?', array($query['uye_email']));
            if($userQuery){
                $updateBalance = $vt->guncelle('0','uyeler', 'bakiye', 'where id=?', array($query['tutar']+$userQuery['bakiye'], $userQuery['id']));
                $updateDeposit = $vt->guncelle('0','odemeler', 'onay,mesaj', 'where siparis_no=?', array('0', 'Başarılı', $invoiceId));
                if($updateBalance && $updateDeposit){
                    header('refresh:0;url=bakiye-yuklendi');
                }
            }
        }
}
else{
    echo 'test';
}
}else{ header('refresh:0;url=bakiye-hata');}
?>
