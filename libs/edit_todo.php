<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['edit_todo'])) {
    include_once 'classes/manageTodo.php';
    include_once 'sessions.php';

    $init = new manageTodo();

    $username = $session_name;
    $id = $_GET['id'];
    $title = mysql_escape_string($_POST['title']);
    $description = mysql_escape_string($_POST['desc']);
    $due_date = mysql_escape_string($_POST['due_date']);
    $label = mysql_escape_string($_POST['label_under']);
    $progress = mysql_escape_string($_POST['progress_value']);
    

    $edit = $init->editTodo($username, $id, $title, $description, $progress, $due_date, $label);

    if ($edit == 1) {
        header("Location: edit.php?id =".$id." ");
    } else {
        $error = 'There was an error';
    }
}