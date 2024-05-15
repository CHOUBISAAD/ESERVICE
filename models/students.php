<?php
require_once 'Database.php';


class students
{
    private $id;
    private $db;
    
    public function get_students($filiere,$nom_module)
    {
        $this->db= new Database;
        $this->db->query("SELECT etudiant.IDETUD, etudiant.NOM, etudiant.PRENOM, note_enregistre.note
        FROM etudiant
        LEFT JOIN note_enregistre ON etudiant.IDETUD = note_enregistre.id_etud 
        AND note_enregistre.nom_module = '$nom_module'
        WHERE etudiant.filiere = '$filiere';        
             ");
        $sutdents=$this->db->resultset();
        if($sutdents)
        {
            return $sutdents;
        }
        else
        return false;
    }

}