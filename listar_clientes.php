<?php
require_once "conexao.php";

$sql = "SELECT id_cliente, nome, email, telefone, cidade FROM cliente ORDER BY id_cliente ASC";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes - TechInfo Soluções</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container table-container">
        <h1>Clientes Registados</h1>

        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["id_cliente"]) ?></td>
                            <td><?= htmlspecialchars($row["nome"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["telefone"]) ?></td>
                            <td><?= htmlspecialchars($row["cidade"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: #666;">Nenhum cliente registado até ao momento.</p>
        <?php endif; ?>

        <div style="margin-top: 25px;">
            <a href="cadastro_cliente.php" class="btn">Novo Registo</a>
        </div>
    </div>
</body>
</html>
<?php
$conexao->close();
?>