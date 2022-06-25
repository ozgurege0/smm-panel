-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 25 Haz 2022, 12:55:18
-- Sunucu sürümü: 10.3.34-MariaDB
-- PHP Sürümü: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `panterya_smm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `title` varchar(180) COLLATE utf8mb4_turkish_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `keyw` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre_mail` varchar(5000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mailbilgi` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `favicon` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `komisyon` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `paytr` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `shopier` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `min_odemetutari` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `apiurl` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `apikey` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `payment` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `analytics` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_kodlari` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `iletisim_cep` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `iletisim_adres` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanim_sozlesmesi` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `sss` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `baslik`, `logo`, `title`, `url`, `description`, `keyw`, `email`, `sifre_mail`, `mailbilgi`, `favicon`, `onay`, `komisyon`, `paytr`, `shopier`, `min_odemetutari`, `tarih`, `apiurl`, `apikey`, `payment`, `analytics`, `site_kodlari`, `iletisim_cep`, `iletisim_adres`, `site_facebook`, `site_twitter`, `site_instagram`, `kullanim_sozlesmesi`, `sss`) VALUES
(1, 'Ozgur_Medya', 'https://smm.genelyazilim.com/assets/logo_ve_favicon/61m4bcpzkq..png', 'Ücretsiz Smm Panel', 'https://smm.genelyazilim.com', 'Ozgur_medya ücretsiz smm panel yazılımı, kullandıkça bizi hatırlayın dostlat :)', 'html, css, js, php', 'admin@gmail.com', '{\"eposta\":\"-\",\"sifre\":\"-\"}', '{\"host\":\"smtp.yandex.com\",\"port\":\"587\"}', 'https://smm.genelyazilim.com/assets/logo_ve_favicon/o2fs87m36h..png', 0, '1.30', '{\"merchant_id\":\"-\",\"merchant_key\":\"-\",\"merchant_salt\":\"-\"}', '{\"key\":\"bf33d05737d59da7e7bcc751fbb49f3f\",\"secret\":\"e0079d7a5f888e447829e766f2bf401b\"}', '10', '25.06.2022 09:15:11', '-', '-', '{\"paytr\":0,\"shopier\":\"1\",\"onlineodeme\":\"1\",\"havale\":\"1\"}', '', '', '05xxxx', 'Türkiye', '/', '/', '/', 'Lorem Ipsum Nedir? Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.\r\n\r\nLorem Ipsum Nedir? Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'Lorem Ipsum Nedir? Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.\r\n\r\nLorem Ipsum Nedir? Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `id` int(11) NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `banka_adi` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `alıcı_adi` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hesap_no` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `iban` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sube_adi` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sube_kodu` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `konu` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mesaj` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek_cevap`
--

CREATE TABLE `destek_cevap` (
  `id` int(11) NOT NULL,
  `destek_id` int(11) NOT NULL,
  `destek_uye_id` int(11) NOT NULL,
  `cevaplayan` varchar(18) COLLATE utf8mb4_turkish_ci NOT NULL,
  `cevap` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_formu`
--

CREATE TABLE `iletisim_formu` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mailadresi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mesaj` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `iletisim_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `id` int(11) NOT NULL,
  `uye_email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_numara` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_adsoyad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `siparis_no` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tutar` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mesaj` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `method` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `miktar` int(11) NOT NULL,
  `ucret` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `api_ucret` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `baslangic` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kalan` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servisler`
--

CREATE TABLE `servisler` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `rate` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `manuelayar` int(11) NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bakiye` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay_code` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `adsoyad`, `username`, `email`, `telefon`, `password`, `bakiye`, `onay_code`, `onay`, `tarih`) VALUES
(1, 'demo demo', 'demo', 'demo@demo.com', '05123451234', '63f9b03f1cacbefc5d87b9161fb4b80b', '0', '', 3, '2021-06-01 13:02:28');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek_cevap`
--
ALTER TABLE `destek_cevap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `servisler`
--
ALTER TABLE `servisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `destek_cevap`
--
ALTER TABLE `destek_cevap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `servisler`
--
ALTER TABLE `servisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
