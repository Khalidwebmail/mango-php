<?php

/**
 * Create URL and load controller
 * URL format - controller/method/param
 */

Class Core{
    protected  $controller = 'Home';
    protected  $method     = 'index';
    protected  $params     = [];

    public function __construct(){
        $this->loadController();
    }

    /**
     * Get current url
     *
     * @return array
     */
    public function getUrl(): array{
        if( isset( $_GET['url'] ) && ! empty( $_GET['url'] ) ){
            $url = rtrim( $_GET['url'], '/' );
            $url = filter_var( $url, FILTER_SANITIZE_URL );
            $url = explode( '/',$url );
            return $url;
        }
    }

    /**
     * Load Controller
     *
     * @return void
     */
    public function loadController(){
        $url = $this->getUrl();

        if(file_exists( '../app/controllers/' . ucwords( $url[0] ). '.php' ) ){
            // If exists, set as controller
            $this->controller = ucwords( $url[0] );
            // Unset 0 Index
            unset( $url[0] );
            }
    
            // Require the controller
            require_once "../app/controllers/". $this->controller . ".php";
            $this->controller = new $this->controller;
    }
}

