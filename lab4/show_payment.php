<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="show_payment.css">
    <title>Список платежів</title>
</head>
<body>
    <h1>Список платежів</h1>

    <?php
    try {
        $sql = "SELECT payment_id, booking_id, amount, payment_date, payment_method FROM payment";
        $result = $conn->query($sql);

        echo "<h2>Інформація про платежі:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>Payment ID</th><th>Booking ID</th><th>Amount</th><th>Payment Date</th><th>Payment Method</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["payment_id"]."</td><td>".$row["booking_id"]."</td><td>".$row["amount"]."</td><td>".$row["payment_date"]."</td><td>".$row["payment_method"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Немає даних про платежі.";
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