<?php

// Connect to the database
$mysqli = new mysqli('hostname', 'username', 'password', 'database_name');

// Check for errors
if ($mysqli->connect_errno) {
  die('Connect Error: ' . $mysqli->connect_error);
}

// Write the SELECT query
$query = 'SELECT * FROM users WHERE username = ?';

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the parameter
$stmt->bind_param('s', $username);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the rows
while ($row = $result->fetch_assoc()) {
  // Do something with the row
  echo $row['username'] . '<br>';
}

// Close the statement
$stmt->close();

// Close the connection
$mysqli->close();
