<?php include 'partials/header.php'; ?>

<div class="container-fluid">
    <div id="formWrapper" class="col-8 mx-auto">
        <div class="card">
            <h2 class="card-header p-2 underline">Make a Reservation</h2>
            <div class="card-body">
                <form ng-controller="reservationController" action="/MegaTravel/forms/reservation_form.php" method="post" >

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="destination">Destination: </label>
                            <select class="form-control" id="destination" name="destination" ng-model="currentCity">
                                <option ng-repeat="(key, value) in cities" value="{{key}}">{{key}}</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="activity">Activity: </label>
                            <select class="form-control" id="activity" name="activity">
                                <option ng-repeat="activity in cities[currentCity]" value="{{activity}}">{{activity}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
                            <button type="button" class="btn btn-danger float-right" ng-click="reset()">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/MegaTravel/resources/js/reservation.js"></script>
<?php include 'partials/footer.php'; ?>