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

$params = array(
    $user_id
);

$result = $DB->prepare("SELECT * FROM users WHERE id = ?", $params);
$result->execute($params);

$result->setFetchMode(PDO::FETCH_OBJ);

if ($data = $result->fetch()) {
    $new_balance = intval($data->balance) - intval($money);
    if ($new_balance >= 0) {
        $params = array(
            $new_balance,        
            $user_id,            
        );        
        $result = $DB->prepare("UPDATE users SET balance = ? WHERE id = ?", $params);
        $result->execute($params);
        
        if ($result->rowCount() > 0)
            print 'Запрос успешно обработан.';
        else
            print 'Ошибка во время выполнения операции.';
    } else {
        print 'Недостачно средств для выполнения операции!';
    }
} else {
    print 'Ошибка во время выполнения операции.';
}