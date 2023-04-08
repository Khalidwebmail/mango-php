<?php

class Home{
    public function __construct()
    {
        echo 'Home loaded'. '<br>';
    }

    public function index(){
        echo "this is home index ";
    }

    public function about($id){
        echo "this is home about ".$id;
    }
}