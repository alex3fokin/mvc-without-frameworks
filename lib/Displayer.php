<?php

class Displayer {
    /**
     * Название директории шаблонов
     * @var string
     */
    protected $templateFolder = 'templates';
    /**
     *	Название файла шаблона
     * @var string
     */
    public $template = 'template.php';
    public function show($contentTemplate, $data = null) {
	//TODO
	//var_dump($data);
	$contentTemplatePath = $this->templateFolder.DIRECTORY_SEPARATOR.$contentTemplate;
	include_once $this->templateFolder.DIRECTORY_SEPARATOR.$this->template;
    }
}
