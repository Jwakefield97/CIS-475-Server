<?php 
    $current_page = "login";
    include 'partials/header.php'; 
?>
    
<?php 
    //check to see if the page was redirected because of a login/register error
    if(isset($_GET["loginFail"]) && strcmp($_GET["loginFail"],"1") === 0) {
        echo '<div class="row mt-3"><div class="col-4 mx-auto">';
        echo '<div class="alert alert-danger" role="alert"> Failed to log in! The username or password is wrong. </div>';
        echo '</div></div>';
    } else if (isset($_GET["registerFail"]) && strcmp($_GET["registerFail"],"1") === 0) {
        echo '<div class="row mt-3"><div class="col-4 mx-auto">';
        echo '<div class="alert alert-danger" role="alert"> Failed to register! Either the username is taken or the form was filled out improperly. </div>';
        echo '</div></div>';
    } else if (isset($_GET["serverError"]) && strcmp($_GET["serverError"],"1") === 0) {
        echo '<div class="row mt-3"><div class="col-4 mx-auto">';
        echo '<div class="alert alert-danger" role="alert"> Error: there was an issue submitting your data. Please try again later</div>';
        echo '</div></div>';
    }
?>

<div class="row mt-3">
    <div class="col-4 mx-auto">
        <ul class="nav nav-tabs mb-1" id="tabpanel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
            </li>
        </ul>
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <div class="card">
                <div class="card-body">
                    <form ng-controller="loginController" action="/FinalProject/forms/login.php" method="post" >
                        <div class="form-row">
                            <div class="col-6 mb-3">
                                <label for="username">Username:</label>
                                <input placeholder="username" ng-model="username" name="username" class="form-control" id="loginUsername" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-6 mb-3">
                                <label for="password">Password:</label>
                                <input ng-model="password" placeholder="password" type="password" name="password" class="form-control" id="loginPassword" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right ml-2" ng-submit="submit()">Submit</button>
                                <button type="button" class="btn btn-danger float-right" ng-click="reset()">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <div class="card">
                <div class="card-body">
                    <form ng-controller="loginController" action="/FinalProject/forms/register.php" method="post" >
                        <div class="form-row">
                            <div class="col-6 mb-3">
                                <label for="username">Username:</label>
                                <input placeholder="username" ng-model="username" name="username" class="form-control" id="registerUsername" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-6 mb-3">
                                <label for="password">Password:</label>
                                <input ng-model="password" placeholder="password" type="password" name="password" class="form-control" id="registerPassword" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right ml-2" ng-submit="submit()">Submit</button>
                                <button type="button" class="btn btn-danger float-right" ng-click="reset()">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/FinalProject/resources/js/login.js"></script>
<?php include 'partials/footer.php'; ?>