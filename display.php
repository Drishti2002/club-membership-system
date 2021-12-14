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
    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="css/display.css">
    <title>list of students</title>
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
                        <a class="nav-link" href="index.php"><button class="btn btn-success">Go Back</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button class="btn btn-success">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-div">
        <h5 class="fst-italic">List of students</h5>
        <div class="center-div">

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Club</th>
                            <th>Mobile No.</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'connection.php';

                        $selectquery = " select * from clubregistration ";

                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);


                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <tr>
                                <td><?php echo $res['s_roll']; ?></td>
                                <td><?php echo $res['s_name']; ?></td>
                                <td><span class="email-style"><?php echo $res['u_id']; ?></span></td>
                                <td><?php echo $res['c_name']; ?></td>
                                <td><?php echo $res['s_mob']; ?></td>
                                <?php

                                if ($_SESSION['admin'] == 'super_user') {
                                ?>
                                    <td><a href="updates.php?rollno=<?php echo $res['s_roll'] ?>&clubname=<?php echo $res['c_name'] ?>" data-bs-toggle="tooltip" title="UPDATE"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="delete.php?rollno=<?php echo $res['s_roll'] ?>&clubname=<?php echo $res['c_name'] ?>" data-bs-toggle="tooltip" title="DELETE"><i class="fas fa-trash-alt" onclick="return confirm('Are you sure you want to delete')"></i></a></td>
                                <?php
                                } else if ($res['u_id'] == $_SESSION['u_id']) {
                                ?>
                                    <td><a href="updates.php?rollno=<?php echo $res['s_roll'] ?>&clubname=<?php echo $res['c_name'] ?>" data-bs-toggle="tooltip" title="UPDATE"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="delete.php?rollno=<?php echo $res['s_roll'] ?>&clubname=<?php echo $res['c_name'] ?>" data-bs-toggle="tooltip" title="DELETE"><i class="fas fa-trash-alt" onclick="return confirm('Are you sure you want to delete')"></i></a></td>
                                <?php
                                } else {
                                ?>
                                    <td><a data-bs-toggle="tooltip" title="UPDATE"><i class="fas fa-edit" style="color:gray"></i></a></td>
                                    <td><a data-bs-toggle="tooltip" title="DELETE"><i class="fas fa-trash-alt" style="color:gray"></i></a></td>
                                <?php
                                }

                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-center text-light fixed-bottom"><p>&copy; 2021 Copyright Text</p></footer>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>