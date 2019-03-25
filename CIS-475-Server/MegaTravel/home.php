<?php include 'partials/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/MegaTravel/resources/images/rome.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h5>Rome, Italy</h5>
                            <p>Travel to Italy and see the Coliseum!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/MegaTravel/resources/images/tokyo.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h5>Tokyo, Japan</h5>
                            <p>Travel to Tokyo and experience the night life!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/MegaTravel/resources/images/jamaica.jpg" alt="Third slide">
                        <div class="carousel-caption text-dark">
                            <h5>Montego Bay, Jamaica</h5>
                            <p>Relax on the beaches of Jamaica!</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="/MegaTravel/resources/js/home.js"></script>

<?php include 'partials/footer.php'; ?>