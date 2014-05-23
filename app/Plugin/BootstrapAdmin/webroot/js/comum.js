$(function(){
	$('#dropdown-notificacoes').click(function(){
		$.post(webroot + 'usuarios/add_ajax', [], function(){

		});
		$('#notificacoes-new').fadeOut();
	});
});