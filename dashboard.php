<?php

session_start();

$name = $_SESSION['user_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
 
<h1>WELCOME <?php echo $name ?></h1>
<button type="submit"><a href="transaction.php">Add transaction</a></button>
<?php include 'templates/footer.php' ?>  


