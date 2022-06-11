<?php

$dsn = "mysql:host=localhost;dbname=shop;";
$user= "root";
$pass="";
$options= array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"  //for arabic
);

//for connection
try{

    $conection = new PDO($dsn, $user, $pass, $options);

    $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch(PDOException $e){
    echo $e->getMessage();
}
?>