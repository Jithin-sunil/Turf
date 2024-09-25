<?php
include("../Connection/connection.php");

if (isset($_GET["action"])) {

    $sqlQry = "SELECT * FROM tbl_newowner p 
               INNER JOIN tbl_place sc ON sc.place_id = p.place_id 
               INNER JOIN tbl_district c ON c.dist_id = sc.dist_id 
               LEFT JOIN tbl_offer o ON p.owner_id = o.owner_id 
               WHERE true";

    if ($_GET["district"] != null) {
        $district = $_GET["district"];
        $sqlQry .= " AND c.dist_id IN(".$district.")";
    }
    if ($_GET["place"] != null) {
        $place = $_GET["place"];
        $sqlQry .= " AND sc.place_id IN(".$place.")";
    }
    if ($_GET["name"] != null) {
        $name = $_GET["name"];
        $sqlQry .= " AND owner_name LIKE '".$name."%'";
    }

    $resultS = $con->query($sqlQry);

    if ($resultS->num_rows > 0) {
        while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
    <div class="card-deck">
        <div class="card border-secondary">
            <img src="../Assets/File/Owner/<?php echo $rowS['owner_photo'] ?>" class="card-img-top" height="250">
            <div class="card-img-secondary">
                <h6 class="text-light bg-info text-center rounded p-1"><?php echo $rowS["owner_name"]; ?></h6>
            </div>
            <div class="card-body">
                <h4 class="card-title text-danger" align="center">
                    <!-- Price: Display the price if needed -->
                </h4>
                <p align="center">
                    <?php echo $rowS["dist_name"]; ?><br>
                    <?php echo $rowS["place_name"]; ?><br>
                </p>

               <!-- Display Offer Details if Available and Not Expired -->
<?php
$current_date = date('Y-m-d'); // Get current date in 'Y-m-d' format

if (!empty($rowS["offer_rate"]) && strtotime($rowS["offer_date"]) >= strtotime($current_date)): ?>
    <p class="text-success" align="center">Special Offer: <?php echo $rowS["offer_rate"]; ?>%</p>
    <p class="text-muted" align="center">Valid Till: <?php echo date('d M Y', strtotime($rowS["offer_date"])); ?></p>
<?php else: ?>
    <p class="text-muted" align="center">No Offers Available</p>
<?php endif; ?>

                <!-- Rating Display (same as previous) -->
                <?php
                $average_rating = 0;
                $total_review = 0;
                $five_star_review = 0;
                $four_star_review = 0;
                $three_star_review = 0;
                $two_star_review = 0;
                $one_star_review = 0;
                $total_user_rating = 0;

                $query = "SELECT * FROM tbl_review WHERE owner_id = '".$rowS["owner_id"]."' ORDER BY review_id DESC";
                $result = $con->query($query);

                while ($row = $result->fetch_assoc()) {
                    if ($row["user_rating"] == '5') $five_star_review++;
                    if ($row["user_rating"] == '4') $four_star_review++;
                    if ($row["user_rating"] == '3') $three_star_review++;
                    if ($row["user_rating"] == '2') $two_star_review++;
                    if ($row["user_rating"] == '1') $one_star_review++;
                    $total_review++;
                    $total_user_rating += $row["user_rating"];
                }

                if ($total_review == 0 || $total_user_rating == 0) {
                    $average_rating = 0;
                } else {
                    $average_rating = $total_user_rating / $total_review;
                }
                ?>

                <p align="center" style="color:#F96;font-size:20px">
                    <!-- Display Stars Based on Average Rating -->
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $average_rating) {
                            echo '<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>';
                        } else {
                            echo '<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>';
                        }
                    }
                    ?>
                </p>

                <a href="Bookturf.php?cid=<?php echo $rowS["owner_id"]; ?>" class="btn btn-warning btn-block">Book</a>
            </div>
        </div>
    </div>
</div>

<?php
        }
    } else {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}
?>
