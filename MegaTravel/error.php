<?php include 'partials/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 mx-auto">
            <h3>An Error Occured: <?php echo $errorTitle; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <P>
                        <?php echo $errorBody ?>
                    </p>
                    <a href="<?php echo $redirectLink ?>">Return to previous page.</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>