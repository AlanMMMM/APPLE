<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>



<?php  
   
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["confirm"];  
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "please enter all the information";  
        }  
        else 
        {  
            
            
            if($psw != $psw_confirm){
            
            echo "please enter the same password";
            
            }
            
            if($psw == $psw_confirm)  
            {  
      $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";

		     // define connection variable
 
       $conn = mysqli_connect($servername,$username,$password,$dbname);         
                $query = "select username from user where username = '$user';"; //sql
                $result = mysqli_query($conn,$query);    
                $num = mysqli_num_rows($result); 
                if($num)    //already exist 
                {  
                    echo "user already exist";  
                }  
                else    //now existing user
                {  
                    $insertQuery = "insert into user (username,password,role) values('$user','$psw','student');";  
                    $insertResult = mysqli_query($conn,$insertQuery);  
                     
                    if($insertResult)  
                    {  
                        echo "register successfully, please go log in";  
                        
                        
                        
                        
                        
                    } 
                    
       
                     
                }  
            }  
        }  
    
   
?>

