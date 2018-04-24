<?php

class Admin extends AbstractSection {

    protected $newsHandler;

    public function __construct() {
	if (empty($_SESSION["login"])) {
	    Router::redirect('/auth');
	}
	parent::__construct();
	$this->displayer->template = 'adminTemplate.php';
	$this->newsHandler = new NewsHandler();
    }

    public function action_index() {
	$data = $this->newsHandler->getAllNews();
	$this->displayer->show('adminIndex.php', $data);
    }

    public function action_edit($ID) {
	if (filter_input(INPUT_POST, 'editFormSubmited')) {
	    $newTitle = filter_input(INPUT_POST, 'title');
	    $newContent = filter_input(INPUT_POST, 'content');
	    if ($this->newsHandler->editNewsItem($ID, $newTitle, $newContent)) {
		$message = 'Row with ID = ' . $ID . ' was updated';
	    }
	}
	$data = $this->newsHandler->getNewsItem($ID);
	if ($message) {
	    $data['message'] = $message;
	}
	if ($data) {
	    $this->displayer->show('editNews.php', $data);
	} else {
	    Router::notFound();
	}
    }

    public function action_add() {
	if (filter_input(INPUT_POST, 'addFormSubmited')) {
	    $title = filter_input(INPUT_POST, 'title');
	    $content = filter_input(INPUT_POST, 'content');
	    if ($this->newsHandler->addNewsItem($title, $content)) {
		$message = "New news was added";
	    }
	}
	$this->displayer->show('addNews.php', $message);
    }

    public function action_delete($ID) {
	if (!$ID) {
	    Router::notFound();
	}
	$this->newsHandler->deleteNewsItem($ID);
	Router::redirect($_SERVER['HTTP_REFERER']);
    }

}
