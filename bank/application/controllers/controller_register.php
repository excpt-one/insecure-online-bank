<?php

class Controller_Register extends Controller {
    
    function action_index() {
                
        if (!User::isAuthorized()) {
            $data = array();
            
            if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {
                
                $login = $_POST['login'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                
                if (!User::loginExist($login)) {
                    if (strlen($login) > 3 && strlen($password) > 5 && $password === $password2) {
                        User::register($login, $password);
                        $data['success'] = true;
                    } else {
                        $data['success'] = false;
                    }
                } else {
                    $data['success'] = false;
                    $data['login_exist'] = true;
                }
            }
            
            $this->view->generate('register_view.php', 'template_view.php', $data);
        } else {
            $host = $_SERVER['HTTP_HOST'];
            header('Location: http://' . $host);
        }
        
    }  
    
}
