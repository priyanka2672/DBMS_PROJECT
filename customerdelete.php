<?php
// php code to Delete data from mysql database 

if (isset($_POST['submit'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "art_gallery";

    // get id to delete
    $id = $_POST['customer_id'];

    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }

    // mysql delete query 
    $query = "DELETE FROM `customer` WHERE `Customer_ID` = $id ";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo '<script type="text/javascript"> alert("Record successfully Deleted!") </script>';
    } else {
        echo '<script type="text/javascript"> alert("Could not delete! Try again!") </script>';
    }
    mysqli_close($connect);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Delete Customer Record</title>
    <style>
        h1 {
            padding: 20px;
            border: 0;
            color: white;
            text-align: center;
            background-color: rgb(119, 32, 32);
            margin-bottom: 0%;
        }

        form {
            width: 25%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
<h1>
        <div class="form-row">
          <div class="form-group col-md-2">
          <a href="admin.html" class="btn btn-lg active" style="background-color:rgb(75, 9, 9);color:rgb(255, 255, 255);font-weight:bolder;"role="button" aria-pressed="true">Home</a>
          </div>
          <div class="form-group col-md-8">Enter the Necessary Details </div>
          <div class="form-group col-md-2">
            <a href="index.html" onclick="alert('Successfully Logged out!')"class="btn btn-lg active" style="background-color:rgb(75, 9, 9);color:rgb(255, 255, 255);font-weight:bolder;"role="button" aria-pressed="true">Log Out</a>
          </div>
        </div>
      </h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="customer_id"><b>Customer ID</b></label>
            <input type="text" class="form-control" id="customer_id" name="customer_id" aria-describedby="emailHelp" placeholder="Enter Customer ID of record to be deleted">
        </div>

        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>