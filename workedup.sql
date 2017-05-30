-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 05:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workedup`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `userId`, `orderDateTime`, `orderTotal`) VALUES
(1, 1, '2017-03-28 16:49:22', '283.78'),
(2, 1, '2017-04-03 20:46:55', '929.65'),
(3, 1, '2017-04-03 22:43:03', '29.95');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `orderLineId` int(4) NOT NULL,
  `orderNo` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `subTotal` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderLineId`, `orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
(1, 1, 5, 1, '100.00'),
(2, 1, 6, 6, '183.78'),
(3, 2, 1, 1, '29.95'),
(4, 2, 3, 6, '899.70'),
(5, 3, 1, 1, '29.95');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicName` varchar(50) NOT NULL,
  `prodDescrip` varchar(1000) DEFAULT NULL,
  `prodPrice` decimal(8,2) NOT NULL DEFAULT '0.00',
  `prodQuantity` int(4) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicName`, `prodDescrip`, `prodPrice`, `prodQuantity`) VALUES
(1, 'Sennheiser HD203 Headphone', 'Images/Products/1.jpg', 'The HD 203 studio stereo headphones are the ideal partner for home recording. The rugged lightweight headphones have a secure fit that blocks out ambient noise and keeps your music and monitoring cues from leaking out to adjacent microphones or other people. This headphone is versatile enough for use with portable audio devices like MP3 players but also the latest audio interfaces and home recording gear.<br><br>\n\nThese closed, semi-around-the-ear dynamic headphones provide excellent attenuation of ambient noise. Powerful neodymium magnets and lightweight diaphragms capable of high SPL''s make the HD 203 ideal for everything from casual music listening and gaming to studio applications.', '29.95', 100),
(2, 'Anker PowerCore 20100 20000mAh', 'Images/Products/2.jpg', 'This 4.8A charger also offers fast charging using PowerIQ and VoltageBoost technologies, which combines great with the unit''s dual USB charge ports. On the business end of the PowerCore, there is little to dislike, save for the fact that fully charging the unit can take upwards of 8 hours depending on the charger used. This is rarely an issue though, as the downright enormous capacity of this charger means you only need to do this about once a week, and can easily be done overnight.<br><br>\n\nAll in all, a powerbank that can offer 20000mAh while weighing less than a pound is an achievement in itself, and Anker''s sophisticated design only sweetens the deal. The PowerCore 20100 is no doubt one of the most cost-efficient power banks available.', '39.99', 100),
(3, 'JBL Charge 3 Portable Speaker', 'Images/Products/3.jpg', 'JBL Charge 3 is the ultimate, high-powered portable Bluetooth speaker with powerful stereo sound and a power bank all in one package. The Charge 3 takes the party everywhere, poolside or in the rain, thanks to the waterproof design, durable fabric and rugged housing. Its high-capacity 6,000mAh battery provides 20 hours of playtime and can charge your smartphones and tablets via its USB output. A built-in noise and echo-cancelling speakerphone gives you crystal clear calls with the press of a button. Wirelessly link multiple JBL Connect-enabled speakers to amplify the listening experience.', '149.95', 100),
(4, 'Samsung Galaxy S7 Edge', 'Images/Products/4.jpg', 'The Samsung Galaxy S7 Edge is powered by 1.6GHz octa-core it comes with 4GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 200GB via a microSD card. As far as the cameras are concerned, the Samsung Galaxy S7 Edge packs a 12-megapixel primary camera on the rear and a 5-megapixel front shooter for selfies.<br><br>\n\nThe Samsung Galaxy S7 Edge runs Android 6.0 and is powered by a 3600mAh non removable battery. It measures 150.90 x 72.60 x 7.70 (height x width x thickness) and weighs 157.00 grams.\n\nThe Samsung Galaxy S7 Edge is a dual SIM (GSM and GSM) smartphone that accepts . Connectivity options include Wi-Fi, GPS, Bluetooth, NFC, USB OTG, 3G and 4G (with support for Band 40 used by some LTE networks in India). Sensors on the phone include Compass Magnetometer, Proximity sensor, Accelerometer, Ambient light sensor, Gyroscope and Barometer.', '670.00', 100),
(5, 'Anker 8200 DPI Gaming Mouse', 'Images/Products/5.jpg', 'Discover the control, precision and style that you''ve been missing with the Ensis 320 Brushed Aluminum Mouse Pad. Crafted of 1mm hairline brushed aluminum alloy for a lustrous, metallic appearance, this sleek, powerful surface enhances your mouse''s tracking and increases gliding speed, giving you heightened control over each movement and command. Carefully studied over time, the Ensis 320 is shown to contribute minimal data loss, as determined by advanced S.Q.A.T. technology.<br><br>\n\nWhether you''re in the office or the game room, make the complete computer system upgrade with the Ensis 320 Brushed Aluminum Mouse Pad.Mionix Ensis 320 Brushed Aluminum Mouse Pad:Delivers superior tracking performanceMade from hairline brushed aluminum alloy with a low data-loss treatmentUltra-low friction surface allows you to glide your mouse quickly and smoothlyTested using S.Q.A.T.', '100.00', 100),
(6, 'Sony DVD Player DVPSR170', 'Images/Products/6.jpg', 'This compact 270mm wide DVD player fits neatly into the smallest space but gives you multi-format playback of your discs. Plus, it connects simply to your Hi-Fi system, to quickly upgrade the sound of your movie.<br>\n<br>\nFeatures:<br>\nPlayback from a wide range of formats<br>\nChoose fast or slow playback with sound<br>\nRemember your place in up to 6 DVD discs<br>\nCreate your own slideshow with soundtrack<br>\nSpace saving compact design<br><br>\n\nDimensions: H6.9 x W24.4 x D34.5<br>\nWeight: 1.357kg<br>', '30.63', 100),
(7, 'Skullcandy S2PGFY-3 Earphone', 'Images/Products/7.jpg', 'Get high on the sweet sounds of your favorite song with the Skullcandy Smokin'' Buds 2 with Mic. An upgraded version of your favorite ear buds, the Smokin'' Buds 2 deliver crisp sound in a fresh new design that withstands sweat and snow so you can keep the tunes going whether you''re on top of a mountain or shredding the skatepark. Supreme Sound provides attacking bass, natural vocals, and precision highs to let you experience music the way it was meant to be heard, and an acoustic housing allows you to witness your Supreme Sound at work.<br><br>\r\n\r\nA Mic in-line microphone lets you answer phone calls on your smart phone with the press of a button. The flat cable gets less tangled than traditional round ones, and different size interchangeable silicone tips ensure that there''s a perfect fit for you.', '12.99', 100),
(8, 'Xiaomi Mi Smart Band', 'Images/Products/8.jpg', 'The gadget includes an OLED display that shows the time, step count and heart rate and costs 149 RMB or $23.<br><br>\n\nXiaomi first released a wearable tracker two years ago with the Mi Band 1, a simple $13 wrist band that told the time and counted steps. It followed that up with the Mi Band Pulse, which added a heart rate sensor.<br><br>\n\nThe new Mi Band 2 improves on the last heart-rate tracker with an "upgraded pedometer algorithm" and a 20-day battery. The band is also water resistant. Optical heart rate sensors typically work by shining an LED light into the skin and measuring how the light is scattered by blood flow.', '24.99', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `UsersType` varchar(45) DEFAULT NULL,
  `UsersFName` varchar(45) DEFAULT NULL,
  `UsersLName` varchar(45) DEFAULT NULL,
  `UsersAddress` varchar(45) DEFAULT NULL,
  `UsersPostCode` varchar(8) DEFAULT NULL,
  `UsersTelNo` int(11) DEFAULT NULL,
  `UsersEmail` varchar(45) NOT NULL,
  `UsersPassword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `UsersType`, `UsersFName`, `UsersLName`, `UsersAddress`, `UsersPostCode`, `UsersTelNo`, `UsersEmail`, `UsersPassword`) VALUES
(1, 'C', 'Senthuran', 'Ambalavanar', '32,4/2,Madangahawatte Road, Colombo 6', '0600', 98098098, 'senthuranrc16@gmail.com', '1234'),
(2, 'C', 'Sanjayan', 'Ambalavanar', '32, 42nd Lane, Colombo 06', '0060', 725456554, 'sanjayan1997@gmail.com', '1234'),
(3, 'A', 'John', 'Moore', 'Workedahomic Offices', 'N2 7UK', 2079116464, 'john@workedup.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`orderLineId`),
  ADD KEY `orderNo` (`orderNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `UsersEmail_UNIQUE` (`UsersEmail`),
  ADD UNIQUE KEY `userId_UNIQUE` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `orderLineId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
