<?php

class Controller{
    /**
     * Load model
     *
     * @param string $model
     * @return object
     */
    public function model( $model ): object{
        if( isset ( $model ) && ! empty( $model ) ){
            require_once '../app/models/' .$model. '.php';
            return new $model;
        }
    }

    public function loadView( $view, array|object $data = []  ){
        
        if( isset( $view ) && ! empty( $view ) ){
            // print_r($view);exit;
            if( file_exists( ( '../app/views/' .$view. '.php' ) ) ){
                require_once '../app/views/' .$view. '.php';
            }
        }
        else{
            die('View does not exixtes');
        }
    }
}