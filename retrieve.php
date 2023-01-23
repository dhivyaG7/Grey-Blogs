<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// CREATE CONNECTION
$conn = new mysqli($servername,
	$username, $password, $dbname);

// GET CONNECTION ERRORS
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// SQL QUERY
$query = "SELECT * FROM `posts`;";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

	if ($result->num_rows > 0)
	{
		// OUTPUT DATA OF EACH ROW
		while($row = $result->fetch_assoc())
		{
			echo " Post " .
            $row['user_id']."- title: ".
            $row['title']." | tag: ".
            $row['tag']." | content: ".
            $row['content']. "<br>";


		}
	}
	else {
		echo "0 results";
	}

$conn->close();

?>
