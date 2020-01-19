<?php

include_once 'config/init.php';
$job = new Job;

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    if($job->getUserJobs($user_id)) {

        $template = new Template('templates/user-jobs.php');

        $template->userJobs = $job->getUserJobs($user_id);

        echo $template;
    } else {
        redirect('index.php', 'No jobs found', 'error');
    }
}

