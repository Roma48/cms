<?php

require( "config.php" );
require_once(CLASS_PATH."/article.php");
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
    case 'login':
        login();
        break;
    case 'add_article':
        add_article();
        break;
    default:
        list_article();
}

function list_article(){
    echo "hello list";
}

function add_article(){
    $title = "Add article";
    include("templates/header.php");
    include("templates/add_article_form.php");
    include("templates/footer.php");
    $new_article = new article();
    $new_article->storeFormValues( $_POST );
    $new_article->insert();
}

function login(){
    echo "hello login";
}