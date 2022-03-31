-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 02:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evalnode`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `who` int(11) DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `countdown_pass` bigint(20) DEFAULT NULL,
  `countdown_otp` bigint(20) DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `uuid`, `assessment_id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(1, '224955cd-bf9c-4b4c-b9a1-41055107da1b', '2e128575-02a6-41a2-8359-9a99105c47e9', '925b4661-7452-486f-be91-777636d36722', '35 and a half', 0, '2020-05-19 19:11:10', '2020-05-19 19:11:10'),
(2, '02a5479d-2c67-42cb-95ee-84afb3910ccb', '2e128575-02a6-41a2-8359-9a99105c47e9', '925b4661-7452-486f-be91-777636d36722', '4', 0, '2020-05-19 19:11:10', '2020-05-19 19:11:10'),
(3, '6972805c-fda7-4b3a-a19d-b0e3dbd54231', '2e128575-02a6-41a2-8359-9a99105c47e9', '925b4661-7452-486f-be91-777636d36722', '26', 0, '2020-05-19 19:11:10', '2020-05-19 19:11:10'),
(4, '79b34bfc-ffe0-46a9-96a6-0d78b477aab4', '2e128575-02a6-41a2-8359-9a99105c47e9', '925b4661-7452-486f-be91-777636d36722', '36', 1, '2020-05-19 19:11:10', '2020-05-19 19:11:10'),
(5, '0d48db3b-319b-44e6-80ac-af2a10a761b2', '2e128575-02a6-41a2-8359-9a99105c47e9', '911e7a49-8d2a-4358-866d-76f69e9450cf', 'Seven', 0, '2020-05-19 19:14:58', '2020-05-19 19:14:58'),
(6, 'b6b5f9e2-1c6b-4dfe-9331-fc54a92bd0d4', '2e128575-02a6-41a2-8359-9a99105c47e9', '911e7a49-8d2a-4358-866d-76f69e9450cf', 'Twelve', 0, '2020-05-19 19:14:58', '2020-05-19 19:14:58'),
(7, '08bbec6d-a805-4392-8eb9-1370ba8861d3', '2e128575-02a6-41a2-8359-9a99105c47e9', '911e7a49-8d2a-4358-866d-76f69e9450cf', 'Five', 1, '2020-05-19 19:14:58', '2020-05-19 19:14:58'),
(8, '8c02df62-2d2a-4361-be2b-9b05dac12b73', '2e128575-02a6-41a2-8359-9a99105c47e9', '911e7a49-8d2a-4358-866d-76f69e9450cf', 'Ten', 0, '2020-05-19 19:14:58', '2020-05-19 19:14:58'),
(9, '5335b3cb-81a3-426c-ae9a-902c9b1c0676', '2e128575-02a6-41a2-8359-9a99105c47e9', '872243ac-ce9b-42d8-b3f8-f7f55483b383', 'Abak', 0, '2020-05-19 19:16:11', '2020-05-19 19:16:11'),
(10, '260cbac6-15c8-4f1c-b5cb-d8c273a1ee76', '2e128575-02a6-41a2-8359-9a99105c47e9', '872243ac-ce9b-42d8-b3f8-f7f55483b383', 'Uyo', 1, '2020-05-19 19:16:11', '2020-05-19 19:16:11'),
(11, 'be18a0ae-072b-4588-949d-ce72cd20e837', '2e128575-02a6-41a2-8359-9a99105c47e9', '872243ac-ce9b-42d8-b3f8-f7f55483b383', 'Oron', 0, '2020-05-19 19:16:11', '2020-05-19 19:16:11'),
(12, '85044bf0-3308-423d-a318-c8a13f17c8db', '2e128575-02a6-41a2-8359-9a99105c47e9', '872243ac-ce9b-42d8-b3f8-f7f55483b383', 'Eket', 0, '2020-05-19 19:16:11', '2020-05-19 19:16:11'),
(13, 'b94e5026-053b-4cb4-b3ff-aefd0cd17db9', '2e128575-02a6-41a2-8359-9a99105c47e9', '817ab1e2-bfcf-4ad6-8bd1-4a0d5b314c6b', '180 degree', 0, '2020-05-19 19:18:24', '2020-05-19 19:18:24'),
(14, '9b6f5018-e308-4038-baac-76163cdf4a38', '2e128575-02a6-41a2-8359-9a99105c47e9', '817ab1e2-bfcf-4ad6-8bd1-4a0d5b314c6b', '45 degree', 0, '2020-05-19 19:18:24', '2020-05-19 19:18:24'),
(15, 'd4d52bc2-ad5e-4793-a1db-4b9c173a93ec', '2e128575-02a6-41a2-8359-9a99105c47e9', '817ab1e2-bfcf-4ad6-8bd1-4a0d5b314c6b', '90 degree', 1, '2020-05-19 19:18:24', '2020-05-19 19:18:24'),
(16, '14c4a628-ba32-4b0c-9b6f-6f53b7b42abd', '2e128575-02a6-41a2-8359-9a99105c47e9', '817ab1e2-bfcf-4ad6-8bd1-4a0d5b314c6b', 'the right degree', 0, '2020-05-19 19:18:24', '2020-05-19 19:18:24'),
(17, 'd87675f4-491f-4ea0-a34e-8983c5519bb1', '2e128575-02a6-41a2-8359-9a99105c47e9', 'e598f445-e3c4-4bdb-98a8-dc6fa3ace0b4', '2 tires', 0, '2020-05-19 19:22:18', '2020-05-19 19:22:18'),
(18, '6072ead1-88ca-4c28-ac95-16499ef70d95', '2e128575-02a6-41a2-8359-9a99105c47e9', 'e598f445-e3c4-4bdb-98a8-dc6fa3ace0b4', '8 tires', 0, '2020-05-19 19:22:18', '2020-05-19 19:22:18'),
(19, '83706aff-dd6e-413d-b19f-44ae1b1de6ff', '2e128575-02a6-41a2-8359-9a99105c47e9', 'e598f445-e3c4-4bdb-98a8-dc6fa3ace0b4', '4 tires', 0, '2020-05-19 19:22:18', '2020-05-19 19:22:18'),
(20, 'adffe596-812d-4969-8317-5476d777a46a', '2e128575-02a6-41a2-8359-9a99105c47e9', 'e598f445-e3c4-4bdb-98a8-dc6fa3ace0b4', '3 tires', 1, '2020-05-19 19:22:18', '2020-05-19 19:22:18'),
(21, '62270f06-1c8c-47e1-8afc-d7b684f3b268', '2e128575-02a6-41a2-8359-9a99105c47e9', '611970e8-b845-4836-af17-b5fa4a4a648f', 'Ben Ice', 0, '2020-05-19 19:23:41', '2020-05-19 19:23:41'),
(22, '4b02c44a-3dd8-4715-afe8-57031a00aea1', '2e128575-02a6-41a2-8359-9a99105c47e9', '611970e8-b845-4836-af17-b5fa4a4a648f', 'George Washington', 1, '2020-05-19 19:23:41', '2020-05-19 19:23:41'),
(23, 'cb830ce2-9b87-48f6-8b66-169e9c948230', '2e128575-02a6-41a2-8359-9a99105c47e9', '611970e8-b845-4836-af17-b5fa4a4a648f', 'John F Kenedy', 0, '2020-05-19 19:23:41', '2020-05-19 19:23:41'),
(24, '45ca2d32-f900-42c0-a55a-9b9e24ce97a5', '2e128575-02a6-41a2-8359-9a99105c47e9', '611970e8-b845-4836-af17-b5fa4a4a648f', 'Lucas Graham', 0, '2020-05-19 19:23:41', '2020-05-19 19:23:41'),
(25, 'f06bcb95-4e62-4c74-9cab-e56801f2d4e3', '2e128575-02a6-41a2-8359-9a99105c47e9', '01276a46-f840-4f46-8410-9c70e2d21635', 'New Nigeria', 0, '2020-05-19 19:27:12', '2020-05-19 19:27:12'),
(26, 'caad513e-62f3-46df-80cb-aeaf2f8ce09c', '2e128575-02a6-41a2-8359-9a99105c47e9', '01276a46-f840-4f46-8410-9c70e2d21635', 'New Georgia', 0, '2020-05-19 19:27:12', '2020-05-19 19:27:12'),
(27, 'a8bcf132-ad79-4339-a766-33d520cf07a3', '2e128575-02a6-41a2-8359-9a99105c47e9', '01276a46-f840-4f46-8410-9c70e2d21635', 'New Orleans', 0, '2020-05-19 19:27:12', '2020-05-19 19:27:12'),
(28, '1af4fc02-f909-4887-ac51-4bf9e0e36bc2', '2e128575-02a6-41a2-8359-9a99105c47e9', '01276a46-f840-4f46-8410-9c70e2d21635', 'New Amsterdam', 1, '2020-05-19 19:27:12', '2020-05-19 19:27:12'),
(29, '092d24ce-a7fa-4716-840a-5990b741d3bb', '2e128575-02a6-41a2-8359-9a99105c47e9', '9e655b04-0af5-4b4b-b635-30f04c74a504', 'Queen of England visit to Nigeria', 0, '2020-05-19 19:29:22', '2020-05-19 19:29:22'),
(30, '6e01538f-7a44-4aca-b441-4ee71731f53e', '2e128575-02a6-41a2-8359-9a99105c47e9', '9e655b04-0af5-4b4b-b635-30f04c74a504', 'Signing of the Human Right Treaty', 0, '2020-05-19 19:29:22', '2020-05-19 19:29:22'),
(31, 'e626be6d-1970-4938-a990-d60d708abb27', '2e128575-02a6-41a2-8359-9a99105c47e9', '9e655b04-0af5-4b4b-b635-30f04c74a504', 'Freedom of slavery', 0, '2020-05-19 19:29:22', '2020-05-19 19:29:22'),
(32, '60ed6d39-4e7f-42d5-8d51-ef306693ffe9', '2e128575-02a6-41a2-8359-9a99105c47e9', '9e655b04-0af5-4b4b-b635-30f04c74a504', 'Amalgamation', 1, '2020-05-19 19:29:22', '2020-05-19 19:29:22'),
(33, 'c86e88f9-00be-42f6-8c72-6ee989d94a15', '2e128575-02a6-41a2-8359-9a99105c47e9', '0ed79d26-f949-424a-9056-30e5f3ea5a6d', 'A singing person', 0, '2020-05-19 19:30:45', '2020-05-19 19:30:45'),
(34, '7857b194-36b1-45d4-a0cf-af4c1212e3f8', '2e128575-02a6-41a2-8359-9a99105c47e9', '0ed79d26-f949-424a-9056-30e5f3ea5a6d', 'A musician', 1, '2020-05-19 19:30:45', '2020-05-19 19:30:45'),
(35, '6c1bd32d-cd38-4b10-bd11-e9218e91aed9', '2e128575-02a6-41a2-8359-9a99105c47e9', '0ed79d26-f949-424a-9056-30e5f3ea5a6d', 'A super star', 0, '2020-05-19 19:30:45', '2020-05-19 19:30:45'),
(36, '07d3e464-a531-4b91-9468-2bca53d6cfda', '2e128575-02a6-41a2-8359-9a99105c47e9', '0ed79d26-f949-424a-9056-30e5f3ea5a6d', 'A Legend', 0, '2020-05-19 19:30:45', '2020-05-19 19:30:45'),
(37, '24c81c9a-b032-4b48-aa03-97de0b38634f', '9877cdf9-d873-4e63-b23b-09dc5586af15', '6e12ab8f-b108-4385-a32a-831e5a6f33f4', '24', 0, '2020-06-03 08:58:51', '2020-06-03 08:58:51'),
(38, '922107ac-6914-451c-bb48-5c5a3e63b9b4', '9877cdf9-d873-4e63-b23b-09dc5586af15', '6e12ab8f-b108-4385-a32a-831e5a6f33f4', '15', 0, '2020-06-03 08:58:51', '2020-06-03 08:58:51'),
(39, 'cd99a94b-4cf4-4130-a68d-eed12e8fa115', '9877cdf9-d873-4e63-b23b-09dc5586af15', '6e12ab8f-b108-4385-a32a-831e5a6f33f4', '12', 0, '2020-06-03 08:58:51', '2020-06-03 08:58:51'),
(40, 'ac951058-835c-40ef-a866-ef5e1216b6a6', '9877cdf9-d873-4e63-b23b-09dc5586af15', '6e12ab8f-b108-4385-a32a-831e5a6f33f4', '52', 1, '2020-06-03 08:58:51', '2020-06-03 08:58:51'),
(41, '16acc841-0d89-48fb-91a3-a5ad667d2b7a', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a1281920-9cec-443a-bf2d-acb5f8820e4a', '20', 0, '2020-06-03 08:59:44', '2020-06-03 08:59:44'),
(42, '32fab394-9633-4db3-a1d5-9df0e35547b1', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a1281920-9cec-443a-bf2d-acb5f8820e4a', '6', 0, '2020-06-03 08:59:44', '2020-06-03 08:59:44'),
(43, '1e78f6ef-bc47-4319-8637-baab9e273766', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a1281920-9cec-443a-bf2d-acb5f8820e4a', '4', 0, '2020-06-03 08:59:44', '2020-06-03 08:59:44'),
(44, '1086cbb3-dfc5-44a3-b343-e268c19f4954', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a1281920-9cec-443a-bf2d-acb5f8820e4a', '2', 1, '2020-06-03 08:59:44', '2020-06-03 08:59:44'),
(45, 'ffb3b8be-6250-4ca7-88ed-48b0c1d333ba', '9877cdf9-d873-4e63-b23b-09dc5586af15', '9894989e-df84-4ad5-8634-2e0892dc5e12', '12', 0, '2020-06-03 09:01:00', '2020-06-03 09:01:00'),
(46, '36565ea6-44bc-42d8-bb17-c5ee0e61da62', '9877cdf9-d873-4e63-b23b-09dc5586af15', '9894989e-df84-4ad5-8634-2e0892dc5e12', '6', 0, '2020-06-03 09:01:00', '2020-06-03 09:01:00'),
(47, 'a952ae33-8877-4b7a-b179-0ce303730b64', '9877cdf9-d873-4e63-b23b-09dc5586af15', '9894989e-df84-4ad5-8634-2e0892dc5e12', '4', 1, '2020-06-03 09:01:00', '2020-06-03 09:01:00'),
(48, 'f44758d0-d2c0-43b3-a5bd-e7876381f7b6', '9877cdf9-d873-4e63-b23b-09dc5586af15', '9894989e-df84-4ad5-8634-2e0892dc5e12', '3', 0, '2020-06-03 09:01:00', '2020-06-03 09:01:00'),
(49, 'b67ac573-44a1-4658-9e41-8de947c39ebf', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a019c39a-b793-4855-8014-b83143ae93d0', 'Portharcourt Housing Company of Nigeria', 0, '2020-06-03 09:03:18', '2020-06-03 09:03:18'),
(50, 'b9dd9f69-2985-4781-b021-e664f296fff1', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a019c39a-b793-4855-8014-b83143ae93d0', 'Power Holding Chamber of the Nation', 0, '2020-06-03 09:03:18', '2020-06-03 09:03:18'),
(51, '26caa0f2-930a-41ba-b8d0-4f148b0ecfc8', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a019c39a-b793-4855-8014-b83143ae93d0', 'Petroleum Harbor Corporation of Nigeria', 0, '2020-06-03 09:03:18', '2020-06-03 09:03:18'),
(52, '09b9cd69-79c4-4516-b72d-a4bf6fd68bf2', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a019c39a-b793-4855-8014-b83143ae93d0', 'Power Holding Company of Nigeria', 1, '2020-06-03 09:03:18', '2020-06-03 09:03:18'),
(53, 'c3273e77-4d2b-47e7-ad18-65c9179cf3ad', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a514ea9f-4d99-4fe9-933f-e33cf150afa7', '121', 0, '2020-06-03 09:05:09', '2020-06-03 09:05:09'),
(54, 'd71ee006-b4c1-4f3f-8aad-1de751f2ca31', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a514ea9f-4d99-4fe9-933f-e33cf150afa7', '120', 0, '2020-06-03 09:05:09', '2020-06-03 09:05:09'),
(55, 'e0ba26d8-7e90-456a-9bce-567e7ba3a03e', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a514ea9f-4d99-4fe9-933f-e33cf150afa7', '156', 0, '2020-06-03 09:05:09', '2020-06-03 09:05:09'),
(56, 'f7374314-430e-4bf5-8d9c-bfce374fe000', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'a514ea9f-4d99-4fe9-933f-e33cf150afa7', '144', 1, '2020-06-03 09:05:09', '2020-06-03 09:05:09'),
(57, 'e7aeb7e1-c43f-42e0-92f3-048428608f11', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'f8a5fdbc-60db-4848-91a6-62685d45735a', 'five colors', 1, '2020-06-13 17:59:52', '2020-06-16 14:54:28'),
(58, '70358c9d-2aff-4652-96fe-83bcbaa46e0d', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'f8a5fdbc-60db-4848-91a6-62685d45735a', 'two colors', 0, '2020-06-13 17:59:52', '2020-06-16 14:54:28'),
(59, '21817151-96bf-4276-bf0b-39b94210aec1', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'f8a5fdbc-60db-4848-91a6-62685d45735a', 'too many colors', 0, '2020-06-13 17:59:52', '2020-06-16 14:54:28'),
(60, '1aba0b73-a035-4d3d-8099-db819cf934ca', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'f8a5fdbc-60db-4848-91a6-62685d45735a', 'three colors', 0, '2020-06-13 17:59:52', '2020-06-16 14:54:28'),
(61, 'b3830260-52ba-4985-bcb4-11f12935823c', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'c81152cf-0b98-4ad1-b95a-b00de2fa19f8', 'False', 1, '2020-06-13 17:59:52', '2020-06-13 17:59:52'),
(62, 'e1b1456e-1379-4796-ada1-94e4313f1675', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'c81152cf-0b98-4ad1-b95a-b00de2fa19f8', 'True', 0, '2020-06-13 17:59:52', '2020-06-13 17:59:52'),
(63, '1f586605-c9e9-43b4-9bfb-9192d215019f', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'c81152cf-0b98-4ad1-b95a-b00de2fa19f8', NULL, 0, '2020-06-13 17:59:52', '2020-06-13 17:59:52'),
(64, 'e6340f5b-b9c5-4b87-bd44-447ab19ab7db', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'c81152cf-0b98-4ad1-b95a-b00de2fa19f8', NULL, 0, '2020-06-13 17:59:52', '2020-06-13 17:59:52'),
(65, 'edd81700-fb43-42ac-be8b-762841e6a67b', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'cf3a9227-7da5-4826-ab78-ff3316c7368f', 'Toyota', 0, '2020-06-13 18:01:00', '2020-06-16 12:17:11'),
(66, 'b4bfa427-6ee2-4890-83b1-7e92a5dd0158', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'cf3a9227-7da5-4826-ab78-ff3316c7368f', 'Honda', 1, '2020-06-13 18:01:00', '2020-06-16 12:17:11'),
(67, 'b436a19e-6891-48c4-8cdf-78b55f5c5b77', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'cf3a9227-7da5-4826-ab78-ff3316c7368f', 'Ford', 0, '2020-06-13 18:01:00', '2020-06-16 12:17:11'),
(68, '20d5b4f1-60ff-4e5f-8eae-6f4c29320350', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'cf3a9227-7da5-4826-ab78-ff3316c7368f', 'Mercedes', 0, '2020-06-13 18:01:00', '2020-06-16 12:17:11'),
(69, '638d1c0a-2a8e-4d0b-8a66-a3880c786329', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '531df035-1ed8-4847-b9dc-a00f8c99c1e7', 'False', 1, '2020-06-13 18:01:00', '2020-06-16 12:13:10'),
(70, 'c51b62f3-9e6f-4943-bcfe-d1528e39bdcf', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '531df035-1ed8-4847-b9dc-a00f8c99c1e7', 'True', 0, '2020-06-13 18:01:00', '2020-06-16 12:13:10'),
(71, '3c0926af-774c-4c84-bcde-0ddf0c658339', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '86d6ee0e-7965-4868-992c-c3e1106dce76', 'five colors', 0, '2020-06-13 18:16:09', '2020-06-16 12:15:47'),
(72, 'c001a067-3f58-4f1f-85ea-4d718ca30d7b', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '86d6ee0e-7965-4868-992c-c3e1106dce76', 'three colors', 0, '2020-06-13 18:16:09', '2020-06-16 12:15:47'),
(83, '69cb871f-032e-4c81-9db6-da813cdf7af6', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '1ce359f7-d9ce-429e-9d04-3b0e9e0bb76f', 'five colors', 0, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(74, '3b15beae-4d62-46b2-927a-abc81018063c', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '86d6ee0e-7965-4868-992c-c3e1106dce76', 'four colors', 0, '2020-06-13 18:16:09', '2020-06-16 12:15:47'),
(75, '03464fca-3f58-4774-9327-b646b3877920', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '86d6ee0e-7965-4868-992c-c3e1106dce76', 'seven colors', 1, '2020-06-13 18:16:10', '2020-06-16 12:15:47'),
(76, '1b316993-ab1d-4e80-9313-b7ef4abdfddc', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'b305e1bd-00a9-41ff-8a6c-75835f6dc91a', 'False', 1, '2020-06-13 18:16:10', '2020-06-13 18:16:10'),
(77, 'd64e95df-7486-4501-95c8-fadcb40c5f25', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'b305e1bd-00a9-41ff-8a6c-75835f6dc91a', 'True', 0, '2020-06-13 18:16:10', '2020-06-13 18:16:10'),
(85, '225ea8e5-f5c9-4703-85f0-fe4931ca810b', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '1ce359f7-d9ce-429e-9d04-3b0e9e0bb76f', 'too many colors', 0, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(84, '3f8a05e2-2191-4ba3-a875-9ddf0570dd79', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '1ce359f7-d9ce-429e-9d04-3b0e9e0bb76f', 'seven colors', 1, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(86, 'cd42a807-b012-4c54-a744-296f4de83511', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '1ce359f7-d9ce-429e-9d04-3b0e9e0bb76f', 'four colors', 0, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(87, '09e14785-1005-4e3a-bb02-46c10fb8538c', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '5e24ea10-f1f2-4e79-ad7e-2e24c352adf6', 'False', 1, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(88, '0cdf3dd8-d664-4c9b-8d4c-3ba932c4089a', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '5e24ea10-f1f2-4e79-ad7e-2e24c352adf6', 'True', 0, '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(89, '92d862b6-3236-4dcb-bf24-a06a31a2f2a5', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'f8a5fdbc-60db-4848-91a6-62685d45735a', 'i dont know', 0, '2020-06-16 14:54:28', '2020-06-16 14:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `global_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curriculum_item_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `attempts_allowed` int(11) DEFAULT NULL,
  `pass_percent` double(4,1) DEFAULT NULL,
  `questions_allotted` int(11) DEFAULT NULL,
  `active_from` bigint(20) DEFAULT NULL,
  `expire_at` bigint(20) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_number_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `publish_time` bigint(20) DEFAULT NULL,
  `show_score` tinyint(1) DEFAULT NULL,
  `allow_review` tinyint(1) DEFAULT NULL,
  `max_candidate` int(11) DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `uuid`, `organization_id`, `title`, `global_name`, `public_key`, `introduction`, `instructions`, `photo`, `course_id`, `curriculum_item_id`, `mode`, `duration`, `attempts_allowed`, `pass_percent`, `questions_allotted`, `active_from`, `expire_at`, `type`, `answer_number_mode`, `published`, `publish_time`, `show_score`, `allow_review`, `max_candidate`, `token`, `active`, `created_at`, `updated_at`) VALUES
(1, '2e128575-02a6-41a2-8359-9a99105c47e9', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'Brain Teaser', 'Quiz', '7lmQfyAFSj1T86gKVkxljSBzjuRXe1u53pmwQGnR2pofpOu', 'A SIMPLE ASSESSMENT TO DEMONSTRATE', 'ANSWER ALL QUESTIONS IN ANY ORDER', 'uploads/organization/assessment/image/2K47QfkyUMQhpS5NVCyA.gif', NULL, NULL, 'timed ', 6, 1, 65.0, 5, NULL, NULL, 'public', NULL, 1, 1592317664, 0, NULL, NULL, NULL, 1, '2020-05-19 19:08:59', '2020-08-20 01:05:41'),
(2, '9877cdf9-d873-4e63-b23b-09dc5586af15', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'Test', 'Small Test', NULL, 'a small test', 'answer all question', '', NULL, NULL, 'timed ', 6, 4, 50.0, 5, NULL, NULL, 'public', NULL, 1, 1591178738, 1, 1, NULL, NULL, 1, '2020-06-03 08:57:48', '2020-06-03 09:05:38'),
(3, '8fd9d2b2-c425-4115-b7b8-07461df1ff93', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'First Term Assessment', 'Examination', NULL, 'This examination covers for the Assessments for first Term', 'Answer all questions in 10 minutes', '', NULL, NULL, 'timed ', 10, 1, 80.0, 5, NULL, NULL, 'private', NULL, 0, 1592322925, 1, 1, NULL, NULL, 1, '2020-06-10 18:29:17', '2020-06-16 14:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `engaged_answers`
--

CREATE TABLE `engaged_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engaged_assessment_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engaged_question_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct` tinyint(1) DEFAULT NULL,
  `selected` tinyint(1) DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engaged_answers`
--

INSERT INTO `engaged_answers` (`id`, `uuid`, `engaged_assessment_id`, `engaged_question_id`, `answer`, `correct`, `selected`, `value`, `created_at`, `updated_at`) VALUES
(1, '93e6f6e7-40be-49b2-9439-160f23a42354', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '07ead7f0-3956-47f9-a288-6bdd0e833606', '180 degree', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(2, '0f854b3e-2988-41af-97e8-94da68f256c9', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '07ead7f0-3956-47f9-a288-6bdd0e833606', 'the right degree', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(3, '5872af1e-ff16-43ab-8183-d21a55c5b051', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '07ead7f0-3956-47f9-a288-6bdd0e833606', '90 degree', 1, 1, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(4, '63b63ac0-7329-47dd-b387-d5bfa23a4bab', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '07ead7f0-3956-47f9-a288-6bdd0e833606', '45 degree', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(5, 'b9e2b5ca-f1e5-4253-98a0-6faea5c25921', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '5bd39bd4-b58a-461d-a16b-c19dd4272168', 'New Nigeria', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(6, '16de91a8-258d-4fda-95b8-1e59ee5cacd0', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '5bd39bd4-b58a-461d-a16b-c19dd4272168', 'New Amsterdam', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(7, 'fe4b2898-dedc-4997-9aed-651af77d0436', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '5bd39bd4-b58a-461d-a16b-c19dd4272168', 'New Orleans', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(8, '8b2760c8-345d-4598-ac3d-7d8e100584da', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '5bd39bd4-b58a-461d-a16b-c19dd4272168', 'New Georgia', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(9, 'c41a5c5b-6738-41c2-9e34-555a72c725a7', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '769eb306-4f12-4eb3-8132-4304b2a661df', '2 tires', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(10, '350f8251-4364-4afa-9680-e5b11bb6b458', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '769eb306-4f12-4eb3-8132-4304b2a661df', '8 tires', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(11, 'c365b586-923a-4cd8-931a-eb87588d28ca', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '769eb306-4f12-4eb3-8132-4304b2a661df', '4 tires', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(12, '828aeb37-7cd4-4f81-8f41-6bf8d1395a22', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '769eb306-4f12-4eb3-8132-4304b2a661df', '3 tires', 1, 1, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(13, 'aa21a0d4-26e5-4d7e-aa24-6045aa09339e', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'e429498d-5066-4891-a313-2be5ad531173', '35 and a half', 0, 1, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(14, '407a6913-cf00-4e87-a544-987ada058537', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'e429498d-5066-4891-a313-2be5ad531173', '26', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(15, '04558ee4-d561-4520-973f-4a6e038f9f34', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'e429498d-5066-4891-a313-2be5ad531173', '4', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(16, 'c2efd3fa-50fa-435d-8bd5-2a26546bad22', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'e429498d-5066-4891-a313-2be5ad531173', '36', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(17, 'f3d6d593-0c47-4918-a50a-e26fa74673de', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '97b82a8a-4b45-441e-a673-de178bf93273', 'Twelve', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(18, '060c217f-2c8a-4d89-bef9-8662ea91afe6', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '97b82a8a-4b45-441e-a673-de178bf93273', 'Ten', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(19, '76f48221-f98a-40b3-b168-85c9be2d5e35', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '97b82a8a-4b45-441e-a673-de178bf93273', 'Seven', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(20, '039a4ebe-cb41-46f1-9ed3-952acff087a2', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '97b82a8a-4b45-441e-a673-de178bf93273', 'Five', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(21, 'c9cd2fb7-b374-4c6d-9309-a7fad5b22536', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '30a6c67b-5e00-4379-bf88-baff4253242c', 'Lucas Graham', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(22, '63cbf629-a4a4-48a5-bd1d-30b828408339', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '30a6c67b-5e00-4379-bf88-baff4253242c', 'John F Kenedy', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(23, '9208eadc-13bc-45f8-bdd2-324885ddbd6d', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '30a6c67b-5e00-4379-bf88-baff4253242c', 'Ben Ice', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(24, '4c564ee6-b5fb-40e6-8461-5e17be972f04', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '30a6c67b-5e00-4379-bf88-baff4253242c', 'George Washington', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(25, '77f64fb8-060a-49bc-8459-fff52a47825f', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '50f45f68-bd08-4ced-a1e6-f2aa97a18c1b', 'Oron', 0, 1, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(26, '03f99691-9374-409b-bc99-ad66e9fff55b', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '50f45f68-bd08-4ced-a1e6-f2aa97a18c1b', 'Eket', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(27, 'a432c50a-0799-404d-9f1e-61abed91d315', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '50f45f68-bd08-4ced-a1e6-f2aa97a18c1b', 'Abak', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(28, '872f8ebe-2562-4864-b1d0-a18fe528aa6f', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '50f45f68-bd08-4ced-a1e6-f2aa97a18c1b', 'Uyo', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(29, '1989630d-34b5-48fe-ab3a-9c0a7816ffd1', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '948e6a58-ac5f-4122-bf82-ef7281a7b37d', 'Freedom of slavery', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(30, 'ea3e9cd5-f41c-41fd-85c4-f740ffb550e7', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '948e6a58-ac5f-4122-bf82-ef7281a7b37d', 'Queen of England visit to Nigeria', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(31, '744fb008-3540-4063-b780-8ab6e8dfa7f4', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '948e6a58-ac5f-4122-bf82-ef7281a7b37d', 'Amalgamation', 1, 1, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(32, '7db7f979-deb5-4fad-b27a-70e5669840b3', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '948e6a58-ac5f-4122-bf82-ef7281a7b37d', 'Signing of the Human Right Treaty', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(33, '411d4228-6226-4556-96a8-53aadb532c47', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'd64c347b-6717-49a8-9635-9af8d0cc24c0', 'A musician', 1, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(34, '401e0ffd-c963-49c8-8f83-0cb27e289f9c', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'd64c347b-6717-49a8-9635-9af8d0cc24c0', 'A singing person', 0, 0, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(35, '4da1c16d-97b5-46bf-be17-2cf2db7c1c9b', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'd64c347b-6717-49a8-9635-9af8d0cc24c0', 'A super star', 0, 0, NULL, '2020-05-19 19:34:15', '2020-05-19 19:34:45'),
(36, 'b6f577be-bf49-4502-b541-b0e39290dd9c', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'd64c347b-6717-49a8-9635-9af8d0cc24c0', 'A Legend', 0, 0, NULL, '2020-05-19 19:34:15', '2020-05-19 19:34:45'),
(37, '9e94071a-12e6-40e3-852a-d47168f393c7', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f82beca9-0583-47df-bf52-7935fd8b0c7a', 'New Georgia', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(38, '81a86905-c1cb-4e9f-ad98-664eaedcf77c', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f82beca9-0583-47df-bf52-7935fd8b0c7a', 'New Orleans', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(39, '5bc89c91-214c-4457-a14b-a2ecd31948de', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f82beca9-0583-47df-bf52-7935fd8b0c7a', 'New Amsterdam', 1, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(40, 'b2873f9e-86f3-4fd3-8b74-4ed93e6d700d', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f82beca9-0583-47df-bf52-7935fd8b0c7a', 'New Nigeria', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(41, '1951edd2-7eb0-4172-8954-6d538119a261', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '73bf6a98-4a0f-4488-bc1f-f5c61778cbe4', '4', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(42, '88d06f0a-0b2e-43ed-ab89-180f02d39144', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '73bf6a98-4a0f-4488-bc1f-f5c61778cbe4', '36', 1, 1, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(43, 'e46567bf-4692-4167-b6bc-f87063346979', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '73bf6a98-4a0f-4488-bc1f-f5c61778cbe4', '35 and a half', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(44, 'bfb03bbd-9d7e-4063-b852-e446425e0a84', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '73bf6a98-4a0f-4488-bc1f-f5c61778cbe4', '26', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(45, '4e55cfdf-b0f9-495f-8093-4ed8feb8e813', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '7adeda3a-1cfb-4ef5-aaf1-1ec15aa06c8d', 'Oron', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(46, '25c9e7fe-5959-426e-b91c-2e45c18f4890', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '7adeda3a-1cfb-4ef5-aaf1-1ec15aa06c8d', 'Eket', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(47, '7ba90a73-259a-40dc-8546-614e69d97157', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '7adeda3a-1cfb-4ef5-aaf1-1ec15aa06c8d', 'Uyo', 1, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(48, 'f723848a-8e1b-4915-977c-5f2d97b34cd2', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '7adeda3a-1cfb-4ef5-aaf1-1ec15aa06c8d', 'Abak', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(49, 'd7251e5c-6144-45d1-8d49-83253b4ded1a', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f0ffc991-dba5-4d3e-951a-de453c582e36', 'Ten', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(50, 'c0c38dec-63ee-44dc-8496-569cce633026', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f0ffc991-dba5-4d3e-951a-de453c582e36', 'Twelve', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(51, '253735d7-0dca-4055-9ceb-2efc30017658', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f0ffc991-dba5-4d3e-951a-de453c582e36', 'Five', 1, 1, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(52, '2215b170-5a5e-4448-9b3e-49e1ce7f211b', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'f0ffc991-dba5-4d3e-951a-de453c582e36', 'Seven', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(53, '26e3dba3-16ef-47ca-bbd9-bbf595f07680', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '327dba3f-58a9-40a9-a413-81b7025da938', 'Signing of the Human Right Treaty', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(54, 'b184d1e3-5995-4b2f-a224-3496105f7d03', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '327dba3f-58a9-40a9-a413-81b7025da938', 'Freedom of slavery', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(55, '2fdb7a6f-2dd7-4b79-bb2a-2f7d4c7bb3f2', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '327dba3f-58a9-40a9-a413-81b7025da938', 'Amalgamation', 1, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(56, 'b7072e62-8114-4b9b-af67-8438b2c03615', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '327dba3f-58a9-40a9-a413-81b7025da938', 'Queen of England visit to Nigeria', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(57, '1f52b2c4-03b2-4616-987b-c7dc27d80d16', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '83d78b39-434d-4fef-8c84-e99fa9104fc5', 'George Washington', 1, 1, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(58, '49b3e880-8e08-468f-b86b-d0b02485364b', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '83d78b39-434d-4fef-8c84-e99fa9104fc5', 'John F Kenedy', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(59, '3aa5cbc3-8dee-4603-8e31-e6ac196dfb2b', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '83d78b39-434d-4fef-8c84-e99fa9104fc5', 'Lucas Graham', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(60, '2048ea79-5b97-4b9f-93f1-e95797774cb5', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '83d78b39-434d-4fef-8c84-e99fa9104fc5', 'Ben Ice', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(61, '61e37f60-174d-4e09-850d-7d45617010c5', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2abab836-a634-4d34-9470-37e19d3c37f6', 'A super star', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(62, '1af005c1-052e-47aa-abb9-9113c5fd7e94', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2abab836-a634-4d34-9470-37e19d3c37f6', 'A musician', 1, 1, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(63, 'f9b49de5-233d-47b8-a84d-a1efb2a86eea', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2abab836-a634-4d34-9470-37e19d3c37f6', 'A singing person', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(64, '0ac52f0b-3db3-427f-be81-67b3c9c52fc0', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2abab836-a634-4d34-9470-37e19d3c37f6', 'A Legend', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(65, '8950fce7-e6b5-4911-9a53-7bcbd867a2f8', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '3aad6283-49c7-4032-93f3-0a4eb9b9342d', '90 degree', 1, 1, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(66, '224d1d20-d946-48f4-b6be-4ef3c7f67724', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '3aad6283-49c7-4032-93f3-0a4eb9b9342d', 'the right degree', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(67, '496bf6e4-8aa3-4fa5-85fc-cac11d6960b8', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '3aad6283-49c7-4032-93f3-0a4eb9b9342d', '180 degree', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(68, '0ef1088f-b1a3-4012-a6fa-2ca1c85d15c6', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '3aad6283-49c7-4032-93f3-0a4eb9b9342d', '45 degree', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(69, 'da0563b2-c553-43f5-8d5b-36018ff31892', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2053967a-b16b-4892-8b5d-200fcfa7a21a', '2 tires', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(70, '19202a98-40f3-4b35-b38d-f797b3cb39e6', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2053967a-b16b-4892-8b5d-200fcfa7a21a', '3 tires', 1, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(71, '1e5fa720-156c-4ab2-a4fd-c2762ff00794', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2053967a-b16b-4892-8b5d-200fcfa7a21a', '4 tires', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(72, '614d7a6e-1809-427b-b482-b5a6fc94c510', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '2053967a-b16b-4892-8b5d-200fcfa7a21a', '8 tires', 0, 0, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(73, 'ba9765fa-1427-4ec7-ac9e-abfdd51d04a4', 'e6634773-d16a-477e-bf93-86a23e80accd', '5c35672f-bff4-443d-b05b-c71cb51e2575', 'the right degree', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(74, '78d88c52-6507-4e3a-9514-4b6ecf907cfe', 'e6634773-d16a-477e-bf93-86a23e80accd', '5c35672f-bff4-443d-b05b-c71cb51e2575', '45 degree', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(75, '52f26008-91c0-4593-9204-b05be4caefba', 'e6634773-d16a-477e-bf93-86a23e80accd', '5c35672f-bff4-443d-b05b-c71cb51e2575', '180 degree', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(76, '0cf25193-64af-4b02-9c59-aafd231376a2', 'e6634773-d16a-477e-bf93-86a23e80accd', '5c35672f-bff4-443d-b05b-c71cb51e2575', '90 degree', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(77, 'f70c80e7-4d84-494c-9245-26ec6076be2e', 'e6634773-d16a-477e-bf93-86a23e80accd', '833b6d51-9a08-4a31-968f-a8de103828f6', 'A musician', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(78, 'ffa43ae1-d1ec-4fb9-97b9-5a232b03d1f4', 'e6634773-d16a-477e-bf93-86a23e80accd', '833b6d51-9a08-4a31-968f-a8de103828f6', 'A singing person', 0, 1, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(79, '8e2dbbce-e48b-4666-929d-383fdbb023b1', 'e6634773-d16a-477e-bf93-86a23e80accd', '833b6d51-9a08-4a31-968f-a8de103828f6', 'A Legend', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(80, '5800e4fb-26eb-469c-aa0c-7962c0c5f64c', 'e6634773-d16a-477e-bf93-86a23e80accd', '833b6d51-9a08-4a31-968f-a8de103828f6', 'A super star', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(81, 'fc3f8473-60bc-4ec1-bf87-03fa52bbcb61', 'e6634773-d16a-477e-bf93-86a23e80accd', '23795203-431d-4e67-8657-8734557c9fdc', '36', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(82, 'a51ea023-a98a-4af7-961c-d591d79d2317', 'e6634773-d16a-477e-bf93-86a23e80accd', '23795203-431d-4e67-8657-8734557c9fdc', '35 and a half', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(83, 'd6d2a884-538b-4e90-a438-8940b6443f6a', 'e6634773-d16a-477e-bf93-86a23e80accd', '23795203-431d-4e67-8657-8734557c9fdc', '4', 0, 1, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(84, '6d86cd92-53a2-4fe2-ad45-abfefc8481cb', 'e6634773-d16a-477e-bf93-86a23e80accd', '23795203-431d-4e67-8657-8734557c9fdc', '26', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(85, '4d63966b-16ce-4de2-845b-c6082c5beb6f', 'e6634773-d16a-477e-bf93-86a23e80accd', 'ffd3848a-54e2-4e9f-bace-250b6fffbba1', 'Oron', 0, 1, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(86, '7cf43362-cb0c-4c44-994e-40f260a487c8', 'e6634773-d16a-477e-bf93-86a23e80accd', 'ffd3848a-54e2-4e9f-bace-250b6fffbba1', 'Eket', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(87, '50d2381f-0524-4ffe-ba00-17533b9f1c20', 'e6634773-d16a-477e-bf93-86a23e80accd', 'ffd3848a-54e2-4e9f-bace-250b6fffbba1', 'Abak', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(88, 'd9d2cbf5-6303-44ad-9ce7-e27da686676a', 'e6634773-d16a-477e-bf93-86a23e80accd', 'ffd3848a-54e2-4e9f-bace-250b6fffbba1', 'Uyo', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(89, '7a476a89-7867-4bb1-bd8d-341873c5f7d6', 'e6634773-d16a-477e-bf93-86a23e80accd', 'c30bb84e-72ee-4d9c-982d-80c7bb9ecd1a', '3 tires', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(90, 'e6970446-396d-41cb-be97-c70a560fac81', 'e6634773-d16a-477e-bf93-86a23e80accd', 'c30bb84e-72ee-4d9c-982d-80c7bb9ecd1a', '4 tires', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(91, 'c6bb671e-0d77-4a6e-9f02-4a080c307fb2', 'e6634773-d16a-477e-bf93-86a23e80accd', 'c30bb84e-72ee-4d9c-982d-80c7bb9ecd1a', '2 tires', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(92, 'f335652e-8cf5-46b7-9744-0a1dcecc0de0', 'e6634773-d16a-477e-bf93-86a23e80accd', 'c30bb84e-72ee-4d9c-982d-80c7bb9ecd1a', '8 tires', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(93, 'd7146153-46d6-41e8-abe3-0068b356addb', 'e6634773-d16a-477e-bf93-86a23e80accd', '90af6d97-b0d2-4974-a30d-2f59595af2c1', 'Seven', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(94, '791bd80d-7a5c-47f3-8d6a-84338f824019', 'e6634773-d16a-477e-bf93-86a23e80accd', '90af6d97-b0d2-4974-a30d-2f59595af2c1', 'Ten', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(95, 'fc1974b3-60fa-4ca7-b58f-b23fd7703312', 'e6634773-d16a-477e-bf93-86a23e80accd', '90af6d97-b0d2-4974-a30d-2f59595af2c1', 'Twelve', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:57'),
(96, '19d2e04f-9f20-40a1-b847-db3ae2935de1', 'e6634773-d16a-477e-bf93-86a23e80accd', '90af6d97-b0d2-4974-a30d-2f59595af2c1', 'Five', 1, 1, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(97, '89f15098-56ce-4315-983f-af2ca45d3fb2', 'e6634773-d16a-477e-bf93-86a23e80accd', 'd4290c9c-e616-41bd-b804-1f6426d4c3c8', 'New Georgia', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(98, 'e97c4a3e-5890-48d4-9456-3b19572aa9de', 'e6634773-d16a-477e-bf93-86a23e80accd', 'd4290c9c-e616-41bd-b804-1f6426d4c3c8', 'New Nigeria', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(99, 'd4c2eb23-d7ca-4aa8-a2cf-fb49da0a9202', 'e6634773-d16a-477e-bf93-86a23e80accd', 'd4290c9c-e616-41bd-b804-1f6426d4c3c8', 'New Orleans', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(100, 'bcb2be95-8b2a-485b-92a1-577ce96335b0', 'e6634773-d16a-477e-bf93-86a23e80accd', 'd4290c9c-e616-41bd-b804-1f6426d4c3c8', 'New Amsterdam', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(101, '92ef205e-65d1-47cc-8196-8df705795b95', 'e6634773-d16a-477e-bf93-86a23e80accd', 'becc9e99-b068-406c-bc45-db911eefef0a', 'George Washington', 1, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(102, '122e5da5-8e2c-42dd-b277-de83100fc736', 'e6634773-d16a-477e-bf93-86a23e80accd', 'becc9e99-b068-406c-bc45-db911eefef0a', 'Ben Ice', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(103, '8bce38cd-58c0-4926-8f6e-77cbd660cd40', 'e6634773-d16a-477e-bf93-86a23e80accd', 'becc9e99-b068-406c-bc45-db911eefef0a', 'Lucas Graham', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(104, '51b35a1c-477b-4269-8fe5-7255c331d58f', 'e6634773-d16a-477e-bf93-86a23e80accd', 'becc9e99-b068-406c-bc45-db911eefef0a', 'John F Kenedy', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(105, 'e9331d96-45d0-40d2-b9da-ef47fb402888', 'e6634773-d16a-477e-bf93-86a23e80accd', '9249ad94-235f-4d76-814e-f29880b861a8', 'Queen of England visit to Nigeria', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(106, '4b1706c8-902f-450e-9199-18e48759b43e', 'e6634773-d16a-477e-bf93-86a23e80accd', '9249ad94-235f-4d76-814e-f29880b861a8', 'Amalgamation', 1, 1, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(107, '275c4d33-9e76-4469-9463-1f494005cee5', 'e6634773-d16a-477e-bf93-86a23e80accd', '9249ad94-235f-4d76-814e-f29880b861a8', 'Signing of the Human Right Treaty', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(108, 'a4a0b25b-68bc-467b-a695-6264978e2197', 'e6634773-d16a-477e-bf93-86a23e80accd', '9249ad94-235f-4d76-814e-f29880b861a8', 'Freedom of slavery', 0, 0, NULL, '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(109, '6ee33578-ff92-4ac5-b99a-d7203f375d26', 'c9020ab0-8fe5-418c-a060-509779b01269', '3456023b-5638-4ccb-b929-1acdfb3b7cb2', 'John F Kenedy', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(110, 'b55cb124-ea94-4b41-a761-d00d6bbd97ef', 'c9020ab0-8fe5-418c-a060-509779b01269', '3456023b-5638-4ccb-b929-1acdfb3b7cb2', 'George Washington', 1, 1, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(111, 'dd24c816-52e6-45fd-afaa-1d0e93fd9a6f', 'c9020ab0-8fe5-418c-a060-509779b01269', '3456023b-5638-4ccb-b929-1acdfb3b7cb2', 'Ben Ice', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(112, '8f6451c2-dc50-4a02-97cd-580903bd9d9c', 'c9020ab0-8fe5-418c-a060-509779b01269', '3456023b-5638-4ccb-b929-1acdfb3b7cb2', 'Lucas Graham', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(113, 'aabfe48b-bb73-426b-b511-4bc56109d197', 'c9020ab0-8fe5-418c-a060-509779b01269', '5386543a-63d7-4dd0-8580-9dd367e7e7ba', 'Queen of England visit to Nigeria', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(114, '86da5518-2995-483b-8893-5735f4755aa4', 'c9020ab0-8fe5-418c-a060-509779b01269', '5386543a-63d7-4dd0-8580-9dd367e7e7ba', 'Amalgamation', 1, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(115, '5312389e-23a3-4684-8d0e-b0051bddf2e5', 'c9020ab0-8fe5-418c-a060-509779b01269', '5386543a-63d7-4dd0-8580-9dd367e7e7ba', 'Signing of the Human Right Treaty', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(116, '2a6a2f7a-2232-498b-9cc9-c28033053217', 'c9020ab0-8fe5-418c-a060-509779b01269', '5386543a-63d7-4dd0-8580-9dd367e7e7ba', 'Freedom of slavery', 0, 1, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(117, '4b2c0ab3-ad76-4c71-90ae-47e03a1864cc', 'c9020ab0-8fe5-418c-a060-509779b01269', '3c80ed0f-1bca-4976-a6ba-3eef8785af7f', 'the right degree', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(118, '7e20bb97-3dd1-4404-adab-c29bea0d7d31', 'c9020ab0-8fe5-418c-a060-509779b01269', '3c80ed0f-1bca-4976-a6ba-3eef8785af7f', '180 degree', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(119, 'b8ddc3d0-6c23-4ccd-8bbc-6cf68b376687', 'c9020ab0-8fe5-418c-a060-509779b01269', '3c80ed0f-1bca-4976-a6ba-3eef8785af7f', '45 degree', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(120, 'dae0d653-8e8e-4b24-b3a4-51b784638751', 'c9020ab0-8fe5-418c-a060-509779b01269', '3c80ed0f-1bca-4976-a6ba-3eef8785af7f', '90 degree', 1, 1, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(121, '1547fb65-a422-4f35-8246-0ffaadcbfad7', 'c9020ab0-8fe5-418c-a060-509779b01269', '4dff3c94-93c2-4954-adb4-30a22c6e0680', 'Abak', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(122, '7e8fc871-3bcc-4b07-9d13-93a010ee56cb', 'c9020ab0-8fe5-418c-a060-509779b01269', '4dff3c94-93c2-4954-adb4-30a22c6e0680', 'Eket', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(123, '1cc83992-91ce-43ec-ba57-becdb5e1ace4', 'c9020ab0-8fe5-418c-a060-509779b01269', '4dff3c94-93c2-4954-adb4-30a22c6e0680', 'Uyo', 1, 1, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(124, '30a687b8-a6ac-48cf-ac58-eb992daa950d', 'c9020ab0-8fe5-418c-a060-509779b01269', '4dff3c94-93c2-4954-adb4-30a22c6e0680', 'Oron', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(125, '578082d2-2e23-419c-929e-2e4e250822bc', 'c9020ab0-8fe5-418c-a060-509779b01269', '8ac4d38a-ae4a-44dc-83a1-b1b6f4322e1f', 'A singing person', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(126, '976c085c-350c-44b7-9ccf-40636d0612ae', 'c9020ab0-8fe5-418c-a060-509779b01269', '8ac4d38a-ae4a-44dc-83a1-b1b6f4322e1f', 'A musician', 1, 1, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(127, '96c39258-4430-43e5-b059-33d4e891406a', 'c9020ab0-8fe5-418c-a060-509779b01269', '8ac4d38a-ae4a-44dc-83a1-b1b6f4322e1f', 'A super star', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(128, '4fcfd926-7191-4a6d-a81d-a966bfc87a52', 'c9020ab0-8fe5-418c-a060-509779b01269', '8ac4d38a-ae4a-44dc-83a1-b1b6f4322e1f', 'A Legend', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(129, '4d149931-aa06-4a04-81ca-93aeb06a2f08', 'c9020ab0-8fe5-418c-a060-509779b01269', '5ab78fa6-92ab-4799-a0ee-0523aae0e94d', 'New Georgia', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(130, '46a74869-c0da-49ba-8783-8dd78bc76cd1', 'c9020ab0-8fe5-418c-a060-509779b01269', '5ab78fa6-92ab-4799-a0ee-0523aae0e94d', 'New Amsterdam', 1, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(131, '9206ea2a-158f-4e63-8b22-bb7e3879111c', 'c9020ab0-8fe5-418c-a060-509779b01269', '5ab78fa6-92ab-4799-a0ee-0523aae0e94d', 'New Orleans', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(132, '8d83f124-d794-4d24-9d14-588120407f46', 'c9020ab0-8fe5-418c-a060-509779b01269', '5ab78fa6-92ab-4799-a0ee-0523aae0e94d', 'New Nigeria', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(133, '31d41afe-4ae3-4a69-9ae7-40ccb0e82322', 'c9020ab0-8fe5-418c-a060-509779b01269', 'f2dc2f3d-79e4-4a59-881a-3277e81bbe4f', '26', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(134, '2c787789-990f-4de5-8131-f165bb1c72a1', 'c9020ab0-8fe5-418c-a060-509779b01269', 'f2dc2f3d-79e4-4a59-881a-3277e81bbe4f', '35 and a half', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(135, '9570ae58-749c-4816-b253-afdffe35d6ea', 'c9020ab0-8fe5-418c-a060-509779b01269', 'f2dc2f3d-79e4-4a59-881a-3277e81bbe4f', '36', 1, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(136, '80842c7d-1efd-4c52-884f-5b2a9ac05572', 'c9020ab0-8fe5-418c-a060-509779b01269', 'f2dc2f3d-79e4-4a59-881a-3277e81bbe4f', '4', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(137, '0f3062dd-6928-4dab-a6e0-0fb768768aaf', 'c9020ab0-8fe5-418c-a060-509779b01269', '08d2f5f7-a5e4-4092-8d1a-8ad3596a2f97', '8 tires', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(138, '897fa5dd-5fb5-40ff-aa3d-7c7e24ebf4f0', 'c9020ab0-8fe5-418c-a060-509779b01269', '08d2f5f7-a5e4-4092-8d1a-8ad3596a2f97', '4 tires', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(139, '7788b545-579b-45d8-b3c9-db5389ad0752', 'c9020ab0-8fe5-418c-a060-509779b01269', '08d2f5f7-a5e4-4092-8d1a-8ad3596a2f97', '2 tires', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(140, '206e2293-5689-44d0-b97c-29ce7751af84', 'c9020ab0-8fe5-418c-a060-509779b01269', '08d2f5f7-a5e4-4092-8d1a-8ad3596a2f97', '3 tires', 1, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(141, '3538023d-1f19-4464-b1b7-d404deaaa404', 'c9020ab0-8fe5-418c-a060-509779b01269', '35af3849-5d93-42e4-a24f-558094f7d654', 'Five', 1, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(142, 'd3361c5d-d6a3-410c-96a9-04dd262e349e', 'c9020ab0-8fe5-418c-a060-509779b01269', '35af3849-5d93-42e4-a24f-558094f7d654', 'Ten', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(143, '9af2c552-ec81-486c-b648-c3208c9c2749', 'c9020ab0-8fe5-418c-a060-509779b01269', '35af3849-5d93-42e4-a24f-558094f7d654', 'Seven', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(144, '6b9c54cd-df20-4be4-a9be-7846bdc90a88', 'c9020ab0-8fe5-418c-a060-509779b01269', '35af3849-5d93-42e4-a24f-558094f7d654', 'Twelve', 0, 0, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(145, 'd3e05423-728f-491e-a46f-2536d58aa80e', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '30f7b665-5456-4ac6-a675-5c47fe8a90ea', '121', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(146, '314d7356-577c-4809-9f6b-6a9f92629355', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '30f7b665-5456-4ac6-a675-5c47fe8a90ea', '156', 0, 1, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(147, 'e53c610f-699e-44ff-ba25-69844d6a000a', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '30f7b665-5456-4ac6-a675-5c47fe8a90ea', '144', 1, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(148, '7fc43e9d-5514-49e9-b325-aabcbfe7fa6c', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '30f7b665-5456-4ac6-a675-5c47fe8a90ea', '120', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(149, '29511437-4224-4d22-b532-e25745a4e815', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f72eec31-bd0a-4829-b3f0-3ef774f95b03', '12', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(150, '97c8e04e-8746-4ef7-b094-614fdf7a4ea8', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f72eec31-bd0a-4829-b3f0-3ef774f95b03', '3', 0, 1, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(151, '9e53aeed-4f3f-420d-84ed-e35e017c4f68', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f72eec31-bd0a-4829-b3f0-3ef774f95b03', '4', 1, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(152, '800f0945-7370-42c6-b1b6-610c67586591', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f72eec31-bd0a-4829-b3f0-3ef774f95b03', '6', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(153, '13e26110-d218-4916-8bcc-243d527bec04', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f5afcd92-e1f7-48ec-8f0f-08e620164553', '6', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(154, 'e4e12b57-7c96-43c2-938a-852150cbd6c0', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f5afcd92-e1f7-48ec-8f0f-08e620164553', '20', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(155, '48bb186f-4903-4f12-a6ab-53e3c0492e2d', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f5afcd92-e1f7-48ec-8f0f-08e620164553', '2', 1, 1, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(156, '7ea9d1e3-9746-4f83-9e2f-4bc7200db870', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'f5afcd92-e1f7-48ec-8f0f-08e620164553', '4', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(157, '5e7580cb-ba72-4b8d-abc6-93e60819821a', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'd4e2503b-fada-4606-9b47-36c9a52933f7', '24', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(158, '5d5a5e4b-3b05-44a0-b1fe-d02ee71ac21c', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'd4e2503b-fada-4606-9b47-36c9a52933f7', '52', 1, 1, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(159, 'fccb2d46-bfcf-4ebf-96dc-e242cee8d934', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'd4e2503b-fada-4606-9b47-36c9a52933f7', '12', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(160, '3f28f28b-d87c-4026-8048-d641050208ac', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'd4e2503b-fada-4606-9b47-36c9a52933f7', '15', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(161, 'e9f20e73-0bc1-415d-8b03-e2869db8a582', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '816b804a-d1fb-46e7-8818-aa7db7afc19f', 'Portharcourt Housing Company of Nigeria', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(162, 'db26678d-5b5c-42f4-ae74-fa543d34cb1a', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '816b804a-d1fb-46e7-8818-aa7db7afc19f', 'Petroleum Harbor Corporation of Nigeria', 0, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(163, '299eaa2d-d619-4fab-9e10-d47657942f2f', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '816b804a-d1fb-46e7-8818-aa7db7afc19f', 'Power Holding Chamber of the Nation', 0, 1, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(164, 'b14ccc24-64cc-4ee8-a5cb-33b05375b397', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '816b804a-d1fb-46e7-8818-aa7db7afc19f', 'Power Holding Company of Nigeria', 1, 0, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(165, '000564f0-2b6d-48ca-9799-beac88b07c7a', '216e6d09-22d8-45ad-b828-51b504169a63', 'f73b93b2-eb1f-4e29-a0b5-9bbc96488083', '24', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(166, 'b27feb30-fdbb-4e7d-a314-ef6c922c092c', '216e6d09-22d8-45ad-b828-51b504169a63', 'f73b93b2-eb1f-4e29-a0b5-9bbc96488083', '15', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(167, '90434572-fdc1-4f21-86ee-79ff900a5058', '216e6d09-22d8-45ad-b828-51b504169a63', 'f73b93b2-eb1f-4e29-a0b5-9bbc96488083', '52', 1, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(168, '6b232cbc-9f94-4861-bcf0-fbed0acb1efe', '216e6d09-22d8-45ad-b828-51b504169a63', 'f73b93b2-eb1f-4e29-a0b5-9bbc96488083', '12', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(169, 'be9c8436-c8b0-4f4e-b5e7-0bae78e23f25', '216e6d09-22d8-45ad-b828-51b504169a63', '466d21d1-d6a5-42ff-9a00-a822b20e8c06', '20', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(170, '93fe4c18-52bf-400c-884f-c4189bf2e29b', '216e6d09-22d8-45ad-b828-51b504169a63', '466d21d1-d6a5-42ff-9a00-a822b20e8c06', '4', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(171, 'd9ae6164-e66a-446a-a7f6-c4b3c74ac16e', '216e6d09-22d8-45ad-b828-51b504169a63', '466d21d1-d6a5-42ff-9a00-a822b20e8c06', '6', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(172, '5df8f824-cf84-490b-8a0f-ec829ced44ac', '216e6d09-22d8-45ad-b828-51b504169a63', '466d21d1-d6a5-42ff-9a00-a822b20e8c06', '2', 1, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(173, 'ecacd98e-2537-49ac-a560-673d6b08bc8b', '216e6d09-22d8-45ad-b828-51b504169a63', '741f5278-7faa-48ec-8698-d20d546d0aa1', '3', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(174, 'ba4986f2-17f8-4749-8af7-db9f0c2b8d04', '216e6d09-22d8-45ad-b828-51b504169a63', '741f5278-7faa-48ec-8698-d20d546d0aa1', '4', 1, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(175, '9ccdd8e5-158b-4b44-bfc6-70120622366e', '216e6d09-22d8-45ad-b828-51b504169a63', '741f5278-7faa-48ec-8698-d20d546d0aa1', '12', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(176, 'd771c71b-e076-4c56-9bcb-222eb81a4358', '216e6d09-22d8-45ad-b828-51b504169a63', '741f5278-7faa-48ec-8698-d20d546d0aa1', '6', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(177, '084b8ca7-da43-417d-8fb2-a705dc066fea', '216e6d09-22d8-45ad-b828-51b504169a63', '981caa73-ed7b-4d10-86db-84a9813f4664', 'Power Holding Company of Nigeria', 1, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(178, '3bab5c30-1da5-4ac8-ac41-65cde81a4cba', '216e6d09-22d8-45ad-b828-51b504169a63', '981caa73-ed7b-4d10-86db-84a9813f4664', 'Petroleum Harbor Corporation of Nigeria', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(179, 'c7d16863-219f-475d-9516-5737d7986843', '216e6d09-22d8-45ad-b828-51b504169a63', '981caa73-ed7b-4d10-86db-84a9813f4664', 'Portharcourt Housing Company of Nigeria', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(180, '2dd9eaf7-2ae0-4c41-a86e-cf5d7e874c7d', '216e6d09-22d8-45ad-b828-51b504169a63', '981caa73-ed7b-4d10-86db-84a9813f4664', 'Power Holding Chamber of the Nation', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(181, '56b27c89-55ca-43f4-81e1-88d6d616cd56', '216e6d09-22d8-45ad-b828-51b504169a63', '6270bdfd-d74d-4bc6-915b-fe9b4b1f696d', '120', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(182, 'b9553bf4-938a-4657-b123-2dcb7554d66e', '216e6d09-22d8-45ad-b828-51b504169a63', '6270bdfd-d74d-4bc6-915b-fe9b4b1f696d', '144', 1, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(183, 'ca3bccfc-2fc1-4ab7-b621-b66f22bc05cd', '216e6d09-22d8-45ad-b828-51b504169a63', '6270bdfd-d74d-4bc6-915b-fe9b4b1f696d', '156', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(184, 'db6e70f6-7a1d-44a1-982a-35a7b3ca4ac9', '216e6d09-22d8-45ad-b828-51b504169a63', '6270bdfd-d74d-4bc6-915b-fe9b4b1f696d', '121', 0, NULL, NULL, '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(185, 'f05b0749-4940-4136-803f-ca88228ecc46', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '88f24d22-abf3-49aa-8404-b644c4c2d81d', '24', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(186, 'e0806c09-a6c7-48c5-8990-7f6738bf0747', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '88f24d22-abf3-49aa-8404-b644c4c2d81d', '52', 1, 1, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(187, '26a92f97-5e8c-48e8-b037-64d92eec9d90', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '88f24d22-abf3-49aa-8404-b644c4c2d81d', '12', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(188, 'a436f8bd-d303-4e06-bc23-04903fd72a4a', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '88f24d22-abf3-49aa-8404-b644c4c2d81d', '15', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(189, 'a7b1eca3-6c7d-4fef-be6e-45f022ff5c34', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '3f5f315b-0937-4684-9fa5-aa8638aa33a5', '4', 1, 1, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(190, '5547d579-a3fc-4251-8279-5a674f1cde13', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '3f5f315b-0937-4684-9fa5-aa8638aa33a5', '6', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(191, '499e5c5b-1dc0-4a0e-b0f2-374e5e321c6b', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '3f5f315b-0937-4684-9fa5-aa8638aa33a5', '12', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(192, 'c78c3f68-34d1-47c8-9ba4-b28e4d205374', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '3f5f315b-0937-4684-9fa5-aa8638aa33a5', '3', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(193, '7f70b4a2-0b19-4a42-900d-ec39b507ba03', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '6ffd4fd2-c316-4e68-8e5f-e9cbfffa55d8', '156', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(194, '3fb78668-fe06-44a7-9562-33e62f00a68f', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '6ffd4fd2-c316-4e68-8e5f-e9cbfffa55d8', '121', 0, 1, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(195, 'fbc3c522-a7cd-48ef-a544-97d1d77dea31', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '6ffd4fd2-c316-4e68-8e5f-e9cbfffa55d8', '120', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(196, '2c35e315-74cf-49c7-ba36-d56ac3d0dcb3', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '6ffd4fd2-c316-4e68-8e5f-e9cbfffa55d8', '144', 1, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(197, '3bd95f86-d727-4c2f-9898-29341dbe5af4', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '7aa08c2b-4f8d-4131-bb0b-33544c6769fd', 'Power Holding Company of Nigeria', 1, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(198, 'f6c443c7-54b8-4747-99a6-13d519479f13', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '7aa08c2b-4f8d-4131-bb0b-33544c6769fd', 'Petroleum Harbor Corporation of Nigeria', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(199, 'fdb019c7-df9c-4da3-b13a-b8f0e08a9585', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '7aa08c2b-4f8d-4131-bb0b-33544c6769fd', 'Portharcourt Housing Company of Nigeria', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(200, 'dbdcb3ac-7069-4cfd-878d-f18660e1369a', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '7aa08c2b-4f8d-4131-bb0b-33544c6769fd', 'Power Holding Chamber of the Nation', 0, 1, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(201, 'd044b173-0f31-4be0-bbe0-aa3708eb489e', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'a6b2f100-abcd-40c3-97aa-b6d06161a7a5', '6', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(202, 'a3d271d0-a44b-4d29-99a1-1b9d4cc29c4e', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'a6b2f100-abcd-40c3-97aa-b6d06161a7a5', '2', 1, 1, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(203, '86978254-c4c5-4d7a-9b1d-543f6a49024a', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'a6b2f100-abcd-40c3-97aa-b6d06161a7a5', '4', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(204, '069989e0-d474-48bb-8dfe-6012669bc46e', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'a6b2f100-abcd-40c3-97aa-b6d06161a7a5', '20', 0, 0, NULL, '2020-06-04 23:00:42', '2020-06-04 23:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `engaged_assessments`
--

CREATE TABLE `engaged_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_expire_at` bigint(20) DEFAULT NULL,
  `start_time` bigint(20) DEFAULT NULL,
  `last_update` bigint(20) DEFAULT NULL,
  `end_time` bigint(20) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `has_started` tinyint(1) DEFAULT NULL,
  `score` double(4,1) DEFAULT NULL,
  `questions_answered` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `resume_time` bigint(20) DEFAULT NULL,
  `seconds_remaining` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engaged_assessments`
--

INSERT INTO `engaged_assessments` (`id`, `uuid`, `organization_id`, `assessment_id`, `candidate_id`, `to_expire_at`, `start_time`, `last_update`, `end_time`, `completed`, `has_started`, `score`, `questions_answered`, `active`, `resume_time`, `seconds_remaining`, `created_at`, `updated_at`) VALUES
(1, 'a9d5e5e7-7144-4cc3-9315-53969449b14c', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '2e128575-02a6-41a2-8359-9a99105c47e9', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1589902454, 1589902485, 1589902485, 1, 1, 60.0, 5, 1, NULL, NULL, '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(2, 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '2e128575-02a6-41a2-8359-9a99105c47e9', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1589902537, 1589902567, 1589902567, 1, 1, 100.0, 5, 1, NULL, NULL, '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(3, 'e6634773-d16a-477e-bf93-86a23e80accd', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '2e128575-02a6-41a2-8359-9a99105c47e9', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1591132538, 1591312318, 1591312318, 1, 1, 40.0, 5, 1, 1591312257, 0, '2020-06-02 20:15:38', '2020-06-04 22:11:58'),
(4, 'c9020ab0-8fe5-418c-a060-509779b01269', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '2e128575-02a6-41a2-8359-9a99105c47e9', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1591159263, 1591173798, 1591173798, 1, 1, 80.0, 6, 1, 1591173747, NULL, '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(5, '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '9877cdf9-d873-4e63-b23b-09dc5586af15', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1591178753, 1591178779, 1591178779, 1, 1, 40.0, 5, 1, 1591178753, NULL, '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(7, '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '67f3c721-50fa-449f-9bcf-b7c139c21be6', '9877cdf9-d873-4e63-b23b-09dc5586af15', '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 1591315242, 1591316423, 1591316423, 1, 1, 60.0, 5, 1, 1591316398, 32, '2020-06-04 23:00:42', '2020-06-04 23:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `engaged_questions`
--

CREATE TABLE `engaged_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engaged_assessment_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minutes_expected` int(11) DEFAULT NULL,
  `seen` tinyint(1) DEFAULT NULL,
  `seen_time` bigint(20) DEFAULT NULL,
  `answered` tinyint(1) DEFAULT NULL,
  `answered_time` bigint(20) DEFAULT NULL,
  `answer_input` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engaged_questions`
--

INSERT INTO `engaged_questions` (`id`, `uuid`, `engaged_assessment_id`, `question`, `resource_id`, `minutes_expected`, `seen`, `seen_time`, `answered`, `answered_time`, `answer_input`, `created_at`, `updated_at`) VALUES
(1, '07ead7f0-3956-47f9-a288-6bdd0e833606', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'A Right-angle has how many degree?', NULL, NULL, 1, 1589902472, 1, 1589902485, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(2, '5bd39bd4-b58a-461d-a16b-c19dd4272168', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'What was the former name of New York?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:14'),
(3, '769eb306-4f12-4eb3-8132-4304b2a661df', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'how many tires does a tricycle have?', NULL, NULL, 1, 1589902464, 1, 1589902485, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(4, 'e429498d-5066-4891-a313-2be5ad531173', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'How many states are in Nigeria', NULL, NULL, 1, 1589902485, 1, 1589902485, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(5, '97b82a8a-4b45-441e-a673-de178bf93273', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'How many sides are on a pentagon?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:14'),
(6, '30a6c67b-5e00-4379-bf88-baff4253242c', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'Who was the first president of the USA?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:14'),
(7, '50f45f68-bd08-4ced-a1e6-f2aa97a18c1b', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'What is the Capital of Akwa Ibom State', NULL, NULL, 1, 1589902475, 1, 1589902485, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(8, '948e6a58-ac5f-4122-bf82-ef7281a7b37d', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'What was the major even in 1914 for Nigeria', NULL, NULL, 1, 1589902467, 1, 1589902485, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:45'),
(9, 'd64c347b-6717-49a8-9635-9af8d0cc24c0', 'a9d5e5e7-7144-4cc3-9315-53969449b14c', 'Who is Michael Jackson', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:34:14', '2020-05-19 19:34:14'),
(10, 'f82beca9-0583-47df-bf52-7935fd8b0c7a', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'What was the former name of New York?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:35:37'),
(11, '73bf6a98-4a0f-4488-bc1f-f5c61778cbe4', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'How many states are in Nigeria', NULL, NULL, 1, 1589902550, 1, 1589902567, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(12, '7adeda3a-1cfb-4ef5-aaf1-1ec15aa06c8d', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'What is the Capital of Akwa Ibom State', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:35:37'),
(13, 'f0ffc991-dba5-4d3e-951a-de453c582e36', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'How many sides are on a pentagon?', NULL, NULL, 1, 1589902567, 1, 1589902567, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(14, '327dba3f-58a9-40a9-a413-81b7025da938', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'What was the major even in 1914 for Nigeria', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:35:37'),
(15, '83d78b39-434d-4fef-8c84-e99fa9104fc5', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'Who was the first president of the USA?', NULL, NULL, 1, 1589902560, 1, 1589902567, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(16, '2abab836-a634-4d34-9470-37e19d3c37f6', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'Who is Michael Jackson', NULL, NULL, 1, 1589902544, 1, 1589902567, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(17, '3aad6283-49c7-4032-93f3-0a4eb9b9342d', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'A Right-angle has how many degree?', NULL, NULL, 1, 1589902554, 1, 1589902567, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:36:07'),
(18, '2053967a-b16b-4892-8b5d-200fcfa7a21a', 'b4a01b08-d50e-4e6e-810f-8896763dd1d8', 'how many tires does a tricycle have?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-05-19 19:35:37', '2020-05-19 19:35:37'),
(19, '5c35672f-bff4-443d-b05b-c71cb51e2575', 'e6634773-d16a-477e-bf93-86a23e80accd', 'A Right-angle has how many degree?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-02 20:15:39', '2020-06-02 20:15:39'),
(20, '833b6d51-9a08-4a31-968f-a8de103828f6', 'e6634773-d16a-477e-bf93-86a23e80accd', 'Who is Michael Jackson', NULL, NULL, 1, 1591312264, 1, 1591312318, 'radio', '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(21, '23795203-431d-4e67-8657-8734557c9fdc', 'e6634773-d16a-477e-bf93-86a23e80accd', 'How many states are in Nigeria', NULL, NULL, 1, 1591312296, 1, 1591312318, 'radio', '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(22, 'ffd3848a-54e2-4e9f-bace-250b6fffbba1', 'e6634773-d16a-477e-bf93-86a23e80accd', 'What is the Capital of Akwa Ibom State', NULL, NULL, 1, 1591312318, 1, 1591312318, 'radio', '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(23, 'c30bb84e-72ee-4d9c-982d-80c7bb9ecd1a', 'e6634773-d16a-477e-bf93-86a23e80accd', 'how many tires does a tricycle have?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-02 20:15:39', '2020-06-02 20:15:39'),
(24, '90af6d97-b0d2-4974-a30d-2f59595af2c1', 'e6634773-d16a-477e-bf93-86a23e80accd', 'How many sides are on a pentagon?', NULL, NULL, 1, 1591312285, 1, 1591312318, 'radio', '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(25, 'd4290c9c-e616-41bd-b804-1f6426d4c3c8', 'e6634773-d16a-477e-bf93-86a23e80accd', 'What was the former name of New York?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-02 20:15:39', '2020-06-02 20:15:39'),
(26, 'becc9e99-b068-406c-bc45-db911eefef0a', 'e6634773-d16a-477e-bf93-86a23e80accd', 'Who was the first president of the USA?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-02 20:15:39', '2020-06-02 20:15:39'),
(27, '9249ad94-235f-4d76-814e-f29880b861a8', 'e6634773-d16a-477e-bf93-86a23e80accd', 'What was the major even in 1914 for Nigeria', NULL, NULL, 1, 1591312270, 1, 1591312318, 'radio', '2020-06-02 20:15:39', '2020-06-04 22:11:58'),
(28, '3456023b-5638-4ccb-b929-1acdfb3b7cb2', 'c9020ab0-8fe5-418c-a060-509779b01269', 'Who was the first president of the USA?', NULL, NULL, 1, 1591173777, 1, 1591173798, 'radio', '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(29, '5386543a-63d7-4dd0-8580-9dd367e7e7ba', 'c9020ab0-8fe5-418c-a060-509779b01269', 'What was the major even in 1914 for Nigeria', NULL, NULL, 1, 1591173798, 1, 1591173798, 'radio', '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(30, '3c80ed0f-1bca-4976-a6ba-3eef8785af7f', 'c9020ab0-8fe5-418c-a060-509779b01269', 'A Right-angle has how many degree?', NULL, NULL, 1, 1591173753, 1, 1591173798, 'radio', '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(31, '4dff3c94-93c2-4954-adb4-30a22c6e0680', 'c9020ab0-8fe5-418c-a060-509779b01269', 'What is the Capital of Akwa Ibom State', NULL, NULL, 1, 1591173780, 1, 1591173798, 'radio', '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(32, '8ac4d38a-ae4a-44dc-83a1-b1b6f4322e1f', 'c9020ab0-8fe5-418c-a060-509779b01269', 'Who is Michael Jackson', NULL, NULL, 1, 1591173777, 1, 1591173798, 'radio', '2020-06-03 03:41:03', '2020-06-03 07:43:18'),
(33, '5ab78fa6-92ab-4799-a0ee-0523aae0e94d', 'c9020ab0-8fe5-418c-a060-509779b01269', 'What was the former name of New York?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-03 03:41:03', '2020-06-03 03:41:03'),
(34, 'f2dc2f3d-79e4-4a59-881a-3277e81bbe4f', 'c9020ab0-8fe5-418c-a060-509779b01269', 'How many states are in Nigeria', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-03 03:41:03', '2020-06-03 03:41:03'),
(35, '08d2f5f7-a5e4-4092-8d1a-8ad3596a2f97', 'c9020ab0-8fe5-418c-a060-509779b01269', 'how many tires does a tricycle have?', NULL, NULL, 1, 1591159435, 1, 1591159435, 'radio', '2020-06-03 03:41:03', '2020-06-03 03:43:55'),
(36, '35af3849-5d93-42e4-a24f-558094f7d654', 'c9020ab0-8fe5-418c-a060-509779b01269', 'How many sides are on a pentagon?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-03 03:41:03', '2020-06-03 03:41:03'),
(37, '30f7b665-5456-4ac6-a675-5c47fe8a90ea', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', '12 x 12 is what?', NULL, NULL, 1, 1591178779, 1, 1591178779, 'radio', '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(38, 'f72eec31-bd0a-4829-b3f0-3ef774f95b03', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'how many tires does a car have?', NULL, NULL, 1, 1591178770, 1, 1591178779, 'radio', '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(39, 'f5afcd92-e1f7-48ec-8f0f-08e620164553', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'how many fingers thumb fingers are on your hand?', NULL, NULL, 1, 1591178774, 1, 1591178779, 'radio', '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(40, 'd4e2503b-fada-4606-9b47-36c9a52933f7', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'how may weeks are in a year', NULL, NULL, 1, 1591178760, 1, 1591178779, 'radio', '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(41, '816b804a-d1fb-46e7-8818-aa7db7afc19f', '02a3d49e-5bf0-4e8f-8b72-8246833685cb', 'what is the meaning PHCN', NULL, NULL, 1, 1591178764, 1, 1591178779, 'radio', '2020-06-03 09:05:53', '2020-06-03 09:06:19'),
(42, 'f73b93b2-eb1f-4e29-a0b5-9bbc96488083', '216e6d09-22d8-45ad-b828-51b504169a63', 'how may weeks are in a year', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(43, '466d21d1-d6a5-42ff-9a00-a822b20e8c06', '216e6d09-22d8-45ad-b828-51b504169a63', 'how many fingers thumb fingers are on your hand?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(44, '741f5278-7faa-48ec-8698-d20d546d0aa1', '216e6d09-22d8-45ad-b828-51b504169a63', 'how many tires does a car have?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(45, '981caa73-ed7b-4d10-86db-84a9813f4664', '216e6d09-22d8-45ad-b828-51b504169a63', 'what is the meaning PHCN', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(46, '6270bdfd-d74d-4bc6-915b-fe9b4b1f696d', '216e6d09-22d8-45ad-b828-51b504169a63', '12 x 12 is what?', NULL, NULL, 0, NULL, NULL, NULL, 'radio', '2020-06-04 22:17:21', '2020-06-04 22:17:21'),
(47, '88f24d22-abf3-49aa-8404-b644c4c2d81d', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'how may weeks are in a year', NULL, NULL, 1, 1591316414, 1, 1591316423, 'radio', '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(48, '3f5f315b-0937-4684-9fa5-aa8638aa33a5', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'how many tires does a car have?', NULL, NULL, 1, 1591315610, 1, 1591316423, 'radio', '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(49, '6ffd4fd2-c316-4e68-8e5f-e9cbfffa55d8', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', '12 x 12 is what?', NULL, NULL, 1, 1591316406, 1, 1591316423, 'radio', '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(50, '7aa08c2b-4f8d-4131-bb0b-33544c6769fd', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'what is the meaning PHCN', NULL, NULL, 1, 1591316403, 1, 1591316423, 'radio', '2020-06-04 23:00:42', '2020-06-04 23:20:23'),
(51, 'a6b2f100-abcd-40c3-97aa-b6d06161a7a5', '8a0c95d3-2757-4bc7-9816-cce286c21e5d', 'how many fingers thumb fingers are on your hand?', NULL, NULL, 1, 1591316409, 1, 1591316423, 'radio', '2020-06-04 23:00:42', '2020-06-04 23:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_uploads`
--

CREATE TABLE `image_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `current` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`id`, `uuid`, `token`, `code`, `type`, `mode`, `email`, `completed`, `current`, `created_at`, `updated_at`) VALUES
(9, 'bb17d49f-e22e-407e-a3bd-ae1f72ab96a5', 'wN5tygyhiuMQfsREHCXfzTTaYzjFXt5IyarM', 'U6CQ8S-EGZF', 'organization', 'public', NULL, 0, 1, '2020-06-01 09:15:07', '2020-06-01 09:15:07'),
(10, 'd2790dd5-2e35-4fc8-82cb-c76195aec716', '6puvXLZc2PJWVtoM4cYs71RME4nThI1433UI', 'A76KJX-EKAF', 'organization', 'public', NULL, 0, 0, '2020-06-02 05:11:22', '2020-06-02 05:29:30'),
(11, '741a6d40-96b4-442c-8d39-ba1bc10de33c', '8sIJtJ1FyD15wDVecsPwXReyYUm7hHemtTWv', 'EBK0AU-URML', 'organization', 'public', NULL, 0, 1, '2020-06-02 05:29:31', '2020-06-02 05:29:31'),
(12, 'ff71466d-06ce-4a06-aac1-97ef19ce6360', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'P5Z2LL-0E8C', 'organization', 'private', 'seun@finesseintegrated.com', 0, 1, '2020-06-02 16:10:41', '2020-06-02 16:10:41'),
(13, '2fcb6d75-70f7-4e4b-a026-20a51edf1c55', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'MVNNBQ-IFWN', 'organization', 'private', 'seun@finesseintegrated.com', 0, 1, '2020-06-02 16:11:21', '2020-06-02 16:11:21'),
(14, 'be9ed0d8-e974-4bb9-8b44-200970a83f56', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'OKTCKK-C4RX', 'organization', 'private', 'seun@finesseintegrated.com', 0, 1, '2020-06-02 16:13:12', '2020-06-02 16:13:12'),
(15, '4a0acd93-b6d0-48ad-98f0-6e221d707962', '8sIJtJ1FyD15wDVecsPwXReyYUm7hHemtTWv', 'Z0M5WB-VF5M', 'organization', 'private', 'seun@finesseintegrated.com', 0, 1, '2020-06-02 16:28:01', '2020-06-02 16:28:01'),
(16, '8b0d12d1-ca90-4aa4-a9f0-c0ba8dbb3461', '8sIJtJ1FyD15wDVecsPwXReyYUm7hHemtTWv', 'FMXKGG-TNGK', 'organization', 'private', 'benjamin@finesseintegrated.com', 0, 1, '2020-06-02 16:28:03', '2020-06-02 16:28:03'),
(17, '9850fed0-20b7-48b5-9db6-b16d9c5848fe', 'bqQDEdSTUBz9xn9vofe1WVLm8RPlkjDVNvkU', 'ZD17Q8-HAZY', 'organization', 'public', NULL, 0, 1, '2020-06-06 14:08:16', '2020-06-06 14:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(109, '2014_10_12_000000_create_users_table', 1),
(110, '2014_10_12_100000_create_password_resets_table', 1),
(111, '2019_08_19_000000_create_failed_jobs_table', 1),
(112, '2020_05_07_170633_create_organizations_table', 1),
(113, '2020_05_07_170830_create_staff_table', 1),
(114, '2020_05_07_171659_create_organization_staff_table', 1),
(115, '2020_05_07_171745_create_groups_table', 1),
(116, '2020_05_07_171807_create_assessments_table', 1),
(117, '2020_05_07_171823_create_questions_table', 1),
(118, '2020_05_07_171901_create_answers_table', 1),
(119, '2020_05_07_173139_create_admins_table', 1),
(120, '2020_05_07_174915_create_group_members_table', 1),
(121, '2020_05_07_181032_create_image_uploads_table', 1),
(122, '2020_05_07_181142_create_thumbs_table', 1),
(123, '2020_05_07_184246_create_engaged_assessments_table', 1),
(124, '2020_05_07_184322_create_engaged_questions_table', 1),
(125, '2020_05_07_184345_create_engaged_answers_table', 1),
(126, '2020_05_07_194935_create_organization_members_table', 1),
(132, '2020_05_27_095440_create_invites_table', 2),
(134, '2020_05_29_183317_create_tenders_table', 3),
(136, '2020_06_06_073502_create_tours_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'private',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `uuid`, `name`, `email`, `phone`, `image_key`, `public`, `address`, `active`, `type`, `token`, `created_at`, `updated_at`) VALUES
(1, '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'Synergy Node', 'info@synergynode.com', '08128039141', 'uploads/organization/logo/54b0UQeDo1Y9IUcXQOzo.png', 1, '11b, drive 3, Prince & Princess, Gudu District, Abuja Nigeria', 1, 'private', '8sIJtJ1FyD15wDVecsPwXReyYUm7hHemtTWv', '2020-05-19 18:49:39', '2020-06-02 05:29:30'),
(2, '087c373c-6bed-47e0-abb8-d8c85a16f300', 'Office Node', 'info@officenode.com', '08128039141', 'uploads/organization/logo/6adjZ42tWqc0ahsCuVvS.png', 1, 'abuja', 1, 'private', '1SRwpHUMsA8WDm38NV2oZf3p5HeDtWsTOqTo', '2020-05-27 08:10:11', '2020-05-29 21:28:49'),
(3, '8f8b8b11-98fd-4242-ae39-f96bf66cc612', 'Mz Crown Luxuries', 'mzcrownlx@gmail.com', '09012321232', 'uploads/organization/logo/ydo1RfyZfcRD7DNzhQwH.png', 1, 'Aroro makinde, zone A, Ojoo, Ibadan', NULL, 'private', 'wN5tygyhiuMQfsREHCXfzTTaYzjFXt5IyarM', '2020-05-29 21:59:09', '2020-06-01 09:15:06'),
(4, '04f4cea1-865e-4e7b-863d-d85c22c33098', 'My Organization', 'myorg@email.com', '0912345', 'uploads/organization/logo/Q7nCbD0NvvtNzVlOy3CX.png', 0, '25th Avenue, Minneapolis', NULL, 'private', 'bqQDEdSTUBz9xn9vofe1WVLm8RPlkjDVNvkU', '2020-06-06 08:40:14', '2020-06-06 14:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `organization_members`
--

CREATE TABLE `organization_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization_staff`
--

CREATE TABLE `organization_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `owner` tinyint(1) DEFAULT NULL,
  `who` int(11) DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` tinyint(1) DEFAULT NULL,
  `current` tinyint(1) DEFAULT NULL,
  `last_accessed` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_staff`
--

INSERT INTO `organization_staff` (`id`, `uuid`, `organization_id`, `staff_id`, `active`, `owner`, `who`, `role_id`, `creator`, `current`, `last_accessed`, `created_at`, `updated_at`) VALUES
(1, '25127016-28e6-4e2e-884e-a824136ee7fe', '67f3c721-50fa-449f-9bcf-b7c139c21be6', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 1, 1, 4, NULL, 1, 1, NULL, '2020-05-19 18:49:39', '2020-06-10 18:23:15'),
(2, 'fdaa5386-8568-4ac3-a3fb-5e42641bf483', '087c373c-6bed-47e0-abb8-d8c85a16f300', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 1, 1, 4, NULL, 1, 0, NULL, '2020-05-27 08:10:11', '2020-06-10 18:23:15'),
(3, '9e529bb9-9b60-4cb9-a1cd-e5320b2cf667', '8f8b8b11-98fd-4242-ae39-f96bf66cc612', '66df1ba5-fe5a-4d4e-926c-abaa6b9438b3', 1, 1, 4, NULL, 1, 1, NULL, '2020-05-29 21:59:09', '2020-05-29 22:48:05'),
(9, '1f4f555c-0cdf-4fc4-a0fb-8656c4c8b69d', '04f4cea1-865e-4e7b-863d-d85c22c33098', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 1, 1, 4, NULL, 1, 0, NULL, '2020-06-06 08:40:14', '2020-06-10 18:23:15'),
(8, '4ebb3206-8c9a-466c-b3b3-420fc861df50', '8f8b8b11-98fd-4242-ae39-f96bf66cc612', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 1, 0, 1, NULL, 0, 0, NULL, '2020-06-02 15:49:37', '2020-06-10 18:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minutes_expected` int(11) DEFAULT NULL,
  `answer_input` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `uuid`, `assessment_id`, `question`, `resource_id`, `minutes_expected`, `answer_input`, `created_at`, `updated_at`) VALUES
(1, '925b4661-7452-486f-be91-777636d36722', '2e128575-02a6-41a2-8359-9a99105c47e9', 'How many states are in Nigeria', NULL, NULL, 'radio', '2020-05-19 19:11:10', '2020-05-19 19:11:10'),
(2, '911e7a49-8d2a-4358-866d-76f69e9450cf', '2e128575-02a6-41a2-8359-9a99105c47e9', 'How many sides are on a pentagon?', NULL, NULL, 'radio', '2020-05-19 19:14:58', '2020-05-19 19:14:58'),
(3, '872243ac-ce9b-42d8-b3f8-f7f55483b383', '2e128575-02a6-41a2-8359-9a99105c47e9', 'What is the Capital of Akwa Ibom State', NULL, NULL, 'radio', '2020-05-19 19:16:11', '2020-05-19 19:16:11'),
(4, '817ab1e2-bfcf-4ad6-8bd1-4a0d5b314c6b', '2e128575-02a6-41a2-8359-9a99105c47e9', 'A Right-angle has how many degree?', NULL, NULL, 'radio', '2020-05-19 19:18:24', '2020-05-19 19:18:24'),
(5, 'e598f445-e3c4-4bdb-98a8-dc6fa3ace0b4', '2e128575-02a6-41a2-8359-9a99105c47e9', 'how many tires does a tricycle have?', NULL, NULL, 'radio', '2020-05-19 19:22:18', '2020-05-19 19:22:18'),
(6, '611970e8-b845-4836-af17-b5fa4a4a648f', '2e128575-02a6-41a2-8359-9a99105c47e9', 'Who was the first president of the USA?', NULL, NULL, 'radio', '2020-05-19 19:23:41', '2020-05-19 19:23:41'),
(7, '01276a46-f840-4f46-8410-9c70e2d21635', '2e128575-02a6-41a2-8359-9a99105c47e9', 'What was the former name of New York?', NULL, NULL, 'radio', '2020-05-19 19:27:12', '2020-05-19 19:27:12'),
(8, '9e655b04-0af5-4b4b-b635-30f04c74a504', '2e128575-02a6-41a2-8359-9a99105c47e9', 'What was the major even in 1914 for Nigeria', NULL, NULL, 'radio', '2020-05-19 19:29:22', '2020-05-19 19:29:22'),
(9, '0ed79d26-f949-424a-9056-30e5f3ea5a6d', '2e128575-02a6-41a2-8359-9a99105c47e9', 'Who is Michael Jackson', NULL, NULL, 'radio', '2020-05-19 19:30:45', '2020-05-19 19:30:45'),
(10, '6e12ab8f-b108-4385-a32a-831e5a6f33f4', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'how may weeks are in a year', NULL, NULL, 'radio', '2020-06-03 08:58:51', '2020-06-03 08:58:51'),
(11, 'a1281920-9cec-443a-bf2d-acb5f8820e4a', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'how many fingers thumb fingers are on your hand?', NULL, NULL, 'radio', '2020-06-03 08:59:44', '2020-06-03 08:59:44'),
(12, '9894989e-df84-4ad5-8634-2e0892dc5e12', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'how many tires does a car have?', NULL, NULL, 'radio', '2020-06-03 09:01:00', '2020-06-03 09:01:00'),
(13, 'a019c39a-b793-4855-8014-b83143ae93d0', '9877cdf9-d873-4e63-b23b-09dc5586af15', 'what is the meaning PHCN', NULL, NULL, 'radio', '2020-06-03 09:03:18', '2020-06-03 09:03:18'),
(14, 'a514ea9f-4d99-4fe9-933f-e33cf150afa7', '9877cdf9-d873-4e63-b23b-09dc5586af15', '12 x 12 is what?', NULL, NULL, 'radio', '2020-06-03 09:05:09', '2020-06-03 09:05:09'),
(17, 'f8a5fdbc-60db-4848-91a6-62685d45735a', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'How many colors are in the American Flag?', NULL, NULL, 'radio', '2020-06-13 17:59:52', '2020-06-16 14:54:28'),
(24, '5e24ea10-f1f2-4e79-ad7e-2e24c352adf6', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'A week is made up of seven working days. True or false', NULL, NULL, 'radio', '2020-06-16 14:53:27', '2020-06-16 14:53:27'),
(19, 'cf3a9227-7da5-4826-ab78-ff3316c7368f', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'Civic belongs to which car brand model', NULL, NULL, 'radio', '2020-06-13 18:01:00', '2020-06-16 12:17:11'),
(20, '531df035-1ed8-4847-b9dc-a00f8c99c1e7', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'A week is made up of seven working days. True or false', NULL, NULL, 'radio', '2020-06-13 18:01:00', '2020-06-13 18:01:00'),
(23, '1ce359f7-d9ce-429e-9d04-3b0e9e0bb76f', '8fd9d2b2-c425-4115-b7b8-07461df1ff93', 'How many colors are in the rainbow?', NULL, NULL, 'radio', '2020-06-16 14:53:27', '2020-06-16 14:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `countdown_pass` bigint(20) DEFAULT NULL,
  `countdown_otp` bigint(20) DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `uuid`, `title`, `first_name`, `last_name`, `email`, `phone`, `image_key`, `address`, `office`, `active`, `password`, `role_id`, `last_seen`, `dob`, `countdown_pass`, `countdown_otp`, `otp`, `token`, `theme_type`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', NULL, 'Benjamin', 'Isong', 'beisongabc@gmail.com', NULL, NULL, NULL, NULL, 1, '$2y$10$fZTJNuRw8daNytJbNvObuegp6ivieTs9JrvHwTrd9J3gxso1Y.MIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'light', NULL, NULL, '2020-05-19 18:48:37', '2020-08-20 01:16:47'),
(2, '66df1ba5-fe5a-4d4e-926c-abaa6b9438b3', NULL, 'adeola', 'bolanle', 'adeolabolande@gmail.com', NULL, NULL, NULL, NULL, 1, '$2y$10$fZTJNuRw8daNytJbNvObuegp6ivieTs9JrvHwTrd9J3gxso1Y.MIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'light', NULL, NULL, '2020-05-29 17:49:15', '2020-05-29 21:11:27'),
(3, 'e2dee75d-495e-4adf-9284-2158bc888094', NULL, 'Demo', 'User', 'demostaff@evalnode.com', NULL, NULL, NULL, NULL, 1, '$2y$10$tzcOGN9fINsEWNuxeuWALeyv7.UK/g2rS/Ye4Ko3HCQ09sh8hGOVy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-06 08:42:46', '2020-06-06 08:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invite_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` tinyint(1) DEFAULT NULL,
  `handled` tinyint(1) DEFAULT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `uuid`, `organization_id`, `staff_id`, `invite_id`, `confirm`, `handled`, `action`, `created_at`, `updated_at`) VALUES
(6, '1de03971-a946-4a42-9b67-f92c45a31ff7', '8f8b8b11-98fd-4242-ae39-f96bf66cc612', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 'bb17d49f-e22e-407e-a3bd-ae1f72ab96a5', 1, 1, 'organization accepted staff', '2020-06-01 09:16:10', '2020-06-01 10:23:39'),
(7, '02ebfa5e-45a0-4965-aa96-7f29e6565a20', '8f8b8b11-98fd-4242-ae39-f96bf66cc612', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 'bb17d49f-e22e-407e-a3bd-ae1f72ab96a5', 0, 1, 'user rejected invite', '2020-06-02 15:47:14', '2020-06-02 15:47:28'),
(8, 'c7dec07a-c9f3-4477-81aa-ae11e4b6e29c', '8f8b8b11-98fd-4242-ae39-f96bf66cc612', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', 'bb17d49f-e22e-407e-a3bd-ae1f72ab96a5', 1, 1, 'organization accepted staff', '2020-06-02 15:49:13', '2020-06-02 15:49:37'),
(9, 'c264b993-275e-43a6-aaca-8c87ba081bc4', '04f4cea1-865e-4e7b-863d-d85c22c33098', 'e2dee75d-495e-4adf-9284-2158bc888094', '9850fed0-20b7-48b5-9db6-b16d9c5848fe', NULL, 0, NULL, '2020-06-06 14:38:27', '2020-06-06 14:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `thumbs`
--

CREATE TABLE `thumbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `target_id`, `created_at`, `updated_at`) VALUES
(1, 'welcome', 'fa7370ee-d108-47d9-b1b9-e3bfde985d65', '2020-06-06 19:16:41', '2020-06-06 19:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `countdown_pass` bigint(20) DEFAULT NULL,
  `countdown_otp` bigint(20) DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `title`, `first_name`, `last_name`, `email`, `phone`, `image_key`, `address`, `active`, `password`, `last_seen`, `dob`, `countdown_pass`, `countdown_otp`, `otp`, `token`, `theme_type`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '07c5d93d-40c5-43fb-9d0d-bfa0c0285ee2', NULL, 'Ben', 'Ice', 'admin@app.com', NULL, NULL, NULL, NULL, '$2y$10$fZTJNuRw8daNytJbNvObuegp6ivieTs9JrvHwTrd9J3gxso1Y.MIC', NULL, NULL, NULL, NULL, NULL, NULL, 'dark', '2020-05-19 18:47:58', NULL, '2020-05-19 18:47:58', '2020-09-04 20:06:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_uuid_unique` (`uuid`),
  ADD KEY `answers_assessment_id_foreign` (`assessment_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assessments_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `public_key` (`public_key`),
  ADD KEY `assessments_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `engaged_answers`
--
ALTER TABLE `engaged_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engaged_answers_uuid_unique` (`uuid`),
  ADD KEY `engaged_answers_engaged_assessment_id_foreign` (`engaged_assessment_id`),
  ADD KEY `engaged_answers_engaged_question_id_foreign` (`engaged_question_id`);

--
-- Indexes for table `engaged_assessments`
--
ALTER TABLE `engaged_assessments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engaged_assessments_uuid_unique` (`uuid`),
  ADD KEY `engaged_assessments_organization_id_foreign` (`organization_id`),
  ADD KEY `engaged_assessments_assessment_id_foreign` (`assessment_id`),
  ADD KEY `engaged_assessments_candidate_id_foreign` (`candidate_id`);

--
-- Indexes for table `engaged_questions`
--
ALTER TABLE `engaged_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engaged_questions_uuid_unique` (`uuid`),
  ADD KEY `engaged_questions_engaged_assessment_id_foreign` (`engaged_assessment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `groups_name_unique` (`name`),
  ADD KEY `groups_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_members_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `group_members_candidate_id_unique` (`candidate_id`),
  ADD KEY `group_members_group_id_foreign` (`group_id`);

--
-- Indexes for table `image_uploads`
--
ALTER TABLE `image_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invites_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `organizations_email_unique` (`email`);

--
-- Indexes for table `organization_members`
--
ALTER TABLE `organization_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organization_members_candidate_id_unique` (`candidate_id`),
  ADD KEY `organization_members_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `organization_staff`
--
ALTER TABLE `organization_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_staff_organization_id_foreign` (`organization_id`),
  ADD KEY `organization_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions_uuid_unique` (`uuid`),
  ADD KEY `questions_assessment_id_foreign` (`assessment_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbs`
--
ALTER TABLE `thumbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `engaged_answers`
--
ALTER TABLE `engaged_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `engaged_assessments`
--
ALTER TABLE `engaged_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `engaged_questions`
--
ALTER TABLE `engaged_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_uploads`
--
ALTER TABLE `image_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organization_members`
--
ALTER TABLE `organization_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_staff`
--
ALTER TABLE `organization_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thumbs`
--
ALTER TABLE `thumbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
