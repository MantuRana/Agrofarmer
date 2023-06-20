<?php
session_start();
// include "connection.php";
$server="localhost";
$username="root";
$password="";
$db="customer";

$conn=new mysqli($server,$username,$password,$db);

if(isset($_POST['submit'])){

    $email=$_POST['fmail'];
    $pass=$_POST['fpass'];

    $sql="select * from customerdata where email='$email' and status='active'";

    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){

        $row=mysqli_fetch_assoc($res);

        $password=$row['password'];
        //  echo $password;

        //  die();

        //  $decrypt=password_verify($pass,$password);
    if($pass===$password){

            $_SESSION['name']=$row['name'];

            if(isset($_POST['remember'])){
             setcookie("emailcookie",$email);
             setcookie("passwordcookie",$pass);
             header("location: home.php");

            }
            else{

              header("location: login.php");
            }
          
        }
        else{
            echo "invalid password";
        }


    }
    else{
        echo "kch bhi nahi mil r h";

    }


}
?>

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
    <p>

    <?php 
    
    
    // if(isset($_SESSION['message'])){
    //     echo $_SESSION['message'];
    // } else{
    //     echo $_SESSION['message']="you are logged out";
    // }
    
    ?>
    </p>

    <div class="row">
        <div class="col-6">
        <form action="" method="post">
  <div class="form-group">
    <label>Email </label>
    <input type="email" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" value="<?php 
    if(isset($_COOKIE['emailcookie'])){
echo $_COOKIE['emailcookie'];

    }
     ?>">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" name="fpass" id="exampleInputPassword1" placeholder="Password"value="<?php 
    if(isset($_COOKIE['passwordcookie'])){
echo $_COOKIE['passwordcookie'];

    }
     ?>">
  </div>
   <div class="form-check py-2">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
    <label class="form-check-label" >Remember me</label>
  </div> 
  </br>
 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
 <p>Forget your password <a href="forget.php">Click Here </a></p>
 <p>Don't have account <a href="signup.php">Click Here </a></p>
        </div>
    </div>
</div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>

</body>

</html>