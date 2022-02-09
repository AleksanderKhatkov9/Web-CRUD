CREATE DATABASE phpdb;
CREATE TABLE catalog (
   id INT PRIMARY KEY AUTO_INCREMENT,
   image varchar(255) NOT NULL,
   title varchar(255) NOT NULL,
   price varchar(255) NOT NULL,
   date  varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


SELECT user.name, user.password, user.email, ruls.ruls_cod From user
JOIN user_has_ruls ON user.id = user_has_ruls.user_id
JOIN ruls ON user_has_ruls.user_id = ruls.id;


