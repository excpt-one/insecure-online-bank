<?php

$pass = '';
$user = 'root';
$host = 'localhost';
$dbname = 'online_bank';

$DB = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$user_id = $_GET['user_id']; 
$money = $_GET['money'];
$receiver_name = $_GET['receiver_name'];
$receiver_details = $_GET['receiver_details'];
$receiver_number = $_GET['receiver_number'];
$comment = $_GET['comment'];

$result = $DB->prepare("SELECT * FROM users WHERE id = ?");
$result->execute(array($user_id));

$result->setFetchMode(PDO::FETCH_OBJ);

if ($data = $result->fetch()) {
    $new_balance = intval($data->balance) - intval($money);
    if ($new_balance >= 0) {
        $params = array(
            $new_balance,        
            $user_id,            
        );        
        
        $query = $DB->prepare("UPDATE users SET balance = ? WHERE id = ?");
        $query->execute($params);
        
        $query_get_rec_balance = $DB->prepare("SELECT * FROM users WHERE id = ?");
        $query_get_rec_balance->execute(array($receiver_number));
        
        $query_get_rec_balance->setFetchMode(PDO::FETCH_OBJ);
        
        $data_rcv = $query_get_rec_balance->fetch();
        
        $new_rcv_balance = intval($data_rcv->balance) + intval($money);
        
        $params_rcv = array(
            $new_rcv_balance,        
            $receiver_number,
        );
        
        var_dump($data_rcv->balance);
        
        $query_rcv = $DB->prepare("UPDATE users SET balance = ? WHERE id = ?");
        $query_rcv->execute($params_rcv);
        
        if ($query->rowCount() > 0 && $query_rcv->rowCount())
            print 'Запрос успешно обработан.';
        else
            print 'Ошибка во время выполнения операции.';
    } else {
        print 'Недостачно средств для выполнения операции!';
    }
} else {
    print 'Ошибка: не удается найти пользователя.';
}