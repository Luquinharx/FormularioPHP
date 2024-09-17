<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Seção da Lista de Usuários -->
    <div id="user-list-section">
        <h2>Lista de Usuários</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
            <!-- PHP para listar usuários -->
            <?php
            include 'db.php'; // Conexão com o banco de dados
            $sql = "SELECT * FROM users";
            $stmt = $conn->query($sql);

            // Obtendo o número de linhas usando rowCount()
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["age"]. "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Editar</a> |
                            <a href='delete.php?id=" . $row["id"] . "'>Excluir</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário encontrado</td></tr>";
            }

            // Fechando a conexão
            $conn = null;
            ?>
        </table>
    </div>
</body>
</html>
