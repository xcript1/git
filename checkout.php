


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
require_once 'adminphp.php';

if(isset($_SESSION['user'])){
    
    
    
$cus = $_SESSION['user'];
$tot =0;
$result = mysqli_query($conn,"Select * FROM customer where email='$cus'");
$det = mysqli_fetch_array($result);
if(isset($_SESSION['item'])){
 $qty = $_SESSION['cartqty'];

 if(isset($_POST['place'])){
     if(isset($_POST['h'])){
         
        
         
     $temp = explode("@", $cus);
     $orderid = "#".rand(100000, 9000000).rand(0,130).rand(96,100).$temp[0];
     $user = $cus;
     $date = date("d/m/y h:m");
    // $amount = $grandT;
     $k=0;
     $item = '';
     do{
         $it = $_SESSION['item'][$k];
          $res = mysqli_fetch_array(mysqli_query($conn, "select food_price from food_table where food_name = '$it'")) ;
              $pay = $_POST['h'] ;         
         $item .= $it.'-'.$_SESSION['cartqty'][$k].'-'.$res[0].';';
         $subt = $_SESSION['cartqty'][$k] * $res[0];
         $tot += $subt;
         $k++;
     }while($k<count($_SESSION['item']));
     
      if(strcmp($pay,"Pay Online")==1){
             
             $_SESSION['value'] = array($orderid,$user,$item,$date,$tot,$pay);
             header("location: webpay.php");
         }else{
    $res =mysqli_query($conn, "insert into order_table(orderid,userid,item,date,amount,pay_type) VALUES ('$orderid','$user','$item','$date','$tot', '$pay')") ;
      if($res){
              unset($_SESSION['item']);
              unset($_SESSION['cart']);
              unset($_SESSION['cartqty']);
          header("location: ordertrack.php");
      
      }else{
          echo "insert into order_table(orderid,userid,item,date,amount) VALUES ('$orderid','$user','$item','$date','$tot'";
         }}
}else{
    
    echo "<script> alert('you must select payment option'); </script>";
     }}
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
        <div class="row">
           
            
            <div class="col-sm-8" style="padding:70px;  ">
              <h3 style="color:orange"><b> CHECK OUT</b> </h3><hr>
              <ol>
                  <li style="box-shadow: 1px 1px 1px 1px orange; padding: 10px;">
                      <b> ADDRESS DETAILS </B><HR><br>
                      <p> <big><b> Name: <?= $det['first_name'].' '.$det['sur_name'].' '.$det['mid_name'] ?></b></big></P>
                      <p> <big><b>Address: <?=  $det['address'] ?></b></big></p>
                      <p><big><b> Phone: <?=  $det['phone'] ?></b></big></p>
                      
                      
                  </li><br>
                   <li style="box-shadow: 1px 1px 1px 1px orange; padding: 10px;">
                      <b> DELIVERY METHOD </B><HR><br>
                      <p> <b> Home Delivery </b></P>
                   
                  
                      
                   </li><br>
                     <li style="box-shadow: 1px 1px 1px 1px orange; padding: 10px;">
                      <b> PAYMENT METHOD </B><HR><br>
                      
                      <input type="radio" id="pod" value="Pay On Delivery"  onclick='pod("pod")' <?php if(strcmp(@$_GET['t'],"Pay On Delivery")==0){?> checked=<?php echo 'true'; }?>/> <b> Pay On Delivery </b><br><br>
                      <input type="radio" id="poo" onclick="poo()" <?php if(strcmp(@$_GET['t'],"Pay On Online")==0){?> checked=<?php echo 'true'; }?> /> <b> Online Payment </b>
                  </li>
              </ol>
                   <form method="post" action="checkout.php">
              <div class="table-condensed table-bordered table-striped text-capitalize" style="background: #99ff99; font-weight: 23; color:white; text-shadow: 1px 1px 1px black">
             
                  <table class="table">
                      <thead>
                      <tr style="font-weight: 23">
                        
                          <td>
                              <b> Item: </b>
                          </td>
                           <td>
                               <b>  Qty: </b>
                          </td>
                            <td>
                                <b>   Sub Total: </b>
                          </td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                         $item = $_SESSION['item'];
                            if(count($item)> 0){
                          $i=0;  $j=0; $grandT=0; do{ 
                             
                               $res = mysqli_fetch_array(mysqli_query($conn, "select food_price,food_des,food_img from food_table where food_name = '$item[$i]'")) 
                             ?>
                      
                      <tr>
                       
                           <td>
                               <b>   <?= $item[$i]; ?> </b>
                          </td>
                           <td>
                               <b> <?= $qty[$i]; ?> </b>
                          </td>
                             <td>
                                 <b>  <?php echo $tot =  $res['food_price'] * $qty[$i];
                                 $grandT += $tot;?> </b>
                          </td>
                      </tr>
                       <?php $i++;}while($i<count($item))  ; }?>
                  <tfoot>
                      <tr>
                          
                          <td colspan="3" align="right">
                             <?=  'TOTAL :'.' '.$grandT; ?>
                          </td>
                      </tr>
                  </tfoot>
                  </tbody>
                  </table>
              </div>
                       <input type='hidden' name='h' value="<?= @$_GET['t']?> " />
              <button CLASs="form-control btn btn-success" href="ordertrack.php" name="place"> PLACE ORDER </button>
                                 </form>

            </div>
              <div class="col-sm-4" style="padding:30px; position: relative; right:0px; top:50px ">
                  <h3> <b>  ORDER SUMMARY </b> </h3>
               <div class="" style="box-shadow: 1px 1px 1px 1px #000; padding: 10px; background: orange ; color:white;" >
                    Your Order (<?=   count($_SESSION['item'])   ?> item)<br><hr>
                     <table class="table" border="1">
                         <?php 
                        $item = $_SESSION['item'];
                            if(count($item)> 0){
                          $i=0;  $j=0; $grandT=0; do{ 
                             
                               $res = mysqli_fetch_array(mysqli_query($conn, "select food_price,food_des,food_img from food_table where food_name = '$item[$i]'")) 
                             ?>
                      <tr>
                          <td width="10%">
                              <img src="<?= $res['food_img']  ?>"  height =50px width="50px" class="img-circle"/>
                          </td>
                          <td>
                             <?= $item[$i];?><br>
                              <?= $res['food_des'] ?>  <br>
                              <?=  $res['food_price']; ?><br>
                              Qty:   <?= $qty[$i]; ?><br>
                              Sub Total:  <?php echo $tot =  $res['food_price'] * $qty[$i];
                              $grandT += $tot;?>
                              
                          </td>
                      </tr>
                            <?php $i++;}while($i<count($item))  ; }?>
                      
                  </table>
                    <p align="right"> <b >
                         TOTAL : <?= @$grandT ?>
                        </b></p><br>
                        <a class="btn btn-success" href="cart.php" >MODIFY CART</a>
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
        <script>
        function pod(){
         //   document.write(id);
        //var t = document.getElementByid(id);
        
          document.location = "checkout.php?t=Pay On Delivery";
             var t = document.getElementByid('po0');
           t.checked = false;
        
    }
          function poo(){
         //   document.write(id);
        //var t = document.getElementByid(id);
        
          document.location = "checkout.php?t=Pay Online";
             var t = document.getElementByid('pod');
           t.checked = false;
        
    }
        </script>
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
    
      header("location: index.php");
}                   }else{
    header("location: index.php");
}

?>