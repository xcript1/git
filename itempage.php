

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->


<?php require 'adminphp.php';

if(isset($_SESSION['fud'])){
if(isset($_GET['t'])){
    $_SESSION['fud'] = $_GET['t'];
}
    $name = $_SESSION['fud'];
 $val = mysqli_query($conn,"select * from food_table where food_name = '$name'");
 $res = mysqli_fetch_array($val);


if(isset($_POST['f'])){
    $name = $_POST['f'];
if(isset($_SESSION['cart'])){
$_SESSION['cart'] += 1;}else{
    $_SESSION['cart'] = 1; 
}
if( isset($_SESSION['item']) && count($_SESSION['item'] )>0){
 // $temp = $_SESSION['item'];
    echo $name;
   echo $key = array_search($name,$_SESSION['item']);
 echo is_bool($key);
    if(is_bool($key)){
      
        array_push($_SESSION['item'],$name);
    echo 'i pushed';
    }else if (is_integer($key)){
      $_SESSION['cartqty'][$key] += 1;
        echo 'i inc';
    }
    

}else{
    echo 'il';
    echo $key = array_search($name,$_SESSION['item']);
    if($key == null){
        echo 'null';
    }
    $temp = array($_POST['f']);
    $_SESSION['item'] = $temp;
    var_dump($_SESSION['item']);
}
header('location: cart.php');

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









        <div class="row " width="100%" height="50px" style='padding: 50px'>
            
                    <ol class="breadcrumb">
                        <li><a href="index.php?refresh?=1"><?= 'Home' ?></a></li>

                    </ol>

            <div class="col-sm-6" style="padding:5px;" >


                <img src="<?= $res['food_img'] ?>" width="100%" class="img-rounded"/>


            </div>

            <div class="col-sm-6" >


                <div>
                    <div style="border: 5px black">
                        <big> <h1><p><b> <?= $res['food_name'] ?> <br> <h5><p><i> Category : <?= $res['category'] ?> </i></p></h5></b></p></h1> </big>
                        <br>

                    </div>
                    <hr>
                  
                    <big>  <b><u> Description </u></b></big>
                    <div>
                          <b><?= $res['food_des'] ?></b><br>

                    </div>
                    <br><br>

                    <div style='border-style:  solid; border: 10px black;'>
                        <font style="color:  #ff6600"> <b><del> N </del> <?= $res['food_price'] ?> </b></font>

                        
                    <?php if(strcmp($res['food_price'],$res['oldfood_price'])!=0 && $res['oldfood_price'] !=0 ) {?>    <del><?= $res['oldfood_price'] ?></del> <?php } ?>
                        <br>
                        <br>
                        <FORM method="post" action="itempage.php">
                        <button  href="<?= 'cart.php?t='.$res['food_name'].'&p='.$res['food_price'] ?>" class='btn  form-control' style="background:  #ff6600; box-shadow: 0px 1px 1px 1px #000" > BUY </button>
                        <input type="hidden" name="f"  value="<?=  $res['food_name'] ?>" />
                        <input type="hidden" name="p"  value="<?=  $res['food_price'] ?>" />
                        </FORM>
                    </div>
                </div>


            </div>

        </div>
    </div><br>
    <div align='center' class='label-danger form-control' style='color:white'><p><big> SIMILAR ITEMS </big></p></div>
    <hr>
    <div class="row" style='padding:30px'>
        <?php
        $cat =$res['category'];
        
                        $val = mysqli_query($conn,"select * from food_table where category='$cat' and not food_name = '$name' ");
                        $num = mysqli_num_rows($val);
                        if($num%4 == 0){
                        $len = $num/4 ;}else{
                            $len = ceil($num/4);
                        }
                        $res = mysqli_fetch_array($val);
                        $j=0;$k=0;$com=false;
                        while($j<$len){
                        $i = 0;
                        do {
                            ?>
                            <div class="col-sm-3" style="padding: 10px;">
                            
                                <div width="100%">
                                    <a href="<?= 'index.php?t='.$res['food_name'] ?>"> <img src= "<?=  $res['food_img']   ?>" width="100%"  height='200px' class="img-rounded  "/></a><br>
                                    <b><p><?=  $res['food_name']  ;      ?></p></b>
                                    <p><i> Category : <?=  $res['category']  ;      ?></i></p>
                                  
                                    <div class='alert-danger text-center '>
                                       
                                        <b> <del> N </del> <?=  $res['food_price']  ;      ?> </b><?php if(strcmp($res['food_price'],$res['oldfood_price'])!=0 && $res['oldfood_price'] !=0 ) {?><del><?= $res['oldfood_price'] ?></del><?php }?>
                                    </div>
                                </div>
                                <br>

                            </div>
                            <?php
                            $i++;
                            
                            $k++;
                            if($k>=$num || $i ==4){
                            $com = true;}
                           
                             $res = mysqli_fetch_array($val);
                            }while($com == false);
                       $j++;
                                        }
                        ?>
    </div><br><br><br>
     <div class="row  "style="background-color: #ff6600; height: 200; position: relative; bottom: 0px; width: 100%" >
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
<br>
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
<?php   
}else{
    
    echo error_log("ERROR: Cannot not find page or Item");
}




?>