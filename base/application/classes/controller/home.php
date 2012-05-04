<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller {

	public function action_index()
	{
	    // Load the translation table for this language
		$view = View::factory('home/home', array(
			'page' => 'page/index',
			'links' => I18n::load('en-links'),
			'messages' => I18n::load('en-us'),
		));
		$index = $view->render();
		$this->response->body($index);
	}

}