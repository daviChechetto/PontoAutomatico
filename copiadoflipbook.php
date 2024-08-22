<?php $urlBase_config  = 'http://localhost/pontoAutomatico/'; ?>

<?php 
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");

	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
	    $mobile = true;
	} else {
	    $mobile = false;
	}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="<?= $urlBase_config?>js/turnjs4/lib/turn.js"></script>

<style>
    .col-md-12{
        width: 100%;
    }

    .col-md-3, .col-sm-3, .col-xs-3{
        width: 33.333333%;
    }

    .modal{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow: hidden;
        outline: 0;
    }

    .modal-dialog{
        max-width: 800px;
        position: relative;
        width: auto;
        margin: .5rem;
        pointer-events: none;
    }

    .modal-content{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: .3rem;
        outline: 0;
    }

    .modal-body{
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1rem;
    }
    
    .btn{
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

	#flipbook{
		width: 90% !important;
		height: 680px !important;
	}
	#flipbook .page{
		/* width:461px;*/
		height:600px;
		background-color:white;
		background-repeat:no-repeat;
		background-size:100% 100%;
	}

	#flipbook .page{
		-webkit-box-shadow:0 0 20px rgba(0,0,0,0.2);
		-moz-box-shadow:0 0 20px rgba(0,0,0,0.2);
		-ms-box-shadow:0 0 20px rgba(0,0,0,0.2);
		-o-box-shadow:0 0 20px rgba(0,0,0,0.2);
		box-shadow:0 0 20px rgba(0,0,0,0.2);
		/*height:  800px!important;*/
	}

	#flipbook .page img{
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		margin:0;
	}

	#flipbook .shadow{
		-webkit-box-shadow:0 0 20px #ccc;
		-moz-box-shadow:0 0 20px #ccc;
		-o-box-shadow:0 0 20px #ccc;
		-ms-box-shadow:0 0 20px #ccc;
		box-shadow:0 0 20px #ccc;
	}
	/*.btns-book {
		padding: 4px;
		border: 1px solid black;
		border-radius: 8px;
	}*/
	.btns-book i{
		padding: 4px 20px;
		border: 1px solid #000;
		border-radius: 8px;
	}
	.btns-book i:hover{
		background-color: #000;
		color: #fff;
		cursor: pointer;
	}
	.btn.focus, .btn:focus{
		box-shadow: none!important;
	}
	button[disabled],
	button[disabled].btns-book i:hover {
    	cursor: no-drop;
	}
	.container-flipbook .col-xs-1, .container-flipbook .col-xs-2, .container-flipbook .col-xs-3, .container-flipbook .col-xs-4, .container-flipbook .col-xs-5, .container-flipbook .col-xs-6, .container-flipbook .col-xs-7, .container-flipbook .col-xs-8, .container-flipbook .col-xs-9, .container-flipbook .col-xs-10, .container-flipbook .col-xs-11, .container-flipbook .col-xs-12 {
	  	float: left;
	}

	.container-flipbook .col-xs-3 {
	  	width: 25%;
	}
	.container-flipbook .col-offset-md-3{
    	margin-left: 25%;
	}
</style>
<div class="container container-flipbook" style="margin-top: 45px; position: relative;">
	<!-- <div class="row"> -->
		<div class="row" style="text-align:center;margin-bottom: 5px;">	
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/" title="Voltar ao início do site">Início</a></li>
					<li class="breadcrumb-item active" aria-current="page">Livro Criciúma 2021</li>
				</ol>
			</nav>
		<div class="col-md-12">
			<h2><strong>CRICIÚMA</strong></h2>
		</div>
		<div class="col-md-12">
			<p>uma cidade perfeita para morar com segurança, trabalhar, investir e viver com qualidade de vida.</p>
		</div>
	</div>
	<div class="row" style="text-align:center;margin-bottom: 10px;">
		<div style="width:100%;">
			<?php if ($mobile): ?>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-1" type="button"><i class="fas fa-search-plus" title="Ampliar foto da esquerda"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3 prevs">
					<button class="btn btns-book btn-2" type="button" onclick="$('#flipbook').turn('page', 1);" ><i class="fas fa-angle-double-left" title="Voltar para a primeira página"></i></button>
					<button class="btn btns-book btn-3" type="button" onclick="$('#flipbook').turn('previous');" ><i class="fas fa-arrow-left" title="Voltar para a próxima página"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 5);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
					<button class="btn btns-book btn-4" type="button" onclick="$('#flipbook').turn('next');"><i class="fas fa-arrow-right" title="Avançar para a próxima página"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-6" type="button"><i class="fas fa-search-plus" title="Ampliar foto da direita"></i></button>
				</div>
			<?php else: ?>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-1" type="button"><i class="fas fa-search-plus" title="Ampliar foto da esquerda"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3 prevs">
					<button class="btn btns-book btn-2" type="button" onclick="$('#flipbook').turn('page', 1);" ><i class="fas fa-angle-double-left" title="Voltar para a primeira página"></i></button>
					<button class="btn btns-book btn-3" type="button" onclick="$('#flipbook').turn('previous');" ><i class="fas fa-arrow-left" title="Voltar para a próxima página"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-4" type="button" onclick="$('#flipbook').turn('next');"><i class="fas fa-arrow-right" title="Avançar para a próxima página"></i></button>
					<button class="btn btns-book btn-5" type="button" onclick="$('#flipbook').turn('page', 5);"><i class="fas fa-angle-double-right" title="Avançar para a última página"></i></button>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3">
					<button class="btn btns-book btn-6" type="button"><i class="fas fa-search-plus" title="Ampliar foto da direita"></i></button>
				</div>
			<?php endif; ?>
		</div>
	</div>
		<!-- <div class="col-md-12"> -->
	<div id="flipbook">
		<?php for ($i=1; $i <= 5; $i++):?>
			<?php
				if ($i == 1 || $i == 2 || $i == 4 || $i == 5) {
					$class = "class=\"hard\"";
				}else{
					$class = "";					
				}
			?>
			<div <?= $class?>>
				<img class="img-responsive" src="<?= $urlBase_config."img/flip_book_meu/page_".$i.".jpg"?>" alt="Página <?= $i?>" style="width: 100%; height: auto;">
			</div>
		<?php endfor; ?>
	</div>
		<!-- </div> -->
	<!-- </div> -->
	<?php for ($i=1; $i <= 5; $i++):?>	
		<div class="modal" id="modal_page<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body modal-bodyy">
						<button type="button" data-dismiss="modal" aria-label="Close">
						<span>x</span>
						</button>
						<div>
							<img src="<?= $urlBase_config."img/flip_book_meu/page_".$i.".jpg"?>" style="width:100%; margin-top: 10px;">
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endfor; ?>
	<?php 
	/* ?>
	<div class="row showPDF">		
		<div class="embed-responsive" style="height: 1000px;">
			<embed class="embed-responsive-item" src="<?= $urlBase_config.'files/livro-historia-criciuma.pdf';?>" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
		</div>
	</div>
	<?php */?>
	<div class="row" style="margin: 15px 0 25px;">
		<div class="col-md-12">
			<div class="setas" style="text-align: center;margin-top: 5px;font-size: 15px;">Use as setas do teclado (<i class="fas fa-arrow-left"></i> <i class="fas fa-arrow-right"></i>) para navegar pelo livro</div>
		</div>
	</div>
	<div class="row" style="text-align:center;align-items:center;">
		<div class="col-md-12">
			<a href="<?= $urlBase_config?>files/livro-historia-criciuma.pdf" target="_blank"><div class="btn btn-success"><i class="fas fa-file-download" style="margin-right: 5px;"></i> Versão PDF</div></a>
		</div>
	</div>
	<!-- <div id="aux"></div> -->
</div>


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