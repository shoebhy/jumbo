#####I have covered the endpoint PET, for this assessment. 

The source code is split into three layers **Controller, Database & Object**, main objective being efficient maintainance of code. 
* Object folder holds the objects in it.
* Controller folder are used to validate the API params and load the object and passes on that object to Database.
* Database folder handles all the CRUD operations of the database. 

I have also attached an sql file which has all the DB increments for the project in it. 

Also i would like to point out if time would have allowed i would have actually used an Object-Relational-Mapping(ORM) 
framework like **Symphony/Doctrine**, which would have taken care of all the validation and database CRUD operations. 
Then we would have ended with two directories one for controller and one for the repository.

I tested the API methods using **POSTMAN** and **XAMPP(Apache, MySql)** stack, 
reason being that i couldn't get **docker-compose** running on my not so latest configuration system.
But still i have attached the **docker-compose.yml** and **DockerFile**, which i think should be able to run
on a system with docker installed.