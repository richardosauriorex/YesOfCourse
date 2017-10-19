	function ajax_cod(url = '', data = '') {
		var csrf = $("input[name|='security']").val();
		data.security = csrf;
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(data) {
			custom_alert(data.hash, data.title, data.msg, data.color);
		})
		.fail(function(data) {
			custom_alert(data.hash, 'Error', 'Fallo la operación', 'alert-danger');	
		});	
	}

	function custom_alert(hash = '', title = '', msg = '', color = '') {
		console.log(hash + title + msg + color);
		$("input[name|='security']").val(hash);
		$('#alert').addClass(color);
		$('#alert').addClass('show');
		$('#alert #title').html(title);
		$('#alert #msg').html(msg);
		setTimeout(function() {
			$('#alert').removeClass('show');
			$('#alert').removeClass(color);
			$('#alert').addClass('hide');
		}, 2500);

	}