<?php

function csrf_token( string $name = '_token'){
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $_SESSION['token'] = bin2hex(random_bytes(32));
    $token =  $_SESSION['token'];
    print "<input type='hidden' name='".$name."' value='".$token."'>";
}