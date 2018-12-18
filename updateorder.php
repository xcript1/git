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
$hide = 'hidden';
if(isset($_POST['id'])){
    $id = $_POST['id'];
     $qry = mysqli_query($conn,"SELECT * FROM order_table where orderid = '$id'");
     if($num > 0){
      $_POST['id'] = $id;
        $hide= '';
        $det = mysqli_fetch_array($qry);
        
    }
    
}
if(isset($_POST['orderid'])){
   $id = $_POST['orderid'];
header("location: updateorder.php?i=".urlencode($id));}
if(isset($_GET['i'])){
    $id = urldecode($_GET['i']);
           $qry = mysqli_query($conn,"SELECT * FROM order_table where orderid = '$id'");
$num = mysqli_num_rows($qry);
    if($num > 0){
    
        $hide= '';
        $det = mysqli_fetch_array($qry);
      
    }
    
}


if(isset($_POST['upd'])){
 
    $upd= $_POST['upd'];
    $id = $_POST['ide'];
    if(isset($_POST['num'])){
        $num = $_POST['num'];
            $name= $_POST['name'];
         echo   "update order_table set status = '$upd', deliveryperson = '$name', delievry_person_num = '$num' where orderid = '$id'";
            $qry = mysqli_query($conn,"update order_table set status = '$upd', deliveryperson = '$name', delivery_person_num = '$num' where orderid = '$id'");
    }else{
    $qry = mysqli_query($conn,"update order_table set status = '$upd' where orderid = '$id'");}
    if($qry){
        
        echo "<script> alert('update Sucessful'); </script>";
         header("location: updateorder.php?i=".urlencode($id));
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
      <label class="alert alert-warning form-control " style="text-align: center"><big>ADMIN PAGE </big> </label>
            <table class="table-bordered"width="100%">
                <tr>
                    <td width="50%">
                        USER ID: <?=  @$_SESSION['user'] ?>
                    </td>
                     <td>
                        DATE: <?= date("d/m/y") ?>
                    </td>
                </tr>
            </table>


        <div class="row">

            <div class="col-sm-3" style="padding:30px">
                <br><br>
                <div class="list-group" style="box-shadow:0px 0px 1px 1px orange;">
                                        <a href="adminhome.php" class="list-group-item  btn ">HOME <span class="badge" ></span></a>

                    <a href="adminaddfood.php" class="list-group-item  btn ">ADD FOOD</a>


                    <a href="updateorder.php" class="list-group-item btn"> UPDATE ORDER <span class="badge" ></span></a>

                    <a href="adminupdatefood.php" class="list-group-item btn "> EDIT FOOD  <span class="badge"></span></a>
                    <a href="adminremovefood.php" class="list-group-item btn "   > REMOVE FOOD <span class="badge"></span></a> 
                   <a href="adminphp.php?g=logout" class="list-group-item btn "   > LOG OUT <span class="badge"></span></a> 
                 </div>

            </div>


            <div class="col-sm-9" style="padding:70px">
 <div style="background:orange; color:white;"><b><big> UPDATE ORDER </big></b> <br> <hr>
       <form class=" form-group form-inline" align="center" method="post" action="updateorder.php">
                    <input type="text" class="form-control" style="width:60%" placeholder="Enter Order ID" name="orderid"/>
                    <button class="form-control btn-danger" style="width:30%" >Search </button><br>
                </form>
               <div class="table table-bordered">
                  
                           
                        <B>  Order Id : <?= @$det['orderid'] ?>  &nbsp;&nbsp;&nbsp;  Date <?=  @$det['date']   ?>;   Total <?= @$det['amount'] ?> &nbsp;&nbsp;&nbsp;  </b>

                        <table class=" table-bordered" <?=  $hide  ?>>

                            <tbody>

                                <tr>
                                    <td>
                                        <p>Payment Method: payment </p>
                                        <p> Shipping Address:  <?=  '' ?></p>
                                    </td>
                                   
                                    <td>
                                        Status: <?= @$det['status'] ?>
                                        
                                        <?php if (strcmp(@$det['status'],"Dispatched")==0 ){
                                           echo "<br>Delivery Person Details
                                            <br> Name: ".$det['deliveryperson']."<br>Number:".$det['delivery_person_num'];
                                           
                                        }?>
                                    </td>
                                    <td>
                                        Details
                                         <?php
                                         $food = @$det['item'];
                                       
                                                    $item = explode("-", $food);
                                                    echo "<b>" . ' Item Name:  ' . $item[0] . '  <br> Qty:  ' . $item[1] . '  <br> Amount  ' . $item[2] . "</b> <br> <hr>  <b> SubTotal (<del>N</del>)"
                                                            .((int)$item[1] * (int) $item[2])."</b>";
                                                    
                                                    ?>
                                    </td>
                                    <td>
                                        Update:
                                        <form method="post" action="updateorder.php">
                                            <select style="color:  #000" name="upd"   on>
                                                <option onclick="s1('Order Comfirmed')" <?php if(strcmp(@$_GET['se'],"Order Comfirmed")==0 || strcmp(@$det['status'],"Order Comfirmed")==0 ){ echo 'selected'; } ?>>
                                                    Order Comfirmed
                                                </option>
                                                <option onclick="s1('Processing')" <?php if(strcmp(@$_GET['se'],"Processing")==0 || strcmp(@$det['status'],"Processing")==0){ echo 'selected'; } ?>>
                                                    Processing
                                                </option>
                                                <option onclick="s('Dispatched')" <?php if(strcmp(@$_GET['se'],"Dispatched")==0 || strcmp(@$det['status'],"Dispatched")==0){ echo 'selected'; } ?>>
                                                    Dispatched
                                                </option>
                                                 <option onclick="s1('Delivered')" <?php if(strcmp(@$_GET['se'],"Delivered")==0 || strcmp(@$det['status'],"Delivered")==0){ echo 'selected'; } ?>>
                                                    Delivered
                                                </option>
                                                 <option onclick="s1('Cancel')" <?php if(strcmp(@$_GET['se'],"Cancel")==0 || strcmp(@$det['status'],"Cancel")==0){ echo 'selected'; } ?>>
                                                    Cancel
                                                </option>
                                            </select>
                                            
                                            <div  <?php if(!isset($_GET['d'])){ echo 'hidden';} ?> name="del">
                                                <b><i> Delivery Person</i></b><br>
                                                Name:<br>
                                            <input name="name"  style="color: #000" type="text" /><br>
                                            Number:<br>
                                            <input name="num"  style="color: #000" type="text" /><br>
                                            </div>
                                            <input type='hidden' style="color: #000" name='ide' value="<?= $_GET['i'] ?> " />
                                            <input type="hidden"  style="color: #000" name="d" value="<?= $_GET['d'] ?>" />
                                            <button class="btn-success">Update </button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>
            </div>
        </div>
        </div><br><br><br>
 <div class="row  "style="background-color: #ff6600; height: 200" >
           <div height="1500px" style="color: white; text-align: center; padding-top: 50px">
               
               <p> This is a Project done in fulfillment of BSC programme in Ebonyi State Univesity </p>
               <center> <p> (c) 2018 </p> </center>
             <center> <a href="index.php" > Go Back to Site </a></center>
           </div>
       </div>
        <script>
         function s(d){
        
           document.location = "updateorder.php?i=<?= urlencode($id);   ?>&d=t&se="+d;
            }
         function s1(d){
        
           document.location = "updateorder.php?i=<?= urlencode($id);   ?>&se="+d;
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


