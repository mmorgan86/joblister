<?php

class Job {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                        FROM jobs 
                        JOIN categories ON jobs.category_id = category_id
                        ORDER BY post_date DESC
                        ");

        // assign result set
        return $this->db->resultSet();
    }

}