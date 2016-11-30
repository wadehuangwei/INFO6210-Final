-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-30 05:08:53
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- 表的结构 `csvTest`
--

CREATE TABLE `csvTest` (
  `DeviceType` varchar(30) NOT NULL,
  `DevicePrice` varchar(30) NOT NULL,
  `Inventory` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `csvTest`
--

INSERT INTO `csvTest` (`DeviceType`, `DevicePrice`, `Inventory`) VALUES
('Medical Imaging', '5.99', 300),
('Blood Test', '2.99', 500),
('Urine Test ', '2.99', 500);

-- --------------------------------------------------------

--
-- 表的结构 `Device`
--

CREATE TABLE `Device` (
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL,
  `DevicePrice` decimal(12,2) DEFAULT NULL,
  `DeviceInventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Diagnosis`
--

CREATE TABLE `Diagnosis` (
  `DiagnosisNumber` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `TestNumber` int(11) DEFAULT NULL,
  `PatientID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Disease`
--

CREATE TABLE `Disease` (
  `DiseaseName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `SymphtomID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Doctor`
--

CREATE TABLE `Doctor` (
  `DoctorID` int(11) NOT NULL,
  `HospitalID` int(11) NOT NULL,
  `Speciality` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Doctor`
--

INSERT INTO `Doctor` (`DoctorID`, `HospitalID`, `Speciality`, `Title`) VALUES
(1, 1, 'specialty', 'title');

-- --------------------------------------------------------

--
-- 表的结构 `Drug`
--

CREATE TABLE `Drug` (
  `DrugID` int(11) NOT NULL,
  `DrugName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `SymphtomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Drug`
--

INSERT INTO `Drug` (`DrugID`, `DrugName`, `SymphtomID`) VALUES
(1, 'drug', 1);

-- --------------------------------------------------------

--
-- 表的结构 `HealthRecord`
--

CREATE TABLE `HealthRecord` (
  `HealthRecordNumber` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Weight` decimal(6,2) DEFAULT NULL,
  `HeartRate` int(11) DEFAULT NULL,
  `BloodPressure` int(11) DEFAULT NULL,
  `BodyTemperature` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Hospital`
--

CREATE TABLE `Hospital` (
  `HospitalID` int(11) NOT NULL,
  `HospitalName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Street` varchar(40) CHARACTER SET utf8 NOT NULL,
  `City` varchar(40) CHARACTER SET utf8 NOT NULL,
  `State` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(20) CHARACTER SET utf8 NOT NULL,
  `HospitalOwnership` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Hospital`
--

INSERT INTO `Hospital` (`HospitalID`, `HospitalName`, `Street`, `City`, `State`, `Zipcode`, `HospitalOwnership`) VALUES
(1, 'test hospital', 'street', 'city', 'state', '02148', 'public');

-- --------------------------------------------------------

--
-- 表的结构 `Inventory`
--

CREATE TABLE `Inventory` (
  `WarehouseName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `MedicalRecord`
--

CREATE TABLE `MedicalRecord` (
  `MedicalRecordNumber` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `SymphtomID` int(11) DEFAULT NULL,
  `PrescriptionID` int(11) DEFAULT NULL,
  `DateOfDiagnosis` date DEFAULT NULL,
  `Treatmentresult` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `MedicalRecord`
--

INSERT INTO `MedicalRecord` (`MedicalRecordNumber`, `PatientID`, `SymphtomID`, `PrescriptionID`, `DateOfDiagnosis`, `Treatmentresult`) VALUES
(1, 1, 1, 1, '2016-11-08', 'treatment ok');

-- --------------------------------------------------------

--
-- 表的结构 `Patient`
--

CREATE TABLE `Patient` (
  `PatientID` int(11) NOT NULL,
  `HealthRecordNumber` int(11) NOT NULL,
  `MedicalRecordNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Patient`
--

INSERT INTO `Patient` (`PatientID`, `HealthRecordNumber`, `MedicalRecordNumber`) VALUES
(1, 2222, 1111);

-- --------------------------------------------------------

--
-- 表的结构 `Prescription`
--

CREATE TABLE `Prescription` (
  `PrescriptionID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `DrugID` int(11) DEFAULT NULL,
  `PrescriptionDescription` varchar(80) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Prescription`
--

INSERT INTO `Prescription` (`PrescriptionID`, `DoctorID`, `DrugID`, `PrescriptionDescription`) VALUES
(1, 1, 1, 'prescription');

-- --------------------------------------------------------

--
-- 表的结构 `Supplier`
--

CREATE TABLE `Supplier` (
  `SupplierName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Street` varchar(40) CHARACTER SET utf8 NOT NULL,
  `City` varchar(40) CHARACTER SET utf8 NOT NULL,
  `State` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Country` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Supply`
--

CREATE TABLE `Supply` (
  `SupplierName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Symphtom`
--

CREATE TABLE `Symphtom` (
  `SymphtomID` int(11) NOT NULL,
  `SymphtomDescription` varchar(80) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Symphtom`
--

INSERT INTO `Symphtom` (`SymphtomID`, `SymphtomDescription`) VALUES
(1, 'test symptom');

-- --------------------------------------------------------

--
-- 表的结构 `Test`
--

CREATE TABLE `Test` (
  `TestNumber` int(11) NOT NULL,
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL,
  `TestResult` varchar(80) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `UserAccount`
--

CREATE TABLE `UserAccount` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `FirstName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `LastName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Street` varchar(40) CHARACTER SET utf8 NOT NULL,
  `City` varchar(40) CHARACTER SET utf8 NOT NULL,
  `State` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `AccountType` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `UserAccount`
--

INSERT INTO `UserAccount` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Street`, `City`, `State`, `Zipcode`, `Phone`, `Email`, `AccountType`) VALUES
(1, 'huangwei', '934b535800b1cba8f96a5d72f72f1611', '', '', '', '', '', '', '', 'way.hooah@gmail.com', ''),
(2, 'test', '934b535800b1cba8f96a5d72f72f1611', '', '', '', '', '', '', '', 'way.hooah@gmail.com', '');

-- --------------------------------------------------------

--
-- 表的结构 `Warehouse`
--

CREATE TABLE `Warehouse` (
  `WarehouseName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Street` varchar(40) CHARACTER SET utf8 NOT NULL,
  `City` varchar(40) CHARACTER SET utf8 NOT NULL,
  `State` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Country` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(20) CHARACTER SET utf8 NOT NULL,
  `WarehouseInventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`DeviceType`);

--
-- Indexes for table `Diagnosis`
--
ALTER TABLE `Diagnosis`
  ADD PRIMARY KEY (`DiagnosisNumber`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `TestNumber` (`TestNumber`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `Disease`
--
ALTER TABLE `Disease`
  ADD PRIMARY KEY (`DiseaseName`),
  ADD KEY `SymphtomID` (`SymphtomID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `DeviceType` (`DeviceType`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`DoctorID`),
  ADD KEY `HospitalID` (`HospitalID`);

--
-- Indexes for table `Drug`
--
ALTER TABLE `Drug`
  ADD PRIMARY KEY (`DrugID`),
  ADD KEY `SymphtomID` (`SymphtomID`);

--
-- Indexes for table `HealthRecord`
--
ALTER TABLE `HealthRecord`
  ADD PRIMARY KEY (`HealthRecordNumber`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `Hospital`
--
ALTER TABLE `Hospital`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`WarehouseName`,`DeviceType`),
  ADD KEY `DeviceType` (`DeviceType`);

--
-- Indexes for table `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  ADD PRIMARY KEY (`MedicalRecordNumber`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `SymphtomID` (`SymphtomID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD PRIMARY KEY (`PrescriptionID`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `DrugID` (`DrugID`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SupplierName`);

--
-- Indexes for table `Supply`
--
ALTER TABLE `Supply`
  ADD PRIMARY KEY (`SupplierName`,`DeviceType`),
  ADD KEY `DeviceType` (`DeviceType`);

--
-- Indexes for table `Symphtom`
--
ALTER TABLE `Symphtom`
  ADD PRIMARY KEY (`SymphtomID`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`TestNumber`),
  ADD KEY `DeviceType` (`DeviceType`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `Warehouse`
--
ALTER TABLE `Warehouse`
  ADD PRIMARY KEY (`WarehouseName`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Diagnosis`
--
ALTER TABLE `Diagnosis`
  MODIFY `DiagnosisNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `Drug`
--
ALTER TABLE `Drug`
  MODIFY `DrugID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `HealthRecord`
--
ALTER TABLE `HealthRecord`
  MODIFY `HealthRecordNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `Hospital`
--
ALTER TABLE `Hospital`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  MODIFY `MedicalRecordNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Prescription`
--
ALTER TABLE `Prescription`
  MODIFY `PrescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Symphtom`
--
ALTER TABLE `Symphtom`
  MODIFY `SymphtomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Test`
--
ALTER TABLE `Test`
  MODIFY `TestNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `UserAccount`
--
ALTER TABLE `UserAccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 限制导出的表
--

--
-- 限制表 `Diagnosis`
--
ALTER TABLE `Diagnosis`
  ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`PrescriptionID`) REFERENCES `Prescription` (`PrescriptionID`),
  ADD CONSTRAINT `diagnosis_ibfk_2` FOREIGN KEY (`TestNumber`) REFERENCES `Test` (`TestNumber`),
  ADD CONSTRAINT `diagnosis_ibfk_3` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`),
  ADD CONSTRAINT `diagnosis_ibfk_4` FOREIGN KEY (`DoctorID`) REFERENCES `Doctor` (`DoctorID`);

--
-- 限制表 `Disease`
--
ALTER TABLE `Disease`
  ADD CONSTRAINT `disease_ibfk_1` FOREIGN KEY (`SymphtomID`) REFERENCES `Symphtom` (`SymphtomID`),
  ADD CONSTRAINT `disease_ibfk_2` FOREIGN KEY (`PrescriptionID`) REFERENCES `Prescription` (`PrescriptionID`),
  ADD CONSTRAINT `disease_ibfk_3` FOREIGN KEY (`DeviceType`) REFERENCES `Device` (`DeviceType`);

--
-- 限制表 `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `UserAccount` (`UserID`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`HospitalID`) REFERENCES `Hospital` (`HospitalID`);

--
-- 限制表 `Drug`
--
ALTER TABLE `Drug`
  ADD CONSTRAINT `drug_ibfk_1` FOREIGN KEY (`SymphtomID`) REFERENCES `Symphtom` (`SymphtomID`);

--
-- 限制表 `HealthRecord`
--
ALTER TABLE `HealthRecord`
  ADD CONSTRAINT `healthrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`);

--
-- 限制表 `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`DeviceType`) REFERENCES `Device` (`DeviceType`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`WarehouseName`) REFERENCES `Warehouse` (`WarehouseName`);

--
-- 限制表 `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  ADD CONSTRAINT `medicalrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`),
  ADD CONSTRAINT `medicalrecord_ibfk_2` FOREIGN KEY (`SymphtomID`) REFERENCES `Symphtom` (`SymphtomID`),
  ADD CONSTRAINT `medicalrecord_ibfk_3` FOREIGN KEY (`PrescriptionID`) REFERENCES `Prescription` (`PrescriptionID`);

--
-- 限制表 `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `UserAccount` (`UserID`);

--
-- 限制表 `Prescription`
--
ALTER TABLE `Prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `Doctor` (`DoctorID`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`DrugID`) REFERENCES `Drug` (`DrugID`);

--
-- 限制表 `Supply`
--
ALTER TABLE `Supply`
  ADD CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`SupplierName`) REFERENCES `Supplier` (`SupplierName`),
  ADD CONSTRAINT `supply_ibfk_2` FOREIGN KEY (`DeviceType`) REFERENCES `Device` (`DeviceType`);

--
-- 限制表 `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`DeviceType`) REFERENCES `Device` (`DeviceType`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
