<?php

    require_once 'config/settings.php';
    require_once 'helpers/filter.php';

    function my_autoloader( $class ) {
        require_once 'lib/' . $class . '.php';
    }
    
    spl_autoload_register( 'my_autoloader' );