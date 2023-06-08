<?php

require_once "../Models/User.php";

function index()
{
    $user = new User();
    $listUsers = $user->selectAll();
    require_once "../views/userView.php";

}

function defaultt(){
    echo "page 404";
}

