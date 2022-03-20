<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../config/Database.php';
require_once '../models/Item.php';

// Init DB Connection
$database = new Database();
$db = $database->initConnection();

// Init New Item
$item = new Item($db);
$item_arr['data'] = array();

// Reading The Data
$result = $item->read();
$row_count = $result->rowCount();

if ($row_count > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $item_obj = array(
            'id' => $id,
            'string' => $todostring,
            'date' => $date
        );

        // Push to "data"
        array_push($item_arr['data'], $item_obj);
    }
    echo json_encode($item_arr);
} else {
    echo json_encode(
        array('message' => 'no to do items')
    );
}
