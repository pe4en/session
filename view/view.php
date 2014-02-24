<?php
/**
 * Created by PhpStorm.
 * User: pe4en
 * Date: 2/24/14
 * Time: 3:03 PM
 */
class connection{

    private $host = 'localhost';
    private $dbname = 'user';
    private $username = 'root';
    private $password ='';
    public $con = '';
    function __construct() {
        $this->connect();
    }
    function connect(){

        try{

            $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo 'error with connection to database';
            file_put_contents('connection.errors.txt', $e->getMessage().PHP_EOL,FILE_APPEND);

        }
    }
}
class Database {

    protected  $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

    public function getAllUser(){

        $user = $this->con->prepare("SELECT * FROM user");
        $user->execute();

        $results = $user->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

}