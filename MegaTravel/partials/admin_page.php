<?php include 'partials/header.php'; ?>

<div class="container-fluid"> 
    <div class="row">
        <div class="col-12">
            <a href="/MegaTravel/log_out.php"><button class="btn btn-danger float-right">Log out</button></a>
        </div>
    </div>
    <?php 
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
            $sql = "SELECT * FROM megatravel.reservation ORDER BY id ASC";
            $db_url = "localhost";
            $db_username = "root";
            $db_password = "";
            
            // Create connection
            $conn = new mysqli($db_url, $db_username, $db_password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else {
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='row mt-3'><div class='col-12 mx-auto'><div class='card'><div class='card-header'> Reservation number: " . $row["id"]. "</div><div class='card-body'><ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item'>Client Name: <b>" . $row["client_name"] . "</b></li>";
                        echo "<li class='list-group-item'>Client Phone Number: <b>" . $row["client_phone_number"] . "</b></li>";
                        echo "<li class='list-group-item'>Client Email: <b>" . $row["client_email"] . "</b></li>";
                        echo "<li class='list-group-item'>Number of Adults: <b>" . $row["number_adults"] . "</b></li>";
                        echo "<li class='list-group-item'>Number of Children: <b>" . $row["number_children"] . "</b></li>";
                        echo "<li class='list-group-item'>Destination: <b>" . $row["destination"] . "</b></li>";
                        echo "<li class='list-group-item'>Travel Dates: <b>" . $row["from_date"] . " - " . $row["to_date"] . "</b></li>";
                        echo "<li class='list-group-item'>Interested Activities: <b>" . $row["activity"] . "</b></li>";
                        echo "</ul></div></div></div></div>";
                    }
                } else {
                    echo "no reservations!";
                }
            }

            echo "<script>$(document).ready(function() { $('footer').css('position','relative');});</script> ";
    
            $conn->close();
        }else{  //redirect if not logged in
            header("Location: ../admin.php");
            exit();
        }
    ?>
</div>


<script src="/MegaTravel/resources/js/admin.js"></script>
<?php include 'partials/footer.php'; ?>