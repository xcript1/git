<?php
       class register_update{

 private $values;
     public $fields;
    public $DB_name;
       public $conn;
    public function __construct($values,$DB_name,$conn,$fields){
        $this-> values= $values;
          $this-> DB_name = $DB_name;
            $this-> conn = $conn;
          $this-> fields = $fields;
    }
    public  function getindetity($array,$value){
        $i=0;
     
    
        while($i<count($array)){
       
            if(strcmp($value,$array[$i])==0){
              
                return true;
            }
            $i++;
        }
        return false;
    }
    public function Register(){
        $fields = $this-> fields;
        $values = $this-> values;
   $db = $this-> DB_name;
  $f='';
  $v='';
    for ($i=0;$i<count($fields);$i++){
        if($i == count($fields)-1){
            $f .= "$fields[$i]";
        }else{
    $f .= "$fields[$i],";}}
    
    for ($i=0;$i<count($values);$i++){
        
        if($i == count($fields)-1){
             $v .= "'$values[$i]'";
            
        }else{
    $v .= "'$values[$i]',";}}
      $query_string = "INSERT INTO  $db ($f) VALUES ($v)";
           
    $conn = $this-> conn;
  
      $query_DB = mysqli_query($conn, $query_string);
     if($query_DB){
         return 'Registration Succesful';
     }else{
          return 'Registration unSuccesful';
     }
        
        
    }
    public function validate($field,$value){
        $db = $this-> DB_name;
         $conn= $this-> conn;

         $query = mysqli_query($conn,"SELECT * FROM $db WHERE $field='$value'");
  
       $num = mysqli_num_rows($query);
    
        return $num;
    }
    
    public function update($key,$id){
                $fields = $this-> fields;
        $values = $this-> values;
   $db = $this-> DB_name;

    $query_string = "UPDATE $db SET ";
    $i=0;
    do{
         if($i == count($fields)-1){
               $query_string .= $fields[$i].'='."'$values[$i]'"." WHERE $key='$id'";
         }
         else{
      $query_string .= $fields[$i].'='."'$values[$i]'".','; 
         }
         $i++;
    }while($i<count($fields));
           
    $conn = $this-> conn;

      $query_DB = mysqli_query($conn, $query_string);
     if($query_DB){
         return 'update Succesful';
     }else{
          return 'update unSuccesful';
     }
        
    }
    
}
























        ?>
  

