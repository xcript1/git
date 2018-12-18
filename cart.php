

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
require 'adminphp.php';


if(isset($_SESSION['cart'])){
$cart_num = $_SESSION['cart'];

if(isset($_SESSION['cartqty'])){
    $cart_qty = $_SESSION['cartqty'];
}

}
if (isset($_POST['hide'])){

$arrayqty = array();
$i=0;
do{
    $arrayqty[$i] = $_POST["sel".$i];
    $i++;
}while($i<count($_SESSION['item']));
$_SESSION['cartqty'] = $arrayqty;
if (isset($_POST['cont'])){
header("location: index.php");

}else if (isset($_POST['proc'])){
    header("location: login.php");
}
}
 if(isset($_GET['rem'])){
  //  echo 'here';
    $key = array_search($_GET['rem'], $_SESSION['item']);
    //unset($_SESSION['item'][$key]);
   // echo $_GET['rem'];
    array_splice($_SESSION['item'],$key,1);
    //echo'key'. $_GET['ind'];
    array_splice($_SESSION['cartqty'],$_GET['ind'],1);
    header("location:cart.php?");
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
        <div class='row'>
            <div class='col-sm-12' style='padding-left: 100px; padding-right:100px'>
                                     <li><a href="index.php?refresh?=1"><?= 'Home' ?></a></li>

            </div>
        </div>
        
        <form method="post" action="cart.php" name="frmcart">
       <input name="hide" type="hidden" />
        <div class="row " width="100%" height="50px" style='padding: 50px'>
            <br>
            <br>
            <div class="col-sm-12" style="padding:5px;" >
                
                <div class='table-responsive table-striped danger'>
                    <table class='table danger' height="100%">
                        <thead align='center'>
                            <tr>
                                <th>
                                    ITEM
                                </th>
                                <th>
                                    QUANTITY
                                </th>
                                <th>
                                    UNIT PRICE
                                </th>
                                <th>
                                    SUB TOTAL
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php 
                            $item = @$_SESSION['item'];
                            $qty = @$_SESSION['cartqty'];
                            if(count($item)> 0){
                            $j=0; $k=0; 
                            do{ 
                              //  echo $qty[$k];
                             $res = mysqli_fetch_array(mysqli_query($conn, "select food_price from food_table where food_name = '$item[$j]'"));
                             ?>
                            <tr name="<?= $item[$j]; ?>">
                                <td>
                                    <div>  <big> <b> <?= $item[$j];?> </b></big></div>
                                    <br><br>
                                    <span>
                                        <!--<form class='form-inline danger' method="post" action="cart.php"> !-->
                                            <a href="cart.php?rem=<?=$item[$j]?>&ind=<?= $k ?>"><font style="color:orange">REMOVE</font> </a>
                                        
                                       <!-- </form> !-->
                                    </span>
                                </td>
                                <td>
                                   
                                    <select  name="sel<?= $j;   ?>" onchange="price('<?= $res[0] ?>', '<?= $j ?>')"  class="form-control qty" id="<?= $j ?>"
                                             value="<?=  @$_SESSION['cartqty'][$j]  ?>" >
                                        
                                        <?php 
                                          
                                       
                                        $i=1; do{ 
                                            ?>
                                        <option value='<?= $i?>'  <?php        if(strcmp($i,@$qty[$j])==0) { echo 'selected'; }  ?>> <?= $i?></option>
                                        <?php $i++;}while($i<100); ?>
                                    </select> <hr>
                                    
                                </td>
                                <td>
                               
                                     <?=    $res[0]; ?>
                                      
                                      
                                </td>
                                <td id="a<?= $j  ?>">
                                 <script> 
                                          var qty = document.getElementById('<?= $j ?>');
                                     document.writeln(parseInt(qty.value) * parseInt(<?=  $res[0]; ?>)); 
                               
                                </script>
                                </td>
                            </tr>
                            <?php
                            $j++;
                            
                            
                            if($k <= count($qty)){
                                $k++;
                            }
                                        }while($j<(int)count($item)); }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align='right' ><big> <b id="tot" > 
                                        <script>
                                        var i = 0; var k =0;   do{
                                          var qty = document.getElementById('a'+i);
                                           //var t =    parseInt(tot.innerHTML) ;
                                       var t = qty.innerText
                                        //document.writeln(t);
                                    
                                     k += parseInt(t);
                                     
                                     i++;
                                            }while(i<<?= $j ?>);
                                            document.writeln(k);
                                        </script>
                            </b></big> </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>


        </div>
     
        <div class='row' >
            <div class='col-sm-4'>
                
            </div>
             <div class='col-sm-4'>
                
            </div>
             <div class='col-sm-4'>
                 <button  name="cont" class='btn btn-default'><font style='color:orange' >CONTINUE SHOPPING </font></button>
                 <button  name="proc" class='btn' style='background-color: orange; '><font style='color:white' >PROCEED TO CHECK OUT </button></a>
            </div>
        </div>
   </form>
        <br><br><br>
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
 <script>
                                 // document.writeln(qty.value * <?=  @$_GET['p'] ?>);
                                        function price(a,b){
                                            var qty = document.getElementById(b);
                                          
                                             var amt = document.getElementById('a'+  b);
                                              var tot = document.getElementById('tot');
                                              var t =    parseInt(tot.innerText) ;
                                                      //document.writeln(parseInt(t));
                                     amt.innerHTML = a*qty.value;
                                       var i = 0; var k =0;   do{
                                          var qty = document.getElementById('a'+i);
                                           //var t =    parseInt(tot.innerHTML) ;
                                       var t = qty.innerText
                                        //document.writeln(t);
                                    
                                     k += parseInt(t);
                                     
                                     i++;
                                            }while(i<<?= $j ?>);
                                    tot.innerHTML = k;
                                          
                                          }
                                                   
                                         
                                        </script>
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


