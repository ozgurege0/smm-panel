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
            $kategori = $array[$i]['category'];
            $sorgu = $vt->cek('ASSOC', 'kategoriler', 'baslik', 'where onay!=2 and baslik=?', array($kategori));
            if($sorgu){
 				echo '
				<div style="padding-top: 10px;"></div>
				<div class="form-group">
				<div class="alert alert-warning">'.$kategori.' Adlı Kategori Zaten Var.</div>
				</div>
				<div style="padding-top: 2px;"></div>
				';
            }else{
                $ekle = $vt->ekle('kategoriler', 'baslik,onay', array($kategori,0));
                if($ekle){
                    echo '
						<div style="padding-top: 10px;"></div>
						<div class="form-group">
							<div class="alert alert-success"><strong>'.$kategori.'</strong> Adlı Kategori Başarıyla Çekilmiştir.</div>
						</div>
						<div style="padding-top: 2px;"></div>
						';
                }else{
                    echo 'başarısız <br>';
                    
                }
            }
        }else{

        }
    }
    
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
