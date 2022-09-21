<?php
require_once "./helper/database.php";

$connection=getConnection();
$username="admin";
$password="ayam123";


$sql="SELECT * FROM admin WHERE username=? AND password=password(?)";

$result=$connection->prepare($sql);


$result->execute([$username, $password]);
// fetch mengambil satu data pertama dari database
if($row=$result->fetch()){
    echo "Sukses login:".$row["username"].PHP_EOL;
}else{
    echo "Gagal login".PHP_EOL;
}
$connection=null;