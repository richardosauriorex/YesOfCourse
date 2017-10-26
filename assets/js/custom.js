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
		.fail(function() {
			msgAlert('Error', 'Fallo la operación', 'alert-danger');	
		});	
	}

	function switch_function(data) {
		$("input[name|='security']").val(data.csrf);
		switch(data.type) {
			case 'alert':
				msgAlert(data.title, data.msg, data.bColor);		
				break;
			case 'card':
				card(data);
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

	function card(data) {
		var elem = initCard(data);
		for (x in data.queryResult) {
			if (data.queryResult.hasOwnProperty(x)) {
				var rowQuery = data.queryResult[x];
				var h5 = $('<h5 class="card-header bg-dark text-white">').text(rowQuery[elem.title]);
				var p = $('<p class="card-text">').text(rowQuery[elem.description]);
				if (validDefined(elem.status)) {
					var divStatus = $('<div class="text-right">');
					var btnStatus = $('<span class="badge badge-info">').text(rowQuery[elem.status]);
					divStatus.append(btnStatus);
				}
				h5.append(divStatus);
				if (validDefined(data.functions)) {
					var divFun = $('<div class="text-right">');
					for (y in data.functions) {
						if (data.functions.hasOwnProperty(y)) {
							var btnFun = $('<button class="btn '+data.functions[y]+'">').text(y);
							btnFun.attr('onclick', data.idElement+y+'('+rowQuery[data.queryId]+')');
							divFun.append(btnFun);
						}
					}
				}
				var card = $('<div class="card">');
				var cardBody = $('<div class="card-body">');
				cardBody.append(p);
				cardBody.append(divFun);
				card.append(h5);
				card.append(cardBody);
				elem.panel.append(card);
			}
		}
	}

	function initCard(data) {
		return {
		 panel: $('#'+data.idElement),
		 title: data.panelElements[0],
		 description: data.panelElements[1],
		 status: data.panelElements[2]
		};
	}

	function validDefined(a) {
		if(a !== undefined && a !== null) {
			return true;
		}else{
			return false;
		}
	}