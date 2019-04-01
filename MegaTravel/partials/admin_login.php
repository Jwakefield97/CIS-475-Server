<?php include 'partials/header.php'; ?>
<div class="container-fluid">
    <div id="formWrapper" class="col-4 mx-auto">
        <div class="card">
            <h2 class="card-header p-2 underline">Admin Signin</h2>
            <div class="card-body">
                <form ng-controller="adminController" action="/MegaTravel/forms/admin_form.php" method="post" >
                    <div class="form-row">
                        <div class="col-6 mb-3">
                            <label for="username">Username:</label>
                            <input placeholder="username" ng-model="username" name="username" class="form-control" id="username" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-6 mb-3">
                            <label for="password">Password:</label>
                            <input ng-model="password" placeholder="password" type="password" name="password" class="form-control" id="password" required>
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
<script src="/MegaTravel/resources/js/admin.js"></script>
<?php include 'partials/footer.php'; ?>
