<?php

class Controller{
    public function model( $model ){
        if( isset ( $model ) && ! empty( $model ) ){
            require_once '../app/models/' .$model. '.php';
            return new $model;
        }
    }

    public function loadView( $view, $data = [] ){
        if( isset( $view ) && ! empty( $view ) ){
            if( file_exists( file_exists( '../app/view/' .$view. '.php' ) ) ){
                require_once '../app/views/' .$views. '.php';
            }
        }
        else{
            die('View does not exixtes');
        }
    }
}