<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotelId = $_POST['hotel_id'];

    try {
        $sql = "DELETE FROM hotel WHERE hotel_id = :hotel_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':hotel_id', $hotelId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Готель з ID $hotelId успішно видалено!";
        } else {
            echo "Готель з ID $hotelId не знайдено або не може бути видалений.";
        }
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
    <link rel="stylesheet" type="text/css" href="delete.css">
    <title>Видалити готель</title>
</head>
<body>
    <h2>Видалити готель за ID:</h2>
    <form action="delete.php" method="post">
        <label for="hotel_id">ID готелю для видалення:</label>
        <input type="text" name="hotel_id" required>
        <input type="submit" value="Видалити готель">
    </form>

    <a href="lab4.php">На головну</a>
</body>
</html>
