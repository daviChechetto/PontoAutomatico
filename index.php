<?php $urlBase_config  = 'http://localhost/pontoAutomatico/'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/scripty.js"></script>
    <title>Auto Ponto</title>
</head>

<body>
    <header>
        <div class="vision-mode">
            <input type="checkbox" id="visionButton">
            <label for="visionButton" class="visionButton">
                <div class="bola-off fa fa-sun"></div>
            </label>
        </div>
        <h1>POINT<span>Automatic</span></h1>
    </header>
    
    <main class="formulario">
        <form action="gerarPdf.php" method="get">

            <section class="campos">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="campo">
                    <label for="diretor">Diretor</label>
                    <input class="dados" type="text" name="diretor" id="diretor" value="Matheus Sant'ana Pacheco">
                </div>
                <div class="campo">
                    <label class="mes" for="mes">Mês</label>
                    <select class="dados" id="mes" name="mes">
                        <option value="1">1 - Janeiro</option>
                        <option value="2">2 - Fevereiro</option>
                        <option value="3">3 - Março</option>
                        <option value="4">4 - Abril</option>
                        <option value="5">5 - Maio</option>
                        <option value="6">6 - Junho</option>
                        <option value="7">7 - Julho</option>
                        <option value="8">8 - Agosto</option>
                        <option value="9">9 - Setembro</option>
                        <option value="10">10 - Outubro</option>
                        <option value="11">11 - Novembro</option>
                        <option value="12">12 - Dezembro</option>
                    </select>
                </div>
            </section>


            <section class="campo-feriado">
                <div class="modalInformacaoAdicional" style="display: none;">
                    <p>SÁBADOS E DOMINGOS são incluídos automaticamente</p>
                    <p>Digite os dias separados por virgula. <span class="exemplo">Ex: 1, 10, 21</span></p>
                </div>
                <label class="dados" for="folgas" style="margin-top: 20px;">
                    <i class="fas fa-info-circle icone-ajudante"></i> Feriados
                </label>
                <input class="dados" type="text" name="folgas" id="folgas" placeholder="Digite os dias de feriados">
            </section>


            <section class="horario">

                <legend>Periodo de trabalho</legend>
                <input type="radio" name="periodo" id="manha" value="manha" checked>
                <label for="manha">Manha</label>
                <input type="radio" name="periodo" id="tarde" value="tarde">
                <label for="tarde">Tarde</label>

                <legend>Carga horária</legend>
                <input type="radio" name="carga" id="quatro" value="quatro">
                <label for="quatro">4 horas</label>
                <input type="radio" name="carga" id="seis" value="seis" checked>
                <label for="seis">6 horas</label>

            </section>

            <button class="" type="submit">Gerar</button>
            
        </form>

        
    </main>

    <footer>
        <div id="acessbilidadeVlibras" vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <div class="creditos">
            <div class="link">
                <a href="<?= $urlBase_config ?>files/documentoPA.pdf" target="_blank">
                    <div class="botao-link">
                        <i class="fas fa-file-download" style="margin-right: 5px;"></i> Versão PDF
                    </div>
                </a>
            </div>
        </div>
        <i class="fas fa-book icone-creditos" title="Créditos"></i>
    </footer>
</body>


</html>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
