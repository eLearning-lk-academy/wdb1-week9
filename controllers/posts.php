<?php
require 'models/posts.php';

class Posts
{
    private $postmodel;
    public function __construct()
    {
        $this->postmodel = new Postmodel();
    }

    public function getAllPosts()
    {
        $posts = $this->postmodel->getAllPosts();
        
        require 'view/posts.view.php';
        exit;
    }

    public function addPost()
    {
        require 'view/add.view.php';
        exit;
    }

    public function savePost()
    {
        $this->postmodel->savePost($_POST['title'], $_POST['post']);
        header("Location: $GLOBALS[site_url]");
        exit;
    }

    public function editPost($id){
        $post = $this->postmodel->getPost($id);
        require 'view/edit.view.php';
        exit;
    }

    public function updatePost(){
        $this->postmodel->updatePost($_POST['id'], $_POST['title'], $_POST['post']);
        header("Location: $GLOBALS[site_url]");
        exit;
    }

    public function deletePost($id){
        $this->postmodel->deletePost($id);
        header("Location: $GLOBALS[site_url]");
        exit;
    }
}