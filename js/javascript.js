$( document ).ready( inicio );

function inicio() {
	$('.modal').modal();
	$('select').material_select();

	$('#cbx-otr').on("change", function( ){
		$('#txt-otr').slideToggle("fast");
		$('#informacion').focus();

	});

}