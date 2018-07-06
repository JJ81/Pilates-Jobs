<?php

namespace Msg\Database;

use \PDO;
use \PDOException;

require_once __dir__ . '/db_info.php';

class DBConnection
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $port = DB_PORT;
    private $charset = DB_CHARSET;

    private $dbh;
    private $error;
    private $stmt;



    public function __construct()
    {
        // Set DSN
        $dsn =  'mysql:host=' . $this->host .
                ';dbname=' . $this->dbname .
                ';port=' .$this->port .
                ';charset=' . $this->charset;

        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } // Catch any errors
        catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error = $e->getMessage();
        }

    }

    public function getDBINS(){
        return $this->dbh;
    }

    /**
     * @param $query
     * @return array or json TODO json으로 리턴을 해야 하는 경우도 별도로 처리할 것.
     */
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $query
     * @param $value
     * @return string
     */
    public function insert($query, $value){
        $stmt = $this->dbh->prepare( $query );
        if($value !== null){
            $stmt->execute( $value );
        }else{
            $stmt->execute();
        }

        $insertId = $this->dbh->lastInsertId();
        return $insertId;
    }

    /**
     * @param $query
     * @return int
     */
    public function update($query){
        $result = $this->dbh->exec($query);
        return $result;
    }

    /**
     * @param $query
     * @param $value
     * @return bool|null
     */
    public function delete($query, $value){
        $stmt=$this->dbh->prepare( $query );
        $result=null;
        if($value != null){
            $result=$stmt->execute($value);
        }else{
            $result=$stmt->execute();
        }
        return $result;
    }

    public function testMethod(){
        return 'good';
    }
}
