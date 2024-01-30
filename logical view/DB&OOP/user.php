<?php 

class User{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;

    function __construct($id,$name,$email,$password,$role){
         $this->id=$id;
         $this->name=$name;
         $this->email=$email;
         $this->password=$password;
         $this->role=$role;
    }


    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getRole(){
        return $this->role;
    }
}


?>