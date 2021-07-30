-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 12:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `jpc_commissionrates`
--

CREATE TABLE `jpc_commissionrates` (
  `i_id` int(11) NOT NULL,
  `i_membershipplan` varchar(30) NOT NULL,
  `i_level1percentage` decimal(16,2) NOT NULL,
  `i_level2percentage` decimal(16,2) NOT NULL,
  `i_level3percentage` decimal(16,2) NOT NULL,
  `i_level4percentage` decimal(16,2) NOT NULL,
  `i_level5percentage` decimal(16,2) NOT NULL,
  `i_level6percentage` decimal(16,2) NOT NULL,
  `i_level7percentage` decimal(16,2) NOT NULL,
  `i_level8percentage` decimal(16,2) NOT NULL,
  `i_level9percentage` decimal(16,2) NOT NULL,
  `i_level10percentage` decimal(16,2) NOT NULL,
  `i_investmentamount` decimal(16,2) NOT NULL,
  `i_stockbonusshare` decimal(16,2) NOT NULL,
  `i_specialbonus` decimal(16,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_commissionrates`
--

INSERT INTO `jpc_commissionrates` (`i_id`, `i_membershipplan`, `i_level1percentage`, `i_level2percentage`, `i_level3percentage`, `i_level4percentage`, `i_level5percentage`, `i_level6percentage`, `i_level7percentage`, `i_level8percentage`, `i_level9percentage`, `i_level10percentage`, `i_investmentamount`, `i_stockbonusshare`, `i_specialbonus`) VALUES
(0, 'Referral Bonus For Package 1', '0.05', '0.10', '0.01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '30.00', '8.00', '0.00'),
(1, 'Referral Bonus For Package 2', '0.05', '0.10', '0.01', '0.10', '0.04', '0.07', '0.00', '0.00', '0.00', '0.00', '70.00', '21.00', '0.00'),
(2, 'Referral Bonus For Package 3', '0.05', '0.10', '0.01', '0.10', '0.04', '0.07', '0.10', '0.03', '0.03', '0.03', '280.00', '40.00', '0.00'),
(3, 'Referral Bonus For Package 4', '0.04', '0.04', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, 'Referral Bonus For Package 5', '0.10', '0.10', '0.10', '0.10', '0.10', '0.04', '0.04', '0.04', '0.04', '0.04', '1000.00', '180.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_geneaology`
--

CREATE TABLE `jpc_geneaology` (
  `i_id` int(11) NOT NULL,
  `i_memberid` varchar(50) NOT NULL,
  `i_uplineid` varchar(50) NOT NULL,
  `i_placementid` varchar(50) NOT NULL,
  `i_level` int(10) NOT NULL,
  `i_commission` decimal(16,2) NOT NULL,
  `i_paidstatus` int(1) NOT NULL,
  `i_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_geneaology`
--

INSERT INTO `jpc_geneaology` (`i_id`, `i_memberid`, `i_uplineid`, `i_placementid`, `i_level`, `i_commission`, `i_paidstatus`, `i_created`, `i_updated`) VALUES
(1, 'WAAQNA2147480983', 'WAAQNA2147480983', 'JEGRGR21474809838', 1, '1.50', 0, '2018-05-27 23:14:59', '2018-05-27 23:14:59'),
(3, 'WAAQNA2147480983', 'WAAQNA2147480983', 'XILILO201805281173367', 1, '14.00', 0, '2018-05-28 00:31:17', '2018-05-28 00:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_geneaology2`
--

CREATE TABLE `jpc_geneaology2` (
  `i_id` int(11) NOT NULL,
  `i_memberid` varchar(50) NOT NULL,
  `i_uplineid` varchar(50) NOT NULL,
  `i_sponsorid` varchar(50) NOT NULL,
  `i_level` int(10) NOT NULL,
  `i_commission` decimal(16,2) NOT NULL,
  `i_paidstatus` int(1) NOT NULL,
  `i_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_geneaology2`
--

INSERT INTO `jpc_geneaology2` (`i_id`, `i_memberid`, `i_uplineid`, `i_sponsorid`, `i_level`, `i_commission`, `i_paidstatus`, `i_created`, `i_updated`) VALUES
(1, 'WAAQNA2147480983', 'WAAQNA2147480983', 'JEGRGR21474809838', 1, '1.50', 8, '2018-05-27 23:14:59', '2018-05-27 23:23:29'),
(3, 'WAAQNA2147480983', 'WAAQNA2147480983', 'XILILO201805281173367', 1, '14.00', 0, '2018-05-28 00:31:17', '2018-05-28 00:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_members`
--

CREATE TABLE `jpc_members` (
  `i_id` int(11) NOT NULL,
  `i_email` varchar(255) DEFAULT NULL,
  `i_password` varchar(255) DEFAULT NULL,
  `i_memberid` varchar(50) DEFAULT NULL,
  `i_sponsorid` varchar(50) DEFAULT NULL,
  `i_placementid` varchar(50) DEFAULT NULL,
  `i_membershipplan` varchar(30) DEFAULT NULL,
  `i_firstname` varchar(50) DEFAULT NULL,
  `i_lastname` varchar(50) DEFAULT NULL,
  `i_middlename` varchar(50) DEFAULT NULL,
  `i_address` text,
  `i_country` varchar(150) DEFAULT NULL,
  `i_state` varchar(150) DEFAULT NULL,
  `i_city` varchar(150) DEFAULT NULL,
  `i_countrycode` varchar(10) DEFAULT NULL,
  `i_phone` varchar(20) DEFAULT NULL,
  `i_zipcode` varchar(10) DEFAULT NULL,
  `i_gender` varchar(6) DEFAULT NULL,
  `i_dob` date DEFAULT NULL,
  `i_investmentamount` decimal(16,2) DEFAULT NULL,
  `i_personalwalletbalance` decimal(16,2) DEFAULT NULL,
  `i_externalwalletbalance` decimal(16,2) DEFAULT NULL,
  `i_stockbonus` decimal(16,2) DEFAULT NULL,
  `i_specialbonus` decimal(16,2) DEFAULT NULL,
  `i_withdrawamount` decimal(16,2) DEFAULT NULL,
  `i_commission` decimal(16,2) DEFAULT NULL,
  `i_bankname` varchar(150) DEFAULT NULL,
  `i_bankaccountnumber` varchar(50) DEFAULT NULL,
  `i_bankaccountname` varchar(150) DEFAULT NULL,
  `i_verificationcode` varchar(30) DEFAULT NULL,
  `i_isverified` int(1) DEFAULT NULL,
  `i_isactive` int(1) DEFAULT NULL,
  `i_isreported` int(1) DEFAULT NULL,
  `i_isblocked` int(1) DEFAULT NULL,
  `i_thumbnailphoto` text,
  `i_profilephoto` text,
  `i_invoicephoto` text,
  `i_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_members`
--

INSERT INTO `jpc_members` (`i_id`, `i_email`, `i_password`, `i_memberid`, `i_sponsorid`, `i_placementid`, `i_membershipplan`, `i_firstname`, `i_lastname`, `i_middlename`, `i_address`, `i_country`, `i_state`, `i_city`, `i_countrycode`, `i_phone`, `i_zipcode`, `i_gender`, `i_dob`, `i_investmentamount`, `i_personalwalletbalance`, `i_externalwalletbalance`, `i_stockbonus`, `i_specialbonus`, `i_withdrawamount`, `i_commission`, `i_bankname`, `i_bankaccountnumber`, `i_bankaccountname`, `i_verificationcode`, `i_isverified`, `i_isactive`, `i_isreported`, `i_isblocked`, `i_thumbnailphoto`, `i_profilephoto`, `i_invoicephoto`, `i_created`, `i_updated`) VALUES
(1, 'webmobileappdeveloper@gmail.com', '299187122a8ed4948ae3c3c6fbe7cd0b3f0ed83dc5e557ee7c302188749c46b3e824d76563fxfC1230', 'WAAQNA2147480983', '', '', 'Referral Bonus For Package 2', 'Walter', 'Narvasa', 'Aquino', 'Makati City', 'Philippines', 'NCR', 'Makati', '063', '09276423773', '12356', 'Male', '1980-12-25', '0.00', '3700.00', '4300.00', '0.00', '0.00', '0.00', '0.00', 'Bank of the Philippine Islands (BPI)', '1323-123-2123', 'Walter Narvasa', '366', 8, 8, 0, 0, 'Walter Aquino Narvasa-profilephoto-14774_399771286778283_473832121_n.jpg', 'Walter Aquino Narvasa-idphoto-P_20180224_123708.jpg', 'Walter Aquino Narvasa-invoicephoto-73-ae8c1b2171f40253554c3724b5664da92fc50c8c843bfbc2430e7b9aad4598eb.png', '2018-01-08 21:39:47', '2021-03-18 19:40:39'),
(27, 'skriptninja@gmail.com', '299187122e6f36d88eeb1ad9788d15a4b49a226d650499fa629f84975be214033b481436b3fxfC1230', 'JEGRGR21474809838', 'WAAQNA2147480983', 'WAAQNA2147480983', 'Referral Bonus For Package 1', 'Jean', 'Gray', 'Grey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30.00', '900.00', '3800.00', '8.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'Cmt3ekH2', 8, 8, 0, 0, 'Jean Grey Gray-profilephoto-sexy-urvashi-rautela-captured-by-lens-in-her-white-avatar-201601-647475.jpg', 'Jean Grey Gray-idphoto-images.jpg', 'Jean Grey Gray-invoicephoto-invoice-paid-47966092-invoice-and-pen-with-paid-stamp-invoice-is-mock-up-stock-photo-AvrzUH.jpg', '2018-05-27 23:14:58', '2018-08-09 22:57:02'),
(39, 'quotations2009@gmail.com', '2991871225d53aaa1428a9cd13afb2bb42bb31eb5548eb9d5c5b455a5a3a3bfc64eace6db3fxfC1230', 'XILILO201805281173367', 'WAAQNA2147480983', 'WAAQNA2147480983', 'Referral Bonus For Package 3', 'Xian', 'Lopez', 'Lim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '280.00', '800.00', '200.00', '40.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'HETUSuUb', 8, 8, 0, 0, NULL, NULL, NULL, '2018-05-28 00:31:17', '2018-08-09 22:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_messaging`
--

CREATE TABLE `jpc_messaging` (
  `i_id` int(11) NOT NULL,
  `i_memberid` varchar(50) NOT NULL,
  `i_message` text NOT NULL,
  `i_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jpc_settings`
--

CREATE TABLE `jpc_settings` (
  `i_id` int(11) NOT NULL,
  `i_currencyvalue` varchar(20) DEFAULT NULL,
  `i_currencyprefix` varchar(20) DEFAULT NULL,
  `i_currencysymbol` varchar(1) DEFAULT NULL,
  `i_specialbonusmonth` int(2) DEFAULT NULL,
  `i_externalwalletmaintainingbalance` decimal(16,2) NOT NULL,
  `i_announcements` text NOT NULL,
  `i_adminpassword` varchar(255) NOT NULL,
  `i_emailvideolink` text,
  `i_emailvideomessage` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_settings`
--

INSERT INTO `jpc_settings` (`i_id`, `i_currencyvalue`, `i_currencyprefix`, `i_currencysymbol`, `i_specialbonusmonth`, `i_externalwalletmaintainingbalance`, `i_announcements`, `i_adminpassword`, `i_emailvideolink`, `i_emailvideomessage`) VALUES
(1, 'php', 'PHP', 'ï', 3, '50.00', 'Welcome to jpc MLM Website!', '299187122033f23c9312b5f9838f246c0a7f2f2a5694bbf3657a56cc13d55d7350ed19b643fxfC1230', '<video width=\"560\" height=\"315\" controls><source src=\"https://jpc.biz/wealthprogram/video.mp4\" type=\"video/mp4\"></video>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZOSDVSCgIb0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe><strong><br><br>Please click this link <a href=\"https://www.youtube.com/embed/ZOSDVSCgIb0\">Video</a></strong>');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_transactionhistory`
--

CREATE TABLE `jpc_transactionhistory` (
  `i_id` int(11) NOT NULL,
  `i_memberid` varchar(50) NOT NULL,
  `i_description` text NOT NULL,
  `i_inamount` decimal(16,2) NOT NULL,
  `i_outamount` decimal(16,2) NOT NULL,
  `i_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_transactionhistory`
--

INSERT INTO `jpc_transactionhistory` (`i_id`, `i_memberid`, `i_description`, `i_inamount`, `i_outamount`, `i_created`, `i_updated`) VALUES
(1, 'WAAQNA2147480983', 'Processed Personal Wallet Balance', '0.75', '0.00', '2018-05-27 23:23:29', '2018-05-27 23:23:29'),
(2, 'WAAQNA2147480983', 'Processed External Wallet Balance', '0.75', '0.00', '2018-05-27 23:23:29', '2018-05-27 23:23:29'),
(3, 'WAAQNA2147480983', 'Processed External Wallet Withdrawal', '0.00', '500.00', '2018-05-27 23:27:06', '2018-05-27 23:27:06'),
(4, 'WAAQNA2147480983', 'Processed Transfer External Wallet to JEGRGR21474809838', '0.00', '1000.00', '2018-05-27 23:29:05', '2018-05-27 23:29:05'),
(5, 'JEGRGR21474809838', 'Processed Receive External Wallet from WAAQNA2147480983', '1000.00', '0.00', '2018-05-27 23:29:05', '2018-05-27 23:29:05'),
(6, 'WAAQNA2147480983', 'Processed Personal Wallet Balance', '0.00', '0.00', '2018-05-27 23:42:16', '2018-05-27 23:42:16'),
(7, 'WAAQNA2147480983', 'Processed External Wallet Balance', '0.00', '0.00', '2018-05-27 23:42:16', '2018-05-27 23:42:16'),
(8, 'WAAQNA2147480983', 'Processed Transfer External Wallet to JEGRGR21474809838', '0.00', '700.00', '2018-05-27 23:44:14', '2018-05-27 23:44:14'),
(9, 'JEGRGR21474809838', 'Processed Receive External Wallet from WAAQNA2147480983', '700.00', '0.00', '2018-05-27 23:44:14', '2018-05-27 23:44:14'),
(10, 'WAAQNA2147480983', 'Processed External Wallet Withdrawal', '0.00', '750.00', '2018-05-27 23:46:42', '2018-05-27 23:46:42'),
(16, 'WAAQNA2147480983', 'Transfered Personal Wallet to External Wallet', '0.00', '100.00', '2018-08-09 21:26:39', '2018-08-09 21:26:39'),
(17, 'WAAQNA2147480983', 'Received External Wallet from Personal Wallet', '100.00', '0.00', '2018-08-09 21:26:39', '2018-08-09 21:26:39'),
(18, 'WAAQNA2147480983', 'Transfered Personal Wallet to External Wallet', '0.00', '200.00', '2018-08-09 22:40:46', '2018-08-09 22:40:46'),
(19, 'WAAQNA2147480983', 'Received External Wallet from Personal Wallet', '200.00', '0.00', '2018-08-09 22:40:46', '2018-08-09 22:40:46'),
(20, 'WAAQNA2147480983', 'Transfered Personal Wallet to External Wallet', '0.00', '300.00', '2018-08-09 22:55:46', '2018-08-09 22:55:46'),
(21, 'WAAQNA2147480983', 'Received External Wallet from Personal Wallet', '300.00', '0.00', '2018-08-09 22:55:46', '2018-08-09 22:55:46'),
(22, 'JEGRGR21474809838', 'Transfered Personal Wallet to External Wallet', '0.00', '100.00', '2018-08-09 22:57:02', '2018-08-09 22:57:02'),
(23, 'JEGRGR21474809838', 'Received External Wallet from Personal Wallet', '100.00', '0.00', '2018-08-09 22:57:02', '2018-08-09 22:57:02'),
(24, 'XILILO201805281173367', 'Transfered Personal Wallet to External Wallet', '0.00', '200.00', '2018-08-09 22:58:41', '2018-08-09 22:58:41'),
(25, 'XILILO201805281173367', 'Received External Wallet from Personal Wallet', '200.00', '0.00', '2018-08-09 22:58:41', '2018-08-09 22:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `jpc_withdrawalpayout`
--

CREATE TABLE `jpc_withdrawalpayout` (
  `i_id` int(11) NOT NULL,
  `i_memberid` varchar(50) NOT NULL,
  `i_transferid` varchar(50) NOT NULL,
  `i_totalpayout` decimal(16,2) NOT NULL,
  `i_userpayout` decimal(16,2) NOT NULL,
  `i_reason` text NOT NULL,
  `i_commission` decimal(16,2) NOT NULL,
  `i_penalty` decimal(16,2) NOT NULL,
  `i_date` date NOT NULL,
  `i_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpc_withdrawalpayout`
--

INSERT INTO `jpc_withdrawalpayout` (`i_id`, `i_memberid`, `i_transferid`, `i_totalpayout`, `i_userpayout`, `i_reason`, `i_commission`, `i_penalty`, `i_date`, `i_status`) VALUES
(1, 'WAAQNA2147480983', 'WAAQNA2147480983', '4950.00', '500.00', '', '0.00', '0.00', '2018-05-27', 8),
(2, 'WAAQNA2147480983', 'JEGRGR21474809838', '4450.00', '1000.00', 'debt Transfer Amount of 1000 to JEGRGR21474809838', '0.00', '0.00', '2018-05-27', 8),
(3, 'WAAQNA2147480983', 'JEGRGR21474809838', '3450.00', '700.00', 'wala Transfer Amount of 700 to JEGRGR21474809838', '0.00', '0.00', '2018-05-27', 8),
(4, 'WAAQNA2147480983', 'WAAQNA2147480983', '2750.00', '750.00', '', '0.00', '0.00', '2018-05-27', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jpc_commissionrates`
--
ALTER TABLE `jpc_commissionrates`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_geneaology`
--
ALTER TABLE `jpc_geneaology`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_geneaology2`
--
ALTER TABLE `jpc_geneaology2`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_members`
--
ALTER TABLE `jpc_members`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_messaging`
--
ALTER TABLE `jpc_messaging`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_settings`
--
ALTER TABLE `jpc_settings`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_transactionhistory`
--
ALTER TABLE `jpc_transactionhistory`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `jpc_withdrawalpayout`
--
ALTER TABLE `jpc_withdrawalpayout`
  ADD PRIMARY KEY (`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jpc_geneaology`
--
ALTER TABLE `jpc_geneaology`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jpc_geneaology2`
--
ALTER TABLE `jpc_geneaology2`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jpc_members`
--
ALTER TABLE `jpc_members`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jpc_messaging`
--
ALTER TABLE `jpc_messaging`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jpc_settings`
--
ALTER TABLE `jpc_settings`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jpc_transactionhistory`
--
ALTER TABLE `jpc_transactionhistory`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jpc_withdrawalpayout`
--
ALTER TABLE `jpc_withdrawalpayout`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
