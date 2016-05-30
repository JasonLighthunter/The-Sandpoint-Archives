-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2016 at 06:11 PM
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
