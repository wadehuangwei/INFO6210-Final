use healthcare;

/*==============================================================*/
/* Trigger: when device is delivered, inventory minus 1         */
/*==============================================================*/
CREATE TRIGGER Device_Delete
AFTER INSERT ON DeviceDelivery
FOR EACH ROW
UPDATE Warehouse SET Inventory = Inventory - 1 WHERE WarehouseID = (SELECT WarehouseID FROM Device WHERE DeviceID = NEW.DeviceID);

/*==============================================================*/
/* Trigger: when device is returned, inventory add 1            */
/*==============================================================*/
CREATE TRIGGER Device_Return
AFTER UPDATE ON Test
FOR EACH ROW
UPDATE Warehouse SET Inventory = Inventory + 1 WHERE WarehouseID = (SELECT WarehouseID FROM Device WHERE DeviceID = NEW.DeviceID);
