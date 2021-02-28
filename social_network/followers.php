<?php
    require_once "header.php";

    if(empty($_SESSION['id'])){
        header("Location: login.php");
    }
?>
    <div class="width d-flex justify-content-center">
        <table class="table table-dark table-hover">
            <tr>
                <th>Full name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
                $id = $_SESSION['id']; // logged user

                //Follow
                if(!empty($_GET['follow'])){
                    $friendId = $conn->real_escape_string($_GET['follow']);

                    $q = "SELECT * FROM followers
                    WHERE sender_id = $id
                    AND receiver_id = $friendId;";
            
                    $result = $conn->query($q);
                    if($result->num_rows == 0){
                        $q = "INSERT INTO followers(sender_id, receiver_id)
                            VALUES ($id, $friendId);";
                        $result1 = $conn->query($q);
                        if(!$result1){
                            echo "<div class='error'>Error: " . $conn->error . "</div>";
                        }
                    }
                }

                //Unfollow
                if(!empty($_GET['unfollow'])){
                    $friendId = $conn->real_escape_string($_GET['unfollow']);

                    $q = "DELETE FROM followers
                        WHERE sender_id = $id
                        AND receiver_id = $friendId;";

                    $result = $conn->query($q);
                    if(!$result){
                        echo "<div class='error'>Error: " . $conn->error . "</div>";
                    }
                }

                $q = "SELECT users.id AS 'idUser', name, surname, username
                FROM users
                INNER JOIN profiles
                ON users.id = profiles.user_id
                WHERE users.id <> '$id'
                ;";

                $result = $conn->query($q);
                if($result->num_rows){
                    foreach($result as $row){
                        $friendId = $row['idUser'];
                        echo "<tr>";
                        echo "<td><a class='linksFormat' href='profile.php?profileId=$friendId'>" . $row['name'] . " " . $row['surname'] . "</a></td>";
                        echo "<td>" . $row['username'] . "</td>";
                        
                        $sql1 = "SELECT * FROM followers
                                WHERE sender_id = $id
                                AND receiver_id = $friendId";
                        $result = $conn->query($sql1);
                        $f1 = $result->num_rows;

                        $sql2 = "SELECT * FROM followers
                                WHERE sender_id = $friendId
                                AND receiver_id = $id";
                        $result2 = $conn->query($sql2);
                        $f2 = $result2->num_rows;

                        if($f1 == 0){
                            if($f2 == 0){
                                $text = "Follow";
                            }
                            else{
                                $text = "Follow back";
                            }
                            echo "<td><a href='followers.php?follow=$friendId' class='btn btn-success button'>$text</a></td>";
                        }
                        else{
                            echo "<td><a href='followers.php?unfollow=$friendId' class='btn btn-success button'>Unfollow</a></td>";
                        }




                        echo "</tr>";
                    }
                }
                else{
                    echo "There are no users in network";
                }



        
            ?>
        </table>
    </div>
<?php
    require_once "footer.php";
?>