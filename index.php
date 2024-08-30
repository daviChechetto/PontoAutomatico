<?php $urlBase_config  = 'http://localhost/pontoAutomatico/'; ?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="<?= $urlBase_config ?>js/turnjs4/lib/turn.js"></script>

<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");

if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
    $mobile = true;
} else {
    $mobile = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/inicial.css">
    <link rel="stylesheet" href="css/flipbook.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/scripty.js"></script>
    <script src="<?= $urlBase_config ?>js/turnjs4/lib/turn.js"></script>

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

        <div class="acessibilidades">
            <div class="acessibilidade-Visao">
                <button class="tamanhoFonte" id="AumentarFonte">A+</button>
                <button class="tamanhoFonte" id="DiminuirFonte">A-</button>
            </div>
        </div>
        
        <h1>POINT<span>Automatic</span></h1>
    </header>

    <main class="formulario">

        <form action="gerarPdf.php" method="get">
   
            <img class="" id="imagem-bronca" src="img/bronca.jfif" alt="Imagem de bronca" title="Imagem brava com você">
            <img class="" id="imagem-seta" src="img/arrow.png" alt="Imagem de uma seta" title="Imagem apontando para onde você errou">

            <section class="campos">
                <div class="campo" title="Digite seu nome Completo (Obrigatório)">
                    <label for="nome">Nome</label>
                    <input class="campos-requiridos" type="text" name="nome" id="nome" required>
                </div>
                <div class="campo" title="Digite seu nome do Diretor (Obrigatório)">
                    <label for="diretor">Diretor</label>
                    <input class="campos-requiridos" type="text" name="diretor" id="diretor" value="Matheus Sant'ana Pacheco"  required>
                </div>
                <div class="campo" title="Selecione o mês a ser gerado">
                    <label class="mes" for="mes">Mês</label>
                    <select id="mes" name="mes">
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
                <div class="modalInformacaoAdicional">
                    <p>SÁBADOS E DOMINGOS são incluídos automaticamente</p>
                    <p>Digite os dias separados por virgula. <span class="exemplo">Ex: 1, 10, 21</span></p>
                </div>
                <label for="folgas">
                    Feriados <i class="fas fa-info-circle icone-ajudante"></i>
                </label>
                <input type="text" name="folgas" id="folgas" placeholder="Digite os dias de feriados" title="Digite os dias de feriados (Obrigatório)">
            </section>


            <div class="horario">
                <label>Periodo de trabalho</label>
                <div class="periodo-trabalho">
                    <input type="radio" name="periodo" id="manha" value="manha" checked>
                    <label for="manha" class="option option-left">
                        <p>Manha</p>
                    </label>
                    <input type="radio" name="periodo" id="tarde" value="tarde">
                    <label for="tarde" class="option option-right">
                        <p>Tarde</p>
                    </label>
                </div>

            
                <label>Carga horária</label>
                <div class="periodo-trabalho">
                    <input type="radio" name="carga" id="quatro" value="quatro">
                    <label class="option option-left" for="quatro">
                        <p>4 horas</p>
                    </label>
                    
                    <input type="radio" name="carga" id="seis" value="seis" checked>
                    <label for="seis" class="option option-right">
                        <p>6 horas</p>
                    </label>
                </div>

            </div>

            <button class="submitButton" type="submit">Gerar</button>

        </form>

        <aside>

            <div class="changeThemas">
                <button class="temas" id='tema-vicy'><i class="fas fa-umbrella-beach"></i></button>
                <button class="temas" id='tema-blues'><i class="fas fa-wind"></i></button>
                <button class="temas" id='tema-sand'><i class="fas fa-tree"></i></button>
            </div>


            <div id="acessbilidadeVlibras" vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>

        </aside>


    </main>
    
    <footer>
        
        
        <div class="creditos">
            <div class="link esconder-link">
                <section style="width: 100vw;">
                    <div class="botoes-nav-book">
                        <?php if ($mobile): ?>
                            <div class=" ">
                                <button class="btn btns-book btn-1" type="button"><i class="fas fa-search-plus" title="Ampliar foto da esquerda"></i></button>
                            </div>
                            <div class="  prevs">
                                <button class="btn btns-book btn-2" type="button" onclick="$('#flipbook').turn('page', 1);"><i class="fas fa-angle-double-left" title="Voltar para a primeira página"></i></button>
                                <button class="btn btns-book btn-3" type="button" onclick="$('#flipbook').turn('previous');"><i class="fas fa-arrow-left" title="Voltar para a próxima página"></i></button>
                            </div>
                            <div class=" ">
                                <button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 7);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
                                <button class="btn btns-book btn-4" type="button" onclick="$('#flipbook').turn('next');"><i class="fas fa-arrow-right" title="Avançar para a próxima página"></i></button>
                            </div>
                            <div class=" ">
                                <button class="btn btns-book btn-6" type="button"><i class="fas fa-search-plus" title="Ampliar foto da direita"></i></button>
                            </div>
                        <?php else: ?>
                            <div class="botoes-voltar ">
                                <button class="btn btns-book btn-1" type="button"><i class="fas fa-search-plus" title="Ampliar foto da esquerda"></i></button>
                            </div>
                            <div class="botoes-voltar prevs">
                                <button class="btn btns-book btn-2" type="button" onclick="$('#flipbook').turn('page', 1);"><i class="fas fa-angle-double-left" title="Voltar para a primeira página"></i></button>
                                <button class="btn btns-book btn-3" type="button" onclick="$('#flipbook').turn('previous');"><i class="fas fa-arrow-left" title="Voltar para a próxima página"></i></button>
                            </div>
                            <div class="botoes-avancar">
                                <button class="btn btns-book btn-4" type="button" onclick="$('#flipbook').turn('next');"><i class="fas fa-arrow-right" title="Avançar para a próxima página"></i></button>
                                <button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 7);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
                            </div>
                            <div class="botoes-avancar">
                                <button class="btn btns-book btn-6" type="button"><i class="fas fa-search-plus" title="Ampliar foto da direita"></i></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div style="margin-inline: 21%">
                        <div id="flipbook" class="container-flipbook">
                            <?php for ($i = 1; $i <= 7; $i++): ?>
                                <?php
                                if ($i == 1 || $i == 2 || $i == 7) {
                                    $class = "class=\"hard\"";
                                } else {
                                    $class = "";
                                }
                                ?>
                                <div <?= $class ?>>
                                    <img class="img-responsive" src="<?= $urlBase_config . "img/flip_book/page_" . $i . ".jpg" ?>" alt="Página <?= $i ?>">
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="rodape-flipbook">
                        <div class="setas">
                            Use as setas do teclado (<i class="fas fa-arrow-left"></i> <i class="fas fa-arrow-right"></i>) para navegar pelo livro
                        </div>
                        <a href="<?= $urlBase_config ?>files/documentoPA.pdf" target="_blank">
                            <div class="botao-link">
                                <i class="fas fa-file-download" style="margin-right: 5px;"></i> Versão PDF
                            </div>
                        </a>
                    </div>
                </section>
            </div>
        </div>

        <div class="circulo-livro">
            <i class="fas fa-book icone-creditos" title="Créditos"></i>
        </div>

    </footer>
</body>

</html>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

<script type="text/javascript">
	if (!(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i))) {
		$('.setas').css('display', "block");
		// $('.showPDF').css('display', "none");
		// $('#flipbook').css('display', "block");
	}else{
		$('.setas').css('display', "none");
		// $('#flipbook').css('display', "none");
		// $('.showPDF').css('display', "block");
	}
	newWidth = $(".container-flipbook").width();
		halfWidth = Math.round(newWidth/2);
	    newHeight = Math.round((halfWidth*1918)/1475);

		$("#flipbook").turn({
			// width: 400,
			acceleration: !isChrome(),
			height: newHeight,
			autoCenter: true,
			pages: 7, 
			when: {
				turned: function(e, page, obj) {
					if (page === 1) {
						$(".btn-6").attr("disabled", "disabled");
						$(".btn-2").attr("disabled", "disabled");
						$(".btn-3").attr("disabled", "disabled");
						// $("#flipbook").css("-webkit-box-shadow", "");
						// $("#flipbook").css("box-shadow", "");
					}else{
						$(".btn-6").removeAttr("disabled");
						$(".btn-2").removeAttr("disabled");
						$(".btn-3").removeAttr("disabled");
						// $("#flipbook").css("-webkit-box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
						// $("#flipbook").css("box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
					}
					if (page === 7) {
						$(".btn-1").attr("disabled", "disabled");
						$(".btn-4").attr("disabled", "disabled");
						$(".btn-5").attr("disabled", "disabled");
						// $("#flipbook").css("-webkit-box-shadow", "");
						// $("#flipbook").css("box-shadow", "");
					}else{
						$(".btn-1").removeAttr("disabled");
						$(".btn-4").removeAttr("disabled");
						$(".btn-5").removeAttr("disabled");
						// $("#flipbook").css("-webkit-box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
						// $("#flipbook").css("box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
					}
					realPage = page;
					secondPage = page+1;

					if (page === 1) {
						$(".btn-1").attr("onclick", '$("#modal_page'+page+'").modal("show")');
						$(".btn-6").removeAttr("onclick");
					}else if(page === 7) {
						$(".btn-1").removeAttr("onclick");
						$(".btn-6").attr("onclick", '$("#modal_page'+page+'").modal("show")');
					}else {
						$(".btn-1").attr("onclick", '$("#modal_page'+page+'").modal("show")');
						$(".btn-6").attr("onclick", '$("#modal_page'+secondPage+'").modal("show")');
					}
				},
				turning: function(e, page, obj) {
					if (page != 1 && page != 7) {
						$("#flipbook").css("-webkit-box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
						$("#flipbook").css("box-shadow", "0px 0px 18px 5px rgba(0,0,0,0.45)");
					}else{
						$("#flipbook").css("-webkit-box-shadow", "");
						$("#flipbook").css("box-shadow", "");
					}
				}
			}
		});

		$("#flipbook").css("-webkit-box-shadow", "");
		$("#flipbook").css("box-shadow", "");

		$(document).keydown(function(e){
			var previous = 37, next = 39;

			switch (e.keyCode) {
				case previous:

					$('#flipbook').turn('previous');

				break;
				case next:
					
					$('#flipbook').turn('next');

				break;
			}
		});

		function isChrome() {
			// Chrome's unsolved bug
			// http://code.google.com/p/chromium/issues/detail?id=128488

			return navigator.userAgent.indexOf('Chrome')!=-1;
		}
		<?php if (!$mobile): ?>
			$(".btn-1").css("display", "none");
			$(".btn-6").css("display", "none");
		 	$(".prevs").addClass("col-offset-md-3");
		<?php endif ?>
		// function getPage() {
		// 	page = $('#flipbook').turn('page');
		// 	if (page === 1) {
		// 		$(".btn-1").attr("disabled", "disabled");
		// 	}else{
		// 		$(".btn-1").removeAttr("disabled");
		// 	}
		// 	alert(page);
		// }
</script>