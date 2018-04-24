<?php

class Auth extends AbstractSection {

    /**
     *
     * @var UsersHandler
     */
    protected $usersHandler;

    public function __construct() {
	parent::__construct();
	$this->usersHandler = new UsersHandler();
    }

    public function action_register() {
	if (filter_input(INPUT_POST, 'regFormSubm')) {
	    $login = filter_input(INPUT_POST, 'login');
	    $pass = filter_input(INPUT_POST, 'password');
	    $confPass = filter_input(INPUT_POST, 'confPass');
	    $response = array("status" => -1, "message" => "", "oldData" => array("login" => ''));
	    if ($this->usersHandler->isUserExists($login)) {
		$response["message"] = "Login - <b>" . $login . "</b> already exists";
		$response['oldData']['login'] = $login;
	    } else if ($pass !== $confPass) {
		$response["message"] = "Passwords are not equal";
		$response['oldData']['login'] = $login;
	    } else if ($this->usersHandler->addUser($login, password_hash($pass, PASSWORD_DEFAULT))) {
		Router::redirect("/admin");
	    } else {
		$response["message"] = "Some problem";
		$response['oldData']['login'] = $login;
	    }
	}
	$this->displayer->show('registration.php', $response);
    }

    public function action_index() {
	if (empty($_SESSION["login"])) {
	    if (filter_input(INPUT_POST, 'loginFormSubm')) {
		$login = filter_input(INPUT_POST, 'login');
		$pass = filter_input(INPUT_POST, 'password');
		$response = array("status" => -1, "message" => "", "oldData" => array("login" => ''));
		if (!$this->usersHandler->isUserExists($login)) {
		    $response["message"] = "There is no such a user";
		    $response['oldData']['login'] = $login;
		} else {
		    $userPass = $this->usersHandler->getUserPassword($login);
		    if (!password_verify($pass, $userPass["password"])) {
			$response["message"] = "Incorrect password";
		    } else {
			$_SESSION["login"] = $login;
			Router::redirect("/admin");
		    }
		}
	    }
	    $this->displayer->show('auth_login.php', $response);
	} else {
	    if (!$this->usersHandler->isUserExists($_SESSION["login"])) {
		unset($_SESSION["login"]);
		Router::redirect("/auth");
	    } else {
		Router::redirect("/admin");
	    }
	}
    }

    public function action_signout() {
	if(!empty($_SESSION["login"])) {
	    unset($_SESSION["login"]);
	    Router::redirect('/auth');
	}
    }
}
