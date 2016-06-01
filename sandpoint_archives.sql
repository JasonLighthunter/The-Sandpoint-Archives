-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2016 at 07:30 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_value` int(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `alignments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `armor_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Parent 1'),
(2, 'Parent 2'),
(3, 'Child of 1 and 3'),
(4, 'Child of 1 and 2'),
(5, 'Parent 3'),
(6, 'Parent 4'),
(7, 'Child of 2 and 4'),
(8, 'Child of 4 and 3');

-- --------------------------------------------------------

--
-- Table structure for table `categories_categories`
--

CREATE TABLE `categories_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('00aa7d076f10f2ccfe4f48342cc09701ed6486ab', '::1', 1464721767, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732313730383b),
('3625b9046fd9a5ee9b8e7a96da2fd3970a3bfad4', '::1', 1464721613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732313333343b),
('421e29c4dfee38bf535bc0104783b4e5177b7cac', '::1', 1464719359, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343731393138343b),
('439c9551cad2623e6bcfd72d4ae41a12b79fd104', '::1', 1464784646, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343738343634363b),
('44b8bc0000cb4f679bbc4244df04a15498396274', '::1', 1464784754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343738343735343b),
('4c2cd8d705953d60f017655289821bedc8a91472', '::1', 1464719738, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343731393537373b),
('56c75f873968da3e9639b639d858d404b684f597', '::1', 1464791752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739313735323b),
('682bf86b22358edd939d505dcc312951bcb907db', '::1', 1464781079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343738303738343b),
('684addeb743b72b6792a7ac05c89a55f3de20856', '::1', 1464791626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739313339333b),
('6ba9cf0d18d36258e72215d389ef3067043a68a5', '::1', 1464791382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343739313038333b),
('71da4c40adb48fcfcc24d6f1ffdeb11b5d495d5e', '::1', 1464720809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732303531303b),
('7ac34940158e227c376f8518b7bd4a954b36d3b5', '::1', 1464722282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732323136343b),
('998857ba1329fe9bcce0b17786ec63bfb36b1b9a', '::1', 1464691335, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343639313333353b),
('bbf1c61fcd59ccd86fdb927cb65383d24b42945a', '::1', 1464689080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343638393038303b),
('bfbd6207841b346d6e568757c17e201481d8bead', '::1', 1464720395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732303132393b),
('c5b3a571dd0fc4e1c3e17ebeef2aa604b607d99c', '::1', 1464781142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343738313039363b),
('d38b9520c4c773d31e59db45b707871c455ad187', '::1', 1464778980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343737383931393b6c6f67676564496e557365727c613a333a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31303a22726f6c655f76616c7565223b733a313a2237223b7d),
('e41e1ab38ba36afca1e91bce6f6fa0a5e10aaf2e', '::1', 1464721066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436343732303833323b);

-- --------------------------------------------------------

--
-- Table structure for table `feats`
--

CREATE TABLE `feats` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `benefit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `item_class` int(11) NOT NULL,
  `weapon_class` int(11) DEFAULT NULL,
  `armor_type` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `item_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `uri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `nav_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `uri` varchar(100) NOT NULL,
  `has_children` tinyint(1) NOT NULL DEFAULT '0',
  `table_name_children` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav_items`
--

INSERT INTO `nav_items` (`id`, `name`, `uri`, `has_children`, `table_name_children`) VALUES
(1, 'Home', 'home', 0, NULL),
(3, 'Alignments', 'alignments', 0, NULL),
(4, 'Feats', 'feats', 0, NULL),
(5, 'Items', 'items', 1, 'item_classes');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `weapon_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alignments`
--
ALTER TABLE `alignments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `armor_types`
--
ALTER TABLE `armor_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories_categories`
--
ALTER TABLE `categories_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feats`
--
ALTER TABLE `feats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_classes`
--
ALTER TABLE `item_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nav_items`
--
ALTER TABLE `nav_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `weapon_classes`
--
ALTER TABLE `weapon_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
