<?php
    $current_page = "leaderboard";
    include 'partials/header.php'; 
?>
<div class="row mt-3">
    <div id="colWrapper" class="col-6 mx-auto">
        <?php
            include 'forms/utils.php'; 
            $leaderBoard = getLeaderBoard();
            if ($leaderBoard->num_rows > 0) {
                echo '<table class="table table-striped"><thead><tr><th scope="col">Username</th><th scope="col">Score</th><th scope="col">Date Set</th></tr></thead><tbody>';
                while($row = $leaderBoard->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["username"] . "</th>";
                    echo "<td>" . $row["score"] . "</td>";
                    echo "<td>" . $row["date_scored"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "no scores!";
            }
        ?>
    </div>
</div>

<script src="/FinalProject/resources/js/learderboard.js"></script>
<?php include 'partials/footer.php'; ?>