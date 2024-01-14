<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="show_guest.css">
    <title>Список гостей</title>
</head>
<body>
    <h1>Список гостей</h1>

    <?php
    try {
        $sql = "SELECT guest_id, first_name, last_name, date_of_birth, address, phone, email FROM guest";
        $result = $conn->query($sql);

        echo "<h2>Інформація про гостей:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Address</th><th>Phone</th><th>Email</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["guest_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["date_of_birth"]."</td><td>".$row["address"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Немає даних про гостей.";
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
