-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 15, 2013 at 11:00 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `inventory_db`
-- 
CREATE DATABASE `inventory_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inventory_db`;

-- --------------------------------------------------------

-- 
-- Table structure for table `invoice`
-- 

CREATE TABLE `invoice` (
  `po_number` varchar(20) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `receiveBy` varchar(50) NOT NULL,
  `receiveByName` varchar(50) NOT NULL,
  `recieveDate` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `filePath` varchar(100) NOT NULL,
  PRIMARY KEY  (`po_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `invoice`
-- 

INSERT INTO `invoice` VALUES ('TB913181200M', 'IT Solution and Service Co.,Ltd', 'IT_Student', 'chaowalit_k', '2013-12-05', 'Computer PC 101ea', '19235471 Poobase', 'B5309658.pdf', 'C:/AppServ/www/inventory/uploads/B5309658.pdf');

-- --------------------------------------------------------

-- 
-- Table structure for table `store`
-- 

CREATE TABLE `store` (
  `model` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `min` tinyint(3) unsigned default NULL,
  `id` int(50) NOT NULL auto_increment,
  `building` varchar(50) NOT NULL,
  `add_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `Support_Prt` varchar(50) default NULL,
  `add_by` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บข้อมูลอุปกรณ์' AUTO_INCREMENT=165 ;

-- 
-- Dumping data for table `store`
-- 

INSERT INTO `store` VALUES ('TN2025', 'Toner', 'Brother', 2, 2, 1, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Vostro260S', 'Computer', 'Dell', 3, 0, 2, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Optiplex780', 'Computer', 'Dell', 2, 0, 3, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('SK-1688', 'Keyboard', 'Acer', 1, 0, 4, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('M100R', 'Mouse', 'Logitech', 22, 10, 5, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('1G-DDR2-Bus800', 'Ram', 'Kingmax', 6, 5, 6, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('P5G41T-M-LX', 'Motherboard', 'Asus', 3, 0, 7, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Port-LMP 132', 'Projector', 'Sanyo', 1, 0, 8, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LV-LP35', 'Projector', 'Canon', 1, 0, 9, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q5949A', 'Toner', 'HP', 10, 5, 10, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('E1910', 'Monitor', 'Dell', 2, 2, 11, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q7551A', 'Toner', 'HP', 5, 3, 12, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6511A', 'Toner', 'HP', 3, 0, 13, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE255A', 'Toner', 'HP', 1, 2, 14, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q7553A', 'Toner', 'HP', 1, 0, 15, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE250X Black', 'Toner', 'HP', 2, 0, 16, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE251A Cyan', 'Toner', 'HP', 1, 0, 17, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE252A Yellow', 'Toner', 'HP', 1, 0, 18, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE253A Magenta', 'Toner', 'HP', 1, 0, 19, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q2670A Black', 'Toner', 'HP', 1, 0, 20, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q2671A Cyan', 'Toner', 'HP', 2, 0, 21, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q2672A Yellow', 'Toner', 'HP', 2, 0, 22, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q2673A Magenta', 'Toner', 'HP', 4, 0, 23, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('TN2130', 'Toner', 'Brother', 2, 0, 24, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('TN2280', 'Toner', 'Brother', 2, 0, 25, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('DR2255', 'Toner', 'Brother', 1, 0, 26, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CC364A', 'Toner', 'HP', 2, 2, 27, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB436A', 'Toner', 'HP', 12, 0, 28, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6470 Black', 'Toner', 'HP', 1, 0, 29, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6471 Cyan', 'Toner', 'HP', 3, 0, 30, '', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('HN-C13T104190 Black', 'Inkjet', 'Epson', 10, 3, 31, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('103-C13T103190 Black', 'Inkjet', 'Epson', 3, 3, 32, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('73N-C13T105490 Yellow', 'Inkjet', 'Epson', 5, 0, 33, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('73N-C13T105290 Cyan', 'Inkjet', 'Epson', 5, 0, 34, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8771WA 02 Cyan', 'Inkjet', 'HP', 10, 4, 35, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8772WA 02 Magenta', 'Inkjet', 'HP', 24, 4, 36, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8773WA 02 Yellow', 'Inkjet', 'HP', 13, 4, 37, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8774WA 02 Light Cyan', 'Inkjet', 'HP', 16, 4, 38, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8775WA 02 Light Magenta', 'Inkjet', 'HP', 11, 4, 39, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C5016A 84 Black', 'Inkjet', 'HP', 2, 0, 40, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9425A 85 Cyan', 'Inkjet', 'HP', 2, 0, 41, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9426A 85 Magenta', 'Inkjet', 'HP', 2, 0, 42, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9427A 85 Yellow', 'Inkjet', 'HP', 3, 0, 43, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9428A 85 Light Cyan', 'Inkjet', 'HP', 2, 0, 44, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8721WA 02 Black', 'Inkjet', 'HP', 13, 4, 45, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8727AA 07 Black', 'Inkjet', 'HP', 3, 2, 46, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8728AA (28 &#3626;&#3634;&#3617;&#3626;&#3637;)', 'Inkjet', 'HP', 3, 2, 47, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8765WA (94 BK)', 'Inkjet', 'HP', 1, 1, 48, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('DN2130', 'Toners', 'Brother', 3, 3, 49, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q7516AC', 'Toner', 'HP', 3, 2, 50, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('DDR2 533', 'Ram', 'Kingston', 0, 0, 51, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('DDR2 800', 'Ram', 'Kingston', 0, 0, 52, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('9V', 'Battery', '-', 10, 2, 53, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('AAA', 'Battery', 'Panosonic', 120, 6, 54, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('AA', 'Battery', 'Panosonic ', 28, 6, 55, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('3m', 'Scoth tape', 'Other Magic tape ', 3, 1, 56, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CD972AA(920 XL/C', 'Inkjet', 'HP', 6, 4, 57, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CD973AA (920 XL/M', 'Inkjet', 'HP', 6, 4, 58, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CD974AA (920 XL/Y)', 'Inkjet', 'HP', 6, 4, 59, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CD975AA (920 XL/BK)', 'Inkjet', 'HP', 7, 4, 60, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE278A', 'Toner', 'HP', 5, 2, 61, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC73BK', 'Inkjet', 'Brother', 2, 2, 62, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC73C', 'Inkjet', 'Brother', 3, 2, 63, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC73M', 'Inkjet', 'Brother ', 3, 2, 64, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC73Y', 'Inkjet', 'Brother ', 2, 2, 65, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LV-7392A', 'Projetor', 'Cannon', 1, 1, 66, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('02 M (C8772WA)', 'Inkjet', 'HP', 1, 0, 67, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 LM (C9429A)', 'Inkjet', 'HP', 1, 0, 68, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE250', 'Toner ', 'HP', 2, 0, 69, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Vostro 270S', 'Computer', 'Dell', 3, 0, 70, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Vostro270', 'Computer', 'Dell', 3, 0, 71, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Wired Desktop 500', 'Keyboard', 'Microsoft  ', 1, 0, 72, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Wired Desktop 600', 'Keyboard', 'Microsoft', 0, 1, 73, 'B4', '2013-12-05 15:59:15', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Other', 'TV', 'Sharp 60"', 3, 0, 74, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Other', 'Audio', 'Mixer', 1, 0, 75, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Other', 'Audio', 'Speaker', 2, 0, 76, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Other', 'Audio', 'Mic Wireless', 1, 0, 77, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('E178F', 'Monitor', 'Dell', 0, 1, 78, 'B4', '2013-12-05 16:04:43', NULL, 'Old_P');
INSERT INTO `store` VALUES ('IN1930', 'monitor', 'Dell ', 0, 0, 79, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('FAX FILM', 'Toner', 'Panasonic ', 1, 1, 80, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE410A', 'Inkjet', 'HP ', 4, 2, 81, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE411A', 'Ink Jet', 'HP', 3, 2, 82, 'B3', '2013-12-15 22:10:57', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE412A', 'Inkjet', 'HP ', 4, 2, 83, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE413A', 'Inkjet', 'HP ', 4, 2, 84, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('2.0 Ethernet Adapter', 'USB', '-', 2, 1, 85, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('USB to Sata HDD', 'USB', '-', 1, 1, 86, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('8100 ePrint', 'Printer', 'HP', 1, 1, 87, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('8600', 'Printer 04', 'HP', 1, 1, 88, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('84 BK (C5019A', 'inkjet', 'HP', 2, 0, 89, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 C (C9420A', 'inkjet', 'HP', 2, 0, 90, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 M (C9421A', 'inkjet', 'HP', 2, 0, 91, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 Y (C9422A', 'inkjet', 'HP', 2, 0, 92, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 M (C9423A', 'inkjet', 'HP', 2, 0, 93, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('85 LM (C9424A', 'inkjet', 'HP', 2, 0, 94, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('TN 3185', 'Toner', 'Brother', 2, 2, 95, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('v173', 'Computer', 'Acer', 0, 1, 96, 'B4', '2013-12-05 16:05:45', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Other', 'KVM Swicth', 'KVM Swicth', 1, 2, 97, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('E1914H', 'Monitor', 'Dell', 3, 1, 158, 'B3', '2013-12-15 22:55:44', '-', 'bank');
INSERT INTO `store` VALUES ('500W(EB-500)', 'Power Supply', 'DTECH', 1, 0, 100, 'B4', '2013-12-05 15:58:29', NULL, 'Old_P');
INSERT INTO `store` VALUES ('P5KPL-AM', 'Motherboard', 'Asus', 0, 0, 101, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE401AC Cyan', 'Toner', 'HP', 0, 0, 102, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE400A Black', 'Toner', 'HP', 0, 0, 103, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE402AC Yellow', 'Toner', 'HP', 0, 0, 104, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE403AC Magenta', 'Toner', 'HP ', 0, 0, 105, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('E1914H', 'Monitor', 'dell', 7, 1, 157, 'B4', '2013-12-05 17:10:52', NULL, 'bank');
INSERT INTO `store` VALUES ('Q6470A', 'Toner', 'HP', 3, 2, 107, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6471A', 'Toner', 'HP', 2, 2, 108, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6473A', 'Toner', 'HP', 2, 2, 109, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q6474A', 'Toner', 'HP', 1, 2, 110, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE250', 'Inkjet', 'HP ', 1, 2, 111, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE251', 'Inkjet', 'HP ', 1, 2, 112, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE252', 'Inkjet', 'HP ', 1, 2, 113, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CE253', 'Inkjet', 'HP ', 1, 2, 114, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB436A (564XL)', 'Inkjet', 'HP', 1, 2, 115, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB 322WA (564XL)', 'Inkjet', 'HP', 2, 2, 116, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB323WA (564XL)', 'Inkjet', 'HP', 3, 2, 117, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB324WA (564XL)', 'Inkjet', 'HP', 2, 2, 118, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CB325WA (564XL)', 'Inkjet', 'HP', 2, 2, 119, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('CN684WA (564XL)', 'Inkjet', 'HP', 3, 2, 120, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('BCI-3e C', 'Inkjet', ' Canon', 5, 2, 121, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('BCI-3e Y', 'Inkjet', 'Canon', 2, 2, 122, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('BCI-3e M', 'Inkjet', 'Canon', 3, 2, 123, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('BCI-3e BK', 'Inkjet', 'Canon', 3, 2, 124, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Pixma PGI-5 BK', 'Inkjet', 'Canon', 3, 1, 125, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Q7516A', 'Toner', 'HP ', 3, 1, 126, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B4', 'Toner', ' Sharp ', 2, 1, 127, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B3 A', 'Toner', 'Sharp ', 2, 1, 128, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B3 BK', 'Toner ', 'Sharp ', 2, 1, 129, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B3 C', 'Toner ', ' Sharp ', 2, 1, 130, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B3 M', 'Toner ', ' Sharp ', 2, 1, 131, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('B3 Y', 'Toner ', 'Sharp ', 2, 1, 132, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LQ-2190', 'Printer', 'Epson', 8, 3, 133, 'B3', '2013-12-05 16:40:09', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8766WA (95 &#3626;&#3634;&#3617;&#3626;&#3637;)', 'Inkjet', 'HP', 2, 1, 134, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C8727AA (27 BK', 'Inkjet', 'HP', 4, 1, 135, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C5019A (84 BK', 'Inkjet', 'HP', 1, 1, 136, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9420A (85 C', 'Inkjet', 'HP', 1, 1, 137, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9421A (85 M', 'Inkjet', 'HP', 1, 1, 138, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9422A (85 Y', 'Inkjet', 'HP', 1, 1, 139, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9423A (Light C', 'Inkjet', 'HP', 1, 1, 140, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('C9424A (85ight M', 'Inkjet', 'HP', 2, 1, 141, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC47 BK', 'Inkjet', 'Broter', 5, 1, 142, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC47 C', 'Inkjet', 'Broter', 3, 1, 143, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC47 M', 'Inkjet', 'Broter ', 1, 1, 144, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('LC47 Y', 'Inkjet', 'Broter ', 1, 1, 145, 'B3', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('GIGABIT DGE-528T', 'Lan Card ', 'D-link ', 0, 5, 146, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('DFE-520TX', 'Lan Card ', 'D-Link ', 4, 1, 147, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('i5 3470', 'CPU', 'Intel Core ', 2, 1, 148, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('H61M-E', 'Motherboard', 'Asus ', 2, 1, 149, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('core i5', 'CPU', ' Intel ', 2, 2, 150, 'B2', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('core i5', 'CPU', ' Intel', 2, 2, 151, 'B2', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('core i5', 'CPU', ' Intel ', 2, 1, 152, 'B2', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('core i5', 'CPU', ' Intel ', 2, 1, 153, 'B2', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Core i5', 'CPU', 'Intel', 2, 1, 154, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('Core i5 3470', 'CPU', 'Intel', 2, 1, 155, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('XL-M150', 'Projector', 'Canon', 2, 1, 156, 'B4', '2013-12-05 15:49:36', NULL, 'Old_P');
INSERT INTO `store` VALUES ('v173', 'Computer', 'Acer', 5, 1, 159, 'B4', '2013-12-15 16:34:01', NULL, 'bank');
INSERT INTO `store` VALUES ('Nattapong', 'Ink Jet', 'Nattapong', 131, 3, 164, 'B3', '2013-12-15 22:58:55', 'HP Laserjet P3015', 'tck');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_category`
-- 

CREATE TABLE `store_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `store_category`
-- 

INSERT INTO `store_category` VALUES (3, 'Hardware', 'Keyboard');
INSERT INTO `store_category` VALUES (1, 'Hardware', 'Computer');
INSERT INTO `store_category` VALUES (2, 'Hardware', 'Monitor');
INSERT INTO `store_category` VALUES (4, 'Hardware', 'Mouse');
INSERT INTO `store_category` VALUES (5, 'Hardware', 'RAM');
INSERT INTO `store_category` VALUES (6, 'Hardware', 'Power Supply');
INSERT INTO `store_category` VALUES (7, 'Hardware', 'CPU');
INSERT INTO `store_category` VALUES (8, 'Hardware', 'Motherboard');
INSERT INTO `store_category` VALUES (9, 'Hardware', 'LAN card');
INSERT INTO `store_category` VALUES (10, 'Ink', 'Toner');
INSERT INTO `store_category` VALUES (11, 'Ink', 'Ink Jet');
INSERT INTO `store_category` VALUES (12, 'Accessories', 'VGA Cable');
INSERT INTO `store_category` VALUES (13, 'Accessories', 'Power Cable');
INSERT INTO `store_category` VALUES (14, 'Accessories', 'LAN Cable');
INSERT INTO `store_category` VALUES (15, 'Accessories', 'TEL Cable');
INSERT INTO `store_category` VALUES (16, 'Accessories', 'SATA Cable');
INSERT INTO `store_category` VALUES (17, 'Accessories', 'Other Cable');
INSERT INTO `store_category` VALUES (18, 'Accessories', 'Other');
INSERT INTO `store_category` VALUES (19, 'vender', 'IT Solution and Service Co.,Ltd');
INSERT INTO `store_category` VALUES (20, 'vender', 'Metro Systems Corporation Public Co.,Ltd');
INSERT INTO `store_category` VALUES (21, 'vender', 'Dell Corporation(Thailand) Co.,Ltd');
INSERT INTO `store_category` VALUES (22, 'vender', 'IT Essentials(Thailand) Co.,Ltd');
INSERT INTO `store_category` VALUES (23, 'vender', 'Ribbon Distributor Co.,Ltd');
INSERT INTO `store_category` VALUES (24, 'vender', 'Whizz-work Technology(Thailand) Co.,Ltd');
INSERT INTO `store_category` VALUES (25, 'vender', 'Phumthai Comsys Co.,Ltd');
INSERT INTO `store_category` VALUES (26, 'vender', 'I.D. Supply Co.,Ltd');
INSERT INTO `store_category` VALUES (27, 'vender', 'E.P. Stationery Co.,Ltd');
INSERT INTO `store_category` VALUES (28, 'vender', 'Detapro Computer System Co.,Ltd');
INSERT INTO `store_category` VALUES (29, 'vender', 'Hewlett-Packard(Thailand) Co.,Ltd');
INSERT INTO `store_category` VALUES (30, 'vender', 'Sun TAWEESARP');
INSERT INTO `store_category` VALUES (31, 'Hardware', 'VGA Card');
INSERT INTO `store_category` VALUES (32, 'Hardware', 'Projector');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `ext_user` int(5) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (18, 'tck', '81dc9bdb52d04dc20036dbd8313ed055', 'Nattapong', 'Thitichawalitkul', 'IT', 77634, 1);
INSERT INTO `user` VALUES (2, 'bank', '827ccb0eea8a706c4c34a16891f84e7b', 'Chaowalit K.', '', 'IT', 33421, 1);
INSERT INTO `user` VALUES (11, 'monfang_s', '884cafab3b7f3dc7cabd02ada51ee316', 'Monfangmickarush', 'Suwannachairob', 'IT', 77490, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `withdraw`
-- 

CREATE TABLE `withdraw` (
  `ID` int(11) NOT NULL auto_increment,
  `ID_Store` int(11) NOT NULL,
  `Order` int(50) default NULL,
  `Type` varchar(50) NOT NULL,
  `Vendor` varchar(50) default NULL,
  `Description` varchar(50) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price/Unit` int(50) default NULL,
  `Amount` int(11) default NULL,
  `Cost_Center` int(11) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Manager` varchar(50) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  `En` varchar(50) NOT NULL,
  `Ext` int(11) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Support_Prt` varchar(50) default NULL,
  `Building` varchar(50) NOT NULL,
  `Date_time` date NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `ID_Store` (`ID_Store`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `withdraw`
-- 

INSERT INTO `withdraw` VALUES (1, 82, NULL, 'Inkjet', NULL, 'HP', 1, NULL, NULL, 1234, 'IT', 'Santi_Pr', 'Tawee_S', '102590', 77259, 'CE411A', NULL, 'B3', '2013-12-05');
INSERT INTO `withdraw` VALUES (2, 133, NULL, 'Printer', NULL, 'Epson', 2, NULL, NULL, 4590, 'STW', 'wdth_db', 'neung_t', '234201', 77634, 'LQ-2190', NULL, 'B6', '2013-12-05');
INSERT INTO `withdraw` VALUES (3, 157, NULL, 'Monitor', NULL, 'dell', 1, NULL, NULL, 2305, 'IT', 'Santi_pr', 'Chaowalit_k', '102203', 77275, 'E1914H', NULL, 'B4', '2013-12-05');
INSERT INTO `withdraw` VALUES (15, 164, NULL, 'Ink Jet', NULL, 'Ink Jet Nattapong Nattapong', 7, NULL, NULL, 12345, 'IT', 'Santi_pr', 'Nattapong', '12345', 77634, 'Nattapong', 'HP Laserjet P3015', 'B3', '2013-12-15');
