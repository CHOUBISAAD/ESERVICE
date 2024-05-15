<?php
require_once 'Database.php';

class Modules
{

    private $db;

    public function get_modules($id_prof)
    {
            $this->db= new Database;
            $this->db->query("SELECT * FROM module WHERE id_prof = '$id_prof' ");
            $results=$this->db->resultset();

            if($results){
                return $results;
            } else {
                 echo'no results';
            }
    }

}