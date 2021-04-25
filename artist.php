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
$artist_id =  $_POST['artist_id'];
$artist_fname = $_POST['artist_fname'];
$artist_lname =$_POST['artist_lname'];
$article_style = $_POST['article_style'];
$Phone =  $_POST['Phone'];
$Address = $_POST['Address'];
 
// Attempt insert query execution
$sql = "INSERT INTO `artist`(`Artist_ID`, `Artist_fname`, `Artist_lname`, `Article_style`, `Phone`, `Address`) VALUES ('$artist_id','$artist_fname','$artist_lname','$article_style','$Phone','$Address')";
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
        
    <title>Artist Data</title>
    
  </head>
  <body>
    <h1>Enter the necessary details</h1>
    <div class="myform">
    <form name="artist_add" method="POST" action="">
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Artist ID</label>
            <input type="number" class="form-control" name="artist_id" id="artist_id" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input type="text" class="form-control"  id="artist_fname" name="artist_fname" placeholder="First Name">
        </div>
      </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" class="form-control"  id="artist_lname" name="artist_lname" placeholder="Last Name">
            </div>
            <div class="form-group col-md-6">
                <label>Article style</label>
                <select name="article_style" id="article_style" class="form-control">
                    <option selected>Choose...</option>
                    <option value="Painting">Painting</option>
                    <option value="Sketching">Sketching</option>
                    <option value="Sculptures">Sculptures</option>
                    <option value="Ceramics">Ceramics</option>
                    <option value="Contemporary art">Contemporary art</option>
                </select>
            </div>
            
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Phone Number</label>
            <input type="number" class="form-control" id="Phone" name="Phone" placeholder="i.e +91...">
          </div>
          <div class="form-group col-md-6">
            <label>Address</label>
            <input type="text" class="form-control" name="Address" id="Address">
          </div>
        </div>
        
        <button type="submit" name ="submit" class="btn" style="background-color:rgb(119, 32, 32)" onclick="myfunc()" >Add Data</button>
    </form>
    <script>
        function myfunc() {
            var x = document.forms["artist_add"]["artist_id"].value;
            if (x == "") {
                alert("Artist ID must be filled out");
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