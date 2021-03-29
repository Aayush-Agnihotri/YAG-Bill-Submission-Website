<?php
    session_start();
?>

<header>
    <?php
        if (isset($_SESSION["delegateUsersID"])) {
            echo "<h1 style='color: green;'>You are logged in!</h1>";
            echo "<a href='include/delegate-logout-inc.php'>Log out</a>";
        }
        else {
            echo "<h1 style='color: red;'>You are not logged in</h1>";
        }
    ?>
</header>