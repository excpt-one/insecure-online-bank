<?php

class Controller_Templates extends Controller {
    
    function __construct() {
        
        $this->model = new Model_Templates();
        $this->view = new View();
        
	}
    
    function action_index() {
        
        if ($user_id = User::getUserId()) {
            $data = array();
            $data['templates'] = $this->model->getList($user_id);
            
            $this->view->generate('templates_list_view.php', 'template_view.php', $data);
        } else {
            Route::ErrorPage404();
        }
        
    }
    
    function action_upload() {
        
        if ($user_id = User::getUserId()) {
            if (isset($_FILES['xml'])) {
                $xml = simplexml_load_file($_FILES['xml']['tmp_name']);
                unlink($_FILES['xml']['tmp_name']);
                $title = $xml->title;
                $money = $xml->money;
                $receiver_name = $xml->receiver_name;
                $receiver_details = $xml->receiver_details;
                $receiver_number = $xml->receiver_number;
                $description = $xml->description;
                
                $this->model->add($user_id, $title, $money, $receiver_name, $receiver_details, $receiver_number, $description);
            } else {
                $this->view->generate('template_upload_view.php', 'template_view.php', $data);
            }
        } else {
            Route::ErrorPage404();
        }
        
    }
    
    function action_view($template_id) {
        
        if ($data = $this->model->getById($template_id)) {
            $this->view->generate('template_detail_view.php', 'template_view.php', $data);
        } else {
            Route::ErrorPage404();
        }
        
    }
    
    function action_pay($template_id) {
        
        if ($data = $this->model->getById($template_id)) {
            $this->view->generate('transfer_view.php', 'template_view.php', $data);
        } else {
            Route::ErrorPage404();
        }
        
    }
    
    function action_edit($template_id) {
        
        if (isset($_POST['edit'])) {
            if (!empty($_POST['title']) && !empty($_POST['money']) && !empty($_POST['receiver_name']) &&
                !empty($_POST['receiver_details']) && !empty($_POST['receiver_number']) && !empty($_POST['description'])) {
                    $title = $_POST['title'];
                    $money = $_POST['money'];
                    $receiver_name = $_POST['receiver_name'];
                    $receiver_details = $_POST['receiver_details'];
                    $receiver_number = $_POST['receiver_number'];
                    $description = $_POST['description'];
                    
                    if ($this->model->update($template_id, $title, $money, $receiver_name, $receiver_details, $receiver_number, $description)) {
                        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
                        header('Location:'.$host.'templates');
                    } else {
                        Route::Error();
                    }
                } else {
                    $data = $this->model->getById($template_id);
                    $data['error'] = true;
                    $this->view->generate('template_edit_view.php', 'template_view.php', $data);
                }
        } elseif ($user_id = User::getUserId() && $template_id) {
            if ($data = $this->model->getById($template_id)) {
                $this->view->generate('template_edit_view.php', 'template_view.php', $data);
            } else {
                Route::ErrorPage404();
            }
        } else {
            Route::ErrorPage404();
        }
        
    }
    
    function action_export($template_id) {
        
        if ($data = $this->model->getById($template_id)) {
            $xml = new SimpleXMLElement('<root/>');
            array_walk_recursive(array_flip($data), array($xml, 'addChild'));
            
            unset($data['owner']);
            
            $text = $xml->asXML();
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=template' . htmlspecialchars($template_id) . '.xml');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . strlen($text));
            
            print $text;
        } else {
            Route::ErrorPage404();
        }
        
    }
    
}
