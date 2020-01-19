<?php

include_once 'config/init.php';
$user = new User;

if(isset($_POST['login_user'])) {
    $data = [];
    $id = '';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // CHECK IF USER EXIST
    if($user_id = $user->checkLogin($username, $password)) {
       $id = $user_id->id;

       $_SESSION['username'] = $username;
       $_SESSION['user_id'] = $id;
    }
    if($id) {
        if ($user->getCurrentUser($id)) {
            redirect('index.php', 'User has been logged in', 'success');
        } else {
            redirect('index.php', 'Something went wrong', 'error');
        }
    }
}
$template = new Template('templates/user-login.php');

$template->user = $user->getAllUsers();
echo $template;

