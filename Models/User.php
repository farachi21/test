<?php


class User  
{  
    public $servername = "localhost";
    public $databasename ="location_de_maision";
    public $username= "root";
    public $password ="";

    private  PDO $pdo;

    public function __construct() {  
        $this->pdo = new PDO("mysql:host=" . $this->servername . "; dbname=" .$this->databasename, $this->username, $this->password);
    }  
    

    public function register($trn_date, $name, $username, $email, $pass) {  
        $pass = md5($pass);  
        $checkuser = $this->pdo->query("Select COUNT(*) from users where email='$email'");  
        $result = $checkuser->fetchColumn(); 
        if ($result == 0) {  
            $register = $this->pdo->query("Insert into users (trn_date, name, username, email, password) values ('$trn_date','$name','$username','$email','$pass')") or die(mysql_error());  
            return $register;  
        } else {  
            return false;  
        }  
    }  
  
    public function login($email, $pass) {  
        $pass = md5($pass); 
        $data = $this->pdo
            ->query("Select count(*) as num, id from users where email='$email' and password='$pass'")
            ->fetch(PDO::FETCH_ASSOC); 
        $result = $data['num'];
        if ($result == 1) {  
            $_SESSION['login'] = true;  
            $_SESSION['id'] = $data['id'];  
            return true;  
        } else {  
            return false;  
        }  
    }  
  
    public function selectOne($id) {  
        $result = $this->pdo->query("Select * from users where id='$id'");  
        $row = $result->fetch(PDO::FETCH_ASSOC);  
        return $row; 
    }
    public function update($id, $username, $last, $first, $telephone, $email, $function, $adress, $country, $about){
        $result = $this->pdo->query(" UPDATE users set name = '$last $first', 
                                                        telephone = '$telephone',
                                                        email = '$email',
                                                        adress = '$adress',
                                                        complet = true, 
                                                        function = '$function',
                                                        about = '$about',
                                                        country = '$country',
                                                        username = '$username'
                                        where id = $id ");        
    }  
    public function delet($id) {  
        $this->pdo->query("DELETE from users where id='$id'");  
        header('location:agents.php'); 
    }  
    public function selectAll() {  
        $re = $this->pdo->query("Select * from users where username not in ('admin' , 'ADMIN') ");  
        $ro = $re->fetchAll(PDO::FETCH_ASSOC);  
        return $ro; 
    }  
    public function selectAllName($name) {  
        $re = $this->pdo->query("Select * from users where name like '%$name%' and username != 'admin' ");  
        $ro = $re->fetchAll(PDO::FETCH_ASSOC);  
        return $ro; 
    }  
  
    public function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  
}  
  