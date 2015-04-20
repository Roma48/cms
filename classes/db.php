<?php

require_once(BASE_PATH."config.php");

class Database {

    public function __construct(){
        $this->create_articles();
        $this->create_users();
    }

    public function create_articles(){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

        if(!$conn) echo "Не удалось подключится к серверу";
        else
        {
            $sql = "CREATE TABLE  `articles` (`id` smallint unsigned NOT NULL auto_increment , `title` VARCHAR (255) NOT NULL,  PRIMARY KEY (  `id` ))";
            if ($conn->query($sql))
                echo "";
            else
                echo " ";
        }
    }

    public function create_users(){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        if(!$conn) echo "Не удалось подключится к серверу";
        else
        {
            $sql = "CREATE TABLE  `users` (`id` smallint unsigned NOT NULL auto_increment , `login` VARCHAR (255) NOT NULL, `password` VARCHAR (255) NOT NULL , PRIMARY KEY (  `id` ))";
            if ($conn->query($sql))
                echo "";
            else
                echo " ";
        }
    }

}

$db = new Database();