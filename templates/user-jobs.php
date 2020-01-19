<?php

include('inc/header.php');

echo "
      <div class='container'>",
        "<h2>My Jobs</h2><hr>";
foreach($userJobs as $job) {
    echo
    "<br><br>
    <div class='row marketing'>
        <div class='col-md-10'>
            <h4>{$job->job_title}</h4>
            <p>{$job->description}</p>
        </div>
        <div class='col-md-2'>
            <a href='job.php?id={$job->id}' class='btn btn-outline-dark'>View</a>
        </div>
    </div>
    <hr>";
}
echo "</div> <!-- /container -->
</main>
";
include('inc/footer.php');