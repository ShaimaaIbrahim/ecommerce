<?php


function lang($phrase){

    static $lang = array(
        'MESSAGE' => 'Welcome',
        'ADMIN' => 'Adminstrator',
        'home' => 'Home',
        'navbar' => 'Navbar'

);

return $lang[$phrase];
}

