<?php
    // importing our database connection file
   include('./connect/db_connect.php');
$email = $firstname = $lastname = $password = $cpassword = '';
$errors = array('email'=>'','firstname'=>'','lastname'=>'','password'=>'','cpassword'=>'');
if (isset($_POST['submit'])){
   // checking for errors and validation. htmlspecialchars() used to prevent cross site scripting
   if (empty($_POST['email'])){
      $errors['email'] = 'an email is required <br />';
    }else{
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = 'please enter a valid email address';
      }
    }
    if (empty($_POST['firstname'])){
        $errors['firstname'] = 'firstname is required <br />';
    }else{
        $firstname = $_POST['firstname'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $firstname)){
            $errors['firstname'] = "firstname must be alphabet and spaces only";
        }
    }
    if (empty($_POST['lastname'])){
        $errors['lastname'] = 'lastname is required <br />';
        }else{
            $lastname = $_POST['lastname'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $lastname)){
                $errors['lastname'] = "lastname must be alphabet and spaces only";
            }
        }
    if (empty($_POST['password'])){
        $errors['password'] = 'password is required <br />';
        }else{
            $password = $_POST['password'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $password)){
            $errors['password'] = "password must be alphabet and spaces only";
        }
    }
    if (empty($_POST['cpassword'])){
        $errors['cpassword'] = 'password is required <br />';
        if ($password != $cpassword) {
            $error['cpassword'] = 'password not matched!';
        }
        }else{
            $cpassword = $_POST['cpassword'];
        if (!preg_match("/^[a-zA-Z\s]+$/", $cpassword)){
            $errors['cpassword'] = "password must be alphabet and spaces only";
        }
    }
    // end of check
//    echo $_POST['email'].'<br/>';
//    echo $_POST['firstname']. '<br/>';
//    echo $_POST['password']. '<br/>';
//    echo $_POST['lastname']. '<br/>';
//    echo $_POST['user_type']. '<br/>';
    // sending data to database(sql) if no errors
    if (!array_filter($errors)){
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exist!';
    } else {
        if ($password != $cpassword) {
           $error[] = 'password not matched!';
        } else {
            $email = mysqli_real_escape_string($connect, ($_POST['email']));
            $lastname = mysqli_real_escape_string($connect, ($_POST['lastname']));
            $firstname = mysqli_real_escape_string($connect, ($_POST['firstname']));
            $password = mysqli_real_escape_string($connect, ($_POST['password']));
            $user_type = $_POST['user_type'];
            $cpassword = md5($_POST['cpassword']);
             //sending data to database
            $sql = "INSERT INTO user(lastname, firstname, email, password, user_type) VALUES('$lastname','$firstname','$email','$password','$user_type')";
             // make query to save connection and save data to database
            if (mysqli_query($connect,$sql)){
             header('Location: signin.php');
            }else {
             // checks if there any errors
             echo 'Error: ' . mysqli_error($connect);
            }
        }
      }
    }
}
//$insert_1 = "INSERT INTO user_details(name) VALUES('$name')";
?>

<!DOCTYPE html>
<html lang="en">
<?php
	include './templates/navbar.php';
?>
<div class="container">
<form action="" method="POST">
    <img src="edohublogo.png" alt="" width="150px">
    <?php
        // confirm password error message
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<span class="error-msg trans-03">' . $error . '</span>';
            }
        }
    ?>
    <div>
        <input 
            type="text" 
            name="firstname" 
            placeholder="firstname"
            value="<?php echo htmlspecialchars($firstname) ?>"
        >
        <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['firstname']; ?>
        </div>
    </div>
    <div>
        <input 
            type="text" 
            name="lastname" 
            placeholder="lastname"
            value="<?php echo htmlspecialchars($lastname) ?>"
        >
        <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['lastname']; ?>
        </div>
    </div>
    <div>
        <input 
            type="email" 
            name="email" 
            placeholder="email"
            value="<?php echo htmlspecialchars($email) ?>"
        >
        <!-- Error message -->
        <div class="error-message">
            <?php echo $errors['email']; ?>
        </div>
    </div>
    <div>
        <input 
            type="password" 
            name="password" 
            placeholder="password"
            value="<?php echo htmlspecialchars($password) ?>"
        >
        <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['password']; ?>
        </div>
    </div>
    <div>
        <input 
            type="password" 
            name="cpassword" 
            placeholder="confirm password"
            value="<?php echo htmlspecialchars($cpassword) ?>"
        >
        <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['cpassword']; ?>
        </div>
    </div>
    <div class="form-input flex-btw">
        <label for="">Account type</label>
        <select name="user_type" id="" required>
            <option value="user">User</option>
            <option value="user">Admin</option>
        </select>
        </div>
    <div id="button">
        <input 
            type="submit" 
            name="submit" 
            value="Sign Up">
    </div>
    <section>
        <small>
            Already have an account? <a href="/edojobsauthproject/signin.php">Sign In</a>
        </small>
    </section>
</form>
</div>

<?php
	include 'templates/footer.php';
?>