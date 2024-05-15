<?php
require_once '../models/modules.php';
require_once '../models/students.php';
require_once '../models/Notes.php';
session_start();

class Prof 
{
    private $id;
    private $Modules;
    private $students;

    public function show_module($id_prof)
    {
        $modules = new Modules;
        $this->Modules = $modules->get_modules($id_prof);
        if ($this->Modules) {
            $query_params = http_build_query(['filieres_modules' => $this->Modules]);
            header("location: ../add_note.php?$query_params");
            exit; // Important pour arrêter l'exécution du script après la redirection
        }
    }

    public function show_module2($id_prof)
    {
        $modules = new Modules;
        $this->Modules = $modules->get_modules($id_prof);
        if ($this->Modules) {
            $query_params = http_build_query(['filieres_modules' => $this->Modules]);
            header("location: ../view_uploadcours.php?$query_params");
            exit; // Important pour arrêter l'exécution du script après la redirection
        }
    }

    public function show_students($filiere,$module)
    {
        $stud = new students;
        $this->students = $stud->get_students($filiere,$module);
        
        if ($this->students) {
            $students = http_build_query(['students' => $this->students]);
            header("location: ../add_note.php?$students&module=$module&filiere=$filiere");
            exit; // Important pour arrêter l'exécution du script après la redirection
        }
        else
        {
            echo 'no students';
        }
           
    }

    public function enregistrer_notes($V)
{
    //recuperation des donnees necessaire 
    $module= $_GET['module'];
    $filiere= $_GET['filiere'];
    $notes = $_POST['notes'];



    $insert = new Notes;

    if($insert->verify_existence($module)){
        $change=false;
        foreach($notes as $id_etudiant => $note):
          if($note!=NULL){
             $result = $insert->modifie_grades($id_etudiant,$note,$module); 
             $change=true;
          }
        endforeach;
        if(!$change && $V!=1)
        {
            $referer = $_SERVER['HTTP_REFERER'];
            $query_params = http_build_query($_GET); // Conserve les paramètres GET
            header("Location: " . $referer . "?" . $query_params );
            exit;
        }


                //reccuperation des etudiant encore une fois
        $stud = new students;
        $this->students = $stud->get_students($filiere,$module);
             if ($result) {
                if($V!=1){
                    $students = http_build_query(['students' => $this->students]);
                    header("location: ../add_note.php?$students&module=$module&filiere=$filiere&return=check");
                }
         }
        else {
       header("location:../add_note.php?return=no_check");
        }

    }
//enregistrement des donnees pour la premiere fois
    else
    {
    $table_name = 'note_enregistre';

    foreach($notes as $id_etudiant => $note):
         $result = $insert->insert_notes($module, $filiere, $id_etudiant, $note, $table_name);
    endforeach; 

//reccuperation des etudiant encore une fois
    $stud = new students;
    $this->students = $stud->get_students($filiere,$module);

    if($V!=1){

         if ($result) {
            $students = http_build_query(['students' => $this->students]);
            header("location: ../add_note.php?$students&module=$module&filiere=$filiere&return=check");
            exit;
        } else {
            header("location:../add_note.php?return=no_check");
            exit;
            }
    }
    }
}

    public function valider()
    {
        $V=1;
        $this->enregistrer_notes($V);

        $valider= new Notes;
        $module= $_GET['module'];
        $filiere= $_GET['filiere'];

        $result = $valider->valider_notes($module);

        if ($result) {
            $students = http_build_query(['students' => $this->students]);
             header("location: ../add_note.php?$students&module=$module&filiere=$filiere&return=checkv");
         }
        else {
        header("location:../add_note.php?return=no_checkv");
        }

        

    } 
   

} //  the end of  the  class 

//       upload courses 



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'e-service';

// Create a database connection
$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die('Connection error: ' . mysqli_connect_error());
}
    // Retrieve additional form data
    $selectValue = $_POST["upload"]; // Value like "filiere - module"
    $nomModule = $_POST["nom_module"]; // Module name entered in the input

    // Extract filiere and module names from the selectValue
    list($filiere, $module) = explode('-', $selectValue);

    // Check if a file was uploaded without errors
    if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['fichier'];
        $uploadDirectory = '../assets/dossiers/';
        $fileName = basename($uploadedFile['name']);
        $targetFilePath = $uploadDirectory . $fileName;

        // Attempt to move the uploaded file to the desired directory
        if (move_uploaded_file($uploadedFile['tmp_name'], $targetFilePath)) {
            // Sanitize the file path before inserting into the database
            $sanitizedFilePath = mysqli_real_escape_string($connect, $targetFilePath);

            // Insert the file details along with filiere and module names into the database (cours table)
            $insertQuery = "INSERT INTO cours (module,lien,nom_de_cour,filiere_niveau) 
                            VALUES ('$module', '$sanitizedFilePath','$nomModule','$filiere')";

            if (mysqli_query($connect, $insertQuery)) {
                echo "File details inserted into database successfully.";
            } else {
                echo "Error inserting file details into database: " . mysqli_error($connect);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}





//affichage des modules pour l'insertion des notes 
if(isset($_GET["id_prof"]) && isset($_GET['action']) && $_GET['action']=='add_grades')
{
    $prof=new Prof;
    $chaimae= $prof->show_module($_GET["id_prof"]);
   
}

// affichage des modules pour upload des cours  
if(isset($_GET["id_prof"]) && isset($_GET['action']) && $_GET['action']=='up_cours')
{
    $prof=new Prof;
    $chaimae= $prof->show_module2($_GET["id_prof"]);
   
}

// affichage des etudiants basant sur la filiere 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["select"]) )
{
    $selectedPair = $_POST["select"];
    list($selectedFiliere, $selectedModule) = explode('-', $selectedPair);
    echo $selectedFiliere;

    $prof=new Prof;
    $prof->show_students($selectedFiliere,$selectedModule);
}

// enregistrement  des notes 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notes']) && isset($_POST['Enregistrer']) ) {
    
    $var= new Prof;   
    $var->enregistrer_notes(0);

    
} 
// validation des notes

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notes']) && isset($_POST['Valider']) ) {
    
    $var= new Prof;   
    $var->valider();
} 

