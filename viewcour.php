<?php
require_once 'side_top/topbar.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Affichage des Notes</h1>
<p class="mb-4">Votre Notes .</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Notes Disponible</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Module</th>
                        
                        <th>lien de téléchargement</th>
                        <!-- <th>Telecharger</th> -->
                    </tr>
                </thead>
                
                <tbody>
                <?php  
if(isset($_SESSION['cours'])){
    $cours=$_SESSION['cours'];
    
    foreach ($cours as $cour): ?>
    <tr>
        <td><?php echo $cour->module; ?></td>
        
        <td><a href="<?php echo$cour->lien; ?>" download><?php echo $cour->nom_de_cour; ?></a></td>
    </tr>
<?php endforeach; }
else{
    echo 'cours non récupéré';
}

?>
</tbody>
                <tfoot>
                    <tr>
                    <th>Module</th>
                    
                    <th>lien de téléchargement</th>

                    <!-- <th>Telecharger</th> -->
                    </tr>
                </tfoot>
                <!-- ajouter les donnees là on ajoutant le tr et td   -->
                
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require_once 'side_top/footer.php';
?>