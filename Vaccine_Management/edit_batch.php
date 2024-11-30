<?php
session_start();
require 'db.php';

$batch_id = $_GET['batch_id'];

// Fetch batch details
$stmt = $pdo->prepare('SELECT * FROM Vaccine_Batches WHERE batch_id = ?');
$stmt->execute([$batch_id]);
$batch = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch vaccines for selection
$vaccines = $pdo->query('SELECT * FROM Vaccines')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Batch</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Edit Batch</h1>
    <form action="update_batch.php" method="post">
        <input type="hidden" name="batch_id" value="<?php echo $batch['batch_id']; ?>">
        <label for="batch_number">Batch Number:</label>
        <input type="text" id="batch_number" name="batch_number" value="<?php echo $batch['batch_number']; ?>" required>
        <label for="vaccine_id">Vaccine:</label>
        <select id="vaccine_id" name="vaccine_id" required>
            <?php foreach ($vaccines as $vaccine): ?>
                <option value="<?php echo $vaccine['vaccine_id']; ?>" <?php echo ($vaccine['vaccine_id'] == $batch['vaccine_id']) ? 'selected' : ''; ?>>
                    <?php echo $vaccine['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date" value="<?php echo $batch['expiration_date']; ?>" required>
        <button type="submit">Update Batch</button>
    </form>
    <a href="dashboard.php">Cancel</a>
</body>
</html>
