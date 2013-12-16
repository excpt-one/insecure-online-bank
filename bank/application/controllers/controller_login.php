<?php

class Controller_Login extends Controller {
	
	function action_index()	{
	   
        $data = array();
		if (isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
            
			$res = User::login($login, $password);	
            if ($res) {
                setcookie('session', $res['session'], time() + 999999999, '/');
                setcookie('id', $res['id'], time() + 999999999, '/');
                //print $res['id'] . ' ' . $res['session'];
                $host = $_SERVER['HTTP_HOST'];
                header('Location: http://' . $host);
            } else {                
                $this->view->generate('error_view.php', 'template_view.php', $data);
            }
		} else {
			$this->view->generate('login_view.php', 'template_view.php');
		}
		
	}
    
    function action_logout() {
        
        setcookie('id', '', time() - 3600, '/');
        setcookie('session', '', time() - 3600, '/');
        $host = $_SERVER['HTTP_HOST'];
        header('Location: http://' . $host);
        
    }
	
}
