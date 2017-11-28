<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Administrar Multimedia</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header">
					<h1>Administrar multimedia</h1>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('adminmultimedia/upload_img', ['id' => 'formMulti']);?>
					<div class="form-group">
						<label >Seleccionar imagen:</label>
						<input type="file" name="file" class="form-control-file">
					</div>
					<div class="text-center mt-2">
						<button class="btn btn-success" type="submit" id="submit">Subir</button>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-header">
					<h3>Galeria</h3>
				</div>
				<div class="card-body">
					<div class="row" id="gallery">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
$(document).ready(function() {

function init(){
var url = "<?= site_url().'/adminmultimedia/gallery'?>";
var data = {};
	request_ajax(url, data, function(response){
		if(response.danger != undefined){
			alertDanger(response.danger);
		}else{
			image_div(response.images);
		}
	});
}

init();

$('#submit').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */
	var form = $('#formMulti')[0];
	var data = new FormData(form);
	$.ajax({
		url: '<?= site_url().'/adminmultimedia/upload_img' ?>',
		data: data,
		timeout: 600000,
		type: "POST",
		enctype: 'multipart/form-data',
		processData: false,
		contentType: false,
		cache: false
	})
	.done(function(data) {
		var v = JSON.parse(data);
		$("input[name|='security']").attr('value', v.csrf);
			if (v.success != undefined) {
				alertSuccess(v.success);
				init();
			}else{
				alertDanger(v.danger);
			}
	}).fail(function() {
		alertDanger('Error desconocido.');
	});
});

});
function image_div(images = '') {
var gallery = $('#gallery');
gallery.empty();
	for (i in images) {
		var divCol = $('<div class="col-lg-2 col-md-2 col-4">');
		var img = $('<img src="<?= base_url().'assets/img/'?>'+images[i].file_name+images[i].file_type+'" alt="'+images[i].file_name+'">');
		img.addClass('img-thumbnail');
		var btnDelete = $('<button class="btn btn-danger btn-block" onclick="delete_img('+images[i].multimedia_id+')">Eliminar</button>');
		divCol.append(img);
		divCol.append(btnDelete);
		gallery.append(divCol);
	}
}

function delete_img(id){
	alertWarning(function(response){
		if (response == true) {
		var url = "<?= site_url().'/adminmultimedia/delete' ?>";
		var data = {multimedia_id: id}
		request_ajax(url, data, function(data){
			if(data.success != undefined){
			alertSuccess(data.success);
				var url = "<?= site_url().'/adminmultimedia/gallery'?>";
				var data = {};
				request_ajax(url, data, function(other){
					if(other.danger != undefined){
						alertDanger(other.danger);
					}else{
						image_div(other.images);
					}
				});
			}else{
			alertDanger(data.danger);
			}
		});
		}
	});
}

</script>