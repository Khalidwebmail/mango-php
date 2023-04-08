<?php

class Model{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

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
}