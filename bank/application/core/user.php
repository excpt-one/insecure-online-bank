<?php

require_once 'model_user.php'; 

class User {
    
    static function authorize($id) {
        
        $session_id = bin2hex(base64_encode((string)md5($id) . (string)rand(10001000, 10002000)));
        
        if (ModelUser::setSession($id, $session_id))
            return $session_id;
        else
            return false;
        
    }
    
    static function login($login, $password) {
        
        if ($id = ModelUser::isUser($login, $password)) {
            $sessionId = User::authorize($id);
            //print $id . ' ' . $sessionId;
            return array('id' => $id, 'session' => $sessionId);
        } else {
            return false;
        }
        
    }
    
    static function register($login, $password) {
        
        ModelUser::addUser($login, $password);
        
    }
    
    static function isAuthorized() {
        
        $user_id = (int)$_COOKIE['id'];
        $session = $_COOKIE['session'];
        
        if (ModelUser::isSession($user_id, $session))
            return true;
        else
            return false;
            
    }
    
    static function getUserId() {
        if (User::isAuthorized())
            return (int)$_COOKIE['id'];
        else
            return false;
    }
    
    static function getInfo($user_id) {
        if (User::isAuthorized()) {
            return ModelUser::getInfo($user_id);
        } else
            return false;
    }
    
    static function loginExist($login) {
        
        if (ModelUser::loginExist($login))
            return true;
        else
            return false;
        
    }

}
