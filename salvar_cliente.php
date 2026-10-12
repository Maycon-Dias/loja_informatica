<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome     = trim($_POST["nome"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $cidade   = trim($_POST["cidade"] ?? "");

    if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cidade)) {
        $stmt = $conexao->prepare("INSERT INTO cliente (nome, email, telefone, cidade) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $telefone, $cidade);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Cliente cadastrado com sucesso!');
                    window.location.href = 'listar_clientes.php';
                  </script>";
        } else {
            echo "Erro ao guardar o registo: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Por favor, preencha todos os campos.');
                window.location.href = 'cadastro_cliente.php';
              </script>";
    }
}

$conexao->close();
?>