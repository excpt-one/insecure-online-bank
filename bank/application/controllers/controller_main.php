<?php

class Controller_Main extends Controller
{

	function action_index() {	
	   
        if ($user_id = User::getUserId()) {
            $data = User::getInfo($user_id);
            $this->view->generate('main_authorized_view.php', 'template_view.php', $data);
        } else {
            $this->view->generate('main_view.php', 'template_view.php');
        }
            
	}
    
}