<?php
    require_once "header.php";
    require_once "validation.php";
    
    if(empty($_SESSION['id'])){
        header("Location: login.php");
    }

    $oldPassword = $newPassword = $newRetypePassword = $succesfull = "";
    $oldPasswordErr = $newPasswordErr = $newRetypePasswordErr = "";

    if(isset($_SESSION['id'])){
        $id_logged = $_SESSION['id'];
        $q = "SELECT password FROM users WHERE id = $id_logged";
        $result = $conn->query($q);
        $row = $result->fetch_assoc();
        $oldPasswordDB = $row['password'];
    }

    //VALIDATION
    $validated = true;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newRetypePassword = $_POST['newRetypePassword'];

        //Old Password == Old PasswordDB
        if($oldPasswordDB != md5($oldPassword)){
            $validated = false;
            $oldPasswordErr = "Incorrect password!";
        }

        // New Password validation
        if(passwordValidation($newPassword)){
            $validated = false;
            $newPasswordErr = passwordValidation($newPassword);
        }

        // New Retype password
        if(passwordValidation($newRetypePassword)){
            $validated = false;
            $newRetypePasswordErr = passwordValidation($newRetypePassword);
        }

        // Password == Retype password
        if($newPassword != $newRetypePassword){
            $validated = false;
            $newRetypePasswordErr = "Password and Retype password must be the same";
        }
        else {
            $newPassword = md5($newPassword);
        }

        if($validated){
            $q1 = "UPDATE users SET
            `password`= '$newPassword'
            WHERE id = '$id_logged'";
        if($conn->query($q1)){
            $succesfull = "*You have successfully changed your password*";
        }
        }
    }
?>

<br>
<form action="#" method="POST" class="font">
    <p class="form-group">  
        <label for="">Old password:</label>
        <input type="password" class="form-control" name="oldPassword" id="">
        <span class="error">*<?php echo $oldPasswordErr; ?></span>
    </p>
    <p class="form-group">  
        <label for="">New password:</label>
        <input type="password" class="form-control" name="newPassword" id="">
        <span class="error">*<?php echo $newPasswordErr; ?></span>
    </p>
    <p class="form-group">
        <label for="">Retype new password:</label>
        <input type="password" class="form-control" name="newRetypePassword" id="">
        <span class="error">*<?php echo $newRetypePasswordErr; ?></span>
    </p>
    <p class="form-group">
        <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit">
    </p>
</form>

<p class="font">
    <?php 
        echo $succesfull;
    ?>
</p>
<?php
    require_once "footer.php";
?>