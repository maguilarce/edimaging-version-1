<?php
session_start();
if($_SESSION['logged'])
{    
  

require_once('connection.php');
$iduser=$_SESSION['user_id'];

$query = "SELECT location_name FROM location";
$res = mysql_query($query,$dbh);

$query2 = "SELECT * FROM ucust WHERE c_login='$iduser'";
$res2 =  mysql_query($query2);
$row2 = mysql_fetch_array($res2);
$cus_name = $row2['f_name']." ".$row2['l_name'];
$c_email = $row2['c_email'];
$phone = $row2['c_phone'];
$idcustom = $row2['idcustomer'];

$query3 = "SELECT * FROM customer WHERE idcustomer='$idcustom'";
$res3 =  mysql_query($query3);
$row3 = mysql_fetch_array($res3);
$com_name = $row3['customer_name'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Us</title>
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
       <header class="header">
            <a href="#" class="logo">                
                <img height="30" width="80" src="img/edi_logo.png" draggable="false">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $iduser; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                        <li>
                                            <a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
         <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="img/26115.jpg" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p>Hello, <?php echo $iduser; ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="dashboard2.php">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contactus.php">
                                        <i class="fa fa-gavel"></i> <span>New Ticket</span>
                                    </a>
                                </li>

                               
<!--
                                <li>
                                    <a href="simple.html">
                                        <i class="fa fa-glass"></i> <span>Simple tables</span>
                                    </a>
                                </li>
-->
                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>    <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                    
                    <div class="row">
                        <div class="col-md-10">
                            <section class="panel">
                              <header class="panel-heading">
                                 Contact Us
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="post">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Company name</label>
                                          <div class="col-sm-10">
                                              <input name="company_name" type="text" readonly="true" value="<?php echo $com_name; ?>" class="form-control">
                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Full Name</label>
                                          <div class="col-sm-10">
                                              <input name="full_name" type="text" readonly="true" value="<?php echo $cus_name; ?>" class="form-control">
                                              
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Email address</label>
                                          <div class="col-sm-10">
                                              <input name="email" type="text" readonly="true" value="<?php echo $c_email; ?>" class="form-control round-input">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Phone number</label>
                                          <div class="col-sm-10">
                                              <input name="phone" class="form-control"  type="text" value="<?php echo $phone; ?>">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Location</label>
                                          <div class="col-sm-10">
                                              <input name="location" type="text" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                          <div class="col-sm-10">
                                              <input name="description" type="text" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Shipping address</label>
                                          <div class="col-sm-10">
                                              <input name="shipping_address" type="text" class="form-control" >
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Product</label>
                                          <div class="col-sm-10">
                                              <input name="product" type="text" class="form-control" >
                                          </div>
                                      </div>
                                        <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button formaction="submit_ticket.php" type="submit" class="btn btn-danger">Submit</button>
                                          </div>
                                      </div>
          
                                  </form>
                              </div>
                            </section>
     
                        </div>
                    </div>

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
        
        <?php } 
else{ 
header("Location: login.php"); } ?> 

    </body>
</html>
