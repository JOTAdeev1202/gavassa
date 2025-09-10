$(document).ready(function () {
  console.log("funciones.js cargado");

  // ==============================
  // TOGGLE MENÚ MÓVIL
  // ==============================
  $('.menu-movil').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("click menu-movil");
    $('.menu-contenedor').toggleClass('activo');
  });

  // Evitar que el click dentro cierre el menú
  $('.menu-contenedor').on('click', function (e) {
    e.stopPropagation();
  });

  // Clic fuera del menú cierra el menú
  $(document).on('click', function () {
    if ($('.menu-contenedor').hasClass('activo')) {
      console.log("click fuera: cerrando menú");
      $('.menu-contenedor').removeClass('activo');
    }
  });

  // Reset menú en escritorio (si cambias a diseño responsive)
  $(window).on('resize', function () {
    if ($(window).width() > 768) {
      $('.menu-contenedor').removeClass('activo');
    }
  });
});
