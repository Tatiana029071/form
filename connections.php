<?php
 //     подключение к базе данных
// include "function.php";
$login = "root";
$password = "";
$host = "127.0.0.1";
$nameDB ="clients1";

$linkdb = new mysqli($host, $login, $password, $nameDB);

mySqli_query($linkdb, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'" );

mySqli_query($linkdb, "SET CHARACTER SET 'utf8'");

// if(mySqli_connect_error()){
//     echo "Подключение к БД невозможно<br>".mysqli_connect_error();

// }
// else {
// echo "Подключение к БД выполнено успешно";
// };

?>
