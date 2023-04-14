<?php

    require_once 'config/settings.php';
    require_once 'helper/session_helper.php';
    require_once 'helper/html_helper.php';

    function my_autoloader( $class ) {
        require_once 'lib/' . $class . '.php';
    }
    
    spl_autoload_register( 'my_autoloader' );