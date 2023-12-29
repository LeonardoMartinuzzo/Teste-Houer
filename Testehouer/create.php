<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $empresa = $_POST['empresa'];
    $descricao = $_POST['descricao'];
    $status_vaga = $_POST['status_vaga'];

    $result = mysqli_query(
        $conexao,
        "INSERT INTO Vagas (titulo, empresa, descricao, status_vaga) 
        VALUES ('$titulo', '$empresa', '$descricao', '$status_vaga')"
    );


    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Adicionar Vaga</title>
</head>
<body>

    <div class="container">
        <h2>Adicionar Vaga</h2>
        <form action="create.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>

            <label for="status_vaga">Status da Vaga:</label>
            <select id="status_vaga" name="status_vaga" required>
                <option value="aberta">Aberta</option>
                <option value="fechada">Fechada</option>
            </select>

            <button type="submit">Adicionar Vaga</button>
        </form>
    </div>

</body>
</html>
