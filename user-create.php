<?php

include_once 'config/init.php';
$user = new User;

if(isset($_POST['create_user'])) {
    $data = $errors = [];

    $data['name'] = $_POST['name'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['c_password'] = $_POST['c_password'];
    $data['email'] = $_POST['email'];


    if ($data['password'] != $data['c_password']) {
        $errors[] = 'Passwords did not match';
    }
    if (!$user->createUser($data)) {
        $errors[] = 'Something went wrong. Unable to create user';
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
