<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;
    private $dsn;
    private $options;

    public function __construct(){
       $this->DbConnection();
    }

    /**
     * Use to connect database
     *
     * @return void
     */
    public function DbConnection(){
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $this->options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->PdoInstance();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function PdoInstance(){
        try{
            $this->dbh = new PDO( $this->dsn, $this->user, $this->pass, $this->options );
        }
        catch( PDOException $e ){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Undocumented function
     *
     * @param $sql
     * @return void
     */
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
  
    
    /**
     * Bind values
     *
     * @param mixed $param
     * @param mixed $value
     * @param mixed $type
     * @return void
     */
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute query function
     *
     * @return void
     */
    public function execute(){
        return $this->stmt->execute();
    }
  
    /**
     * Getting result set as an obj
     *
     * @return Object
     */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get single row
     *
     * @return void
     */
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Count getting row from db
     *
     * @return int
     */
    public function rowCount(): int{
        return $this->stmt->rowCount();
    }
}