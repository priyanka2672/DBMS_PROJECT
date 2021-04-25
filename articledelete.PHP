<?php
// php code to Delete data from mysql database 

if (isset($_POST['article_id'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "AG";

    // get id to delete
    $id = $_POST['article_id'];

    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    echo 'bro';
    // mysql delete query 
    $query = "DELETE FROM `article` WHERE `article`.`Article_ID` = $id ";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo '<script type="text/javascript"> alert("Record successfully Deleted!") </script>';
    } else {
        echo '<script type="text/javascript"> alert("Could not delete! Try again!") </script>';
    }
    mysqli_close($connect);
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

    <title>Delete Article Record</title>
    <style>
        h1 {
            padding: 20px;
            border: 0;
            color: white;
            text-align: center;
            background-color: rgb(119, 32, 32);
            margin-bottom: 0%;
        }

        form {
            width: 25%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <h1>Enter the necessary details</h1>
    <form>
        <div class="form-group">
            <label for="article_id"><b>Article ID</b></label>
            <input type="text" class="form-control" name="article_id" aria-describedby="emailHelp" placeholder="Enter article ID of record to be deleted">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>