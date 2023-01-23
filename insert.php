<?php
    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $user_id = $_POST['user_id'];
        $title = $_POST['title'];
        $tag = $_POST['tag'];
        $content = $_POST['content'];
    }

    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO contactform_entries (id, fname, lname, email) VALUES ('0', '$user_id', '$title', '$tag','$content')";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
    }
  
    // close connection
    mysqli_close($con);

?>