create database UserPrivilegesDB
default character set utf8
collate utf8_hungarian_ci;

create table Books(
    id int primary key auto_increment,
	Name varchar(30) not null,
    Author varchar(30) not null,
    ReleaseDate varchar(30) not null
);

-- owner can Select, insert, update, delete create, drop and alter
CREATE USER owner@"%" IDENTIFIED BY "owner";
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER ON userprivilagesdb.* TO owner@"%";

-- admin can't drop
CREATE USER administrator@"%" IDENTIFIED BY "administrator";
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER ON userprivilagesdb.* TO administrator@"%";

-- Librarian can only change the data not the tables and the database
CREATE USER librarian@"%" IDENTIFIED BY "librarian";
GRANT SELECT, INSERT, UPDATE, DELETE ON userprivilagesdb.* TO librarian@"%";

-- User can insert if wants to borrow book
CREATE USER "user"@"%" IDENTIFIED BY "user";
GRANT SELECT, INSERT ON userprivilagesdb.* TO "user"@"%";

-- Noone can only select
CREATE USER noone@"%" IDENTIFIED BY "noone";
GRANT SELECT ON userprivilagesdb.* TO noone@"%";