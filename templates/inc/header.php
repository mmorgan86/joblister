<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo SITE_TITLE ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
    <div class="header clearfix">
        <nav class='navbar navbar-expand-md navbar-dark bg-dark d-flex'>
            <a class='navbar-brand' href='#'><?php echo SITE_TITLE ?></a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarItems'
                    aria-controls='navbarItems' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='navbarItems'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item active'>
                        <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='create.php'>Create Listing</a>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['user_id'])){
                            echo "<p>{$_SESSION['username']}</p>
                                </li>
                                <li>
                                    <a class='nav-link' href='user-jobs.php?user_id={$_SESSION['user_id']}'>My Jobs</a>
                                </li>
                                <li>
                                    <a class='nav-link' href='index.php?action=logout&user_id={$_SESSION['user_id']}'>Log Out</a>
                                </li>";
                        } else {
                            echo "<a class='nav-link' href=\"user-login.php\">Login</a>
                                </li>
                                <li>
                                    <a class='nav-link' href=\"user-create.php\">Create User</a>
                                </li>";
                        }
                        ?>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <?php displayMessage(); ?>
</div>
