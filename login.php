<?php
$login = 0;
$invalid = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $Username = $_POST['Username'];

    $password = $_POST['Password'];






    $sql = "select*from `r` where Username='$Username' and Password='$password' ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login = 1;
            session_start();
            $_SESSION['Username'] = $Username;
            header("location:my home.php");
        } else {
            $invalid = 1;
        }
    }
} ?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/leon.css" />
    <!--render all elements normally-->
    <link rel="stylesheet" href="css/normalize.css" />
    <!--font.awesome.library-->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/ind.css">

</head>

<body>
    <?php if ($invalid) {
        echo '<div class="alert alert-danger" role="alert">
       <h4 class="alert-heading">Invalid username or password!</h4>


</div>';
        # code...
    } ?>
    <?php if ($login) {
        echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>log in successful</p>

</div>';
        # code...
    } ?>


    <h1 class=" Title"><strong>login page</strong> </h1>
    <form class="login" action="login.php" method="post">
        <div class="col-md-6 w-40">
            <label for="inputusername" class="form-label w-40"><strong>Username</strong></label>
            <input type="text" name="Username" class="form-control " id="inputEmail4">
        </div>


        <div class="col-md-6 w-40">
            <label for="inputPassword4" class="form-label"><strong>Password</strong></label>
            <input type="text" name="Password" class="form-control " id="inputPassword4">

        </div>
        <div class="col-12">
            <button type="login" class="btn btn-primary w-60"><strong>login</strong></button>
        </div>



    </form>

</body>

</html>