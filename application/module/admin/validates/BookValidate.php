<?php 

class BookValidate extends Validate{
	function __construct($params){
		parent::__construct($params);
	}

	public function validate(){
		$this->addRule('name', 'string', array('min' => 1, 'max' => 255))
				->addRule('picture', 'file', array('min' => 100, 'max' => 1000000, 'extension' => array('jpg', 'png')), false)
				->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
				->addRule('status', 'status', array('deny' => array('default')))
				->addRule('special', 'status', array('deny' => array('default')))
				->addRule('category_id', 'status', array('deny' => array('default')))
				->addRule('price', 'int', array('min' => '1000', 'max' => '1000000'))
				->addRule('sale_off', 'int', array('min' => 0, 'max' => '100'));
		$this->run();
	}
}