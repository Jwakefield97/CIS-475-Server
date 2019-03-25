<!doctype html>
<html lang="en" ng-app="app" ng-cloak>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mega Travel</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/MegaTravel/resources/css/site.css">
        <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.min.js"></script>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
                        <a class="navbar-brand" href="/MegaTravel/home.php">
                            <img src="/MegaTravel/resources/images/logo.jpg" width="30" height="30" class="d-inline-block align-top rounded-circle navbar-logo" alt="logo">
                            Mega Travel
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link home active" href="/MegaTravel/home.php">Home <span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link reservations" href="/MegaTravel/reservation.php">Reservations</a>
                                <a class="nav-item nav-link about" href="/MegaTravel/about.php">About</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
