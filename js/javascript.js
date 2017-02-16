$(document).ready(inicio);

function inicio() {
    $('.modal').modal();
    $('select').material_select();
    $('.button-collapse').sideNav();
    //$('.collapsible').collapsible(); Para menís desplegables dentro?

    $('#cbx-otr').on("change", function () {
        $('#txt-otr').slideToggle("fast");
        $('#informacion').focus();

    });

    $('#sendContactMail').click(function () {
        Materialize.toast('I am a toast!', 3000, 'green');
    })

}