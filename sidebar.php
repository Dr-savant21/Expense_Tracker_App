<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <style>
      .sidebar-toggle {
      position: fixed;
      top: 2rem;
      right: 3rem;
      font-size: 2rem;
      background: transparent;
      border-color: transparent;
      color: hsl(125, 67%, 44%);
      transition: all 0.3s linear;
      cursor: pointer;
      animation: bounce 2s ease-in-out infinite;
      }
      .sidebar-toggle:hover {
      color:  hsl(125, 71%, 66%);
      }
      .sidebar{
         position: fixed;
         width: 270px;
         height: 100%;
         background-color: rgb(82, 148, 82);
         transition: 0.5s ease-in-out;
      }
      @keyframes bounce {
         0% {
            transform: scale(1);
         }
         50% {
            transform: scale(1.5);
         }
         100% {
            transform: scale(1);
         }
         }
      .close-btn {
         font-size: 1.75rem;
         background: transparent;
         border-color: transparent;
         transition: all 0.3s linear;
         cursor: pointer;
         color: rgb(005, 010, 011);
         /* margin-left: 190px;
         margin-top: 20px; */
         }
      .close-btn:hover {
         color: rgba(024, 050, 024, 0.5);
         transform: rotate(360deg);
         }
      .sidebar-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 1rem 1.5rem;
         gap: 20px;
         }
      .sidebar-element{
         display: flex;
         margin-left: 50px;
         gap: 20px;
      }
      .sidebar-element li{
         list-style-type: none;
         padding: 5px;
         font-size: 24px;
         filter: invert(1);
         cursor: pointer;
      }
      .sign-out{
         position: absolute;
         bottom: 10%;
         left: 13%;
         font-size: 20px;
         gap: 10px;
         cursor: pointer;
      }
      .sign-out a{
         color: #92ce6b;
      }
      .show-sidebar {
          transform: translate(-100%); 
      }
      @media screen and (min-width: 676px) {
         /* .sidebar {
            width: 400px;
         } */
      }
      .sidebar0{
         position: fixed;
         width: 100px;
         height: 100%;
         text-align: center;
         background-color: rgb(82, 148, 82);
         transition:  0.5s ease-in-out;
         /* transform: translate(-100%); */
         /* visibility: hidden; */
      }
      .sidebar0 h2{
         color: #eee;
         padding-top: 20px;
      }
      .sidebar0 .icons0{
         list-style-type: none;
         padding-top: 20px;
         font-size: 28px;
         filter: invert(1);
         cursor: pointer;
      }
      .sidebar0 .icons0 i{
         padding-top: 10px;
      }
      .sidebar0 .sign-out-icon{
         position: absolute;
         bottom: 10%;
         left: 30%;
         font-size: 24px;
         cursor: pointer;
      }
      .hide-sidebar0{
         /* visibility: visible; */
         transform: translate(0%);
      }
    </style>
</head>
<body>
<button class="sidebar-toggle">
      <i class="fas fa-bars"></i>
    </button>
    <aside class="sidebar">
      <div class="sidebar-header">
      <h2>Expense Tracker</h2>
        <button class="close-btn"><i class="fas fa-times"></i></button>
      </div>
      <!-- sidebar links -->
      <ul class="links sidebar-element">
         <div class="icons">
            <li>
             <i class="fas fa-home"></i>
            </li>
            <li>
             <i class="fas fa-chart-bar"></i>
            </li>
            <li>
             <i class="fas fa-credit-card"></i>
            </li>
            <li>
             <i class="fas fa-money-check-alt"></i>
            </li>
            <li>
             <i class="fas fa-landmark"></i>
            </li>
         </div>
         <div class="sidebar-content">
            <li>
            <a href="dashboard.php">home</a>
            </li>
            <li>
            <a href="transaction.php">Transactions</a>
            </li>
            <li>
            <a href="income.php">Income</a>
            </li>
            <li>
            <a href="expense.php">Expense</a>
            </li>
            <li>
            <a href="budget.php">Budget</a>
            </li>
         </div>
      </ul>
      <div class="sign-out">
         <i class="fas fa-sign-out-alt"></i>
         <a href="index.php">Sign out</a>
      </div>
    </aside>
    <section class="sidebar-opt">
    <h2>ET</h2>
    <div class="icons0">
            <li>
             <a href="dashboard.php"><i class="fas fa-home"></i></a>
            </li>
            <li>
            <a href="transaction.php"><i class="fas fa-chart-bar"></i></a>
            </li>
            <li>
            <a href="expense.php"><i class="fas fa-credit-card"></i></a>
            </li>
            <li>
            <a href="income.php"><i class="fas fa-money-check-alt"></i></a>
            </li>
            <li>
            <a href="budget.php"><i class="fas fa-landmark"></i></a>
            </li>
         </div>
         <div class="sign-out-icon">
         <a href="index.php"> <i class="fas fa-sign-out-alt"></i></a>
         </div>
    </section>


<script src="./js/script.js"></script>
<!-- <?php include('./templates/footer.php') ?> -->
