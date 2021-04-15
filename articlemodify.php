<?php
/* Attempt MySQL server connection.*/
$conn = mysqli_connect("localhost", "root", "", "art_gallery");

// Check connection
if($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submitmy']))
 {
  // Escape user inputs for security
  $article_id =  $_POST['article_id'];
  $attr = $_POST['attribute'];
  $new_val = $_POST['new_val'];
          
 // Attempt insert query execution
$sql = "UPDATE `article` SET $attr = '$new_val' WHERE Article_ID = '$article_id'";
if( ! mysqli_query($conn, $sql))
{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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
    <script src="functions.js"></script>
    
    <title>Article Modify</title>
    <style>
        h1{
            padding:20px;
            border:0;
            color: white;
            text-align: center;
            background-color:rgb(119, 32, 32);
            margin-bottom: 0%;
            }
        form{
            margin:20px 40px 20px 40px;
        }
        .myclass{
            margin:10px 0px;
        }
        button{
            display:block;
            margin-left:30%;
            margin-top:50px;
            width:500px;     
            color:white;
            font-weight:bold;      
        }
        #attribute{
          margin-left:20%;
        }
        </style>
  </head>
  <body>
    <h1>Enter the necessary details</h1>
    <form  method="POST" action="">
        <div class="form-row">
          <div class="form-group col-md-6 myclass">
            <label >Article ID</label>
            <input type="text" class="form-control" id="article_id" name="article_id" placeholder="Article Id" required>
          </div>
          <div class="form-group col-md-6 myclass">
                  <label> Enter the Attribute to be changed</label>
                  <select name="attribute" class="form-control">
                      <option selected>Choose...</option>
                      <option value="Artist_style">Article_style</option>
                      <option value="Price">Price In Rupees</option>
                      <option value="Sold">Sold</option>
                  </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 myclass">
            <label>Enter the new value</label>
              <input type="text" class="form-control" id="new_val" name="new_val" placeholder="New value">
          </div>
        </div>
                      
        <button type="submit" name="submitmy" class="btn" style="background-color:rgb(119, 32, 32)" onclick="myfunc6()">Submit</button>
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>