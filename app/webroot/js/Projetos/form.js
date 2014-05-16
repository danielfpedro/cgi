$(function(){
	$('#indicacaoAutocomplete').autocomplete({
		source: webroot + 'indicacoes/getIndicacoesAutoComplete',
		select: function(event, ui){
			$('#ProjetoIndicacaoId').val(ui.item.id);
			$('#tag').html('<a href=\"\">' + ui.item.label + '</a> <span id=\"tag-close\">&times;</span>');
			$(this).val('');
			$('#ProjetoTitulo').focus();
			return false;
		}
	});

	$(document).on('click', '#tag-close', function(){
		$('#tag').html('Indicação não adicionada');
		$('#ProjetoIndicacaoId').val('');
		$('#indicacaoAutocomplete').focus();
	})
});