<?php 

  $localhost = 'localhost';
  $user = 'root';
  $pass = '';
 
  
  $aconn = mysqli_connect($localhost,$user,$pass);

  if(!$aconn){
    die("connection error".mysql_error());
  }

  //check if database exist, if empty create new database
  $bdb = mysqli_select_db($aconn,"akorno");
  if(empty($bdb)){
    $createadb = "CREATE DATABASE akorno";
    $checkthis = mysqli_query($aconn,$createadb);

    if(!$checkthis){echo 'database created error';}
    //else{echo "database created"}


  }

  //else{echo "database exist";}



  //check if tables exist, create one if it does not exist

  $atable = "select * from akornomenu";
  $checktable = mysqli_query($aconn,$atable);

  if(!$checktable){
    $createatable = "CREATE TABLE akornomenu(Food_Item VARCHAR(20) PRIMARY KEY, Price INT, Category VARCHAR(20))";

    $now = mysqli_query($aconn,$createatable);

    if(!$now){
      //echo "table error";
    }

    else{//echo "table creation success";}
  }
}
