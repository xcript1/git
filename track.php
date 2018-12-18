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
if(isset($_GET['id'])){

if(isset($_GET['c'])){
      $id = urldecode($_GET['id']);
     $det = mysqli_fetch_array(mysqli_query($conn, "select status from order_table where orderid='$id'"));
     if(strcmp($det['status'],"Order Placed")==0){
         
   $res =        mysqli_query($conn,"Update order_table set status = 'Order Confirmed' where orderid= '$id'");
   if($res){
       
       echo "<script> alert('Order status updated'); </script>";
   }
   
   
     }
    
}
if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
 
    $det = mysqli_fetch_array(mysqli_query($conn, "select * from order_table where orderid='$id'"));
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
         <?php if(@$_GET['f']){
                                    ?><script > alert('not found'); </script>
                               <?php  }
                               
                               if ($log){
                               ?>
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

                               <?php  } ?>
        <br>
           <ol class="breadcrumb">
                <?php  
                               
                               if ($log){
                               ?>
                        <li><a href="index.php?refresh?=1"><?= 'Home' ?></a></li>
 <?php  
                               
                               } else{
                               ?>
                        <li><a href="adminhome.php?refresh?=1"><?= 'Home' ?></a></li>
                        
                               <?php } ?>
                    </ol>
        <div class="row">





            <div class="col-sm-12" style="padding:70px" id="av">

                <div style="background:orange; color:white;"><b>ORDER DETAILS</b> <br> <hr>
                    <hr></div>
                <?php if (!@$_GET['f']) { ?>
                <div class="table table-bordered">
                    <B>  Order Id : <?= $det['orderid'] ?> &nbsp;&nbsp;&nbsp;  <?= $det['date']; ?> &nbsp;&nbsp;&nbsp;   Total: <?= $det['amount']; ?> &nbsp;&nbsp;&nbsp;  </b>
                    <table class="table table-bordered">

                        <tbody>

                            <tr>
                                <td>
                                    <?php 
                                    $uid = $det['userid'];
                                    $users = mysqli_fetch_array(mysqli_query($conn,"select * from customer where email='$uid'"));
                                    ?>
                                    <p style="background: #444444; font-weight: 23; color: white"> Name:  </p> <?= $users['first_name'].' '.$users['sur_name']; ?> <hr>
                                    <p style="background: #444444; font-weight: 23; color: white"> Phone Number: </p>  <?= $users['phone'] ?> <hr>
                                    <p style="background: #444444; font-weight: 23; color: white">Payment Method: payment </p> <?= $det['pay_type'] ?><hr>
                                    <p style="background: #444444; font-weight: 23; color: white"> Shipping Address: </p><hr> <?= $users['address'] ?>  <hr>
                                </td>

                                <td>
                                    <b> STATUS: </b> <br>
                                    <hr>
                                    <b>   <?= $det['status'] ?> </b>
                                    <?php if (strcmp(@$det['status'],"Dispatched")==0 ){
                                           echo "<br>Delivery Person Details
                                            <br> Name: ".$det['deliveryperson']."<br>Number:".$det['delivery_person_num'];
                                           
                                        }?>
                                </td>
                                <td>


                                    <p style="background: orange; color:white; " > Details: </p>
                                  
                                                <?php
                                                $j = 0;
                                                $food = explode(";", $det['item']);
                                                do {?>
                                                      <table border="1" width="100" class="table-bordered table-condensed table" >
                                                     <tr>
                                                     <td>
                                                         <?php
                                                    $item = explode("-", $food[$j]);
                                                    echo "<b>" . ' Item Name:  ' . $item[0] . '  <br> Qty:  ' . $item[1] . '  <br> Amount  ' . $item[2] . "</b> <br> <hr>  <b> SubTotal (<del>N</del>)".$item[1] * $item[2]."</b>";
                                                    
                                                    ?>
                                                </td>

                                                <td width="50%"><?php
                                                    $img = mysqli_fetch_array(mysqli_query($conn, "select food_img from food_table where food_name = '$item[0]'"));
                                                    ?>
                                                    <img src="<?= $img[0] ?>" width="70px" height="70px" />
                                                </td>
                                                <?php
                                                $j++;
                                            } while ($j < count($food) - 1);
                                            //var_dump($food);
                                            ?>


                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
                <?php } if(isset($_SESSION['type'])) {?>
                   <button class="btn btn-danger" onclick="print('p')" id="p"> PRINT </button>
                <?php }?>
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
function print(elem){
    var mywin = window.open('','PRINT','height=400','width=600');
    mywin.document.write('<html><head><title>Print Order</title>\n\
\n\
\n\
\n\
<link href="css/bootstrap.min.css" rel="stylesheet"/>      <link href="css/bootstrap-theme.min.css" rel="stylesheet"/></head><body>');
  
   var av = document.getElementById('av');
    mywin.document.write(av.innerHTML);
        mywin.document.write('</body></html>');
  
      
        mywin.window.print();
        mywin.close();
        document.location = "track.php?c=true&id=<?= urlencode($id)            ?>";
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

<?php }else{echo "Error : Could not find Item"; } ?>
