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

$item->id = isset($_POST['id']) ? $_POST['id'] : die();
$singleBlog=$item->getSingleBlog();
if($singleBlog){
if ($singleBlog['deleted_at'] == "") {
    if ($item->deleteBlog()) {
        echo json_encode("Blog deleted.");
    } else {
        echo json_encode("Data could not be deleted");
    }
} else {
    echo json_encode("Blog Deleted before");

}
}else{
    echo json_encode("Blog Deleted before");

}
