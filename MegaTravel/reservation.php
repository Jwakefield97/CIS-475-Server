<?php include 'partials/header.php'; ?>

<div class="container-fluid">
    <div id="formWrapper" class="col-8 mx-auto">
        <div class="card">
            <h2 class="card-header p-2 underline">Make a Reservation</h2>
            <div class="card-body">
                <form ng-controller="reservationController" action="/MegaTravel/forms/reservation_form.php" method="post" >
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="adultNum">Full name:</label>
                            <input placeholder="John Doe" ng-model="fullName" name="fullName" class="form-control" id="fullName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="adultNum">Number of Adults:</label>
                            <input value="0" ng-model="adultNum" type="number" name="adultNum" class="form-control" id="adultNum" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="childrenNum">Number of children:</label>
                            <input value="0" ng-model="childrenNum" type="number" name="childrenNum" class="form-control" id="childrenNum" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="fromDate">From Date:</label>
                            <input ng-model="fromDate" name="fromDate" class="form-control" id="fromDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="toDate">To Date:</label>
                            <input ng-model="toDate" name="toDate" class="form-control" id="toDate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="destination">Destination: </label>
                            <select class="form-control" id="destination" name="destination" ng-model="currentCity" required>
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
                        <div class="col-md-4 mb-3">
                            <label for="email">Email:</label>
                            <input ng-model="email" placeholder="example@gmail.com" type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="phoneNumber">Phone number:</label>
                            <input ng-model="phoneNumber" type="tel" placeholder="Optional - 1-111-111-1111" name="phoneNumber" class="form-control" id="phoneNumber">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right ml-2" ng-submit="submit()">Submit</button>
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