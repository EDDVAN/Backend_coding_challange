<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once '../config/Database.php';
    include_once '../models/Item.php';

    // Init DB Connection
    $database = new Database();
    $db = $database->initConnection();

    // Init New Item
    $item = new Item($db);


    /* Update Process */
    if(isset($_GET['id']) && isset($_GET['string']))
    {
        $item->id = $_GET['id'];
        $item->toDoString = $_GET['string'];
        if($item->update()) 
        {
            echo json_encode(
              array('message' => 'Item Updated')
            );
        }else 
        {
            echo json_encode(
              array('message' => 'Item Not Updated')
            );
        }
    }else
    {
        echo json_encode(
            array('message' => 'Unvalid data')
        );
    }

?>