 
<?php
require '../models/User.php';
require 'helpers.php';
require_once 'router.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class Users{
    private $userModel;

    public function __construct()
    {
        $this->userModel= new User;
    }

    public function login()
    {
        //sanitize the data

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //init data 
        $data=[
            'email'=> trim($_POST['email']),
            'password' => trim($_POST['password'])
           // 'role'=> trim($_POST['role'])
        ];

        if($this->userModel->finduser($data['email']))
        { 
            $loggedin= $this->userModel->login($data['email'],$data['password']);
            if($loggedin){ 
            $_SESSION['iduser'] = $loggedin->ID;
            $id = $loggedin->ID;
            $_SESSION['NOM'] = $loggedin->nom;
            $_SESSION['PRENOM'] = $loggedin->prenom;
            if($loggedin->role == 'etud')
            {
                $_SESSION['niveau_etud'] = $this->userModel->getniveau($id);
            }
            router($loggedin->role);
            }
        }else{
        header("location: ../index.php?action=WEM");
        }

    }



}

$init = new Users;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $init->login();
}


