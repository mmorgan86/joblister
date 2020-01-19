<?php
include('inc/header.php');

echo "
    <div class='container'><br><br>",
        "<div class='col-lg-6'>",
            "<form action='user-login.php' method='POST'>",
                "<div class='form-group'>",
                    "<label>Username</label>",
                    "<input type='text' name='username' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<label>Password</label>",
                    "<input type='password' name='password' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<input type='submit' name='login_user' class='btn btn-primary' value='Login'>",
                "</div>",
            "</form>",
        "</div>",
    "</div><br><br>";

include('inc/footer.php');
