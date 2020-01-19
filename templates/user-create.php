<?php
include('inc/header.php');

echo "
    <div class='container'><br><br>",
        "<div class='col-lg-6'>",
            "<form action='user-create.php' method='POST'>",
                "<div class='form-group'>",
                    "<label>Username</label>",
                    "<input type='text' name='username' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<label>Password</label>",
                    "<input type='password' name='password' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<label>Confirm Password</label>",
                    "<input type='password' name='c_password' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<label>Name</label>",
                    "<input type='text' name='name' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<label>Email</label>",
                    "<input type='email' name='email' class='form-control'>",
                "</div>",
                "<div class='form-group'>",
                    "<input type='submit' name='create_user' class='form-control btn btn-primary' value='Create'>",
                "</div>",
            "</form>",
        "</div>",
    "</div><br><br>";

include('inc/footer.php');
