<?php 


session_start();
if (!isset($_SESSION['Username'])) {
    header('location:login.php');
    # code...
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h1 class="text-center text-warning">welcome <?php echo $_SESSION['Username'] ?></h1>

    <div>
        <a href="logout.php" class="btn btn-primary">logout</a>
    </div>

</body>

</html>