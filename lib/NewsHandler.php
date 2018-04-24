<?php

class NewsHandler {
    /**
     *
     * @var mysqli
     */
    protected $dbConnection;
    /**
     *
     * @var string
     */
    protected $tableName = 'news';
    public function __construct() {
	$this->dbConnection = mysqli_connect("localhost", 'root', '', 'chpu_site');
    }
    public function getAllNews() {
	$query = 'select * from '.$this->tableName;
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    $allNews = $queryResult->fetch_all(MYSQLI_ASSOC);
	    return $allNews;
	}
	return false;
    }
    
    public function getNewsItem($ID) {
	$query = 'select * from '.$this->tableName.' where id='.$ID;
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    $newsWithID = $queryResult->fetch_assoc();
	    return $newsWithID;
	}
	return false;
    }
    
    public function addNewsItem($title, $content) {
	$query = 'insert into '.$this->tableName.'(title, content) values("'.$title.'","'.$content.'")';
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    return true;
	}
	return false;
    }
    
    public function editNewsItem($ID, $newTitle, $newContent) {
	$query = 'update '.$this->tableName.' set title="'.$newTitle.'", content="'.$newContent.'" where id='.$ID;
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    return true;
	}
	return false;
    }
    
    public function deleteNewsItem($ID) {
	$query = 'delete from '.$this->tableName.' where id='.$ID;
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    return true;
	}
	return false;
    }
}
