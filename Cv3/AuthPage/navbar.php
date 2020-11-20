<?php session_start() ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-2" role="navigation">
<!--        <a class="navbar-brand" href="--><?//= $_SERVER["PHP_SELF"] ?><!--" onclick="event.preventDefault()">Your logo</a>-->
                <a class="navbar-brand" href="homePage.php">Your logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                </div>
                <?php
                //                if (isset($_SESSION["role"])) {
                //                    if ($_SESSION["role"] == 1) {
                //                        echo "<div><li class='nav-item'><a class='nav-link' href='users.php'>Users</a></li></div>";
                //                    }
                //                }
                if (isset($_COOKIE["authRole"])) {
                    if ($_COOKIE["authRole"] == 1) {
                        echo "<div><li class='nav-item'><a class='nav-link' href='users.php'>Users</a></li></div>";
                    }
                }
                ?>
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
<?php //echo "Role: " . $_SESSION["role"] . "<br>"; ?>
<?php echo "Role: " . $_COOKIE["authRole"] . "<br>"; ?>