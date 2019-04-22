<?php 
    $current_page = "game";
    include 'partials/header.php'; 
    session_start();
    if(!isset($_SESSION["user"])) {
        session_destroy();
        header("Location: login_register.php");
        exit();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12" id="gameCanvas">

        </div>
    </div>
</div>

<script src="/FinalProject/resources/js/master.js"></script>
<script src="/FinalProject/resources/js/game.js"></script>
<?php include 'partials/footer.php'; ?>