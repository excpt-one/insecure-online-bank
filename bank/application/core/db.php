<?php

$pass = '';
$user = 'root';
$host = 'localhost';
$dbname = 'online_bank';

$DB = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
