<?php

class Controller_Error extends Controller
{
	
	function action_index()	{
	   
		$this->view->generate('error_view.php', 'template_view.php');
        
	}

}
