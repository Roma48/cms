<?php

require( "config.php" );
//require( "client.php" );
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
    case 'add_question':
        add_question();
        break;
    case 'edit':
        edit_article();
        break;
    case 'delete_test':
        delete_test();
        break;
    case 'delete_question':
        delete_question();
        break;
    case 'list_article':
        list_article();
        break;
    case 'questions':
        list_questions();
        break;
    case 'edit_question':
        edit_question();
        break;
    default:
        list_article();

}

function list_article(){
    $title = "List tests";
    $list = new article();
    $result = $list->list_articles();
    include("templates/header.php");
    include("templates/list_articles.php");
    include("templates/footer.php");
}

function add_article(){
    $title = "Add test";
    include("templates/header.php");
    include("templates/add_article_form.php");
    include("templates/footer.php");
    $new_article = new article();
    $new_article->storeFormValues( $_POST );
    $new_article->insert();
    $new_article->add_table($_POST['title']);
    if(isset($_POST['title'])){
        header("Location: ?action=list_article");
    }
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
}

function delete_test(){
    $delete = new article();
    $delete->delete_test($_GET['table'] ,$_GET['id']);
    header("Location: ?action=list_article");
}

function delete_question(){
    $delete = new article();
    $delete->delete_question($_GET['table'] ,$_GET['id']);
    header("Location: ?action=questions&id=".$_GET['table']);
}

function login(){
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
}

function logout(){
    $logout = new users();
    $logout->logout_user();
    header("Location: /");
}

function list_questions() {
    $title = "Test questions";
    $list = new article();
    $result = $list->list_questions($_GET['id']);
    include("templates/header.php");
    include("templates/list_questions.php");
    include("templates/footer.php");
}

function add_question(){
    $title = "Add question";
    include("templates/header.php");
    include("templates/add_question_form.php");
    include("templates/footer.php");
    $add_question = new article($_POST);
    $add_question->storeFormValues($_POST);
    $add_question->add_question($_GET['id']);
    if(isset($_POST['question'])){
        header("Location: ?action=questions&id=".$_GET['id']);
    }
}

function edit_question(){
    $title = "Edit question";
    $edit = new article();
    if(isset($_POST['question'])){
        $edit->storeFormValues($_POST);
        $edit->update_question($_GET['test'], $_GET['id']);
    }
    $result = $edit->edit_question($_GET['test'], $_GET['id']);
    include("templates/header.php");
    include("templates/edit_question_form.php");
    include("templates/footer.php");
    if(isset($_POST['question'])){
        header("Location: ?action=questions&id=".$_GET['test']);
    }
}
