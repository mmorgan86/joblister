<?php
include('inc/header.php');

echo "
    <div class='container'>
        <h2 class='page-header'>{$job->job_title} ($job->location)</h2>",
        "<small>Posted By {$job->contact_user} on {$job->post_date}</small>",
        "<hr>",
        "<p class='load'>{$job->description}</p>",
        "<ul class='list-group'>
            <li class='list-group-item'>
                <strong>Company:</strong>
                {$job->company}
            </li>
            <li class='list-group-item'>
                <strong>Salary:</strong>
                 $job->salary
            </li>
            <li class='list-group-item'>
                <strong>Contact Email:</strong>
                {$job->contact_email}
            </li>
        </ul>",
        "<br><br>",
        "<a href='index.php' class='btn btn-outline-success'>Go Back</a>",
        "<br><br>";

        if($userOwnsJob) {
                echo "
                <div class='card card-body bg-light'>
                    <a href='edit.php?id={$job->id}' class='btn btn-success'>Edit</a>
                    <form action='job.php' style='display: inline;' method='POST'>
                        <input type='hidden' name='del_id' value='{$job->id}'>
                        <input type='submit' class='btn btn-outline-danger' value='Delete'>
                    </form>
                </div>";
        }
    echo "</div>";

include('inc/footer.php');
?>

