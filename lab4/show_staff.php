<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="show_staff.css">
    <title>Список співробітників</title>
</head>
<body>
    <h1>Список співробітників</h1>

    <?php
    try {
        $sql = "SELECT staff_id, hotel_id, name, position, contact_number, email FROM staff";
        $result = $conn->query($sql);

        echo "<h2>Інформація про співробітників:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Hotel ID</th><th>Name</th><th>Position</th><th>Contact Number</th><th>Email</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["staff_id"]."</td><td>".$row["hotel_id"]."</td><td>".$row["name"]."</td><td>".$row["position"]."</td><td>".$row["contact_number"]."</td><td>".$row["email"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Немає даних про співробітників.";
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
