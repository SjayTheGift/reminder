<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once ('libs/loginUsers.php'); 
include_once 'libs/sessions.php';
?>
<html>
    <head>
        <title>TODO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/jquery-ui.css" >
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container" id="td_container">
            <div class="row">
                <div class="col-md-2">
                    <div id='mainContent'>
                        <h2>Main Menu</h2>
                    </div>
                    <ul class="nav nav-list">
                        <li><a href="index.php?label=Inbox"><span class="glyphicon glyphicon-inbox"></span> Inbox</a></li>
                        <li><a href="index.php?label=Read Later"><span class="glyphicon glyphicon-bookmark"></span> Read Later</a></li>
                        <li><a href="index.php?label=Important"><span class="glyphicon glyphicon-star"></span> Important</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-hand-up"></span> Logout</a></li>
                    </ul>
                </div>