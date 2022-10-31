<?php

include ('connect/db_connect.php');
session_start();
$user_id = $_SESSION['id'];
$username = $_SESSION['user_name'];
$trans_title = $trans_desc = $trans_amnt ='';
$errors = array('title'=>'','trans_desc'=>'','amnt'=>'');
   if (isset($_POST['submit'])){
      if (empty($_POST['title'])){
         $errors['title'] = 'Transaction title is required';
      }else{
      $trans_title = $_POST['title'];
      if (!preg_match('/^[a-zA-Z\s]+$/', $trans_title)){
          $errors['title'] = 'Title should be alphabet and space';
      }
   }
     if (empty($_POST['desc'])){
        $errors['trans_desc'] = 'transaction description is required';
      }else{
        $trans_desc = $_POST['desc'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $trans_desc)){
            $errors['trans_desc'] = "Description should be alphabet and space";
        }
      }
      if (empty($_POST['amnt'])){
        $errors['amnt'] = 'Amount is required';
        }else{
            $trans_amnt = $_POST['amnt'];
            // if (!preg_match('/^[a-zA-Z\s]+$/', $trans_amnt)){
            //     $errors['amnt'] = "Amount must be alphabet and spaces only";
            // }
        }
   if (!array_filter($errors)){
         $title = mysqli_real_escape_string($connect,$_POST['title']);
         $desc = mysqli_real_escape_string($connect,$_POST['desc']);
         $trans_type = $_POST['trans_type'];
         $amnt = '$'.mysqli_real_escape_string($connect,$_POST['amnt']);
         // $currency = $_POST['currency'];
         $insert = "INSERT INTO transaction(trans_id, username, trans_type, trans_desc, trans_amount, trans_title) VALUES('$user_id', '$username','$trans_type', '$desc', '$amnt', '$title')";
         if (mysqli_query($connect,$insert)){
            header('location: transaction.php');
         }else{
            echo 'Error: ' . mysqli_error($connect);
         }
         header('location: dashboard.php');
   }
}
// echo $user_id. '<br/>';
// echo $username. '<br/>';
// echo $title . '<br/>';
// echo $desc . '<br/>';
// echo $trans_type . '<br/>';
// echo $amnt . '<br/>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/b69a9eeb13.js"></script>
    <style>
      /* body{
         margin-left: 100px;
      } */
      .trans-header{
         color: #92ce6b;
      }
    </style>
</head>
<body>
<?php include('./sidebar.php') ?>
<!-- <?php include("./templates/navbar.php") ?> -->
<div class="container">
   <!-- transaction form -->
<form action="" method="POST" class="scale-form hide trans-03">
<h2 class="trans-header"> Add A New Transaction</h2>
      <div class="form-input">
         <input type="text" 
         name="title" 
         id="" 
         placeholder="Transaction Title"
         value="<?php echo htmlspecialchars($trans_title) ?>"
         >
                 <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['title']; ?>
        </div>
      </div>
      <div class="form-input">
         <input type="text" 
         name="desc" id="" 
         placeholder="Transaction description"
         value="<?php echo htmlspecialchars($trans_desc) ?>"
         >
                 <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['trans_desc']; ?>
        </div>
      </div>
      <div class="form-input">
         <label for="">Transaction type</label>
         <select name="trans_type" id="">
            <option value="expense">Expense</option>
            <option value="income">Income</option>
         </select>
         <!-- <label for="">currency</label> -->
         <!-- <select name="currency" id="">
            <option value="dollar"><i class="fa-light fa-dollar-sign"></i></option>
            <option value="euro"><i class="fa-light fa-euro-sign"></i></option>
            <option value="turkish"><i class="fa-light fa-turkish-lira-sign"></i></option>
            <option value="won"><i class="fa-light fa-won-sign"></i></option>
            <option value="yen"><i class="fa-light fa-yen-sign"></i></option>
            <option value="rupee"><i class="fa-light fa-rupee-sign"></i></option>
            <option value="dong"><i class="fa-light fa-dong-sign"></i></option>
            <option value="austral"><i class="fa-light fa-austral-sign"></i></option>
            <option value="indian-rupee"><i class="fa-light fa-indian-rupee-sign"></i></option>
            <option value="brazilian-real"><i class="fa-light fa-brazilian-real-sign"></i></option>
            <option value="cent"><i class="fa-light fa-cent-sign"></i></option>
            <option value="naira"><i class="fa-light fa-naira-sign"></i></option>
            <option value="franc"><i class="fa-light fa-franc-sign"></i></option>
         </select> -->
      </div>
      <div class="form-input">
         <input type="number" 
         name="amnt" 
         id="" 
         placeholder="Amount"
         value="<?php echo htmlspecialchars($amnt) ?>"
         >
                 <!-- Error message -->
        <div class="error-message" style="color: red;">
            <?php echo $errors['amnt']; ?>
        </div>
      </div>
      <div id="button">
         <input type="submit" 
         name="submit" 
         value="Enter transaction"
         >
      </div>
   </form>
    <?php include("./templates/footer.php") ?>
</div>