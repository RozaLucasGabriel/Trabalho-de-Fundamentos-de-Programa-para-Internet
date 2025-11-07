<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>

    <!-- Aqui eu chamo o CSS do meu site -->
    <link rel="stylesheet" href="style.css">

    <!-- Aqui eu importo o Bootstrap 5 pra deixar o site mais bonito e responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center">

    <!-- Cabeçalho azul com o título principal -->
    <header class="bg-primary text-white py-4 mb-5 shadow">
        <h1 class="fw-bold">Gerador de Currículos</h1>
    </header>

    <!-- Parte principal com os botões -->
    <main class="container">
        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
            <!-- Botão para criar um novo currículo -->
            <a href="insert.php" class="btn btn-primary btn-lg px-5">Criar Currículo</a>

            <!-- Botão para visualizar o currículo -->
            <a href="read.php" class="btn btn-outline-primary btn-lg px-5">Visualizar Currículo</a>
        </div>
    </main>


    <!-- Script do Bootstrap (para deixar os componentes funcionarem direito) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>
