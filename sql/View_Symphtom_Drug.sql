/*==============================================================*/
/* View： Symptom_Drug                                     */
/*==============================================================*/

create view Symphtom_Drug as 
	select Symphtom.Description, Symphtom.DrugID, Drug.DrugName
    from Symphtom, Drug
    Where Symphtom.DrugID = Drug.DrugID;
    

select Symphtom.Description,Drug.DrugName
from Symphtom_Drug
where Drug.DrugName = 'fenbid';