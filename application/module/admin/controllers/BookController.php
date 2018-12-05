<?php
class BookController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	// ACTION: LIST BOOK
	public function indexAction(){
		$this->_view->_title 		= 'Book Manager :: List';
		$totalItems					= $this->_model->countItem($this->_arrParam, null);
		
		$configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->slbCategory		= $this->_model->itemInSelectbox($this->_arrParam, null);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('book/index');
	}

	// ACTION: ADD & EDIT BOOK
	public function formAction(){
		$this->_view->_title = 'Book : Add';
		$this->_view->slbCategory		= $this->_model->itemInSelectbox($this->_arrParam, null);
		if(!empty($_FILES)) $this->_arrParam['form']['picture']  = $_FILES['picture'];
		$task = '';
		if(isset($this->_arrParam['id'])){
			$this->_view->_title = 'Book : Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if(empty($this->_arrParam['form'])) URL::redirect('admin', 'book', 'index');
		}		
		if(@$this->_arrParam['form']['token'] > 0){
			$task			= 'add';
			if(isset($this->_arrParam['form']['id'])){
				$task			 = 'edit';
			}
			$this->_validate->validate();
			$this->_arrParam['form'] = $this->_validate->getResult();
			if($this->_validate->isValid() == false){
				$this->_view->errors = $this->_validate->showErrors();
			}else{
				$id	= $this->_model->saveItem($this->_arrParam, array('task' => $task));
				if($this->_arrParam['type'] == 'save-close') 	URL::redirect('admin', 'book', 'index');
				if($this->_arrParam['type'] == 'save-new') 		URL::redirect('admin', 'book', 'form');
				if($this->_arrParam['type'] == 'save') 			URL::redirect('admin', 'book', 'form', array('id' => $id));
			}
		}
		
		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('book/form');
	}

	// action ajax status    	 (*)
	public function ajaxStatusAction(){
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
		echo json_encode($result);
	}

	// ACTION: AJAX SPEACIAL (*)
	public function ajaxSpecialAction(){
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-special'));
		echo json_encode($result);
	}

	// action status   (*)
	public function statusAction(){
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('admin', 'book', 'index');
	}

	// action trash   (*)
	public function trashAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'book', 'index');
	}

	// action ordering    (*)
	public function orderingAction(){
		$this->_model->ordering($this->_arrParam);
		URL::redirect('admin', 'book', 'index');
	}
}