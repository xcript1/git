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
include 'adminphp.php';

if(isset($_SESSION['value'])){

if (isset($_POST['email'])) {
   $orderid = $_SESSION['value'][0];
    $user = $_SESSION['value'][1];
     $item = $_SESSION['value'][2];
      $date = $_SESSION['value'][3];
       $tot = $_SESSION['value'][4];
        $pay = $_SESSION['value'][5];
   $res =mysqli_query($conn, "insert into order_table(orderid,userid,item,date,amount,pay_type) VALUES('$orderid','$user','$item','$date','$tot', '$pay')") ;
      if($res){
              unset($_SESSION['item']);
              unset($_SESSION['cart']);
              unset($_SESSION['cartqty']);
          header("location: ordertrack.php");
      
      }else{
          echo "insert into order_table(orderid,userid,item,date,amount) VALUES ('$orderid','$user','$item','$date','$tot'";
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
<?php if (isset($alert)) { 
    
   ?>
            <script> alert('<?= $alert ?>');</script>
            <?php }
        ?>
    
        <br><br>
        <div class='row'>
            <br>
                    <ol class="breadcrumb">
                        <li><a href="index.php?refresh?=1"><?= 'Back to Main Site' ?></a></li>
                     
                    </ol>
            <center> <h1><b> WEB PAY </b> </h1> </center>
        </div>


        <br>
        <div class="row">
            <div class="col-sm-4" style="padding:70px">
            
            </div>

            <div class="col-sm-4" style="padding:70px">
                <form class="form-group" action="webpay.php" method="post">
                   Select Card Type
                   <Select class="form-control" name="email" >    
                       <option> Master Card </option>
                         <option> VISA </option>
                   </select>      
                   CARD HOLDER NAME*<input class="form-control" name='pass' type="password"/><br>
                     CARD NUMBER*<input class="form-control" name='pass' type="password"/><br>
                     CVV*<input class="form-control" name='pass' type="password"/><br>
                    <button class="btn form-control btn-default" style="background: orange" name="j"> PAY </button>
                </form>
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
alert()
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

<?php }else{
    header("location: checkout.php");
}
?>