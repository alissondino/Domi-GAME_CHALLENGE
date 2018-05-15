<?php
    require_once("Usuario.php");
    class UserBuilder{

        private $user;
        private $pass;
        private $name;
        private $email;
        private $date_birth;
        private $lvl_user;
    

        public function comUser($p_user){
            $this ->user = $p_user;
        }

        public function comPass($p_pass){
            $this ->pass = $p_pass;
        }
        public function comName($p_name){
            $this ->name = $p_name;
        }
        public function comEmail($p_email){
            $this ->email = $p_email;
        }
        public function comDateBirth($p_date_birth){
            $this ->date_birth = $p_date_birth;
        }
        public function comLvlUser($p_lvl_user){
            $this ->lvl_user = $p_lvl_user;
        }
        
        

        public function build(){
            $usuarioNovo = new Usuario($this->user,$this->pass,$this->name,$this->email,$this->date_birth,$this->lvl_user);
            return $usuarioNovo;
        }



    }



?>