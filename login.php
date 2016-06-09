<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once ('libs/loginUsers.php'); ?>
<html>
    <head>
        <title>TODO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--<script type="text/javascript">
            $(function () {
                $('#show_register').click(function () {
                    $('.login_form').hide();
                    $('.register_form').show();
                    return false;
                });
                
                $('#show_login').click(function () {
                    $('.login_form').show();
                    $('.register_form').hide();
                    return false;
                });
            });
        </script>-->

    </head>
    <body>
        <div id="mainWrapper">
            <br/><br/><br/>
            <div class="container">


                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div class="login_form">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Login</h3>
                                </div>

                                <div class="panel-body">
                                    <?php
                                    if (isset($error)) {
                                        echo '<div class="alert-danger">' . $error . '</div><br/>';
                                    }
                                    ?>

                                    <form method="post" id="form" action="login.php" role="form">
                                        <div class="form-group">
                                            <label for="Username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Login" name="login" class="form-control btn btn-success" id="login"/>
                                        </div>

                                        <p>Don't have an account ? <a href="Register.php" id="show_register">click here</a></p>
                                    </form>
                                </div>
                            </div>
                        </div><!--End login_form--> 
                    </div>
                </div>
            </div><!--End Container-->
        </div><!--End mainWrapper-->
    </body>
</html>
