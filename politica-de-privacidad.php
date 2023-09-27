<?php $base_dir = dirname(__FILE__);
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";
?> 
<main class="container">
	<section class="estaticos">
		<?php $web = $_SERVER['HTTP_HOST'];?>
		<h1>Política de privacidad</h1>
		<p><?= $conf_empresa;?> (en adelante <?= $conf_alias;?>) es titular del sitio web <a target="_blank" href="<?= $https ? "https" : "http";?>://<?= $web;?>"><?= $web;?></a> (en adelante, “el sitio web”). La utilización de la página web le atribuye la condición de usuario de la misma (en adelante, “el usuario”) e implica la aceptación plena y sin reservas de todas y cada una de las disposiciones incluidas en la presente política de privacidad así como de los documentos de carácter legal disponibles en la página web de <?= $conf_alias;?>.</p>
		<p>En <?= $conf_alias;?> tenemos el máximo interés en proteger la seguridad así como en garantizar y proteger los datos de carácter personal que pudieran ser recabados y tratados a través del sitio web, informándole, a través de la presente política de privacidad acerca del tratamiento que hacemos de los mismos.</p>
		<p><?= $conf_alias;?> se reserva el derecho a modificar la presente política de privacidad para adecuarla a las novedades legales o jurisprudenciales así como a cualesquiera modificaciones que pudieran introducirse en el sitio web. En dichos supuestos los cambios introducidos serán anunciados en esta página con razonable antelación a su puesta en práctica o comunicados por medios fehacientes a los usuarios registrados. La utilización de nuestros servicios una vez comunicado este cambio implicará la aceptación de los mismos.</p>
		<h3>Legislación aplicable</h3>
		<p>La presente página web cumple en el tratamiento de los datos personales de sus usuarios con la legislación vigente en España y en la Unión Europea, en particular, con la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (en lo sucesivo, la LOPD”) y su legislación de desarrollo. Para ello, adopta las medidas técnicas y organizativas necesarias para evitar la pérdida, mal uso, alteración, acceso no autorizado y robo de los datos personales facilitados, habida cuenta del estado de la tecnología, la naturaleza de los datos y los riesgos a los que están expuestos.</p>
		<h3>Seguridad</h3>
		<p>Le comunicamos que, en relación con el tratamiento de datos personales de nuestros usuarios, han sido adoptados los niveles de seguridad exigidos por el Real Decreto 1720/2007, de 21 de diciembre, por el que se aprueba el Reglamento de desarrollo de la LOPD. Además, <?= $conf_alias;?> procura instalar cualesquiera otros medios y medidas técnicas adicionales para evitar la pérdida, mal uso, alteración, acceso no autorizado o robo de los datos personales facilitados.</p>
		<h3>Recogida de datos</h3>
		<p><?= $conf_alias;?> le informa que los datos personales que nos sean proporcionados por los usuarios a través de los formularios dispuestos a tal efecto en el sitio web, van a ser integrados en ficheros automatizados de conformidad con lo dispuesto en la LOPD, que se encuentra debidamente registrado ante la Agencia Española de Protección de Datos.</p>
		<p><?= $conf_alias;?> no cederá los datos personales de los usuarios a terceros sin solicitarles su consentimiento previamente e informarle de la finalidad de dicha cesión, salvo que tal comunicación de datos sea necesaria para prestar el servicio solicitado o así lo estableciera la Ley.</p>
		<h3>Comunicaciones</h3>
		<p><?= $conf_alias;?> se comunicará con el usuario a través de correos electrónicos a la dirección de e-mail proporcionada por éste en el correspondiente formulario, en aquellos casos en los que sea preciso con motivo de la correcta prestación del servicio. El usuario podrá ejercer su derecho de oposición a la recepción de dichos correos electrónicos mediante el envío de la correspondiente solicitud a <a target="_blank" href="mailto:<?= $conf_mail;?>"><?= $conf_mail;?></a></p>
		<h3>Direcciones IP y cookies</h3>
		<p>Debido a los protocolos de comunicación existentes en Internet, cuando el usuario visita la página web, TFM recibe automáticamente la dirección IP (Internet Protocol) que le ha sido asignada a su ordenador por su Proveedor de Acceso. El registro de dicha dirección IP sirve sólo para fines exclusivamente internos, como son las estadísticas de acceso a este sitio web. Como regla general, la dirección IP para un mismo usuario es distinta de una conexión a Internet a otra, con lo que no es posible rastrear los hábitos de navegación de un determinado usuario a través del sitio web.</p>
		<p><?= $conf_alias;?> puede utilizar cookies cuando un usuario navega por la página web. Las cookies que se pudieran utilizar en la web se asocian únicamente con el navegador de un ordenador determinado (un usuario anónimo), y no proporcionan por sí mismas ningún dato personal del usuario. En cualquier caso, el usuario dispone de esta información de forma ampliada en la Política de Cookies.</p>
		<h3>Links</h3>
		<p>Esta web contiene enlaces o links a otras páginas web. El usuario debe ser consciente de que <?= $conf_alias;?> no es responsable de las prácticas de privacidad ni de los contenidos de esas otras webs. Recomendamos a los usuarios que sean conscientes de que al utilizar uno de estos links están abandonando nuestra web y que es necesario leer detenidamente las políticas de privacidad de esas otras webs que recaben datos personales.</p>
		<p>La presente política de privacidad sólo se aplica a los datos personales recabados a través de <a target="_blank" href="https://<?= $web;?>"><?= $web;?></a>.</p>
		<h3>Modificación y cancelación de datos</h3>
		<p>Si el usuario desea ejercer sus derechos de acceso, rectificación, oposición o cancelación, puede dirigirse al responsable del fichero <?= $conf_empresa;?>, a través de la siguiente dirección de correo electrónico: <a target="_blank" href="mailto:<?= $conf_mail;?>"><?= $conf_mail;?></a> o por medio de correo postal a la siguiente dirección: <?= $conf_direccion_bajas;?>.</p>
	</section>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?> 