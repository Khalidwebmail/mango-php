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
        $url = $this->getUrl();
        
        if( isset( $url[0] ) && ! empty( $url[0] ) ){
            if(file_exists( '../app/controllers/' . ucfirst( $url[0]). '.php' ) ){
                $this->controller = ucfirst( $url[0] );
                unset( $url[0] );
            }
        }

        require_once '../app/controllers/'. $this->controller . '.php';
        $this->controller = new $this->controller;
  
        if( isset( $url[1] ) && ! empty( $url[1] ) ){
            if( method_exists($this->controller, $url[1] ) ){
                $this->method = $url[1];
                unset( $url[1] );
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array( [ $this->controller, $this->method ], $this->params );
    }

    /**
     * Get current url
     *
     * @return array
     */
    public function getUrl(){
        if( isset( $_GET['url'] ) && ! empty( $_GET['url'] ) ){
            $url = rtrim( $_GET['url'], '/' );
            $url = filter_var( $url, FILTER_SANITIZE_URL );
            $url = explode( '/',$url );
            return $url;
        }
    }
}

