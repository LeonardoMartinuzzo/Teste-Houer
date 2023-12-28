<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vagas.css">
    <title>Lista de Vagas de Emprego</title>
</head>
<body>

    <header>
        <h1>Vagas de Emprego</h1>
    </header>

    <section class="job-list">
        <?php
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '080423Leo*';
        $dbName = 'Testehouer';
    
        $conn = new MySQLi($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Vagas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<ol>';
            while ($row = $result->fetch_assoc()) {
                echo '<li class="job">';
                echo '<h2>' . $row['titulo'] . '</h2>';
                echo '<p>' . $row['empresa'] . '</p>';
                echo '<p>Descrição: ' . $row['descricao'] . '</p>';
                echo '<label for="anexo">Anexar arquivo:</label>';
                echo '<input type="file" id="anexo" name="anexo" accept=".pdf, .doc, .docx">';
                echo '<button type="submit">Enviar</button>';
                echo '</li>';
            }
            echo '</ol>';
        } else {
            echo 'Nenhuma vaga encontrada.';
        }

        // Fechar conexão com o banco de dados
        $conn->close();
        ?>
    </section>

</body>
</html>
