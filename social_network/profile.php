<?php
    require_once "header.php";

    if(empty($_SESSION['id'])){
        header("Location: login.php");
    }
    $profile_id = null;
    if(empty($profile_id)){
        $profile_id = $_GET['profileId'];
    }

    $q = "SELECT id FROM users WHERE id = '$profile_id'";
    $result = $conn->query($q);
    if($result->num_rows == 0){
        echo "<p class='errorId'>That profiles doesn't exist</p>";
    }

    $q1 = "SELECT users.id AS 'id', profiles.name AS 'name', profiles.surname AS 'surname', users.username AS 'username', profiles.dob AS 'dob', profiles.gender AS 'gender', profiles.bio AS 'bio'
    FROM users
    INNER JOIN profiles
    ON users.id = profiles.user_id
    WHERE users.id = '$profile_id'";
    
    $result = $conn->query($q1);
    if($result->num_rows){
        foreach($result as $row){
            $name = $row['name'];
            $surname = $row['surname'];
            $username = $row['username'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $bio = $row['bio'];
        }
    }

    $class = "";
    if($gender == "m"){
        $class = "male";
        $gender = "Male";
    }
    elseif($gender == "f"){
        $class = "female";
        $gender = "Female";
    }
    else{
        $class = "other";
        $gender = "Other";
    }


?>
<div  class="width d-flex justify-content-center">
    <table class="table table-light table-hover">
        <tr>
            <td class="font-weight-bold">First Name</td>
            <td class="<?php echo $class; ?>"><?php echo $name ?></td>
        </tr>
        <tr>
            <td class="font-weight-bold">Last Name</td>
            <td class="<?php echo $class; ?>"><?php echo $surname ?></td>
        </tr>
        <tr>
            <td class="font-weight-bold">Username</td>
            <td class="<?php echo $class; ?>"><?php echo $username ?></td>
        </tr>
        <tr>
            <td class="font-weight-bold">Date of birth</td>
            <td class="<?php echo $class; ?>"><?php echo $dob ?></td>
        </tr>
        <tr>
            <td class="font-weight-bold">Gender</td>
            <td class="<?php echo $class; ?>"><?php echo $gender ?></td>
        </tr>
        <tr>
            <td class="font-weight-bold">About me</td>
            <td class="<?php echo $class; ?>"><?php echo $bio ?></td>
        </tr>
        <tr>
            <td colspan="2"><a href="followers.php" class="btn btn-dark">Back to followers</a></td>
        </tr>
    </table>
</div>
<?php
    require_once "footer.php";
?>