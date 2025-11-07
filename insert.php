<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Criar Currículo</title>
  <link rel="stylesheet" href="style.css">
  <!-- Aqui eu defino a estrutura básica da página, deixo o site responsivo e importo o CSS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Importo o jQuery para facilitar o uso de JavaScript dinâmico -->

  <style>
    /* Aqui eu deixei alguns estilos rápidos dentro da própria página
       só pra deixar o formulário mais organizado e fácil de visualizar */
    .container { max-width:900px; margin:30px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.08); }
    h2,h3{ color:#0078d4; }
    label{ display:block; margin-top:12px; font-weight:600; }
    input, select, textarea { width:100%; padding:8px; margin-top:6px; border:1px solid #ccc; border-radius:6px; box-sizing:border-box; }
    .botaoPrincipal, .botaoSecundario { margin-top:16px; padding:10px 14px; border-radius:6px; border:none; cursor:pointer; color:#fff; }
    .botaoPrincipal{ background:#0078d4; }
    .botaoSecundario{ background:#198754; }
    .remover{ background:#dc3545; color:#fff; border:none; padding:6px 10px; border-radius:6px; cursor:pointer; margin-top:8px; }
    .formacao, .experiencia{ border:1px solid #e6e6e6; padding:12px; border-radius:6px; margin-top:12px; }
  </style>
</head>
<body>
  <div class="container">
    <!-- Aqui é o contêiner principal, onde fica todo o conteúdo do formulário -->
    <h2>Preencha suas informações</h2>

    <form action="read.php" method="POST" id="curriculoForm">
      <!-- Esse formulário envia os dados para o arquivo read.php quando for submetido -->

      <h3>Dados Pessoais</h3>
      <hr>

      <!-- Campos básicos do currículo -->
      <label for="nome">Nome Completo</label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="telefone">Telefone</label>
      <input type="text" id="telefone" name="telefone">

      <label for="cpf">CPF</label>
      <input type="text" id="cpf" name="cpf">

      <!-- Data de nascimento e cálculo automático da idade -->
      <label for="nascimento">Data de Nascimento</label>
      <input type="date" id="nascimento" name="nascimento" max="<?php echo date('Y-m-d'); ?>" required>

      <label for="idade">Idade</label>
      <input type="number" id="idade" name="idade" readonly>

      <!-- Mais dados pessoais -->
      <label for="estadoCivil">Estado Civil</label>
      <input type="text" id="estadoCivil" name="estadoCivil">

      <label for="nacionalidade">Nacionalidade</label>
      <input type="text" id="nacionalidade" name="nacionalidade">

      <label for="genero">Gênero</label>
      <input type="text" id="genero" name="genero">

      <label for="endereco">Endereço</label>
      <input type="text" id="endereco" name="endereco">

      <label for="cep">CEP</label>
      <input type="text" id="cep" name="cep">

      <label for="cidade">Cidade</label>
      <input type="text" id="cidade" name="cidade">

      <label for="estado">Estado</label>
      <input type="text" id="estado" name="estado">

      <h3>Sobre você</h3>
      <hr>
      <!-- Aqui o usuário escreve um resumo sobre si -->
      <label for="objetivo">Objetivo</label>
      <textarea id="objetivo" name="objetivo" rows="3"></textarea>

      <label for="qualidades">Qualidades</label>
      <textarea id="qualidades" name="qualidades" rows="3"></textarea>

      <h3>Formação Acadêmica</h3>
      <hr>
      <!-- Área onde o usuário pode adicionar uma ou mais formações -->
      <div id="formacaoContainer">
        <div class="formacao">
          <label>Instituição</label>
          <input type="text" name="instituicao[]">

          <label>Curso</label>
          <input type="text" name="curso[]">

          <label>Concluído?</label>
          <select name="concluido[]">
            <option>Sim</option>
            <option>Não</option>
          </select>

          <label>Ano de Conclusão</label>
          <input type="text" name="anoConclusao[]">
        </div>
      </div>
      <button type="button" id="addFormacao" class="botaoSecundario">+ Adicionar Curso</button>

      <h3>Experiência Profissional</h3>
      <hr>
      <!-- Aqui o usuário pode adicionar experiências de trabalho -->
      <div id="experienciaContainer">
        <div class="experiencia">
          <label>Empresa</label>
          <input type="text" name="empresa[]">

          <label>Início</label>
          <input type="month" name="inicio[]">

          <label>Fim</label>
          <input type="month" name="fim[]">

          <label>Descrição</label>
          <textarea name="descricao[]"></textarea>
        </div>
      </div>
      <button type="button" id="addExperiencia" class="botaoSecundario">+ Adicionar Experiência</button>

      <div style="text-align:center">
        <!-- Botão principal para gerar o currículo -->
        <button type="submit" class="botaoPrincipal">Gerar Currículo</button>
      </div>
    </form>
  </div>

  <script>
    // Aqui começa a parte em JavaScript/jQuery
    // Ela serve pra deixar o formulário mais dinâmico e interativo
    $(function(){

      // Adiciona uma nova formação quando o usuário clica no botão
      $('#addFormacao').on('click', function(){
        $('#formacaoContainer').append(`
          <div class="formacao">
            <label>Instituição</label>
            <input type="text" name="instituicao[]">
            <label>Curso</label>
            <input type="text" name="curso[]">
            <label>Concluído?</label>
            <select name="concluido[]">
              <option>Sim</option>
              <option>Não</option>
            </select>
            <label>Ano de Conclusão</label>
            <input type="text" name="anoConclusao[]">
            <button type="button" class="remover">Excluir</button>
          </div>
        `);
      });

      // Adiciona uma nova experiência profissional
      $('#addExperiencia').on('click', function(){
        $('#experienciaContainer').append(`
          <div class="experiencia">
            <label>Empresa</label>
            <input type="text" name="empresa[]">
            <label>Início</label>
            <input type="month" name="inicio[]">
            <label>Fim</label>
            <input type="month" name="fim[]">
            <label>Descrição</label>
            <textarea name="descricao[]"></textarea>
            <button type="button" class="remover">Excluir</button>
          </div>
        `);
      });

      // Remove formações ou experiências quando o botão "Excluir" é clicado
      $(document).on('click', '.remover', function(){
        $(this).closest('div').remove();
      });

      // Calcula a idade automaticamente com base na data de nascimento
      $('#nascimento').on('change', function(){
        const valor = $(this).val();
        if(!valor){
          $('#idade').val('');
          return;
        }

        const nascimento = new Date(valor);
        const hoje = new Date();
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const m = hoje.getMonth() - nascimento.getMonth();

        if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
          idade--;
        }

        // Atualiza o campo de idade automaticamente
        $('#idade').val(idade);
      });

      // Caso o campo já tenha valor, ele recalcula ao carregar a página
      if ($('#nascimento').val()) {
        $('#nascimento').trigger('change');
      }
    });
  </script>
</body>
</html>
