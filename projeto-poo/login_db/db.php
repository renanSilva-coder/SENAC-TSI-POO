<?php
$dsn = 'mysql:dbname=php;host=localhost';
// $dsn = 'sqlsrv:Server=localhost\\SQLEXPRESS;Database=php';
// $user = 'sa';
// $password = '10032002jrsd';
$user = 'root';
$password = '';
$db =  new PDO($dsn, $user, $password);