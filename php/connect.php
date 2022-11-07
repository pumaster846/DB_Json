<?php
$host    = 'localhost';
$db      = 'inline_blog_db';
$user    = 'root';
$pass    = '';
$charset = 'utf8';
$dsn     = "mysql:host=$host;dbname=$db;charset=$charset";
$opt     = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
);
$pdo = new PDO($dsn, $user, $pass, $opt);
$connection = mysqli_connect($host, $user, $pass, $db);
?>