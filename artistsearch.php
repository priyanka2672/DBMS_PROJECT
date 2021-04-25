<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="artist.css">
    <title>Artist Search</title>
  </head>
  <body>
    <h1>
        <div class="form-row">
          <div class="form-group col-md-2">
          <a href="customerhome.html" class="btn btn-lg active" style="background-color:rgb(75, 9, 9);color:rgb(255, 255, 255);font-weight:bolder;"role="button" aria-pressed="true">Home</a>
          </div>
          <div class="form-group col-md-8">Art Gallery </div>
          <div class="form-group col-md-2">
            <a href="index.html" onclick="alert('Successfully Logged out!')"class="btn btn-lg active" style="background-color:rgb(75, 9, 9);color:rgb(255, 255, 255);font-weight:bolder;"role="button" aria-pressed="true">Log Out</a>
          </div>
        </div>
      </h1>
      <div style="margin-left:25%;padding:50px 30px;height:1000px;" >
        <form method="POST" action="">
            <label>Enter First Name of the Artist  to be Searched</label>
            <input type="text" class="form-control" name="artist_name" placeholder="Artist First Name">
            <button type="submit" name="submit" class="btn btn-primary mybtn">SUBMIT</button>
        </form>
      <table class="table table-hover table-dark mytable">
        <thead>
          <tr>
            <th scope="col">Artist ID</th>
            <th scope="col">Article Title</th>
            <th scope="col">Article Style</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <?php

              $conn = mysqli_connect("localhost","root","","art_gallery");

              if($conn-> connect_error){
                die("Connection failed:". $conn-> connect_error);
              }
              if(isset($_POST['submit']))
              {
              $name = $_POST['artist_name'];
              $sql = "CALL customsearch('$name') ";
              $res = $conn->query($sql);

              if($res->num_rows >0){
                while($row = $res-> fetch_assoc()){
                  echo "<tr><td>". $row["Artist_ID"]."</td><td>". $row["Article_title"]."</td><td>". $row["Art_style"]. "</td><td>". $row["Price"]. "</td><td>";
                }
                echo "</table>";
              }
              else{
                echo "error";
              }
              $conn->close();
            }
        ?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>