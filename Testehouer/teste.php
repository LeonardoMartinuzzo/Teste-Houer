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
        <ol>
            <?php
            // Itens por página
            $itensPorPagina = 10;

            // Número total de itens
            $totalItens = 100; // Substitua pelo número total de itens

            // Número total de páginas
            $totalPaginas = ceil($totalItens / $itensPorPagina);

            // Página atual
            $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

            // Índice do primeiro item da página atual
            $indicePrimeiroItem = ($paginaAtual - 1) * $itensPorPagina;

            // Loop para exibir os itens da página atual
            for ($i = $indicePrimeiroItem; $i < min($totalItens, $indicePrimeiroItem + $itensPorPagina); $i++) {
                echo '<li class="job">';
                echo '<h2>Analista de sistemas</h2>';
                // ... Restante do conteúdo do item aqui ...
                echo '<label for="anexo">Anexar arquivo:</label>';
                echo '<input type="file" id="anexo" name="anexo" accept=".pdf, .doc, .docx">';
                echo '<button type="submit">Enviar</button>';
                echo '</li>';
            }
            ?>
        </ol>

        <!-- Controles de navegação entre páginas -->
        <div class="pagination">
            <!-- Páginas anteriores -->
            <?php
            if ($paginaAtual > 1) {
                echo '<a href="?pagina=' . ($paginaAtual - 1) . '">Anterior</a>';
            }
            ?>

            <!-- Menu suspenso para seleção de página -->
            <select onchange="window.location.href = this.value">
                <?php
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo '<option value="?pagina=' . $i . '" ' . ($i == $paginaAtual ? 'selected' : '') . '>' . $i . '</option>';
                }
                ?>
            </select>

            <!-- Próximas páginas -->
            <?php
            if ($paginaAtual < $totalPaginas) {
                echo '<a href="?pagina=' . ($paginaAtual + 1) . '">Próxima</a>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Lista de Vagas de Emprego</p>
    </footer>

</body>
</html>
