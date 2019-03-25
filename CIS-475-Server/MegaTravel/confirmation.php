<?php include 'partials/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <h2 class="card-header">Hello, a new client as submitted the form on your website! Here is the information they submitted:</h2>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Client Name: <b><?php echo $fullName; ?></b></li>
                        <li class="list-group-item">Client Phone Number: <b><?php echo $phoneNumber; ?></b></li>
                        <li class="list-group-item">Client Email: <b><?php echo $email; ?></b></li>
                        <li class="list-group-item">Number of Adults: <b><?php echo  $adultNum; ?></b></li>
                        <li class="list-group-item">Number of Children: <b><?php echo $childrenNum; ?></b></li>
                        <li class="list-group-item">Destination: <b><?php echo $destination; ?></b></li>
                        <li class="list-group-item">Travel Dates: <b><?php echo $fromDate . " - " . $toDate; ?></b></li>
                        <li class="list-group-item">Interested Activities: <b><?php echo $activity; ?></b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>