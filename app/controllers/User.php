<?php

class User extends Controller{
    
    public function register(){
        $this->loadView('user/signup');
    }

    public function login(){
        $this->loadView('user/login');
    }
}