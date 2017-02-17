$(document).ready(inicio);
var formulario = "";
function inicio() {
    $('.modal').modal();
    $('select').material_select();
    $('.button-collapse').sideNav();
    //$('.collapsible').collapsible(); Para menís desplegables dentro?

    $('#cbx-otr').on("change", function () {
        $('#txt-otr').slideToggle("fast");
        $('#informacion').focus();

    });



    $('.fitems').change(function(e){
        if(formulario === ''){
            formulario = new FormData();
        }
        var id=$(this).attr('name');
        var valor=$(this).val();
        formulario.append(id,valor);
        //formulario.append("opt[]",formulario.getAll('m-opt[]').slice(0,-1));
    });

    $('#sendContactMail').click(function () {
        var mail = {};
        var opciones = [];
        var datos = ($('.cnt-mail').serializeArray());
        var cbx = $('.cbx').serializeArray();
        $.each(datos, function(e, v){
            mail[v.name] = v.value;
        });
        if(cbx.length === 0) {
            $.each($('#sel-opt').val(), function(e, v){
                console.log(v);
                opciones.push(v);
            });
        } else {
            $.each(cbx, function(e, v){
                opciones.push(v.value);
            });
        }
        mail['opciones'] = opciones;

        if ($('#informacion').val() ){
            mail['informacion'] = $('#informacion').val();
        }

        console.log(JSON.stringify(mail));
        Materialize.toast('I am a toast!', 3000, 'green');
    });

    $('#sel-opt').change(function(){
        if($.inArray("otr", $(this).val()) != -1){
            $("#txt-otr").slideDown("fast");
        }else{
            $("#txt-otr").hide("fast");
        }
    });

}