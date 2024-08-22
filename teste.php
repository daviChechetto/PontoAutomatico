<?php $urlBase_config  = 'http://localhost/pontoAutomatico/'; ?>

<link rel="stylesheet" href="css/inicial.css">
<link rel="stylesheet" href="css/flipbook.css">

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

<section>
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
                <button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 5);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
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
                <button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 5);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
            </div>
            <div class="botoes-avancar">
                <button class="btn btns-book btn-6" type="button"><i class="fas fa-search-plus" title="Ampliar foto da direita"></i></button>
            </div>
        <?php endif; ?>
    </div>
	<div style="margin-inline: 65px">
		<div id="flipbook" class="container-flipbook">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php
            if ($i == 1 || $i == 2 || $i == 4 || $i == 5) {
                $class = "class=\"hard\"";
            } else {
                $class = "";
            }
            ?>
            <div <?= $class ?>>
                <img class="img-responsive" src="<?= $urlBase_config . "img/flip_book_meu/page_" . $i . ".jpg" ?>" alt="Página <?= $i ?>" >
            </div>
        <?php endfor; ?>
    </div>
	</div>
    

	

    <div class="rodape-flipbook">
        <div class="setas">
            Use as setas do teclado (<i class="fas fa-arrow-left"></i> <i class="fas fa-arrow-right"></i>) para navegar pelo livro
        </div>
        <a href="<?= $urlBase_config ?>files/documentoPA.pdf" target="_blank">
            <div class="btn btn-success">
                <i class="fas fa-file-download" style="margin-right: 5px;"></i> Versão PDF
            </div>
        </a>
    </div>
</section>





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
			pages: 5, 
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
					if (page === 5) {
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
					}else if(page === 5) {
						$(".btn-1").removeAttr("onclick");
						$(".btn-6").attr("onclick", '$("#modal_page'+page+'").modal("show")');
					}else {
						$(".btn-1").attr("onclick", '$("#modal_page'+page+'").modal("show")');
						$(".btn-6").attr("onclick", '$("#modal_page'+secondPage+'").modal("show")');
					}
				},
				turning: function(e, page, obj) {
					if (page != 1 && page != 5) {
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