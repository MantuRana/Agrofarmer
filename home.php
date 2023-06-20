<?php
session_start();


if(isset($_SESSION['name'])){

    echo  $_SESSION['name']." "."click on";

}


else{
    header("location: login.php");
}


?>

<button><a href="index.html">logout</a></button>