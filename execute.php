<?php
require_once __DIR__."./helper/database.php";

$connection=getConnection();

$sql=<<<SQL
    INSERT INTO customers(id, name, email) VALUES ("2","Muhammad Fiqri Dwi Nugraha","mfiqridn@gmail.com");
SQL;
$connection->exec($sql);
$connection=null;