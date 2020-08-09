-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2020 at 08:10 PM
-- Server version: 5.7.31-0ubuntu0.16.04.1
-- PHP Version: 7.1.33-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcriclaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`) VALUES
(1, 'matches'),
(2, 'run'),
(3, 'highest scores'),
(4, 'fifties'),
(5, 'hundreds');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia, Plurinational State of'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, the Democratic Republic of the'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Côte d\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curaçao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and McDonald Mcdonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'KW', 'Kuwait'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'LA', 'Lao People\'s Democratic Republic'),
(123, 'LV', 'Latvia'),
(124, 'LB', 'Lebanon'),
(125, 'LS', 'Lesotho'),
(126, 'LR', 'Liberia'),
(127, 'LY', 'Libya'),
(128, 'LI', 'Liechtenstein'),
(129, 'LT', 'Lithuania'),
(130, 'LU', 'Luxembourg'),
(131, 'MO', 'Macao'),
(132, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Micronesia, Federated States of'),
(146, 'MD', 'Moldova, Republic of'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine, State of'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Réunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'BL', 'Saint Barthélemy'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha'),
(187, 'KN', 'Saint Kitts and Nevis'),
(188, 'LC', 'Saint Lucia'),
(189, 'MF', 'Saint Martin (French part)'),
(190, 'PM', 'Saint Pierre and Miquelon'),
(191, 'VC', 'Saint Vincent and the Grenadines'),
(192, 'WS', 'Samoa'),
(193, 'SM', 'San Marino'),
(194, 'ST', 'Sao Tome and Principe'),
(195, 'SA', 'Saudi Arabia'),
(196, 'SN', 'Senegal'),
(197, 'RS', 'Serbia'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leone'),
(200, 'SG', 'Singapore'),
(201, 'SX', 'Sint Maarten (Dutch part)'),
(202, 'SK', 'Slovakia'),
(203, 'SI', 'Slovenia'),
(204, 'SB', 'Solomon Islands'),
(205, 'SO', 'Somalia'),
(206, 'ZA', 'South Africa'),
(207, 'GS', 'South Georgia and the South Sandwich Islands'),
(208, 'SS', 'South Sudan'),
(209, 'ES', 'Spain'),
(210, 'LK', 'Sri Lanka'),
(211, 'SD', 'Sudan'),
(212, 'SR', 'Suriname'),
(213, 'SJ', 'Svalbard and Jan Mayen'),
(214, 'SZ', 'Swaziland'),
(215, 'SE', 'Sweden'),
(216, 'CH', 'Switzerland'),
(217, 'SY', 'Syrian Arab Republic'),
(218, 'TW', 'Taiwan'),
(219, 'TJ', 'Tajikistan'),
(220, 'TZ', 'Tanzania, United Republic of'),
(221, 'TH', 'Thailand'),
(222, 'TL', 'Timor-Leste'),
(223, 'TG', 'Togo'),
(224, 'TK', 'Tokelau'),
(225, 'TO', 'Tonga'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TN', 'Tunisia'),
(228, 'TR', 'Turkey'),
(229, 'TM', 'Turkmenistan'),
(230, 'TC', 'Turks and Caicos Islands'),
(231, 'TV', 'Tuvalu'),
(232, 'UG', 'Uganda'),
(233, 'UA', 'Ukraine'),
(234, 'AE', 'United Arab Emirates'),
(235, 'GB', 'United Kingdom'),
(236, 'US', 'United States'),
(237, 'UM', 'United States Minor Outlying Islands'),
(238, 'UY', 'Uruguay'),
(239, 'UZ', 'Uzbekistan'),
(240, 'VU', 'Vanuatu'),
(241, 'VE', 'Venezuela, Bolivarian Republic of'),
(242, 'VN', 'Viet Nam'),
(243, 'VG', 'Virgin Islands, British'),
(244, 'VI', 'Virgin Islands, U.S.'),
(245, 'WF', 'Wallis and Futuna'),
(246, 'EH', 'Western Sahara'),
(247, 'YE', 'Yemen'),
(248, 'ZM', 'Zambia'),
(249, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `level_id`, `tournament_id`, `team1_id`, `team2_id`, `winner_id`, `start`, `end`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 8, 11, 8, '2020-08-09 14:14:05', '2020-08-09 14:14:05', 'rrrr', '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(2, 1, 5, 7, 11, 11, '2020-08-10 14:14:05', '2020-08-10 14:14:05', 'rrr', '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(3, 1, 5, 7, 9, 9, '2020-08-11 14:14:05', '2020-08-11 14:14:05', 'rr', '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(4, 1, 5, 8, 10, 8, '2020-08-12 14:14:05', '2020-08-12 14:14:05', '11', '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(5, 1, 5, 10, 11, 11, '2020-08-13 14:14:05', '2020-08-13 14:14:05', '11', '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(6, 1, 5, 9, 10, 9, '2020-08-14 14:14:05', '2020-08-14 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(7, 1, 5, 8, 9, 9, '2020-08-15 14:14:05', '2020-08-15 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(8, 1, 5, 7, 8, 7, '2020-08-16 14:14:05', '2020-08-16 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:44:47'),
(9, 1, 5, 9, 11, 9, '2020-08-17 14:14:05', '2020-08-17 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(10, 1, 5, 7, 10, 7, '2020-08-18 14:14:05', '2020-08-18 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:44:36'),
(11, 2, 5, 9, 7, 9, '2020-08-20 14:14:05', '2020-08-20 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:45:53'),
(12, 2, 5, 8, 11, 11, '2020-08-21 14:14:05', '2020-08-21 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:45:53'),
(13, 3, 5, 9, 11, 9, '2020-08-23 14:14:05', '2020-08-23 14:14:05', NULL, '2020-08-09 08:44:05', '2020-08-09 08:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Round-1', '2020-08-08 19:13:23', '2020-08-08 19:13:23'),
(2, 'Semi Final', '2020-08-08 19:13:23', '2020-08-08 19:13:23'),
(3, 'Final', '2020-08-08 19:13:23', '2020-08-08 19:13:23');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2020_08_07_153855_create_teams_table', 1),
(8, '2020_08_07_155124_create_countries_table', 1),
(9, '2020_08_07_155943_create_players_table', 1),
(10, '2020_08_07_162354_create_tournaments_table', 1),
(11, '2020_08_07_162425_create_levels_table', 1),
(12, '2020_08_07_162427_create_fixtures_table', 1),
(13, '2020_08_07_231751_create_player_team_tournament_table', 1),
(14, '2020_08_08_001115_create_attributes_table', 1),
(15, '2020_08_08_003131_create_player_histories_table', 1),
(16, '2020_08_08_004240_create_points_table', 1);

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
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jersey` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `image_uri`, `jersey`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'palyer-1', NULL, 'sd-506-before-2020-07-31 12-50-47.png', 1, 1, '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(2, 'palyer-2', NULL, 'maxresdefault.jpg', 2, 15, '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(3, 'palyer-3', NULL, 'sd-686-pdf-2020-07-29 18-42-11.png', 3, 5, '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(4, 'team-4', '-1', 'index1.png', 4, 1, '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(5, 'team-4', '-2', 'sd-506-before-2020-07-31 12-50-47.png', 5, 15, '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(6, 'team-3', '-1', 'sd-506-before-2020-07-31 12-50-47.png', 7, 16, '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(7, 'rohit', 'sss', '/tmp/phpDRvsNp', 12, 1, '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(8, 'image', NULL, '20200809082029.jpg', 123, 13, '2020-08-09 02:50:29', '2020-08-09 02:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `player_histories`
--

CREATE TABLE `player_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_histories`
--

INSERT INTO `player_histories` (`id`, `player_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(2, 1, 2, '0', '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(3, 1, 3, '0', '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(4, 1, 4, '0', '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(5, 1, 5, '0', '2020-08-08 04:39:25', '2020-08-08 04:39:25'),
(6, 2, 1, '1', '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(7, 2, 2, '11', '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(8, 2, 3, '11', '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(9, 2, 4, '0', '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(10, 2, 5, '0', '2020-08-08 04:40:06', '2020-08-08 04:40:06'),
(11, 3, 1, '21', '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(12, 3, 2, '3', '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(13, 3, 3, '3', '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(14, 3, 4, '0', '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(15, 3, 5, '0', '2020-08-08 04:41:13', '2020-08-08 04:41:13'),
(16, 4, 1, '1', '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(17, 4, 2, '0', '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(18, 4, 3, '0', '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(19, 4, 4, '0', '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(20, 4, 5, '0', '2020-08-08 08:36:40', '2020-08-08 08:36:40'),
(21, 5, 1, '2', '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(22, 5, 2, '156', '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(23, 5, 3, '0', '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(24, 5, 4, '1', '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(25, 5, 5, '1', '2020-08-08 08:37:00', '2020-08-08 08:37:00'),
(26, 6, 1, '0', '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(27, 6, 2, '0', '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(28, 6, 3, '0', '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(29, 6, 4, '0', '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(30, 6, 5, '0', '2020-08-08 08:37:17', '2020-08-08 08:37:17'),
(31, 7, 1, '0', '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(32, 7, 2, '0', '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(33, 7, 3, '0', '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(34, 7, 4, '0', '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(35, 7, 5, '0', '2020-08-09 02:27:10', '2020-08-09 02:27:10'),
(36, 8, 1, '0', '2020-08-09 02:50:29', '2020-08-09 02:50:29'),
(37, 8, 2, '0', '2020-08-09 02:50:29', '2020-08-09 02:50:29'),
(38, 8, 3, '0', '2020-08-09 02:50:29', '2020-08-09 02:50:29'),
(39, 8, 4, '0', '2020-08-09 02:50:29', '2020-08-09 02:50:29'),
(40, 8, 5, '0', '2020-08-09 02:50:29', '2020-08-09 02:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `player_team_tournament`
--

CREATE TABLE `player_team_tournament` (
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_team_tournament`
--

INSERT INTO `player_team_tournament` (`tournament_id`, `team_id`, `player_id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 2, 3),
(1, 3, 6),
(1, 4, 4),
(1, 4, 5),
(1, 5, 7),
(2, 2, 3),
(3, 4, 4),
(4, 5, 8),
(5, 7, 1),
(5, 8, 2),
(5, 9, 3),
(5, 10, 4),
(5, 11, 6),
(5, 11, 7),
(5, 11, 8);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `tournament_id`, `team_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 5, 8, '4.00', '2020-08-09 08:44:36', '2020-08-09 08:44:36'),
(2, 5, 11, '4.00', '2020-08-09 08:44:36', '2020-08-09 08:44:36'),
(3, 5, 9, '8.00', '2020-08-09 08:44:36', '2020-08-09 08:44:36'),
(4, 5, 7, '4.00', '2020-08-09 08:44:36', '2020-08-09 08:44:47'),
(5, 5, 10, '0.00', '2020-08-09 08:44:36', '2020-08-09 08:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logouri` text COLLATE utf8mb4_unicode_ci,
  `club_state` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logouri`, `club_state`, `created_at`, `updated_at`) VALUES
(1, 'team-1', 'deskto 2020-07-29 17-53-55.png', NULL, '2020-08-08 03:19:55', '2020-08-08 03:19:55'),
(2, 'team-2', 'sd-506-before-2020-07-31 12-50-47.png', NULL, '2020-08-08 03:20:03', '2020-08-08 03:20:03'),
(3, 'Team-3', 'deskto 2020-07-29 17-53-55.png', NULL, '2020-08-08 08:35:52', '2020-08-08 08:35:52'),
(4, 'Team-4', '20200808211232.png', NULL, '2020-08-08 08:36:00', '2020-08-08 08:36:00'),
(5, 'rajan', '20200808212220.png', NULL, '2020-08-08 15:52:20', '2020-08-08 15:52:20'),
(6, 'Rohit', '20200809080959.jpeg', NULL, '2020-08-09 02:39:59', '2020-08-09 02:39:59'),
(7, 'New Team-1', '20200809131402.png', NULL, '2020-08-09 07:44:02', '2020-08-09 07:44:02'),
(8, 'New Team-2', '20200809131426.jpg', NULL, '2020-08-09 07:44:26', '2020-08-09 07:44:26'),
(9, 'New Team-3', '20200809131816.jpg', NULL, '2020-08-09 07:48:16', '2020-08-09 07:48:16'),
(10, 'New Team-4', '20200809131825.jpeg', NULL, '2020-08-09 07:48:25', '2020-08-09 07:48:25'),
(11, 'New Team-5', '20200809131838.png', NULL, '2020-08-09 07:48:38', '2020-08-09 07:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `points_per_match` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `start`, `end`, `points_per_match`, `created_at`, `updated_at`) VALUES
(1, 'tournaments-1', NULL, NULL, 2, '2020-08-08 02:50:47', '2020-08-08 02:50:47'),
(2, 'tournaments-2', NULL, NULL, 4, '2020-08-08 02:51:25', '2020-08-08 02:51:25'),
(3, 'tournaments-3', NULL, NULL, 1, '2020-08-08 02:54:14', '2020-08-08 02:54:14'),
(4, 'tournaments-4', NULL, NULL, 2, '2020-08-08 02:55:21', '2020-08-08 02:55:21'),
(5, 'New Tournament', NULL, NULL, 2, '2020-08-09 07:43:26', '2020-08-09 07:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'rohitadmin@yopmail.com', NULL, '$2y$10$r0NE44dXwcv9aHirpaaDvOe.dEkx.KKmC0x2P7kDmMmNxgJ7y5WBm', NULL, '2020-08-07 04:31:23', '2020-08-07 04:31:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_code_index` (`code`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixtures_level_id_foreign` (`level_id`),
  ADD KEY `fixtures_tournament_id_foreign` (`tournament_id`),
  ADD KEY `fixtures_team1_id_foreign` (`team1_id`),
  ADD KEY `fixtures_team2_id_foreign` (`team2_id`),
  ADD KEY `fixtures_winner_id_foreign` (`winner_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_country_id_foreign` (`country_id`);

--
-- Indexes for table `player_histories`
--
ALTER TABLE `player_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_histories_player_id_foreign` (`player_id`),
  ADD KEY `player_histories_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `player_team_tournament`
--
ALTER TABLE `player_team_tournament`
  ADD UNIQUE KEY `player_team_tournament_tournament_id_team_id_player_id_unique` (`tournament_id`,`team_id`,`player_id`),
  ADD KEY `player_team_tournament_team_id_foreign` (`team_id`),
  ADD KEY `player_team_tournament_player_id_foreign` (`player_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_tournament_id_foreign` (`tournament_id`),
  ADD KEY `points_team_id_foreign` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `player_histories`
--
ALTER TABLE `player_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
