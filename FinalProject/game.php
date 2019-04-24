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

<div class="container mt-3">
    <div class="row mb-2">
        <div class="col-1">
            <button type="button" class="btn btn-success" id="startGame">Start</button>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-danger" id="resetGame">Reset</button>
        </div>
        <div class="col-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="scoreAddon">Score: </span>
                </div>
                <input id="scoreInput" type="text" class="form-control" placeholder="0" aria-label="score" aria-describedby="scoreAddon" disabled>
            </div>
        </div>
        <div class="col-8">
            <h3 class="float-right">Player: <b><?php echo $_SESSION["user"]; ?><b></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="gameCanvas"></div>
        </div>
    </div>
</div>
<script>
    const USER = "<?php echo $_SESSION["user"]; ?>";
</script>
<script src="/FinalProject/resources/js/master.js"></script>
<script src="/FinalProject/resources/js/game.js"></script>
<?php include 'partials/footer.php'; ?>