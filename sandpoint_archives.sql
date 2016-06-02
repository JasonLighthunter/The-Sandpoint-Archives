-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 08:48 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandpoint_archives`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_value` int(3) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `role_value`) VALUES
(1, 'admin', 'admin', 7),
(2, 'user', 'user', 1),
(3, 'test', 'testtest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alignments`
--

CREATE TABLE IF NOT EXISTS `alignments` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alignments`
--

INSERT INTO `alignments` (`id`, `name`, `abbreviation`) VALUES
(1, 'Lawful Good', 'LG'),
(2, 'Neutral Good', 'NG'),
(3, 'Chaotic Good', 'CG'),
(4, 'Lawful Neutral', 'LN'),
(5, 'True Neutral', 'N'),
(6, 'Chaotic Neutral', 'CN'),
(7, 'Lawful Evil', 'LE'),
(8, 'Neutral Evil', 'NE'),
(9, 'Chaotic Evil', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `armor_types`
--

CREATE TABLE IF NOT EXISTS `armor_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armor_types`
--

INSERT INTO `armor_types` (`id`, `name`) VALUES
(1, 'Light Armor'),
(2, 'Medium Armor'),
(3, 'Heavy Armor'),
(4, 'Shields'),
(5, 'Armor Extras');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Child of 1 and 2'),
(3, 'Child of 1 and 3'),
(7, 'Child of 2 and 4'),
(8, 'Child of 4 and 3'),
(1, 'Parent 1'),
(2, 'Parent 2'),
(5, 'Parent 3'),
(6, 'Parent 4'),
(17, 'sdfsdfsf'),
(9, 'testCat'),
(10, 'tt');

-- --------------------------------------------------------

--
-- Table structure for table `categories_categories`
--

CREATE TABLE IF NOT EXISTS `categories_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_categories`
--

INSERT INTO `categories_categories` (`id`, `parent_id`, `child_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 4),
(4, 2, 7),
(5, 5, 3),
(6, 5, 8),
(7, 6, 7),
(8, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01745f110b45156c80885033a5d45aac42f65b31', '::1', 1464887657, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838373430393b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('07d014c05f5a58edcd52b863714585e5ba569a0a', '::1', 1464891593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343839313330343b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('0c3f0cc47e5194cd577a8b47ea2a7ff34f0f08dd', '::1', 1464863261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343836333132373b),
('0c810c4cbabce34748636fde05bf84e6c9f64158', '::1', 1464891175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343839303934313b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('15e0a07a304ba573317dd11f41bf563a1df35ec0', '::1', 1464890675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343839303433393b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('162ff669a223a2f36f66f106c48baecb6219d59c', '::1', 1464810225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831303232323b),
('1b24c0489a53b3e65dbaed4008c90ec126fc2bb7', '::1', 1464876620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343837363335353b),
('1eb08a68f338bfba64dba352ef8a913e78bb0bdd', '::1', 1464883438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838333433373b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('2665b4dc687c3e9e251091b397bb9fcb613f5fde', '::1', 1464891799, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343839313632373b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('3a945bee820fc94e5265764b1d3f48024a0c04bd', '::1', 1464861947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343836313934373b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('43c799c0b0b0381d1e621fea89f41f3d8fa158d0', '::1', 1464812780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831323536383b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('53ac8861c0016a4b1864c1cd53d28f3f72cc982f', '::1', 1464892126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343839313933303b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('53ff911a97b2f99693cd2dc1d8241c71b6dc5b88', '::1', 1464884676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838343437393b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('546b16721cac4b0df60c42598045d1651035b5fe', '::1', 1464877486, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343837373438353b),
('6798524af15d2bbf7f96238648f90cb1d21bb3ab', '::1', 1464861448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343836313235303b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('68e15249bc92a3bbf7fa4f5e1c5363067423fdd0', '::1', 1464883112, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838323838383b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('6e2067b31ec9cc7366610040a4654821fedb2526', '::1', 1464878029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343837383032373b),
('6f89e1cdc9221bf4dc0b8e3150cce1c91ce0a1b9', '::1', 1464810970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831303935323b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('7e11a6b5d920a27b32611c8194064b5629282926', '::1', 1464811835, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831313535393b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('902bc1ef5dc0f08bcdbad1e1eb30485b096366b6', '::1', 1464888113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838373935343b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('99c6bd845465acdf406814a9b843774fdb0116da', '::1', 1464812130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831323133303b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('9f848d8ccf495e9dc1549add127adf7e60ecbb0f', '::1', 1464863085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343836323830343b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('a4a0422d17f9c4c9ad12ca13be936dbcc6ab4cde', '::1', 1464813269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831333034393b696e41646d696e4d6f64657c623a313b),
('a7d6fc556ce7b2c4c9f665ad2a1c2be07d371c35', '::1', 1464813704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831333730343b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('ae82ee2fab4c7d3caa7017c86abdaa0ce6663ff5', '::1', 1464889035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838383931353b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('c07bb33bebc0068f51e5d8b7c0420a345c443ea6', '::1', 1464877324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343837373037303b),
('c2c77f7fd48c98c83234818fafc1056c74b51f97', '::1', 1464813556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831333338363b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('d2df20023be19904754d02257de13aae919785a2', '::1', 1464885500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343838353434373b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('e8a1c4b0049deff0e3e94b0bf61b73c008be1b07', '::1', 1464815373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343831353135303b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b),
('f3512a969d8ba109f55ad78d12674e176d5c9ae3', '::1', 1464877065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343837363736353b),
('f6c654bfa84f5528ec80e44a97dcfc7a53ff56cf', '::1', 1464861830, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343836313539383b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d696e41646d696e4d6f64657c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `feats`
--

CREATE TABLE IF NOT EXISTS `feats` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `benefit` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feats`
--

INSERT INTO `feats` (`id`, `name`, `description`, `benefit`) VALUES
(1, 'Acrobatic', 'You are skilled at leaping, jumping, and flying.', 'You get a +2 bonus on all Acrobatics and Fly skill checks. If you have 10 or more ranks in one of these, the bonus increases to +4 for that skill.'),
(2, 'Agile Maneuvers', 'You''ve learned to use your quickness in place of brute force when performing combat maneuvers.', 'You add your Dexterity bonus to your base attack bonus and size bonus when determining your Combat Maneuver Bonus instead of your Strength bonus.'),
(3, 'Alertness', 'You often notice things that others might miss.', 'You get a +2 bonus on Perception and Sense Motive skill checks. If you have 10 or more ranks in one of these skills, the bonus increases to +4 for that skill.');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `item_class` int(11) NOT NULL,
  `weapon_class` int(11) DEFAULT NULL,
  `armor_type` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `item_class`, `weapon_class`, `armor_type`) VALUES
(1, 'Gauntlet', 'This metal glove lets you deal lethal damage rather than nonlethal damage with unarmed strikes. A strike with a gauntlet is otherwise considered an unarmed attack. Your opponent cannot use a disarm action to disarm you of gauntlets.', 5, 2, NULL),
(2, 'Unarmed Strike', 'An unarmed strike is an attack such as a punch or a kick where the attacker is not using a weapon to make the attack. A Medium character deals 1d3 points of nonlethal damage with an unarmed strike. A Small character deals 1d2 points of nonlethal damage. A monk or any character with the Improved Unarmed Strike feat can deal lethal or nonlethal damage with unarmed strikes at his discretion. The damage from an unarmed strike is considered weapon damage for the purposes of effects that give you a bonus on weapon damage rolls.  An unarmed strike is always considered a light weapon. Therefore, you can use the Weapon Finesse feat to apply your Dexterity modifier instead of your Strength modifier to attack rolls with an unarmed strike. Unarmed strikes do not count as natural weapons. An unarmed strike can''t be disarmed.', 5, 2, NULL),
(3, 'Longsword', 'This sword is about 3-1/2 feet in length.', 5, 3, NULL),
(4, 'Leather Armor', 'Leather armor is made up of pieces of hard boiled leather carefully sewn together.', 2, NULL, 1),
(5, 'Fang (Wolf)', 'A fang that once belonged to a wolf.', 3, NULL, NULL),
(6, 'Piece of Parchment', 'A dry piece of parchment', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_classes`
--

CREATE TABLE IF NOT EXISTS `item_classes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `uri` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_classes`
--

INSERT INTO `item_classes` (`id`, `name`, `uri`) VALUES
(2, 'Armor', 'items/armor'),
(3, 'Goods', 'items/goods'),
(4, 'Spell Components', 'items/spellComponents'),
(5, 'Weapons', 'items/weapons');

-- --------------------------------------------------------

--
-- Table structure for table `nav_items`
--

CREATE TABLE IF NOT EXISTS `nav_items` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `uri` varchar(100) NOT NULL,
  `has_children` tinyint(1) NOT NULL DEFAULT '0',
  `table_name_children` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav_items`
--

INSERT INTO `nav_items` (`id`, `name`, `uri`, `has_children`, `table_name_children`) VALUES
(1, 'Home', 'home', 0, NULL),
(3, 'Alignments', 'alignments', 0, NULL),
(4, 'Feats', 'feats', 0, NULL),
(5, 'Items', 'items', 1, 'item_classes'),
(6, 'Categories', 'categories', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`) VALUES
(1, 'home', 'Welcome to the Sandpoint Archives. Here we offer but a humble collection of information useful for the adventuring types.'),
(2, 'loggedIn', 'You cannot log in at the moment. Please log out first.'),
(3, 'noPermissions', 'You do not have the rights to create, edit or delete data.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(50) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'admin', 4),
(2, 'user', 1),
(3, 'moderator', 2);

-- --------------------------------------------------------

--
-- Table structure for table `weapon_classes`
--

CREATE TABLE IF NOT EXISTS `weapon_classes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weapon_classes`
--

INSERT INTO `weapon_classes` (`id`, `name`) VALUES
(2, 'Simple'),
(3, 'Martial'),
(4, 'Exotic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alignments`
--
ALTER TABLE `alignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armor_types`
--
ALTER TABLE `armor_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `categories_categories`
--
ALTER TABLE `categories_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `feats`
--
ALTER TABLE `feats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_classes`
--
ALTER TABLE `item_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav_items`
--
ALTER TABLE `nav_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Indexes for table `weapon_classes`
--
ALTER TABLE `weapon_classes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alignments`
--
ALTER TABLE `alignments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `armor_types`
--
ALTER TABLE `armor_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `categories_categories`
--
ALTER TABLE `categories_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feats`
--
ALTER TABLE `feats`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_classes`
--
ALTER TABLE `item_classes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nav_items`
--
ALTER TABLE `nav_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `weapon_classes`
--
ALTER TABLE `weapon_classes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
