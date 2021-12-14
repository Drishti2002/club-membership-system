<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php' ?>
    <link rel="stylesheet" href="css/signupandlogin.css">
    <title>Login</title>
</head>

<body>

    <?php

    include 'connection.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['user_id'];
        $password = $_POST['user_pass'];

        $email_search = "select * from users where u_id='$email'";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $_SESSION['u_id'] = $email_pass['u_id'];
            $_SESSION['admin'] = $email_pass['admin'];
            if ($email_pass['u_pass'] == $password) {
    ?>
                <script>
                    alert("logged in successfully");
                </script>
                <script>
                    location.replace("index.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Password incorrect");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Invalid Email");
            </script>
    <?php
        }
    }

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="navbar-brand text-white ms-5">Club Management System</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0 me-5">
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php"><button class="btn btn-success">Sign Up</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-10 col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-5 mt-3">Login</h4>
                        <div class="row">
                            <div class="col-10 mx-auto">
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="user_id" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="user_pass" id="exampleInputPassword1">
                                    </div>
                                    <div class="d-md-flex justify-content-md-center">
                                        <input type="submit" name="submit" value="Login" class="btn mt-3 mb-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-center text-light fixed-bottom"><p>&copy; 2021 Copyright Text</p></footer>
</body>

</html>