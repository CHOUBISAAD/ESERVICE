<!-- begin top bar  -->
<?php  require_once 'side_top/topbar.php'?>
<!-- end top bar  -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Welcome To Your Space </h1>

                    <!-- les cartes  -->

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Afichage Des Notes</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cours card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cours</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-book-open-reader" style="font-size: 2rem; color: #dddfeb !important;"></i>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Emploi du temp -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Emploi du temp
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <!-- scolaite contact -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               <a href="scolaritecontact.php" style="text-decoration: none; color:#f6c23e ">  contact scolarite </a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>


                </div>
                <!-- /.container-fluid -->

                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                </div>
                                <div class="card-body">

                                <!-- notification -->
                                <div class="cards">
                                          <div class="card red">
                                                 <p class="tip">Hover Me</p>
                                                 <p class="second-text">Lorem Ipsum</p>
                                           </div>
                                            <div class="card blue">
                                                <p class="tip">Hover Me</p>
                                                <p class="second-text">Lorem Ipsum</p>
                                            </div>
                                            <div class="card green">
                                                <p class="tip">Hover Me</p>
                                                <p class="second-text">Lorem Ipsum</p>
                                            </div>
                                </div>



                <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    
                                    
                                </div>
                            </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php  require_once 'side_top/footer.php'?>

            <!-- end footer  -->