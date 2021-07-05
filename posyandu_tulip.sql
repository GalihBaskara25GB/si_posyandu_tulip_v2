-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 01:44 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu_tulip`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kaders`
--

CREATE TABLE `kaders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaders`
--

INSERT INTO `kaders` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `is_verified`, `created_at`, `updated_at`) VALUES
('0a28f64f-a3d3-464a-957a-a55b5ab5f3d5', 'Siti Toifa', 'Gedug, Kemantren Rejo RT 01, RW 05', 'Pasuruan', '1971-06-07', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('0d2144d3-1517-43b2-b695-c8ed84fc8fa5', 'Dwi Lestari', 'Dsn Pejambon, Kemantren Rejo, RT 02, RW 02', 'Pasuruan', '1978-03-05', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('1b50a06d-da9e-4ecc-b267-2b39717929c7', 'Sri Anik', 'Kemantren Rejo, RT 05, RW 01', 'Pasuruan', '1971-07-22', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('1b68fd3b-6115-4f93-939f-6f726a88ae87', 'Iliyin', 'Dsn Tanjung, Kemantren Rejo, RT 01, RW 03', 'Pasuruan', '1975-05-01', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('1b710ab6-f73d-4a55-b11b-3b94fc152567', 'Cicik Dwi Wilujeng', 'Kemantren Rejo, RT 02, RW 01', 'Pasuruan', '1977-03-20', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('2c578873-8730-4ff6-abba-3d56580d0009', 'Liskawati', 'Dsn Tanjung, Kemantren Rejo, RT 02, RW 03', 'Pasuruan', '1991-08-16', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('2ce4687b-7f19-4d5a-97df-99e7745e8aff', 'Neneng Sutrisminingan ', 'Kemantren Rejo, RT 03, RW 01', 'Pasuruan', '1976-04-05', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('343bf9d8-15cf-4cf3-bf2c-3db9b5023209', 'Suti Rahayu', 'Kemantren Rejo, RT 07, RW 01', 'Pasuruan', '1970-12-12', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('39e479fd-e5a4-4736-b774-1a07b15986d5', 'Khalimatus Sadeyah', 'Gedug, Kemantren Rejo RT 02, RW 05', 'Pasuruan', '1996-11-20', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('3b0f5b96-08f2-4e56-b256-31d017cf7582', 'Zulaekha', 'Kemantren Rejo, RT 02, RW 05', 'Pasuruan', '1976-05-14', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('3bc14d9f-8649-4a25-849e-33643d7b7a88', 'Missucik', 'Kemantren Rejo, RT 05, RW 01', 'Pasuruan', '1960-07-27', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('51104001-ba50-406a-82ca-e56daf3e9d6f', 'Wahyuningsih', 'Kemantren Rejo, RT 03, RW 01', 'Pasuruan', '1969-10-16', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('5116e919-f60a-499c-8ed5-01341d215f66', 'Nikmatul Ainiyah', 'Kemantren Rejo, RT 03, RW 01', 'Pasuruan', '1997-01-22', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('513ef311-8470-4446-b87f-f8cc9bc9adaf', 'Sukifah', 'Dsn Tanjung, Kemantren Rejo, RT 03, RW 03', 'Pasuruan', '1973-04-22', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('5ef6ff23-0d0b-463a-9de8-35cab2094d58', 'Sri Riana', 'Dsn Kemantren, Kemantren Rejo, RT 02 RW 01', 'Pasuruan', '1962-09-15', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('6e592a23-cb82-4278-860d-c800ca7af761', 'Mujiati', 'Kemantren Rejo, RT 07, RW 01', 'Pasuruan', '1966-08-11', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('7503e4c0-b6ba-42e6-b448-61b4c8181d31', 'Khunainah', 'Dsn Tanjung, Kemantren Rejo, RT 02, RW 03', 'Pasuruan', '1973-11-07', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('83bff22d-14c7-4ef1-b732-42e64508fef0', 'Asfiah', 'Dsn Tanjung, Kemantren Rejo, RT 04, RW 03', 'Pasuruan', '1971-10-18', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('8f725cad-17b2-40dc-a67c-1d369b118af2', 'Muslikha', 'Dsn Trimo, Kemantren Rejo, RT 02, RW 04', 'Pasuruan', '1976-02-12', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('92722fa7-9fbb-4e95-9f5f-042dc2bfa579', 'Misni', 'Dsn Pejambon, Kemantren Rejo, RT 08, RW 02', 'Pasuruan', '1965-10-12', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('9dd5a995-1c6b-41d5-b57f-69bade03909b', 'Luluk Indasari', 'Dsn Tanjung, Kemantren Rejo, RT 03, RW 03', 'Pasuruan', '1976-05-10', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('a34f238d-f5e9-4875-886d-fcce9526f633', 'Sri Murdiatun', 'Dsn Pejambon, Kemantren Rejo, RT 05, RW 02', 'Pasuruan', '1961-01-11', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('a56f2f9a-1cf7-4b41-ab81-1ec5b76c8c56', 'Amiriyah', 'Kemantren Rejo, RT 04, RW 01', 'Pasuruan', '1974-11-17', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('a67a77e1-c691-4843-8aeb-1bdf57e5be61', 'Suhartatik', 'Kemantren Rejo, RT 05, RW 06', 'Pasuruan', '1962-07-21', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('aa97b94d-f4a2-475c-aac3-519fc69dbb0a', 'Elok Sri V.', 'Kemantren Rejo, RT 03, RW 01', 'Pasuruan', '1972-04-15', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ab8b40cc-db01-4bb4-a3a4-e6bcb440de43', 'Khotijah', 'Gedug, Kemantren Rejo RT 01, RW 05', 'Pasuruan', '1974-04-12', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ace9cd0d-daa7-4dcb-943e-f8ad68ddc735', 'Dewi Ayu Lestari', 'Kemantren Rejo, RT 03, RW 01', 'Pasuruan', '1997-11-07', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ad9c90eb-193e-4eef-bfea-96999b0e2045', 'Dwi Sundusiah', 'Dsn Tanjung, Kemantren Rejo, RT 01, RW 03', 'Pasuruan', '1982-12-03', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('b03fe8af-b201-4dd8-9d97-b8eaa75aab70', 'Sumroti', 'Dsn Trimo, Kemantren Rejo, RT 05, RW 04', 'Pasuruan', '1971-10-02', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('b926a6a5-1f44-416a-8245-4e5e6b91078d', 'Nikmah', 'Dsn Pejambon, Kemantren Rejo, RT 03, RW 02', 'Pasuruan', '1975-06-07', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('bb02812e-0ae7-41d8-b12e-033aa7ec1532', 'Sri Rahayu', 'Kemantren Rejo, RT 01, RW 01', 'Pasuruan', '1966-11-25', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('c1374743-8587-4745-95e2-80bb6f1f11c2', 'Sri Wulandari', 'Kemantren Rejo, RT 02, RW 02', 'Pasuruan', '1975-09-09', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('c375fa59-0669-47f1-93ca-1dfdb35658d1', 'Febri H.', 'Dsn Tanjung, Kemantren Rejo, RT 02, RW 03', 'Pasuruan', '1996-08-09', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('c6685e0f-2e19-4873-99d0-ceab16d0bd60', 'Luluk', 'Dsn Trimo, Kemantren Rejo, RT 02, RW 04', 'Pasuruan', '1979-05-24', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('d5aa0834-f6da-4aa2-903e-37ad16742cef', 'Sri Novita Rahayu', 'Perum Bumi Indah, Blok A3, Jalan Raya Ngopak, Dsn Kedawung', 'Pasuruan', '1977-02-17', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('d8fa1f49-a46b-4bce-a10f-4ece4fef3e7d', 'Supiati', 'Kemantren Rejo, RT 05, RW 07', 'Pasuruan', '1960-10-04', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('e4f4c64e-5b8f-4a73-9b04-ef93a6ce0cb4', 'Rochmawati', 'Kemantren Rejo, RT 06, RW 01', 'Pasuruan', '1982-02-20', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('e622251d-388b-4679-aa26-535e19e2e561', 'Mu\'inah', 'Dsn Trimo, Kemantren Rejo, RT 03, RW 04', 'Pasuruan', '1982-06-17', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('edca5f8d-ccd8-4bc0-bf64-fadb6cc170d9', 'Sifianti', 'Dsn Pejambon, Kemantren Rejo, RT 04, RW 02', 'Pasuruan', '1981-12-21', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ef3b28d7-08a0-4371-901d-4a9ecbf64a73', 'Jasiyah', 'Dsn Tanjung, Kemantren Rejo, RT 04, RW 03', 'Pasuruan', '1975-10-27', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('f6d8fb1b-aeae-488e-beef-ce56932bbfd3', 'Yuyun', 'Gedug, Kemantren Rejo RT 03, RW 05', 'Pasuruan', '1990-09-28', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('f7a8ea9f-4add-4f24-aa14-c1a7c16a694e', 'Jumaiyah', 'Dsn Trimo, Kemantren Rejo, RT 01, RW 04', 'Pasuruan', '1976-09-20', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('fa53cb6b-f465-4527-895e-ac582af03a87', 'Suwati', 'Kemantren Rejo, RT 07, RW 01', 'Pasuruan', '1972-01-06', 'Perempuan', '08292926726723', 0, '2021-06-18 01:00:05', '2021-06-18 01:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit_berat` tinyint(1) NOT NULL,
  `pengetahuan_kesehatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keaktifan_sosial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian_komputer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepribadian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mempunyai_hp` tinyint(1) NOT NULL,
  `kader_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `pendidikan`, `penyakit_berat`, `pengetahuan_kesehatan`, `keaktifan_sosial`, `keahlian_komputer`, `kepribadian`, `mempunyai_hp`, `kader_id`, `created_at`, `updated_at`) VALUES
('0b2b1d9c-4e2f-4cad-b61c-e02bf98e0a8b', 'SMA', 1, 'BAIK', 'CUKUP', '1', 'CUKUP', 1, 'f6d8fb1b-aeae-488e-beef-ce56932bbfd3', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('0e2e9815-bf7a-450e-a72e-7c14e4292171', 'SMA', 0, 'CUKUP', 'BAIK', '0', 'BAIK', 1, '51104001-ba50-406a-82ca-e56daf3e9d6f', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('14ff9921-68b3-48e8-add4-8be108e964a0', 'SMA', 1, 'BAIK', 'CUKUP', '0', 'BAIK', 1, 'e622251d-388b-4679-aa26-535e19e2e561', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('161c65cc-79c2-4bfe-adf4-655b1d40ac09', 'SMA', 0, 'CUKUP', 'CUKUP', '0', 'CUKUP', 1, '1b710ab6-f73d-4a55-b11b-3b94fc152567', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('175c964b-7e81-4f8c-b4d3-1d40ebd332f4', 'SMA', 0, 'BAIK', 'BAIK', '0', 'BAIK', 1, 'bb02812e-0ae7-41d8-b12e-033aa7ec1532', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('1c396026-b28d-42cb-aecb-2061e922ddfb', 'SMA', 0, 'CUKUP', 'CUKUP', '0', 'KURANG', 1, '8f725cad-17b2-40dc-a67c-1d369b118af2', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('309587b9-10a9-4a05-9101-9f66a92bff7c', 'SMP', 0, 'BAIK', 'BAIK', '0', 'BAIK', 0, '6e592a23-cb82-4278-860d-c800ca7af761', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('35a3b436-2764-4558-b0df-3e15f5340550', 'SMA', 1, 'CUKUP', 'CUKUP', '0', 'BAIK', 1, 'b926a6a5-1f44-416a-8245-4e5e6b91078d', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('3bf3fa88-c883-438b-a671-9145567ed855', 'SMA', 0, 'BAIK', 'BAIK', '0', 'KURANG', 1, 'aa97b94d-f4a2-475c-aac3-519fc69dbb0a', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('4463c4b6-04ac-48a8-b575-568c2bf4238a', 'SMA', 1, 'BAIK', 'BAIK', '0', 'BAIK', 1, 'ace9cd0d-daa7-4dcb-943e-f8ad68ddc735', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('51243432-ce8d-49e2-97da-77f43f6145d2', 'SMA', 0, 'CUKUP', 'CUKUP', '0', 'CUKUP', 1, 'a67a77e1-c691-4843-8aeb-1bdf57e5be61', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('53bf9ac3-bf46-4dfb-b817-ef900ffc2076', 'SMA', 0, 'BAIK', 'BAIK', '0', 'CUKUP', 1, '39e479fd-e5a4-4736-b774-1a07b15986d5', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('54857e27-962b-4a00-b32e-08857a6d044f', 'SMA', 0, 'BAIK', 'BAIK', '0', 'BAIK', 1, '83bff22d-14c7-4ef1-b732-42e64508fef0', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('581e646f-9378-45cf-9449-56b7cef5bbf4', 'SMA', 0, 'BAIK', 'CUKUP', '0', 'BAIK', 1, '92722fa7-9fbb-4e95-9f5f-042dc2bfa579', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('5dcf17ae-d862-4bd8-b269-f6ba817b1bea', 'SMA', 0, 'BAIK', 'BAIK', '0', 'BAIK', 1, '1b50a06d-da9e-4ecc-b267-2b39717929c7', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('6a97cd77-7dd8-4fb2-93c9-af7e7718004f', 'SMA', 1, 'CUKUP', 'BAIK', '0', 'CUKUP', 1, '0a28f64f-a3d3-464a-957a-a55b5ab5f3d5', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('6da6ae14-79f1-48a9-b594-e471dcf1f3f4', 'SMA', 0, 'BAIK', 'BAIK', '0', 'BAIK', 1, '513ef311-8470-4446-b87f-f8cc9bc9adaf', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('726d802f-e381-476f-b707-eed5850e7b4e', 'SMA', 1, 'CUKUP', 'CUKUP', '0', 'CUKUP', 1, 'ef3b28d7-08a0-4371-901d-4a9ecbf64a73', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('7387e5e6-cf89-4ea5-ac11-7f76ee7f9b0b', 'SMP', 0, 'BAIK', 'CUKUP', '0', 'CUKUP', 1, '343bf9d8-15cf-4cf3-bf2c-3db9b5023209', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('745bd622-ab7d-460a-928e-a3421148071a', 'SMA', 0, 'BAIK', 'BAIK', '0', 'BAIK', 1, 'ab8b40cc-db01-4bb4-a3a4-e6bcb440de43', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('79278f70-66a7-4d21-96d0-87c068b48456', 'SMA', 0, 'BAIK', 'CUKUP', '0', 'BAIK', 1, 'ad9c90eb-193e-4eef-bfea-96999b0e2045', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('82e52768-5d02-4c28-be06-865bd287e8bb', 'SMA', 0, 'CUKUP', 'BAIK', '0', 'BAIK', 1, 'c6685e0f-2e19-4873-99d0-ceab16d0bd60', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('88485c4a-972d-4b17-804c-57d0d54bb545', 'SMA', 0, 'BAIK', 'BAIK', '1', 'CUKUP', 1, 'c1374743-8587-4745-95e2-80bb6f1f11c2', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('8fe1ae21-beef-468a-8da4-f1feb99ad910', 'SMA', 1, 'CUKUP', 'BAIK', '1', 'KURANG', 1, '5116e919-f60a-499c-8ed5-01341d215f66', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('98245f0f-f250-4e8a-89df-b56aa651b472', 'SMA', 0, 'BAIK', 'BAIK', '0', 'CUKUP', 1, 'b03fe8af-b201-4dd8-9d97-b8eaa75aab70', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('99bae42d-aacd-428c-947e-7a59e666f1ea', 'SMA', 1, 'BAIK', 'CUKUP', '0', 'CUKUP', 1, '9dd5a995-1c6b-41d5-b57f-69bade03909b', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('9b680659-074e-469f-9096-53b061c186a9', 'SMA', 1, 'CUKUP', 'BAIK', '0', 'BAIK', 1, '7503e4c0-b6ba-42e6-b448-61b4c8181d31', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('a6119b2d-47c5-4449-a063-ab5aedb89529', 'SMA', 0, 'CUKUP', 'BAIK', '0', 'BAIK', 1, '1b68fd3b-6115-4f93-939f-6f726a88ae87', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('a6352f8f-3e33-4ed2-ab19-c92d941e6f54', 'SMA', 0, 'BAIK', 'BAIK', '0', 'CUKUP', 1, 'e4f4c64e-5b8f-4a73-9b04-ef93a6ce0cb4', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ad3bf4fb-c314-4d2b-b8d2-5f476947ed1a', 'SMP', 1, 'CUKUP', 'BAIK', '0', 'BAIK', 1, '3bc14d9f-8649-4a25-849e-33643d7b7a88', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('b4606ee4-979a-4a48-aa14-e7ba883088e6', 'SMA', 0, 'BAIK', 'BAIK', '0', 'CUKUP', 1, '0d2144d3-1517-43b2-b695-c8ed84fc8fa5', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('ba3709c3-dccb-476b-a550-c47330bed396', 'SMA', 0, 'CUKUP', 'CUKUP', '0', 'CUKUP', 1, 'edca5f8d-ccd8-4bc0-bf64-fadb6cc170d9', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('bad8e1b6-d0c4-4f99-822b-dc32de9598d0', 'SMA', 0, 'CUKUP', 'CUKUP', '0', 'BAIK', 0, 'f7a8ea9f-4add-4f24-aa14-c1a7c16a694e', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('bdcbb1f8-e227-41b6-8136-25dc72d13d82', 'SMP', 0, 'BAIK', 'KURANG', '0', 'BAIK', 0, '5ef6ff23-0d0b-463a-9de8-35cab2094d58', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('cbf1e1d5-a45b-4cc1-8a3a-351bb004f651', 'SMA', 1, 'BAIK', 'BAIK', '0', 'CUKUP', 1, '3b0f5b96-08f2-4e56-b256-31d017cf7582', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('d79a9e43-6933-44e8-8fe7-e93a8d6c2332', 'SMA', 1, 'BAIK', 'BAIK', '1', 'KURANG', 1, '2c578873-8730-4ff6-abba-3d56580d0009', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('da135f3c-5bac-4fd3-b1cc-b067e721661e', 'SMA', 0, 'BAIK', 'CUKUP', '1', 'CUKUP', 1, 'd5aa0834-f6da-4aa2-903e-37ad16742cef', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('dc739dce-34b2-4b45-bed8-d511d48f0444', 'SMA', 1, 'BAIK', 'BAIK', '0', 'BAIK', 1, 'a34f238d-f5e9-4875-886d-fcce9526f633', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('e411823a-6db3-41d4-a209-f33eeb34d19c', 'SMP', 0, 'BAIK', 'CUKUP', '0', 'BAIK', 0, 'd8fa1f49-a46b-4bce-a10f-4ece4fef3e7d', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('e7bbc89e-d783-40ca-bfe9-2fca5a11ee79', 'SMA', 1, 'BAIK', 'CUKUP', '1', 'BAIK', 1, '2ce4687b-7f19-4d5a-97df-99e7745e8aff', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('f09cd1da-7ceb-4f95-8630-ec48972bddf4', 'SMA', 1, 'CUKUP', 'CUKUP', '0', 'CUKUP', 0, 'c375fa59-0669-47f1-93ca-1dfdb35658d1', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('f09e0dff-958f-4204-920e-9f29c127b82d', 'SMA', 0, 'CUKUP', 'BAIK', '0', 'CUKUP', 1, 'fa53cb6b-f465-4527-895e-ac582af03a87', '2021-06-18 01:00:05', '2021-06-18 01:00:05'),
('f780faae-65d8-47ed-8e50-4babd9c3c9c7', 'SMA', 0, 'CUKUP', 'BAIK', '0', 'KURANG', 1, 'a56f2f9a-1cf7-4b41-ab81-1ec5b76c8c56', '2021-06-18 01:00:05', '2021-06-18 01:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_22_180957_create_kaders_table', 1),
(4, '2021_04_23_000000_create_users_table', 1),
(5, '2021_04_26_234204_create_kriterias_table', 1),
(6, '2021_06_02_075508_create_rangkings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rangkings`
--

CREATE TABLE `rangkings` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_preferensi` double NOT NULL,
  `kader_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rangkings`
--

INSERT INTO `rangkings` (`id`, `nilai_preferensi`, `kader_id`, `created_at`, `updated_at`) VALUES
('036cd0f6-2e51-4509-ad89-30d24ca44d41', 0.35901904556271, '1b68fd3b-6115-4f93-939f-6f726a88ae87', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('06306d02-b174-471d-8cf1-dde169e49445', 0.31588538476724, 'a67a77e1-c691-4843-8aeb-1bdf57e5be61', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('0eceda19-c3d7-4c37-977b-83e975a6f38e', 0.35910102697714, '1b50a06d-da9e-4ecc-b267-2b39717929c7', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('18631523-8e6e-42af-91f8-4298041fdd24', 0.34461964848888, 'a56f2f9a-1cf7-4b41-ab81-1ec5b76c8c56', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('1a3e8c51-0e9c-4c37-bfc4-40763756ed04', 0.69809142196591, '5116e919-f60a-499c-8ed5-01341d215f66', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('1b51bad4-2ce5-495c-ab8b-330258416b11', 0.187814832671, 'e622251d-388b-4679-aa26-535e19e2e561', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('23f1d46c-b489-4592-a4eb-739d6a0991f8', 0.25380503317372, 'ace9cd0d-daa7-4dcb-943e-f8ad68ddc735', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('2620c017-ff37-43ac-a45e-a961a435805e', 0.35000647529037, 'b03fe8af-b201-4dd8-9d97-b8eaa75aab70', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('26cc2e11-7c55-463c-b42c-85fbe32a5da4', 0.25367300733244, '7503e4c0-b6ba-42e6-b448-61b4c8181d31', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('2c7ec769-d4d1-4391-b025-46a408212c32', 0.18760184798458, 'b926a6a5-1f44-416a-8245-4e5e6b91078d', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('2ecdfc99-b4fc-4020-9705-cb07b39fab5a', 0.86196819662035, 'd5aa0834-f6da-4aa2-903e-37ad16742cef', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('2f2d4ac5-0e61-4a77-8e32-e342381bf959', 0.23688676376732, '0a28f64f-a3d3-464a-957a-a55b5ab5f3d5', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('36e56478-a530-4eee-b6df-a4d1c90ba515', 0.35901904556271, '51104001-ba50-406a-82ca-e56daf3e9d6f', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('39bc9c46-12f9-4735-ae9f-609341d43df1', 0.35901904556271, 'c6685e0f-2e19-4873-99d0-ceab16d0bd60', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('3e4aadd9-2705-4b08-ae97-bc4b09333718', 0.34992095608164, 'fa53cb6b-f465-4527-895e-ac582af03a87', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('43bde2b7-aa9c-4bb6-ac65-21cac933e04a', 0.35379038181307, '6e592a23-cb82-4278-860d-c800ca7af761', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('4affa598-068b-40d8-9b47-5323c53b9853', 0.34470583961418, 'aa97b94d-f4a2-475c-aac3-519fc69dbb0a', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('526df3d6-1b9f-45f0-9b08-537d7aa88a02', 0.32275995901826, 'f7a8ea9f-4add-4f24-aa14-c1a7c16a694e', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('5e5fd09b-1a82-4fc9-8ae4-ccdd65798576', 0.35000647529037, 'e4f4c64e-5b8f-4a73-9b04-ef93a6ce0cb4', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('6b0d14cd-b696-4dc7-990d-b7d19c361e2d', 0.30190857803409, '5ef6ff23-0d0b-463a-9de8-35cab2094d58', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('75e66930-33a4-4f4d-beca-8da2239ba7ad', 0.25096918494204, '3bc14d9f-8649-4a25-849e-33643d7b7a88', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('847e369d-ea12-4f4e-854d-8ce5ff98f380', 0.32709536543811, '92722fa7-9fbb-4e95-9f5f-042dc2bfa579', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('899d4976-115e-4f6c-b97b-328e84818e40', 0.35910102697714, 'ab8b40cc-db01-4bb4-a3a4-e6bcb440de43', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('91e2e507-2ee9-48a9-a23e-681122364132', 0.32709536543811, 'ad9c90eb-193e-4eef-bfea-96999b0e2045', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('989e3737-4f3c-4011-8e19-328d06f3c6c5', 0.31391777562912, '343bf9d8-15cf-4cf3-bf2c-3db9b5023209', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('a594abec-1088-45b3-9d0e-476f18e8bf7d', 0.93012816767553, 'c1374743-8587-4745-95e2-80bb6f1f11c2', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('a5c2b756-699c-41b7-b7b2-06befd366d71', 0.23703437906032, '3b0f5b96-08f2-4e56-b256-31d017cf7582', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('b3c11982-3832-433b-991d-72713ae2dd40', 0.35000647529037, '0d2144d3-1517-43b2-b695-c8ed84fc8fa5', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('b8efd99e-4653-4e81-afb9-f061ddca348e', 0.31000471704694, '8f725cad-17b2-40dc-a67c-1d369b118af2', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('beeb865c-7dd9-47b6-9ef5-9c8a5b4d1a42', 0.69819428100396, '2c578873-8730-4ff6-abba-3d56580d0009', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('c63d40e8-df93-4fe6-ab2c-f53e2fe7e06c', 0.69072341618263, 'f6d8fb1b-aeae-488e-beef-ce56932bbfd3', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('c7436c16-d195-4a62-bdef-93ad5a852dcf', 0.35000647529037, '39e479fd-e5a4-4736-b774-1a07b15986d5', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('cb65bc16-5ef6-48b1-a08e-8a8d95f1eeab', 0.35910102697714, '513ef311-8470-4446-b87f-f8cc9bc9adaf', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('cc35b115-a114-481e-a5c9-a3be3357694d', 0.3208712235963, 'd8fa1f49-a46b-4bce-a10f-4ece4fef3e7d', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('d35d428d-c54e-415a-bdad-da39a31616d7', 0.25380503317372, 'a34f238d-f5e9-4875-886d-fcce9526f633', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('d8c9ac30-6735-4099-9e6c-35cd0220d3cf', 0.14456113391738, 'c375fa59-0669-47f1-93ca-1dfdb35658d1', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('db44a9f1-b647-4b87-8084-51b8377f1e33', 0.15743534117368, 'ef3b28d7-08a0-4371-901d-4a9ecbf64a73', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('e91e45f1-1569-494b-a334-cdc198e9d818', 0.35910102697714, '83bff22d-14c7-4ef1-b732-42e64508fef0', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('f04b4ca7-0dd2-49a6-9f79-779b7de4a30a', 0.15771173163779, '9dd5a995-1c6b-41d5-b57f-69bade03909b', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('f753a9c1-f650-41cc-a5b1-554a64860fe8', 0.35910102697714, 'bb02812e-0ae7-41d8-b12e-033aa7ec1532', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('faca7192-79f9-4db3-a3e2-c47164df1a2c', 0.31588538476724, 'edca5f8d-ccd8-4bc0-bf64-fadb6cc170d9', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('fbe23260-b4e7-41c0-9de7-dcc5d2d1b829', 0.31588538476724, '1b710ab6-f73d-4a55-b11b-3b94fc152567', '2021-06-18 07:11:26', '2021-06-18 07:11:26'),
('fc8ce045-2c26-4cd5-99ef-53dc8ae02b59', 0.69670229243626, '2ce4687b-7f19-4d5a-97df-99e7745e8aff', '2021-06-18 07:11:26', '2021-06-18 07:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `kader_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `kader_id`, `remember_token`, `created_at`, `updated_at`) VALUES
('5f4426b1-863e-4ffa-9849-54b314042e78', 'sriwulandari', '$2y$10$sORI7oHHXJGkYgOOHuY29uWSc7s1jvgStnVPq99f6ED2n5tV/T5IG', 'administrator', 'c1374743-8587-4745-95e2-80bb6f1f11c2', NULL, '2021-06-18 05:27:58', '2021-06-18 05:27:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kaders`
--
ALTER TABLE `kaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriterias_kader_id_unique` (`kader_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rangkings`
--
ALTER TABLE `rangkings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rangkings_kader_id_unique` (`kader_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_kader_id_foreign` (`kader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD CONSTRAINT `kriterias_kader_id_foreign` FOREIGN KEY (`kader_id`) REFERENCES `kaders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rangkings`
--
ALTER TABLE `rangkings`
  ADD CONSTRAINT `rangkings_kader_id_foreign` FOREIGN KEY (`kader_id`) REFERENCES `kaders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kader_id_foreign` FOREIGN KEY (`kader_id`) REFERENCES `kaders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
