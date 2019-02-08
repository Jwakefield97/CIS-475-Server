<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="col-6 mx-auto">
    <div class="card">
        <h2 class="card-header p-2 underline">Make a Reservation</h2>
        <div class="card-body">
            <form action="/MegaTravel/forms/reservation_form.php" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="firstname">First name</label>
                        <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First name" value="firstname" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastname">Last name</label>
                        <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last name" value="lastname" required>
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
<?php include 'footer.php'; ?>