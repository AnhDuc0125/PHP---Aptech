<?php
  define('HOST', 'localhost');
  define('ROOT', 'anhduc0125');
  define('PASSWORD', 'chainuocngot');
  define('DATABASE', 'bt2299');

  const SQL_CREATE_DATABASE = "create database IF NOT EXISTS ".DATABASE;
  const SQL_CREATE_TABLE_USERS = "create table IF NOT EXISTS users (
    id int primary key auto_increment,
    fullname varchar(50),
    email varchar(100) unique,
    birthday date,
    address varchar(200)
  )";
  const SQL_CREATE_TABLE_NOTES = "create table IF NOT EXISTS notes (
    id int primary key auto_increment,
    user_id int,
    title varchar(100),
    content longtext,
    created_at datetime,
    updated_at datetime,
    FOREIGN KEY (user_id) REFERENCES users(id)
  )";
?>