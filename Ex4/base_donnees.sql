CREATE DATABASE my_database;
USE my_database;

CREATE TABLE section(
    id int primary key,
    designation varchar(255),
    description varchar(255)
);

INSERT INTO section(id,designation,description) VALUES(1,'GL','Genie Logiciel');
INSERT INTO section(id,designation,description) VALUES(2,'RT','Reseaux et Telecommunication');
INSERT INTO section(id,designation,description) VALUES(3,'IIA','Informatique et Intelligence Artificielle');

CREATE TABLE student(
    id INT primary key,
    nom varchar(255),
    date_naissance date,
    section_id int,
    FOREIGN KEY(section_id) REFERENCES section(id)
);
INSERT INTO student(id,nom,date_naissance,section_id) VALUES(25,'mahmoud','2004-4-30',1);
INSERT INTO student(id,nom,date_naissance,section_id) VALUES(30,'abbas','2005-1-20',2);

CREATE TABLE admins(
    id int primary key auto_increment,
    username varchar(255) not null,
    password varchar(255) not null
);

insert into admins(username,password) values('admin','admin');
insert into admins(username,password) values('user','user');

SELECT * FROM student;