<?php
include 'db.php';

$id = $_GET['id'];

// Deleta o usuário do banco de dados
$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: index.php");
?>
