<?php

include_once 'config/init.php';
$job = new Job;

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST['submit'])) {
    $data = [];
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['user_id'] = $_SESSION['user_id'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_email'] = $_POST['contact_email'];
    $data['contact_user'] = $_POST['contact_user'];

    if($job->userOwnsJob($_SESSION['user_id'], $job_id)) {
        if ($job->update($job_id, $data)) {
            redirect('index.php', 'Your job has been updated', 'success');
        } else {
            redirect('index.php', 'Something went wrong', 'error');
        }
    } else {
        redirect('index.php', 'Sorry you do not own this listing', 'error');
    }
}
$template = new Template('templates/job-edit.php');

if($job->userOwnsJob($_SESSION['user_id'], $job_id)) {
    $template->job = $job->getJob($job_id);
} else {
    redirect('index.php', 'Sorry you do not own this listing', 'error');
}
$template->categories = $job->getCategories();

echo $template;
