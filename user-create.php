<?php

include_once 'config/init.php';
$user = new User;

if(isset($_POST['create_user'])) {
    $data = $errors = [];

    $data['name'] = trim($_POST['name']);
    $data['username'] = trim($_POST['username']);
    $data['password'] = trim($_POST['password']);
    $data['c_password'] = trim($_POST['c_password']);
    $data['email'] = trim($_POST['email']);

    if ($user->createUser($data) != 1) {
        $found_errors = $user->createUser($data);
        foreach($found_errors as $error) {
            $errors[] = $error;
        }
//        $errors[] = 'Something went wrong. Unable to create user';
    }

    if(count($errors)) {
        redirect('index.php', "{$errors[0]}", 'error');
    }
    else {
        redirect('user-login.php', 'User has been created. Please login', 'success');
    }
}
$template = new Template('templates/user-create.php');

$template->user = $user->getAllUsers();
echo $template;
