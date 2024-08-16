
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

    /* $('.icone-ajudante').on('mouseenter', function() {
        $('.modalInformacaoAdicional').show();
    });
    $('.icone-ajudante').on('mouseleave', function() {
        $('.modalInformacaoAdicional').hide(); 
        console.log("hover");
    }); */

    $('.icone-ajudante').hover(function() {
        $('.modalInformacaoAdicional').toggle();
        console.log("hover");
    });

    /* $('.icone-ajudante').on('hover', function() {
        $('.modalInformacaoAdicional').toggle();
        console.log("hover");
    }); */
})