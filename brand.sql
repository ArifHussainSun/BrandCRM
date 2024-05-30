-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 07:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brand`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand_settings`
--

CREATE TABLE `brand_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_settings`
--

INSERT INTO `brand_settings` (`id`, `key_name`, `key_value`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'company_alias', 'DD', 1, NULL, 1, NULL, '2022-04-01 15:04:37'),
(2, 'company_name', 'Design Derive', 1, NULL, 1, NULL, '2022-04-01 15:04:37'),
(3, 'company_phone', '914-369-1275', 1, NULL, 1, NULL, '2022-04-01 17:59:35'),
(4, 'company_email', 'info@designderive.com', 1, NULL, 1, NULL, '2022-04-01 17:59:35'),
(5, 'company_address', 'Testing', 1, NULL, 1, NULL, '2022-04-01 17:59:35'),
(6, 'social_facebook', '#', 1, NULL, 1, NULL, NULL),
(7, 'social_instagram', '#', 1, NULL, 1, NULL, NULL),
(8, 'social_twitter', '#', 1, NULL, 1, NULL, NULL),
(9, 'social_youtube', '#', 1, NULL, 1, NULL, NULL),
(10, 'social_linkedin', '#', 1, NULL, 1, NULL, NULL),
(11, 'payment_gateway_stripe_testing', '{\"merchant_id\":\"\",\"public_key\":\"\",\"secret_key\":\"\",\"statement_descriptor\":\"\",\"environment\":\"\"}', 1, NULL, 1, NULL, NULL),
(12, 'default_payment_gateway', 'payment_gateway_stripe_testing', 1, NULL, 1, NULL, NULL),
(13, 'default_currency', 'US', 1, NULL, 1, NULL, NULL),
(14, 'mail_setting_billing', '{\"protocol\":\"\",\"smtp_host\":\"\",\"smtp_port\":\"\",\"smtp_user\":\"\",\"smtp_pass\":\"\",\"charset\":\"\",\"wordwrap\":\"\",\"mailtype\":\"\"}', 1, NULL, 1, NULL, NULL),
(15, 'logo', 'img/weblogos/logo.png', NULL, NULL, 1, '2022-04-01 15:05:53', '2022-04-01 15:05:53'),
(16, 'logo_white', 'img/weblogos/logo_white.png', NULL, NULL, 1, '2022-04-01 15:05:53', '2022-04-01 15:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metatitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metakeyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `title`, `short_description`, `desc`, `link`, `metatitle`, `metadesc`, `metakeyword`, `image`, `created_by`, `updated_by`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Logo Design', 'Logo Design', NULL, 'Logo Design', 'logo-design', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(2, 'Logo + Branding', 'Logo + Branding', NULL, 'Logo + Branding', 'logo-branding', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(3, 'Logo + Branding + Website', 'Logo + Branding + Website', NULL, 'Logo + Branding + Website', 'logo-branding-website', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(4, 'Branding Collateral', 'Branding Collateral', NULL, 'Branding Collateral', 'branding-collateral', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(5, 'Website Package', 'Website Package', NULL, 'Website Package', 'website-package', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(6, 'Video Animation', 'Video Animation', NULL, 'Video Animation', 'video-animation', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(7, 'Content Writing', 'Content Writing', NULL, 'Content Writing', 'content-writing', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(8, 'Printing Services', 'Printing Services', NULL, 'Printing Services', 'printing-services', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(9, 'Digital Marketing', 'Digital Marketing', NULL, 'Digital Marketing', 'digital-marketing', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(10, 'Mobile Application', 'Mobile Application', NULL, 'Mobile Application', 'mobile-application', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactqueries`
--

CREATE TABLE `contactqueries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactqueries`
--

INSERT INTO `contactqueries` (`id`, `name`, `email`, `subject`, `pages_id`, `message`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abdul Munim', 'shawn.logoorbit@gmail.com', 'Test', '5', 'Testing', NULL, NULL, 1, NULL, '2022-04-01 20:41:34', '2022-04-01 20:41:34'),
(2, 'alex jhon', 'shawn.logoorbit@gmail.com', 'Test', '5', 'sad', NULL, NULL, 1, NULL, '2022-04-01 20:44:57', '2022-04-01 20:44:57'),
(3, 'alex jhon', 'test@gmail.com', 'asdasd', '5', 'asdasd', NULL, NULL, 1, NULL, '2022-04-01 20:45:30', '2022-04-01 20:45:30'),
(4, 'alex jhon', 'test@gmail.com', 'ads', '5', 'sad', NULL, NULL, 1, NULL, '2022-04-01 20:46:54', '2022-04-01 20:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `country_currencies`
--

CREATE TABLE `country_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aplha_code2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aplha_code3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeric_code` int(11) DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_currencies`
--

INSERT INTO `country_currencies` (`id`, `aplha_code2`, `aplha_code3`, `numeric_code`, `country_name`, `currency_name`, `currency_code`, `currency_symbol`, `currency_column`, `added_by`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'AD', 'AND', 20, 'Andorra', 'Euro', 'EUR', '€', 'cur_eur', 1, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'AE', 'ARE', 784, 'United Arab Emirates', 'Dirham', 'AED', 'AED', 'cur_aed', 1, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'AF', 'AFG', 4, 'Afghanistan', 'Afghani', 'AFN', 'AFN', 'cur_afn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(4, 'AL', 'ALB', 8, 'Albania', 'Albanian lek', 'ALL', 'L', 'cur_all', 1, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'AM', 'ARM', 51, 'Armenia', 'Armenian dram', 'AMD', 'AMD', 'cur_amd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(6, 'AO', 'AGO', 24, 'Angola', 'Angolan kwanza', 'AOA', 'Kz', 'cur_aoa', 1, NULL, NULL, 1, NULL, NULL, NULL),
(7, 'AR', 'ARG', 32, 'Argentina', 'Argentine peso', 'ARS', '$', 'cur_ars', 1, NULL, NULL, 1, NULL, NULL, NULL),
(8, 'AT', 'AUT', 40, 'Austria', 'Euro', 'EUR', '€', 'cur_eur_at', 1, NULL, NULL, 1, NULL, NULL, NULL),
(9, 'AU', 'AUS', 36, 'Australia', 'Australian Dollar', 'AUD', 'A$', 'cur_aud', 1, NULL, NULL, 1, NULL, NULL, NULL),
(10, 'AW', 'ABW', 533, 'Aruba', 'Aruban florin', 'AWG', 'ƒ', 'cur_awg', 1, NULL, NULL, 1, NULL, NULL, NULL),
(11, 'AZ', 'AZE', 31, 'Azerbaijan', 'Azerbaijani manat', 'AZN', '&#8380;', 'cur_azn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(12, 'BA', 'BIH', 70, 'Bosnia and Herzegovina', 'Mark', 'BAM', 'KM', 'cur_bam', 1, NULL, NULL, 1, NULL, NULL, NULL),
(13, 'BB', 'BRB', 52, 'Barbados', 'Barbadian dollar', 'BBD', 'Bds$', 'cur_bbd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(14, 'BD', 'BGD', 50, 'Bangladesh', 'Bangladeshi taka', 'BDT', 'Tk', 'cur_bdt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(15, 'BE', 'BEL', 56, 'Belgium', 'Euro', 'EUR', '€', 'cur_eur_be', 1, NULL, NULL, 1, NULL, NULL, NULL),
(16, 'BG', 'BGR', 100, 'Bulgaria', 'Bulgarian lev', 'BGN', 'лв', 'cur_bgn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(17, 'BH', 'BHR', 48, 'Bahrain', 'Bahraini dinar', 'BHD', 'BD', 'cur_bhd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(18, 'BI', 'BDI', 108, 'Burundi', 'Burundian franc', 'BIF', 'Fbu', 'cur_bif', 1, NULL, NULL, 1, NULL, NULL, NULL),
(19, 'BM', 'BMU', 60, 'Bermuda', 'Bermudian dollar', 'BMD', 'BM$', 'cur_bmd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(20, 'BN', 'BRN', 96, 'Brunei Darussalam', 'Brunei dollar', 'BND', 'B$', 'cur_bnd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(21, 'BO', 'BOL', 68, 'Bolivia, Plurinational State of', 'Bolivian boliviano', 'BOB', 'Bs', 'cur_bob', 1, NULL, NULL, 1, NULL, NULL, NULL),
(22, 'BR', 'BRA', 76, 'Brazil', 'Brazilian real', 'BRL', 'R$', 'cur_brl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(23, 'BS', 'BHS', 44, 'Bahamas', 'Bahamian dollar', 'BSD', 'B$', 'cur_bsd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(24, 'BT', 'BTN', 64, 'Bhutan', 'Bhutanese ngultrum', 'BTN', 'Nu', 'cur_btn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(25, 'BW', 'BWA', 72, 'Botswana', 'Botswana pula', 'BWP', 'P', 'cur_bwp', 1, NULL, NULL, 1, NULL, NULL, NULL),
(26, 'BZ', 'BLZ', 84, 'Belize', 'Belize dollar', 'BZD', 'BZ$', 'cur_bzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(27, 'CA', 'CAN', 124, 'Canada', 'Canadian dollar', 'CAD', 'C$', 'cur_cad', 1, NULL, NULL, 1, NULL, NULL, NULL),
(28, 'CC', 'CCK', 166, 'Cocos (Keeling) Islands', 'Australian dollar', 'AUD', 'A$', 'cur_aud_ca', 1, NULL, NULL, 1, NULL, NULL, NULL),
(29, 'CD', 'COD', 180, 'Congo, The Democratic Republic of The', 'Congolese franc', 'CDF', 'FC', 'cur_cdf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(30, 'CG', 'COG', 178, 'Congo', 'Congolese franc', 'CDF', 'FC', 'cur_cdf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(31, 'CH', 'CHE', 756, 'Switzerland', 'Swiss Franc', 'CHF', 'Fr', 'cur_chf_se', 1, NULL, NULL, 1, NULL, NULL, NULL),
(32, 'CK', 'COK', 184, 'Cook Islands', 'New Zealand dollar', 'NZD', 'NZ$', 'cur_ck_nzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(33, 'CL', 'CHL', 152, 'Chile', 'Chilean peso', 'CLP', 'CLP', 'cur_clp', 1, NULL, NULL, 1, NULL, NULL, NULL),
(34, 'CN', 'CHN', 156, 'China', 'Chinese Yuan', 'CNY', '¥', 'cur_cny', 1, NULL, NULL, 1, NULL, NULL, NULL),
(35, 'CO', 'COL', 170, 'Colombia', 'Colombian peso', 'COP', 'COP', 'cur_cop', 1, NULL, NULL, 1, NULL, NULL, NULL),
(36, 'CR', 'CRI', 188, 'Costa Rica', 'Costa Rican colón', 'CRC', '₡', 'cur_crc', 1, NULL, NULL, 1, NULL, NULL, NULL),
(37, 'CU', 'CUB', 192, 'Cuba', 'Cuban Peso', 'CUP', '₱', 'cur_cup', 1, NULL, NULL, 1, NULL, NULL, NULL),
(38, 'CV', 'CPV', 132, 'Cabo Verde', 'Cape Verdean Escudo', 'CVE', 'Esc', 'cur_cve', 1, NULL, NULL, 1, NULL, NULL, NULL),
(39, 'CY', 'CYP', 196, 'Cyprus', 'Euro', 'EUR', '€', 'cur_eur_cy', 1, NULL, NULL, 1, NULL, NULL, NULL),
(40, 'CZ', 'CZE', 203, 'Czech Republic', 'Czech koruna', 'CZK', 'Kč', 'cur_czk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(41, 'DE', 'DEU', 276, 'Germany', 'Euro', 'EUR', '€', 'cur_eur_gr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(42, 'DJ', 'DJI', 262, 'Djibouti', 'Djiboutian franc', 'DJF', 'Fdj', 'cur_djf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(43, 'DK', 'DNK', 208, 'Denmark', 'Danish krone', 'DKK', 'Kr', 'cur_dkk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(44, 'DO', 'DOM', 214, 'Dominican Republic', 'Eastern Caribbean dollar', 'DOP', 'EC$', 'cur_dop', 1, NULL, NULL, 1, NULL, NULL, NULL),
(45, 'DZ', 'DZA', 12, 'Algeria', 'Algerian dinar', 'DZD', 'DZD', 'cur_dzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(46, 'EE', 'EST', 233, 'Estonia', 'Euro', 'EUR', '€', 'cur_eur_ee', 1, NULL, NULL, 1, NULL, NULL, NULL),
(47, 'EG', 'EGY', 818, 'Egypt', 'Egyptian pound', 'EGP', 'E£', 'cur_egp', 1, NULL, NULL, 1, NULL, NULL, NULL),
(48, 'ES', 'ESP', 724, 'Spain', 'Euro', 'EUR', '€', 'cur_eur_es', 1, NULL, NULL, 1, NULL, NULL, NULL),
(49, 'ET', 'ETH', 231, 'Ethiopia', 'Ethiopian birr', 'ETB', 'Br', 'cur_etb', 1, NULL, NULL, 1, NULL, NULL, NULL),
(50, 'FI', 'FIN', 246, 'Finland', 'Euro', 'EUR', '€', 'cur_eur_fi', 1, NULL, NULL, 1, NULL, NULL, NULL),
(51, 'FJ', 'FJI', 242, 'Fiji', 'Fijian dollar', 'FJD', 'FJ$', 'cur_fjd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(52, 'FR', 'FRA', 250, 'France', 'Euro', 'EUR', '€', 'cur_eur_fr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(53, 'GB', 'GBR', 826, 'United Kingdom', 'Pound', 'GBP', '£', 'cur_gbp', 1, NULL, NULL, 1, NULL, NULL, NULL),
(54, 'GE', 'GEO', 268, 'Georgia', 'Georgian Lari', 'GEL', 'GEL', 'cur_gel', 1, NULL, NULL, 1, NULL, NULL, NULL),
(55, 'GH', 'GHA', 288, 'Ghana', 'Ghanaian Cedi ', 'GHS', 'GH¢', 'cur_ghs', 1, NULL, NULL, 1, NULL, NULL, NULL),
(56, 'GI', 'GIB', 292, 'Gibraltar', 'Gibraltar pound', 'GIP', 'GIB£', 'cur_gip', 1, NULL, NULL, 1, NULL, NULL, NULL),
(57, 'GM', 'GMB', 270, 'Gambia', 'Gambian dalasi', 'GMD', 'D', 'cur_gmd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(58, 'GN', 'GIN', 324, 'Guinea', 'Guinean franc', 'GNF', 'GFr', 'cur_gnf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(59, 'GR', 'GRC', 300, 'Greece', 'Euro', 'EUR', '€', 'cur_eur_gr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(60, 'GT', 'GTM', 320, 'Guatemala', 'Guatemalan Quetzal', 'GTQ', 'Q', 'cur_gtq', 1, NULL, NULL, 1, NULL, NULL, NULL),
(61, 'GY', 'GUY', 328, 'Guyana', 'Guyanaese Dollar', 'GYD', 'GY$', 'cur_gyd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(62, 'HK', 'HKG', 344, 'Hong Kong', 'Hong Kong dollar', 'HKD', 'HK$', 'cur_hkd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(63, 'HN', 'HND', 340, 'Honduras', 'Honduran Lempira', 'HNL', 'L', 'cur_hnl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(64, 'HR', 'HRV', 191, 'Croatia', 'Croatian Kuna', 'HRK', 'kn', 'cur_hrk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(65, 'HT', 'HTI', 332, 'Haiti', 'Haitian Gourde', 'HTG', 'G', 'cur_htg', 1, NULL, NULL, 1, NULL, NULL, NULL),
(66, 'HU', 'HUN', 348, 'Hungary', 'Hungarian Forint', 'HUF', 'Ft', 'cur_huf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(67, 'ID', 'IDN', 360, 'Indonesia', 'Indonesian rupiah', 'IDR', 'Rp', 'cur_idr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(68, 'IE', 'IRL', 372, 'Ireland', 'Euro', 'EUR', '€', 'cur_eur_ie', 1, NULL, NULL, 1, NULL, NULL, NULL),
(69, 'IL', 'ISR', 376, 'Israel', 'Israeli New Shekel', 'ILS', '₪', 'cur_ils', 1, NULL, NULL, 1, NULL, NULL, NULL),
(70, 'IM', 'IMN', 833, 'Isle of Man', 'Pound', 'GBP', '£', 'cur_gbp_im', 1, NULL, NULL, 1, NULL, NULL, NULL),
(71, 'IN', 'IND', 356, 'India', 'Indian rupee', 'INR', '₹', 'cur_inr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(72, 'IO', 'IOT', 86, 'British Indian Ocean Territory', 'Pound', 'GBP', '£', 'cur_gbp_io', 1, NULL, NULL, 1, NULL, NULL, NULL),
(73, 'IQ', 'IRQ', 368, 'Iraq', 'Iraqi Dinar', 'IQD', 'IQD', 'cur_iqd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(74, 'IR', 'IRN', 364, 'Iran, Islamic Republic of', 'Iranian Rial', 'IRR', 'IRR', 'cur_irr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(75, 'IS', 'ISL', 352, 'Iceland', 'Icelandic króna', 'ISK', 'Íkr', 'cur_isk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(76, 'IT', 'ITA', 380, 'Italy', 'Euro', 'EUR', '€', 'cur_eur_it', 1, NULL, NULL, 1, NULL, NULL, NULL),
(77, 'JM', 'JAM', 388, 'Jamaica', 'Jamaican dollar', 'JMD', 'J$', 'cur_jmd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(78, 'JO', 'JOR', 400, 'Jordan', 'Jordanian Dinar', 'JOD', 'JOD', 'cur_jod', 1, NULL, NULL, 1, NULL, NULL, NULL),
(79, 'JP', 'JPN', 392, 'Japan', 'Japanese Yen', 'JPY', '¥', 'cur_jpy', 1, NULL, NULL, 1, NULL, NULL, NULL),
(80, 'KE', 'KEN', 404, 'Kenya', 'Kenyan Shilling', 'KES', 'K', 'cur_kes', 1, NULL, NULL, 1, NULL, NULL, NULL),
(81, 'KG', 'KGZ', 417, 'Kyrgyzstan', 'Kyrgystani Som', 'KGS', 'Лв', 'cur_kgs', 1, NULL, NULL, 1, NULL, NULL, NULL),
(82, 'KH', 'KHM', 116, 'Cambodia', 'Cambodian riel', 'KHR', 'KHR', 'cur_khr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(83, 'KI', 'KIR', 296, 'Kiribati', 'Australian Dollar', 'AUD', 'A$', 'cur_aud_ki', 1, NULL, NULL, 1, NULL, NULL, NULL),
(84, 'KR', 'KOR', 410, 'Korea, Republic of', 'South Korean Won', 'KRW', '₩', 'cur_krw', 1, NULL, NULL, 1, NULL, NULL, NULL),
(85, 'KW', 'KWT', 414, 'Kuwait', 'Kuwaiti Dinar', 'KWD', 'KD', 'cur_kwd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(86, 'KY', 'CYM', 136, 'Cayman Islands', 'Cayman Islands Dollar', 'KYD', 'C$', 'cur_kyd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(87, 'KZ', 'KAZ', 398, 'Kazakhstan', 'Kazakhstani tenge', 'KZT', '₸', 'cur_kzt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(88, 'LA', 'LAO', 418, 'Lao People\'s Democratic Republic', 'Laotian Kip', 'LAK', '₭', 'cur_lak', 1, NULL, NULL, 1, NULL, NULL, NULL),
(89, 'LB', 'LBN', 422, 'Lebanon', 'Lebanese pound', 'LBP', 'L£', 'cur_lbp', 1, NULL, NULL, 1, NULL, NULL, NULL),
(90, 'LK', 'LKA', 144, 'Sri Lanka', 'Sri Lankan Rupee', 'LKR', 'Rs. ', 'cur_lkr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(91, 'LR', 'LBR', 430, 'Liberia', 'Liberian Dollar', 'LRD', 'L$', 'cur_lrd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(92, 'LS', 'LSO', 426, 'Lesotho', 'Lesotho Loti', 'LSL', 'L', 'cur_lsl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(93, 'LT', 'LTU', 440, 'Lithuania', 'Euro', 'EUR', '€', 'cur_eur_lt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(94, 'LU', 'LUX', 442, 'Luxembourg', 'Euro', 'EUR', '€', 'cur_eur_lu', 1, NULL, NULL, 1, NULL, NULL, NULL),
(95, 'LV', 'LVA', 428, 'Latvia', 'Euro', 'EUR', '€', 'cur_eur_lv', 1, NULL, NULL, 1, NULL, NULL, NULL),
(96, 'LY', 'LBY', 434, 'Libya', 'Libyan dinar', 'LYD', 'LD', 'cur_lyd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(97, 'MA', 'MAR', 504, 'Morocco', 'Moroccan Dirham', 'MAD', 'MAD', 'cur_mad', 1, NULL, NULL, 1, NULL, NULL, NULL),
(98, 'MC', 'MCO', 492, 'Monaco', 'Euro', 'EUR', '€', 'cur_eur_mc', 1, NULL, NULL, 1, NULL, NULL, NULL),
(99, 'MD', 'MDA', 498, 'Moldova, Republic of', 'Moldovan Leu', 'MDL', 'L', 'cur_mdl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(100, 'ME', 'MNE', 499, 'Montenegro', 'Euro', 'EUR', '€', 'cur_eur_me', 1, NULL, NULL, 1, NULL, NULL, NULL),
(101, 'MG', 'MDG', 450, 'Madagascar', 'Malagasy Ariary', 'MGA', 'Ar', 'cur_mga', 1, NULL, NULL, 1, NULL, NULL, NULL),
(102, 'MK', 'MKD', 807, 'North Macedonia', 'Macedonian Denar', 'MKD', 'den', 'cur_mkd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(103, 'MM', 'MMR', 104, 'Myanmar', 'Myanma Kyat', 'MMK', 'K', 'cur_mmk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(104, 'MO', 'MAC', 446, 'Macao', 'Macanese Pataca', 'MOP', 'MOP', 'cur_mop', 1, NULL, NULL, 1, NULL, NULL, NULL),
(105, 'MT', 'MLT', 470, 'Malta', 'Euro', 'EUR', '€', 'cur_eur_mt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(106, 'MU', 'MUS', 480, 'Mauritius', 'Mauritian Rupee', 'MUR', 'Rs.', 'cur_mur', 1, NULL, NULL, 1, NULL, NULL, NULL),
(107, 'MV', 'MDV', 462, 'Maldives', 'Maldivian Rufiyaa', 'MVR', 'Rf', 'cur_mvr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(108, 'MW', 'MWI', 454, 'Malawi', 'Malawian Kwacha', 'MWK', 'MK', 'cur_mwk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(109, 'MX', 'MEX', 484, 'Mexico', 'Mexican Peso', 'MXN', 'Mex$', 'cur_mxn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(110, 'MY', 'MYS', 458, 'Malaysia', 'Malaysian Ringgit', 'MYR', 'RM', 'cur_myr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(111, 'MZ', 'MOZ', 508, 'Mozambique', 'Mozambican Metical', 'MZN', 'MT', 'cur_mzn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(112, 'NA', 'NAM', 516, 'Namibia', 'Namibian Dollar', 'NAD', 'NA$', 'cur_nad', 1, NULL, NULL, 1, NULL, NULL, NULL),
(113, 'NC', 'NCL', 540, 'New Caledonia', 'CFP Franc', 'XPF', '₣', 'cur_nc_xpf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(114, 'NG', 'NGA', 566, 'Nigeria', 'Nigerian Naira', 'NGN', '₦', 'cur_ngn', 1, NULL, NULL, 1, NULL, NULL, NULL),
(115, 'NI', 'NIC', 558, 'Nicaragua', 'Nicaraguan Córdoba', 'NIO', 'C$', 'cur_nio', 1, NULL, NULL, 1, NULL, NULL, NULL),
(116, 'NL', 'NLD', 528, 'Netherlands', 'Euro', 'EUR', '€', 'cur_eur_nl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(117, 'NO', 'NOR', 578, 'Norway', 'Norwegian Krone', 'NOK', 'kr', 'cur_nok', 1, NULL, NULL, 1, NULL, NULL, NULL),
(118, 'NP', 'NPL', 524, 'Nepal', 'Nepalese Rupee', 'NPR', 'Rs', 'cur_npr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(119, 'NR', 'NRU', 520, 'Nauru', 'Australian Dollar', 'AUD', 'A$', 'cur_aud_nr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(120, 'NU', 'NIU', 570, 'Niue', 'New Zealand Dollar', 'NZD', 'NZ$', 'cur_nu_nzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(121, 'NZ', 'NZL', 554, 'New Zealand', 'New Zealand Dollar', 'NZD', 'NZ$', 'cur_nzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(122, 'OM', 'OMN', 512, 'Oman', 'Omani Rial', 'OMR', 'ر', 'cur_omr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(123, 'PA', 'PAN', 591, 'Panama', 'Panamanian Balboa', 'PAB', 'PAB', 'cur_pab', 1, NULL, NULL, 1, NULL, NULL, NULL),
(124, 'PE', 'PER', 604, 'Peru', 'Peruvian Nuevo Sol', 'PEN', 'PEN', 'cur_pen', 1, NULL, NULL, 1, NULL, NULL, NULL),
(125, 'PF', 'PYF', 258, 'French Polynesia', 'CFP Franc', 'XPF', '₣', 'cur_pf_xpf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(126, 'PG', 'PNG', 598, 'Papua New Guinea', 'Papua New Guinean Kina', 'PGK', 'K', 'cur_pgk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(127, 'PH', 'PHL', 608, 'Philippines', 'Philippine Peso', 'PHP', '₱', 'cur_php', 1, NULL, NULL, 1, NULL, NULL, NULL),
(128, 'PK', 'PAK', 586, 'Pakistan', 'Pakistani Rupee', 'PKR', 'Rs', 'cur_pkr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(129, 'PL', 'POL', 616, 'Poland', 'Polish Zloty', 'PLN', 'zł', 'cur_pln', 1, NULL, NULL, 1, NULL, NULL, NULL),
(130, 'PN', 'PCN', 612, 'Pitcairn', 'New Zealand Dollar', 'NZD', 'NZ$', 'cur_nu_nzd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(131, 'PT', 'PRT', 620, 'Portugal', 'Euro', 'EUR', '€', 'cur_eur_pt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(132, 'PY', 'PRY', 600, 'Paraguay', 'Paraguayan Guarani', 'PYG', '₲', 'cur_pyg', 1, NULL, NULL, 1, NULL, NULL, NULL),
(133, 'QA', 'QAT', 634, 'Qatar', 'Qatari Rial', 'QAR', 'QR', 'cur_qar', 1, NULL, NULL, 1, NULL, NULL, NULL),
(134, 'RO', 'ROU', 642, 'Romania', 'Romanian Leu', 'RON', 'lei', 'cur_ron', 1, NULL, NULL, 1, NULL, NULL, NULL),
(135, 'RS', 'SRB', 688, 'Serbia', 'Serbian Dinar', 'RSD', 'din', 'cur_rsd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(136, 'RU', 'RUS', 643, 'Russian Federation', 'Russian Ruble', 'RUB', '₽', 'cur_rub', 1, NULL, NULL, 1, NULL, NULL, NULL),
(137, 'RW', 'RWA', 646, 'Rwanda', 'Rwandan Franc', 'RWF', 'RF', 'cur_rwf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(138, 'SA', 'SAU', 682, 'Saudi Arabia', 'Saudi Riyal', 'SAR', 'SR', 'cur_sar', 1, NULL, NULL, 1, NULL, NULL, NULL),
(139, 'SB', 'SLB', 90, 'Solomon Islands', 'Solomon Islands Dollar', 'SBD', 'SI$', 'cur_sbd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(140, 'SC', 'SYC', 690, 'Seychelles', 'Seychellois Rupee', 'SCR', 'SR', 'cur_scr', 1, NULL, NULL, 1, NULL, NULL, NULL),
(141, 'SD', 'SDN', 729, 'Sudan', 'Sudanese Pound', 'SDG', 'SD', 'cur_sdg', 1, NULL, NULL, 1, NULL, NULL, NULL),
(142, 'SE', 'SWE', 752, 'Sweden', 'Swedish Krona', 'SEK', 'kr', 'cur_sek', 1, NULL, NULL, 1, NULL, NULL, NULL),
(143, 'SG', 'SGP', 702, 'Singapore', 'Singapore Dollar', 'SGD', 'S$', 'cur_sgd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(144, 'SI', 'SVN', 705, 'Slovenia', 'Euro', 'EUR', '€', 'cur_eur_si', 1, NULL, NULL, 1, NULL, NULL, NULL),
(145, 'SK', 'SVK', 703, 'Slovakia', 'Euro', 'EUR', '€', 'cur_eur_sk', 1, NULL, NULL, 1, NULL, NULL, NULL),
(146, 'SL', 'SLE', 694, 'Sierra Leone', 'Sierra Leonean Leone', 'SLL', 'Le', 'cur_sll', 1, NULL, NULL, 1, NULL, NULL, NULL),
(147, 'SO', 'SOM', 706, 'Somalia', 'Somali Shilling', 'SOS', 'Sh', 'cur_sos', 1, NULL, NULL, 1, NULL, NULL, NULL),
(148, 'SR', 'SUR', 740, 'Suriname', 'Surinamese Dollar', 'SRD', 'Sr$', 'cur_srd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(149, 'SS', 'SSD', 728, 'South Sudan', 'Sudanese Pound', 'SDG', 'SD', 'cur_sdg', 1, NULL, NULL, 1, NULL, NULL, NULL),
(150, 'SZ', 'SWZ', 748, 'Swaziland', 'Swazi Lilangeni', 'SZL', 'E', 'cur_szl', 1, NULL, NULL, 1, NULL, NULL, NULL),
(151, 'TH', 'THA', 764, 'Thailand', 'Thai Baht', 'THB', '฿', 'cur_thb', 1, NULL, NULL, 1, NULL, NULL, NULL),
(152, 'TJ', 'TJK', 762, 'Tajikistan', 'Tajikistani Somoni', 'TJS', 'ЅM', 'cur_tjs', 1, NULL, NULL, 1, NULL, NULL, NULL),
(153, 'TM', 'TKM', 795, 'Turkmenistan', 'Turkmenistani Manat', 'TMT', 'T', 'cur_tmt', 1, NULL, NULL, 1, NULL, NULL, NULL),
(154, 'TN', 'TUN', 788, 'Tunisia', 'Tunisian Dinar', 'TND', 'DT', 'cur_tnd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(155, 'TO', 'TON', 776, 'Tonga', 'Tongan Paʻanga', 'TOP', 'T$', 'cur_top', 1, NULL, NULL, 1, NULL, NULL, NULL),
(156, 'TR', 'TUR', 792, 'Turkey', 'Turkish Lira', 'TRY', 'TL', 'cur_try', 1, NULL, NULL, 1, NULL, NULL, NULL),
(157, 'TT', 'TTO', 780, 'Trinidad and Tobago', 'Trinidad and Tobago Dollar', 'TTD', 'TT$', 'cur_ttd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(158, 'TV', 'TUV', 798, 'Tuvalu', 'Australian Dollar', 'AUD', 'A$', 'cur_aud_tv', 1, NULL, NULL, 1, NULL, NULL, NULL),
(159, 'TW', 'TWN', 158, 'Taiwan, Province of China', 'New Taiwan Dollar', 'TWD', 'NT$', 'cur_twd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(160, 'TZ', 'TZA', 834, 'Tanzania, United Republic of', 'Tanzanian Shilling', 'TZS', 'TSh', 'cur_tzs', 1, NULL, NULL, 1, NULL, NULL, NULL),
(161, 'UA', 'UKR', 804, 'Ukraine', 'Ukrainian Hryvnia', 'UAH', '₴', 'cur_uah', 1, NULL, NULL, 1, NULL, NULL, NULL),
(162, 'UG', 'UGA', 800, 'Uganda', 'Ugandan Shilling', 'UGX', 'Ush', 'cur_ugx', 1, NULL, NULL, 1, NULL, NULL, NULL),
(163, 'UY', 'URY', 858, 'Uruguay', 'Uruguayan peso', 'UYU', '', 'cur_uyu', 1, NULL, NULL, 1, NULL, NULL, NULL),
(164, 'UZ', 'UZB', 860, 'Uzbekistan', 'Uzbekistan Som', 'UZS', 'so\'m', 'cur_uzs', 1, NULL, NULL, 1, NULL, NULL, NULL),
(165, 'VN', 'VNM', 704, 'Viet Nam', 'Vietnamese Dong', 'VND', '₫', 'cur_vnd', 1, NULL, NULL, 1, NULL, NULL, NULL),
(166, 'WF', 'WLF', 876, 'Wallis and Futuna', 'CFP Franc', 'XPF', '₣', 'cur_wf_xpf', 1, NULL, NULL, 1, NULL, NULL, NULL),
(167, 'YE', 'YEM', 887, 'Yemen', 'Yemeni Rial', 'YER', 'Rial', 'cur_yer', 1, NULL, NULL, 1, NULL, NULL, NULL),
(168, 'ZA', 'ZAF', 710, 'South Africa', 'South African Rand', 'ZAR', 'R', 'cur_zar', 1, NULL, NULL, 1, NULL, NULL, NULL),
(169, 'ZM', 'ZMB', 894, 'Zambia', 'Zambian Kwacha', 'ZMW', 'ZK', 'cur_zmw', 1, NULL, NULL, 1, NULL, NULL, NULL),
(170, 'US', 'USA', 840, 'United States', 'US Dollar', 'USD', '$', 'sale_price', 1, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `utilized` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `company_name`, `address`, `city`, `state`, `zipcode`, `country`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abdul', 'Munim', 'shawn.logoorbit@gmail.com', '0233323232', 'fgbdfb', '3/483 Shah Faisal Colony Block #3', 'Karachi', 'Sindh', '76000', '128', NULL, NULL, 1, NULL, '2022-04-01 20:34:17', '2022-04-01 20:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcc` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_18_162827_create_admins_table', 1),
(6, '2022_01_18_214043_create_categories_table', 1),
(7, '2022_01_19_211841_create_sub_categories_table', 1),
(8, '2022_01_20_230216_create_products_table', 1),
(9, '2022_01_21_160539_create_testimonials_table', 1),
(10, '2022_01_21_174010_create_faqs_table', 1),
(11, '2022_01_21_183934_create_partners_table', 1),
(12, '2022_01_21_200449_create_galleries_table', 1),
(13, '2022_01_21_215318_create_banners_table', 1),
(14, '2022_01_24_174637_create_permission_tables', 1),
(15, '2022_01_25_152813_create_subscribers_table', 1),
(16, '2022_01_25_160836_create_contactqueries_table', 1),
(17, '2022_01_26_105920_sale_type_migration', 1),
(18, '2022_01_26_181344_create_customers_table', 1),
(19, '2022_01_26_181345_create_payments_table', 1),
(20, '2022_02_03_105921_create_payment_links_table', 1),
(21, '2022_02_03_111814_create_invoices_table', 1),
(22, '2022_02_03_132426_create_brand_settings_table', 1),
(23, '2022_02_07_131201_create_country_currencies_table', 1),
(24, '2022_02_07_134507_create_coupons_table', 1),
(25, '2022_02_10_180249_create_pages_table', 1),
(26, '2022_02_14_140926_create_email_templates_table', 1),
(27, '2022_02_17_141832_create_user_infos_table', 1),
(28, '2022_02_18_170628_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('34b8c6a5-3fad-4ebc-99c2-7ecd7a28380c', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Name\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 15:04:37', '2022-04-01 20:04:27'),
('3ae020ab-9541-426a-84df-97912c862802', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Name\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:26', '2022-04-01 17:59:35', '2022-04-01 20:04:26'),
('41b9d863-8ef3-4fa9-a386-03b8d5f52045', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Email\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:26', '2022-04-01 17:59:35', '2022-04-01 20:04:26'),
('4d4112af-3024-432e-8ed5-0bf7c758707f', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Added New Customer\",\"desc\":{\"added_title\":\"Abdul\",\"added_description\":\"Munim\"}}}', NULL, '2022-04-01 20:34:17', '2022-04-01 20:34:17'),
('4dfd9e22-bb0c-4a75-abcf-a3e96fac5866', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Added New Customer\",\"desc\":{\"added_title\":\"Abdul\",\"added_description\":\"Munim\"}}}', NULL, '2022-04-01 20:34:17', '2022-04-01 20:34:17'),
('53469784-71cf-4cb6-a783-df3a50d4688b', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Added new Company Logo White\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 15:05:53', '2022-04-01 15:05:53'),
('5a544887-822e-4c5e-8bbd-a91b6cee6564', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated  Contact Information Company Address\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:26', '2022-04-01 17:59:35', '2022-04-01 20:04:26'),
('68a9455c-43e5-4983-a6db-4194ab51f061', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Name\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 17:59:35', '2022-04-01 17:59:35'),
('7396ec9d-a05b-401c-8db2-9c876707c2f6', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Added new Company Logo\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 15:05:53', '2022-04-01 15:05:53'),
('8b67a73b-c039-4ece-a942-46a1d7f44c22', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Phone\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 17:59:35', '2022-04-01 20:04:27'),
('a4bb9ad0-1bf9-4fc3-bcbc-7c4751dedbf3', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Alias\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 17:59:35', '2022-04-01 20:04:27'),
('ab0384cf-1219-4325-b469-31a698c89e47', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Phone\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 17:59:35', '2022-04-01 17:59:35'),
('bd9cc388-a347-4c0f-9828-84e67326ffa2', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Alias\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 17:59:35', '2022-04-01 17:59:35'),
('bf4e9f71-e94a-43d1-a8a5-e67bdca03590', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Name\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 15:04:37', '2022-04-01 15:04:37'),
('c500c532-a2be-4afe-95e9-5572e16082b0', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated  Contact Information Company Address\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 17:59:35', '2022-04-01 17:59:35'),
('ca03d935-ba26-4d2a-a2ff-36a55e1c1f4d', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Added new Company Logo\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 15:05:53', '2022-04-01 20:04:27'),
('cfee25e8-6a7d-4536-a447-6bcaacebac41', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Alias\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 15:04:37', '2022-04-01 20:04:27'),
('e68ed3b8-db28-4dac-9d1b-359d9dffaa3e', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Alias\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 15:04:37', '2022-04-01 15:04:37'),
('fa7c1693-4d91-41f0-bf26-7d2b3000caf1', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 2, '{\"data\":{\"performed_by\":1,\"title\":\"Updated Contact Information Company Email\",\"desc\":{\"added_title\":null}}}', NULL, '2022-04-01 17:59:35', '2022-04-01 17:59:35'),
('fb1e25da-3c3d-41c9-9caa-e41fd8edf02c', 'App\\Notifications\\QuickNotify', 'App\\Models\\User', 1, '{\"data\":{\"performed_by\":1,\"title\":\"Added new Company Logo White\",\"desc\":{\"added_title\":null}}}', '2022-04-01 20:04:27', '2022-04-01 15:05:53', '2022-04-01 20:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_header` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_footer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_till` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `original_price` double(8,2) DEFAULT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_amount` double(8,2) DEFAULT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_on` date DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_links`
--

CREATE TABLE `payment_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_till` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `original_price` double(8,2) DEFAULT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_amount` double(8,2) DEFAULT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_sale_type`
--

CREATE TABLE `payment_sale_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_sale_type`
--

INSERT INTO `payment_sale_type` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Fresh Sales', NULL, 1, NULL, NULL, NULL, 1),
(2, 'Upsell', NULL, 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'User-Create', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(2, 'User-Edit', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(3, 'User-View', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(4, 'User-Delete', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(5, 'Permission-Create', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(6, 'Permission-Edit', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(7, 'Permission-View', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(8, 'Permission-Delete', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(9, 'ContactQueries-Create', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(10, 'ContactQueries-Edit', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(11, 'ContactQueries-View', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(12, 'ContactQueries-Delete', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(13, 'Subscriber-Create', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(14, 'Subscriber-Edit', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(15, 'Subscriber-View', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(16, 'Subscriber-Delete', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(17, 'Customer-Create', 'web', '2022-04-01 14:34:32', '2022-04-01 14:34:32'),
(18, 'Customer-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(19, 'Customer-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(20, 'Customer-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(21, 'Role-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(22, 'Role-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(23, 'Role-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(24, 'Role-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(25, 'EmailTemplate-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(26, 'EmailTemplate-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(27, 'EmailTemplate-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(28, 'EmailTemplate-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(29, 'Categories-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(30, 'Categories-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(31, 'Categories-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(32, 'Categories-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(33, 'SubCategories-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(34, 'SubCategories-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(35, 'SubCategories-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(36, 'SubCategories-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(37, 'Product-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(38, 'Product-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(39, 'Product-View', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(40, 'Product-Delete', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(41, 'Page-Create', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(42, 'Page-Edit', 'web', '2022-04-01 14:34:33', '2022-04-01 14:34:33'),
(43, 'Page-View', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(44, 'Page-Delete', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(45, 'Testimonial-Create', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(46, 'Testimonial-Edit', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(47, 'Testimonial-View', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(48, 'Testimonial-Delete', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(49, 'Faq-Create', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(50, 'Faq-Edit', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(51, 'Faq-View', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(52, 'Faq-Delete', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(53, 'Partner-Create', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(54, 'Partner-Edit', 'web', '2022-04-01 14:34:34', '2022-04-01 14:34:34'),
(55, 'Partner-View', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(56, 'Partner-Delete', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(57, 'Payment-Create', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(58, 'Payment-Edit', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(59, 'Payment-View', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(60, 'Payment-Delete', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(61, 'PaymentLinkGenerator-Create', 'web', '2022-04-01 14:34:35', '2022-04-01 14:34:35'),
(62, 'PaymentLinkGenerator-Edit', 'web', '2022-04-01 14:34:36', '2022-04-01 14:34:36'),
(63, 'PaymentLinkGenerator-View', 'web', '2022-04-01 14:34:36', '2022-04-01 14:34:36'),
(64, 'PaymentLinkGenerator-Delete', 'web', '2022-04-01 14:34:36', '2022-04-01 14:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `sub_categories_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `metatitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metakeyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-04-01 14:34:31', '2022-04-01 14:34:31'),
(2, 'Brand Manager', 'web', '2022-04-01 14:34:31', '2022-04-01 14:34:31'),
(3, 'Salesperson', 'web', '2022-04-01 14:34:31', '2022-04-01 14:34:31'),
(4, 'Developer', 'web', '2022-04-01 14:34:31', '2022-04-01 14:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(23, 1),
(23, 2),
(23, 4),
(24, 1),
(24, 2),
(24, 4),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 1),
(29, 2),
(29, 4),
(30, 1),
(30, 2),
(30, 4),
(31, 1),
(31, 2),
(31, 4),
(32, 1),
(32, 2),
(32, 4),
(33, 1),
(33, 2),
(33, 4),
(34, 1),
(34, 2),
(34, 4),
(35, 1),
(35, 2),
(35, 4),
(36, 1),
(36, 2),
(36, 4),
(37, 1),
(37, 2),
(37, 4),
(38, 1),
(38, 2),
(38, 4),
(39, 1),
(39, 2),
(39, 4),
(40, 1),
(40, 2),
(40, 4),
(41, 1),
(41, 4),
(42, 1),
(42, 4),
(43, 1),
(43, 4),
(44, 1),
(44, 4),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(49, 1),
(49, 2),
(49, 4),
(50, 1),
(50, 2),
(50, 4),
(51, 1),
(51, 2),
(51, 4),
(52, 1),
(52, 2),
(52, 4),
(53, 1),
(53, 2),
(53, 4),
(54, 1),
(54, 2),
(54, 4),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 3),
(57, 4),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(59, 1),
(59, 2),
(59, 3),
(59, 4),
(60, 1),
(60, 2),
(60, 3),
(60, 4),
(61, 1),
(61, 2),
(61, 3),
(61, 4),
(62, 1),
(62, 2),
(62, 3),
(62, 4),
(63, 1),
(63, 2),
(63, 3),
(63, 4),
(64, 1),
(64, 2),
(64, 3),
(64, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategorylink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `state`, `image`, `address`, `active`, `created_by`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$LlkZwrP810g6aA.DgbuxG.Hx.TARk/ojNVdyrUi2tVDCVhVzitLFO', NULL, NULL, 'images/users/1648832381.jpg', NULL, 1, NULL, NULL, NULL, '2022-04-01 14:34:30', '2022-04-01 20:59:41'),
(2, 'Brand', 'Manager', 'manager@gmail.com', NULL, '$2y$10$B4f64RK5H.95i3Ss7RVOjOp1EMkm1WQukvV4qxc/algzttV/MuRZS', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-04-01 14:34:30', '2022-04-01 14:34:30'),
(3, 'Salesperson', 'BrandX', 'salesperson@gmail.com', NULL, '$2y$10$fobKE7/D76DuF1xOOxIiK..aOS3ttVMfNBCNPJJTYK7ai/zIYtNeS', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-04-01 14:34:30', '2022-04-01 14:34:30'),
(4, 'Developer', 'BrandX', 'developer@gmail.com', NULL, '$2y$10$VksT/iLcdjtkFxezG2a6oO9P1t0PbprJ8kiHIsszSVKCTahGzjLmy', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-04-01 14:34:31', '2022-04-01 14:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_created_by_index` (`created_by`),
  ADD KEY `banners_updated_by_index` (`updated_by`);

--
-- Indexes for table `brand_settings`
--
ALTER TABLE `brand_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_settings_created_by_index` (`created_by`),
  ADD KEY `brand_settings_updated_by_index` (`updated_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_created_by_index` (`created_by`),
  ADD KEY `categories_updated_by_index` (`updated_by`);

--
-- Indexes for table `contactqueries`
--
ALTER TABLE `contactqueries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactqueries_created_by_index` (`created_by`),
  ADD KEY `contactqueries_updated_by_index` (`updated_by`);

--
-- Indexes for table `country_currencies`
--
ALTER TABLE `country_currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_currencies_created_by_index` (`created_by`),
  ADD KEY `country_currencies_updated_by_index` (`updated_by`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_created_by_index` (`created_by`),
  ADD KEY `coupons_updated_by_index` (`updated_by`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_created_by_index` (`created_by`),
  ADD KEY `customers_updated_by_index` (`updated_by`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_created_by_index` (`created_by`),
  ADD KEY `email_templates_updated_by_index` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_created_by_index` (`created_by`),
  ADD KEY `faqs_updated_by_index` (`updated_by`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_created_by_index` (`created_by`),
  ADD KEY `galleries_updated_by_index` (`updated_by`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_no_unique` (`invoice_no`),
  ADD KEY `invoices_customer_id_index` (`customer_id`),
  ADD KEY `invoices_payment_id_index` (`payment_id`),
  ADD KEY `invoices_created_by_index` (`created_by`),
  ADD KEY `invoices_updated_by_index` (`updated_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_created_by_index` (`created_by`),
  ADD KEY `pages_updated_by_index` (`updated_by`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_created_by_index` (`created_by`),
  ADD KEY `partners_updated_by_index` (`updated_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_token_unique` (`token`),
  ADD KEY `payments_customer_id_index` (`customer_id`),
  ADD KEY `payments_coupon_id_index` (`coupon_id`),
  ADD KEY `payments_sale_type_id_index` (`sale_type_id`),
  ADD KEY `payments_created_by_index` (`created_by`),
  ADD KEY `payments_updated_by_index` (`updated_by`);

--
-- Indexes for table `payment_links`
--
ALTER TABLE `payment_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_links_token_unique` (`token`),
  ADD KEY `payment_links_customer_id_index` (`customer_id`),
  ADD KEY `payment_links_coupon_id_index` (`coupon_id`),
  ADD KEY `payment_links_sale_type_id_index` (`sale_type_id`),
  ADD KEY `payment_links_created_by_index` (`created_by`),
  ADD KEY `payment_links_updated_by_index` (`updated_by`);

--
-- Indexes for table `payment_sale_type`
--
ALTER TABLE `payment_sale_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_sale_type_created_by_index` (`created_by`),
  ADD KEY `payment_sale_type_updated_by_index` (`updated_by`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_id_foreign` (`categories_id`),
  ADD KEY `products_sub_categories_id_foreign` (`sub_categories_id`),
  ADD KEY `products_created_by_index` (`created_by`),
  ADD KEY `products_updated_by_index` (`updated_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_created_by_index` (`created_by`),
  ADD KEY `subscribers_updated_by_index` (`updated_by`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_categories_id_foreign` (`categories_id`),
  ADD KEY `sub_categories_created_by_index` (`created_by`),
  ADD KEY `sub_categories_updated_by_index` (`updated_by`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_created_by_index` (`created_by`),
  ADD KEY `testimonials_updated_by_index` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_info_user_id_index` (`user_id`),
  ADD KEY `user_info_created_by_index` (`created_by`),
  ADD KEY `user_info_updated_by_index` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand_settings`
--
ALTER TABLE `brand_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contactqueries`
--
ALTER TABLE `contactqueries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country_currencies`
--
ALTER TABLE `country_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_links`
--
ALTER TABLE `payment_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_sale_type`
--
ALTER TABLE `payment_sale_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `banners_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `brand_settings`
--
ALTER TABLE `brand_settings`
  ADD CONSTRAINT `brand_settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `brand_settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `contactqueries`
--
ALTER TABLE `contactqueries`
  ADD CONSTRAINT `contactqueries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contactqueries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `country_currencies`
--
ALTER TABLE `country_currencies`
  ADD CONSTRAINT `country_currencies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `country_currencies_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `coupons_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `customers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD CONSTRAINT `email_templates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `email_templates_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `faqs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `invoices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `partners_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payments_sale_type_id_foreign` FOREIGN KEY (`sale_type_id`) REFERENCES `payment_sale_type` (`id`),
  ADD CONSTRAINT `payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment_links`
--
ALTER TABLE `payment_links`
  ADD CONSTRAINT `payment_links_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_links_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payment_links_sale_type_id_foreign` FOREIGN KEY (`sale_type_id`) REFERENCES `payment_sale_type` (`id`),
  ADD CONSTRAINT `payment_links_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment_sale_type`
--
ALTER TABLE `payment_sale_type`
  ADD CONSTRAINT `payment_sale_type_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_sale_type_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_sub_categories_id_foreign` FOREIGN KEY (`sub_categories_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscribers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sub_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sub_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `testimonials_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_info_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
