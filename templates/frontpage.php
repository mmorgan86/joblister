<?php

include('inc/header.php');

echo "
    <main role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class='container'>
            <div class='jumbotron'>
                <h1 class='display-3'>Find A Job</h1>
                <form action='index.php' method='GET'>
                    <div class='form-group'>
                        <label for='job_search'>Search</label>
                        <input type='text' name='job_search' placeholder='Enter a job' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='location_search'>Location</label>
                        <input type='text' name='location_search' placeholder='Enter a city and state' class='form-control'>
                    </div>
                    <select name='category' class='form-control'>
                        <option value='0'>Choose Category</option>";
                        foreach($categories as $category) {
                            echo "
                                  <option value='$category->id'>$category->name</option>";
                        }
                    echo
                        "
                    </select>
                    <br>
                    <input type='submit' class='btn btn-lg btn-success' value='FIND'>
                </form>    
            </div>
        </div>

        <div class='container'>
            <h3>{$title}</h3>
            <hr>";
            foreach($jobs as $job) {
                echo
                    "<div class='row marketing'>
                        <div class='col-md-10'>
                            <h4>{$job->job_title}</h4>
                            <p>{$job->description}</p>
                        </div>
                        <div class='col-md-2'>
                            <p>". date('h:i:s n-d-Y' , strtotime($job->post_date)) ."</p>
                            <a href='job.php?id={$job->id}' class='btn btn-outline-dark'>View</a>
                        </div>
                    </div>
                    <hr>";
            }
        echo "</div> <!-- /container -->
</main>
";
include('inc/footer.php');