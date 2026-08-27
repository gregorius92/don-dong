-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_settings`
--

DROP TABLE IF EXISTS `global_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `global_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_settings`
--

LOCK TABLES `global_settings` WRITE;
/*!40000 ALTER TABLE `global_settings` DISABLE KEYS */;
INSERT INTO `global_settings` VALUES (1,'site_name','DonDong!','2026-08-27 06:02:24','2026-08-27 06:02:24'),(2,'meta_title','DonDong! - Segarnya Kedondong Asli','2026-08-27 06:02:24','2026-08-27 06:02:24'),(3,'meta_title_en','DonDong! - Fresh Authentic Ambarella','2026-08-27 06:02:24','2026-08-27 06:02:24'),(4,'meta_description','Minuman serbuk kedondong asli 100% natural. Segar, sehat, dan praktis.','2026-08-27 06:02:24','2026-08-27 06:02:24'),(5,'meta_description_en','100% natural authentic ambarella juice drink, without artificial preservatives. Refresh your mood directly with one brew!','2026-08-27 06:02:24','2026-08-27 06:02:24'),(6,'whatsapp_number','6281234567890','2026-08-27 06:02:24','2026-08-27 06:02:24'),(7,'instagram_url','https://instagram.com/dondong_id','2026-08-27 06:02:24','2026-08-27 06:02:24'),(8,'tiktok_url','https://tiktok.com/@dondong_id','2026-08-27 06:02:24','2026-08-27 06:02:24'),(9,'youtube_url','https://youtube.com/@dondong_id','2026-08-27 06:02:24','2026-08-27 06:02:24');
/*!40000 ALTER TABLE `global_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landing_page_contents`
--

DROP TABLE IF EXISTS `landing_page_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_page_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Segarnya Kedondong Asli, Sekali Seduh!',
  `hero_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DonDong! Minuman serbuk dari kedondong asli, segar dan alami.',
  `hero_subtitle_en` text COLLATE utf8mb4_unicode_ci,
  `hero_cta_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Beli Sekarang',
  `hero_cta_text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_cta_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kenapa DonDong!?',
  `benefits_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits_content` text COLLATE utf8mb4_unicode_ci,
  `benefits_content_en` text COLLATE utf8mb4_unicode_ci,
  `ingredients_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bahan Alami Pilihan',
  `ingredients_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients_content` text COLLATE utf8mb4_unicode_ci,
  `ingredients_content_en` text COLLATE utf8mb4_unicode_ci,
  `ingredients_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landing_page_contents`
--

LOCK TABLES `landing_page_contents` WRITE;
/*!40000 ALTER TABLE `landing_page_contents` DISABLE KEYS */;
INSERT INTO `landing_page_contents` VALUES (1,'Segarnya Kedondong Asli, Sekali Seduh!','The Freshness of Authentic Ambarella, Ready to Brew!','DonDong! menghadirkan kebaikan buah kedondong tropis dalam bentuk serbuk praktis yang kaya vitamin C dan serat.','Enjoy the sensation of natural sweet and sour ambarella fruit mixed with special ingredients to instantly lift your mood.','Pesan Sekarang','Buy Now','#contact',NULL,'Kenapa DonDong!?','Why Choose DonDong!?','100% Buah Kedondong Asli, Tanpa Pemanis Buatan, Praktis & Higienis, Menyegarkan & Kaya Nutrisi.','Enjoy various benefits of natural ambarella for your daily health.','Dibuat Dari Alam','Made From Natural Ingredients','Kami menggunakan kedondong pilihan terbaik dari petani lokal untuk memastikan rasa asam-manis yang autentik dan kualitas nutrisi yang terjaga.','DonDong! is processed from selected ambarella fruit equipped with natural ingredients that are beneficial for your body.',NULL,'2026-08-27 06:02:24','2026-08-27 06:02:24');
/*!40000 ALTER TABLE `landing_page_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2026_02_28_134236_create_landing_page_contents_table',1),(6,'2026_02_28_134244_create_products_table',1),(7,'2026_02_28_134254_create_global_settings_table',1),(8,'2026_02_28_134302_create_testimonials_table',1),(9,'2026_02_28_180150_add_english_columns_to_landing_page_and_products',1),(10,'2026_03_01_034016_add_content_en_to_testimonials_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `nutrition_highlights` text COLLATE utf8mb4_unicode_ci,
  `price_display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'DonDong! Original Sachet','DonDong! Original Box','dondong-original-sachet','Bubuk minuman kedondong asli kemasan sachet isi 10. Mudah dibawa kemana saja!','Enjoy the authentic and fresh taste of original ambarella. One box contains 10 practical sachets ready to brew wherever you are.','Ekstrak Kedondong, Gula Tebu, Vitamin C.','Tinggi Vitamin C, Serat Alami, Rendah Kalori.','Rp 25.000 / Box (10 Sachet)',NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24'),(2,'DonDong! Less Sugar Sachet','DonDong! Mint Refresh','dondong-less-sugar-sachet','Varian rendah gula untuk kamu yang sedang menjaga asupan kalori namun tetap ingin kesegaran kedondong.','A new dimension of freshness! The blend of sweet-sour ambarella with a freezing mint sensation. Perfect for hot weather.','Ekstrak Kedondong, Gula Tebu (Sedikit), Stevia, Vitamin C.','Sangat Rendah Kalori, Tinggi Vitamin C.','Rp 28.000 / Box (10 Sachet)',NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24'),(3,'DonDong! Family Size','DonDong! Honey Boost','dondong-family-size','Kemasan besar 500g untuk dinikmati bersama seluruh anggota keluarga di rumah.','The goodness of pure honey combined with fresh ambarella. Better for maintaining endurance and immunity naturally.','Ekstrak Kedondong, Gula Tebu, Vitamin C.','Tinggi Vitamin C, Ekstra Hemat.','Rp 85.000 / Pouch (500g)',NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL DEFAULT '5',
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Budi Santoso',NULL,'Rasa kedondongnya beneran kerasa, seger banget diminum siang-siang!','The authentic ambarella taste is really noticeable, so refreshing to drink in the afternoon!',5,NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24'),(2,'Siti Aminah',NULL,'Anak-anak suka banget varian yang less sugar. Praktis buat bekal sekolah dan sehat karena kaya vitamin C.','My kids really love the less sugar variant. Practical for lunchbox and healthy due to the rich vitamin C.',5,NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24'),(3,'Andi Wijaya',NULL,'Sering order yang family size buat stok di kantor. Ampuh banget buat balikin mata ngantuk abis makan siang.','I often order the family size to stock up at the office. Really effective to treat sleepiness after lunch.',4,NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24'),(4,'Rina Kartika',NULL,'Harganya lumayan terjangkau buat kantong mahasiswa. Paling suka dicampur es batu banyak-banyak.','The price is quite affordable for a student. My favorite way to drink it is with lots of ice cubes.',5,NULL,1,'2026-08-27 06:02:24','2026-08-27 06:02:24');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin DonDong!','admin@dondong.id',NULL,'$2y$10$j6psCCFfCM7ylLOJ0g/ZZeteSaBfX6also/QUUBd1/KV199IBuSb.',NULL,'2026-08-27 06:02:24','2026-08-27 06:02:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-27  9:38:27
