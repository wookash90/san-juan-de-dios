
<form action="<?= $base_url ?>/gracias" method="post" id="form_cita" class="text-left">
	<input type="hidden" name="send_cita" value="<?= date('dHm');?>" />
	<div class="row">
		<div class="col">
			<div class="input dinamic_label">
				<input id="contact_name" type="text" name="cita_name" placeholder="Nombre" value="<?= !empty($_POST['cita_name']) ? $_POST['cita_name'] : '';?>" class="form-control" required />
				<label for="cita_name">Nombre</label>
			</div>
		</div>
		<div class="col">
			<div class="input dinamic_label">
				<input id="contact_name" type="text" name="cita_apellidos" placeholder="Apellidos" value="<?= !empty($_POST['cita_apellidos']) ? $_POST['cita_apellidos'] : '';?>" class="form-control" required />
				<label for="cita_apellidos">Apellidos</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="input dinamic_label">
				<input id="mail" type="email" name="cita_mail" placeholder="Correo electrónico" value="<?= !empty($_POST['cita_mail']) ? $_POST['cita_mail'] : '';?>" class="form-control" required />
				<label for="cita_mail">Correo electrónico</label>
			</div>
		</div>
		<div class="col">
			<div class="input dinamic_label">
				<input id="telefono" type="tel" name="cita_telefono" placeholder="Teléfono" value="<?= !empty($_POST['cita_telefono']) ? $_POST['cita_telefono'] : '';?>" class="form-control"  required />
				<label for="cita_telefono">Teléfono</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="input dinamic_label">
				<input id="mail" type="text" name="cita_dni" placeholder="DNI" value="<?= !empty($_POST['cita_dni']) ? $_POST['cita_dni'] : '';?>" class="form-control" required />
				<label for="cita_dni">DNI</label>
			</div>
		</div>
		<div class="col">
			<div class="input dinamic_label">
				<input id="telefono" type="date" name="cita_fecha_nacimiento" placeholder="Fecha nacimiento" value="<?= !empty($_POST['cita_fecha_nacimiento']) ? $_POST['cita_fecha_nacimiento'] : '';?>" class="form-control"  required />
				<label for="cita_fecha_nacimiento">Fecha nacimiento</label>
			</div>
		</div>
	</div>
	<div class="input dinamic_label">
		<textarea onchange="disableBtn()" id="mensaje" name="cita_mensaje" rows="5" placeholder="Escribe aquí tu consulta (mínimo 10 caracteres)" class="form-control" required><?= !empty($_POST['cita_mensaje']) ? $_POST['cita_mensaje'] : '';?></textarea>
		<label for="cita_mensaje">Escribe aquí tu consulta (mínimo 10 caracteres)</label>
	</div>
	<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'robot') { ?>
	<div class="text-left">
		<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>">
	</div>
	<?php } ?>
	<div class="row justify-content-end mt-4">
		<div class="col-auto">
			<div class="input checkbox">
				<input type="checkbox" name="cita_condiciones" value="1" id="cita_condiciones">
				<label for="cita_condiciones">Acepto los <a href="<?= $base_url;?>/aviso-legal">TÉRMINOS Y CONDICIONES</a> <?= file_get_contents("$base_dir/files/img/icons/check.svg");?></label>
			</div>
		</div>
		<div class="col-auto">
			<button type="submit" id="enviar-btn" class="btn primary-btn disabled">Enviar</button>
		</div>
	</div>
	<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'invisible') { ?>
	<input type="hidden" name="g-recaptcha-response" />
	<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>" data-callback="onSubmit" data-size="invisible"></div>
	<script>
	function onSubmit(token) {
		$('[name="g-recaptcha-response"]').val(token);
		document.getElementById('form_cita').submit();
	}

	document.getElementById('form_cita').addEventListener('submit', function(e) {
		e.preventDefault();
		if (this.checkValidity()) {
			grecaptcha.execute();
		}
	});

	function disableBtn() {
		if($("#mensaje").val().length > 10) {
			$("#enviar-btn").removeClass("disabled");
		} else {
			$("#enviar-btn").addClass("disabled");
		}
	}
	
	</script>
	<?php } else if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'v3') { ?>
	<input type="hidden" name="recaptcha_response" class="recaptchaResponse">
	<?php } ?>
</form>
<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type != 'v3') { ?><script src="https://www.google.com/recaptcha/api.js?&hl=<?= !empty($idioma) ? $idioma : 'es';?>" async defer></script><?php } ?>