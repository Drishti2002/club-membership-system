<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'links.php' ?>
  <link rel="stylesheet" href="css/signupandlogin.css">
  <title>Sign up</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <div class="navbar-brand text-white ms-5">Club Management System</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0 me-5">
          <li class="nav-item">
            <a class="nav-link" href="login.php"><button class="btn btn-success">Login</button></a>
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
            <h4 class="text-center mb-5 mt-3">Sign Up</h4>
            <div class="row">
              <div class="col-10 mx-auto">

                <form action="" method="POST">
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
                    <input type="submit" name="submit" value="Sign up" class="btn mt-3 mb-3">
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

<?php

include 'connection.php';

if (isset($_POST['submit'])) {
  $u_id = $_POST['user_id'];
  $u_pass = $_POST['user_pass'];




  $insertquery = " INSERT INTO `users`(`u_id`, `u_pass`) VALUE('$u_id','$u_pass') ";

  $res = mysqli_query($con, $insertquery);
  if ($res) {
?>
    <script>
      alert("signed up successfully");
    </script>
    <script>
      location.replace("login.php");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("User id already exist");
    </script>
<?php
  }
}

?>