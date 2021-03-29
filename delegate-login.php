<!DOCTYPE html>

<?php include('include/config.php'); ?>

<html lang="en-US">

<head>
    <title>Delegate Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/forms.css" type="text/css">
</head>

<body>

    <!--Header-->
    <?php include('templates/header.php'); ?>

    <!--Body-->
    <?php include('templates/menu.php'); ?>

    <!--Connect to database-->
    <?php
    $query = mysqli_query($sql, "SELECT * FROM bills");
    while($row = mysqli_fetch_assoc($query)) {
        $number = $row['Bill Number'];
        $title = $row['Bill Title'];
        $author = $row['Bill Author'];
        $status = $row['Status'];
    }?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 border" style="margin-top: 5%;">
                
                <h3>Delegate Login Form</h3>

                <?php if(!empty($error_message)) { ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php } ?>

                <form action="include/delegate-login-inc.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required />
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    
                </form>

                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "wrongemail") {
                            echo "<p>An account with this email does not exist.</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong, please try again.</p>";
                        }
                        else if ($_GET["error"] == "wronglogin") {
                            echo "<p>The username or password you entered is incorrect.</p>";
                        }
                    }
                ?>

            </div>
        </div>
    </div>

    <!--Footer-->
    <?php include('templates/footer.php'); ?>
    
</body>

</html>