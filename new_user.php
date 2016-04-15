<?php
session_start();
if($_SESSION['logged'])
{    

require_once('connection.php');
$iduser=$_SESSION['user_id'];

$admin="SELECT * FROM administrator";
$res2= mysql_query($admin);

$customers = "SELECT * FROM ucust";
$res3= mysql_query($customers);

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
                                    <a href="dashboard.php">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tickets.php">
                                        <i class="fa fa-gavel"></i> <span>Tickets</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="new_user.php">
                                        <i class="fa fa-globe"></i> <span>Users</span>
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
                    </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
          <div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Users
                                </header>
                                <div class="panel-body table-responsive">
                                <table class="table table-hover">   
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Login</th>
                                      <th>Type</th>
                                      <th>Action</th>
                                      <!-- <th>Price</th> -->
                                                                           
                                  </tr>
                              </thead>
                              <tbody>
                              
                                   <?php 
                                   while($row2 = mysql_fetch_array($res2)){
                                        $num2 = $row2['admin_login'];
                                        $num3 = $row2['idadministrator'];
                                        echo "<tr><td>".$num3."</td><td>".$num2." </td>   
                                     <td><span class='pull-center label label-danger inline m-t-15'>Admin</span></td> 
                                     <td><form action='user_view.php' method='post'> 
                                    <button class='btn btn-primary btn-sm btn-info' type='submit'>
                                     <i class='fa fa-view'></i>view</button>
                                     <input type='hidden' name='iduser' value='".$num3."'></td>
                                  </form>";
                                   } ?>
                              </tbody></table>
                                    
                                </ul>
                                <div class="panel-footer bg-white">
                                        
                                    
                                </div>
                            </div>
                        </div>
                        
              </div>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      <div class="col-md-8">
                          <section class="panel">
                              <header class="panel-heading">
                                  ADD NEW USER INFO 
                              </header>
                              <div class="panel-body">
                                  <form action="add_user.php" method="post">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Email address</label>
                                          <input type="email" class="form-control" name="email" placeholder="Enter email">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Login</label>
                                          <input type="text" class="form-control" name="login" placeholder="Enter Login">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">Password</label>
                                          <input type="password" class="form-control" name="Password1" placeholder="Password">
                                          <p class="help-block">Re-Enter Password.</p>
                                          <input type="password" class="form-control" name="Password2" placeholder="Re-Type Password">
                                      </div>
                                      <button type="submit" class="btn btn-info">Add</button>
                                  </form>

                              </div>
                          </section>
                      </div> </div>
                        </section>
                        <div class="col-md-10">
                           <div class="panel">
                                <header class="panel-heading">
                                    Customers
                                </header>
                                <div class="panel-body table-responsive">
                                <table class="table table-hover">   
                                  <thead>
                                    <tr>
                                      <th>Login</th>
                                      <th>Company</th>
                                      <th>E-mail</th>
                                      <th>Name</th>
                                      <th>Action</th>
                                      <!-- <th>Price</th> -->
                                                                           
                                  </tr>
                              </thead>
                              <tbody>
                              
                                   <?php 
                                   while($row3 = mysql_fetch_array($res3)){
                                        $log = $row3['c_login'];
                                        $em = $row3['c_email'];
                                        $idcustom = $row3['idcustomer'];
                                        $name = $row3['f_name']." ".$row3['l_name'];
                                        $sql4="SELECT * FROM customer WHERE idcustomer='$idcustom'";
                                        $res4= mysql_query($sql4);
                                        $row4 = mysql_fetch_array($res4);
                                        $comp = $row4['customer_name'];
                                        echo "<tr><td>".$log."</td><td>".$comp." </td>   
                                     <td>".$em."</td>
                                     <td>".$name."</td>
                                     <td><form action='customer_view.php' method='post'> 
                                    <button class='btn btn-primary btn-sm btn-info' type='submit'>
                                     <i class='fa fa-view'></i>view</button>
                                     <input type='hidden' name='idcust' value='".$log."'></td>
                                  </form>";
                                   } ?>
                              </tbody></table>
                                    
                                </ul>
                                <div class="panel-footer bg-white">
                                        
                                    
                                </div>
                            </div>
                        </div>
                        
                        </div></section>
                            
                        </div>
                        

                    
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
        
        <?php } 
else{ 
header("Location: login.php"); } ?> 

    </body>
</html>
