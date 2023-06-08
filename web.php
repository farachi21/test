<?php


require_once "../Controllers/UserController.php";


$path = explode('?', $_SERVER['REQUEST_URI'], 2)[0];



switch ($path){
    
    case '/': 
        index();
        break;
    
    default : 
        defaultt();
        break;
}