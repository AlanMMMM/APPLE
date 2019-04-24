<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>


<?php  

   
        $user = $_POST["username"];  

        $psw = $_POST["password"];  

        if($user == "" || $psw == "")  

        {  

            echo "please enter username or password!";  

        }  

        else 

        {  
      $servername = "localhost";
      $username = "amstg";
      $password = "seas";
      $dbname = "amstg";

 $conn = mysqli_connect($servername,$username,$password,$dbname);



if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
      }
      else{
        //echo "Connection successful <br/><br/>";
      }
  
  
  //connection check    
      
      
            $query = "select * from user where username = '$user' and password = '$psw';";  

            $result = mysqli_query($conn,$query);
            
            $row = mysqli_fetch_assoc($result);  
            
            if($result){
            //echo "query succesful";
            }
            else{
            //echo "query failed";

            //echo "select * from user where username = '$user' and password = '$psw';"; 
            }

            $num = mysqli_num_rows($result);
            $_SESSION["uid"] = $row["uid"];
          
              //echo $num;
            if($num)  

            {

                 header('Location: mainpage.php');

                
            }  

            else 

            {
                echo "wrong username or password";
            }  

        }  

      
   

?>
