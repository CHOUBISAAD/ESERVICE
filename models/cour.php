<?php
require_once 'Database.php';
class Cour
{
    private $db;
    private $link;

    public function getcour($niveau)
    {
            $this->db= new Database; 
            $this->db->query('SELECT * FROM cours WHERE filiere_niveau = :nv');
            $this->db->bind(':nv',$niveau);  
            $row= $this->db->resultset();

            if(isset($row))
                return $row;
            else
                return false;
    }


    
}