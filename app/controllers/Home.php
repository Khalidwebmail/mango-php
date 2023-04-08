<?php

class Home extends Controller{
    private $post_model;

    public function __construct(){
        echo 'Home loaded'. '<br>';
        $this->post_model = $this->model( 'Post_Model' );
    }

    public function index(){
        $posts = $this->post_model->getPosts();
        $data = [
            'title'     => 'Welcome',
            'posts'     => $posts
        ];
        $this->loadView('home/index', $data);
    }

    public function about($id){
        echo "this is home about ".$id;
    }
}