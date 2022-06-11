<?php

session_start();

if(isset($_SESSION['userName'])){
    include 'init.php';
    $pageTitle = 'Dashboard';
    print_r($_SESSION);
}
else{
    echo 'you are not authrized';
    header('Location: index.php');
    exit();
}
?>