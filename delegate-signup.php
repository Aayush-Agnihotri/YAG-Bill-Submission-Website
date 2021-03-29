<!DOCTYPE html>

<?php include('include/config.php'); ?>

<html lang="en-US">

<head>
    <title>Delegate Signup</title>
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

    <!--Footer-->
    <?php include('templates/footer.php'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 border" style="margin-top: 5%;">
                
                <h3>Delegate Signup Form</h3>

                <?php if(!empty($error_message)) { ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php } ?>

                <form action="include/delegate-signup-inc.php" method="post">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="fname" placeholder="First Name" required />
                    </div>

                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lname" placeholder="Last Name" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Repeat Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="passwordRepeat" placeholder="Password" required />
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    
                </form>

                <a href="delegate-login.php"><p class="link1">Delegate Login</p></a>

                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidemail") {
                            echo "<p>Please enter a real email.</p>";
                        }
                        else if ($_GET["error"] == "unmatchingpasswords") {
                            echo "<p>The passwords you have entered do not match.</p>";
                        }
                        else if ($_GET["error"] == "emailused") {
                            echo "<p>The email you have entered is already in use. Please enter a different email.</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong, please try again.</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo "<p>Thank you for signing up! Please click the link above to login in.</p>";
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</body>

</html>