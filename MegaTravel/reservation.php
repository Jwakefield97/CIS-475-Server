<?php include 'partials/header.php'; ?>

<div class="container-fluid">
    <div id="formWrapper" class="col-8 mx-auto">
        <div class="card">
            <h2 class="card-header p-2 underline">Make a Reservation</h2>
            <div class="card-body">
                <form action="/MegaTravel/forms/reservation_form.php" method="post">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="firstname">First name</label>
                            <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="lastname">Last name</label>
                            <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="fromDate">From Date</label>
                            <input name="fromDate" class="form-control" id="fromDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="toDate">To Date</label>
                            <input name="toDate" class="form-control" id="toDate" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="departureCity">Departure City</label>
                            <input name="departureCity" type="text" class="form-control" placeholder="Where are you leaving from?" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="destinationCity">Destination City</label>
                            <input name="destinationCity" type="text" class="form-control" placeholder="Where are you going?" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/MegaTravel/resources/js/reservation.js"></script>
<?php include 'partials/footer.php'; ?>