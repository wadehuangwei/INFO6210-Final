use healthcare;

/*==============================================================*/
/* Trigger: when device is delivered, inventory minus 1         */
/*==============================================================*/
CREATE TRIGGER Device_Ship
AFTER INSERT ON Test
FOR EACH ROW
UPDATE Warehouse SET Inventory = Inventory - 1 WHERE WarehouseID = (SELECT NearestWarehouseID FROM Patient WHERE PatientID = NEW.PatientID);

/*==============================================================*/
/* Trigger: when device is returned, inventory add 1            */
/*==============================================================*/
CREATE TRIGGER Device_Return
AFTER UPDATE ON Test
FOR EACH ROW
UPDATE Warehouse SET Inventory = Inventory + 1 WHERE WarehouseID = (SELECT NearestWarehouseID FROM Patient WHERE PatientID = NEW.PatientID);
