drop database if exists user_info;
create database user_info ;
use user_info;

CREATE TABLE info (
id int auto_increment unique not null ,
first_name varchar(255),
last_name varchar(255),
address varchar(255),
postal varchar(8),
locality varchar(255), 
country varchar(255),		            
taxes_id int(9),
phone int(15),
id_login int not null unique,
primary key(id),
FOREIGN KEY(id_login) REFERENCES login_info(id)
);


CREATE TABLE login_info (
id int auto_increment unique not null,
email varchar(255) unique not null,
pass varchar(32) ,
primary key(id)
);