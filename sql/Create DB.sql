create database healthcare;
use healthcare;

/*==============================================================*/
/* Table: Address                                        */
/*==============================================================*/
create table Address(
	AddressID				int						not null auto_increment,
	Street					nvarchar(40)			not null,
	City					nvarchar(40)			not null,
	State					nvarchar(40)			not null,
	Country					nvarchar(40)			not null,
	Zipcode					nvarchar(20)			not null, 
	primary key (AddressID)
);

/*==============================================================*/
/* Table: UserAccount                                              */
/*==============================================================*/
create table UserAccount(
	UserID					int						not null auto_increment,
	Username				nvarchar(40)			not null,
	Password				nvarchar(40)			not null,
	FirstName				nvarchar(40)			not null,
	LastName				nvarchar(40)			not null, 
	Phone					nvarchar(20)			not null,
	Email					nvarchar(40)			not null,
	AccountType				nvarchar(40)			not null,
	AddressID 				int 					not null,
	primary key (UserID),
	foreign key (AddressID) references Address(AddressID)
);

/*==============================================================*/
/* Table: Patient                                            */
/*==============================================================*/
create table Patient(
	PatientID				int						not null,
	HealthRecordNumber		int						not null,
	MedicalRecordNumber		int						not null,
	primary key (PatientID),
	foreign key (PatientID) references UserAccount(UserID)
);

/*==============================================================*/
/* Table: Hospital                                           */
/*==============================================================*/
create table Hospital(
	HospitalID				int						not null auto_increment,
	HospitalName			nvarchar(40)			not null,
	HospitalOwnership		nvarchar(40)			not null, 
	AddressID				int 					not null,
	primary key (HospitalID),
	foreign key (AddressID) references Address(AddressID)
);

/*==============================================================*/
/* Table: Doctor                                           */
/*==============================================================*/
create table Doctor(
	DoctorID				int						not null,
	HospitalID				int						not null,
	Speciality				nvarchar(40)			not null,
	Title					nvarchar(40)			not null,
	primary key (DoctorID),
	foreign key (DoctorID) references UserAccount(UserID),
	foreign key (HospitalID) references Hospital(HospitalID)
);

/*==============================================================*/
/* Table: Symphtom                                           */
/*==============================================================*/
create table Symphtom(
	SymphtomID				int						not null auto_increment,
	SymphtomDescription		nvarchar(80)			not null,
	primary key (SymphtomID)
);

/*==============================================================*/
/* Table: HealthRecord                                           */
/*==============================================================*/
create table HealthRecord(
	HealthRecordNumber		int						not null auto_increment,
	PatientID				int						not null,
	Weight					decimal(6,2)			null,
	HeartRate				int						null,
	BloodPressure			int						null,
	BodyTemperature			nvarchar(20)			null,
	primary key (HealthRecordNumber),
	foreign key (PatientID) references Patient(PatientID)
);

/*==============================================================*/
/* Table: Drug                                           */
/*==============================================================*/
create table Drug(
	DrugID					int						not null auto_increment,
	DrugName				nvarchar(40)			not null,
	SymphtomID				int						not null,
	primary key (DrugID),
	foreign key (SymphtomID) references Symphtom(SymphtomID)
);

/*==============================================================*/
/* Table: DeviceType                                         */
/*==============================================================*/
create table DeviceType(
	DeviceTypeID			int						not null auto_increment,
	Description				nvarchar(40)			not null,
	Usages					nvarchar(40)			null,
	primary key (DeviceTypeID)
);

/*==============================================================*/
/* Table: Device                                          */
/*==============================================================*/
create table Device(
	DeviceID				int						not null auto_increment,
	DeviceTypeID			int 					not null,
	DevicePrice				decimal(12,2)			null,
	DeviceInventory			int						not null,
	primary key (DeviceID),
	foreign key (DeviceTypeID) references DeviceType(DeviceTypeID)
);

/*==============================================================*/
/* Table: Disease                                           */
/*==============================================================*/
create table Disease(
	DiseaseID				int						not null auto_increment,
	DiseaseName				nvarchar(40)			not null,
	SymphtomID				int						not null,
	DeviceID				int						not null,
	primary key (DiseaseID),
	foreign key (SymphtomID) references Symphtom(SymphtomID),
	foreign key (DeviceID) references Device(DeviceID)
);

/*==============================================================*/
/* Table: Prescription                                          */
/*==============================================================*/
create table Prescription(
	PrescriptionID			int						not null auto_increment,
	DoctorID				int						null,
	PrescriptionDescription	nvarchar(80)			null,
	DiseaseID				int						not null,
	primary key (PrescriptionID),
	foreign key (DoctorID) references Doctor(DoctorID),
	foreign key (DiseaseID) references Disease(DiseaseID)
);

/*==============================================================*/
/* Table: MedicalRecord                                           */
/*==============================================================*/
create table MedicalRecord(
	MedicalRecordNumber		int						not null auto_increment,
	PatientID				int						not null,
	PrescriptionID			int						null,
	DateOfRequest			datetime				null,
	Treatmentresult			nvarchar(40)			null,
	primary key (MedicalRecordNumber),
	foreign key (PatientID) references Patient(PatientID),
	foreign key (PrescriptionID) references Prescription(PrescriptionID)
);

/*==============================================================*/
/* Table: Test                                          */
/*==============================================================*/
create table Test(
	TestNumber				int						not null auto_increment,
	PatientID				int 					not null,
	DeviceID				int 					not null,
	PrescriptionID			int 					not null,
	DeviceType				nvarchar(40)			not null,
	TestResult				nvarchar(80)			null,
	primary key (TestNumber),
	foreign key (PatientID) references Patient(PatientID),
	foreign key (DeviceID) references Device(DeviceID),
	foreign key (PrescriptionID) references Prescription(PrescriptionID)
);

/*==============================================================*/
/* Table: MedicalReordHasTest                                          */
/*==============================================================*/
create table MedicalReordHasTest(
	MedicalRecordNumber		int						not null,
	TestNumber				int						not null,
	primary key (MedicalRecordNumber, TestNumber),
	foreign key (MedicalRecordNumber) references MedicalRecord(MedicalRecordNumber),
	foreign key (TestNumber) references Test(TestNumber)
);

/*==============================================================*/
/* Table: Therapy                                           */
/*==============================================================*/
create table Therapy(
	DiseaseID				int						not null auto_increment,
	DrugID					int						not null,
	primary key (DiseaseID, DrugID),
	foreign key (DiseaseID) references Disease(DiseaseID),
	foreign key (DrugID) references Drug(DrugID)
);

/*==============================================================*/
/* Table: Diagnosis                                          */
/*==============================================================*/
create table Diagnosis(
	DiagnosisNumber			int						not null auto_increment,
	PrescriptionID			int						not null,
	TestNumber				int						null,
	PatientID				int						not null,
	DoctorID				int						not null,
	primary key (DiagnosisNumber),
	foreign key (PrescriptionID) references Prescription(PrescriptionID),
	foreign key (TestNumber) references Test(TestNumber),
	foreign key (PatientID) references Patient(PatientID),
	foreign key (DoctorID) references Doctor(DoctorID) 
);

/*==============================================================*/
/* Table: Supplier                                       */
/*==============================================================*/
create table Supplier(
	SupplierID				int						not null auto_increment,
	SupplierName			nvarchar(40)			not null,
	AddressID 				int						not null,
	foreign key (AddressID) references Address(AddressID),
	primary key (SupplierID)
);

/*==============================================================*/
/* Table: Supply                                        */
/*==============================================================*/
create table Supply(
	SupplierID				int						not null,
	DeviceID				int						not null,
	Quantity				int						not null,
	primary key (SupplierID, DeviceID),
	foreign key (SupplierID) references Supplier(SupplierID),
	foreign key (DeviceID) references Device(DeviceID)
);

/*==============================================================*/
/* Table: Warehouse                                        */
/*==============================================================*/
create table Warehouse(
	WarehouseID				int						not null auto_increment,
	WarehouseName			nvarchar(40)			not null,
	Capacity				int						not null,
	AddressID				int						not null,
	WarehouseInventory		int						not null,
	primary key (WarehouseID),
	foreign key (AddressID) references Address(AddressID)
);

/*==============================================================*/
/* Table: Inventory                                        */
/*==============================================================*/
create table Inventory(
	WarehouseID				int						not null,
	DeviceID				int						not null,
	Quantity				int						not null,
	primary key (WarehouseID, DeviceID),
	foreign key (DeviceID) references Device(DeviceID),
	foreign key (WarehouseID) references Warehouse(WarehouseID)
);

/*==============================================================*/
/* Table: DeviceDelivery                                        */
/*==============================================================*/
create table DeviceDelivery(
	DeviceID				int						not null,
	ShipDate				nvarchar(40)			not null,
	primary key (DeviceID),
	foreign key (DeviceID) references Device(DeviceID)
);



