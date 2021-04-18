<?php
/* Attempt MySQL server connection.*/
$conn = mysqli_connect("localhost", "root", "", "art_gallery");
 
// Check connection
if($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
// Escape user inputs for security
$Article_ID =  $_POST['Article_ID'];
$Artist_ID = $_POST['Artist_ID'];
$Event_ID =$_POST['Event_ID'];
$Article_style = $_POST['Article_style'];
$Article_title = $_POST['Article_title'];
$Price =  $_POST['Price'];
$Date_Arrival = date('Y-m-d', (strtotime($_POST['Date_Arrival'])));
$sold =  $_POST['sold'];

$sql = "INSERT INTO article VALUES ('$Article_ID','$Artist_ID', '$Event_ID', '$Article_style','$Article_title', '$Price','$Date_Arrival', '$sold')";

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
    <link rel="stylesheet" href="artist.css">
    <script src="functions.js"></script>
    <title>Article Data</title>
  </head>
  <body>
    <h1>Enter the necessary details</h1>
    <form name="article_add" method="POST", action="">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="article_id">Article ID</label>
            <input type="text" class="form-control" name="Article_ID" placeholder="Article Id" required>
          </div>
          <div class="form-group col-md-6">
            <label for="artist_id">Artist ID</label>
            <input type="text" class="form-control" name="Artist_ID" placeholder="Artist ID">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="event_id">Event ID</label>
                <input type="text" class="form-control" name="Event_ID" placeholder="Event ID">
            </div>
            <div class="form-group col-md-6">
                <label for="articlestyle">Article Style</label>
                <select name="Article_style" class="form-control">
                    <option value="Painting">Painting</option>
                    <option value="Sketching">Sketching</option>
                    <option value="Sculptures">Sculptures</option>
                    <option value="Ceramics">Ceramics</option>
                    <option value="Contemporary art">Contemporary art</option>
                </select>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="article_price">Price</label>
            <input type="number" class="form-control" name="Price">
          </div>
          <div class="form-group col-md-4">
            <label for="article_doa">Date of Arrival</label>
            <input type="date" class="form-control" name="Date_Arrival">
          </div>
          <div class="form-group col-md-4">
            <label for="article_title">Artist Title</label>
            <input type="text" class="form-control" name="Article_title" placeholder="Article Title">
          </div>
        </div>
          <div class="form-row">
          <div class="form-group col-md-4">
             <label for="sold">SOLD</label>
                <select name="sold" class="form-control">
                    <option value="1">YES</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>
</div>
        <button type="submit" name="submit" class="btn" style="background-color:rgb(119, 32, 32)"onclick="myfunc1()">Submit</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>