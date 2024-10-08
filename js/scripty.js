
$(document).ready(function() {
    $('#visionButton').on('change', () =>{

        $('body').toggleClass('night-mode')

        $('.visionButton').toggleClass('dark-mode-button')

        setTimeout(function() {
            $('.bola-off').toggleClass('fa-sun')
        }, 125);

        setTimeout(function() {
            $('.bola-off').toggleClass('fa-moon')
        }, 125);

        $('form').toggleClass('form-dark-mode')
    })

    $('.icone-ajudante').hover(function() {
        $('.modalInformacaoAdicional').toggle();
    });

    $('.icone-creditos').click(function() {

        $('.circulo-livro').toggleClass('mostrar-circulo');

        if ($('.creditos').css('visibility') === 'hidden'){

            $('.link').toggleClass('esconder-link')
            $('.link').toggleClass('mostrar-link')
            $('.creditos').css('visibility', 'visible');

        } else{

            $('.link').toggleClass('esconder-link')
            $('.link').toggleClass('mostrar-link')
            
            setTimeout(function(){
                $('.creditos').css('visibility', 'hidden');
            }, 240)
        }

        $('main').toggleClass('blur')
        $('header').toggleClass('blur')

    });

    $('.submitButton').click(function(){

        // funcao para mudar o aviso de 'campo nao preenchido'
        $('.campos-requiridos').on("invalid", function (e) {

            // muda a cor da variável usada declarada no inínio do arquivo css
            $(':root').css('--background-selected', 'linear-gradient(to bottom right, #ff6a6a, #390000)');

            // 'e.target' significa o elemento que ativou o evento
            if ($(e.target).attr('id') == 'nome'){

                e.target.setCustomValidity("Você tem que colocar o nome completo!");

                $('form img').toggle()
                $('#imagem-bronca').toggleClass('imagem-bronca')
                $('#imagem-seta').toggleClass('imagem-seta')
                

            } else if($(e.target).attr('id') == 'diretor'){

                e.target.setCustomValidity("Coloca o nome do Diretor COMPLETO!");
                
                $('form img').toggle()
                $('#imagem-bronca').toggleClass('imagem-bronca')
                $('#imagem-seta').toggleClass('imagem-seta')
                $('.imagem-seta').css('top', '3px')

            }

            setTimeout(function() {
                e.target.setCustomValidity("");
            }, 1000);

        });


    })

    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-menu .show').removeClass('show');
        });

        return false;
    });

    $('.temas').click(function(){
        if ($(this).attr('id') == 'tema-sand'){
            $(':root').css('--background-selected', 'linear-gradient(to bottom right, #e0efa3, #627f65)');
        } else if ($(this).attr('id') == 'tema-vicy'){
            $(':root').css('--background-selected', 'linear-gradient(to bottom right, #f3ff47, #8300b9)');
        } else if ($(this).attr('id') == 'tema-blues'){
            $(':root').css('--background-selected', 'linear-gradient(to bottom right, #47ffc4, #0017b9)');
        }

    })

    $('.tamanhoFonte').click(function(){
        if ($(this).attr('id') == 'AumentarFonte'){
            $('main').css('font-size', '1.5rem');

            $('.campo-feriado input, .campo input, .campo select, .submitButton').css('font-weight', '500');
            $('.campo-feriado input, .campo input, .campo select, .submitButton').css('font-size', '1.4rem');

            $('form').css('width', '450px');
            $('form').css('height', '450px');
        } else if (($(this).attr('id') == 'DiminuirFonte')){
            $('main').css('font-size', 'unset');

            $('.campo-feriado input, .campo input, .campo select, .submitButton').css('font-weight', '300');
            $('.campo-feriado input, .campo input, .campo select, .submitButton').css('font-size', 'unset');

            $('form').css('width', '300px');
            $('form').css('height', '370px');
        }
    })

    var date = new Date(), mesAtual = date.getMonth() + 1;
    $('select').val(mesAtual)
    new window.VLibras.Widget('https://vlibras.gov.br/app');


})
