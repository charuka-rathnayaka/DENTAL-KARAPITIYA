<?php
class Patient{
    protected string $Firstname;
    protected $Lastname;
    protected $Email;
    protected $Birthday;
    protected $Gender;
    protected string $Username;
    protected $Password;

    function __construct($firstname,$lastname,$email,$birthday,$gender,$username,$password){
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Email=$email;
        $this->Birthday=$birthday;
        $this->Gender=$gender;
        $this->Username=$username;
        $this->Passsword=$password;
    }
    function get_username(){
        return $this->Username;
    }

}

class Dental_Staff{
    protected string $Username;
    protected string $Password;
    function __construct($username,$password){
        $this->Username=$username;
        $this->Passsword=$password;
    }
    function get_username(){
        return $this->Username;
    }
}

class Doctor extends Dental_staff{
    protected String $Reg_num;
    protected string $Firstname;
    protected string $Lastname;
    protected string $Email;
    protected string $Birthday;
    protected string $Gender;
    protected string $Qualifications;
    function __construct($reg_num,$firstname,$lastname,$email,$birthday,$gender,$qualifications,$username,$password){
        $this->Reg_num=$reg_num;
        $this->Firstname=$firstname;
        $this->Lastname=$lastname;
        $this->Email=$email;
        $this->Birthday=$birthday;
        $this->Gender=$gender;
        $this->Qualifications=$qualifications;
        $this->Username=$username;
        $this->Passsword=$password;

    }
    function get_username(){
        return $this->Username;
    }

}
class Admin extends Dental_staff{
    

    
}

class Staff extends Dental_staff{

}
?>