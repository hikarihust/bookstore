<?php
class SettingGeneralController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
	}
	
	public function indexAction(){
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	
		$this->_view->_title 		= 'Index';
		$this->_view->dataTitle 	= 'SettingGeneralController - indexAction';
		$this->_view->dataCourse 	= $this->_model->infoItem($this->_arrParam, null);

		$this->_view->render('setting-general/index');
	}
}