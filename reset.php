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
    <label>Password</label>
    <input type="password" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder=" Enter Password">
<br>
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="cmail" class="form-control" aria-describedby="emailHelp" placeholder="Re-Enter Password">
<br>
    <button type="submit" class="btn btn-primary" name="submit">update</button>
</form>

        </div>
    </div>
</div>
  </main>

  <footer>
    <!-- place footer here -->
  </footer>
 
</body>

</html>


<?php

$server="localhost";
$username="root";
$password="";
$db="customer";

$conn=new mysqli($server,$username,$password,$db);

if (isset($_POST['submit'])){



if(isset($_GET['key'])){

$key = $_GET['key'];

$pass = $_POST['fmail'];
$cpass = $_POST['cmail'];

// $passwd =password_hash($pass,PASSWORD_DEFAULT);

if($pass===$cpass){

  $sql = "update customerdata set password = '$pass' where token='$key'";

  $res = mysqli_query($conn,$sql);

  if($res){

header("location:login.php"  );

  }else{
header("location:reset.php");

  }

}
else{

echo "password is not same. please enter same password in both field ";

}



}

}


?>

