<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once ('classes/manageTodo.php');
include_once 'sessions.php';
$init = new manageTodo();
if(isset($_GET['success']) && empty($_GET['success'])){
    $success = 'Todo Created Successfully';
}

if (isset($_POST['create_todo'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $due_date = $_POST['due_date'];
    $label = $_POST['label_under'];

    if (empty($title) || empty($due_date) || empty($label)) {
        $error = 'All Fields are required accept the optional one';
    } else {
        $title = mysql_real_escape_string(strip_tags( $title));
        $desc = mysql_real_escape_string(strip_tags( $desc));
        $label = mysql_escape_string(strip_tags($label));
        
        $username = $session_name;
        $created_date = date("D-M-Y");
        
        $create_todo = $init->createTodo($username, $title, $desc, $due_date, $created_date, $label);
        
        if($create_todo == 1){
            $success = 'Todo Created Successfully';
            header("Location: add_new.php?success");
            exit();
        }else{
            $error = 'There was an Error';
        }
    }
    
}