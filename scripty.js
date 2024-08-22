
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

        if ($('.creditos').hasClass('esconder-link')){
            $('.link').toggleClass('esconder-link')
            $('.link').toggleClass('mostrar-link')
            $('.creditos').toggle();
        } else{
            $('.link').toggleClass('esconder-link')
            $('.link').toggleClass('mostrar-link')
            setTimeout(function(){
                $('.creditos').toggle();
            }, 240)
        }


    
        

        $('main').toggleClass('blur')
        $('header').toggleClass('blur')

    });



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

    var date = new Date(), mesAtual = date.getMonth() + 1;
    $('select').val(mesAtual)
    new window.VLibras.Widget('https://vlibras.gov.br/app');
})
