<?php require_once 'adminphp.php';
 
 if(isset($_POST['foodser'])){
         $f= $_POST['foodser'];
   
             $query = mysqli_query($conn, "SELECT * FROM food_table WHERE food_name='$f'");
             if($query){
                 
              $val = mysqli_fetch_array($query);
          
               $_SESSION['temp'] = $val['food_price'];
             }
            
        }

 if(isset($_POST['fud'])){ 
          $f= $_POST['fud'];
   
          $values = array($_POST['fud_price'],$_POST['fud_des'],$_POST['fud_status'],$_POST['fud_cat'],$_SESSION['temp']);
           $fields = array('food_price','food_des','food_status','category','oldfood_price');
          $reg = new register_update($values, 'food_table', $conn, $fields);
             $ress = $reg->update('food_name',$f);
            if(strcmp($ress,"update Succesful")==0){
           $rp=  mysqli_fetch_array(mysqli_query($conn,"select num from category where category = '".$_POST['fud_cat']."'"));
                 $n = ((int)$rp['num']) + 1;
              
                   mysqli_query($conn,"update category set num = '$n' where category = '".$_POST['fud_cat']."'");
                   echo "<script> alert('Succesful'); </script>";
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
                      <a href="addcat.php" class="list-group-item btn "   > ADD CATEGORY <span class="badge"></span></a> 
                             <a href="adminphp.php?g=logout" class="list-group-item btn "   > LOG OUT <span class="badge"></span></a> 
              
                </div>

            </div>


            <div class="col-sm-9" style="padding:70px">
 <div style="background:orange; color:white;"><b><big>EDIT FOOD </big></b> <br> <hr>
     <form class=" form-group form-inline" align="center" method="post" action="adminupdatefood.php">
                    <input  name="foodser" type="text" class="form-control" style="width:60%" placeholder="Enter Food Name"/>
                    <button class="form-control btn-danger" style="width:30%" >Search </button><br>
                </form>
                <?php if (isset($val)){  ?>
                <form class="form-group" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <img src="<?= $val['food_img'] ?>" class="img-rounded" height="100px" width="100px " align="right" /><br>
                               
                            </td>
                            <td>
                               
                                Name: * <input name="fud" type="text" class="form-control" value ="<?= $val['food_name'] ?>" />
                                 Price: * <input type="text" name="fud_price" class="form-control" value ="<?= $val['food_price'] ?>" />
                                  Description: * <input name="fud_des" type="text" class="form-control" value ="<?= $val['food_des'] ?>" />
                                   Status: * <select name="fud_status" class="form-control" value ="<?= $val['food_status'] ?>">
                                       <option value="Available"> Available </option>
                                       <option value="Not Available"> Not Available </option>
                                   </select>
                                     Category: * <select  name="fud_cat" class="form-control" value ="<?= $val['category'] ?>">
                                     <?php $r = mysqli_query($conn, "select category from category");
                                      while($re = mysqli_fetch_array($r)){  ?>
                                       <option value="<?=  $re['category']; ?>"> <?=  $re['category']; ?> </option>
                                      <?php }  ?>
                                     </select><br>
                                     <button class="form-control btn-success"> UPDATE </button>
                            </td>
                        </tr>
                    </table>
                </form>
     <?php } ?>
            </div>
        </div>
        </div>
  <div class="row  "style="background-color: #ff6600; height: 200" >
           <div height="1500px" style="color: white; text-align: center; padding-top: 50px">
               
               <p> This is a Project done in fulfillment of BSC programme in Ebonyi State Univesity </p>
               <center> <p> (c) 2018 </p> </center>
               <center> <a href="index.php" > Go Back to Site </a></center>
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


