

<?php
       class login{

 private $user_id;
    private $pass_id;
    public $DB_name;
       public $conn;
    public function __construct($user_id,$pass_id,$DB_name,$conn){
        $this-> user_id = $user_id;
         $this-> pass_id = $pass_id;
          $this-> DB_name = $DB_name;
            $this-> conn = $conn;
        
    }
public function getpack($field,$value){
      $db = $this-> DB_name;
      $conn = $this-> conn;
       $query_string = "SELECT * FROM $db WHERE $field= '$value' ";
}
    public function getlog(){
      $db = $this-> DB_name;
    $u = $this-> user_id;
    $p = $this-> pass_id;
     $query_string = "SELECT * FROM $db WHERE username = '$u' and password 
           = '$p'";
     $conn = $this-> conn;
      $query_DB = mysqli_query($conn, $query_string);
         $query_DB;
  
        if($query_DB){
            $array = mysqli_fetch_array($query_DB);
           
            return $array;
        }else{
       
        echo false;
        
        return 'login unsuccesful';}
    }
}
























        ?>
  
