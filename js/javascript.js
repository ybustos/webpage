$(document).ready(inicio);
var movil;
function inicio() {
    movil = isMobile();
    $('.modal').modal();
    $('select').material_select();
    $('.button-collapse').sideNav();
    //$('.collapsible').collapsible(); Para menís desplegables dentro?

    $('#cbx-otr').on("change", function () {
        $('#txt-otr').slideToggle("fast");
        $('#informacion').focus();

    });

    $('#sendContactMail').click(function () {
        var mail = {};
        var opciones = [];
        var datos = ($('.cnt-mail').serializeArray());
        var cbx = $('.cbx').serializeArray();
        $.each(datos, function (e, v) {
            mail[v.name] = v.value;
        });
        if (cbx.length === 0) {
            $.each($('#sel-opt').val(), function (e, v) {
                console.log(v);
                opciones.push(v);
            });
        } else {
            $.each(cbx, function (e, v) {
                opciones.push(v.value);
            });
        }
        mail['opciones'] = opciones;

        if ($('#informacion').val()) {
            mail['informacion'] = $('#informacion').val();
        }

        $.post("mailer.php", mail, function (data) {
            Materialize.toast("Mail enviado con éxito", 3000, 'green');
            $('.modal').modal('close');
        });

    });

    $('#sel-opt').change(function () {
        if ($.inArray("otr", $(this).val()) != -1) {
            $("#txt-otr").slideDown("fast");
        } else {
            $("#txt-otr").hide("fast");
        }
    });
    
    if (!movil) {
        escritorio();
    }

}

function escritorio() {
    $('.card').click(function (event) {
        if($(this).hasClass('row'))return;
        $(this).addClass('row card-active');
        $(this).children('.card-image, .card-content, .card-action').addClass('col');
        $(this).parents('.tcards').siblings('.tcards').hide();
        $(this).parents('.tcards').animate({
            width: "100%",
        }, 300, 'linear', function () {
            $(this).removeClass('col');
        });
    });

    $('.card-close').click(function (event) {
        event.stopPropagation();
        event.preventDefault();
        $(this).parent().removeClass('row card-active').end().siblings().removeClass('col').parents('.tcards').addClass('col').attr('style','display:block');
        $('.tcards').show();
        $('body').scrollTop($(window).scrollTop());
    });
}

function isMobile() {
    return window.innerWidth <= 600;
}

// Typed.js function
$(function () {
    $(".type").typed({
        strings: ["Esto es un texto de prueba.", "Biel es imbécil."],
        typeSpeed: 0
    });
});