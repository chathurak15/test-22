<?php
include 'core/db.php';

class PostModel{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }
    public function getAllPosts(){
        $sql = "SELECT * FROM posts";
        return $this->db->query($sql);
    } 

    public function addPost($data){
        $this->db->prepare($data);

        $sql = "INSERT INTO posts (title,slug,content)
        VALUES ('$data[title]','$data[slug]','$data[content]')";
        return $this->db->insert($sql);
    }
    public function getPostBySlug($slug){
        $sql = "SELECT * FROM posts WHERE slug ='{$slug}'
        LIMIT 1";
        return $this->db->queryOne($sql);
    }

    public function getPostById($id){
        $sql = "SELECT * FROM posts WHERE id ='{$id}'
        LIMIT 1";
        return $this->db->queryOne($sql);
    }
    public function updatePost($id, $data){
        $data = $this->db->prepare($data);

        $sql = "UPDATE posts SET title = '{$data['title']}', slug='{$data['slug']}',
        content='{$data['content']}' WHERE id = '{$id}'";
        return $this->db->update($sql);
    }
}