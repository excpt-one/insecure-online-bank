<?php

class Controller_Transfer extends Controller {
    
    function __construct() {
        
        $this->db = new Model_Transfer();
		$this->view = new View();
        
	}
    
    function action_index() {
        
        $user_id = User::getUserId();
        
        if (isset($_POST['transfer']) && $user_id) {
            if (!empty($_POST['money']) && !empty($_POST['receiver_name']) && !empty($_POST['receiver_details']) && !empty($_POST['receiver_number']) && !empty($_POST['comment'])) {
                $host = $_POST['host'];
                $money = abs(intval($_POST['money']));
                $receiver_name = htmlspecialchars($_POST['receiver_name']);
                $receiver_details = htmlspecialchars($_POST['receiver_details']);
                $receiver_number = htmlspecialchars($_POST['receiver_number']);
                $comment = htmlspecialchars($_POST['comment']);
                
                $sock = fsockopen($host, 2000);
                $request = "GET /make.php?user_id={$user_id}&money={$money}&receiver_name={$_POST['receiver_name']}&receiver_details={$_POST['receiver_details']}&receiver_number={$_POST['receiver_number']}&comment={$_POST['comment']} HTTP/1.1\r\n";
                $request .= "Host: {$host}:2000\r\n";
                $request .= "Connection: Close\r\n\r\n";
                fputs($sock, $request);
                $response = "";
                
                while ($s = fgets($sock))
                    $response .= $s;
                
                $response = substr($response, strpos($response, "\r\n\r\n"));                
                $data = array(
                    'success' => true,
                    'response' => $response
                );
                
                $this->db->addTransaction($user_id, $money, $receiver_name, $receiver_details, $receiver_number, $comment, $response, date('d-m-Y H:i'));
            } else {
                $data = array(
                    'error' => true,
                    'money' => $money,
                    'receiver_name' => $receiver_name,
                    'receiver_details' => $receiver_details,
                    'receiver_number' => $receiver_number,
                    'comment' => $comment,
                    'response' => $response,
                );
            }
            
            $this->view->generate('transfer_view.php', 'template_view.php', $data);
        } elseif ($user_id) {
            $this->view->generate('transfer_view.php', 'template_view.php');
        } else {
            Route::ErrorPage404();
        }
    
    } 

    function action_history() {
        
        if ($user_id = User::getUserId()) {
            $data = array(
                'transactions' => $this->db->usersTransactions($user_id)
            );
            $this->view->generate('transfers_history_view.php', 'template_view.php', $data);
        } else {
            Route::ErrorPage404();
        }
    
    }
    
    function action_detail($transfer_json) {
        
        $data = $this->mongo_db->getTransaction($transfer_json);
        $this->view->generate('transfer_detail_view.php', 'template_view.php', $data);
        
    }
    
}
