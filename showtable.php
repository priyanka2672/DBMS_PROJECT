
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href = "show.css">
    <title>Tables</title>
  </head>
  <body>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="text-decoration:none" class="nav-link" id="artist-tab" data-toggle="tab" href ="#artist" role="tab" aria-controls="home" aria-selected="true">Artist Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="article-tab" data-toggle="tab"  role="tab" href="#article" aria-controls="profile" aria-selected="false">Article Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="customer-tab" data-toggle="tab" role="tab" href ="#customer"aria-controls="contact" aria-selected="false">Customer Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="event-tab" data-toggle="tab"  role="tab" href="#event" aria-controls="contact" aria-selected="false">Event Table</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="artist" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-hover table-dark mytable">
                <thead>
                  <tr>
                    <th scope="col">Artist ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Art Style</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <?php

                      $conn = mysqli_connect("localhost","root","","art_gallery");

                      if($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                      }

                      $sql = "SELECT * FROM artist";
                      $res = $conn->query($sql);

                      if($res->num_rows >0){
                        while($row = $res-> fetch_assoc()){
                          echo "<tr><td>". $row["Artist_ID"]."</td><td>". $row["Artist_fname"]."</td><td>". $row["Artist_lname"]. "</td><td>". $row["Article_style"]. "</td><td>". $row["Phone"] ."</td><td>" . $row["Address"]. "</td><td>";
                        }
                        echo "</table>";
                      }
                      else{
                        echo "lol";
                      }
                      $conn->close();
                ?>
        </div>
        <div class="tab-pane fade" id="article" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table table-hover table-dark mytable">
                <thead>
                  <tr>
                    <th scope="col">Article ID</th>
                    <th scope="col">Artist_ID</th>
                    <th scope="col">Event_ID</th>
                    <th scope="col">Article Style</th>
                    <th scope="col">Article Title</th>
                    <th scope="col">Price (in rupees)</th>
                    <th scope="col">Date of Arrival</th>
                    <th scope="col">Sold</th>
                  </tr>
                </thead>
                <?php

                      $conn = mysqli_connect("localhost","root","","art_gallery");

                      if($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                      }

                      $sql = "SELECT * FROM article";
                      $res = $conn->query($sql);

                      if($res->num_rows >0){
                        while($row = $res-> fetch_assoc()){
                          echo "<tr><td>". $row["Article_ID"]."</td><td>". $row["Artist_ID"]."</td><td>". $row["Event_ID"]. "</td><td>". $row["Article_style"]. "</td><td>". $row["Article_title"]. "</td><td>". $row["Price"] ."</td><td>" . $row["Date_Arrival"]. "</td><td>". $row["sold"]. "</td><td>";
                        }
                        echo "</table>";
                      }
                      else{
                        echo "lol";
                      }
                      $conn->close();
                ?>
        </div>
        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table table-hover table-dark mytable">
                <thead>
                  <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Password</th>
                    <th scope="col">Bill Amount</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <?php

                      $conn = mysqli_connect("localhost","root","","art_gallery");

                      if($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                      }

                      $sql = "SELECT * FROM customer";
                      $res = $conn->query($sql);

                      if($res->num_rows >0){
                        while($row = $res-> fetch_assoc()){
                          echo "<tr><td>". $row["Customer_ID"]."</td><td>". $row["Customer_pass"]."</td><td>". $row["Bill_amount"]. "</td><td>". $row["Phone"] ."</td><td>" . $row["Address"]. "</td><td>";
                        }
                        echo "</table>";
                      }
                      else{
                        echo "lol";
                      }
                      $conn->close();
                ?>
        </div>
        <div class="tab-pane fade" id="event" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table table-hover table-dark mytable">
                <thead>
                  <tr>
                    <th scope="col">Event ID</th>
                    <th scope="col">Article ID</th>
                    <th scope="col">Artist ID</th>
                    <th scope="col">Event Description</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Time</th>
                  </tr>
                </thead>
                <?php

                      $conn = mysqli_connect("localhost","root","","art_gallery");

                      if($conn-> connect_error){
                        die("Connection failed:". $conn-> connect_error);
                      }

                      $sql = "SELECT * FROM `event`";
                      $res = $conn->query($sql);

                      if($res->num_rows >0){
                        while($row = $res-> fetch_assoc()){
                          echo "<tr><td>". $row["Event_ID"]."</td><td>". $row["Article_ID"]."</td><td>". $row["Artist_ID"]. "</td><td>". $row["Description"]. "</td><td>". $row["Event_Date"] ."</td><td>" . $row["Event_time"]. "</td><td>";
                        }
                        echo "</table>";
                      }
                      else{
                        echo "lol";
                      }
                      $conn->close();
                ?>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>