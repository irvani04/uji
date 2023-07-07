# Host: localhost  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2023-07-07 21:09:08
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "answers"
#

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4;

#
# Data for table "answers"
#

INSERT INTO `answers` VALUES (26,12,'cake',1,'2023-06-18 22:28:44','2023-06-18 22:28:44'),(27,12,'coke',0,'2023-06-18 22:28:44','2023-06-18 22:28:44'),(28,12,'strawberry',0,'2023-06-18 22:28:44','2023-06-18 22:28:44'),(29,12,'rice',0,'2023-06-18 22:28:44','2023-06-18 22:28:44'),(30,13,'ice cream',0,'2023-06-18 22:29:51','2023-06-18 22:29:51'),(31,13,'bakso',0,'2023-06-18 22:29:51','2023-06-18 22:29:51'),(32,13,'cendol',0,'2023-06-18 22:29:51','2023-06-18 22:29:51'),(33,13,'mie ayam',1,'2023-06-18 22:29:51','2023-06-18 22:29:51'),(34,14,'hijau',0,'2023-06-18 22:30:26','2023-06-18 22:30:26'),(35,14,'putih',0,'2023-06-18 22:30:26','2023-06-18 22:30:26'),(36,14,'hitam',0,'2023-06-18 22:30:26','2023-06-18 22:30:26'),(37,14,'krem',1,'2023-06-18 22:30:26','2023-06-18 22:30:26'),(38,15,'susah lapar',0,'2023-06-22 16:48:09','2023-06-22 16:48:09'),(39,15,'susah tidur',1,'2023-06-22 16:48:09','2023-06-22 16:48:09'),(40,15,'cepat lapar',0,'2023-06-22 16:48:09','2023-06-22 16:48:09'),(41,15,'cepat tidur',0,'2023-06-22 16:48:09','2023-06-22 16:48:09'),(42,16,'susah lapar',0,'2023-06-22 16:48:13','2023-06-22 16:48:13'),(43,16,'susah tidur',1,'2023-06-22 16:48:13','2023-06-22 16:48:13'),(44,16,'cepat lapar',0,'2023-06-22 16:48:13','2023-06-22 16:48:13'),(45,16,'cepat tidur',0,'2023-06-22 16:48:14','2023-06-22 16:48:14'),(46,17,'1 m - 1,5 m',1,'2023-07-05 20:35:46','2023-07-05 20:35:46'),(47,17,'1,25 m - 1,75 m',0,'2023-07-05 20:35:46','2023-07-05 20:35:46'),(48,17,'1,5 m - 2m',0,'2023-07-05 20:35:46','2023-07-05 20:35:46'),(49,17,'1,5 m - 2,25 m',0,'2023-07-05 20:35:46','2023-07-05 20:35:46'),(50,18,'Kesesuain terhadap jenis pekerjaan',0,'2023-07-05 20:37:30','2023-07-05 20:37:30'),(51,18,'Kemudian untuk bekerja',0,'2023-07-05 20:37:31','2023-07-05 20:37:31'),(52,18,'Cepat mengeras',1,'2023-07-05 20:37:31','2023-07-05 20:37:31'),(53,18,'Kekuatan',0,'2023-07-05 20:37:31','2023-07-05 20:37:31'),(54,19,'Kesesuain terhadap jenis pekerjaan',0,'2023-07-05 20:37:32','2023-07-05 20:37:32'),(55,19,'Kemudian untuk bekerja',0,'2023-07-05 20:37:32','2023-07-05 20:37:32'),(56,19,'Cepat mengeras',1,'2023-07-05 20:37:32','2023-07-05 20:37:32'),(57,19,'Kekuatan',0,'2023-07-05 20:37:32','2023-07-05 20:37:32'),(58,20,'Kesesuain terhadap jenis pekerjaan',0,'2023-07-05 20:37:34','2023-07-05 20:37:34'),(59,20,'Kemudian untuk bekerja',0,'2023-07-05 20:37:34','2023-07-05 20:37:34'),(60,20,'Cepat mengeras',1,'2023-07-05 20:37:34','2023-07-05 20:37:34'),(61,20,'Kekuatan',0,'2023-07-05 20:37:34','2023-07-05 20:37:34'),(62,21,'kapur',0,'2023-07-05 21:45:52','2023-07-05 21:45:52'),(63,21,'pasir',1,'2023-07-05 21:45:52','2023-07-05 21:45:52'),(64,21,'semen',0,'2023-07-05 21:45:52','2023-07-05 21:45:52'),(65,21,'semen merah',0,'2023-07-05 21:45:52','2023-07-05 21:45:52'),(66,22,'0,6 cm –  1 cm',0,'2023-07-05 21:52:28','2023-07-05 21:52:28'),(67,22,'0,8 cm –  1,2 cm',1,'2023-07-05 21:52:28','2023-07-05 21:52:28'),(68,22,'1 cm –  2 cm',0,'2023-07-05 21:52:28','2023-07-05 21:52:28'),(69,22,'1,5 cm –  2,5 cm',0,'2023-07-05 21:52:29','2023-07-05 21:52:29'),(70,23,'kayu',0,'2023-07-05 21:54:59','2023-07-05 21:54:59'),(71,23,'fiber glas',0,'2023-07-05 21:54:59','2023-07-05 21:54:59'),(72,23,'baja/alumunium',1,'2023-07-05 21:54:59','2023-07-05 21:54:59'),(73,23,'bambu',0,'2023-07-05 21:54:59','2023-07-05 21:54:59'),(74,24,'menggenangi dengan air selama 2 minggu',1,'2023-07-05 21:57:05','2023-07-05 21:57:05'),(75,24,'menutup dengan karung-karung basah selama 1 minggu',0,'2023-07-05 21:57:05','2023-07-05 21:57:05'),(76,24,'seluruh permukaan ditutup dengan kertas semen',0,'2023-07-05 21:57:06','2023-07-05 21:57:06'),(77,24,'yang penting jangan diinjak-injak dahulu selama 1 minggu',0,'2023-07-05 21:57:06','2023-07-05 21:57:06'),(78,25,'2 cm dan > diameter krikil',0,'2023-07-05 21:59:32','2023-07-05 21:59:32'),(79,25,'5 cm dan > diameter krikil',0,'2023-07-05 21:59:32','2023-07-05 21:59:32'),(80,25,'4 cm dan > diameter krikil',0,'2023-07-05 21:59:32','2023-07-05 21:59:32'),(81,25,'3 cm dan > diameter krikil',1,'2023-07-05 21:59:32','2023-07-05 21:59:32'),(82,26,'1 Sp : 2 Ps',1,'2023-07-05 22:15:05','2023-07-05 22:15:05'),(83,26,'1 Sp : ½ Kp : 3 Ps',0,'2023-07-05 22:15:05','2023-07-05 22:15:05'),(84,26,'1 Kp : 1 Sm : 1 Ps',0,'2023-07-05 22:15:05','2023-07-05 22:15:05'),(85,26,'1 Sp : 1 Tras : 3 Ps',0,'2023-07-05 22:15:05','2023-07-05 22:15:05'),(86,27,'Cast in situ',0,'2023-07-05 22:16:51','2023-07-05 22:16:51'),(87,27,'Beton ringan',0,'2023-07-05 22:16:51','2023-07-05 22:16:51'),(88,27,'Bertulang',0,'2023-07-05 22:16:51','2023-07-05 22:16:51'),(89,27,'Pre cast',1,'2023-07-05 22:16:51','2023-07-05 22:16:51'),(90,28,'3,2 cm',0,'2023-07-05 22:31:14','2023-07-05 22:31:14'),(91,28,'3,6 cm',0,'2023-07-05 22:31:14','2023-07-05 22:31:14'),(92,28,'3,8 cm',1,'2023-07-05 22:31:14','2023-07-05 22:31:14'),(93,28,'3,4 cm',0,'2023-07-05 22:31:15','2023-07-05 22:31:15'),(94,29,'pemisahan struktur bangunan yang terlalu panjang',1,'2023-07-05 22:38:13','2023-07-05 22:38:13'),(95,29,'pemisahan struktur bangunan yang terlalu tinggi',0,'2023-07-05 22:38:13','2023-07-05 22:38:13'),(96,29,'penggabungan struktur beberapa bangunan kecil',0,'2023-07-05 22:38:13','2023-07-05 22:38:13'),(97,29,'penggabungan dua struktur bangunan besar',0,'2023-07-05 22:38:13','2023-07-05 22:38:13'),(98,30,'tinggi langit-langit',0,'2023-07-05 22:39:28','2023-07-05 22:39:28'),(99,30,'panjang bentangan',0,'2023-07-05 22:39:28','2023-07-05 22:39:28'),(100,30,'arah mata angin',1,'2023-07-05 22:39:28','2023-07-05 22:39:28'),(101,30,'kedalaman pondasi',0,'2023-07-05 22:39:28','2023-07-05 22:39:28'),(102,31,'siar datar harus segaris lurus',0,'2023-07-05 22:57:54','2023-07-05 22:57:54'),(103,31,'siar tegak tidak boleh segaris lurus',0,'2023-07-05 22:57:55','2023-07-05 22:57:55'),(104,31,'siar lintang bergeser ¼ bata',1,'2023-07-05 22:57:55','2023-07-05 22:57:55'),(105,31,'siar lintang bergeser ½ bata',0,'2023-07-05 22:57:55','2023-07-05 22:57:55'),(106,32,'Line bobbind',0,'2023-07-05 23:00:34','2023-07-05 23:00:34'),(107,32,'Sendok spesi oval',0,'2023-07-05 23:00:34','2023-07-05 23:00:34'),(108,32,'Sendok spesi lancip',0,'2023-07-05 23:00:34','2023-07-05 23:00:34'),(109,32,'Jointer',1,'2023-07-05 23:00:34','2023-07-05 23:00:34'),(110,33,'untuk memperkuat kedudukan pondasi',0,'2023-07-05 23:01:49','2023-07-05 23:01:49'),(111,33,'untuk perbaikan tanah',0,'2023-07-05 23:01:49','2023-07-05 23:01:49'),(112,33,'untuk menjaga keutuhan konstrusi bila terjadi penurunan tanah yang tidak merata',1,'2023-07-05 23:01:49','2023-07-05 23:01:49'),(113,33,'untuk jalan rembesan air tanah',0,'2023-07-05 23:01:49','2023-07-05 23:01:49'),(114,34,'kolom',0,'2023-07-05 23:04:15','2023-07-05 23:04:15'),(115,34,'sloof',1,'2023-07-05 23:04:16','2023-07-05 23:04:16'),(116,34,'ring balk',0,'2023-07-05 23:04:16','2023-07-05 23:04:16'),(117,34,'balok latei',0,'2023-07-05 23:04:16','2023-07-05 23:04:16'),(118,35,'1,5 m',0,'2023-07-05 23:05:17','2023-07-05 23:05:17'),(119,35,'1,25 m',0,'2023-07-05 23:05:17','2023-07-05 23:05:17'),(120,35,'0,5 m',0,'2023-07-05 23:05:17','2023-07-05 23:05:17'),(121,35,'1 m',1,'2023-07-05 23:05:18','2023-07-05 23:05:18'),(122,36,'Semen Portland',0,'2023-07-05 23:06:30','2023-07-05 23:06:30'),(123,36,'Air',1,'2023-07-05 23:06:30','2023-07-05 23:06:30'),(124,36,'Bahan tambah mempercepat pengerasan',0,'2023-07-05 23:06:30','2023-07-05 23:06:30'),(125,36,'Pasir',0,'2023-07-05 23:06:30','2023-07-05 23:06:30'),(126,37,'4,2 m³',1,'2023-07-05 23:08:05','2023-07-05 23:08:05'),(127,37,'0,60 m³',0,'2023-07-05 23:08:05','2023-07-05 23:08:05'),(128,37,'7 m³',0,'2023-07-05 23:08:05','2023-07-05 23:08:05'),(129,37,'4,5 m³',0,'2023-07-05 23:08:05','2023-07-05 23:08:05'),(130,38,'Elang : Terbang',0,'2023-07-06 21:01:28','2023-07-06 21:01:28'),(131,38,'Kangguru : Kantung',0,'2023-07-06 21:01:28','2023-07-06 21:01:28'),(132,38,'Lumba-lumba : Beranak',1,'2023-07-06 21:01:28','2023-07-06 21:01:28'),(133,38,'Ayam : Menetas',0,'2023-07-06 21:01:28','2023-07-06 21:01:28'),(134,39,'Elang : Terbang',0,'2023-07-06 21:01:31','2023-07-06 21:01:31'),(135,39,'Kangguru : Kantung',0,'2023-07-06 21:01:31','2023-07-06 21:01:31'),(136,39,'Lumba-lumba : Beranak',1,'2023-07-06 21:01:31','2023-07-06 21:01:31'),(137,39,'Ayam : Menetas',0,'2023-07-06 21:01:31','2023-07-06 21:01:31'),(138,40,'Tegangan : Volt',1,'2023-07-06 21:02:43','2023-07-06 21:02:43'),(139,40,'Berat : Massa',0,'2023-07-06 21:02:43','2023-07-06 21:02:43'),(140,40,'Listrik : Arus',0,'2023-07-06 21:02:43','2023-07-06 21:02:43'),(141,40,'Upaya : Newton',0,'2023-07-06 21:02:43','2023-07-06 21:02:43'),(142,41,'Sop Konro : Manado',0,'2023-07-06 21:04:41','2023-07-06 21:04:41'),(143,41,'Gudeg : Solo',0,'2023-07-06 21:04:41','2023-07-06 21:04:41'),(144,41,'Mendoan : Palembang',0,'2023-07-06 21:04:41','2023-07-06 21:04:41'),(145,41,'Dodol : Garut',1,'2023-07-06 21:04:41','2023-07-06 21:04:41'),(146,42,'Anemia : Daging',0,'2023-07-06 21:08:02','2023-07-06 21:08:02'),(147,42,'TBC : Batuk',0,'2023-07-06 21:08:02','2023-07-06 21:08:02'),(148,42,'Stroke : Cholesterol',1,'2023-07-06 21:08:02','2023-07-06 21:08:02'),(149,42,'Gondok : Kelenjar',0,'2023-07-06 21:08:02','2023-07-06 21:08:02'),(150,43,'Mamalia : Ayam',0,'2023-07-06 21:11:48','2023-07-06 21:11:48'),(151,43,'Telur : Ayam',0,'2023-07-06 21:11:49','2023-07-06 21:11:49'),(152,43,'Menyusui : Mamalia',0,'2023-07-06 21:11:49','2023-07-06 21:11:49'),(153,43,'Aves : Bebek',1,'2023-07-06 21:11:49','2023-07-06 21:11:49'),(154,44,'Hasil',0,'2023-07-06 21:26:04','2023-07-06 21:26:04'),(155,44,'Sisa',1,'2023-07-06 21:26:04','2023-07-06 21:26:04'),(156,44,'Gas',0,'2023-07-06 21:26:05','2023-07-06 21:26:05'),(157,44,'Polusi',0,'2023-07-06 21:26:05','2023-07-06 21:26:05'),(158,45,'Setelah',0,'2023-07-06 21:34:21','2023-07-06 21:34:21'),(159,45,'Melewati',0,'2023-07-06 21:34:21','2023-07-06 21:34:21'),(160,45,'Pra',1,'2023-07-06 21:34:21','2023-07-06 21:34:21'),(161,45,'Akhir',0,'2023-07-06 21:34:21','2023-07-06 21:34:21'),(162,46,'Licin',0,'2023-07-06 21:35:09','2023-07-06 21:35:09'),(163,46,'Landai',1,'2023-07-06 21:35:09','2023-07-06 21:35:09'),(164,46,'Canggih',0,'2023-07-06 21:35:09','2023-07-06 21:35:09'),(165,46,'Progres',0,'2023-07-06 21:35:09','2023-07-06 21:35:09'),(166,47,'43, 45',0,'2023-07-06 21:38:01','2023-07-06 21:38:01'),(167,47,'44, 47',0,'2023-07-06 21:38:01','2023-07-06 21:38:01'),(168,47,'48, 70',0,'2023-07-06 21:38:01','2023-07-06 21:38:01'),(169,47,'90, 93',1,'2023-07-06 21:38:01','2023-07-06 21:38:01'),(170,48,'38, 39',1,'2023-07-06 21:39:09','2023-07-06 21:39:09'),(171,48,'14, 6',0,'2023-07-06 21:39:10','2023-07-06 21:39:10'),(172,48,'28, 29',0,'2023-07-06 21:39:10','2023-07-06 21:39:10'),(173,48,'16, 32',0,'2023-07-06 21:39:10','2023-07-06 21:39:10'),(174,49,'12, 13',0,'2023-07-06 21:41:46','2023-07-06 21:41:46'),(175,49,'20, 17',0,'2023-07-06 21:41:46','2023-07-06 21:41:46'),(176,49,'33, 36',0,'2023-07-06 21:41:46','2023-07-06 21:41:46'),(177,49,'324, 325',1,'2023-07-06 21:41:46','2023-07-06 21:41:46'),(178,50,'22, 26',0,'2023-07-06 21:42:55','2023-07-06 21:42:55'),(179,50,'17, 19',1,'2023-07-06 21:42:55','2023-07-06 21:42:55'),(180,50,'18, 22',0,'2023-07-06 21:42:55','2023-07-06 21:42:55'),(181,50,'9, 18',0,'2023-07-06 21:42:55','2023-07-06 21:42:55'),(182,51,'Korelasi',0,'2023-07-06 21:45:45','2023-07-06 21:45:45'),(183,51,'Interaksi',0,'2023-07-06 21:45:45','2023-07-06 21:45:45'),(184,51,'Dependen',1,'2023-07-06 21:45:46','2023-07-06 21:45:46'),(185,51,'Invalid',0,'2023-07-06 21:45:46','2023-07-06 21:45:46'),(186,52,'Penandatanganan kontrak',0,'2023-07-06 21:46:54','2023-07-06 21:46:54'),(187,52,'Pertentangan',1,'2023-07-06 21:46:54','2023-07-06 21:46:54'),(188,52,'Perjanjian',0,'2023-07-06 21:46:54','2023-07-06 21:46:54'),(189,52,'Penghalang',0,'2023-07-06 21:46:55','2023-07-06 21:46:55'),(190,53,'Tanah yang sudah dipetak-petak',1,'2023-07-06 21:49:25','2023-07-06 21:49:25'),(191,53,'Alat memindahkan gigi kendaraan',0,'2023-07-06 21:49:25','2023-07-06 21:49:25'),(192,53,'Sepatu bot tinggi',0,'2023-07-06 21:49:25','2023-07-06 21:49:25'),(193,53,'Pembagian',0,'2023-07-06 21:49:25','2023-07-06 21:49:25'),(194,54,'Bekas tapak kaki',0,'2023-07-06 21:52:49','2023-07-06 21:52:49'),(195,54,'Telaah',1,'2023-07-06 21:52:49','2023-07-06 21:52:49'),(196,54,'Anjing hutan yang berbulu kuning',0,'2023-07-06 21:52:49','2023-07-06 21:52:49'),(197,54,'Sejenis tanaman',0,'2023-07-06 21:52:49','2023-07-06 21:52:49'),(198,55,'Rel : Kereta Api',0,'2023-07-06 21:54:45','2023-07-06 21:54:45'),(199,55,'Terminal : Bis',0,'2023-07-06 21:54:46','2023-07-06 21:54:46'),(200,55,'Garasi : Mobil',1,'2023-07-06 21:54:46','2023-07-06 21:54:46'),(201,55,'Jalan raya : Truk',0,'2023-07-06 21:54:46','2023-07-06 21:54:46'),(202,56,'455',0,'2023-07-06 21:56:25','2023-07-06 21:56:25'),(203,56,'24,5',0,'2023-07-06 21:56:25','2023-07-06 21:56:25'),(204,56,'2,45',0,'2023-07-06 21:56:25','2023-07-06 21:56:25'),(205,56,'4,55',1,'2023-07-06 21:56:25','2023-07-06 21:56:25'),(206,57,'14 kaleng',0,'2023-07-06 21:58:10','2023-07-06 21:58:10'),(207,57,'24 kaleng',0,'2023-07-06 21:58:10','2023-07-06 21:58:10'),(208,57,'28 kaleng',0,'2023-07-06 21:58:10','2023-07-06 21:58:10'),(209,57,'30 kaleng',1,'2023-07-06 21:58:10','2023-07-06 21:58:10'),(210,58,'Tuan M seorang penipu yang pandai bicara',0,'2023-07-06 21:59:07','2023-07-06 21:59:07'),(211,58,'Tuan M seorang penipu yang tidak ramah',0,'2023-07-06 21:59:07','2023-07-06 21:59:07'),(212,58,'Tuan M seorang penipu yang pandai bicara dan tidak ramah',0,'2023-07-06 21:59:07','2023-07-06 21:59:07'),(213,58,'Tuan M bukan seorang penipu, meskipun pandai bicara',1,'2023-07-06 21:59:07','2023-07-06 21:59:07');

#
# Structure for table "exams"
#

DROP TABLE IF EXISTS `exams`;
CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attempt` int(11) NOT NULL DEFAULT 0,
  `marks` float NOT NULL DEFAULT 0,
  `enterance_id` varchar(255) NOT NULL,
  `pass_marks` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

#
# Data for table "exams"
#

INSERT INTO `exams` VALUES (20,'Coba tebak',1,'2023-07-06','00:05','2023-07-06 22:48:55','2023-07-06 15:48:55',1,0,'exid648f233651156',0),(21,'just you',1,'2023-06-23','00:05','2023-06-23 22:40:08','2023-06-23 15:40:08',0,0,'exid648f36a4ec5e3',0),(23,'Exam awalku',1,'2023-07-03','00:10','2023-07-03 22:19:02','2023-07-03 15:19:02',1,0,'exid64a2e61d0f22b',0);

#
# Structure for table "exams_answers"
#

DROP TABLE IF EXISTS `exams_answers`;
CREATE TABLE `exams_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attempt_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_id` (`question_id`,`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

#
# Data for table "exams_answers"
#

INSERT INTO `exams_answers` VALUES (48,39,13,31,'2023-07-03 22:19:01','2023-07-03 22:19:01'),(49,39,14,34,'2023-07-03 22:19:01','2023-07-03 22:19:01'),(50,39,12,26,'2023-07-03 22:19:02','2023-07-03 22:19:02'),(51,39,15,39,'2023-07-03 22:19:02','2023-07-03 22:19:02');

#
# Structure for table "exams_attempt"
#

DROP TABLE IF EXISTS `exams_attempt`;
CREATE TABLE `exams_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `marks` float DEFAULT NULL,
  `score` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `exam_id` (`exam_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

#
# Data for table "exams_attempt"
#

INSERT INTO `exams_attempt` VALUES (34,20,4,1,0,NULL,'2023-06-18 22:42:52','2023-06-18 15:43:21'),(39,23,4,1,2,'10','2023-07-03 22:19:01','2023-07-03 15:37:09');

#
# Structure for table "failed_jobs"
#

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#


#
# Structure for table "interviews"
#

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE `interviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_tertulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_psikotes` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_kejujuran` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_komun` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_kesop` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_praktek` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "interviews"
#

INSERT INTO `interviews` VALUES (7,'4','Arion','solo','Male','10',NULL,'100','100','100','100',NULL,NULL),(8,'5','Aya','solo','Female',NULL,NULL,'80','80','70','80',NULL,NULL);

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_24_141242_create_criterias_table',2),(6,'2023_06_24_141432_create_sub_criterias_table',3),(7,'2023_06_25_031915_create_interviews_table',4);

#
# Structure for table "password_reset_tokens"
#

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id` int(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_reset_tokens"
#


#
# Structure for table "personal_access_tokens"
#

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "personal_access_tokens"
#


#
# Structure for table "qna_exams"
#

DROP TABLE IF EXISTS `qna_exams`;
CREATE TABLE `qna_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `exam_id` (`exam_id`,`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

#
# Data for table "qna_exams"
#

INSERT INTO `qna_exams` VALUES (22,20,12,'2023-06-18 22:42:26','2023-06-18 22:42:26'),(23,20,13,'2023-06-18 22:42:26','2023-06-18 22:42:26'),(24,20,14,'2023-06-18 22:42:26','2023-06-18 22:42:26'),(25,21,12,'2023-06-18 23:54:13','2023-06-18 23:54:13'),(26,21,13,'2023-06-18 23:54:13','2023-06-18 23:54:13'),(27,21,14,'2023-06-18 23:54:13','2023-06-18 23:54:13'),(28,23,12,'2023-07-03 22:16:22','2023-07-03 22:16:22'),(29,23,13,'2023-07-03 22:16:23','2023-07-03 22:16:23'),(30,23,14,'2023-07-03 22:16:23','2023-07-03 22:16:23'),(31,23,15,'2023-07-03 22:16:23','2023-07-03 22:16:23');

#
# Structure for table "questions"
#

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `explanation` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

#
# Data for table "questions"
#

INSERT INTO `questions` VALUES (17,'Agar pekerjaan galian tanah tidak mengganggu kedudukan bouwplank, maka letaknnya bouwplank terhadap sumbu pondasi supaya diambil','tertulis','2023-07-05 20:35:46','2023-07-05 20:35:46'),(18,'Pernyataan berikut adalah sifat-sifat yang perlu diperhatikan untuk membuat adukan, kecuali:','tertulis','2023-07-05 20:37:29','2023-07-05 20:37:29'),(21,'Yang termasuk sebagai bahan pengisi pada bahan adukan adalah:','tertulis','2023-07-05 21:45:52','2023-07-05 21:45:52'),(22,'Pada pemasangan tembok batu bata ketebalan siar datar, tegak dan lintang adalah:','tertulis','2023-07-05 21:52:28','2023-07-05 21:52:28'),(23,'Bilah perata/blebes sebaiknya terbuat dari..','tertulis','2023-07-05 21:54:59','2023-07-05 21:54:59'),(24,'Setelah plat beton selesai dicor perlu diadakan pemeliharaan dengan cara','tertulis','2023-07-05 21:57:05','2023-07-05 21:57:05'),(25,'Jarak minimum antara tulangan pokok balok pada arah mendatar adalah ...','tertulis','2023-07-05 21:59:32','2023-07-05 21:59:32'),(26,'Adukan untuk pasangan atau plesteran agar kedap air adalah:','tertulis','2023-07-05 22:15:05','2023-07-05 22:15:05'),(27,'Beton yang dicor di lokasi pabrikasi khusus, kemudian diangkut, dan dirangkai untuk dipasang di lokasi elemen struktur pada bangunan gedung adalah beton….','tertulis','2023-07-05 22:16:51','2023-07-05 22:16:51'),(28,'Ukuran panjang suatu balok adalah 5,70 m. Jika balok tersebut digambar denganskala 1 : 150, maka panjangnya pada kertas gambar adalah','tertulis','2023-07-05 22:31:14','2023-07-05 22:31:14'),(29,'Dilatasi pada bangunan dapat diartikan sebagai ....','tertulis','2023-07-05 22:38:13','2023-07-05 22:38:13'),(30,'Berikut ini merupakan notasi yang harus ada pada gambar potongan bangunan, kecuali ....','tertulis','2023-07-05 22:39:28','2023-07-05 22:39:28'),(31,'Syarat-syarat pemasangan tembok ½ bata adalah sebagai berikut , kecuali...','tertulis','2023-07-05 22:57:54','2023-07-05 22:57:54'),(32,'Untuk membentuk siar datar dan tegak agar menjadi padat dan rapi, menggunakan','tertulis','2023-07-05 23:00:34','2023-07-05 23:00:34'),(33,'Fungsi pasangan batu kosong pada pondasi batu kali adalah','tertulis','2023-07-05 23:01:49','2023-07-05 23:01:49'),(34,'Konstruksi balok beton yang terletak diatas pondasi disebut','tertulis','2023-07-05 23:04:15','2023-07-05 23:04:15'),(35,'Dalam pengecoran plat beton diatas papan begesting diikatkan tahu-tahu beton pada besi tulangandengan jarak maksimum','tertulis','2023-07-05 23:05:17','2023-07-05 23:05:17'),(36,'ada adukan beton ada istilah Workability artinya mudah dikerjakan ini tergantung banyaksedikitnya bahan yang digunakan yaitu','tertulis','2023-07-05 23:06:30','2023-07-05 23:06:30'),(37,'Tiang beton bertulang ukuran penampangnya 20 cmx30 cm, tingginya 3,5 m, jika jumlah tiang 20 buah, maka volume pekerjaantiang beton bertulang tersebut adalah','tertulis','2023-07-05 23:08:04','2023-07-05 23:08:04'),(38,'Katak : Bertelur','Psikotes','2023-07-06 21:01:27','2023-07-06 21:01:27'),(40,'Energi : Kalori','Psikotes','2023-07-06 21:02:43','2023-07-06 21:02:43'),(41,'Lumpia : Semarang','Psikotes','2023-07-06 21:04:41','2023-07-06 21:04:41'),(42,'Diabetes : Gula','Psikotest','2023-07-06 21:08:01','2023-07-06 21:08:01'),(43,'Reptilia : Kadal','Psikotes','2023-07-06 21:11:48','2023-07-06 21:11:48'),(44,'RESIDU','Psikotes','2023-07-06 21:26:04','2023-07-06 21:26:04'),(45,'PASCA','Psikotes','2023-07-06 21:34:21','2023-07-06 21:34:21'),(46,'CURAM','Psikotes','2023-07-06 21:35:09','2023-07-06 21:35:09'),(47,'6, 9, 18, 21, 42, 45, ... , ...','Psikotes','2023-07-06 21:38:01','2023-07-06 21:38:01'),(48,'3, 4, 8, 9, 18, 19, ... , ...','Psikotes','2023-07-06 21:39:09','2023-07-06 21:39:09'),(49,'2, 3, 4, 16, 17, 18, ..., ...','Psikotes','2023-07-06 21:41:46','2023-07-06 21:41:46'),(50,'3, 5, 7, 10, 12, 14, ..., ...','Psikotes','2023-07-06 21:42:55','2023-07-06 21:42:55'),(51,'MANDIRI >< ...','Psikotes','2023-07-06 21:45:45','2023-07-06 21:45:45'),(52,'Kontradiksi = …','Psikotes','2023-07-06 21:46:54','2023-07-06 21:46:54'),(53,'Kaveling = …','Psikotes','2023-07-06 21:49:25','2023-07-06 21:49:25'),(54,'Jajak = …','Psikotes','2023-07-06 21:52:49','2023-07-06 21:52:49'),(55,'Hanggar : Pesawat','Psikotes','2023-07-06 21:54:45','2023-07-06 21:54:45'),(56,'Nilai 260% dari 1 3/4 adalah','Psikotes','2023-07-06 21:56:25','2023-07-06 21:56:25'),(57,'Jika 15 kaleng makanan diperlukan 7 orang selama 2 hari maka untuk memenuhi kebutuhan 4 orang selama 7 hari diperlukan makanan sebanyak..','Psikotes','2023-07-06 21:58:10','2023-07-06 21:58:10'),(58,'Semua penipu pandai bicara dan ramah. Tuan M tidak ramah, tetapi pandai bicara.','Psikotes','2023-07-06 21:59:07','2023-07-06 21:59:07');

#
# Structure for table "subjects"
#

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id`) REFERENCES `exams` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "subjects"
#

INSERT INTO `subjects` VALUES (1,'Tertulis','2023-05-17 13:06:43','2023-06-16 08:01:16'),(4,'Psikotest','2023-06-05 11:33:04','2023-06-05 11:33:04');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (2,'admin','admin@gmail.com','','','',NULL,1,'$2y$10$Y.SI4HtE2qdKqvklOG7MF.31H43DsR6wjw7y549F9Mg/3vjM1Q.Ne',NULL,'2023-05-03 04:12:35','2023-05-03 04:12:35'),(4,'Arion','arion12@gmail.com','solo','Male','089522989419',NULL,0,'$2y$10$OuPTBhqwI29t18CDnRbFO.GpcSM2.nDd1EDLCRTd9JEUOSkAuid76',NULL,'2023-05-31 14:55:29','2023-05-31 14:55:29'),(5,'Aya','aya@gmail.com','solo','Female','08985399429',NULL,0,'$2y$10$OZCpNr2NSiQNgnQhSG87peIdwd2iYYNqbAW2VA5ulQBQpQvutTVFK',NULL,'2023-06-13 10:27:12','2023-06-13 10:27:12');
