<?php

class User extends Controller{
    
    private $users;
    public function __construct(){
        $this->users = $this->model( 'User_Model' );
    }

    /**
     * Signup function
     *
     * @return void
     */
    public function register(){
        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ){
            // Sanitize POST data
            
            $data =[
                'name' => senitizeData( $_POST ['name' ] ),
                'email' => senitizeData( $_POST ['email' ] ),
                'password' => senitizeData( $_POST ['password' ] ),
                'confirm_password' => senitizeData( $_POST ['confirm_password' ] ),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Validate Email
            if( empty( $data['email' ] ) ){
                $data[ 'email_err' ] = 'Pleae enter email';
            }
            else{
                if($this->users->findUserByEmail( $data[ 'email' ]) ){
                    $data[ 'email_err' ] = 'This email is already taken';
                }
            }
    
            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Pleae enter name';
            }
    
            // Validate Password
            if( empty( $data[ 'password' ] ) ){
                $data[ 'password_err' ] = 'Pleae enter password';
            } elseif( strlen($data['password'] ) < 6 ){
                $data[ 'password_err' ] = 'Password must be at least 6 characters';
            }
    
            // Validate Confirm Password
            if( empty( $data[ 'confirm_password' ] ) ){
                $data [ 'confirm_password_err' ] = 'Pleae confirm password';
            } else {
                if( $data[ 'password' ] != $data['confirm_password'] ){
                $data[ 'confirm_password_err' ] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if( empty( $data[ 'email_err'] ) && empty($data[ 'name_err' ] ) && empty( $data[ 'password_err' ] ) && empty($data['confirm_password_err'] ) ){
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->loadView( 'user/signup', $data );
            }
        }

        else{
            $data =[
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->loadView( 'user/signup', $data );
        }
    }

    /**
     * Login function
     *
     * @return void
     */
    public function login(){
        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ){

            $data =[
                'email' => senitizeData( $_POST ['email' ] ),
                'password' => senitizeData( $_POST ['password' ] ),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if( empty( $data[ 'email' ] ) ){
                $data[ 'email_err' ] = 'Pleae enter email';
            }

            // Validate Password
            if( empty( $data[ 'password' ] ) ){
                $data[ 'password_err' ] = 'Pleae enter password';
            } elseif( strlen( $data['password'] ) < 6 ){
                $data[ 'password_err' ] = 'Password must be at least 6 characters';
            }

            // Make sure errors are empty
            if( empty( $data[ 'email_err' ] ) && empty( $data[ 'name_err' ] ) && empty( $data[ 'password_err' ] ) && empty( $data['confirm_password_err'] ) ){
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->loadView( 'user/login', $data );
            }
        }
        
        else{
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->loadView( 'user/login', $data );
        }
    }
}