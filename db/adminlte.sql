-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2022 at 02:25 PM
-- Server version: 10.6.8-MariaDB-1
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `br_id` int(11) NOT NULL,
  `brName` varchar(255) NOT NULL,
  `brLocation` varchar(255) NOT NULL,
  `brManager` varchar(255) NOT NULL,
  `brPhone` varchar(255) NOT NULL,
  `brEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`br_id`, `brName`, `brLocation`, `brManager`, `brPhone`, `brEmail`) VALUES
(1, 'Mirpur Branch', 'Mirpur', 'Joy', '01959958679', 'antohin.joy@gmail.com'),
(2, 'Kawranbazar Branch', 'Kawranbazar', 'Ovi', '01958858679', 'dohavo6111@cocyo.com'),
(3, 'Sample Branch', 'fasdfa', 'asdf', '01854235923', 'tepoye8395@lagsixtome.com'),
(4, 'Dhanmondi Branch', 'Dhanmondi', 'Jobayer', '01525369231', 'prosen.joy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `com_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `comName` varchar(255) NOT NULL,
  `comAdd` varchar(255) NOT NULL,
  `comPhone` varchar(255) NOT NULL,
  `comEmail` varchar(255) NOT NULL,
  `comManagerName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`com_id`, `br_id`, `comName`, `comAdd`, `comPhone`, `comEmail`, `comManagerName`) VALUES
(1, 1, 'Facebook', '4818 Weekley Street, San Antonio, TX', '2103204467', 'dohavo6111@cocyo.com', 'Zuck'),
(2, 2, 'Deshi Shari Ghar', '194  Valley Drive', '7122121037', 'tepoye8395@lagsixtome.com', 'Shardar Ali'),
(3, 3, 'Alom Shop', 'Word no-7, Kachiapar, T.M. Bazar, Sandwip, Chittagong - 4300', '2103204467', 'dohavo6111@cocyo.com', 'Md. Alom'),
(4, 4, 'Ali Stationary', 'Word no-7, Kachiapar, T.M. Bazar, Sandwip, Chittagong - 4300', '01764277629', 'ali.stationary@gmail.com', 'Shardar Ali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `cusName` varchar(255) NOT NULL,
  `cusEmail` varchar(255) NOT NULL,
  `cusAdd` varchar(255) NOT NULL,
  `cusPhoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `br_id`, `cusName`, `cusEmail`, `cusAdd`, `cusPhoneNumber`) VALUES
(1, 1, 'Prosenjit Majumder Joy', 'antohin.joy@gmail.com', '523, North Ibrahimpur, Battalion Bou Bazar, Karful, Dhaka - 1206', '01764277629'),
(2, 2, 'Demetra Barone', 'dohavo6111@cocyo.com', '4818 Weekley Street, San Antonio, TX', '2103204467'),
(3, 3, 'Gordon M Chase', 'tepoye8395@lagsixtome.com', '194  Valley Drive', '7122121037'),
(4, 4, 'Prosenjit Majumder Joy', 'prosen.joy@gmail.com', '523, North Ibrahimpur, Kafrul', '01764277629');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `em_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `emDesignation` varchar(255) NOT NULL,
  `emName` varchar(255) NOT NULL,
  `emAdd` varchar(255) NOT NULL,
  `emNid` varchar(255) NOT NULL,
  `emPhone` varchar(255) NOT NULL,
  `emEmail` varchar(255) NOT NULL,
  `emJoiningDate` date NOT NULL,
  `emSalary` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`em_id`, `br_id`, `emDesignation`, `emName`, `emAdd`, `emNid`, `emPhone`, `emEmail`, `emJoiningDate`, `emSalary`, `pass`, `status`) VALUES
(1, 1, 'Manager', 'Prosenjit Majumder Joy', '523, North Ibrahimpur, Kafrul, Dhaka - 1206', '5550283555', '01764277629', 'antohin.joy@gmail.com', '2022-06-01', 10000, '12345678', 1),
(2, 1, 'Jr Software Engineer', 'Shafin', '4818 Weekley Street, San Antonio, TX', '5532285523', '2103204467', 'shafin@gmail.com', '2022-06-23', 15000, '12345678', 1),
(4, 4, 'Manager', 'Jobayer', 'Word no-7, Kachiapar, T.M. Bazar, Sandwip, Chittagong - 4300', '7775282523', '2103204467', 'antohin.joy@gmail.com', '2022-06-20', 342, '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `ex_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `exPurpose` varchar(255) NOT NULL,
  `exAmount` int(11) NOT NULL,
  `exRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `proBarcode` varchar(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proDes` varchar(255) NOT NULL,
  `proType` varchar(255) NOT NULL,
  `proSize` varchar(255) NOT NULL,
  `proCostPrice` int(11) NOT NULL,
  `proSalePrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `br_id`, `proBarcode`, `proName`, `proDes`, `proType`, `proSize`, `proCostPrice`, `proSalePrice`, `quantity`) VALUES
(1, 1, '12802525', 'Full sleeve t-shirt', 'Dont Quit full sleeve t-shirt', 'Smartphone', 'gm', 300, 450, 2),
(2, 2, '61324939', 'Emami Fair And Handsome Cream', 'Multicolor Sathkahon Saree for Women with Tangail Saree', 'shari', 'S, M, L, XL', 250, 100, 25),
(3, 3, '12501972', 'Dhupiyan Check Saree', 'Do not Quit full sleeve t-shirt for man', 'Women clothing', 'Int blue', 300, 1000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `pur_detail_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `purDate` date NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `proBarcode` varchar(255) NOT NULL,
  `prPrice` int(11) NOT NULL,
  `purQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_summary`
--

CREATE TABLE `tbl_purchase_summary` (
  `pur_summary_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `purDate` date NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `disAmount` int(11) NOT NULL,
  `netAmount` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `dueAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `sales_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `salesDate` date NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `proBarcode` varchar(255) NOT NULL,
  `prPrice` int(11) NOT NULL,
  `purQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `disAmount` int(11) NOT NULL,
  `netAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_summary`
--

CREATE TABLE `tbl_sales_summary` (
  `summary_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `summaryDate` date NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `disAmount` int(11) NOT NULL,
  `netAmount` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `dueAmount` int(11) NOT NULL,
  `payDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`pur_detail_id`);

--
-- Indexes for table `tbl_purchase_summary`
--
ALTER TABLE `tbl_purchase_summary`
  ADD PRIMARY KEY (`pur_summary_id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_sales_summary`
--
ALTER TABLE `tbl_sales_summary`
  ADD PRIMARY KEY (`summary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `pur_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_summary`
--
ALTER TABLE `tbl_purchase_summary`
  MODIFY `pur_summary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sales_summary`
--
ALTER TABLE `tbl_sales_summary`
  MODIFY `summary_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
