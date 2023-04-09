<?php

function senitizeData( $data ){
    htmlentities( $data );
    trim( $data );
    strip_tags( $data );
    addslashes( $data );
    return $data;
}