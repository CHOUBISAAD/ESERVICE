<?php  require_once 'side_top/top_prof.php' ;?>

<!-- contenu  -->

<?php
if (isset($_GET['filieres_modules'])) {
    $filieres_modules = $_GET['filieres_modules'];
    
?>
<form  enctype="multipart/form-data" class="mt-3 p-3 border rounded shadow-sm" action="controllers/Prof.php" method="post">
    <div class="mb-3">
        <label for="upload" class="form-label">Sélectionnez une paire 'filière'-'module' :</label>
        <select class="form-select" name="upload" id="upload" aria-label="Sélectionnez une paire 'filière'-'module'">
            <?php foreach ($filieres_modules as $row): ?>
                <option value="<?php echo $row['nom_filiere'] . '-' . $row['nom_module']; ?>">
                    <?php echo $row['nom_filiere'] . ' - ' . $row['nom_module']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="nom_module">Enter module name</label>
        <input type="text" name="nom_module" required>
        <input type="file" name="fichier" required>
       
    </div>
    <button type="submit" name="go" class="btn btn-primary">Sélectionner</button>
</form>
    
<?php } ?>





<?php  require_once 'side_top/footer_prof.php' ;?>