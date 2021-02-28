<?php
    require_once "connection.php";

    $q = "ALTER TABLE profiles
        ADD bio TEXT;";
    if($conn->multi_query($q)){
        echo "Uspesno je izvrsen upit";
    }
    else{
        echo "Error: " . $q. "<br>" . $conn->error;
    }
?>