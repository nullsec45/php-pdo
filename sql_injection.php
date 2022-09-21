<?php
require_once __DIR__."./helper/database.php";

$connection=getConnection();

//SQL Injection -> mneyuntikkan perintah sql ke dalam script di mana, perintah sqlnya yaitu untuk memberhentikan perintah
// SELECT sehingga perintah AND-nya tidak adan dieksekusi lagi

// $username="admin';";
// $password="ayam12";

// Sebelum SQL Injection
//SELECT * FROM admin WHERE username='admin' AND password=password('ayam123')

// Setelah SQL Injection
//SELECT * FROM admin WHERE username='admin';' AND password=password('ayam123')

// solusinya dengan menambahkan function quote() di dalam inputnya, !rekomendasi karena jika lupa
// maka akan kebobol juga -> solusinya yang benar adalah dengan menggunakan prepare statement

$username=$connection->quote("admin';");
$password=$connection->quote("ayam123");
//quote() -> if params ' { \'};
$sql="SELECT * FROM admin WHERE username=$username AND password=password($password)";
echo $sql;

$statement=$connection->query($sql);

$success=false;
$find_user=null;
foreach($statement as $row){
    //sukses
    $success=true;
    $find_user=$row["username"];
}
if($success){
    echo "Sukses login:".$find_user.PHP_EOL;
}else{
    echo "Gagal login".PHP_EOL;
}




$connection=null;
