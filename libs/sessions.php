<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting();
session_start();
if (isset($_SESSION['todo_name'])) {
    $session_name = $_SESSION['todo_name'];
}else{
     header("location: login.php");
}
 