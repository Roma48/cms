<?php

require_once(BASE_PATH."config.php");

class Database {

    public function __construct(){
        $this->create_table();
    }

    public function create_table(){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

        if(!$conn) echo "Не удалось подключится к серверу";
        else
        {
            $sql = "CREATE TABLE  `articles` (`id` smallint unsigned NOT NULL auto_increment ,`pubdate` DATE NOT NULL , `title` VARCHAR (255) NOT NULL, `summary` text NOT NULL , `content` mediumtext NOT NULL ,  PRIMARY KEY (  `id` ))";
            if ($conn->query($sql))
                echo "";
            else
                echo " ";
        }
    }

}

$db = new Database();