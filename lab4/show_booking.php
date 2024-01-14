<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="show_booking.css">
    <title>Список бронювань</title>
</head>
<body>
    <h1>Список бронювань</h1>

    <?php
    try {
        $sql = "SELECT booking_id, guest_id, room_number, checkin_date, checkout_date, total_price FROM booking";
        $result = $conn->query($sql);

        echo "<h2>Інформація про бронювання:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>Booking ID</th><th>Guest ID</th><th>Room Number</th><th>Check-in Date</th><th>Checkout Date</th><th>Total Price</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["booking_id"]."</td><td>".$row["guest_id"]."</td><td>".$row["room_number"]."</td><td>".$row["checkin_date"]."</td><td>".$row["checkout_date"]."</td><td>".$row["total_price"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Немає даних про бронювання.";
        }
    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <br>
    <a href="lab4.php">На головну</a>
</body>
</html>
