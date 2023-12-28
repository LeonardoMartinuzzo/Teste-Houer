<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo2.css">
    <title>Lista de Vagas de Emprego</title>
</head>
<body>

    <header>
        <h1>Vagas de Emprego</h1>
    </header>
    
    <form action="" method="GET">
        <label for="pesquisa">Pesquisar:</label>
        <input type="text" id="pesquisa" name="pesquisa">
        <button type="submit">Buscar</button>
    </form>

    <section class="job-list">
        <?php
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '080423Leo*';
        $dbName = 'Testehouer';
    
        $conexao = new MySQLi($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
        }

        $itensPorPagina = 10;

        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $offset = ($paginaAtual - 1) * $itensPorPagina;

        // Consulta SQL com limite, deslocamento e pesquisa.
        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

        $sql = "SELECT * FROM Vagas WHERE titulo LIKE '%$pesquisa%' OR empresa LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa%' LIMIT $offset, $itensPorPagina";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            echo '<ol>';
            while ($row = $result->fetch_assoc()) {
                echo '<li class="job">';
                echo '<h2>' . $row['titulo'] . '</h2>';
                echo '<p>' . $row['empresa'] . '</p>';
                echo '<p>Descrição: ' . $row['descricao'] . '</p>';
                echo '<p>status_vaga: ' . $row['status_vaga'] . '</p>';
                echo '<label for="anexo">Anexar arquivo:</label>';
                echo '<input type="file" id="anexo" name="anexo" accept=".pdf, .doc, .docx">';
                echo '<button type="submit">Enviar</button>';
                echo '</li>';
            }
            echo '</ol>';

            // Adicionar links para a paginação
            $sqlTotal = "SELECT COUNT(*) AS total FROM Vagas";
            $resultTotal = $conexao->query($sqlTotal);
            $rowTotal = $resultTotal->fetch_assoc();
            $totalItens = $rowTotal['total'];
            $totalPaginas = ceil($totalItens / $itensPorPagina);

            echo '<div class="pagination">';
            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
            }
            echo '</div>';
        } else {
            echo 'Nenhuma vaga encontrada.';
        }

        // Fechar conexão com o banco de dados
        $conexao->close();
        ?>
    </section>

    <footer>
        <p>&copy; 2023 Lista de Vagas de Emprego</p>
    </footer>

</body>
</html>
