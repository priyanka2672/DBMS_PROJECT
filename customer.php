<?php
/* Attempt MySQL server connection.*/
$conn = mysqli_connect("localhost", "root", "", "art_gallery");
 
// Check connection
if($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(isset($_POST['submit']))
 {
// Escape user inputs for security
$customer_id =  $_POST['customer_id'];
$cust_pass = $_POST['Customer_pass'];
$bill_amount= $_POST['bill_amount'];
$phone = $_POST['phone'];
$address = $_POST['address'];

  $sql = "INSERT INTO customer VALUES ( '$customer_id','$cust_pass','$bill_amount', '$phone', '$address')";

// Attempt insert query execution

if(mysqli_query($conn, $sql))
{
    echo '<script type="text/javascript"> alert("Record successfully inserted") </script>';
} 
else
{
  echo '<script type="text/javascript"> alert("Could not insert! Try again!") </script>';   
}
 
// Close connection
mysqli_close($conn);
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
    <link rel="stylesheet" href="customer.css">
    <script src="functions.js"></script>
    <title>Customer Data</title>
  </head>
  <body>
    <h1>Enter the necessary details</h1>
    <form name="customer_add" method="POST" action="">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="customer_id">Customer ID</label>
            <input type="number" class="form-control" name="customer_id" placeholder="Customer Id" required>
          </div>
          <div class="form-group col-md-4">
            <label for="cust_pass">Customer Password</label>
            <input type="text" class="form-control" name="Customer_pass" placeholder="Customer Password" required>
          </div>
          <div class="form-group col-md-4">
            <label for="customer_amt">Amount Invested</label>
            <input type="number" class="form-control" name="bill_amount" placeholder="Amount in Rupees">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="customer_phone">Phone Number</label>
              <input type="number" class="form-control" name="phone" placeholder="i.e +91...">
            </div>
            <div class="form-group col-md-6">
              <label for="customer_address">Address</label>
              <input type="text" class="form-control" name="address">
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn" style="background-color:rgb(119, 32, 32)"onclick="myfunc4()">Submit</button>
    </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>