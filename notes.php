<!-- top bar -->
 <?php require_once 'side_top/topbar.php'?>
<!-- end of top bar -->

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
                                            <th>Notes</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
            <?php  if(isset($_SESSION["notes"]))
            foreach ($_SESSION["notes"] as $note): ?>
                <tr>
                    <td><?php echo $note->nom_module; ?></td>
                    <td><?php echo $note->valeur; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Module</th>
                                        <th>Notes</th>
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

       <!-- footer  -->
       <?php require_once 'side_top/footer.php'?>
       <!-- end footer  -->