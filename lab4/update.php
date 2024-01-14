<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotelId = $_POST['hotel_id'];
    $newName = $_POST['new_name'];
    $newAddress = $_POST['new_address'];
    $newPhone = $_POST['new_phone'];
    $newEmail = $_POST['new_email'];
    $newStars = $_POST['new_stars'];
    $newCheckinTime = $_POST['new_checkin_time'];
    $newCheckoutTime = $_POST['new_checkout_time'];

    try {
        $sql = "UPDATE hotel SET 
                name = :new_name,
                address = :new_address,
                phone = :new_phone,
                email = :new_email,
                stars = :new_stars,
                checkin_time = :new_checkin_time,
                checkout_time = :new_checkout_time
                WHERE hotel_id = :hotel_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':new_name', $newName);
        $stmt->bindParam(':new_address', $newAddress);
        $stmt->bindParam(':new_phone', $newPhone);
        $stmt->bindParam(':new_email', $newEmail);
        $stmt->bindParam(':new_stars', $newStars);
        $stmt->bindParam(':new_checkin_time', $newCheckinTime);
        $stmt->bindParam(':new_checkout_time', $newCheckoutTime);
        $stmt->bindParam(':hotel_id', $hotelId);
        $stmt->execute();

        echo "Дані готелю оновлено успішно!";
    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="update.css">
    <title>Оновлення готелю</title>
</head>
<body>
    <h2>Оновлення готелю:</h2>
    <form action="update.php" method="post">
        <label for="hotel_id">ID готелю:</label>
        <input type="text" name="hotel_id" required>

        <label for="new_name">Нова назва:</label>
        <input type="text" name="new_name" required>

        <input type="submit" value="Оновити готель">
    </form>

    <br>
    <a href="lab4.php">На головну</a>
</body>
</html>