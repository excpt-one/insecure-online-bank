<?php

class ModelUser extends Model {
    
    static function isUser($login, $password) {
        
        global $DB;
        
        $params = array(
            $login
        );
        
        $result = $DB->prepare("SELECT id, password, salt FROM users WHERE login = ?");
        $result->execute($params);
        
        $result->setFetchMode(PDO::FETCH_OBJ);  
        
        if ($data = $result->fetch()) {
            $hashPassword = sha1(sha1($password) . $data->salt);
            
            if ($hashPassword === $data->password) {
                return $data->id;
            }
        }
        
        return false;
        
    }
    
    static function setSession($user_id, $session_id) {
        
        global $DB;
        
        $params = array(
            $session_id,
            $user_id
        );
        
        $result = $DB->prepare("UPDATE users SET session = ? WHERE id = ?", $params);
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
            
    }
    
    static function addUser($login, $password) {
        
        global $DB;
        
        $symbols = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0','.',',',
                 '(',')','[',']','!','?',
                 '&','^','%','@','*','$',
                 '<','>','/','|','+','-',
                 '{','}','`','~');
        
        $salt = '';
        
        while (strlen($salt) < 4) {
            $index = rand(0, count($symbols) - 1);
            $salt .= $symbols[$index];
        }
        
        $params = array(
            $login,
            sha1(sha1($password) . $salt),
            $salt
        );
        
        $result = $DB->prepare("INSERT INTO users (login, password, salt, balance) VALUES (?, ?, ?, 5000)");
        $result->execute($params);
        
    }
    
    static function isSession($user_id, $session) {
        
        global $DB;
        
        $params = array(
            $user_id,
            $session
        );
        
        $result = $DB->prepare("SELECT id FROM users WHERE id = ? AND session = ?");
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
            
    }
    
    static function getInfo($user_id) {
        
        global $DB;
        
        $params = array(
            $user_id
        );
        
        $result = $DB->prepare("SELECT * FROM users WHERE id = ?");
        $result->execute($params);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($data = $result->fetch()) {
            return $data;
        } else
            return false;
        
    }
    
    static function loginExist($login) {
        
        global $DB;
        
        $params = array(
            $login
        );
        
        $result = $DB->prepare("SELECT * FROM users WHERE login = ?");
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
        
    }
    
}
