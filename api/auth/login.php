<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database/database.php';
require_once '../../jwt-auth/jwtHandler.php';
require_once __DIR__ ."/../../Models/user.php";
$database = new Database();
$db = $database->getConnection();
$user = new User($db);


$user->email = $_POST['email'];
$user->password = $_POST['password'];
$checkLogin=$user->login();
if ($checkLogin) {
    print_r($checkLogin);
}else{
    echo json_encode('Check your credentials');
}
