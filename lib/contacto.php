<?php if (!empty($_POST["send_contacto"]) && $_POST["send_contacto"] == date('dHm')) {
	$contact_name = !empty($_POST["contact_name"]) ? $_POST['contact_name'] : '';
	/* $contact_apellido = !empty($_POST["contact_apellido"]) ? $_POST["contact_apellido"] : ''; */
	$contact_mail = !empty($_POST["contact_mail"]) ? $_POST['contact_mail'] : '';
	$contact_telefono = !empty($_POST["contact_telefono"]) ? $_POST['contact_telefono'] : '';
	$contact_mensaje = !empty($_POST["contact_mensaje"]) ? $_POST['contact_mensaje'] : '';
	/* $suscrito = !empty($_POST["suscribir"]) ? true : false; */
	$contact_errores = [];


	if (empty($_POST['contact_condiciones'])) {
		$contact_errores[] = "Debe aceptar los términos y condiciones para enviar sus datos.";
	}
	if (!$contact_name) {
		$contact_errores[] = "No ha introducido su nombre correctamente, vuelva a intentarlo.";
	}
	if (!$contact_telefono) {
		$contact_errores[] = "Su teléfono es obligatorio, por favor vuelva a intentarlo.";
	}
	// } else if (!$dni) {
	// 	$contact_errores[] = "Su DNI es obligatorio, por favor vuelva a intentarlo.";
	// } else if (!$fecha_nacimiento) {
	// 	$contact_errores[] = "Su fecha nacimiento es obligatorio, por favor vuelva a intentarlo.";
	// }

	if (!$contact_mensaje || strlen($contact_mensaje) < 10) {
		$contact_errores[] = "Su mensaje es demasiado corto. Introduzca algo más de información.";
	}
	require_once "$base_dir/lib/functions.php";
	if (!validateMail($contact_mail)) 
		$contact_errores[] = "Introduzca una dirección de correo electrónica válida.";

	if (!$contact_errores) {
		// Verify captcha
		$post_data = http_build_query(array(
			'secret' => $app_recaptcha[$app_recaptcha_type]['secret_key'],
			'response' => $app_recaptcha_type == 'v3' ? $_POST['recaptcha_response'] : $_POST['g-recaptcha-response']
		));

		$opts = array('http' => array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $post_data
		));
		$context  = stream_context_create($opts);
		$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
		$result = json_decode($response);

		if (
			!$result->success
			|| ($app_recaptcha_type == 'v3' && $result->score < 0.8)
		) {
			$contact_errores[] = "No ha superado el filtro antispam.";
			if (!$result->success) $contact_errores[] = json_encode($result->{'error-codes'});
		}
	}

	// API
	/*if (!$contact_errores) {
		$contacto = $cc->post('contactar', "persona=$persona&mail=$contact_mail&asunto=$asunto&mensaje=$mensaje");
		if (!empty($contacto->mail)) echo "<div class='error-message'>Contacto enviado correctamente'</div>";
	}*/

	// NORMAL
	if (!$contact_errores) {
		/* $suscrito = !empty($suscrito) ? '<p>El usuario ha dado su consentimiento para ser incluido en la lista de suscripción.</p>' : ''; */
		require_once "$base_dir/lib/mail.php";
		$email = ini_email();

		$body_admin = <<<EOT
<center><table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: #ffffff;color: #000000;'>
	<tr>
		<td align='center' valign='top' style='mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
			<table border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
				<tr>
					<td align='left' valign='top' style='font-family: Open Sans, Arial, sans-serif;font-weight:300;font-size:20px;line-height:1.2;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
						<p><span style='font-weight:500;'>Nombre del usuario:</span> $contact_name</p>
						<p><span style='font-weight:500;'>E-mail del usuario:</span> $contact_mail</p>
						<p><span style='font-weight:500;'>Teléfono del usuario:</span> $contact_telefono</p>
						<p><span style='font-weight:500;'>Mensaje:</span><br /> $contact_mensaje</p>
						
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table></center>
EOT;

		/* $suscrito = !empty($suscrito) ? '<p>Has ha dado tu consentimiento para para recibir información comercial y promociones.</p>' : ''; */
		$body_user = <<<EOT
<center><table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: #ffffff;color: #000000;'>
	<tr>
		<td align='center' valign='top' style='mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
			<table border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
				<tr>
					<td align='left' valign='top' style='font-family: Open Sans, Arial, sans-serif;font-weight:300;font-size:17px;line-height:1.2;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
						<p style='font-size:20px;'><strong>Hola, $contact_name.</strong></p>
						<p>Este correo electrónico es una confirmación de recepción del siguiente mensaje:<br /><br /> "<i> $contact_mensaje </i>"</p>
						<p>Hospital San Juan De Dios ha recibido su mensaje satisfactoriamente. Su petición será procesada y respondida en la mayor brevedad posible.</p>
						
						<p>Gracias por confiar en nosotros.</p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table></center>
EOT;

		$email->Subject = 'Contacto';
		$email->Body = header_mail().$body_admin.footer_mail();
		$email->AltBody = strip_tags($body_admin);

		// $email->addAddress("lukas@dssnetwork.es", $web_title);
		$email->addAddress("info@sjdsevilla.com", $web_title);
		// $email->addAddress("p.velo@dssnetwork.es", $web_title);

		$send_res = send_email($email);
		if ($send_res !== true) {
			$contact_errores[] = $send_res;
		}

		if (!$contact_errores) {
			$email->ClearAllRecipients();
			$email->Body = header_mail().$body_user.footer_mail();
			$email->AltBody = strip_tags($body_user);

			$email->addAddress($contact_mail, $contact_name);

			$send_res = send_email($email);
			if ($send_res !== true) {
				$contact_errores[] = $send_res;
			} else {
				$enviado = "Mensaje enviado correctamente. Gracias por contactar con nosotros.";
				unset($_POST['contact_name']);
				/* unset($_POST['contact_apellido']); */
				/* unset($_POST['contact_dni']); */
				unset($_POST['contact_mail']);
				unset($_POST['contact_telefono']);
				/* unset($_POST['contact_fecha_nacimiento']); */
				unset($_POST['contact_mensaje']);
			}
		}
	}
}

if (!empty($contact_errores)) {
	echo "<div class='error-message'>".implode('<br />', $contact_errores)."</div>";
} else if (!empty($enviado)) {
	echo "<div class='success-message'>".$enviado."</div>";
} ?>		
<form action="./<?= substr($url, 0, -4);?>#form_contacto" enctype="multipart/form-data" method="post" id="form_contacto" class="text-left">
	<input type="hidden" name="send_contacto" value="<?= date('dHm');?>" />
	<div class="input dinamic_label">
		<input id="contact_name" type="text" name="contact_name" placeholder="Nombre y apellidos" value="<?= !empty($_POST['contact_name']) ? $_POST['contact_name'] : '';?>" class="form-control" required/>
		<label for="contact_name">Nombre y apellidos</label>
	</div>
	<div class="row">
		<div class="col">
			<div class="input dinamic_label">
				<input id="mail" type="email" name="contact_mail" placeholder="Correo electrónico" value="<?= !empty($_POST['contact_mail']) ? $_POST['contact_mail'] : '';?>" class="form-control" required />
				<label for="contact_mail">Correo electrónico</label>
			</div>
		</div>
		<div class="col">
			<div class="input dinamic_label">
				<input id="telefono" type="tel" name="contact_telefono" placeholder="Teléfono" value="<?= !empty($_POST['contact_telefono']) ? $_POST['contact_telefono'] : '';?>" class="form-control"  required />
				<label for="contact_telefono">Teléfono</label>
			</div>
		</div>
	</div>
	<div class="input dinamic_label">
		<textarea id="mensaje" name="contact_mensaje" rows="5" placeholder="Escribe aquí tu consulta" class="form-control" required><?= !empty($_POST['contact_mensaje']) ? $_POST['contact_mensaje'] : '';?></textarea>
		<label for="contact_mensaje">Escribe aquí tu consulta</label>
	</div>
	<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'robot') { ?>
	<div class="text-left">
		<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>">
	</div>
	<?php } ?>
	<div class="row justify-content-end mt-4">
		<div class="col-auto">
			<div class="input checkbox">
				<input type="checkbox" name="contact_condiciones" value="1" id="contact_condiciones">
				<label for="contact_condiciones">Acepto los <a href="<?= $base_url;?>/aviso-legal">TÉRMINOS Y CONDICIONES</a> <?= file_get_contents("$base_dir/files/img/icons/check.svg");?></label>
			</div>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn primary-btn">Enviar</button>
		</div>
	</div>
	<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'invisible') { ?>
	<input type="hidden" name="g-recaptcha-response" />
	<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>" data-callback="onSubmit" data-size="invisible"></div>
	<script>
	function onSubmit(token) {
		$('[name="g-recaptcha-response"]').val(token);
		document.getElementById('form_contacto').submit();
	}

	document.getElementById('form_contacto').addEventListener('submit', function(e) {
		e.preventDefault();
		if (this.checkValidity()) {
			grecaptcha.execute();
		}
	});
	</script>
	<?php } else if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'v3') { ?>
	<input type="hidden" name="recaptcha_response" class="recaptchaResponse">
	<?php } ?>
</form>
<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type != 'v3') { ?><script src="https://www.google.com/recaptcha/api.js?&hl=<?= !empty($idioma) ? $idioma : 'es';?>" async defer></script><?php } ?>