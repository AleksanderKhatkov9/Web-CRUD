CREATE DATABASE phpdb;
use phpdb;

CREATE TABLE phpdb.user (
   id INT PRIMARY KEY AUTO_INCREMENT,
   name varchar(20) DEFAULT NULL,
   password varchar(20) DEFAULT NULL,
   email varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE phpdb.production(
   id INT PRIMARY KEY AUTO_INCREMENT,
   product varchar(255) DEFAULT NULL,
   price varchar(50) DEFAULT NULL,
   image varchar(255) DEFAULT NULL,
   foreign key (id) references user (id) on delete cascade
);