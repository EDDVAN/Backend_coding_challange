<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once '../config/Database.php';
require_once '../models/Item.php';

// Init DB Connection
$database = new Database();
$db = $database->initConnection();

// Init New Item
$item = new Item($db);


/* Delete Process */
if (isset($_GET['id'])) {
    $item->id = $_GET['id'];
    if ($item->delete()) {
        echo json_encode(
            array('message' => 'Item Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Item Not Deleted')
        );
    }
} else {
    echo json_encode(
        array('message' => 'no item selected')
    );
}
