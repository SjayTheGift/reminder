<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'classes/manageTodo.php';
include_once 'sessions.php';
$init = new manageTodo();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = $init->deleteTodo($session_name, $id);

    if ($delete == 1) {
        header("Location: index.php");
    } else {
        $error = 'There was an error';
    }
}