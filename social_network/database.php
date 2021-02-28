<?php
    require_once "connection.php";

    $q = "CREATE TABLE users(
        id INT UNSIGNED AUTO_INCREMENT,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE = InnoDB;";
    
    $q .= "CREATE TABLE profiles(
        id INT UNSIGNED AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        gender CHAR(1),
        dob DATE,
        user_id INT UNSIGNED UNIQUE,
        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users(id)
    ) ENGINE = InnoDB;";

    $q .= "CREATE TABLE followers(
        id INT UNSIGNED AUTO_INCREMENT,
        sender_id INT UNSIGNED NOT NULL,
        receiver_id INT UNSIGNED NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY(sender_id) REFERENCES users(id),
        FOREIGN KEY(receiver_id) REFERENCES users(id)
    ) ENGINE = InnoDB;";

    if($conn->multi_query($q)){
        echo "Uspesno je izvrsen niz upita";
    }
    else{
        echo "Error: " . $q. "<br>" . $conn->error;
    }
?>