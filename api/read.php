
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database/database.php';
include_once '../models/blog.php';
$database = new Database();

$db = $database->getConnection();
$items = new Blog($db);
$records = $items->getBlogs();

$itemCount = $records->num_rows;
if ($itemCount > 0) {
    $blogsArr = array();
    $blogsArr["itemCount"] = $itemCount;
    $blogsArr["body"] = array();
    while ($row = $records->fetch_assoc()) {
        array_push($blogsArr["body"], $row);
    }
    echo json_encode($blogsArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>