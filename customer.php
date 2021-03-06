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
$bill_amount= $_POST['bill_amount'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$customer_pass = $_POST['customer_pass'];

$sql = "INSERT INTO `customer`(`Customer_ID`, `Customer_pass`, `Bill_amount`, `Phone`, `Address`) VALUES ('$customer_id','$customer_pass','$bill_amount','$phone','$address')";

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
    <title>Customer Data</title>
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
    <form name="customer_add" method="POST" action="">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Customer ID</label>
            <input type="number" class="form-control" id="customer_id" name="customer_id" placeholder="Customer Id" required>
          </div>
          <div class="form-group col-md-6">
            <label>Amount Invested</label>
            <input type="number" class="form-control" id="bill_amount" name="bill_amount" placeholder="Amount in Rupees">
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label>Phone Number</label>
              <input type="number" class="form-control" id="phone" name="phone" placeholder="i.e +91...">
            </div>
            <div class="form-group col-md-6">
              <label>Address</label>
              <input type="text" class="form-control" id="address" name="address">
            </div>
	          <div class="form-group col-md-6">
              <label>Customer Pass</label>
              <input type="text" class="form-control"  id="customer_pass" name="customer_pass" placeholder="Creat Password for Customer">
            </div>
        </div>

        <button type="submit" name="submit" class="btn" style="background-color:rgb(119, 32, 32)" onclick="myfunc4()">Submit</button>
    </form>
    <script>
        function myfunc4() {
            var x = document.forms["customer_add"]["customer_id"].value;
            if (x == "") {
                alert("Customer ID must be filled out");
                return false;
            }
            }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>