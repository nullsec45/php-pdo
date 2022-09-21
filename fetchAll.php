<?php
require_once "./helper/database.php";

$connection=getConnection();
$sql="SELECT * FROM customers";


$statement=$connection->query($sql);

// Mengambil semua data data db dan konversi semua data ke dalam array
$customers=$statement->fetchAll();

var_dump($customers);
$connection=null;
