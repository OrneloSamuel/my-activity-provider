<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste de Aptidão Sobre a Matéria - Configuração</title>
    </head>
    <body class="antialiased">
        <h1>Teste de Aptidão Sobre a Matéria - <i>Configuração</i></h1>

        <div class="conteiner">
            <div class="mb-3">
                <label for="resume" class="form-label">Resumo da Descrição Técnica</label>
                <input class="form-control" id="resume" placeholder="Digite a breve descrição da atividade">
              </div>
              <div class="mb-3">
                <label for="instruction" class="form-label">URL para Instruções Detalhadas</label>
                <input class="form-control" id="instruction" 
                    placeholder="Coloque aqui o URL para as instruções detalhadas acerca da ativididade">
              </div>
              <div class="mb-3">
                <label for="matter" class="form-label">URL para Matéria</label>
                <input class="form-control" id="matter" placeholder="Coloque aqui o URL para a matéria ">
              </div>
        </div>

        <script src="{{url('assets/js/config-quiz.js')}}"></script>
    </body>
</html>
