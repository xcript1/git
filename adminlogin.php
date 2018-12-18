<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php   
require 'adminphp.php';
if(!isset($_SESSION['type'])){
if(isset($_POST['login'])){
    $u = $_POST['user'];
    $p = $_POST['pass'];
   $r = mysqli_query($conn,"select * from admin where userid = '$u' and pass= '$p'");
   if(mysqli_num_rows($r)>0){
    header('location: adminhome.php?');
    $_SESSION['type'] = "admin";
    $_SESSION['user'] = $u;
         
    $log = false;
    
 }else{
       
       echo "<script> alert('user not found'); </script>";
   }
}


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link href='css/bootstrap.min.css' rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/slide.css" rel="stylesheet"/>
    </head>
    <body style="background: url(img/b1.jpg); background-repeat: repeat; background-size: cover; ">
        <form style="position: absolute; background: orangered; top:30%; left:30%; width: 40% ; height: 30%;padding: 10px;" class="form-group" method="post" action="adminlogin.php" >
            <label > ADMIN LOGIN </label>
            <input class="form-control" type="text" placeholder="Username"  name="user"/><br>
            <input class="form-control" type="password" placeholder="Passowrd" name="pass" /><br>
            <Button class="form-control btn-success" name="login" > Login </button>
        </form>
    </body>
</html>
<?php }else{
    
    header("location: adminhome.php");
}?>