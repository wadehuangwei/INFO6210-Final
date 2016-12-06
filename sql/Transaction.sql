-- start a new transaction
start transaction;
 
-- get latest MedicalRecordNumber
select @DrugID := max(DrugID) 
from Drug;


-- insert a new drug
insert into Drug(DrugID, DrugName)
values(300019, 'jiujiujiu');
-- insert a MedicalRecordNumber

-- commit changes    
commit;       
 
