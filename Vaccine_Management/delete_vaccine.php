<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vaccine_id = $_POST['vaccine_id'];

    try {
        $pdo->beginTransaction();

        // Delete vaccine stock
        $stmt = $pdo->prepare('DELETE FROM Stock_Levels WHERE vaccine_id = ?');
        $stmt->execute([$vaccine_id]);

        // Delete vaccine batches
        $stmt = $pdo->prepare('DELETE FROM Vaccine_Batches WHERE vaccine_id = ?');
        $stmt->execute([$vaccine_id]);

        // Delete vaccine
        // Delete vaccine
        $stmt = $pdo->prepare('DELETE FROM Vaccines WHERE vaccine_id = ?');
        $stmt->execute([$vaccine_id]);

        $pdo->commit();
    } catch (Exception $e) {
    $pdo->rollBack();
    throw $e;
    }

    header('Location: dashboard.php');
    exit;
}
?>
