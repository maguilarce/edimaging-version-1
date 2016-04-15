<?php
session_start();

require_once('connection.php');
//$iduser=$_SESSION['user_id'];
//$admin="SELECT * FROM administrator";
//$res2= mysql_query($admin);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Director | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
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
                                <span>Guest<i class="caret"></i></span>
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
                    
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
   

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      <div class="col-md-8">
                          <section class="panel">
                              <header class="panel-heading">
                                  NEW CUSTOMER INFO 
                              </header>
                              <div class="panel-body">
                                  <form action="add_customer.php" method="post">
                                      
                                      <div class="form-group">
                                          <label for="exampleInputText1">Login</label>
                                          <input type="text" class="form-control" name="login" placeholder="Enter Login">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">Password</label>
                                          <input type="password" class="form-control" name="Password1" placeholder="Password">
                                          <p class="help-block">Re-Enter Password.</p>
                                          <input type="password" class="form-control" name="Password2" placeholder="Re-Type Password">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Email address</label>
                                          <input type="email" class="form-control" name="email" placeholder="Enter email">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputText1">First Name</label>
                                          <input type="text" class="form-control" name="f_name" placeholder="Enter First Name">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputText1">Last Name</label>
                                          <input type="text" class="form-control" name="l_name" placeholder="Enter Last Name">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputText1">Phone</label>
                                          <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputText1">Company Name</label>
                                          <input type="text" class="form-control" name="company" placeholder="Enter Name of Company">
                                      </div>
                                      <div class="g-recaptcha" data-sitekey="6LfBQh0TAAAAAGKfb-HjA64nG_GQq7Yc2QkU7gkB"></div>
                                      <button type="submit" class="btn btn-info">Add</button>
                                  </form>

                              </div>
                          </section>
                      </div>
                      
                    </div><!--row1-->
                    
                </section><!-- /.content -->
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
