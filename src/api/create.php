<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once '../config/Database.php';
require_once '../models/Item.php';

// Init DB Connection 
$database = new Database();
$db = $database->initConnection();

/// Init New Item
$item = new Item($db);


/* Update Process */
if (isset($_GET['string'])) {
    $item->toDoString = $_GET['string'];
    if ($item->add()) {
        echo json_encode(
            array('message' => 'Item added')
        );
    } else {
        echo json_encode(
            array('message' => 'Item Not added')
        );
    }
} else {
    echo json_encode(
        array('message' => 'No input')
    );
}
