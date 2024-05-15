<?php
require_once '../models/cour.php';

class Cours
{
    private $Cour;
    private $niveau;

    public function __construct($niveau)
    {
        $this->niveau = $niveau;
        
    }

    public function affiche_cour()
    {
        $cour = new Cour;
        $this->Cour = $cour->getcour($this->niveau);

        if(isset($this->Cour) && $this->Cour){
            session_start();
            $_SESSION['cours'] = $this->Cour;
            
           // $courses=$_SESSION['cours'];
           //var_dump($_SESSION['cours']);
            header("location:../viewcour.php?");
        }
       else
        echo'cour non recuperer';
    }
    
}

if(isset($_GET['action']))
{
    if($_GET['action'] =='cours'){
     $temp= new Cours($_GET['niveau']);
     $temp->affiche_cour();
    }
    else
    echo 'GET ERROR';
    
  
}