-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2016 at 05:58 PM
-- Server version: 10.1.19-MariaDB
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
CREATE DATABASE IF NOT EXISTS `healthcare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `healthcare`;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressID` int(11) NOT NULL,
  `Street` varchar(40) CHARACTER SET utf8 NOT NULL,
  `City` varchar(40) CHARACTER SET utf8 NOT NULL,
  `State` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Country` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`AddressID`, `Street`, `City`, `State`, `Country`, `Zipcode`) VALUES
(700011, '', '', '', '', ''),
(700010, '1153 Centre Street', 'Boston', 'MA', 'USA', '02130'),
(700003, '1167 Boylston Street', 'Boston', 'MA', 'USA', '02215'),
(700005, '16 Gold Star Rd', 'Cambridge', 'MA', 'USA', '02140'),
(700009, '2014 Washington Street', 'Boston', 'MA', 'USA', '02111'),
(700008, '2014 Washington Street', 'Newton', 'MA', 'USA', '02462'),
(700007, '2100 Dorchester Avenue', 'Boston', 'MA', 'USA', '02124'),
(700002, '22 Warwick Rd', 'Brookline', 'MA', 'USA', '02472'),
(700006, '330 Mount Auburn Street', 'Cambridge', 'MA', 'USA', '02138'),
(700001, '421 Cambridge St', 'Allston', 'MA', 'USA', '02134'),
(700004, '98 Hubbard Street', 'Malden', 'MA', 'USA', '02148');

-- --------------------------------------------------------

--
-- Table structure for table `Device`
--

CREATE TABLE `Device` (
  `DeviceID` int(11) NOT NULL,
  `DeviceTypeID` int(11) NOT NULL,
  `Price` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Device`
--

INSERT INTO `Device` (`DeviceID`, `DeviceTypeID`, `Price`) VALUES
(500001, 400001, '10.99'),
(500002, 400001, '9.99'),
(500003, 400001, '11.99'),
(500004, 400001, '11.49'),
(500005, 400001, '9.99'),
(500006, 400001, '10.99'),
(500007, 400001, '11.99'),
(500008, 400001, '9.99'),
(500009, 400001, '11.49'),
(500010, 400001, '11.99'),
(500011, 400002, '7.99'),
(500012, 400002, '8.49'),
(500013, 400002, '8.99'),
(500014, 400002, '9.29'),
(500015, 400002, '8.79'),
(500016, 400002, '9.99'),
(500017, 400002, '9.59'),
(500018, 400002, '8.99'),
(500019, 400002, '7.99'),
(500020, 400002, '8.49'),
(500021, 400003, '9.99'),
(500022, 400003, '9.29'),
(500023, 400003, '8.99'),
(500024, 400003, '8.49'),
(500025, 400003, '7.99'),
(500026, 400003, '8.19'),
(500027, 400003, '9.19'),
(500028, 400003, '8.69'),
(500029, 400003, '8.79'),
(500030, 400003, '8.99');

-- --------------------------------------------------------

--
-- Table structure for table `DeviceDelivery`
--

CREATE TABLE `DeviceDelivery` (
  `DeviceID` int(11) NOT NULL,
  `ShipDate` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DeviceType`
--

CREATE TABLE `DeviceType` (
  `DeviceTypeID` int(11) NOT NULL,
  `DeviceType` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DeviceType`
--

INSERT INTO `DeviceType` (`DeviceTypeID`, `DeviceType`) VALUES
(400001, 'Medical Imaging'),
(400002, 'Blood Test'),
(400003, 'Urine Test ');

-- --------------------------------------------------------

--
-- Table structure for table `Disease`
--

CREATE TABLE `Disease` (
  `DiseaseID` int(11) NOT NULL,
  `DiseaseName` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Disease`
--

INSERT INTO `Disease` (`DiseaseID`, `DiseaseName`) VALUES
(100001, 'Food Poisoning'),
(100002, 'Pneumonia'),
(100003, 'Diabetes'),
(100004, 'High blood pressure'),
(100005, 'Stomach Flu');

-- --------------------------------------------------------

--
-- Table structure for table `DiseaseHasSymphtom`
--

CREATE TABLE `DiseaseHasSymphtom` (
  `DiseaseID` int(11) NOT NULL,
  `SymphtomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DiseaseHasSymphtom`
--

INSERT INTO `DiseaseHasSymphtom` (`DiseaseID`, `SymphtomID`) VALUES
(100001, 200001),
(100001, 200002),
(100001, 200003),
(100001, 200004),
(100001, 200005),
(100002, 200006),
(100002, 200007),
(100002, 200008),
(100002, 200009),
(100002, 200010),
(100003, 200001),
(100003, 200004),
(100003, 200011),
(100003, 200012),
(100003, 200013),
(100004, 200004),
(100004, 200008),
(100004, 200011),
(100004, 200014),
(100004, 200015),
(100005, 200006),
(100005, 200014),
(100005, 200016),
(100005, 200017);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `DoctorID` int(11) NOT NULL,
  `HospitalID` int(11) NOT NULL,
  `Speciality` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Title` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`DoctorID`, `HospitalID`, `Speciality`, `Title`) VALUES
(1, 800001, 'all', 'high');

-- --------------------------------------------------------

--
-- Table structure for table `Drug`
--

CREATE TABLE `Drug` (
  `DrugID` int(11) NOT NULL,
  `DrugName` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Drug`
--

INSERT INTO `Drug` (`DrugID`, `DrugName`) VALUES
(300001, 'Water'),
(300002, 'Mecobalamin Tablets'),
(300003, 'Chlorphenamine Maleate Tablets'),
(300004, 'American Ginseng Soft Capsules'),
(300005, 'Erlong Zouci Wan'),
(300006, 'Weifu?an Pian'),
(300007, 'Fenbid'),
(300008, 'Antiarrhythmic Drugs'),
(300009, 'Paracetamol'),
(300010, 'Compound Dextromethorphan Hydrobromide T'),
(300011, 'TABELLAE CARBAZOCHROMI'),
(300012, 'QIJU DIHUANGWAN'),
(300013, 'Carbimazole Tablets'),
(300014, 'Ibuprofen Granules'),
(300015, 'Ambrocol'),
(300016, 'DUOPANLITIONPIAN'),
(300017, 'Weitong Pian');

-- --------------------------------------------------------

--
-- Table structure for table `HealthRecord`
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
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `HospitalID` int(11) NOT NULL,
  `HospitalName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Ownership` varchar(40) CHARACTER SET utf8 NOT NULL,
  `AddressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`HospitalID`, `HospitalName`, `Ownership`, `AddressID`) VALUES
(800001, 'MOUNT AUBURN HOSPITAL', 'Voluntary non-profit - Private', 700006),
(800002, 'CARNEY HOSPITAL', 'Proprietary', 700007),
(800003, 'NEWTON-WELLESLEY HOSPITAL', 'Voluntary non-profit - Other', 700008),
(800004, 'TUFTS MEDICAL CENTER', 'Voluntary non-profit - Private', 700009),
(800005, 'BRIGHAM AND WOMEN''S FAULKNER HOSPITAL', 'Voluntary non-profit - Private', 700010);

-- --------------------------------------------------------

--
-- Table structure for table `MedicalRecord`
--

CREATE TABLE `MedicalRecord` (
  `MedicalRecordNumber` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `PrescriptionID` int(11) DEFAULT NULL,
  `DateOfRequest` datetime DEFAULT NULL,
  `Treatmentresult` varchar(40) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MedicalRecord`
--

INSERT INTO `MedicalRecord` (`MedicalRecordNumber`, `PatientID`, `PrescriptionID`, `DateOfRequest`, `Treatmentresult`) VALUES
(1, 1, 1, '2016-11-09 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `MedicalReordHasTest`
--

CREATE TABLE `MedicalReordHasTest` (
  `MedicalRecordNumber` int(11) NOT NULL,
  `TestNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `PatientID` int(11) NOT NULL,
  `NearestWarehouseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`PatientID`, `NearestWarehouseID`) VALUES
(1, 600001);

-- --------------------------------------------------------

--
-- Table structure for table `Prescription`
--

CREATE TABLE `Prescription` (
  `PrescriptionID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `PrescriptionDescription` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `DiseaseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Prescription`
--

INSERT INTO `Prescription` (`PrescriptionID`, `DoctorID`, `PrescriptionDescription`, `DiseaseID`) VALUES
(1, 1, 'A very thorough prescription', 100001);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `AddressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Supply`
--

CREATE TABLE `Supply` (
  `SupplierID` int(11) NOT NULL,
  `DeviceID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Symphtom`
--

CREATE TABLE `Symphtom` (
  `SymphtomID` int(11) NOT NULL,
  `Description` varchar(80) CHARACTER SET utf8 NOT NULL,
  `DrugID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Symphtom`
--

INSERT INTO `Symphtom` (`SymphtomID`, `Description`, `DrugID`) VALUES
(200001, 'Dry mouth', 300001),
(200002, 'Numbness', 300002),
(200003, 'Stuffy nose', 300003),
(200004, 'Fatigue', 300004),
(200005, 'Lossing of Hearing', 300005),
(200006, 'Vomiting', 300006),
(200007, 'Chest pain', 300007),
(200008, 'Irregular heart beat', 300008),
(200009, 'Fever', 300009),
(200010, 'Cough', 300010),
(200011, 'Blood in urine', 300011),
(200012, 'Blurry Vision', 300012),
(200013, 'Frequently Hungry', 300013),
(200014, 'Headache', 300014),
(200015, 'Difficulty breathing', 300015),
(200016, 'Nausea', 300016),
(200017, 'Stomach ache', 300017);

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `TestNumber` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `DeviceID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `TestResult` varchar(80) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE `UserAccount` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `FirstName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `LastName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `AccountType` varchar(40) CHARACTER SET utf8 NOT NULL,
  `AddressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserAccount`
--

INSERT INTO `UserAccount` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Phone`, `Email`, `AccountType`, `AddressID`) VALUES
(1, 'huangwei', '934b535800b1cba8f96a5d72f72f1611', '', '', '', 'way.hooah@gmail.com', '', 700011);

-- --------------------------------------------------------

--
-- Table structure for table `Warehouse`
--

CREATE TABLE `Warehouse` (
  `WarehouseID` int(11) NOT NULL,
  `WarehouseName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Capacity` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `Inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Warehouse`
--

INSERT INTO `Warehouse` (`WarehouseID`, `WarehouseName`, `Capacity`, `AddressID`, `Inventory`) VALUES
(600001, 'Allston', 500, 700001, 100),
(600002, 'Brookline', 800, 700002, 150),
(600003, 'Fenway', 1000, 700003, 200),
(600004, 'Malden', 700, 700004, 170),
(600005, 'Cambridge', 600, 700005, 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressID`),
  ADD UNIQUE KEY `Street` (`Street`,`City`,`State`,`Country`,`Zipcode`);

--
-- Indexes for table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`DeviceID`),
  ADD KEY `DeviceTypeID` (`DeviceTypeID`);

--
-- Indexes for table `DeviceDelivery`
--
ALTER TABLE `DeviceDelivery`
  ADD PRIMARY KEY (`DeviceID`);

--
-- Indexes for table `DeviceType`
--
ALTER TABLE `DeviceType`
  ADD PRIMARY KEY (`DeviceTypeID`);

--
-- Indexes for table `Disease`
--
ALTER TABLE `Disease`
  ADD PRIMARY KEY (`DiseaseID`);

--
-- Indexes for table `DiseaseHasSymphtom`
--
ALTER TABLE `DiseaseHasSymphtom`
  ADD PRIMARY KEY (`DiseaseID`,`SymphtomID`),
  ADD KEY `SymphtomID` (`SymphtomID`);

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
  ADD PRIMARY KEY (`DrugID`);

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
  ADD PRIMARY KEY (`HospitalID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- Indexes for table `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  ADD PRIMARY KEY (`MedicalRecordNumber`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`);

--
-- Indexes for table `MedicalReordHasTest`
--
ALTER TABLE `MedicalReordHasTest`
  ADD PRIMARY KEY (`MedicalRecordNumber`,`TestNumber`),
  ADD KEY `TestNumber` (`TestNumber`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `NearestWarehouseID` (`NearestWarehouseID`);

--
-- Indexes for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD PRIMARY KEY (`PrescriptionID`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `DiseaseID` (`DiseaseID`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SupplierID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- Indexes for table `Supply`
--
ALTER TABLE `Supply`
  ADD PRIMARY KEY (`SupplierID`,`DeviceID`),
  ADD KEY `DeviceID` (`DeviceID`);

--
-- Indexes for table `Symphtom`
--
ALTER TABLE `Symphtom`
  ADD PRIMARY KEY (`SymphtomID`),
  ADD KEY `DrugID` (`DrugID`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`TestNumber`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DeviceID` (`DeviceID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- Indexes for table `Warehouse`
--
ALTER TABLE `Warehouse`
  ADD PRIMARY KEY (`WarehouseID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=700012;
--
-- AUTO_INCREMENT for table `Device`
--
ALTER TABLE `Device`
  MODIFY `DeviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500031;
--
-- AUTO_INCREMENT for table `DeviceType`
--
ALTER TABLE `DeviceType`
  MODIFY `DeviceTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400004;
--
-- AUTO_INCREMENT for table `Disease`
--
ALTER TABLE `Disease`
  MODIFY `DiseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100006;
--
-- AUTO_INCREMENT for table `DiseaseHasSymphtom`
--
ALTER TABLE `DiseaseHasSymphtom`
  MODIFY `DiseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100006;
--
-- AUTO_INCREMENT for table `Drug`
--
ALTER TABLE `Drug`
  MODIFY `DrugID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300018;
--
-- AUTO_INCREMENT for table `HealthRecord`
--
ALTER TABLE `HealthRecord`
  MODIFY `HealthRecordNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Hospital`
--
ALTER TABLE `Hospital`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800006;
--
-- AUTO_INCREMENT for table `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  MODIFY `MedicalRecordNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Prescription`
--
ALTER TABLE `Prescription`
  MODIFY `PrescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Supplier`
--
ALTER TABLE `Supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Symphtom`
--
ALTER TABLE `Symphtom`
  MODIFY `SymphtomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200018;
--
-- AUTO_INCREMENT for table `Test`
--
ALTER TABLE `Test`
  MODIFY `TestNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `UserAccount`
--
ALTER TABLE `UserAccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Warehouse`
--
ALTER TABLE `Warehouse`
  MODIFY `WarehouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600006;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Device`
--
ALTER TABLE `Device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`DeviceTypeID`) REFERENCES `DeviceType` (`DeviceTypeID`);

--
-- Constraints for table `DeviceDelivery`
--
ALTER TABLE `DeviceDelivery`
  ADD CONSTRAINT `devicedelivery_ibfk_1` FOREIGN KEY (`DeviceID`) REFERENCES `Device` (`DeviceID`);

--
-- Constraints for table `DiseaseHasSymphtom`
--
ALTER TABLE `DiseaseHasSymphtom`
  ADD CONSTRAINT `diseasehassymphtom_ibfk_1` FOREIGN KEY (`DiseaseID`) REFERENCES `Disease` (`DiseaseID`),
  ADD CONSTRAINT `diseasehassymphtom_ibfk_2` FOREIGN KEY (`SymphtomID`) REFERENCES `Symphtom` (`SymphtomID`);

--
-- Constraints for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `UserAccount` (`UserID`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`HospitalID`) REFERENCES `Hospital` (`HospitalID`);

--
-- Constraints for table `HealthRecord`
--
ALTER TABLE `HealthRecord`
  ADD CONSTRAINT `healthrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`);

--
-- Constraints for table `Hospital`
--
ALTER TABLE `Hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);

--
-- Constraints for table `MedicalRecord`
--
ALTER TABLE `MedicalRecord`
  ADD CONSTRAINT `medicalrecord_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`),
  ADD CONSTRAINT `medicalrecord_ibfk_2` FOREIGN KEY (`PrescriptionID`) REFERENCES `Prescription` (`PrescriptionID`);

--
-- Constraints for table `MedicalReordHasTest`
--
ALTER TABLE `MedicalReordHasTest`
  ADD CONSTRAINT `medicalreordhastest_ibfk_1` FOREIGN KEY (`MedicalRecordNumber`) REFERENCES `MedicalRecord` (`MedicalRecordNumber`),
  ADD CONSTRAINT `medicalreordhastest_ibfk_2` FOREIGN KEY (`TestNumber`) REFERENCES `Test` (`TestNumber`);

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `UserAccount` (`UserID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`NearestWarehouseID`) REFERENCES `Warehouse` (`WarehouseID`);

--
-- Constraints for table `Prescription`
--
ALTER TABLE `Prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `Doctor` (`DoctorID`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`DiseaseID`) REFERENCES `Disease` (`DiseaseID`);

--
-- Constraints for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);

--
-- Constraints for table `Supply`
--
ALTER TABLE `Supply`
  ADD CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `Supplier` (`SupplierID`),
  ADD CONSTRAINT `supply_ibfk_2` FOREIGN KEY (`DeviceID`) REFERENCES `Device` (`DeviceID`);

--
-- Constraints for table `Symphtom`
--
ALTER TABLE `Symphtom`
  ADD CONSTRAINT `symphtom_ibfk_1` FOREIGN KEY (`DrugID`) REFERENCES `Drug` (`DrugID`);

--
-- Constraints for table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `Patient` (`PatientID`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`DeviceID`) REFERENCES `Device` (`DeviceID`),
  ADD CONSTRAINT `test_ibfk_3` FOREIGN KEY (`PrescriptionID`) REFERENCES `Prescription` (`PrescriptionID`);

--
-- Constraints for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD CONSTRAINT `useraccount_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);

--
-- Constraints for table `Warehouse`
--
ALTER TABLE `Warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
