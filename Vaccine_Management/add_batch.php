<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_number = $_POST['batch_number'];
    $vaccine_id = $_POST['vaccine_id'];
    $expiration_date = $_POST['expiration_date'];

    try {
        // Insert new batch
        $stmt = $pdo->prepare('
            INSERT INTO Vaccine_Batches (vaccine_id, batch_number, expiration_date) 
            VALUES (?, ?, ?)
        ');
        $stmt->execute([$vaccine_id, $batch_number, $expiration_date]);

        header('Location: dashboard.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
