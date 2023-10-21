<?php
class BlogRepository
{
    // dbection
    private $db;

    private $db_table = "blogs";

    public $result;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }


    // GET ALL
    public function getBlogs()
    {
        $sqlQuery = "SELECT id, title, description, created_at FROM " . $this->db_table . "" . " WHERE deleted_at IS NULL";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createBlog($title, $description,$token)
    {
        if(!$token){
            return false;
        }
        // sanitize
        $title = htmlspecialchars(strip_tags($title));
        $description = htmlspecialchars(strip_tags($description));
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sqlQuery = "INSERT INTO " . $this->db_table . " SET 
        title = '" . $title . "',
        description = '" . $description . "',
        created_at = '" . $created_at . "',
        updated_at = '" . $updated_at . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }


    public function getSingleBlog($id)
    {
        $sqlQuery = "SELECT * FROM
        " . $this->db_table . " WHERE id = " . $id . " And deleted_at IS NULL";
        $record = $this->db->query($sqlQuery);
        if ($record->num_rows == 0) {
            return false;
        }
        $dataRow = $record->fetch_assoc();
        return $dataRow;
    }

    public function updateBlog($id, $title,$description,$token)
    {
       
        if(empty($token)){
            return false;
        }

        $title = htmlspecialchars(strip_tags($title));
        $description = htmlspecialchars(strip_tags($description));
        $updated_at = date('Y-m-d H:i:s');

        $id = htmlspecialchars(strip_tags($id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET title = '" . $title . "',
            description = '" . $description . "',updated_at = '" . $updated_at . "'
            WHERE id = " . $id;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function deleteBlog($id,$token)
    {
        if(empty($token)){
            return false;
        }
        $deleted_at = date('Y-m-d H:i:s');
        $sqlQuery = "UPDATE " . $this->db_table . " SET deleted_at = '" . $deleted_at . "'
        WHERE id = " . $id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}



// UPDATE
