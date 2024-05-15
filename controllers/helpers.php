<?php
require 'Etudiant.php';
function redirect($string)
{
    header($string);
    exit();
}

function affichernotes($notes)
{
     foreach ($notes as $note): 
       echo' <tr>
            <td><?= $note->nom_module ?></td>
            <td><?= $note->valeur ?></td>
        </tr>';
     endforeach; 
}