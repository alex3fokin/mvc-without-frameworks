<?php

class News extends AbstractSection {

    /**
     * Объект предназначенный для работы с данными новостей
     * @var NewsHandler
     */
    protected $newsHandler;

    public function __construct() {
	parent::__construct();
	$this->newsHandler = new NewsHandler();
    }

    public function action_index() {
	$data = $this->newsHandler->getAllNews();
	$this->displayer->show('newsIndex.php', $data);
    }

    public function action_showItem($ID) {
	$data = $this->newsHandler->getNewsItem($ID);
	if ($data) {
	    $this->displayer->show('newsShowItem.php', $data);
	} else {
	    Router::notFound();
	}
    }

}
