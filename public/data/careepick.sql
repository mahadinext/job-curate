-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 11:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careepick`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_bn_name` varchar(255) DEFAULT NULL,
  `company_year_of_establishment` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_slogan` varchar(255) DEFAULT NULL,
  `company_bn_slogan` varchar(255) DEFAULT NULL,
  `company_mail` varchar(255) NOT NULL,
  `company_password` varchar(255) NOT NULL,
  `company_description` text DEFAULT NULL,
  `company_country` int(11) NOT NULL,
  `company_district` int(11) NOT NULL,
  `company_upazila` int(11) NOT NULL,
  `company_address_1` varchar(255) NOT NULL,
  `company_address_2` varchar(255) DEFAULT NULL,
  `company_address_3` varchar(255) DEFAULT NULL,
  `company_google_map_address` varchar(255) DEFAULT NULL,
  `company_phone_no_1` varchar(255) NOT NULL,
  `company_phone_no_2` varchar(255) DEFAULT NULL,
  `company_phone_no_3` varchar(255) DEFAULT NULL,
  `company_website_url` varchar(255) DEFAULT NULL,
  `company_linkedin_url` varchar(255) DEFAULT NULL,
  `company_facebook_url` varchar(255) DEFAULT NULL,
  `company_glassdoor_url` varchar(255) DEFAULT NULL,
  `company_size` bigint(20) UNSIGNED DEFAULT NULL,
  `working_hour` bigint(20) UNSIGNED DEFAULT NULL,
  `company_tin_no` varchar(255) DEFAULT NULL,
  `company_bin_no` varchar(255) DEFAULT NULL,
  `company_trade_license_no` varchar(255) NOT NULL,
  `company_trade_license_document` varchar(255) NOT NULL,
  `company_status` int(11) NOT NULL DEFAULT 0,
  `terms_and_condition_agreement` int(11) NOT NULL,
  `privacy_and_policy_agreement` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `remarks` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_associated_industries`
--

CREATE TABLE `company_associated_industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_employment_types`
--

CREATE TABLE `company_employment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `employment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `phone_code`, `currency_symbol`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', '93', '؋', 'AFN', 0, NULL, NULL),
(2, 'AX', 'Aland Islands', '358', '€', 'EUR', 0, NULL, NULL),
(3, 'AL', 'Albania', '355', 'Lek', 'ALL', 0, NULL, NULL),
(4, 'DZ', 'Algeria', '213', 'دج', 'DZD', 0, NULL, NULL),
(5, 'AS', 'American Samoa', '1684', '$', 'USD', 0, NULL, NULL),
(6, 'AD', 'Andorra', '376', '€', 'EUR', 0, NULL, NULL),
(7, 'AO', 'Angola', '244', 'Kz', 'AOA', 0, NULL, NULL),
(8, 'AI', 'Anguilla', '1264', '$', 'XCD', 0, NULL, NULL),
(9, 'AQ', 'Antarctica', '672', '$', 'AAD', 0, NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', '1268', '$', 'XCD', 0, NULL, NULL),
(11, 'AR', 'Argentina', '54', '$', 'ARS', 0, NULL, NULL),
(12, 'AM', 'Armenia', '374', '֏', 'AMD', 0, NULL, NULL),
(13, 'AW', 'Aruba', '297', 'ƒ', 'AWG', 0, NULL, NULL),
(14, 'AU', 'Australia', '61', '$', 'AUD', 0, NULL, NULL),
(15, 'AT', 'Austria', '43', '€', 'EUR', 0, NULL, NULL),
(16, 'AZ', 'Azerbaijan', '994', 'm', 'AZN', 0, NULL, NULL),
(17, 'BS', 'Bahamas', '1242', 'B$', 'BSD', 0, NULL, NULL),
(18, 'BH', 'Bahrain', '973', '.د.ب', 'BHD', 0, NULL, NULL),
(19, 'BD', 'Bangladesh', '880', '৳', 'BDT', 0, NULL, NULL),
(20, 'BB', 'Barbados', '1246', 'Bds$', 'BBD', 0, NULL, NULL),
(21, 'BY', 'Belarus', '375', 'Br', 'BYN', 0, NULL, NULL),
(22, 'BE', 'Belgium', '32', '€', 'EUR', 0, NULL, NULL),
(23, 'BZ', 'Belize', '501', '$', 'BZD', 0, NULL, NULL),
(24, 'BJ', 'Benin', '229', 'CFA', 'XOF', 0, NULL, NULL),
(25, 'BM', 'Bermuda', '1441', '$', 'BMD', 0, NULL, NULL),
(26, 'BT', 'Bhutan', '975', 'Nu.', 'BTN', 0, NULL, NULL),
(27, 'BO', 'Bolivia', '591', 'Bs.', 'BOB', 0, NULL, NULL),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', '599', '$', 'USD', 0, NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', '387', 'KM', 'BAM', 0, NULL, NULL),
(30, 'BW', 'Botswana', '267', 'P', 'BWP', 0, NULL, NULL),
(31, 'BV', 'Bouvet Island', '55', 'kr', 'NOK', 0, NULL, NULL),
(32, 'BR', 'Brazil', '55', 'R$', 'BRL', 0, NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', '246', '$', 'USD', 0, NULL, NULL),
(34, 'BN', 'Brunei Darussalam', '673', 'B$', 'BND', 0, NULL, NULL),
(35, 'BG', 'Bulgaria', '359', 'Лв.', 'BGN', 0, NULL, NULL),
(36, 'BF', 'Burkina Faso', '226', 'CFA', 'XOF', 0, NULL, NULL),
(37, 'BI', 'Burundi', '257', 'FBu', 'BIF', 0, NULL, NULL),
(38, 'KH', 'Cambodia', '855', 'KHR', 'KHR', 0, NULL, NULL),
(39, 'CM', 'Cameroon', '237', 'FCFA', 'XAF', 0, NULL, NULL),
(40, 'CA', 'Canada', '1', '$', 'CAD', 0, NULL, NULL),
(41, 'CV', 'Cape Verde', '238', '$', 'CVE', 0, NULL, NULL),
(42, 'KY', 'Cayman Islands', '1345', '$', 'KYD', 0, NULL, NULL),
(43, 'CF', 'Central African Republic', '236', 'FCFA', 'XAF', 0, NULL, NULL),
(44, 'TD', 'Chad', '235', 'FCFA', 'XAF', 0, NULL, NULL),
(45, 'CL', 'Chile', '56', '$', 'CLP', 0, NULL, NULL),
(46, 'CN', 'China', '86', '¥', 'CNY', 0, NULL, NULL),
(47, 'CX', 'Christmas Island', '61', '$', 'AUD', 0, NULL, NULL),
(48, 'CC', 'Cocos (Keeling) Islands', '672', '$', 'AUD', 0, NULL, NULL),
(49, 'CO', 'Colombia', '57', '$', 'COP', 0, NULL, NULL),
(50, 'KM', 'Comoros', '269', 'CF', 'KMF', 0, NULL, NULL),
(51, 'CG', 'Congo', '242', 'FC', 'XAF', 0, NULL, NULL),
(52, 'CD', 'Congo, Democratic Republic of the Congo', '242', 'FC', 'CDF', 0, NULL, NULL),
(53, 'CK', 'Cook Islands', '682', '$', 'NZD', 0, NULL, NULL),
(54, 'CR', 'Costa Rica', '506', '₡', 'CRC', 0, NULL, NULL),
(55, 'CI', 'Cote D\'Ivoire', '225', 'CFA', 'XOF', 0, NULL, NULL),
(56, 'HR', 'Croatia', '385', 'kn', 'HRK', 0, NULL, NULL),
(57, 'CU', 'Cuba', '53', '$', 'CUP', 0, NULL, NULL),
(58, 'CW', 'Curacao', '599', 'ƒ', 'ANG', 0, NULL, NULL),
(59, 'CY', 'Cyprus', '357', '€', 'EUR', 0, NULL, NULL),
(60, 'CZ', 'Czech Republic', '420', 'Kč', 'CZK', 0, NULL, NULL),
(61, 'DK', 'Denmark', '45', 'Kr.', 'DKK', 0, NULL, NULL),
(62, 'DJ', 'Djibouti', '253', 'Fdj', 'DJF', 0, NULL, NULL),
(63, 'DM', 'Dominica', '1767', '$', 'XCD', 0, NULL, NULL),
(64, 'DO', 'Dominican Republic', '1809', '$', 'DOP', 0, NULL, NULL),
(65, 'EC', 'Ecuador', '593', '$', 'USD', 0, NULL, NULL),
(66, 'EG', 'Egypt', '20', 'ج.م', 'EGP', 0, NULL, NULL),
(67, 'SV', 'El Salvador', '503', '$', 'USD', 0, NULL, NULL),
(68, 'GQ', 'Equatorial Guinea', '240', 'FCFA', 'XAF', 0, NULL, NULL),
(69, 'ER', 'Eritrea', '291', 'Nfk', 'ERN', 0, NULL, NULL),
(70, 'EE', 'Estonia', '372', '€', 'EUR', 0, NULL, NULL),
(71, 'ET', 'Ethiopia', '251', 'Nkf', 'ETB', 0, NULL, NULL),
(72, 'FK', 'Falkland Islands (Malvinas)', '500', '£', 'FKP', 0, NULL, NULL),
(73, 'FO', 'Faroe Islands', '298', 'Kr.', 'DKK', 0, NULL, NULL),
(74, 'FJ', 'Fiji', '679', 'FJ$', 'FJD', 0, NULL, NULL),
(75, 'FI', 'Finland', '358', '€', 'EUR', 0, NULL, NULL),
(76, 'FR', 'France', '33', '€', 'EUR', 0, NULL, NULL),
(77, 'GF', 'French Guiana', '594', '€', 'EUR', 0, NULL, NULL),
(78, 'PF', 'French Polynesia', '689', '₣', 'XPF', 0, NULL, NULL),
(79, 'TF', 'French Southern Territories', '262', '€', 'EUR', 0, NULL, NULL),
(80, 'GA', 'Gabon', '241', 'FCFA', 'XAF', 0, NULL, NULL),
(81, 'GM', 'Gambia', '220', 'D', 'GMD', 0, NULL, NULL),
(82, 'GE', 'Georgia', '995', 'ლ', 'GEL', 0, NULL, NULL),
(83, 'DE', 'Germany', '49', '€', 'EUR', 0, NULL, NULL),
(84, 'GH', 'Ghana', '233', 'GH₵', 'GHS', 0, NULL, NULL),
(85, 'GI', 'Gibraltar', '350', '£', 'GIP', 0, NULL, NULL),
(86, 'GR', 'Greece', '30', '€', 'EUR', 0, NULL, NULL),
(87, 'GL', 'Greenland', '299', 'Kr.', 'DKK', 0, NULL, NULL),
(88, 'GD', 'Grenada', '1473', '$', 'XCD', 0, NULL, NULL),
(89, 'GP', 'Guadeloupe', '590', '€', 'EUR', 0, NULL, NULL),
(90, 'GU', 'Guam', '1671', '$', 'USD', 0, NULL, NULL),
(91, 'GT', 'Guatemala', '502', 'Q', 'GTQ', 0, NULL, NULL),
(92, 'GG', 'Guernsey', '44', '£', 'GBP', 0, NULL, NULL),
(93, 'GN', 'Guinea', '224', 'FG', 'GNF', 0, NULL, NULL),
(94, 'GW', 'Guinea-Bissau', '245', 'CFA', 'XOF', 0, NULL, NULL),
(95, 'GY', 'Guyana', '592', '$', 'GYD', 0, NULL, NULL),
(96, 'HT', 'Haiti', '509', 'G', 'HTG', 0, NULL, NULL),
(97, 'HM', 'Heard Island and Mcdonald Islands', '0', '$', 'AUD', 0, NULL, NULL),
(98, 'VA', 'Holy See (Vatican City State)', '39', '€', 'EUR', 0, NULL, NULL),
(99, 'HN', 'Honduras', '504', 'L', 'HNL', 0, NULL, NULL),
(100, 'HK', 'Hong Kong', '852', '$', 'HKD', 0, NULL, NULL),
(101, 'HU', 'Hungary', '36', 'Ft', 'HUF', 0, NULL, NULL),
(102, 'IS', 'Iceland', '354', 'kr', 'ISK', 0, NULL, NULL),
(103, 'IN', 'India', '91', '₹', 'INR', 0, NULL, NULL),
(104, 'ID', 'Indonesia', '62', 'Rp', 'IDR', 0, NULL, NULL),
(105, 'IR', 'Iran, Islamic Republic of', '98', '﷼', 'IRR', 0, NULL, NULL),
(106, 'IQ', 'Iraq', '964', 'د.ع', 'IQD', 0, NULL, NULL),
(107, 'IE', 'Ireland', '353', '€', 'EUR', 0, NULL, NULL),
(108, 'IM', 'Isle of Man', '44', '£', 'GBP', 0, NULL, NULL),
(109, 'IL', 'Israel', '972', '₪', 'ILS', 0, NULL, NULL),
(110, 'IT', 'Italy', '39', '€', 'EUR', 0, NULL, NULL),
(111, 'JM', 'Jamaica', '1876', 'J$', 'JMD', 0, NULL, NULL),
(112, 'JP', 'Japan', '81', '¥', 'JPY', 0, NULL, NULL),
(113, 'JE', 'Jersey', '44', '£', 'GBP', 0, NULL, NULL),
(114, 'JO', 'Jordan', '962', 'ا.د', 'JOD', 0, NULL, NULL),
(115, 'KZ', 'Kazakhstan', '7', 'лв', 'KZT', 0, NULL, NULL),
(116, 'KE', 'Kenya', '254', 'KSh', 'KES', 0, NULL, NULL),
(117, 'KI', 'Kiribati', '686', '$', 'AUD', 0, NULL, NULL),
(118, 'KP', 'Korea, Democratic People\'s Republic of', '850', '₩', 'KPW', 0, NULL, NULL),
(119, 'KR', 'Korea, Republic of', '82', '₩', 'KRW', 0, NULL, NULL),
(120, 'XK', 'Kosovo', '383', '€', 'EUR', 0, NULL, NULL),
(121, 'KW', 'Kuwait', '965', 'ك.د', 'KWD', 0, NULL, NULL),
(122, 'KG', 'Kyrgyzstan', '996', 'лв', 'KGS', 0, NULL, NULL),
(123, 'LA', 'Lao People\'s Democratic Republic', '856', '₭', 'LAK', 0, NULL, NULL),
(124, 'LV', 'Latvia', '371', '€', 'EUR', 0, NULL, NULL),
(125, 'LB', 'Lebanon', '961', '£', 'LBP', 0, NULL, NULL),
(126, 'LS', 'Lesotho', '266', 'L', 'LSL', 0, NULL, NULL),
(127, 'LR', 'Liberia', '231', '$', 'LRD', 0, NULL, NULL),
(128, 'LY', 'Libyan Arab Jamahiriya', '218', 'د.ل', 'LYD', 0, NULL, NULL),
(129, 'LI', 'Liechtenstein', '423', 'CHf', 'CHF', 0, NULL, NULL),
(130, 'LT', 'Lithuania', '370', '€', 'EUR', 0, NULL, NULL),
(131, 'LU', 'Luxembourg', '352', '€', 'EUR', 0, NULL, NULL),
(132, 'MO', 'Macao', '853', '$', 'MOP', 0, NULL, NULL),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of', '389', 'ден', 'MKD', 0, NULL, NULL),
(134, 'MG', 'Madagascar', '261', 'Ar', 'MGA', 0, NULL, NULL),
(135, 'MW', 'Malawi', '265', 'MK', 'MWK', 0, NULL, NULL),
(136, 'MY', 'Malaysia', '60', 'RM', 'MYR', 0, NULL, NULL),
(137, 'MV', 'Maldives', '960', 'Rf', 'MVR', 0, NULL, NULL),
(138, 'ML', 'Mali', '223', 'CFA', 'XOF', 0, NULL, NULL),
(139, 'MT', 'Malta', '356', '€', 'EUR', 0, NULL, NULL),
(140, 'MH', 'Marshall Islands', '692', '$', 'USD', 0, NULL, NULL),
(141, 'MQ', 'Martinique', '596', '€', 'EUR', 0, NULL, NULL),
(142, 'MR', 'Mauritania', '222', 'MRU', 'MRO', 0, NULL, NULL),
(143, 'MU', 'Mauritius', '230', '₨', 'MUR', 0, NULL, NULL),
(144, 'YT', 'Mayotte', '262', '€', 'EUR', 0, NULL, NULL),
(145, 'MX', 'Mexico', '52', '$', 'MXN', 0, NULL, NULL),
(146, 'FM', 'Micronesia, Federated States of', '691', '$', 'USD', 0, NULL, NULL),
(147, 'MD', 'Moldova, Republic of', '373', 'L', 'MDL', 0, NULL, NULL),
(148, 'MC', 'Monaco', '377', '€', 'EUR', 0, NULL, NULL),
(149, 'MN', 'Mongolia', '976', '₮', 'MNT', 0, NULL, NULL),
(150, 'ME', 'Montenegro', '382', '€', 'EUR', 0, NULL, NULL),
(151, 'MS', 'Montserrat', '1664', '$', 'XCD', 0, NULL, NULL),
(152, 'MA', 'Morocco', '212', 'DH', 'MAD', 0, NULL, NULL),
(153, 'MZ', 'Mozambique', '258', 'MT', 'MZN', 0, NULL, NULL),
(154, 'MM', 'Myanmar', '95', 'K', 'MMK', 0, NULL, NULL),
(155, 'NA', 'Namibia', '264', '$', 'NAD', 0, NULL, NULL),
(156, 'NR', 'Nauru', '674', '$', 'AUD', 0, NULL, NULL),
(157, 'NP', 'Nepal', '977', '₨', 'NPR', 0, NULL, NULL),
(158, 'NL', 'Netherlands', '31', '€', 'EUR', 0, NULL, NULL),
(159, 'AN', 'Netherlands Antilles', '599', 'NAf', 'ANG', 0, NULL, NULL),
(160, 'NC', 'New Caledonia', '687', '₣', 'XPF', 0, NULL, NULL),
(161, 'NZ', 'New Zealand', '64', '$', 'NZD', 0, NULL, NULL),
(162, 'NI', 'Nicaragua', '505', 'C$', 'NIO', 0, NULL, NULL),
(163, 'NE', 'Niger', '227', 'CFA', 'XOF', 0, NULL, NULL),
(164, 'NG', 'Nigeria', '234', '₦', 'NGN', 0, NULL, NULL),
(165, 'NU', 'Niue', '683', '$', 'NZD', 0, NULL, NULL),
(166, 'NF', 'Norfolk Island', '672', '$', 'AUD', 0, NULL, NULL),
(167, 'MP', 'Northern Mariana Islands', '1670', '$', 'USD', 0, NULL, NULL),
(168, 'NO', 'Norway', '47', 'kr', 'NOK', 0, NULL, NULL),
(169, 'OM', 'Oman', '968', '.ع.ر', 'OMR', 0, NULL, NULL),
(170, 'PK', 'Pakistan', '92', '₨', 'PKR', 0, NULL, NULL),
(171, 'PW', 'Palau', '680', '$', 'USD', 0, NULL, NULL),
(172, 'PS', 'Palestinian Territory, Occupied', '970', '₪', 'ILS', 0, NULL, NULL),
(173, 'PA', 'Panama', '507', 'B/.', 'PAB', 0, NULL, NULL),
(174, 'PG', 'Papua New Guinea', '675', 'K', 'PGK', 0, NULL, NULL),
(175, 'PY', 'Paraguay', '595', '₲', 'PYG', 0, NULL, NULL),
(176, 'PE', 'Peru', '51', 'S/.', 'PEN', 0, NULL, NULL),
(177, 'PH', 'Philippines', '63', '₱', 'PHP', 0, NULL, NULL),
(178, 'PN', 'Pitcairn', '64', '$', 'NZD', 0, NULL, NULL),
(179, 'PL', 'Poland', '48', 'zł', 'PLN', 0, NULL, NULL),
(180, 'PT', 'Portugal', '351', '€', 'EUR', 0, NULL, NULL),
(181, 'PR', 'Puerto Rico', '1787', '$', 'USD', 0, NULL, NULL),
(182, 'QA', 'Qatar', '974', 'ق.ر', 'QAR', 0, NULL, NULL),
(183, 'RE', 'Reunion', '262', '€', 'EUR', 0, NULL, NULL),
(184, 'RO', 'Romania', '40', 'lei', 'RON', 0, NULL, NULL),
(185, 'RU', 'Russian Federation', '7', '₽', 'RUB', 0, NULL, NULL),
(186, 'RW', 'Rwanda', '250', 'FRw', 'RWF', 0, NULL, NULL),
(187, 'BL', 'Saint Barthelemy', '590', '€', 'EUR', 0, NULL, NULL),
(188, 'SH', 'Saint Helena', '290', '£', 'SHP', 0, NULL, NULL),
(189, 'KN', 'Saint Kitts and Nevis', '1869', '$', 'XCD', 0, NULL, NULL),
(190, 'LC', 'Saint Lucia', '1758', '$', 'XCD', 0, NULL, NULL),
(191, 'MF', 'Saint Martin', '590', '€', 'EUR', 0, NULL, NULL),
(192, 'PM', 'Saint Pierre and Miquelon', '508', '€', 'EUR', 0, NULL, NULL),
(193, 'VC', 'Saint Vincent and the Grenadines', '1784', '$', 'XCD', 0, NULL, NULL),
(194, 'WS', 'Samoa', '684', 'SAT', 'WST', 0, NULL, NULL),
(195, 'SM', 'San Marino', '378', '€', 'EUR', 0, NULL, NULL),
(196, 'ST', 'Sao Tome and Principe', '239', 'Db', 'STD', 0, NULL, NULL),
(197, 'SA', 'Saudi Arabia', '966', '﷼', 'SAR', 0, NULL, NULL),
(198, 'SN', 'Senegal', '221', 'CFA', 'XOF', 0, NULL, NULL),
(199, 'RS', 'Serbia', '381', 'din', 'RSD', 0, NULL, NULL),
(200, 'CS', 'Serbia and Montenegro', '381', 'din', 'RSD', 0, NULL, NULL),
(201, 'SC', 'Seychelles', '248', 'SRe', 'SCR', 0, NULL, NULL),
(202, 'SL', 'Sierra Leone', '232', 'Le', 'SLL', 0, NULL, NULL),
(203, 'SG', 'Singapore', '65', '$', 'SGD', 0, NULL, NULL),
(204, 'SX', 'Sint Maarten', '721', 'ƒ', 'ANG', 0, NULL, NULL),
(205, 'SK', 'Slovakia', '421', '€', 'EUR', 0, NULL, NULL),
(206, 'SI', 'Slovenia', '386', '€', 'EUR', 0, NULL, NULL),
(207, 'SB', 'Solomon Islands', '677', 'Si$', 'SBD', 0, NULL, NULL),
(208, 'SO', 'Somalia', '252', 'Sh.so.', 'SOS', 0, NULL, NULL),
(209, 'ZA', 'South Africa', '27', 'R', 'ZAR', 0, NULL, NULL),
(210, 'GS', 'South Georgia and the South Sandwich Islands', '500', '£', 'GBP', 0, NULL, NULL),
(211, 'SS', 'South Sudan', '211', '£', 'SSP', 0, NULL, NULL),
(212, 'ES', 'Spain', '34', '€', 'EUR', 0, NULL, NULL),
(213, 'LK', 'Sri Lanka', '94', 'Rs', 'LKR', 0, NULL, NULL),
(214, 'SD', 'Sudan', '249', '.س.ج', 'SDG', 0, NULL, NULL),
(215, 'SR', 'Suriname', '597', '$', 'SRD', 0, NULL, NULL),
(216, 'SJ', 'Svalbard and Jan Mayen', '47', 'kr', 'NOK', 0, NULL, NULL),
(217, 'SZ', 'Swaziland', '268', 'E', 'SZL', 0, NULL, NULL),
(218, 'SE', 'Sweden', '46', 'kr', 'SEK', 0, NULL, NULL),
(219, 'CH', 'Switzerland', '41', 'CHf', 'CHF', 0, NULL, NULL),
(220, 'SY', 'Syrian Arab Republic', '963', 'LS', 'SYP', 0, NULL, NULL),
(221, 'TW', 'Taiwan, Province of China', '886', '$', 'TWD', 0, NULL, NULL),
(222, 'TJ', 'Tajikistan', '992', 'SM', 'TJS', 0, NULL, NULL),
(223, 'TZ', 'Tanzania, United Republic of', '255', 'TSh', 'TZS', 0, NULL, NULL),
(224, 'TH', 'Thailand', '66', '฿', 'THB', 0, NULL, NULL),
(225, 'TL', 'Timor-Leste', '670', '$', 'USD', 0, NULL, NULL),
(226, 'TG', 'Togo', '228', 'CFA', 'XOF', 0, NULL, NULL),
(227, 'TK', 'Tokelau', '690', '$', 'NZD', 0, NULL, NULL),
(228, 'TO', 'Tonga', '676', '$', 'TOP', 0, NULL, NULL),
(229, 'TT', 'Trinidad and Tobago', '1868', '$', 'TTD', 0, NULL, NULL),
(230, 'TN', 'Tunisia', '216', 'ت.د', 'TND', 0, NULL, NULL),
(231, 'TR', 'Turkey', '90', '₺', 'TRY', 0, NULL, NULL),
(232, 'TM', 'Turkmenistan', '7370', 'T', 'TMT', 0, NULL, NULL),
(233, 'TC', 'Turks and Caicos Islands', '1649', '$', 'USD', 0, NULL, NULL),
(234, 'TV', 'Tuvalu', '688', '$', 'AUD', 0, NULL, NULL),
(235, 'UG', 'Uganda', '256', 'USh', 'UGX', 0, NULL, NULL),
(236, 'UA', 'Ukraine', '380', '₴', 'UAH', 0, NULL, NULL),
(237, 'AE', 'United Arab Emirates', '971', 'إ.د', 'AED', 0, NULL, NULL),
(238, 'GB', 'United Kingdom', '44', '£', 'GBP', 0, NULL, NULL),
(239, 'US', 'United States', '1', '$', 'USD', 0, NULL, NULL),
(240, 'UM', 'United States Minor Outlying Islands', '1', '$', 'USD', 0, NULL, NULL),
(241, 'UY', 'Uruguay', '598', '$', 'UYU', 0, NULL, NULL),
(242, 'UZ', 'Uzbekistan', '998', 'лв', 'UZS', 0, NULL, NULL),
(243, 'VU', 'Vanuatu', '678', 'VT', 'VUV', 0, NULL, NULL),
(244, 'VE', 'Venezuela', '58', 'Bs', 'VEF', 0, NULL, NULL),
(245, 'VN', 'Viet Nam', '84', '₫', 'VND', 0, NULL, NULL),
(246, 'VG', 'Virgin Islands, British', '1284', '$', 'USD', 0, NULL, NULL),
(247, 'VI', 'Virgin Islands, U.s.', '1340', '$', 'USD', 0, NULL, NULL),
(248, 'WF', 'Wallis and Futuna', '681', '₣', 'XPF', 0, NULL, NULL),
(249, 'EH', 'Western Sahara', '212', 'MAD', 'MAD', 0, NULL, NULL),
(250, 'YE', 'Yemen', '967', '﷼', 'YER', 0, NULL, NULL),
(251, 'ZM', 'Zambia', '260', 'ZK', 'ZMW', 0, NULL, NULL),
(252, 'ZW', 'Zimbabwe', '263', '$', 'ZWL', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', 0, NULL, NULL),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', 0, NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', 0, NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd', 0, NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', 0, NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', 0, NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', 0, NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', 0, NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd', 0, NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', 0, NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', 0, NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', 0, NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', 0, NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', 0, NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd', 0, NULL, NULL),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', 0, NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd', 0, NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', 0, NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd', 0, NULL, NULL),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', 0, NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', '22.7180905', '89.0687033', 'www.satkhira.gov.bd', 0, NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', 0, NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', 0, NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', 0, NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', 0, NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', 0, NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', 0, NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', 0, NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', 0, NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '22.6422689', '90.2003932', 'www.jhalakathi.gov.bd', 0, NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', 0, NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', '22.5781398', '89.9983909', 'www.pirojpur.gov.bd', 0, NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', '22.7004179', '90.3731568', 'www.barisal.gov.bd', 0, NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', 0, NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', '22.159182', '90.125581', 'www.barguna.gov.bd', 0, NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', 0, NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', 0, NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', 0, NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', 0, NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', 0, NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', 0, NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', '23.2060195', '90.3477725', 'www.shariatpur.gov.bd', 0, NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', 0, NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.264145', '89.918029', 'www.tangail.gov.bd', 0, NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', 0, NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', '23.8602262', '90.0018293', 'www.manikganj.gov.bd', 0, NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', 0, NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', '23.5435742', '90.5354327', 'www.munshiganj.gov.bd', 0, NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', 0, NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', 0, NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', 0, NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', 0, NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', 0, NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', 0, NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', '25.9165451', '89.4532409', 'www.lalmonirhat.gov.bd', 0, NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', 0, NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', 0, NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', 0, NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', 0, NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', 0, NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', 0, NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd', 0, NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', 0, NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', 0, NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', 0, NULL, NULL),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', 0, NULL, NULL),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', 0, NULL, NULL),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', 0, NULL, NULL),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', 0, NULL, NULL),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', 0, NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_sizes`
--

CREATE TABLE `employee_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_range` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_types`
--

CREATE TABLE `employment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', 0, NULL, NULL),
(2, 'Airlines / Aviation', 0, NULL, NULL),
(3, 'Alternative Dispute Resolution', 0, NULL, NULL),
(4, 'Alternative Medicine', 0, NULL, NULL),
(5, 'Animation', 0, NULL, NULL),
(6, 'Apparel / Fashion', 0, NULL, NULL),
(7, 'Architecture / Planning', 0, NULL, NULL),
(8, 'Arts / Crafts', 0, NULL, NULL),
(9, 'Automotive', 0, NULL, NULL),
(10, 'Aviation / Aerospace', 0, NULL, NULL),
(11, 'Banking / Mortgage', 0, NULL, NULL),
(12, 'Biotechnology / Greentech', 0, NULL, NULL),
(13, 'Broadcast Media', 0, NULL, NULL),
(14, 'Building Materials', 0, NULL, NULL),
(15, 'Business Supplies / Equipment', 0, NULL, NULL),
(16, 'Capital Markets / Hedge Fund / Private Equity', 0, NULL, NULL),
(17, 'Chemicals', 0, NULL, NULL),
(18, 'Civic / Social Organization', 0, NULL, NULL),
(19, 'Civil Engineering', 0, NULL, NULL),
(20, 'Commercial Real Estate', 0, NULL, NULL),
(21, 'Computer Games', 0, NULL, NULL),
(22, 'Computer Hardware', 0, NULL, NULL),
(23, 'Computer Networking', 0, NULL, NULL),
(24, 'Computer Software / Engineering', 0, NULL, NULL),
(25, 'Computer / Network Security', 0, NULL, NULL),
(26, 'Construction', 0, NULL, NULL),
(27, 'Consumer Electronics', 0, NULL, NULL),
(28, 'Consumer Goods', 0, NULL, NULL),
(29, 'Consumer Services', 0, NULL, NULL),
(30, 'Cosmetics', 0, NULL, NULL),
(31, 'Dairy', 0, NULL, NULL),
(32, 'Defense / Space', 0, NULL, NULL),
(33, 'Design', 0, NULL, NULL),
(34, 'E-Learning', 0, NULL, NULL),
(35, 'Education Management', 0, NULL, NULL),
(36, 'Electrical / Electronic Manufacturing', 0, NULL, NULL),
(37, 'Entertainment / Movie Production', 0, NULL, NULL),
(38, 'Environmental Services', 0, NULL, NULL),
(39, 'Events Services', 0, NULL, NULL),
(40, 'Executive Office', 0, NULL, NULL),
(41, 'Facilities Services', 0, NULL, NULL),
(42, 'Farming', 0, NULL, NULL),
(43, 'Financial Services', 0, NULL, NULL),
(44, 'Fine Art', 0, NULL, NULL),
(45, 'Fishery', 0, NULL, NULL),
(46, 'Food Production', 0, NULL, NULL),
(47, 'Food / Beverages', 0, NULL, NULL),
(48, 'Fundraising', 0, NULL, NULL),
(49, 'Furniture', 0, NULL, NULL),
(50, 'Gambling / Casinos', 0, NULL, NULL),
(51, 'Glass / Ceramics / Concrete', 0, NULL, NULL),
(52, 'Government Administration', 0, NULL, NULL),
(53, 'Government Relations', 0, NULL, NULL),
(54, 'Graphic Design / Web Design', 0, NULL, NULL),
(55, 'Health / Fitness', 0, NULL, NULL),
(56, 'Higher Education / Acadamia', 0, NULL, NULL),
(57, 'Hospital / Health Care', 0, NULL, NULL),
(58, 'Hospitality', 0, NULL, NULL),
(59, 'Human Resources / HR', 0, NULL, NULL),
(60, 'Import / Export', 0, NULL, NULL),
(61, 'Individual / Family Services', 0, NULL, NULL),
(62, 'Industrial Automation', 0, NULL, NULL),
(63, 'Information Services', 0, NULL, NULL),
(64, 'Information Technology / IT', 0, NULL, NULL),
(65, 'Insurance', 0, NULL, NULL),
(66, 'International Affairs', 0, NULL, NULL),
(67, 'International Trade / Development', 0, NULL, NULL),
(68, 'Internet', 0, NULL, NULL),
(69, 'Investment Banking / Venture', 0, NULL, NULL),
(70, 'Investment Management / Hedge Fund / Private Equity', 0, NULL, NULL),
(71, 'Judiciary', 0, NULL, NULL),
(72, 'Law Enforcement', 0, NULL, NULL),
(73, 'Law Practice / Law Firms', 0, NULL, NULL),
(74, 'Legal Services', 0, NULL, NULL),
(75, 'Legislative Office', 0, NULL, NULL),
(76, 'Leisure / Travel', 0, NULL, NULL),
(77, 'Library', 0, NULL, NULL),
(78, 'Logistics / Procurement', 0, NULL, NULL),
(79, 'Luxury Goods / Jewelry', 0, NULL, NULL),
(80, 'Machinery', 0, NULL, NULL),
(81, 'Management Consulting', 0, NULL, NULL),
(82, 'Maritime', 0, NULL, NULL),
(83, 'Market Research', 0, NULL, NULL),
(84, 'Marketing / Advertising / Sales', 0, NULL, NULL),
(85, 'Mechanical or Industrial Engineering', 0, NULL, NULL),
(86, 'Media Production', 0, NULL, NULL),
(87, 'Medical Equipment', 0, NULL, NULL),
(88, 'Medical Practice', 0, NULL, NULL),
(89, 'Mental Health Care', 0, NULL, NULL),
(90, 'Military Industry', 0, NULL, NULL),
(91, 'Mining / Metals', 0, NULL, NULL),
(92, 'Motion Pictures / Film', 0, NULL, NULL),
(93, 'Museums / Institutions', 0, NULL, NULL),
(94, 'Music', 0, NULL, NULL),
(95, 'Nanotechnology', 0, NULL, NULL),
(96, 'Newspapers / Journalism', 0, NULL, NULL),
(97, 'Non-Profit / Volunteering', 0, NULL, NULL),
(98, 'Oil / Energy / Solar / Greentech', 0, NULL, NULL),
(99, 'Online Publishing', 0, NULL, NULL),
(100, 'Other Industry', 0, NULL, NULL),
(101, 'Outsourcing / Offshoring', 0, NULL, NULL),
(102, 'Package / Freight Delivery', 0, NULL, NULL),
(103, 'Packaging / Containers', 0, NULL, NULL),
(104, 'Paper / Forest Products', 0, NULL, NULL),
(105, 'Performing Arts', 0, NULL, NULL),
(106, 'Pharmaceuticals', 0, NULL, NULL),
(107, 'Philanthropy', 0, NULL, NULL),
(108, 'Photography', 0, NULL, NULL),
(109, 'Plastics', 0, NULL, NULL),
(110, 'Political Organization', 0, NULL, NULL),
(111, 'Primary / Secondary Education', 0, NULL, NULL),
(112, 'Printing', 0, NULL, NULL),
(113, 'Professional Training', 0, NULL, NULL),
(114, 'Program Development', 0, NULL, NULL),
(115, 'Public Relations / PR', 0, NULL, NULL),
(116, 'Public Safety', 0, NULL, NULL),
(117, 'Publishing Industry', 0, NULL, NULL),
(118, 'Railroad Manufacture', 0, NULL, NULL),
(119, 'Ranching', 0, NULL, NULL),
(120, 'Real Estate / Mortgage', 0, NULL, NULL),
(121, 'Recreational Facilities / Services', 0, NULL, NULL),
(122, 'Religious Institutions', 0, NULL, NULL),
(123, 'Renewables / Environment', 0, NULL, NULL),
(124, 'Research Industry', 0, NULL, NULL),
(125, 'Restaurants', 0, NULL, NULL),
(126, 'Retail Industry', 0, NULL, NULL),
(127, 'Security / Investigations', 0, NULL, NULL),
(128, 'Semiconductors', 0, NULL, NULL),
(129, 'Shipbuilding', 0, NULL, NULL),
(130, 'Sporting Goods', 0, NULL, NULL),
(131, 'Sports', 0, NULL, NULL),
(132, 'Staffing / Recruiting', 0, NULL, NULL),
(133, 'Supermarkets', 0, NULL, NULL),
(134, 'Telecommunications', 0, NULL, NULL),
(135, 'Textiles', 0, NULL, NULL),
(136, 'Think Tanks', 0, NULL, NULL),
(137, 'Tobacco', 0, NULL, NULL),
(138, 'Translation / Localization', 0, NULL, NULL),
(139, 'Transportation', 0, NULL, NULL),
(140, 'Utilities', 0, NULL, NULL),
(141, 'Venture Capital / VC', 0, NULL, NULL),
(142, 'Veterinary', 0, NULL, NULL),
(143, 'Warehousing', 0, NULL, NULL),
(144, 'Wholesale', 0, NULL, NULL),
(145, 'Wine / Spirits', 0, NULL, NULL),
(146, 'Wireless', 0, NULL, NULL),
(147, 'Writing / Editing', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_06_02_032259_add_google_id_to_users_table', 1),
(11, '2023_06_02_034756_add_facebook_id_to_users_table', 1),
(12, '2024_03_06_045739_create_industries_table', 2),
(13, '2024_03_06_045835_create_statuses_table', 2),
(14, '2024_03_06_052835_create_countries_table', 2),
(15, '2024_03_06_052839_create_divisions_table', 2),
(16, '2024_03_06_052911_create_districts_table', 2),
(17, '2024_03_06_053020_create_upazilas_table', 2),
(45, '2024_03_06_053025_create_working_hours_table', 3),
(46, '2024_03_06_053030_create_employee_sizes_table', 3),
(47, '2024_03_06_061547_create_employment_types_table', 3),
(48, '2024_03_06_061950_create_companies_table', 3),
(49, '2024_03_06_061954_create_company_employment_types_table', 3),
(50, '2024_03_06_062447_create_company_associated_industries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `type`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Enabled', NULL, NULL),
(2, 1, 'Disabled', NULL, NULL),
(3, 2, 'Pending', NULL, NULL),
(4, 3, 'Paid', NULL, NULL),
(5, 4, 'Unpaid', NULL, NULL),
(6, 5, 'Hot', NULL, NULL),
(7, 6, 'Bad', NULL, NULL),
(8, 7, 'Preferred', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', 0, NULL, NULL),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', 0, NULL, NULL),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', 0, NULL, NULL),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', 0, NULL, NULL),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', 0, NULL, NULL),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', 0, NULL, NULL),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', 0, NULL, NULL),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', 0, NULL, NULL),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', 0, NULL, NULL),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', 0, NULL, NULL),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', 0, NULL, NULL),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', 0, NULL, NULL),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', 0, NULL, NULL),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', 0, NULL, NULL),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', 0, NULL, NULL),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', 0, NULL, NULL),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', 0, NULL, NULL),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', 0, NULL, NULL),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', 0, NULL, NULL),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', 0, NULL, NULL),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', 0, NULL, NULL),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', 0, NULL, NULL),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', 0, NULL, NULL),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', 0, NULL, NULL),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', 0, NULL, NULL),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', 0, NULL, NULL),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', 0, NULL, NULL),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', 0, NULL, NULL),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', 0, NULL, NULL),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', 0, NULL, NULL),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', 0, NULL, NULL),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', 0, NULL, NULL),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', 0, NULL, NULL),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', 0, NULL, NULL),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', 0, NULL, NULL),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', 0, NULL, NULL),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', 0, NULL, NULL),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', 0, NULL, NULL),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', 0, NULL, NULL),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', 0, NULL, NULL),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', 0, NULL, NULL),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', 0, NULL, NULL),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', 0, NULL, NULL),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', 0, NULL, NULL),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', 0, NULL, NULL),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', 0, NULL, NULL),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', 0, NULL, NULL),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', 0, NULL, NULL),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', 0, NULL, NULL),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', 0, NULL, NULL),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', 0, NULL, NULL),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', 0, NULL, NULL),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', 0, NULL, NULL),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', 0, NULL, NULL),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', 0, NULL, NULL),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', 0, NULL, NULL),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', 0, NULL, NULL),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', 0, NULL, NULL),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', 0, NULL, NULL),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', 0, NULL, NULL),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', 0, NULL, NULL),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', 0, NULL, NULL),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', 0, NULL, NULL),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', 0, NULL, NULL),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', 0, NULL, NULL),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', 0, NULL, NULL),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', 0, NULL, NULL),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', 0, NULL, NULL),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', 0, NULL, NULL),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', 0, NULL, NULL),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', 0, NULL, NULL),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', 0, NULL, NULL),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', 0, NULL, NULL),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', 0, NULL, NULL),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', 0, NULL, NULL),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', 0, NULL, NULL),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', 0, NULL, NULL),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', 0, NULL, NULL),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', 0, NULL, NULL),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', 0, NULL, NULL),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', 0, NULL, NULL),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', 0, NULL, NULL),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', 0, NULL, NULL),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', 0, NULL, NULL),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', 0, NULL, NULL),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', 0, NULL, NULL),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', 0, NULL, NULL),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', 0, NULL, NULL),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', 0, NULL, NULL),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', 0, NULL, NULL),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', 0, NULL, NULL),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', 0, NULL, NULL),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', 0, NULL, NULL),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', 0, NULL, NULL),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', 0, NULL, NULL),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', 0, NULL, NULL),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', 0, NULL, NULL),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', 0, NULL, NULL),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', 0, NULL, NULL),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', 0, NULL, NULL),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', 0, NULL, NULL),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', 0, NULL, NULL),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', 0, NULL, NULL),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', 0, NULL, NULL),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', 0, NULL, NULL),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', 0, NULL, NULL),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', 0, NULL, NULL),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', 0, NULL, NULL),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', 0, NULL, NULL),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', 0, NULL, NULL),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', 0, NULL, NULL),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', 0, NULL, NULL),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', 0, NULL, NULL),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', 0, NULL, NULL),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', 0, NULL, NULL),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', 0, NULL, NULL),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', 0, NULL, NULL),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', 0, NULL, NULL),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', 0, NULL, NULL),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', 0, NULL, NULL),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', 0, NULL, NULL),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', 0, NULL, NULL),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', 0, NULL, NULL),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', 0, NULL, NULL),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', 0, NULL, NULL),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', 0, NULL, NULL),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', 0, NULL, NULL),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', 0, NULL, NULL),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', 0, NULL, NULL),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', 0, NULL, NULL),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', 0, NULL, NULL),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', 0, NULL, NULL),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', 0, NULL, NULL),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', 0, NULL, NULL),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', 0, NULL, NULL),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', 0, NULL, NULL),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', 0, NULL, NULL),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', 0, NULL, NULL),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', 0, NULL, NULL),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', 0, NULL, NULL),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', 0, NULL, NULL),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', 0, NULL, NULL),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', 0, NULL, NULL),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', 0, NULL, NULL),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', 0, NULL, NULL),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', 0, NULL, NULL),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', 0, NULL, NULL),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', 0, NULL, NULL),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', 0, NULL, NULL),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', 0, NULL, NULL),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', 0, NULL, NULL),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', 0, NULL, NULL),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', 0, NULL, NULL),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', 0, NULL, NULL),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', 0, NULL, NULL),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', 0, NULL, NULL),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', 0, NULL, NULL),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', 0, NULL, NULL),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', 0, NULL, NULL),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', 0, NULL, NULL),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', 0, NULL, NULL),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', 0, NULL, NULL),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', 0, NULL, NULL),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', 0, NULL, NULL),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', 0, NULL, NULL),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', 0, NULL, NULL),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', 0, NULL, NULL),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', 0, NULL, NULL),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', 0, NULL, NULL),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', 0, NULL, NULL),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', 0, NULL, NULL),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', 0, NULL, NULL),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', 0, NULL, NULL),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', 0, NULL, NULL),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', 0, NULL, NULL),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', 0, NULL, NULL),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', 0, NULL, NULL),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', 0, NULL, NULL),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', 0, NULL, NULL),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', 0, NULL, NULL),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', 0, NULL, NULL),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', 0, NULL, NULL),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', 0, NULL, NULL),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', 0, NULL, NULL),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', 0, NULL, NULL),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', 0, NULL, NULL),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', 0, NULL, NULL),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', 0, NULL, NULL),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', 0, NULL, NULL),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', 0, NULL, NULL),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', 0, NULL, NULL),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', 0, NULL, NULL),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', 0, NULL, NULL),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', 0, NULL, NULL),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', 0, NULL, NULL),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', 0, NULL, NULL),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', 0, NULL, NULL),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', 0, NULL, NULL),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', 0, NULL, NULL),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', 0, NULL, NULL),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', 0, NULL, NULL),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', 0, NULL, NULL),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', 0, NULL, NULL),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', 0, NULL, NULL),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', 0, NULL, NULL),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', 0, NULL, NULL),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', 0, NULL, NULL),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', 0, NULL, NULL),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', 0, NULL, NULL),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', 0, NULL, NULL),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', 0, NULL, NULL),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', 0, NULL, NULL),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', 0, NULL, NULL),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', 0, NULL, NULL),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', 0, NULL, NULL),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', 0, NULL, NULL),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', 0, NULL, NULL),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', 0, NULL, NULL),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', 0, NULL, NULL),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', 0, NULL, NULL),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', 0, NULL, NULL),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', 0, NULL, NULL),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', 0, NULL, NULL),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', 0, NULL, NULL),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', 0, NULL, NULL),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', 0, NULL, NULL),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', 0, NULL, NULL),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', 0, NULL, NULL),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', 0, NULL, NULL),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', 0, NULL, NULL),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', 0, NULL, NULL),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', 0, NULL, NULL),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', 0, NULL, NULL),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', 0, NULL, NULL),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', 0, NULL, NULL),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', 0, NULL, NULL),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', 0, NULL, NULL),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', 0, NULL, NULL),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', 0, NULL, NULL),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', 0, NULL, NULL),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', 0, NULL, NULL),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', 0, NULL, NULL),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', 0, NULL, NULL),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', 0, NULL, NULL),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', 0, NULL, NULL),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', 0, NULL, NULL),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', 0, NULL, NULL),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', 0, NULL, NULL),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', 0, NULL, NULL),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', 0, NULL, NULL),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', 0, NULL, NULL),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', 0, NULL, NULL),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', 0, NULL, NULL),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', 0, NULL, NULL),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', 0, NULL, NULL),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', 0, NULL, NULL),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', 0, NULL, NULL),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', 0, NULL, NULL),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', 0, NULL, NULL),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', 0, NULL, NULL),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', 0, NULL, NULL),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', 0, NULL, NULL),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', 0, NULL, NULL),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', 0, NULL, NULL),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', 0, NULL, NULL),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', 0, NULL, NULL),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', 0, NULL, NULL),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', 0, NULL, NULL),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', 0, NULL, NULL),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', 0, NULL, NULL),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', 0, NULL, NULL),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', 0, NULL, NULL),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', 0, NULL, NULL),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', 0, NULL, NULL),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', 0, NULL, NULL),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', 0, NULL, NULL),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', 0, NULL, NULL),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', 0, NULL, NULL),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', 0, NULL, NULL),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', 0, NULL, NULL),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', 0, NULL, NULL),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', 0, NULL, NULL),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', 0, NULL, NULL),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', 0, NULL, NULL),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', 0, NULL, NULL),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', 0, NULL, NULL),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', 0, NULL, NULL),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', 0, NULL, NULL),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', 0, NULL, NULL),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', 0, NULL, NULL),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', 0, NULL, NULL),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', 0, NULL, NULL),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', 0, NULL, NULL),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', 0, NULL, NULL),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', 0, NULL, NULL),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', 0, NULL, NULL),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', 0, NULL, NULL),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', 0, NULL, NULL),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', 0, NULL, NULL),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', 0, NULL, NULL),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', 0, NULL, NULL),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', 0, NULL, NULL),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', 0, NULL, NULL),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', 0, NULL, NULL),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', 0, NULL, NULL),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', 0, NULL, NULL),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', 0, NULL, NULL),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', 0, NULL, NULL),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', 0, NULL, NULL),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', 0, NULL, NULL),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', 0, NULL, NULL),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', 0, NULL, NULL),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', 0, NULL, NULL),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', 0, NULL, NULL),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', 0, NULL, NULL),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', 0, NULL, NULL),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', 0, NULL, NULL),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', 0, NULL, NULL),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', 0, NULL, NULL),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', 0, NULL, NULL),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', 0, NULL, NULL),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', 0, NULL, NULL),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', 0, NULL, NULL),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', 0, NULL, NULL),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', 0, NULL, NULL),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', 0, NULL, NULL),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', 0, NULL, NULL),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', 0, NULL, NULL),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', 0, NULL, NULL),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', 0, NULL, NULL),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', 0, NULL, NULL),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', 0, NULL, NULL),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', 0, NULL, NULL),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', 0, NULL, NULL),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', 0, NULL, NULL),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', 0, NULL, NULL),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', 0, NULL, NULL),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', 0, NULL, NULL),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', 0, NULL, NULL),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', 0, NULL, NULL),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', 0, NULL, NULL),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', 0, NULL, NULL),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', 0, NULL, NULL),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', 0, NULL, NULL),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', 0, NULL, NULL),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', 0, NULL, NULL),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', 0, NULL, NULL),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', 0, NULL, NULL),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', 0, NULL, NULL),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', 0, NULL, NULL),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', 0, NULL, NULL),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', 0, NULL, NULL),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', 0, NULL, NULL),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', 0, NULL, NULL),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', 0, NULL, NULL),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', 0, NULL, NULL),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', 0, NULL, NULL),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', 0, NULL, NULL),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', 0, NULL, NULL),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', 0, NULL, NULL),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', 0, NULL, NULL),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', 0, NULL, NULL),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', 0, NULL, NULL),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', 0, NULL, NULL),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', 0, NULL, NULL),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', 0, NULL, NULL),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', 0, NULL, NULL),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', 0, NULL, NULL),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', 0, NULL, NULL),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', 0, NULL, NULL),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', 0, NULL, NULL),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', 0, NULL, NULL),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', 0, NULL, NULL),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', 0, NULL, NULL),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', 0, NULL, NULL),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', 0, NULL, NULL),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', 0, NULL, NULL),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', 0, NULL, NULL),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', 0, NULL, NULL),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', 0, NULL, NULL),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', 0, NULL, NULL),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', 0, NULL, NULL),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', 0, NULL, NULL),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', 0, NULL, NULL),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', 0, NULL, NULL),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', 0, NULL, NULL),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', 0, NULL, NULL),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', 0, NULL, NULL),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', 0, NULL, NULL),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', 0, NULL, NULL),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', 0, NULL, NULL),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', 0, NULL, NULL),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', 0, NULL, NULL),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', 0, NULL, NULL),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', 0, NULL, NULL),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', 0, NULL, NULL),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', 0, NULL, NULL),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', 0, NULL, NULL),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', 0, NULL, NULL),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', 0, NULL, NULL),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', 0, NULL, NULL),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', 0, NULL, NULL),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', 0, NULL, NULL),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', 0, NULL, NULL),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', 0, NULL, NULL),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', 0, NULL, NULL),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', 0, NULL, NULL),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', 0, NULL, NULL),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', 0, NULL, NULL),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', 0, NULL, NULL),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', 0, NULL, NULL),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', 0, NULL, NULL),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', 0, NULL, NULL),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', 0, NULL, NULL),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', 0, NULL, NULL),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', 0, NULL, NULL),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', 0, NULL, NULL),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', 0, NULL, NULL),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', 0, NULL, NULL),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', 0, NULL, NULL),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', 0, NULL, NULL),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', 0, NULL, NULL),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', 0, NULL, NULL),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', 0, NULL, NULL),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', 0, NULL, NULL),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', 0, NULL, NULL),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', 0, NULL, NULL),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', 0, NULL, NULL),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', 0, NULL, NULL),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', 0, NULL, NULL),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', 0, NULL, NULL),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', 0, NULL, NULL),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', 0, NULL, NULL),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', 0, NULL, NULL),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', 0, NULL, NULL),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', 0, NULL, NULL),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', 0, NULL, NULL),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', 0, NULL, NULL),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', 0, NULL, NULL),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', 0, NULL, NULL),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', 0, NULL, NULL),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', 0, NULL, NULL),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', 0, NULL, NULL),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', 0, NULL, NULL),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', 0, NULL, NULL),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', 0, NULL, NULL),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', 0, NULL, NULL),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', 0, NULL, NULL),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', 0, NULL, NULL),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', 0, NULL, NULL),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', 0, NULL, NULL),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', 0, NULL, NULL),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', 0, NULL, NULL),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', 0, NULL, NULL),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', 0, NULL, NULL),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', 0, NULL, NULL),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', 0, NULL, NULL),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', 0, NULL, NULL),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', 0, NULL, NULL),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', 0, NULL, NULL),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', 0, NULL, NULL),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', 0, NULL, NULL),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', 0, NULL, NULL),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', 0, NULL, NULL),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', 0, NULL, NULL),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', 0, NULL, NULL),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', 0, NULL, NULL),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', 0, NULL, NULL),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', 0, NULL, NULL),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', 0, NULL, NULL),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', 0, NULL, NULL),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', 0, NULL, NULL),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', 0, NULL, NULL),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', 0, NULL, NULL),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', 0, NULL, NULL),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', 0, NULL, NULL),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', 0, NULL, NULL),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', 0, NULL, NULL),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', 0, NULL, NULL),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', 0, NULL, NULL),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', 0, NULL, NULL),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', 0, NULL, NULL),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', 0, NULL, NULL),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', 0, NULL, NULL),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', 0, NULL, NULL),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', 0, NULL, NULL),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', 0, NULL, NULL),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', 0, NULL, NULL),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', 0, NULL, NULL),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', 0, NULL, NULL),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', 0, NULL, NULL),
(492, 9, 'Eidgaon', 'ঈদগাঁও', 'null', 0, NULL, NULL),
(493, 39, 'Madhyanagar', 'মধ্যনগর', 'null', 0, NULL, NULL),
(494, 50, 'Dasar', 'ডাসার', 'null', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$0VLz/viA1M2IGNYlGqG9v.yXHkpCGjuANiwFDH8NbakwhU9xQqfem', 'avatar-1.jpg', NULL, '2024-03-04 04:17:30', '2024-03-04 04:17:30', NULL, NULL),
(2, 'Md. Mahadi Islam', 'mahadi.islam@bd.adventurekk.com', NULL, '$2y$12$cXwwQNGwl9btobJ.MzRNRuW1s8vRRwteXGrN/V18KZifSQp8OpCny', NULL, NULL, '2024-03-04 04:21:47', '2024-03-04 04:21:47', '106944185824458384142', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

CREATE TABLE `working_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hour_range` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_slug_unique` (`slug`),
  ADD KEY `companies_company_size_foreign` (`company_size`),
  ADD KEY `companies_working_hour_foreign` (`working_hour`);

--
-- Indexes for table `company_associated_industries`
--
ALTER TABLE `company_associated_industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_associated_industries_company_id_foreign` (`company_id`),
  ADD KEY `company_associated_industries_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `company_employment_types`
--
ALTER TABLE `company_employment_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_employment_types_company_id_foreign` (`company_id`),
  ADD KEY `company_employment_types_employment_type_id_foreign` (`employment_type_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_sizes`
--
ALTER TABLE `employee_sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_sizes_size_range_unique` (`size_range`);

--
-- Indexes for table `employment_types`
--
ALTER TABLE `employment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `working_hours_hour_range_unique` (`hour_range`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_associated_industries`
--
ALTER TABLE `company_associated_industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_employment_types`
--
ALTER TABLE `company_employment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_sizes`
--
ALTER TABLE `employee_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_types`
--
ALTER TABLE `employment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_company_size_foreign` FOREIGN KEY (`company_size`) REFERENCES `employee_sizes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `companies_working_hour_foreign` FOREIGN KEY (`working_hour`) REFERENCES `working_hours` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `company_associated_industries`
--
ALTER TABLE `company_associated_industries`
  ADD CONSTRAINT `company_associated_industries_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_associated_industries_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `company_employment_types`
--
ALTER TABLE `company_employment_types`
  ADD CONSTRAINT `company_employment_types_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_employment_types_employment_type_id_foreign` FOREIGN KEY (`employment_type_id`) REFERENCES `employment_types` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
