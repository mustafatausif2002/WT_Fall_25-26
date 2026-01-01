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

    $dd = $_POST['dd']; $mm = $_POST['mm']; $yyyy = $_POST['yyyy'];
    if (empty($dd) || empty($mm) || empty($yyyy)) {
        $errors['dob'] = "Date of birth cannot be empty.";
    } elseif (!($dd >= 1 && $dd <= 31) || !($mm >= 1 && $mm <= 12) || !($yyyy >= 1900 && $yyyy <= 2026)) {
        $errors['dob'] = "Invalid numbers (dd: 1-31, mm: 1-12, yyyy: 1900-2026).";
    }

    if (!isset($_POST['gender'])) {
        $errors['gender'] = "At least one gender must be selected.";
    }

    if (!isset($_POST['degree']) || count($_POST['degree']) < 2) {
        $errors['degree'] = "At least two degrees must be selected.";
    }

    if (empty($_POST['blood_group'])) {
        $errors['blood_group'] = "Blood group must be selected.";
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
<br><br><br>

EMAIL: <input type="text" name="email">
<?php if(isset($errors['email'])) echo "<span class='error'>".$errors['email']."</span>"; ?>
<input type="submit" name="submit" value="Submit">
<br><br><br>


DATE OF BIRTH:
        <table>
            <tr>
                <td>dd</td><td>mm</td><td>yyyy</td>
            </tr>
            <tr>
                <td><input type="text" name="dd" size="2"> /</td>
                <td><input type="text" name="mm" size="2"> /</td>
                <td><input type="text" name="yyyy" size="4"></td>
            </tr>
        </table>
        <?php if(isset($errors['dob'])) echo "<span class='error'>".$errors['dob']."</span>"; ?>
        <input type="submit" value="Submit">
        <br><br><br>

GENDER: <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
        <?php if(isset($errors['gender'])) echo "<span class='error'>".$errors['gender']."</span>"; ?>
        <input type="submit" value="Submit">
        <br><br><br>

DEGREE: <input type="checkbox" name="degree[]" value="SSC"> SSC
        <input type="checkbox" name="degree[]" value="HSC"> HSC
        <input type="checkbox" name="degree[]" value="BSc"> BSc
        <input type="checkbox" name="degree[]" value="MSc"> MSc
        <?php if(isset($errors['degree'])) echo "<span class='error'>".$errors['degree']."</span>"; ?>
        <input type="submit" value="Submit">
        <br><br><br>

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