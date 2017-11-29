<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buscar cursos</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card bg-light border">
				<div class="card-body">
					<?= form_open('main/proSearch',['id' => 'search', 'class' => 'container was-validated']); ?>
					<div class="row">
						<div class="col-12 col-md-9 col-lg-10">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar un curso..." id="isearch">
							</div>
						</div>
						<div class="col-12 col-md-3 col-lg-2">
							<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<h3>Resultados de busqueda</h3>
			<ul class="list-group" id="result">
				
			</ul>
		</div>
	</body>
</html>
<script>
$(document).ready(function() {
	var result = $('#result');
	var url = $('#search').attr('action');
	var data = {search: 'all'}
	var form = $('#search');
	var search = $('#isearch');
	results(result, url,data);
	form.on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		data = {
			search: $('#isearch').val()
		};
		results(result, url,data);
	});
});
function createResult(courseName = '', courseDesc = '', courseId = '', userStatus = ''){
	var li = $('<li>').addClass('list-group-item');
	var description = $('<p>').addClass('text-truncate text-secondary');
	var divRight = $('<div>').addClass('text-right');
	var btnIns = $('<a onclick="inscription('+courseId+')">').addClass('btn btn-info').html('Inscribirse');
	var btnReg = $('<a>').addClass('btn btn-success').html('Registrarse');
		li.append(courseName);
		description.append(courseDesc);
		if(userStatus == 'logged'){
				divRight.append(btnIns);
			}else{
				divRight.append(btnReg.attr('href', '<?= site_url().'/register/' ?>'));
			}
			li.append(description);
			li.append(divRight);
			return li;
		}

function results(result, url, data){
	request_ajax(url, data ,function(response){
		if(response.results != undefined){
			for (r in response.results) {
				result.empty();
				result.append(createResult(
					response.results[r].course_name,
					response.results[r].description,
					response.results[r].course_id,
					response.userStatus
				));
			}
		}else{
			alertDanger('No se encontraron resultados');
		}
	});
}

function inscription(courseId){
	var url = '<?= site_url()."/inscription/proInscription"?>';
	var data = {
		courseId: courseId
	};
	request_ajax(url,data, function(response){
		if (response.success != '') {
			alertSuccess(response.success);
		} else {
			alertDanger('No se pudo registrar.');
		}
	});
}
</script>