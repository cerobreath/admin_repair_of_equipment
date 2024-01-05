<?php
include_once "./config/dbconnect.php";
?>

<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    <a class="navbar-brand ml-5" href="./indexClient.php">
        <img src="./assets/images/profile-pic.svg" width="80" height="80" alt="Repair of equipment">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    <div class="user-cart">
        <?php
        if (isset($_SESSION['user_id'])) {
            ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
            <a href="logout.php" style="text-decoration:none;">
                <i class="fa fa-sign-out mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
            <?php
        } else {
            ?>
            <a href="logout.php" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
            <?php
        }
        ?>
    </div>
</nav>
