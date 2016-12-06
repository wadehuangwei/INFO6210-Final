use healthcare;

/*==============================================================*/
/* Proc: insert patient UserAccount 							*/
/*==============================================================*/
DELIMITER //
DROP PROCEDURE IF EXISTS insert_patient //
CREATE PROCEDURE insert_patient
(	IN 	street 		VARCHAR(40),
	IN	city		VARCHAR(40),
	IN	state 		VARCHAR(40),
	IN	zip 		VARCHAR(20),

	IN	username	VARCHAR(40),
	IN	email		VARCHAR(40),
	IN	password	VARCHAR(40),
	IN	acntType	VARCHAR(40)
)
BEGIN
	DECLARE addrID INT DEFAULT 0;
	INSERT INTO Address(Street, City, State, Zipcode) VALUES (street, city, state, zip);
	SELECT AddressID INTO addrID FROM Address WHERE Street = street AND City = city AND State = state AND Zipcode = zip LIMIT 1;
	INSERT INTO UserAccount(Username, Email, Password, AddressID, AccountType) VALUES (username, email, password, addrID, acntType);
END //
DELIMITER ;

/*==============================================================*/
/* Proc: avgWeight					 							*/
/*==============================================================*/
DELIMITER //
DROP PROCEDURE IF EXISTS avgWeight //
CREATE PROCEDURE `avgWeight` ()
BEGIN
	SELECT AVG(Weight)
	from HealthRecord
	group by PatientID;
END //
DELIMITER ;
