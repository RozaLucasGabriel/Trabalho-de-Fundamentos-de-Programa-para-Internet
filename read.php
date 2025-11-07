<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Currículo Gerado</title>

    <!-- Aqui eu importo o Bootstrap pra deixar o visual mais bonito -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- E também o meu CSS pra manter o estilo do site -->
    <link rel="stylesheet" href="style.css">
</head>

<!-- Uso o body com fundo claro e flex pra manter o rodapé embaixo -->
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Aqui é o cabeçalho azul com o título -->
    <header class="bg-primary text-white text-center py-4 shadow-sm">
        <h2>Curriculum Vitae</h2>
    </header>

    <!-- Aqui começa o conteúdo principal do currículo -->
    <main class="container flex-grow-1">
        <!-- Coloquei tudo dentro de um card branco pra ficar organizado -->
        <div class="bg-white p-4 rounded shadow-sm mb-4">
            
            <!-- Parte dos dados pessoais -->
            <h4 class="text-primary">Dados Pessoais</h4>
            <hr>
            <p><b>Nome:</b> <?= $_POST['nome'] ?></p>
            <p><b>Email:</b> <?= $_POST['email'] ?></p>
            <p><b>Telefone:</b> <?= $_POST['telefone'] ?></p>
            <p><b>CPF:</b> <?= $_POST['cpf'] ?></p>
            <p><b>Idade:</b> <?= $_POST['idade'] ?></p>
            <p><b>Estado Civil:</b> <?= $_POST['estadoCivil'] ?></p>
            <p><b>Nacionalidade:</b> <?= $_POST['nacionalidade'] ?></p>
            <p><b>Gênero:</b> <?= $_POST['genero'] ?></p>
            <p><b>Endereço:</b> <?= $_POST['endereco'] ?></p>
            <p><b>CEP:</b> <?= $_POST['cep'] ?></p>
            <p><b>Cidade:</b> <?= $_POST['cidade'] ?></p>
            <p><b>Estado:</b> <?= $_POST['estado'] ?></p>

            <!-- Objetivo -->
            <h4 class="text-primary mt-4">Objetivo</h4>
            <hr>
            <p><?= $_POST['objetivo'] ?></p>

            <!-- Qualidades -->
            <h4 class="text-primary mt-4">Qualidades</h4>
            <hr>
            <p><?= $_POST['qualidades'] ?></p>

            <!-- Formação acadêmica -->
            <h4 class="text-primary mt-4">Formação Acadêmica</h4>
            <hr>
            <?php
            // Aqui eu verifico se o usuário preencheu alguma formação
            if (!empty($_POST['instituicao'])) {
                // E percorro cada uma pra mostrar na tela
                foreach ($_POST['instituicao'] as $key => $inst) {
                    echo "<div class='mb-3'>";
                    echo "<p><b>Instituição:</b> $inst</p>";
                    echo "<p><b>Curso:</b> ".$_POST['curso'][$key]."</p>";
                    echo "<p><b>Concluído:</b> ".$_POST['concluido'][$key]."</p>";
                    echo "<p><b>Ano de Conclusão:</b> ".$_POST['anoConclusao'][$key]."</p>";
                    echo "</div><hr>";
                }
            }
            ?>

            <!-- Experiência profissional -->
            <h4 class="text-primary mt-4">Experiência Profissional</h4>
            <hr>
            <?php
            // Aqui eu faço o mesmo processo, mas com as experiências
            if (!empty($_POST['empresa'])) {
                foreach ($_POST['empresa'] as $key => $emp) {
                    echo "<div class='mb-3'>";
                    echo "<p><b>Empresa:</b> $emp</p>";
                    echo "<p><b>Início:</b> ".$_POST['inicio'][$key]."</p>";
                    echo "<p><b>Fim:</b> ".$_POST['fim'][$key]."</p>";
                    echo "<p><b>Descrição:</b> ".$_POST['descricao'][$key]."</p>";
                    echo "</div><hr>";
                }
            }
            ?>

            <!-- Botão pra imprimir o currículo -->
            <div class="text-center mt-4">
                <button onclick="window.print()" class="btn btn-primary px-4">
                    Imprimir Currículo
                </button>
            </div>
        </div>
    </main>

    <!-- Aqui é o rodapé simples lá embaixo -->
    <footer class="bg-light text-center py-3 border-top mt-auto">
        <small class="text-muted">© 2025 - Gerador de Currículos</small>
    </footer>

    <!-- Script do Bootstrap (pra interatividade caso precise no futuro) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
