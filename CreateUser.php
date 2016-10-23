<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "agriffin", "password", "agriffin");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = $_POST["user_id"];

$insert = "INSERT INTO Users (user_id) VALUES ('$user_id')";
if($mysqli->query($insert)){
    echo "User ID added successfully.";
}
else{
    echo "Error. Could not add user_id to the database.";
}

/* close connection */
$mysqli->close();
?>
