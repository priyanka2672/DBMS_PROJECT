<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="show.css">
    <title>Accountant Home</title>
    </head>
    <style>
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
    </style>
  <body>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="text-decoration:none" class="nav-link" id="customer-tab" data-toggle="tab" href ="#customer" role="tab" aria-controls="home" aria-selected="true">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="update-tab" data-toggle="tab"  role="tab" href="#update" aria-controls="profile" aria-selected="false">Update</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="home-tab">
        <table class="table table-hover table-dark mytable">
        <thead>
          <tr>
            <th scope="col">Customer ID</th>
            <th scope="col">Bill Amount</th>            
          </tr>
        </thead>
        <?php

              $conn = mysqli_connect("localhost","root","","art_gallery");

              if($conn-> connect_error){
                die("Connection failed:". $conn-> connect_error);
              }

              $sql = "SELECT * FROM accountsview";
              $res = $conn->query($sql);

              if($res->num_rows >0){
                while($row = $res-> fetch_assoc()){
                  echo "<tr><td>". $row["Customer_ID"]."</td><td>". $row["Bill_amount"]."</td><td>";
                }
                echo "</table>";
              }
              else{
                echo "lol";
              }
              $conn->close();
        ?>
        </div>
        <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="profile-tab">
        <form method="POST" action="">
          <div class="form-row">
          <div class="form-group col-md-6 myclass">
            <label>Customer ID</label>
            <input type="text" class="form-control" name="C_id" aria-describedby="emailHelp" placeholder="Enter Customer ID to be modifed">
          </div>
          <div class="form-group col-md-6 myclass ">
            <label>New Bill Amount </label>
            <input type="text" class="form-control" name="new_val" placeholder="Enter the new bill amount">
          </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
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
          $C_id =  $_POST['C_id'];
          $new_val =  $_POST['new_val'];

          $sql = "UPDATE accountsview SET Bill_amount='$new_val' WHERE Customer_ID='$C_id'";
          if(mysqli_query($conn, $sql))
          {
            echo '<script type="text/javascript"> alert("Record successfully modified") </script>';
          } 
          else
          {
            echo '<script type="text/javascript"> alert("Could not modify! Try again!") </script>'; 
          }
          
          // Close connection
          mysqli_close($conn);
          }?>
        </div>
        
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>