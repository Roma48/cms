<?php

require( "config.php" );
require_once(CLASS_PATH."/article.php");
require_once(CLASS_PATH."/users.php");
require_once __DIR__.("/facebook/autoload.php");
use Facebook\FacebookRedirectLoginHelper;



session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$edit = isset( $_GET['edit'] ) ? $_GET['edit'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != 'login' && $action != 'logout' && !$username ) {
    login ();
  exit;
}


switch ( $action ) {
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'add_article':
        add_article();
        break;
    case 'edit':
        edit_article();
        break;
    case 'delete':
        delete_article();
        break;
    case 'list_article':
        list_article();
        break;
    default:
        login();

}

function list_article(){
    $title = "List articles";
    $list = new article();
    $result = $list->list_articles();
    include("templates/header.php");
    include("templates/list_articles.php");
    include("templates/footer.php");
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

function edit_article(){
    $title = "Edit article";
    $edit = new article();

    if(isset($_POST['title'])){
        $edit->storeFormValues($_POST);
        $edit->update($_GET['id']);
    }

    $result = $edit->edit_article($_GET['id']);



    include("templates/header.php");
    include("templates/edit_article_form.php");
    include("templates/footer.php");
<<<<<<< HEAD
=======

//    header("Location: ?action=list_article");

>>>>>>> 5efa35f06b6ced41fb7cdf9f571e107c4a65a039
}

function delete_article(){
    $title = "Delete article";
    $delete = new article();
    $delete->delete($_GET['id']);
    header("Location: ?action=list_article");
}

function login(){
<<<<<<< HEAD
    if(isset($_SESSION['username'])){
        header("Location: ?action=list_article");
    } else {
        $title = "Login";
        $login = new users();
        include("templates/login_form.php");
        if(isset($_POST['login'])) {
            $login->login_user($_POST['login'], $_POST['password']);
        }
    }
=======
    $title = "Login";
    $login = new users();

    $helper = new FacebookRedirectLoginHelper('http://cms.local');
    $loginUrl = $helper->getLoginUrl();


    include("templates/login_form.php");
    if(isset($_POST['login'])) {
        $login->login_user($_POST['login'], $_POST['password']);
    }

    $login->login_facebook();

>>>>>>> 5efa35f06b6ced41fb7cdf9f571e107c4a65a039
}

function logout(){
    $logout = new users();
    $logout->logout_user();
    header("Location: ?action=login");
}