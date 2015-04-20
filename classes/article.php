<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.04.15
 * Time: 18:46
 */

require_once(BASE_PATH."config.php");

class article {

    public $id = null;
    public $question = null;
    public $title = null;
    public $summary = null;
    public $content = null;

    public function __construct( $data = array() ){
        if( isset( $data['id'] )){ $this->id = (int)$data['id']; }
        if( isset( $data['question'])){ $this->question = $data['question']; }
        if( isset( $data['title'])){ $this->title = $data['title']; };
//        if( isset( $data['summary'])){ $this->summary = $data['summary']; }
//        if( isset( $data['content'])){ $this->content = $data['content']; }
    }

    public function storeFormValues ( $params ) {
        $this->__construct( $params );

    }

    public function insert() {
        if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO articles ( title ) VALUES ( :title)";
        $st = $conn->prepare ( $sql );
         $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;
    }

    public function update($id) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE articles SET title=:title WHERE id =".$id;
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->execute();
        $conn = null;
    }

    public function update_question( $table, $id) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE `$table` SET question=:question WHERE id =".$id;
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":question", $this->question, PDO::PARAM_STR );
        $st->execute();
        $conn = null;
    }

    public function list_articles(){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);
        return $result;
    }

    public function list_questions($table){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM `$table`";
        $result = $conn->query($sql);
        return $result;
    }

    public function edit_question($table, $id){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM `$table` WHERE id =".$id;
        $result = $conn->query($sql);
        return $result;
    }

    public function delete_test($table, $id){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "DELETE FROM articles WHERE `id`=".$id;
        $result = $conn->query($sql);
        $sql = "DROP TABLE `$table`";
        $result = $conn->query($sql);

    }

    public function delete_question($table, $id){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "DELETE FROM `$table` WHERE `id`=".$id;
        $result = $conn->query($sql);
    }

    public function add_table($table){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        if(!$conn) echo "Не удалось подключится к серверу";
        else
        {
            $sql = "CREATE TABLE  `$table` (`id` smallint unsigned NOT NULL auto_increment , `question` VARCHAR (255) NOT NULL,  PRIMARY KEY (  `id` ))";
            if ($conn->query($sql))
                echo "";
            else
                echo " ";
        }
    }

    public function add_question($table){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO `$table` (question) VALUES (:question)";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":question", $this->question, PDO::PARAM_STR );
        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;

    }

} 