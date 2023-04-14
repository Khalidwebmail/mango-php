<?php

    require_once 'config/settings.php';

    $path  = APPROOT.'/helper/';
    $files = scandir( $path );
    unset( $files[0] );
    unset( $files[1] );
    foreach( $files as $file ){
        require_once $path.$file;
    }

    function my_autoloader( $class ) {
        require_once 'lib/' . $class . '.php';
    }
    
    spl_autoload_register( 'my_autoloader' );