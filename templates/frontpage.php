<?php

include('inc/header.php');

echo "
    <main role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class='jumbotron'>
            <div class='container'>
                <h1 class='display-3'>Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                 <p><a class='btn btn-primary btn-lg' href='#' role='button'>Learn more »</a></p>
            </div>
        </div>

        <div class='container'>";

            foreach($jobs as $job) {
                echo
                    "<div class='row marketing'>
                        <div class='col-md-10'>
                            <h4>{$job->job_title}</h4>
                            <p>{$job->description}</p>
                        </div>
                        <div class='col-md-2'>
                            <a href='#' class='btn btn-outline-dark'>View</a>
                        </div>
                    </div>
                    <hr>";
            }
        echo "</div> <!-- /container -->
</main>
";
include('inc/footer.php');