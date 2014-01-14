<?php
class Model_Transfer extends Model {
    
    function __construct() {
        
        // Connect to default MongoDB
        $mongo_connection = new Mongo('mongodb://localhost:27017');
        $this->db = $mongo_connection->online_bank;
        
    }
    
    public function addTransaction($user_id, $money, $receiver_name, $receiver_details, $receiver_number, $comment, $response, $date) {
        
        $item = array(
            'sender' => $user_id,
            'money' => $money,
            'receiver_name' => $receiver_name,
            'receiver_details' => $receiver_details,
            'receiver_number' => $receiver_number,
            'comment' => $comment,
            'response' => $response,
            'date' => $date
        );
        
        $this->db->transactions->insert($item);
    
    }
    
    public function usersTransactions($user_id) {
        
        return $this->db->transactions->find(array('sender' => $user_id))->sort(array('date' => 1));
        
    }
    
    public function getTransaction($transfer_json) {
        
        $result = $this->db->execute("return db.transactions.find(" . $transfer_json . ").toArray();");
        return $result['retval'][0];
        
    }
    
}
