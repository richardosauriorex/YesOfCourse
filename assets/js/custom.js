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
			switch_function(data);			
		})
		.fail(function(data) {
			msgAlert('Error', 'Fallo la operación', 'alert-danger');	
		});	
	}

	function switch_function(data) {
		$("input[name|='security']").val(data.csrf);
		switch(data.type) {
			case 'alert':
				msgAlert(data.title, data.msg, data.bColor);		
				break;
			case 'table':
				break;
			case 'modal':
				break;
		}
	}

	function msgAlert(title = '', msg = '', color = '') {
		$('#alert').addClass(color);
		$('#alert').addClass('show');
		$('#alert #title').html(title);
		$('#alert #msg').html(msg);
		setTimeout(function() {
			$('#alert').removeClass('show');
			$('#alert').removeClass(color);
			$('#alert').addClass('hide');
		}, 3000);
	}