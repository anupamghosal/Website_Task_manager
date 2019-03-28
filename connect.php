<?php

// server details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// create connection
$conn = new mysqli($servername, $username, $password);
// check connection
if ($conn->connect_error) {
    die("<label style='font-size: 0;'>Connection failed: " . $conn->connect_error. "</label>");
} 

// create database
$sql = "CREATE DATABASE web";
// check database is created
if ($conn->query($sql) === TRUE) {
    echo "<label style='font-size: 0;'>Database created successfully ". "</label>";
} else {
    echo "<label style='font-size: 0;'>Error creating database: " . $conn->error. "</label>";
}

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
    die("<label style='font-size: 0;'>Connection failed: " . $conn->connect_error. "</label>");
} 

// create table
$sql = "CREATE TABLE Login (
UserID INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
Username TINYTEXT NOT NULL,
Email TINYTEXT NOT NULL,
Password LONGTEXT NOT NULL
)";
// check table is created
if ($conn->query($sql) === TRUE) {
    echo "<label style='font-size: 0;'>Login Table created successfully". "</label>";
} else {
    echo "<label style='font-size: 0;'>Error creating table: " . $conn->error. "</label>";
}

// create table
$sql = "CREATE TABLE task (
TaskID INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
Project_Name TINYTEXT NOT NULL, 
Summary TINYTEXT NOT NULL,
Description LONGTEXT NOT NULL,
Priority TINYTEXT NOT NULL,
Progress TINYTEXT NOT NULL,
Due date
)";
// check table is created
if ($conn->query($sql) === TRUE) {
    echo "<label style='font-size: 0;'>Task Table created successfully". "</label>";
} else {
    echo "<label style='font-size: 0;'>Error creating table: " . $conn->error. "</label>";
}

?>