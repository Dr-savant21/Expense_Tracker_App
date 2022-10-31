<?php 

include ('connect/db_connect.php');
if (isset($_POST['submit'])) {
    session_start();
    // $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, ($_POST['password']));

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($connect, $select);

    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
    if ($row['user_type'] == 'user') {
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_name'] = $row['firstname'];
            $_SESSION['last_name'] = $row['lastname'];
            $_SESSION['user_balance'] = $row['user_balance'];
            $_SESSION['user_income'] = $row['user_income'];
            $_SESSION['user_expense'] = $row['user_expense'];
            header('location: dashboard.php');
        }
    }else if ($email == '' && $password == ''){
        $error[] = 'Email and password is needed';
    }else {
        $error[] = 'Incorrect Email or Password!';
    }
};

?>
<!DOCTYPE html>
<html lang="en">
<?php
	include 'templates/navbar.php';
?>

<div class="container">
    <form action="./signin.php" method="POST">
    <img src="edohublogo.png" alt="" width="150px">
    <?php
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
        }
    ?>
    <div>
        <input 
            type="email" 
            name="email" 
            placeholder="email"
        >
    </div>
    <div>
        <input 
            type="password" 
            name="password" 
            placeholder="password"
        >
    </div>
    <div id="button">
        <input type="submit" class="" name="submit" value="Login">
    </div>
    <section>
        <small>
            New Here? <a href="/edojobsauthproject/signup.php">Sign Up</a>
        </small>
    </section>
</form>
</div>

<?php
	include 'templates/footer.php';
?>