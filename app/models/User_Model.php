<?php

class User_Model extends Model{
    
    /**
     * Check email exists or not function
     *
     * @param string $email
     * @return boolean
     */
    public function findUserByEmail( string $email ): bool{
        $this->db->query( "SELECT * FROM users WHERE email = :email" );
        $this->db->bind( ':email', $email );

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}