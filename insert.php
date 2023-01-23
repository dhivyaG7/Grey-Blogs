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
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Grey Blogs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"> </script>

  </head>

  
    <body>
      <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo">GREY</label>
        <ul>
          <li><a class="active" href="index.html">Home</a></li>
          <li><a class="active" href="fu.html">For You</a></li>
          <li><a href="blogs.html">New Post</a></li>
          <li><a href="posts.html">My Posts</a></li>
          

        </ul>
      </nav>


      <?php echo $_POST["title"]; ?><br>
    Your email address is: <?php echo $_POST["content"]; ?>

    </body>

    </html> 
