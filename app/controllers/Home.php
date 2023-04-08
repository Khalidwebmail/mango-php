<?php

class Home extends Controller{
    public function index(){
        $posts = $this->post_model->getPosts();
        $data = [
            'title'     => 'Welcome',
            'posts'     => $posts
        ];
        $this->loadView('home/index', $data);
    }
}