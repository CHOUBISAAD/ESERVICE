<?php require_once 'side_top/top_prof.php'; ?>

<!-- the main content  -->

<?php
if (isset($_GET['filieres_modules'])) {
    $filieres_modules = $_GET['filieres_modules'];
    
?>
<form class="mt-3 p-3 border rounded shadow-sm" action="controllers/Prof.php" method="post">
    <div class="mb-3">
        <label for="select" class="form-label">Sélectionnez une paire 'filiere'-'module' :</label>
        <select class="form-select border rounded " name="select" id="select">
            <?php foreach ($filieres_modules as $row): ?>
                <option class="text-secondary" value="<?php echo $row['nom_filiere'] . '-' . $row['nom_module']; ?>">
                    <?php echo $row['nom_filiere'] . ' - ' . $row['nom_module']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Sélectionner</button>
</form>


<?php

} ?>