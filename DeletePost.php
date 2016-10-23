<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "agriffin", "password", "agriffin");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$delete = $_POST['choice'];
if(count($delete) == 0){
    echo "No posts were selected.";
}
else{
    for($x=0; $x < count($delete);$x++){

        $action = "DELETE FROM Posts WHERE post_id='".$delete[$x]."'";
        if($mysqli->query($action)){
            echo "Deletion successful<br>";
        }
        else{
            echo "An error occurred.";
        }
    }
}

/* close connection */
$mysqli->close();
?>
