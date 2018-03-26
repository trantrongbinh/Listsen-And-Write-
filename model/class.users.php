<?php
class users extends database {
    private $__id;
    private $__name;
    private $__quyen;
    private $__email;
    private $__password;

    function __construct(){
        $this->connect();
    }

    public function getId(){
        return $this->__id;
    }

    public function setId($id){
        $this->__id = $id;
    }

    public function getName(){
        return $this->__name;
    }

    public function setName($name){
        $this->__name = $name;
    }

    public function getEmail(){
        return $this->__email;
    }

    public function setEmail($email){
        $this->__email = $email;
    }

    public function getQuyen(){
        return $this->__quyen;
    }

    public function setQuyen($quyen){
        $this->__quyen = $quyen;
    }


    public function getPassword(){
        return $this->__password;
    }

    public function setPassword($password){
        $this->__password = $password;
    }

    public function themUser(){
        try{
            $sql = "INSERT INTO users VALUES (N'".$this->getId()."',N'".$this->getName()."',N'".$this->getEmail()."',N'".$this->getQuyen()."',N'".$this->getPassword()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli__sql__exception $e){
            return false;
        }
    }

    public function suaUser($id){
        try{
            $sql = "UPDATE users SET name = N'".$this->getName()."',email = N'".$this->getEmail()."',quyen = N'".$this->getQuyen()."',password = N'".$this->getPassword()."' WHERE id = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli__sql__exception $e){
            return false;
        }
    }

    public function layUser(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }

    public function layMotUser($id){
        $sql = "SELECT * FROM users where id = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }

    public function xoaUser($id){
        try{
            $sql = "DELETE FROM users WHERE id = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli__sql__exception $e){
            return false;
        }
    }

    public function checkUser($id){
        $ketqua = $this->layMotUser($id);
        if($ketqua){
            return true;
        }
        else {
            return false;
        }
    }

    public function checkLoginUser($id,$pass){
        $sql = "SELECT * FROM users where id='$id' AND password='$pass' ";
        $this-> query($sql);
        $ketqua = $this->fetch();
        if($ketqua){
            return true;
        }
        else {
            return false;
        }
    }
}
?>
?>