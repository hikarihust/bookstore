<?php
class ErrorController extends Controller{
	public function __construct(){
		//add start
		// parent::__construct();
		//add end
	}
	
	public function indexAction(){
		$this->_view->data	= '<h3>This is an error!</h3>';
		$this->_view->render('error/index');
	}
}