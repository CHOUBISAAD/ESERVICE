<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'e-service';

    private $dbh;
    private $stmt;
    private $error;



    public function __construct()
    {
        //set DNS 
        $dns='myslq:host=localhost;dbname=e-service';
        $options = array(
            //let us check the existent of an PDO connection before creating another
                PDO::ATTR_PERSISTENT => true,
                //to handl errors in PDO 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh=new PDO('mysql:host=localhost;dbname=e-service','root','');
        }catch(PDOException $e)
        {
            $this->error=$e->getMessage();
            echo'erreur lors de la connexion a DB';
            echo $this->error;
        }
    }

    //prepare statment with query
    public function query($sql)
    {
        $this->stmt= $this->dbh->prepare($sql);
    }

    //bind values to prepare statment using named parameters
    public function bind($param,$value,$type=null)
    {
        if(is_null($type))
        {
            switch(true)
            {
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
                   $type=PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }

    //to return multiple result (array)

    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //single record 
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //get row count 
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

}

