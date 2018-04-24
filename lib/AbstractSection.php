<?php

abstract class AbstractSection implements Sectionable {
    /**
     *	Объект который выполняет отображение HTML
     * @var Displayer
     */
    protected $displayer;
    
    public function __construct() {
	$this->displayer = new Displayer();
    }
}
