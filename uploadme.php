































<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadme
 *
 * @author Chido
 */
class uploadme {
    //put your code here
    private $fieldname;
    private $destination;
    public $finalname;
    public function __construct($input,$destination='uploads'){
        $this-> fieldname = $_FILES[$input];
        $destination .='/';
        if(!is_dir($destination)){
            
            
            mkdir($destination);
        }
        $this->destination = $destination;
        
        
    }
    private function getExtension(){
        
        $a = explode('.',$this->fieldname['name']);
        $a = $a[count($a)-1];
        return $a;
        
        
        
    }
    private function getname(){
        $name = rand(1111111,9999999).rand(11111,99999).'.'.$this->getExtension();
		$name = $this->destination.$name;
        return $name; 
        
    }
    public function uploadfile(){
        echo 'm here';
       $this->finalname = $filename = $this->getname();
       try{
       $result = move_uploaded_file($this->fieldname['tmp_name'], $filename);}catch(Exception $e)
       {
           echo $e->getMessage();
           
       }
        
       
        return $result;
    }
}

?>
