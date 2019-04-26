<?php 
    $current_page = "game";
    include 'partials/header.php'; 
    include 'forms/utils.php'; 
    $userHeighScore = 0;

    session_start();
    if(!isset($_SESSION["user"])) {
        session_destroy();
        header("Location: login_register.php");
        exit();
    } else {
        $userHeighScore = getUserScore($_SESSION["user"])->fetch_assoc()["score"];
    }
?>

<div class="container mt-3">
    <div class="row mb-2">
        <div class="col-2">
            <button type="button" class="btn btn-success" onclick="this.blur();" id="startGame">Start</button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger" onclick="this.blur();" id="resetGame">Reset</button>
        </div>
        <div class="col-2">
            <h5>Score:</h5><b><span id="scoreInput">0</span></b>
        </div>
        <div class="col-2">
            <h5>High Score:</h5><b><span id="highScore"><?php echo $userHeighScore; ?></span></b>
        </div>
        <div class="col-4">
            <h5 class="float-right">Player: <b><?php echo $_SESSION["user"]; ?><b></h5>
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
    let HEIGH_SCORE = <?php if(!empty($userHeighScore)) {echo $userHeighScore;} else { echo 0; } ?>;
</script>
<script src="/FinalProject/resources/js/master.js"></script>
<script src="/FinalProject/resources/js/game.js"></script>
<?php include 'partials/footer.php'; ?>