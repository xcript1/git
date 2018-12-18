


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <input type="text" class="form-control" style="width:60%"/>
                    <button class="navbar-btn right form-control btn-danger" style="width:30%" >Search </buton>
                </form>
            </div>
            <div class="col-sm-4 navbar-Right" style="padding: 5px; padding-top: 10px;  " >
                <table align="center">
                    <tr>
                        <td>
                            <div class="dropdown " >
                                <p style="width:auto;"class="dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span> <label style="font-size: 15px; color:#990000; text-align: center"   />Your  <br> Account </label></span><span class="caret" > </span> 
                                </p>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenu1" style="padding:10px ;color:white;">
                                    <li><a class="btn-danger btn  awhite" href="login.php" style='color:white'> LOGIN </a>
                                        <br><label style='color:black;'> Don't have an Account? </label><a class='btn-info btn' style='color:white' href='register.php'> Sign Up </a> 


                                    </li><br>

                                    <label style='color:black; text-align: center;'> <center> Track Your Order </center></label>
                                    <li>
                                        <form class='form-group'>
                                            <label for='orderid' style='color:black;'> Order ID </label>
                                            <input class='form-control' type='text' name='orderid' />

                                            <label for='phone' style='color:black;'> Phone Number </label>
                                            <input class='form-control' type='text' name='phone' /><br>
                                            <Button class='btn btn-danger form-control'> Search </button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class=" navbar-Right" style="padding: 5px; padding-top: 5px; margin-left: 30px">
                                <a href='cart.php'><img src = 'img/cart.jpg' class="img-rounded" width="50px" height="50px" style='display:inline-block' /> </a>
                            </div>   
                        </td>
                    </tr>
                </table>
            </div>


        </div>
        <br><br>
<div class='row'>
            <div class='col-sm-12' style='padding-left: 100px; padding-right:100px'>
                <label class='alert-default form-control text-center ' style='color:white ; ' width='100%'>home </label>
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col-sm-4" style="padding:70px">
              
            </div>
            
            <div class="col-sm-4" style="padding:70px">
                <FORM class="form-group">
                    First Name : * <input class="form-control " type="text"/>
                       Surname : * <input class="form-control " type="text"/>
                           Phone : * <input class="form-control " type="tel"/>
                           Email: * <input class="form-control " type="email"/>
                            Address : * <input class="form-control " type="text"/>
                            Date Of Birth : <input type="date" class="form-control"/>
                </FORM>
            </div>
              <div class="col-sm-4" style="padding:70px">
               
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


