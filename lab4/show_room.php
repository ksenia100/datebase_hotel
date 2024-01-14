<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="show_room.css">
    <title>Список кімнат</title>
</head>
<body>
    <h1>Список кімнат</h1>

    <?php
    try {
        $sql = "SELECT room_number, hotel_id, type_id, status FROM room";
        $result = $conn->query($sql);

        echo "<h2>Інформація про кімнати:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>Room Number</th><th>Hotel ID</th><th>Type ID</th><th>Status</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["room_number"]."</td><td>".$row["hotel_id"]."</td><td>".$row["type_id"]."</td><td>".$row["status"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Немає даних про кімнати.";
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
