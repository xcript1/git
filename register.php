


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
require_once 'adminphp.php';

if (isset($_POST['first'])){
  $field = array('first_name','sur_name','mid_name','address','phone','email','dob','password');
            $values =array($_POST['first'],$_POST['sur'], $_POST['mid'],$_POST['addr'],$_POST['phone'],$_POST['email'],$_POST['dob'],$_POST['pass']);
                $register = new register_update($values,'customer',$conn,$field)    ;
              echo  $result = $register-> register();
              if(strcmp($result,"Registration Succesful") == 0){
                  $_SESSION['user'] = $_POST['email'];
       header("location: checkout.php");
              }else{
                  echo "<script> alert('something went wrong'); </script>";
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
        <br><br>
<div class='row' style="border-style: solid; border:5px">
            <div class='col-sm-12' style='padding-left: 100px; padding-right:100px'>
                 <br>
                    <ol class="breadcrumb">
                        <li><a href="index.php?refresh?=1"><?= 'Home' ?></a></li>

                    </ol>
                <h2 style="color:orangered"><b> Create New Account</b> </h2><hr>
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col-sm-4" style="padding:70px">
              
            </div>
            
            <div class="col-sm-4" style="padding:70px; border: 2px; border-style:solid ">
                <FORM class="form-group" action="register.php" method="post">
                    First Name : * <input class="form-control " name="first" type="text"/>
                       Surname : * <input class="form-control " type="text" name="sur"/>
                             Middle : * <input class="form-control " type="text" name="mid"/>
                           Phone : * <input class="form-control " type="tel" name="phone"/>
                           Email: * <input class="form-control " type="email" name="email"/>
                            Address : * <input class="form-control " type="text" name="addr"/>
                            Date Of Birth : <input type="date" class="form-control" name="dob"/>
                              Password : <input type="dpassword" class="form-control" name="pass"/><br>
                            
                            <button class="btn-info" align="right"> Submit </button>
                </FORM>
            </div>
              <div class="col-sm-4" style="padding:70px">
               
            </div>
        </div>
        <br><br>
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


