<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database/database.php';
include_once '../../models/user.php';
include_once '../../jwt-auth/sendjson.php';
$database = new Database();
$db = $database->getConnection();
$item = new User($db);

$item->name = $_POST['name'];
$item->email = $_POST['email'];
$item->password = $_POST['password'];

if ($item->register()) {
    echo json_encode('user created');
}else{
    echo json_encode('something went wrong');
}