<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotelName = $_POST['hotel_name']; 

    try {
        $sql = "INSERT INTO hotel (name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $hotelName);
        $stmt->execute();

        echo "Готель успішно додано!";
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
    <link rel="stylesheet" type="text/css" href="add.css">
    <title>Додати новий готель</title>
</head>
<body>
    <h2>Додати новий готель:</h2>
    <form action="add.php" method="post">
        <label for="hotel_name">Назва готелю:</label>
        <input type="text" name="hotel_name" required>
        <input type="submit" value="Додати готель">
    </form>

    <a href="lab4.php">На головну</a>
</body>
</html>
