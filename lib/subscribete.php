<?php if (!empty($_POST["send_suscribirse"]) && $_POST["send_suscribirse"] == date('dHm')) {
	$mail = !empty($_POST["suscribe_mail"]) ? $_POST['suscribe_mail'] : '';
	$suscribe_errores = [];


	if (empty($_POST['suscribe_condiciones'])) {
		$suscribe_errores[] = "Debe aceptar los términos y condiciones para enviar sus datos.";
	}
	require_once "$base_dir/lib/functions.php";
	if (!validateMail($mail)) 
		$suscribe_errores[] = "Introduzca una dirección de correo electrónica válida.";

	if (!$suscribe_errores) {
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
			$suscribe_errores[] = "No ha superado el filtro antispam.";
			if (!$result->success) $suscribe_errores[] = json_encode($result->{'error-codes'});
		}
	}

	// API
	/*if (!$suscribe_errores) {
		$contacto = $cc->post('contactar', "persona=$persona&mail=$contact_mail&asunto=$asunto&mensaje=$mensaje");
		if (!empty($contacto->mail)) echo "<div class='error-message'>Contacto enviado correctamente'</div>";
	}*/

	// NORMAL
	if (!$suscribe_errores) {
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
						<p>Nueva petición para suscribirse a la newsletter.</p>
						<p><span style='font-weight:500;'>E-mail del usuario:</span> $mail</p>
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
						<p>Gracias por suscribirse a nuestra newsletter</p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table></center>
EOT;

		$email->Subject = 'Newsletter';
		$email->Body = header_mail().$body_admin.footer_mail();
		$email->AltBody = strip_tags($body_admin);

		// $email->addAddress("lukas@dssnetwork.es", $web_title);
		$email->addAddress("suscripciones@sjdsevilla.com", $web_title);
		// $email->addAddress("info@sjdsevilla.com", $web_title);
		// $email->addAddress("p.velo@dssnetwork.es", $web_title);

		$send_res = send_email($email);
		if ($send_res !== true) {
			$suscribe_errores[] = $send_res;
		}

		if (!$suscribe_errores) {
			$email->ClearAllRecipients();
			$email->Body = header_mail().$body_user.footer_mail();
			$email->AltBody = strip_tags($body_user);
			$email->addAddress($mail);

			//newsletter - lista de usuarios
			$newsletter_list = 'newsletter-file.csv';
			$current_date = date('d/m/Y');
			$handle = fopen($newsletter_list, 'a');
			fseek($handle, 0, SEEK_END);
			fwrite($handle, "$mail - $current_date" ."\n");
			fclose($handle);

			$send_res = send_email($email);
			if ($send_res !== true) {
				$suscribe_errores[] = $send_res;
			} else {
				$enviado = "Gracias por suscribirse a nuestro newsletter";
				unset($_POST['suscribe_mail']);
			}
		}
	}
} ?>

<section class="toggle-background-color">
    <div class="container main_container pb-5">
        <div class="row py-5 align-items-center center-movil">
            <div class="col-12 col-md-6">
                <h2 class="primary-font-blue"><span class="span-block">Suscríbete</span> a nuestras <span class="semibold">noticias</span></h2>
                <p class="third-font-gray mt-4">Mantente informado de todas nuestras novedades y avances de nuestro centro. <span class="bold span-block">Queremos estar siempre cerca de ti.</span></p>
            </div>
            <div class="col-12 col-md-6 subscribete_padding">
				<?php if (!empty($suscribe_errores)) {
					echo "<div class='error-message'>".implode('<br />', $suscribe_errores)."</div>";
				} else if (!empty($enviado)) {
					echo "<div class='success-message'>".$enviado."</div>";
				} ?>
				<form action="./<?= substr($url, 0, -4);?>#form_suscribirse" enctype="multipart/form-data" method="post" id="form_suscribirse" class="text-left">
					<input type="hidden" name="send_suscribirse" value="<?= date('dHm');?>" />
					<div class="row">
						<div class="col">
							<div class="input dinamic_label">
								<input id="mail" type="email" name="suscribe_mail" placeholder="Email" value="<?= !empty($_POST['suscribe_mail']) ? $_POST['suscribe_mail'] : '';?>" class="form-control" required />
								<label for="suscribe_mail">Correo electrónico</label>
							</div>
						</div>
					</div>
					<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'robot') { ?>
					<div class="text-left">
						<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>">
					</div>
					<?php } ?>
					<div class="row d-flex justify-content-center justify-content-md-between mt-4">
						<div class="col-auto">
							<div class="input checkbox">
								<input type="checkbox" name="suscribe_condiciones" value="1" id="suscribe_condiciones">
								<label for="suscribe_condiciones" class="small third-font-gray">Acepto los <a href="<?= $base_url;?>/aviso-legal"><span class="bold">TÉRMINOS Y CONDICIONES</span></a> <?= file_get_contents("$base_dir/files/img/icons/check.svg");?></label>
							</div>
						</div>
						<div class="col-auto">
							<button type="submit" class="btn primary-btn movil-azul-btn">Suscribirse</button>
						</div>
					</div>
					<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type == 'invisible') { ?>
					<input type="hidden" name="g-recaptcha-response" />
					<div class="g-recaptcha" data-sitekey="<?= $app_recaptcha[$app_recaptcha_type]['site_key'];?>" data-callback="onSubmit" data-size="invisible"></div>
					<script>
					function onSubmit(token) {
						$('[name="g-recaptcha-response"]').val(token);
						document.getElementById('form_suscribirse').submit();
					}

					document.getElementById('form_suscribirse').addEventListener('submit', function(e) {
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
			</div>
        </div>
    </div>
</section>
<?php if (!empty($app_recaptcha_type) && $app_recaptcha_type != 'v3') { ?><script src="https://www.google.com/recaptcha/api.js?&hl=<?= !empty($idioma) ? $idioma : 'es';?>" async defer></script><?php } ?>