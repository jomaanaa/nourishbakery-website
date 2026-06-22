-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nourishbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `Password`, `Username`, `Email`, `Phone`, `Gender`, `Image`) VALUES
(4, '123', 'Jomana Ahmed', 'jomanaahmed@gmail.com', 1025590025, 'Female', './admin/haallwaa.png'),
(6, '1234', 'maryam', 'maryamkilany04@gmail.com', 1005079327, 'female', './admin/me.jpg'),
(7, '1234', 'joudy ahmed mohamed', 'joudy@gmail.com', 1005079327, 'female', './admin/me4me4.jpg'),
(8, 'Mariam12345', 'Mariam Anwar', 'mariammohd831@gmail.com', 1004061734, 'female', './admin/WIN_20241209_14_27_52_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` char(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `ZIP` char(5) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `Name`, `Email`, `Password`, `Phone`, `Street`, `ZIP`, `City`, `Gender`, `Image`) VALUES
(1, 'Nouran Ayman Mohamed', 'Nouran.Ayman123@gmail.com', 'Nouran12345', '01151234889', 'Sheikh zayed compound utopia', '12346', 'Giza', '', ''),
(2, 'Jomana Ahmed', 'JomanaAhmed377@yahoo.com', '77889910', '01234567910', 'compound Dream sahrawi street', '78910', 'Giza', '', ''),
(3, 'Ahmad Magdy', 'AhmadM@gmail.com', '556677AM', '01005677995', 'Dokii rawda street', '44779', 'Giza', '', ''),
(5, 'ahmad', 'doddo8208@gmail.com', '123', '11111111111', 'dcdc', '2344', 'aa', '', ''),
(22, 'ahmad magdy', 'ahmad123@gmail.com', '123', '01112228559', '3 rawda', '2344', 'cairo', 'Male', './Customer/images11.jfif'),
(23, 'maryam', 'maryamkilany04@gmail.com', '', '01005079327', 'District8,Street12', '1234', '6 October', 'female', './Customer/me.jpg'),
(24, 'maryam', 'maryamkilany04@gmail.com', '', '01005079327', 'District8,Street12', '1234', '6 October', 'female', './Customer/me.jpg'),
(25, 'maryam', 'maryamkilany04@gmail.com', '', '01005079327', 'District8,Street12', '1234', '6 October', 'female', './Customer/me.jpg'),
(26, 'maryam', 'maryamkilany04@gmail.com', '1234', '01005079327', 'District8,Street12', '1234', '6 October', 'female', './Customer/me.jpg'),
(27, 'Mariam Anwar', 'mariammohd831@gmail.com', '456', '01004061734', 'sheikh zayed', '12588', 'Giza', 'female', './Customer/WIN_20241209_14_27_52_Pro.jpg'),
(28, 'Mariam Anwar', 'mariammohd831@gmail.com', '123', '01004061734', 'sheikh zayed', '12588', 'Giza', 'male', './Customer/');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `I_ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Qauntity_Available` int(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `S_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`I_ID`, `Name`, `Qauntity_Available`, `Image`, `S_ID`) VALUES
(1, 'eggs', 34, './item/31vKWEGCKzL.jpg', 1),
(3, 'water', 10, './item/Water.jpg', 1),
(4, 'sugar', 40, './item/sugar.jfif', 2),
(5, 'Cacao powder', 35, './item/images.jfif', 2),
(6, 'Oil', 6, './item/oil.jfif', 2),
(7, 'Flour', 23, './item/flour.jpg', 1),
(8, 'Butter', 5, './item/64d89bd91ed82c06817c587b-great-value-sweet-cream-salted-butter.jpg', 1),
(9, 'Condensed milk', 31, './item/download.jfif', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `O_ID` int(5) NOT NULL,
  `Payment` varchar(10) NOT NULL,
  `Date` datetime NOT NULL,
  `Total` int(100) NOT NULL,
  `C_ID` int(5) NOT NULL,
  `Note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`O_ID`, `Payment`, `Date`, `Total`, `C_ID`, `Note`) VALUES
(1, 'Cash', '2024-12-21 00:00:00', 220, 1, ''),
(2, 'Cash', '2024-12-21 00:00:00', 220, 1, ''),
(3, 'Cash', '2024-12-21 00:00:00', 220, 1, ''),
(4, 'Cash', '2024-12-22 00:00:00', 1570, 1, ''),
(5, 'Credit', '2024-12-22 00:00:00', 1570, 1, ''),
(6, 'Cash', '2024-12-22 00:00:00', 1570, 1, ''),
(7, 'Credit', '2024-12-22 00:00:00', 370, 1, ''),
(8, 'Cash', '2024-12-22 00:00:00', 370, 1, ''),
(9, 'Credit', '2024-12-22 00:00:00', 370, 1, ''),
(10, 'Cash', '2024-12-22 00:00:00', 970, 28, ''),
(11, 'Credit', '2024-12-22 00:00:00', 970, 28, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(5) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Price` int(10) NOT NULL,
  `Desc` varchar(500) NOT NULL,
  `collection` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `Image`, `Name`, `Stock`, `Price`, `Desc`, `collection`) VALUES
(4, './products/prookie.png', 'Prookie Pie', 100, 150, 'A classic semi-sweet chocolate chip cookie cradling a house-made brownie topped with a scoop of fresh vanilla bean mousse and drizzled with semi-sweet chocolate.', 'Classic'),
(5, './products/tresleche.png', 'Eggnog Tres Leches Cake', 300, 300, 'A light, fluffy vanilla cake soaked in eggnog and Tres leches sauce, topped with whipped\n cream and sprinkled with a layer of cinnamon.', 'Classic'),
(6, './products/cookies and cream (1).png', 'Cookies & Cream', 100, 250, 'A marbled dark chocolate and vanilla cookie packed with white drops and topped with a white drizzle and crumbly cookies & cream pieces.', 'Classic'),
(7, './products/cinnamon crunsh.png', 'Cinnamon Crunch', 100, 400, 'A warm cinnamon cookie topped with vanilla cream cheese glaze, crunchy cinnamon cereal \nstreusel, and a dusting of cinnamon sugar.', 'Classic'),
(8, './products/cowboy cookie.png', 'Cowboy Cookie', 600, 200, 'A warm oatmeal cookie packed with tasty semi-sweet chocolate drops, sweetened shredded coconut, and crunchy toasted pecans.', 'Classic'),
(9, './products/rasberry (1).png', 'Raspberry Butter Cookie', 500, 270, 'A mouth-watering butter cake cookie infused with raspberry flavour then smothered with a buttery glaze, a silky raspberry topping, and a dollop of creamy white buttercream.', 'Classic'),
(10, './products/ressess.png', 'Peanut Butter Cookie', 400, 320, 'A classic peanut butter cookie topped with a pool of melted peanut butter chips and sprinkled with REESES peanut butter.', 'Classic'),
(11, './products/cookies (1).png', 'Chocolate Chunk', 200, 170, 'Chocolate chip, but make it chunky, a delicious cookie filled with irresistible semi-sweet chocolate chunks and a sprinkle of flaky sea salt.', 'Classic'),
(23, './products/Lemon Crinkle.png', 'Lemon Crinkle', 9, 600, '', 'Xmas'),
(26, './products/hotchocolate.png', 'Frozen Hot Chocolate', 5, 300, 'A rich chocolate cookie smothered in hot cocoa-flavored mousse and topped with fluffy mini marshmallows.', 'New'),
(27, './products/cheesecake.png', 'White Chocolate Raspberry Cheesecake', 8, 300, 'A smooth cheesecake filling infused with white chocolate, marbled and baked with raspberry jam, then topped with a whipped cream dollop and white chocolate curls.', 'New'),
(28, './products/doda.png', 'Snickerdoodle Cupcake', 6, 300, 'A warm cinnamon sugar cookie topped with cream cheese frosting and an extra dash of cinnamon sugar.', 'New'),
(29, './products/holiday.png', 'Holiday Confetti', 13, 300, 'A warm vanilla sugar cookie bursting with red & green holiday sprinkles.', 'New'),
(30, './products/Chocolate Crumb.png', 'Chocolate Crumb', 16, 200, '', 'Xmas'),
(31, './products/Pink Madness.png', 'Pink Madness', 24, 200, '', 'Xmas'),
(32, './products/Lucky Charms.png', 'Lucky Charms', 54, 200, '', 'Xmas');

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `P_ID` int(5) NOT NULL,
  `I_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`P_ID`, `I_ID`) VALUES
(0, 0),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(5, 1),
(5, 4),
(5, 7),
(5, 9),
(6, 3),
(6, 6),
(12, 1),
(25, 2),
(25, 4),
(25, 5),
(26, 1),
(31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `P_ID` int(5) NOT NULL,
  `O_ID` int(5) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`P_ID`, `O_ID`, `Quantity`) VALUES
(4, 2, 1),
(4, 3, 1),
(27, 4, 1),
(26, 4, 4),
(27, 5, 1),
(26, 5, 4),
(27, 6, 1),
(26, 6, 4),
(28, 7, 1),
(28, 8, 1),
(28, 9, 1),
(27, 10, 1),
(23, 10, 1),
(27, 11, 1),
(23, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(5) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `PhoneNumber` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `Name`, `Address`, `email`, `PhoneNumber`) VALUES
(1, 'ahmad magdy', '3 rawda', 'ahmadmagdy869@gmail.com', '01112228559'),
(2, 'maryam', 'palm hills', 'maryam8208@gmail.com', '01221166345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `FK_S` (`S_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `FK_CID` (`C_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`P_ID`,`I_ID`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `FK_Order` (`O_ID`),
  ADD KEY `FK_Product` (`P_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `I_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `O_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_S` FOREIGN KEY (`S_ID`) REFERENCES `supplier` (`SupplierID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_CID` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `FK_Order` FOREIGN KEY (`O_ID`) REFERENCES `order` (`O_ID`),
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
