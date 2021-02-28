<?php
    require_once "header.php";
    require_once "validation.php";

    if(empty($_SESSION['id'])){
        header("Location: login.php");
    }

    $name = $surname = $gender = $dob = $bio = $succesfull = "";
    $nameErr = $surnameErr = $dobErr = $bioErr = "";

    if(isset($_SESSION['id'])){
        $id_logged = $_SESSION['id'];
        $q = "SELECT user_id, name, surname, dob, gender, bio
            FROM profiles
            WHERE user_id = $id_logged";
        $result = $conn->query($q);
        if($result->num_rows){
            foreach($result as $row){
                $name = $row['name'];
                $surname = $row['surname'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $bio = $row['bio'];
            }
        }

        $male = $female = $other = "";
        if($gender == "m"){
            $male = "checked";
        }
        elseif($gender == "f"){
            $female = "checked";
        }
        elseif($gender == "o"){
            $other = "checked";
        }
    }

    //VALIDATION
    $validated = true;
    $nameErr = $surnameErr = $dobErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $bio = $_POST['bio'];
    
        // Name validation
        if(textValidation($name)){
            $validated = false;
            $nameErr = textValidation($name);
        }
        else {
            $name = trim($name);
            $name = preg_replace('/\s\s+/', ' ', $name);
        }

        // Surname validation
        if(textValidation($surname)){
            $validated = false;
            $surnameErr = textValidation($surname);
        }
        else {
            $surname = trim($surname);
            $surname = preg_replace('/\s\s+/', ' ', $surname);
        }

        // Date of birth validation
        if(dobValidation($dob)){
            $validated = false;
            $dobErr = dobValidation($dob);
        }

        //Biography validation
        if(empty($bio)){
            $validated = false;
            $bioErr = "This field can't be empty!";
        }

        if($validated){
            $q1 = "UPDATE `profiles` SET 
                `name`= '$name',
                `surname`= '$surname',
                `gender`= '$gender',
                `dob`= '$dob',
                `bio` = '$bio'
                WHERE id = '$id_logged'";
            if($conn->query($q1)){
                $succesfull = "*You have successfully changed your profile*";
            }
        }
    }


?>
<br>
    <form action="#" method="POST" class="font">
        <p class="form-group">
            <label for="">Name:</label>
            <input type="text" class="form-control" name="name" id="" value="<?php echo $name; ?>">
            <span class="error">*<?php echo $nameErr; ?></span>
        </p>
        <p class="form-group">
            <label for="">Surname:</label>
            <input type="text" class="form-control" name="surname" id="" value="<?php echo $surname; ?>">
            <span class="error">*<?php echo $surnameErr; ?></span>
        </p>
        <p class="form-group">
            <label for="">Gender:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="m" <?php echo $male ?>>Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="f" <?php echo $female ?>>Female
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="o" <?php echo $other ?>>Other
                </label>
            </div>
        </p>
        <p class="form-group">
            <label for="">Date of birth:</label>
            <input type="date" class="form-control" name="dob" min="1900-01-01" id="" value="<?php echo $dob; ?>">
        </p>
        <p class="form-group">
            <label for="">About me:</label>
            <textarea name="bio" class="form-control" id="" cols="30" rows="5"><?php echo $bio; ?></textarea>
            <span class="error">*<?php echo $bioErr; ?></span>
        </p>
        <p class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit">
        </p>
        <p class="form-group">
            <input type="reset" class="form-control btn btn-dark" name="reset" value="Reset">
        </p>
        
    </form>

    <p class="font">
        <?php
            echo $succesfull;
            $name = $surname = $gender = $dob = $bio = "";
            $nameErr = $surnameErr = $dobErr = $bioErr = "";
        ?>
    </p>
<?php
    require_once "footer.php";
?>