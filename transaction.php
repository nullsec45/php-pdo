<?php
require_once __DIR__."./helper/database.php";

$connection=getConnection();
$connection=getConnection();

$connection->beginTransaction();
$connection->exec("INSERT INTO comments(email, comment) VALUES ('ramarasta45@gmail.com','woy asik nih')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('ramarff@gmail.com','halo')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('zakkiaprillio@gmail.com','tolol')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('mrexplode45@gmail.com','tes komen')");
$connection->exec("INSERT INTO comments(emai, comment) VALUES ('nullsec@gmail.com','hore')");

$connection->commit();
// $connection->rollBack();

$connection=null;