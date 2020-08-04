<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>STIS HK | PMB</title>

    <base <?php echo "href='".MAIN_URL."'"; ?>>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
    <link href="assets/img/icon-stis.png" rel="icon" />
</head>
<body>
    <?php
    
    $camaba = new database;
    
    $username = $_SESSION['username'];
    $hasil = $camaba->getDb()->query("SELECT * FROM data_calon_mhs WHERE username = '$username'");
    $data = $hasil->fetchAll();
    $rowCount = count($data);
    
    if ($rowCount == 1) {
    	foreach ($data as $row) {
    		# code...
    		$no_pendaftaran = $row['no_pendaftaran'];
    		$status = $row['status'];
    	}
    } else {
    	$status = 2;
    }
    
    ?>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">STIS HK | PMB</a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo "Hai, ".$_SESSION['username']; ?>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <?php
                        if ($status == 2) {
                            echo '<li>';
                            echo '<a href="index.php?hal=form"><i class="fa fa-desktop "></i>Form Pendaftaran</a>';
                            echo '</li>';
                        } else {
                            echo '';
                        }
                        
                        
                        if ($status == 0 || $status == 1) {
                            echo '<li>';
                            echo '<a href="index.php?hal=tampil-data"><i class="fa fa-edit "></i>Detail Data Pribadi</a>';
                            echo '</li>';
                        } else {
                            echo '';
                        }
                    ?>
                    <!--<li>
                        <a href="index.php?hal=tampil-data"><i class="fa fa-edit "></i>Detail Data Pribadi</a>
                    </li>-->
                    <li>
                        <a href="index.php?hal=form-upload"><i class="fa fa-flash "></i>Unggah Berkas</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-in "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php require ($content); ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="modal fade" id="loginPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form role="form" method="post" enctype="multipart/form-data" action="config.php">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-info">
                                    <div class="form-group">
                                        <label>Masukkan Email</label>
                                        <input class="form-control" type="text" name="username">
                                        </div>
                                    <div class="form-group">
                                        <label>Masukkan Password</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/bootstrap-fileupload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
