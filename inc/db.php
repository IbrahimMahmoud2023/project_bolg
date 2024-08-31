<?php
session_start();
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'blog_project';

$conn = mysqli_connect($serverName, $userName, $password, $dbName);