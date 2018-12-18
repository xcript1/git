<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require 'adminphp.php';

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM customer where email =  '$user'";
    $res = mysqli_query($conn,$sql);
    $des = mysqli_fetch_array($res);
    $first = $des['first_name'];
    $mid = $des['mid_name'];
     $sur = $des['sur_name'];
    $addr= $des['address'];
    $phone = $des['phone'];
    $dob = $des['dob'];
       $email = $des['email'];
}

$hide='hidden';
if(isset($_POST['first'])){
     $user = $_SESSION['user'];
   $sql = "SELECT password FROM customer where email =  '$user'";
    $res = mysqli_query($conn,$sql);
    $des = mysqli_fetch_array($res);
    $first = $_POST['first'];
    $mid =  $_POST['mid'];
     $sur =  $_POST['sur'];
    $addr=  $_POST['addr'];;
    $phone =  $_POST['phone'];;
    $dob =  $_POST['dob'];
    
    $pass =  $_POST['pass'];
    if(strcmp($pass,$des[0]) == 0){
        
     $sql = "UPDATE  customer SET first_name = '$first',mid_name = '$mid',sur_name= '$sur',address = '$addr',phone = '$phone',dob = '$dob' where email ='$user'";
    $res = mysqli_query($conn,$sql);
   if($res){
       $message = 'Update Successful';
       $alert = 'alert-success';
   }else{
              $message = 'Update not Successful';
       $alert = 'alert-danger';
    }}else{
          $message = 'Incorrect Password';
       $alert = 'alert-danger';
    }
   $hide='';
}


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href='css/bootstrap.min.css' rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/slide.css" rel="stylesheet"/>
        <style>
            awhite{
                color:white;
            }
            
        
        </style>
    </head>
    <body>
       <div class="row" style="background:#eeeeee">
            <div class="col-sm-8 navbar-left ">
                
                <form class="navbar-form form-group">
                 
                    <input type="text" class="form-control" style="width:40%"/>
                    <button class="navbar-btn right form-control btn-danger" style="width:30%" >Search </button>
                </form>
            </div>
            <div class="col-sm-4 navbar-Right" style="padding: 5px; padding-top: 10px;  " >
                <table align="center">
                    <tr>
                        <td>
                            <div class="dropdown " >
                               
                                <p style="width:auto;"class="dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span> <label style="font-size: 15px; color:#990000; text-align: center"   /><?php if($log){ echo $person['first_name']; }else {echo "Your  <br> Account ";}?></label></span><span class="caret" >  </span> 
                                </p>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenu1" style="padding:10px ;color:white;">
                                    <?php  if($log){?>
                                    <li><a class="btn btn-info  awhite" href="ordertrack.php" style='color:white'> GO TO ACCOUNT </a><br>
                                    <li><a class="btn-danger btn  awhite" href="adminphp.php?g=l" style='color:white'> LOG OUT </a>
                                  <?php  }else{ ?>
                                    <li><a class="btn-danger btn  awhite" href="login.php" style='color:white'> LOGIN </a>
                                        <br><label style='color:black;'> Don't have an Account? </label><a class='btn-info btn' style='color:white' href='register.php'> Sign Up </a> 


                                    </li><br>
                                  <?php } ?>
                                    <label style='color:black; text-align: center;'> <center> Track Your Order </center></label>
                                    <li>
                                        <form class='form-group' method="post" action="adminphp.php" >
                                            <label for='orderid' style='color:black;'> Order ID </label>
                                            <input class='form-control' type='text' name='id' />

                                            <label for='phone' style='color:black;'> Email </label>
                                            <input class='form-control' type='text' name='email' /><br>
                                            <input name="osearch"type="hidden" />
                                            <Button class='btn btn-danger form-control'> Search </button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class=" navbar-Right" style="padding: 5px; padding-top: 5px; margin-left: 30px">
                                <a href='cart.php'><img src = 'img/cart.jpg' class="img-rounded" width="50px" height="50px" style='display:inline-block' /> <span class="badge bg-success" > 
                                    <?php if(isset($_SESSION['item'])){ echo count(@$_SESSION['item']);}else{echo  0; }?>  </span> </a>
                            </div>   
                        </td>
                    </tr>
                </table>
            </div>


        </div>


        <br>
           <ol class="breadcrumb">
                        <li><a href="index.php?refresh?=1"><?= 'Home' ?></a></li>

                    </ol>
        <div class="row">


            <div class="col-sm-3" style="padding:30px;  ">
                MY ACCOUNT
                <br><hr><br>
              
                <a href="personal.php"> MY PERSONAL INFORMATION </a>
              
                <br><hr><br>
                <a href="ordertrack.php"> MY ORDERS </a>
            </div>


            <div class="col-sm-9" style="padding:30px">
                <form class="form-inline"> <input type="search" placeholder="Track Order" class="form-control" />
                    <button class="form-control btn-success">TRACK</button> </form><br><HR><BR>
                <div style="background:orange; color:white;"><b>EDIT DETAILS</b> <br> <hr>
                   <hr></div>
                <div class="table table-bordered">
                   
                         <FORM class="form-group" method="post" action="personal.php" style="padding:60px">
                    First Name : * <input class="form-control " type="text" value="<?= @$first  ?>" name="first"/>
                      Middle Name : * <input class="form-control " type="text" value="<?= @$mid  ?>" name="mid"/>
                       Surname : * <input class="form-control " type="text"  value="<?= @$sur  ?>" name="sur"/>
                           Phone : * <input class="form-control" type="tel" value="<?= @$phone  ?>" name="phone"/>
                           Email: * <input class="form-control " type="email" value="<?= @$email  ?>" name="email" disabled="true"/>
                            Address : * <input class="form-control " type="text"  value="<?= @$addr  ?>" name="addr"/>
                            Date Of Birth : <input type="date" class="form-control"  value="<?= @$dob ?>" name="dob"/><br>
                            Password: * <input class="form-control " type="password"   name="pass"/>
                          
                            <div id="npass" > New Password : <input type="text" class="form-control"   name="npass"/></div><br> 
                            <button class="btn-info" align="right"> Submit </button>
                </FORM>
                    <label class="alert form-control <?= @$alert ?>" <?= $hide ?> > <?= @$message ?> </label>
                    <button onclick="showpass()" class="btn btn-danger"> CHANGE PASSWORD </button>
                </div>
            </div>
        </div>

 <div class="row  "style="background-color: #ff6600; height: 200" >
           <div height="1500px" style="color: white; text-align: center; padding-top: 50px">
               
               <p> This is a Project done in fulfillment of BSC programme in Ebonyi State Univesity </p>
               <center> <p> (c) 2018 </p> </center>
               <center><?php if(isset($_SESSION['type'])){?> 
                   <a href="adminlogin.php" > Go to Admin Page </a>
               <?php } else{ ?>
                   <a href="adminlogin.php" >Admin Login </a></center>
               <?php }?>
           </div>
       </div>

        <script src="js/jquey.js"></script>
        <script src="js/bootstrap.js"></script>
        <script >
            var slideindex = 0;
            showslides();
 function showpass(){
     
     var a = document.getElementByid('npass');
     document.write
     a.
 }
            function showslides() {

                var i;
                var slides = document.getElementsByClassName("slide");

                for (i = 0; i < slides.length; i++) {

                    slides[i].style.display = "none";
                }
                slideindex++;
                if (slideindex > slides.length) {
                    slideindex = 1;
                }
                slides[slideindex - 1].style.display = "block";

                setTimeout("showslides()", 3000);
            }



        </script>




    </body>
</html>


