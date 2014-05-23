$(function(){
	$('#dropdown-notificacoes').click(function(){
		$.post(webroot + 'notificacoesLidas/add_ajax', [], function(){

		});
		$('#notificacoes-new').fadeOut();
	});
});