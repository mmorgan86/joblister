<?php

class Categories {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCategories()
    {
        $this->db->query("
            SELECT * FROM categories
        ");
    }
}