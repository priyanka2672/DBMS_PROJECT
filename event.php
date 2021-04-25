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
$event_id =  $_POST['event_id'];
$article_id= $_POST['article_id'];
$artist_id = $_POST['artist_id'];
$event_descrip = $_POST['event_descrip'];
$event_date = $_POST['event_date'];
$event_time = $_POST['event_time'];


$sql = "INSERT INTO `event`(`Event_ID`, `Article_ID`, `Artist_ID`, `Description`, `Event_Date`, `Event_time`) VALUES ('$event_id','$article_id','$artist_id','$event_descrip','$event_date','$event_time')";

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
    <link rel="stylesheet" href="event.css">
    <title>Event Data</title>
    
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
    <form name="event_add" method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="event_id">Event ID</label>
                <input type="number" class="form-control" name="event_id" id="event_id" placeholder="Event Id" required>
            </div>
            <div class="form-group col-md-4">
                <label for="article_id">Article ID</label>
                <input type="number" class="form-control"  name="article_id" id="article_id" placeholder="Article Id">
            </div>
            <div class="form-group col-md-4">
                <label for="artist_id">Artist ID</label>
                <input type="number" class="form-control" name="artist_id" id="artist_id" placeholder="Artist ID">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="event_date">Date of Event</label>
                <input type="date" class="form-control" id="event_date"  name="event_date">
            </div>
            <div class="form-group col-md-6">
                <label for="event_time">Time of Event</label>
                <input type="time" class="form-control" id="event_time" name="event_time">
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="event_descrip">Event Description</label>
            <input type="text" class="form-control" id="event_descrip" name="event_descrip">
          </div>
        </div>
        <button type="submit" name="submit" class="btn" style="background-color:rgb(119, 32, 32)"onclick="myfunc3()">Submit</button>
    </form>
    <script>
        function myfunc3() {
            var x = document.forms["event_add"]["event_id"].value;
            if (x == "") {
                alert("Event ID must be filled out");
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
