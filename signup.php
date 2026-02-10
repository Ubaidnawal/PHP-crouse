<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>

    <div class='container mt-5'>


        <H1 class="text-center">REGISTRATION FORM</H1>
        <form  method="POST">
            <div class="row mt-5">



                <div class="col-sm-12 col-lg-6 mt-5 ">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your name" name="name"
                            required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email"
                            required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="Pass">Password:</label>
                        <input type="password" class="form-control" id="Pass" placeholder="Enter Your Password"
                            name="password" required>
                    </div>


                    <div class="form-group mt-3">
                        <label for="Confpass">Confirm Password:</label>
                        <input type="password" class="form-control" id="Confpass"
                            placeholder="Enter Your Confirm Password" name="cpassword" required>
                    </div>


                    <div class="form-group mt-3">
                        <input type="submit" value="Create Account" class="btn btn-primary" name="btn">
                    </div>

                    <p class="text-center">Already Have an Account <a href="login.php">Login</a></p>
                </div>

                <div class="col-sm-12 col-lg-6 ">
                    <img src="images/img1.jpg" alt="dummyImage" style="width:430px;height:450px;margin-left:95px">
                </div>
            </div>

        </form>

    </div>


   
</body>

</html>


<?php
if(isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $errors = [];

    if(empty($name) || strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

if(empty($password) || strlen($password) < 6) {
  $errors[] = "Password must be at least 6 characters long.";

}
if($password !== $cpassword) {
    $errors[] = "Passwords do not match.";
}

if(!empty($errors)) {
    foreach($errors as $error) {
        echo "<script>alert('$error');
        window.history.back();
        </script>";
        break;
    }
    exit();

} 
$Emailquery = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $Emailquery);

if(mysqli_num_rows($res) > 0) {
    echo "<script>alert('Email already exists. Please use a different email.');
    window.history.back();
    </script>";
    
}
else{
    $Hashedpass = password_hash($password, PASSWORD_BCRYPT);
}

$insquery = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$Hashedpass','customer')";

$rs = mysqli_query($conn, $insquery);
if($rs) {
    echo "<script>alert('Registration successful. Please login.');
    window.location.href = 'login.php';
    </script>";
} else {
    echo "<script>alert('Error occurred during registration. Please try again.');
    window.history.back();
    </script>";
}
}



?>
