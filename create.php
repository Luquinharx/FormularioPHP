<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Insere o novo usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (:name, :email, :age)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Criar Novo Usuário</h1>
    <form action="create.php" method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="age">Idade:</label>
        <input type="number" name="age" required>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
