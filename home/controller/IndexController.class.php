<?php 
/**
* 
*/
class IndexController extends Controller
{
	
	function __construct()
	{
		//parent::__construct();
	}
	function index(){
		//$this->display();
		include "./home/view/index/index.html";
	}
}


 ?>