<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../blogs.php';
$database = new Database();
$db = $database->getConnection();
$item = new Blog($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleBlog();
if($item->title != null){

// create array
$blog_arr = array(
"id" => $item->id,
"title" => $item->title,
"description" => $item->description,
"created_at" => $item->created_at
);

http_response_code(200);
echo json_encode($blog_arr);
}
else{
http_response_code(404);
echo json_encode("Blog not found.");
}
?>
