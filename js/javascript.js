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

    var formulario = "";


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

        $.post( "mail.php", mail, function( data ) {
            Materialize.toast("Mail enviado con éxito", 3000, 'green');
            Popup(data);
        });

    });

    $('#sel-opt').change(function(){
        if($.inArray("otr", $(this).val()) != -1){
            $("#txt-otr").slideDown("fast");
        }else{
            $("#txt-otr").hide("fast");
        }
    });

}


function Popup(data) {

    var mywindow = window.open('', 'title Here', 'height=400,width=600');
    mywindow.document.write(data);
    mywindow.print();
    mywindow.close();

    return true;
}