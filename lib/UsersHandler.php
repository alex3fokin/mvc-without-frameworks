<?php

class UsersHandler {
    /**
     *
     * @var mysqli
     */
    protected $dbConnection;
    /**
     *
     * @var string
     */
    protected $tableName = 'users';
    public function __construct() {
	$this->dbConnection = mysqli_connect("localhost", 'root', '', 'chpu_site');
    }
    
    public function isUserExists($user) {
	$query = 'select login from '.$this->tableName.' where login like "'.$user.'"';
	$queryResult = $this->dbConnection->query($query)->fetch_assoc();
	if($queryResult) {
	    return true;
	}
	return false;
    }
    
    public function addUser($login, $password) {
	$query = 'insert into '.$this->tableName.'(login, password) values ("'.$login.'","'.$password.'")';
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    return true;
	}
	return false;
    }
    
    public function getUserPassword($login) {
	$query = 'select password from '.$this->tableName.' where login like "'.$login.'"';
	$queryResult = $this->dbConnection->query($query);
	if($queryResult) {
	    return $queryResult->fetch_assoc();
	}
	return false;
    }
}
