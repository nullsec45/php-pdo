<?php
require_once "./helper/database.php";

$sql="INSERT INTO comments(email, comment) VALUES ('Fajar','Mantap anjing')";

$connection=getConnection();

$connection->exec($sql);
$id=$connection->lastInsertId();

echo $id;

$connection=null;