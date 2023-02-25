<?php
try {
// Connect to the database
$dsn = 'mysql:host=hostname;dbname=database';
$username = 'username';
$password = 'password';

$dbh = new PDO($dsn, $username, $password);

// Update the database
$sql = "UPDATE table_name SET column_name = :new_value WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':new_value', $new_value);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Close the connection
$dbh = null;
} catch (PDOException $e) {
// An error occurred
echo $e->getMessage();
}
