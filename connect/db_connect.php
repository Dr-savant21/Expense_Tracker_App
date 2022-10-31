<?php

//connecting with database in php from sql using mysqli
$connect = mysqli_connect('localhost','israel','projectwork','expensetracker');
//chek for connection
if (!$connect){
    echo "connection error: mysql_connect_error()";
}

?>