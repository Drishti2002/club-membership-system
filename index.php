<?php
session_start();
if (!isset($_SESSION['u_id'])) {
?>
  <script>
    alert("First Login then proceed");
  </script>
  <script>
    location.replace("login.php");
  </script>
<?php

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'links.php' ?>
  <link rel="stylesheet" href="css/index.css">
  <title>Registration Form</title>
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
            <a class="nav-link" href="logout.php"><button class="btn btn-success">Logout</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-10 mx-auto">
        <div class="card outer-card">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="card border-0">
                  <img src="images/logo2.png" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <a href="display.php"><button type="button" class="btn rounded-pill list">Check List</button></a>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <div class="card border-0">
                  <div class="card-body">
                    <h3 class="text-center">Enroll for club memebership</h3>
                    <form action="" method="POST" class="row mt-3 g-3">
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Roll Number</label>
                        <input type="text" name="roll" class="form-control" placeholder="roll no.">
                      </div>
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                        <input type="text" name="username" class="form-control" placeholder="name">
                      </div>
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['u_id'] ?>" placeholder="name@example.com" disabled>
                      </div>
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Club name</label>
                        <select class="form-select" aria-label="Default select example" name="club">
                          <option selected>Select..</option>

                          <?php
                          include 'connection.php';

                          $selection = "select * from `clubs`";
                          $query = mysqli_query($con, $selection);

                          while ($opt = mysqli_fetch_array($query)) {
                          ?>
                            <option value="<?php echo $opt['c_name']; ?>"><?php echo $opt['c_name']; ?></option>
                          <?php
                          }
                          ?>

                        </select>

                      </div>
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                        <input type="number" name="mob" class="form-control" placeholder="mobile no.">
                      </div>
                      <div class="col-md-6 text-center mt-5">
                        <input type="submit" name="submit" value="Register" class="btn rounded-pill reg">
                      </div>
                    </form>
                  </div>
                </div>
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

if (isset($_POST['submit'])) {
  $roll = $_POST['roll'];
  $name = $_POST['username'];
  $email = $_SESSION['u_id'];
  $club = $_POST['club'];
  $mob = $_POST['mob'];
  $admin = $_SESSION['admin'];

  $insertquery = " insert into clubregistration(s_roll, s_name, u_id, c_name, s_mob, admin)
                             values('$roll', '$name', '$email', '$club', '$mob', '$admin') ";

  $res = mysqli_query($con, $insertquery);
  if ($res) {
?>
    <script>
      alert("data inserted successfully");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Please insert valid data");
    </script>
<?php
  }
}
?>