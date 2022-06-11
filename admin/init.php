<?php

include "connect.php";

//Routes

$tpl = 'include/templates/';  //templates path
$css = 'layout/css/';
$js = 'layout/js/';
$languages = 'include/languages/';
$func = 'include/functions/';

//Include important files
include  $languages .'english.php';
include $func . 'functions.php';
include  $tpl.'header.php';

//include navbar in all pages except only one page

if(!isset($noNavabr)){
    include  $tpl . 'navbar.php';

}



