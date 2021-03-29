<?php
class Email{
  
    // database connection and table name
    private $conn;
    private $table_name = "emails";
  
    // object properties
    public $Id;
    public $username;
    public $task;
    public $time;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

   
// create email
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
             email=:email";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind values
    $stmt->bindParam(":email", $this->email);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}


}
?>