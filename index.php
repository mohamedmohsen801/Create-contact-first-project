<?php

$successful = 0;
$user = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $password = $_POST['Password'];
    $Address = $_POST['Address'];

    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $passError = '';




    $sql = "select*from `r` where Username='$Username'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;
            header("location:login.php");
        } else {
            if (strlen($password) <= 6) {
                $passError = 'password must be greater than <strong>6</strong>';
            } else {
                $mydata = "insert into `r`(username,Email,Password,Address,city,state,zip)
                values('$Username','$Email','$password','$Address','$City','$State','$Zip')";
                $result = mysqli_query($connect, $mydata);


                if ($result) {
                    $successful = 1;
                } else {
                    die(mysqli_error($result));
                }
            }
        }
    }
}






?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>

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
    <?php if ($user) {
        echo '<div class="alert alert-danger" role="alert">
       <h4 class="alert-heading">user already exist!</h4>


</div>';
        # code...
    } ?>
    <?php if ($successful) {
        echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Sign up successful</p>

</div>';
        # code...
    } ?>

    <h1 class="text-center Title"><strong>Sign up</strong> </h1>
    <form class="row g-3 moh " action="index.php" method="post">
        <div class="col-md-6">
            <label for="inputusername" class="form-label"><strong>Username</strong></label>
            <input type="text" name="Username" class="form-control" id="inputEmail4">
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label"><strong>Email</strong></label>
            <input type="email" name="Email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">


            <label for="inputPassword4" class="form-label"><strong>Password</strong></label>
            <input type="text" name="Password" class="form-control" id="inputPassword4">
            <?php if (isset($passError)) {
                echo $passError;
            } ?>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label"><strong>Address</strong></label>
            <input type="text" name="Address" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        <div class="col-md-6">
            <label for="inputCity" class="form-label"><strong>City</strong></label>
            <input type="text" name="City" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label"><strong>State</strong></label>
            <select id="inputState" name="State" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label"><strong>Zip</strong></label>
            <input type="text" name="Zip" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Check me out" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    <strong> Check me out</strong>
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100"><strong>Sign in</strong></button>
        </div>
    </form>

</body>

</html>