<?php

class Home extends Controller{
    
    public function __construct(){
        echo 'Home loaded'. '<br>';
    }

    public function index(){
        $data = [ 'title' => 'Welcome' ];
        $this->loadView('home/index', $data);
    }

    public function about($id){
        echo "this is home about ".$id;
    }
}