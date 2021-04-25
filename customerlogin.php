<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "art_gallery";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
         
    $username = $_POST['username'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from customer where Customer_ID = '$username' and Customer_pass = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo '<script type="text/javascript"> alert("Login successfull") </script>'; 
            header("location: customerhome.html");

        }  
        else{  
            echo '<script type="text/javascript"> alert("Login failed") </script>'; 
            header("location: customerlogin.html");
        }     
?>  