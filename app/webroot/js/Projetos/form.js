$(function(){

	// GEOCOMPLETE
	var input_latlng = $('#ProjetoMapaLatlng');
	var input_zoom = $('#ProjetoMapaZoom');
	var initial_location = '';
	var zoom_default = 10;

	if (input_latlng.val() != '') {
		initial_location = input_latlng.val();
	};

	if (input_zoom.val() != '') {
		zoom_default = parseInt(input_zoom.val());
	};

	$('#geocomplete').geocomplete({
		map: '#map-canvas',
		location: initial_location,
		mapOptions: {
			minZoom: 5,
			maxZoom: 18,
		},
		markerOptions: {
    		draggable: true
  		},
	});

	var map = $('#geocomplete').geocomplete('map');
	var marker = $('#geocomplete').geocomplete('marker');

	$('#geocomplete').geocomplete()
		.bind("geocode:result", function(event, data){
			$('#geocomplete').val('');
		})
		.bind("geocode:dragged", function(event, data){
			input_latlng.val(marker.getPosition());
		});

	google.maps.event.addListener(map, 'zoom_changed', function() {
		$('#ProjetoMapaZoom').val(map.getZoom());
	});

	map.setZoom(zoom_default);

	// GEOCOMPLETE


// INDICAÇÃO TAG
	if ($('#ProjetoIndicacaoId').val() != '') {
		var data = {id: $('#ProjetoIndicacaoId').val(), label: $('#ProjetoIndicacaoUid').val()};
		console.log(data);
		setTag(data);
	};

	$('#indicacaoAutocomplete').autocomplete({
		source: webroot + 'indicacoes/getIndicacoesAutoComplete',
		select: function(event, ui){
			$('#ProjetoIndicacaoId').val(ui.item.id);
			
			setTag(ui.item);

			return false;
		}
	});
	
	function setTag(data) {
		$('#tag')
			.html('<a href=\"'+webroot+'indicacoes/view/'+data.id+'\" target=\"_blank\">' + data.label + '</a> <span id=\"tag-close\">&times;</span>');
		$(this).val('');
		$('#ProjetoUid').focus();		
	};
	
	$(document).on('click', '#tag-close', function(){
		$('#tag').html('Indicação não adicionada');
		$('#ProjetoIndicacaoId').val('');
		$('#indicacaoAutocomplete').val('');
		$('#indicacaoAutocomplete').focus();
	});

// INDICAÇÃO TAG

	$('#ProjetoValor').maskMoney({
		thousands: '.',
		decimal: ','
	});

});