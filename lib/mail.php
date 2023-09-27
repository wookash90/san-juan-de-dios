<?php require_once $base_dir.'/vendor/autoload.php';

/*
//Recipients
$email->setFrom('soporte@dssnetwork.es', $web_title);
$email->addAddress('joe@example.net', 'Joe User');
$email->addAddress('ellen@example.com');
$email->addReplyTo('info@example.com', 'Information');
$email->addCC('cc@example.com');
$email->addBCC('bcc@example.com');

//Attachments
$email->addAttachment('/tmp/image.jpg', 'new.jpg');

//Content
$email->Subject = 'Here is the subject';
$email->Body    = 'This is the HTML message body <b>in bold!</b>';
$email->AltBody = 'This is the body in plain text for non-HTML mail clients';
*/
$mail_from = 'info@sjdsevilla.com';

function ini_email() {
	global $mail_from, $web_title, $conf_mail, $produccion;
	
	$email = new PHPMailer\PHPMailer\PHPMailer(true);
	$email->SMTPDebug = !empty($produccion) ? 0 : 3;
	$email->isSMTP();
	$email->Host = 'sjdsevilla.com';
	$email->SMTPAuth = true;
	$email->Username = 'postmaster@sjdsevilla.com';
	$email->Password = 'sjdSevilla@2022';
	$email->SMTPSecure = 'tls';
	$email->Port = 587;
	/* BUZONES CON SSL
	$email->SMTPOptions = [
		'ssl' => [
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		]
	];*/
	$email->CharSet = 'UTF-8';
	$email->isHTML(true);

	$email->setFrom($mail_from, $web_title);
	if ($conf_mail != $mail_from) $email->addReplyTo($conf_mail, $web_title);

	return $email;
}

function send_email($email) {
	try {
		$email->send();
		return true;
	} catch (PHPMailer\PHPMailer\Exception $e) {
		return $email->ErrorInfo;
	}
}

function header_mail() {
	global $base_url, $web_title, $theme_color;
	
	$web = (isset($_SERVER['HTTPS']) ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$base_url;
	$bg_color = "#ffffff";
	$text_color = "#000000";
	$border_color = $theme_color;
	return <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contacto. $web_title</title>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100% !important;width: 100% !important;">
	<center><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: $bg_color;color: $text_color;border-top:20px solid $border_color; font-family:Arial,sans-serif;">
		<tr>
			<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
				<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
					<tr>
						<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
							<br /><br /><a href="$web"><img src="$web/files/img/logo.svg" alt="$web_title" border="0" width="250" /></a><br /><br />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table></center>
	<br /><br />
EOT;
}

function footer_mail() {
	global $base_url, $conf_mail, $web_title, $theme_color;
	
	$web = (isset($_SERVER['HTTPS']) ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$base_url;
	$bg_color = $theme_color;
	$text_color = "#ffffff";
	$anyo = date('Y');
	return <<<EOT
<br /><br /><br />
<center><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: $bg_color; color:$text_color;">
	<tr>
		<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust:100%;">
			<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%; text-align:center;">
				<tr style="height: 20px"></tr>
				<tr>
					<td align="left">&copy; $anyo - Todos los derechos reservados</td>
					<td align="right"><a style="color: $text_color;text-decoration:none;" href="mailto:$conf_mail">$conf_mail</a></td>
				</tr>
				<tr style="height: 20px"></tr>
			</table>
		</td>
	</tr>
</table></center>
</body>
</html>
EOT;
}