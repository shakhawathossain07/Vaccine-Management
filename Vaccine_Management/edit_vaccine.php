<?php
session_start();
require 'db.php';

$vaccine_id = $_GET['vaccine_id'];

// Fetch vaccine details
$stmt = $pdo->prepare('SELECT * FROM Vaccines WHERE vaccine_id = ?');
$stmt->execute([$vaccine_id]);
$vaccine = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch stock level
$stmt = $pdo->prepare('SELECT * FROM Stock_Levels WHERE vaccine_id = ?');
$stmt->execute([$vaccine_id]);
$stock = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vaccine</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Edit Vaccine</h1>
    <form action="update_vaccine.php" method="post">
        <input type="hidden" name="vaccine_id" value="<?php echo $vaccine['vaccine_id']; ?>">
        <label for="vaccine_name">Vaccine Name:</label>
        <input type="text" id="vaccine_name" name="vaccine_name" value="<?php echo $vaccine['name']; ?>" required>
        <label for="vaccine_quantity">Quantity:</label>
        <input type="number" id="vaccine_quantity" name="vaccine_quantity" value="<?php echo $stock['quantity']; ?>" required>
        <button type="submit">Update Vaccine</button>
    </form>
    <a href="dashboard.php">Cancel</a>
</body>
</html>
