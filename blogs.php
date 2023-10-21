<?php
class Blog
{
    // dbection
    private $db;

    private $db_table = "blogs";

    // Columns
    public $id;
    public $title;
    public $description;
    public $updated_at;
    public $created_at;
    public $deleted_at;
    public $result;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }


    // GET ALL
    public function getBlogs()
    {   
        $sqlQuery = "SELECT id, title, description, created_at FROM " . $this->db_table . ""." WHERE deleted_at IS NULL";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createBlog()
    {
        // sanitize
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $sqlQuery = "INSERT INTO " . $this->db_table . " SET 
        title = '" . $this->title . "',
        description = '" . $this->description . "',
        created_at = '" . $this->created_at . "',
        updated_at = '" . $this->updated_at . "'";
    $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }


    public function getSingleBlog()
    {
        $sqlQuery = "SELECT * FROM
        " . $this->db_table . " WHERE id = " . $this->id." And deleted_at IS NULL";
        $record = $this->db->query($sqlQuery);
        if ($record->num_rows == 0) {
            return false;
        }
            $dataRow = $record->fetch_assoc();
        
        $this->title = $dataRow['title'];
        $this->description = $dataRow['description'];
        $this->created_at = $dataRow['created_at'];
    }

    public function updateBlog()
    {
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->updated_at = date('Y-m-d H:i:s');

        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET title = '" . $this->title . "',
            description = '" . $this->description . "',updated_at = '" . $this->updated_at . "'
            WHERE id = " . $this->id;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function deleteBlog(){
        $this->deleted_at = date('Y-m-d H:i:s');
        $sqlQuery = "UPDATE " . $this->db_table . " SET deleted_at = '" . $this->deleted_at . "'
        WHERE id = " . $this->id;   
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
        return true;
        }
        return false;
        }
        
}



// UPDATE
