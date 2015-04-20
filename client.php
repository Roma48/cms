<?php

require_once(CLASS_PATH."/article.php");



$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ($action) {
    case 'login':
        login();
        break;
    default:
        homepage();
}


function homepage(){
    $title = "Homepage";
    $list = new article();
    $content = $list->list_articles();
    include("templates/homepage.php");
}

function login(){
    header("Location: admin.php");
}