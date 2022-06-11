<?php

function getTitle(){
    global $pageTitle;

   echo isset($pageTitle) ?  $pageTitle :  'Default';
}
