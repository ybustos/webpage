$( document ).ready( inicio );

function inicio() {
	$('.modal').modal();
	$('select').material_select();
	$('.button-collapse').sideNav();
    //$('.collapsible').collapsible(); Para menís desplegables dentro?

	$('#cbx-otr').on("change", function( ){
		$('#txt-otr').slideToggle("fast");
		$('#informacion').focus();

	});

}