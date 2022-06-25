<li><a href="kullanici-panel/anasayfa"><i class="mdi mdi-home"></i>Ana Sayfa</a></li>
<li><a href="kullanici-panel/yeni-siparis"><i class="dripicons-cart"></i>Yeni Sipariş</a></li>
<li><a href="kullanici-panel/siparislerim"><i class="mdi mdi-shopping"></i>Siparişlerim</a></li>
<li><a href="kullanici-panel/servis-listesi"><i class="dripicons-tags"></i>Servis Listesi</a></li>
<li class="has-submenu">
	<a href="#"><i class="mdi mdi-credit-card"></i>Bakiye Yükle</a>
	<ul class="submenu">
		<?php
		$payments = $vt->cek('ASSOC', 'ayarlar', 'payment', '', array());
		$payment = json_decode($payments['payment']);
		if($payment->onlineodeme == 1):
		?>
		<li><a href="kullanici-panel/online-odeme">Online Ödeme</a></li>
		<?php endif; ?> 
		<?php
		if($payment->havale == 1):
		?>
		<li><a href="kullanici-panel/banka-hesaplari">Banka Hesapları</a></li>
		<?php endif; ?> 
		<li><a href="kullanici-panel/odeme-talepleri">Ödeme Talepleri</a></li>
	</ul>
</li>
<li class="has-submenu">
	<a href="#"><i class="mdi mdi-ticket"></i>Destek Talebi</a>
	<ul class="submenu">
		<li><a href="kullanici-panel/destek-talebi-olustur">Destek Talebi Oluştur</a></li>
		<li><a href="kullanici-panel/destek-talepleri">Destek Talepleri</a></li>
	</ul>
</li>
<li><a href="kullanici-panel/duyurular"><i class="dripicons-broadcast"></i>Duyurular</a></li>
<li class="has-submenu">
	<a href="#"><i class="mdi mdi-store"></i>Kurumsal</a>
	<ul class="submenu">
		<li><a href="kullanici-panel/kullanim-sozlesmesi">Kullanım Sözleşmesi</a></li>
		<li><a href="kullanici-panel/sss">Sık Sorulan Sorular</a></li>
	</ul>
</li>
