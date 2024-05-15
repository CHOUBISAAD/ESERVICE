<?php

function router($role)
{
    
    switch ($role)
    {
        case 'etud':
            header("location: ../blank.php");
            break; 
        case 'prof':
            header("location:../viewprof.php");
            break;
    }

}