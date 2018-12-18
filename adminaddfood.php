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
<?php require 'adminphp.php'; ?>
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
 <div style="background:orange; color:white;"><b><big>ADD NEW FOOD </big></b> <br> <hr>
     <form class="form-group" method="post"  action="adminphp.php" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <img src="" class="img-rounded" height="100px" width="100px " align="right" /><br>
                               
                            </td>
                            <td>
                                Select Picture : * <input type="file" align="right" name="img" class="form-control"/>
                                Name: * <input type="text" class="form-control" name ="foodname" />
                                 Price: * <input type="text" class="form-control" name ="foodprice"/>
                                  Description: * <input type="text" class="form-control" name ="fooddes"/>
                                   Status: * <select  class="form-control" name ="foodstatus">
                                       <option value="Available"> Available </option>
                                       <option value="Not Available"> Not Available </option>
                                   </select>
                                     Category: * <select  class="form-control" name ="foodcat" >
                                      <?php $r = mysqli_query($conn, "select category from category");
                                      while($re = mysqli_fetch_array($r)){  ?>
                                       <option value="<?=  $re['category']; ?> "> <?=  $re['category']; ?> </option>
                                      <?php }  ?>
                                     </select><br>
                                     <button class="form-control btn-primary"> Add </button>
                            </td>
                        </tr>
                    </table>
                </form>
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
            function setimage(){
            var img = document.getElementById('image');
            var val =  document.getElementByName('img');
         
    }
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

  <?php 
        
        if(isset($_GET['res'])){
            $result=$_GET['res'];
            echo "<script> alert($result); </script>";
        }
        
        ?>


    </body>
</html>


