<?php 
    function getActive($link,$currentPage) {
        if($link === $currentPage) {
            return "active";
        } else {
            return "";
        }
    }
?> 
<!DOCTYPE html>
<html lang="en" ng-app="app" ng-cloak>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Final Project</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/FinalProject/resources/css/master.css">
        <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/p5.js"></script>
        <style>
            [ng\:cloak], [ng-cloak], .ng-cloak {
                display: none;
            }
        </style>
        <script>
            var app = angular.module("app",[]); //define the angular app across the website 
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <a class="navbar-brand" href="/FinalProject/game.php">
                            FinalProject
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link <?php echo getActive("game",$current_page); ?>" href="/FinalProject/game.php">Game</a>
                                <a class="nav-item nav-link <?php echo getActive("leaderboard",$current_page); ?>" href="/FinalProject/leaderboard.php">Leaderboard</a>
                                <a class="nav-item nav-link <?php echo getActive("about",$current_page); ?>" href="/FinalProject/about.php">About</a>
                                <a class="nav-item nav-link <?php echo getActive("login",$current_page); ?>" href="/FinalProject/login_register.php">Login/Register</a>
                                <a class="nav-item nav-link" href="/FinalProject/forms/logout.php">Logout</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
