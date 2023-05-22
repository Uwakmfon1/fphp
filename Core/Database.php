<?php
namespace Core;
use PDO;            //puts a '/' in front of all pdo class 

class Database{
    public $connection;
    public $statement;

    public function __construct($config, $username='root', $password='')
    {
        $dsn = "mysql:" . (http_build_query($config,"",';')); 
        $this->connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]);
    }


    public function query($query,$params=[])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;    
    }


    public function find()
    {
        return $this->statement->fetch();
    }
    
    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();
        

        if(! $result){
            abort();
        }else{
            return $result;
        }
    }
    public function fetch(){
        return $this->statement->fetch();
    }
     
    public function fetchAll(){
        return $this->statement->fetchAll();
    }
};