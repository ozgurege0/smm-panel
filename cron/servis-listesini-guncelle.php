<?php 
include "../inc/config.php";
$vt = new db();

$cek = $vt->cek('OBJ_ALL', 'servisler', 'id,category', '', array());
foreach($cek as $row){
    $cek2 = $vt->cek('ASSOC', 'kategoriler', 'id,baslik', 'where id=?', array($row->category));
    if($cek2){
		echo '
		<div style="padding-top: 10px;"></div>
		<div class="form-group">
		<div class="alert alert-warning">Servis Listesi Zaten Güncel.</div>
		</div>
		<div style="padding-top: 2px;"></div>
		';
    }else{
        $cek3 = $vt->cek('ASSOC', 'kategoriler', 'id,baslik', 'where baslik=?', array($row->category));
        $guncelle = $vt->guncelle('0', 'servisler', 'category', 'where id=?', array($cek3['id'],$row->id));
        if($guncelle){
            // echo 'başarılı <br>';
			echo '
			<div style="padding-top: 10px;"></div>
			<div class="form-group">
			<div class="alert alert-success">Servis Listesi Güncellenmiştir.</div>
			</div>
			<div style="padding-top: 2px;"></div>
			';
        }else{
            // echo 'hata <br>';
        }
        
    }
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>