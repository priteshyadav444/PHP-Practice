-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 11:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_visibility_status`
--

CREATE TABLE `account_visibility_status` (
  `account_visibilty_id` tinyint(3) UNSIGNED NOT NULL,
  `account_visibilty_type` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_list`
--

CREATE TABLE `block_list` (
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `block_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(60) NOT NULL,
  `country_id` char(2) DEFAULT NULL,
  `creadted_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `comment_like_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `liked_by_user_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commet_reply`
--

CREATE TABLE `commet_reply` (
  `reply_id` int(10) UNSIGNED NOT NULL,
  `replay_comment_id` int(10) UNSIGNED NOT NULL,
  `reply_user_id` int(10) UNSIGNED NOT NULL,
  `reply_content` text DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `compnay_name` varchar(60) NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `alpha-2-code` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `alpha-3 code` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`alpha-2-code`, `name`, `alpha-3 code`, `numcode`, `phonecode`) VALUES
('AD', 'ANDORRA', 'AND', 20, 376),
('AE', 'UNITED ARAB EMIRATES', 'ARE', 784, 971),
('AF', 'AFGHANISTAN', 'AFG', 4, 93),
('AG', 'ANTIGUA AND BARBUDA', 'ATG', 28, 1268),
('AI', 'ANGUILLA', 'AIA', 660, 1264),
('AL', 'ALBANIA', 'ALB', 8, 355),
('AM', 'ARMENIA', 'ARM', 51, 374),
('AN', 'NETHERLANDS ANTILLES', 'ANT', 530, 599),
('AO', 'ANGOLA', 'AGO', 24, 244),
('AQ', 'ANTARCTICA', 'ATA', 110, 672),
('AR', 'ARGENTINA', 'ARG', 32, 54),
('AS', 'AMERICAN SAMOA', 'ASM', 16, 1684),
('AT', 'AUSTRIA', 'AUT', 40, 43),
('AU', 'AUSTRALIA', 'AUS', 36, 61),
('AW', 'ARUBA', 'ABW', 533, 297),
('AZ', 'AZERBAIJAN', 'AZE', 31, 994),
('BA', 'BOSNIA AND HERZEGOVINA', 'BIH', 70, 387),
('BB', 'BARBADOS', 'BRB', 52, 1246),
('BD', 'BANGLADESH', 'BGD', 50, 880),
('BE', 'BELGIUM', 'BEL', 56, 32),
('BF', 'BURKINA FASO', 'BFA', 854, 226),
('BG', 'BULGARIA', 'BGR', 100, 359),
('BH', 'BAHRAIN', 'BHR', 48, 973),
('BI', 'BURUNDI', 'BDI', 108, 257),
('BJ', 'BENIN', 'BEN', 204, 229),
('BM', 'BERMUDA', 'BMU', 60, 1441),
('BN', 'BRUNEI DARUSSALAM', 'BRN', 96, 673),
('BO', 'BOLIVIA', 'BOL', 68, 591),
('BR', 'BRAZIL', 'BRA', 76, 55),
('BS', 'BAHAMAS', 'BHS', 44, 1242),
('BT', 'BHUTAN', 'BTN', 64, 975),
('BV', 'BOUVET ISLAND', 'BVT', 74, 47),
('BW', 'BOTSWANA', 'BWA', 72, 267),
('BY', 'BELARUS', 'BLR', 112, 375),
('BZ', 'BELIZE', 'BLZ', 84, 501),
('CA', 'CANADA', 'CAN', 124, 1),
('CC', 'COCOS (KEELING) ISLANDS', 'CCK', 166, 672),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'COD', 180, 242),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'CAF', 140, 236),
('CG', 'CONGO', 'COG', 178, 242),
('CH', 'SWITZERLAND', 'CHE', 756, 41),
('CI', 'COTE D\'IVOIRE', 'CIV', 384, 225),
('CK', 'COOK ISLANDS', 'COK', 184, 682),
('CL', 'CHILE', 'CHL', 152, 56),
('CM', 'CAMEROON', 'CMR', 120, 237),
('CN', 'CHINA', 'CHN', 156, 86),
('CO', 'COLOMBIA', 'COL', 170, 57),
('CR', 'COSTA RICA', 'CRI', 188, 506),
('CS', 'SERBIA AND MONTENEGRO', NULL, NULL, 381),
('CU', 'CUBA', 'CUB', 192, 53),
('CV', 'CAPE VERDE', 'CPV', 132, 238),
('CX', 'CHRISTMAS ISLAND', 'CXR', 162, 61),
('CY', 'CYPRUS', 'CYP', 196, 357),
('CZ', 'CZECH REPUBLIC', 'CZE', 203, 420),
('DE', 'GERMANY', 'DEU', 276, 49),
('DJ', 'DJIBOUTI', 'DJI', 262, 253),
('DK', 'DENMARK', 'DNK', 208, 45),
('DM', 'DOMINICA', 'DMA', 212, 1767),
('DO', 'DOMINICAN REPUBLIC', 'DOM', 214, 1809),
('DZ', 'ALGERIA', 'DZA', 12, 213),
('EC', 'ECUADOR', 'ECU', 218, 593),
('EE', 'ESTONIA', 'EST', 233, 372),
('EG', 'EGYPT', 'EGY', 818, 20),
('EH', 'WESTERN SAHARA', 'ESH', 732, 212),
('ER', 'ERITREA', 'ERI', 232, 291),
('ES', 'SPAIN', 'ESP', 724, 34),
('ET', 'ETHIOPIA', 'ETH', 231, 251),
('FI', 'FINLAND', 'FIN', 246, 358),
('FJ', 'FIJI', 'FJI', 242, 679),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'FLK', 238, 500),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'FSM', 583, 691),
('FO', 'FAROE ISLANDS', 'FRO', 234, 298),
('FR', 'FRANCE', 'FRA', 250, 33),
('GA', 'GABON', 'GAB', 266, 241),
('GB', 'UNITED KINGDOM', 'GBR', 826, 44),
('GD', 'GRENADA', 'GRD', 308, 1473),
('GE', 'GEORGIA', 'GEO', 268, 995),
('GF', 'FRENCH GUIANA', 'GUF', 254, 594),
('GH', 'GHANA', 'GHA', 288, 233),
('GI', 'GIBRALTAR', 'GIB', 292, 350),
('GL', 'GREENLAND', 'GRL', 304, 299),
('GM', 'GAMBIA', 'GMB', 270, 220),
('GN', 'GUINEA', 'GIN', 324, 224),
('GP', 'GUADELOUPE', 'GLP', 312, 590),
('GQ', 'EQUATORIAL GUINEA', 'GNQ', 226, 240),
('GR', 'GREECE', 'GRC', 300, 30),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'SGS', 239, 0),
('GT', 'GUATEMALA', 'GTM', 320, 502),
('GU', 'GUAM', 'GUM', 316, 1671),
('GW', 'GUINEA-BISSAU', 'GNB', 624, 245),
('GY', 'GUYANA', 'GUY', 328, 592),
('HK', 'HONG KONG', 'HKG', 344, 852),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'HMD', 334, 0),
('HN', 'HONDURAS', 'HND', 340, 504),
('HR', 'CROATIA', 'HRV', 191, 385),
('HT', 'HAITI', 'HTI', 332, 509),
('HU', 'HUNGARY', 'HUN', 348, 36),
('ID', 'INDONESIA', 'IDN', 360, 62),
('IE', 'IRELAND', 'IRL', 372, 353),
('IL', 'ISRAEL', 'ISR', 376, 972),
('IN', 'INDIA', 'IND', 356, 91),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'IOT', 86, 246),
('IQ', 'IRAQ', 'IRQ', 368, 964),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'IRN', 364, 98),
('IS', 'ICELAND', 'ISL', 352, 354),
('IT', 'ITALY', 'ITA', 380, 39),
('JM', 'JAMAICA', 'JAM', 388, 1876),
('JO', 'JORDAN', 'JOR', 400, 962),
('JP', 'JAPAN', 'JPN', 392, 81),
('KE', 'KENYA', 'KEN', 404, 254),
('KG', 'KYRGYZSTAN', 'KGZ', 417, 996),
('KH', 'CAMBODIA', 'KHM', 116, 855),
('KI', 'KIRIBATI', 'KIR', 296, 686),
('KM', 'COMOROS', 'COM', 174, 269),
('KN', 'SAINT KITTS AND NEVIS', 'KNA', 659, 1869),
('KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'PRK', 408, 850),
('KR', 'KOREA, REPUBLIC OF', 'KOR', 410, 82),
('KW', 'KUWAIT', 'KWT', 414, 965),
('KY', 'CAYMAN ISLANDS', 'CYM', 136, 1345),
('KZ', 'KAZAKHSTAN', 'KAZ', 398, 7),
('LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LAO', 418, 856),
('LB', 'LEBANON', 'LBN', 422, 961),
('LC', 'SAINT LUCIA', 'LCA', 662, 1758),
('LI', 'LIECHTENSTEIN', 'LIE', 438, 423),
('LK', 'SRI LANKA', 'LKA', 144, 94),
('LR', 'LIBERIA', 'LBR', 430, 231),
('LS', 'LESOTHO', 'LSO', 426, 266),
('LT', 'LITHUANIA', 'LTU', 440, 370),
('LU', 'LUXEMBOURG', 'LUX', 442, 352),
('LV', 'LATVIA', 'LVA', 428, 371),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'LBY', 434, 218),
('MA', 'MOROCCO', 'MAR', 504, 212),
('MC', 'MONACO', 'MCO', 492, 377),
('MD', 'MOLDOVA, REPUBLIC OF', 'MDA', 498, 373),
('MG', 'MADAGASCAR', 'MDG', 450, 261),
('MH', 'MARSHALL ISLANDS', 'MHL', 584, 692),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MKD', 807, 389),
('ML', 'MALI', 'MLI', 466, 223),
('MM', 'MYANMAR', 'MMR', 104, 95),
('MN', 'MONGOLIA', 'MNG', 496, 976),
('MO', 'MACAO', 'MAC', 446, 853),
('MP', 'NORTHERN MARIANA ISLANDS', 'MNP', 580, 1670),
('MQ', 'MARTINIQUE', 'MTQ', 474, 596),
('MR', 'MAURITANIA', 'MRT', 478, 222),
('MS', 'MONTSERRAT', 'MSR', 500, 1664),
('MT', 'MALTA', 'MLT', 470, 356),
('MU', 'MAURITIUS', 'MUS', 480, 230),
('MV', 'MALDIVES', 'MDV', 462, 960),
('MW', 'MALAWI', 'MWI', 454, 265),
('MX', 'MEXICO', 'MEX', 484, 52),
('MY', 'MALAYSIA', 'MYS', 458, 60),
('MZ', 'MOZAMBIQUE', 'MOZ', 508, 258),
('NA', 'NAMIBIA', 'NAM', 516, 264),
('NC', 'NEW CALEDONIA', 'NCL', 540, 687),
('NE', 'NIGER', 'NER', 562, 227),
('NF', 'NORFOLK ISLAND', 'NFK', 574, 672),
('NG', 'NIGERIA', 'NGA', 566, 234),
('NI', 'NICARAGUA', 'NIC', 558, 505),
('NL', 'NETHERLANDS', 'NLD', 528, 31),
('NO', 'NORWAY', 'NOR', 578, 47),
('NP', 'NEPAL', 'NPL', 524, 977),
('NR', 'NAURU', 'NRU', 520, 674),
('NU', 'NIUE', 'NIU', 570, 683),
('NZ', 'NEW ZEALAND', 'NZL', 554, 64),
('OM', 'OMAN', 'OMN', 512, 968),
('PA', 'PANAMA', 'PAN', 591, 507),
('PE', 'PERU', 'PER', 604, 51),
('PF', 'FRENCH POLYNESIA', 'PYF', 258, 689),
('PG', 'PAPUA NEW GUINEA', 'PNG', 598, 675),
('PH', 'PHILIPPINES', 'PHL', 608, 63),
('PK', 'PAKISTAN', 'PAK', 586, 92),
('PL', 'POLAND', 'POL', 616, 48),
('PM', 'SAINT PIERRE AND MIQUELON', 'SPM', 666, 508),
('PN', 'PITCAIRN', 'PCN', 612, 64),
('PR', 'PUERTO RICO', 'PRI', 630, 1787),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'PSE', 275, 970),
('PT', 'PORTUGAL', 'PRT', 620, 351),
('PW', 'PALAU', 'PLW', 585, 680),
('PY', 'PARAGUAY', 'PRY', 600, 595),
('QA', 'QATAR', 'QAT', 634, 974),
('RE', 'REUNION', 'REU', 638, 262),
('RO', 'ROMANIA', 'ROM', 642, 40),
('RU', 'RUSSIAN FEDERATION', 'RUS', 643, 70),
('RW', 'RWANDA', 'RWA', 646, 250),
('SA', 'SAUDI ARABIA', 'SAU', 682, 966),
('SB', 'SOLOMON ISLANDS', 'SLB', 90, 677),
('SC', 'SEYCHELLES', 'SYC', 690, 248),
('SD', 'SUDAN', 'SDN', 736, 249),
('SE', 'SWEDEN', 'SWE', 752, 46),
('SG', 'SINGAPORE', 'SGP', 702, 65),
('SH', 'SAINT HELENA', 'SHN', 654, 290),
('SI', 'SLOVENIA', 'SVN', 705, 386),
('SJ', 'SVALBARD AND JAN MAYEN', 'SJM', 744, 47),
('SK', 'SLOVAKIA', 'SVK', 703, 421),
('SL', 'SIERRA LEONE', 'SLE', 694, 232),
('SM', 'SAN MARINO', 'SMR', 674, 378),
('SN', 'SENEGAL', 'SEN', 686, 221),
('SO', 'SOMALIA', 'SOM', 706, 252),
('SR', 'SURINAME', 'SUR', 740, 597),
('ST', 'SAO TOME AND PRINCIPE', 'STP', 678, 239),
('SV', 'EL SALVADOR', 'SLV', 222, 503),
('SY', 'SYRIAN ARAB REPUBLIC', 'SYR', 760, 963),
('SZ', 'SWAZILAND', 'SWZ', 748, 268),
('TC', 'TURKS AND CAICOS ISLANDS', 'TCA', 796, 1649),
('TD', 'CHAD', 'TCD', 148, 235),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'ATF', 260, 0),
('TG', 'TOGO', 'TGO', 768, 228),
('TH', 'THAILAND', 'THA', 764, 66),
('TJ', 'TAJIKISTAN', 'TJK', 762, 992),
('TK', 'TOKELAU', 'TKL', 772, 690),
('TL', 'TIMOR-LESTE', 'TLS', 626, 670),
('TM', 'TURKMENISTAN', 'TKM', 795, 7370),
('TN', 'TUNISIA', 'TUN', 788, 216),
('TO', 'TONGA', 'TON', 776, 676),
('TR', 'TURKEY', 'TUR', 792, 90),
('TT', 'TRINIDAD AND TOBAGO', 'TTO', 780, 1868),
('TV', 'TUVALU', 'TUV', 798, 688),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'TWN', 158, 886),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'TZA', 834, 255),
('UA', 'UKRAINE', 'UKR', 804, 380),
('UG', 'UGANDA', 'UGA', 800, 256),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'UMI', 581, 1),
('US', 'UNITED STATES', 'USA', 840, 1),
('UY', 'URUGUAY', 'URY', 858, 598),
('UZ', 'UZBEKISTAN', 'UZB', 860, 998),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'VAT', 336, 39),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'VCT', 670, 1784),
('VE', 'VENEZUELA', 'VEN', 862, 58),
('VG', 'VIRGIN ISLANDS, BRITISH', 'VGB', 92, 1284),
('VI', 'VIRGIN ISLANDS, U.S.', 'VIR', 850, 1340),
('VN', 'VIET NAM', 'VNM', 704, 84),
('VU', 'VANUATU', 'VUT', 548, 678),
('WF', 'WALLIS AND FUTUNA', 'WLF', 876, 681),
('WS', 'SAMOA', 'WSM', 882, 684),
('YE', 'YEMEN', 'YEM', 887, 967),
('YT', 'MAYOTTE', 'MYT', 175, 269),
('ZA', 'SOUTH AFRICA', 'ZAF', 710, 27),
('ZM', 'ZAMBIA', 'ZMB', 894, 260),
('ZW', 'ZIMBABWE', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `events_common`
--

CREATE TABLE `events_common` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_education`
--

CREATE TABLE `events_education` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `institute_type` enum('University','School') DEFAULT NULL,
  `institute_id` int(10) UNSIGNED DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_job`
--

CREATE TABLE `events_job` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_places`
--

CREATE TABLE `events_places` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_reletionship`
--

CREATE TABLE `events_reletionship` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_travel`
--

CREATE TABLE `events_travel` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `event_title` varchar(60) DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_type`
--

CREATE TABLE `events_type` (
  `event_type_id` tinyint(3) UNSIGNED NOT NULL,
  `event_type_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendship_id` int(10) UNSIGNED NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `established_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `request_status` enum('A','N') NOT NULL DEFAULT 'N',
  `request_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `gender_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `user_hobbies_id` smallint(5) UNSIGNED NOT NULL,
  `user_hobies_names` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `message_content` blob DEFAULT NULL,
  `pinned_messages` tinyint(1) DEFAULT 0,
  `message_status` enum('D','S') DEFAULT NULL,
  `message_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `attachment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attachment`)),
  `message_seen_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `thread_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `thread_id` int(10) UNSIGNED NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text DEFAULT NULL,
  `notification_link` varchar(60) DEFAULT NULL,
  `notification_seen` tinyint(1) DEFAULT NULL,
  `notification_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `isEdited` tinyint(1) NOT NULL DEFAULT 0,
  `content_text` blob DEFAULT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp(),
  `updated_datetime` timestamp NULL DEFAULT current_timestamp(),
  `post_visibilty_types` tinyint(3) UNSIGNED DEFAULT NULL,
  `feeling_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `activity_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_shared`
--

CREATE TABLE `posts_shared` (
  `shared_post_id` int(10) UNSIGNED NOT NULL,
  `shared_by_user_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp() COMMENT 'post shared time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_tagged_list`
--

CREATE TABLE `posts_tagged_list` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_tagged_list_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_type`
--

CREATE TABLE `posts_type` (
  `posts_type_id` tinyint(3) UNSIGNED NOT NULL,
  `post_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_activity`
--

CREATE TABLE `post_activity` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `post_activity_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_activity_types`
--

CREATE TABLE `post_activity_types` (
  `post_activity_id` tinyint(3) UNSIGNED NOT NULL,
  `posts_activity_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_attachments`
--

CREATE TABLE `post_attachments` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `attachments_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_post_id` int(10) UNSIGNED NOT NULL,
  `comment_user_id` int(10) UNSIGNED NOT NULL,
  `comment_content` blob DEFAULT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp(),
  `updated_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_feeling_types`
--

CREATE TABLE `post_feeling_types` (
  `post_feeling_id` tinyint(3) UNSIGNED NOT NULL,
  `posts_feeling_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `liked_post_id` int(10) UNSIGNED NOT NULL,
  `liked_by_user_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_locations`
--

CREATE TABLE `post_locations` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_tagged_list_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_share_custom_users`
--

CREATE TABLE `post_share_custom_users` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `share_user_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`share_user_list`)),
  `not_share_user_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`not_share_user_list`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_share_except_specific_users`
--

CREATE TABLE `post_share_except_specific_users` (
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `user_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_list`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_visibility_privicy_types`
--

CREATE TABLE `post_visibility_privicy_types` (
  `posts_visibility_privicy_id` tinyint(3) UNSIGNED NOT NULL,
  `posts_visibility_privicy_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reletionship_status_types`
--

CREATE TABLE `reletionship_status_types` (
  `reletionship_status_type_id` int(10) UNSIGNED NOT NULL,
  `reletionship_status_name` varchar(30) NOT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reletionship_visibility_privicy_types`
--

CREATE TABLE `reletionship_visibility_privicy_types` (
  `reletionship_visibility_privicy_id` tinyint(3) UNSIGNED NOT NULL,
  `reletionship_visibility_privicy_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reletion_names`
--

CREATE TABLE `reletion_names` (
  `reletion_id` int(10) UNSIGNED NOT NULL,
  `reletion_name` varchar(30) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply_likes`
--

CREATE TABLE `reply_likes` (
  `reply_id` int(10) UNSIGNED NOT NULL,
  `reply_user_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `social_media` varchar(30) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `timeline_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `posts_type_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `timezone_id` tinyint(3) UNSIGNED NOT NULL,
  `timezone_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universites`
--

CREATE TABLE `universites` (
  `university_id` int(10) UNSIGNED NOT NULL,
  `university_name` varchar(100) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usernames`
--

CREATE TABLE `usernames` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `profile_pic_url` varchar(60) DEFAULT NULL,
  `is_account_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `password` char(64) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(60) DEFAULT NULL,
  `country_code` char(2) DEFAULT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt_datetime` timestamp NULL DEFAULT current_timestamp(),
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `default_post_visibilty_types` tinyint(3) UNSIGNED DEFAULT NULL,
  `account_visibilty_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `last_signup_datetime` timestamp NULL DEFAULT NULL,
  `last_password_changed_datetime` timestamp NULL DEFAULT NULL,
  `last_seen_date_time` timestamp NULL DEFAULT NULL,
  `username_id` int(10) UNSIGNED DEFAULT NULL,
  `middle_name` varchar(40) DEFAULT NULL,
  `cover_pic_url` varchar(60) DEFAULT NULL,
  `timezone_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_artist_intrest`
--

CREATE TABLE `users_artist_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_attachment`
--

CREATE TABLE `users_attachment` (
  `attachment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_book_intrest`
--

CREATE TABLE `users_book_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_family_members`
--

CREATE TABLE `users_family_members` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `reletion_types` int(10) UNSIGNED DEFAULT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_films_intrest`
--

CREATE TABLE `users_films_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_music_intrest`
--

CREATE TABLE `users_music_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_places_lived`
--

CREATE TABLE `users_places_lived` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `from_datetime` date DEFAULT NULL,
  `to_datetime` date DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_privacy`
--

CREATE TABLE `users_privacy` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `default_post_` tinyint(3) UNSIGNED DEFAULT NULL,
  `birthdate_visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `phone_visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `email_visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `default_post_visibilty_types` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_school`
--

CREATE TABLE `users_school` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `from_datetime` date DEFAULT NULL,
  `to_datetime` date DEFAULT NULL,
  `is_graduated` tinyint(1) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_show_intrest`
--

CREATE TABLE `users_show_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_sport_men_intrest`
--

CREATE TABLE `users_sport_men_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `hide_intrest` tinyint(1) NOT NULL DEFAULT 0,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_sport_teams_intrest`
--

CREATE TABLE `users_sport_teams_intrest` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `hide_intrest` tinyint(1) NOT NULL DEFAULT 0,
  `visibility_type` tinyint(3) UNSIGNED NOT NULL,
  `createdAt_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_town_current_places`
--

CREATE TABLE `users_town_current_places` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `place_type` enum('C','H') DEFAULT NULL,
  `from_datetime` date DEFAULT NULL,
  `to_datetime` date DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_universites`
--

CREATE TABLE `users_universites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `from_datetime` date DEFAULT NULL,
  `to_datetime` date DEFAULT NULL,
  `graduation_opt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`graduation_opt`)),
  `is_graduated` tinyint(1) DEFAULT NULL,
  `graduation_level` enum('G','P') DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_companies`
--

CREATE TABLE `user_companies` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `postion` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_working` tinyint(1) DEFAULT 0,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `from_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `to_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `default_visibilty_types` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_hoobies`
--

CREATE TABLE `user_hoobies` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_hobbies_id` smallint(5) UNSIGNED DEFAULT NULL,
  `creadted_datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_reletionship_status`
--

CREATE TABLE `user_reletionship_status` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `reletionship_status_type_id` int(10) UNSIGNED NOT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websites_link`
--

CREATE TABLE `websites_link` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `visibility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_visibility_status`
--
ALTER TABLE `account_visibility_status`
  ADD PRIMARY KEY (`account_visibilty_id`);

--
-- Indexes for table `block_list`
--
ALTER TABLE `block_list`
  ADD UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  ADD KEY `fk_block_list_friend_id_2` (`user2_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_country_id_foreign` (`country_id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`comment_like_id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`,`liked_by_user_id`),
  ADD KEY `comment_likes_liked_by_user_id_foreign` (`liked_by_user_id`);

--
-- Indexes for table `commet_reply`
--
ALTER TABLE `commet_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `commet_reply_reply_user_id_foreign` (`reply_user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_city_id_company` (`city_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `user_id` (`user_id`,`link_url`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`alpha-2-code`);

--
-- Indexes for table `events_common`
--
ALTER TABLE `events_common`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_common_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_common` (`post_id`);

--
-- Indexes for table `events_education`
--
ALTER TABLE `events_education`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_education_school_id` (`institute_id`),
  ADD KEY `fk_events_education_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_education` (`post_id`);

--
-- Indexes for table `events_job`
--
ALTER TABLE `events_job`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_job_company_id` (`company_id`),
  ADD KEY `fk_events_job_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_job` (`post_id`);

--
-- Indexes for table `events_places`
--
ALTER TABLE `events_places`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_places_city_id` (`city_id`),
  ADD KEY `fk_events_places_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_places` (`post_id`);

--
-- Indexes for table `events_reletionship`
--
ALTER TABLE `events_reletionship`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_partner_id` (`partner_id`),
  ADD KEY `fk_events_reletionship_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_reletionship` (`post_id`);

--
-- Indexes for table `events_travel`
--
ALTER TABLE `events_travel`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_travel_event_type_id` (`event_type_id`),
  ADD KEY `fk_post_id_events_travel` (`post_id`);

--
-- Indexes for table `events_type`
--
ALTER TABLE `events_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendship_id`),
  ADD UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  ADD KEY `fk_friend_id_2` (`user2_id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  ADD KEY `fk__request_friend_id_2` (`user2_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`user_hobbies_id`),
  ADD UNIQUE KEY `user_hobbies_id` (`user_hobbies_id`,`user_hobies_names`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_thread_id` (`thread_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`thread_id`),
  ADD UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  ADD KEY `fk__messages_thread_id_2` (`user2_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_user_id_notifications` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `fk_post_visibilty_types` (`post_visibilty_types`),
  ADD KEY `fk_post_feeling_id` (`feeling_id`),
  ADD KEY `fk_activity_id_3` (`activity_id`);

--
-- Indexes for table `posts_shared`
--
ALTER TABLE `posts_shared`
  ADD KEY `posts_shared_shared_post_id_foreign` (`shared_post_id`),
  ADD KEY `posts_shared_shared_user_id_foreign` (`shared_by_user_id`);

--
-- Indexes for table `posts_tagged_list`
--
ALTER TABLE `posts_tagged_list`
  ADD KEY `fk_posts_tagged_list` (`post_id`);

--
-- Indexes for table `posts_type`
--
ALTER TABLE `posts_type`
  ADD PRIMARY KEY (`posts_type_id`);

--
-- Indexes for table `post_activity`
--
ALTER TABLE `post_activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `fk_activity_id_1` (`post_activity_id`);

--
-- Indexes for table `post_activity_types`
--
ALTER TABLE `post_activity_types`
  ADD PRIMARY KEY (`post_activity_id`);

--
-- Indexes for table `post_attachments`
--
ALTER TABLE `post_attachments`
  ADD KEY `fk_post_id_attachment` (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_comments_comment_post_id_foreign` (`comment_post_id`),
  ADD KEY `post_comments_comment_user_id_foreign` (`comment_user_id`);

--
-- Indexes for table `post_feeling_types`
--
ALTER TABLE `post_feeling_types`
  ADD PRIMARY KEY (`post_feeling_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD KEY `post_likes_liked_post_id_foreign` (`liked_post_id`);

--
-- Indexes for table `post_locations`
--
ALTER TABLE `post_locations`
  ADD KEY `fk_post_locations` (`post_id`);

--
-- Indexes for table `post_share_custom_users`
--
ALTER TABLE `post_share_custom_users`
  ADD KEY `fk_post_id_post_share_custom_users` (`post_id`);

--
-- Indexes for table `post_share_except_specific_users`
--
ALTER TABLE `post_share_except_specific_users`
  ADD KEY `fk_post_id_post_share_except_specific_users` (`post_id`);

--
-- Indexes for table `post_visibility_privicy_types`
--
ALTER TABLE `post_visibility_privicy_types`
  ADD PRIMARY KEY (`posts_visibility_privicy_id`);

--
-- Indexes for table `reletionship_status_types`
--
ALTER TABLE `reletionship_status_types`
  ADD PRIMARY KEY (`reletionship_status_type_id`);

--
-- Indexes for table `reletionship_visibility_privicy_types`
--
ALTER TABLE `reletionship_visibility_privicy_types`
  ADD PRIMARY KEY (`reletionship_visibility_privicy_id`);

--
-- Indexes for table `reletion_names`
--
ALTER TABLE `reletion_names`
  ADD PRIMARY KEY (`reletion_id`);

--
-- Indexes for table `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD UNIQUE KEY `reply_id` (`reply_id`,`reply_user_id`),
  ADD KEY `reply_likes_reply_user_id_foreign` (`reply_user_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD UNIQUE KEY `user_id` (`user_id`,`social_media`),
  ADD KEY `fk_social_links` (`visibility_type`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`timeline_id`),
  ADD KEY `fk_post_id_type_timline` (`posts_type_id`),
  ADD KEY `fk_post_id_timline` (`post_id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`timezone_id`),
  ADD UNIQUE KEY `timezone_id` (`timezone_id`,`timezone_name`);

--
-- Indexes for table `universites`
--
ALTER TABLE `universites`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `usernames`
--
ALTER TABLE `usernames`
  ADD UNIQUE KEY `user_id` (`user_id`,`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD KEY `users_country_code_foreign` (`country_code`),
  ADD KEY `fk_gender_id` (`gender_id`),
  ADD KEY `default_post_visibilty_types` (`default_post_visibilty_types`),
  ADD KEY `account_visibilty_id` (`account_visibilty_id`),
  ADD KEY `fk_timezonr_id` (`timezone_id`);

--
-- Indexes for table `users_artist_intrest`
--
ALTER TABLE `users_artist_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_artist_intrest` (`visibility_type`);

--
-- Indexes for table `users_attachment`
--
ALTER TABLE `users_attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_book_intrest`
--
ALTER TABLE `users_book_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_book_intrest` (`visibility_type`);

--
-- Indexes for table `users_family_members`
--
ALTER TABLE `users_family_members`
  ADD KEY `fk_users_family_members_member_id` (`member_id`),
  ADD KEY `fk_users_family_members_user_id` (`user_id`),
  ADD KEY `fk_users_family_members_reletion_types` (`reletion_types`),
  ADD KEY `fk_user_visibility_type_1` (`visibility_type`);

--
-- Indexes for table `users_films_intrest`
--
ALTER TABLE `users_films_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_films_intrest` (`visibility_type`);

--
-- Indexes for table `users_music_intrest`
--
ALTER TABLE `users_music_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_music_intrest` (`visibility_type`);

--
-- Indexes for table `users_places_lived`
--
ALTER TABLE `users_places_lived`
  ADD KEY `fk_user_id_places_lived` (`user_id`),
  ADD KEY `fk_city_id_places_lived` (`city_id`),
  ADD KEY `visibility_type` (`visibility_type`);

--
-- Indexes for table `users_privacy`
--
ALTER TABLE `users_privacy`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `birthdate_visibility_type` (`birthdate_visibility_type`),
  ADD KEY `phone_visibility_type` (`phone_visibility_type`),
  ADD KEY `email_visibility_type` (`email_visibility_type`);

--
-- Indexes for table `users_school`
--
ALTER TABLE `users_school`
  ADD UNIQUE KEY `user_id` (`user_id`,`school_id`),
  ADD KEY `fk_school_id` (`school_id`),
  ADD KEY `fk_fk_visibility_id_1` (`visibility_type`);

--
-- Indexes for table `users_show_intrest`
--
ALTER TABLE `users_show_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_show_intrest` (`visibility_type`);

--
-- Indexes for table `users_sport_men_intrest`
--
ALTER TABLE `users_sport_men_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_sport_men_intrest` (`visibility_type`);

--
-- Indexes for table `users_sport_teams_intrest`
--
ALTER TABLE `users_sport_teams_intrest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_user_visibility_type_users_sport_teams_intrest` (`visibility_type`);

--
-- Indexes for table `users_town_current_places`
--
ALTER TABLE `users_town_current_places`
  ADD UNIQUE KEY `user_id` (`user_id`,`city_id`),
  ADD KEY `fk_users_town_current_places_city_id` (`city_id`),
  ADD KEY `fk_users_town_current_places_visibilty` (`visibility_type`);

--
-- Indexes for table `users_universites`
--
ALTER TABLE `users_universites`
  ADD UNIQUE KEY `user_id` (`user_id`,`university_id`),
  ADD KEY `fk_universites_id` (`university_id`),
  ADD KEY `fk_visibility_id_uni_1` (`visibility_type`);

--
-- Indexes for table `user_companies`
--
ALTER TABLE `user_companies`
  ADD KEY `fk_user_companies_user_id` (`user_id`),
  ADD KEY `fk_user_companies_company_id` (`company_id`),
  ADD KEY `default_visibilty_types` (`default_visibilty_types`),
  ADD KEY `visibility_type` (`visibility_type`);

--
-- Indexes for table `user_hoobies`
--
ALTER TABLE `user_hoobies`
  ADD UNIQUE KEY `user_id` (`user_id`,`user_hobbies_id`),
  ADD KEY `fk_users_hobbies_id` (`user_hobbies_id`);

--
-- Indexes for table `user_reletionship_status`
--
ALTER TABLE `user_reletionship_status`
  ADD UNIQUE KEY `user_id` (`user_id`,`reletionship_status_type_id`),
  ADD KEY `fk_user_reletionship_status_partner_id` (`partner_id`),
  ADD KEY `fk_reletionship_status_type_id` (`reletionship_status_type_id`),
  ADD KEY `fk_user_reletionship_status_visibility` (`visibility_type`);

--
-- Indexes for table `websites_link`
--
ALTER TABLE `websites_link`
  ADD UNIQUE KEY `user_id` (`user_id`,`link_url`),
  ADD KEY `visibility_type` (`visibility_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `comment_like_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commet_reply`
--
ALTER TABLE `commet_reply`
  MODIFY `reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_common`
--
ALTER TABLE `events_common`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_education`
--
ALTER TABLE `events_education`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_job`
--
ALTER TABLE `events_job`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_places`
--
ALTER TABLE `events_places`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_reletionship`
--
ALTER TABLE `events_reletionship`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_travel`
--
ALTER TABLE `events_travel`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_type`
--
ALTER TABLE `events_type`
  MODIFY `event_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `thread_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_activity_types`
--
ALTER TABLE `post_activity_types`
  MODIFY `post_activity_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_feeling_types`
--
ALTER TABLE `post_feeling_types`
  MODIFY `post_feeling_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_visibility_privicy_types`
--
ALTER TABLE `post_visibility_privicy_types`
  MODIFY `posts_visibility_privicy_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reletionship_status_types`
--
ALTER TABLE `reletionship_status_types`
  MODIFY `reletionship_status_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reletionship_visibility_privicy_types`
--
ALTER TABLE `reletionship_visibility_privicy_types`
  MODIFY `reletionship_visibility_privicy_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reletion_names`
--
ALTER TABLE `reletion_names`
  MODIFY `reletion_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universites`
--
ALTER TABLE `universites`
  MODIFY `university_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_attachment`
--
ALTER TABLE `users_attachment`
  MODIFY `attachment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_list`
--
ALTER TABLE `block_list`
  ADD CONSTRAINT `fk_block_list_friend_id_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_block_list_friend_id_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`alpha-2-code`);

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `post_comments` (`comment_id`),
  ADD CONSTRAINT `comment_likes_liked_by_user_id_foreign` FOREIGN KEY (`liked_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `commet_reply`
--
ALTER TABLE `commet_reply`
  ADD CONSTRAINT `commet_reply_comment_id_foreign` FOREIGN KEY (`reply_user_id`) REFERENCES `post_comments` (`comment_id`),
  ADD CONSTRAINT `commet_reply_reply_user_id_foreign` FOREIGN KEY (`reply_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_city_id_company` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `events_common`
--
ALTER TABLE `events_common`
  ADD CONSTRAINT `fk_events_common_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_post_id_events_common` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `events_education`
--
ALTER TABLE `events_education`
  ADD CONSTRAINT `fk_events_education_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_events_education_school_id` FOREIGN KEY (`institute_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `fk_events_education_universites_id` FOREIGN KEY (`institute_id`) REFERENCES `universites` (`university_id`),
  ADD CONSTRAINT `fk_post_id_events_education` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `events_job`
--
ALTER TABLE `events_job`
  ADD CONSTRAINT `fk_events_job_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `fk_events_job_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_post_id_events_job` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `events_places`
--
ALTER TABLE `events_places`
  ADD CONSTRAINT `fk_events_places_city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `fk_events_places_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_post_id_events_places` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `events_reletionship`
--
ALTER TABLE `events_reletionship`
  ADD CONSTRAINT `fk_events_reletionship_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_partner_id` FOREIGN KEY (`partner_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_post_id_events_reletionship` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `events_travel`
--
ALTER TABLE `events_travel`
  ADD CONSTRAINT `fk_events_travel_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `events_type` (`event_type_id`),
  ADD CONSTRAINT `fk_post_id_events_travel` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_friend_id_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_friend_id_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `fk__request_friend_id_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk__request_friend_id_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_thread_id` FOREIGN KEY (`thread_id`) REFERENCES `message_thread` (`thread_id`);

--
-- Constraints for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD CONSTRAINT `fk__messages_thread_id_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk__messages_thread_id_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_user_id_notifications` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_activity_id_3` FOREIGN KEY (`activity_id`) REFERENCES `post_activity` (`activity_id`),
  ADD CONSTRAINT `fk_post_feeling_id` FOREIGN KEY (`feeling_id`) REFERENCES `post_feeling_types` (`post_feeling_id`),
  ADD CONSTRAINT `fk_post_visibilty_types` FOREIGN KEY (`post_visibilty_types`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`),
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts_shared`
--
ALTER TABLE `posts_shared`
  ADD CONSTRAINT `posts_shared_shared_post_id_foreign` FOREIGN KEY (`shared_post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `posts_shared_shared_user_id_foreign` FOREIGN KEY (`shared_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts_tagged_list`
--
ALTER TABLE `posts_tagged_list`
  ADD CONSTRAINT `fk_posts_tagged_list` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_activity`
--
ALTER TABLE `post_activity`
  ADD CONSTRAINT `fk_activity_id_1` FOREIGN KEY (`post_activity_id`) REFERENCES `post_activity_types` (`post_activity_id`);

--
-- Constraints for table `post_attachments`
--
ALTER TABLE `post_attachments`
  ADD CONSTRAINT `fk_post_id_attachment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_comment_post_id_foreign` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_comments_comment_user_id_foreign` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_liked_post_id_foreign` FOREIGN KEY (`liked_post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_locations`
--
ALTER TABLE `post_locations`
  ADD CONSTRAINT `fk_post_locations` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_share_custom_users`
--
ALTER TABLE `post_share_custom_users`
  ADD CONSTRAINT `fk_post_id_post_share_custom_users` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_share_except_specific_users`
--
ALTER TABLE `post_share_except_specific_users`
  ADD CONSTRAINT `fk_post_id_post_share_except_specific_users` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD CONSTRAINT `reply_likes_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `commet_reply` (`reply_id`),
  ADD CONSTRAINT `reply_likes_reply_user_id_foreign` FOREIGN KEY (`reply_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `fk_social_links` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `social_links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `fk_post_id_timline` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `fk_post_id_type_timline` FOREIGN KEY (`posts_type_id`) REFERENCES `posts_type` (`posts_type_id`);

--
-- Constraints for table `usernames`
--
ALTER TABLE `usernames`
  ADD CONSTRAINT `fk_user_id_username` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`),
  ADD CONSTRAINT `fk_timezonr_id` FOREIGN KEY (`timezone_id`) REFERENCES `timezones` (`timezone_id`),
  ADD CONSTRAINT `users_country_code_foreign` FOREIGN KEY (`country_code`) REFERENCES `country` (`alpha-2-code`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`default_post_visibilty_types`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`default_post_visibilty_types`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`account_visibilty_id`) REFERENCES `account_visibility_status` (`account_visibilty_id`);

--
-- Constraints for table `users_artist_intrest`
--
ALTER TABLE `users_artist_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_artist_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_artist_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_attachment`
--
ALTER TABLE `users_attachment`
  ADD CONSTRAINT `users_attachment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_book_intrest`
--
ALTER TABLE `users_book_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_book_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_book_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_family_members`
--
ALTER TABLE `users_family_members`
  ADD CONSTRAINT `fk_user_visibility_type_1` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `fk_users_family_members_member_id` FOREIGN KEY (`member_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_users_family_members_reletion_types` FOREIGN KEY (`reletion_types`) REFERENCES `reletion_names` (`reletion_id`),
  ADD CONSTRAINT `fk_users_family_members_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_films_intrest`
--
ALTER TABLE `users_films_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_films_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_films_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_music_intrest`
--
ALTER TABLE `users_music_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_music_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_music_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_places_lived`
--
ALTER TABLE `users_places_lived`
  ADD CONSTRAINT `fk_city_id_places_lived` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `fk_user_id_places_lived` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_places_lived_ibfk_1` FOREIGN KEY (`visibility_type`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`);

--
-- Constraints for table `users_privacy`
--
ALTER TABLE `users_privacy`
  ADD CONSTRAINT `users_privacy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_privacy_ibfk_2` FOREIGN KEY (`birthdate_visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_privacy_ibfk_3` FOREIGN KEY (`phone_visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_privacy_ibfk_4` FOREIGN KEY (`email_visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`);

--
-- Constraints for table `users_school`
--
ALTER TABLE `users_school`
  ADD CONSTRAINT `fk_fk_visibility_id_1` FOREIGN KEY (`visibility_type`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`),
  ADD CONSTRAINT `fk_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_show_intrest`
--
ALTER TABLE `users_show_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_show_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_show_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_sport_men_intrest`
--
ALTER TABLE `users_sport_men_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_sport_men_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_sport_men_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_sport_teams_intrest`
--
ALTER TABLE `users_sport_teams_intrest`
  ADD CONSTRAINT `fk_user_visibility_type_users_sport_teams_intrest` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `users_sport_teams_intrest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_town_current_places`
--
ALTER TABLE `users_town_current_places`
  ADD CONSTRAINT `fk_users_town_current_places_city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `fk_users_town_current_places_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_users_town_current_places_visibilty` FOREIGN KEY (`visibility_type`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`);

--
-- Constraints for table `users_universites`
--
ALTER TABLE `users_universites`
  ADD CONSTRAINT `fk_universites_id` FOREIGN KEY (`university_id`) REFERENCES `universites` (`university_id`),
  ADD CONSTRAINT `fk_userid_universites` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_visibility_id_uni_1` FOREIGN KEY (`visibility_type`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`);

--
-- Constraints for table `user_companies`
--
ALTER TABLE `user_companies`
  ADD CONSTRAINT `fk_user_companies_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `fk_user_companies_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_companies_ibfk_1` FOREIGN KEY (`default_visibilty_types`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`),
  ADD CONSTRAINT `user_companies_ibfk_2` FOREIGN KEY (`visibility_type`) REFERENCES `post_visibility_privicy_types` (`posts_visibility_privicy_id`);

--
-- Constraints for table `user_hoobies`
--
ALTER TABLE `user_hoobies`
  ADD CONSTRAINT `fk_user_hoobies_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_users_hobbies_id` FOREIGN KEY (`user_hobbies_id`) REFERENCES `hobbies` (`user_hobbies_id`);

--
-- Constraints for table `user_reletionship_status`
--
ALTER TABLE `user_reletionship_status`
  ADD CONSTRAINT `fk_reletionship_status_type_id` FOREIGN KEY (`reletionship_status_type_id`) REFERENCES `reletionship_status_types` (`reletionship_status_type_id`),
  ADD CONSTRAINT `fk_user_reletionship_status_partner_id` FOREIGN KEY (`partner_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_user_reletionship_status_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_user_reletionship_status_visibility` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`);

--
-- Constraints for table `websites_link`
--
ALTER TABLE `websites_link`
  ADD CONSTRAINT `fk_websites_links` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`),
  ADD CONSTRAINT `websites_link_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `websites_link_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `websites_link_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `websites_link_ibfk_4` FOREIGN KEY (`visibility_type`) REFERENCES `reletionship_visibility_privicy_types` (`reletionship_visibility_privicy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
