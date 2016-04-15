<?php

session_start();
require_once('connection.php');
//include "upd_log.php";

if(!isset( $_POST['user'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}

else
{
    
    /*** if we are here the data is valid and we can insert it into database ***/
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    /*
    $dbh = new PDO("mysql:host=localhost;dbname=payroll", "root", "");  
    // prepare query //
    $stmt = $dbh->prepare("SELECT * FROM user WHERE login = :user AND password = :password");
    // bind the parameters //
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
    // execute the prepared statement ///
    $stmt->execute();
    // check for a result //
    $user_id = $stmt->fetchColumn();
     */
     
    $sql = "SELECT * FROM administrator WHERE admin_login = '$user' AND admin_password ='$password'";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
    $user_id = $row[0];
    $sql2 = "SELECT * FROM ucust WHERE c_login = '$user' AND c_password ='$password'";
    $res2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($res2);
    $user_id2 = $row2[0];
  
    //if we have no result then fail boat //
        if($user_id == false && $user_id2 == false)
        {
                echo 'Login Failed<br/>';
                echo "<a href='login.php'>Back to login screen</a>";
                 $accion="LOGIN FAILED ";
                 $origen=$_SERVER['REMOTE_ADDR'];
  //               generaLogs($user,$accion,$origen);
        }
        /*** if we do have a result, all is well ***/
        if($user_id != false && $user_id2 == false)
        {
            
                /*** set the session user_id variable ***/
               $_SESSION['user_id'] = $user;
               $_SESSION['logged'] = 1;
               $accion="LOGIN ";
               $origen=$_SERVER['REMOTE_ADDR'];
               //generaLogs($user,$accion,$origen);
               header("Location: dashboard.php");
              
                
        }
        if($user_id == false && $user_id2 != false)
        {
            
                /*** set the session user_id variable ***/
               $_SESSION['user_id'] = $user;
               $_SESSION['logged'] = 1;
               $accion="LOGIN ";
               $origen=$_SERVER['REMOTE_ADDR'];
               //generaLogs($user,$accion,$origen);
               header("Location: dashboard2.php");
              
                
        }
}