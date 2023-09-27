<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YWM22BP86W"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YWM22BP86W');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 10990609796 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10990609796"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-10990609796'); </script>
<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1689218288171144');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1689218288171144&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<?php if($url == "gracias.php" && !empty($_POST["send_cita"])) {
    $cita_name = !empty($_POST["cita_name"]) ? $_POST['cita_name'] : '';
	$cita_apellido = !empty($_POST["cita_apellido"]) ? $_POST["cita_apellido"] : '';
	$cita_mail = !empty($_POST["cita_mail"]) ? $_POST['cita_mail'] : '';
	$cita_telefono = !empty($_POST["cita_telefono"]) ? $_POST['cita_telefono'] : '';
	$cita_mensaje = !empty($_POST["cita_mensaje"]) ? $_POST['cita_mensaje'] : '';
	$cita_dni = !empty($_POST["cita_dni"]) ? $_POST['cita_dni'] : '';
	$cita_fecha_nacimiento = !empty($_POST["cita_fecha_nacimiento"]) ? $_POST['cita_fecha_nacimiento'] : '';
	$suscrito = !empty($_POST["suscribir"]) ? true : false;
	$cita_errores = [];


	if (empty($_POST['cita_condiciones'])) {
		$cita_errores[] = "Debe aceptar los términos y condiciones para enviar sus datos.";
	}
	if (!$cita_name) {
		$cita_errores[] = "No ha introducido su nombre correctamente, vuelva a intentarlo.";
	}
	if (!$cita_telefono) {
		$cita_errores[] = "Su teléfono es obligatorio, por favor vuelva a intentarlo.";
	} else if (!$cita_dni) {
		$cita_errores[] = "Su DNI es obligatorio, por favor vuelva a intentarlo.";
	} else if (!$cita_fecha_nacimiento) {
		$cita_errores[] = "Su fecha nacimiento es obligatorio, por favor vuelva a intentarlo.";
	}

	if (!$cita_mensaje || strlen($cita_mensaje) < 1) {
		$cita_errores[] = "Su mensaje es demasiado corto. Introduzca algo más de información.";
	}
	require_once "$base_dir/lib/functions.php";
	if (!validateMail($cita_mail)) 
		$cita_errores[] = "Introduzca una dirección de correo electrónica válida.";

	if (!$cita_errores) {
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
			$cita_errores[] = "No ha superado el filtro antispam.";
			if (!$result->success) $cita_errores[] = json_encode($result->{'error-codes'});
		}
	}

	// API
	/*if (!$cita_errores) {
		$contacto = $cc->post('contactar', "persona=$persona&mail=$cita_mail&asunto=$asunto&mensaje=$mensaje");
		if (!empty($contacto->mail)) echo "<div class='error-message'>Contacto enviado correctamente'</div>";
	}*/

	// NORMAL
	if (!$cita_errores) {
		$suscrito = !empty($suscrito) ? '<p>El usuario ha dado su consentimiento para ser incluido en la lista de suscripción.</p>' : '';
		require_once "$base_dir/lib/mail.php";
		$email = ini_email();

		$body_admin = <<<EOT
        <center><table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: #ffffff;color: #000000;'>
            <tr>
                <td align='center' valign='top' style='mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                        <tr>
                            <td align='left' valign='top' style='font-family: Open Sans, Arial, sans-serif;font-weight:300;font-size:20px;line-height:1.2;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                <p><span style='font-weight:500;'>Nombre del usuario:</span> $cita_name $cita_apellido</p>
                                <p><span style='font-weight:500;'>E-mail del usuario:</span> $cita_mail</p>
                                <p><span style='font-weight:500;'>Teléfono del usuario:</span> $cita_telefono</p>
                                <p><span style='font-weight:500;'>DNI del usuario:</span> $cita_dni</p>
                                <p><span style='font-weight:500;'>fecha nacimiento del usuario:</span> $cita_fecha_nacimiento</p>
                                <p><span style='font-weight:500;'>Mensaje:</span><br /> $cita_mensaje</p>
                                $suscrito
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table></center>
        EOT;

                $suscrito = !empty($suscrito) ? '<p>Has ha dado tu consentimiento para para recibir información comercial y promociones.</p>' : '';
                $body_user = <<<EOT
        <center><table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: #ffffff;color: #000000;'>
            <tr>
                <td align='center' valign='top' style='mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                        <tr>
                            <td align='left' valign='top' style='font-family: Open Sans, Arial, sans-serif;font-weight:300;font-size:20px;line-height:1.2;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                <p>Hola $cita_name.</p>
                                <p>Este correo electrónico es una confirmación de recepción del siguiente mensaje:<br /><br /> $cita_mensaje</p>
                                <p>$web_title ha recibido su mensaje satisfactoriamente. Su petición será procesada y respondida en la mayor brevedad posible.<br>
                                $suscrito
                                Gracias por confiar en nosotros.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table></center>
        EOT;

		$email->Subject = 'Cita';
		$email->Body = header_mail().$body_admin.footer_mail();
		$email->AltBody = strip_tags($body_admin);

		$email->addAddress("citas@sjdsevilla.com", $web_title);
		// $email->addAddress("lukas@dssnetwork.es", $web_title);

		$send_res = send_email($email);
		if ($send_res !== true) {
			$cita_errores[] = $send_res;
		}

		if (!$cita_errores) {
			$email->ClearAllRecipients();
			$email->Body = header_mail().$body_user.footer_mail();
			$email->AltBody = strip_tags($body_user);

			$email->addAddress($cita_mail, $cita_name);

			$send_res = send_email($email);
			if ($send_res !== true) {
				$cita_errores[] = $send_res;
			} else {
				$enviado = "Mensaje enviado correctamente. Gracias por contactar con nosotros.";
				unset($_POST['cita_name']);
				unset($_POST['cita_apellido']);
				unset($_POST['cita_dni']);
				unset($_POST['cita_mail']);
				unset($_POST['cita_telefono']);
				unset($_POST['cita_fecha_nacimiento']);
				unset($_POST['cita_mensaje']);
			}
		}
	}
}
?>