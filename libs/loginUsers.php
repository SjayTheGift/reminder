<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginUsers
 *
 * @author dell notebook
 */
if (isset($_POST['register'])) {
    include_once ('classes/ManageUsers.php');
    $users = new ManageUsers();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $time = date("H:i:s");
    $date = date("D-m-y");

    if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
        $error = 'All fields are required';
    } elseif ($password != $repassword) {
        $error = 'Passwords do not match';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email is invalid';
    } elseif (strlen($password) < 6) {
        $error ='password to short';
    } elseif(strlen($username) < 6){
        $error = 'username should be atleast 6 characters long';
    }else {
        $check_availability = $users->GetUserInfo($username,$email);

        if ($check_availability == 0) {
             $password = md5($password);
            $register_user = $users->registerUsers($username, $email, $password, $ip_address, $time, $date);
            if ($register_user == 1) {
                $make_sessions = $users->GetUserInfo($username,$email);
                foreach ($make_sessions as $userSessions) {
                    $_SESSION['todo_name'] = $userSessions['username'];
                    $_SESSION['todo_name'] = $userSessions['email'];
                    if (isset($_SESSION['todo_name'])) {
                        header("location: index.php");
                    }
                }
            }
        } else {
            $error = 'Username or Email already in use';
        }
    }
}

if (isset($_POST['login'])) {
    session_start();
    include_once ('classes/ManageUsers.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error = "All fields are requied";
    } else {
        $password = md5($password);
        $login_user = new ManageUsers();
        $auth_user = $login_user->loginUsers($username, $password);
        if ($auth_user == 1) {
            $make_sessions = $login_user->GetUserInfo($username);
            foreach ($make_sessions as $userSessions) {
                $_SESSION['todo_name'] = $userSessions['username'];
                if (isset($_SESSION['todo_name'])) {
                    header("location: index.php");
                }
            }
        } else {
            $error = 'Invalid credetintials';
        }
    }
}