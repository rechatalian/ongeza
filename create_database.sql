CREATE DATABASE IF NOT EXISTS ongeza_test;
USE ongeza_test;
CREATE TABLE IF NOT EXISTS customer(
    id int AUTO_INCREMENT,
    first_name varchar(25),
    last_name varchar(25),
    town_name varchar(25),
    gender_id int,
    is_deleted int not null default 0,
    PRIMARY KEY(id)
    );

CREATE TABLE IF NOT EXISTS gender(
    id int AUTO_INCREMENT,
    gender_name varchar(25),
    PRIMARY KEY(id)
    );

INSERT INTO gender(gender_name) VALUES('Male');
INSERT INTO gender(gender_name) VALUES('Female');