
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
    <label>Email Address</label>
    <input type="email" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
<br>
    <button type="submit" class="btn btn-primary" name="submit">send</button>
</form>

        </div>
    </div>
</div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> -->
</body>

</html>


<?php

$server="localhost";
$username="root";
$password="";
$db="customer";

$conn=new mysqli($server,$username,$password,$db);

if(isset($_POST['submit'])){

$email=$_POST['fmail'];
$sql = "select * from customerdata where email='{$email}'";
$res = mysqli_query($conn,$sql);



if (mysqli_num_rows($res)>0){

$row = mysqli_fetch_assoc($res);
$username = $row['name'];
$key = $row['token'];

$to=$email;
$subject="reset password";
$body="Hello $username, click here to reset your password : http://localhost/agro1/reset.php?key=$key";
$sender="From: manturana411hzb@gmail.com";

if (mail($to,$subject,$body,$sender)){

header("location:login.php");

}

else{
echo "email no sent";

}


}
else{
echo "email is not in our database";


}


}


?>