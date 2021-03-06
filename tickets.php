<?php
session_start();
if($_SESSION['logged'])
{    


require_once('connection.php');

$iduser=$_SESSION['user_id'];
$query = "SELECT * FROM ticket";
$res=mysql_query($query,$dbh);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Tickets</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

                <script type="text/javascript" language="javascript" src="js/tablefilter.js"></script>         
                <link href="css/tablefilter.css" rel="stylesheet">
                <link href="css/colsVisibility.css" rel="stylesheet">
                <link href="css/filtersVisibility.css" rel="stylesheet">


          <style type="text/css">

          </style>
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

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">

                        <div class="col-lg-14">
            
                        
                <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                                  Latest Tickets
                            </header>
                            <div class="panel-body table-responsive">
                                <table id="tickets" class="table table-hover">   
                                  <thead>
                                    <tr>
                                      <th>Ticket Number</th>
                                      <th>Company Name</th>
                                      <th>Location</th>
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Phone Number</th>
                                      <th>Shipping Address</th>
                                      <th>Product Branch</th>
                                      <th>Product Model</th>
                                      <th>Description</th>
                                      <th>Current Status</th>
                                      <th>Admin on Charge</th>
                                      <th>Action</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                    $status = array("Open","Closed","In Progress","Awaiting Reply","In Queue","On Hold");
                                    while($row = mysql_fetch_array($res, MYSQL_ASSOC))
                                          {
                                           echo "<form method='post'>";
                                           echo "<input type='hidden' name='ticketid' value=".$row['idticket'].">";
                                           echo "<tr>";
                                           echo "<td>{$row['idticket']}</td>";
                                           echo "<td>{$row['company_name']}</td>"; 
                                           echo "<td>{$row['location']}</td>"; 
                                           echo "<td>{$row['full_name']}</td>"; 
                                           echo "<td>{$row['email_address']}</td>"; 
                                           echo "<td>{$row['phone_number']}</td>"; 
                                           echo "<td>{$row['shipping_address']}</td>"; 
                                           echo "<td>{$row['product_branch']}</td>"; 
                                           echo "<td>{$row['product_model']}</td>"; 
                                           echo "<td>{$row['issue_description']}</td>"; 
                                           
                                           
                                           echo "<td><select name='status'><option selected>{$row['current_status']}</option>";
                                           for ($i=0;$i<6;$i++)
                                           {
                                               if($status[$i]!=$row['current_status'])
                                               {
                                                   echo "<option>".$status[$i]."</option>";
                                               }
                                           }
                                           echo "</select></td><td><select name='admin'>";
                                           
                                           
                                           
                                           $query2 = "SELECT * FROM administrator";
                                           $res2=mysql_query($query2,$dbh);  
                                          // $row2 = mysql_fetch_array($res2,MYSQL_ASSOC);
                                           
                                           while($row2 = mysql_fetch_array($res2,MYSQL_ASSOC))
                                           {
                                               if($row2['admin_login']!=$row['admin_on_charge'])
                                               {
                                                   
                                               echo "<option>".$row2['admin_login']."</option>";
                                               
                                               }
                                           
                                           }
                                           
                                           
                                           echo "<option selected>".$row['admin_on_charge']."</option>";
                                           
                                           echo "</select></td><td><div class='col-lg-offset-2 col-lg-10'>
                                              <button formaction='change_status.php' type='submit' class='btn btn-danger'>Apply Changes</button>
                                          </div></td>";
                                           echo "</tr></form>";
                                          } 
                                    ?>
                                       
                                    
                            
                                  
                              
                          </tbody>
                      </table>
                  </div>
              </section>


          </div>
 


         </div>
            </div>
                    <div class="row">
          <!--end col-6 -->
                    </div>
                    
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    <p>Powered by</p>
                <img draggable="false" height="60" width="40" src="img/agloz.jpg" />
                <p><a href="http://www.aglozsoftware.com">www.aglozsoftware.com</a></p>
                <p>&copy 2016</p>
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
<script data-config>
                var filtersConfig = {          
                paging: true,  
                paging_length: 20,  
                results_per_page: ['# rows per page',[20,10,8,6,4,2]],  
                rows_counter: true,  
                rows_counter_text: "Rows:",  
                display_all_text: " [ Show all ] ",
                loader: true, 
                col_0: 'select',
                col_1: 'select',
                col_2: 'select',
                col_3: 'select',
                col_4: 'select',
                col_5: 'select',
                col_6: 'select',
                col_7: 'select',
                col_8: 'select',
                col_9: 'select',
                col_10: 'none',
                col_11: 'none',
                col_12: 'none',
          
        
                       
                extensions:[
                    {

                        editable: false,
                        selection: false

                    }, {
                        name: 'sort',
                        types: [
                            'string', 'string', 'number',
                            'number', 'number', 'number',
                            'number', 'number', 'number'
                        ]
                    }
                ]
            };

            var tf = new TableFilter('tickets', filtersConfig);
            tf.init();
            
</script>
<?php } 
else{ 
header("Location: login.php"); } ?> 

</body>
</html>