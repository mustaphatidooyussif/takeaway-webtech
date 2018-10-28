<?php 

  $localhost = 'localhost';
  $user = 'root';
  $pass = '';
 
  
  $bconn = mysqli_connect($localhost,$user,$pass);

  if(!$bconn){
  	die("connection error".mysql_error());
  }

  //check if database exist, if empty create new database
  $bdb = mysqli_select_db($bconn,"bigben");
  if(empty($bdb)){
  	$createbdb = "CREATE DATABASE bigben";
  	$checkthis = mysqli_query($bconn,$createbdb);

  	if(!$checkthis){echo 'database created error';}
  	//else{echo "database created"}


  }

  //else{echo "database exist";}



  //check if tables exist, create one if it does not exist

  $btable = "select * from bigbenmenu";
  $checktable = mysqli_query($bconn,$btable);

  if(!$checktable){
  	$createbigtable = "CREATE TABLE bigbenmenu(Food_Item VARCHAR(20) PRIMARY KEY, Price INT, Category VARCHAR(20))";

  	$now = mysqli_query($bconn,$createbigtable);

  	if(!$now){
  		//echo "table error";
  	}

  	else{//echo "table creation success";}
  }
}

 