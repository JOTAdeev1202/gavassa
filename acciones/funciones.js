// funciones.js
$(document).ready(function() {
    console.log("funciones.js cargado");

    // ==============================
    // SLIDER (si lo usas en tu página)
    // ==============================
    if ($.fn.unslider) {
        $('.my-slider').unslider({
            autoplay: true,
            delay: 7000,
            animation: 'fade',
            nav: false,
            arrows: false
        });
    } else {
        console.log("unslider no disponible");
    }

    // ==============================
    // TOGGLE MENÚ MÓVIL
    // ==============================
    $('.menu-movil')
        .off('click.menuToggle')
        .on('click.menuToggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log("click menu-movil");
            $('.menu').toggleClass('activo');
        });

    // ==============================
    // Evitar que el click dentro del menú cierre por el listener del documento
    // ==============================
    $('.menu').on('click', function(e) {
        e.stopPropagation();
    });

    // ==============================
    // CLIC FUERA DEL MENÚ CIERRA EL MENÚ
    // ==============================
    $(document)
        .off('click.menuClose')
        .on('click.menuClose', function() {
            if ($('.menu').hasClass('activo')) {
                console.log("click fuera: cerrando menú");
                $('.menu').removeClass('activo');
            }
        });

    // ==============================
    // RESET MENÚ EN ESCRITORIO
    // ==============================
    $(window)
        .off('resize.menuReset')
        .on('resize.menuReset', function() {
            if ($(window).width() > 768) {
                console.log("resize > 768: reset menu");
                $('.menu').removeClass('activo').attr('style', '');
            }
        });

    // ==============================
    // LOG DE COMPROBACIÓN
    // ==============================
    console.log(
        "menu-movil existe?", $('.menu-movil').length,
        "menu existe?", $('.menu').length
    );
});
