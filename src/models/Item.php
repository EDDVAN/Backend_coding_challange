<?php

class Item
{
    // DB Params
    private $_conn;

    // Item Params
    public $id;
    public $toDoString;
    public $date;

    // Constructor
    public function __construct($db)
    {
        $this->_conn = $db;
    }

    /* Functions */
    // Get Items
    public function read()
    {
        $query = 'SELECT * FROM items';
        $stmt = $this->_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Add Item
    public function add()
    {
        $query = 'INSERT INTO items (todostring) VALUES (\'' . $this->toDoString . '\')';
        $stmt = $this->_conn->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update Item
    public function update()
    {
        $query = 'UPDATE items SET todostring = \'' . $this->toDoString . '\' WHERE id = ' . $this->id;
        $stmt = $this->_conn->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete Item
    public function delete()
    {
        $query = 'DELETE FROM items WHERE id = ' . $this->id;
        $stmt = $this->_conn->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
