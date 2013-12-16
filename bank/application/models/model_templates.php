<?php

class Model_Templates extends Model {
    
    function __construct() {
        
        global $DB;
        $this->db = $DB;
        
    }
    
    public function getList($userId) {
        
        $params = array(
            $userId
        );
        
        $result = $this->db->prepare("SELECT * FROM templates WHERE owner = ?");
        $result->execute($params);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $templates = array();
        while ($data = $result->fetch()) {
            $item = array();
            
            foreach ($data as $id => $val) {
                $item[$id] = $val;
            }
            
            $templates[] = $item;
        }
        
        return $templates;
        
    }
    
    public function add($user_id, $title, $money, $receiver_name, $receiver_details, $receiver_number, $description = '') {
        
        $params = array(
            $user_id,
            $title,
            $money,
            $receiver_name,
            $receiver_details,
            $receiver_number,
            $description
        );
        
        $result = $this->db->prepare("INSERT INTO templates (owner, title, money, receiver_name, receiver_details, receiver_number, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
        
    }
    
    public function getById($template_id) {
        
        $params = array(
            $template_id
        );
        
        $result = $this->db->prepare("SELECT * FROM templates WHERE id = ?");
        $result->execute($params);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($result->rowCount() > 0)
            return $result->fetch();
        else
            return false;
        
    }
    
    public function update($template_id, $title, $money, $receiver_name, $receiver_details, $receiver_number, $description) {
        
        $params = array(
            $title,
            $money,
            $receiver_name,
            $receiver_details,
            $receiver_number,
            $description,
            $template_id
        );
        
        $result = $this->db->prepare("UPDATE templates SET title = ?, money = ?, receiver_name = ?, receiver_details = ?, receiver_number = ?, description = ? WHERE id = ?");
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            return true;
        else
            return false;
        
    }
    
}
