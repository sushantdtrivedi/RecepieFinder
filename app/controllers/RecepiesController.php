<?php

class RecepiesController extends BaseController{
	
	public $restful = true;

	public function getIndex(){
		return View::make('recepies.index');
	}
}

?>