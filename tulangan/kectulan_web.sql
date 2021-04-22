-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: kectulan_web
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_apis`
--

DROP TABLE IF EXISTS `tb_apis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_apis` (
  `id` int(10) NOT NULL,
  `category` int(1) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_apis`
--

LOCK TABLES `tb_apis` WRITE;
/*!40000 ALTER TABLE `tb_apis` DISABLE KEYS */;
INSERT INTO `tb_apis` (`id`, `category`, `name`, `value`) VALUES (1,2,'Facebook','http://www.facebook.com/'),(2,2,'Twitter','http://www.twitter.com/'),(3,2,'Instagram','http://www.instagram.com/'),(4,2,'Youtube','http://youtube.com/channel/UCDVKd5uHI-1A7kW6ucqpin');
/*!40000 ALTER TABLE `tb_apis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_banners`
--

DROP TABLE IF EXISTS `tb_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_banners` (
  `id` varchar(10) NOT NULL,
  `category` int(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(30) NOT NULL,
  `ukuran` varchar(10) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_banners`
--

LOCK TABLES `tb_banners` WRITE;
/*!40000 ALTER TABLE `tb_banners` DISABLE KEYS */;
INSERT INTO `tb_banners` (`id`, `category`, `title`, `description`, `img`, `ukuran`, `status`) VALUES ('1',1,'Logo','Logo OPD','IMAGE-BANNER-1568258936.png','400x77',1),('12',7,'Camat Tulangan','Selamat datang di Website  Kecamatan Tulangan Kabupaten Sidoarjo. Website ini sebagai sarana publikasi untuk memberikan Informasi Seputar Kecamatan Tulangan Kabupaten Sidoarjo dalam melaksanakan pelayanan kepada masyarakat.','IMAGE-BANNER-1599582830.png','1200x495',0),('13',6,'Struktur organisasi','Struktur organisasi instansi','IMAGE-BANNER-1568013339.png','800x800',1),('14',1,'Logo','Logo OPD Footer','IMAGE-BANNER-1554708659.png','400x77',1),('2',2,'Pemerintah Kabupaten Sidoarjo','Kecamatan Tulangan','IMAGE-BANNER-1599570352.png','1920x700',1),('3',2,'Kecamatan Tulangan',' Camat Berkinerja Terbaik II ','IMAGE-BANNER-1599571486.png','1920x700',1),('4',2,'PELANTIKAN','PENJABAT KEPALA DESA','IMAGE-BANNER-1568015928.png','1920x700',0),('5',2,'Ruang Pelayanan ','Kecamatan Tulangan','IMAGE-BANNER-1568259909.png','1920x700',0),('6',2,'Slider','Deskripsi singkat slider','IMAGE-BANNER-1533888009.png','1920x700',0),('8',4,'Background','Background page','IMAGE-BANNER-1599578616.png','1920x358',1);
/*!40000 ALTER TABLE `tb_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_counter`
--

DROP TABLE IF EXISTS `tb_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_counter` (
  `id` int(15) NOT NULL,
  `idnews` varchar(15) NOT NULL,
  `total` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_counter`
--

LOCK TABLES `tb_counter` WRITE;
/*!40000 ALTER TABLE `tb_counter` DISABLE KEYS */;
INSERT INTO `tb_counter` (`id`, `idnews`, `total`) VALUES (1559111504,'1554428953',75),(1561014230,'1554429956',28),(1568015817,'1568015798',4),(1568253674,'1568252981',2),(1568254980,'1568254844',13),(1568256667,'1568256552',14),(1571879438,'1571879391',16),(1572141227,'1571882145',21),(1599232562,'1599232534',2),(1599232951,'1599232922',1),(1599576194,'1599576180',1),(1599576229,'1599575438',1),(1599577439,'1599577429',2),(1599578134,'1599578125',2),(1599579315,'1599579128',1);
/*!40000 ALTER TABLE `tb_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dinas`
--

DROP TABLE IF EXISTS `tb_dinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dinas` (
  `id` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dinas`
--

LOCK TABLES `tb_dinas` WRITE;
/*!40000 ALTER TABLE `tb_dinas` DISABLE KEYS */;
INSERT INTO `tb_dinas` (`id`, `name`, `description`, `img`) VALUES ('1534296400','BAPPEDA','http://www.bappeda.sidoarjokab.go.id/',''),('1554359302','DISDUKCAPIL','http://disdukcapil.sidoarjokab.go.id/',''),('1554359340','DPPKA','http://dppka.sidoarjokab.go.id/',''),('1554359361','BAKESBANGPOL','http://bakesbangpol.sidoarjokab.go.id/',''),('1554359406','DISPENDIK','http://dispendik.sidoarjokab.go.id/',''),('1554359419','BKD','http://www.bkd.sidoarjokab.go.id/','');
/*!40000 ALTER TABLE `tb_dinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_downloads`
--

DROP TABLE IF EXISTS `tb_downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_downloads` (
  `id` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(30) NOT NULL,
  `totdown` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_downloads`
--

LOCK TABLES `tb_downloads` WRITE;
/*!40000 ALTER TABLE `tb_downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_events`
--

DROP TABLE IF EXISTS `tb_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_events` (
  `id` varchar(10) NOT NULL,
  `iduser` varchar(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(50) NOT NULL,
  `img` varchar(30) NOT NULL,
  `datesubmit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_events`
--

LOCK TABLES `tb_events` WRITE;
/*!40000 ALTER TABLE `tb_events` DISABLE KEYS */;
INSERT INTO `tb_events` (`id`, `iduser`, `title`, `description`, `date`, `img`, `datesubmit`) VALUES ('1554429956','1533562415','Pelantikan Perangkat Desa Lainnya Periode 2009-2024','<p>Pelantikan Perangkat Desa Lainnya Periode 2009-2024</p>\r\n\r\n<p>Desa Sudimoro Kecamatan Tulangan</p>\r\n','Tuesday 15 December 2009 - 09:04','IMAGE-EVENTS-1554429956.jpg','2019-04-05 09:05:56'),('1568254844','1533562415','Pelantikan Penjabat Kepala Desa ','<p>Pelantikan Penjabat Kepala Desa Kepadangan, Desa Kepunten, Desa Kemantren, Desa Jiken, Desa Pangkemiri dan Desa Singopdu pada hari selasa, 27 Agustus 2019 bertempat di Pendopo Kecamatan Tulangan dihadiri langsung oleh Bupati Sidoarjo Bpk.&nbsp;<small>H.&nbsp;</small>Saiful Ilah,&nbsp;<small>S.H, M.Hum beserta Kepala Dinas Terkait.</small></p>\r\n','Tuesday 27 August 2019 - 10:00','IMAGE-EVENTS-1568254955.jpg','2019-09-12 09:20:44'),('1568256552','1533562415','Penyuluhan Pegelolaan Sampah','<p>Bertempat di Ruang Rapa Kecamatan Tulangan pada hari Rabu, 4 September 2019 dilaksanakan Kegiatan Penyuluhan Pengelolaan Sampah. Acara diisi langsung oleh Dinas Lingkungan Hidup dan Kebersihan (DLHK) Kabupaten Sidoarjo. Melalui acara ini diharapkan masyarakat menjadi sadar akan pentingnya pengelolaan sampah.</p>\r\n','Wednesday 04 September 2019 - 09:00','IMAGE-EVENTS-1568256552.jpg','2019-09-12 09:49:12'),('1571879391','1533562415','Sosialisasi Pelayanan Administrasi Kepundudukan Online Kecamatan Tulangan','<p>Sosialisai Pelayanan Administrasi Kependudukan Online Kecamatan Tulangan dilaksanakan di Ruang Rapat Kecamatan Tulangan pada hari Rabu 18 September 2019 dengan Narasumber dari Dinas Kependudkan dan Catatan Sipil Kabupaten Sidorjo. Acara berlangsung dari jam 09.00 sampai dengan selesai dan dibuka oleh &nbsp;Kasi Pembangunan Kecamatan&nbsp;Tulangan Bpk. Ir. Siswoyo.</p>\r\n\r\n<p>&nbsp;</p>\r\n','Wednesday 18 September 2019 - 09:00','IMAGE-EVENTS-1571881078.jpg','2019-10-24 08:09:51'),('1571882145','1533562415','Sosialisasi Pelimpahan sebagian Kewenangan Bupati Kepada Camat tentang TPST Kecamatan Tulangan','<p>Sosialisasi Pelimpahan sebagian Kewenangan Bupati Kepada Camat tentang TPST Kecamatan Tulangan pada hari Rabu 24 September 2019 di Ruang Rapat Kecamatan Tulangan dengan narasumber dari Dinas Lingkungan Hidup Kabupaten Sidoarjo.</p>\r\n','Tuesday 24 September 2019 - 09:00','IMAGE-EVENTS-1571882145.jpg','2019-10-24 08:55:45'),('1599232534','1533562415','Pelantikan dan BIMTEK Panitia Pengawas Pemilu Kecamatan Tulangan','<p>BAWASLU kecamatan Tulangan melaksanakan Pelantikan dan Bmtek kepada Panitia Pengawas Pemilu Kelurahan / Desa dalam rangka Pemilihan Bupati dan Wakil Bupati Sidoarjo.Acara bertempat di Kantor Kecamatan Tulangan tanggal 13 maret 2020. (Bersama Rakyat Kita Awasi Pemilu Bersama BAWASLU Tegakkan Keadilan Pemilu)</p>\r\n','Friday 13 March 2020 - 09:00','IMAGE-EVENTS-1599232534.jpg','2020-09-04 22:15:34'),('1599232922','1533562415','Penetapan dan Pengundian Nomor Urut Calon Kepala Desa Singopadu Periode 2020-2026','<p>Pada tanggl 29 maret 2020 bertempat di Balai Desa Singopadu Kecamatan Tulangan dilaksanakan&nbsp;Penetapan dan Pengundian Nomor Urut Calon Kepala Desa Singopadu Periode 2020-2026&nbsp;</p>\r\n\r\n<p>MARI KITA SUKSESKAN PILKADES DENGAN AMAN, JUJUR DAN BERSIH</p>\r\n','Sunday 29 March 2020 - 19:02','IMAGE-EVENTS-1599232922.jpg','2020-09-04 22:22:02'),('1599234182','1533562415','Sosialisasi Tunda Mudik Hingga Kondisi Membaik','<p>Untuk memutus Penyebaran COVD 19 dilaksankan Sosialisasi Tunda Mudik Hingga Kondisi Membaik yang dilaksakan di Balai Desa Jiken Kecamatan Tulangan tanggal 17 Mei 2020</p>\r\n','Sunday 17 May 2020 - 09:39','IMAGE-EVENTS-1599272062.jpg','2020-09-04 22:43:02'),('1599575438','1533562415','Apel Patroli Satpol PP Kecamatan Tulangan','<p>Kegiatan Patroli Satpol PP Kecamatan Tulangan adalah bagian dari tugas dan fungsi dari Kecamatan dibawah seksi Ketentraman dan Ketertiban Umum yang dilaksanakan untuk selalu menjaga keamanan dan ketertiban di wilayah Kecamatan Tulangan</p>\r\n','Saturday 23 May 2020 - 20:00','IMAGE-EVENTS-1599575438.jpg','2020-09-08 21:30:38'),('1599579128','1533562415','Sosialisasi PSBB III','<p>Kegiatan Sosialisasi PSBB III dan Doa bersama dalam rangka pencegahan penyebaran Covid 19 dilaksanakan di balai desa Tlasih tanggal 27 Mei 2020.&nbsp;</p>\r\n','Wednesday 27 May 2020 - 19:00','IMAGE-EVENTS-1599579300.jpg','2020-09-08 22:32:08'),('1599579695','1533562415','Penyerahan Bantuan Langsung Tunai Dana Desa Desa Grogol Kecamatan Tulangan','<p>Penyerahan Bantuan Langsung Tunai Dana Desa (BLTDD) Desa Grogol dilaksanakan pada tanggal 28 mei 2020 yang dihadiri oleh Camat Tulangan. Diharapkan dengan BLTDD dapat membantu masyarakat yang terdampak pandemi Covid 19 dan semoga Pandemi covid 19 cepat berakhir.&nbsp;</p>\r\n','Thursday 28 May 2020 - 09:59','IMAGE-EVENTS-1599579695.jpg','2020-09-08 22:41:35');
/*!40000 ALTER TABLE `tb_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_news`
--

DROP TABLE IF EXISTS `tb_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_news` (
  `id` varchar(10) NOT NULL,
  `iduser` varchar(10) NOT NULL,
  `category` int(1) DEFAULT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` datetime NOT NULL,
  `img` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_news`
--

LOCK TABLES `tb_news` WRITE;
/*!40000 ALTER TABLE `tb_news` DISABLE KEYS */;
INSERT INTO `tb_news` (`id`, `iduser`, `category`, `title`, `description`, `date`, `img`, `status`) VALUES ('1532315994','1533562415',2,'TUJUAN SASARAN STRATEGIS','<blockquote>\r\n<p>TUJUAN SASARAN STRATEGIS KECAMATAN TULANGAN</p>\r\n</blockquote>\r\n\r\n<p>Adapun tujuan sasaran strategis Kecamatan Tulangan adalah sebagai<br />\r\nsbb:</p>\r\n\r\n<ul>\r\n	<li>Meningkatnya kualitas pelayanan administrasi terpadu kecamatan</li>\r\n	<li>Meningkatnya penyelenggaraan urusan pemerintahan umum kecamatan dan meningkatnya kualitas penyelenggaraan pemerintahan desa</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>STRATEGI</p>\r\n</blockquote>\r\n\r\n<p>Strategi yang ditempuh oleh Kepala SKPD Kecamatan Tulangan antara lain :</p>\r\n\r\n<ul>\r\n	<li>Mendorong terlaksananya pelayanan Kecamatan yang prima dan<br />\r\n	konsisten melalui peningkatan kualitas pelayanan dan standarisasi<br />\r\n	pelayanan</li>\r\n	<li>Mewujudkan sinergitas kelembagaan bidang pemerintahan,<br />\r\n	pembangunan, serta pemerintah desa yang baik melalui<br />\r\n	Koordinasi dan Pembinaan yang intensif</li>\r\n	<li>Optimalisasi kapabilitas dan integritas organisasi dalam<br />\r\n	menyelenggarakan pemerintahan melalui peningkatan sarana dan<br />\r\n	prasarana</li>\r\n	<li>Meningkatkan kualitas birokrasi dan akuntabilitas kinerja<br />\r\n	aparatur melalui pemenuhan pelaporan keuangan dan kinerja<br />\r\n	yang berkualitas serta peningkatan kapasitas sumberdaya<br />\r\n	aparatur</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n','2018-07-23 10:19:53','',0),('1532315995','1533562415',3,'Visi Misi','<p><strong>Visi &amp; Misi Kecamatan Tulangan Kabupaten Sidoarjo</strong></p>\r\n\r\n<blockquote>\r\n<p><strong>VISI</strong></p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><em>Kabupaten Sidoarjo yang Inovatif, Mandiri, Sejahtera dan Berkelanjutan</em></strong></span></span></li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p><strong>MISI</strong></p>\r\n</blockquote>\r\n\r\n<ul style=\"margin-left:0.5em; margin-right:0px\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Pemerintahan yang bersih dan akuntabel melalui penyelenggaraan pemerintahan yang aspiratif, partiipasif dan transpraan</strong></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Meningkatnya perekonomian daerah melalui optimalisasi potensi basis industry pengolahan, pertanian, perikanan, pariwista, UMKM dan koperasi serta pemberdayaan masyarakat</strong></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Meningkatnya kualitas dan standar pelayanan pendidika dan kesehatan</strong></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Meningkatkan tatanan kehidupan masyarakat yang berbudaya dan berakhlaqul karimah, berdasarkan keimanan kepada Tuhan YME, serta dapat memelihara kerukunan, ketentraman dan ketertiban</strong></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Infrastruktur public yang memadai dan berkualitas sebagai penunjang pertumbuhan ekonomi dengan memperhatikan kelestarian lingkungan</strong></span></span></li>\r\n</ul>\r\n','2018-07-23 10:19:53','',0),('1532315996','1533562415',4,'Dasar Hukum','<p><strong>DAFTAR KEBIJAKAN SKPD TAHUN 2009 (PRODUK HUKUM YANG DISAHKAN OLEH KEPALA SKPD)&nbsp;</strong><br />\r\n<br />\r\nSKPD : KECAMATAN TULANGAN</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div>JUDUL/TENTANG</div>\r\n			</td>\r\n			<td>\r\n			<div>JENIS SK/ PERATURAN</div>\r\n			</td>\r\n			<td>\r\n			<div>NOMOR</div>\r\n			</td>\r\n			<td>\r\n			<div>TANGGAL</div>\r\n			</td>\r\n			<td>\r\n			<div>MASA BERLAKU</div>\r\n			</td>\r\n			<td>\r\n			<div>MANFAAT BAGI SKPD</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>1</div>\r\n			</td>\r\n			<td>\r\n			<div>2</div>\r\n			</td>\r\n			<td>\r\n			<div>3</div>\r\n			</td>\r\n			<td>\r\n			<div>4</div>\r\n			</td>\r\n			<td>\r\n			<div>5</div>\r\n			</td>\r\n			<td>\r\n			<div>6</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pembentukan panitia pemeriksa barang/jasa pada kecamatan</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/688/404.7.13/2009</td>\r\n			<td>23/11/2009</td>\r\n			<td>Tanggal dietapkan</td>\r\n			<td>Sebagai payung hukum pengadaan barang/jasa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana pembangunan database informasi kearsipan di kecamatan Sidoarjo</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/1336/404.1.3.2/2009</td>\r\n			<td>03/11/2009</td>\r\n			<td>Tanggal dietapkan</td>\r\n			<td>Sebagai pedoman untuk pembangunan database informasi kearsipan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bendahara penerimaan dan bendahara pengeluaran di lingkungan pemkab Sidoarjo</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/66/404.1.3.2/2009</td>\r\n			<td>02/04/2009</td>\r\n			<td>1 Januari 2009</td>\r\n			<td>Sebagai pedoman bendahara pengeluaran</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana peningkatan kerjasama dengan aparat keamanan dalam teknik pencegahan kejahatan</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/95/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana sosialisasi kesetaraan gender, pemberdayaan perempuan dan perlindung dan perlindungan anak</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/81/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>panitia pelaksana fasilitas manajeag menajemen usaha bagi keluarga miskin</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/98/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana Musrenbang Desa</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/97/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana pembinaan kelompok masyarakat desa</td>\r\n			<td>\r\n			<div>SK</div>\r\n			</td>\r\n			<td>188/94/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Panitia pelaksana Tim Jaringan Pusat Perlindungan Perempuan dan anak</td>\r\n			<td>\r\n			<div>&nbsp;</div>\r\n			</td>\r\n			<td>188/96/404.1.3.2/2009</td>\r\n			<td>11/02/2009</td>\r\n			<td>Tanggal ditetapkan</td>\r\n			<td>Sebagai pedoman pelaksanaan kegiatan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n','2018-07-23 10:19:53','',0),('1599576180','1533562415',1,'Penghargaan Camat Terbaik II Se-Kabupaten Sidoarjo','<p>Penghargaan Camat Terbaik II Se-Kabupaten Sidoarjo</p>\r\n','2020-09-08 21:43:00','IMAGE-NEWS-1599576180.jpg',1),('1599577429','1533562415',1,'Permendagri Nomor 109 Tahun 2019','<p>Berdasarkan Permendagri Nomor 109 Tahun 2019 tentan Formulir dan Buku yang digunakan dalam Adminduk, Perncetakan Dokumen Adminduk sekarang menggunakan Kertas HVS A4 80 gram berwarna putih (tanpa security printing) yang dilengkapi dengan Tanda Tangan Elektronik berupa QR Code.</p>\r\n','2020-09-08 22:03:49','IMAGE-NEWS-1599577429.jpg',1),('1599578125','1533562415',1,'cepetmule','<p>cepetmule adalah adalah salah satu inovasi dari kecamatan Tulangan dalam bidang pelayanan kepada masyarakat sebagai upaya untuk memberikan pelayanan terbaik kepada masyarakat dimana moto cepet mule adalah &quot;Cepat, Tepat, Mudah dan Tidak Bertele-tele&quot;. yang dapat diakes melalu cepetmule.kecamatantulangan.net</p>\r\n','2020-09-08 22:15:25','IMAGE-NEWS-1599578125.jpg',1),('1599581437','1533562415',5,'Penghargaan Camat Terbaik II Se-Kabupaten Sidoarjo','<p>Penghargaan Camat Terbaik II Se-Kabupaten Sidoarjo</p>\r\n','2020-09-08 23:10:37','IMAGE-ACV-1599581437.jpg',1);
/*!40000 ALTER TABLE `tb_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_options`
--

DROP TABLE IF EXISTS `tb_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_options`
--

LOCK TABLES `tb_options` WRITE;
/*!40000 ALTER TABLE `tb_options` DISABLE KEYS */;
INSERT INTO `tb_options` (`id`, `name`, `value`) VALUES (1,'url','tulangan.sidoarjokab.go.id'),(2,'sitename','Kecamatan Tulangan'),(3,'slogan','Membangun Daerah Lebih Maju'),(4,'namakadis','DIDIK WIDOYOKO, S.Sos, M.MT'),(6,'email','tulangankec@gmail.com'),(7,'address','JL. Raya Kenongo, No. 20, Tulangan, Kenongo, Kepatihan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61273'),(8,'phone','031-8851616'),(9,'fax','(031) 8851616'),(10,'hours','-'),(99,'counter','<div id=\"histats_counter\"></div>\r\n<!-- Histats.com  START  (aync)-->\r\n<script type=\"text/javascript\">var _Hasync= _Hasync|| [];\r\n_Hasync.push([\'Histats.start\', \'1,4247198,4,1034,150,25,00011000\']);\r\n_Hasync.push([\'Histats.fasi\', \'1\']);\r\n_Hasync.push([\'Histats.track_hits\', \'\']);\r\n(function() {\r\nvar hs = document.createElement(\'script\'); hs.type = \'text/javascript\'; hs.async = true;\r\nhs.src = (\'//s10.histats.com/js15_as.js\');\r\n(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(hs);\r\n})();</script>\r\n<noscript><a href=\"/\" target=\"_blank\"><img  src=\"//sstatic1.histats.com/0.gif?4247198&101\" alt=\"\" border=\"0\"></a></noscript>'),(100,'maps','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8421322661166!2d112.64731031435333!3d-7.482678275858758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e04f5244b02d%3A0x43cb52d0a4893756!2sKantor+Kecamatan+Tulangan!5e0!3m2!1sid!2sid!4v1554364523654!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),(103,'Darurat','112'),(104,'Polisi','110'),(105,'Damkar','123'),(106,'Ambulan','118'),(107,'Tim SAR','122');
/*!40000 ALTER TABLE `tb_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pegawai`
--

DROP TABLE IF EXISTS `tb_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pegawai` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `img` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pegawai`
--

LOCK TABLES `tb_pegawai` WRITE;
/*!40000 ALTER TABLE `tb_pegawai` DISABLE KEYS */;
INSERT INTO `tb_pegawai` (`id`, `name`, `jabatan`, `bagian`, `tahun`, `img`, `status`) VALUES ('1533183053','Pegawai 1','Bagian 1','Jabatan 1','2018','',1),('1533183078','Pegawai 2','Bagian 2','Jabatan 2','2018','',1);
/*!40000 ALTER TABLE `tb_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengumuman`
--

DROP TABLE IF EXISTS `tb_pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pengumuman` (
  `id` varchar(10) NOT NULL,
  `iduser` varchar(10) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `datex` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengumuman`
--

LOCK TABLES `tb_pengumuman` WRITE;
/*!40000 ALTER TABLE `tb_pengumuman` DISABLE KEYS */;
INSERT INTO `tb_pengumuman` (`id`, `iduser`, `title`, `description`, `date`, `datex`, `status`) VALUES ('1538125593','1533562415','What is Lorem Ipsum?','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n','2018-09-28','2018-10-01',0),('1538125608','1533562415','Why do we use it?','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n','2018-09-27','2018-10-01',0),('1538125625','1533562415','Where does it come from?','<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n','2018-09-28','2018-10-01',0);
/*!40000 ALTER TABLE `tb_pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_profil_pimpinan`
--

DROP TABLE IF EXISTS `tb_profil_pimpinan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_profil_pimpinan` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `periode` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil_pimpinan`
--

LOCK TABLES `tb_profil_pimpinan` WRITE;
/*!40000 ALTER TABLE `tb_profil_pimpinan` DISABLE KEYS */;
INSERT INTO `tb_profil_pimpinan` (`id`, `name`, `jabatan`, `periode`, `description`, `img`, `status`) VALUES ('1554366296','DIDIK WIDOYOKO, S.Sos, M.MT','Camat Tulangan','2020','<p><span style=\"background-color:#ffffff; color:#999999; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:13.3333px\">Pangkat:&nbsp;</span><span style=\"background-color:#ffffff; color:#000000; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:13.3333px\">Pembina Tk. I (IV/b) </span></p>\r\n\r\n<p><span style=\"background-color:#ffffff; color:#999999; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:13.3333px\">Jabatan:&nbsp;</span><span style=\"background-color:#ffffff; color:#000000; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:13.3333px\">Camat Tulangan </span></p>\r\n\r\n<p><span style=\"background-color:#ffffff; color:#999999; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:13.3333px\">Lahir:&nbsp;</span>Surabaya, 05 Nopember 1972</p>\r\n','IMAGE-LEADER-1599582672.jpg',1);
/*!40000 ALTER TABLE `tb_profil_pimpinan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_services`
--

DROP TABLE IF EXISTS `tb_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_services` (
  `id` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(1) NOT NULL,
  `colors` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_services`
--

LOCK TABLES `tb_services` WRITE;
/*!40000 ALTER TABLE `tb_services` DISABLE KEYS */;
INSERT INTO `tb_services` (`id`, `name`, `description`, `status`, `colors`) VALUES ('1554366973','Kartu Tanda Penduduk','<p><strong>PENYELENGARAAN PENDAFTARAN PENDUDUK</strong></p>\r\n\r\n<blockquote>\r\n<p><strong>1. KARTU TANDA PENDUDUK</strong></p>\r\n\r\n<p>DASAR HUKUM</p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>Undang-undang Nomor 23 Tahun 2006 Tentang Administrasi Kependudukan</li>\r\n	<li>Peraturan Pemerintah Nomor 37 Tahun 2007 Tentang Pelaksanaan Undang-Undang Nomor 23 Tahun 2006</li>\r\n	<li>Peraturan Daerah Nomor 1 Tahun 2008 Tentang Penyelenggaraan Administrasi Kependudukan</li>\r\n	<li>Peraturan Bupati Nomor 69 Tahun 2008 Tentang Penyelenggaraan Pendaftara Penduduk\r\n	<p>PERSYARATAN PENGURUSAN / PENERBITAN KARTU TANDA PENDUDUK (KTP)</p>\r\n	</li>\r\n</ol>\r\n\r\n<blockquote>\r\n<table style=\"border:undefined; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">JENIS KTP</span></div>\r\n			</td>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">SYARAT</span></div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><span style=\"font-size:x-small\"><strong>KTP baru</strong>&nbsp;bagi penduduk WNI</span></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">Telah berusia 17 tahun atau sudah kawain atau pernah kawin</span></span></li>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">Surat pengantar dari RT/RW dan Kepala Desa/Kelurahan</span></span></li>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">Foto copy KK</span></span></li>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">Foto copy Kutipan Akta Nikah/Akta Kawin bagi penduduk yang berusia 17 tahun</span></span></li>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">Foto copy Kutipan Akta Kelahiran</span></span></li>\r\n				<li><span style=\"font-size:x-small\"><span style=\"font-size:x-small\">SKDLN. bagi penduduk yang datang dari luar negeri karena pindah</span></span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><span style=\"font-size:x-small\"><strong>KTP baru</strong>, bagi Orang Asing Tinggal Tetap</span></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\">Telah berusia 17 tahun atau sudah kawin atau pernah kawin</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy KK</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy Kutipan Akta Nikah/Kawin yang belum berusia 17 tahun</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto Copy Kutipan Akta Kelahiran</span></li>\r\n				<li><span style=\"font-size:x-small\">Paspor dan KITAP bagi orang asing</span></li>\r\n				<li><span style=\"font-size:x-small\">Surat Keterangan Catatan Kepolisian</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><span style=\"font-size:x-small\"><strong>KTP karena hilang atau rusak</strong>&nbsp;bagi WNI</span></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\">Surat Keterangan KEhilangan dari Kepolisisan atau KTP yang rusak</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy KK</span></li>\r\n				<li><span style=\"font-size:x-small\">Paspor dan KITAP bagi orang asing</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:x-small\"><strong>KTP karena pindah datang</strong>&nbsp;bagi WNI atau Orang Asing Tinggal Tetap</span>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\">Surat Keterangan Pindah/Surat Keternagn Pindah Datnga (SKPD)</span></li>\r\n				<li><span style=\"font-size:x-small\">Surat Keterangan Datang dari Luar Negeri (SKDLN) bagi WNI yang datang dari luar negeri karena pindah</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><span style=\"font-size:x-small\"><strong>KTP karena perpanjangan</strong>&nbsp;bagi WNI atau Orang Asing Tinggal Tetap</span></p>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\">Foto copy KK</span></li>\r\n				<li><span style=\"font-size:x-small\">KTP lama</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy paspor</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy izin tinggal tetap</span></li>\r\n				<li><span style=\"font-size:x-small\">Foto copy SKCK bagi orang asing yang tinggal tetap</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:x-small\"><strong>KTP karena perubahan data</strong>&nbsp;bagi WNI atau Orang Asing Tinggal Tetap</span></td>\r\n			<td>\r\n			<ul>\r\n				<li><span style=\"font-size:x-small\">KK lama</span></li>\r\n				<li><span style=\"font-size:x-small\">KTP lama</span></li>\r\n				<li><span style=\"font-size:x-small\">Surat Keterangan/bukti perubahan peristiwa kependudukan dan peristiwa penting</span></li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p><strong>2. PERSYARATAN PENDAFTARAN PENDUDUK WNI PINDAH/TINGGAL SEMENTARA</strong></p>\r\n\r\n<blockquote>\r\n<p>Penduduk&nbsp;<strong>WNI yang akan pindah sementara meliput</strong>i :</p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>Surat pengantar RT/RW</li>\r\n	<li>Foto copy KK dan KTP</li>\r\n	<li>SKCK</li>\r\n	<li>BAgi umur dibawah usia 17 tahun, belum pernah menikah membawa surat izin orang tua</li>\r\n</ul>\r\n\r\n<p><strong>3. PERSYARATAN PENDAFTARAN PINDAH DATANG ANTAR NEGARA</strong></p>\r\n\r\n<blockquote>\r\n<p>1. Penduduk&nbsp;<strong>WNI yang pindah keluar negeri&nbsp;</strong>meliputi :</p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>Surat Pengantar dari RT dan RW diketahui Desa/Kelurahan</li>\r\n	<li>KK</li>\r\n	<li>KTP\r\n	<p>2. Penduduk&nbsp;<strong>WNI yang datang dari luar negeri&nbsp;</strong>adalah paspor atau dokumen pengganti paspor</p>\r\n\r\n	<p>3. Persyaratan Pendaftaran&nbsp;<strong>Orang Asing</strong>&nbsp;yang&nbsp;<strong>datang dari luar negeri</strong>&nbsp;dengan Izin Tinggal Terbatas sebagai berikut :</p>\r\n	</li>\r\n	<li>Paspor</li>\r\n	<li>Kitas bagi Orang Asing yang memiliki Izin Tinggal Terbatas</li>\r\n	<li>SKCK\r\n	<p>4. Pendaftaran<strong>&nbsp;Orang Asing</strong>&nbsp;yang&nbsp;<strong>pindah keluar negeri</strong>&nbsp;yang memiliki Izin Tinggal Terbatas atau Izin Tinggal Terbatas</p>\r\n	</li>\r\n	<li>KK dan KTP bagi Orang Asing yang memiliki Izin Tinggal Tetap</li>\r\n	<li>SKTT bagi Orang Asing yang memiliki Izin Tinggal Tebatas</li>\r\n</ul>\r\n\r\n<p><strong>4. PENDAFTARAN PERUBAHAN STATUS ORANG ASING TINGGAL TERBATAS MENJADI ORANG ASING TINGGAL TETAP</strong></p>\r\n\r\n<blockquote>\r\n<p>Persyaratan Perubahan status Orang Asing Tinggal Terbatas menjadi Orang Asing Tinggal Tetap meliputi :</p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>PAspor</li>\r\n	<li>Surat Keterangan Tempat Tinggal</li>\r\n	<li>Kartu Izin Tinggal Tetap</li>\r\n	<li>STMD/SKLD dari Kepolisian</li>\r\n</ul>\r\n\r\n<p><strong>5. PENDAFTARAN PERISTIWA KEPENDUDUKAN</strong></p>\r\n\r\n<blockquote>\r\n<p>1. Persyaratan Pelaporan Pindah Datang Pendudk WNI Dalam Wilayah NKRI :</p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>Surat pengantar RT/RW diketahui Desa/Kelurahan</li>\r\n	<li>KK dan KTP\r\n	<p>2. Persyaratan Pelaporan Pindah Datang Orang Asing Dalam Wilayah NKRI</p>\r\n	</li>\r\n	<li><strong>Orang asing Tinggal Tetap:</strong>\r\n	<ol>\r\n		<li>KK dan KTP</li>\r\n		<li>Foto copy paspor, dan menunjukkan asli</li>\r\n		<li>Foto copy KITAP</li>\r\n		<li>Menunjukkan buku pengawas Orang Asing</li>\r\n		<li>SKCK</li>\r\n	</ol>\r\n	</li>\r\n	<li><strong>Orang Asing Tinggal Terbatas :</strong>\r\n	<ol>\r\n		<li>SKTT (Surat Keterangan Tempat Tinggal)</li>\r\n		<li>Foto copy paspor asli dan menunjukkan Asli</li>\r\n		<li>Foto copy KITAS</li>\r\n		<li>SKCK</li>\r\n	</ol>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>BIAYA (RETRIBUSI)</strong></p>\r\n\r\n<blockquote>\r\n<table style=\"border:undefined; width:59%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">NO</span></div>\r\n			</td>\r\n			<td colspan=\"2\">\r\n			<div><span style=\"font-size:x-small\">JENIS</span></div>\r\n			</td>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">BIAYA</span></div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<div><span style=\"font-size:x-small\">1.</span></div>\r\n			</td>\r\n			<td rowspan=\"2\"><span style=\"font-size:x-small\">KTP</span><span style=\"font-size:x-small\">&nbsp;</span></td>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">WNI</span></div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. -</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">WNA</span></div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. 50.000,-</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">2.</span></div>\r\n			</td>\r\n			<td colspan=\"2\"><span style=\"font-size:x-small\">SKTTS</span>\r\n			<div>&nbsp;</div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. 5.000,-</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">3.</span></div>\r\n			</td>\r\n			<td colspan=\"2\"><span style=\"font-size:x-small\">SKTT-TAS Orang Asing</span>\r\n			<div>&nbsp;</div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp.100.000,-</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">4.</span></div>\r\n			</td>\r\n			<td colspan=\"2\"><span style=\"font-size:x-small\">SKTT-TAP Orang Asing</span>\r\n			<div>&nbsp;</div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. 150.000,-</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<div><span style=\"font-size:x-small\">5.</span></div>\r\n			</td>\r\n			<td rowspan=\"2\"><span style=\"font-size:x-small\">Surat Keterangan Pindah Datang</span><span style=\"font-size:x-small\">&nbsp;</span></td>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">WNI</span></div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. 5.000,-</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div><span style=\"font-size:x-small\">WNA</span></div>\r\n			</td>\r\n			<td><span style=\"font-size:x-small\">Rp. 25.000,-</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</blockquote>\r\n</blockquote>\r\n',1,'#f44336'),('1554367043','Kartu Keluarga','<p>PENYELENGARAAN PENDAFTARAN PENDUDUK</p>\r\n\r\n<blockquote>\r\n<p>DASAR HUKUM</p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>Undang-undang Nomor 23 Tahun 2006 Tentang Administrasi Kependudukan</li>\r\n	<li>Peraturan Pemerintah Nomor 37 Tahun 2007 Tentang Pelaksanaan Undang-Undang Nomor 23 Tahun 2006</li>\r\n	<li>Peraturan Daerah Nomor 1 Tahun 2008 Tentang Penyelenggaraan Administrasi Kependudukan</li>\r\n	<li>Peraturan Bupati Nomor 69 Tahun 2008 Tentang Penyelenggaraan Pendaftara Penduduk\r\n	<p>PERSYARATAN PENGURUSAN/PENERBITAN KARTU KELUARGA (KK)</p>\r\n	</li>\r\n</ol>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div>JENIS KK</div>\r\n			</td>\r\n			<td>\r\n			<div>SYARAT</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>KK baru bagi penduduk WNI</td>\r\n			<td>\r\n			<ol>\r\n				<li>Foto copy atau menunjukkan Kutipan Akta Nikah/Kutian Akta Perkawinan</li>\r\n				<li>Surat Keterangan Pindah/Surat Keterangan Pindah Datang bagi penduduk yang pindah dalam wilayah NKRI</li>\r\n				<li>Surat Keterangan Datang dari Luar Negeri yang diterbitkan Dispencapil bagi WNI yang datang dari luar negeri karena pindah</li>\r\n				<li>Mengisi data keluarga dan biodaya setiap anggota</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>KK baru bagi Orang Asing</td>\r\n			<td>\r\n			<ol>\r\n				<li>Foto copy pasport</li>\r\n				<li>Foto copy KITAP</li>\r\n				<li>SKTT (Surat Keterangan Tinggal Tetap)</li>\r\n				<li>STMD/SKLD dari Kepolisian</li>\r\n				<li>SKPD (Surat Keterangan Pindah Datang)</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Perubahan KK karena penambahananggota keluarga karena kelahiran</td>\r\n			<td>\r\n			<ol>\r\n				<li>KK lama</li>\r\n				<li>Foto copy Kutipan Akta Kelahiran</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Perubahan KK karena penambahan&nbsp;anggota keluarga untuk&nbsp;menumpangkedalam KK bagi penduduk WNI</td>\r\n			<td>\r\n			<ol>\r\n				<li>KK lama anggota keluarga yang akan menumpang</li>\r\n				<li>KK yang akan ditumpangi</li>\r\n				<li>Surat Keterangan Pindah Datang bagi penduduk yang pindah dalam wilayah NKRI</li>\r\n				<li>Surat Keterangan Datang dari Luar Negeri bagi WNI yang datang dari luar negeri karena pindah</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Perubahan KK karena penambahananggota keluarga&nbsp;bagi Orang Asing&nbsp;yang memiliki Izin Tinggal Tetap untuk menumpang ke dalam KK WNI atau orang asing</td>\r\n			<td>\r\n			<ol>\r\n				<li>KK lama dan KK yang ditumpang</li>\r\n				<li>paspor</li>\r\n				<li>Ijin Tinggal Tetap</li>\r\n				<li>SKCK bagi orang asing tinggal tetap</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Perubahan KK karena pengurangan&nbsp;anggota keluarga dalam KK bagi penduduk WNI dan orang asing</td>\r\n			<td>\r\n			<ol>\r\n				<li>KK lama</li>\r\n				<li>Surat Keterangan Kematian atau,</li>\r\n				<li>SKPD/Surat keterangan Datang bagi penduduk yang pindah dalam wilayah NKRI</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>KK karena hilang atau rusak</td>\r\n			<td>\r\n			<ol>\r\n				<li>Surat Keterangan dari Kepala Desa/Kelurahan</li>\r\n				<li>KK yang rusak</li>\r\n				<li>Foto copy/menunjukkan dokumen kependudukan dari salah satu keluarga</li>\r\n				<li>dokumen keimigrasian bagi orang asing</li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n',1,'#3f51b5'),('1554367128','Pembayaran Pajak','<p style=\"text-align:justify\"><strong>&nbsp;PAJAK PENERANGAN JALAN</strong></p>\r\n\r\n<blockquote>\r\n<p>1. DASAR HUKUM</p>\r\n\r\n<ol>\r\n	<li>Undang-undang No. 22 Th. 1999 tentang Pemerintah Daerah;</li>\r\n	<li>Undang-undang No.34 Th. 2000 tentang Perubahan Atas Undang-undang Republik Indonesia No. 18 Th. 1997 Tentang Pajak Daerah dan Retribusi Daerah;</li>\r\n	<li>Peraturan Pemerintah No.25 Th. 2000 tentang Kewenangan Propinsi sebagai Daerah Otonom;</li>\r\n	<li>Peraturan Pemerintah No.65 Th. 2001 tentang Pajak Daerah;</li>\r\n	<li>Peraturan Daerah Kabupaten Sidoarjo 7 Th. 2008 tentang Perubahan Peraturan Daerah Kabupaten Sidoarjo No. 12 Th. 2001 Tentang Pajak Penerangan Jalan.</li>\r\n</ol>\r\n\r\n<p>2. OBJEK PAJAK</p>\r\n\r\n<ol>\r\n	<li>Objek Pajak adalah setiap penggunaan tenaga listrik yang berasal / disalurkan dari PLN.</li>\r\n	<li>Tidak Termasuk Objek Pajak adalah:</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>Penggunaan tenaga listrik oleh instansi pemerintah daerah</li>\r\n	<li>Penggunaan tenaga listrik pada tempat-tempat yang di gunakan oleh kedutaan, konsulat, perwakilan asing dan lembaga - lembaga internasional dengan asas timbal balik</li>\r\n	<li>Penggunaan tenaga listrik yang berasal dari bukan PLN untuk keperluan rumah tangga dengan apasitas tidak lebih dari 3.000 watt.</li>\r\n	<li>Penggunaan tenaga listrik yan khusus digunakan untuk tempat ibadah.\r\n	<p>3. DASAR PENGENAAN DAN TARIF PAJAK</p>\r\n\r\n	<p>Dasar pengenaan pajak adalah nilai jual tenaga listrik, yang ditetapkan sebagai berikut:</p>\r\n\r\n	<ol>\r\n		<li>Tenaga listrik berasal dari PLN, nilai jual tenaga listrik adalah besarnya tagihan biaya pemakaian listrik / rekening listrik</li>\r\n		<li>Tenaga listrik berasal dari bukan PLN dengan tidak dipungut bayaran, nilai jual tenaga listrik dihitung berdasarkan kapasitas tersedia dan penggunaan atau taksiran penggunaan listrik serta harga satuan listrik yang berlaku di wilayah daerah.</li>\r\n	</ol>\r\n\r\n	<p>4. TARIF PAJAK</p>\r\n\r\n	<p>Tarif pajak untuk kegiatan industri, pertambangan minyak bumi dan gas alam baik yang berasal dari PLN maupun bukan dari PLN ditetapkan sebesar 10% dari nilai jual tenaga listrik.</p>\r\n\r\n	<p>nilai jual tenaga listrik untuk kegiatan tersebut ditetapkan sebesar 30% dari pemakaian tenaga listrik, tarif pajak selain kegiatan tersebut ditetapkan :</p>\r\n	</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>yang berasal dari PLN sebesar 9% dari nilai jual tenaga listrik</li>\r\n	<li>yang berasal dari bukan PLN sebesar 10% dari nilai jual tenaga listrik\r\n	<p>pemakaian tenaga listrik bukan dari PLN dapat diukur dari</p>\r\n\r\n	<ol>\r\n		<li>Kwh Meter</li>\r\n		<li>Hour Meter</li>\r\n		<li>Jam Operasional,</li>\r\n	</ol>\r\n\r\n	<p>- Pemakaian Tenaga Listrik Bukan dari PLN, apabila menggunakan Kwh meter maka pengenaan pajaknya berdasarkan besaran Kwh meter</p>\r\n\r\n	<p>- Pemakaian tenaga listrik bukan dari PLN, apabila menggunakan Kwh/Hour meter, ditentukan jumlah jam operasional minimal yang ditetapkan sebagai berikut:</p>\r\n\r\n	<ol>\r\n		<li>penggunaan utama 240 jam / bln</li>\r\n		<li>penggunaan cadangan 120 jamm / bln</li>\r\n		<li>pengunaan darurat 30 jam / bln</li>\r\n	</ol>\r\n\r\n	<p>GOL TARIF KAPASITAS DAYA TDL (Rp.)</p>\r\n	</li>\r\n</ol>\r\n\r\n<table border=\"1\" style=\"-webkit-text-stroke-width:0px; background-color:#3366ff; color:#000000; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; orphans:2; text-align:justify; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:49%; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div>GOL TARIF</div>\r\n			</td>\r\n			<td>\r\n			<div>KAPSITAS DAYA</div>\r\n			</td>\r\n			<td>\r\n			<div>TDL (Rp)</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>I-2</div>\r\n			</td>\r\n			<td>14.001 VA s/d 200 KVA</td>\r\n			<td>\r\n			<div>44O</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>I-3</div>\r\n			</td>\r\n			<td>201 KVA Keatas</td>\r\n			<td>\r\n			<div>439</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>I-4</div>\r\n			</td>\r\n			<td>30.000 KVA Keatas</td>\r\n			<td>\r\n			<div>434</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>BISNIS</td>\r\n			<td colspan=\"2\">\r\n			<div>&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>B-2</div>\r\n			</td>\r\n			<td>2.201 VA s/d 200 KVA</td>\r\n			<td>\r\n			<div>520</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>B-3</div>\r\n			</td>\r\n			<td>201 KVA keatas</td>\r\n			<td>\r\n			<div>452</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SOSIAL</td>\r\n			<td colspan=\"2\">\r\n			<div>&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>S-2</div>\r\n			</td>\r\n			<td>2.201 VA s/d 200 KVA</td>\r\n			<td>\r\n			<div>380</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>S-3</div>\r\n			</td>\r\n			<td>201 KVA keatas</td>\r\n			<td>\r\n			<div>325</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">1-2 14</p>\r\n\r\n<blockquote>\r\n<p>5. RUMUS PERHITUNGAN PAJAK</p>\r\n\r\n<p>Kwh meter</p>\r\n\r\n<p>Pajak = Tarif x (meter bulan ini - meter bulan lalu) x F kali x TDL</p>\r\n\r\n<p>Hour meter</p>\r\n\r\n<p>Pajak = Tarif x (kap daya x (meter bulan ini - meter bulan lalu) TDL</p>\r\n\r\n<p>Jam Operasional</p>\r\n\r\n<p>Pajak = Tarif x (Kap Daya X Jam ops x TDL)</p>\r\n</blockquote>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>2.PAJAK HOTEL</strong></p>\r\n\r\n<blockquote>\r\n<p>1. DASAR HUKUM</p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>Undang-undang No. 22 Th. 1999 tentang Pemerintah Daerah;</li>\r\n	<li>Undang-undang No.34 Th. 2000 tentang Perubahan Atas Undang-undang Republik Indonesia No. 18 Th. 1997 Tentang Pajak Daerah dan Retribusi Daerah;</li>\r\n	<li>Peraturan Pemerintah No.25 Th. 2000 tentang Kewenangan Propinsi sebagai Daerah Otonom;</li>\r\n	<li>Peraturan Pemerintah No.65 Th. 2001 tentang Pajak Daerah;</li>\r\n	<li>Peraturan Daerah Kabupaten Sidoarjo NO.3 Th. 2008 tentang Perubahan atas Peraturan Daerah Kabupaten Sidoarjo No. 8Th. 2001 Tentang Pajak Hotel.\r\n	<p>2. OBJEK PAJAK</p>\r\n\r\n	<p>Setiap pelayanan yang di sediakan hotel dengan pembayaran, seperti fasilitas penginapan, fasilitas olah raga dan hiburan yang disediakan khusus oleh tamu hotel bukan untuk tamu umum.</p>\r\n\r\n	<p>3. DASAR PENGENAAN DAN TARIF PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>tarif pajak ditetapkan sebesar 10%</p>\r\n	</blockquote>\r\n\r\n	<p>4. RUMUS PERHITUNGAN PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>pajak = dasar pengenaan x tarif pajak</p>\r\n	</blockquote>\r\n\r\n	<p>5. MASA PAJAK DAN MASA PAJAK TERUTANG</p>\r\n\r\n	<blockquote>\r\n	<p>masa pajak adalah jangka waktu yang lamanya 1 bulan takwin, pajak yang terutang dalam masa pajak terjadi pada saat pelayanan di hotel atau di terbitkan SKPD</p>\r\n	</blockquote>\r\n\r\n	<p>6. TEMPAT PEMBAYARAN ATAU (PPJ)</p>\r\n\r\n	<blockquote>\r\n	<p>pembayaran pajak di lakukan di kas umum daerah atau tempat lain yang ditunjuk oleh bupati sesuai waktu yang di tentukan dalam SPTPD, SKPD, SKPDKB, SKPDKBT, dan STPD</p>\r\n	</blockquote>\r\n	</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>3. PAJAK RESTORAN</strong></p>\r\n\r\n<blockquote>\r\n<p>1. DASAR HUKUM</p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>Undang-undang No. 22 Th. 1999 tentang Pemerintah Daerah;</li>\r\n	<li>Undang-undang No.34 Th. 2000 tentang Perubahan Atas Undang-undang Republik Indonesia No. 18 Th. 1997 Tentang Pajak Daerah dan Retribusi Daerah;</li>\r\n	<li>Peraturan Pemerintah No.25 Th. 2000 tentang Kewenangan Propinsi sebagai Daerah Otonom;</li>\r\n	<li>Peraturan Pemerintah No.65 Th. 2001 tentang Pajak Daerah;</li>\r\n	<li>Peraturan Daerah Kabupaten Sidoarjo NO.4 Th. 2008 tentang Perubahan atas Peraturan Daerah Kabupaten Sidoarjo No. 9 Th. 2001 Tentang Pajak restoran.\r\n	<p>2. OBJEK PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>Setiap pelayanan yang disediakan oleh restoran dengan di pungut bayaran termasuk di rumah makan, warung makanan, cafetaria, bar, edagang kaki lima dan sejenisnya.</p>\r\n\r\n	<p>tidak termasuk objek pajak:</p>\r\n\r\n	<p>Setiap pelayanan yang disediakan oleh restoran dengan di pungu bayaran termasuk di rumah makan, warung makanan, cafetaria, bar, edagang kaki lima dan sejenisnya yang pembayarannya kuran dari 2 juta /bulan</p>\r\n	</blockquote>\r\n\r\n	<p>3. WAJIB PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>pengusaha yang mempunyai omset penjualan 2 juta atau lebih tiap bulan.</p>\r\n	</blockquote>\r\n\r\n	<p>4. DASAR PENGENAAN PAJAK DAN TARIF PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>Setiap pelayanan yang disediakan oleh restoran dengan di pungut bayaran termasuk di rumah makan, warung makanan, cafetaria, bar, edagang kaki lima dan sejenisnya di kenakan tarif sebesar 10%.</p>\r\n	</blockquote>\r\n\r\n	<p>5. RUMUS PERHITUNGAN PAJAK</p>\r\n\r\n	<blockquote>\r\n	<p>Pajak = dasar pengenaan x Tarif Pajak</p>\r\n	</blockquote>\r\n\r\n	<p>6. MASA PAJAK DAN MASA PAJAK TERUTANG</p>\r\n\r\n	<blockquote>\r\n	<p>masa pajak adalah jangka waktu yang lamanya 1 bulan takwin, pajak yang terutang dalam masa pajak terjadi pada saat pelayanan di hotel atau di terbitkan SKPD</p>\r\n	</blockquote>\r\n\r\n	<p>7. TEMPAT PEMBAYARAN ATAU (PPJ)</p>\r\n\r\n	<blockquote>\r\n	<p>pembayaran pajak di lakukan di kas umum daerah atau tempat lain yang ditunjuk oleh bupati sesuai waktu yang di tentukan dalam SPTPD, SKPD, SKPDKB, SKPDKBT, dan STPD.</p>\r\n	</blockquote>\r\n	</li>\r\n</ol>\r\n',1,'#4caf50'),('1554367185','Pelayanan Lain-lain','<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>PENCATATAN SIPIL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>1.PENCATATAN PERKAWINAN</p>\r\n\r\n			<blockquote>\r\n			<p>1. DASAR HUKUM</p>\r\n\r\n			<ul>\r\n				<li>Undang-undang No.1 Tahun 1974 tentang Perkawinan Peraturan Pemerintah No. 9 Tahn 1975 tentang Petunjuk Pelaksanaan UU No. 1 Tahun 1974.</li>\r\n				<li>Undang-undang RI No.23 Tahun 2006 tentang Administrasi Kependudukan Peraturan Daerah No. 1 Tahun 2008 Tentang Penyelenggaraan Administrasi Kependudukna di Kabupaten Sidoarjo.</li>\r\n				<li>Peraturan Bupati Sidoarjo No. 70 Tahun 2008 tentang Penyelenggaraan Pencatatan Sipil.</li>\r\n			</ul>\r\n\r\n			<p>2. KETENTUAN</p>\r\n\r\n			<ol>\r\n				<li>Perkawinan yang telah dilangsungkan Pemuka Agama harus dicatatkan pada Kantor / Instansi pelaksana</li>\r\n				<li>Jangka waktu pencatatan selambat-lambatnya 60 hari kerja sejak perkawinan sesuai pasal 27 ayat 1 Perda No. 1 Tahun 2008.</li>\r\n			</ol>\r\n\r\n			<p>3. PENGERTIAN PERKAWINAN</p>\r\n\r\n			<blockquote>\r\n			<p>Perkawinan adalah suatu ikatan lahir dan batin antara seorang pria dan seorang wanita sebgai suami istri dengan tujuan membentuk keluarga /rumah tangga yang bahagia dan kekal berdasarkan ke-Tuhanan Yang Maha Esa (pasal 1 UU No. 1 Tahun 1974).</p>\r\n			</blockquote>\r\n\r\n			<p>4. PERSYARATAN ADMINISTRASI</p>\r\n\r\n			<ol>\r\n				<li>Surat Keterangan telah terjadi perkawinan dari pemuka agama/pendeta atau surat perkawinan Penghayat Kepercayaan yang ditanda tangani oleh Pemuka Penghayat Kepercayaan</li>\r\n				<li>KTP suami dan istri</li>\r\n				<li>Pas foto suami dan istri</li>\r\n				<li>Kutipan Akta Kelahiran suami dan istri</li>\r\n				<li>Surat Keterangan dari Desa/kelurahan N1, N2, N3, N4 asli</li>\r\n				<li>Paspor bagi suami atau istri bagi Orang Asing</li>\r\n			</ol>\r\n\r\n			<p>5. BATAS WAKTU PENYELESAIAN</p>\r\n\r\n			<p>Akta Perkawinan : 14 hari kerja</p>\r\n\r\n			<p>6. BIAYA (RETRIBUSI)</p>\r\n\r\n			<blockquote>\r\n			<p>1. Dalam Kantor</p>\r\n			</blockquote>\r\n\r\n			<ul>\r\n				<li>WNI : Rp. 105.000,-</li>\r\n				<li>WNA : RP. 135.000,-\r\n				<p>2. Luar Kantor</p>\r\n				</li>\r\n				<li>WNI : Rp. 140.000,-</li>\r\n				<li>WNA : Rp. 195.000,-</li>\r\n			</ul>\r\n			</blockquote>\r\n\r\n			<p>2. PENCATATAN PERCERAIAN</p>\r\n\r\n			<blockquote>\r\n			<p>1. KETENTUAN</p>\r\n\r\n			<blockquote>\r\n			<p>Setiap perceraian yang telah mendapatkan penetapan Pengadilan Negeri harus didaftarkan selambat-lambatnya 60 (enam puluh) hari sejak Keputusan Pengadilan Negeri yang telah mempunyai kekuatan hukum tetap pasal 32 ayat 1 Perda No. 1 Tahun 2008.</p>\r\n			</blockquote>\r\n\r\n			<p>2. PERSYARATAN ADMINISTRASI</p>\r\n\r\n			<p>Persyaratan Umum</p>\r\n\r\n			<ol>\r\n				<li>Surat Keputusan Perceraian asli dari Pengadilan Negeri</li>\r\n				<li>Kutipan Akta Perkawinan Asli</li>\r\n				<li>Foto copy KTP dan KK</li>\r\n				<li>Foto copy Akta Kelahiran</li>\r\n				<li>Pas Foto ukuran 3x4 cm 2 (dua) lembar</li>\r\n				<li>Mengisi formulir</li>\r\n			</ol>\r\n\r\n			<p>Persyaratan Khusus</p>\r\n\r\n			<p>Bagi Warga Negara Asing melampirkan :</p>\r\n\r\n			<ol>\r\n				<li>Foto copy dan menunjukkan dokumen asli dari imigrasi Paspor, KITAP, KITAS, Visa dan STMD dari Kepolisian</li>\r\n				<li>Semua dokumen yang berbahasa asing diterjemahkan kedalam bahasa Indonesia</li>\r\n			</ol>\r\n\r\n			<p>BATAS WAKTU PENYELESAIAN</p>\r\n\r\n			<p>Akta perceraian : 2 hari kerja</p>\r\n\r\n			<p>Biaya (Retribusi) : Rp. 25.000,-</p>\r\n			</blockquote>\r\n\r\n			<p>3. PENCATATAN KELAHIRAN</p>\r\n\r\n			<blockquote>\r\n			<p>1. AKTA KELAHIRAN WNI</p>\r\n			</blockquote>\r\n\r\n			<blockquote>\r\n			<p>A. Tepat Waktu Pelaporan</p>\r\n\r\n			<ul>\r\n				<li>Akta Kelahiran Pokok (LAhir Baru 0 - 60 hari kerja)</li>\r\n				<li>Lahir di Sidoarjo baik penduduk luar Kabupaten Sidoarjo</li>\r\n			</ul>\r\n\r\n			<p>B.Terlamabat Pelaporan</p>\r\n\r\n			<ul>\r\n				<li>Akta Kelahiran Dispensasi (Lahir sebelum dan sampai tanggal 31 Desember 1985, tidak terikat pada tempat kelahiran dan berdomisili di Kabupaten Sidoarjo)</li>\r\n				<li>Akta Kelahiran Istimewa (Lahir sejak tanggal 1 Januari 1986 sampai saat ini mengalami keterlambatan pelaporan, tidak terikat pada tempat kelahiran dan berdomisili di Kabupaten Sidoarjo)</li>\r\n			</ul>\r\n			</blockquote>\r\n\r\n			<ul>\r\n			</ul>\r\n\r\n			<blockquote>\r\n			<p>2. PERSYARATAN ADMINISTRASI</p>\r\n			</blockquote>\r\n\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td>Persyaratan Umum</td>\r\n						<td>Persyaratan Khusus (Bagi Orang Asing)</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<ol>\r\n							<li>Permohonan untuk memperoleh kutipan akta</li>\r\n							<li>Surat Keterangan Kelahiran dari Dokter/Bidan/Penolong Kelahiran</li>\r\n							<li>surat Keterangan Kelahiran dari Desa/Kelurahan Triplikat</li>\r\n							<li>Foto copy KK dan KTP orang tu</li>\r\n							<li>Nama dan identitas saksi klahiran</li>\r\n							<li>Foto copy Akta Nikah/Akta Perkawinan Orang Tua</li>\r\n							<li>Bagi WNI yang lahir di luar negeri wajib dilaporkan selambat-lambatnya 30 hari kerja sejak kembali ke Indonesia berdasrkan sebagaimana dimaksud dalam pasal 25 ayat 1 Perda Nomor 1 Tahun 2008</li>\r\n						</ol>\r\n						</td>\r\n						<td>\r\n						<ol>\r\n							<li>Foto copy KK/KTP orang tua bagi pemegang Izin Tinggal Tetap</li>\r\n							<li>Surat Keterangan Tempat Tinggal oarang tua bagi pemegang ijin Tinggal Terbatas dan / atau</li>\r\n							<li>Paspor bagi pemegang Izin Kunjungan</li>\r\n							<li>Pelaporan melebihi bata waktu harus melalui Sidaang Pengadilan Negeri</li>\r\n						</ol>\r\n\r\n						<p>&nbsp;</p>\r\n\r\n						<p>&nbsp;</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<blockquote>\r\n			<p>3. PENGANGKATAN ANAK</p>\r\n			</blockquote>\r\n\r\n			<blockquote>\r\n			<p>Persyaratannya antara lain :</p>\r\n\r\n			<ol>\r\n				<li>Penetapan Pengadilan Negeri tentang pengangkatan anak.</li>\r\n				<li>Kutipan Akta Kelahiran bagi yang sudah memilki Akta Kelahiran asli.</li>\r\n				<li>Foto copy Kutipan Akta Nikah/Akta Perkawinan orang tua angkat.</li>\r\n				<li>Foto copy KTP dan KK</li>\r\n				<li>Foto copy dan menunjukkan dokumen asli berupa Pasport/KITAS/KITAP Visa dan / atau STMD bagi Warga Negara ASing</li>\r\n			</ol>\r\n			</blockquote>\r\n\r\n			<ol>\r\n			</ol>\r\n\r\n			<blockquote>\r\n			<p>4. KEGUNAAN AKTA KELAHIRAN</p>\r\n\r\n			<ol>\r\n				<li>untuk mengurus hak keperdataan</li>\r\n				<li>Untuk mengetahui status anak terhadap orang tua</li>\r\n				<li>Untuk persyaratansekolah, paspor, melamar pekerjaan dan lain-lain.</li>\r\n			</ol>\r\n\r\n			<p>5. BIAYA (RETRIBUSI)</p>\r\n\r\n			<blockquote>\r\n			<p>Akta Kelahiran WNI : Rp.- (Gratis Retribusi)</p>\r\n\r\n			<blockquote>\r\n			<blockquote>\r\n			<blockquote>\r\n			<p>WNA : Rp. 40.000,-</p>\r\n			</blockquote>\r\n			</blockquote>\r\n			</blockquote>\r\n			</blockquote>\r\n			</blockquote>\r\n\r\n			<p>4. PENCATATN KEMATIAN</p>\r\n\r\n			<blockquote>\r\n			<p>1. PERSYARATAN ADMINISTRASI</p>\r\n\r\n			<p>Persayaratan Umum</p>\r\n\r\n			<ol>\r\n				<li>Surat Kematian asli dari Rumah Sakit / Dokter / Puskesmas</li>\r\n				<li>Surat Kematian asli dari Desa / Kelurahan</li>\r\n				<li>Foto copy KTP dan KK dengan menunjukkan aslinya</li>\r\n				<li>Kutipan Akta Kelahiran Asli yang bersangkutan</li>\r\n				<li>Mengisi blangko permohonan</li>\r\n			</ol>\r\n\r\n			<p>Persyaratan Umum</p>\r\n\r\n			<p>Bagi Orang Asing harus melampirkan :</p>\r\n\r\n			<ol>\r\n				<li>Surat Keterangan Kematian dari Doker/Paramedis</li>\r\n				<li>foto copy KK dan KTP orang asing yang memiliki Izin Tinggal Tetap</li>\r\n				<li>Foto copy Surat Keterangan Tempat Tinggal bagi orang asing yang memiliki Izin Tinggal Terbatas</li>\r\n				<li>Foto copy Paspor</li>\r\n				<li>Pelaporan melebihi batas waktu harus melalui Sidang Pengadilan</li>\r\n			</ol>\r\n\r\n			<p>2. KEGUNAAN AKTA KEMATIAN</p>\r\n\r\n			<ol>\r\n				<li>Untuk pengurusan hak keperdataan</li>\r\n				<li>Untuk mmengusrus asuransi</li>\r\n				<li>Sebagai persyaratan untuk melaksanakan perkawinan bagi janda / duda almarhum yang akan melaksanakan perkawinan lagi</li>\r\n			</ol>\r\n\r\n			<p>3. BIAYA ( RETRIBUSI )</p>\r\n			</blockquote>\r\n\r\n			<blockquote>\r\n			<p>Akta Kematian : Rp. 10.000,-</p>\r\n			</blockquote>\r\n\r\n			<ol>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n',1,'#03a9f4');
/*!40000 ALTER TABLE `tb_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `id` varchar(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `full_name`, `email`, `password`, `level`, `status`) VALUES ('1533562415','Administrator','tulangan@sidoarjokab.go.id','$2y$10$LeLBa76tshFQsse8akgxC.CkkZquPZO4agtSlYFPQstQuAQyQ.7k6',1,1);
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_video`
--

DROP TABLE IF EXISTS `tb_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_video` (
  `id` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_video`
--

LOCK TABLES `tb_video` WRITE;
/*!40000 ALTER TABLE `tb_video` DISABLE KEYS */;
INSERT INTO `tb_video` (`id`, `title`, `url`, `status`) VALUES ('1538361932','Upacara Penurunan Bendera HUT R.I ke 73 Tahun 2018','https://www.youtube.com/watch?v=UrgwsHBt5z0',1),('1538363154','Kabupaten Sidoarjo Gelar Undian Parkir Berlangganan Tahun 2018','https://www.youtube.com/watch?v=RA_scO25l64',1),('1538363184','Bupati Sidoarjo Resmikan Pembangunan Kantor Desa Dukuh Tengah Kecamatan Buduran','https://www.youtube.com/watch?v=89EJV3jxvmg',1),('1568187867','Karnaval Desa Tlasih Kecamatan Tulangan Tahun 2019','https://www.youtube.com/watch?v=gGKWXJSwDos',1);
/*!40000 ALTER TABLE `tb_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'kectulan_web'
--

--
-- Dumping routines for database 'kectulan_web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09  9:15:19
