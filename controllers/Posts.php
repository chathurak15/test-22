<?php
include 'models/PostModel.php';

class Posts{

    private $postModel;

    public function __construct(){
        $this->postModel = new PostModel();
    }
    
    public function index(){
        $posts = $this->postModel->getAllPosts();
        require 'views/posts/index-view.php';
    }

    public function add(){
        require 'views/posts/add-view.php';
        exit;
    }
    
    public function save(){
        $data =[
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
            'content' => $_POST['content'],
        ];
        ($this->postModel->addPost($data));
    }

    public function show($slug){
        $post = $this->postModel->getPostBySlug($slug);
        if(!$post){
            header('Location: /posts');
            exit;
        }
        include 'views/posts/show-view.php';
        exit;
    }

    public function edit($id){
        $post = $this->postModel->getPostById($id);
        if(!$post){
            header('Location: /posts');
            exit;
        }
        include 'views/posts/edit-view.php';
        exit;
    }

    public function update($id){
        $data =[
            'title' => $_POST['title'],
            'slug' => $_POST['slug'],
            'content' => $_POST['content'],
        ];
        if($this->postModel->updatePost($id, $data)){
            header('Location: /posts/show/'.$_POST['slug']);
            exit;
        }else{
            header('Location: /posts/edit/'.$id);
            exit;
        }
    }
}