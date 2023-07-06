<?php

//      подкл$ючение к базе данных 
 require("connections.php");
    $name = mysqli_real_escape_string($linkdb, $_POST['Name']);
    $phone = mysqli_real_escape_string($linkdb, $_POST['phone']);
    $email = mysqli_real_escape_string($linkdb, $_POST['email']);
    
 
    if(mysqli_query($linkdb, "INSERT INTO users(name, email, phone) VALUES('" . $name . "', '" . $email . "', '" . $phone . "')")) {
     echo 'Ваше сообщение отправлено';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($linkdb);
    }
 
    mysqli_close($linkdb);
 
?>