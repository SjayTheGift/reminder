<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'classes/manageTodo.php';
include_once 'sessions.php';
$init = new manageTodo();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $list_todo = $init->listIndTodo(array('id'=>$id),$session_name);
} else {
    if (isset($_GET['label'])) {
        $label = $_GET['label'];
        $list_todo = $init->listTodo($session_name, $label);
    } else {
        $list_todo = $init->listTodo($session_name);
    }
}