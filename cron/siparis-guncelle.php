<?php 
  include "../inc/config.php";
  $vt = new db();
    include "../inc/api.php";
    $api = new Api();
    $ayar = $vt->cek('ASSOC', 'ayarlar', 'apiurl,apikey,komisyon', '', array());
    $api->api_url = $ayar['apiurl'];
    $api->api_key = $ayar['apikey'];
    $siparisler = $vt->cek('OBJ_ALL', 'orders', '*', 'where durum IN ("3","4")', array());
    if($siparisler){
        foreach($siparisler as $row){
            $orderid = $row->order_id;
            $services = $api->status($orderid);
            $array = json_decode(json_encode($services), true);
            $status = $array['status'];
            if($status == 'In progress' || $status == 'Pending'){
                $apiucret = $array['charge'];
                $baslangic = $array['start_count'];
                $kalan = $array['remains'];
                $durum = '3';
                $guncelle = $vt->guncelle('0', 'orders', 'api_ucret,baslangic,kalan,durum', 'where order_id=?', array($apiucret,$baslangic,$kalan,$durum,$orderid));
                if($guncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata1 <br>';
                }
            }else if($status == 'Canceled'){
                $apiucret = $row->ucret;
                $baslangic = $array['start_count'];
                $kalan = $array['remains'];
                $durum = '2';
                $guncelle = $vt->guncelle('0', 'orders', 'api_ucret,baslangic,kalan,durum', 'where order_id=?', array('0',$baslangic,$kalan,$durum,$orderid)); 
                $bakiyeiade = $vt->cek('ASSOC', 'uyeler', 'bakiye', 'where id=?', array($row->user_id));
                $yenibakiye = $row->ucret+$bakiyeiade['bakiye'];
                $bakiyeguncelle = $vt->guncelle('0', 'uyeler', 'bakiye', 'where id=?', array($yenibakiye,$row->user_id));
                if($guncelle && $bakiyeguncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata2 <br>';
                }
            }else if($status == 'Partial'){
                $apiucret = $array['charge'];
                $baslangic = $array['start_count'];
                $kalan = $array['remains'];
                $durum = '1';
                $guncelle = $vt->guncelle('0', 'orders', 'api_ucret,baslangic,kalan,durum', 'where order_id=?', array($apiucret,$baslangic,$kalan,$durum,$orderid)); 
                $bakiyeiade = $vt->cek('ASSOC', 'uyeler', 'bakiye', 'where id=?', array($row->user_id));
                $komisyonapi = $ayar['komisyon']*$apiucret;
                $yenibakiye = $bakiyeiade['bakiye']+$komisyonapi;
                $bakiyeguncelle = $vt->guncelle('0', 'uyeler', 'bakiye', 'where id=?', array($yenibakiye,$row->user_id));
                if($guncelle && $bakiyeguncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata3 <br>';
                }
            }else if($status == 'Completed'){
                $apiucret = $array['charge'];
                $baslangic = $array['start_count'];
                $kalan = $array['remains'];
                $durum = '0';
                $guncelle = $vt->guncelle('0', 'orders', 'api_ucret,baslangic,kalan,durum', 'where order_id=?', array($apiucret,$baslangic,$kalan,$durum,$orderid)); 
                if($guncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata4 <br>';
                }
            }else if($status == '104'){
                $durum = '5';
                $guncelle = $vt->guncelle('0', 'orders', 'durum', 'where order_id=?', array($durum,$orderid)); 
                if($guncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata5 <br>';
                }
                
            }else{
                $durum = '4';
                $guncelle = $vt->guncelle('0', 'orders', 'durum', 'where order_id=?', array($durum,$orderid)); 
                if($guncelle){
					echo '
					<div style="padding-top: 10px;"></div>
					<div class="form-group">
					<div class="alert alert-success">Sipariş Güncellenmiştir.</div>
					</div>
					<div style="padding-top: 2px;"></div>
					';
                }else{
                    //echo 'hata5 <br>';
                }
            }
        }
    }else{
		echo '
		<div style="padding-top: 10px;"></div>
		<div class="form-group">
		<div class="alert alert-warning">Siparişlerin hepsi güncellenmiş ve sipariş kalmamış!</div>
		</div>
		<div style="padding-top: 2px;"></div>
		';
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>