<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['vaccine_name'];
    $quantity = $_POST['vaccine_quantity'];

    try {
        $pdo->beginTransaction();

        // Insert new vaccine
        $stmt = $pdo->prepare('INSERT INTO Vaccines (name) VALUES (?)');
        $stmt->execute([$name]);
        $vaccine_id = $pdo->lastInsertId();

        // Insert stock level
        $stmt = $pdo->prepare('INSERT INTO Stock_Levels (vaccine_id, quantity) VALUES (?, ?)');
        $stmt->execute([$vaccine_id, $quantity]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

    header('Location: dashboard.php');
    exit;
}
?>
