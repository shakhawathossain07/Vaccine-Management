<?php
session_start();
require 'db.php';

$appointment_id = $_GET['appointment_id'];

// Fetch appointment details
$stmt = $pdo->prepare('SELECT * FROM Appointments WHERE appointment_id = ?');
$stmt->execute([$appointment_id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch vaccines for selection
$vaccines = $pdo->query('SELECT * FROM Vaccines')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Edit Appointment</h1>
    <form action="update_appointment.php" method="post">
        <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
        <label for="vaccine_id">Vaccine:</label>
        <select id="vaccine_id" name="vaccine_id" required>
            <?php foreach ($vaccines as $vaccine): ?>
                <option value="<?php echo $vaccine['vaccine_id']; ?>" <?php echo ($vaccine['vaccine_id'] == $appointment['vaccine_id']) ? 'selected' : ''; ?>>
                    <?php echo $vaccine['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="appointment_date">Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>" required>
        <button type="submit">Update Appointment</button>
    </form>
    <a href="dashboard.php">Cancel</a>
</body>
</html>
