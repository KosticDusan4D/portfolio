<?php
    require_once "connection.php";
    require_once "validation.php";
    
    $validated = true;
    $name = $surname = $gender = $dob = $username = $password = $retypePassword = "";
    $nameErr = $surnameErr = $dobErr = $usernameErr = $passwordErr = $retypePasswordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $retypePassword = $_POST['retypePassword'];

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

        // Username validation
        if(usernameValidation($username, $conn)){
            $validated = false;
            $usernameErr = usernameValidation($username, $conn);
        }

        // Password validation
        if(passwordValidation($password)){
            $validated = false;
            $passwordErr = passwordValidation($password);
        }

        // Retype password
        if(passwordValidation($retypePassword)){
            $validated = false;
            $retypePasswordErr = passwordValidation($retypePassword);
        }

        // Password == Retype password
        if($password != $retypePassword){
            $validated = false;
            $retypePasswordErr = "Password and Retype password must be the same";
        }
        else {
            $password = md5($password);
        }

        //SQL ready variables
        $name = $conn->real_escape_string($name);
        $surname = $conn->real_escape_string($surname);
        $gender = $conn->real_escape_string($gender);
        $dob = $conn->real_escape_string($dob);
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
        $retypePassword = $conn->real_escape_string($retypePassword);

        if($validated){
            $q1 = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
            $conn->query($q1);
                
            $q2 = "SELECT id FROM users WHERE `username` LIKE '$username';";
            $result = $conn->query($q2);
            if($result->num_rows){
                foreach($result as $row){
                    $user_id = $row['id'];
                }
            }

            $q3 = "INSERT INTO profiles (name, surname, gender, dob, user_id) VALUES ('$name', '$surname', '$gender', '$dob', '$user_id');";
            if($conn->query($q3)){
                header('Location: login.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
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
                    <input type="radio" class="form-check-input" name="gender" value="m">Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="f">Female
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="o" checked>Other
                </label>
            </div>
        </p>
        <p class="form-group">
            <label for="">Date of birth:</label>
            <input type="date" class="form-control" name="dob" min="1900-01-01" id="" value="<?php echo $dob; ?>">
        </p>
        <p class="form-group">
            <label for="">Userame:</label>
            <input type="text" class="form-control" name="username" id="">
            <span class="error">*<?php echo $usernameErr; ?></span>
        </p>
        <p class="form-group">
            <label for="">Password:</label>
            <input type="password" class="form-control" name="password" id="">
            <span class="error">*<?php echo $passwordErr; ?></span>
        </p>
        <p class="form-group">
            <label for="">Retype password:</label>
            <input type="password" class="form-control" name="retypePassword" id="">
            <span class="error">*<?php echo $retypePasswordErr; ?></span>
        </p>
        <p class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit">
        </p>
        <p class="form-group">
            <input type="reset" class="form-control btn btn-dark" name="reset" value="Reset">
        </p>
    </form>

    
<?php 
    $name = $surname = $gender = $dob = $username = $password = $retypePassword = "";
    $nameErr = $surnameErr = $dobErr = $usernameErr = $passwordErr = $retypePasswordErr = "";
    require_once "footer.php";
?>