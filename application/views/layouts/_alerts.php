<div class="modal fade mt-5" id="alertSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-success text-white">
			<div class="modal-body">
				<div class="text-right">
					<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-close"></i></button>
				</div>
				<div class="text-center">
					<h1><i class="fa fa-smile-o fa-5x"></i><br>
					¡Sin problemas!
					</h1>
					<p class="alertMsg"></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade mt-5" id="alertDanger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-danger text-white">
			<div class="modal-body">
				<div class="text-right">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
				</div>
				<div class="text-center">
					<h1><i class="fa fa-frown-o fa-5x"></i><br>
					¡Hubo un problema!
					</h1>
					<p class="alertMsg"></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade mt-5" id="alertWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-warning text-black">
			<div class="modal-body">
				<div class="text-right">
					<button type="button" class="btn btn-dark text-warning" data-dismiss="modal"><i class="fa fa-close"></i></button>
				</div>
				<div class="text-center">
					<h1><i class="fa fa-exclamation fa-5x"></i><br>
					¿Esta seguro que desea seguir con esta acción?
					</h1>
					<h3>No se podra revertir esta acción una vez hecha.</h3>
					<button type="button" class="btn btn-dark btn-lg" data-dismiss="modal" id="false">Cancelar</button>
					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="true">Si</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade mt-5" id="alertInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-info text-white">
			<div class="modal-body">
				<div class="text-right">
					<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i></button>
				</div>
				<div class="text-center">
					<h1><i class="fa fa-floppy-o fa-5x"></i><br>
					¡Se realizaron los cambios!
					</h1>
					<p class="alertMsg"></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade mt-5" id="alertRules" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark text-white">
			<div class="modal-body">
				<div class="text-right">
					<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-close"></i></button>
				</div>
				<div class="text-center">
					<h1><i class="fa fa-graduation-cap fa-5x"></i><br>
					<p class="h3">Bienvenido a la evaluación, las reglas son simples:</p>
					<p class="h4">
						Contesta correctamente <span id="correct"></span> preguntas para aprobar <i class="fa fa-smile-o fa-2x"></i>, de lo contrario repruebas <i class="fa fa-frown-o fa-2x"></i>. Suerte y que la fuerza te acompañe <i class="fa fa-book fa-2x"></i>.
					</p>
					<button type="button" class="btn btn-success" data-dismiss="modal">Comenzar!</button>
					</h1>
					<p class="alertMsg"></p>
				</div>
			</div>
		</div>
	</div>
</div>