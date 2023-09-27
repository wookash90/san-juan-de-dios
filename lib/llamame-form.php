<?php if (!empty($_POST["send_llamame"]) && $_POST["send_llamame"] == date('dHm')) {
	$llamame_telefono = !empty($_POST["llamame_telefono"]) ? $_POST['llamame_telefono'] : '';
	$llamame_errores = [];

	if (!$llamame_telefono) {
		$llamame_errores[] = "Su teléfono es obligatorio, por favor vuelva a intentarlo.";
	}

	// NORMAL
	if (!$llamame_errores) {
		require_once "$base_dir/lib/mail.php";
		$email = ini_email();

		$body_admin = <<<EOT
<center><table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background: #ffffff;color: #000000;'>
	<tr>
		<td align='center' valign='top' style='mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
			<table border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
				<tr>
					<td align='left' valign='top' style='font-family: Open Sans, Arial, sans-serif;font-weight:300;font-size:20px;line-height:1.2;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                        <p>Nueva petición para contactar por teléfono.</p>
						<p><span style='font-weight:500;'>Teléfono del usuario:</span> $llamame_telefono</p>
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

		$email->addAddress('citas@sjdsevilla.com', $web_title);

		$send_res = send_email($email);
		if ($send_res !== true) {
			$llamame_errores[] = $send_res;
		} else {
            $llamame_enviado = "Su petición ha sido almacenada. En breve nos podremos en contacto.";
            unset($_POST['llamame_telefono']);
		}
	}
} ?>
<div class="d-flex justify-content-center">
    <div class="row align-items-center w-100">
        <div class="col-12 gx-0">		
            <?php if (!empty($llamame_errores)) echo "<div class='error-message'>".implode('<br />', $llamame_errores)."</div>";
            else if (!empty($llamame_enviado)) echo "<div class='success-message'>".$llamame_enviado."</div>"; ?>
            <form action="./<?= substr($url, 0, -4);?>#form_llamame" method="post" id="form_llamame" class="text-left">
                <input type="hidden" name="send_llamame" value="<?= date('dHm');?>" />
                <div class="row g-0">
                    <div class="col-12 col-lg-7">
                        <div class="input dinamic_label mt-4 mt-md-0">
                            <input id="llamame_telefono" type="tel" name="llamame_telefono" placeholder="Introduce tu número de teléfono" value="<?= !empty($_POST['llamame_telefono']) ? $_POST['llamame_telefono'] : '';?>" class="form-control"  required />
                            <label for="llamame_telefono">Teléfono</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-3 pt-3 mt-md-0 order-3 order-md-2 mx-lg-2">
                        <button type="submit" class="btn primary-btn movil-azul-btn">Llámame</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>