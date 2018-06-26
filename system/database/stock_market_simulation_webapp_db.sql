-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2018 at 02:11 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_market_simulation_webapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

DROP TABLE IF EXISTS `bank_transactions`;
CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `bank_transaction_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `turn` tinyint(1) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `amount` float(8,2) DEFAULT NULL,
  `users_user_id` mediumint(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `sender` mediumint(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `receiver` mediumint(7) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`bank_transaction_id`),
  KEY `fk_bank_transactions_users1_idx` (`sender`),
  KEY `fk_bank_transactions_users2_idx` (`receiver`),
  KEY `fk_bank_transactions_users3_idx` (`users_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_transactions`
--

INSERT INTO `bank_transactions` (`bank_transaction_id`, `turn`, `type`, `amount`, `users_user_id`, `sender`, `receiver`) VALUES
(0000000001, 8, 'Withdraw', 25.00, 0000120, NULL, 0000131),
(0000000002, 1, 'Withdraw', 20.00, 0000120, NULL, 0000126),
(0000000003, 1, 'Deposit', 21.00, 0000120, 0000126, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clock`
--

DROP TABLE IF EXISTS `clock`;
CREATE TABLE IF NOT EXISTS `clock` (
  `clock_id` tinyint(1) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `current_turn` smallint(2) DEFAULT '0',
  `turn_status` varchar(8) DEFAULT 'started',
  `no_of_all_turns` tinyint(2) DEFAULT '10',
  `current_clock_value` varchar(15) DEFAULT '00:00:00',
  PRIMARY KEY (`clock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clock`
--

INSERT INTO `clock` (`clock_id`, `current_turn`, `turn_status`, `no_of_all_turns`, `current_clock_value`) VALUES
(1, 1, 'started', 10, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_stocks`
--

DROP TABLE IF EXISTS `company_stocks`;
CREATE TABLE IF NOT EXISTS `company_stocks` (
  `company_stock_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `company_stock_name` varchar(45) DEFAULT NULL,
  `users_user_id` mediumint(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `original_quantity` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `previous_price` float(8,2) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `type` varchar(8) DEFAULT 'sell',
  PRIMARY KEY (`company_stock_id`),
  KEY `fk_company_stocks_users_idx` (`users_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_stocks`
--

INSERT INTO `company_stocks` (`company_stock_id`, `company_stock_name`, `users_user_id`, `original_quantity`, `quantity`, `previous_price`, `price`, `type`) VALUES
(00000001, 'PCH-PLC-SET-1', 0000121, 2000, 2000, 6.00, 0.00, 'sell'),
(00000002, 'EC-PLC-SET-1', 0000122, 2000, 2000, 8.00, 1.00, 'sell'),
(00000003, 'PCH-PLC-SET-2', 0000121, 5000, 5000, 13.00, 8.00, 'sell'),
(00000004, 'SLT-PLC-SET-1', 0000123, 15000, 15000, 13.00, 9.00, 'sell'),
(00000005, 'CEY-PLC-SET-1', 0000124, 4000, 4000, 1.10, 12.00, 'sell'),
(00000006, 'AIA-PLC-SET-1', 0000125, 12000, 12000, 2.00, 11.00, 'sell'),
(00000007, 'DFCC-PLC-SET-1', 0000126, 20000, 20000, 7.00, 18.00, 'sell'),
(00000008, 'DUR-HOS-SET-1', 0000127, 12000, 12000, 1.00, 2.00, 'sell'),
(00000009, 'ASI-HOS-SET-1', 0000128, 8500, 8500, 3.90, 4.00, 'sell'),
(00000010, 'NAW-HOS-SET-1', 0000129, 40000, 40000, 5.00, 0.00, 'sell'),
(00000011, 'MER-PLC-SET-1', 0000130, 6500, 6500, 2.70, 14.70, 'sell'),
(00000012, 'JOH-PLC-SET-1', 0000131, 3000, 3000, 9.00, 3.00, 'sell'),
(00000013, 'CEY-TEA-SET-1', 0000132, 9000, 9000, 4.00, 1.00, 'sell'),
(00000014, 'RIC-PLC-SET-1', 0000133, 10000, 10000, 3.00, 5.00, 'sell'),
(00000015, 'LAN-PLC-SET-1', 0000134, 25000, 25000, 1.50, 6.00, 'sell'),
(00000016, 'HAY-PLC-SET-1', 0000135, 35000, 35000, 2.00, 10.00, 'sell'),
(00000017, 'AIA-PLC-SET-2', 0000125, 7000, 7000, 8.50, 7.50, 'sell'),
(00000018, 'DFCC-PLC-SET-2', 0000126, 4000, 4000, 6.75, 2.75, 'sell'),
(00000019, 'ASI-HOS-SET-2', 0000128, 1500, 1500, 7.00, 11.00, 'sell'),
(00000020, 'NAW-HOS-SET-2', 0000129, 10000, 10000, 1.20, 18.00, 'sell'),
(00000021, 'JOH-PLC-SET-2', 0000131, 18000, 17995, 10.00, 8.00, 'sell'),
(00000022, 'CEY-TEA-SET-2', 0000132, 5000, 5000, 4.00, 1.00, 'sell'),
(00000023, 'RIC-PLC-SET-2', 0000133, 7500, 7500, 3.00, 7.00, 'sell'),
(00000024, 'HAY-PLC-SET-2', 0000135, 500, 500, 1.00, 6.00, 'sell');

-- --------------------------------------------------------

--
-- Table structure for table `player_stocks`
--

DROP TABLE IF EXISTS `player_stocks`;
CREATE TABLE IF NOT EXISTS `player_stocks` (
  `player_stock_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `company_stocks_company_stock_id` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `users_user_id` mediumint(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`player_stock_id`),
  KEY `fk_player_stocks_company_stocks1_idx` (`company_stocks_company_stock_id`),
  KEY `fk_player_stocks_users1_idx` (`users_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_stocks`
--

INSERT INTO `player_stocks` (`player_stock_id`, `company_stocks_company_stock_id`, `users_user_id`, `quantity`, `price`) VALUES
(0000000001, 00000021, 0000120, 5, 8.00),
(0000000002, 00000007, 0000120, 1, 18.00);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

DROP TABLE IF EXISTS `stock_transactions`;
CREATE TABLE IF NOT EXISTS `stock_transactions` (
  `financial_transaction_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `turn` tinyint(1) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `player_stocks_player_stock_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `company_stocks_company_stock_id` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`financial_transaction_id`),
  KEY `fk_stock_transactions_player_stocks1_idx` (`player_stocks_player_stock_id`),
  KEY `fk_stock_transactions_company_stocks1_idx` (`company_stocks_company_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_transactions`
--

INSERT INTO `stock_transactions` (`financial_transaction_id`, `turn`, `type`, `price`, `player_stocks_player_stock_id`, `company_stocks_company_stock_id`, `quantity`) VALUES
(0000000001, 8, 'Buy', 5.00, 0000000001, 00000021, 5),
(0000000002, 1, 'Buy', 20.00, 0000000002, 00000007, 1),
(0000000003, 1, 'Sell', 21.00, 0000000002, 00000007, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `password_not_hashed` varchar(20) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `player_type` varchar(10) DEFAULT 'human',
  `current_balance` float(10,2) NOT NULL DEFAULT '1000.00',
  `company_name` varchar(50) DEFAULT NULL,
  `company_sector` varchar(30) DEFAULT NULL,
  `company_grade` varchar(5) DEFAULT NULL,
  `company_default` varchar(4) NOT NULL DEFAULT 'No',
  `loggedin` varchar(4) DEFAULT 'No',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `password_not_hashed`, `user_type`, `player_type`, `current_balance`, `company_name`, `company_sector`, `company_grade`, `company_default`, `loggedin`) VALUES
(0000001, 'AI Player 1', 'player2@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'players', 'ai', 1000.00, NULL, NULL, NULL, 'No', 'Yes'),
(0000002, 'AI Player 2', 'player3@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'players', 'ai', 1000.00, NULL, NULL, NULL, 'No', 'Yes'),
(0000120, 'John', 'john@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'players', 'human', 976.00, NULL, NULL, NULL, 'No', 'Yes'),
(0000121, 'Robert', 'robert@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'PC HOUSE PLC\r\n', 'IT', 'A', 'No', 'No'),
(0000122, 'Broker 2', 'broker2@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'E-CHANNELLING PLC', 'IT', 'B', 'No', 'Yes'),
(0000123, 'Broker 3', 'broker3@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'SRI LANKA TELECOM PLC', 'IT', 'C', 'Yes', 'No'),
(0000124, 'Broker 4', 'broker4@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'CEYLINCO INSURANCE PLC', 'Finance', 'A', 'No', 'No'),
(0000125, 'Broker 5', 'broker5@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'AIA INSURANCE LANKA PLC', 'Finance', 'B', 'Yes', 'No'),
(0000126, 'Broker 6', 'broker6@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'DFCC BANK PLC', 'Finance', 'C', 'No', 'No'),
(0000127, 'Broker 7', 'broker7@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'CEYLON HOSPITALS PLC (DURDANS)', 'HealthCare', 'A', 'No', 'No'),
(0000128, 'Broker 8', 'broker8@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'ASIRI HOSPITAL HOLDINGS PLC', 'HealthCare', 'B', 'Yes', 'No'),
(0000129, 'Broker 9', 'broker9@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'NAWALOKA HOSPITALS PLC', 'HealthCare', 'C', 'No', 'No'),
(0000130, 'Broker 10', 'broker10@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'MERCANTILE SHIPPING COMPANY PLC', 'Consumer Services', 'A', 'No', 'No'),
(0000131, 'Broker 11', 'broker11@a.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '12345', 'brokers', 'company', 1000.00, 'JOHN KEELLS PLC', 'Consumer Services', 'B', 'No', 'No'),
(0000132, NULL, NULL, NULL, NULL, 'brokers', 'company', 1000.00, 'CEYLON TEA BROKERS PLC', 'Consumer Services', 'C', 'No', 'No'),
(0000133, NULL, NULL, NULL, NULL, 'brokers', 'company', 1000.00, 'RICHARD PIERIS EXPORTS PLC', 'Manufacturing', 'A', 'Yes', 'No'),
(0000134, 'Broker 12', 'broker12@a.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '1234', 'brokers', 'company', 1000.00, 'LANKA CERAMIC PLC', 'Manufacturing', 'B', 'No', 'No'),
(0000135, NULL, NULL, NULL, NULL, 'brokers', 'company', 1000.00, 'HAYLEYS FIBRE PLC', 'Manufacturing', 'C', 'No', 'No');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
  ADD CONSTRAINT `fk_bank_transactions_users1` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bank_transactions_users2` FOREIGN KEY (`receiver`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bank_transactions_users3` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `company_stocks`
--
ALTER TABLE `company_stocks`
  ADD CONSTRAINT `fk_company_stocks_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `player_stocks`
--
ALTER TABLE `player_stocks`
  ADD CONSTRAINT `fk_player_stocks_company_stocks1` FOREIGN KEY (`company_stocks_company_stock_id`) REFERENCES `company_stocks` (`company_stock_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_player_stocks_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD CONSTRAINT `fk_stock_transactions_company_stocks1` FOREIGN KEY (`company_stocks_company_stock_id`) REFERENCES `company_stocks` (`company_stock_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stock_transactions_player_stocks1` FOREIGN KEY (`player_stocks_player_stock_id`) REFERENCES `player_stocks` (`player_stock_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
