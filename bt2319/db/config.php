<?php
  define('HOST', 'localhost');
  define('ROOT', 'anhduc0125');
  define('PASSWORD', 'chainuocngot');
  define('DATABASE', 'library_db');

  const SQL_CREATE_DATABASE = "create database IF NOT EXISTS ".DATABASE;
  const SQL_CREATE_TABLE_BOOKS = "create table IF NOT EXISTS books (
    bookid int(11) auto_increment primary key not null,
    authorid int(11) default '0' not null,
    title varchar(55) not null,
    ISBN varchar(25) not null,
    pub_year smallint(6) default '0' not null,
    available tinyint(4) not null
  )"
?>