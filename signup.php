<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
body{
    height:100%;
    width:100%;
background-image:url("bg.jpg");
background-size:cover;
background-repeat:no-repeat;
background-attachment:fixed;
color:white;
}
.container{
margin-left:30%;
margin-top:10%;

}

</style>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
<div class="container py-3">
    <div class="row">
        <div class="col-6">
        <form action="" method="post">

        <div class="form-group">
    <label>Name</label>
    <input type="text" name="fname" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name">
    
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="fmobile" aria-describedby="emailHelp" placeholder="Enter mobile">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" name="fpass" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" >Confrim Password</label>
    <input type="password" class="form-control" name="fcpass" id="exampleInputPassword1" placeholder="Password">
  </div>
  </br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
        </div>
    </div>
</div>
</main>
</body>
</html>



<?php

session_start();

// include "connection.php";
$server="localhost";
$username="root";
$password="";
$db="customer";

$conn=new mysqli($server,$username,$password,$db);

if(isset($_POST['submit'])){

$name=$_POST['fname'];
$email=$_POST['fmail'];
$mobile=$_POST['fmobile'];
$pass=$_POST['fpass'];
$cpass=$_POST['fcpass'];


$check="select * from customerdata where email='{$email}'";

$res=mysqli_query($conn,$check); //executing query

// $passwd=password_hash($pass,PASSWORD_DEFAULT); //PASSWORD ENCRYPTION

$key=bin2hex(random_bytes(12));



// $row=mysqli_fetch_assoc($res);

// $_SESSION['username']=$row['name'];

// echo $key;

// echo $passwd;

if(mysqli_num_rows($res)>0){
    echo "email already exists";
// die();

}
else{

  if($pass===$cpass){

    $sql="insert into customerdata(name,email,mobile,password,token,status) values('$name','$email','$mobile','$pass','$key','inactive')";
 
    $result=mysqli_query($conn,$sql);

     if($result){

          $to=$email;
          $subject="activation mail";
          $body="Hello $name, click here to activate this link: http://localhost/agro1/activation.php?key=$key";
          $sender="From: manturana411hzb@gmail.com";
        

    if(mail($to,$subject,$body,$sender)){

   echo "<b style='color:red; margin-left:15%;'>check your Email to activate your link</b>";

          //  header("location: login.php");
               
          }

        else{
                    echo "email not sent";
                }

            }
            
            else{
                echo "query failed";
            }

    }else{
        echo "enter same password";
    }



}
}

?>