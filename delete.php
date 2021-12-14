<?php

include 'connection.php';


if (isset($_GET['rollno']) && isset($_GET['clubname'])) {
    $roll = $_GET['rollno'];
    $club = $_GET['clubname'];
    $deletequery = "delete from `clubregistration` where `s_roll`='$roll' and `c_name`='$club'";
    $result = mysqli_query($con, $deletequery);
    if ($result) {
?>
        <script>
            alert("Deleted successfully");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Not Deleted");
        </script>
    <?php
    }
    ?>
    <script>
        location.replace("display.php");
    </script>
<?php
}


?>