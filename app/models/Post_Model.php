<?php

class Post_Model extends Model{
    public function getPosts(){
        $this->db->query( "SELECT * FROM posts" );
        return $this->db->resultSet();
    }
}