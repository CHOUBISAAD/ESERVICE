<?php
require_once 'Database.php' ;


class User
{
    private $db;

    public function __construct()
    {
        $this->db= new Database;
    }

    // find user

    public function finduser($email)
    {
        $this->db->query('SELECT * FROM login WHERE email = :mail');
        $this->db->bind(':mail',$email);

        $row= $this->db->single();

        if($this->db->rowCount()>0)
        {
             return $row;
        }else{
            return false;
        }
    }

    public function login($email,$password)
    {
        $row = $this->finduser($email);

        if($row == false) 
        {
            echo'incorrecte email';
            header("location: ../index.php?action=WEM");
        }
        if($row->password == $password){
            
           return $row;

        }
        else
    header("location: ../index.php?action=WPW");
    
    }

    public function createsession($user)
    {
        $_SESSION['idstd']=$user->idstd;
        $_SESSION['email']=$user->email;
        $_SESSION['password']=$user->password;
    }

    public function getniveau($id_etud)
    {
        $this->db->query('SELECT filiere FROM etudiant WHERE IDETUD= :ID');
        $this->db->bind(':ID',$id_etud);

        $row= $this->db->single();

        if($this->db->rowCount()>0)
        {
             return $row->filiere;

        }else{
            return false;
        }
    }
}