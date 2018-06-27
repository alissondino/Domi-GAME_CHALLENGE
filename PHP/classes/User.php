<?php


class User{

    //Atributos
    private $id_user;
    private $name_user;
    private $last_name_user;
    private $birth_date_user;
    private $email_user;
    private $login_user;
    private $password;
    private $last_update;

    

    //Metodos
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getNameUser()
    {
        return $this->name_user;
    }

    /**
     * @return mixed
     */
    public function getLastNameUser()
    {
        return $this->last_name_user;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date_user;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->email_user;
    }

    /**
     * @return mixed
     */
    public function getLoginUser()
    {
        return $this->login_user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }



    /**
     * @param mixed $id_user
     *
     * @return self
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @param mixed $name_user
     *
     * @return self
     */
    public function setNameUser($name_user)
    {
        $this->name_user = $name_user;

        return $this;
    }

    /**
     * @param mixed $last_name_user
     *
     * @return self
     */
    public function setLastNameUser($last_name_user)
    {
        $this->last_name_user = $last_name_user;

        return $this;
    }

    /**
     * @param mixed $date_birth_user
     *
     * @return self
     */
    public function setBirthDateUser($birth_date_user)
    {
        $this->birth_date_user = $birth_date_user;

        return $this;
    }

    /**
     * @param mixed $email_user
     *
     * @return self
     */
    public function setEmailUser($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }

    /**
     * @param mixed $login_user
     *
     * @return self
     */
    public function setLoginUser($login_user)
    {
        $this->login_user = $login_user;

        return $this;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param mixed $last_update
     *
     * @return self
     */
    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;

        return $this;
    }

    //Faz o preenchimentos dos dados - Resolvi criar um  método para isso pois já tinha repetido várias vezes o mesmo trecho
    public function fillData($data){
        $this -> setIdUser($data['id_user']); 
        $this -> setNameUser($data['name_user']); 
        $this -> setLastNameUser($data['last_name_user']); 
        $this -> setBirthDateUser($data['birth_date_user']); 
        $this -> setEmailUser($data['email_user']); 
        $this -> setLoginUser($data['login_user']); 
        $this -> setPassword($data['password_user']); 
        $this -> setLastUpdate($data['last_update']);
    }
    public function loadById($id){
        //Essa função carrega nos atributos do objeto os valores do banco
        $sql = new Sql();
        $results = $sql -> select("SELECT * FROM tb_users WHERE  id_user = :ID",array(
            ":ID"=>$id
        ));

        if (count($results)>0){
            $this->fillData($results[0]);
        }
    }
    //Função para listar todos os usuários de uma tabela
    public static function getList(){
        $sql = new Sql();
        return $sql -> select("SELECT * FROM tb_users ORDER BY name_user;");
    }

    //Função para buscar por um login sem saber exatamente qual é o mesmo usando LIKE
    public static function searchList($login){
        $sql = new Sql();
        return $sql -> select("SELECT * FROM tb_users WHERE login_user LIKE :SEARCH ORDER BY login_user;",array(
            ':SEARCH'=>"%".$login."%"
        ));
    }





    //Função para validar o login de um usuário no sistema,
    public function validateLogin($plogin,$ppassword){
     $sql = new Sql();
     $results = $sql -> select("SELECT * FROM tb_users WHERE  login_user = :LOGIN AND password_user=:PASSWORD",array(
        ":LOGIN"=>$plogin, 
        ":PASSWORD"=>$ppassword
    ));
     if (count($results)>0){
        $this->fillData($results[0]);
    }else{
        throw new Exception("Login e/ou senha Invalidos!");
    }
}

//Função para inserir um novo usuário na tabela tb_users
public function insertUser(){
    $sql = new Sql();

    $results = $sql -> select("CALL sp_users_insert(
        :NAME,:LAST_NAME,:BIRTH_DATE,:EMAIL,
        :LOGIN,:PASSWORD,:LAST_UPDATE)",array(
            ':NAME'=>$this->getNameUser(),
            ':LAST_NAME'=>$this->getLastNameUser(),
            ':BIRTH_DATE'=>$this->getBirthDate(),
            ':EMAIL'=>$this->getEmailUser(),
            ':LOGIN'=>$this->getLoginUser(),
            ':PASSWORD'=>$this->getPassword(),
            ':LAST_UPDATE'=>$this->getLastUpdate()
        ));
    if(count($results)>0){
        $this->fillData($results[0]);
    }
}

public function __construct($p_name_user="", $p_last_name_user="",$p_birth_date_user="",$p_email_user="",$p_login_user="",$p_password_user="",$p_last_update=""){
    $this->setNameUser($p_name_user);
    $this->setLastNameUser($p_last_name_user);
    $this->setBirthDateUser($p_birth_date_user);
    $this->setEmailUser($p_email_user);
    $this->setLoginUser($p_login_user);
    $this->setPassword($p_password_user);
    $this->setLastUpdate($p_last_update);

}



    //Função que vai imprimir bonitinho as informações do objeto que foi preenchido em uma string
public function __toString(){
    return json_encode(array(
        "id_user"=>$this->getIdUser(),
        "name_user"=>$this->getNameUser(),
        "last_name_user"=>$this->getLastNameUser(),
        "date_birth_user"=>$this -> getBirthDate(),
        "email_user"=>$this -> getEmailUser(),
        "login_user"=>$this -> getLoginUser(),
        "password_user"=>$this->getPassword(),
        "last_update"=>$this->getLastUpdate()
    ));
}
}


?>