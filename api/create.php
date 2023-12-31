<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database/database.php';
include_once '../models/blog.php';
$database = new Database();
$db = $database->getConnection();
$item = new Blog($db);


$item->title = $_POST['title'];
$item->description = $_POST['description'];
$item->token = $_POST['token']??null;
if($item->createBlog()){
echo json_encode('Blog created successfully.');
} else{
echo json_encode('Blog could not be created.');
}
?>
