<?php
function getConnection() : PDO{
    $host="localhost";
    $port=3306;
    $database="php_pdo";
    $username="root";
    $password="";

    return $connection=new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);

}

try{
    getConnection();
    echo "Sukses terkoneksi database".PHP_EOL;
}catch(PDOException $exception){
    echo "Gagal terkoneksi ke database MySQL:".$exception->getMessage().PHP_EOL;
}