<?php

function form_open( string $action = null, string $method = null, string $enctype = null, string $class = null ){
    explode(' ', $class  ?? '' );
    print "<form action='".$action."' method='".$method."' class='".$class."', enctype='".$enctype."'>";
}

function form_close(){
    print "</form>";
}

function input( string $type = null, string $name = null, int|string|bool|array|object $value = null, string $class = null ){
    explode(' ', $class  ?? '' );
    print "<input type='".$type."' name='".$name."' class='".$class."' value='".$value."'>";
}
