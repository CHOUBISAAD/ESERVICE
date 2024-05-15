<?php require_once 'side_top/top_prof.php'; ?>

<!-- the main content  -->

<?php
if (isset($_GET['filieres_modules'])) {
    $filieres_modules = $_GET['filieres_modules'];
    
?>
<form class="mt-3 p-3 border rounded shadow-sm" action="controllers/Prof.php" method="post">
    <div class="mb-3">
        <label for="select" class="form-label">Sélectionnez une paire 'filière'-'module' :</label>
        <select class="form-select" name="select" id="select" aria-label="Sélectionnez une paire 'filière'-'module'">
            <?php foreach ($filieres_modules as $row): ?>
                <option value="<?php echo $row['nom_filiere'] . '-' . $row['nom_module']; ?>">
                    <?php echo $row['nom_filiere'] . ' - ' . $row['nom_module']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
    </div>
    <button type="submit" class="btn btn-primary">Sélectionner</button>
</form>
<!-- la fin de if  -->
<?php } ?>


<style>
        /* Remove default styles */
        input[type=number] {
            border: none;
            padding: 5px;
            font-size: 16px;
            background-color: white;
            border-radius: 5px;
            box-shadow: inset 0 2px 2px rgba(0,0,0,0.1);
            width: 100px; /* Set your desired width */
        }

        /* Optional: Style when input is focused */
        input[type=number]:focus {
            outline: none; /* Remove the default focus outline */
            box-shadow: 0 0 5px white; /* Add a custom focus style */
        }
</style>

<!-- table des notes des etudiants -->
<?php if(isset($_GET['students'])): 

?>
<?php if(isset($_GET['return']) && $_GET['return']=='check'){
?>
<div class="alert alert-success" role="alert">
  L'enregistrement a été effectué avec succès!
</div>
<?php } ?>

<?php if(isset($_GET['return']) && $_GET['return']=='no_check'){
?>

<div class="alert alert-danger" role="alert">
  L'enregistrement n'a pas été effectué. Veuillez réessayer.
</div>

<?php } ?>

<?php if(isset($_GET['return']) && $_GET['return']=='checkv'){
?>
<div class="alert alert-success" role="alert">
  validation a été effectué avec succès!
</div>
<?php } ?>

<?php if(isset($_GET['return']) && $_GET['return']=='no_checkv'){
?>

<div class="alert alert-danger" role="alert">
  validation n'a pas été effectué. Veuillez réessayer.
</div>

<?php } ?>

    

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Upload Grades : <?= $_GET["filiere"] . " - " . $_GET['module'] ?></h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php  if($_GET['module']) 
                    $module=$_GET['module'];
                else
                echo'module not found';
            ?>
            <form action="controllers/Prof.php?module=<?=$module?>&filiere=<?=$_GET["filiere"]?>" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID-ETUDIANT</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>NOTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_GET['students'] as $student): ?>
                            <tr>
                                <td><?= $student['IDETUD']; ?> </td>
                                <td><?= $student['NOM']; ?>  </td>
                                <td><?= $student['PRENOM']; ?> </td>
                                <td><input type="number" name="notes[<?= $student['IDETUD'];?>]" placeholder="<?php if(isset($student['note'])) echo $student['note']; ?>"> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID-ETUDIANT</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>NOTE</th>
                        </tr>
                    </tfoot>
                </table>
                <input type="submit" class="btn btn-primary" name="Enregistrer" value="Enregistrer">
                <input type="submit" class="btn btn-success" name="Valider" value="Valider">
            </form>
        </div>
    </div>
</div>

<?php endif; ?>






