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
$item->getSingleBlog();
$singleBlog = $item->getSingleBlog();
if (isset($singleBlog['title'])) {
if ($singleBlog['title'] != '') {
    $item->title = $_POST['title'];
    $item->description = $_POST['description'];
    if ($item->updateBlog()) {
        echo json_encode("Blog data updated.");
    } else {
        echo json_encode("Data could not be updated");
    }
} else {
    echo json_encode('Data not found');
}
}else{
    echo json_encode( 'data not found' );
}
