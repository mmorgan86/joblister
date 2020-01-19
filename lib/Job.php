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
        $this->db->query("SELECT jobs.*, c.name AS cname 
                        FROM jobs 
                        JOIN categories c ON jobs.category_id = c.id
                        ORDER BY post_date DESC
                        ");

        // assign result set
        return $this->db->resultSet();
    }

    // GET ALL CATEGORIES
    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");

        // assign result set
        return $this->db->resultSet();
    }

    // Get Jobs by category
    public function getByCategory($category)
    {
        $this->db->query("SELECT jobs.*, c.name AS cname 
                        FROM jobs 
                        JOIN categories c ON jobs.category_id = c.id
                        WHERE jobs.category_id = $category
                        ORDER BY post_date DESC
                        ");

        // assign result set
        return $this->db->resultSet();
    }

    // Get Category
    public function getCategory($category_id)
    {
        $this->db->query("SELECT * FROM  categories WHERE id = :category_id");

        $this->db->bind(':category_id', $category_id);

        // assign row
        $row = $this->db->single();

        return $row;
    }

    // search jobs with query
    public function searchJobs($query, $locationSearch = '')
    {
        $location = '';
        if($locationSearch) {
            $location = " AND location LIKE '%{$locationSearch}%' ";
        }
        $this->db->query("
           SELECT * FROM jobs WHERE job_title LIKE '%{$query}%' {$location}
        ");

        return $this->db->resultSet();
    }


    // Get job
    public function getJob($id)
    {
        $this->db->query("SELECT * FROM  jobs WHERE id = :id");

        $this->db->bind(':id', $id);

        // assign row
        $row = $this->db->single();

        return $row;
    }

    // create job
    public function create($data)
    {
        $this->db->query("
            INSERT INTO jobs (category_id, user_id, job_title, company, description, location, salary, contact_user, contact_email)
            VALUES (:category_id, :user_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)
        ");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        // executed
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete job
    public function delete($id) {

        if($this->userOwnsJob(S_SESSION['user_id'], $id)) {
            $this->db->query("
                DELETE FROM jobs WHERE id = $id
            ");

            // executed
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // Update job
    public function update($id, $data) {

        if($this->userOwnsJob($data['user_id'], $id)) {
            // INSERT QUERY
            $this->db->query("
            UPDATE jobs 
            SET 
                category_id = :category_id, 
                job_title = :job_title, 
                company = :company, 
                description = :description, 
                location = :location, 
                salary = :salary, 
                contact_user = :contact_user, 
                contact_email = :contact_email
            WHERE id = $id
            ");

            // Bind Data
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);

            // executed
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    // get user jobs
    public function getUserJobs($user_id)
    {
        $this->db->query("SELECT * FROM  jobs WHERE user_id = :user_id");

        $this->db->bind(':user_id', $user_id);

        // results
        return $this->db->resultSet();
    }

    // check if user owns this job listing
    public function userOwnsJob($user_id, $job_id)
    {
        $this->db->query("
            SELECT id, user_id FROM jobs WHERE user_id = :user_id and id = :job_id
        ");

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':job_id', $job_id);

        if(count($this->db->resultSet())) {
            return true;
        } else {
            return false;
        }
    }
}