<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lab4.css">
    <title>Головна сторінка</title>
</head>
<body>
    <h1>Головна сторінка</h1>
    <br>
    <a href="add.php">Додати дані</a>
    <a href="delete.php">Видалити дані</a>
    <a href="update.php">Оновити дані</a>
    <br>
    <a href="show_staff.php">Переглянути співробітників</a>
    <a href="show_guest.php">Переглянути гостей</a>
    <a href="show_room.php">Переглянути кімнати</a>
    <a href="show_booking.php">Переглянути бронювання</a>
    <a href="show_payment.php">Переглянути оплати</a>
    <?php
    try {
        $sql = "SELECT hotel_id, name, address, phone, email, stars FROM hotel";
        $result = $conn->query($sql);

        echo "<h2>Важливі дані з бази даних:</h2>";

        if ($result->rowCount() > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Stars</th></tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row["hotel_id"]."</td><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["stars"]."</td></tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
    ?>

</body>
</html>
