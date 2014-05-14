$(function(){
	$('#IndicacaoChangeStatusForm').submit(function(){
		$(this).find('button').attr({'disabled': true}).text('Aguarde, salvando...');
	});
});