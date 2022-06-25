<?php 
  include "../inc/config.php";
  $vt = new db();
    include "../inc/api.php";
    $api = new Api();
    $ayar = $vt->cek('ASSOC', 'ayarlar', 'apiurl,apikey,komisyon', '', array());
    $api->api_url = $ayar['apiurl'];
    $api->api_key = $ayar['apikey'];
    $services = $api->services();
    $array = json_decode(json_encode($services), true);
    $count = count($array);
    for ($i=0;$i<=$count-1;$i++) {
        $type = $array[$i]['type'];
        if($type == 'Default'){
            $service = $array[$i]['service'];
            $rate = $ayar['komisyon']*$array[$i]['rate'];
            $sorgu = $vt->cek('ASSOC', 'servisler', 'service', 'where service=? and manuelayar=? and onay!=2', array($service,0));
            if($sorgu){
				$name = $array[$i]['name'];
				echo '
				<div style="padding-top: 10px;"></div>
				<div class="form-group">
				<div class="alert alert-warning">'.$name.' Adlı Servis Zaten Var.</div>
				</div>
				<div style="padding-top: 2px;"></div>
				';
                $rate1 = $ayar['komisyon']*$array[$i]['rate'];
                $bakiye = $vt->cek('ASSOC', 'servisler', 'id,rate', 'where rate=? and service=?  and manuelayar=? and onay!=2', array($rate1,$sorgu['service'],0));
                if(@$bakiye['rate'] == $rate){
                    //echo 'bakiye aynı <br>';
                }else{
                    $rateyeni = $ayar['komisyon']*$array[$i]['rate'];
                    $name = $array[$i]['name'];
                    $serviceid = $array[$i]['service'];
                    $guncelle = $vt->guncelle('0', 'servisler', 'rate', 'where service=? and manuelayar=? and onay!=2', array($rateyeni,$sorgu['service'],0));
                    if($guncelle){
                        //echo $name.' adlı servisin bakiyesi güncellendi <br>';
                    }else{
                        //echo $serviceid.' hata1 <br>';
                    }
                }
            }else{
                $service22 = $array[$i]['service'];
                $name = $array[$i]['name'];
                $rate2 = $ayar['komisyon']*$array[$i]['rate'];
                $min = $array[$i]['min'];
                $max = $array[$i]['max'];
                $category = $array[$i]['category'];
                $ekle = $vt->ekle('servisler', 'service,name,rate,min,max,category,onay', array($service22,$name,$rate2,$min,$max,$category,0));
                if($ekle){
                    echo '
						<div style="padding-top: 10px;"></div>
						<div class="form-group">
							<div class="alert alert-success"><strong>'.$name.'</strong> Adlı Servis Başarıyla Çekilmiştir.</div>
						</div>
						<div style="padding-top: 2px;"></div>
						';
                }else{
                    //echo 'hata <br>';
                }
            }
        }else{

        }
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>