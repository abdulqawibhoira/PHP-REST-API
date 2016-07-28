# PHP-REST-API
PHP REST API


# Database Schema


-- CREATE TABLE "customers" --------------------------------
CREATE TABLE `customers` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`phone_number` Int( 255 ) NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 13;
-- ---------------------------------------------------------


-- CREATE TABLE "addresses" --------------------------------
CREATE TABLE `addresses` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL, 
	`society` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`street` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`customer_id` Int( 255 ) NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-------------------------------------------------------------


List OF Rest API's


1. URL :- POST /customers
   DESCRIPTION :- Create new Customer

2. URL :- GET /customers
   DESCRIPTION :- Get All Customers

3. URL :- GET /customers/[:id]
   DESCRIPTION :- Get Customer Details by given id

4. URL :- POST /addresses
   DESCRIPTION :- Create new Address

5. URL :- GET /addresses
   DESCRIPTION :- Get All Addresses

6. URL :- GET /addresses/[:id]
   DESCRIPTION :- Get Address by id

7. URL :- GET customer/addresses/[:customer_id]
   DESCRIPTION :- Get All Addresses of a customer



