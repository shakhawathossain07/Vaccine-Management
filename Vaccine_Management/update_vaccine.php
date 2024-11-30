<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vaccine_id = $_POST['vaccine_id'];
    $name = $_POST['vaccine_name'];
    $quantity = $_POST['vaccine_quantity'];

    try {
        $pdo->beginTransaction();

        // Update vaccine name
        $stmt = $pdo->prepare('UPDATE Vaccines SET name = ? WHERE vaccine_id = ?');
        $stmt->execute([$name, $vaccine_id]);

        // Update stock level
        $stmt = $pdo->prepare('UPDATE Stock_Levels SET quantity = ? WHERE vaccine_id = ?');
        $stmt->execute([$quantity, $vaccine_id]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

    header('Location: dashboard.php');
    exit;
}
?>
