-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 05:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recensie_id` int(11) NOT NULL,
  `inhoud_comment` varchar(255) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `helpful_score_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `naam_game` varchar(255) NOT NULL,
  `cijfer_gebruiker` int(11) NOT NULL,
  `cijfer_recensent` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `naam_game`, `cijfer_gebruiker`, `cijfer_recensent`, `genre`) VALUES
(114, 'Star Wars: The Old Republic', 0, 0, 'Role-playing (RPG)'),
(116, 'Star Wars: Knights of the Old Republic', 0, 0, 'Adventure'),
(118, 'Star Wars: Knights of the Old Republic II - The Sith Lords', 0, 0, 'Adventure'),
(137, 'Star Wars: The Force Unleashed II', 0, 0, 'Adventure'),
(139, 'Star Wars: Galactic Battlegrounds', 0, 0, 'Strategy'),
(140, 'Star Wars: Galactic Battlegrounds - Clone Campaigns', 0, 0, 'Strategy'),
(141, 'Star Wars: Battlefront', 0, 0, 'Shooter'),
(142, 'Star Wars: Battlefront II', 0, 0, 'Adventure'),
(143, 'Star Wars: Demolition', 0, 0, 'Racing'),
(145, 'Star Wars Galaxies: An Empire Divided', 0, 0, 'Adventure'),
(146, 'Star Wars Galaxies: Rage of the Wookiees', 0, 0, 'Role-playing (RPG)'),
(147, 'Star Wars Galaxies: Jump to Lightspeed', 0, 0, 'Simulator'),
(148, 'Star Wars: Republic Commando', 0, 0, 'Adventure'),
(149, 'Star Wars: Starfighter', 0, 0, 'Simulator'),
(150, 'Star Wars: Jedi Knight - Dark Forces II', 0, 0, 'Shooter'),
(151, 'Star Wars: Rebellion', 0, 0, 'Strategy'),
(152, 'Star Wars: Jedi Knight II - Jedi Outcast', 0, 0, 'Adventure'),
(153, 'Star Wars: Jedi Knight - Jedi Academy', 0, 0, 'Adventure'),
(154, 'Star Wars: Episode I - Racer', 0, 0, 'Racing'),
(155, 'Star Wars: Yoda Stories', 0, 0, 'Adventure'),
(156, 'Star Wars: Episode I - Battle for Naboo', 0, 0, 'Shooter'),
(157, 'Star Wars: Dark Forces', 0, 0, 'Shooter'),
(158, 'Star Wars Episode I: The Phantom Menace', 0, 0, 'Adventure'),
(159, 'Star Wars: Force Commander', 0, 0, 'Strategy'),
(160, 'Star Wars: Jedi Knight - Mysteries of the Sith', 0, 0, 'Shooter'),
(161, 'Star Wars: Rebel Assault', 0, 0, 'Shooter'),
(162, 'Star Wars: Rebel Assault II - The Hidden Empire', 0, 0, 'Arcade'),
(163, 'Star Wars: Rogue Squadron', 0, 0, 'Simulator'),
(164, 'Star Wars: Shadows of the Empire', 0, 0, 'Adventure'),
(166, 'Star Wars: TIE Fighter', 0, 0, 'Simulator'),
(167, 'Star Wars: TIE Fighter - Defender of the Empire', 0, 0, 'Simulator'),
(168, 'Star Wars: X-Wing', 0, 0, 'Simulator'),
(169, 'Star Wars: X-Wing Alliance', 0, 0, 'Simulator'),
(170, 'Star Wars: X-Wing vs. TIE Fighter', 0, 0, 'Simulator'),
(171, 'Star Wars: X-Wing Tour of Duty - B-Wing', 0, 0, 'Simulator'),
(172, 'Star Wars: X-Wing vs. TIE Fighter - Balance of Power', 0, 0, 'Simulator'),
(173, 'Star Wars: X-Wing Tour of Duty - Imperial Pursuit', 0, 0, 'Simulator'),
(174, 'Star Wars: Empire at War - Forces of Corruption', 0, 0, 'Strategy'),
(190, 'LEGO Star Wars II: The Original Trilogy', 0, 0, 'Adventure'),
(206, 'Star Wars Galaxies: Trials of Obi-Wan', 0, 0, 'Adventure'),
(210, 'Star Wars: The Clone Wars - Republic Heroes', 0, 0, 'Adventure'),
(475, 'Star Wars: The Force Unleashed', 0, 0, 'Adventure'),
(476, 'Star Wars: Battlefront - Elite Squadron', 0, 0, 'Adventure'),
(2113, 'Star Wars Battlefront', 0, 0, 'Adventure'),
(2681, 'LEGO Star Wars: The Video Game', 0, 0, 'Adventure'),
(2682, 'LEGO Star Wars: The Complete Saga', 0, 0, 'Adventure'),
(3282, 'Star Trek: Deep Space Nine - Dominion Wars', 0, 0, 'Adventure'),
(4180, 'Star Wars: Bounty Hunter', 0, 0, 'Platform'),
(4181, 'Star Wars: Rogue Squadron II - Rogue Leader', 0, 0, 'Simulator'),
(4182, 'Star Wars: Rogue Squadron III - Rebel Strike', 0, 0, 'Arcade'),
(4674, 'Angry Birds Star Wars', 0, 0, 'Arcade'),
(5194, 'Star Wars: The Clone Wars – Lightsaber Duels', 0, 0, 'Adventure'),
(5599, 'Star Wars: Obi-Wan', 0, 0, 'Adventure'),
(5706, 'Star Wars: The Empire Strikes Back', 0, 0, 'Arcade'),
(6159, 'Star Wars: Episode III - Revenge of the Sith', 0, 0, 'Adventure'),
(6160, 'Star Wars: Jedi Starfighter', 0, 0, 'Simulator'),
(6606, 'Star Wars: Episode I - Jedi Power Battles', 0, 0, 'Adventure'),
(6607, 'Star Wars: The New Droid Army', 0, 0, 'Platform'),
(6608, 'Star Wars: Flight of the Falcon', 0, 0, 'Shooter'),
(6609, 'Star Wars Trilogy: Apprentice of the Force', 0, 0, 'Platform'),
(6844, 'LEGO Star Wars III: The Clone Wars', 0, 0, 'Adventure'),
(8147, 'Star Wars: The Battle of Yavin', 0, 0, 'Indie'),
(8148, 'Star Wars: The Battle of Endor', 0, 0, 'Indie'),
(8799, 'Star Wars: TIE Fighter - Enemies of the Empire', 0, 0, 'Adventure'),
(9851, 'Star Wolves 3: Civil War', 0, 0, 'Strategy'),
(10203, 'Star Wars: Jedi Arena', 0, 0, 'Fighting'),
(10204, 'Star Wars: Return of the Jedi - Death Star Battle', 0, 0, 'Arcade'),
(10205, 'Star Wars: Return of the Jedi: Ewok Adventure', 0, 0, 'Shooter'),
(11178, 'Star Wars: The Old Republic - Knights of the Fallen Empire', 0, 0, 'Role-playing (RPG)'),
(11289, 'Star Wars Chess', 0, 0, 'Strategy'),
(12594, 'Star Wars: The Empire Strikes Back', 0, 0, 'Adventure'),
(12732, 'Star Wars: The Empire Strikes Back', 0, 0, 'Arcade'),
(12842, 'Star Wars: Return of the Jedi', 0, 0, 'Arcade'),
(13483, 'Star Wars: Pit Droids', 0, 0, 'Puzzle'),
(14401, 'Star Wars: Knights of the Old Republic III', 0, 0, 'Adventure'),
(16469, 'Star Crusade CCG', 0, 0, 'Strategy'),
(17030, 'LEGO Star Wars: The Force Awakens', 0, 0, 'Adventure'),
(17474, 'Star Wars: The Force Unleashed - Hoth Mission Pack', 0, 0, 'Adventure'),
(17475, 'Star Wars: The Force Unleashed - Tatooine Mission Pack', 0, 0, 'Adventure'),
(17476, 'Star Wars: The Force Unleashed - Jedi Temple Mission Pack', 0, 0, 'Adventure'),
(18044, 'Star Wars: Masters of Teräs Käsi', 0, 0, 'Fighting'),
(18046, 'Star Wars: Super Bombad Racing', 0, 0, 'Racing'),
(18161, 'Star Wars Battlefront: Outer Rim', 0, 0, 'Shooter'),
(18950, 'Star Wars Episode I: Obi-Wan\'s Adventures', 0, 0, 'Adventure'),
(18951, 'Star Wars: Episode II – Attack of the Clones', 0, 0, 'Adventure'),
(19272, 'Angry Birds Star Wars II', 0, 0, 'Arcade'),
(19419, 'Star Wars: Racer Revenge', 0, 0, 'Racing'),
(19429, 'Star Wars: Commander', 0, 0, 'Strategy'),
(19577, 'Star Wars: Galaxy of Heroes', 0, 0, 'Tactical'),
(19637, 'Star Wars: The Force Unleashed - Ultimate Sith Edition', 0, 0, 'Adventure'),
(19869, 'Star Wars Battlefront: Bespin', 0, 0, 'Shooter'),
(20004, 'Pinball FX3: Star Wars Pinball', 0, 0, 'Pinball'),
(20005, 'Pinball FX3: Star Wars Pinball - Balance of the Force', 0, 0, 'Pinball'),
(20006, 'Star Wars Pinball: Heroes of the Force', 0, 0, 'Simulator'),
(20031, 'Super Star Wars', 0, 0, 'Adventure'),
(20470, 'Star Wars Battlefront: Death Star', 0, 0, 'Simulator'),
(20937, 'LEGO Star Wars: Microfighters', 0, 0, 'Racing'),
(20949, 'Pinball FX2: Star Wars Rebels', 0, 0, 'Platform'),
(21335, 'Star Wars: The Clone Wars – Jedi Alliance', 0, 0, 'Adventure'),
(21739, 'Star Wars: Clone Wars Adventures', 0, 0, 'Role-playing (RPG)'),
(21743, 'Star Wars: Trench Run', 0, 0, 'Simulator'),
(22196, 'Star Wars Pinball: The Empire Strikes Back', 0, 0, 'Platform'),
(22626, 'Star Wars: TIE Fighter - Collector\'s CD-ROM', 0, 0, 'Simulator'),
(22655, 'Star Wars: The Old Republic - Rise of the Hutt Cartel', 0, 0, 'Role-playing (RPG)'),
(22656, 'Star Wars: The Old Republic - Galactic Starfighter', 0, 0, 'Shooter'),
(22657, 'Star Wars: The Old Republic - Galactic Strongholds', 0, 0, 'Role-playing (RPG)'),
(22658, 'Star Wars: The Old Republic - Shadow of Revan', 0, 0, 'Adventure'),
(22659, 'Star Wars: The Old Republic - Knights of the Eternal Throne', 0, 0, 'Role-playing (RPG)'),
(23063, 'Star Wars: Battlefront - Renegade Squadron', 0, 0, 'Shooter'),
(23116, 'Star Wars: Lethal Alliance', 0, 0, 'Adventure'),
(23293, 'Star Wars Battlefront: Battle of Jakku', 0, 0, 'Shooter'),
(23365, 'Star Wars: The Battle for Hoth', 0, 0, 'Shooter'),
(23976, 'Star Wars Rebels: Recon Missions', 0, 0, 'Indie'),
(24227, 'Pinball FX 2: Star Wars', 0, 0, 'Strategy'),
(25304, 'Star Wars: Uprising', 0, 0, 'Adventure'),
(25939, 'Star Fleet I: The War Begins!', 0, 0, 'Turn-based strategy (TBS)'),
(26201, 'Star Wars Battlefront: Rogue One - Scarif', 0, 0, 'Shooter'),
(26401, 'Star Wars Battlefront II', 0, 0, 'Adventure'),
(26404, 'Star Wars Battlefront: Rogue One - X-Wing VR Mission', 0, 0, 'Simulator'),
(26928, 'Star Wars Pinball: Rogue One', 0, 0, 'Pinball'),
(33161, 'STAR WARS: Rebel Assault I + II', 0, 0, 'Arcade'),
(33562, 'Falling Stars: War of Empires', 0, 0, 'Indie'),
(34982, 'Star Wars: Trials on Tatooine', 0, 0, 'Adventure'),
(35596, 'Star Wars: Galactic Battlegrounds Saga', 0, 0, 'Strategy'),
(35967, 'Star Wars: X-Wing - Special Edition', 0, 0, 'Simulator'),
(35968, 'Star Wars: TIE Fighter - Special Edition', 0, 0, 'Simulator'),
(39245, 'Star Wars: Tiny Death Star', 0, 0, 'Simulator'),
(39252, 'Star Wars Pinball 4', 0, 0, 'Arcade'),
(39351, 'Star Wars Trilogy Arcade', 0, 0, 'Shooter'),
(39822, 'Star Wars Arcade', 0, 0, 'Simulator'),
(40636, 'Star Wars: Ewok Adventure', 0, 0, 'Simulator'),
(44463, 'Super Star Wars: The Empire Strikes Back', 0, 0, 'Adventure'),
(45379, 'Star Wars: Attack on the Death Star', 0, 0, 'Shooter'),
(46892, 'Star Wars: The Arcade Game', 0, 0, 'Shooter'),
(47460, 'Star Wars: The Force Unleashed II - Collector\'s Edition', 0, 0, 'Adventure'),
(48939, 'Super Star Wars: Return of the Jedi', 0, 0, 'Arcade'),
(51486, 'Star Wars Battlefront II: Elite Trooper Deluxe Edition', 0, 0, 'Shooter'),
(52877, 'Pinball FX3: Star Wars Pinball - Heroes Within', 0, 0, 'Pinball'),
(52879, 'Star Wars Battlefront: X-Wing VR Mission', 0, 0, 'Adventure'),
(53271, 'LEGO Star Wars: The Force Awakens - Deluxe Edition', 0, 0, 'Adventure'),
(53663, 'STAR WARS Battlefront: Ultimate Edition', 0, 0, 'Simulator'),
(53664, 'Star Wars Classics Collection', 0, 0, 'Arcade'),
(54400, 'Star Wars Collection', 0, 0, 'Arcade'),
(54401, 'Star Wars: Jedi Knight Collection', 0, 0, 'Adventure'),
(56127, 'Star Wars: Maul', 0, 0, 'Adventure'),
(56979, 'Star Wars: Millennium Falcon CD-ROM Playset', 0, 0, 'Adventure'),
(57943, 'Star Wars: Battle Above Coruscant', 0, 0, 'Adventure'),
(58943, 'Star Wars: Card Trader', 0, 0, 'Simulator'),
(59613, 'Vestaria Saga', 0, 0, 'Turn-based strategy (TBS)'),
(61864, 'Star Wars: Droids - The Adventures of R2-D2 and C-3PO', 0, 0, 'Puzzle'),
(62510, 'Star Wars: Attack Squadrons', 0, 0, 'Simulator'),
(62669, 'Star Wars: Jedi Adventure', 0, 0, 'Adventure'),
(63429, 'LEGO Star Wars: The Yoda Chronicles', 0, 0, 'Adventure'),
(64562, 'Star Wars: First Assault', 0, 0, 'Shooter'),
(65161, 'Star Wars: Jedi Trials', 0, 0, 'Shooter'),
(66235, 'Star Wars: Imperial Academy', 0, 0, 'Shooter'),
(66424, 'Star Wars: Battle for Hoth', 0, 0, 'Adventure'),
(66790, 'Star Wars: Cantina', 0, 0, 'Arcade'),
(67944, 'Star Wars: Racer Arcade', 0, 0, 'Arcade'),
(68817, 'Star Wars: Monopoly', 0, 0, 'Card & Board Game'),
(70221, 'Star Wars: Yoda\'s Challenge Activity Center', 0, 0, 'Quiz/Trivia'),
(71404, 'Star Trek: Starfleet Command Volume II - Empires at War', 0, 0, 'Strategy'),
(72636, 'Star Wars Galaxies Trading Card Games : Champions of the Force', 0, 0, 'Strategy'),
(73217, 'Star Wars: Anakin\'s Speedway', 0, 0, 'Racing'),
(73254, 'Star Wars Math: Jabba\'s Game Galaxy', 0, 0, 'Shooter'),
(74551, 'Star Wars: Knights of the Old Republic - Yavin Station', 0, 0, 'Adventure'),
(74700, 'Untitled Star Wars project', 0, 0, 'Shooter'),
(74701, 'Star Wars Jedi: Fallen Order', 0, 0, 'Adventure'),
(74866, 'Star Wars: Force Arena', 0, 0, 'Strategy'),
(74884, 'Star Wars: The Force Unleashed - Character Pack 1', 0, 0, 'Adventure'),
(74885, 'Star Wars: The Force Unleashed - Character Pack 2', 0, 0, 'Adventure'),
(74895, 'Star Wars: The Force Unleashed II - The Battle of Endor', 0, 0, 'Adventure'),
(74896, 'Star Wars: The Force Unleashed II - Character Pack', 0, 0, 'Adventure'),
(74901, 'Star Wars Arcade: Falcon Gunner', 0, 0, 'Arcade'),
(74963, 'Pinball FX3: Star Wars Pinball - Unsung Heroes', 0, 0, 'Pinball'),
(74964, 'Pinball FX3: Star Wars Pinball - The Force Awakens', 0, 0, 'Pinball'),
(74976, 'Star Wars Episode I', 0, 0, 'Pinball'),
(74979, 'LEGO Star Wars: The Quest for R2-D2', 0, 0, 'Adventure'),
(75085, 'Star Wars: The Best of PC', 0, 0, 'Adventure'),
(75086, 'Star Wars: Battle Pod', 0, 0, 'Arcade'),
(75087, 'Star Wars: Outpost', 0, 0, 'Simulator'),
(75088, 'Star Wars: Battle of the Sith Lords', 0, 0, 'Adventure'),
(75089, 'Star Wars: Jedi Challenges', 0, 0, 'Fighting'),
(75559, 'Star Wars: Grievous Getaway', 0, 0, 'Racing'),
(75560, 'Star Wars: Imperial Ace', 0, 0, 'Simulator'),
(75561, 'Star Wars: The Battle Above Coruscant', 0, 0, 'Shooter'),
(75562, 'Star Wars: Republic Commando: Order 66', 0, 0, 'Strategy'),
(75564, 'Star Wars: Assault Team', 0, 0, 'Adventure'),
(75565, 'Star Wars: Galactic Defense', 0, 0, 'Role-playing (RPG)'),
(75566, 'Star Wars: Heroes Path', 0, 0, 'Strategy'),
(76411, 'Star Wars: Imperial Assault - Legends of the Alliance', 0, 0, 'Adventure'),
(76665, 'Space Wars: Darth Star', 0, 0, 'Indie'),
(76721, 'Star Wars Battlefront: Mobile Squadrons', 0, 0, 'Shooter'),
(76722, 'Star Wars: Battlefront III', 0, 0, 'Shooter'),
(76730, 'Star Wars Episode I: The Gungan Frontier', 0, 0, 'Adventure'),
(76886, 'Star Wars Battlefront II: The Last Jedi Season', 0, 0, 'Shooter'),
(76946, 'Star Wars: Droid Repair Bay', 0, 0, 'Adventure'),
(77212, 'Star Wars: Galaxies - Starter Kit', 0, 0, 'Adventure'),
(78357, 'Star Wars: The Clone Wars', 0, 0, 'Card & Board Game'),
(86087, 'Star Wars Challenge', 0, 0, 'Card & Board Game'),
(86260, 'Star Wars Pinball', 0, 0, 'Arcade'),
(91312, 'Star Wars Dice', 0, 0, 'Simulator'),
(91751, 'Star Wars: Jedi Reading', 0, 0, 'Simulator'),
(92035, 'Star Wars: Jedi Math', 0, 0, 'Card & Board Game'),
(93832, 'Star Wars: Empire at War - Gold Pack', 0, 0, 'Strategy'),
(95480, 'Star Wars: DroidWorks', 0, 0, 'Quiz/Trivia'),
(97355, 'Star Wars: Puzzle Droids', 0, 0, 'Shooter'),
(97498, 'Star Wars Rebels: Chopper Chase', 0, 0, 'Indie'),
(99756, 'STAR WARS Throwback Pack', 0, 0, 'Arcade'),
(99757, 'Star Wars Pinball Season 1 Bundle', 0, 0, 'Arcade'),
(102600, 'Angry Birds Star Wars HD', 0, 0, 'Arcade'),
(109123, 'Space Wars 3D Star Combat Simulator', 0, 0, 'Indie'),
(112586, 'Star Wars Battlefront II: Battle of Geonosis', 0, 0, 'Shooter'),
(115714, 'STAR WARS Battlefront: Hoth Bundle', 0, 0, 'Adventure'),
(117405, 'Star Wars Jedi: Fallen Order - Deluxe Edition', 0, 0, 'Adventure'),
(119305, 'LEGO Star Wars: The Skywalker Saga', 0, 0, 'Adventure'),
(119920, 'STAR WARS PS3 Mega Bundle', 0, 0, 'Adventure'),
(122557, 'LEGO Star Wars Battles', 0, 0, 'Real Time Strategy (RTS)'),
(125987, 'Vader Immortal: A Star Wars VR Series', 0, 0, 'Adventure'),
(128334, 'Star Wars Battlefront II: Celebration Edition', 0, 0, 'Adventure'),
(129535, 'Star Wars: Battlefront - Deluxe Edition', 0, 0, 'Adventure'),
(131065, 'Star Wars Trilogy Pinball', 0, 0, 'Shooter'),
(131437, 'Untitled Visceral Star Wars Game', 0, 0, 'Arcade'),
(131479, 'Original Star Wars Trilogy Pinball', 0, 0, 'Adventure'),
(134209, 'Star Wars: The Empire Strikes Back', 0, 0, 'Shooter'),
(134706, 'Star Wars: Squadrons', 0, 0, 'Simulator'),
(134955, 'Star Wars: Secrets of the Empire', 0, 0, 'Adventure'),
(134957, 'Star Wars: Tales from the Galaxy’s Edge', 0, 0, 'Adventure'),
(135969, 'Star Wars: The Old Republic - Collector\'s Edition', 0, 0, 'Adventure'),
(136076, 'Star Wars Pinball for Nintendo Switch', 0, 0, 'Arcade'),
(137006, 'Star Wars: Project Stardust', 0, 0, 'Simulator'),
(137191, 'Star Wars Episode III: Revenge of the Sith - Activity Center', 0, 0, 'Adventure'),
(138105, 'LEGO Star Wars: The Skywalker Saga - Deluxe Edition', 0, 0, 'Adventure'),
(138124, 'Star Wars Battlefront II: Resurrection', 0, 0, 'Adventure'),
(138161, 'LEGO Star Wars: The Force Awakens - Poe\'s Quest For Survival', 0, 0, 'Adventure'),
(138163, 'LEGO Star Wars: The Force Awakens - The Phantom Limb', 0, 0, 'Adventure'),
(138164, 'LEGO Star Wars: The Force Awakens - First Order Siege of Takodana', 0, 0, 'Adventure'),
(138165, 'LEGO Star Wars: The Force Awakens - Escape From Starkiller Base', 0, 0, 'Adventure'),
(138291, 'Star Wars: Rogue Squadron III - Rebel Strike Preview Disc', 0, 0, 'Arcade'),
(138293, 'Star Wars: Jeopardy', 0, 0, 'Card & Board Game'),
(138433, 'Remnant: Planar Wars 3D', 0, 0, 'Shooter'),
(139075, 'Star Wars Combine', 0, 0, 'Simulator'),
(139937, 'LEGO Star Wars: The Skywalker Saga - Classic Character Edition', 0, 0, 'Arcade'),
(144432, 'Star Wars Doom', 0, 0, 'Shooter'),
(144434, 'Star Wars: Chibi Rebellion', 0, 0, 'Shooter'),
(145123, 'Star Wars Jedi Outcast/Jedi Academy', 0, 0, 'Simulator'),
(146363, 'Star Wars Pinball VR', 0, 0, 'Pinball'),
(150053, 'Vader Immortal – Lightsaber Dojo: A Star Wars VR Experience', 0, 0, 'Arcade'),
(150523, 'Star Wars Galaxies: The Complete Online Adventures', 0, 0, 'Adventure'),
(160300, 'Pinball FX3: Star Wars Pinball - Solo', 0, 0, 'Simulator'),
(163288, 'Star Realms: Colony Wars', 0, 0, 'Strategy'),
(164014, 'Pinball FX3: Star Wars Pinball - The Force Awakens Pack', 0, 0, 'Simulator'),
(164022, 'Pinball FX3: Star Wars Pinball - The Last Jedi', 0, 0, 'Simulator'),
(164777, 'EA Star Wars Triple Bundle', 0, 0, 'Adventure'),
(166008, 'Star Wars: Tales from the Galaxy\'s Edge - Last Call', 0, 0, 'Adventure'),
(166198, 'Nations At War Digital: White Star Rising Battlepack 1', 0, 0, 'Indie'),
(166201, 'Nations At War Digital: White Star Rising Battlepack 2', 0, 0, 'Indie'),
(166260, 'Vader Immortal: A Star Wars VR Series - Special Retail Edition', 0, 0, 'Arcade'),
(166484, 'Star Wars: Episode III - Revenge of the Sith', 0, 0, 'Hack and slash/Beat \'em up'),
(167612, 'Star Wars: Episode III - Revenge of the Sith', 0, 0, 'Platform'),
(167641, 'Star Wars: Episode I - Racer', 0, 0, 'Racing'),
(168392, 'Star Wars Racer and Commando Combo', 0, 0, 'Racing'),
(168665, 'Star Wars: Knights of the Old Republic - Remake', 0, 0, 'Role-playing (RPG)'),
(169925, 'Lego Star Wars: The Force Awakens - The Empire Strikes Back Character Pack', 0, 0, 'Adventure'),
(170323, 'Lego Star Wars: The Force Awakens - Prequel Trilogy Character Pack', 0, 0, 'Adventure'),
(170869, 'Lego Star Wars: The Force Awakens - The Clone Wars Character Pack', 0, 0, 'Adventure'),
(180723, 'Star Wars: The Fighter II', 0, 0, 'Arcade'),
(182441, 'LEGO Star Wars: Castaways', 0, 0, 'Shooter'),
(185244, 'Star Wars: Eclipse', 0, 0, 'Adventure'),
(185865, 'Star Wars: Early Learning Activity Center', 0, 0, 'Quiz/Trivia'),
(185866, 'Star Wars: Jar Jar\'s Journey Adventure Book', 0, 0, 'Quiz/Trivia'),
(192925, 'Star Wars: Battlefront - Elite Squadron', 0, 0, 'Adventure'),
(193296, 'Star Wars: The Clone Wars - Republic Heroes', 0, 0, 'Quiz/Trivia'),
(194935, 'LEGO Star Wars: The Complete Saga', 0, 0, 'Adventure'),
(194937, 'LEGO Star Wars II: The Original Trilogy', 0, 0, 'Adventure'),
(194948, 'LEGO Star Wars III: The Clone Wars', 0, 0, 'Adventure'),
(196046, 'LEGO Star Wars: The Skywalker Saga - Character Collection', 0, 0, 'Adventure'),
(197926, 'Star Wars: The Force Unleashed', 0, 0, 'Indie'),
(198108, 'Star Wars: The Force Unleashed', 0, 0, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `recensies`
--

CREATE TABLE `recensies` (
  `recensie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `datum` time NOT NULL,
  `spoilers` tinyint(1) NOT NULL,
  `recensie_cijfer_game` int(11) NOT NULL,
  `helpful_score_recensie` int(11) NOT NULL,
  `inhoud_recensie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_cijfer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `naam`, `email`, `password`, `rol`, `username`, `user_cijfer`) VALUES
(1, 'desley', 'desley.langeveld@hotmail.com', '$2y$10$y.I4pSxnMlB6efhYe1B94OWO1useMpOoUAPd6s.knH0GrAD.UPcXC', '', 'yelsed', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `recensies`
--
ALTER TABLE `recensies`
  ADD PRIMARY KEY (`recensie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198109;

--
-- AUTO_INCREMENT for table `recensies`
--
ALTER TABLE `recensies`
  MODIFY `recensie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
