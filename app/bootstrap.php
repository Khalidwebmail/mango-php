<?php

    // require_once 'lib/Core.php';
    // require_once 'lib/Controller.php';
    // require_once 'lib/Database.php';

    function my_autoloader( $class ) {
        require_once 'lib/' . $class . '.php';
    }
    
    spl_autoload_register( 'my_autoloader' );