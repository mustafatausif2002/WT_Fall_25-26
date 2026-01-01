<!DOCTYPE html>
<html>
<head><title>PHP Code</title></head>
<body>
<h1> Welcome to Registration</h1>
 
<?php
$name= "";
$success= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $errors['name'] = "Name cannot be empty.";
    } else {
        $name = $_POST['name'];
        if (str_word_count($name) < 2) {
            $errors['name'] = "Name must contain at least two words.";
        } elseif (!preg_match("/^[a-zA-Z]/", $name)) {
            $errors['name'] = "Name must start with a letter.";
        } elseif (!preg_match("/^[a-zA-Z.- ]*$/", $name)) {
            $errors['name'] = "Can contain a-z, A-Z, period, and dash only.";
        }
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Email cannot be empty.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Must be a valid email address.";
    }

    if (empty($errors)) {
        $success = "Validation Successful!";
    }
}
?>
 
<form method="post" action="">
NAME: <input type="text" name="name">
<?php if(isset($errors['name'])) echo "<span class='error'>".$errors['name']."</span>"; ?>
<input type="submit" value="Submit">
<br><br>

EMAIL: <input type="text" name="email">
<?php if(isset($errors['email'])) echo "<span class='error'>".$errors['email']."</span>"; ?>
<input type="submit" name="submit" value="Submit">
<br><br>


GENDER: <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
        <?php if(isset($errors['gender'])) echo "<span class='error'>".$errors['gender']."</span>"; ?>
        <input type="submit" value="Submit">
        <br><br>

DEGREE: <input type="checkbox" name="degree[]" value="SSC"> SSC
        <input type="checkbox" name="degree[]" value="HSC"> HSC
        <input type="checkbox" name="degree[]" value="BSc"> BSc
        <input type="submit" value="Submit">
        <br><br>

BLOOD GROUP: <select name="blood_group">
            <option value=""></option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        <?php if(isset($errors['blood_group'])) echo "<span class='error'>".$errors['blood_group']."</span>"; ?>
        <input type="submit" value="Submit">

 
 
</body>
</form>
</html>