<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Notes.php';
require_once '../models/User.php';


class Etudiant
{
    private $id_etud;
    private $email;
    private $password;
    private $nom;
    private $prenom;

    public function __construct($id)
    {
        $this->id_etud= $id;
    }

    public function showNotes()
    {
        $note = new Notes;
        $note_returne =$note->getnotes($this->id_etud);
         
        if(isset($note_returne))
        {
            $_SESSION['notes']= $note_returne;
            header("location:../notes.php");
            
        }
        else{
            echo 'notes are not found';
        }
    }


}

if(isset($_GET['action']))
{
    if($_GET['action']=='show')
    $etud= new Etudiant($_SESSION["iduser"]);
     $notes = $etud->showNotes();

}