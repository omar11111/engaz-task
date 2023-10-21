<?php
require_once '../Repositories/BlogRepository.php'; // Adjust the path to match your file structure
class Blog
{
    private $repository;
// Columns
public $id;
public $title;
public $description;
public $updated_at;
public $created_at;
public $deleted_at;
public $result;
    public function __construct($db)
    {
        $this->repository = new BlogRepository($db);
    }

    public function getBlogs()
    {
        return $this->repository->getBlogs();
    }

    public function getSingleBlog()
    {
        return $this->repository->getSingleBlog($this->id);
    }

    public function createBlog()
    {
        return $this->repository->createBlog($this->title, $this->description);
    }

    public function updateBlog()
    {
        return $this->repository->updateBlog($this->id, $this->title, $this->description);
    }

    public function deleteBlog()
    {
        return $this->repository->deleteBlog($this->id);
    }

}



// UPDATE
