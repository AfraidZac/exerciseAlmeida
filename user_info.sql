create database user_info ;
use user_info;


CREATE TABLE login_info (
id int primary key auto_increment unique not null,
email varchar(255) unique not n,
pass varchar(32)
);


CREATE TABLE personal_info (
id int auto_increment unique not null ,
primary key(id),
first_name varchar(255),
last_name varchar(255),
adress varchar(255),
postal varchar(8),
locality varchar(255),             
taxes_id int(9) unique not null,
phone int(15) unique,
id_login int unique not null,
FOREIGN KEY(id_login) REFERENCES user_info(id)
);





