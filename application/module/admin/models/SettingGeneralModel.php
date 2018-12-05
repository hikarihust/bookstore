<?php
class SettingGeneralModel extends Model{
	
	 
	public function __construct(){
		parent::__construct();
	}
	
	public function infoItem($arrParam, $option = null){
		if($option == null) {
			return ['php', 'angular'];
		}
	}
}