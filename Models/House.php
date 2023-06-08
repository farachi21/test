<?php


class House
{
    public $servername = "localhost";
    public $databasename ="location_de_maision";
    public $username= "root";
    public $password ="";

    private  PDO $pdo;

    public function __construct() {  
        $this->pdo = new PDO("mysql:host=" . $this->servername . "; dbname=" .$this->databasename, $this->username, $this->password);
    }  

    

    // CRUD OPERATIONS
    public function create(array $data)
    {

    }

    public function read(int $id)
    {

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}