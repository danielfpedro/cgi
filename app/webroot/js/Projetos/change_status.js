$(function(){
	$('#ProjetoChangeStatusModalForm').submit(function(){
		$(this).find('button').attr({'disabled': true}).text('Aguarde, salvando...');
	});
});