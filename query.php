<?php
require_once __DIR__."./helper/database.php";


$connection=getConnection();

$sql="SELECT * FROM customers";
// return dari query adalah PDOStatement

$statement=$connection->query($sql);
// echo json_encode($statement);
// foreach($statement as $row){
//     $id=$row["id"];
//     $name=$row["name"];
//     $email=$row["email"];

//     echo "Id : $id, name:$name, email:$email".PHP_EOL;
// }
foreach($statement as $row){
    $data=json_encode($row);
    echo $data;
}
$connection=null;