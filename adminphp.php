<?php $database_name = "fooddelivery";
        $database_username ="root";
        $database_host ="localhost";
        $database_pass ="";
        $response;
        $conn = mysqli_connect($database_host, $database_username, $database_pass) or trigger_error(mysql_error(), $error_type);
        $dbselect = mysqli_select_db($conn,$database_name);
        
        if (session_start() == null){
    session_start();
}
        $found = false;
        $log = false;
        require 'reg.php';
        require 'uploadme.php';
        
        if(isset($_POST['foodcat'])){
            
            if(isset($_FILES['img']['name'])){
    $uploadme  = new uploadme('img','upload');
    $uploadme->uploadfile();
            $loc = $uploadme -> finalname;
           $field = array('food_name','food_des','food_price','food_status','category','food_img');
            $values =array($_POST['foodname'],$_POST['fooddes'], $_POST['foodprice'],$_POST['foodstatus'],$_POST['foodcat'],$loc);
                $register = new register_update($values,'food_table',$conn,$field)    ;
                $result = $register-> register();
                    header("location:adminaddfood.php?res=$result");
                  $rp=  mysqli_fetch_array(mysqli_query($conn,"select num from category where category = '".$_POST['foodcat']."'"));
                  $n = ((int)$rp['num']) + 1;
                   mysqli_query($conn,"update category set num = '$n' where category = '".$_POST['foodcat']."'");
            } 
        }
        
        if(isset($_POST['foodser'])){
            $f= $_POST['foodser'];
             $query = mysqli_query($conn, "SELECT * FROM food_table WHERE food_name='$f");
             if($query){
                 $val = mysql_fetch_array($query);
                 header("location:adminremovefood.php");
             }
            
        }
        
        if(isset($_GET['g'])){
    unset($_SESSION['user']);
    unset($_SESSION['cartqty']);
    unset($_SESSION['item']);
    unset($_SESSION['cart']);
    unset($_SESSION['type']);
    session_destroy();
    header("location: index.php");
}
if(isset($_SESSION['user'])){
                                        $e = $_SESSION['user'];
                                        $person = mysqli_fetch_array(mysqli_query($conn,"select * from customer where email = '$e'"));
$log = true;}
if(isset($_POST['osearch'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $order = mysqli_fetch_array(mysqli_query($conn,"select orderid from order_table where orderid='$id' and userid = '$email'"));
    if(count($order)> 0){
        header("location: track.php?id=".urlencode($id));
    }else{
        //$found = true;
         header("location: track.php?f=true");
    }
}
    ?>    