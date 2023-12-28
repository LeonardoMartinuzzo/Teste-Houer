<?php

if(isset($_POST['submit']))
{
include_once('config.php');
$nome = $_POST['first-name'];
$sobrenome = $_POST['last-name'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$genero =$_POST['campo-selecao'];
$senha = $_POST['senha'];

$result = mysqli_query(
    $conexao,
    "INSERT INTO candidatos (nome, sobrenome, email, telefone, sexo, senha) 
    VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$genero', '$senha')"
);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="Estilo.css">
    </head>
<body>
    <div class="container">
        <h1>Cadastro do Candidato</h1>
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="first-name" name="first-name" required>

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="last-name" name="last-name" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail">
            
            <label for="telefone">Telefone / WhatsApp:</label>
            <input type="tel" id="telefone" name="telefone" maxlength="11" placeholder="DDD 00000-0000">
            
            <label for="campo-selecao">Sexo:</label>
            <select id="campo-selecao" name="campo-selecao">
                <option value="opcao1">Masculino</option>
                <option value="opcao2">Feminino</option>
                <option value="opcao3">Outro</option>
            </select>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
        <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>