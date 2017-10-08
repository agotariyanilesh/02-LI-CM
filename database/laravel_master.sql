-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 07:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `profile_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `flag`, `profile_img`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chirag dodiya', 'cvdodiya@gmail.com', 0, 'admin_logo.jpg', '$2y$10$OLgPA9CPTy90K3yE8kzlZOYv70vxU1aQ0rcgIsoR.pf9Lr7fGRGW.', NULL, NULL, '2017-09-25 09:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(10) UNSIGNED NOT NULL,
  `contentTypeId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `contentTypeId`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'test page', 'test-page', '<p>Content Added&nbsp;</p>', 1, '2017-09-13 08:07:51', '2017-09-18 08:57:44'),
(2, 6, 'asdf', 'asdf', '<p>Test Content</p>', 0, '2017-09-20 11:10:49', '2017-09-25 08:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `contenttype`
--

CREATE TABLE `contenttype` (
  `id` int(10) UNSIGNED NOT NULL,
  `contentType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contenttype`
--

INSERT INTO `contenttype` (`id`, `contentType`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 'General', 'home-1', 0, '2017-09-04 13:33:49', '2017-09-18 10:39:11'),
(6, 'Business Solutions', 'business-solutions', 1, '2017-09-07 07:20:33', '2017-09-07 07:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `constant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`id`, `constant`, `subject`, `slug`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CONATACT_US', 'User Contact Us', 'template', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:#ffffff; margin:0 auto 0; width:550px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:#444444; padding:10px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div class=\"logo\" style=\"color:#ffffff; float:left; font-size:40px\"><a class=\"navbar-brand\" href=\"###SITE_URL###\" style=\"font-size: 13px;\" title=\"###SITE_NM###\"><span style=\"color:#333333\"><img alt=\"###SITE_NM###\" src=\"###SITE_LOGO_URL###\" style=\"width:100px\" /> </span></a></div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div style=\"color:#444444; font-size:22px; padding-left:10px\"><span style=\"color:#333333; font-size:13px\">Hello ###greetings###!</span></div>\r\n\r\n			<div style=\"float:left; line-height:20px; padding-left:10px; width:98%\">\r\n			<p><span style=\"color:#222222; font-family:arial,sans-serif\"><span style=\"font-size:12.8px\">Thank you for contacting ###SITE_NM###.</span></span></p>\r\n\r\n			<p><span style=\"color:#333333\"><span style=\"font-size:13px\">&nbsp;We will give you reply as soon as possible for your feedback.</span></span></p>\r\n\r\n			<p><span style=\"color:#333333\"><span style=\"font-size:13px\">&nbsp;Your message details are as follows:</span></span></p>\r\n\r\n			<p>###message###</p>\r\n\r\n			<p><span style=\"color:#333333\"><span style=\"font-size:13px\">&nbsp;</span></span></p>\r\n\r\n			<div style=\"color:#595959; font-size:15px\"><span style=\"color:#333333\"><span style=\"font-size:13px\">&nbsp;</span></span></div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:#222222; padding:10px; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"color:#ffffff; float:left; font-size:15px; padding:8px 15px\"><span style=\"color:#ffffff\"><span style=\"font-size:13px\">Copyright &copy; ###YEAR### ###SITE_NM###, All Rights Reserved.</span></span></div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2017-09-21 11:05:48', '2017-09-21 12:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `faqCatId` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faqCatId`, `question`, `answer`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'How do I refund my payment', '<p>You have to follow this steps.</p>', 'how-do-i-refund-my-payment', 1, '2017-09-18 12:55:59', '2017-09-18 13:21:52'),
(6, 1, 'asdf', '<p>sdf</p>', 'asdf', 0, '2017-09-18 13:22:47', '2017-09-18 13:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `faqcategory`
--

CREATE TABLE `faqcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqcategory`
--

INSERT INTO `faqcategory` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Payment Refund', 'home', 1, '2017-09-18 08:57:04', '2017-09-18 12:17:39'),
(3, 'About Site', 'about-site', 1, '2017-09-18 12:41:35', '2017-09-18 12:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_23_121132_create_admins_table', 1),
(5, '2017_08_27_134256_create_category_table', 2),
(6, '2017_09_01_120833_create_content_type_table', 3),
(8, '2017_09_07_125616_create_content_table', 4),
(9, '2017_09_14_182302_create_faqCategory_table', 5),
(10, '2017_09_14_182544_create_faq_table', 6),
(11, '2017_09_20_130741_create_siteSetting_table', 7),
(12, '2017_09_20_170500_create_emailTemplate_table', 8),
(13, '2017_09_24_132452_alter_admin_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dodiyachirag09@gmail.com', '$2y$10$mD1.qXqXxSrsbkxmT2pnuuyY0TwRxPVTX/OJnjRtbNjYz7UkjIREi', '2017-09-10 06:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` text COLLATE utf8mb4_unicode_ci,
  `site_favicon` text COLLATE utf8mb4_unicode_ci,
  `fb_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_pwd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_pwd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `site_name`, `site_logo`, `site_favicon`, `fb_url`, `tw_url`, `li_url`, `contact_email`, `contact_num`, `paypal_user`, `paypal_pwd`, `paypal_secret`, `smtp_user`, `smtp_pwd`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Admin', 'site_logo.png', 'site_favicon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-20 08:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'JohnDoe@gmail.com', '$2y$10$vA2k9ilaGZUea85kW9DiOeURzketd5r.MXWQzhd3sopdDMrB0cweW', '9Dmppo2pK85AzKbn023wtvpsG8ku7CIH1pIDPy3lMgBLujn8GRJqP8TP2NUn', '2017-08-25 07:43:09', '2017-09-10 04:17:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_contenttypeid_foreign` (`contentTypeId`);

--
-- Indexes for table `contenttype`
--
ALTER TABLE `contenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_faqcatid_foreign` (`faqCatId`);

--
-- Indexes for table `faqcategory`
--
ALTER TABLE `faqcategory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contenttype`
--
ALTER TABLE `contenttype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faqcategory`
--
ALTER TABLE `faqcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_contenttypeid_foreign` FOREIGN KEY (`contentTypeId`) REFERENCES `contenttype` (`id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_faqcatid_foreign` FOREIGN KEY (`faqCatId`) REFERENCES `faq` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
