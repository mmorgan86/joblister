<?php

include_once 'config/init.php';
$job = new Job;
$user = new User;

$template = new Template('templates/frontpage.php');

$action = isset($_GET['action']) ? $_GET['action'] : NULL;
$job_search = isset($_GET['job_search']) ? $_GET['job_search'] : NULL;
$category = isset($_GET['category']) ? $_GET['category'] : null;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : NULL;
$location_search = isset($_GET['location_search']) ? $_GET['location_search'] : NULL;

if($user_id) {
    $template->user = $user->getCurrentUser($user_id);
    $template->userJobs = $job->getUserJobs($user_id);
} else {
    $template->user = '';
}

if($job_search || $location_search) {
    $template->jobs = $job->searchJobs($job_search, $location_search);

    if($location_search) {
        $template->title = "Jobs In {$location_search}";
    }
}
//else if($location_search) {
//    $template->job_location = $job->locationJobs();
//}
else if($category) {
    $template->jobs = $job->getByCategory($category);
    $template->title = 'Jobs In ' . $job->getCategory($category)->name;
} else {
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
}

// log out user
if($action == 'logout') {
    if($_GET['user_id']) {
        $user_id = $_GET['user_id'];
        $user->logout($user_id);
    }

// Unset all of the session variables
    $_SESSION = array();

// Destroy the session.
    session_destroy();

// Redirect to login page
    header("location: user-login.php");
    exit;
}

$template->categories = $job->getCategories();
echo $template;
