<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Artist Search</title>
    <style>
      body {
          margin: 0;
        }
        
        ul {
          list-style-type: none;
          margin: 0;
          padding: 15px;
          width: 25%;
          background-color: #f1f1f1;
          position: fixed;
          height: 100%;
          overflow: auto;
        }
        
        li a {
          display: block;
          color: #000;
          padding: 8px 16px;
          text-decoration: none;
          border-radius: 10px;
          margin-bottom: 5px;
        }
        
        li a.active {
          background-color: rgb(119, 32, 32);
          color: white;
          text-decoration: none;
        }
        
        li a:hover:not(.active) {
          background-color: #555;
          color: white;
          text-decoration: none;
        }
        .mytable{
            margin:20px auto;
            padding-top:20px;
            border-radius: 10px;
            border-color:rgb(255, 255, 255);
            max-width:1100px;
        }
        .mybtn{
            display:block;
            margin:20px auto;
            max-width:100px;
            background-color:rgb(119, 32, 32);
            border-color: rgb(119, 32, 32);
            font-weight:bolder;
        }
                 
      </style>
  </head>
  <body>
  <ul>
          <li><a  href="customerhome.html">The Art Gallery</a></li>
          <li><a href="artdisplay.html">Articles</a></li>
          <li><a href="eventdisplay.html">Events</a></li>
          <li><a class="active" href="artistsearch.php">Search By Artist</a></li>
          <li><a href="eventsearch.php">Search By Event</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="index.html" onclick="alert('Successfully Logged out!')"role="button" aria-pressed="true">Log Out</a></li>
        </ul>
        
        <div style="margin-left:25%;padding:50px 30px;height:1000px;" class="custcontent">
      
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