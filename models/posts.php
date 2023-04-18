<?php

require 'core/db.php';


class Postmodel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllPosts()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    // public function savePost($title, $post){
    //     $date = time();
    //     $sql = "INSERT INTO posts (title, post, date) VALUES ('$title', '$post','$date')";
    //     $stmt = $this->db->query($sql);
    //     $stmt->execute();
    //     return $stmt;
    // }

    public function savePost($title, $post)
    {
        $date = time();
        $sql = "INSERT INTO posts (title, post, date) VALUES (:title, :post, :date)";
        $this->db->queryRun($sql);
        $this->db->bind(':title', $title);
        $this->db->bind(':post', $post);
        $this->db->bind(':date', $date);
        return $this->db->execute();

    }

    public function getPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id = $id";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public function updatePost($id, $title, $post)
    {
        $sql = "UPDATE posts SET title = '$title', post = '$post' WHERE id = $id";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = $id";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt;
    }
}