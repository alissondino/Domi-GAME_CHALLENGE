<?php


class Usuario{

    //Atributos
    private $user;
    private $pass;
    private $name;
    private $email;
    private $date_birth;
    private $lvl_user;

    function __construct($user,$pass,$name,$email,$date_birth,$lvl_user){
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $name;
        $this->email = $email;
        $this->date_birth = $date_birth;
        $this->lvl_user = $lvl_user;
    }

    

    //Metodos

}


?>