<?php
    //instantiate connection
    require_once "../config/database.php";
    // instantiate email object
    require_once '../objects/emails.php';
            
    $database = new Database();
    $db = $database->getConnection();
           
    $emails = new Email($db);

    // get posted data
    $data = htmlspecialchars($_POST['email']);
    
    // make sure data is not empty
    if(
        !empty($data) 
     ){
                
            // set emails property values
            $emails->email = $data;
                
            // create the product
                    if($emails->create()){
                        header("location: ../welcome.php");
                        exit;
                    }
                
                    // if unable to create the email, tell the user
                    else{
                
                     header("location: ../error.php");
                    exit;

                    }

             
        }

     
?>