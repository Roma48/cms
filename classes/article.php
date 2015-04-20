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
    public $date = null;
    public $title = null;
    public $summary = null;
    public $content = null;

    public function __construct( $data = array() ){
        if( isset( $data['id'] )){ $this->id = (int)$data['id']; }
        if( isset( $data['date'])){ $this->date = (int)$data['date']; }
        if( isset( $data['title'])){ $this->title = $data['title']; };
        if( isset( $data['summary'])){ $this->summary = $data['summary']; }
        if( isset( $data['content'])){ $this->content = $data['content']; }
    }

    public function storeFormValues ( $params ) {
        $this->__construct( $params );
        if ( isset($params['date']) ) {
            $publicationDate = explode ( '-', $params['date'] );
            if ( count($publicationDate) == 3 ) {
                list ( $y, $m, $d ) = $publicationDate;
                $this->date = mktime ( 0, 0, 0, $m, $d, $y );
            }
        }
    }

    public function insert() {
        if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO articles ( pubdate, title, summary, content ) VALUES ( FROM_UNIXTIME(:date), :title, :summary, :content )";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":date", $this->date, PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;
    }

    public function update($id) {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE articles SET pubdate=FROM_UNIXTIME(:date), title=:title, summary=:summary, content=:content WHERE id =".$id;
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":date", $this->date, PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
        $st->execute();
        $conn = null;
    }

    public function list_articles(){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);
        return $result;
    }

    public function edit_article($id){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM articles WHERE `id`=".$id;
        $result = $conn->query($sql);
        return $result;
    }

    public function delete($id){
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "DELETE FROM articles WHERE `id`=".$id;
        $result = $conn->query($sql);
        return $result;
    }

} 