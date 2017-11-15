function request_ajax(url = '', data = '') {
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
		obtainData(data);			
	})
	.fail(function() {
		return false;	
	});	
}

function alertDanger(msg) {
	$('.alertMsg').text(msg);
	$('#alertDanger').modal('show');
}

function alertSuccess(msg) {
	$('.alertMsg').text(msg);
	$('#alertSuccess').modal('show');	
}

function alertInfo(msg) {
	$('.alertMsg').text(msg);
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
