-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybds`
--

-- --------------------------------------------------------

--
-- Table structure for table `full_contractg`
--

CREATE TABLE `full_contractg` (
  `ID` int(11) NOT NULL,
  `Full_Contract_Code` varchar(10) DEFAULT NULL,
  `Customer_Name` text NOT NULL,
  `Year_Of_Birth` int(11) DEFAULT NULL,
  `SSN` varchar(15) NOT NULL,
  `Customer_Address` varchar(100) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Property_ID` int(11) NOT NULL,
  `Date_Of_Contract` date DEFAULT NULL,
  `Price` int(18) DEFAULT NULL,
  `Deposit` int(18) DEFAULT NULL,
  `Remain` int(18) DEFAULT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `full_contractg`
--

INSERT INTO `full_contractg` (`ID`, `Full_Contract_Code`, `Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`) VALUES
(1, 'HD20230000', 'Lý Thị Huyền Châu', 1990, '36 Lê Văn Sỹ, Q', '36 Lê Văn Sỹ, Quận 3, TP.HCM', '0967686878', 2, '2016-08-11', 2000000000, 200000000, 1800000000, ''),
(2, 'HD20230000', 'Trần Công Anh', 1989, '404948494', '36 Lê Văn Sỹ, Quận 3, TP.HCM', '0967686878', 2, '2019-11-12', 2000000000, 200000000, 900000000, ''),
(5, 'HD2300002', 'Lý Thị Huyền Châu', 1990, '301198908', '45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh', '0919686576', 1, NULL, 1000000000, 100000000, 900000000, ''),
(6, 'HD2300003', 'Lý Thị Huyền Châu', 1990, '301198908', '45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh', '0919686576', 1, NULL, 1000000000, 100000000, 900000000, ''),
(7, 'HD2300004', 'Lý Thị Huyền Châu', 1990, '301198908', '45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh', '0919686576', 1, NULL, 1000000000, 100000000, 900000000, ''),
(8, 'HD2300005', 'Lý Thị Huyền Châu', 1990, '301198908', '45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh', '0919686576', 1, NULL, 1000000000, 100000000, 900000000, ''),
(9, 'HD2300006', 'Lý Thị Huyền Châu', 1990, '404948494', '36 Lê Văn Sỹ, Quận 3, TP.HCM', '0967686878', 2, '2019-11-12', 2000000000, 200000000, 900000000, ''),
(10, 'HD2300007', 'Lý Thị Huyền Châu', 1990, '23141516', '36 Lê Văn Sỹ, Quận 3, TP.HCM', '0967686878', 2, '2023-11-18', 2000000000, 200000000, 900000000, '');

--
-- Triggers `full_contractg`
--
DELIMITER $$
CREATE TRIGGER `before_insert_contract` BEFORE INSERT ON `full_contractg` FOR EACH ROW BEGIN
    DECLARE current_year VARCHAR(2);
    DECLARE contract_number INT;

    SET current_year = RIGHT(YEAR(CURDATE()), 2);

    SELECT MAX(CAST(SUBSTRING(Full_Contract_Code, 5) AS SIGNED)) INTO contract_number
    FROM full_contractg
    WHERE SUBSTRING(Full_Contract_Code, 1, 4) = CONCAT('HD', current_year);

    IF contract_number IS NOT NULL THEN
        SET NEW.Full_Contract_Code = CONCAT('HD', current_year, LPAD(contract_number + 1, 5, '0'));
    ELSE
        SET NEW.Full_Contract_Code = CONCAT('HD', current_year, '00001');
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `full_contractg`
--
ALTER TABLE `full_contractg`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `full_contractg`
--
ALTER TABLE `full_contractg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
