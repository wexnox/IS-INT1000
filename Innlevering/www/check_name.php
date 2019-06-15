<?php

 require_once 'db-tilkobling.php';

 if(!empty($_POST['name'])){
     $name=$_POST['name'];
     $res=mysqli_query($con,"select count(user_name) as count from users where user_name='$name'") or die("Database error 2!");
     $count=mysqli_fetch_array($res);
     if($count[0]==0){
         echo 'true';
     }else{
         echo 'false';
     }
 }
?>