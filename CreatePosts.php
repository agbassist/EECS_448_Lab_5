<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "agriffin", "password", "agriffin");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = $_POST["user_id"];
$comment = $_POST["comment"];

$user_search = $mysqli->query("SELECT * FROM Users WHERE user_id='".$user_id."'");

if($user_search){

    if( empty($user_search->fetch_all()) ){
        echo "User not found";
    }
    else if(empty($comment)){

        echo "Must enter text!";
    }
    else{
        $post_id = rand(0,10000);
        $id_search = "SELECT post_id FROM Posts WHERE post_id='$post_id'";

        while( !empty(($mysqli->query($id_search)->fetch_all())) ){ #make sure that the post_id is unique
            $post_id = rand(0,10000);
        }

        $insert = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$post_id', '$comment', '$user_id')";

        if($mysqli->query($insert)){
            echo "Post added successfully!";
        }
    }
}

/* close connection */
$mysqli->close();
?>
