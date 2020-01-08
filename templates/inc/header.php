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
        <nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark'>
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
                </ul>
            </div>
        </nav>
    </div>
</div>