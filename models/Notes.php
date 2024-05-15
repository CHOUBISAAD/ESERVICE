<?php
require_once 'Database.php';

class Notes{
    private $nom_module;
    // private $id_etud;
    private $valeur;


    private $db;


    public function getnotes($id_etud)
{
    $this->db = new Database;
    $this->db->query('SELECT nom_module,valeur FROM notes WHERE id_etud = id_etud');
 // $this->db->bind(':id',$id_etud);
    $results = $this->db->resultset();

    if ($results) {
        return $results;
    } else {
         echo'no results';
    }
}

    public function insert_notes($nom_module,$filiere,$id_etud,$valeur,$table_name)
    {
        $this->db=new Database;
        $this->db->query("INSERT INTO $table_name (filiere,nom_module,id_etud,note) VALUES ('$filiere','$nom_module','$id_etud','$valeur')");
        $verifier= $this->db->execute();
        if($verifier)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function valider_notes($module)
    {
        $this->db=new Database;
        $this->db->query("INSERT INTO notes 
        SELECT *
        FROM note_enregistre
        WHERE nom_module = '$module' ");
        $verifier= $this->db->execute();
        if($verifier)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function verify_existence($nom_module)
    {
        $this->db=new Database;
        $this->db->query("SELECT * from ; WHERE nom_module= '$nom_module'");
        $verifi= $this->db->single();
        if($verifi)
        {
            return true;
        }
        else
        {
            return false;
        }
    } 

    public function modifie_grades($id_etud,$nv_note,$nom_module)
    {
        $this->db=new Database;
        $this->db->query("UPDATE note_enregistre SET note = '$nv_note' WHERE id_etud = '$id_etud' AND nom_module = '$nom_module' ");
        $verify= $this->db->execute();
        if($verify)
        {
            return true;
        }
        else
        {
            return false;
        }

    }


}