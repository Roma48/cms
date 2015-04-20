<?php

require_once(BASE_PATH."config.php");

class users {

    public function __construct(){

    }

    public function login_user($user, $password){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM users WHERE `login`='$user'";
        if($conn->query($sql)){
            foreach($conn->query($sql) as $login){
                if($login['login'] == $user && $login['password'] == $password){
                    $_SESSION['username'] = $user;
                    header( "Location: ?action=list_article" );
                }
            }
        }
    }

//    public function login_facebook(){
////        $helper = new FacebookRedirectLoginHelper();
////        try {
////            $session = $helper->getSessionFromRedirect();
////        } catch(FacebookRequestException $ex) {
////            echo "error";
////        } catch(\Exception $ex) {
////            echo "error1";
////        }
////        if ($session) {
////            echo "login";
////        }
//    }

    public function logout_user(){
        session_destroy();
    }


}