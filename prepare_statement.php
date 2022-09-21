<?php
require_once "./helper/database.php";

$connection=getConnection();
$username="admin";
$password="ayam12";

// $sql="SELECT * FROM admin WHERE username=:username AND password=password(:password)";
// method prepare secara otomatis akan menambahkan function quote di dalamnya
// $result=$connection->prepare($sql);
// bindParam adalah mengisi paramater yang ada di SQL, jika di SQL ada 3 paramater, maka bindParamnya juga ada 3
// $result->bindParam("username", $username);
// $result->bindParam("password", $password);
// $result->execute();

// bindParam tidak hanya bisa dilakukan menggunakan ':' saja, namun bisa juga dilakukan dengan menggunakan '?'. 
// Hanya saja dalam pengisian paramaternya menggunakan index, tidak menggunakan nama dari binding

$sql="SELECT * FROM admin WHERE username=? AND password=password(?)";

$result=$connection->prepare($sql);

// $result->bindParam(1, $username);
// $result->bindParam(2, $password);
// $result->execute();

// binding ketika execute, mempermudah dalam proses binding
$result->execute([$username, $password]);
$success=false;
$find_user=null;
foreach($result as $row){
    //sukses
    $success=true;
    $find_user=$row["username"];
}
if($success){
    echo "Sukses login:".$find_user.PHP_EOL;
}else{
    echo "Gagal login".PHP_EOL;
}