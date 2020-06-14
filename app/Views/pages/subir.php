<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br><br>
<div class="container col-md-4">
	<?php if (session()->get('archivo')) : ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				&times;
			</button>
			<p class="text-center"><?= session()->get('archivo') ?></p>
		</div>
	<?php endif; ?>
</div>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-form-title" style="background-image: url(/img/ecom2.jpg);">
			</div>
			<form action="<?= base_url('comprobantes/guardar') ?>" method="POST" enctype="multipart/form-data" class="login100-form validate-form">
				<div class="wrap-input100 validate-input m-b-26">
					<span class="label-input100">Comentario</span>
					<input class="input100" type="text" name="archivos_descripcion" placeholder="Añade un comentario.." required="required">
					<input type="hidden" class="form-control" name="id_usuario" value="<?= session('id') ?>">
					<span class="focus-input100"></span>
				</div>
				<div class="flex-sb-m w-full p-b-30">
					<label for="file-upload" id="subir">
						<div id="info" class="text-info"></div>
						<p class="btn btn-secondary"><i class="fas fa-cloud-upload-alt"> Seleccionar Archivo</i></p>
					</label>
					<input type="file" id="file-upload" name="archivos_file" style='display: none;' class="login100-form-btn" onchange='cambiar()'>
				</div>
				<div class="text-center">
					<input type="submit" class="login100-form-btn" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function cambiar() {
		var file = document.getElementById('file-upload').files[0].name;
		document.getElementById('info').innerHTML = file;

	}
</script>

<?= $this->endSection() ?>