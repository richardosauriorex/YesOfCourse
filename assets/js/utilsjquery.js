function request_ajax(url = '', data = '', callback) {
	var csrf = $("input[name|='security']").val();
	data.security = csrf;
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		data: data,
	})
	.done(function(data) {
		$("input[name|='security']").val(data.csrf);
		if (callback) callback(data);			
	})
	.fail(function() {
		alertDanger('Desconocido hasta para mi.');	
	});	
}

function alertDanger(msg) {
	$('.alertMsg').html(msg);
	$('#alertDanger').modal('show');
}

function alertRules(totalQuestions) {
	$('#correct').html(parseInt((80 * totalQuestions) / 100)); 
	$('#alertRules').modal('show');
}

function alertSuccess(msg) {
	$('.alertMsg').html(msg);
	$('#alertSuccess').modal('show');	
}

function alertInfo(msg) {
	$('.alertMsg').html(msg);
	$('#alertInfo').modal('show');	
}

/*for use this alert alertWarning(function(result){ some code });*/
function alertWarning(callback) {
	$('#alertWarning').modal('show');
	$('#false').click(function(){
        $('#alertWarning').modal('hide');
        if (callback) callback(false);

    });
    $('#true').click(function(){
        $('#alertWarning').modal('hide');
        if (callback) callback(true);
    });
}
