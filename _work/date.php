<?php
/*
// Connect to the database
$conn = mysqli_connect('hostname', 'username', 'password', 'database');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the current date and time into the database
$sql = "INSERT INTO table_name (date_column) VALUES (NOW())";

if (mysqli_query($conn, $sql)) {
    echo "Record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
*/