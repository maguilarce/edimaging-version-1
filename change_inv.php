<?php

require_once('connection.php');

$idinv = $_POST['invid'];
$dahill = $_POST['dahill'];
$sn=$_POST['sn'];
$model=$_POST['model'];
$cust=$_POST['cust'];
$area=$_POST['area'];
$locat=$_POST['locat'];


$new_admin = $_POST['admin'];

 $query = "UPDATE inventory
              SET dahill_id='$dahill',serial_number='$sn', model='$model', customer='$cust', area='$area', location='$locat'    
              WHERE idinventory='$idinv'";
    
    $retval = mysql_query( $query, $dbh );
    if(! $retval )
    {
     die('Could not get data: ' . mysql_error());
    }
   
  $iduser=$_SESSION['user_id'];
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Item</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
       
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside >
                <!-- sidebar: style can be found in sidebar.less -->
                <img draggable="false" height="100" width="160" src="img/edi.jpg" />
               
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
               
                    <div class="row">
                      
                        
                    
                    <form method="post>"
                        <div class="row">
                            <div class="col-md-10">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Item - Data updated
                                    </header>
                                    <div class="panel-body">
                                        <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Data Updated Successfuly!</strong> You have changed item's info.
                                                    </div>
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button formaction="dashboard.php" type="submit" class="btn btn-danger">Back to Dashboard</button>
                                          </div>
                                    </div>
                                    

                                </section>
                            </div>
                        </div>
                    </form>

                <!-- /.content -->
            </aside><!-- /.right-side -->
            <div class="footer-main">
                <p>Powered by</p>
                <img draggable="false" height="60" width="40" src="img/agloz.jpg" />
                <p><a href="http://www.aglozsoftware.com">www.aglozsoftware.com</a></p>
                <p>&copy 2016</p>
                
            </div>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
    </body>
</html>