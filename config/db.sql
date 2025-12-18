-- Active: 1764803914860@@127.0.0.1@3306@test
CREATE DATABASE gcontact;

USE gcontact;

CREATE TABLE users ( 
      id INT AUTO_INCREMENT PRIMARY KEY,
      username varchar(50) UNIQUE,
      email VARCHAR(50) NOT NULL,
      password VARCHAR(255) NOT NULL, inscription_date DATE 
) ENGINE = INNODB;

CREATE TABLE contacts (
      id INT PRIMARY KEY AUTO_INCREMENT,
      firstname varchar(50),
      lastname varchar(50),
      email varchar(50),
      telephone varchar(50),
      id_user INT,
      FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
) ENGINE= INNODB;