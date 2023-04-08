<?php

class Home extends Controller{
    public function index(){
        $data = [
            'title'     => 'Welcome',
        ];
        $this->loadView('home/index', $data);
    }
}