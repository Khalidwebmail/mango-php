<?php

class User_Model extends Model{
    
    /**
     * Undocumented function
     *
     * @param array $data
     * @return bool
     */
    public function insert( array $data ): bool{
        $this->db->query('INSERT INTO users ( name, email, password ) VALUES(:name, :email, :password )' );
        // Bind values
        $this->db->bind( ':name', $data[ 'name' ] );
        $this->db->bind( ':email', $data[ 'email' ] );
        $this->db->bind( ':password', $data[ 'password' ] );
  
        // Execute
        if( $this->db->execute() ){
          return true;
        } else {
          return false;
        }
      }

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