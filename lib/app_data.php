<?php if (!isset($_SESSION)) session_start();

$produccion = true;

//Conf vars
$base_url = ''; // Sin barra final
$seconds_to_cache = $produccion ? 3600 * 24 : 0;
$https = true;
$login_required = false;
$public_urls = [
	'index.php',
	'login.php', 'logout.php', 'recuperar-clave.php',
	'suscribete.php', 'contacto.php',
	'aviso-legal.php', 'politicas-de-uso.php'
];
$web_title = !empty($web_title) ? "$web_title - Hospital San Juan de Dios" : 'Hospital San Juan de Dios';
$web_desc = "";
$web_author = 'DSS Network';
$theme_color = '#009cd9';
$idioma = 'es';
$localizacion = 'es_ES';
$app_recaptcha_type = 'invisible'; //'invisible' or 'robot' or null
$web_geo = [
	'region' => 'ES-SE',
	'location' => 'La Puebla de Cazalla',
	'lat' => 37.221776,
	'lng' => -5.314951
];
date_default_timezone_set("Europe/Madrid");

$selected_lang = !empty($_GET['lang']) ? $_GET['lang'] : (!empty($_SESSION['lang']) ? $_SESSION['lang'] : 'es_ES');
if ($selected_lang == 'zh_CN') $idioma = 'ch';
else if ($selected_lang == 'fr_FR') $idioma = 'fr';
else if ($selected_lang == 'it_IT') $idioma = 'it';
else if (in_array($selected_lang, ['en_EN', 'en_US'])) $idioma = 'en';
else $idioma = 'es';
$_SESSION['lang'] = $selected_lang;
$localizacion = $selected_lang;
setlocale(LC_ALL, $selected_lang);
// @ sudo locale-gen ru_RU | @ sudo locale-gen ru_RU.UTF-8 | @ sudo update-locale

//Conf legal
$conf_empresa = "Hospital San Juan de Dios de Sevilla";
$conf_alias = "Hospital SJD";
$conf_titular = "ORDEN HOSPITALARIA SAN JUAN DE DIOS PROVINCIA BÉTICA, CURIA PROVINCIAL";
$conf_mail = "info@sjdsevilla.com";
// $conf_mail = "lukas@dssnetwork.es";
//$conf_mail = "r.lopez@dssnetwork.es";
$conf_cif = "R2800009I";
$conf_telefono = "+34 954 939 300"; // Con id de pais y espacios. En links -> str_replace($conf_telefono, ' ', '')
$conf_direccion = "Avenida Eduardo Dato 42, 41005 Sevilla";
$conf_direccion_bajas = "Avenida Eduardo Dato 42, 41005 Sevilla";

// Google Maps API key
$app_g_maps_key = 'AIzaSyAa1qayiJe2rgSh2R1dms83l3GxYnkssd0';

// Google Recaptcha API key
$app_recaptcha = [
	'robot' => [
		'site_key' => '6LelfTgUAAAAAFWB1bOhY91iIDgb2fm49IgW6hgj',
		'secret_key' => '6LelfTgUAAAAAKC7rotJZw42hWO7HKa9ipbMGaYx'
	],
	'invisible' => [
		'site_key' => '6LcPYdEZAAAAAM-BL3zbNWiRR_13JbYzozTDVbA6',
		'secret_key' => '6LcPYdEZAAAAAGTCD2VRgQvH_0kKxIoi6ahVFg_h'
	],
	'v3' => [
		'site_key' => '6LeVvskUAAAAAAEut0Y1pY64MUYL9dhidMxy40xV',
		'secret_key' => '6LeVvskUAAAAAKEmWvE6SFjsOgcz8Y3EYNHxD2r6'
	]
];

$rrss = [
	'facebook' => [
		'title' => 'SJD Facebook',
		'url' => 'https://www.facebook.com/hospitalsanjuandediossevilla',
		'icon' => 'files/img/SVG/facebook.svg'
	],
	'instagram' => [
		'title' => 'SJD Instagram',
		'url' => 'https://www.instagram.com/hospital_sjd_sevilla',
		'icon' => 'files/img/SVG/insta.svg'
	]
];

$doctores = [
	'antonio-hachero' => (object) [
		'title' => 'Dr. Antonio Hachero',
		'especialidades' => ['unidad-del-dolor-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'domingo-ventura' => (object) [
		'title' => 'Dr. Domingo Ventura',
		'especialidades' => ['unidad-del-dolor-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'marta-raya' => (object) [
		'title' => 'Dra. Marta Raya',
		'especialidades' => ['cirugia-vascular-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'andres-garcia-leon' => (object) [
		'title' => 'Dr. Andrés García León',
		'especialidades' => ['unidad-del-dolor-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'fernando-nebrera-navarro' => (object) [
		'title' => 'Dr. Fernando Nebrera Navarro',
		'especialidades' => ['medicina-interna-sevilla'],
		'intro' => 'Jefe de equipo de medicina interna',
		'img_main' => '/files/img/doctores/NEBRERA-NAVARRO-FERNANDO.jpeg',
		'img_min' => '/files/img/doctores/NEBRERA-NAVARRO-FERNANDO.jpeg',
		'anyos' => '20',
		'body' => '<p>El doctor Fernando Nebrera Navarro es licenciado en Medicina y Cirugía por la Universidad de Sevilla desde el año 2004, especializándose en Medicina Interna en Granada en el año 2010. Está colegiado en Sevilla, además de estar afiliado a la Sociedad Española de Medicina Interna (SEMI) y la Sociedad Andaluza de Enfermedades Infecciosas (SAEI).</p>
        			<p>Realizó el periodo MIR en el Hospital Virgen de las Nieves de Granada, desde mayo de 2005 a mayo de 2010 que coordinó con el Servicio de Enfermedades Infecciosas, sección de Enfermedades Tropicales y Patología del Inmigrante, en el Hospital Ramón y Cajal de Madrid durante los meses de octubre y diciembre de 2009.</p>
					<p>Como actividad docente podemos destacar la tutela de MIR y estudiantes de medicina, locales, nacionales y extranjeros durante los años 2006-2010 y la tutorización de médicos MIR en el Hospital de Alarcón en el área formativa ecografía clínica. También ha sido organizador del I del Ciclo de Sesiones de Actualización para médicos y enfermeros del Hospital de Formentera. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Atención clínica del paciente sin diagnóstico preciso.</li>
                    <li class="h3 mt-3">Atención a las personas de edad avanzada en situación de enfermedad aguda</li>
                    <li class="h3 mt-3">Atención médica de pacientes quirúrgicos.</li>
                    <li class="h3 mt-3">Atención clínica de enfermos en la fase paliativa de la enfermedad.</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'ruiz-moya' => (object) [
		'title' => 'Dr. Ruiz Moya',
		'especialidades' => ['cirugia-plastica-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/dr-ruiz-moya-san-juan-de-dios-sevilla.jpg',
		'img_min' => '/files/img/doctores/dr-ruiz-moya-san-juan-de-dios-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'fernando-julio-barrera-pulido' => (object) [
		'title' => 'Dr. Fernando Julio Barrera Pulido',
		'especialidades' => ['cirugia-plastica-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/dr-fernando-julio-barrera-san-juan-dios-sevilla.jpg',
		'img_min' => '/files/img/doctores/dr-fernando-julio-barrera-san-juan-dios-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'aliseda-perez-sutilo' => (object) [
		'title' => 'Dra. Aliseda Pérez Sutilo',
		'especialidades' => ['cirugia-plastica-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'araceli-lagares-borrego' => (object) [
		'title' => 'Dra. Araceli Lagares Borrego',
		'especialidades' => ['cirugia-plastica-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/araceli-lagares-cirugia-plastica-san-juan-dios.jpg',
		'img_min' => '/files/img/doctores/araceli-lagares-cirugia-plastica-san-juan-dios.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],

	'ramon-ruiz-mesa' => (object) [
		'title' => 'Dr. Ramón Ruiz Mesa ',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Jefe de equipo de oftalmología',
		'img_main' => '/files/img/doctores/Ramon-Ruiz-Mesa-Oftalmologia.jpg',
		'img_min' => '/files/img/doctores/Ramon-Ruiz-Mesa-Oftalmologia.jpg',
		'anyos' => '28',
		'body' => '<p>El Dr. Ramón Ruiz Mesa, es Licenciado en Medicina y Cirugía por la Universidad de Granada desde el año 1991. Se especializó en Oftalmología en el Hospital del SAS de Jerez de la Frontera y posteriormente complementó su formación en Madrid, Sevilla y Londres.</p>
        			<p>Su actividad investigadora se ha desarrollado principalmente en el implante de lentes intraoculares de última generación, participando en numerosos estudios premarket y trials con las principales compañías del sector oftalmológico como son Alcon, Abbott, Physiol, Ophtec.</p>
					<p>Autor de más de dos libros como autor principal de temática de cirugía faco refractiva, además ha colaborado en más de 10 capítulos de diferentes libros relacionados con la misma materia. Ha participado en más de 200 comunicaciones en conferencias en congresos nacionales e internacionales.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Corrección de la miopía</li>
                    <li class="h3 mt-3">Corrección de la hipermetropía</li>
                    <li class="h3 mt-3">Corrección del astigmatismo</li>
                    <li class="h3 mt-3">Tratamiento quirúrgico de la catarata</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'jaime-ruiz-clemente' => (object) [
		'title' => 'Dr. Jaime Ruiz Clemente',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Jefe de equipo de otorrinolaringología',
		'img_main' => '/files/img/doctores/jaime-ruiz-clemente-otorrino.jpg',
		'img_min' => '/files/img/doctores/jaime-ruiz-clemente-otorrino.jpg',
		'anyos' => '20',
		'body' => '<p>El doctor Jaime Ruiz Clemente es licenciado en Medicina y Cirugía por la Universidad de Córdoba y realizó la especialidad vía MIR de Otorrinolaringología y patología cérvico-facial en el Hospital Universitario Virgen Macarena de Sevilla.</p>
        			<p>Tras finalizar su periodo formativo comenzó a trabajar como facultativo especialista en el servicio de otorrinolaringología del hospital San Juan de Dios del Aljarafe (Bormujos-Sevilla), desarrollando funciones asistenciales en el ámbito de la otorrinolaringología general, pero fundamentalmente en los ámbitos de la cirugía otológica, la cirugía endoscópica nasosinusal, la cirugía de glándulas salivales y la patología quirúrgica de la vía lagrimal, del cual formó parte de la unidad de patología quirúrgica de la vía lagrimal.</p>
					<p>También ha realizado cursos de doctorado en el departamento de Cirugía en la Facultad de Medicina de la Universidad de Sevilla, entre 2000 y 2003 en materia de ‘Investigación en patología y cirugía otorrinolaringológica’.</p>
					<p>Ha sido ponente en el curso de instrucción titulado “Enfermedad por reflujo gastroesofágico atípica manifestaciones ORL” en el LV Congreso Nacional de la SEORL de San Sebastián.</p>
					<p>En su continuo interés por la especialidad médica que ejerce, Jaime Ruiz Clemente viene asistiendo a numerosos congresos y cursos de formación en los ámbitos de la cirugía otológica, la cirugía endoscópica nasosinusal, la cirugía cervical y de glándulas salivales.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Tratamiento del vértigo</li>
                    <li class="h3 mt-3">Hipoacusia</li>
                    <li class="h3 mt-3">Disfonía</li>
                    <li class="h3 mt-3">Otitis</li>
					<li class="h3 mt-3">Pólipos nasales</li>
					<li class="h3 mt-3">Sinusitis</li>
					<li class="h3 mt-3">Acúfenos</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'adrian-martinez' => (object) [
		'title' => 'Dr. Adrián Martínez',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/adrian-lopez.jpeg',
		'img_min' => '/files/img/doctores/adrian-lopez.jpeg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'juan-carlos-vargas-perez' => (object) [
		'title' => 'Dr. Juan Carlos Vargas Pérez',
		'especialidades' => ['pediatria-sevilla'],
		'intro' => 'Jefe de equipo de pediatría',
		'img_main' => '/files/img/doctores/Juan-Carlos-Vargas-Perez.jpeg',
		'img_min' => '/files/img/doctores/Juan-Carlos-Vargas-Perez.jpeg',
		'anyos' => '16',
		'body' => '<p class="open-sans-reg">El Dr. Juan Carlos Vargas Pérez, es Licenciado en Medicina por la Universidad de Buenos Aires en 2003 y finalizó su formación como Especialista en Pediatría en el Hospital La Fe de Valencia en 2008, para afianzarse posteriormente como profesional en Andalucía.</p>
					<p class="open-sans-reg">Cuenta con catorce años de carrera profesional, con experiencia laboral en distintos centros sanitarios de Andalucía (Servicio de Pediatría del Hospital Comarcal La Merced de Osuna, Instituto Hispalense de Pediatría, Hospital QuironSalud de Sevilla, Servicio de Cuidados Críticos y Urgencias del Hospital San Juan de Dios del Aljarafe) respaldan su amplia trayectoria. Desde hace más de 5 años, forma parte de nuestra Orden Hospitalaria San Juan de Dios Sevilla, destacando su compromiso con la sociedad y los más pequeños.</p>
					<p class="open-sans-reg">Dentro de su amplia formación profesional:</p>
					<ul class="open-sans-reg">
					<li class="mt-2">Máster en Pediatría de Atención Primaria (Universidad Complutense de Madrid). 2021</li>
					<li class="mt-2">Experto en Infectología Pediátrica Básica (Universidad Rey Juan Carlos). 2018</li>
					<li class="mt-2">Máster Universitario en Urgencias Pediátricas (Universidad Católica de Valencia San Vicente Mártir). 2017</li>
					<li class="mt-2">Experto Universitario en Urgencias Pediátricas (Universidad Católica de Valencia San Vicente Mártir). 2016</li>
					<li class="mt-2">MEDICO PUERICULTOR (Acreditado por Real e Ilustre Colegio Oficial de Médicos de Madrid). 2009</li>
					</ul>
					',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
					<ul class="open-sans-reg primary-font-blue mt-5">
					<li class="h3 mt-3">Consulta de Revisión de salud (programa de control de salud de niño sano).</li>
					<li class="h3 mt-3">Consulta de patología banal no urgente a demanda.</li>
					<li class="h3 mt-3">Consulta pediátrica administrativa: certificados médicos para la escolarización o ingreso a guardería, para comedores escolares en caso de alergia alimenticia, y en la dispensación de recetas.</li>
					<li class="h3 mt-3">Atención en Urgencias pediátricas.</li>
					</ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'pedro-morales-sanchez' => (object) [
		'title' => 'Dr. Pedro Morales Sánchez',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Jefe de equipo de traumatología',
		'img_main' => '/files/img/doctores/pedro-morales.jpeg',
		'img_min' => '/files/img/doctores/pedro-morales.jpeg',
		'anyos' => '19',
		'body' => '<p>Pedro Morales Sánchez es licenciado en medicina y cirugía por la Universidad de Sevilla, especializándose en cirugía ortopédica y traumatología. Ha desarrollado su actividad profesional en relación con la articulación de rodilla y cadera, así como su tratamiento y su estudio. </p>
        			<p>Posee diferentes formaciones entre las que destaca un fellowship en EEUU, en el Children´s Hospital de Iowa y en Toronto, Canadá, en el Hospital for Sick Children.</p>
					<p>Entre 2005 y 2015 ha trabajado en el Hospital Juan Ramón Jiménez. Ha realizado sus prácticas hospitalarias en dicho hospital y una vez terminada la especialidad, continuó trabajando como cirujano ortopédico en la unidad de cadera y ortopedia pediátrica. Durante los años 2010 y 2014 ha realizado numerosas cirugías protésicas de rodilla y cadera, artroscopias de rodilla y cadera, además de numerosas cirugías de revisión de prótesis de cadera y cirugías ortopédicas pediátricas.</p>
					<p>Desde 2016 forma parte del Departamento de Cirugía Ortopédica y Traumatología en la Clinique des Grainetières, Saint Amand Montrond, Francia. Forma parte de la SATO, Sociedad Andaluza de Traumatología y Ortopedia y de la SECOT, Sociedad Española de Traumatología y Ortopedia. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Cirugía protésica</li>
                    <li class="h3 mt-3">Cirugía artroscópica</li>
                    <li class="h3 mt-3">Cirugía de preservación ósea de la cadera</li>
                    <li class="h3 mt-3">Cirugía de cadera</li>
					<li class="h3 mt-3">Cirugía de rodilla</li>
					<li class="h3 mt-3">Artroscopia</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'boris-garcia-benitez' => (object) [
		'title' => 'Dr. Boris García Benitez',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Jefe de equipo de traumatología',
		'img_main' => '/files/img/doctores/boris-garcia.jpeg',
		'img_min' => '/files/img/doctores/boris-garcia.jpeg',
		'anyos' => '19',
		'body' => '<p>El doctor Boris García Benitez, nacido en Sevilla, es licenciado en medicina y cirugía por la Universidad de Sevilla y se especializó en cirugía ortopédica y traumatología.</p>
        			<p>Se ha dedicado desde hace más de 10 años a la patología de cadera y rodilla, tanto en la cirugía protésica como en la artroscopia y actualmente es un referente a nivel nacional tanto en las operaciones tanto de rodilla como de cadera.</p>
					<p>Ha realizado más de 132 comunicaciones orales tanto en congresos nacionales como internacionales. También ha participado en más de 260 comunicaciones tipo póster en diferentes congresos a nivel mundial.</p>
					<p>Ha realizado más de 132 comunicaciones orales tanto en congresos nacionales como internacionales. También ha participado en más de 260 comunicaciones tipo póster en diferentes congresos a nivel mundial.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Cirugía protésica</li>
                    <li class="h3 mt-3">Cirugía artroscópica</li>
                    <li class="h3 mt-3">Cirugía de preservación ósea de la cadera</li>
                    <li class="h3 mt-3">Cirugía de cadera</li>
					<li class="h3 mt-3">Cirugía de rodilla</li>
					<li class="h3 mt-3">Artroscopia</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'alejandro-berlanga-porras' => (object) [
		'title' => 'Dr. Alejandro Berlanga Porras',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Alejandro-Berlanga-Porras-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Alejandro-Berlanga-Porras-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-ramon-contreras-rubio' => (object) [
		'title' => 'Dr. José Ramón Contreras Rubio',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-Ramon-Contreras-Rubio-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Jose-Ramon-Contreras-Rubio-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-manuel-gallo-ayala' => (object) [
		'title' => 'Dr. José Manuel Gallo Ayala ',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-Manuel-Gallo-Ayala-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Jose-Manuel-Gallo-Ayala-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	/*'alfonso-gonzalez-diaz' => (object) [
		'title' => 'Dr. Alfonso González Díaz',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Alfonso-Gonzalez-Diaz-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Alfonso-Gonzalez-Diaz-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'cristina-jimenez-carrasco' => (object) [
		'title' => 'Dra. Cristina Jiménez Carrasco',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Cristina-Jimenez-Carrasco-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Cristina-Jimenez-Carrasco-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	], */
	'lorena-rial-valverde' => (object) [
		'title' => 'Dra. Lorena Rial Valverde',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Lorena-Rial-Valverde-traumatologia.jpg',
		'img_min' => '/files/img/doctores/Lorena-Rial-Valverde-traumatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'miguel-sanchez-dalp-jimenez' => (object) [
		'title' => 'Dr. Miguel Sánchez-Dalp Jiménez',
		'especialidades' => ['medicina-interna-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Miguel-Sanchez-Dalp-Jimenez-medicina-interna.jpg',
		'img_min' => '/files/img/doctores/Miguel-Sanchez-Dalp-Jimenez-medicina-interna.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	/* 'miguel-angel-diaz-del-rio' => (object) [
		'title' => 'Dr. Miguel Ángel Díaz Del Río',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Miguel-angel-diaz-del-rio-oftalmologia.jpg',
		'img_min' => '/files/img/doctores/Miguel-angel-diaz-del-rio-oftalmologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'adrian-hernandez-martinez' => (object) [
		'title' => 'Dr. Adrián Hernández Martínez',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/adrian-hernandez-martinez-oftalmologia.jpg',
		'img_min' => '/files/img/doctores/adrian-hernandez-martinez-oftalmologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	], */
	'pilar-llavero-valero' => (object) [
		'title' => 'Dra. Pilar Llavero Valero',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/pilar-llavero-valero-oftalmologia.jpg',
		'img_min' => '/files/img/doctores/pilar-llavero-valero-oftalmologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-amparo-alvarez-toledo-juete' => (object) [
		'title' => 'Dra. María Amparo Álvarez de Toledo Jeute',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Maria-Amparo Alvarez-de-Toledo-Jeute-otorrinolaringologia .jpg',
		'img_min' => '/files/img/doctores/Maria-Amparo Alvarez-de-Toledo-Jeute-otorrinolaringologia .jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-pilar-gomez-tapiador' => (object) [
		'title' => 'Dra. María del Pilar Gómez Tapiador',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Maria-del-Pilar-Gomez-Tapiador-otorrino.jpg',
		'img_min' => '/files/img/doctores/Maria-del-Pilar-Gomez-Tapiador-otorrino.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-josefa-hervas-nunez' => (object) [
		'title' => 'Dra. María Josefa Hervás Núñez',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Maria-Josefa-Hervas-Nunez-otorrino.jpg',
		'img_min' => '/files/img/doctores/Maria-Josefa-Hervas-Nunez-otorrino.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-antonio-ibanez-rodriguez' => (object) [
		'title' => 'Dr. Juan Antonio Ibáñez Rodríguez',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Juan-Antonio-Ibanez-Rodriguez-otorrino.jpg',
		'img_min' => '/files/img/doctores/Juan-Antonio-Ibanez-Rodriguez-otorrino.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'mariano-carmelo-ruiz-borrell' => (object) [
		'title' => 'Dr. Mariano Carmelo Ruiz Borrell',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Jefe de equipo de cardiología',
		'img_main' => '/files/img/doctores/mariano-carmelo-ruiz-borrell-cardiologia.jpg',
		'img_min' => '/files/img/doctores/mariano-carmelo-ruiz-borrell-cardiologia.jpg',
		'anyos' => '28',
		'body' => '<p>El Dr. Mariano Ruiz Borrel estudió la especialidad de Cardiología vía MIR en el año 1995, al igual que su residencia, que la realiza en el Hospital Universitario Virgen del Rocío desde el año 1991 al año 1995. </p>
					<p>Desde mayo de 2003 hasta la actualidad ejerce en el Hospital San Juan de Dios Aljarafe y desde el año 2007 es coordinador de la especialidad de Cardiología en dicho hospital.  </p>
					<p>Además ha sido vocal ejecutivo de la Sociedad Andaluza de Cardiología durante los años 2001 a 2003 y durante los años 2010 a 2012 y presidente del XLVII Congreso de la Sociedad Andaluza de Cardiología en mayo de 2011. </p>
        			<p>Ha asistido a numerosos congresos de cardiología tanto regionales, nacionales e internacionales durante la actividad como residente así como reuniones y simposium de interés científico y formativo en cardiología. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Infartos</li>
                    <li class="h3 mt-3">Hipertensión arterial</li>
                    <li class="h3 mt-3">Arritmias</li>
					<li class="h3 mt-3">Hipertensión arterial</li>
					<li class="h3 mt-3">Rehabilitación cardiaca</li>
                    <li class="h3 mt-3">Ecocardiografía</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'fatima-jurado-palma' => (object) [
		'title' => 'Dra. Fátima Jurado Palma',
		'especialidades' => ['alergologo-sevilla'],
		'intro' => 'Jefa de equipo de alergología',
		'img_main' => '/files/img/doctores/fatma-jurado-palma-alergologia.jpg',
		'img_min' => '/files/img/doctores/fatma-jurado-palma-alergologia.jpg',
		'anyos' => '12',
		'body' => '<p>La Dra. Fátima Jurado Palma es Licenciada en Medicina y Cirugía por la 
					Universidad de Sevilla en el año 2006. Se formó como especialista en 
					Alergología e Inmunología Clínica en los años 2007-2011, en el Hospital 
					Universitario Virgen Macarena de Sevilla. 
					</p>
					<p>Durante el año 2007 realizó los cursos de Doctorado por el Departamento de 
					Cirugía de la Universidad de Sevilla, y posteriormente obtiene el Diploma de 
					Estudios Avanzados con el título “ Reacciones alérgicas durante la 
					anestesia” en el año 2010, ambos con la calificación de Sobresaliente. 
					</p>
					<p>Posee el título del Máster en Metodología de investigación en Ciencias de la 
					Salud por la Universidad de Huelva (Año 2012) y el título de Experto 
					Universitario en Trastornos Funcionales Digestivos y Alergia Alimentaria 
					Pediátrica (año 2019). 
					</p>
					<p>Se formó durante su residencia en provocaciones y desensibilizaciones con 
					alimentos en niños alérgicos a leche y huevo en el Hospital Infantil 
					Universitario Niño Jesús de Madrid (2010). 
					</p>
					<p>Se ha centrado en los últimos años fundamentalmente en la población 
					pediátrica y estudio de alergias alimentarias.
					</p>
        			<p>Es miembro de la Sociedad Andaluza de Alergología e Inmunología Clínica, 
					de la Sociedad Española de Alergología e Inmunología Clínica así como del 
					Real e Ilustre Colegio Oficial de Médicos de Sevilla.
					</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
					<ul class="open-sans-reg primary-font-blue mt-5">
					<li class="h3 mt-3">Rinitis /rinoconjuntivitis</li>
					<li class="h3 mt-3">Asma de causa alérgica o no alérgicas</li>
					<li class="h3 mt-3">Dermatitis atópicas y de contacto</li>
					<li class="h3 mt-3">Urticarias y Angioedemas</li>
					<li class="h3 mt-3">Alergia a alimentos</li>
					<li class="h3 mt-3">Alergia a medicamentos</li>
					<li class="h3 mt-3">Alergia a venenos de himenópteros e insectos</li>
					</ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'alfonso-manuel-soto-moreno' => (object) [
		'title' => 'Dr. Alfonso Manuel Soto Moreno',
		'especialidades' => ['endocrino-sevilla'],
		'intro' => 'Jefe de equipo de endocrinología',
		'img_main' => '/files/img/doctores/dr-alfonso-soto-moreno.jpg',
		'img_min' => '/files/img/doctores/dr-alfonso-soto-moreno.jpg',
		'anyos' => '27',
		'body' => '<p>El Dr. Alfonso Manuel Soto Moreno es licenciado en medicina por la Universidad de Sevilla desde el año 1996 y cuenta con el MIR desde el año 1997. Tras finalizar su carrera universitaria, se especializó en endocrinología y nutrición debido a su vocación para el trato directo con los pacientes.</p>
        			<p>Su vida laboral se ha desarrollado siempre en el Hospital Virgen del Rocío, en el cual empezó como endocrinólogo de base, y desde el 2012 hasta día de hoy como jefe de servicio de esta especialidad, compaginándolo siempre con la práctica clínica. En el Hospital San Juan de Dios Sevilla, también es jefe de servicio de la especialidad de endocrinología.</p>
					<p>El Dr. Soto, ha participado en más de 20 ensayos clínicos internacionales de nuevas moléculas como investigador principal y en otros tantos como colaborador. En investigación traslacional, la que se realiza en laboratorio, ha gestionado 3 proyectos como investigador principal, los cuales han sido financiados por el Instituto de Salud Carlos III y la Consejería de Salud. Además ha realizado más de 100 publicaciones científicas, 50 de ellas como primer autor y jefe de grupo.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Obesidad</li>
                    <li class="h3 mt-3">Diabetes</li>
                    <li class="h3 mt-3">Problemas tiroideos</li>
                    <li class="h3 mt-3">Trastornos hormonales hipofisarios, ováricos o adrenales</li>
					<li class="h3 mt-3">Programa Peso y Salud </li>
					<li class="h3 mt-3">Consulta endocrinología general</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	// 'eva-maria-venegas-moreno' => (Object) [
	// 	'title' => 'Dra. Eva María Venegas Moreno',
	// 	'especialidades' => ['endocrino-sevilla'],
	// 	'intro' => 'Lorem ',
	// 	'img_main' => '/files/img/doctores/eva-maria-venegas-moreno.jpg',
	// 	'img_min' => '/files/img/doctores/eva-maria-venegas-moreno.jpg',
	// 	'anyos' => '25',
	// 	'body' => '<p>Lorem </p>
	//     			<p>Lorem </p>',
	//	'jefe' => false,
	//	'especialista' => true,
	// ],
	'jose-manuel-infantes-hernandez' => (object) [
		'title' => 'Dr. José Manuel Infantes Hernández',
		'especialidades' => ['digestivo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-Manuel-Infantes-Hernandez.png',
		'img_min' => '/files/img/doctores/Jose-Manuel-Infantes-Hernandez.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'rocio-llorca-fernandez' => (object) [
		'title' => 'Dra. Rocío Llorca Fernández',
		'especialidades' => ['digestivo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/rocio-llorca-fernandez-aparato-digestivo.png',
		'img_min' => '/files/img/doctores/rocio-llorca-fernandez-aparato-digestivo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jesus-rafael-marin-morgado' => (object) [
		'title' => 'Dr. Jesús Rafael Marín Morgado',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'ana-isabel-moya-martin' => (object) [
		'title' => 'Dra. Ana Isabel Moya Martín',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/ana-isabel-moya-martin.jpg',
		'img_min' => '/files/img/doctores/ana-isabel-moya-martin.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'adrian-revello-bustos' => (object) [
		'title' => 'Dr. Adrián Revello Bustos',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'natalia-cobo-gomez' => (object) [
		'title' => 'Dra. Natalia Cobo Gómez',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/natalia-cobo-gomez-cardiologa-sevilla.jpg',
		'img_min' => '/files/img/doctores/natalia-cobo-gomez-cardiologa-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'julia-rodriguez-ortuno' => (object) [
		'title' => 'Dra. Julia Rodríguez Ortuño',
		'especialidades' => ['cardiologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-bernabeu-wittel' => (object) [
		'title' => 'Dr. José Bernabeu Wittel',
		'especialidades' => ['dermatologo-sevilla'],
		'intro' => 'Jefe de equipo de dermatología  ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '18',
		'body' => '<p>El Dr. José Bernabeu Wittel es Licenciado en Medicina y Cirugía, se especializó vía MIR por el Hospital Universitario Virgen del Rocío. Además de su labor asistencial, se ha centrado en la investigación científica, principalmente de la patología dermatológica pediátrica y las anomalías vasculares. </p>
        			<p>Cuenta con más de 50 publicaciones en revistas nacionales e internacionales y es miembro de la Junta Directiva de la Academia Española de Dermatología y Venereología y del Grupo Español de Dermatología Pediátrica. </p>
					<p>Es experto en dermatitis atópica, que es la afección inflamatoria y crónica de la piel que causa picazón severo, en alergias infantiles, en malformaciones vasculares (lesiones de nacimiento o formaciones congénitas) y en el uso del láser vascular para de forma rápida y eficaz, eliminar lesiones vasculares en cualquier zona del cuerpo o rostro. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Dermatitis atópica</li>
                    <li class="h3 mt-3">Alergias y urticaria</li>
                    <li class="h3 mt-3">Infecciones en la piel por hongos o por levadura</li>
                    <li class="h3 mt-3">Vitiligo</li>
					<li class="h3 mt-3">Acné</li>
                    <li class="h3 mt-3">Melanomas y distintos tipos de cáncer de piel</li>
                    <li class="h3 mt-3">Hiperpigmentación, rosácea o angiomas</li>
                    <li class="h3 mt-3">Epiteliomas</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'francisco-manuel-ildefonso-mendonca' => (object) [
		'title' => 'Dr. Francisco Manuel Ildefonso Mendonça',
		'especialidades' => ['dermatologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/francisco-manuel-ildefonso-dermatologia.jpg',
		'img_min' => '/files/img/doctores/francisco-manuel-ildefonso-dermatologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'guillermo-jose-jimenez-thomas' => (object) [
		'title' => 'Dr. Guillermo José Jiménez Thomas',
		'especialidades' => ['dermatologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/guillermo-jimenez-thomas-dermatologo-sevilla.jpg',
		'img_min' => '/files/img/doctores/guillermo-jimenez-thomas-dermatologo-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-joaquin-pichardo-carballo' => (object) [
		'title' => 'Dr. José Joaquín Pichardo Carballo',
		'especialidades' => ['medicina-interna-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-Joaquin-Pichardo-Carballo.jpg',
		'img_min' => '/files/img/doctores/Jose-Joaquin-Pichardo-Carballo.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jorge-reveriego-blanes' => (object) [
		'title' => 'Dr. Jorge Reveriego Blanes',
		'especialidades' => ['medicina-interna-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Reveriego.jpg',
		'img_min' => '/files/img/doctores/Reveriego.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-cano' => (object) [
		'title' => 'Dra. María Cano ',
		'especialidades' => ['medicina-interna-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/maria-cano-internista-sevilla.jpg',
		'img_min' => '/files/img/doctores/maria-cano-internista-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	//'catherine-alejandra-casanova-demmler' => (Object) [
	//	'title' => 'Dra. Catherine Alejandra Casanova Demmler',
	//	'especialidades' => ['medicina-interna-sevilla'],
	//	'intro' => 'Lorem ',
	//	'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
	//	'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
	//	'anyos' => '25',
	//	'body' => '<p>Lorem </p>
	//    			<p>Lorem </p>',
	//	'jefe' => false,
	//	'especialista' => true,
	//],
	'julia-jordano-almoguera' => (object) [
		'title' => 'Dra. Julia Jordano Almoguera',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'fredy-eduardo-molina-socola' => (object) [
		'title' => 'Dr. Fredy Eduardo Molina Socola',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Fredy-eduardo-oftalmologo.png',
		'img_min' => '/files/img/doctores/Fredy-eduardo-oftalmologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'ernesto-pereira-delgado' => (object) [
		'title' => 'Dr. Ernesto Pereira Delgado',
		'especialidades' => ['oftalmologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/ernesto-pereira-oftalmologo.png',
		'img_min' => '/files/img/doctores/ernesto-pereira-oftalmologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'francisco-jose-morote-jimenez' => (object) [
		'title' => 'Dr. Francisco Jose Morote Jiménez',
		'especialidades' => ['otorrino-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'marta-cano-cabrera' => (object) [
		'title' => 'Dra. Marta Cano Cabrera',
		'especialidades' => ['pediatria-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/marta-cano-cabrera-pediatria.jpg',
		'img_min' => '/files/img/doctores/marta-cano-cabrera-pediatria.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-lopez-marcos' => (object) [
		'title' => 'Dra. María del Carmen Cabello Anaya',
		'especialidades' => ['pediatria-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-sanchez-moreno' => (object) [
		'title' => 'Dra. María Sánchez Moreno',
		'especialidades' => ['pediatria-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/maria-sanchez-moreno-pediatra-resize.jpg',
		'img_min' => '/files/img/doctores/maria-sanchez-moreno-pediatra-resize.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'laura-piedad-hernandez-garcia' => (object) [
		'title' => 'Dra. Laura Piedad Hernández García',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'javier-martin-antunez' => (object) [
		'title' => 'Dr. Javier Martín Antunez',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-miguel-mellado-castillero' => (object) [
		'title' => 'Dr. José Miguel Mellado Castillero',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-Miguel-Mellado-Castillero.jpg',
		'img_min' => '/files/img/doctores/Jose-Miguel-Mellado-Castillero.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'antonio-ortiz-menendez' => (object) [
		'title' => 'Dr. Antonio Ortiz Menéndez',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/antonio-ortiz-traumatologo.png',
		'img_min' => '/files/img/doctores/antonio-ortiz-traumatologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'miguel-angel-toledo-romero' => (object) [
		'title' => 'Dr. Miguel Ángel Toledo Romero',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/miguel-angel-toledo-romero-traumatologo-recor.png',
		'img_min' => '/files/img/doctores/miguel-angel-toledo-romero-traumatologo-recor.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-luis-torrella-lopez' => (object) [
		'title' => 'Dr. José Luís Torrella López',
		'especialidades' => ['traumatologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/jose-luis-torrella-lopez-traumatologo.jpg',
		'img_min' => '/files/img/doctores/jose-luis-torrella-lopez-traumatologo.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'ivan-alberto-portela-diaz' => (object) [
		'title' => 'Dr. Iván Alberto Portela Díaz ',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-nicolas-quintana-silva' => (object) [
		'title' => 'Dr. Juan Nicolás Quintana Silva',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'pablo-robledo-casal' => (object) [
		'title' => 'Dr. Pablo Robledo Casal',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'angie-carolina-ruiz-ortiz' => (object) [
		'title' => 'Dra. Angie Carolina Ruiz Ortiz ',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'gissell-paola-ruiz-ortiz' => (object) [
		'title' => 'Dra. Gissell Paola Ruiz Ortiz ',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'alejandro-jose-ysea-oquendo' => (object) [
		'title' => 'Dr. Alejandro José Ysea Oquendo',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'melissa-aguilar' => (object) [
		'title' => 'Dra. Melissa Aguilar',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'andres-felipe-baron-alarcon' => (object) [
		'title' => 'Dr. Andrés Felipe Baron Alarcón',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'marcela-nathaly-belalcazar-parra' => (object) [
		'title' => 'Dra. Marcela Nathaly Belalcázar Parra ',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'manuel-benitez-romero' => (object) [
		'title' => 'Dr. Manuel Benítez Romero',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'leonardo-denis-reybravo' => (object) [
		'title' => 'Dr. Leonardo Denis Reybravo ',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-pablo-galan' => (object) [
		'title' => 'Dr. Juan Pablo Galán',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'cristian-gutierrez-garcia' => (object) [
		'title' => 'Dr. Cristian Gutiérrez García',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'francisco-javier-jimenez-rodriguez' => (object) [
		'title' => 'Dr. Francisco Javier Jiménez Rodríguez',
		'especialidades' => ['urgencias-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'miguel-angel-gomez-bravo' => (object) [
		'title' => 'Dr. Miguel Ángel Gómez Bravo',
		'especialidades' => ['cirugia-general-sevilla'],
		'intro' => 'Jefe de equipo de cirugía general',
		'img_main' => '/files/img/doctores/miguel-angel-gomez-bravo-cirugia.jpg',
		'img_min' => '/files/img/doctores/miguel-angel-gomez-bravo-cirugia.jpg',
		'anyos' => '35',
		'body' => '<p>El Dr. Gómez Bravo es Licenciado en Medicina y Cirugía en la Facultad de Medicina de Badajoz (Universidad de Extremadura) y cursó sus estudios durante los años 1981-1987. Ha sido especialista en Cirugía General y del Aparato Digestivo en el Hospital Universitario Virgen del Rocío de Sevilla entre 1989 y 1993.</p>
        			<p>Es jefe de sección y responsable de la unidad de cirugía del hígado, vías biliares, páncreas y trasplantes de órganos digestivos del Hospital Universitario Virgen del Rocío de Sevilla desde el año 2008. También es formador del Sistema de Formación de Especialistas (M.I.R) del HH. UU. Virgen del Rocío desde junio de 2006.</p>
					<p>Además es profesor asociado de la Universidad de Sevilla, en el departamento de cirugía, desde el curso 2006/2007 y también ha sido presidente de la Sociedad Andaluza de Trasplantes de Órganos y Tejidos y coordinador nacional de la sección de HPB de la Asociación Española de Cirujanos.</p>
					<p>Ha participado en más de 200 artículos tanto en publicaciones nacionales como internacionales, así como ha llevado a cabo más de 10 proyectos de investigación en el área de trasplantes.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Cirugía del hígado</li>
                    <li class="h3 mt-3">Cirugía de las vías biliares</li>
                    <li class="h3 mt-3">Cirugía del páncreas</li>
                    <li class="h3 mt-3">Hernias, tumores benignos y malignos.</li>
					<li class="h3 mt-3">Pólipos, fisuras, hemorroides, fístulas y suelo pélvico.</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'rosa-maria-jimenez-rodriguez' => (object) [
		'title' => 'Dra. Rosa María Jiménez Rodríguez',
		'especialidades' => ['cirugia-general-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/rosa-maria-jimenez-rodriguez-cirugia-general.jpg',
		'img_min' => '/files/img/doctores/rosa-maria-jimenez-rodriguez-cirugia-general.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-tinoco-gonzalez' => (object) [
		'title' => 'Dr. José Tinoco González',
		'especialidades' => ['cirugia-general-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/jose-tinoco-gonzalez-cirugia.jpg',
		'img_min' => '/files/img/doctores/jose-tinoco-gonzalez-cirugia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'carlos-gonzalez-de-pedro' => (object) [
		'title' => 'Dr. Carlos González De Pedro',
		'especialidades' => ['cirugia-general-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/carlos-gonzalez-depedro-cirugia-general.jpg',
		'img_min' => '/files/img/doctores/carlos-gonzalez-depedro-cirugia-general.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jaime-bachiller-burgos' => (object) [
		'title' => 'Dr. Jaime Bachiller Burgos',
		'especialidades' => ['urologo-sevilla'],
		'intro' => 'Jefe de equipo de urología',
		'img_main' => '/files/img/doctores/jaime-bachiller-burgos-urologia.jpg',
		'img_min' => '/files/img/doctores/jaime-bachiller-burgos-urologia.jpg',
		'anyos' => '25',
		'body' => '<p>El Doctor Jaime Bachiller Burgos es un referente en Urología a nivel nacional. Licenciado en Medicina y Cirugía por la Universidad de Sevilla, realizando en el mismo centro el doctorado. Es actualmente el jefe de servicio de Urología en el Hospital San Juan de Dios Sevilla perteneciente a la orden de San Juan de Dios, a la que se encuentra muy vinculado. Es profesor de cirugía laparoscópica urológica en el Centro de Mínima Invasión de Cáceres y responsable del área de seguridad del paciente en el Hospital San Juan de Dios. </p>
        			<p>En el año 2009 recibió el premio de Diario Médico «Mejor idea sanitaria» por la cirugía laparoscópica del cáncer de próstata por puerto único. En el 2010 recibió también el premio de su Hospital «Excelencia Investigadora». También colabora con el observatorio de seguridad del paciente en las estrategias de implementación de la seguridad en el ámbito quirúrgico. Es miembro de las Sociedades Española y Andaluza de Urología, así como de Andrología. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Prostatectomía (extirpación de la próstata)</li>
                    <li class="h3 mt-3">Cáncer de riñón</li>
                    <li class="h3 mt-3">Hipertrofia benigna de próstata</li>
                    <li class="h3 mt-3">Laparoscopia urológica</li>
					<li class="h3 mt-3">Litotricia láser</li>
					<li class="h3 mt-3">Litotricia extracorpórea</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'jose-javier-alonso-flores' => (object) [
		'title' => 'Dr. José Javier Alonso Flores',
		'especialidades' => ['urologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/jose-javier-alonso-flores-urologia.jpg',
		'img_min' => '/files/img/doctores/jose-javier-alonso-flores-urologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-rafael-lama-paniego' => (object) [
		'title' => 'Dr. José Rafael Lama Paniego',
		'especialidades' => ['urologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/jose-lama-paniego-urologia.jpg',
		'img_min' => '/files/img/doctores/jose-lama-paniego-urologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'mercedes-rocio-leanez-jimenez' => (object) [
		'title' => 'Dra. Mercedes Rocío Leanez Jiménez',
		'especialidades' => ['urologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/mercedes-leanez-jimenez-urologia.jpg',
		'img_min' => '/files/img/doctores/mercedes-leanez-jimenez-urologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	/* 	'beatriz-albarracin-arjona' => (object) [
		'title' => 'Dra. Beatriz Albarracín Arjona',
		'especialidades' => ['cirugia-maxilofacial-sevilla'],
		'intro' => 'Jefe de equipo de cirugía oral y maxilofacial  ',
		'img_main' => '/files/img/doctores/beatriz-albarracin-arjona.jpg',
		'img_min' => '/files/img/doctores/beatriz-albarracin-arjona.jpg',
		'anyos' => '15',
		'body' => '<p>La Dra. Beatriz Albarracín Arjona, es licenciada en medicina por la Universidad Complutense de Madrid, y continuó su formación realizando el máster universitario en Investigación Médica Clínica en la Universidad Miguel Hernández de Alicante. </p>
					<p>Se subespecializó en Cirugía Craneofacial con estancias en la Unidad de Cirugía del Sueño en la Universidad de Stanford (California) así como en la Unidad de Malformaciones Craneofaciales Infantiles del Hospital 12 de octubre de Madrid. </p>
					<p>Dispone de experiencia tanto en el sector privado, como facultativa especialista en Cirugía Maxilofacial y Cirugía Estética Facial, así como en el sector público, en el servicio de Cirugía Oral y Maxilofacial del Hospital Virgen del Rocío de Sevilla y el Hospital Puerta del Mar de Cádiz. </p>
					<p>Como investigadora ha realizado multitud de comunicaciones en congresos nacionales e internacionales, logrando dos premios por dichas comunicaciones. </p>
        			<p>Actualmente pertenece a varias sociedades científicas como son la Sociedad Española de Cirugía Oral y Maxilofacial y de Cabeza y Cuello (SECOM), la Sociedad Española de Cirugía Plástica Facial (SECPF), la División Clínica Cráneo Maxilofacial de AO Foundation (AOCMF) y de la Asociación Andaluza de Cirugía Oral y Maxilofacial (AACOMF). </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Cirugía ortognática y del Síndrome de la Apnea del Sueño.</li>
                    <li class="h3 mt-3">Oncología de cara y cuello, traumatología cráneo-facial y patología de glándulas salivales.</li>
                    <li class="h3 mt-3">Cirugía de masculinización y feminización facial.</li>
                    <li class="h3 mt-3">Rinoplastia y septoplastia con ultrasonidos.</li>
					<li class="h3 mt-3">Cirugía reconstructiva del pabellón auricular.</li>
					<li class="h3 mt-3">Implantes cigomáticos e implantología oral avanzada.</li>
					<li class="h3 mt-3">Cirugía estética de la cara y el cuello.</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	], */
	'luis-ruiz-laza' => (object) [
		'title' => 'Dr. Luis Ruiz Laza',
		'especialidades' => ['cirugia-maxilofacial-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'manuel-molina' => (object) [
		'title' => 'Dr. Manuel Molina',
		'especialidades' => ['cirugia-maxilofacial-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-luisa-franco-marquez' => (object) [
		'title' => 'Dra. María Luisa Franco Márquez',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Maria-Luisa-Franco-Marquez.jpg',
		'img_min' => '/files/img/doctores/Maria-Luisa-Franco-Marquez.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'andrea-caruso' => (object) [
		'title' => 'Dr. Andrea Caruso',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/andrea-caruso-ginecologia.jpg',
		'img_min' => '/files/img/doctores/andrea-caruso-ginecologia.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	/*'angel-del-campo-garcia' => (object) [
		'title' => 'Dr. Ángel Del Campo García',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/angel-del-campo-ginecologo.png',
		'img_min' => '/files/img/doctores/angel-del-campo-ginecologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	], */
	'fatima-martin-marquez' => (object) [
		'title' => 'Dra. Fátima Martín Márquez',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/fatima-rocio-martin-ginecologa.jpg',
		'img_min' => '/files/img/doctores/fatima-rocio-martin-ginecologa.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-jesus-de-justo-moscardo' => (object) [
		'title' => 'Dra. María Jesús de Justo Moscardó',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'luis-carlos-garcia-lancha' => (object) [
		'title' => 'Dr. Luis Carlos García Lancha',
		'especialidades' => ['ginecologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/luis-carlos-garcia-lancha-ginecologo.png',
		'img_min' => '/files/img/doctores/luis-carlos-garcia-lancha-ginecologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'antonio-lopez-gonzalez' => (object) [
		'title' => 'Dr. Antonio López González',
		'especialidades' => ['neurocirujano-sevilla'],
		'intro' => 'Jefe de equipo de neurocirugía',
		'img_main' => '/files/img/doctores/antonio-lopez-gonzalez-neurocirugia.jpg',
		'img_min' => '/files/img/doctores/antonio-lopez-gonzalez-neurocirugia.jpg',
		'anyos' => '17',
		'body' => '<p>El Dr. Antonio López González cursó sus estudios de Medicina en la Universidad de Granada y posteriormente realizó el doctorado en la Universidad de Sevilla. </p>
        			<p>Posee formación y entrenamiento en Microcirugía y Neurocirugía Vascular Cerebral, el cual realizó en el Departamento de Neurocirugía del Stroke Center del Hospital Teishinkai de Sapporo, Japón, con el Prof. Rokuya Tanikawa, además de formación y entrenamiento en Microcirugía y Neurocirugía Vascular en el Barrow Neurological Institute, Phoenix, EE.UU. con el Prof. Robert Spetzler.</p>
					<p>A lo largo de sus 17 años de experiencia, ha desarrollado su actividad como neurocirujano en el Hospital Universitari i Politècnic la Fe de Valencia y actualmente lo hace en la unidad intercentros de Neurocirugía de los hospitales Virgen del Rocío, Virgen Macarena de Sevilla y el Hospital San Juan de Dios Sevilla.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Valoración y cirugía de las lesiones vasculares del cerebro.</li>
                    <li class="h3 mt-3">Cirugía de la base del cráneo</li>
                    <li class="h3 mt-3">Tratamiento quirúrgico de las afecciones tumorales cerebrales.</li>
                    <li class="h3 mt-3">Tratamiento de alteraciones del líquido cefalorraquídeo.</li>
					<li class="h3 mt-3">Tratamiento quirúrgico de las lesiones de la columna vertebral y raíces nerviosas.</li>
					<li class="h3 mt-3">Técnicas de mínima invasión. </li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'felix-vinuela-fernandez' => (object) [
		'title' => 'Dr. Félix Viñuela Fernández ',
		'especialidades' => ['neurologo-sevilla'],
		'intro' => 'Jefe de equipo de neurología ',
		'img_main' => '/files/img/doctores/Felix-Viñuela.png',
		'img_min' => '/files/img/doctores/Felix-Viñuela.png',
		'anyos' => '25',
		'body' => '<p>Nacido en Sevilla, es Licenciado en Medicina y Cirugía por la Universidad de Navarra en 1997 y se especializó en Neurología, haciendo el doctorado en medicina por la Universidad de Sevilla en 1997. </p>
					<p>El Dr. Félix Viñuela Fernández es un reconocido especialista en Neurología, centrándose principalmente en trastornos de la memoria, deterioro cognitivo, enfermedad del Alzheimer y demencias. </p>
					<p>Ha sido presidente de la Sociedad Andaluza de Neurología desde los años 2015 a 2017 y es miembro de la Sociedad Española de Neurología desde el año 1993 hasta la actualidad. </p>
					<p>Actualmente imparte la asignatura "Patología médica del sistema endocrino, Reumatología, Nefrología y sistema nervioso" en la Universidad de Sevilla. Además, ha publicado libros y escrito capítulos en libros de su especialidad. </p>
        			<p>En la actualidad, es jefe de servicio de neurología del Hospital San Juan de Dios de Sevilla, y en su equipo se encuentran Francisco José Hernández Ramos, Rafael Pérez Noguera y Francisco Manuel Sánchez Caballero. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Alzheimer</li>
                    <li class="h3 mt-3">Trastornos de la memoria</li>
                    <li class="h3 mt-3">Deterioro cognitivo</li>
                    <li class="h3 mt-3">Demencias</li>
					<li class="h3 mt-3">Neuralgia</li>
					<li class="h3 mt-3">Migraña</li>
					<li class="h3 mt-3">Ictus</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'francisco-javier-viguera-romero' => (object) [
		'title' => 'Dr. Francisco Javier Viguera Romero',
		'especialidades' => ['neurologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/javier-viguera-neurologo-san-juan-dios-sevilla.jpg',
		'img_min' => '/files/img/doctores/javier-viguera-neurologo-san-juan-dios-sevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'rafael-perez-noguera' => (object) [
		'title' => 'Dr. Rafael Pérez Noguera',
		'especialidades' => ['neurologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/rafael-perez-noguera-neurologo.png',
		'img_min' => '/files/img/doctores/rafael-perez-noguera-neurologo.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'francisco-manuel-sanchez-caballero' => (object) [
		'title' => 'Dr. Francisco Manuel Sánchez Caballero',
		'especialidades' => ['neurologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/francisco-manuel-sanchez-caballero-neurologo.jpg',
		'img_min' => '/files/img/doctores/francisco-manuel-sanchez-caballero-neurologo.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-marin-aguilera' => (object) [
		'title' => 'Dr. Jose Mª Aguilera Navarro',
		'especialidades' => ['neurologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/Jose-maria-aguilera-neurologo.jpg',
		'img_min' => '/files/img/doctores/Jose-maria-aguilera-neurologo.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'luis-manuel-granados-llamas' => (object) [
		'title' => 'Dr. Luis Manuel Granados Llamas',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Jefe de equipo de anestesiología y reanimación',
		'img_main' => '/files/img/doctores/luis-manuel-granado-llamas-anestesista.png',
		'img_min' => '/files/img/doctores/luis-manuel-granado-llamas-anestesista.png',
		'anyos' => '30',
		'body' => '<p>El Dr. Luis Manuel Granados Llamas es Licenciado en Medicina y Cirugía en la Facultad de Medicina de la Universidad de Sevilla desde 1987 a 1992, siendo alumno adscrito al Hospital Militar de Sevilla durante los tres últimos años de su formación. </p>
        			<p>Tras superar el MIR, realizó la especialidad de Anestesiología, Reanimación y Terapéutica del Dolor en el Hospital Universitario Virgen del Rocío de Sevilla entre los años 1993 a 1997. </p>
					<p>LorComo especialista, desde el año 1997 a 2006, compaginó su actividad en el sistema público de salud en los hospitales Infanta Elena de Huelva, el hospital de Minas de Riotinto y el Hospital Universitario Virgen del Rocío, y en diversos hospitales privados del área de Sevilla.em </p>
					<p>Como actividad formativa, el Dr. Granados ha sido tutor de residentes de la especialidad de anestesiología y reanimación en el Hospital Virgen del Rocío, en el ámbito público, y desde el año 2006 se dedica única y exclusivamente tanto a la formación como al desarrollo de su profesión en el ámbito privado. </p>
					<p>Ha participado en numerosos artículos y publicaciones, recibiendo el premio de la mejor comunicación en la XL reunión de la Asociación Andaluza-Extremeña de Anestesiología, Reanimación y Terapéutica del Dolor. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Visita preanestésica</li>
                    <li class="h3 mt-3">Anestesia general</li>
                    <li class="h3 mt-3">Sedación</li>
					<li class="h3 mt-3">Anestesia regional: bloqueos nerviosos centrales (epidural, intradural), bloqueos nerviosos periféricos (tronculares, nervios terminales, interfasciales)</li>
                    <li class="h3 mt-3">Cuidados postoperatorios</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'marta-roya-rojas' => (object) [
		'title' => 'Dra. Marta Raya Rojas',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/marta-raya-rojas-anestesia.png',
		'img_min' => '/files/img/doctores/marta-raya-rojas-anestesia.png',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'diego-villegas-duque' => (object) [
		'title' => 'Dr. Diego Villegas Duque',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'rafael-becerra-montes' => (object) [
		'title' => 'Dr. Rafael Becerra Montes',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'elena-soledad-benito-ramallo' => (object) [
		'title' => 'Dra. Elena Soledad Benito Ramallo',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'veronica-blanco-marquez' => (object) [
		'title' => 'Dra. Verónica Blanco Márquez',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'ramon-carrasci-murcia' => (object) [
		'title' => 'Dr. Ramón Carrasco Murcia',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-carlos-castillo-velasco' => (object) [
		'title' => 'Dr. José Carlos Castillo Velasco',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-del-valle-coronado-hijon' => (object) [
		'title' => 'Dra. María del Valle Coronado Hijon',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'enrique-fernandez-ortega' => (object) [
		'title' => 'Dr. Enrique Fernández Ortega',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'pilar-garcia-aparicio' => (object) [
		'title' => 'Dra. Pilar García Aparicio',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'domingo-gonzalez-rubio' => (object) [
		'title' => 'Dr. Domingo González Rubio',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'larbi-francisco-lezama-nunez' => (object) [
		'title' => 'Dr. Larbi Francisco Lezama Núñez',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-antonio-lozano-cavallo' => (object) [
		'title' => 'Dr. José Antonio Lozano Cavallo',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-carlos-luis-navarro' => (object) [
		'title' => 'Dr. Juan Carlos Luis Navarro',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'zina-mantashyan-ghandilyan' => (object) [
		'title' => 'Dra. Zina Mantashyan Ghandilyan',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'amparo-marianez-vazquez' => (object) [
		'title' => 'Dr. Amparo Marianez Vázquez',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'alejandro-jesus-marin-martinez' => (object) [
		'title' => 'Dr. Alejandro Jesús Marín Martínez',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'luis-martinez-galan-fernandez' => (object) [
		'title' => 'Dr. Luis Martínez-Galán Fernández',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'nuria-montero-lopez' => (object) [
		'title' => 'Dra. Nuria Montero López',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'elena-mozo-minguez' => (object) [
		'title' => 'Dra. Elena Mozo Mínguez',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'roh-heon-park-kim' => (object) [
		'title' => 'Dr. Roh Heon Park Kim',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-jose-sanchez-valderrabanos' => (object) [
		'title' => 'Dr. Juan José Sánchez Valderrabanos',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-manuel-suarez-delgado' => (object) [
		'title' => 'Dr. José Manuel Suárez Delgado',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'juan-villar-gallardo' => (object) [
		'title' => 'Dr. Juan Villar Gallardo',
		'especialidades' => ['anestesia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'irene-jara-lopez' => (object) [
		'title' => 'Dra. Irene Jara López',
		'especialidades' => ['hematologo-sevilla'],
		'intro' => 'Jefa de equipo de hematología y hemoterapia ',
		'img_main' => '/files/img/doctores/irene-jara-lopez-hemoterapia1.jpg',
		'img_min' => '/files/img/doctores/irene-jara-lopez-hemoterapia1.jpg',
		'anyos' => '27',
		'body' => '<p>La Dra. Irene Jara López es Licenciada en Medicina y Cirugía por la Facultad de Medicina de la Universidad de Sevilla y cursó dichos estudios del año 1990 a 1996. </p>
        			<p>Ha sido alumna interna del departamento de Farmacología, Pediatría y Radiología, nombrada mediante oposición durante el curso 94/95, desarrollando dicha actividad en el Servicio de Pediatría del Hospital Universitario Virgen del Rocío. </p>
					<p>Realizó la especialidad de Hematología y Hemoterapia vía MIR en el Hospital Virgen del Rocío durante el periodo comprendido entre mayo de 1997 y mayo de 2001, obteniendo una calificación en la misma de destacada. </p>
					<p>Se doctoró en Medicina con calificación de sobresaliente “Cum Laude” por la Facultad de Medicina de la Universidad de Sevilla en abril de 2002 por el trabajo de investigación titulado “Relación entre tiempo de almacenamiento de los concentrados de hematíes y morbilidad en pacientes sometidos a cirugía cardíaca”. </p>
					<p>En la actualidad, ejerce como facultativa especialista en el área de Hematología y Hemoterapia en el Hospital San Juan de Dios Aljarafe desde el 23 de septiembre de 2002 y también en dicho hospital ha ejercido como secretaria del Comité de Transfusión Hospitalario y Responsable de Hemovigilancia de la Comisión de Seguridad Clínica desde 2002 hasta 2015. </p>
					<p>Durante mayo de 2010 y mayo de 2011 fue cooperante sanitaria y voluntaria con la ONG Salud para Todos (promovida por la Orden Hospitalaria de San Juan de Dios) en St John of God Hospital de Asafo (Ghana). </p>
					<p>Ha participado en multitud de congresos tanto a nivel internacional, nacional y regional, así como ha publicado en diversas revistas médicas nacionales e internacionales. También ha formado parte de numerosas conferencias, protocolos de investigación y participado en capítulos de libros. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Anemia y trastornos de los glóbulos rojos.</li>
                    <li class="h3 mt-3">Transfusiones de sangre.</li>
                    <li class="h3 mt-3">Trastornos de las plaquetas.</li>
                    <li class="h3 mt-3">Leucopenia.</li>
					<li class="h3 mt-3">Hemoglobinopatías.</li>
                    <li class="h3 mt-3">Trastornos de los glóbulos blancos.</li>
					<li class="h3 mt-3">Trombocitopenia.</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'osama-baccarat-shrem' => (object) [
		'title' => 'Dr. Osama Barakat Shrem',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/ossama-bakarat-medicina-intensiva.jpg',
		'img_min' => '/files/img/doctores/ossama-bakarat-medicina-intensiva.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'esteban-fernandez-hinojosa' => (object) [
		'title' => 'Dr. Esteban Fernández Hinojosa',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/esteban-fernandez-hinojosa-medicina-intensiva.jpg',
		'img_min' => '/files/img/doctores/esteban-fernandez-hinojosa-medicina-intensiva.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'maria-jose-fernandez-perez' => (object) [
		'title' => 'Dra. María José Fernández Pérez',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'manuel-garcia-sepulveda' => (object) [
		'title' => 'Dr. Manuel García Sepúlveda',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/manuel-garcia-sepulveda-medicina-intensiva.jpg',
		'img_min' => '/files/img/doctores/manuel-garcia-sepulveda-medicina-intensiva.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'isabel-gutierrez-morales' => (object) [
		'title' => 'Dra. Isabel Gutiérrez Morales',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jesus-rafael-herrera-gutierrez' => (object) [
		'title' => 'Dr. Jesús Rafael Herrera Gutiérrez',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'ricardo-esteban-martinez-arcos' => (object) [
		'title' => 'Dr. Ricardo Esteban Martínez Arcos',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'jose-cayetano-naranjo-jarillo' => (object) [
		'title' => 'Dr. José Cayetano Naranjo Jarillo',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/cayetano-naranjo-jarillo-intensivista.jpg',
		'img_min' => '/files/img/doctores/cayetano-naranjo-jarillo-intensivista.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'vicente-padilla-morales' => (object) [
		'title' => 'Dr. Vicente Padilla Morales',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/vicente-padilla-morales-medicina-intensiva.jpg',
		'img_min' => '/files/img/doctores/vicente-padilla-morales-medicina-intensiva.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'luis-eduardo-sierra-cristancho' => (object) [
		'title' => 'Dr. Luis Eduardo Sierra Cristancho',
		'especialidades' => ['medicina-intensiva-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'beatriz-hernaez-vela' => (object) [
		'title' => 'Dra. Beatriz Hernaez Vela',
		'especialidades' => ['podologo-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/beatriz-hernaez-vela-podologa.jpg',
		'img_min' => '/files/img/doctores/beatriz-hernaez-vela-podologa.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => true,
		'especialista' => false,
	],
	'antonio-luna-alcala' => (object) [
		'title' => 'Dr. Antonio Luna Alcalá ',
		'especialidades' => ['radiologia-sevilla'],
		'intro' => 'Jefe de equipo de radiología ',
		'img_main' => '/files/img/blog/antonio-luna-alcala-radiologia-normal.png',
		'img_min' => '/files/img/blog/antonio-luna-alcala-radiologia-normal.png',
		'anyos' => '30',
		'body' => '<p>El Dr. Antonio Luna Alcalá es licenciado en Medicina por la Universidad de Granada y posteriormente estudió la especialidad de radiología en el Hospital Gregorio Marañon de Madrid. Para ampliar sus conocimientos de la especialidad y en resonancia magnética, realizó estancias formativas en los departamentos de Radiología de Duke Medical Center (Duke University, Durham, NC) y Brigham and Women Hospital (Harvard University, Boston, Ma). </p>
					<p>Tras la realización de su residencia, centró su trabajo en la imagen abdominal y cardíaca, compartiendolas con labores asistenciales y de gestión. </p>
					<p>En relación a la educación podemos destacar lo siguiente: </p>
					<ul class="mt-5">
					<li class="mt-2">Nombrado educador del año de la Radiological Society of North America en 2018, 2019 y 2020.</li>
					<li class="mt-2">Participación como conferenciante en más de 200 congresos nacionales e internacionales.</li>
					<li class="mt-2">Ha sido profesor asociado de radiología en el departamento de Radiología del Hospital Universitario de Cleveland hasta el pasado año.</li>
					</ul>
					<p>Actualmente forma parte de varios comités educativos de la RSNA y de la investigación de la ECR y además es miembro de la SERAM, SEDIA, SERME, ESR y RSNA entre otras. </p>
					<p>Es el Director Médico de HT-médica, donde desarrollan su profesión bajo los criterios de especialización, eficiencia y calidad. </p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
                    <ul class="open-sans-reg primary-font-blue mt-5">
                    <li class="h3 mt-3">Fracturas e infecciones</li>
                    <li class="h3 mt-3">Artritis</li>
                    <li class="h3 mt-3">Osteoporosis</li>
                    <li class="h3 mt-3">Infecciones o afecciones pulmonares</li>
					<li class="h3 mt-3">Cáncer mamario</li>
                    <li class="h3 mt-3">Problemas con el tubo digestivo</li>
                    </ul>',
		'jefe' => true,
		'especialista' => false,
	],
	'luis-luna-alcala' => (object) [
		'title' => 'Dr. Luis Luna Alcalá',
		'especialidades' => ['radiologia-sevilla'],
		'intro' => 'Lorem ',
		'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
		'anyos' => '25',
		'body' => '<p>Lorem </p>
        			<p>Lorem </p>',
		'jefe' => false,
		'especialista' => true,
	],
	'antoniojose-barranco-moreno' => (object) [
		'title' => 'Dr. Antonio Jose Barranco Moreno',
		'especialidades' => ['cirugia-bariatrica-sevilla'],
		'intro' => 'Jefe de equipo de cirugía bariátrica',
		'img_main' => '/files/img/doctores/antonio-barranco-cirugia-bariatrica.jpg',
		'img_min' => '/files/img/doctores/antonio-barranco-cirugia-bariatrica.jpg',
		'anyos' => '18',
		'body' => '<p>Antonio José Barranco Moreno, es un experto en Cirugía General, con especialización en Cirugía Laparoscópica y del Aparato Digestivo. Es Licenciado en Medicina y Cirugía por la Universidad de Sevilla y realizó el doctorado en Medicina también en dicha Universidad. Se especializó en Cirugía General y del Aparato Digestivo en el Hospital Universitario de Canarias.</p>
        			<p>El Doctor Antonio Barranco Moreno es un reputado especialista en Cirugía Bariátrica que cuenta con más de quince años de experiencia. Dispone del Diploma de Competencia del Programa de Formación de la Sociedad Española de Cirugía de la Obesidad (SECO) que reconoce una experiencia de más de cinco años y más de 100 intervenciones realizadas con éxito en el Hospital Universitario Virgen del Rocío de Sevilla. Asimismo, es autor de numerosas ponencias, publicaciones y comunicaciones. Además, imparte cursos de formación tanto a residentes de Cirugía General como a cirujanos nacionales e internacionales. Por todo ello, el Dr. Barranco es un especialista de primer nivel. También es miembro de la Asociación de Cirujanos Española, de la Sociedad Española de Cirugía de la Obesidad y de la European Hernia Society.</p>',
		'body2' => '<h2 class="primary-font-blue h2">Principales consultas</h2>
					<ul class="open-sans-reg primary-font-blue mt-5">
					<li class="h3 mt-3">Bypass</li>
					<li class="h3 mt-3">Laparoscopia</li>
					<li class="h3 mt-3">Obesidad</li>
					<li class="h3 mt-3">Reducción estomago</li>
					</ul>',
		'jefe' => true,
		'especialista' => false,
	],

	// '' => (Object) [
	// 	'title' => '',
	// 	'especialidades' => [''],
	// 	'intro' => 'Lorem ',
	// 	'img_main' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
	// 	'img_min' => '/files/img/doctores/perfil_especialista_sjdsevilla.jpg',
	// 	'anyos' => '25',
	// 	'body' => '<p>Lorem </p>
	//     			<p>Lorem </p>',
	// 	'jefe' => false,
	//	'especialista' => true,
	// ],
];

$especialidades = [
	"urgencias-sevilla" => (object) [
		"title_especialidad" => "Urgencias",
		"seoTitle" => "Urgencias 24 horas en Sevilla",
		"seoMeta" => "Urgencias médicas en Hospital San Juan de Dios de Sevilla, disponibles durante 24 horas, los 365 días del año. Trabajamos con las principales aseguradoras.",
		"short_title" => "Urgencias",
		"img_main" => "/files/img/especialidadesImg/urgencias/adrian-martinez-lopez-urgencias.jpg",
		"principales_img" => "/files/img/hospital-privado-sevilla-cita-urgencia-telefono.webp",
		"icon" => "/files/img/icons/urgencias.svg",
		"intro" => "Nuestro amplio equipo de profesionales médicos están disponibles durante 24 horas, los 365 días del año.",
		"info" => "<p class='open-sans-reg third-font-gray'>El servicio de urgencias del Hospital San Juan de Dios de Sevilla se puso en marcha en 2022. Contamos con equipos multidisciplinares capaces de atender tanto niños como adultos. Dicha atención se ofrece 24 horas, los 7 días de la semana, durante los 365 días del año.</p>
					<p class='open-sans-reg third-font-gray'>Nuestro amplio equipo de especialistas nos permite atender una gran variedad de urgencias médicas, quirúrgicas y traumatológicas. Además, el centro hospitalario dispone de zona UCI, URPA y REA, así como áreas de hospitalización, de observación y laboratorio, por lo que las valoraciones y estudios que necesite el personal médico están disponibles en un corto período de tiempo, lo que reduce considerablemente las esperas y los plazos de atención del paciente.</p>
					<p class='open-sans-reg third-font-gray'>Trabajamos con las siguientes compañías aseguradoras y mutuas:</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray'></p>",
		"servicios_title" => "",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'></p>",
		"consultas" => "<ul class='third-font-gray open-sans-reg'><li class='mt-2'>Código infarto o ictus</li><li class='mt-2'>Tratamiento de heridas</li><li class='mt-2'>Luxaciones y fracturas</li><li class='mt-2'>Enfermedades respiratorias</li><li class='mt-2'>Cirugía abdominal urgente</li><li class='mt-2'>Accidentes de tráfico</li><li class='mt-2'>Accidentes laborales</li><li class='mt-2'>Patologías ginecológicas y del embarazo</li><li class='mt-2'>Contusiones y esguinces</li><li class='mt-2'>Amigdalitis, faringitis, otitis y gastroenteritis</li></ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => true
	],
	"pediatria-sevilla" => (object) [
		"title_especialidad" => "Pediatría",
		"seoTitle" => "Servicio de pediatría en Sevilla",
		"seoMeta" => "La unidad de pediatría del Hospital San Juan de Dios de Sevilla es un servicio que ofrece una atención médica completa e integral, desde niños recién nacidos a adolescentes a través de una atención eficiente, segura y de calidad. Contamos con servicios de urgencias pediátricas.",
		"short_title" => "Pediatría",
		"img_main" => "/files/img/especialidadesImg/pediatria/juan-carlos-vargas-pediatria.jpg",
		"principales_img" => "/files/img/centro-medico-privado-sevilla-pediatria-lactancia.webp",
		"icon" => "/files/img/icons/pediatria.svg",
		"intro" => "Rama de la medicina especializada en atención médica de bebés, niños y adolescentes.",
		"info" => "<p class='open-sans-reg third-font-gray'>La unidad de pediatría del <span class='span-medium600'>Hospital San Juan de Dios de Sevilla</span> es un servicio que ofrece una atención médica completa e integral, desde niños recién nacidos a adolescentes a través de una atención eficiente, segura y de calidad enfocada a la promoción de la salud y la prevención como pilares fundamentales, así como el diagnóstico y tratamiento de todas las patologías.</p>
					<p class='open-sans-reg third-font-gray'>Disponemos de un equipo profesional <span class='span-medium600'>multidisciplinar</span> que ofrece un servicio y cuidados adaptados a las necesidades de cada niño en particular. Para el correcto diagnóstico, contamos, además de con los profesionales idóneos, de las últimas técnicas y los tratamientos más avanzados para cuidar de los más pequeños.</p>
					<p class='open-sans-reg third-font-gray'>El servicio de <a href='/urgencias-sevilla'><span class='span-medium600 link-blog'>Pediatría</span></a> del Hospital San Juan de Dios Sevilla va dirigido a toda la población infantil, tanto sana como enferma, por lo que se cubren todos los cuidados y necesidades para el buen desarrollo y toda la atención médica de los niños desde el nacimiento hasta la adolescencia.</p>
					<p class='open-sans-reg third-font-gray'>Es por ello que ofrece esta atención integral desde que los niños son muy pequeños, con controles de salud desde los 7 - 15 días de vida. En estos controles de salud no solo se valorará su desarrollo físico, psicológico y social, sino que también nuestro objetivo es lograr la mayor y mejor salud en todos los aspectos: preventivos, curativos y paliativos. Para ello contamos con un gran equipo de profesionales y especialistas.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>El equipo de pediatría del Hospital San Juan de Dios Sevilla está compuesto por varios profesionales. Al frente de esta unidad está el Dr. Juan Carlos Vargas Perez, especialista en pediatría y médico puericultor. Acreditado con numerosos Master y Cursos de Experto, cuenta con más de quince años de experiencia laboral en distintos centros sanitarios de Sevilla y, desde hace varios años, ejerciendo en nuestra Orden Hospitalaria.</p>
								<p class='open-sans-reg third-font-gray mt-4'>Con el resto de pediatras del equipo, también con una amplia formación y trayectoria profesional, forman un gran grupo humano cualificado, cuya fortaleza es clave para el correcto cuidado de los pacientes pediátricos y para llegar a la excelencia en su atención.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Son muchos los motivos por lo que elegir el Hospital San Juan de Dios Sevilla. Entre otros, los profesionales que trabajan en esta unidad han elaborado unos procedimientos y protocolos en materia de promoción de la salud y prevención, algo sumamente importante para que nuestros niños crezcan sanos y desarrollen todo su potencial, además de prevenir enfermedades en el futuro.</p>
							<p class='open-sans-reg third-font-gray'>Para ello, las <span class='span-medium600'>Revisiones o Controles de Salud son fundamentales. Es conveniente acudir a los controles de salud periódicamente, aunque veas a tus niños sanos. En estas consultas, además de dar pautas para una vida saludable, se pueden detectar alteraciones en el crecimiento y desarrollo e identificar enfermedades en fases tempranas.</p>
							<p class='open-sans-reg third-font-gray'>Damos una atención cálida y cercana, informando de forma clara y adaptada a cada familia, de todos los procesos a los que son sometidos nuestros niños, con una inmediatez que otros hospitales no pueden dar. Sí necesitas asistencia o realizar algún tipo de pregunta o duda, tenemos consultas todas las semanas.</p>
							<p class='open-sans-reg third-font-gray'>Las nuevas instalaciones del hospital disponen de zonas pediátricas dedicadas y adaptadas especialmente para ellos. Tanto en Áreas de Observación y Urgencias como en Consultas Externas, hay espacios adaptados y pensados para los más pequeños. Son fácilmente de distinguir del resto del hospital, ya que están decoradas con motivos infantiles y juguetes varios. Con esto se busca que los niños se sientan cómodos, y quitarles ese miedo y estrés cuando acuden a un centro médico.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las consultas más comunes que atendemos en este área se encuentran las siguientes:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-medium600'>Catarro de vías altas:</span> es la más habitual de todas. Como síntomas es común la congestión nasal, mucosidad e incluso fiebre. </li>
							<li class='mt-2'><span class='span-medium600'>Faringoamigdalitis:</span> se caracteriza por fiebre, dolor de garganta y ganglios en el cuello.</li>
							<li class='mt-2'><span class='span-medium600'>Otitis: </span>las otitis son una de las principales consecuencias de los catarros. La otitis media aguda es una de las patologías más frecuentes en la infancia. </li>
							<li class='mt-2'><span class='span-medium600'>Conjuntivitis: </span>se trata de la inflamación de la conjuntiva de los ojos y de una enfermedad muy contagiosa y común entre los niños.</li>
							<li class='mt-2'><span class='span-medium600'>Bronquiolitis: </span>enfermedad común en la infancia, propia de los meses fríos, cuyo principal responsable es el virus respiratorio sincitial.</li>
							<li class='mt-2'><span class='span-medium600'>Enfermedad boca-mano-pie: </span>se trata de una enfermedad viral contagiosa. Se presenta en forma de ampollas o erupciones leves en los pies, las manos, el área de la boca y la nariz</li>
							<li class='mt-2'><span class='span-medium600'>Roséola: </span>suele iniciarse con fiebre alta y pueden aparecer lesiones en mucosas o síntomas catarrales.</li>
							<li class='mt-2'><span class='span-medium600'>Gastroenteritis: </span>patología común en la etapa infantil causada sobre todo por virus y se manifiesta con diarrea, de comienzo brusco, acompañada de síntomas como náuseas, vómitos, fiebre o dolor abdominal. </li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"medicina-interna-sevilla" => (object) [
		"title_especialidad" => "Medicina Interna",
		"seoTitle" => "Internista en Hospital San Juan de Dios",
		"seoMeta" => "El Hospital San Juan de Dios de Sevilla pone al servicio de los usuarios un preparado equipo de profesionales que cuentan con una contrastada trayectoria. Son especialistas muy versátiles y demandados en el día a día del hospital. Contamos con los mejores internistas en Sevilla.",
		"short_title" => "Medicina Interna",
		"img_main" => "/files/img/especialidadesImg/medicinaInterna/fernando-nebrera-navarro-medicina-interna.jpg",
		"principales_img" => "/files/img/hospital-privado-sevilla-diagnostico-medicina-interna-consulta.webp",
		"icon" => "/files/img/icons/medicina-interna.svg",
		"intro" => "Especialidad médica encargada de la atención integral del adulto, así como diagnóstico, tratamiento no quirúrgico y prevención de las enfermedades.",
		"info" => "<p class='open-sans-reg third-font-gray'>El internista es un médico clínico cuya misión es atender, de forma integrada, todos los problemas de salud del paciente. Es el médico que guía al enfermo, dirigiendo el protocolo de actuación frente a su enfermedad y coordinando al resto de especialistas necesarios para conseguir un tratamiento adecuado, tanto a nivel de hospitalización como en consultas externas.</p>
					<p class='open-sans-reg third-font-gray'>Es el experto a quien recurren los médicos de atención primaria y el resto de especialistas, para la atención de enfermos cuyo diagnóstico no es evidente o se trata de un problema complejo. Del internista depende la atención a los pacientes con los procesos más habituales en el hospital.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>El centro sanitario <span class='span-medium600'>San Juan de Dios Sevilla</span> pone al servicio de los usuarios un preparado equipo de profesionales que cuentan con una contrastada trayectoria. Son especialistas muy versátiles y demandados en el día a día del hospital.</p>
								<p class='open-sans-reg third-font-gray mt-4'>El responsable de esta área es el Dr. Fernando Nebrera, con varios colaboradores donde destacan en consultas externas el Dr. Jorge Reveriego, en planta y consulta de Geriatría la Dra. Sonsoles Frutos, junto a otros con amplia experiencia en Cuidados Paliativos como por ejemplo el Dr. José Joaquín Pichardo.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='mt-4 open-sans-reg third-font-gray'>Es habitual que el internista requiere de muchas pruebas diagnósticas de todo tipo para el correcto diagnóstico, tratamiento y para el seguimiento de las enfermedades que habitualmente maneja, siempre trabajando en equipo con otros especialistas.</p>
							<p class='mt-4 open-sans-reg third-font-gray'>Algunas de las pruebas que solicita pueden realizarse en la propia consulta, ahorrando tiempo al paciente, como son un electrocardiograma o una ecografía básica, y otras debe solicitarlas a otros profesionales, como son pruebas de imagen (radiografías, <span class='span-medium600'>TAC, resonancia, ecografías avanzadas</span>) o pruebas más específicas de áreas como cardiología, o intervencionistas como endoscopias, broncoscopias, etc.</p>
							<p class='mt-4 open-sans-reg third-font-gray'>Nuestro centro permite actualmente mantener la agenda de Medicina Interna <span='span-medium600'>sin lista de espera</span> en consultas externas, lo que permite un servicio de calidad, con tiempo suficiente, personalizado y con inmediatez en todas las consultas y pruebas diagnósticas.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray'>Entre las consultas más comunes en medicina interna las cuales atendemos están:</p>
						<ul class='open-sans-reg third-font-gray'>
						<li class='mt-2'>Atención clínica del paciente sin diagnóstico preciso y enfermo pluripatológico.</li>
						<li class='mt-2'>Atención a las personas de edad avanzada en situación de enfermedad aguda o agudizada.</li>
						<li class='mt-2'>Unidades especiales desarrolladas por los internistas tales como consulta de riesgo vascular, enfermedades infecciosas, enfermedades autoinmunes, etc.</li>
						<li class='mt-2'>Atención clínica de enfermos en la fase paliativa de la enfermedad.</li>
						<li class='mt-2'>Atención del paciente que presenta una emergencia o requiere atención urgente.</li>
						<li class='mt-2'>Atención médica de pacientes quirúrgicos.</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"traumatologia-sevilla" => (object) [
		"title_especialidad" => "Traumatología",
		"seoTitle" => "Servicio traumatología San Juan de Dios",
		"seoMeta" => "El Hospital San Juan de Dios de Sevilla, pone a disposición de los usuarios un equipo de médicos con una amplia experiencia y capacitados en las técnicas más actuales e innovadoras. El área de traumatología está dividida, es decir, cada profesional se ocupa de una zona del cuerpo entre los que se distinguen pies y tobillo, cadera y rodilla, columna y miembros superiores.",
		"short_title" => "Traumatología",
		"img_main" => "/files/img/especialidadesImg/traumatologia/pedro-morales-boris-garcia-traumatologo.jpg",
		"principales_img" => "/files/img/centro-medico-privado-sevilla-traumatologia-especialista-codo.webp",
		"icon" => "/files/img/icons/traumatologia.svg",
		"intro" => "Diagnóstico, prevención y tratamiento de aquellas enfermedades directamente relacionadas con los huesos, músculos o articulaciones.",
		"info" => "<p class='open-sans-reg third-font-gray'>La especialidad de traumatología trata de una rama de la medicina que se dedica a las <span class='span-medium600'>lesiones</span> del aparato locomotor. El Hospital San Juan de Dios Sevilla dispone de una unidad que ofrece una atención médica-quirúrgica completa y personalizada al paciente.</p>
					<p class='open-sans-reg third-font-gray'>El centro pone a disposición de los usuarios un equipo de médicos con una amplia experiencia y capacitados en las técnicas más actuales e innovadoras. El área de traumatología está dividida en <span class='span-medium600>'unidades médicas,</span> es decir, cada profesional se ocupa de una zona del cuerpo entre los que se distinguen pies y tobillo, cadera y rodilla, columna y miembros superiores.</p>
					<p class='open-sans-reg third-font-gray'>Esta especialidad se ocupa de personas de todas las edades, desde niños a adultos con patología traumática, degenerativa o tumoral. Se dedica al diagnóstico, <span class='span-medium600'>prevención,</span> tratamiento y rehabilitación adecuada del paciente.</p>
					<p class='open-sans-reg third-font-gray'>Se ofrece a los usuarios una atención que va desde el servicio de <a href='/urgencias-sevilla'><span class='span-bold link-blog'>Urgencias 24 horas,</span></a> consulta externa bajo demanda, hospitalización, rehabilitación e intervenciones.</p>
					<p class='open-sans-reg third-font-gray'>El centro y esta área en concreto está disponible para todo el mundo, particulares y personas que dispongan de seguro médico. En este sentido, el hospital tiene convenios con las <a href='/companias'><span class='span-medium600 link-blog'>principales aseguradoras</span></a> del país.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>El equipo de traumatología del Hospital San Juan de Dios Sevilla está dividido en múltiples áreas de subespecialización, con el objetivo de ofrecer el mejor cuidado y un tratamiento más personalizado en función de la lesión. Los responsables de esta unidad son Pedro Morales y Boris García.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Para llegar a un correcto diagnóstico todo profesional necesita de una tecnología avanzada y actual. El Hospital San Juan de Dios Sevilla tiene los últimos medios diagnósticos para así llegar a la excelencia médica. Destacamos la <span class='span-medium600'>Resonancia magnética</span>, tomografía axial, TAC multicorte, radiología convencional o pruebas electrofisiológicas.</p>
							<p class='open-sans-reg third-font-gray mt-4'>El equipo de profesionales que conforman la unidad de traumatología del centro hospitalario de Sevilla ofrece una atención integral completa, con Urgencias 24 horas y área de cirugías. Tratamos patologías del aparato extensor y rótula, <span class='span-medium600'>osteotomía</span>, lesiones ligamentosas, <span class='span-medium600'>artrosis</span>, compresiones nerviosas, tenosinovitis, artrodesis, artrodesis, piel neurológica, escoliosis, inestabilidad crónica o pacientes pediátricos, entre otras.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Son múltiples las patologías de las que se ocupa el área de traumatología del Hospital San Juan de Dios Sevilla. Entre las más comunes están las lesiones <span class='span-medium600'>meniscales, ligamento cruzado, prótesis</span> o artroplastias y patología del manguito rotador del hombro.</p>
						<p class='open-sans-reg third-font-gray mt-4'>También cabe destacar lesiones traumáticas como fracturas y luxaciones, enfermedades congénitas y del desarrollo como halluxvalgus (juanetes), espolón calcáneo, dedos en garra, metatarsalgia, lesiones degenerativas como artrosis e infecciones y lesiones tumorales.</p>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"ginecologo-sevilla" => (object) [
		"title_especialidad" => "Ginecología",
		"seoTitle" => "Ginecólogo San Juan de Dios en Sevilla",
		"seoMeta" => "El área de ginecología del Hospital San Juan de Dios Sevilla lo compone un grupo humano que trabaja de manera coordinada y conjunta para ofrecer una atención integral y de calidad a la mujer en el campo de la patología uterina y mamaria. Contamos con los mejores ginecólogos.",
		"short_title" => "Ginecología",
		"img_main" => "/files/img/especialidades/ginecologia/maria-luisa-franco-marquez-ginecologa.jpg",
		"principales_img" => "/files/img/especialidades/ginecologia/ginecologia-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/ginecologia.svg",
		"intro" => "Asistencia integral de las patologías propias de la salud femenina. ",
		"info" => "<p class='open-sans-reg third-font-gray'>La ginecología es la especialidad médica que aborda las enfermedades malignas y benignas del aparato genital femenino. Presta atención integral a la mujer en todas las etapas de su vida, desde la adolescencia hasta la menopausia, incluyendo el embarazo y el parto. Para ello, se establecen estrategias, diagnósticos y tratamientos adecuados a cada persona.</p>
					<p class='open-sans-reg third-font-gray mt-4'>Se ocupa también de la prevención de enfermedades y promoción de la salud de la mujer para la mejora de su calidad de vida. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como referente en esta especialidad destaca la doctora María Luisa Franco Márquez. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>El área de ginecología del Hospital San Juan de Dios Sevilla lo compone un grupo humano que trabaja de manera coordinada y conjunta para ofrecer una atención integral y de calidad a la mujer en el campo de la patología uterina y mamaria. Damos también asistencia a la oncología ginecológica, a la endocrinología, a la patología del suelo pélvico y a problemas relacionados con la reproducción. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Citologías. </li>
							<li class='mt-2'>Ecografía vaginal. </li>
							<li class='mt-2'>Exploración mamaria. </li>
							<li class='mt-2'>Enfermedades de transmisión sexual (ETS)</li>
							<li class='mt-2'>Métodos anticonceptivos. </li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"podologo-sevilla" => (object) [
		"title_especialidad" => "Podología",
		"seoTitle" => "Podologo en Sevilla en San Juan de Dios",
		"seoMeta" => "El Hospital San Juan de Dios es un centro de referencia en el tratamiento de las patologías y enfermedades del pie. Contamos con una amplia experiencia en esta especialidad, así como con los últimos avances tecnológicos.",
		"short_title" => "Podología",
		"img_main" => "/files/img/especialidades/podologia/beatriz-hernaez-vela-podologa.jpg",
		"principales_img" => "/files/img/especialidades/podologia/san-juan-de-dios-sevilla-podologia .jpg",
		"icon" => "/files/img/icons/podologia.svg",
		"intro" => "Área de la medicina encargada del estudio, diagnóstico y tratamiento de las enfermedades que afectan al pie. ",
		"info" => "<p class='open-sans-reg third-font-gray'>La podología es la rama de la medicina que tiene como estudio las afecciones, alteraciones y enfermedades que afectan al pie, mediante técnicas terapéuticas propias de su disciplina. </p>
					<p class='open-sans-reg third-font-gray'>No se centra únicamente en el estudio, también aporta en el diagnóstico, el tratamiento y la investigación de todo lo relacionado con el pie. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como jefa de equipo del equipo de podología del Hospital San Juan de Dios Sevilla se encuentra Beatriz Hernáez Vela. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>El Hospital San Juan de Dios es un centro de referencia en el tratamiento de las patologías y enfermedades del pie. Contamos con una amplia experiencia en esta especialidad, así como con los últimos avances tecnológicos. Además, está integrado por profesionales altamente cualificados con años de experiencia en esta área. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las principales consultas que atendemos desde el Hospital San de Dios en el área de podología son: </p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Problemas de las uñas</li>
							<li class='mt-2'>Juanetes</li>
							<li class='mt-2'>Uñas encarnadas </li>
							<li class='mt-2'>Hiperhidrosis</li>
							<li class='mt-2'>Helomas</li>
							<li class='mt-2'>Bromhidrosis</li>
							<li class='mt-2'>Pies planos</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"neurocirujano-sevilla" => (object) [
		"title_especialidad" => "Neurocirugía",
		"seoTitle" => "Neurocirujano San Juan de Dios Sevilla",
		"seoMeta" => "Desde el Hospital San Juan de Dios Sevilla, disponemos de programas sofisticados como la cirugía de la epilepsia, cirugía craneofacial y cirugía de los trastornos del movimiento entre otros.",
		"short_title" => "Neurocirugía",
		"img_main" => "/files/img/especialidadesImg/neurocirugia/antonio-lopez-gonzalez-neurocirugia.jpg",
		"principales_img" => "/files/img/especialidades/neurocirugia/neurocirugia-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/neurocirugia.svg",
		"intro" => "Rama de la medicina que trata las enfermedades que afectan al sistema nervioso, y que requieren o pueden requerir un tratamiento quirúrgico en algún momento de su evolución.",
		"info" => "<p class='open-sans-reg third-font-gray'>La neurocirugía es la especialidad médica encargada del estudio, investigación, prevención, diagnóstico y tratamiento de las patologías que afectan al sistema nervioso central, periférico y vegetativo. </p>
					<p class='open-sans-reg third-font-gray'>Desde el Hospital San Juan de Dios Sevilla, disponemos de programas sofisticados como la cirugía de la epilepsia, cirugía craneofacial y cirugía de los trastornos del movimiento entre otros. Estas cirugías las desarrollamos en colaboración con los centros de atención primaria y con el resto de hospitales relacionados, consiguiendo de esta forma un seguimiento continuado de nuestros pacientes desde la infancia hasta la edad adulta. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Destaca en esta especialidad como jefe de servicio Antonio López González.</p>",
		"servicios_title" => "Servicios diferenciales ",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde nuestro Hospital, manejamos las distintas patologías respecto a esta especialidad, en base a decisiones que se toman en conjunto con los equipos multidisciplinares, optimizando los resultados obtenidos.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Desarrollamos una labor asistencial en todas las áreas de la especialidad como son, por ejemplo, los traumatismos craneoencefálicos, malformaciones craneofaciales y de la médula, hidrocefalia, tumores cerebrales y medulares; así como en áreas muy específicas como son la patología vascular, la epilepsia, trastornos del movimiento y patología fetal. Siempre aplicando técnicas vanguardistas de microcirugía.</p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Dolor raquídeo cervical, dorsal y lumbar.</li>
							<li class='mt-2'>Hernias discales vertebrales.</li>
							<li class='mt-2'>Fracturas y malformaciones vertebrales.</li>
							<li class='mt-2'>Traumatismo craneoencefálico.</li>
							<li class='mt-2'>Tumores cerebrales, raquídeos y medulares.</li>
							<li class='mt-2'>Hidrocefalia y patología del líquido cefalorraquídeo.</li>
							<li class='mt-2'>Ictus cerebral. </li>
							<li class='mt-2'>Aneurismas cerebrales.</li>
							<li class='mt-2'>Malformaciones vasculares cerebrales y medulares.</li>
							<li class='mt-2'>Afectación del nervio periférico.</li>

						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"oftalmologo-sevilla" => (object) [
		"title_especialidad" => "Oftalmología",
		"seoTitle" => "Oftalmología en Hospital San Juan de Dios Sevilla",
		"seoMeta" => "El Hospital San Juan de Dios Sevilla ofrece una asistencia oftalmología íntegra y de máxima calidad. Nuestros profesionales se ponen a disposición de todos los usuarios para revisiones, problemas puntuales o una primera asistencia. Cuidamos de tu salud ocular.",
		"short_title" => "Oftalmología",
		"img_main" => "/files/img/especialidadesImg/oftalmologia/ramon-ruiz-mesa-oftalmologia.jpg",
		"principales_img" => "/files/img/oftalmologo2.jpg",
		"icon" => "/files/img/icons/oftalmologia.svg",
		"intro" => "Especialidad médica relacionada con las enfermedades del ojo, párpados y globo ocular.",
		"info" => "<p class='open-sans-reg third-font-gray'>La <span class='span-medium600'>oftalmología</span> se ocupa de diagnosticar y tratar las enfermedades de los ojos, globo ocular, sistema lagrimal y párpados. El objetivo de los oculistas, como popularmente se le llama, del <span class='span-medium600'>Hospital San Juan de Dios Sevilla</span> es conservar, restablecer, rehabilitar y promocionar una buena salud visual.</p>
					<p class='open-sans-reg third-font-gray'>Nuestro centro sanitario,  pone a disposición de todos los usuarios un cualificado equipo de profesionales para el correcto cuidado de los ojos. Para conseguirlo, además disponemos de la tecnología más avanzada, siempre con un servicio personalizado y adecuado a las necesidades de cada usuario.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla ofrece una asistencia oftalmología íntegra y de máxima calidad. El Dr. Ernesto Pereira es el coordinador de esta área. Cuenta con más de 20 años de <span class='span-medium600'>experiencia</span> y ha pasado por el Hospital de Valme de Sevilla durante dos décadas. Es especialista en patologías de la retina y de cataratas. Junto a él está la óptica, la Dra. Mar Cruces Casanueva.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>En nuestra primera planta del Hospital San Juan de Dios Sevilla pasamos consulta bajo demanda todas las semanas. Nuestros profesionales se ponen a disposición de todos los usuarios para revisiones, problemas puntuales o una primera asistencia, independientemente de la edad.  Nuestro equipo recomienda cuidar y revisar nuestros ojos, sobre todo cuando existen antecedentes familiares. Un <span='span-medium600'>diagnóstico precoz</span> puede ser clave para prevenir futuras patologías.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las consultas más comunes en oftalmología las cuales atendemos están:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-bold'>Blefaritis anterior y posterior:</span> Se trata de una inflamación crónica de los bordes palpebrales.</li>
							<li class='mt-2'><span class='span-bold'>Orzuelo:</span> Infección estafilocócica de las glándulas de Zeiss y Moll. Va acompañado de dolor, sensibilidad y edema del párpado.</li>
							<li class='mt-2'><span class='span-bold'>Conjuntivitis:</span> Patología infecciosa por bacterias o virus. Normalmente responden con rapidez al tratamiento correcto.</li>
							<li class='mt-2'><span class='span-bold'>Queratitis:</span> Son afecciones más habituales de la córnea. Hay de dos tipos: Centrales y periféricas.</li>
							<li class='mt-2'><span class='span-bold'>Glaucoma:</span> Se trata de una neuropatía óptica que se caracteriza por cambios morfológicos específicos. Normalmente, se producen alteraciones en el campo de visual y percepción de color.</li>
							<li class='mt-2'><span class='span-bold'>Endoftalmitis:</span> Es una Infección intraocular severa, asociada a disminución de la agudeza visual. Es una emergencia médica y puede producir un dolor intenso.</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"cardiologo-sevilla" => (object) [
		"title_especialidad" => "Cardiología",
		"seoTitle" => "San Juan de Dios Sevilla cardiología",
		"seoMeta" => "La unidad de cardiología del hospital del Hospital San Juan de Dios de Sevilla pone a disposición de todos los usuarios, cuenten con seguro privado o no, un equipo de profesionales de máximo nivel y eficacia.",
		"short_title" => "Cardiología",
		"img_main" => "/files/img/especialidadesImg/cardiologia/mariano-ruiz-borrell-cardiologia.jpg",
		"principales_img" => "/files/img/especialidades/cardiologia/cardiologo-sevilla.jpeg",
		"icon" => "/files/img/icons/cardiologia.svg",
		"intro" => "Especialidad médica encargada del estudio del corazón y los vasos sanguíneos que no abarca la cirugía.",
		"info" => "<p class='open-sans-reg third-font-gray'>La <span='span-medium600'>cardiología</span> se centra en el diagnóstico de patologías cardiovasculares de cualquier rango que afecta al corazón o a los grandes vasos y la prevención de factores de riesgo como <span='span-medium600'>hipertensión o diabetes.</span></p>
					<p class='open-sans-reg third-font-gray'>La unidad de cardiología del <span class='span-medium600'>Hospital San Juan de Dios Sevilla</span> cuenta con unos cualificados especialistas, con una gran trayectoria, reconocidos y formados en los últimos avances tecnológicos y en medicina nuclear.</p>
					<p class='open-sans-reg third-font-gray'>Esta área apuesta por una atención integral con unos nuevos medios diagnósticos que permiten valorar al usuario en un acto único, de forma rápida y con la máxima calidad.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>La unidad de cardiología del hospital de la Orden San Juan de Dios en Nervión pone a disposición de todos los usuarios, particulares o no, un equipo de profesionales de máximo nivel y eficacia. Actualmente son cinco médicos los que están en un área que coordina el Dr. Mariano Ruiz. Tanto él como otros compañeros acumulan años de experiencia dentro de la Orden.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla presenta un área de cardiología íntegra, con un personal cualificado, formado en las últimas técnicas para un correcto diagnóstico y tratamiento, así como unas nuevas instalaciones con todos los avances disponibles que nos convierten en un <span class='span-medium600'>hospital de referencia.</span></p>
							<p class='open-sans-reg third-font-gray mt-4'>A ello hay que sumarle los valores de la Orden San Juan de Dios. La atención que encuentras en nuestro centro hospitalario es modelo para todos los centros médicos, informando de todos los procedimientos desde el inicio, trato muy cercano y acordando todo con paciente y/o familia. En este sentido, disponemos de <span class='span-medium600'>Fides</span> que es una plataforma que te ayuda con todos los trámites. Es un servicio totalmente gratuito y disponible para todos los usuarios.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Otro punto a destacar son las consultas de <span class='span-medium600'>alta resolución.</span> Esto permite que los usuarios en una primera consulta puedan conocer el diagnóstico de su molestia o dolencia. Así se agilizan las fases y se llega antes a un tratamiento, favoreciendo la tranquilidad de todos los pacientes y familiares.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Ponemos quedarnos con las tres más comunes que se atienden en el Hospital San Juan de Dios Sevilla.</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Infartos.</li>
							<li class='mt-2'>Hipertensión arterial.</li>
							<li class='mt-2'>Arritmias.</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"digestivo-sevilla" => (object) [
		"title_especialidad" => "Aparato Digestivo",
		"seoTitle" => "Aparato digestivo Hospital San Juan de Dios Sevilla",
		"seoMeta" => "Contamos con la última tecnología para la prevención, detección y resolución de cualquier tipo de enfermedad relacionada con el aparato digestivo, así como un equipo multidisciplinar que atenderán al usuario de forma personalizada y adecuándose a la problemática del paciente, tanto con seguro privado como para particulares.",
		"short_title" => "Aparato Digestivo",
		"img_main" => "/files/img/doctores/Jose-Manuel-Infantes-Hernandez.png",
		"principales_img" => "/files/img/especialidades/aparatoDigestivo/Precio consulta Digestivo Privado.jpeg",
		"icon" => "/files/img/icons/digestivo.svg",
		"intro" => "Atención integral, diagnóstico y tratamiento de cualquier problema derivado con el aparato digestivo.",
		"info" => "<p class='open-sans-reg third-font-gray'>La unidad de aparato digestivo del Hospital San Juan de Dios Sevilla se encarga del estudio, diagnóstico y tratamiento de enfermedades relacionadas con el tracto gastrointestinal, hígado, páncreas y vías biliares, además de realizar colonoscopias y gastroscopias tanto para el diagnóstico como de manera terapéutica.</p>
					<p class='open-sans-reg third-font-gray'>Esta unidad está formada para proveer ayuda en todo lo concerniente a la salud digestiva, ofreciendo siempre las técnicas y medios diagnósticos más avanzados.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Contamos con la última tecnología para la prevención, detección y resolución de cualquier tipo de enfermedad relacionada con el aparato digestivo, así como un equipo multidisciplinar que atenderán al usuario de forma personalizada y adecuándose a la problemática del paciente.</p>
							<p class='open-sans-reg third-font-gray mt-4'>La unidad de Digestivo abarcará desde el inicio todas las subespecialidades incluida la unidad endo avanzada, liderada por la especialista Yolanda Torres.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las principales patologías que aborda la unidad de aparato digestivo son:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Enfermedades esofágicas y gástricas.</li>
							<li class='mt-2'>Enfermedades del colon y recto.</li>
							<li class='mt-2'>Enfermedades pancreáticas y hepáticas.</li>
							<li class='mt-2'>Enfermedades biliares.</li>
							<li class='mt-2'>Endoscopias digestivas.</li>
							<li class='mt-2'>Endoscopia alta y baja diagnóstica (gastroscopia y colonoscopia).</li>
							<li class='mt-2'>Ileocolonoscopia.</li>
							<li class='mt-2'>Gastroscopia terapéutica y colonoscopia terapéutica</li>
							<li class='mt-2'>Gastrostomía endoscópica percutánea</li>
							<li class='mt-2'>Enfermedades funcionales digestivas</li>
							<li class='mt-2'>Dispepsia funcional</li>
							<li class='mt-2'>Colon irritable</li>
							<li class='mt-2'>Trastornos por sensibilización al gluten</li>
							<li class='mt-2'>Intolerancia a la lactosa</li>
							<li class='mt-2'>Dietas para patologías en aparato digestivo: dietas sin gluten, dieta rica en fibra, dieta FODMAPs, etc.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>¿A qué pacientes está dirigido?</p>
						<p class='open-sans-reg third-font-gray mt-4'>Esta especialidad va dirigida a cualquier persona, independientemente de la edad, que necesite de detección, diagnóstico o recuperación de cualquier problema perteneciente a el aparato digestivo.</p>
						<p class='open-sans-reg third-font-gray mt-4'>Tanto particulares como personas que dispongan de seguro médico pueden disponer de este servicio previa cita. Igualmente contamos con convenios con las principales aseguradoras de nuestro país.</p>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"endocrino-sevilla" => (object) [
		"title_especialidad" => "Endocrinología",
		"seoTitle" => "Endocrino en Sevilla San Juan de Dios",
		"seoMeta" => "El servicio de Endocrinología y Nutrición del hospital San Juan de Dios de Sevilla oferta consulta de segunda opinión y casos complejos. Ofertamos un programa específico para personas que quieran tener un peso y una alimentación adecuada, que atienden de manera multidisciplinar endocrinólogos, dietistas, nutricionistas y psicólogos.",
		"short_title" => "Endocrinología",
		"img_main" => "/files/img/especialidadesImg/endocrinologia/dr-alfonso-soto-moreno.jpg",
		"principales_img" => "/files/img/especialidades/endocrino/endocrino en sevilla.jpeg",
		"icon" => "/files/img/icons/endocrinologia.svg",
		"intro" => "Atendemos pacientes con sobrepeso u obesidad, diabetes, nódulos tiroideos, hipo o hipertiroidismos, trastornos hormonales hipofisarios, ováricos, adrenales. Abarcamos la cartera de servicios completa de la especialidad.",
		"info" => "<p class='open-sans-reg third-font-gray'>La unidad de endocrinología del Hospital San Juan de Dios Sevilla está especializada en el diagnóstico y tratamiento de trastornos en el sistema endocrino. Incluye las glándulas y órganos encargados de elaborar hormonas.  Estos trastornos incluyen los problemas tiroideos, diabetes, infertilidad, suprarrenales y de la hipófisis.</p>
					<p class='open-sans-reg third-font-gray'>Centramos nuestros esfuerzos en resultados en salud, así como realizar investigaciones para comprender el funcionamiento del cuerpo humano y entender mejor las enfermedades que afectan a esta especialidad médica, siempre en conjunto con nuestro equipo multidisciplinar.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Disponemos de un equipo de especialistas con una amplia experiencia en alteraciones hormonales, glandulares y del metabolismo. Como cabeza visible del equipo de endocrinología se encuentra Alfonso Manuel Soto Moreno.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>El servicio de Endocrinología y Nutrición del hospital San Juan de Dios de Sevilla oferta consulta de segunda opinión y casos complejos, que atiende directamente su responsable, el Dr Soto Moreno, profesor de la especialidad en la universidad de Sevilla, investigador de reconocido prestigio y endocrinólogo con más de 20 años de experiencia profesional. </p>
							<p class='open-sans-reg third-font-gray mt-4'>También ofertamos un programa específico para personas que quieran tener un peso y una alimentación adecuada, que atienden de manera multidisciplinar endocrinólogos, dietistas, nutricionistas y psicólogos, que pretenden abordar de manera integral la relación con la comida y plantear soluciones globales. Este programa incluye tratamiento farmacológico o quirúrgico de la obesidad si es necesario.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las principales consultas que atendemos desde el Hospital San de Dios en el área de endocrinología son:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Consulta Dr Soto Moreno (segunda opinión y casos complejos)</li>
							<li class='mt-2'>Programa Peso y salud</li>
							<li class='mt-2'>Consulta Endocrinología General </li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"otorrino-sevilla" => (object) [
		"title_especialidad" => "Otorrinolaringología",
		"seoTitle" => "Otorrino en Sevilla en San Juan de Dios",
		"seoMeta" => "En el Hospital San Juan de Dios Sevilla contamos con una amplia experiencia en el diagnóstico y tratamiento de las enfermedades del aparato genitourinario. Para ello, además de contar con los mejores profesionales del ámbito, disponemos de la última tecnología desarrollada.",
		"short_title" => "Otorrinolaringología",
		"img_main" => "/files/img/especialidadesImg/otorrinolaringologia/jaime-ruiz-clemente-otorrino.jpg",
		"principales_img" => "/files/img/otorrino-privado-en-sevilla.jpeg",
		"icon" => "/files/img/icons/otorrino.svg",
		"intro" => "Enfermedades relacionadas con el oído, garganta y cuello.",
		"info" => "<p class='open-sans-reg third-font-gray'>La unidad de Otorrinolaringología del <span='span-medium600'>Hospital San Juan de Dios Sevilla</span> es la encargada del diagnóstico y el tratamiento médico de enfermedades del oído, garganta y cuello. Esta especialidad atiende aspectos de la vida de las personas que tienen que ver con el habla, la audición, la respiración y el equilibrio.</p>
					<p class='open-sans-reg third-font-gray'>El centro hospitalario de la Orden San Juan de Dios, ofrece una atención completa, con un equipo de profesionales cualificado en todas las subespecialidades de la <span='span-medium600'>otorrinolaringología.</span></p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Un total de seis profesionales lideran la unidad de otorrinolaringología del Hospital San Juan de Dios Sevilla. El coordinador de esta área es Jaime Ruiz Clemente, con más de quince años de experiencia y desde entonces lleva en la Orden San Juan de Dios, entre otras clínicas y hospitales. Además están junto a él, Pilar Gómez, Amparo Álvarez de Toledo, María José Hervías, Juan Antonio Ibáñez y Francisco Morote.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>La otorrinolaringología está destinada a todos los usuarios, desde niños a adultos, que tienen patología infecciosa, oncológica, traumática, congénita y degenerativa que se pueda producir en el <span='span-medium600'>oído</span>, fosas nasales, senos paranasales, faringe y laringe.</p>
							<p class='open-sans-reg third-font-gray mt-4'>La atención en San Juan de Dios Sevilla se lleva a cabo a través de consultas bajo demanda, revisiones, hospitalización e intervenciones quirúrgicas. Los especialistas de esta unidad destacan por este último, un equipo muy preparado y una amplia experiencia para todo tipo de intervenciones.</p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-bold'>Otitis:</span> Se produce una inflamación de alguna de las estructuras internas o externas que forman el oído. </li>
							<li class='mt-2'><span class='span-bold'>Amigdalitis:</span> Se trata de una inflamación de las amigdalitis que normalmente suele estar asociada a infecciones.</li>
							<li class='mt-2'><span class='span-bold'>Vértigo:</span> Es cada vez más común y frecuente en la población en general. Se trata de una afectación del laberinto (oído interno) y el nervio vestibular.</li>
							<li class='mt-2'><span class='span-bold'>Acúfenos:</span> También se le conoce o se manifiesta a través de zumbidos en los oídos. </li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	// "ostomia" => (object) [
	// 	"title_especialidad" => "Ostomía",
	// 	"short_title" => "Ostomía",
	// 	"img_main" => "/files/img/especialidades/ostomia/paciente ostomizado - ostomia colostomia urostomia.jpeg",
	// 	"principales_img" => "/files/img/especialidades/ostomia/pacientes ostomizados - ostomia colostomia urostomia.jpeg",
	// 	"icon" => "/files/img/icons/ostomia.png",
	// 	"intro" => "Trabajamos para la adaptación a la vida después de una ileostomía, colostomía u ostomías digestivas.",
	// 	"info" => "<p class='open-sans-reg third-font-gray'>Una ostomía es una abertura de manera artificial (estoma) realizada de manera quirúrgica, para permitir el paso de la orina y las heces. Se usa para el tratamiento de ciertas enfermedades de los sistemas urinarios o digestivos como por ejemplo un cáncer, una enfermedad inflamatoria intestinal o traumatismos, entre otros. </p>
	// 				<p class='open-sans-reg third-font-gray'>Distinguimos, según el órgano sobre el que se intervenga, las siguientes: </p>
	// 				<ul class='open-sans-reg third-font-gray mt-4'>
	// 					<li class='mt-2'>Colostomía: se une al abdomen el colon o intestino grueso.</li>
	// 					<li class='mt-2'>Ileostomía: se exterioriza el intestino delgado. </li>
	// 					<li class='mt-2'>Ostomías digestivas: Su fin es la eliminación de las heces.</li>
	// 				</ul>
	// 				<p class='open-sans-reg third-font-gray'>El objetivo del Hospital San Juan de Dios Sevilla, es resolver dudas que se puedan plantear respecto a la cirugía y los cuidados de los pacientes tanto recién operados, como los que se están adaptando al estoma. </p>
	// 				<p class='open-sans-reg third-font-gray'>Las dudas más frecuentes son las relacionadas con el tipo de estoma que portarán, así como las cuestiones relacionadas con la alimentación, el deporte o actividades de la vida diaria. </p>",
	// 	"profesionales_title" => "",
	// 	"profesionales_info" => "",
	// 	"servicios_title" => "Servicios diferenciales",
	// 	"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla prestamos una atención integral para pacientes y usuarios portadores de ostomías, garantizando su continuidad asistencial y mejorando su calidad de vida. </p>
	// 						<p class='open-sans-reg third-font-gray mt-4'>Trabajamos en conjunto con los facultativos de otras especialidades en las que se integran los servicios de cirugía general, digestiva y de urología. </p>
	// 						<p class='open-sans-reg third-font-gray mt-4'>Desde nuestro centro tratamos a decenas de pacientes que requieren de una ostomía tras ser intervenidos quirúrgicamente por enfermedades intestinales o urológicas, así como cáncer de colon y recto. Es para nuestra entidad una apuesta firme para completar la atención a nivel oncológico que presta el Hospital San Juan de Dios Sevilla. </p>",
	// 	"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
	// 						<li class='mt-2'>Cáncer</li>
	// 						<li class='mt-2'>Enfermedad inflamatoria intestinal (EII), como la enfermedad de Crohn o la colitis ulcerosa.</li>
	// 						<li class='mt-2'>Obstrucción intestinal</li>
	// 						<li class='mt-2'>Infección</li>
	// 						<li class='mt-2'>Incontinencia fecal (incapacidad para controlar los movimientos intestinales)</li>
	// 						<li class='mt-2'>Enfermedad diverticular (pequeñas protuberancias o sacos que se forman en la pared del intestino grueso)</li>
	// 					</ul>",
	// 	"destacado" => true,
	// 	"fake_link" => false,
	// 	"btn_servicio" => false
	// ],
	"rehabilitacion-sevilla" => (object) [
		"title_especialidad" => "Rehabilitacion",
		"seoTitle" => "Centro rehabilitación San Juan de Dios",
		"seoMeta" => "Desde el Hospital San Juan de Dios Sevilla ponemos a tu disposición un equipo de profesionales con alta experiencia y cualificación en el tratamiento y diagnóstico de patologías neurológicas, postquirúrgica, atención a lesionados por diversos motivos y lesiones deportivas.",
		"short_title" => "Rehabilitacion",
		"img_main" => "/files/img/especialidades/rehabilitacion/centro rehabilitacion sevilla.jpeg",
		"principales_img" => "/files/img/especialidades/rehabilitacion/clinica de rehabilitacion en sevilla.jpeg",
		"icon" => "/files/img/icons/rehabilitacion.svg",
		"intro" => "Cuidado que reciben los pacientes para recuperar, mantener o mejorar las capacidades necesarias para la vida diaria.",
		"info" => "<p class='open-sans-reg third-font-gray'>La rehabilitación es un conjunto de métodos y técnicas que sirven para recuperar el funcionamiento normal de alguna función o actividad del cuerpo que se ha perdido como consecuencia de alguna enfermedad o accidente. Interviene principalmente sobre los siguientes aspectos de la enfermedad:</p>
					<ul class='open-sans-reg third-font-gray mt-4'>
						<li class='mt-2'>La deficiencia, que hace referencia al conjunto de secuelas patológicas o físicas de un órgano o aparato que son producidas por enfermedades o déficit sensorial.</li>
						<li class='mt-2'>La discapacidad, conocida como restricción o ausencia de función, se traduce en la dificultad para realizar una tarea o actividad que se considera cotidiana o normal.</li>
					</ul>
					<p class='open-sans-reg third-font-gray'>Nuestro centro dispone de un equipo de médicos altamente cualificados y con la mejor tecnología disponible para que el paciente adquiera su plenitud y vuelva a recuperar la calidad de vida previa a su lesión y/o enfermedad.</p>",
		"profesionales_title" => "",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'></p>",
		"servicios_title" => "Servicios Diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla ponemos a tu disposición un equipo de profesionales con alta experiencia y cualificación en el tratamiento y diagnóstico de patologías neurológicas, postquirúrgica, atención a lesionados por diversos motivos y lesiones deportivas. </p>
							<p class='open-sans-reg third-font-gray mt-4'>Nuestros especialistas le atenderán de forma personalizada, asesorando y facilitando toda la información para que la recuperación sea lo más exitosa y rápida posible. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las causas más comunes por las que se acude a rehabilitación y las que mayormente atendemos desde el Hospital San Juan de Dios son: </p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Lesiones cerebrales traumáticas, fracturas, quemaduras o lesiones de la médula espinal.</li>
							<li class='mt-2'>Cirugías mayores.</li>
							<li class='mt-2'>Infecciones graves. </li>
							<li class='mt-2'>Accidentes cerebrovasculares. </li>
							<li class='mt-2'>Trastornos de desarrollo. </li>
							<li class='mt-2'>Dolores crónicos (espalda, cuello…)</li>
							<li class='mt-2'>Efectos secundarios derivados de tratamientos médicos.</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"alergologo-sevilla" => (object) [
		"title_especialidad" => "Alergología",
		"seoTitle" => "Alergólogo Sevilla San Juan de Dios",
		"seoMeta" => "El servicio de alergología del Hospital San Juan de Dios ofrece una atención basada en el trato personalizado, apoyado siempre por los mejores profesionales y su experiencia, así como los equipamiento más modernos y la tecnología más actualizada.",
		"short_title" => "Alergología",
		"img_main" => "/files/img/especialidadesImg/alergologia/fatima-jurado-palma-alergologia.jpg",
		"principales_img" => "/files/img/especialidades/alergologia/pruebas de la alergia sevilla.jpg",
		"icon" => "/files/img/icons/alergologia.svg",
		"intro" => "Unidad médica dedicada al diagnóstico y posterior tratamiento de enfermedades alérgicas de distinta índole. ",
		"info" => "<p class='open-sans-reg third-font-gray'>La alergología es la especialidad médica encargada del diagnóstico y tratamiento de las enfermedades de base alérgica producidas como respuesta por parte del sistema inmunológico a determinadas sustancias. Las alergias más comunes son principalmente las alergias respiratorias, a los alimentos, a los fármacos, venenos o urticaria y dermatitis. </p>
					<p class='open-sans-reg third-font-gray'>En la actualidad se ha producido un gran aumento de patologías alérgicas que reducen la calidad de vida de las personas afectadas, limitando su actividad física, dieta o el uso de fármacos entre otros ejemplos.</p>
					<p class='open-sans-reg third-font-gray'>Si sufres alguno de los síntomas habituales de una alergia, en el Hospital San Juan de Dios Sevilla, puedes consultar con un especialista solicitando <a href='/pedir-cita'><span class='span-medium600 link-blog'>cita previa</span></a> y realizarte las pruebas necesarias para poder determinar a qué alérgenos eres hipersensible, así como es el tratamiento más adecuado en función del tipo de alergia. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como jefa de equipo del Hospital San Juan de Dios Sevilla en el área de alergología se encuentra Fátima Jurado Palma. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios, trabajamos para ofrecer a nuestros usuarios la atención más rápida y eficaz, ya que consideramos que es necesario agilizar la detección de la alergia para actuar sobre la misma lo antes posible. </p>
							<p class='open-sans-reg third-font-gray mt-4'>El servicio de alergología del Hospital San Juan de Dios ofrece una atención basada en el trato personalizado, apoyado siempre por los mejores profesionales y su experiencia, así como los equipamiento más modernos y la tecnología más actualizada. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Rinitis /rinoconjuntivitis</li>
							<li class='mt-2'>Asma de causa alérgica o no alérgicas </li>
							<li class='mt-2'>Dermatitis atópicas y de contacto</li>
							<li class='mt-2'>Urticarias y Angioedemas</li>
							<li class='mt-2'>Alergia a alimentos</li>
							<li class='mt-2'>Alergia a medicamentos</li>
							<li class='mt-2'>Alergia a venenos de himenópteros e insectos</li>
							<li class='mt-2'>Alergia a látex y anisakis</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"cirugia-bariatrica-sevilla" => (object) [
		"title_especialidad" => "Cirugía Bariátrica",
		"seoTitle" => "Cirugía Bariátrica y Obesidad en Sevilla",
		"seoMeta" => "En la Unidad de Cirugía Bariátrica del Hospital San Juan de Dios de Sevilla, tratamos al paciente con una mirada multidisciplinar con el objetivo de ofrecerle un diagnóstico personalizado. Nuestro propósito es que puedas perder peso de una manera saludable, controlada y segura.",
		"short_title" => "Cirugía Bariátrica",
		"img_main" => "/files/img/especialidadesImg/cirugiaBariatrica/antonio-barranco-cirugia-obesidad.jpg",
		"principales_img" => "/files/img/especialidades/cirugiaBariatrica/doctor-obesidad.jpg",
		"icon" => "/files/img/icons/cirugia-bariatrica.svg",
		"intro" => "​​Conjunto de procedimientos quirúrgicos usados para tratar la obesidad, buscando disminución del peso corporal y como alternativa al tratamiento con otros medios no quirúrgicos. ",
		"info" => "<p class='open-sans-reg third-font-gray lh-lg'>
		La cirugía bariátrica es un conjunto de técnicas quirúrgicas que pueden emplearse para tratar la obesidad mórbida, es decir, aquellos pacientes que tienen un Índice de Masa Corporal superior a 40. Se utiliza cuando otros métodos no han dado resultados, sobre todo en caso de dietas. No obstante, se empleará la cirugía bariátrica y se complementará de dietas y una educación en el paciente, para que aprenda a llevar hábitos de vida y alimentación saludables.</p>
					<p class='open-sans-reg third-font-gray lh-lg'>Hay distintos tipos de cirugía bariátrica, según cuál sea el objetivo que quiera conseguir y el tipo de técnica empleada. Podemos destacar las siguientes:</p>
					<ul class='open-sans-reg third-font-gray lh-lg'>
						<li>
						Banda gástrica: colocación de un banda de silicona con un anillo inflable alrededor del estómago, que permite disminuir su tamaño y reducir la cantidad de alimentos que puede ingerir una persona. 
						</li>
						<li>
						Bypass gástrico: es una cirugía invasiva, donde se retira gran parte del estómago y que permite tanto la reducción de ingesta de alimentos, así como la disminución de la absorción de nutrientes.
						</li>
						<li>
						Manga gástrica: técnica empleada en la que se reduce el volumen del estómago en torno a un 80% y que permite reducir el apetito, así como producir una sensación prematura de saciedad.
						</li>
					</ul>
					",


		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como jefe de equipo del Hospital San Juan de Dios Sevilla en el área de cirugía bariátrica se encuentra el Dr. Antonio Jose Barranco Moreno. </p>",
		"servicios_title" => "Servicios diferenciales ",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>En la Unidad de Cirugía Bariátrica del Hospital San Juan de Dios de Sevilla, tratamos al paciente con una mirada multidisciplinar con el objetivo de ofrecerle un diagnóstico personalizado, ajustado a sus características físicas y psicosociales, para asegurar el éxito en todos y cada uno de los tratamientos aplicados.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Nuestro propósito es que puedas perder peso de una manera saludable, controlada y segura, ya sea mediante dietas que te ayuden a eliminar los kilos sobrantes o bien mediante técnicas quirúrgicas y endoscópicas para el tratamiento de una obesidad excesiva o mórbida. Para ello, se realizará un estudio individualizado de tu caso.	</p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Bypass</li>
							<li class='mt-2'>Laparoscopia</li>
							<li class='mt-2'>Obesidad</li>
							<li class='mt-2'>Reducción estomago</li>

						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"cirugia-general-sevilla" => (object) [
		"title_especialidad" => "Cirugía General",
		"seoTitle" => "Cirugía general San Juan de Dios Sevilla",
		"seoMeta" => "La unidad de cirugía y del aparato digestivo la integra un grupo médico especializado con muchos años de trayectoria. Nuestro equipo es especialista en cirugías digestivas, fundamentalmente de los órganos hígado y páncreas.",
		"short_title" => "Cirugía General",
		"img_main" => "/files/img/especialidadesImg/cirugiaGeneral/miguel-angel-gomez-bravo-cirugia-general.jpg",
		"principales_img" => "/files/img/especialidades/cirugiaGeneral/cita cirujano general en Sevilla.jpeg",
		"icon" => "/files/img/icons/cirujia.svg",
		"intro" => "Rama de la cirugía que cubre las áreas principales de tratamientos quirúrgicos y tratan enfermedades del abdomen, la mama, cabeza, cuello y aparato digestivo.",
		"info" => "<p class='open-sans-reg third-font-gray'>La <span class='span-medium600'>cirugía general</span> trata todas las dolencias que pertenecen al área tronco-abdominal, fundamentalmente. Se ocupa de la prevención, diagnóstico y tratamiento de enfermedades del aparato digestivo, partes blandas, mama o sistema endocrino.</p>
					<p class='open-sans-reg third-font-gray'>La unidad de Cirugía general del <span class='span-medium600'>Hospital San Juan de Dios Sevilla</span> está formada por profesionales multidisciplinar de cirujanos generales. Cada médico posee una formación específica en las diferentes afecciones, lo que permite un alto grado de especialización y de calidad para los usuarios.</p>
					<p class='open-sans-reg third-font-gray'>Además, se trabaja en estrecha colaboración con otros equipos de médicos especialistas.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>La unidad de cirugía y del aparato digestivo la integra un grupo médico especializado con muchos años de trayectoria. El coordinador de esta área es el Dr. Miguel Ángel Gómez Bravo, acumula más de 30 años de experiencia. Especialista en cirugías digestivas, fundamentalmente de los órganos hígado, páncreas y <span class='span-medium600'>trasplante de órganos.</span></p>
								<p class='open-sans-reg third-font-gray mt-4'>Por su parte, Carmen Barroso es la supervisora de quirófano. El personal que componen la zona quirúrgica está formado y capacitado para cualquier tipo de urgencia o intervención.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios utilizamos técnicas innovadoras, como la utilización del <span class='span-medium600'>verde indocianina</span> en las intervenciones y un sistema de esterilización que no permite el paso del limpio al sucio.</p>
							<p class='open-sans-reg third-font-gray mt-4'>También cabe destacar una zona de <span class='span-medium600'>Cirugía Mayor Ambulatoria</span>, ya que son cada vez más  las intervenciones que se realizan de este tipo, por lo que su integración con la cirugía general es indispensable. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las intervenciones más habituales están:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-medium600'>Hernias, tumores</span> benignos y malignos.</li>
							<li class='mt-2'>Pólipos, fisuras, hemorroides, <span class='span-medium600'>fístulas</span> y suelo pélvico.</li>
							<li class='mt-2'>Tiroideo, apendicitis agudas, traumatismos, hemorragias y todo tipo de cirugías menores.</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"cirugia-plastica-sevilla" => (object) [
		"title_especialidad" => "Cirugía Plástica, Reparadora y Estética",
		"seoTitle" => "Cirugía Plástica San Juan de Dio de Sevilla",
		"seoMeta" => "Desde el Hospital San Juan de Dios de Sevillar realizamos siempre nuestras intervenciones con un manejo meticuloso y cuidadoso de los tejidos así como la aplicación de medidas específicas durante la intervención y el postoperatorio. Gracias a nuestras técnicas conseguimos reducir la inflamación y lograr una pronta recuperación del paciente.",
		"short_title" => "Cirugía Plástica, Reparadora y Estética",
		"img_main" => "/files/img/especialidades/oncologia/dr-ruiz-moya-san-juan-de-dios-sevilla.jpg",
		"principales_img" => "/files/img/especialidades/oncologia/mejores oncologos en sevilla.jpeg",
		"icon" => "/files/img/icons/oncologia-medica.svg",
		"intro" => "Especialidad médica encargada de la restauración quirúrgica de la autonomía y función de los tejidos blandos dañados por procesos tumorales, congénitos o traumáticos. Corrección de los cambios en dichos tejidos buscando el rejuvenecimiento y la mejora estética.",
		"info" => "<p class='open-sans-reg third-font-gray'>La Cirugía Plástica es una especialidad quirúrgica que se ocupa de la corrección de todo proceso congénito, adquirido, tumoral o simplemente involutivo, que requiera reparación o reposición, o que afecte a la forma y/o función corporal. Sus técnicas están basadas en el trasplante y la movilización de tejidos mediante injertos y colgajos o incluso implantes de material inerte.  </p>
					<p class='open-sans-reg third-font-gray'>Podemos distinguir entre la cirugía plástica reparadora y la cirugía plástica estética. La cirugía plástica reparadora, procura restaurar o mejorar la función y el aspecto físico en las lesiones causadas por accidentes y quemaduras, enfermedades y tumores de la piel y en anomalías o deformación de cara, manos y genitales principalmente.</p>
					<p class='open-sans-reg third-font-gray'>La cirugía plástica estética, trata con pacientes sanos cuyo objetivo es la corrección de alteraciones estéticas con la finalidad de obtener una mayor armonía facial y corporal o las secuelas del envejecimiento. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como jefe de equipo de cirugía plástica, reparadora y estética se encuentra el Dr. Ruiz Moya.</p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios contamos con la figura del Dr. Alejandro Ruiz Moya que es un referente a nivel nacional en cirugía estética y que se ha formado y trabajado en clínicas de Nueva York, Madrid o Barcelona.</p>
		<p class='open-sans-reg third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, tu hospital privado de referencia, tenemos a disposición de todos los usuarios y pacientes las mejores instalaciones de Sevilla donde contamos con todas las comodidades y la última tecnología de vanguardia para cualquier tipo de cirugía estética.</p>
		<p class='open-sans-reg third-font-gray mt-4'>Desde la especialidad de cirugía plástica, contarás con un asesoramiento cercano y profesional donde estudiaremos tu caso de manera personalizada y ofrecemos la mejor solución, siempre respetando tu cuerpo y consiguiendo resultados naturales en la forma y el movimiento, acorde al cuerpo de cada paciente.</p>
		<p class='open-sans-reg third-font-gray mt-4'>Después de tu operación, realizaremos un seguimiento continuado y controlado, asegurándonos de que obtengas el mejor resultado y la mayor seguridad.</p>
		",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las cirugías más demandadas desde la especialidad de cirugía plástica del Hospital San Juan de Dios de Sevilla son las siguientes:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Aumento de pecho: mayor tamaño y volumen de pecho mediante prótesis mamarias de silicona.</li>
							<li class='mt-2'>Elevación de mamas: corrección de pechos por debajo de lo natural.</li>
							<li class='mt-2'>Reducción de mamas: eliminando su exceso de volumen y corrigiendo su posición.</li>
							<li class='mt-2'>Abdominoplastia: cirugía para abdomen con exceso de piel y grasa.</li>
							<li class='mt-2'>Complicaciones en implantes mamarios: resolver cirugías con complicaciones, malos resultados estéticos, etc.</li>
							<li class='mt-2'>Blefaroplastia: corrección de las bolsas de los ojos y exceso de piel.</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"urologo-sevilla" => (object) [
		"title_especialidad" => "Urología",
		"seoTitle" => "Urología San Juan de Dios en Sevilla",
		"seoMeta" => "Desde el Hospital San Juan de Dios Sevilla contamos con una amplia experiencia en el diagnóstico y tratamiento de las enfermedades del aparato genitourinario. Para ello, además de contar con los mejores profesionales en urología, disponemos de la última tecnología desarrollada y nuestra atención centrada en la persona y su contexto.",
		"short_title" => "Urología",
		"img_main" => "/files/img/especialidadesImg/urologia/jaim-bachiller-burgos-urologia.jpg",
		"principales_img" => "/files/img/especialidades/urologia/mejor urologo de sevilla precio.jpeg",
		"icon" => "/files/img/icons/urologia.svg",
		"intro" => "Enfermedades relacionadas con el aparato urinario de la mujer y hombre y aparato genital del último.",
		"info" => "<p class='open-sans-reg third-font-gray'>La urología es la especialidad médico quirúrgica encargada del estudio, prevención, diagnóstico y tratamiento de las patologías que afectan al aparato urinario, glándulas suprarrenales, así como las enfermedades relacionadas con el aparato genital masculino.</p>
					<p class='open-sans-reg third-font-gray'>Como ámbito anatómico de actuación, contempla el riñón y sus estructuras adyacentes, el aparato genital masculino y las vías urinarias, atendiendo las disfunciones de dichos órganos y estructuras. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como referente en la especialidad de urología del Hospital San Juan de Dios se encuentra Jaime Bachiller Burgos. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla contamos con una amplia experiencia en el diagnóstico y tratamiento de las enfermedades del aparato genitourinario. Para ello, además de contar con los mejores profesionales del ámbito, disponemos de la última tecnología desarrollada y nuestra atención centrada en la persona y su contexto. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'></p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Infecciones urinarias.</li>
							<li class='mt-2'>Problemas prostáticos.</li>
							<li class='mt-2'>Piedras en el riñón.</li>
							<li class='mt-2'>Disfunción eréctil.</li>
							<li class='mt-2'>Cólicos renales.</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"neurologo-sevilla" => (object) [
		"title_especialidad" => "Neurología",
		"seoTitle" => "Neurólogo en Sevilla en Hospital San Juan de Dios",
		"seoMeta" => "La neurología es la especialidad médica encargada del diagnóstico y tratamiento de enfermedades relacionadas con el sistema nervioso, la médula, el cerebro, los nervios periféricos y los músculos. Contamos con los mejores neurólogos de Sevilla.",
		"short_title" => "Neurología",
		"img_main" => "/files/img/doctores/Felix-Viñuela.png",
		"principales_img" => "/files/img/especialidades/neurologia/neurologia-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/neurologia.svg",
		"intro" => "Estudio de la estructura, función y desarrollo del sistema nervioso. ",
		"info" => "<p class='open-sans-reg third-font-gray'>La neurología es la especialidad médica encargada del diagnóstico y tratamiento de enfermedades relacionadas con el sistema nervioso, la médula, el cerebro, los nervios periféricos y los músculos. </p>
					<p class='open-sans-reg third-font-gray'>Es uno de los campos de la medicina que más se ha desarrollado en los últimos años. Se trata de una especialidad médica muy dinámica y en continua expansión debido a los diversos avances en el campo de la neurociencia.</p>
					<p class='open-sans-reg third-font-gray'>Estos avances están permitiendo el tratamiento de un gran número de enfermedades neurológicas, así como generando nuevas alternativas terapéuticas. </p>",
		"profesionales_title" => "",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'></p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Nuestros neurólogos colaboran con expertos en numerosas especialidades para brindar una atención médica integral.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Un equipo de especialistas escuchará tus necesidades y evaluará tu afección desde todos los ángulos antes de desarrollar un plan de tratamiento personalizado de acuerdo con tus objetivos. Los resultados de las pruebas están disponibles rápidamente, y los horarios de las <a href='/pedir-cita'><span class='span-medium600 link-blog'>citas</span></a> están coordinados.</p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Alzheimer.</li>
							<li class='mt-2'>Parkinson.</li>
							<li class='mt-2'>Otras alteraciones causadas por enfermedades cerebrovasculares.</li>
							<li class='mt-2'>Epilepsia.</li>
							<li class='mt-2'>Neuropatías.</li>
							<li class='mt-2'>Traumatismos craneoencefálicos.</li>
							<li class='mt-2'>Migrañas.</li>
							<li class='mt-2'>Insomnio.</li>
							<li class='mt-2'>Epilepsia.</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	/* Comentar hasta nuevo aviso */
	/* 	"neumologo-sevilla" => (object) [
		"title_especialidad" => "Neumología",
		"seoTitle" => "Neumologia y aparato respiratorio Sevilla",
		"seoMeta" => "En el Hospital San Juan de Dios de Sevilla contamos con un equipo de profesionales médicos especializados en neumología con una amplia experiencia en diagnóstico y tratamiento tanto de enfermedades agudas como crónicas que afectan al sistema respiratorio, así como la última tecnología disponible.",
		"short_title" => "Neumología",
		"img_main" => "/files/img/especialidades/neumologia/neumologo privado sevilla.jpeg",
		"principales_img" => "/files/img/especialidades/neumologia/neumologo infantil sevilla.jpeg",
		"icon" => "/files/img/icons/neumologia.svg",
		"intro" => "Estudio de las enfermedades relacionadas con el aparato respiratorio. Contamos con los medios diagnósticos más avanzados para la prevención y el tratamiento de enfermedades del sistema respiratorio.",
		"info" => "<p class='open-sans-reg third-font-gray'>La neumología es la especialidad médica encargada del estudio de las enfermedades relacionadas con el aparato respiratorio y se centra principalmente en el diagnóstico, tratamiento y prevención de las enfermedades del pulmón, el mediastino y la pleura. </p>",
		"profesionales_title" => "",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'></p>
								<p class='open-sans-reg third-font-gray mt-4'></p>
								<p class='open-sans-reg third-font-gray mt-4'></p>",
		"servicios_title" => "Servicios diferenciales ",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Contamos con un equipo de profesionales con una amplia experiencia en diagnóstico y tratamiento tanto de enfermedades agudas como crónicas que afectan al sistema respiratorio, así como la última tecnología disponible.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Nuestro objetivo es prestar una asistencia de calidad al paciente, a través de la realización de las pruebas diagnósticas necesarias, para detectar y solventar las problemáticas que afectan al sistema respiratorio. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las principales consultas que atendemos desde el Hospital San de Dios en el área de neumología son: </p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Neumonias. </li>
							<li class='mt-2'>Asma bronquial.</li>
							<li class='mt-2'>Apnea bronquial.  </li>
							<li class='mt-2'>Cáncer de pulmón.</li>
							<li class='mt-2'>Fibrosis quística. </li>
							<li class='mt-2'>Pleuritis. </li>
							<li class='mt-2'>Bronquitis. </li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	], */
	"dermatologo-sevilla" => (object) [
		"title_especialidad" => "Dermatología",
		"seoTitle" => "Dermatólogo Sevilla en San Juan de Dios",
		"seoMeta" => "El Hospital San Juan de Dios de Sevilla dispone de atención integral al paciente con cáncer de piel, ofrecida por profesionales con experiencia contrastada, con un amplio curriculum en investigación, docencia e innovación en este campo. Nuetro equipo está formado por los mejores dermatólogos.",
		"short_title" => "Dermatología",
		"img_main" => "/files/img/doctores/perfil_especialista_sjdsevilla.jpg",
		"principales_img" => "/files/img/especialidades/dermatologia/dermatologia-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/dermatologia.svg",
		"intro" => "Atención personalizada del paciente con trastornos en la piel, pelo y uñas, lo que incluye actuar en la prevención, diagnóstico, tratamiento y cuidados generales. ",
		"info" => "<p class='open-sans-reg third-font-gray'>La dermatología es la especialidad médica destinada al estudio, diagnóstico y tratamiento de todas aquellas afecciones o patologías de la piel. Igualmente otra de las funciones de la dermatología es la prevención de enfermedades y el cuidado cotidiano de la piel, siendo el objetivo principal proteger la piel de agentes externos o internos que puedan dañarla.</p>
					<p class='open-sans-reg third-font-gray'>Podemos diferenciar varias ramas dentro de la dermatología: </p>
					<ul class='open-sans-reg third-font-gray mt-4'>
						<li class='mt-2'>Dermatología clínica: prevención, diagnóstico y tratamiento de todas las patologías cutáneas como el acné, lunares, dermatitis… </li>
						<li class='mt-2'>Dermatología estética: rama de la dermatología centrada en mejorar la piel de las personas sin patologías cutáneas. </li>
						<li class='mt-2'>Dermatología pediátrica: se encarga de tratar las afecciones que afectan a la piel de los más pequeños. Atiende a los niños desde el nacimiento hasta el final de la adolescencia. </li>
					</ul>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla, ofrecemos un tratamiento integral dentro de todas las ramas de la dermatología, garantizando en todo momento la calidad y la seguridad del paciente. </p>
							<p class='open-sans-reg third-font-gray mt-4'>El diagnóstico y tratamiento del cáncer de piel es el campo de la dermatología en que los profesionales del Hospital San Juan de Dios Sevilla cuentan con más experiencia, así como un reconocido liderazgo nacional e internacional. </p>
							<p class='open-sans-reg third-font-gray mt-4'>En este sentido, el Hospital San Juan de Dios Sevilla dispone de atención integral al paciente con cáncer de piel, ofrecida por profesionales con experiencia contrastada, con un amplio curriculum en investigación, docencia e innovación en este campo. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Dermatitis atópica</li>
							<li class='mt-2'>Alergias y urticaria</li>
							<li class='mt-2'>Infecciones en la piel por hongos o por levadura</li>
							<li class='mt-2'>Vitiligo</li>
							<li class='mt-2'>Acné</li>
							<li class='mt-2'>Melanomas y distintos tipos de cáncer de piel</li>
							<li class='mt-2'>Hiperpigmentación, rosácea o angiomas</li>
							<li class='mt-2'>Epiteliomas</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],

	"cirugia-maxilofacial-sevilla" => (object) [
		"title_especialidad" => "Cirugía Maxilofacial",
		"seoTitle" => "Cirugía maxilofacial San Juan de Dios en Sevilla",
		"seoMeta" => "Desde el Hospital San Juan de Dios ponemos a su disposición un equipo de profesionales con amplia experiencia y alta cualificación en atención a pacientes con patología Oral y Maxilofacial. Trabajamos con los mejores cirujanos maxilofaciales de Sevilla.",
		"short_title" => "Cirugía Maxilofacial",
		"img_main" => "/files/img/especialidadesImg/cirugiaMaxilofacial/cirugia-maxilofacial-sevilla.jpg",
		"principales_img" => "/files/img/especialidades/cirugiaMaxilofacial/cirugia-maxilofacial-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/cirugia-maxilo.svg",
		"intro" => "La cirugía maxilofacial engloba diferentes intervenciones encaminadas a corregir los problemas relacionados con la estructura facial.",
		"info" => "<p class='open-sans-reg third-font-gray'>La cirugía maxilofacial, se centra en el estudio, prevención, diagnóstico, tratamiento y rehabilitación de las patologías relacionadas con la cara, el cuello, el cráneo, tanto los tejidos blandos como los huesos. </p>
					<p class='open-sans-reg third-font-gray'>Este tipo de cirugía se aplica para dar solución a los problemas estéticos y funcionales que son causados por las deformidades del esqueleto facial que provoca un posición incorrecta y contacto entre los dientes.</p>
					<p class='open-sans-reg third-font-gray'>Trata también las afecciones de las glándulas salivales y las alteraciones de la mucosidad de la boca, así como corregir las alteraciones que impiden masticar, hablar, respirar y mejoras en la apariencia estética del paciente.  </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Destacan en esta especialidad Beatriz Albarracin Arjona y Pablo Manuel Rodríguez Jara. </p>",
		"servicios_title" => "Servicios Diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios ponemos a su disposición un equipo de profesionales con amplia experiencia y alta cualificación en atención a pacientes con patología Oral y Maxilofacial.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Nuestro equipo le atenderá de forma personalizada tanto en cualquier consulta como en la hospitalización, además de ofrecer un amplio catálogo de realización de pruebas complementarias, mejorando la calidad en la atención y el pronóstico, permitiendo el ahorro de tiempo a nuestros pacientes. </p>
							<p class='open-sans-reg third-font-gray mt-4'>Desde la unidad de Cirugía Maxilofacial, y a través de nuestro equipo multidisciplinar, trabajamos en continuo contacto con las unidades de Neurocirugía y Otorrinolaringología, permitiéndonos dar mejores respuestas a los casos más complejos. </p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Las principales patologías que aborda la unidad de cirugía maxilofacial son: </p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Problemas funcionales y estéticos causados por deformidades del esqueleto facial. </li>
							<li class='mt-2'>Asimetría mandibular. </li>
							<li class='mt-2'>Maxilar inferior retrasado. </li>
							<li class='mt-2'>Mandíbula alargada. </li>
							<li class='mt-2'>Mordida abierta. </li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"hematologo-sevilla" => (object) [
		"title_especialidad" => "Hematología y Hemoterapia",
		"seoTitle" => "Servicio de hematología en Sevilla",
		"seoMeta" => "Los profesionales del servicio de hematología de San Juan de Dios de Sevilla poseen un alto grado de formación y experiencia, así como disponen de las instalaciones y equipos tecnológicos más avanzados para desempeñar sus funciones.",
		"short_title" => "Hematología y Hemoterapia",
		"img_main" => "/files/img/especialidades/hematologia/irene-jara-lopez-hemoterapia.jpg",
		"principales_img" => "/files/img/especialidades/hematologia/hematologia-hemoterapia-san-juan-de-dios-sevilla-especialidad.jpg",
		"icon" => "/files/img/icons/hematologia.svg",
		"intro" => "",
		"info" => "<p class='open-sans-reg third-font-gray'>La hematología es la rama de la medicina encargada de las enfermedades relacionadas con la sangre y los órganos que la conforman. Trata del estudio de la sangre así como la prevención, diagnóstico y tratamiento de cualquier enfermedad relacionada con la misma. </p>
					<p class='open-sans-reg third-font-gray'>Por su parte la hemoterapia, es una parte de la medicina que se encarga de la recolección de una cantidad predeterminada de sangre de una persona para posteriormente ser transfundida, previo procesamiento y análisis, a otra, con el fin de mejorar su salud. </p>
					<p class='open-sans-reg third-font-gray'>Es una de las disciplinas que más se ha desarrollado en conocimiento y tecnología en las últimas décadas, facilitando el desarrollo de pautas más adecuadas para la atención en esta área.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'></p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla, realizamos los estudios necesarios para establecer un adecuado diagnóstico, tratamiento y seguimiento de las patologías o enfermedades específicas de cada paciente. </p>
							<p class='open-sans-reg third-font-gray mt-4'>Los profesionales del servicio de hematología poseen un alto grado de formación y experiencia, así como disponen de las instalaciones y equipos tecnológicos más avanzados para desempeñar sus funciones.</p>
							<p class='open-sans-reg third-font-gray mt-4'>Igualmente, como en el resto de especialidades, trabajan con un equipo multidisciplinar con el objetivo de ofrecer a los pacientes una atención rápida y personalizada tanto de manera ambulatoria como hospitalaria. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Anemia y trastornos de los glóbulos rojos. </li>
							<li class='mt-2'>Transfusiones de sangre.</li>
							<li class='mt-2'>Trastornos de las plaquetas. </li>
							<li class='mt-2'>Leucopenia.</li>
							<li class='mt-2'>Hemoglobinopatías. </li>
							<li class='mt-2'>Trastornos de los glóbulos blancos. </li>
							<li class='mt-2'>Trombocitopenia. </li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"anestesia-sevilla" => (object) [
		"title_especialidad" => "Anestesiología y Reanimación",
		"seoTitle" => "Anestesistas Sevilla en San Juan de Dios",
		"seoMeta" => "Proporcionamos analgesia personalizada, tanto durante como después de la cirugía, contamos con los medios tecnológicos más avanzados para adaptarnos a las particularidades de cada paciente. Somos especialistas en técnicas de tratamiento del dolor sin ingresos y técnicas de sedación fuera del área quirúrgica.",
		"short_title" => "Anestesiología y Reanimación",
		"img_main" => "/files/img/especialidadesImg/anestesiologia/luis-manuel-granado-llamas-anestesista.png",
		"principales_img" => "/files/img/especialidades/anestesiologia/san-juan-dios-sevilla-anestesiologia.jpg",
		"icon" => "/files/img/icons/anestesia.svg",
		"intro" => "Cuidado del paciente y alivio del dolor antes, durante y después de una intervención quirúrgica.",
		"info" => "<p class='open-sans-reg third-font-gray'>La anestesiología es la rama de la medicina que se dedica al alivio del dolor y cuidado del paciente antes, durante y después de una intervención quirúrgica. También se encarga del cuidado del paciente en la unidad de reanimación con el objetivo de calmar el dolor y que su recuperación sea lo más rápida posible. El anestesiólogo es el especialista de esta rama y son los encargados de administrar los diferentes tipos de anestesia, así como la vigilancia del paciente y su lugar principal de trabajo es el quirófano, aunque también se extiende sobre otras áreas. </p>
					<p class='open-sans-reg third-font-gray mt-4'>Podemos distinguir entre los siguientes tipos de anestesia: </p>
					<ul class='open-sans-reg third-font-gray mt-4'>
						<li class='mt-2'>Anestesia local: utilizada para adormecer una pequeña parte del cuerpo. </li>
						<li class='mt-2'>Anestesia regional: utilizada para bloquear una parte más extensa del cuerpo. </li>
						<li class='mt-2'>Anestesia general: el paciente entra en un sueño profundo, en el que ni recuerda la cirugía ni siente dolor alguno. </li>
					</ul>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Luis Manuel Granados Llamas, Marta Raya Rojas, Diego Villegas Duque. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>En el Hospital San Juan de Dios, disponemos de un equipo altamente cualificado y con amplia experiencia en el área de anestesiología, manejo del dolor y reanimación. </p>
							<p class='open-sans-reg third-font-gray mt-4'>Proporcionamos analgesia personalizada, tanto durante como después de la cirugía, y contamos con los medios tecnológicamente más avanzados para adaptarnos a las particularidades de cada paciente.  </p>
							<p class='open-sans-reg third-font-gray mt-4'>Somos también especialistas tanto en las técnicas de tratamiento del dolor para procesos sin ingresos, así como de técnicas de sedación fuera del área quirúrgica. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Visita preanestésica</li>
							<li class='mt-2'>Anestesia general</li>
							<li class='mt-2'>Sedación</li>
							<li class='mt-2'>Anestesia regional: bloqueos nerviosos centrales (epidural, intradural), bloqueos nerviosos periféricos (tronculares, nervios terminales, interfasciales)</li>
							<li class='mt-2'>Cuidados postoperatorios </li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"medicina-intensiva-sevilla" => (object) [
		"title_especialidad" => "Medicina Intensiva",
		"seoTitle" => "Intensivista Sevilla Hospital San Juan de Dios",
		"seoMeta" => "Nuestra Unidad de Cuidados Intensivos (UCI) se caracteriza por ser una unidad de puertas abiertas, sin horarios, con el objetivo de alcanzar el bienestar y la salud tanto del paciente como de sus familiares. Nuestro objetivo es acelerar la recuperación del enfermo, generando así un mayor bienestar durante su ingreso.",
		"short_title" => "Medicina Intensiva",
		"img_main" => "/files/img/especialidadesImg/medicina-intensiva/osama-bakarat-shrem-medicina-intensiva.jpg",
		"principales_img" => "/files/img/especialidades/medicina-intensiva/hospital-san-juan-de-dios-sevilla-medicina-intensiva-.jpg",
		"icon" => "/files/img/icons/cuidados-intensivos.svg",
		"intro" => "Especialidad que se ocupa de los pacientes críticos que se encuentran en situación de riesgo vital y son susceptibles de recuperación.",
		"info" => "<p class='open-sans-reg third-font-gray'>La medicina intensiva se encarga de la vigilancia, tratamiento y cuidados de pacientes que están críticamente enfermos y que requieren de supervisión y monitorización intensiva. </p>
					<p class='open-sans-reg third-font-gray'>Son atendidos por los intensivistas que cuentan con una formación específica horizontal que cubre los distintos aspectos del paciente crítico. Este tipo de cuidados intensivos se ofrecen únicamente a los pacientes cuya condición sea reversible y que tengan posibilidad de sobrevivir. </p>
					<p class='open-sans-reg third-font-gray'>La Unidad de Cuidados Intensivos (UCI) es el lugar donde se realiza la cobertura y la asistencia al paciente crítico y donde se trata de estabilizar a los pacientes graves con un tratamiento intensivo mientras se soluciona la causa de su enfermedad. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "<p class='open-sans-reg third-font-gray mt-4'>Como jefe de equipo de la unidad de medicina intensiva del Hospital San Juan de Dios Sevilla destaca Osama Barakat Shrem. </p>",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>Desde el área de medicina intensiva del Hospital San Juan de Dios Sevilla, proporcionamos una atención personalizada y adaptada a las circunstancias particulares de cada paciente, buscando siempre la máxima satisfacción de nuestros clientes. </p>
							<p class='open-sans-reg third-font-gray mt-4'>Además proporcionamos un servicio de apoyo tanto a los pacientes, como a los profesionales de todas las especialidades del hospital.  </p>
							<p class='open-sans-reg third-font-gray mt-4'>Nuestra Unidad de Cuidados Intensivos (UCI) se caracteriza por ser una unidad de puertas abiertas, sin horarios, con el objetivo de alcanzar el bienestar y la salud tanto del paciente como de sus familiares. Contamos con programas innovadores para acelerar la recuperación del enfermo, generando así un mayor bienestar durante su ingreso. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Patología cardíaca</li>
							<li class='mt-2'>Insuficiencia respiratoria aguda</li>
							<li class='mt-2'>Patología neurológica</li>
							<li class='mt-2'>Politraumatizados graves</li>
							<li class='mt-2'>Postoperatorio de Cirugía Mayor</li>
							<li class='mt-2'>Fracaso multiorgánico</li>
							<li class='mt-2'>Fallo renal agudo</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"radiologia-sevilla" => (object) [
		"title_especialidad" => "Radiología",
		"seoTitle" => "Radiología y resonancia en Sevilla",
		"seoMeta" => "En el Hospital San Juan de Dios de Sevilla, incorporamos una dotación de tecnología a la vanguardia que incluye un ecógrafo de alta gama, TAC de 164 cortes y Resonancia Magnética de 3 Tesla. Contamos con un equipo de especialistas que cuentan con una gran experiencia y con la tecnología más desarrollada.",
		"short_title" => "Radiología",
		"img_main" => "/files/img/blog/antonio-luna-alcala-radiologia-normal.png",
		"principales_img" => "/files/img/especialidades/radiologia/san-jan-de-dios-sevilla-radiologia.jpg",
		"icon" => "/files/img/icons/radiologia.svg",
		"intro" => "Especialidad encargada de la realización de imágenes del interior del cuerpo.",
		"info" => "<p class='open-sans-reg third-font-gray'>La radiología es la especialidad médica encargada de realizar imágenes del interior del cuerpo y de usar dichas imágenes para el diagnóstico, pronóstico y tratamiento de las enfermedades. </p>
					<p class='open-sans-reg third-font-gray'>Podemos distinguir entre la radiología diagnóstica y la radiología intervencionista. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla está compuesto por un equipo de especialistas que cuentan con una gran experiencia y con la tecnología más desarrollada, tanto para la realización de diversas pruebas que facilitan a los facultativos, como el diagnóstico de las posibles patologías que puedan presentar los pacientes. </p>
							<p class='open-sans-reg third-font-gray mt-4'>En lo relativo a pruebas diagnósticas, incorporamos una dotación de tecnología a la vanguardia que incluye un ecógrafo de alta gama, TAC de 164 cortes y Resonancia Magnética de 3 Tesla. </p>",
		"consultas" => "<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'>Fracturas e infecciones</li>
							<li class='mt-2'>Artritis</li>
							<li class='mt-2'>Osteoporosis</li>
							<li class='mt-2'>Infecciones o afecciones pulmonares</li>
							<li class='mt-2'>Cáncer mamario</li>
							<li class='mt-2'>Problemas con el tubo digestivo</li>
						</ul>",
		"destacado" => false,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"unidad-del-dolor-sevilla" => (object) [
		"title_especialidad" => "Unidad del dolor",
		"seoTitle" => "Unidad del dolor en Sevilla",
		"seoMeta" => "Tratamiento del dolor en sus diferentes manifestaciones y atención integral e individualizada de todas las patologías relacionadas con dolores causados por distintos motivos.",
		"short_title" => "Unidad del Dolor",
		"img_main" => "/files/img/doctores/unidad-dolor-sevilla.jpg",
		"principales_img" => "/files/img/unidad-del-dolor-san-juan-dios.jpg",
		"icon" => "/files/img/icons/unidad_dolor.svg",
		"intro" => "Unidad médica encargada del estudio, diagnóstico y tratamiento del dolor en sus diferentes manifestaciones, brindando una atención integral y personalizada a cada paciente.",
		"info" => "<p class='open-sans-reg third-font-gray'>El dolor es uno de los síntomas más comunes que pueden afectar la calidad de vida de las personas, ya sea en casos agudos o crónicos. Las Unidades del Dolor son unidades especializadas que se enfocan en el estudio, diagnóstico y tratamiento del dolor en sus diferentes manifestaciones, brindando una atención integral y personalizada a cada paciente.</p>
					<p class='open-sans-reg third-font-gray'>Estas unidades suelen contar con un equipo multidisciplinario de especialistas en diferentes áreas de la medicina, como anestesiología, neurología, reumatología, fisioterapia y psicología, entre otros, quienes trabajan juntos para ofrecer una atención completa y personalizada a cada paciente.</p>
					<p class='open-sans-reg third-font-gray'>Las Unidades del Dolor utilizan diferentes técnicas de tratamiento para aliviar el dolor, incluyendo terapias farmacológicas, bloqueos nerviosos, infiltraciones, técnicas de neuromodulación y terapias psicológicas, entre otras. Además, se utilizan tecnologías avanzadas y recursos técnicos para garantizar la eficacia de los tratamientos y mejorar la calidad de vida de los pacientes.</p>
					<p class='open-sans-reg third-font-gray'>El objetivo de las Unidades del Dolor es mejorar la calidad de vida de los pacientes que sufren de dolor, ya sea agudo o crónico. Para lograrlo, se realizan evaluaciones exhaustivas para identificar la causa del dolor y se elabora un plan de tratamiento individualizado y adaptado a las necesidades de cada paciente. </p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>La Unidad del Dolor del Hospital San Juan de Dios de Sevilla, tiene como principal objetivo el estudio, investigación, diagnóstico y tratamiento del dolor en los pacientes, independientemente de la intensidad y duración del mismo. Sabemos que el dolor es un síntoma que puede llegar a ser muy limitante para el paciente, por lo que buscamos mejorar su calidad de vida a través de nuestra atención integral.</p>
							<p class='open-sans-reg third-font-gray'>Es muy común encontrar casos en los que el dolor es el síntoma principal de diversas patologías, y para abordar estas situaciones de manera eficiente, es necesario contar con un equipo multidisciplinario de especialistas y tecnología avanzada. En la Unidad del Dolor del Hospital San Juan de Dios de Sevilla, trabajamos de manera coordinada con diferentes especialidades, como la anestesiología, neurología, reumatología y fisioterapia, entre otras, para ofrecer a nuestros pacientes un enfoque integral y personalizado en su tratamiento.</p>
							<p class='open-sans-reg third-font-gray'>Nuestros profesionales están altamente capacitados en técnicas de diagnóstico y tratamiento del dolor, incluyendo terapias farmacológicas, bloqueos nerviosos, infiltraciones, técnicas de neuromodulación y terapias psicológicas, entre otras. Además, contamos con la tecnología más avanzada y con una amplia variedad de recursos técnicos para garantizar una atención de calidad y eficiente.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las consultas más comunes que atendemos en este área se encuentran las siguientes:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-medium600'>Dolor lumbar</li>
							<li class='mt-2'><span class='span-medium600'>Dolor neuropático</li>
							<li class='mt-2'><span class='span-medium600'>Síndrome de dolor regional complejo (SDRC)</li>
							<li class='mt-2'><span class='span-medium600'>Cefaleas y migrañas</li>
							<li class='mt-2'><span class='span-medium600'>Dolor postoperatorio</li>
							<li class='mt-2'><span class='span-medium600'>Artritis y artrosis</li>
							<li class='mt-2'><span class='span-medium600'>Dolor oncológico</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"unidad-trafico" => (object) [
		"title_especialidad" => "Unidad de tráfico",
		"seoTitle" => "Unidad de Tráfico en Sevilla",
		"seoMeta" => "La Unidad de Tráfico del Hospital San Juan de Dios de Sevilla brinda una atención completa y especializada a todos los heridos involucrados en accidentes de tráfico.",
		"short_title" => "Unidad de Tráfico",
		"img_main" => "<div class='position-relative h-100'>
		<video autoplay preload='none' playsinline muted loop class='sin_esperas_video_green bordeVideoSeccion'>
    	    <source src='/files/video/unidadDeTrafico.mp4' type='video/mp4' title=' alt='>
         </video>
		<div class='text-green-section_trafico'>
		<div class='d-flex flex-column align-items-center'>
			<button type='button' class='button-modal mt-3' data-bs-toggle='modal' data-bs-target='#exampleModal'><img onclick='startModalVideo()' class='play_esperas_btn' src='/files/img/play.svg'></button>
			<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog modal-index'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button onclick='stopModalVideo()' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
						</div>
						<div class='modal-body modal_video'>
							<video id='modal-video' controls playsinline preload='none' src='/files/video/unidadDeTrafico.mp4'></video>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>",
		"principales_img" => "/files/img/unidad-de-trafico-san-juan-dios-sevilla.jpg",
		"icon" => "/files/img/icons/unidad_trafico.svg",
		"intro" => "Unidad médica encargada de la ​​atención especializada, integral y personalizada de todos los pacientes que sufran lesiones en accidentes de tráfico, para ayudarles a recuperarse de sus lesiones y mejorar su calidad de vida.",
		"info" => "<p class='open-sans-reg third-font-gray'>Una unidad de tráfico es un grupo especializado de profesionales médicos y de enfermería que trabajan en colaboración con los servicios de emergencia y la policía para atender a las víctimas de un accidente de tráfico.</p>
					<p class='open-sans-reg third-font-gray'>La unidad de tráfico se encarga de la atención médica inmediata y continua de los heridos en el accidente, desde el lugar del siniestro hasta su estancia en el hospital en caso de necesitarse. Esta unidad está equipada con los recursos necesarios para la evaluación y tratamiento de lesiones traumáticas, como fracturas, contusiones, quemaduras y lesiones internas, y está capacitada para realizar intervenciones quirúrgicas de emergencia si es necesario.</p>
					<p class='open-sans-reg third-font-gray'>Además de proporcionar atención médica especializada, la unidad de tráfico también coordina con otros servicios de asistencia en el hospital, servicios de rehabilitación y servicios de psicología, para brindar apoyo integral a las víctimas de un accidente de tráfico.</p>
					<h2 class='h2 primary-font-blue mt-5'>¿Quién puede solicitar los servicios de nuestra nueva unidad de tráfico?</h2>
					<p class='open-sans-reg third-font-gray'>¡<b><strong>Cualquier persona involucrada en un accidente de tráfico</strong></b>! No es necesario contar con un seguro médico privado. El único requisito es presentar el parte de accidente, y el equipo administrativo del hospital se encargará de realizar todas las gestiones necesarias con la compañía aseguradora del vehículo.</p>
					<p class='open-sans-reg third-font-gray'>Para garantizar una atención integral, así como la máxima eficacia en cada etapa del proceso de atención médica y recuperación, contamos con un equipo multidisciplinar que incluye las <b><strong>áreas de Urgencias, Traumatología, Rehabilitación y Fisioterapia</strong></b>.</p>",
		"profesionales_title" => "",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>La Unidad de Tráfico del Hospital San Juan de Dios de Sevilla brinda una atención completa y especializada a todos los heridos en accidentes de tráfico, desde el momento en que ocurre el siniestro hasta que el paciente se recupera por completo y es dado de alta.</p>
							<p class='open-sans-reg third-font-gray'>Esta unidad cuenta con un equipo de profesionales altamente capacitados en diversas áreas de la medicina, incluyendo Urgencias, Traumatología y Fisioterapia, para garantizar una atención integral y personalizada a cada paciente. Además, el hospital ofrece una cobertura global para asegurarse de que el paciente reciba la atención médica necesaria en todo momento, incluso si se requiere la colaboración de otro servicio.</p>
							<p class='open-sans-reg third-font-gray'>Es importante destacar que cualquier persona involucrada en un accidente de tráfico puede solicitar los servicios de la Unidad de Tráfico del Hospital San Juan de Dios de Sevilla, sin necesidad de tener un seguro médico privado. El único requisito es presentar el seguro obligatorio del vehículo implicado, y el equipo administrativo del hospital se encargará de realizar todas las gestiones necesarias con la compañía aseguradora del vehículo.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las consultas más comunes que atendemos en este área se encuentran las siguientes:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-medium600'>Fracturas óseas</li>
							<li class='mt-2'><span class='span-medium600'>Lesiones en la cabeza</li>
							<li class='mt-2'><span class='span-medium600'>Lesiones en el cuello y columna vertebral</li>
							<li class='mt-2'><span class='span-medium600'>Lesiones en la piel y quemaduras</li>
							<li class='mt-2'><span class='span-medium600'>Lesiones en órganos internos</li>
						</ul>",
		"destacado" => true,
		"btn_telefono" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	"cirugia-vascular-sevilla" => (object) [
		"title_especialidad" => "Angiología y Cirugía Vascular",
		"seoTitle" => "Angiología y Cirugía Vascular en Sevilla",
		"seoMeta" => "El Servicio de Angiología y Cirugía Vascular del Hospital San Juan de Dios de Sevilla se enfoca en la anatomía y funcionamiento de los vasos sanguíneos (arterias, venas y capilares) y linfáticos.",
		"short_title" => "Angiología y Cirugía Vascular",
		"img_main" => "/files/img/doctores/cirugia-vascular-en-sevilla.jpg",
		"principales_img" => "/files/img/cirugia-vascular-sjd.jpg",
		"icon" => "/files/img/icons/cirugia_vascular.svg",
		"intro" => "Unidad encargada de la evaluación, diagnóstico y tratamiento de las afecciones que afectan a los vasos sanguíneos y linfáticos del cuerpo humano.",
		"info" => "<p class='open-sans-reg third-font-gray'>El Servicio de Angiología y Cirugía Vascular se enfoca en la anatomía y funcionamiento de los vasos sanguíneos (arterias, venas y capilares) y linfáticos, abarcando desde las enfermedades más comunes hasta las más complejas. De esta manera, se encarga de tratar y prevenir enfermedades como la insuficiencia venosa, las varices, la trombosis y la enfermedad arterial periférica, entre otras. </p>
					<p class='open-sans-reg third-font-gray'>El objetivo principal es mejorar la salud y la calidad de vida de los pacientes a través de la atención especializada y personalizada en el ámbito de la cirugía vascular.</p>",
		"profesionales_title" => "Profesionales del servicio",
		"profesionales_info" => "",
		"servicios_title" => "Servicios diferenciales",
		"servicios_info" => "<p class='open-sans-reg third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, los cirujanos vasculares trabajan en colaboración con otros especialistas médicos, como cardiólogos, neurólogos, fisioterapeutas y radiólogos para proporcionar una atención integral y personalizada a cada paciente.</p>
							<p class='open-sans-reg third-font-gray'>El objetivo de la unidad de cirugía vascular es el diagnóstico y tratamiento de enfermedades que afectan a los vasos sanguíneos, tanto arterias como venas, y al sistema linfático.</p>
							<p class='open-sans-reg third-font-gray'>Los cirujanos vasculares del Hospital San Juan de Dios utilizan técnicas de diagnóstico y tratamientos avanzados, incluyendo la angioplastia, la colocación de stents, la cirugía de bypass y la endarterectomía. Se discuten todas las opciones adecuadas de tratamiento con el paciente para seleccionar el enfoque que mejor se adapte a su situación. En muchos casos, dependiendo de la dolencia, se ofrecen procedimientos mínimamente invasivos que producen excelentes resultados y una rápida recuperación.</p>",
		"consultas" => "<p class='open-sans-reg third-font-gray mt-4'>Entre las consultas más comunes que atendemos en este área se encuentran las siguientes:</p>
						<ul class='open-sans-reg third-font-gray mt-4'>
							<li class='mt-2'><span class='span-medium600'>Aneurisma</li>
							<li class='mt-2'><span class='span-medium600'>Traumatismo vascular</li>
							<li class='mt-2'><span class='span-medium600'>Varices</li>
							<li class='mt-2'><span class='span-medium600'>Arterioesclerosis</li>
							<li class='mt-2'><span class='span-medium600'>Flebitis</li>
							<li class='mt-2'><span class='span-medium600'>Linfedema</li>
							<li class='mt-2'><span class='span-medium600'>Trombosis</li>
							<li class='mt-2'><span class='span-medium600'>Úlceras en las piernas</li>
						</ul>",
		"destacado" => true,
		"fake_link" => false,
		"btn_servicio" => false
	],
	// "" => (object) [
	// 	"title" => "",
	// 	"short_title" => "",
	// 	"img_main" => "/files/img/urgencias.webp",
	// 	"icon" => "/files/img/icons/",
	// 	"intro" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
	// 	"info" => "<p class='open-sans-reg third-font-gray'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>",
	// 	"consultas" => "<li class='mt-4'>lorem</li><li class='mt-4'>lorem</li><li class='mt-4'>lorem</li>",
	// 	"destacado" => false,
	// 	"fake_link" => true,
	//  "btn_servicio" => false
	// ],
];

$blogs = [
	// "blog-example" => (object) [
	// 	"fecha" => "",
	// 	"title_noticia" => "",
	// 	"img_main" => "/files/img/blog/",
	//  "alt_img" => "",
	//  "title_img" =>  "",
	// 	"short_notice" => "",
	// 	"content" => "<p class='xl mt-4'></p>
	// 					<h2 class='primary-font-blue mt-5'></h2>
	// 					<p class='mt-4'></p>
	// 					<img class='blog-img mt-3' src='/files/img/blog/' alt='image'>
	//					<ul class='mt-3 p15'><li></li></ul>
	//					<a href='' target='_blank' class='link-blog bold'></a>", 
	// 	"feature" => false,
	//	"page_title" => "",
	//	"page_description" => "",
	//  "keywords" => "",
	// ],
	"aseguradora-cosalud-visita-hospital-san-juan-dios-sevilla" => (object) [
		"fecha" => "Viernes, 21 de julio 2023",
		"title_noticia" => "La Aseguradora COSALUD visita el Hospital San Juan de Dios Sevilla",
		"img_main" => "/files/img/blog/cosalud-visita-hospital-san-juan-dios-sevilla.jpg",
	 	"alt_img" => "Más de 30 comerciales de los puntos de venta sevillanos Cosalud visitaron nuestras instalaciones el pasado jueves 13 de julio",
		"title_img" =>  "Aseguradora COSALUD visita las instalaciones del Hospital San Juan de Dios Sevilla",
		"short_notice" => "Más de 30 comerciales de los puntos de venta sevillanos visitaron nuestras instalaciones el pasado jueves 13 de julio",
		"content" => "	<p class='mt-4 xl'>Más de 30 comerciales de los puntos de venta sevillanos visitaron nuestras instalaciones el pasado jueves 13 de julio</p>
						<p class='mt-4'>Hace poco menos de una semana recibimos en nuestro salón de actos a la <a class='bold link-blog' target='_blank' rel='nofollow' href='https://www.cosalud.com'>Aseguradora COSALUD</a>, una de entre las muchas compañías aseguradoras que está disponible en nuestro hospital. El día transcurrió de forma organizada, empezando con una cálida bienvenida en el salón de actos, una visita guiada por nuestras instalaciones y, por último, un ‘coffee break’.</p>
						<p class='mt-4 xl'>Primera parada: la bienvenida</p>
						<p class='mt-4'>A las 10.00 horas iniciaba la presentación el Dr. Miguel Sánchez-Dalp, Director Médico de nuestro hospital y miembro del <a class='bold link-blog' target='_blank' rel='nofollow' href='https://sjdsevilla.com/nuestro-centro/sobre-nosotros'>equipo directivo</a>. Inició la bienvenida, apoyándose en una presentación sencilla y clara de lo que quería transmitir y dirigida a los comerciales allí presentes. <strong>Agradeció la presencia de todos ellos</strong> y empezó recordando, a través de imágenes, el origen de San Juan de Dios, de su fundador, y de nuestro centro hospitalario.</p>
						<p class='mt-4'>Algunos de los espacios del nuevo hospital están inspirados en el pasado, como las espaciosas terrazas disponibles en cada una de las habitaciones de nuestra planta de hospitalización: <strong>“El objetivo es que el paciente y sus familiares puedan disponer de un espacio al aire libre que les permita un desahogo,</strong> aunque sea momentáneo. Antiguamente los hermanos de San Juan de Dios durante la atención a casos de poliomielitis, salían a los balcones de las habitaciones con los pacientes para tomar el sol (helioterapia). Es un guiño de donde venimos”.</p>
						<p class='mt-4'>Continuó haciendo un recorrido por la evolución del hospital, hasta como lo conocemos a día de hoy. <strong>Nos hablaba de la importancia de un equipo con vocación y dispuesto a tender su mano a los más necesitados, a un servicio humano y de calidad y, sobre todo, a la importancia de transmitir los 5 valores de San Juan de Dios </strong>(responsabilidad, calidad, hospitalidad, respeto y espiritualidad) que sustentan toda nuestra atención: “Trabajamos por mantener y difundir nuestro modelo asistencial y desarrollar una asistencia basada en principios y valores: los 5 valores que nos iluminan y nos acompañan, con uno transversal que siempre será el de la <strong>Hospitalidad</strong>”.</p>
						<p class='mt-4'>El Dr. Sánchez-Dalp fue avanzando a través de diapositivas mostrando las nuevas instalaciones del hospital y adelantando lo que, una vez terminada la presentación, iban a poder visitar durante el recorrido. </p>
						<p class='mt-4 xl'>Segunda parada: la visita</p>
						<p class='mt-4'>Los más de 30 comerciales de la Aseguradora COSALUD, divididos en grupos liderados por nuestro equipo, comenzaron la visita por nuestras instalaciones. La primera parada fue <a class='bold link-blog' rel='nofollow' target='_blank' href='https://sjdsevilla.com/blog/nuestras-consultas-externas-sevilla-sin-colas-ni-esperas'>consultas externas</a>: un amplio espacio en la planta primera con más de 20 consultas que son atendidas por <strong>médicos especialistas.</strong> Nuestras consultas externas presentan numerosas ventajas, entre las que destacan la <strong>ausencia de colas y espera.</strong> La atención especializada de nuestro equipo médico en cada consulta ofrece una atención cercana con cada uno de ellos.</p>
						<p class='mt-4'>Posteriormente se trasladaron al área de hospitalización (cuarta planta). Visitaron una de nuestras habitaciones individuales, <strong>espaciosa y acogedora.</strong> Todas y cada una de ellas cuentan, como mencionamos anteriormente, con una amplia terraza.</p>
						<p class='mt-4'>Seguimos avanzando y bajamos a la planta baja. Visitamos el área de admisión, radiología y urgencias:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'><strong>El área de admisión:</strong> nuestro equipo trabaja diariamente la atención de calidad que queremos ofrecer a nuestros pacientes. Quisimos apostar por una admisión cercana, sin mostradores y a la altura de a quien recibimos: de tú a tú. El equipo de admisión está liderado por nuestros <a class='bold link-blog' target='_blank' href='https://sjdsevilla.com/fides'>gestores FIDES</a>. Ellos se encargan al 100% de los trámites burocráticos con las compañías aseguradoras. Además, te acompañan y asesoran durante todo el proceso asistencial.</li>
							<li class='mt-2'><strong>Radiología:</strong> hicimos un recorrido por las distintas salas que cuentan con la última tecnología, más avanzada e innovadora que ofrecer a nuestros pacientes. Visitamos la <strong>Sala de Resonancia Magnética de 3 teslas y la Sala TAC multicorte de baja radiación,</strong> en la que nuestros especialistas nos explicaron su funcionamiento. Gracias a la digitalización ofrecemos diagnósticos muy exhaustivos y rápidos. </li>
							<li class='mt-2'><strong><a class='bold link-blog' rel='nofollow' target='_blank' href='https://sjdsevilla.com/urgencias-sevilla'>Urgencias</a>:</strong> disponibles las 24 horas. El equipo de enfermería de urgencias nos acogió en su espacio de trabajo para presentarnos las urgencias, pediátricas y de adultos, en la que contamos con un área de observación y de tratamientos cortos. </li>
						</ul>
						<p class='mt-4 xl'>Tercera parada: coffee break</p>
						<p class='mt-4'>Antes de finalizar la jornada y dar la despedida al equipo comercial de la Aseguradora COSALUD, nos reunimos en la primera planta para hablar y tener un contacto más cercano con ellos. Entre cafés, zumos, un pequeño tentempié y unas vistas al exterior de nuestro hospital, pudimos disfrutar de un rato de desconexión. Una vez finalizado, de nuevo en el salón de actos, tuvo lugar la despedida a los miembros de COSALUD. </p>
						<p class='mt-4'>¡Gracias por vuestra visita! Estuvimos encantados de teneros con nosotros y de poder hacer un recorrido por nuestras <strong><a class='bold link-blog' rel='nofollow' target='_blank' href='https://sjdsevilla.com/nuestro-centro/instalaciones'>renovadas instalaciones</a></strong>. <strong>Os esperamos a vosotros y a todos vuestros asegurados.</strong> ¡Nuestras puertas están abiertas!</p>
						",	
		"feature" => true,
		"page_title" => "Aseguradora COSALUD visita el Hospital San Juan de Dios Sevilla",
		"page_description" => "Más de 30 comerciales de los puntos de venta sevillanos COSALUD visitaron las instalaciones del hospital el pasado jueves 13 de julio",
	 	"keywords" => "cosalud sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, aseguradora cosalud, cosalud hospital sevilla, hospital sevilla",
	],
	"convenio-voluntariado-san-juan-dios-sevilla-universidad-pablo-olavide" => (object) [
		"fecha" => "Miércoles, 19 de julio 2023",
		"title_noticia" => "Convenio de voluntariado: San Juan de Dios de Sevilla y Universidad Pablo de Olavide",
		"img_main" => "/files/img/blog/convenio-voluntariado-hospital-san-juan-dios-sevilla-upo.webp",
	 	"alt_img" => "Un voluntariado intergeneracional entre los estudiantes de la UPO y los mayores de nuestra residencia",
	 	"title_img" =>  "Convenio de voluntariado: San Juan de Dios de Sevilla y Universidad Pablo de Olavide",
		"short_notice" => "Un voluntariado intergeneracional entre los estudiantes de la UPO y los mayores de nuestra residencia",
		"content" => "<h2 class='primary-font-blue mt-5'>Un voluntariado intergeneracional entre los estudiantes de la UPO y los mayores de nuestra residencia</h2>
						<p class='mt-4'>El pasado lunes 17 de julio, Manuel González (Gerente del Hospital de San Juan de Dios de Sevilla) junto con el Hermano Chema Montserrat (coordinador del voluntariado de la Residencia de Mayores), se desplazaron hasta la <a rel='nofollow' class='bold link-blog' target='_blank' href='https://www.upo.es/portal/impe/web/portada/index.html'>Universidad Pablo de Olavide</a> para <strong>firmar un acuerdo de voluntariado entre la universidad y la residencia.</strong></p>
						<p class='mt-4'>Francisco Oliva, rector de la Universidad, dio la bienvenida a los representantes de las nuevas 8 asociaciones (entre las que se encuentra San Juan de Dios de Sevilla) que se han incorporado al programa de voluntariado de la UPO junto con sus acompañantes. Un acto presidido por el rector de la universidad que dio la palabra a cada uno de los representantes de las asociaciones de voluntarios. </p>
						<p class='mt-4 xl'>Manuel González dedica unas palabras sobre el voluntariado</p>
						<p class='mt-4'>El Gerente de nuestro hospital mencionó algunas palabras sobre el programa de voluntariado disponible para quien desee regalar su tiempo a los más necesitados, enfermos y no enfermos. Para nosotros es vital seguir transmitiendo la <strong>importancia de ayudar a los más necesitados</strong> y, por esta razón, queremos seguir creando <strong>lazos de unión</strong> con otras organizaciones, como la Universidad Pablo de Olavide. Queremos hacer llegar que <strong>ayudar es una labor de todos.</strong></p>
						<p class='mt-4'>Comenzaba recordando el año en que la residencia abrió sus puertas para recibir y acoger a los más mayores. Desde 1574, la dedicación de nuestro equipo sanitario no ha cesado, <strong>ha ido incrementando con los voluntarios</strong> que vienen a nuestra residencia y que poco a poco se van sumergiendo hasta formar un <strong>único equipo que rema hacia una misma dirección: la atención, el acompañamiento y el cuidado.</strong></p>
						<p class='mt-4'>Así, Manuel, como gerente del centro del <a class='bold link-blog' target='_blank' href='https://sjdsevilla.com/'>Hospital San Juan de Dios de Sevilla</a> (ubicado en Eduardo Dato) y la <a rel='nofollow' target='_blank' class='bold link-blog' href='https://web.sjd.es/sevilla/'>Residencia de Mayores</a> (ubicada en la Calle Sagasta en el centro de la ciudad) hablaba de la importancia de formar parte de este proyecto de voluntariado con la Universidad: “<strong>Para nosotros formar parte de este proyecto tiene un valor especial</strong>. Pero más que para nosotros, queremos mencionar en nombre de nuestros mayores y nuestros profesionales que estar presentes en este programa es especialmente significativo. Nos encontramos en un proceso de cambio y transformación del cambio del perfil del voluntariado. El voluntariado hace 15 o 20 años se conformaba por personas muy mayores o ya jubiladas que tenían tiempo disponible. Desde hace tiempo en San Juan de Dios estamos intentando rejuvenecer ese perfil destacando la <strong>importancia de estrechar lazos</strong> entre las personas mayores y las personas jóvenes que les permita <strong>enriquecerse mutuamente</strong> y sobre todo <strong>compartir valores intergeneracionales</strong> que tanto bien hacen mutuamente”.</p>
						<p class='mt-4'>Como mencionan en el <a rel='nofollow' target='_blank' class='bold link-blog' href='https://www.upo.es/diario/cultura-social/2023/07/convenio-ocho-nuevas-entidades-programa-voluntariado-universitario/'>artículo publicado en la página web de la universidad</a>, nosotros en nuestro programa de voluntariado de San Juan de Dios de Sevilla tenemos como “eje central la <strong>hospitalidad</strong>, donde el personal sanitario junto con las personas voluntarias se coordinan para satisfacer las necesidades de los y las residentes”.</p>
						<img class='blog-img mt-3' src='/files/img/blog/convenio-voluntariado-san-juan-dios-sevilla-upo.webp' alt='Un voluntariado intergeneracional entre los estudiantes de la UPO y los mayores de la residencia del hospital' title='Convenio de voluntariado: Hospital San Juan de Dios de Sevilla y UPO'>
						<p class='mt-4 xl'>Un voluntariado intergeneracional entre estudiantes y mayores</p>
						<p class='mt-4'>Este convenio de voluntariado con la Universidad Pablo de Olavide y la Residencia de San Juan de Dios de Sevilla es extensible también al propio Hospital de San Juan de Dios ubicado en el corazón del barrio de Nervión. Los alumnos pueden escoger hacer su voluntariado, coordinado con sus horarios universitarios, bien en la residencia, en el hospital o incluso en ambos.</p>
						<p class='mt-4'>Este programa nace con el objetivo y la necesidad de recordar la consistencia y la fortaleza de unión que existe entre mayores y jóvenes. Es necesario que la sociedad siga siendo consciente de que <strong>la unión entre ambos es inquebrantable y sobre todo necesaria</strong>. Los mayores y su dependencia por el cuidado que desean y necesitan recibir de los demás jamás dejará de existir. </p>
						<p class='mt-4'>Este voluntariado intergeneracional pone de manifiesto lo importante que es para un joven enriquecerse de un mayor y viceversa. <strong>El enriquecimiento y el crecimiento son mutuos</strong>. Como eje principal de todas las actividades se encuentra el <strong>acompañamiento</strong> al mayor, y de forma paralela se puede pasear, ir al cine, ir de excursión, visitar algún museo, merendar…</p>
						<p class='mt-4 xl'>Voluntariado de San Juan de Dios</p>
						<p class='mt-4'>Coordinado por el responsable el Hermano Chema Montserrat, nuestro voluntariado está <strong>abierto y disponible</strong> para quien desee regalar su tiempo a los más necesitados. <strong>El acompañamiento a nuestros mayores es gratificante a la par que enriquecedor</strong>. Un voluntariado disponible en la Residencia de Mayores de la Calle Sagasta y en el Hospital San Juan de Dios de Sevilla. </p>
						<p class='mt-4'>Si estás interesado en hacer voluntariado con nosotros puedes contactarnos llamando al 673 660 502. ¡Te esperamos!</p>
						", 
		"feature" => true,
		"page_title" => "Convenio de voluntariado: San Juan de Dios de Sevilla y UPO",
		"page_description" => "Un voluntariado intergeneracional entre los estudiantes de la UPO y los mayores de la residencia del Hospital San Juan de Dios de Sevilla",
	 	"keywords" => "voluntariado sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, UPO sevilla, hospital sevilla",
	],
	"nuestras-consultas-externas-sevilla-sin-colas-ni-esperas" => (object) [
		"fecha" => "Martes, 18 de julio 2023",
		"title_noticia" => "Nuestras Consultas Externas: Sin colas ni esperas",
		"img_main" => "/files/img/blog/consultas-externas-sevilla-sin-colas-ni-esperas.jpg",
	 	"alt_img" => "En el Hospital San Juan de Dios de Sevilla, las consultas externas desempeñan un papel fundamental en la atención médica de los pacientes.",
		"title_img" =>  "Nuestras Consultas Externas en Sevilla, atención integral sin colas ni esperas",
		"short_notice" => "En el Hospital San Juan de Dios, las consultas externas desempeñan un papel fundamental en la atención médica de los pacientes.",
		"content" => "<h2 class='mt-5 primary-font-blue'>En el Hospital San Juan de Dios, las consultas externas desempeñan un papel fundamental en la atención médica de los pacientes. Gracias a nuestros equipos multidisciplinares y la amplia oferta de servicios disponibles, liderados por los mejores especialistas, ofrecemos una atención integral desde el diagnóstico y tratamiento, hasta la prevención de enfermedades.</h2>
						<p class='mt-4'>En las consultas externas del hospital es donde valoramos a los nuevos pacientes y realizamos el <strong>seguimiento ambulatorio</strong> de los que ya tienen su historial en nuestro centro. </p>
						<p class='mt-4'>Aquí, todos nuestros pacientes, tienen revisiones regulares con nuestro equipo donde se controla la situación clínica, se verifica el tratamiento y se ofrece el asesoramiento necesario sobre las opciones que mejor se adapten a ellos.</p>
						<p class='mt-4'>Las consultas externas del Hospital San Juan de Dios de Sevilla destacan por su <a class='bold lnk-blog' href='https://sjdsevilla.com/companias' target='_blank'>amplia gama de especialidades médicas</a>, desde cardiología y neurología hasta pediatría y traumatología.</p>
						<p class='mt-4'>Los pacientes tienen acceso a todo nuestro equipo de profesionales formados en las diversas áreas de la medicina. Esto nos permite tratar todo tipo de enfermedades y patologías, así como garantizar que cada paciente reciba el tratamiento más adecuado. Además, en consultas externas realizamos cirugías ambulatorias como pequeños lunares, quistes, etc. </p>
						<p class='mt-4 xl'>Atención médica personalizada y sin esperas</p>
						<p class='mt-4'>Una de las principales ventajas de nuestras consultas externas es la atención personalizada que el equipo San Juan de Dios de Sevilla ofrece. Desde estas consultas, proporcionamos una atención cercana y adaptada a las circunstancias particulares de cada paciente. Nuestro objetivo es buscar siempre la máxima satisfacción y bienestar de todos aquellos que confían en nosotros.</p>
						<p class='mt-4 xl'>Cómo funcionan nuestras consultas externas</p>
						<p class='mt-4'>Las consultas externas se han convertido en una de las opciones más demandadas por los pacientes. A diferencia de los servicios de hospitalización, las consultas externas permiten<strong> agendar citas con mayor facilidad, evitando colas y esperas.</strong><p>
						<p class='mt-4'>Nuestras consultas externas se encuentran en la planta 1 y este es el proceso general que encontrarás: <p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>Pide tu <a class='bold link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>cita previa</a> a través de nuestra web (encuentra si tu aseguradora está disponible en nuestro hospital entre las opciones disponibles y selecciónala) o bien puedes llamarnos por teléfono al <a class='bold link-blog' href='tel:+34955046999'>955 046 999</a>  para concertar tu cita.</li>
							<li class='mt-2'>48 horas antes de tu cita recibirás un SMS con el recordatorio de la misma al número de teléfono facilitado.</li>
							<li class='mt-2'>Acude a nuestro hospital a la primera planta y registra tu cita en las máquinas digitales disponibles para ello.</li>
							<li class='mt-2'>Una vez tengas impreso tu ticket, dirígete al mostrador de Admisión para realizar el registro de tus datos personales y, posteriormente, nuestro equipo te informará sobre la consulta a la que debes acudir.</li>
							<li class='mt-2'>Espera cerca y, una vez sea tu turno, el médico correspondiente te llamará para ser atendido.</li>
							<li class='mt-2'>Si necesitas realizar una prueba diagnóstica o una revisión tras un tratamiento, puedes dirigirte de nuevo al mostrador de Admisión para ser atendido (previamente debes imprimir el ticket con tu número en las máquinas digitales para ser llamado al mostrador) o bien puedes llamarnos por teléfono a nuestro número de cita previa: 955 046 999. </li>
						</ul>
						<video class='w-100' controls playsinline loop>
							<source src='/files/img/blog/video-blog/consultas-externas-hospital-san-juan-dios-sevilla.mp4' type='video/mp4'>
						</video>
						<p class='mt-4 xl'>Tecnología y avances médicos</p>
						<p class='mt-4'>En las consultas y diagnósticos del hospital, se emplea la tecnología médica más avanzada. Los equipos y herramientas utilizados son de última generación, permitiendo obtener resultados más precisos, en menos tiempo. Todo nuestro equipo médico recibe formaciones y se mantiene actualizado en los avances y técnicas médicas.<p>
						<p class='mt-4'>La prevención de enfermedades es una parte esencial en el Hospital San Juan de Dios de Sevilla. A través de revisiones periódicas y controles de salud conseguimos detectar y prevenir enfermedades en etapas tempranas. Gracias a ello, tenemos la oportunidad de tomar medidas preventivas y mantener el bienestar del paciente.<p>
						<p class='mt-4 xl'>Principales aseguradoras con las que trabajamos</p>
						<p class='mt-4'>Contamos con acuerdos y convenios con <a class='bold link-blog' href='https://sjdsevilla.com/companias' target='_blank'>compañías aseguradoras</a> como <strong>Adeslas, Caser Seguros, Mapfre, Sanitas, DKV, Fiatc Seguros, Plus Ultra, Seguros Bilbao, Catalana Occidente, Aegon, Divina Pastora y Generali.</strong><p>
						<p class='mt-4'>Si tu aseguradora no aparece en el listado, puedes contactar llamando al 954 93 93 00 o a través de nuestra web. En nuestro afán por ofrecer la mejor atención a los pacientes y todas las facilidades posibles, continuaremos creciendo para que todas las personas puedan disfrutar de una atención médica de calidad, personalizada y cercana.<p>
						<p class='mt-4'>La experiencia del paciente es una prioridad en las consultas externas del hospital. Desde el momento en que los pacientes acuden a estas consultas, se les recibe en un <strong>ambiente tranquilo y  acogedor.</strong> El equipo médico y administrativo se asegura de que cada paciente se sienta cómodo y asesorado. Además, desde el hospital recibimos el feedback de nuestros pacientes y, gracias a ellos, mejoramos continuamente nuestros servicios para asegurar la experiencia más positiva posible.<p>
						<p class='mt-4'>Con una amplia variedad de especialidades, nuestro enfoque en la prevención,  la tecnología médica más avanzada y una experiencia centrada en el paciente, nuestras consultas ofrecen una atención de calidad, personalizada y sin tiempos de espera.<p>
						<p class='mt-4'>Si necesitas nuestra ayuda, o tienes alguna duda, no dudes en <a class='bold link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>pedir cita</a> en nuestra web, llamando al <a class='bold link-blog' href='tel:+34955046999'>955 046 999</a> o bien por whatsapp: <a class='bold link-blog' href='https://api.whatsapp.com/send?phone=34607919025' target='_blank'>607919025</a>.<p>
						<p class='mt-4'>¡El equipo San Juan de Sevilla está encantado de atenderte!<p>
						",	
		"feature" => true,
		"page_title" => "Nuestras Consultas Externas: Sin colas ni esperas",
		"page_description" => "En el Hospital San Juan de Dios de Sevilla, las consultas externas desempeñan un papel fundamental en la atención médica de los pacientes.",
	 	"keywords" => "consultas externas sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, consultas externas, hospital sevilla",
	],
	"javier-latre-hospital-san-juan-dios-sevilla" => (object) [
		"fecha" => "Jueves, 13 de julio 2023",
		"title_noticia" => "Javier Latre sobre el Hospital San Juan de Dios: “me han devuelto la vida”",
		"img_main" => "/files/img/blog/entrevista-javier-latre-hospital-san-juan-dios.webp",
	 	"alt_img" => "Javier Latre comparte su experiencia en el Hospital San Juan de Dios Sevilla y cómo los médicos le han devuelto su vida",
		"title_img" =>  "El Hospital San Juan de Dios recibe halagos del periodista deportivo Javier Latre",
		"short_notice" => "Javier Latre comparte su experiencia en el Hospital San Juan de Dios Sevilla y cómo el equipo médico le ha devuelto su vida",
		"content" => "<h2 class='mt-5 primary-font-blue'>Javier Latre comparte su experiencia en el Hospital San Juan de Dios Sevilla y cómo el equipo médico le ha devuelto su vida</h2>
						<p class='mt-4'>En una entrevista emotiva y llena de gratitud, Javier Latre ha compartido su experiencia en el Hospital San Juan de Dios y cómo ha marcado un antes y un después en su vida. Durante su estancia de dos meses, Javier encontró en nuestro hospital un hogar temporal que le proporcionó no sólo una atención médica excepcional, sino también momentos inolvidables y un equipo humano extraordinario.</p>
						<p class='mt-4 xl'>El encuentro casual entre Javier y el Hospital</p>
						<p class='mt-4'>Javier nos narra con unas bonitas palabras cómo llegó a elegir al Hospital San Juan de Dios en Sevilla. Aunque inicialmente estaba siendo tratado en Barcelona, recibió una llamada del Dr. Miguel Ángel Gómez Bravo, un cirujano de renombre del Hospital San Juan de Dios en Sevilla, quien mostró interés en su caso y lo invitó a ser atendido en las instalaciones del hospital. </p>
						<p class='mt-4'><i>“La primera impresión fue impactante, con instalaciones modernas y quirófanos relucientes, como si nunca antes se hubieran utilizado”.</i> Tras reunirse con el <strong>Dr. Miguel Ángel Gómez Bravo,</strong> Javier sintió una confianza inmediata en el equipo médico y en el hospital, lo que le llevó a tomar la decisión de someterse a la <strong>cirugía de hígado y colon</strong> en el Hospital San Juan de Dios de Sevilla.</p>
						<p class='mt-4'>Javier Latre nos lo cuenta tal que así: <i>“Al reunirme con el Dr. Miguel Ángel Gómez Bravo me da la confianza, tanto su equipo médico como el hospital, de que todo iba a salir bien, entonces yo le dije que me lo tenía que pensar. Eso fue un jueves y  el viernes por la mañana ya le estaba llamando para decirle vamos adelante, me quiero operar con vosotros en San Juan de Dios. <strong>A día de hoy ha sido la decisión más acertada de mi vida.”</strong></i></p>
						<p class='mt-4 xl'>Superando las expectativas</p>
						<p class='mt-4'>Javier ha elogiado su experiencia en el hospital, desde el trato amable y cercano del equipo de enfermería hasta la habilidad quirúrgica del <strong>Dr. Miguel Ángel Gómez Bravo y la Dra. Rosa Jiménez.</strong> La calidad del cuidado médico y la pronta recuperación que experimentó superaron con creces sus expectativas. El hospital, en su opinión, merece una puntuación de 12 sobre 10, y destaca la importancia de compartir su experiencia para que más personas conozcan las instalaciones y el equipo humano excepcional que lo conforma.</p>
						<p class='mt-4'><i>“Yo tengo que agradecer muchísimo al hospital todo lo que han hecho por mi, lo que me han facilitado, y lo agusto que me han hecho sentir, porque al final esta habitación, tanto para mi como para mi familia, se ha convertido en nuestra casa durante muchos días, en concreto 2 meses.”</i></p>
						<video class='w-100' controls playsinline loop>
							<source src='/files/img/blog/video-blog/ENTREVISTA-Javier-Latre.mp4' type='video/mp4'>
						</video>
						<p class='mt-4 xl'>El apoyo integral del Hospital San Juan de Dios de Sevilla</p>
						<p class='mt-4'>Javier Latre no solo resalta la atención médica recibida, sino también el trato excepcional que él y su familia recibieron por parte de todo el personal del hospital. Desde el personal de admisión hasta los profesionales de enfermería, todos se mostraron cercanos, comprensivos y dispuestos a resolver cualquier necesidad que surgiera.</p>
						<p class='mt-4'>Javier afirma que su familia se sintió como en casa durante esos dos meses, con la libertad de visitarlo en cualquier momento. La atención y el trato exquisito que experimentaron consolidaron aún más su agradecimiento hacia el hospital y su personal. <i>“Si me dicen si hubiera tenido que estar más tiempo, pues no me hubiera importado porque me han tratado fenomenal, creo que el hospital y el equipo es maravilloso, y que debe conocerlo la gente porque tiene unas instalaciones y un equipo humano muy muy bueno”.</i></p>
						<p class='mt-4 xl'>La eficacia de nuestro modelo de atención 360º</p>
						<p class='mt-4'>Javier destaca la importancia de nuestro servicio de atención a los pacientes , que se encargó de gestionar todas las autorizaciones y trámites necesarios para su tratamiento. Este servicio facilitó enormemente la logística y permitió que Javier se enfocara en su recuperación, sabiendo que todo estaba en manos del equipo profesional del hospital. La agilidad y eficacia del servicio Fides fueron aspectos importantes para su experiencia positiva en el hospital.</p>
						<p class='mt-4 xl'>El reconocimiento a los médicos y su equipo</p>
						<p class='mt-4'>En un último agradecimiento, Javier elogió al equipo médico liderado por el Dr. Miguel Ángel Gómez Bravo y la Dra. Rosa Jiménez. Reconoce la excelencia de su trabajo y destaca la habilidad quirúrgica excepcional de ambos especialistas.</p>
						<p class='mt-4'>Así lo afirma Javier: <i>“Yo todo lo que puedo es agradecerles porque mi vida se paró un 27 de septiembre y me la han devuelto un 15 de abril y luego un 15 de mayo. Me han devuelto a mi vida “normal” porque la vida se paralizó, no podía hacer nada, estaba pendiente de la quimioterapia, revisiones cada 15 días y ellos han sido los que me han devuelto la ilusión, las ganas de seguir haciendo mi trabajo y de volver a vivir.”</i></p>
						<p class='mt-4'>La experiencia de Javier en el Hospital San Juan de Dios ha sido transformadora y llena de gratitud. El trato humano, la calidad de la atención médica y el apoyo integral recibido han dejado una huella imborrable en su vida.</p>
						<p class='mt-4'>Javier Latre finaliza esta emotiva entrevista con estas bonitas palabras: <i>“Tengo que daros las gracias, porque la verdad es que el trato ha sido excepcional y luego el resultado es que solo hay que verlo. Con lo cual, yo a San Juan de Dios, al equipo médico de Miguel Ángel Gómez Bravo y a todo el equipo de enfermería, lo único que tengo son palabras de agradecimiento y, que en definitiva, me han devuelto mi vida porque durante ese tiempo se paró, entonces el que da las gracias soy yo.”</i></p>
						<p class='mt-4'>Muchas gracias Javier por tus palabras y la confianza depositada en el equipo. Ha sido un placer por parte del Hospital San Juan de Dios ayudarte a seguir adelante.</p>", 
		"feature" => false,
		"page_title" => "Javier Latre y sus halagos al Hospital San Juan de Dios",
		"page_description" => "Javier Latre comparte su experiencia en el Hospital San Juan de Dios Sevilla y cómo el equipo médico le ha devuelto su vida",
	 	"keywords" => "Javier Latre, periodista deportivo Javier Latre, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, uci sevilla, hospital sevilla, quirófano sevilla",
	],
	"maria-vives-enfermera-urgencias-hospital-san-juan-dios-sevilla" => (object) [
		"fecha" => "Martes, 11 de julio 2023",
		"title_noticia" => "María Vives nos cuenta sobre su profesión como enfermera de Urgencias",
		"img_main" => "/files/img/blog/maria-vives-enfermera-urgencias-hospital-sevilla.webp",
	 	"alt_img" => "Desde el Hospital San Juan de Dios Sevilla, María Vives, enfermera, nos nos habla del modelo de atención de los pacientes en Urgencias",
	 	"title_img" =>  "María Vives, enfermera de Urgencias en el Hospital San Juan de Dios de Sevilla",
		"short_notice" => "María Vives, enfermera del Servicio de Urgencias en San Juan de Dios de Sevilla: “el área de urgencias me gusta mucho porque para el paciente, que se encuentra en un momento de incertidumbre, nosotros los enfermeros somos su primera ayuda y su primer contacto con el hospital. Ellos ven en nosotros la solución”",
		"content" => "<p class='xl mt-4'>María Vives, enfermera del Servicio de Urgencias en San Juan de Dios de Sevilla: “el área de urgencias me gusta mucho porque para el paciente, que se encuentra en un momento de incertidumbre, nosotros los enfermeros somos su primera ayuda y su primer contacto con el hospital. Ellos ven en nosotros la solución”</p>
						<p class='mt-4'>María Vives es enfermera graduada por la Universidad de Sevilla y descubrió que quería serlo desde que estaba en el colegio: “Elegí estudiar las optativas de salud, siempre me había interesado mucho el área de sanidad y el cuidado de los pacientes. Tenía muy claro que quería hacer algo relacionado con medicina, enfermería o cualquiera de esas áreas”. </p>
						<p class='mt-4'>A la hora de elegir si dedicar su vida a ejercer como médico o como enfermera dudó, ya que ambas profesiones le llamaban mucho la atención; sin embargo, apunta en la entrevista que quería dedicarse a la medicina, pero que no tenía del todo clara la concepción de lo que eran ambas profesiones, y se decantó por enfermería: “Entré en enfermería finalmente, y por las clases y los seminarios fui conociendo lo que iba a ser mi profesión y me gustaba más que la medicina, <strong>porque el trato con el paciente era más personal y estábamos más en contacto con ellos”.</strong></p>
						<p class='mt-4'>El equipo de enfermería de nuestro hospital vela por nuestros pacientes y también por sus familiares. <strong>Su trato personal, preciso, con mucho tacto y cuidado les diferencia.</strong> Son necesarios en todas las plantas de nuestro hospital, trabajan conjuntamente con nuestro equipo de médicos y remando todos en una misma dirección, como nos comentó Pedro (enfermero de UCI en nuestro hospital). María es enfermera de nuestro Servicio de Urgencias y quisimos preguntarle, para que nos contara un poquito más a fondo, cómo es tratar con ellos diariamente: “Jugamos un papel muy importante en entender al paciente y en ayudarlo en esa esfera también psicológica para darle la mayor tranquilidad posible. Muchas veces los pacientes llegan a urgencias sin acompañantes y eso, en la mayoría de los casos, aumenta mucho su preocupación y la estancia en esta área. <strong>Nosotros le damos en ese momento también el apoyo que les falta”.</strong></p>
						<p class='mt-4'>Y, desempeñando un papel tan fundamental a la llegada del paciente, a María lo que más le gusta es, precisamente en ese momento de incertidumbre, regalarle toda su <strong>ayuda, atención y tranquilidad</strong>: “El área de urgencias me gusta mucho porque digamos que, para el paciente, se encuentra en un momento de incertidumbre en el que nosotros como enfermeros desarrollamos un papel fundamental. En función de la gravedad del mismo es cierto que esta incertidumbre puede ser mayor o menor, sin embargo, lo que no cambia es que nosotros como enfermeros somos su primera ayuda y su primer contacto con el hospital. Ellos ven en nosotros la solución y nosotros velamos por su salud. Me gusta mucho este área porque somos la primera intervención con el paciente y los encargados de estabilizarlo y de ejecutar el la primera valoración que posteriormente se le comunica al médico”. </p>
						<p class='mt-4'>María siendo tan joven –tiene tan solo 24 años y una maravillosa carrera por delante–, tiene muy claro cómo debe y no debe actuar con sus pacientes; pero sobre todo,  <strong>muestra ambiciones por innovar y mejorar la atención y la calidad en el Hospital San Juan de Dios de Sevilla</strong>. Le preguntamos si considera que la enfermería está evolucionando o si se mantiene tal cual se define y se conoce, a lo que respondió afirmativamente: “Sí, por una parte creo que sí. Con el paso de los años nuestra profesión está más reconocida. Es frecuente que las personas tiendan a considerar que son los médicos quienes continuamente están estudiando y reciclándose y, ahí nosotros, también tenemos la responsabilidad de seguir formándonos. Hay muchas áreas que se nos pueden llegar a escapar y cuanto más aprendamos y tendamos a innovar y a evolucionar en nuestro área de enfermería, podremos mejorar la asistencia a nuestros pacientes”.</p>
						<p class='mt-4'>Una asistencia dotada de tiempo, incluso cuando el volumen de pacientes que tienen que asistir puede ser muy numeroso. Para ella es fundamental la buena atención, no sólo física, también psicológica, y <strong>tiene muy claro qué es lo que diferencia al equipo de enfermería de nuestro hospital: la eficiencia</strong>. Nos cuenta que “Ofrecemos una atención de calidad y rapidez en la asistencia a los pacientes en la medida que el volumen de los mismos nos lo permite. Intentamos dar unos cuidados de calidad que sean gratificantes para ambas partes: para ellos y para nosotros”.</p>
						<p class='mt-4'>A María lo que más le gusta (además de sentirse realizada ofreciendo su tiempo y ayuda a sus pacientes que se ve recompensado en una sensación de gratificación tremenda), es su equipo: “Estoy muy contenta porque durante todo este primer año, hemos formado un gran equipo de enfermería. La gran mayoría somos muy jóvenes y nos entendemos muy bien, lo que para el ámbito profesional es algo importante.<strong> El buen ambiente de trabajo es fundamental para el buen entendimiento y la coordinación de las tareas. Nos ayudamos bastante entre nosotros. Cuando abrimos el hospital nuevo, formamos el Servicio de Enfermería prácticamente nosotros, lo que nos ha dado una visión también más cercana con el hospital. Lo resumiría quizás en que no nos cuesta trabajar y dedicarnos a nuestros pacientes, y eso es algo muy bueno”.</strong></p>
						<p class='mt-4'>Por último, en San Juan de Dios de Sevilla nos esforzamos por transmitir los valores de nuestro fundador. María tiene muy claro que cada uno de sus pacientes debe sentirlos durante la atención, y ella siempre los tiene presentes: “Nosotros formamos muy buen equipo y, trabajando tanto individualmente como conjuntamente, intentamos dar una <strong>asistencia de calidad desde el respeto, cuidando hasta el más mínimo detalle para que el paciente se sienta bien atendido y cuidado.</strong> Nos centramos tanto en el área física como psicológica, combinado con la parte religiosa del hospital (<a class='bold link-blog' href='https://sjdsevilla.com/nuestro-centro/atencion-espiritual' target='_blank'>SAER</a>, el Servicio de Atención Religiosa y Espiritual)”. </p>
						<video class='w-100' controls autoplay playsinline loop>
							<source src='/files/img/blog/video-blog/maria-vives-enfermera-urgencias-hospital-sevilla.mp4' type='video/mp4'>
						</video>
						<p class='xl mt-4'>Servicio de Urgencias del Hospital San Juan de Dios de Sevilla: disponible durante las 24 horas del día</p>
						<p class='mt-4'>El servicio de urgencias del Hospital San Juan de Dios de Sevilla cuenta con <strong>equipos multidisciplinares capaces de atender tanto niños como adultos.</strong> Dicha atención se ofrece <strong>24 horas, los 7 días de la semana, durante los 365 días del año.</strong></p>
						<p class='mt-4'>Nuestro amplio equipo de especialistas nos permite atender una gran variedad de urgencias médicas, quirúrgicas y traumatológicas. Además, el centro hospitalario dispone de zona UCI, URPA y REA, así como áreas de hospitalización, de observación y laboratorio, por lo que las valoraciones y estudios que necesite el personal médico están disponibles en un corto período de tiempo, lo que <strong>reduce considerablemente las esperas y los plazos de atención del paciente.</strong></p>
						<p class='mt-4'>Puedes <a class='bold lnk-blog' href='https://sjdsevilla.com/companias' target='_blank'>encontrar tu compañía aseguradora</a> en nuestra web y pedir <a class='bold link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>cita previa online</a>. También puedes contactar con nosotros llamando al siguiente número de teléfono: <a class='bold link-blog' href='tel:+34955045999'>955 045 999</a></p>
						<p class='mt-4'>¡Nuestros especialistas estarán encantados de atenderte!</p>", 
		"feature" => false,
		"page_title" => "María Vives, enfermera de Urgencias en Hospital San Juan de Dios",
		"page_description" => "Desde el Hospital San Juan de Dios Sevilla, María Vives, enfermera, nos habla del modelo de atención de los pacientes en Urgencias",
	 	"keywords" => "Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, maría vives, hospital sevilla, urgencias 24 horas, urgencias sevilla",
	],
	"combatir-golpes-calor-personas-mayores-ninos" => (object) [
		"fecha" => "Viernes, 07 de julio 2023",
		"title_noticia" => "Cómo combatir los golpes de calor en personas mayores y niños: consejos de la Dra. María Cano",
		"img_main" => "/files/img/blog/combatir-golpes-calor-mayores-ninos.webp",
	 	"alt_img" => "Desde el Hospital San Juan de Dios Sevilla, María Cano, internista, nos da tips para combatir los golpes de calor en personas mayores y niños",
	 	"title_img" =>  "Combate los golpes de calor en personas mayores y niños con María Cano",
		"short_notice" => "Desde el Hospital San Juan de Dios Sevilla, María Cano, médica internista, nos da recomendaciones para combatir los golpes de calor en personas mayores y niños",
		"content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>Desde el Hospital San Juan de Dios Sevilla, María Cano, médica internista, nos da recomendaciones para combatir los golpes de calor en personas mayores y niños</span></h2>
						<p class='third-font-gray mt-4'>Con la llegada del verano y las altas temperaturas, es crucial estar preparados y tomar medidas para proteger nuestra salud y la de nuestros seres queridos. La Dra. María Cano, médica internista del Hospital San Juan de Dios Sevilla, nos presenta varias recomendaciones valiosas para combatir los golpes de calor, especialmente en personas mayores y niños.</p>
						<p class='third-font-gray xl bold mt-4'>Consejos para prevenir golpes de calor en personas mayores</p>
						<p class='third-font-gray mt-4'>En primer lugar, es fundamental recordar la importancia de la <strong'>hidratación.</strong> La doctora Cano enfatiza la necesidad de insistir a las personas mayores en la importancia de beber líquidos regularmente. El agua y los zumos son excelentes opciones para mantenerse hidratados. Además, es importante evitar las bebidas alcohólicas, ya que pueden contribuir a la deshidratación. También se debe tener en cuenta que las personas mayores pueden perder la capacidad de sentir sed, por lo que es necesario recordarles beber, incluso, si no sienten la necesidad.</p>
						<p class='third-font-gray mt-4'>Además de la hidratación, es crucial crear un <strong>ambiente fresco y ventilado</strong> en el hogar. Si es posible, utilizar el aire acondicionado para mantener una temperatura agradable. Evitar exponerse al calor intenso en las horas punta del día y buscar lugares con sombra cuando se esté al aire libre.</p>
						<p class='third-font-gray mt-4'>En cuanto a la <strong>alimentación,</strong> la dra. María recomienda optar por comidas ligeras en lugar de comidas copiosas. Las comidas pesadas pueden dificultar la digestión y aumentar la sensación de calor. Es preferible consumir alimentos frescos, como frutas y verduras, que son ricos en agua y nutrientes.</p>
						<p class='third-font-gray xl bold mt-4'>Recomendaciones para prevenir golpes de calor en niños</p>
						<p class='third-font-gray mt-4'>Cuando se trata de <a href='https://sjdsevilla.com/blog/consejos-generales' target='_blank' class='bold link-blog'>proteger a los niños</a> del calor, las recomendaciones son ligeramente diferentes. La dra. Cano destaca la importancia de asegurarse de que los niños beban suficiente líquido para mantenerse hidratados. En el caso de los lactantes, es fundamental darles el pecho con mayor frecuencia para garantizar una hidratación adecuada.</p>
						<p class='third-font-gray mt-4'>En términos de <strong>vestimenta,</strong> se recomienda vestir a los niños con ropa ligera y holgada que permita una mejor circulación de aire. Además, es esencial proteger sus cabezas con gorras o sombreros para evitar la exposición directa al sol.</p>
						<p class='third-font-gray mt-4'><strong>Evitar salir en las horas centrales del día,</strong> cuando las temperaturas son más altas, es otra medida de prevención importante. Animar a los niños a participar en actividades al aire libre durante las primeras horas de la mañana o las últimas horas de la tarde puede ayudar a evitar la exposición excesiva al calor.</p>
						<p class='third-font-gray mt-4'>María Cano también aconseja <strong>moderar la intensidad de los juegos</strong> y ejercicios en los días calurosos. Optar por actividades menos intensas y que no requieran un esfuerzo físico excesivo puede ayudar a prevenir la deshidratación y los golpes de calor en los niños.</p>
						<video class='w-100' controls autoplay playsinline loop>
							<source src='/files/video/maria-cano-internista.mp4' type='video/mp4'>
						</video>
						<p class='third-font-gray xl bold mt-4'>Servicio de medicina interna del Hospital</p>
						<p class='third-font-gray mt-4'>La medicina interna es la especialidad médica encargada de la atención integral del adulto, así como de diagnóstico, tratamiento no quirúrgico y prevención de las enfermedades. Nuestro equipo se compone de varios doctores, encabezado por <a href='https://sjdsevilla.com/blog/fernando-nebrera' target='_blank' class='bold link-blog'>Fernando Nebrera</a>,  todos ellos especialistas que trabajan por y para el paciente. </p>
						<p class='third-font-gray mt-4'>Es habitual que el internista requiera diferentes <strong>pruebas diagnósticas</strong> de diferentes tipos para el correcto diagnóstico, tratamiento y para el seguimiento de las enfermedades que habitualmente maneja, siempre trabajando en equipo y coordinados con otros especialistas.</p>
						<p class='third-font-gray mt-4'>Algunas de las pruebas que solicita pueden realizarse en la propia consulta, <strong>ahorrando tiempo al paciente,</strong> como son un electrocardiograma o una ecografía básica, y otras debe solicitarlas a otros profesionales, como son pruebas de imagen (radiografías, TAC, resonancia, ecografías avanzadas) o pruebas más específicas de áreas como cardiología, o intervencionistas como endoscopias, broncoscopias, etc.</p>
						<p class='third-font-gray mt-4'>Nuestro centro permite actualmente mantener la agenda de Medicina Interna <strong>sin lista de espera</strong> en consultas externas, lo que permite un <strong>servicio de calidad, personalizado y con inmediatez</strong> en todas las consultas y pruebas diagnósticas.</p>
						<p class='third-font-gray mt-4'>Si necesitas nuestra ayuda, o tienes alguna duda, no dudes en <a href='https://sjdsevilla.com/pedir-cita' target='_blank' class='bold link-blog'>pedir cita</a> en nuestra web, o bien llamando al <a class='bold link-blog' href='tel:+34955045999'>955 045 999</a>.</p>
						<p class='third-font-gray mt-4'>¡Nuestros profesionales estarán encantados de atenderte!</p>", 
		"feature" => false,
		"page_title" => "Combatir los golpes de calor en personas mayores y niños",
		"page_description" => "Desde el Hospital San Juan de Dios Sevilla, María Cano, internista, nos da recomendaciones para combatir los golpes de calor en personas mayores y niños",
	 	"keywords" => "internista sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, golpes calor, hospital sevilla",
	],
	"pedro-diaz-enfermero-uci-hospital-san-juan-dios-sevilla" => (object) [
		"fecha" => "Miércoles, 05 de julio 2023",
		"title_noticia" => "Conoce a Pedro Díaz, enfermero de la UCI en San Juan de Dios de Sevilla",
		"img_main" => "/files/img/blog/pedro-diaz-enfermero-uci-hospital-sevilla.png",
	 	"alt_img" => "Desde el Hospital San Juan de Dios Sevilla, Pedro Díaz, enfermero, nos habla del trato integral y especializado a los pacientes en la UCI",
	 	"title_img" =>  "Pedro Díaz, enfermero de la UCI de San Juan de Dios de Sevilla, nos presenta las instalaciones del hospital",
		"short_notice" => "Pedro Díaz, enfermero de la UCI en San Juan de Dios de Sevilla: “Aquí el paciente que entra no es un número de historia clínica, no es alguien más que entra por nuestra puerta. Ponemos nombre, cara y situación a cada uno: el paciente es el centro. Y no solo ellos, también su familia”",
		"content" => "<p class='xl third-font-gray mt-4'>Pedro Díaz, enfermero de la UCI en San Juan de Dios de Sevilla: “Aquí el paciente que entra no es un número de historia clínica, no es alguien más que entra por nuestra puerta. Ponemos nombre, cara y situación a cada uno: el paciente es el centro. Y no solo ellos, también su familia”</p>
						<p class='third-font-gray mt-4'>Pedro tiene vocación por la enfermería desde pequeño. Su referente y modelo a seguir era su tía abuela, por lo que su vocación viene de familia: “ Ella era muy conocida en mi pueblo, Osuna, y la querían mucho. Siempre estaba dispuesta a ayudar al más necesitado. No se nos puede olvidar que los enfermos son las personas más vulnerables  y que necesitan nuestra ayuda”.</p>
						<p class='third-font-gray mt-4'>Para él la enfermería dice ser reconfortante y muy técnica: <strong>“Es una profesión en la que estás al pie del cañón en todo momento y en la que estás en contacto directo con el paciente.</strong> Ver cómo mejora y, además, ver su cara de felicidad por haberse curado, te hace cómplice de ella. Es una satisfacción y  un sobresueldo que en otras profesiones no se encuentra”.</p>
						<p class='third-font-gray mt-4'>Y como en muchas profesiones, o en la mayoría, hay sub-especializaciones. En este caso, Pedro escogió adentrarse en uno de los mundos más sensibles y duros para el corazón humano: la UCI. La Unidad de Cuidados Intensivos suele ser, de cara a los pacientes y sus familiares, la unidad de un hospital que genera más miedos, dudas e incertidumbres. Cualquiera quisiera evitar estar él mismo o alguno de sus familiares en una situación que requiriese pasar <strong>24 horas bajo vigilancia, observación y monitorización continua.</strong> Sin embargo, necesitamos quien nos cuide o cuide de los nuestros en esos momentos críticos por un problema de salud grave.</p>
						<p class='third-font-gray mt-4'>Pedro, nuestro enfermero, nos cuenta lo que más le gusta de esta especialidad: “En la especialidad de UCI yo trato con pacientes de máxima vulnerabilidad y, en ese momento, cuando está más vulnerable, es cuando la persona se abre y exterioriza contigo. En concreto, lo que más me gusta de la UCI además de estar con los pacientes en los momentos más críticos, es que hay que estar pensando constantemente. Cada paciente y cada patología aquí se trata como si fuese un rompecabezas, no es problema-solución. Estamos ante un problema multifactorial al que hay que encontrar una solución. <strong>En la UCI siempre hay que pensar y estar activo. Aquí la estabilidad de un paciente pasa de 0 a 100 en cuestión de décimas de segundo, por lo que siempre debemos tener la mente muy ágil”.</strong></p>
						<p class='third-font-gray mt-4'>En los hospitales el personal asistencial, tanto médicos como enfermeros, desarrollan con desempeño el papel específico de cada rol y que a su vez son  complementarios. No hay una diferencia objetiva por la que separar a un médico de un enfermero, como comenta Pedro: “Yo no diría que existen diferencias, ambos se complementan. Aquí, en el equipo de UCI, cada uno desempeña una labor concreta. El médico puede ver la patología, mientras que el enfermero y el auxiliar son los ojos. Nosotros cuando estamos tan cerca del paciente se nos descubre una serie de síntomas que muchas veces en las analíticas no podemos ver, entonces aquí <strong>podríamos entender el equipo como las distintas partes de un cuerpo: no existe UCI sin médicos ni existe una UCI sin enfermeros y auxiliares, remamos todos hacia la misma dirección”.</strong></p>
						<p class='third-font-gray mt-4'>Por supuesto, también le preguntamos por su labor aquí en el Hospital San Juan de Dios de Sevilla, sobre qué es lo que más le gusta de trabajar con nosotros: “Lo que más me gusta es la forma de abordar al enfermo. Aquí la persona que entra no es un número de historia clínica, no es alguien más que entra por nuestra puerta. <strong>Ponemos nombre, cara y situación a cada uno: el paciente es el centro. Y no solo ellos, también su familia.</strong> En el Hospital de San Juan de Dios de Sevilla vamos un poco más allá a la hora de abordar la situación personal de cada paciente”.</p>
						<p class='third-font-gray mt-4'>Además, en nuestro hospital siempre buscamos diferenciarnos del resto de centros hospitalarios, y son muchos los factores (en cada especialización) que nos diferencian. Le preguntamos a Pedro, como enfermero, que nos contase qué cosas nos diferencian de otros hospitales, entre lo que destacó, sin pensárselo dos veces, el trato al paciente: “Destacamos en la manera que tenemos de involucrarnos el personal con los enfermos. En este hospital tenemos una asistencia humana, integral, joven, con fuerza y vocación que marca la diferencia, consiguiendo que el paciente nunca se sienta solo. <strong>Aquí no hay enfermos en soledad, están siempre acompañados en el proceso.</strong> Y no simplemente acompañarlos en la enfermedad, estamos junto a él, hablamos con él. El trato al paciente es terapéutico, hablar con un paciente hace que su proceso sea más leve. Hay que acompañarlo para que se olvide, en cierto modo de forma distendida, de que está en un hospital. Y creo que eso en este hospital se consigue”.</p>
						<p class='third-font-gray mt-4'>Por último, Pedro como enfermero de UCI y como venimos leyendo a lo largo de la entrevista, desempeña un papel fundamental con los pacientes más críticos, atendiendo sus necesidades, sus cuidados, ofreciéndoles una escucha activa y calidez en cada gesto de su asistencia. En nuestro hospital trabajamos por transmitir los valores de San Juan de Dios, nuestro fundador, a cada uno de nuestros pacientes: “San Juan de Dios se volcaba con los más necesitados, y aquí en la UCI es cuando el paciente más necesita nuestra ayuda, siguiendo un poco su ejemplo. <strong>Son pacientes críticos que están en un momento de máxima vulnerabilidad, y en esos momentos siempre encuentran una mano a la que agarrarse,</strong> e intentamos amenizarles su estancia en nuestro hospital. Somos enfermeros, sanitarios y, en algunos casos, incluso psicólogos. Y siempre desde el máximo respeto, acompañándolo y estando con él, sabiendo diferenciar el lugar del paciente y del profesional”.</p>
						<video class='w-100' controls autoplay playsinline loop>
							<source src='/files/video/video-pedro.mp4' type='video/mp4'>
						</video>
						<p class='xl third-font-gray mt-4'>La Unidad de Cuidados Intensivos de San Juan de Dios de Sevilla</p>
						<p class='third-font-gray mt-4'>Nuestro <strong>Servicio de Urgencias 24 horas de Medicina General y Pediátrica</strong> pone a disposición de los pacientes y sus familiares un amplio y cualificado equipo de profesionales preparados para atender cualquier tipo de urgencia.</p>
						<p class='third-font-gray mt-4'>Nuestra UCI (Unidad de Cuidados Intensivos) está equipada con la <strong>tecnología más avanzada</strong> en electromedicina, respiración asistida, desfibriladores y electrocardiogramas (entre otros) que son revisados diariamente para garantizar su máximo rendimiento.</p>
						<p class='third-font-gray mt-4'>Está formada por 4 boxes (uno de ellos de aislamiento) para los pacientes más críticos, <strong>liderado por un equipo joven y dinámico que trabaja por y para el paciente.</strong></p>
						<p class='third-font-gray mt-4'>Si necesitas nuestra ayuda no dudes en <a class='bold link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>pedir cita</a> en nuestra web, o bien llamando al <a class='bold link-blog' href='tel:+34955045999'>955 045 999.</a></p>
						<p class='large third-font-gray mt-4'>¡Nuestros profesionales te esperan! </p>", 
		"feature" => false,
		"page_title" => "Pedro Díaz, enfermero de la UCI de San Juan de Dios de Sevilla",
		"page_description" => "Desde el Hospital San Juan de Dios Sevilla, Pedro Díaz, enfermero, nos habla del trato diferencial a los pacientes en la UCI",
	 	"keywords" => "enfermero UCI, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, pedro díaz, hospital sevilla",
	],
	"fernando-nebrera-medicina-interna-hospital-san-juan-dios-de-sevilla" => (object) [
		"fecha" => "Lunes, 03 de julio 2023",
		"title_noticia" => "Fernando Nebrera, jefe de servicio de medicina interna: “los médicos internistas sabemos un poquito de todo”",
		"img_main" => "/files/img/blog/fernando-nebrera-internista-sevilla.png",
	 	"alt_img" => "Fernando Nebrera, jefe de servicio de medicina interna en el Hospital San Juan de Dios de Sevilla: “los médicos internistas sabemos un poquito de todo”",
	 	"title_img" =>  "Fernando Nebrera, médico internista en San Juan de Dios de Sevilla",
		"short_notice" => "Fernando Nebrera es un reconocido médico internista del Hospital San Juan de Dios de Sevilla. Su vocación por la medicina empezó desde muy pequeño: “Desde niño ya decía que quería ser cirujano, por mi ambición de ayudar, aunque nunca llegué a serlo” sonríe.",
		"content" => "<p class='third-font-gray mt-4'>Fernando Nebrera es un reconocido médico internista del Hospital San Juan de Dios de Sevilla. Su vocación por la medicina empezó desde muy pequeño: “Desde niño ya decía que quería ser cirujano, por mi ambición de ayudar, aunque nunca llegué a serlo” sonríe.</p>
						<p class='third-font-gray mt-4'><strong>Su pasión es la medicina global</strong> y la especialidad que más abarcaba sin dejar “nada fuera” es la medicina interna: “lo que más me gusta de esta especialidad es que <strong>puedes enfrentarte prácticamente a cualquier paciente</strong>, entender y reconocer cuáles son los problemas, ordenarlos, categorizarlos y buscar una solución a cada uno de ellos, cosa que otros especialistas les cuesta un poco más porque se centran solamente en un área concreta”.</p>
						<p class='third-font-gray mt-4'>Licenciado en medicina por la Universidad de Sevilla, escogió la especialidad de medicina interna tras seis años de carrera en los que debes estudiar cada una de las ramas de la medicina, aunque él no era capaz de decantarse por una única: “me gustaban todas las asignaturas y escoger solamente una me parecía algo “aburrido”. <strong>La medicina interna te da una capacidad y una visión más global</strong> como en la medicina general clásica antigua <strong>que te permite enfrentarte casi a cualquier problema sin miedo</strong>. Prácticamente, sin ser especialista en nada en concreto, eres especialista en todo. Los médicos internistas sabemos mucho de algunas áreas”.</p>
						<p class='third-font-gray mt-4'>Fernando es el <strong>jefe del equipo de médicos internistas en nuestro hospital.</strong> Para él serlo dice ser estimulante, destaca que “al ser todo nuevo, tenemos que adaptarnos a cómo vamos trabajando y a cómo va cambiando la actividad y las necesidades. No hay una línea continuista que seguir, sino que es pluripotencial: cada profesional puede convertirse en lo que quiera, dando ibertad a los profesionales de tal forma que cada uno se pueda desarrollar cómodamente dentro del área que más le guste”.</p>
						<p class='third-font-gray mt-4'>Desde su criterio como profesional, el núcleo de medicina interna no ha cambiado a lo largo de los años, nos cuenta que <strong>“el centro sigue siendo el mismo, un paciente pluripatológico con múltiples problemas que necesita un médico</strong> que lo ajuste y le “arregle” todo de una única vez, o bien, que haga un ejercicio de diagnóstico que no sea fácil de hacer. Eso es igual que hace 100 años”.</p>
						<p class='third-font-gray mt-4'>Sin embargo, puntualiza que hay algo que sí ha evolucionado a lo largo de los años: se ha puesto en valor a los médicos internistas. Nos cuenta Fernando que “antes era normal que hubiese internistas y hora se nos valora como un médico capaz de resolver el problema cuando no se sabe bien qué hacer con el enfermo, porque cada vez los pacientes suelen presentar más problemas simultáneos a la vez, y los especialistas tienden a abordar un único problema. Ahí hemos ganado territorio y protagonismo. Y hemos ganado mucha fuerza también después del COVID, porque se ha visto que hemos sido capaces de hacer un <strong>manejo integral de pacientes con muchos problemas, </strong>todos juntos y a la vez, y de liderar a grupos de especialistas en la toma de decisiones”. </p>
						<p class='third-font-gray mt-4'>Por último, a nuestro jefe de equipo lo que más le gusta de trabajar en nuestro hospital, suyo también, es poder combinar la actividad de planta del centro junto con las consultas externas, a un ritmo controlado y tranquilo, no desbordado.</p>
						<p class='third-font-gray mt-4 large'>Servicio de medicina interna del Hospital San Juan de Dios de Sevilla: sin lista de espera en nuestras consultas</p>
						<p class='third-font-gray mt-4'>La medicina interna es la especialidad médica encargada de la atención integral del adulto, así como de diagnóstico, tratamiento no quirúrgico y prevención de las enfermedades. Nuestro equipo se compone de varios doctores, todos ellos especialistas, que trabajan por y para el paciente.</p>
						<p class='third-font-gray mt-4'>Nuestro centro permite actualmente mantener la agenda de Medicina Interna <strong>sin lista de espera</strong> en consultas externas, lo que permite un <strong>servicio de calidad</strong>, con tiempo suficiente, <strong>personalizado y con inmediatez</strong> en todas las consultas y pruebas diagnósticas.</p>
						<p class='third-font-gray mt-4'>Si necesitas nuestra ayuda no dudes en <a class='bold link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>pedir cita</a> en nuestra web, o bien llamando al <a href='tel:+34955045999'>955 045 999.</a></p>
						<p class='third-font-gray mt-4'>¡Nuestros profesionales te esperan! </p>", 
		"feature" => false,
		"page_title" => "Fernando Nebrera médico internista en San Juan de Dios de Sevilla",
		"page_description" => "Fernando Nebrera, jefe de servicio de medicina interna en el Hospital San Juan de Dios de Sevilla: “los médicos internistas sabemos un poquito de todo”",
	 	"keywords" => "internista sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, Fernando Nebrera, hospital sevilla",
	],
	"maria-cano-internista" => (object) [
		"fecha" => "Miércoles, 28 de junio 2023",
		"title_noticia" => "Conoce a María Cano, médico internista del Hospital San Juan de Dios Sevilla",
		"img_main" => "/files/img/blog/maria-cano-internista-sevilla.jpg",
	 	"alt_img" => "Desde el Hospital San Juan de Dios Sevilla, María Cano, internista, nos habla de lo agradecidos que están los pacientes del hospital",
	 	"title_img" =>  "María Cano, internista en Hospital de San Juan de Dios de Sevilla",
		"short_notice" => "María Cano es médico internista especializada por el Hospital Universitario Virgen Macarena aquí en Sevilla.",
		"content" => "	<p class='xl mt-4'>María Cano, médico internista en nuestro Hospital de San Juan de Dios de Sevilla: “La mayoría de nuestros pacientes se van muy agradecidos con el trato recibido”</p>
						<p class='third-font-gray mt-4'>María Cano es médico internista especializada por el Hospital Universitario Virgen Macarena aquí en Sevilla. Tiene vocación como médico desde pequeña y no recuerda haber pensado nunca dedicarse a otra profesión que no fuese la que hoy tiene: “no recuerdo haber querido otra cosa diferente a ser médico. Me viene la vocación de familia sin duda, mi padre es médico, un tío mío también, y me han ido inculcando la medicina desde siempre”.</p>
						<p class='third-font-gray mt-4'>María escogió en su día la especialidad de medicina interna por tener un trato cercano con el paciente. Nos cuenta que, desgraciadamente, hay médicos que huyen del trato más cercano con el paciente, del tú a tú, pero que a ella siempre le ha gustado hablar con las personas: <span class='bold'>“En medicina interna tenemos que aunar tantas patologías y síntomas y escuchar mucho al paciente, y siempre me gustó esa parte más global”.<span></p>
						<p class='third-font-gray mt-4'>Lo que más le gusta de su especialidad es hacer un poquito de todo, con una visión muy global del paciente: “Conectamos las relaciones que puedan tener las distintas patologías, hacemos labor de prevención, y puedes dedicarte dentro de la medicina interna (que es muy amplia) a elegir tu propio camino en el área que más te guste. Poco a poco, a medida que avanzas en el ámbito laboral, uno va descubriendo qué es lo que más le gusta”. Y a nuestra médico internista lo que más le llama la atención es tratar con pacientes paliativos: “me gustan bastante y me siento muy cómoda con los pacientes crónicos y paliativos, aunque toco todo lo que sea de medicina interna”. </p>
						<p class='third-font-gray mt-4'><span>En nuestro hospital recibimos a pacientes privados y públicos, lo que nos diferencia en gran parte del resto de centros.</span> Preguntamos a María cómo es tratar con pacientes paliativos y si es complicado a nivel personal y emocional, lo que confirmó con un sí rotundo: “Sí, te puedes llegar a involucrar incluso personalmente. Son pacientes que pueden llegar a estar mucho tiempo aquí con nosotros en el hospital y, viendo su seguimiento, vas viendo el recorrido de su enfermedad, cómo se va deteriorando poco a poco, <span class='bold'>la familia deposita su confianza en ti para que mejore la calidad de vida del paciente…</span> Cuando los especialistas de otros centros nos derivan casos de pacientes crónicos o paliativos de larga estancia con baja intensidad de cuidados y, habitualmente, con una alta carga social por la insuficiencia de recursos personales o de cuidadores para darles el soporte necesario que precisan, nosotros los recibimos y son atendidos en nuestro centro por un <span class='bold'>equipo multidisciplinar</span> (médicos internistas, enfermeros, trabajadores sociales y <a class='bold link-blog' target=”_blank” href='https://sjdsevilla.com/nuestro-centro/atencion-espiritual'>SAER</a>) para ofrecerles una <span class='bold'>atención integral de sus necesidades y mejorar su calidad de vida al final de la misma.</span></p>
						<p class='third-font-gray mt-4'>Por otro lado, en nuestro hospital buscamos y nos esforzamos porque nuestros profesionales se sientan cómodos. <span class='bold'>Cada uno es imprescindible en su área.</span> María ha vivido la transición entre el hospital nuevo y el anterior, y nos cuenta qué es lo que más le gusta de trabajar con nosotros: “ Siempre he estado muy agusto con el equipo humano, creo que hay grandes profesionales que siempre están dispuestos a escuchar al paciente y siempre se ha intentado dar salida a los problemas que traslada el paciente sin mirar a otro lado. Hemos remado todos a una y hay casos muy complicados: casos crónicos de larga estancia en los que hemos hecho de nexo con otros especialistas, trabajando conjuntamente con enfermería o con trabajo social, que desempeña un papel fundamental en el centro. Sin duda, es algo que me encanta, porque se trabajan muchos aspectos distintos del paciente y hay que dar respuesta, lo que te da gratitud”.</p>
						<p class='third-font-gray mt-4'>Además, <span class='bold'>los valores de San Juan de Dios son nuestro centro.</span> Intentamos transmitir la <a href='https://sjdsevilla.com/solidaridad' target='_blank' class='bold link-blog'>solidaridad</a>, la caridad, el acompañamiento y la atención en cada paciente, y según nos comenta María, “sin duda es así, y creo que lo perciben así. La mayoría de nuestros pacientes se van muy agradecidos por ese trato y ese plus que se da respecto a otros centros”.</p>
						<p class='third-font-gray mt-4'>Por último, para ella el <span class='bold'>factor diferencial del servicio de medicina interna con respecto a otros centros se centra en la convivencia tanto de los pacientes privados como públicos:</span> “En la parte privada se da una respuesta inmediata a la demanda de los pacientes, no hay listas de espera, y al mismo tiempo la medicina interna hace de nexo con otros especialistas, lo cual es muy bueno para vehiculizar el camino de ese paciente en el recorrido que tenga que llevar. Sobre todo se da una <span class='bold'>respuesta inmediata, un acceso fácil,</span> que es lo que busca el paciente, y se está dando una salida buena. En la parte de nuestros pacientes crónicos se está dando mucha respuesta, aunque también hay mucho trabajo social. Cuando recibimos a un paciente que viene de otro centro, aquí estamos trabajando para darle la mejor salida y el mejor futuro”. </p>
						<p class='third-font-gray large bold mt-4'>Servicio de medicina interna del Hospital San Juan de Dios de Sevilla: respuesta inmediata y fácil acceso</p>
						<p class='third-font-gray mt-4'>La medicina interna es la especialidad médica encargada de la atención integral del adulto, así como de diagnóstico, tratamiento no quirúrgico y prevención de las enfermedades. Nuestro equipo se compone de varios doctores, todos ellos especialistas, que trabajan por y para el paciente.  Nuestro centro permite actualmente mantener la agenda de Medicina Interna <span class='bold'>sin lista de espera</span> en consultas externas, lo que permite un <span class='bold'>servicio de calidad,</span> con tiempo suficiente, <span class='bold'>personalizado</span> y <span class='bold'>con inmediatez</span> en todas las consultas y pruebas diagnósticas.</p>
						<p class='third-font-gray mt-4'>Si necesitas nuestra ayuda no dudes en <a href='https://sjdsevilla.com/pedir-cita' target='_blank' class='bold link-blog'>pedir cita</a> en nuestra web, o bien llamando al <a class='bold link-blog' href='tel:+34955045999'>955 045 999</a>.</p>
						<p class='third-font-gray mt-4'>¡Nuestros profesionales te esperan!</p>", 
		"feature" => false,
		"page_title" => "María Cano, internista en Hospital de San Juan de Dios de Sevilla",
		"page_description" => "Desde el Hospital San Juan de Dios Sevilla, María Cano, internista, nos nos habla de lo agradecidos que están los pacientes del hospital",
	 	"keywords" => "internista sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, maria cano, hospital sevilla",
	],
	"juande-compañero-atención-temprana-niños" => (object) [
		"fecha" => "Lunes, 26 de junio 2023",
		"title_noticia" => "Juande, el nuevo compañero de aventuras en la terapia de los niños",
		"img_main" => "/files/img/blog/robot-juande-atencion-temprana-sevilla-min.png",
	 	"alt_img" => "El proyecto Juande en el Hospital San Juan de Dios de Sevilla es una iniciativa que busca mejorar la terapia de los niños con dificultades neuromotoras",
	 	"title_img" =>  "Juande, fundamental en la atención temprana de los niños",
		"short_notice" => "El proyecto Juande en el Hospital San Juan de Dios de Sevilla es una iniciativa que busca mejorar la terapia de los niños con dificultades neuromotoras a través de un robot interactivo",
		"content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>El proyecto Juande en el Hospital San Juan de Dios de Sevilla es una iniciativa que busca mejorar la terapia de los niños con dificultades neuromotoras a través de un robot interactivo</span></h2>
						<p class='third-font-gray mt-4'>En el <a href='https://sjdsevilla.com/infantil-temprana' target='_blank' class='bold link-blog'>Centro de Atención Infantil Temprana</a> (CAIT) del Hospital San Juan de Dios de Sevilla, estamos llevando a cabo un emocionante proyecto que busca mejorar las terapias con niños de 0 a 6 años con dificultades neuromotoras. Este proyecto ha dado lugar a la creación de Juande, un robot interactivo que se convertirá en el nuevo compañero de aventuras y ayudante tecnológico en las sesiones de terapia de estos pequeños pacientes.</p>
						<p class='third-font-gray mt-4'>El objetivo principal de Juande es ofrecer una herramienta no invasiva que permite tomar medidas cuantitativas durante las sesiones de terapia, en lugar de depender de evaluaciones más de índole cualitativo. Esta innovadora tecnología permite medir el movimiento funcional en actividades como el baile y la coreografía y, gracias a ella, obtener información precisa sobre los grados de <span class='bold'>mejora articular</span> en el día a día de los niños.</p>
						<p class='third-font-gray large bold mt-4'>Sesiones terapéuticas con Juande</p>
						<p class='third-font-gray mt-4'>El proyecto Juande tiene como finalidad mejorar los tratamientos y hacerlos más efectivos. Al contar con una herramienta de medición más precisa, los terapeutas pueden adaptar las actividades terapéuticas a las dificultades específicas detectadas en cada niño. Además, el factor motivacional es clave, ya que el robot despierta el interés y la participación de los niños, haciéndoles repetir las secuencias de movimientos de manera divertida y lúdica. Esto ayuda a que las <span class='bold'>sesiones terapéuticas sean más agradables</span> y aumenta la motivación de los pequeños, lo que a su vez favorece su recuperación.</p>
						<p class='third-font-gray mt-4'>El robot Juande desempeña un papel importante de motivación, al <span class='bold'>captar mejor la atención del niño</span>, y darle un enfoque más efectivo, reforzador y dinámico durante la terapia.</p>
						<p class='third-font-gray mt-4'>Gradualmente, Juande <span class='bold'>se convertirá en un terapeuta más dentro de las sesiones</span>, dirigido por los fisioterapeutas y, en el futuro, terapeutas ocupacionales. La idea es integrarlo de forma permanente en las sesiones de terapia, sobre todo en aquellas que requieran una evaluación, realizando evaluaciones conjuntas periódicas para medir los grados de mejora a través del juego y los ángulos de movimiento que se desean medir en el día a día. Las mejoras obtenidas se registran en el sistema informático del hospital, permitiendo cuantificar los avances en las actividades cotidianas y en las terapias individuales de cada niño.</p>
						<video class='w-100' autoplay preload='none' playsinline muted loop>
							<source src='/files/video/Robot-Juande-Atencion-Temprana.mp4' type='video/mp4'>
						</video>
						<p class='third-font-gray mt-4 large bold'>La influencia de Juande en la terapia de los niños</p>
						<p class='third-font-gray mt-4'>La presencia de Juande en las sesiones de terapia ofrece <span class='bold'>múltiples beneficios para los niños</span>. Además del aspecto motivacional, que les incita a participar y repetir los movimientos, el robot también ayuda a mejorar la atención y la concentración de los niños durante las actividades terapéuticas. Al captar su atención de manera lúdica, se logra un mayor número de repeticiones de movimientos específicos, lo que permite medir y mejorar la ejecución de los mismos.</p>
						<p class='third-font-gray mt-4'><span class='bold'>Los profesionales que utilizan a Juande</span>, hablan de la motivación y una mayor adherencia a las terapias por el aumento de la colaboración y, por lo tanto, del número de repeticiones de las actividades que se le proponen.</p>
						<p class='third-font-gray mt-4'>La tecnología de Juande permite monitorizar y medir de forma objetiva los grados de movimiento activo de las articulaciones de los niños. Los datos obtenidos se utilizan para proponer <span class='bold'>mejoras en los diagnósticos y tratamientos</span>, así como para establecer factores predictivos de la evolución de cada niño. Esto proporciona a los terapeutas una visión más precisa y detallada de la evolución de cada paciente y les permite diseñar tratamientos individualizados y ajustados a las necesidades de cada uno.</p>
						<p class='third-font-gray mt-4'>El proyecto Juande representa un avance significativo en la terapia infantil, ofreciendo una herramienta tecnológica innovadora que mejora la efectividad de los tratamientos y motiva a los niños a participar activamente en su proceso de recuperación. Con Juande como aliado, el Hospital San Juan de Dios de Sevilla continúa su compromiso de asegurar una atención integral y de calidad a los niños con dificultades neuromotoras, proporcionándoles las herramientas necesarias para su desarrollo y bienestar.</p>
						<p class='third-font-gray mt-4'>Si necesitas nuestra ayuda, o tienes alguna duda sobre nuestras terapias infantiles, no dudes en <a href='https://sjdsevilla.com/pedir-cita' target='_blank' class='bold link-blog'>pedir cita</a> en nuestra web, o bien llamando al 955 045 999.</p>
						<p class='third-font-gray mt-4'>¡Nuestros profesionales estarán encantados de atenderte! </p>", 
		"feature" => false,
		"page_title" => "Juande, el nuevo compañero en la atención temprana de los niños",
		"page_description" => "El proyecto Juande en el Hospital San Juan de Dios de Sevilla es una iniciativa que busca mejorar la terapia de los niños con dificultades neuromotoras a través de un robot interactivo",
	 	"keywords" => "Juande, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, atención temprana Sevilla, hospital Sevilla",
	],
	"area-medicina-intensiva-hospital-san-juan-dios-sevilla" => (object) [
        "fecha" => "Viernes, 23 de junio 2023",
        "title_noticia" => "Área de medicina intensiva del Hospital San Juan de Dios Sevilla",
        "img_main" => "/files/img/blog/medicina-intensiva-uci-sevilla.png",
        "alt_img" => "En el Hospital San Juan de Dios de Sevilla, nos enorgullece ofrecer servicios de Medicina Intensiva y UCI cercanos y de calidad",
        "title_img" =>  "Descubre el área de medicina intensiva del Hospital San Juan de Dios Sevilla",
        "short_notice" => "En el Hospital San Juan de Dios de Sevilla, nos enorgullece ofrecer servicios de Medicina Intensiva y UCI cercanos y de calidad, demostrando nuestro compromiso con la excelencia en la atención médica en todas las áreas",
        "content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>En el Hospital San Juan de Dios de Sevilla, nos enorgullece ofrecer servicios de Medicina Intensiva y UCI cercanos y de calidad, demostrando nuestro compromiso con la excelencia en la atención médica en todas las áreas</span></h2>
                        <p class='third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla el área de Medicina Intensiva y la Unidad de Cuidados Intensivos (UCI) son muy importantes. Estas áreas juegan un papel crucial en la atención médica, especialmente cuando se trata de pacientes que se encuentran en situaciones complejas. Nuestro principal objetivo en la atención médica es el reflejo de nuestra dedicación plena en el paciente.</p>
                        <p class='third-font-gray mt-4'>La Medicina Intensiva y la UCI son pilares fundamentales en la atención de pacientes que requieren monitoreo constante y cuidados intensivos. En el Hospital San Juan de Dios de Sevilla, nos enorgullece contar con un equipo de grandes especialistas de médicos intensivistas, enfermeros especializados y profesionales de la salud que trabajan de forma constante para garantizar la atención cercana y especializada de nuestros pacientes.</p>
                        <p class='third-font-gray mt-4 large bold'>Unidad de Cuidados Intensivos</p>
                        <p class='third-font-gray mt-4'>Nuestra Unidad de Cuidados Intensivos está equipada con tecnología de última generación y cuenta con instalaciones modernas y cómodas para brindar un entorno adecuado para la recuperación del paciente. Desde enfermedades respiratorias agudas hasta traumatismos graves, nuestro equipo de Medicina Intensiva está preparado para abordar una amplia gama de situaciones críticas, proporcionando cuidados especializados, monitoreo constante y tratamientos adecuados a cada situación.</p>
                        <p class='third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla reconocemos que la Medicina Intensiva y la UCI no sólo se tratan de atención médica, sino también de brindar apoyo emocional y psicológico a nuestros pacientes y familiares. Comprendemos que enfrentar una situación compleja puede ser abrumador, por lo que contamos con un equipo de profesionales capacitados que brindan soporte emocional y contención durante todo el proceso de atención.</p>
                        <p class='third-font-gray mt-4'>La excelencia en el ámbito de la medicina se logra gracias a nuestra constante búsqueda de conocimientos y mejoras. En el Hospital San Juan de Dios de Sevilla invertimos en la formación continua de nuestro equipo médico, asegurándonos de estar al tanto de los avances más recientes en el campo de la Medicina Intensiva. Esto nos permite ofrecer a nuestros pacientes las opciones de tratamiento más avanzadas y efectivas disponibles.</p>
                        <p class='third-font-gray mt-4 large bold'>Servicios médicos diferenciales</p>
                        <p class='third-font-gray mt-4'>Desde el área de medicina intensiva proporcionamos una atención personalizada y adaptada a las circunstancias particulares de cada paciente, buscando siempre la máxima satisfacción. Nuestra <a href='https://sjdsevilla.com/medicina-intensiva-sevilla' target='_blank' class='bold link-blog'>Unidad de Cuidados Intensivos</a> se caracteriza por ser una unidad de puertas abiertas, sin horarios, con el objetivo de alcanzar el bienestar y la salud tanto del paciente como de sus familiares. Contamos con programas innovadores para la pronta recuperación del enfermo para garantizar el bienestar durante su ingreso.</p>
                        <p class='third-font-gray mt-4 large bold'>Equipos médicos multidisciplinares a tu disposición</p>
                        <p class='third-font-gray mt-4'>La medicina intensiva se encarga de la vigilancia, tratamiento y cuidados de pacientes que se encuentran en estado crítico y que requieren de supervisión y monitorización constante.</p>
                        <p class='third-font-gray mt-4'>Son atendidos por intensivistas que cuentan con una formación específica horizontal que cubre los distintos aspectos del paciente crítico. Este gran equipo está coordinado por el Dr. Osama Barakat Shrem, como jefe de equipo, Dr. Esteban Fernández Hinojosa, Dra. María José Fernández Pérez, Dr. Manuel García Sepúlveda, Dra. Isabel Gutiérrez Morales, Dr. Jesús Rafael Herrera Gutiérrez, Dr. Ricardo Esteban Martínez Arcos, Dr. José Cayetano Naranjo Jarillo, Dr. Vicente Padilla Morales y, por último, el doctor Luis Eduardo Sierra Cristancho.</p>
                        <p class='third-font-gray mt-4'>Entre las principales consultas del área se encuentran: patología cardíaca, insuficiencia respiratoria aguda, patología neurológica, politraumatizados graves, postoperatorio de cirugía mayor, fracaso multiorgánico y fallo renal agudo, entre otras.</p>
                        <p class='third-font-gray mt-4'>Si necesitas cualquier consulta relacionada con nuestra Unidad de Cuidados Intensivos, no dudes en <a href='https://sjdsevilla.com/contacto' target='_blank' class='bold link-blog'>ponerte en contacto</a> con nuestro equipo médico de profesionales.</p>", 
        "feature" => false,
        "page_title" => "Área de medicina intensiva del Hospital San Juan de Dios Sevilla",
        "page_description" => "En el Hospital San Juan de Dios de Sevilla, nos enorgullece ofrecer servicios de Medicina Intensiva y UCI cercanos y de calidad",
        "keywords" => "internista sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, UCI sevilla, medicina intensiva sevilla, hospital sevilla",
    ],
	"cuentacuentos-sjd" => (object) [
		"fecha" => "Lunes, 19 de junio 2023",
		"title_noticia" => " ‘Cuentacuentos’: una actividad organizada por el Hospital de San Juan de Dios de Sevilla para estimular el desarrollo del lenguaje en los niños",
		"img_main" => "/files/img/blog/cuentacuentos-hospital-san-juan-dios-sevilla.jpg",
	 	"alt_img" => "Cuentacuentos infantil, nuestra nueva actividad del Centro de Atención Infantil Temprana de San Juan de Dios",
	 	"title_img" =>  "Nueva actividad del Centro de Atención Infantil Temprana de San Juan de Dios Cuentacuentos.",
		"short_notice" => "A través de cuentos y trucos de magia, nuestro Centro de Atención Infantil Temprana estimula el cerebro de los más pequeños.",
		"content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>A través de cuentos y trucos de magia, nuestro Centro de Atención Infantil Temprana estimula el cerebro de los más pequeños.</span></h2>
						<p class='third-font-gray mt-4'>El pasado lunes 19 de junio tuvo lugar en el salón de actos del Hospital San Juan de Dios de Sevilla, la actividad ‘Cuentacuentos’, desarrollada en colaboración con la Fundación José Manuel Lara y el CAIT, con el objetivo de <b>enseñar a los padres cómo usar los cuentos para potenciar el desarrollo del lenguaje, emocional o cognitivo en los niños.</b> </p>
						<p class='third-font-gray mt-4'>Rocío Carrasco, coordinadora de los <a class='bold link-blog' target=”_blank” href='https://sjdsevilla.com/infantil-temprana'>centros CAIT</a> ( Centros de Atención Infantil Temprana) en Sevilla, fue quien dio la bienvenida a las familias con niños de nuestra área de atención temprana y quien presentó a Francisco Nuño, más conocido como Fran, el lector protagonista de la actividad, escritor de cuentos infantiles y encargado de su propia librería. </p>
						<p class='third-font-gray mt-4'>La tarde fue emocionante y divertida. Fue una <b>combinación de cuentos y trucos de magia</b> que asombraron en todo momento al público y los invitaba a participar. Aplausos, risas y otras onomatopeyas se escuchaban sucesivamente durante toda la hora que duró la actividad. La <a class='bold link-blog' target=”_blank” href='https://fundacionjmlara.es'>Fundación José Manuel</a> Lara nos ayudó a que fuese posible esta actividad tan distraída en la que nos vimos sumergidos en los cuentos todos los allí presentes. </p>
						<div class='text-center'>
						<video controls class='' src='/files/video/cuentacuentos-hospital-sevilla.mp4' alt='Video cuentacuentos' style='width: 100%;'></video>
						</div>
						<p class='third-font-gray mt-4'>La exposición continuada a las pantallas pone a los niños en “modo avión”</p>
						<p class='third-font-gray mt-4'>También el pasado viernes, Día Nacional de la Atención Temprana, fue cuando nuestra compañera Rocío Carrasco visitó los estudios de grabación de <a class='bold link-blog' target=”_blank” href='https://cadenaser.com/buscar/?query=ATENCION%20TEMPRANA'>Radio Sevilla</a> (Cadena Ser). Una entrevista para el programa ‘Hoy por Hoy Sevilla’ en la que hizo referencia a la <b>importancia de estimular el cerebro de los niños con otras alternativas a las pantallas, como los cuentos.</b></p>
						<p class='third-font-gray mt-4'>Pero, ¿qué es realmente lo que pasa en el cerebro de los niños cuando están expuestos a las pantallas? Que mínimamente <b>su cerebro está encendido pero, realmente, no está recopilando información.</b> Desde el Hospital San Juan de Dios de Sevilla nos sumamos a evitar la continuada exposición de los pequeños a las pantallas y a buscar otras alternativas y recursos que estimulen, a través de la experiencia, las redes neuronales que están en vía de desarrollo en edades claves como es el intervalo de los 0 a los 6 años, la edad tratada en nuestro centro CAIT. ¿Y cómo lo hacemos? A través de proyectos y actividades como ‘Cuentacuentos’ o zonas habilitadas que están libres de pantallas y tecnología.</p>
						<p class='third-font-gray mt-4'>Si bien es cierto que la tecnología ofrece muchas ventajas en nuestro día a día y nos facilita la conectividad con otras personas y nos arroja a un abismo de información siempre accesible, también cuenta con muchas otras desventajas que no ayudan, en este caso, a los niños. Así es como surge la iniciativa por parte de nuestro equipo de Atención Temprana ‘Cuentacuentos’, para recordar a las familias que <b>existen muchas otras alternativas a las pantallas que estimulan y hacen crecer de mejor forma a los más pequeños de la casa.</b></p>
						<p class='third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla contamos con una sala para los niños de atención temprana y para sus padres, que tiene por nombre <b>‘zona sin pantallas’.</b> En ella se pone en práctica que los niños aprendan y jueguen con objetos y juegos reales: <b>“aprender y jugar van de la mano y es más fácil cuando tenemos con quien compartir nuestro tiempo y nuestros juegos”.</b> Esta sala cuenta con una serie de consejos para los padres y sus hijos:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>No se permite el uso del móvil o tablet como distracción en esta zona.</li>
							<li class='mt-2'>Se deben traer juguetes, cuentos u otros objetos que los niños puedan mostrar, compartir o enseñar. </li>
							<li class='mt-2'>Aprovecha los momentos de juego compartido para los aprendizajes diarios: aspectos sociales, comunicación, lenguaje…</li>
							<li class='mt-2'>¡Importante! Somos el ejemplo para nuestros niños, levanta tu mirada de la pantalla. </li>
						</ul>
						<p class='third-font-gray mt-4'>En nuestro centro seguimos velando cada día por cada uno de nuestros pacientes, independientemente de su edad: desde nuestros niños de atención temprana, los más pequeños, hasta nuestros pacientes de cuidados paliativos, los más mayores. Todos ellos son el centro y el eje de nuestro hospital San Juan de Dios.</p>
						<p class='third-font-gray mt-4'>Una vez más, dar las gracias a la Fundación José Manuel Lara y a Francisco Nuño por su participación el pasado lunes en nuestra actividad ‘Cuentacuentos’. </p>", 
		"feature" => false,
		"page_title" => "‘Cuentacuentos’: estimulando el desarrollo del lenguaje en niños",
		"page_description" => "Nueva actividad del Centro de Atención Infantil Temprana de San Juan de Dios: Cuentacuentos. La estimulación del lenguaje a través de los cuentos",
	 	"keywords" => "Cuentacuentos Sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, actividad atención temprana sevilla, atención temprana sevilla",
	],
	"servicio-de-podologia" => (object) [
		"fecha" => "Martes, 13 de junio 2023",
		"title_noticia" => "Servicio de podología del Hospital San Juan de Dios Sevilla",
		"img_main" => "/files/img/blog/pologia-sevilla-hospital-san-juan-dios.png",
	 	"alt_img" => "Descubre nuestro completo servicio de podología en el Hospital San Juan de Dios Sevilla",
	 	"title_img" =>  "Podología Sevilla, Hospital San Juan de Dios Sevilla",
		"short_notice" => "Deja la salud de tus pies en manos expertas. Descubre nuestro completo servicio de podología en el Hospital San Juan de Dios Sevilla",
		"content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>Deja la salud de tus pies en manos expertas. Descubre nuestro completo servicio de podología en el Hospital San Juan de Dios Sevilla</span></h2>
						<p class='third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla es reconocido por su excelencia y dedicación en todas las áreas de la salud. Por ello, no podía faltar entre nuestras <a class='bold link-blog' target=”_blank” href='https://sjdsevilla.com/servicios'>especialidades médicas</a> un servicio de podología especializado y comprometido con la salud y el bienestar de nuestros pacientes.</p>
						<p class='third-font-gray mt-4'>La <a class='bold link-blog' target=”_blank” href='https://sjdsevilla.com/podologo-sevilla'>podología</a> es una rama de la medicina que se enfoca en el estudio, diagnóstico y tratamiento de las enfermedades y alteraciones que afectan los pies y las extremidades inferiores. Es una disciplina fundamental para mantener la salud y funcionalidad de nuestros pies, que desempeñan un papel vital en nuestra movilidad y bienestar general.</p>
						<p class='third-font-gray mt-4'>Nuestra área de podología está equipada con tecnología de vanguardia y herramientas especializadas para realizar evaluaciones y diagnósticos precisos. Desde uñas encarnadas o juanetes, hasta estudios biomecánicos para analizar la forma y el funcionamiento de los pies, lo que nos permite identificar cualquier desequilibrio o alteración en la marcha. </p>
						<p class='third-font-gray mt-4'>Una vez analizado el caso de cada paciente, nuestros podólogos pueden diseñar tratamientos personalizados y recomendar terapias específicas para ellos.</p>
						<p class='third-font-gray mt-5 large'>Área de podología de nuestro hospital en Sevilla</p>
						<p class='third-font-gray mt-4'>La demanda de servicios de podología en España es cada vez mayor, con más del 70% de la población buscando atención podológica según los últimos estudios. Por ello, en el Hospital San Juan de Dios estamos orgullosos de ofrecer a nuestros pacientes el servicio de podología, una especialidad médica imprescindible. </p>
						<p class='third-font-gray mt-4'>Contar con un equipo multidisciplinar nos permite ofrecer una atención integral, combinando la experiencia y conocimientos de diferentes <a class='bold link-blog' target=”_blank” href='https://sjdsevilla.com/servicios'>especialidades médicas</a> para abordar de manera exitosa cualquier afección o deformidad en los pies. Desde alteraciones en las uñas y la piel, como callos, durezas, verrugas plantares, hongos y uñas encarnadas, hasta deformidades como juanetes y dedos en garra, nuestro equipo de podólogos está capacitado para diagnosticar y tratar una amplia variedad de condiciones podológicas.</p>
						<p class='third-font-gray mt-4'>En el Hospital San Juan de Dios, la seguridad, el bienestar y la calidad de nuestra atención médica son nuestras máximas prioridades. Todos nuestros tratamientos podológicos se realizan en consultas debidamente equipadas y siguiendo rigurosos protocolos de esterilización. </p>
						<p class='third-font-gray mt-4'>Si buscas un servicio de podología de confianza en Sevilla, el Hospital San Juan de Dios es tu mejor opción. Nuestro equipo de podólogos, encabezado por la <span class='bold'>Dra. Beatriz Hernaez Vela</span>, nos convierte en un servicio de referencia en el cuidado de los pies. Estamos aquí para ayudarte a mantener la salud y el bienestar de tus pies, proporcionándote los tratamientos y cuidados podológicos que necesitas.</p>
						<p class='third-font-gray mt-5 large'>Servicios de podología</p>
						<p class='third-font-gray mt-4'><span class='bold'>Tratamiento de callosidades y durezas:</span> Los callos y las durezas son problemas frecuentes en los pies y pueden causar molestias y dolor. Nuestros podólogos utilizan técnicas suaves y seguras para eliminar estas lesiones y proporcionar alivio a nuestros pacientes.</p>
						<p class='third-font-gray mt-4'><span class='bold'>Tratamiento de uñas encarnadas:</span> Las uñas encarnadas pueden ser extremadamente dolorosas e, incluso, provocar infecciones si no se tratan adecuadamente. Nuestros podólogos están capacitados en técnicas de corrección de uñas y ofrecen soluciones efectivas para aliviar el dolor y prevenir complicaciones.</p>
						<p class='third-font-gray mt-4'><span class='bold'>Terapia de ortesis plantares:</span> Las ortesis plantares son dispositivos personalizados que se colocan en el calzado para corregir problemas biomecánicos y mejorar la alineación del pie. Nuestros especialistas en podología realizan evaluaciones exhaustivas y diseñan ortesis a medida para cada paciente, lo que les permite caminar y moverse con mayor comodidad y estabilidad.</p>
						<p class='third-font-gray mt-4'><span class='bold'>Tratamiento de lesiones deportivas:</span> Los deportistas están expuestos a un mayor riesgo de lesiones en los pies y las extremidades inferiores. Nuestro equipo de podología está especializado en el tratamiento de lesiones deportivas, desde esguinces y fracturas hasta fascitis plantar y tendinitis. Nuestro objetivo es ayudar a los deportistas a recuperarse de sus lesiones y volver a la actividad física de manera segura y efectiva.</p>
						<p class='third-font-gray mt-4'><span class='bold'>Prevención y educación:</span> Además de ofrecer tratamientos, en el Hospital San Juan de Dios de Sevilla nos enfocamos en la prevención y la educación sobre la salud podológica. Nuestros podólogos brindan asesoramiento y recomendaciones sobre cuidados diarios, elección de calzado adecuado, higiene de los pies y prevención de lesiones.</p>
						<p class='third-font-gray mt-4'>No dejes que tus pies afecten tu calidad de vida. ¡Confía en el equipo de podología del Hospital San Juan de Dios y da el paso hacia unos pies sanos! Si necesitas cualquier consulta relacionada con nuestros expertos en podología, no dudes en <span class='bold link-blog' target=”_blank”><a href='https://sjdsevilla.com/pedir-cita'>concertar una cita</a></span> con nuestro equipo médico.</p>", 
		"feature" => true,
		"page_title" => "Hospital San Juan de Dios Sevilla, servicio de podología",
		"page_description" => "Deja la salud de tus pies en manos expertas. Descubre nuestro completo servicio de podología en el Hospital San Juan de Dios Sevilla",
	 	"keywords" => "podología sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, podología, podólogo sevilla",
	],
	"orden-hospitalaria-de-san-juan-de-dios" => (object) [
		"fecha" => "Sábado, 10 de junio 2023",
		"title_noticia" => "La Orden Hospitalaria de San Juan de Dios organiza, como cada año, un mercadillo solidario a favor de los más desfavorecidos",
		"img_main" => "/files/img/blog/mercadillo-solidario-hospital-san-juan-dios.png",
	 	"alt_img" => "El mercadillo solidario, a cargo de la Orden Hospitalaria San Juan de Dios, recauda fondos para su Comedor Social ubicado en Sevilla",
	 	"title_img" =>  "Mercadillo solidario de la Orden Hospitalaria San Juan de Dios Sevilla",
		"short_notice" => "Los fondos recaudados irán destinados al Comedor Social de San Juan de Dios ubicado en la calle Misericordia, en Sevilla",
		"content" => "<h2 class='primary-font-blue mt-5'><span class='span-medium'>Los fondos recaudados irán destinados al Comedor Social de San Juan de Dios ubicado en la calle Misericordia, en Sevilla</span></h2>
						<p class='third-font-gray mt-4'>Como cada año, la Orden Hospitalaria de San Juan de Dios ha organizado un mercadillo solidario a favor de los más necesitados. La pandemia no permitió organizar esta labor años atrás a causa de las medidas impuestas que impedían, entre otras cosas, aglomeraciones de personas.</p>
						<p class='third-font-gray mt-4'>De nuevo, un año más, el mercadillo surge como iniciativa para <span class='bold'>recaudar fondos para el Comedor Social de San Juan de Dios</span> ubicado en la calle Misericordia, en Sevilla. El número de personas en situación de vulnerabilidad ha ido creciendo y ha aumentado de forma exponencial como consecuencia de algunos desajustes arquitectónicos en el Comedor Social del Pumarejo. El número de necesitados se ha visto incrementado, tal y como menciona una de nuestras voluntarias, hasta más de un 50%. Hemos pasado de recibir a una media de 50 personas diarias a más de 200.</p>
						<p class='third-font-gray mt-4'>Las personas o familias vulnerables que visitan cada día las instalaciones es para hacer uso de las duchas, los roperos, recoger alimentos y ropas, desayunar o almorzar. Un comedor social abierto de lunes a viernes y que funciona con un <span class='bold'>equipo de voluntarios</span> que ofrecen su tiempo a los más desamparados. </p>
						<p class='third-font-gray mt-4'>En San Juan de Dios creemos en la importancia de la <span class='bold'>solidaridad</span> con los demás. Empatizamos y sensibilizamos con las personas más vulnerables y trabajamos para poder responder a sus necesidades desde nuestra <span class='bold'>Obra Social.</span> Sin embargo, no sería posible sin la ayuda de todos los que ofrecen su tiempo para ayudarnos a conseguir una <span class='bold'>sociedad más noble y justa</span>, con pequeñas acciones que poco a poco van transformando el mundo.</p>
						<p class='third-font-gray mt-4'>El <span class='bold'>voluntariado</span> es una <span class='bold'>forma de solidarizarse</span> con los demás con tan solo dos gestos sencillos: estar y acompañar. Desde San Juan de Dios y nuestra Obra Social contamos con un <span class='bold link-blog'><a target=”_blank” href='https://sjdsevilla.com/solidaridad'>área de solidaridad</a></span> compuesta por un gran equipo de colaboradores, voluntarios y bienhechores que participan en diversos proyectos con el objetivo de <span class='bold'>mejorar la calidad de vida de las personas.</span> Así, nuestro proyecto más reciente es el <span class='bold'>mercadillo solidario</span> que estamos llevando a cabo en el patio interior de la Residencia de Ancianos de San Juan de Dios, en Sevilla. </p>
						<p class='third-font-gray mt-4 large'>Un mercadillo solidario para quienes más lo necesitan</p>
						<p class='third-font-gray mt-4'>La ayuda es vital para poder seguir avanzando y poder atender con un <span class='bold'>servicio de calidad y humano</span> en nuestro comedor social, y este mercadillo solidario es la oportunidad de todos de ofrecer nuestra ayuda y aportar nuestro granito de arena. </p>
						<p class='third-font-gray mt-4'>En él se pueden encontrar una gran variedad de <span class='bold'>objetos donados</span> por usuarios de la propia residencia, voluntarios, familiares de residentes, conocidos, amigos de la Obra o vecinos. En definitiva, donaciones de nivel popular entre las que se encuentran imágenes religiosas, pinturas, muebles antiguos con repisas, estatuillas…</p>
						<p class='third-font-gray mt-4'>El mercadillo funciona a través de un equipo de voluntarios abierto a acoger a más participantes dispuestos a ofrecer su <span class='bold'>solidaridad, entrega y ayuda</span> a los demás participando en las actividades organizadas por la Orden Hospitalaria de San Juan de Dios. </p>
						<p class='third-font-gray mt-4'>Desde el lunes 12 de junio al viernes 17 de junio, <span class='bold'>te invitamos a unirte y a colaborar</span> con nuestra Obra Social de San Juan de Dios de Sevilla visitando nuestro mercadillo solidario en beneficio al Comedor Social de San Juan de Dios. ¡Te esperamos!</p>", 
		"feature" => false,
		"page_title" => "Mercadillo solidario de la Orden Hospitalaria San Juan de Dios",
		"page_description" => "El mercadillo solidario, a cargo de la Orden Hospitalaria San Juan de Dios, recauda fondos para su Comedor Social ubicado en Sevilla",
	 	"keywords" => "comedor social Sevilla, Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, mercadillo solidario sevilla, hospital sevilla",
	],
	"urgencias-pediatricas-sjd" => (object) [
		"fecha" => "Miércoles, 07 de junio de 2023",
		"title_noticia" => "Urgencias Pediátricas del Hospital San Juan de Dios Sevilla",
		"img_main" => "/files/img/blog/urgencias-pediátricas-sevilla.jpg",
	 	"alt_img" => "Urgencias Pediátricas Sevilla, Hospital San Juan de Dios Sevilla",
	 	"title_img" =>  "El servicio de Urgencias Pediátricas del Hospital San Juan de Dios de Sevilla brinda atención médica y quirúrgica inmediata",
		"short_notice" => "El servicio de Urgencias Pediátricas del Hospital San Juan de Dios de Sevilla brinda atención médica y quirúrgica inmediata",
		"content" => " <h2 class='primary-font-blue mt-5'>El servicio de Urgencias Pediátricas del Hospital San Juan de Dios de Sevilla brinda atención médica y quirúrgica inmediata</h2>
						<p class='third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla te ofrecemos un<b> servicio completo de Urgencias Pediátricas </b>destinado a brindar atención médica y quirúrgica inmediata a los pacientes más pequeños.</p>
						<p class='third-font-gray mt-4'>Nuestro compromiso es estar<b> disponibles las 24 horas</b> del día, los 365 días del año, para atender cualquier emergencia pediátrica que pueda surgir. Con un equipo multidisciplinar altamente cualificado, nuestro objetivo es proporcionar un servicio médico eficaz y cercano a los niños y sus familias.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Atención médica sin cita previa</p>
						<p class='third-font-gray mt-4'>En el servicio de Urgencias Pediátricas del Hospital San Juan de Dios, no hay esperas Es necesario actuar rápidamente cuando se trata de la salud de un niño, por lo que estamos preparados para recibir a los pacientes sin esperas innecesarias, permitiendo el acompañamiento en todo momento de un padre o tutor por paciente, con el fin de preservar la intimidad de nuestros usuarios.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>¿A qué pacientes va dirigido nuestro servicio de Urgencias 24h?</p>
						<p class='third-font-gray mt-4'>Nuestro servicio de Urgencias Pediátricas está dirigido a <b>lactantes, niños y adolescentes</b> que requieran atención médica inmediata. Atendemos una amplia gama de situaciones, desde enfermedades y lesiones comunes hasta las emergencias médicas más graves. Nuestro equipo de profesionales se encuentra preparado para manejar cualquier situación y proporcionar el cuidado adecuado en cada caso.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Servicios de Urgencias 24h</p>
						<p class='third-font-gray mt-4'>En nuestro servicio de Urgencias Pediátricas ofrecemos una evaluación médica completa, desde la atención médica inicial y realización de pruebas diagnósticas, hasta la atención a la parada cardiorrespiratoria y procedimientos quirúrgicos si es necesario, ya que estamos equipados para ofrecer una atención integral y completa.</p>
						<p class='third-font-gray mt-4'>Hay que destacar la zona de laboratorio, que cuenta con la última tecnología disponible. Esto nos permite realizar cualquier tipo de prueba diagnóstica, reduciendo así el tiempo de atención y de espera, lo cual también nos permite actuar rápidamente.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Equipos médicos multidisciplinares a tu disposición</p>
						<p class='third-font-gray mt-4'>Nuestro servicio de Urgencias Pediátricas cuenta con un equipo multidisciplinar capacitado y comprometido con la salud y el bienestar de los niños.</p>
						<p class='third-font-gray mt-4'>Nuestros profesionales incluyen médicos especialistas en pediatría, enfermeros especialistas en urgencias pediátricas, técnicos de laboratorio y radiología, entre otros. Trabajamos de manera coordinada para garantizar una atención integral y de calidad para cada paciente.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Guía del usuario</p>
						<p class='third-font-gray mt-4'>Para facilitar la experiencia de nuestros usuarios en el servicio de Urgencias Pediátricas, hemos desarrollado una guía que proporciona información útil sobre qué esperar durante la visita, los derechos y responsabilidades de los pacientes y sus familias, y los recursos disponibles.</p>
						<p class='third-font-gray mt-4'>El protocolo asistencial de Urgencias Pediátricas 24h, es el siguiente:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>Acceso a la zona de admisión</li>
							<li class='mt-2'>Valoración y exploración del niño/a</li>
							<li class='mt-2'>Realización de pruebas y administración de tratamientos</li>
							<li class='mt-2'>Diagnóstico</li>
							<li class='mt-2'>Seguimiento</li>
						</ul>
						<p class='third-font-gray mt-4'>En función de los resultados y la evolución del paciente, el médico decide si puede marcharse a su domicilio con un tratamiento específico, si precisa ingreso en planta o pasa a un área de mayor nivel de cuidados (tratamientos cortos u observación).</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Equipo de pediatría</p>
						<p class='third-font-gray mt-4'>El servicio de Pediatría del Hospital San Juan de Dios Sevilla va dirigido a toda la <b>población infantil</b>, por lo que se cubren todos los cuidados y necesidades para el buen desarrollo y toda la atención médica de los niños desde el nacimiento hasta la adolescencia.</p>
						<p class='third-font-gray mt-4'>Además de la atención por urgencias, contamos con un <b>“Programa de Control de Salud de Niño Sano” y “Consultas de Patología Banal No Urgente”</b>. También con atención prácticamente inmediata y sin esperas.</p>
						<p class='third-font-gray mt-4'>En estas consultas, además de dar pautas para una vida saludable, se pueden detectar alteraciones en el <a rel='nofollow' href='https://sjdsevilla.com/blog/recien-nacidos' class='link-blog' target='_blank'>crecimiento y desarrollo</a> e identificar enfermedades en fases tempranas. Es por ello, que ofrece esta atención integral desde que los niños son muy pequeños, con controles de salud desde los 7 - 15 días de vida.</p>
						<p class='third-font-gray mt-4'>Es conveniente acudir a los controles de salud periódicamente. En estos controles de salud no sólo se valorará su desarrollo físico, psicológico y social, sino que también nuestro objetivo es lograr la mayor salud en todos los aspectos: preventivos, curativos y paliativos.</p>
						<p class='third-font-gray mt-4'>Al frente de esta unidad está el <a rel='nofollow' href='https://sjdsevilla.com/blog/juan-carlos-vargas-perez' class='link-blog' target='_blank'>Dr. Juan Carlos Vargas Perez</a>, especialista en pediatría y médico puericultor. Acreditado con numerosos Másters y Cursos de Experto, cuenta con más de quince años de experiencia laboral en distintos centros sanitarios de Sevilla y, desde hace varios años, ejerciendo en nuestra Orden Hospitalaria.</p>
						<p class='third-font-gray mt-4'>Con el resto de pediatras del equipo, también con una amplia formación y trayectoria profesional, forman un gran grupo humano cualificado, cuya fortaleza es clave para el correcto cuidado de los pacientes pediátricos y para llegar a la excelencia en su atención.</p>
						", 
		"feature" => false,
		"page_title" => "Urgencias Pediátricas Hospital San Juan de Dios",
		"page_description" => "El servicio de Urgencias Pediátricas del Hospital San Juan de Dios de Sevilla, brinda atención médica y quirúrgica inmediata",
	 	"keywords" => "Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, pediatría sevilla, hospital sevilla, urgencias sevilla, urgencias pediátricas sevilla",
	],
	"ecoes-premio" => (object) [
		"fecha" => "Lunes, 05 de junio de 2023",
		"title_noticia" => "ECOES concede el Premio San Juan de Dios a la Fundación Ana Bella",
		"img_main" => "/files/img/blog/premio-san-juan-dios-fundacion-ana-bella.jpg",
	 	"alt_img" => "La Fundación Ana Bella recibe el Premio San Juan de Dios",
	 	"title_img" =>  "El Premio San Juan de Dios es concedido a la Fundación Ana Bella",
		"short_notice" => "El Colegio de Enfermería de Sevilla celebra su XXXVIII Certamen Nacional 'Ciudad de Sevilla' y concede su XXX Premio San Juan de Dios a la Fundación Ana Bella",
		"content" => " <h2 class='primary-font-blue mt-5'>El Colegio de Enfermería de Sevilla celebra su XXXVIII Certamen Nacional 'Ciudad de Sevilla' y concede su XXX Premio San Juan de Dios a la Fundación Ana Bella</h2>
						<p class='third-font-gray mt-4'>El Colegio de Enfermería de Sevilla <a rel='nofollow' href='https://colegioenfermeriasevilla.es' class='link-blog' target='_blank'>(ECOES)</a> celebró, recientemente, un encuentro para destacar la importancia de la profesión enfermera y resaltar la labor de investigación en este campo.</p>
						<p class='third-font-gray mt-4'><b>El Hermano Guillermo García, Superior del Hospital San Juan de Dios de Sevilla,</b> asistió al evento y elogió a los responsables del Colegio de Enfermería de Sevilla por visibilizar acciones a favor de las personas a través del Premio San Juan de Dios. Estuvo acompañado del director del<b> Centro Universitario de Enfermería San Juan de Dios,</b> Hermano Francisco Ventosa.</p>
						<p class='third-font-gray mt-4'>También asistió Florentino Pérez Raya, presidente del<b> Consejo General de Enfermería de España,</b> quien subrayó la importancia de aportar evidencias científicas a la ciencia de los cuidados en el contexto actual. Además, destacó el reconocimiento que reflejan el Certamen Nacional de Enfermería Ciudad de Sevilla y el Premio San Juan de Dios, entregados durante el evento.</p>
						<p class='third-font-gray mt-4'>También asistió Florentino Pérez Raya, presidente del Consejo General de Enfermería de España, quien subrayó la importancia de aportar evidencias científicas a la ciencia de los cuidados en el contexto actual. Además, destacó el reconocimiento que reflejan el Certamen Nacional de Enfermería Ciudad de Sevilla y el <b>Premio San Juan de Dios,</b> entregados durante el evento.</p>
						<div class='row'>
                            <div class='col-12'>
                                <img src='/files/img/blog/premio-san-juan-dios-hemano-garcia-ventosa.jpg' title='El Premio San Juan de Dios es concedido por los Hermanos de la Orden San Juan de Dios' alt='El Hermano Guillermo García y el Hermano Francisco Ventosa conceden el Premio San Juan de Dios' class='blog-img h-100 mt-3'>
                            </div>
                        </div>
						<p class='primary-font-blue mt-4 h2 mt-4'>XXX  Premio San Juan de Dios</p>
						<p class='third-font-gray mt-4'>La <a rel='nofollow' href='https://www.fundacionanabella.org' class='link-blog' target='_blank'>Fundación Ana Bella</a> ha sido galardonada con el prestigioso XXX Premio San Juan de Dios, concedido por el ECOES, en reconocimiento a su estrecha relación con el ámbito de la Enfermería y su valioso trabajo en la humanización de la atención y los cuidados. Ana Bella mostró una gran emoción al recibir el XXX Premio San Juan de Dios del ECOES, especialmente porque muchas voluntarias de la Fundación son enfermeras. </p>
						<p class='third-font-gray mt-4'>El perfil de las enfermeras resulta esencial para brindar esta ayuda y cumplir con los objetivos de la Fundación, gracias a su cercanía, empatía y capacidad de detección cuando están debidamente capacitadas. En el caso particular de la provincia de Sevilla, se han realizado cursos en el<b> <a rel='nofollow' href='https://sjdsevilla.com/blog/sesion-acogida-sjd' class='link-blog' target='_blank'>Hospital San Juan de Dios</a> de Sevilla,</b> el Hospital Virgen del Rocío y el centro de salud de Mairena del Aljarafe.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Otros galardones a la investigación enfermera</p>
						<p class='third-font-gray mt-4'>‘Enfermería, salud mental y <a rel='nofollow' href='https://sjdsevilla.com/blog/servicio-atencion-espiral-religiosa' class='link-blog' target='_blank'>espiritualidad</a>: Cuidado en equipo’  es el nombre del estudio reconocido con el tercer premio. Un análisis de Paola Suárez Reina, residente de Enfermería de Salud Mental en el Hospital de Valme, que tiene como coautoras a Rocío de Diego Cordero, Carmen Linero Narváez y Ángeles López Tarrida, coordinadora adjunta de Ética y Bioética de la unidad territorial de Andalucía y Canarias y médico en el Servicio de Cuidados Críticos y Urgencias del <a rel='nofollow' href='https://www.hsjda.es/' class='link-blog' target='_blank'>Hospital San Juan de Dios del Aljarafe</a>. </p>
						<p class='third-font-gray mt-4'>Si quieres conocer más información sobre el evento <a rel='nofollow' href='https://www.diariodesevilla.es/sevilla/oda-profesion-enfermera-colegio-enfermeria-Sevilla_0_1798321435.html' class='link-blog' target='_blank'>haz clic aquí</a></p>", 
		"feature" => false,
		"page_title" => "ECOES concede el Premio San Juan de Dios a la Fundación Ana Bella",
		"page_description" => "El Colegio de Enfermería de Sevilla celebra su XXXVIII Certamen Nacional 'Ciudad de Sevilla' y concede su XXX Premio San Juan de Dios a la Fundación Ana Bella",
	 	"keywords" => "Hospital San Juan de Dios Sevilla, hospital en Sevilla, San Juan de Dios Sevilla, Fundacion Ana bella",
	],
	"rosa-benitez-referente-nutricion" => (object) [
		"fecha" => "Viernes, 02 de junio de 2023",
		"title_noticia" => "Rosa Benítez, referente en el mundo de la nutrición",
		"img_main" => "/files/img/blog/nutricionista-hospital-sevilla-rosa-benitez.jpg",
	 	"alt_img" => "Os presentamos a Rosa Benitez, nutricionista del Hospital San Juan de Dios Sevilla",
	 	"title_img" =>  "Nutricionista del Hospital San Juan de Dios Sevilla",
		"short_notice" => "Conoce a Rosa Benítez, nuestra reconocida nutricionista y dietista que destaca en el ámbito de la alimentación y la nutrición por su enfoque integral y compromiso con la salud de sus pacientes. ",
		"content" => " <h2 class='primary-font-blue mt-5'>Rosa Benítez, Dietista-nutricionista experta del Hospital San Juan de Dios de Sevilla</h2>
						<p class='third-font-gray mt-4'>Rosa Benítez es una reconocida nutricionista y dietista que destaca en el ámbito de la alimentación y la nutrición por su enfoque integral y compromiso con la salud de sus pacientes. Con una gran experiencia en el área, la nutricionista Benítez ha ayudado a innumerables pacientes a mejorar sus <a href='https://www.instagram.com/reel/CsddjU3L4R5/' class='link-blog' target='_blank'>hábitos de vida</a>, alcanzar un peso saludable y lograr un equilibrio nutricional en su vida diaria.</p>
						<p class='third-font-gray mt-4'>Este interés la llevó a estudiar Nutrición y Dietética, donde adquirió los conocimientos teóricos y prácticos necesarios para comprender la <a href='https://sjdsevilla.com/blog/alimentacion-complementaria' class='link-blog' target='_blank'>importancia de una alimentación</a> equilibrada y sus beneficios para la salud.</p>
						<p class='third-font-gray mt-4'>Como ella misma destaca: “Cuándo estudié la carrera de Dietista-Nutricionista, no sabía cuánto me iba a gustar y disfrutar de cada una de las facetas que he ido acumulando a lo largo de éstos años. Los objetivos siempre han sido claros: intentar transmitir el mundo de la alimentación como lo siento y lo vivo.”</p>
						<p class='third-font-gray mt-4'>Comprende que la alimentación no sólo se trata de contar calorías o seguir dietas restrictivas, sino que es un proceso que involucra una relación saludable con la comida, el manejo de emociones, y el establecimiento de hábitos sostenibles a largo plazo. Por lo tanto, trabaja con sus pacientes para desarrollar planes alimentarios personalizados que se adapten a sus necesidades individuales, preferencias y estilo de vida. Por ello, desde el<b> Hospital San Juan de Dios de Sevilla</b> hemos creado el <b>Programa de Peso y Salud</b>, donde <a href='https://sjdsevilla.com/endocrino-sevilla' class='link-blog' target='_blank'>endocrinos</a>, psicólogos y dietistas-nutricionistas ayudan a alcanzar un peso ideal y saludable.</p>
						<p class='third-font-gray mt-4'>A lo largo de su carrera, la nutricionista ha abordado una amplia gama de condiciones de salud relacionadas con la <a href='https://sjdsevilla.com/blog/alimentos-estado-de-animo-y-estres' class='link-blog' target='_blank'>alimentación</a>, como la <a href='https://sjdsevilla.com/blog/consejos-prevenir-diabetes' class='link-blog' target='_blank'>diabetes</a>, la  <a href='https://sjdsevilla.com/blog/alimentos-estado-de-animo-y-estres' class='link-blog' target='_blank'>alimentación</a>, como la <a href='https://sjdsevilla.com/blog/nueva-unidad-de-cirugia-de-la-obesidad' class='link-blog' target='_blank'>obesidad</a>, las enfermedades cardiovasculares y los trastornos alimentarios. Su enfoque terapéutico se basa en el trabajo conjunto con otros profesionales de la salud, como médicos, psicólogos y entrenadores físicos, para brindar a sus pacientes una atención cercana y  personalizada.</p>
						<p class='primary-font-blue mt-4 h2 mt-4'>Endocrinología y Nutrición</p>
						<p class='third-font-gray mt-4'>El servicio de<b> Endocrinología y Nutrición del Hospital San Juan de Dios de Sevilla </b>oferta consulta de segunda opinión y casos complejos, que atiende directamente su responsable, <b>el Dr. Soto Moreno</b>, profesor de la especialidad en la universidad de Sevilla, investigador de reconocido prestigio y endocrinólogo con más de 20 años de experiencia profesional.</p>
						<p class='third-font-gray mt-4'>También ofertamos un programa específico para personas que quieran tener un peso y una alimentación adecuada, que atienden de manera multidisciplinar, que pretenden abordar de manera integral la relación con la comida y plantear soluciones globales. Este programa incluye tratamiento farmacológico o quirúrgico de la obesidad si es necesario.</p>
						<p class='third-font-gray mt-4'>Si necesitas cualquier consulta relacionada con tu alimentación o hábitos de vida saludable, no dudes en <a href='https://sjdsevilla.com/pedir-cita' class='link-blog' target='_blank'>concertar una cita</a> con nuestro equipo de endocrinología y nutrición</p>", 
		"feature" => false,
		"page_title" => "Rosa Benítez, Dietista-Nutricionista",
		"page_description" => "Os presentamos a Rosa Benítez, nutricionista experta del Hospital San Juan de Dios de Sevilla, pide cita y alcanza tu peso ideal",
	 	"keywords" => "Hospital San Juan De Dios Sevilla, San Juan De Dios Sevilla, nutricionista sevilla, hospital sevilla",
	],
	"encuentro-provincial-saer" => (object) [
		"fecha" => "Jueves, 01 de junio de 2023",
		"title_noticia" => "Profesionales de San Juan de Dios reflexionan sobre el modelo de atención espiritual en los hospitales",
		"img_main" => "/files/img/blog/san-juan-de-dios-sevilla-SAER.jpg",
	 	"alt_img" => "San Juan de Dios Sevilla acoge el Encuentro Provincial SAER",
	 	"title_img" =>  "San Juan de Dios Sevilla acoge el Encuentro Provincial SAER",
		"short_notice" => "Con el objetivo de compartir experiencias y abordar los desafíos relacionados con la atención que brindan a pacientes y usuarios los hospitales, celebramos un evento en Sevilla donde reunimos a profesionales de toda España.",
		"content" => "<p class='large third-font-gray mt-4'>Con el objetivo de compartir experiencias y abordar los desafíos relacionados con la atención que brindan a pacientes y usuarios los hospitales, celebramos un evento en Sevilla donde reunimos a profesionales de toda España.</p>
						<p class='third-font-gray mt-4'>El Encuentro Provincial de los Servicios de Atención Espiritual y Religiosa (SAER) del sector Hospitales de San Juan de Dios se llevó a cabo en Sevilla, reuniendo a 28 profesionales de toda España.</p>
						<p class='third-font-gray mt-4'>A lo largo de los años, los servicios de atención espiritual y religiosa han evolucionado para adaptarse a los cambios sociológicos actuales. Los profesionales de la salud se enfrentan a nuevos desafíos debido a la diversidad de creencias, filosofías de vida y confesiones religiosas de las personas a las que atienden. Esto requiere una actitud humilde y respetuosa, valorando los elementos clave que dan sentido a la vida de cada individuo, especialmente en momentos de fragilidad y dolor.</p>
						<p class='third-font-gray mt-4'>Para llevar a cabo su labor, los profesionales de los SAER reciben formación y tienen experiencia en acompañar la búsqueda de sentido y trascendencia de las personas vulnerables, respetando sus creencias. Combinan el acercamiento compasivo con un método de trabajo consensuado y objetivo, lo que les permite colaborar con otros profesionales en reuniones de equipo interdisciplinarias.</p>
						<p class='third-font-gray mt-4'>Durante el Encuentro Provincial de los SAER, se abordaron diversos desafíos y retos actuales y futuros para estos equipos:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>Desarrollar el perfil asistencial fortaleciendo las habilidades y competencias de los profesionales del SAER.</li>
							<li class='mt-2'>Establecer criterios de intervención alineados con los objetivos terapéuticos.</li>
							<li class='mt-2'>Trabajar en coordinación con el personal asistencial.</li>
							<li class='mt-2'>Capacitar a los profesionales que derivan a los pacientes al SAER para asegurar una derivación adecuada y una comprensión sólida de los servicios espirituales y religiosos disponibles.</li>
							<li class='mt-2'>Utilizar herramientas informáticas para mejorar la gestión y seguimiento de la atención espiritual.</li>
							<li class='mt-2'>Establecer protocolos de calidad en la atención espiritual.</li>
							<li class='mt-2'>Promover el cuidado y autocuidado de los profesionales del SAER, fomentando su bienestar físico, emocional y espiritual.</li>
						</ul>
						<p class='third-font-gray mt-4'>El evento incluyó momentos de reflexión para consensuar los elementos esenciales del modelo de atención, con el objetivo de garantizar una atención de calidad y centrada en las necesidades espirituales de las personas atendidas en los hospitales de la Provincia. Aquí puedes acceder a más información sobre el <a href='https://sjd.es/jornada-saer-sector-hospitales-en-sevilla/?_gl=1*1y3sdwz*_up*MQ..*_ga*ODI0MjYyMDg0LjE2ODU2OTA5NzQ.*_ga_S65SCT3ECC*MTY4NTY5MDk3NC4xLjEuMTY4NTY5MTAyMC4wLjAuMA..' class='link-blog' target='_blank'>Encuentro Provincial de los Servicios de Atención Espiritual y Religiosa</a> y los desafíos abordados.</p>
						<div class='row'>
                            <div class='col-12'>
                                <img src='/files/img/blog/san-juan-de-dios-sevilla-encuentro-provincial.jpg' title='San Juan de Dios Sevilla acoge el Encuentro Provincial de los Servicios de Atención Espiritual y Religiosa' alt='San Juan de Dios Sevilla acoge el Encuentro Provincial de los Servicios de Atención Espiritual y Religiosa' class='blog-img h-100 mt-3'>
                            </div>
                        </div>
						",
		"feature" => false,
		"page_title" => "San Juan de Dios Sevilla acoge el Encuentro Provincial SAER",
		"page_description" => "San Juan de Dios Sevilla y profesionales de toda España se reúnen para compartir experiencias y poner en común retos de la atención que prestan a pacientes ",
	 	"keywords" => "Hospital San Juan de Dios Sevilla, hospital en Sevilla, San Juan de Dios Sevilla"
	],
	"evolucion-de-ticares" => (object) [
		"fecha" => "Miércoles, 31 de mayo de 2023",
		"title_noticia" => "Primeros pasos hacia Sfere, la evolución de Ticares",
		"img_main" => "/files/img/blog/san-juan-dios-usara-sfere-evolucion-ticares.jpeg",
	 	"alt_img" => "Hospital de Sevilla San Juan de Dios usará el programa Sfere",
	 	"title_img" =>  "Reunión de médicos Hospital de Sevilla San Juan de dios",
		"short_notice" => "La primera fase de la implantación consiste en la consultoría con los grupos de trabajo y se inicia este mes de junio",
		"content" => "<p class='large third-font-gray mt-4'>La primera fase de la implantación consiste en la consultoría con los grupos de trabajo y se inicia este mes de junio</p>
						<p class='third-font-gray mt-4'>Los centros correspondientes a la Unidad Territorial II, la Clínica Nuestra Señora de la Paz, en Madrid, y el Centro San Juan de dios de Ciempozuelos (Madrid) han iniciado el camino hacia el cambio de Ticares por Sfere, un nuevo software con un gran número de ventajas con el que trabajaremos en el futuro y que ya ha sido presentado a los gerentes de los centros, a las direcciones asistenciales, administrativas y financieras y a los responsables de Sistemas de la Información de los centros.</p>
						<p class='third-font-gray mt-4'>Sfere es un aplicativo que supone la evolución de Ticares, un software cuyo manejo resulta muy fácil gracias a una interfaz muy sencilla e intuitiva. Además, este nuevo aplicativo es mucho más estable y rápido, ya que permite hacer operaciones comunes con muchos menos clicks.</p>
						<p class='third-font-gray mt-4'>De cara a la gestión por parte del personal sanitario y asistencial, encontrarán nuevas y cómodas funcionalidades, como el nuevo módulo de bloque quirúrgico; al igual que sucederá con los profesionales de administración y departamentos financieros, quienes encontrarán gran facilidad a la hora de trabajar con compañías aseguradoras, un catálogo de actividades unificado o un nuevo módulo de cajas y almacenes.</p>
						<p class='third-font-gray mt-4'>Además, Sfere es un aplicativo moldeable según las necesidades de cada uno de los centros. Para ello, este primer año de fase de implantación se dedicará a la consultoría y al análisis y definición de necesidades por parte de los grupos de trabajo que se crearán en función de la tipología de centros. Estos grupos, formados por profesionales de todos los centros, revisarán, consensuarán y validarán todo lo relacionado con el uso del aplicativo en un entorno de preproducción. Gracias a ello, tanto hospitales públicos, concertados y privados, como centros de salud mental, colegios de educación especial o centros sociosanitarios como residencias o centros de atención a la discapacidad, definirán sus necesidades para ajustar el programa a su medida.</p>
						<p class='third-font-gray mt-4'>Con ello, pasaremos de trabajar con un software de 2006 a uno actual, con el avance tecnológico y de usabilidad que ello comporta. Se trata de una clara apuesta por homogeneizar circuitos de trabajo y unificar criterios que permitan hacer más ágiles las operaciones del día a día de todos los profesionales, redundando en la calidad asistencial de los procesos y, en consecuencia, en el trato al paciente.</p>
						<p class='third-font-gray mt-4'>La implantación de Sfere se llevará a cabo en los próximos 4 años. La primera fase de consultoría comenzará este mes de junio. En ella, se tendrán en cuenta las observaciones de los profesionales, quienes explicarán cómo trabajan con Ticares y qué necesidades y mejoras plantean para incluirlos en Sfere. Tras esta primera fase, se realizará un pilotaje en uno de los centros de la Unidad Territorial para comprobar la adecuación del mismo a las necesidades e ir perfilando la versión con la que, en los próximos 4 años, trabajaremos en todos los centros.</p>", 
		"feature" => false,
		"page_title" => "San Juan de Dios usará Sfere, la evolución de Ticares",
		"page_description" => "San Juan de Dios comienza a utilizar Sfere en 2 centros madrileños. En los próximos 4 años se espera que se haya podido extender al resto de centros",
	 	"keywords" => "Hospital San Juan de Dios, Hospital San Juan de Dios Sevilla, Hospital San Juan de Dios Sevilla citas",
	],
	"dia-mundial-digestiva" => (object) [
        "fecha" => "Lunes, 29 de mayo de 2023",
        "title_noticia" => "Día Mundial de la Salud Digestiva",
        "img_main" => "/files/img/blog/especialistas-aparato-digestivo.jpg",
		"alt_img" => "especialistas-aparato-digestivo",
		"title_img" =>  "Los mejores especialistas en aparato digestivo Hospital San Juan de Dios Sevilla",
        "short_notice" => "Cada año, el 29 de mayo, celebramos el Día Mundial de la Salud Digestiva. Esta fecha tiene como objetivo principal promover la salud digestiva de todos...",
        "content" => "<p class='large third-font-gray mt-4'>Cada año, el 29 de mayo, celebramos el <span class='bold'>Día Mundial de la Salud Digestiva.</span> Esta fecha tiene como objetivo principal <span class='bold'>promover la salud digestiva</span> de todos. En <span class='bold'>San Juan de Dios de Sevilla</span>, nos enorgullece ser parte de la comunidad que brinda atención especializada y apoyo integral a través de nuestros especialistas en el aparato digestivo. Nuestra misión es proveer ayuda en todo lo concerniente a la salud digestiva, ofreciendo siempre las técnicas y medios diagnósticos más avanzados.</p>
                        <h2 class='primary-font-blue mt-5'>Hospital San Juan de Dios de Sevilla, unidad de aparato digestivo</h2>
                        <p class='third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla disponemos de la <a class='link-blog' target='_blank' href='https://sjdsevilla.com/digestivo-sevilla'>unidad de aparato digestivo.</a> Esta se encarga del <span class='span-bold'>estudio, diagnóstico y tratamiento</span> de enfermedades relacionadas con el tracto gastrointestinal, hígado, páncreas y vías biliares, además de realizar colonoscopias y gastroscopias, tanto para el diagnóstico como de manera terapéutica.</p>
                        <p class='third-font-gray mt-4'>Como ya sabemos, el sistema digestivo es responsable de descomponer los alimentos que consumimos, absorber los nutrientes esenciales y eliminar los desechos del cuerpo. Un <span class='span-bold'>sistema digestivo sano</span> nos permite disfrutar de una <span class='span-bold'>vida plena y activa.</span> Sin embargo, muchos factores pueden afectar negativamente nuestra salud digestiva, como una <a href='https://sjdsevilla.com/blog/alimentacion-complementaria' class='link-blog' target='_blank'>alimentación</a> desequilibrada, el estrés, la falta de actividad física y el uso excesivo de medicamentos.</p>
                        <p class='third-font-gray mt-4'>El <span class='span-bold'>Día Mundial de la Salud Digestiva</span> nos invita a reflexionar sobre nuestras elecciones diarias y cómo impactan en nuestro sistema digestivo. Es una oportunidad para educarnos sobre las mejores prácticas <span class='span-bold'>para mantener una buena salud digestiva</span> y para difundir información valiosa a nivel global. Por ello, desde el <span class='span-bold'>Hospital San Juan de Dios de Sevilla</span> brindamos lo esencial para mantener la salud digestiva de todos. </p>
                        <h2 class='primary-font-blue mt-5'>Aspectos clave para mantener una buena salud digestiva</h2>
                        <p class='third-font-gray mt-4'>La <span class='span-bold'>dieta</span> juega un papel crucial en la salud digestiva. Una <span class='span-bold'>alimentación equilibrada</span>, rica en fibra, frutas y verduras, ayuda a mantener un sistema digestivo saludable y prevenir problemas como el estreñimiento o la acidez estomacal. Además, es esencial <span class='span-bold'>mantenerse hidratado y reducir el consumo de alimentos procesados</span>, grasas saturadas y azúcares añadidos.</p>
                        <p class='third-font-gray mt-4'>Otro aspecto importante es el cuidado de la microbiota intestinal, compuesta por billones de bacterias beneficiosas que ayudan en la digestión y refuerzan nuestro sistema inmunológico. <span class='bold'>Consumir alimentos probióticos</span>, como el yogur o el kéfir, y probióticos, como el ajo o la cebolla, puede contribuir a mantener un <a href='https://sjdsevilla.com/blog/consejos-generales' class='link-blog' target='_blank'>equilibrio saludable</a> en nuestra microbiota intestinal.</p>
                        <p class='third-font-gray mt-4'>La <span class='span-bold'>actividad física regular</span> también es esencial para la salud digestiva. El <span class='span-bold'>ejercicio</span> promueve el movimiento intestinal y mejora la función del sistema digestivo. Además, <span class='span-bold'>ayuda a controlar el estrés</span>, que puede tener un impacto negativo en la salud digestiva.</p>
                        <p class='third-font-gray mt-4'>El estrés es un factor importante a considerar cuando se trata de la salud digestiva. El sistema <span class='span-bold'>digestivo</span> está estrechamente relacionado con el <a href='https://sjdsevilla.com/blog/alimentos-estado-de-animo-y-estres' class='link-blog' target='_blank'>sistema nervioso</a>, y el estrés crónico puede alterar su funcionamiento. Practicar <a href='https://sjdsevilla.com/blog/consejos-cuidar-corazon' class='link-blog' target='_blank'>técnicas de relajación</a>, como la <span class='span-bold'>meditación</span>, el <span class='span-bold'>yoga</span> o simplemente tomarse un tiempo para desconectar, puede tener un efecto positivo en la salud digestiva.</p>
                        <p class='third-font-gray mt-4'>Desde el <a href='https://sjdsevilla.com/contacto' class='link-blog' target='_blank'>Hospital San Juan de Dios de Sevilla</a> recordamos la importancia de la <span class='span-bold'>detección temprana</span> y el tratamiento adecuado de problemas digestivos. Afecciones como la enfermedad inflamatoria intestinal, la <a href='https://sjdsevilla.com/blog/dia-internacional-celliacos' class='link-blog' target='_blank'>enfermedad celíaca</a> o el síndrome del intestino irritable pueden tener un impacto significativo en la <span class='span-bold'>calidad de vida</span> de las personas. Es fundamental buscar <span class='span-bold'>atención médica</span> si experimentamos síntomas persistentes o preocupantes relacionados con la salud digestiva. Aquí puedes conocer a nuestros <a href='https://sjdsevilla.com/digestivo-sevilla' class='link-blog' target='_blank'>especialistas en el aparato digestivo</a> y solicitar una cita.</p>
                        <div class='row'>
                            <div class='col-12'>
                                <img src='/files/img/blog/cita-digestivo-sevilla.jpg' title='Pide ya tu cita en nuestra unidad de aparato digestivo en Sevilla' alt='cita-digestivo-sevilla' class='blog-img h-100 mt-3'>
                            </div>
                        </div>
                        <h2 class='primary-font-blue mt-5'>Trastornos digestivos más comunes</h2>
                        <p class='third-font-gray mt-4'>Los trastornos digestivos son afecciones que afectan el <span class='span-bold'>sistema digestivo</span> y pueden causar molestias y malestar en quienes los padecen. A continuación, presentamos una breve descripción de algunos de los <span class='span-bold'>trastornos digestivos más comunes.</span></p>
                        <p class='third-font-gray mt-4'><span class='span-bold'>Acidez estomacal:</span> Se produce cuando el ácido del estómago regresa al esófago, causando una sensación de ardor en el pecho. Puede ser causada por el reflujo gastroesofágico o por ciertos alimentos y bebidas.</p>
                        <p class='third-font-gray mt-4'><span class='span-bold'>Síndrome del intestino irritable (SII):</span> Es un trastorno crónico que afecta el funcionamiento del intestino. Los síntomas pueden incluir dolor abdominal, hinchazón, diarrea o estreñimiento. A menudo está relacionado con el estrés y la sensibilidad a ciertos alimentos.</p>
                        <p class='third-font-gray mt-4'><span class='span-bold'>Enfermedad inflamatoria intestinal (EII):</span> Comprende la enfermedad de Crohn y la colitis ulcerosa. Ambas condiciones causan inflamación crónica en el tracto gastrointestinal, lo que puede provocar dolor abdominal, diarrea, sangrado rectal y pérdida de peso.</p>
                        <p class='third-font-gray mt-4'><span class='span-bold'>Gastritis:</span> Es la inflamación del revestimiento del estómago. Puede ser causada por infecciones bacterianas, el uso excesivo de medicamentos antiinflamatorios no esteroideos, el consumo de alcohol o ciertos alimentos. Los síntomas pueden incluir dolor abdominal, náuseas, vómitos y sensación de saciedad temprana.</p>
                        <p class='third-font-gray mt-4'><span class='span-bold'>Estreñimiento:</span> Se caracteriza por la dificultad para evacuar regularmente. Puede ser causado por la falta de fibra en la dieta, la falta de actividad física, el estrés o ciertos medicamentos. Los síntomas incluyen heces duras y poco frecuentes, esfuerzo durante la evacuación y sensación de evacuación incompleta.</p>
                        <p class='third-font-gray mt-4'>Es importante destacar que si experimentas <span class='span-bold'>síntomas persistentes</span> o preocupantes, es recomendable <span class='span-bold'>acudir a la unidad de aparato digestivo</span> para un <span class='span-bold'>diagnóstico adecuado</span> y un plan de <span class='span-bold'>tratamiento personalizado</span>. Adopta los aspectos claves que recomendamos y realiza <span class='span-bold'>estudios periódicos</span> para mantener todo en orden.</p>
                        <p class='third-font-gray mt-4'>Si necesitas cualquier consulta, no dudes en solicitar tu <span class='span-bold'>cita previa</span> con nuestro equipo de <span class='span-bold'>aparato digestivo</span> que estará encantado de atenderte. Solicítala aquí: <a href='https://sjdsevilla.com/pedir-cita' class='link-blog' target='_blank'>https://sjdsevilla.com/pedir-cita</a></p>
                        ", 
        "feature" => false,
        "page_title" => "Día Mundial de la Salud Digestiva, cuida tu sistema digestivo",
        "page_description" => "Celebra el Día Mundial de la Salud Digestiva en Hospital San Juan de Dios Sevilla, pide ya tu cita en nuestra unidad de aparato digestivo",
		"keywords" => "aparato digestivo, sistema digestivo, especialistas en aparato digestivo",
    ],

	"incorporacion-adeslas-aseguradoras" => (object) [
		"fecha" => "Viernes, 26 de mayo de 2023",
		"title_noticia" => "Desde el Hospital San Juan de Dios de Sevilla incorporamos Adeslas a nuestra cartera de compañías aseguradoras",
		"img_main" => "/files/img/blog/adeslas-sevilla-hospitales.jpg",
		"alt_img" => "Adeslas, nueva compañía aseguradora de Hospital San Juan de Dios Sevilla",
		"title_img" =>  "Adeslas, nueva compañía aseguradora de Hospital San Juan de Dios Sevilla",
		"short_notice" => "Con la nueva incorporación de la compañía aseguradora Adeslas, esperamos expandir nuestro alcance y brindar acceso a nuestros servicios a un mayor número de personas.",
		"content" => "<p class='p20 third-font-gray mt-4'>Con la nueva incorporación de la compañía aseguradora Adeslas, esperamos expandir nuestro alcance y brindar acceso a nuestros servicios a un mayor número de personas.</p>
					<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, nuestro compromiso es brindar una atención médica excepcional y servicios de calidad a nuestra comunidad. Es por ello que anunciamos la reciente incorporación de la prestigiosa compañía de seguros de salud, Adeslas, a nuestra cartera de seguros privados. Esta alianza nos permitirá ampliar el acceso a nuestros servicios médicos y especialidades a los pacientes asegurados por Adeslas. Esta decisión refuerza nuestro compromiso de ofrecer atención de vanguardia y opciones de calidad a todos nuestros pacientes.</p>
					<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, hemos sido reconocidos a lo largo de los años por nuestra dedicación al cuidado de la salud y el bienestar de nuestra comunidad. Con la incorporación de Adeslas a nuestra cartera de seguros privados, buscamos expandir nuestro alcance y brindar acceso a nuestros servicios a un mayor número de personas en la región.</p>
					<p class='p15 third-font-gray mt-4'>Adeslas es una de las principales aseguradoras de salud en España y se distingue por su enfoque en la calidad asistencial y la satisfacción del paciente. Su amplia red de profesionales médicos y centros de atención complementa perfectamente la excelencia y diversidad de servicios que ofrecemos en el Hospital San Juan de Dios de Sevilla.</p>
					<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Damos la bienvenida a la compañía aseguradora Adeslas en San Juan de Dios Sevilla</span></h2>
					<p class='p15 third-font-gray mt-4'>Los pacientes asegurados por Adeslas ahora podrán acceder a nuestro amplio y cualificado cuadro médico, así como a la variedad de especialidades. Contamos con equipos médicos altamente calificados y tecnología de vanguardia, lo que garantiza una atención médica integral y de calidad para todos los pacientes asegurados por Adeslas.</p>
					<p class='p15 third-font-gray mt-4'>Nuestra colaboración con Adeslas también tiene como objetivo simplificar los procesos administrativos para los pacientes asegurados, facilitando la gestión de citas, autorizaciones y reembolsos. Queremos que nuestros pacientes puedan concentrarse en su bienestar y recuperación, sin preocuparse por los aspectos burocráticos.</p>
					<p class='p15 third-font-gray mt-4'>Tanto el Hospital San Juan de Dios de Sevilla como Adeslas compartimos valores fundamentales como la ética, el respeto, la responsabilidad y la humanización de la atención médica. Nos esforzamos por brindar una atención integral y personalizada a cada paciente, teniendo en cuenta sus necesidades individuales y garantizando un trato cercano y humano.</p>
					<p class='p15 third-font-gray mt-4'>La incorporación de Adeslas a nuestra cartera de seguros privados en el Hospital San Juan de Dios de Sevilla es motivo de orgullo tanto para nosotros como para los pacientes asegurados. La combinación de nuestra experiencia y calidad asistencial con la red de profesionales y servicios de Adeslas, asegura una atención médica integral y de calidad para nuestros pacientes.</p>
					<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla reafirmamos nuestro compromiso de ofrecer una atención médica excepcional y de brindar a nuestros pacientes asegurados la tranquilidad de recibir una atención de vanguardia respaldada por una aseguradora de renombre como es Adeslas.</p>
					<p class='p15 third-font-gray mt-4'>Junto con Adeslas, trabajaremos para mejorar y expandir los servicios de atención médica en nuestra ciudad, brindando a nuestra comunidad acceso a la atención de calidad que merecen. Estamos emocionados por esta nueva etapa y esperamos poder seguir sirviendo a nuestra comunidad con excelencia y dedicación, como lo hemos hecho hasta ahora. </p>
					<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Otras compañías aseguradores en San Juan de Dios Sevilla</span></h2>
					<p class='p15 third-font-gray mt-4'>Además de la nueva incorporación de la compañía aseguradora Adeslas, contamos con acuerdos y convenios con otras <a href='https://sjdsevilla.com/companias' class='link-blog' >compañías aseguradoras</a> como Caser Seguros, Mapfre, Sanitas, DKV, Fiatc Seguros, Plus Ultra, Seguros Bilbao, Catalana Occidente, Norte Hispania y Generali.</p>
					<p class='p15 third-font-gray mt-4'>Si tu aseguradora no aparece en el listado, puedes ponerte en contacto llamando al 954 93 93 00 o ponerte en <a href='https://sjdsevilla.com/contacto' class='link-blog' >contacto a través de nuestra web</a>. En nuestro afán por ofrecer la mejor atención a los pacientes y todas las facilidades posibles, continuaremos creciendo para que todas las personas puedan disfrutar de una atención médica de calidad, personalizada y cercana.</p>
					", 
		"feature" => false,
		"page_title" => "Hospital San Juan de Dios de Sevilla incorpora Adeslas a su cartera de compañías aseguradoras",
		"page_description" => " Los pacientes asegurados por Adeslas ya pueden acceder a nuestra amplia variedad de especialidades médicas en nuestro hospital en Sevilla"
	],
	"nueva-unidad-de-trafico" => (object) [
		"fecha" => "Jueves, 25 de mayo de 2023",
		"title_noticia" => "Nueva Unidad de Tráfico en Sevilla",
		"img_main" => "/files/img/blog/unidad-accidentes-trafico.jpg",
		"alt_img" => "Unidad de accidentes de tráfico en Sevilla",
		"title_img" =>  "Unidad de accidentes de tráfico en Sevilla",
		"short_notice" => "Con el objetivo de brindar un enfoque integral para la atención y recuperación de los pacientes que han sufrido lesiones en accidentes viales, hemos creado la nueva unidad de accidentes de tráfico.",
		"content" => "<p class='p20 third-font-gray mt-4'>Con el objetivo de brindar un enfoque integral para la atención y recuperación de los pacientes que han sufrido lesiones en accidentes viales, hemos creado la nueva unidad de accidentes de tráfico.</p>
					<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla hemos incorporado a nuestra cartera de servicios la nueva <a href='https://sjdsevilla.com/unidad-trafico' class='link-blog' >Unidad de Tráfico</a>. Esta unidad, formada por un<b><strong> equipo multidisciplinar</strong></b> de profesionales altamente capacitados, tiene como objetivo brindar atención integral a las personas que han sufrido accidentes de tráfico y necesitan tratamiento médico especializado inmediato.</p>
					<p class='p15 third-font-gray mt-4'>El tráfico es una de las principales causas de accidentes en todo el mundo, y España no es una excepción. Según los datos ofrecidos por UNESPA, a lo largo de 2022 las compañías aseguradoras abonaron prestaciones sanitarias a víctimas de accidentes de tráfico por un valor total de 352,5 millones de euros, siendo las prestaciones de hasta 1.000 euros las más numerosas (suponen un 67% de las ayudas totales).</p>
					<p class='p15 third-font-gray mt-4'>Para hacer frente a esta situación, en Hospital San Juan de Dios de Sevilla hemos decidido crear una unidad especializada en el tratamiento de lesiones derivadas de accidentes de tráfico. Esta unidad cuenta con un equipo de profesionales de diversas áreas, como urgencias, traumatología, neurología, fisioterapia y psicología, entre otras.</p>
					<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Asistencia sanitaria personalizada en caso de accidente de tráfico</span></h2>
					<p class='p15 third-font-gray mt-4'>El objetivo de la unidad de tráfico es proporcionar atención integral a los pacientes, desde el momento del accidente hasta su recuperación completa. Para ello, el equipo médico y de enfermería trabaja en estrecha colaboración con los servicios de emergencia y los cuerpos de seguridad del Estado, garantizando una atención rápida y eficaz a las víctimas de accidentes de tráfico.</p>
					<p class='p15 third-font-gray mt-4'>Además, nuestra unidad de tráfico en Sevilla cuenta con la última tecnología y equipos médicos, lo que permite realizar diagnósticos precisos y tratamientos personalizados a cada paciente. Esto incluye desde la realización de pruebas radiológicas y resonancias magnéticas, hasta la aplicación de técnicas avanzadas de rehabilitación y fisioterapia, así como intervenciones quirúrgicas de ser necesario.</p>
					<p class='p15 third-font-gray mt-4'>La unidad de tráfico también presta especial atención a la salud mental de los pacientes, ya que muchos de ellos pueden sufrir trastornos psicológicos derivados del accidente. Por este motivo, la unidad cuenta con un equipo de psicólogos y trabajadores sociales que ofrecen apoyo emocional y asesoramiento a los pacientes y sus familiares.</p>
					<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Quién puede solicitar los servicios de nuestra nueva unidad de tráfico</span></h2>
					<div class='row'>
						<div class='col-12'>
							<img src='/files/img/blog/hospital-en-sevilla-unidad-trafico.jpg' alt='Unidad de accidentes de tráfico en Sevilla' title='Unidad de accidentes de tráfico en Sevilla' class='blog-img h-100 mt-3'>
						</div>
					</div>
					<p class='p15 third-font-gray mt-4'>Las lesiones de tráfico deben ser tratadas de forma precoz y exhaustiva. Aunque no sientas síntomas, pueden existir lesiones internas, en la cabeza, los tejidos blandos o la columna vertebral que requieran un examen médico para detectarlas y que deben ser valoradas por un médico. De hecho, algunas lesiones por accidentes de tráfico, como conmoción cerebral o el latigazo cervical, entre otras, pueden no mostrar síntomas hasta varias horas, días o incluso semanas después del accidente. Por ello, si te ves involucrado en un accidente no lo dudes y <a href='https://sjdsevilla.com/contacto' class='link-blog' >consulta con nuestros especialistas</a>.</p>
					<p class='p15 third-font-gray mt-4'>Atendemos a cualquier persona involucrada en un accidente de tráfico y no es necesario contar con un seguro médico privado. El único requisito es<b><strong> presentar el parte de accidente,</strong></b> y el equipo administrativo del hospital se encargará de realizar todas las gestiones necesarias con la compañía aseguradora del vehículo. Sólo tendrás que preocuparte por tu recuperación.</p>
					<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Hospital San Juan de Dios de Sevilla, comprometidos con la salud y el bienestar</span></h2>
					<p class='p15 third-font-gray mt-4'>La creación de esta unidad de tráfico es una muestra más del compromiso de nuestro Hospital San Juan de Dios de Sevilla con la salud y el bienestar de la comunidad. Como centro de referencia en el ámbito de la salud en Andalucía, contamos con una amplia experiencia en el tratamiento de todo tipo de enfermedades y patologías, y ahora ampliamos la oferta de servicios con la incorporación de esta nueva unidad.</p>
					<p class='p15 third-font-gray mt-4'>Los pacientes que necesiten atención médica especializada después de un accidente de tráfico pueden acudir a nuestra <a href='https://sjdsevilla.com/unidad-trafico' class='link-blog' >unidad de tráfico del Hospital San Juan de Dios de Sevilla</a>, donde recibirán una atención integral y personalizada por parte de un equipo de profesionales comprometidos con su recuperación y bienestar.</p>
						", 
		"feature" => false,
		"page_title" => "Nueva Unidad de accidentes de Tráfico en Sevilla",
		"page_description" => "Conoce la nueva unidad especializada en el tratamiento de lesiones derivadas de accidentes de tráfico de Hospital San Juan de Dios Sevilla"
	],
	"educacion-herramienta" => (object) [
		"fecha" => "Martes, 23 de mayo de 2023",
		"title_noticia" => "La educación como herramienta para cambiar realidades: el ejemplo de #EducaSJD",
		"img_main" => "/files/img/blog/educasjd-san-juan-dios-sevilla.jpg",
		"short_notice" => "La educación es una herramienta poderosa que puede cambiar realidades y mejorar la vida de las personas. Un claro ejemplo de esto es #EducaSJD, un proyecto educativo que ha transformado la vida de muchos jóvenes.",
		"content" => "<p class='p20 third-font-gray mt-4'>La educación es una herramienta poderosa que puede cambiar realidades y mejorar la vida de las personas. Un claro ejemplo de esto es #EducaSJD, un proyecto educativo que ha transformado la vida de muchos jóvenes.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>1. Introducción a la Educación como Herramienta para Cambiar Realidades</span></h2>
						<p class='p15 third-font-gray mt-4'>La educación es una herramienta poderosa que puede cambiar realidades y transformar vidas. En el caso de #EducaSJD, un proyecto educativo desarrollado por el Hospital Sant Joan de Déu, se busca ofrecer una educación de calidad a los niños y niñas que se encuentran hospitalizados y no pueden asistir a la escuela de forma regular. Gracias a la iniciativa, estos niños pueden seguir aprendiendo y desarrollando sus habilidades, lo que les permite mantener una conexión con el mundo exterior y evitar el aislamiento. Además, el proyecto también ofrece apoyo a los familiares y cuidadores, quienes pueden sentirse abrumados por la situación. La educación no solo es importante para el desarrollo cognitivo de los niños, sino que también puede ayudarles a mantener una actitud positiva y a tener esperanza en el futuro. En definitiva, #EducaSJD es un ejemplo de cómo la educación puede ser una herramienta valiosa para cambiar realidades y mejorar la calidad de vida de las personas.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>2. El Proyecto #EducaSJD</span></h2>
						<p class='p15 third-font-gray mt-4'>El Proyecto #EducaSJD es un ejemplo perfecto de cómo la educación puede ser una herramienta poderosa para cambiar realidades. Este proyecto se enfoca en brindar educación de calidad a niños y jóvenes de bajos recursos, con el objetivo de romper el ciclo de pobreza y ofrecerles oportunidades para un futuro mejor. A través de la educación, estos niños y jóvenes pueden adquirir habilidades y conocimientos que les permiten tener una mejor calidad de vida y contribuir al desarrollo de sus comunidades. Además, el proyecto no solo se enfoca en la educación académica, sino también en la educación en valores, como la responsabilidad, el respeto y la solidaridad. Esto les permite a los estudiantes tener una visión más amplia del mundo y convertirse en ciudadanos comprometidos y conscientes de su entorno. El Proyecto #EducaSJD demuestra que la educación es una herramienta poderosa para transformar vidas y comunidades enteras, y es un ejemplo inspirador para todos aquellos que creen en el poder de la educación para cambiar el mundo.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>3. Cómo el Proyecto #EducaSJD Está Cambiando Realidades</span></h2>
						<p class='p15 third-font-gray mt-4'>El proyecto #EducaSJD es un claro ejemplo de cómo la educación puede ser utilizada como herramienta para cambiar realidades. A través de actividades educativas y lúdicas, los niños pueden continuar con su formación académica y, al mismo tiempo, distraerse de su situación médica. Pero el proyecto no solo beneficia a los pacientes, sino también a sus familias y al personal médico. Los padres pueden estar más tranquilos sabiendo que sus hijos están recibiendo una educación adecuada y el personal médico puede centrarse en su trabajo sabiendo que los niños están siendo atendidos de manera integral. Además, el proyecto #EducaSJD también tiene un impacto social al fomentar la inclusión educativa y la igualdad de oportunidades para todos los niños. #EducaSJD está cambiando realidades y demostrando el poder transformador de la educación en el ámbito sanitario.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>4. Perspectivas de Futuro para el Proyecto #EducaSJD</span></h2>
						<p class='p15 third-font-gray mt-4'>El proyecto #EducaSJD tiene un futuro prometedor. A medida que se expande y se integra en más comunidades, se espera que tenga un impacto aún mayor en la educación y el bienestar de los niños y jóvenes. La educación es una herramienta poderosa para cambiar realidades, y #EducaSJD lo demuestra claramente. Al proporcionar a los niños y jóvenes de comunidades desfavorecidas acceso a la educación, el proyecto no solo les brinda la oportunidad de mejorar sus vidas, sino que también les da la oportunidad de convertirse en agentes de cambio en sus propias comunidades. A medida que más y más personas se involucren en el proyecto, se espera que surjan nuevas ideas y enfoques para mejorar aún más su impacto. Además, la tecnología juega un papel importante en la expansión del proyecto, ya que se espera que la plataforma en línea #EducaSJD llegue a más estudiantes en todo el mundo. El futuro de #EducaSJD es brillante y emocionante, y esperamos con ansias ver cómo el proyecto continúa cambiando vidas y comunidades a través de la educación.</p>
						<p class='p15 third-font-gray mt-4'>Puedes comprobar más detalles respecto a todos los proyectos de #EducaSJD desde el siguiente enlace <a href='https://sjd.es/educa-sjd'><span class='link-blog'>https://sjd.es/educa-sjd/</span></a></p>
						<div class='d-flex justify-content-center'><iframe width='560' height='315' src='https://www.youtube.com/embed/07X3ndUAoEY' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe></div>
						", 
		"feature" => false,
		"page_title" => "La educación como herramienta para cambiar realidades",
		"page_description" => "EducaSJD, un proyecto educativo desarrollado por el Hospital Sant Joan de Déu, que ofrece una educación de calidad a los niños que se encuentran hospitalizados. "
	],
	"dia-internacional-celliacos" => (object) [
		"fecha" => "Martes, 16 de mayo de 2023",
		"title_noticia" => "Día Internacional de los Celíacos",
		"img_main" => "/files/img/blog/dia-internacional-celiacos.jpg",
		"short_notice" => "En San Juan de Dios de Sevilla, nos enorgullece ser parte de la comunidad que brinda atención especializada y apoyo integral a los celíacos.",
		"content" => "<p class='p20 third-font-gray mt-4'>En San Juan de Dios de Sevilla, nos enorgullece ser parte de la comunidad que brinda atención especializada y apoyo integral a los celíacos.</p>
						<p class='p15 third-font-gray mt-4'>Cada año, el 16 de mayo, celebramos el Día Internacional de los Celíacos. Esta fecha nos brinda la oportunidad de generar conciencia sobre la enfermedad celíaca y mostrar nuestro apoyo a todas las personas que viven con esta condición. En San Juan de Dios de Sevilla, nos enorgullece ser parte de la comunidad que brinda atención especializada y apoyo integral a los celíacos. En este artículo, exploramos la enfermedad celíaca, su impacto en la vida de quienes la padecen y cómo nuestro hospital se compromete a cuidar y mejorar la calidad de vida de los pacientes celíacos.</p>
						<p class='p15 third-font-gray mt-4'>La enfermedad celíaca es una afección crónica en la que el sistema inmunológico reacciona de manera adversa al gluten, una proteína presente en el trigo, la cebada y el centeno. Esta reacción desencadena una respuesta inflamatoria en el revestimiento del intestino delgado, lo que puede provocar una serie de síntomas y complicaciones a largo plazo.</p>
						<p class='p15 third-font-gray mt-4'>Los síntomas de la enfermedad celíaca pueden variar ampliamente, desde problemas gastrointestinales como diarrea, hinchazón y dolor abdominal, hasta síntomas no digestivos como fatiga crónica, erupciones cutáneas, dolores articulares e incluso alteraciones en el estado de ánimo. Sin embargo, es importante destacar que algunos pacientes pueden ser asintomáticos o tener síntomas leves, lo que dificulta el diagnóstico.</p>
						<p class='p15 third-font-gray mt-4'>El diagnóstico temprano y preciso de la enfermedad celíaca es fundamental para permitir a los pacientes tomar medidas para controlar su condición y mejorar su calidad de vida. En el Hospital San Juan de Dios de Sevilla, contamos con un equipo médico multidisciplinario especializado en el diagnóstico y tratamiento de la enfermedad celíaca.</p>
						<p class='p15 third-font-gray mt-4'>Nuestros expertos en gastroenterología utilizan una combinación de pruebas clínicas, análisis de sangre y biopsias para confirmar el diagnóstico de la enfermedad celíaca. Además, trabajamos en estrecha colaboración con nuestros pacientes para brindarles el apoyo emocional y educativo necesario para adaptarse a su nueva realidad.</p>
						<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, comprendemos que la enfermedad celíaca requiere una atención integral y personalizada. Por ello, nos comprometemos a ofrecer un enfoque de cuidado que aborde las necesidades médicas, nutricionales y emocionales de nuestros pacientes celíacos.</p>
						<p class='p15 third-font-gray mt-4'>Nuestro equipo de nutricionistas trabaja en colaboración con los pacientes para desarrollar planes de alimentación sin gluten, garantizando que obtengan los nutrientes necesarios y puedan disfrutar de una dieta equilibrada y variada. Además, brindamos asesoramiento nutricional individualizado y organizamos talleres educativos para ayudar a los pacientes y sus familias a comprender cómo seguir una dieta sin gluten de manera segura y sabrosa.</p>
						<p class='p15 third-font-gray mt-4'>En el Día Internacional de los Celíacos, renovamos nuestro compromiso de brindar atención especializada y apoyo integral a los pacientes celíacos. En San Juan de Dios de Sevilla, nos esforzamos por ofrecer diagnóstico temprano, cuidado integral, apoyo emocional y educativo, y una comunidad solidaria para aquellos que viven con esta enfermedad.</p>
						<p class='p15 third-font-gray mt-4'>Nuestra misión es mejorar la calidad de vida de los pacientes celíacos, empoderándolos para que lleven una vida plena y satisfactoria. Juntos, estamos construyendo un futuro en el que los celíacos puedan prosperar y disfrutar de cada aspecto de sus vidas, sabiendo que están respaldados por un equipo médico dedicado y una comunidad comprensiva.</p>
						<p class='p15 third-font-gray mt-4'>Si necesitas cualquier consulta relacionada con esta enfermedad no dudes en solicitar tu cita previa con nuestro equipo de aparato digestivo que estará encantado de atenderte. Solicítala aquí: <a href='https://sjdsevilla.com/pedir-cita' class='link-blog' >https://sjdsevilla.com/pedir-cita</a> </p>
						", 
		"feature" => false,
		"page_title" => "Día Internacional de los Celíacos",
		"page_description" => "El día 16 de mayo se celebra el día internacional de los celíacos. Desde el Hospital san juan de dios de sevilla estamos comprometidos con esta enfermedad."
	],
	"jornadas-desarrollo-humanizacion-enfermeria" => (object) [
		"fecha" => "Viernes, 12 de mayo de 2023",
		"title_noticia" => "XXXVI Jornadas para el Desarrollo y Humanización de la Enfermería",
		"img_main" => "/files/img/blog/jornadas_sjd1.jpg",
		"short_notice" => "Más de 300 profesionales sanitarios de toda España se dan cita en este encuentro que, por primera vez, ha creado el Espacio Humanización San Juan de Dios, con trabajos de primer nivel.",
		"content" => "<p class='p20 third-font-gray mt-4'>Más de 300 profesionales sanitarios de toda España se dan cita en este encuentro que, por primera vez, ha creado el Espacio Humanización San Juan de Dios, con trabajos de primer nivel.</p>
						<p class='p15 third-font-gray mt-4'>Madrid acogió durante el día de ayer y en la mañana de hoy las XXXVI Jornadas para el Desarrollo y Humanización de la Enfermería celebradas en el Centro San Juan de Dios (CSJD) de Ciempozuelos bajo el título “Enfermería y cronicidad”. Cuidando desde la cercanía”, a las que acuden personalidades de la Administración pública de diferentes comunidades autónomas.</p>
						<p class='p15 third-font-gray mt-4'>El acto de inauguración, moderado por el director del Enfermería del CSJD, Pablo Plaza, ha contado con la presencia del Superior Provincial de San Juan de Dios en España, Hno. Amador Fernández; la vicepresidenta del<b> Consejo General de Enfermería de España,</b> Raquel Rodríguez; y la directora gerente del centro, Elvira Conde.</p>
						<div class='row'>
						<div class='col-12 col-md-6'>
							<img src='/files/img/blog/jornadas_sjd2.jpg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						<div class='col-12 col-md-6 mt-3 mt-md-0'>
							<img src='/files/img/blog/jornadas_sjd3.jpg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						</div>
						<p class='p15 third-font-gray mt-4'>Estas jornadas, como ha expresado el Superior Provincial de San Juan de Dios España, el Hno. Amador Fernández, “abren un espacio de encuentro y reflexión sobre cuestiones fundamentales para la profesión enfermera, cuya orientación fundamental expresa el propio título de las Jornadas: desarrollo y Humanización. Un binomio profundamente arraigado en la trayectoria de la Orden Hospitalaria de San Juan de Dios”.v</p>
						<p class='p15 third-font-gray mt-4'>Tras varios años suspendidas por la pandemia de la COVID-19, este año se han vuelto a retomar bajo el título “Enfermería y cronicidad. Cuidando desde la cercanía”, con el objetivo de evidenciar la importancia del papel de enfermería en el ámbito de la cronicidad.</p>
						<p class='p15 third-font-gray mt-4'>Pablo Plaza, en calidad de presidente del Comité Científico de las jornadas ha explicado que la elección de este tema “se ha basado en indicadores tales como: el aumento de la esperanza de vida, las mejoras en salud pública y atención sanitaria, así como la adopción de determinados estilos de vida que están condicionando la aparición de nuevas situaciones de dependencia encuadradas en lo que llamamos enfermedades crónicas”.</p>
						<p class='p15 third-font-gray mt-4'>Como ha señalado Elvira Conde, “surge la necesidad de dar respuesta a la demanda que genera la cronicidad en toda su dimensión. A la vez que la cronicidad supone una amenaza por los costes que genera, es también una oportunidad para la enfermería, para estar allí donde se precisa de cuidados avanzados realizados por profesionales con competencias clínicas reconocidas, para llevar a cabo la gestión de casos y el seguimiento y control de pacientes crónicos complejos. La atención a la cronicidad, es hoy un reto y una oportunidad que deben liderar las enfermeras que deberían ser un referente en aspectos como el autocuidado o el acompañamiento al final de la vida”.</p>
						<p class='p15 third-font-gray mt-4'>Desde el Consejo General de Enfermería, su vicepresidenta, Raquel Rodríguez, ha destacado la importancia de estas jornadas “que contribuyen al desarrollo y la formación de las enfermeras”. Destacando el gran programa científico de las mismas con profesionales del más alto nivel.</p>
						<div class='row'>
						<div class='col-12'>
							<img src='/files/img/blog/jornadas_sjd4.jpeg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						</div>
						<p class='p20 third-font-gray mt-4'>Espacio Humanización San Juan de Dios</p>
						<p class='p15 third-font-gray mt-4'>Y en esta línea de mejora, siempre acorde con los valores de la Orden Hospitalaria de San Juan de Dios que rigen al Centro San Juan de Dios, se ha creado por primera vez el Espacio Humanización San Juan De Dios. Una sesión en la que se busca poner en valor el trabajo humanizado de los diferentes centros españoles y premiar aquéllos que destaquen por su sensibilidad, especificidad y originalidad, entre otros aspectos.</p>
						<p class='p15 third-font-gray mt-4'>Los objetivos de este Espacio Humanización San Juan De Dios son fomentar la asistencia sanitaria humanizada, llevando el valor de la Humanización, del que San Juan de Dios fue el creador, a todos los ámbitos asistenciales y conseguir la excelencia en la asistencia sanitaria con la Humanización como eje vertebrador desde el mismo momento en el que el usuario accede a la red asistencial, hasta que finaliza su tratamiento. Como ha destacado Pablo Plaza “desde el Comité Científico pretendemos abordar, con el objetivo de minimizar y a ser posible eliminar aquellas manifestaciones más frecuentes de la despersonalización y deshumanización. que nos encontramos en la atención al paciente crónico y pluripatológico” Decenas de trabajos han sido presentados desde centros hospitalarios de toda España, una muestra más del gran nivel de la sanidad española y los avances que se están consiguiendo en materia de cronicidad.</p>
						", 
		"feature" => false,
		"page_title" => "Jornadas para el desarrollo y Humanización de la Enfermería",
		"page_description" => "Se han celebrado las XXXVI Jornadas para el Desarrollo y Humanización de la Enfermería celebradas en el Centro San Juan de Dios."
	],
	"nueva-unidad-del-dolor" => (object) [
		"fecha" => "Miércoles, 10 de mayo de 2023",
		"title_noticia" => "Nueva Unidad del Dolor en Sevilla",
		"img_main" => "/files/img/blog/unidad-del-dolor-sevilla.jpg",
		"short_notice" => "El Hospital San Juan de Dios de Sevilla incorpora una nueva Unidad del Dolor integrada por un equipo multidisciplinar y altamente cualificado.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla incorpora una nueva Unidad del Dolor integrada por un equipo multidisciplinar y altamente cualificado.</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla se complace en presentar su nueva Unidad del Dolor, una unidad médica especializada en el estudio, diagnóstico y tratamiento del dolor en sus diferentes manifestaciones. Esta unidad está integrada por un equipo multidisciplinar de profesionales altamente capacitados en diferentes áreas de la medicina, que trabajan en conjunto para brindar una atención integral y personalizada a cada paciente.</p>
						<p class='p15 third-font-gray mt-4'>El dolor es uno de los síntomas más comunes en la práctica médica y puede afectar gravemente la calidad de vida de las personas. En la Unidad del Dolor del Hospital San Juan de Dios de Sevilla, nos enfocamos en mejorar la calidad de vida de nuestros pacientes a través de una atención integral y personalizada. Trabajamos en estrecha colaboración con diferentes especialidades médicas para ofrecer una amplia variedad de técnicas de tratamiento para el dolor.</p>
						<p class='p15 third-font-gray mt-4'>Nuestro equipo está formado por especialistas altamente capacitados en técnicas de diagnóstico y tratamiento del dolor, como terapias farmacológicas, bloqueos nerviosos, infiltraciones, técnicas de neuromodulación y terapias psicológicas. Además, contamos con tecnología avanzada y recursos técnicos para garantizar una atención eficiente y de alta calidad.</p>
						<p class='p15 third-font-gray mt-4'>Los pacientes que sufren de dolor agudo o crónico son evaluados exhaustivamente para identificar la causa del dolor y elaborar un plan de tratamiento individualizado y adaptado a sus necesidades. En nuestra Unidad del Dolor, nos aseguramos de que nuestros pacientes reciban una atención completa y personalizada para lograr el mejor resultado posible en su tratamiento.</p>
						<p class='p15 third-font-gray mt-4'>Entre los especialistas de nuestro equipo se encuentran los doctores Antonio Hachero, Domingo Ventura y Andrés García León. Ellos lideran esta unidad especializada y están altamente capacitados en el estudio, investigación, diagnóstico y tratamiento del dolor en los pacientes, independientemente de la intensidad y duración del mismo. Además, trabajan en estrecha colaboración con otros especialistas médicos para garantizar una atención integral y personalizada a nuestros pacientes. </p>
						<p class='p15 third-font-gray mt-4'>En la Unidad del Dolor del Hospital San Juan de Dios de Sevilla, entendemos que el dolor puede ser muy limitante para nuestros pacientes. Por lo tanto, nos esforzamos por ofrecer una atención de alta calidad que mejore la calidad de vida de nuestros pacientes. Si está sufriendo de dolor agudo o crónico, no dude en contactar con nuestra Unidad del Dolor para obtener una evaluación exhaustiva y un plan de tratamiento adaptado a sus necesidades individuales. </p>
						<p class='p15 third-font-gray mt-4'>Entre las principales consultas que atendemos desde la Unidad del Dolor del Hospital San Juan de Dios de Sevilla se encuentran:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>Dolor lumbar</li>
							<li class='mt-2'>Dolor neuropático</li>
							<li class='mt-2'>Síndrome de dolor regional complejo (SDRC)</li>
							<li class='mt-2'>Cefaleas y migrañas</li>
							<li class='mt-2'>Dolor postoperatorio</li>
							<li class='mt-2'>Artritis y artrosis</li>
							<li class='mt-2'>Dolor oncológico</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar cita en nuestra Unidad del Dolor o cualquiera de nuestras especialidades médicas a través del siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog' >https://sjdsevilla.com/pedir-cita</a>, en el teléfono 955 045 999, a través de la APP SJD Salud o acudiendo directamente al mostrador de consultas externas, situado en la primera planta de nuestro hospital.</p>
						", 
		"feature" => false,
		"page_title" => "Nueva Unidad del Dolor en Sevilla",
		"page_description" => "La nueva Unidad del Dolor del Hospital San Juan de Dios de Sevilla, se enfoca en el estudio, diagnóstico y tratamiento del dolor."
	],
	"natallia-cobo-cardiologa" => (object) [
		"fecha" => "Lunes, 08 de mayo de 2023",
		"title_noticia" => "Natalia Cobo, cardióloga del Hospital San Juan de Dios de Sevilla",
		"img_main" => "/files/img/blog/natalia-cobo-gomez-cardiologa-sevilla2.jpg",
		"short_notice" => "Hoy presentamos a Natalia Cobo, cardióloga del Hospital San Juan de Dios de Sevilla.",
		"content" => "<p class='p20 third-font-gray mt-4'>Hoy presentamos a Natalia Cobo, cardióloga del Hospital San Juan de Dios de Sevilla.</p>
						<p class='p15 third-font-gray mt-4'>Natalia Cobo es actualmente cardióloga del Hospital San Juan de Dios de Sevilla, donde se dedica a la prevención, diagnóstico y tratamiento de enfermedades cardiovasculares, con un enfoque especializado en cardiología clínica e imagen cardiaca avanzada.</p>
						<p class='p15 third-font-gray mt-4'>La carrera de Natalia comenzó en la Universidad de Granada, donde se graduó en Medicina. Después, se trasladó a Sevilla para trabajar como Facultativo Especialista de Área en el servicio de cardiología de Nuestra Señora de Valme, donde adquirió una gran experiencia en el tratamiento de pacientes con enfermedades cardiovasculares.</p>
						<p class='p15 third-font-gray mt-4'>Posteriormente, decidió ampliar su formación clínica y realizó una subespecialización en imagen cardiaca avanzada en prestigiosos centros nacionales e internacionales, incluyendo el hospital universitario clínico San Carlos y la Fundación Jiménez Díaz en Madrid, así como el grupo Ascires en Valencia y San Donato en Milán, Italia. Su interés en la imagen cardiaca diagnóstica la llevó a completar dos másteres en la materia, por la Universidad Complutense de Madrid y la Universidad San Antonio de Murcia.</p>
						<p class='p15 third-font-gray mt-4'>Además, su pasión por el cuidado de pacientes críticos, la llevó a realizar otro máster en cuidados agudos y críticos cardiovasculares por la Universidad Rey Juan Carlos, así como un experto universitario en cardiopatía familiar por la Universidad Francisco de Vitoria.</p>
						<p class='p15 third-font-gray mt-4'>Gracias a su formación académica y experiencia, Natalia ha desarrollado habilidades excepcionales para el diagnóstico y tratamiento de enfermedades cardiovasculares. Su experiencia en imagen cardiaca avanzada, incluyendo TAC y cardioRMN, le permite obtener imágenes precisas y detalladas del corazón y los vasos sanguíneos, lo que resulta crucial en la prevención, diagnóstico y tratamiento de enfermedades cardiovasculares.</p>
						<p class='p15 third-font-gray mt-4'>Su dedicación, su trabajo duro y al avance en el campo de la cardiología también se refleja en su producción científica. Natalia ha publicado numerosos artículos en revistas científicas y ha presentado comunicaciones a congresos nacionales e internacionales.</p>
						<p class='p15 third-font-gray mt-4'>En su trabajo en el Hospital San Juan de Dios de Sevilla, Natalia se dedica a la atención de pacientes con enfermedades cardiovasculares, incluyendo la prevención, el diagnóstico y el tratamiento de afecciones como enfermedades coronarias, insuficiencia cardíaca, arritmias y valvulopatías, entre otras. Su experiencia y formación en imagen cardiaca avanzada le permiten brindar un diagnóstico preciso y un tratamiento efectivo y personalizado a cada paciente.</p>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar cita en la especialidad de cardiología o cualquier de nuestras especialidades médicas a través del siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog' >https://sjdsevilla.com/pedir-cita</a> o bien contactando en el teléfono 955 045 999.</p>
						", 
		"feature" => false,
		"page_title" => "Natalia Cobo (cardiología)",
		"page_description" => "La Dra. Natalia Cobo es actualmente cardióloga del Hospital San Juan de Dios de Sevilla."
	],
	"quinta-cena-solidaria-hermano-bonifacio" => (object) [
		"fecha" => "Viernes, 05 de mayo de 2023",
		"title_noticia" => "V Cena Solidaria de la Obra Social “Hermano Bonifacio”",
		"img_main" => "/files/img/blog/hermano-bonifacio.jpeg",
		"short_notice" => "Más de medio millar de personas se suma a la causa de la Obra Social ‘Hermano Bonifacio’ en su V Cena Solidaria",
		"content" => "<p class='p20 third-font-gray mt-4'>Más de medio millar de personas se suma a la causa de la Obra Social ‘Hermano Bonifacio’ en su V Cena Solidaria</p>
						<p class='p15 third-font-gray mt-4'>Más de 500 personas se reunieron en el Real Círculo de la Amistad de Córdoba en la V edición de la Cena Solidaria Hermano Bonifacio, con el objetivo de apoyar la obra social del Hospital San Juan de Dios en la provincia. El evento, que batió récords de asistencia, tuvo como objetivo visibilizar los programas de la obra social del centro hospitalario y recaudar fondos para continuar ayudando a las familias en situación de vulnerabilidad social que se benefician de ella.</p>
						<p class='p15 third-font-gray mt-4'>Durante la ceremonia, la cadena de supermercados Mercadona recibió un reconocimiento especial por su compromiso solidario y su modelo responsable. La compañía colabora con la Obra Social Hermano Bonifacio mediante la donación diaria de productos frescos para la cesta de alimentos que se entrega a los beneficiarios.</p>
						<p class='p15 third-font-gray mt-4'>La responsable de Relaciones Externas de Sevilla y Provincia y provisional de Córdoba de Mercadona, Elena Cintado, agradeció el reconocimiento y destacó la implicación y dedicación admirable que han encontrado desde que iniciaron su colaboración con la Obra Social Hermano Bonifacio. 'La donación de alimentos es nuestra forma de devolverle a parte del cuento recibimos de ella', afirmó.</p>
						<p class='p15 third-font-gray mt-4'>El director gerente del Hospital San Juan de Dios de Córdoba, Horacio Pijuán, agradeció a todos los asistentes y colaboradores su solidaridad constante durante todo el año. 'Habéis contribuido de forma importante a poder ampliar y mejorar en este año los programas de ayuda social que desarrollamos desde la Obra Social, una Obra Social por y para los cordobeses', dijo Pijuán.</p>
						<div class='row'>
						<div class='col-12'>
							<img src='/files/img/blog/hermano-bonifacio-22.jpg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						</div>
						<p class='p15 third-font-gray mt-4'>Por su parte, el superior del centro de la Orden Hospitalaria, el hermano Isidoro de Santiago, destacó que la Orden Hospitalaria se compromete con las personas más desfavorecidas, vulnerables o en riesgo de exclusión social. 'Es ahí donde se juega su credibilidad, su razón de ser, su identificación con el mensaje de Jesús de Nazaret', señaló.</p>
						<p class='p15 third-font-gray mt-4'>Los recursos obtenidos en la V Cena Solidaria se destinarán íntegramente a la Obra Social Hermano Bonifacio, que en 2022 ayudó a 2.350 familias (560 menores) a hacer frente a sus necesidades más básicas de alimentación, higiene, vivienda o suministros de energía, y que también recibieron asesoramiento laboral y jurídico. La solidaridad de la comunidad cordobesa en este evento demuestra su compromiso y su apoyo a las personas más vulnerables en la región.</p>
						<p class='p15 third-font-gray mt-4'>Por parte del Hospital San Juan de Dios de Sevilla, acudieron en representación, Manuel González, director gerente de nuestro hospital, Fco. Javier Consegliere, director de enfermería, Rocío Ruiz, directora de personas y valores, Pilar Rocío Pretel, secretaria de dirección y Herminia Pérez, responsable de calidad, experiencia del paciente y recursos institucionales.</p>
						<p class='p15 third-font-gray mt-4'>Puedes leer todos los detalles aquí: <a href='https://hsjdcordoba.sjd.es/noticias/mas-de-medio-millar-de-personas-se-suma-la-causa-de-la-obra-social-hermano-bonifacio-en-su' class='link-blog' >hsjdcordoba</a></p>
						", 
		"feature" => false,
		"page_title" => "V Cena Solidaria de la Obra Social “Hermano Bonifacio”",
		"page_description" => "Más de 500 personas asistieron a la V Cena Solidaria de la Obra Social 'Hermano Bonifacio' en el Real Círculo de la Amistad de Córdoba para apoyar a las familias más vulnerables en la provincia."
	],
	"reunion-comite-operaciones" => (object) [
		"fecha" => "Jueves, 04 de mayo de 2023",
		"title_noticia" => "Reunión del Comité de Operaciones ",
		"img_main" => "/files/img/blog/reunion-comite-operaciones-portada.jpeg",
		"short_notice" => "La pasada semana tuvo lugar en el Hospital San Juan de Dios de Sevilla la reunión del Comité de Operaciones con el objetivo de promover y planear la coordinación entre los diferentes niveles dentro de la organización del hospital.",
		"content" => "<p class='p20 third-font-gray mt-4'>La pasada semana tuvo lugar en el Hospital San Juan de Dios de Sevilla la reunión del Comité de Operaciones con el objetivo de promover y planear la coordinación entre los diferentes niveles dentro de la organización del hospital.</p>
						<p class='p15 third-font-gray mt-4'>El compromiso del Hospital San Juan de Dios de Sevilla con la atención médica de alta calidad es evidente como se ha demostrado en la última reunión del Comité de Operaciones. El objetivo principal de la reunión fue promover, planear y mantener la coordinación y operación conjunta entre los diferentes niveles dentro de la organización del hospital. Esta iniciativa es un paso importante en la mejora continua del hospital y su capacidad para brindar servicios de calidad a sus pacientes y sus familias.</p>
						<p class='p15 third-font-gray mt-4'>La reunión del comité es una muestra clara del compromiso de nuestro hospital con la coordinación y la colaboración dentro de nuestra organización. La coordinación entre diferentes áreas y niveles de la organización es crucial para garantizar que se brinde la atención médica de la más alta calidad posible. El Comité de Operaciones del Hospital San Juan de Dios de Sevilla ha establecido un esfuerzo concertado para garantizar la colaboración y coordinación entre los diferentes departamentos del hospital, lo que es esencial para su éxito en el cuidado de sus pacientes.</p>
						<p class='p15 third-font-gray mt-4'>La reunión también sirvió como una oportunidad para que los miembros de nuestro Comité, compartieran ideas y discutieran formas de mejorar aún más la eficiencia y la efectividad del hospital. Al trabajar juntos, los miembros del comité pudieron identificar áreas de mejora en el hospital y discutir estrategias para abordarlas. Estas discusiones son un paso importante en la búsqueda de la excelencia médica y su capacidad para brindar atención de calidad, siempre guiado por los valores que representan nuestra Orden: Espiritualidad, Calidad, Respeto, Responsabilidad y Hospitalidad.</p>
						<p class='p15 third-font-gray mt-4'>Es alentador ver que se están tomando medidas concretas para garantizar que el Hospital San Juan de Dios de Sevilla siga siendo líder en la atención médica en la ciudad. El compromiso del hospital con la mejora continua y la colaboración dentro de su organización demuestra su dedicación a brindar la mejor atención médica posible a sus pacientes.</p>
						<div class='row'>
						<div class='col-12 col-md-6'>
							<img src='/files/img/blog/reunion-comite-operaciones-2.jpeg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						<div class='col-12 col-md-6 mt-3 mt-md-0'>
							<img src='/files/img/blog/reunion-comite-operaciones-3.jpeg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						</div>
						<p class='p15 third-font-gray mt-4'>Agradecemos a todos los miembros del Comité de Operaciones por su trabajo y dedicación en la mejora de la atención médica en el Hospital San Juan de Dios de Sevilla. Sus esfuerzos son esenciales para garantizar que el hospital siga siendo un líder en la atención médica en la ciudad y que continúe brindando servicios de calidad a sus pacientes y sus familias.</p>
						<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla nos enorgullecemos de ofrecer servicios médicos de alta calidad a sus pacientes y sus familias. La coordinación y la colaboración dentro de nuestra organización son fundamentales para el éxito del hospital en la atención médica. La reunión del Comité de Operaciones es un paso importante en la mejora continua de nuestro hospital y su capacidad para brindar atención médica de calidad a sus pacientes. Desde el Hospital San Juan de Dios de Sevilla seguiremos comprometidos con la mejora continua y la excelencia en la atención médica, y continuaremos con este tipo de iniciativas como esta en el futuro.</p>
						<div class='row'>
						<div class='col-12 col-md-6'>
							<img src='/files/img/blog/reunion-comite-operaciones-4.jpeg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						<div class='col-12 col-md-6 mt-3 mt-md-0'>
							<img src='/files/img/blog/reunion-comite-operaciones-5.jpeg' alt='image' class='blog-img height-100 mt-3'>
						</div>
						</div>
						", 
		"feature" => false,
		"page_title" => "Reunión del Comité de Operaciones",
		"page_description" => "El Comité de Operaciones se reúne para promover la coordinación y operación conjunta, y mejorar la eficiencia y efectividad de la atención."
	],
	"experiencia-cait-sjd" => (object) [
		"fecha" => "Miércoles, 03 de mayo de 2023",
		"title_noticia" => "Experiencia del CAIT del Hospital San Juan de Dios de Sevilla en la obtención del certificado ACSA",
		"img_main" => "/files/img/blog/experiencia-cait-sjd.jpeg",
		"short_notice" => "La responsable de nuestro centro de atención infantil temprana, Rocío Carrasco, comparte la experiencia de su equipo con el proceso de transformación que el CAIT vivió a través de la certificación ACSA",
		"content" => "<p class='p20 third-font-gray mt-4'>La responsable de nuestro centro de atención infantil temprana, Rocío Carrasco, comparte la experiencia de su equipo con el proceso de transformación que el CAIT vivió a través de la certificación ACSA</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla acaba de celebrar su noveno aniversario del Centro de Atención Infantil Temprana. En esta ocasión, se han marcado como objetivo mejorar la calidad de su trabajo, y para ello han decidido obtener la certificación ACSA.</p>
						<p class='p15 third-font-gray mt-4'>La coordinadora de la unidad, Rocío Carrasco Villalón, nos cuenta cómo ha sido este proceso de mejora continua y qué significado tiene para el equipo del hospital.</p>
						<p class='p15 third-font-gray mt-4'>Desde el principio, Rocío tuvo claro que la calidad debía trabajarse en equipo, por lo que lo primero que hizo fue informar a los compañeros de que iban a empezar a trabajar en ello y que quien quisiera, voluntariamente, podía unirse a las reuniones informativas.</p>
						<p class='p15 third-font-gray mt-4'>'El trabajo en equipo es algo que llevamos muy integrado en nuestra forma de dar respuesta a las necesidades de los menores con los que trabajamos, pero nunca dejará de sorprenderme hasta dónde llega el poder de un equipo', nos comenta Rocío.</p>
						<p class='p15 third-font-gray mt-4'>Y así, sin dudarlo, todos los compañeros del equipo quisieron ser partícipes de esta aventura. Con el objetivo de obtener la certificación ACSA, Rocío y su equipo empezaron por el proceso de autoevaluación, que les enfrentaba al miedo de no saber qué se esperaba de ellos.</p>
						<p class='p15 third-font-gray mt-4'>Pero la primera conclusión fue rápida: que siempre lo habían hecho así no significaba que fuera la mejor forma de hacerlo. La segunda conclusión fue aún más importante: en atención temprana están obligados a ser eficientes. 'Tenemos poco tiempo para reconducir las trayectorias del neurodesarrollo (0-6 años). Esto nos obliga a tener claro lo que tenemos que hacer en las posibles situaciones en las que nos encontramos cada día, y no siempre nos habíamos parado a pensar en ello', explica Rocío.</p>
						<p class='p15 third-font-gray mt-4'>A partir de aquí, el equipo se centró en analizar cada estándar, reflexionar sobre cómo lo hacían en San Juan de Dios y cómo podían demostrar que cumplían con lo que se pedía. 'Cada centro construye a su forma', comenta Rocío, y nosotros construimos un modelo propio, no impuesto'.</p>
						<p class='p15 third-font-gray mt-4'>El proceso de mejora continua no fue fácil, pero Rocío destaca el papel fundamental del equipo evaluador que les acompañó durante todo el proceso: 'Los evaluadores saben hacernos llegar al sitio que nos hemos marcado'.</p>
						<p class='p15 third-font-gray mt-4'>Después de seis meses de trabajo, protocolos y evidencias, llegó la visita de evaluación. 'La sensación durante la visita era de que ese examen interior ahora era corregido en público', comenta Rocío. Pero poco a poco, a medida que la visita avanzaba, el equipo se fue relajando y se dio cuenta de que solo tenían que mostrar lo que habían construido.</p>
						<p class='p15 third-font-gray mt-4'>La certificación ACSA no es la meta, sino una nueva forma de trabajar que implica medir y valorar el trabajo diario, detectar áreas de mejora, ahorrar tiempo de gestión y disminuir la variabilidad de las respuestas entre los distintos profesionales que trabajan codo con codo a diario.</p>
						<p class='p15 third-font-gray mt-4'>'Para mí, esto ha supuesto un proceso de crecimiento y fortalecimiento como profesional', concluye Rocío. 'La calidad es una nueva forma de trabajar y estamos orgullosos de haber obtenido la certificación ACSA. Pero lo más importante es seguir trabajando en equipo y mejorando día a día para ofrecer la mejor atención posible a los niños y sus familias.</p>
						<p class='p15 third-font-gray mt-4'>Rocío Carrasco Villalón ha destacado en varias ocasiones la importancia de trabajar en equipo en el proceso de obtención de la certificación ACSA. Según ella, esto ha sido fundamental para lograr los objetivos marcados y para llevar a cabo un proceso de mejora continua. El hecho de que todos los miembros del centro se hayan implicado y hayan colaborado ha permitido que el proceso haya sido más eficiente y efectivo.</p>
						<p class='p15 third-font-gray mt-4'>Además, Carrasco ha señalado que este proceso ha supuesto un crecimiento y fortalecimiento como profesional para ella y para todo el equipo de San Juan de Dios. La calidad no termina con una certificación, sino que es una nueva forma de trabajar, de medir y valorar el trabajo diario, y de seguir detectando áreas de mejora. Esto permite ahorrar tiempo de gestión, tener respuestas a preguntas recurrentes y disminuir la variabilidad de las respuestas entre los distintos profesionales que trabajan a diario.</p>
						<p class='p15 third-font-gray mt-4'>En definitiva, la obtención de la certificación ACSA supuso un gran logro para el Centro de Atención Infantil Temprana San Juan de Dios de Sevilla, siendo el primer centro CAIT en recibir la acreditación a nivel óptimo, y obtenida el 9 de noviembre de 2021, y estando vigente hasta el próximo abril de 2024. Este proceso ha permitido al centro mejorar la calidad de la atención que ofrece a los niños y sus familias, y ha supuesto un crecimiento y fortalecimiento como profesional para todo el equipo. Pero lo más importante es que este logro no supone el final del camino, sino el inicio de una nueva forma de trabajar en equipo y de seguir mejorando día a día para ofrecer la mejor atención posible a los más pequeños.</p>
						<p class='p15 third-font-gray mt-4'>Puedes leer el artículo completo desde el siguiente enlace <a href='https://bit.ly/3Lpr7kR' class='link-blog'>https://bit.ly/3Lpr7kR</a></p>
						<div class='d-flex justify-content-center'>
							<iframe width='560' height='315' src='https://www.youtube.com/embed/62yqiEhHLBc' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
						</div>
						", 
		"feature" => false,
		"page_title" => "CAIT y su experiencia en la certificación ACSA",
		"page_description" => "Rocío Carrasco, nos cuenta el proceso de transformación para la obtención del certificado de calidad por parte de la ACSA."
	],
	"importancia-vacunas-prevenir-enfermedades" => (object) [
		"fecha" => "Jueves, 27 de abril de 2023",
		"title_noticia" => "La importancia de las vacunas para prevenir enfermedades mortales",
		"img_main" => "/files/img/blog/dia-internacional-vacunacion-san-juan-dios.jpg",
		"short_notice" => "El compromiso del Hospital San Juan de Dios de Sevilla en la promoción y administración de vacunas para proteger la salud de la comunidad",
		"content" => "<p class='p20 third-font-gray mt-4'>El compromiso del Hospital San Juan de Dios de Sevilla en la promoción y administración de vacunas para proteger la salud de la comunidad</p>
						<p class='p15 third-font-gray mt-4'>La Semana Mundial de la Inmunización se celebra del 24 al 30 de abril de cada año y es una oportunidad para reflexionar sobre la importancia de las vacunas en nuestra salud y bienestar. En el Hospital San Juan de Dios de Sevilla, estamos comprometidos con la promoción y la administración de vacunas para prevenir enfermedades mortales.</p>
						<p class='p15 third-font-gray mt-4'>Las vacunas son una herramienta crucial para prevenir enfermedades infecciosas y han demostrado ser altamente efectivas en la prevención de enfermedades graves y potencialmente mortales. Al recibir una vacuna, nuestro cuerpo genera una respuesta inmunológica que nos protege contra la enfermedad en cuestión.</p>
						<p class='p15 third-font-gray mt-4'>Las vacunas no solo previenen enfermedades individuales, sino que también protegen a la comunidad en su conjunto. Cuando una alta proporción de la población está vacunada, la propagación de enfermedades se reduce significativamente. Este fenómeno se conoce como inmunidad colectiva o de rebaño y es fundamental para prevenir brotes de enfermedades infecciosas.</p>
						<p class='p15 third-font-gray mt-4'>A pesar de los numerosos beneficios de las vacunas, todavía existen algunas personas que se muestran reacias a recibir vacunas. Esto puede deberse a una variedad de razones, como la falta de información, los mitos y la desinformación, o la desconfianza en los sistemas de salud.</p>
						<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, trabajamos para educar a nuestra comunidad sobre la importancia de las vacunas y para abordar cualquier preocupación o duda que puedan tener. Contamos con un equipo de profesionales altamente capacitados que pueden proporcionar información precisa y clara sobre las vacunas y ayudar a nuestros pacientes a tomar decisiones informadas sobre su salud.</p>
						<p class='p15 third-font-gray mt-4'>Además, ofrecemos una amplia gama de vacunas para personas de todas las edades, desde bebés hasta adultos mayores. Entre las vacunas que ofrecemos se encuentran la vacuna contra la gripe, la vacuna contra el virus del papiloma humano (VPH) y la vacuna contra la neumonía, entre muchas otras.</p>
						<p class='p15 third-font-gray mt-4'>También es importante destacar que las vacunas son seguras y están rigurosamente probadas antes de ser aprobadas para su uso en la población. Los beneficios de la vacunación superan con creces cualquier riesgo potencial, y la mayoría de los efectos secundarios de las vacunas son leves y temporales.</p>
						<p class='p15 third-font-gray mt-4'>La Semana Mundial de la Inmunización es un recordatorio importante de la importancia de las vacunas en nuestra salud y bienestar. En el Hospital San Juan de Dios de Sevilla, nos comprometemos a promover y administrar vacunas para prevenir enfermedades graves y proteger a nuestra comunidad. Si tiene alguna pregunta o inquietud sobre las vacunas, no dude en contactar o solicitar cita con nuestro equipo de profesionales de la salud.</p>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita previa en el Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> para cualquier duda o consulta relacionada con las vacunas o para cualquier dolencia relacionada con la espalda, así como para cualquier consulta médica que necesites. Disponemos de multitud de <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> y trabajamos con tiempos reducidos, así como con las <a href='https://sjdsevilla.com/companias' class='link-blog'>principales aseguradoras.</a> </p>", 
		"feature" => false,
		"page_title" => "Vacunas para prevenir las enfermedades mortales",
		"page_description" => "Celebramos la Semana Mundial de la Inmunización, reconociendo la importancia de las vacunas en la prevención."
	],
	"higiene-postural" => (object) [
		"fecha" => "Martes, 25 de abril de 2023",
		"title_noticia" => "La higiene postural: cómo evitar dolores de espalda",
		"img_main" => "/files/img/blog/higiene-postural-san-juan-de-dios.jpg",
		"short_notice" => "Descubre cómo mantener una buena higiene postural en el trabajo y en casa para evitar dolores y lesiones a largo plazo",
		"content" => "<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Descubre cómo mantener una buena higiene postural en el trabajo y en casa para evitar dolores y lesiones a largo plazo</span></h2>
						<p class='p20 third-font-gray mt-4'>La higiene postural es una práctica fundamental para cuidar nuestra salud. La adopción de malos hábitos posturales, como permanecer durante periodos prolongados en la misma posición, movimientos repetitivos o posturas forzadas, pueden ocasionar dolores de espalda que pueden evitarse con una correcta postura.</p>
						<p class='p15 third-font-gray mt-4'>La higiene postural es un conjunto de normas, consejos y actitudes posturales encaminadas a mantener una alineación adecuada de todo el cuerpo para evitar posibles lesiones. Su objetivo es aprender una serie de normas y hábitos para ayudar a proteger la espalda al realizar actividades de la vida cotidiana. Una correcta postura de pie, sentado o acostado es aquella que permite la realización de estas actividades con la mayor eficacia.</p>
						<p class='p15 third-font-gray mt-4'>A continuación, se presentan algunas recomendaciones básicas por parte de nuestros profesionales para aprender a realizar las actividades cotidianas de forma adecuada y facilitar la adquisición de hábitos saludables, lo que permitirá prevenir lesiones en la espalda:</p>
						<ul class='third-font-gray mt-3 p15'>
							<li class='mt-2'>No permanecer en la misma postura durante periodos prolongados: es importante alternar actividades que requieran estar de pie con otras que impliquen estar sentado o en movimiento.</li>
							<li class='mt-2'>Descansar: intercalar periodos breves de descanso entre las diferentes actividades para recuperar energía y relajar los músculos.</li>
							<li class='mt-2'>Modificar el entorno: si fuera necesario, modificar adecuadamente el entorno (mobiliario, altura de los objetos, iluminación…) buscando la situación más cómoda y segura para la espalda.</li>
							<li class='mt-2'>Planificar los movimientos: planificar con antelación los movimientos o gestos a realizar, evitando las prisas que pueden llevar mayores riesgos.</li>
							<li class='mt-2'>Estar acostado: es mejor situarse boca arriba. Si no puede estar en esa posición, intentarlo ligeramente de costado.</li>
							<li class='mt-2'>Estar sentado: es importante apoyar completamente los pies en el suelo y mantener las rodillas al mismo nivel de las caderas. La silla, con una suave prominencia en el respaldo, debe sujetar la espalda en la misma postura en la que la columna está al estar de pie. Es fundamental girar todo el cuerpo a la vez. La pantalla del ordenador debe poderse orientar e inclinar. Debe situarse a unos 45 cm de distancia frente a los ojos y a su altura o ligeramente por debajo. Las muñecas y los antebrazos deben estar rectos y alineados con el teclado, con el codo flexionado a 90º.</li>
							<li class='mt-2'>Conducir un vehículo: adelantar el asiento del coche para alcanzar los pedales sin tener que estirar las piernas y apoyar la espalda en el respaldo.</li>
							<li class='mt-2'>Transportar pesos: agáchese flexionando las rodillas, con la espalda recta y la cabeza levantada, apoyando los dos pies en el suelo, ligeramente separados y lo más cerca posible del peso a cargar. Levantar los pesos tan solo hasta la altura del pecho con los codos flexionados para asegurar que la carga está lo más pegada al cuerpo.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>En resumen, la higiene postural es fundamental para prevenir lesiones y dolores de espalda. Adoptar hábitos saludables en la postura y en las actividades cotidianas puede marcar una gran diferencia en la salud de nuestra espalda a largo plazo. Las recomendaciones mencionadas anteriormente son solo algunas de las muchas que se pueden seguir para mantener una buena higiene postural, pero es importante tener en cuenta que cada persona tiene necesidades diferentes y, por lo tanto, es recomendable buscar asesoramiento médico o de un fisioterapeuta si se experimentan dolores de espalda o se desea prevenir futuras lesiones.</p>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita previa en el Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita'><span class='link-blog'>https://sjdsevilla.com/pedir-cita</span></a> para cualquier duda o consulta relacionada con higiene postural o para cualquier dolencia relacionada con la espalda, así como para cualquier consulta médica que necesites. Disponemos de multitud de <a href='https://sjdsevilla.com/servicios'><span class='link-blog'>especialidades médicas</span></a> y trabajamos con tiempos reducidos, así como con las <a href='https://sjdsevilla.com/companias'><span class='link-blog'>principales aseguradoras.</span></a></p>", 
		"feature" => false,
		"page_title" => "La higiene postural: cómo evitar dolores de espalda",
		"page_description" => "Destacamos la importancia de la higiene postural para prevenir dolores de espalda y lesiones."
	],
	"etica-bioetica-humanizacion" => (object) [
		"fecha" => "Lunes, 24 de abril de 2023",
		"title_noticia" => "Ética, bioética y humanización de la asistencia",
		"img_main" => "/files/img/blog/etica-bioetica-san-juan-dios-sevilla.jpg",
		"short_notice" => "Compromiso con la ética y la bioética en la atención sanitaria en el Hospital San Juan de Dios de Sevilla",
		"content" => "<p class='p20 third-font-gray mt-4'>Compromiso con la ética y la bioética en la atención sanitaria en el Hospital San Juan de Dios de Sevilla</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla se distingue por su compromiso con la ética y la bioética en la atención sanitaria. Su equipo local de bioética tiene como objetivo asesorar, sensibilizar, formar, difundir e investigar sobre los asuntos relacionados con la ética, la bioética y la humanización de la asistencia.</p>
						<p class='p15 third-font-gray mt-4'>El área de ética y bioética se encarga de reflexionar sobre las aplicaciones prácticas de la atención sanitaria diaria, donde los principios y valores humanos pueden verse comprometidos. El equipo trabaja con la voluntad de generar sensibilización hacia estos aspectos en los equipos asistenciales y en la sociedad en general.</p>
						<p class='p15 third-font-gray mt-4'>Entre los servicios que ofrece el área de ética y bioética se encuentra el asesoramiento desde una perspectiva que pretende orientar al profesional sobre los aspectos éticos que intervienen en la toma de decisiones asistenciales. Además, colabora con el Área de Humanización del centro, procurando trasladar un mensaje único e integral.</p>
						<p class='p15 third-font-gray mt-4'>Los profesionales del centro tienen la posibilidad de consultar sobre los aspectos éticos de la asistencia. La finalidad de la consulta es recibir asesoramiento sobre algún aspecto de la asistencia que a juicio del profesional requiera una deliberación bioética.</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla se preocupa por formar a sus equipos asistenciales en cuestiones éticas y de humanización de la asistencia, para garantizar una atención integral a sus pacientes. Además, colabora activamente en la investigación y difusión de estos valores en la sociedad. La ética y la bioética son valores fundamentales para el centro, que se reflejan en su compromiso con la atención sanitaria de calidad y el cuidado integral de las personas. </p>
						<p class='p15 third-font-gray mt-4'>El equipo de Ética y Bioética del Hospital San Juan de Dios de Sevilla está formado por los siguientes miembros: Sonia Moreno Guinea, Amparo Fernández Parladé, Miguel Sánchez-Dalp Jiménez, Cristina Lucenilla Hidalgo, Beatriz Jiménez Domínguez (Secretaria) y Mª Isabel Herrero Panadero (Coordinadora). </p>
						<p class='p15 third-font-gray mt-4'>Puedes contactar con nuestro equipo de bioética para cualquier duda o consulta en el teléfono <a href='tel:+34954939300' class='link-blog'>954 939 300.</a></p>", 
		"feature" => false,
		"page_title" => "Ética, bioética y humanización de la asistencia",
		"page_description" => "El Hospital San Juan de Dios de Sevilla se destaca por su compromiso con la ética y la bioética en la atención sanitaria."
	],
	"servicio-atencion-espiral-religiosa" => (object) [
		"fecha" => "Viernes, 21 de abril de 2023",
		"title_noticia" => "Servicio de Atención Espiritual y Religiosa",
		"img_main" => "/files/img/blog/servicio-atencion-espiritual-sjd-sevilla.jpg",
		"short_notice" => "El SAER del Hospital San Juan de Dios de Sevilla: Atención espiritual y religiosa para la atención integral del paciente",
		"content" => "<p class='p20 third-font-gray mt-4'>El SAER del Hospital San Juan de Dios de Sevilla: Atención espiritual y religiosa para la atención integral del paciente.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla cuenta con un Servicio de Atención Espiritual y Religiosa (SAER) que busca atender la dimensión espiritual y religiosa de las personas atendidas, sus familias y colaboradores, en línea con la misión de la Orden Hospitalaria de San Juan de Dios. Este servicio, en coordinación con el resto de servicios del hospital, colabora con su presencia, su testimonio y sus acciones, en la asistencia y el tratamiento, la curación y el cuidado de los pacientes.</p>
		<p class='p15 third-font-gray mt-4'>El objetivo principal del SAER es atender la dimensión espiritual y religiosa de las personas asistidas, siguiendo y recreando los gestos y actitudes evangélicos, según el modelo de la Orden Hospitalaria de San Juan de Dios. Este modelo de atención espiritual y religiosa es definido por la Orden Hospitalaria, y se adapta de forma flexible y personalizada a cada caso particular.</p>
		<p class='p15 third-font-gray mt-4'>El modelo propio de atención del SAER garantiza la calidad de la atención y el cuidado de la dimensión espiritual y religiosa, basándose en la gestión por procesos. Este enfoque implica el establecimiento de indicadores y la recopilación de datos de las diferentes intervenciones realizadas, con el fin de realizar un seguimiento e identificar el alcance del proceso terapéutico. De esta manera, se logra un objetivo de mejora y excelencia continuos en la atención espiritual y religiosa del paciente.</p>
		<p class='p15 third-font-gray mt-4'>Es importante destacar que la dimensión espiritual es constitutiva del ser humano y, por tanto, debe ser considerada en la atención integral de la persona. En este sentido, los SAER del Hospital San Juan de Dios de Sevilla tienen en cuenta la diversidad de culturas y experiencias espirituales y religiosas de los pacientes, ofreciendo un servicio adaptado a sus necesidades.</p>
		<p class='p15 third-font-gray mt-4'>Qué ofrecemos:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Detección y abordaje de las Necesidades Espirituales y Religiosas.</li>
		<li class='mt-2'>Acompañamiento espiritual y/o religioso individual, mediante la visita diaria a su habitación.</li>
		<li class='mt-2'>Atención particular a los familiares que deseen dialogar con nosotros.</li>
		<li class='mt-2'>Atención al final de la vida y al duelo.</li>
		<li class='mt-2'>Asesoramiento en cuestiones religiosas y éticas.</li>
		<li class='mt-2'>Celebración de los Sacramentos: Reconciliación, comunión diaria en la habitación, Unción de los enfermos, celebración de la Eucaristía los domingos.</li>
		<li class='mt-2'>Se facilita asistencia religiosa a las personas de otros credos, contactando con sus pastores o ministros siempre que lo soliciten.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>El SAER del Hospital San Juan de Dios de Sevilla está compuesto por Sonia Moreno Guinea, profesional SAER, especializada en atención espiritual y religiosa. Si necesitas contactar con el SAER, puedes hacerlo en el teléfono 954 939 300 o directamente en el Hospital San Juan de Dios de Sevilla, contactando con cualquier miembro del SAER.</p>
		<p class='p15 third-font-gray mt-4'>En conclusión, el Servicio de Atención Espiritual y Religiosa del Hospital San Juan de Dios de Sevilla es un servicio esencial para la atención integral del paciente. Su modelo propio de atención garantiza la calidad y personalización en la atención espiritual y religiosa, adaptándose a las necesidades y diversidad cultural de cada paciente. La dimensión espiritual y religiosa es un aspecto fundamental en la atención sanitaria, y el SAER del Hospital San Juan de Dios de Sevilla lo tiene en cuenta en su misión de cuidar al paciente de manera integral.</p>
		",
		"feature" => false,
		"page_title" => "Servicio de Atención Espiritual y Religiosa",
		"page_description" => "Atención de la dimensión espiritual y religiosa de las personas atendidas, sus familias y colaboradores."
	],
	"atencion-social-salud" => (object) [
		"fecha" => "Jueves, 20 de abril de 2023",
		"title_noticia" => "Orden Hospitalaria de San Juan de Dios: atención social y salud a los más vulnerables en todo el mundo.",
		"img_main" => "/files/img/blog/mapa_mundo.jpg",
		"short_notice" => "Nuestra institución internacional sin ánimo de lucro, cuenta con una red de 405 centros en 52 países, más de 65.000 profesionales y 25.300 voluntarios.",
		"content" => "<p class='p20 third-font-gray mt-4'>Nuestra institución internacional sin ánimo de lucro, cuenta con una red de 405 centros en 52 países, más de 65.000 profesionales y 25.300 voluntarios.</p>
		<p class='p15 third-font-gray mt-4'>La Orden Hospitalaria de San Juan de Dios es una de las organizaciones internacionales sin ánimo de lucro más importantes del mundo, cuya finalidad es atender a las personas más vulnerables mediante la puesta en marcha y desarrollo de programas de acción social y salud. La historia de esta institución se remonta al siglo XVI, con la figura de Juan Ciudad, un hombre que revolucionó el mundo de los cuidados sanitarios y que impulsó la dignificación de los colectivos más desfavorecidos de su época gracias a su manera de tratar y atender a las personas con escasos recursos.</p>
		<p class='p15 third-font-gray mt-4'>La Orden Hospitalaria de San Juan de Dios cuenta a día de hoy con una red de 405 centros en 52 países de todo el mundo, en los que trabajan más de 65.000 profesionales y prestan más de 35 millones de atenciones cada año. Además, cuenta con 1.020 Hermanos y más de 25.300 voluntarios/as. En España, la Orden cuenta con la presencia de 180 Hermanos y 80 centros sanitarios, sociosanitarios, sociales, docentes y de investigación.</p>
		<p class='p15 third-font-gray mt-4'>La Hospitalidad es el valor central de la Institución, que se sustenta en otros cuatro valores que vertebran todas las acciones que lleva a cabo la Orden: Calidad, Respeto, Responsabilidad y Espiritualidad. Estos valores se aplican en todos los dispositivos que conforman la red de la Orden, entre los que se incluyen hospitales, centros de salud mental, centros para personas con discapacidad, para personas mayores y para personas en situación de vulnerabilidad y exclusión social.</p>
		<p class='p15 third-font-gray mt-4'>En España, la Orden Hospitalaria de San Juan de Dios atiende cada año a más de 1.500.000 personas con un modelo de atención adaptado a los retos de la sociedad actual y a las nuevas realidades. Su objetivo es promocionar y mejorar la salud de las personas y su calidad de vida, sin distinción por cuestión de género, creencias u origen, para crear una sociedad más justa y solidaria.</p>
		<p class='p15 third-font-gray mt-4'>En el siguiente mapa puedes comprobar todos nuestros centros en España:</p>
		<div class='col-12'>
			<img src='/files/img/blog/mapa_espana.jpg' alt='image' class='mx-auto d-block'>
		</div>
		<p class='p15 third-font-gray mt-4'>La labor de la Orden Hospitalaria de San Juan de Dios es fundamental en una sociedad cada vez más desigual, donde las personas más vulnerables necesitan de una atención sanitaria y social de calidad. Gracias a su presencia en numerosos países, la Orden puede adaptar sus servicios a las necesidades de cada lugar y contribuir así al desarrollo y la mejora de la salud y la calidad de vida de las personas más necesitadas.</p>
		<p class='p15 third-font-gray mt-4'>Además de su labor asistencial, la Orden Hospitalaria de San Juan de Dios también desarrolla proyectos de investigación y docencia en el ámbito de la salud y la acción social. De esta forma, se garantiza la formación de nuevos profesionales y se contribuye al avance de la ciencia en la atención a las personas más vulnerables.</p>
		<p class='p15 third-font-gray mt-4'>La Orden Hospitalaria de San Juan de Dios es una institución de referencia en el ámbito de la salud y la acción social a nivel mundial. Su compromiso con las personas más vulnerables y su labor asistencial, docente e investigadora son fundamentales para construir una sociedad más justa y solidaria, en la que todas las personas tengan acceso a una atención sanitaria y social de calidad.</p>
		",
		"feature" => false,
		"page_title" => "Atención Social desde la Orden",
		"page_description" => "La Orden Hospitalaria de San Juan de Dios es una institución que ofrece atención sanitaria y social a personas vulnerables en todo el mundo."
	],
	"cirugia-platica-reparadora-estetica" => (object) [
		"fecha" => "Miércoles, 19 de abril de 2023",
		"title_noticia" => "Incorporamos la especialidad en Cirugía Plástica, Reparadora y Estética",
		"img_main" => "/files/img/blog/nueva-unidad-cirugia-plastica-san-juan-dios-sevilla.jpg",
		"short_notice" => "Un equipo multidisciplinar liderado por el Dr. Alejandro Ruiz Moya, ofrece procedimientos quirúrgicos y no quirúrgicos de alta calidad para satisfacer las necesidades de los pacientes.",
		"content" => "<p class='p20 third-font-gray mt-4'>Un equipo multidisciplinar liderado por el Dr. Alejandro Ruiz Moya, ofrece procedimientos quirúrgicos y no quirúrgicos de alta calidad para satisfacer las necesidades de los pacientes.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla ha incluido recientemente la nueva especialidad médica de Cirugía Plástica, Reparadora y Estética en su oferta de servicios. La incorporación de esta especialidad responde a la creciente demanda de procedimientos quirúrgicos reconstructivos y estéticos en la región, y a la necesidad de contar con un equipo especializado en el tratamiento de afecciones y lesiones que afectan la función y apariencia del cuerpo humano.</p>
		<p class='p15 third-font-gray mt-4'>La cirugía plástica es una rama de la medicina que se ocupa de restaurar, reconstruir o mejorar la apariencia física de una persona. La especialidad se divide en dos ramas principales: la cirugía reparadora y la cirugía estética. La cirugía reparadora se centra en la corrección de defectos congénitos, deformidades adquiridas o secuelas de traumas o enfermedades. La cirugía estética, por otro lado, se enfoca en la mejora de la apariencia física mediante la modificación de características corporales que no afectan la función del organismo.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios, contamos con un equipo de profesionales altamente cualificados, liderados por el Dr. Alejandro Ruiz Moya, quien es un referente a nivel nacional en cirugía estética. El Dr. Ruiz Moya cuenta con una amplia formación y experiencia en clínicas de renombre internacional, como Nueva York, Madrid y Barcelona, y ha colaborado con otros profesionales de contrastada experiencia en el campo de la cirugía plástica.</p>
		<p class='p15 third-font-gray mt-4'>En nuestra unidad de cirugía plástica, reparadora y estética, ofrecemos una amplia gama de procedimientos quirúrgicos y no quirúrgicos para satisfacer las necesidades de nuestros pacientes. Entre nuestras principales consultas se encuentran la cirugía reparadora de mamas, la cirugía reparadora de defectos traumatológicos, la oncología mamaria, la oncología cutánea y la cirugía de contorno corporal.</p>
		<p class='p15 third-font-gray mt-4'>La cirugía reparadora de mamas se centra en la reconstrucción de los senos después de una mastectomía o de una lesión traumática. Este tipo de cirugía no solo restaura la forma y función de los senos, sino que también tiene un impacto positivo en la autoestima y calidad de vida de las pacientes. La cirugía reparadora de defectos traumatológicos, por su parte, se enfoca en la corrección de deformidades o lesiones adquiridas debido a accidentes o lesiones traumáticas.</p>
		<p class='p15 third-font-gray mt-4'>La oncología mamaria y cutánea son subespecialidades de la cirugía plástica que se centran en el tratamiento de cánceres de mama y piel, respectivamente. La cirugía plástica juega un papel fundamental en la reconstrucción de los senos después de una mastectomía, y en la eliminación y reconstrucción de la piel afectada por cánceres cutáneos.</p>
		<p class='p15 third-font-gray mt-4'>Por último, la cirugía de contorno corporal se enfoca en la remodelación del cuerpo para mejorar la apariencia física y la autoestima. Los procedimientos más comunes incluyen la liposucción, la abdominoplastia y la elevación de glúteos.</p>
		<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios, estamos comprometidos con el bienestar y la salud de nuestros pacientes, y ofrecemos los más altos estándares de calidad y seguridad en nuestros procedimientos quirúrgicos. Nuestra unidad de cirugía plástica, reparadora y estética cuenta con tecnología de vanguardia y con un equipo multidisciplinario de profesionales altamente capacitados en la atención y cuidado de los pacientes.</p>
		<p class='p15 third-font-gray mt-4'>Nos enorgullece ofrecer la figura del Dr. Alejandro Ruiz Moya, quien lidera nuestro equipo de cirugía plástica y es un referente en el campo de la cirugía estética a nivel nacional. Desde el Hospital San Juan de Dios de Sevilla, ofrecemos cualquier tipo de consulta en esta especialidad y estamos comprometidos con brindar una atención personalizada y un servicio de calidad a cada uno de nuestros pacientes.</p>
		<video controls class='' src='/files/video/cirugia_platica_reparadora_estetica.MP4' alt='Video cirugia plastica y reparadora' style='width: 100%;'></video>
		",
		"feature" => false,
		"page_title" => "Cirugía Plástica, Reparadora y Estética",
		"page_description" => "El Hospital San Juan de Dios de Sevilla se complace en anunciar la incorporación de la especialidad en Cirugía Plástica, Reparadora y Estética en su oferta de servicios médicos."
	],
	"tecnologia-profesionalismo" => (object) [
		"fecha" => "Lunes, 17 de abril de 2023",
		"title_noticia" => "Hospital San Juan de Dios Sevilla, tecnología y profesionalismo en atención sanitaria",
		"img_main" => "/files/img/blog/san-juan-dios-sevilla-nervion.jpg",
		"short_notice" => "Tu Hospital situado en el barrio de Nervión que trabaja con las principales compañías aseguradoras.",
		"content" => "<p class='p20 third-font-gray mt-4'>Tu Hospital situado en el barrio de Nervión que trabaja con las principales compañías aseguradoras.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla ha sido siempre un referente en la atención sanitaria de la ciudad y, con la reciente apertura de sus nuevas instalaciones en marzo de 2022, se ha reafirmado como uno de los mejores hospitales de la capital andaluza. Con seis plantas dotadas de la más alta tecnología, este centro hospitalario está equipado para ofrecer el mejor servicio sanitario a los pacientes y los tratamientos médicos más avanzados.</p>
		<p class='p15 third-font-gray mt-4'>En la planta cero del hospital se encuentran las zonas de información, admisión, radiología, urgencias, cafetería y el Centro de Atención Infantil Temprana. Si subimos a la primera planta están las consultas externas, salas de admisión y habitaciones de hospitalización, además de un espléndido salón de actos y la capilla. En el segundo nivel, las habitaciones de hospitalización y el laboratorio y, en la tercera, el área quirúrgica, URPA, UCI y endoscopia. Las plantas cuarta, quinta y sexta están dedicadas a habitaciones de hospitalización.</p>
		<p class='p15 third-font-gray mt-4'>Una de las áreas más destacadas de nuestro hospital es la quirúrgica, que cuenta con una tecnología de última generación y un equipo de profesionales altamente capacitados. En el área quirúrgica, el Hospital San Juan de Dios Sevilla cuenta con los mejores profesionales en distintas especialidades médicas, como cirugía ortopédica, traumatología, otorrinolaringología, cardiología, neurología, entre otras.</p>
		<p class='p15 third-font-gray mt-4'>Los quirófanos del Hospital San Juan de Dios de Sevilla, están equipados con la tecnología más avanzada, permitiendo a los cirujanos realizar procedimientos quirúrgicos precisos y seguros. Desde cirugías ortopédicas y traumatológicas hasta cirugías cardíacas y neurológicas, el equipo quirúrgico del Hospital San Juan de Dios Sevilla está preparado para realizar cualquier tipo de intervención con el más alto nivel de precisión y seguridad.</p>
		<p class='p15 third-font-gray mt-4'>Además, en el Hospital San Juan de Dios Sevilla contamos con un gran equipo de anestesiólogos altamente capacitados que se encargan de proporcionar anestesia general y sedación para los pacientes que necesitan intervenciones quirúrgicas o procedimientos médicos invasivos. Nuestros profesionales están altamente capacitados en el manejo de la tecnología más avanzada y están comprometidos con la seguridad y el bienestar de los pacientes.</p>
		<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios Sevilla también disponemos de un servicio de Urgencias 24 horas, con plazos reducidos de espera y disponible todos los días del año, para atender a los pacientes que necesiten atención médica urgente. Este servicio está gestionado por un equipo de médicos y enfermeras altamente capacitados en el manejo de situaciones de emergencia médica y cuenta con la tecnología más avanzada para proporcionar un diagnóstico y tratamiento rápidos y precisos.</p>
		<p class='p15 third-font-gray mt-4'>En resumen, el Hospital San Juan de Dios Sevilla es un centro sanitario integral, equipado con la tecnología más avanzada y con un equipo de profesionales altamente capacitados en distintas especialidades médicas. Desde cirugías complejas hasta atención médica de urgencia, nuestro hospital está capacitado para cubrir las diferentes necesidades de cada paciente. Si necesita atención médica de calidad y avanzada, no dude en visitar el Hospital San Juan de Dios Sevilla.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa en cualquiera de nuestras especialidades médicas desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> desde el teléfono 955 045 999, a través de Whatsapp en el nº <a class='link-blog' href='https://api.whatsapp.com/send?phone=34607919025' target='_blank'>607 919 025</a> o en la APP SJD Salud. En el Hospital San Juan de Dios de Sevilla trabajamos con las principales aseguradoras y contamos con plazos reducidos para tus consultas. </p>
		",
		"feature" => false,
		"page_title" => "Tecnología y profesionalismo en atención sanitaria.",
		"page_description" => "Conoce el Hospital San Juan de Dios de Sevilla y toda su evolución. Trabajamos con las principales aseguradoras."
	],
	"estadisticas-internacionales-actos-asistenciales" => (object) [
		"fecha" => "Miércoles, 12 de abril de 2023",
		"title_noticia" => "San Juan de Dios publica sus estadísticas internacionales",
		"img_main" => "/files/img/blog/orden-san-juan-dios-internacional.jpg",
		"short_notice" => "La Orden Hospitalaria hace público sus datos sociosanitarios a través de las estadísticas internacionales que cada año lanza su sede mundial",
		"content" => "<p class='p20 third-font-gray mt-4'>La Orden Hospitalaria hace público sus datos sociosanitarios a través de las estadísticas internacionales que cada año lanza su sede mundial</p>
		<p class='p15 third-font-gray mt-4'>La Orden Hospitalaria hace público sus datos sociosanitarios a través de las estadísticas internacionales que cada año lanza su sede mundial, en Roma, y en donde muestran en cifras la amplia y creciente actividad que lleva a cabo en materia de salud a través de los 412 centros y dispositivos repartidos por los cinco continentes.</p>
		<p class='p15 third-font-gray mt-4'>Desde esta institución sin ánimo de lucro apuestan por una atención internacional humanizada, individualizada y bajo el paradigma socioasistencial, teniendo en cuenta no solo la dimensión física de las personas, sino todo su contexto vital, para la prestación de una asistencia a medida que sitúa a la persona y su entorno en el centro.</p>
		<p class='p15 third-font-gray mt-4'>24.410.500 intervenciones sociosanitarias llevadas a cabo a través de los 412 centros de la Orden Hospitalaria de San Juan de Dios en el mundo. Estas son solo algunas cifras de los publicadas en las últimas estadísticas de la institución en su sede internacional, ubicada en Roma, y que arrojan sus datos asistenciales anuales sobre su actividad sociosanitaria en todo el mundo.</p>
		<p class='p15 third-font-gray mt-4'>El director General de la Orden Hospitalaria en España, Juan José Afonso ha subrayado que la publicación de estas estadísticas “supone un ejercicio de transparencia esencial en nuestra manera de hacer y entender la prestación de servicios sanitarios y sociales. Si bien es cierto que en esta institución nos dedicamos a las personas que hay tras esos números, nos parece importante hacer públicas estas cifras que muestran la dimensión y la diversidad de regiones y actividades en las que operamos. Atendemos salud mental en Piura (Perú) al mismo tiempo que intervenimos traumatológicamente muchas malformaciones físicas en Camerún o atendemos a refugiados internacionales en España. Y esa diversidad y riqueza asistencial puede observarse a golpe de vista en estos datos que acaban de publicarse”. Además, Afonso añade que los últimos datos de atención a la salud en todo el mundo por parte de los centros y dispositivos de San Juan de Dios “hablan de una institución que apuesta por la asistencia social y sanitaria como una manera de posicionarse en el mundo, de estar al lado de las personas vulnerables y que amplía sus prestaciones, sus instalaciones y su presencia internacional cada año para seguir atendiendo al mayor número de personas que nos sea posible”.</p>
		<p class='p15 third-font-gray mt-4'>El total de estos pacientes y usuarios han podido recibir atención en alguno de los ámbitos en los que opera la Orden, como son el hospitalario, la salud mental, la discapacidad, mayores o personas con escasos recursos. Para ello, según estos últimos datos, la Orden de San Juan de Dios tiene 39.048 camas disponibles en sus 382 centros sanitarios y sociosanitarios repartidos por todo el mundo. Además, cuenta con otros 30 centros, estos de carácter formativo y docente, como son centros universitarios de enfermería y fisioterapia o los centros de formación profesional en la rama de la salud y los cuidados, entre otros.</p>
		<p class='p15 third-font-gray mt-4'>Teniendo en cuenta el tipo de asistencia que San Juan de Dios presta en el ámbito exclusivamente sanitario, hablamos de la propia de la actividad hospitalaria de carácter general o especializada, actividad hospitalaria de media y larga estancia o cuidados paliativos. Además, se recogen también las asistencias ambulatorias y consultorios no hospitalarios, servicios de rehabilitación, farmacia y servicios para la convalecencia. Por último, estas asistencias son también las de servicios integrales en modalidad residencial o de día para personas con problemas de salud mental, discapacidad, mayores o con otras necesidades.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Asistencia humanizada, individualizada y bajo el paradigma socioasistencial</strong></b></p>
		<p class='p15 third-font-gray mt-4'>La Orden de San Juan de Dios entiende la atención a la salud como un paradigma integrador en el que no solo se puede ni se debe atender a lo puramente físico, sino a la persona en su contexto. Por ello, desde hace años la institución está trabajando distintos modelos de asistencia domiciliaria en el mundo, de manera que, atendiendo a las circunstancias de cada persona, los dispositivos prestan asistencia hospitalaria, rehabilitadora o atención a la salud mental en el domicilio de los pacientes. De esta modalidad asistencial se han beneficiado 23.806 personas, 4.662 personas más que el año anterior (19.144), tratándose de una atención que está creciendo paulatinamente en función de las necesidades y la evolución de la población.</p>
		<p class='p15 third-font-gray mt-4'>Y es en este paradigma socioasistencial dentro del que se sitúan también los distintos servicios que San Juan de Dios presta a usuarios con discapacidad, pacientes de salud mental o mayores, entre otros perfiles. Estos servicios que vienen a completar la atención sanitaria son actividades educativas básicas, como el cuidado de uno mismo; actividades de tipo formativo, como son las escuelas especiales o profesionales; servicios de asesoramiento; actividades ocupacionales o laborales; asistencia en centros de día o comedores. En total, son 1.987.678 los pacientes que han recibido este tipo de servicios en el mundo.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Más de 65.000 profesionales en todo el mundo</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Todo ello no sería posible sin la labor del equipo humano que trabaja en los 412 centros San Juan de Dios repartidos por todo el mundo y que, en suma, son 65.080 profesionales. De todos ellos, los que se dedican a los ámbitos sanitarios más específicos son 52.722, siendo el resto profesionales dedicados a procesos asistenciales sociosanitarios y docentes.</p>
		<p class='p15 third-font-gray mt-4'>En España, el total de personal sanitario y sociosanitario que presta atención en los 80 centros de San Juan de Dios repartidos por todo el territorio son 17.492 profesionales, lo que supone un 27% de la plantilla internacional de la Orden de San Juan de Dios. A este respecto, el director de San Juan de Dios en España subraya que “cuando hablamos de salud, tan importante es tener unas buenas instalaciones y una dotación tecnológica de vanguardia en nuestros centros como una plantilla de profesionales amplia y solvente, capaz de atender a pacientes y usuarios no solo con la más alta calidad, sino con la dignidad, el trato humanizado y la distinción hospitalaria con la que estos miles de profesionales asisten a las personas que confían su atención a San Juan de Dios”. 
		Desde el Hospital San Juan de Dios de Sevilla, trabajamos a diario para ofrecer la mejor atención sanitaria. Disponemos de la mayoría de especialidades médicas y trabajamos con las principales aseguradoras. Puedes solicitar tu cita desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> , desde el teléfono 955 045 999, a través de Whatsapp en el nº <a class='link-blog' href='https://api.whatsapp.com/send?phone=34607919025' target='_blank'>607 919 025</a> o en la APP SJD Salud.</p>
		",
		"feature" => false,
		"page_title" => "San Juan de Dios publica sus estadísticas internacionales",
		"page_description" => "Durante el año 2022, la Orden Hospitalaria de San Juan de Dios, ha llevado a cabo más de 24 millones de intervenciones sociosanitarias."
	],
	
	"hermandad-de-la-sed" => (object) [
		"fecha" => "Lunes, 10 de abril de 2023",
		"title_noticia" => "La Hermandad de La Sed, visita nuestro Hospital",
		"img_main" => "/files/img/blog/IMG_3808-min.jpg",
		"short_notice" => "Como cada Miércoles Santo, la Hermandad de La Sed, visita nuestro hospital. Un momento cargado de emociones que pudieron disfrutar centenares de personas.",
		"content" => "<p class='p20 third-font-gray mt-4'>Como cada Miércoles Santo, la Hermandad de La Sed, visita nuestro hospital. Un momento cargado de emociones que pudieron disfrutar centenares de personas.</p>
		<p class='p15 third-font-gray mt-4'>La Semana Santa en Sevilla es una de las celebraciones más importantes de España, y una de las hermandades más queridas por los sevillanos es la del Cristo de la Sed. Cada año, esta hermandad visita el Hospital San Juan de Dios de Sevilla para mostrar su apoyo a los pacientes que se encuentran en el centro.</p>
		<p class='p15 third-font-gray mt-4'>En este año, como en los anteriores, la Hermandad del Cristo de la Sed llegó al Hospital San Juan de Dios de Sevilla alrededor de la 1 de la tarde. Centenares de personas se concentraron en los alrededores del hospital para presenciar la llegada de la cofradía y acompañarlos en su recorrido.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
			<img src='/files/img/blog/IMG_3807-min.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		<div class='col-12 col-md-6 mt-3 mt-md-0'>
			<img src='/files/img/blog/IMG_3810-min.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>El Cristo de la Sed es uno de los pasos más venerados de la Semana Santa sevillana, y este año estuvo acompañado por la virgen de Consolación. Ambos pasos recorrieron el camino que les llevó hasta la fachada principal del hospital, donde fueron recibidos por hermanos y profesionales de la Orden, así como por usuarios que son tratados en el centro.</p>
		<p class='p15 third-font-gray mt-4'>La visita de la Hermandad del Cristo de la Sed al Hospital San Juan de Dios de Sevilla es una muestra del compromiso de las hermandades sevillanas con la sociedad y con los más necesitados. Durante la Semana Santa, estas cofradías muestran su devoción en las calles de la ciudad, pero también realizan actos solidarios como este, que demuestran que su labor va más allá de la religiosidad y se extiende a la ayuda a los demás.</p>
		<p class='p15 third-font-gray mt-4'>La Semana Santa sevillana es conocida en todo el mundo por su belleza y su espectacularidad, pero también por la devoción y el fervor que despierta en los sevillanos. Las hermandades son el alma de la celebración, y su presencia en el Hospital San Juan de Dios es una muestra más de su compromiso con la ciudad y con sus habitantes.</p>
		<p class='p15 third-font-gray mt-4'>La visita de la Hermandad del Cristo de la Sed al Hospital San Juan de Dios de Sevilla es un acto cargado de simbolismo y significado. Es un momento en el que la religiosidad se une a la solidaridad, y en el que la hermandad muestra su lado más humano y comprometido. Un gesto que demuestra que la Semana Santa sevillana es mucho más que una celebración religiosa, y que las hermandades son mucho más que cofradías que desfilan por las calles de la ciudad.</p>
		<div class='row'>
		<div class='col-12'>
			<img src='/files/img/blog/IMG_3809-min.jpg' alt='image' class='mx-auto d-block'>
		</div>
		</div>
		",
		"feature" => false,
		"page_title" => "La Hermandad de La Sed, visita nuestro Hospital",
		"page_description" => "La Hermandad de La Sed visita, como es tradición, el Hospital San Juan de Dios de Sevilla en Semana Santa."
	],

	"pascual-jesus-etayo" => (object) [
		"fecha" => "Martes, 04 de abril de 2023",
		"title_noticia" => "Mensaje de Jesús Etayo con motivo de la Pascua 2023",
		"img_main" => "/files/img/blog/jesus-etayo-san-juan-dios-pascua.jpg",
		"short_notice" => "El Hno. Jesús Etayo, Superior General de la Orden Hospitalaria, nos dirige un mensaje a la Familia de San Juan de Dios de España con motivo de la Pascua 2023",
		"content" => "<p class='p20 third-font-gray mt-4'>El Hno. Jesús Etayo, Superior General de la Orden Hospitalaria, nos dirige un mensaje a la Familia de San Juan de Dios de España con motivo de la Pascua 2023</p>
		<p class='p15 third-font-gray mt-4'>A todos los Hermanos y Colaboradores, miembros de la Familia Hospitalaria de San Juan de Dios</p>
		<p class='p15 third-font-gray mt-4'>Deseo enviar a toda la Familia de San Juan de Dios y a todas las personas asistidas en los Centros y Servicios de la Orden, así como a sus familias, mi felicitación pascual, con el deseo de que el Señor Resucitado llene de luz y de vida nuestro mundo.</p>
		<p class='p15 third-font-gray mt-4'>En los tiempos que vivimos, Luz y Resurrección son dos términos que nos abren a la Esperanza. Somos invadidos por las noticias que nos refieren sufrimiento, muerte, falta de respeto a la dignidad de las personas, violencia, guerra y otras muchas experiencias de oscuridad. Fue también lo que vivió Jesús de Nazareth. Los inicios de su vida pública fueron de mucha esperanza y fue muy bien acogido por el pueblo que le escuchaba y veía, porque hablaba con autoridad, de forma convincente, porque los gestos, las actitudes, sus comportamientos y sus hechos eran coherentes con sus palabras que hablaban de amor, de misericordia, de paz, de libertad, de salud y de salvación. Poco a poco fueron apareciendo las críticas de aquellos a quienes ponía en evidencia por su hipocresía y porque vieron peligrar su posición de poder, tanto religioso como económico y político. En definitiva, molestaba y aquella luz que llenaba de esperanza al pueblo había que apagarla, para que no molestase, y siguiese dominando el sistema de siempre, el statu quo, lleno de corrupción y oscuridad, que favorece a los de siempre, ricos y poderosos. Aparentemente lo consiguieron, porque Jesucristo acabó en la cruz.</p>
		<p class='p15 third-font-gray mt-4'>Sin embargo, aquella cruz tenía y tiene el límite de la Resurrección. La luz que representó Jesús en sus inicios tuvo y tiene su continuidad en la Resurrección, porque la muerte en cruz, no fue la última palabra del Padre que, aunque en muchos momentos lo pareció, nunca abandonó a su Hijo, resucitándolo y dándole vida para siempre. “Es verdad. Está Vivo. Ha resucitado”. No fue fácil para los discípulos de Emaús entenderlo y darse cuenta de que el Resucitado estaba con ellos, hasta que “se les abrieron los ojos” y a partir de ahí vieron la luz, su vida cambió y salieron corriendo a contarlo a los demás.</p>
		<p class='p15 third-font-gray mt-4'>Por fortuna existen también muchas luces en nuestro mundo. Muchas personas e instituciones de todas las religiones, ideas, razas, etnias y países encienden cada día multitud de luces que expresan la vida, el bien, el amor y la lucha por la paz y la libertad. Sin embargo, también es cierto, que siguen existiendo muchas cruces, en las que muchas personas sufren y mueren constantemente, víctimas del odio y del egoísmo, de luchas sangrantes entre hermanos. No podemos olvidar que cada día es viernes santo en muchos lugares de la tierra, que pretende apagar la luz que todos los días sale y se construye en el mundo. Pero como con Jesucristo, hemos de proclamar que esas cruces tienen su límite y no serán nunca más la última palabra, porque nuestro Padre Dios ha decidido que el destino final sea la Vida para todos y para siempre. El sufrió esa experiencia en Su Hijo y la sigue sufriendo en sus hijos que constantemente suben a la cruz, por eso ha decidido ponerle límite, resucitando a su Hijo y a todos sus hijos para que vivan para siempre. Ese límite tendrá también su final cuando Dios enjugue las lágrimas de nuestros ojos y no haya más muerte, ni luto, ni llanto ni pena, porque todo ello haya desaparecido. (cf. Apocalipsis 21,4) </p>
		<p class='p15 third-font-gray mt-4'>Las experiencias de luz en nuestro mundo son expresiones y presagios de la Resurrección, del triunfo de la vida sobre la cruz, la oscuridad y la muerte. Estas luces son las que nos llenan de esperanza en nuestro mundo y nos impulsan a seguir comprometiéndonos con el proyecto que Jesús de Nazareth nos propone. En nuestra Institución, existen muchas luces encendidas en cada momento, cada minuto, a través de gestos de amor, de compasión y de hospitalidad, que son rayos de luz que dejan traslucir en el mundo la Resurrección, que indican que Cristo sigue Vivo y de que hay Esperanza para el mundo. </p>
		<p class='p15 third-font-gray mt-4'>Estas luces son más poderosas que las cruces. En la noche de Pascua os invito a abrir los ojos y a ver en un mapa figurativo del mundo, las muchas luces que se ven en medio de la oscuridad: en la ayuda y atención amorosa a familias enteras que huyen de la guerra o de otras dificultades, a personas excluidas que no tienen casa ni medios para comer, a niños y adultos que están al final de la vida, a personas ancianas, con problemas de salud mental o con cualquier tipo de discapacidad… a lo largo de los cinco continentes donde está presente nuestra Familia Hospitalaria de San Juan de Dios. </p>
		<p class='p15 third-font-gray mt-4'>No vivamos más en la oscuridad ni en el pesimismo. ¡Abramos los ojos!, para que podamos ver la luz que también está presente entre nosotros y que cada día hace memoria de la Resurrección de Cristo. Abramos los ojos para descubrirlo vivo como sucedió a los discípulos de Emaús y corramos para decirlo y proclamarlo a los cuatro vientos: que la fuerza de la luz que descubrimos y de la Resurrección que celebramos en esta Pascua, son el horizonte y el destino para los hombres y mujeres de buena voluntad en nuestro mundo. </p>
		<p class='p15 third-font-gray mt-4'>En nombre del Gobierno General y de toda la Familia Hospitalaria de San Juan de Dios de la Curia General, ¡FELIZ PASCUA DE RESURRECCIÓN! </p>
		<div class='row'>
		<div class='col-12'>
			<img src='/files/img/blog/firma_jesus_etayo.png' alt='image' class='mx-auto d-block'>
		</div>
		</div>
		",
		"feature" => false,
		"page_title" => "Mensaje de Jesús Etayo con motivo de la Pascua 2023",
		"page_description" => "El Hermano Superior de la Orden Hospitalaria de San Juan de Dios, dirige unas palabras a todos los profesionales de la Orden."
	],
		"ciruguia-bariatrica-o-perdida-de-peso" => (object) [
		"fecha" => "Viernes, 31 de marzo de 2023",
		"title_noticia" => "¿Qué hacer después de someterse a una operación de pérdida de peso?",
		"img_main" => "/files/img/blog/cirugia-bariatrica-consejos.jpg",
		"short_notice" => "La cirugía bariátrica o pérdida de peso, es en la actualidad una opción viable para tratar de manera eficaz la obesidad mórbida en personas en las que las medidas más conservadoras como la dieta, el ejercicio y el medicamento han fracasado.",
		"content" => "<p class='p20 third-font-gray mt-4'>La cirugía bariátrica o pérdida de peso, es en la actualidad una opción viable para tratar de manera eficaz la obesidad mórbida en personas en las que las medidas más conservadoras como la dieta, el ejercicio y el medicamento han fracasado.</p>
		<p class='p15 third-font-gray mt-4'>La cirugía de la obesidad se puede realizar en cualquier momento del año, incluso en Navidad. En esta época del año se tiende a comer más de lo habitual por los eventos navideños tanto en familia como en amigos, sin embargo, si un paciente está intervenido de obesidad realizará una alimentación mucho más sana en estos días, y por tanto no habría ningún inconveniente.</p>
		<p class='p15 third-font-gray mt-4'>La cirugía bariátrica también contribuye de manera importante a resolver comorbilidades y a mejorar la calidad de vida de los pacientes.</p>
		<p class='p15 third-font-gray mt-4'>Se ha demostrado que, tras una cirugía bariátrica exitosa, los pacientes obtienen beneficios como reducción de la glucemia y la presión arterial, reducción o eliminación de la apnea del sueño, reducción de la carga de trabajo del corazón y de los niveles de colesterol.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Cosas a tener en cuenta tras la cirugía bariátrica</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Los pacientes, con el apoyo de sus familias y del equipo de nutricionistas del Hospital San Juan de Dios de Sevilla y el programa Peso y Salud, se comprometen a una serie de cambios en su estilo de vida, para que los resultados sean efectivos. Además de realizar visitas de seguimiento para que la cirugía para bajar de peso sea exitosa a largo plazo.</p>
		<p class='p15 third-font-gray mt-4'>Entre los cambios en el estilo de vida tras la cirugía bariátrica podemos mencionar:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Tomar suplementos vitamínicos y minerales todos los días.</li>
		<li class='mt-2'>Hacer comidas pequeñas y frecuentes y seguir una dieta baja en carbohidratos y alta en proteína.</li>
		<li class='mt-2'>Realizar ejercicio con frecuencia.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Alimentación tras la cirugía de pérdida de peso</strong></b></p></p>
		<p class='p15 third-font-gray mt-4'>Después de la intervención quirúrgica, los especialistas del Hospital San Juan de Dios de Sevilla dan una serie de pautas de alimentación a los pacientes, comenzando con alimentación líquida y posteriormente se van incrementando alimentos hasta realizar una alimentación normal a las 4-5 semanas tras la intervención.</p>
		<p class='p15 third-font-gray mt-4'>¿Se puede comer marisco?</p>
		<p class='p15 third-font-gray mt-4'>Después de las primeras semanas de la cirugía, se podrán tomar pequeñas cantidades de marisco. Hay que tener en cuenta que el contenido del estómago se ha reducido y la cantidad que podemos ingerir es mucho menor.</p>
		<p class='p15 third-font-gray mt-4'>Esto no quiere decir que el paciente pase hambre, ya que alteramos el mecanismo fisiológico-hormonal y siente una saciedad precoz, con lo que se disminuye la cantidad de alimentos que se ingieren, no la calidad.</p>
		<p class='p15 third-font-gray mt-4'>¿Se puede beber alcohol?</p>
		<p class='p15 third-font-gray mt-4'>Los líquidos entran fácilmente, incluido el alcohol. Siempre se debe tomar alcohol de una forma responsable.</p>
		<p class='p15 third-font-gray mt-4'>En los pacientes intervenidos, al reducir el tamaño del estómago, el alcohol llega antes al intestino y se absorbe más rápido, con lo que los efectos secundarios del alcohol en los pacientes intervenidos de obesidad son mayores.</p>
		<p class='p15 third-font-gray mt-4'>¿Se puede comer dulce?</p>
		<p class='p15 third-font-gray mt-4'>Se pueden tomar dulces, pero la ingestión de dulces debe ser limitada tanto en los pacientes intervenidos de obesidad como al resto de personas.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Excesos tras la comida</strong></b></p></p>
		<p class='p15 third-font-gray mt-4'>Los excesos son malos para todas las personas y más aún en un paciente intervenido de obesidad.</p>
		<p class='p15 third-font-gray mt-4'>En estos casos, se puede distender el pequeño estómago y el paciente sentirá dolor importante con náuseas, puede que vómitos y si la intervención es reciente, puede reventar las grapas que se han puesto en el estómago y tener graves consecuencias.</p>
		<p class='p15 third-font-gray mt-4'>Por tanto, desde la unidad de cirugía bariátrica se les hace hincapié a todos los pacientes de seguir las recomendaciones de los especialistas para evitar cualquier consecuencia no deseada tras la cirugía.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Ejercicio tras las cirugía</strong></b></p></p>
		<p class='p15 third-font-gray mt-4'>El ejercicio debe de ser una parte rutinaria importante para todas las personas y principalmente en un paciente intervenido de obesidad. Se debe realizar pequeños paseos desde el 3-4 día de la cirugía y al mes ejercicio más intenso.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa en cualquiera de nuestras especialidades médicas desde el siguiente enlace https://sjdsevilla.com/pedir-cita desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud. En el Hospital San Juan de Dios de Sevilla trabajamos con las principales aseguradoras y contamos con plazos reducidos para tus consultas.</p>
		",
		"feature" => false,
		"page_title" => "Consejos tras operación de pérdida de peso",
		"page_description" => "¿Qué hacer después de someterse a una operación de pérdida de peso?"
	],

	"alergias-primaverales" => (object) [
		"fecha" => "Miércoles, 29 de marzo de 2023",
		"title_noticia" => "Alergias primaverales: recomendaciones para su prevención",
		"img_main" => "/files/img/blog/alergia-san-juan-de-dios-sevilla-min.jpg",
		"short_notice" => "La llegada de la primavera es una de las estaciones más esperadas del año. Los días se hacen más largos, las temperaturas se vuelven más agradables y la naturaleza empieza a despertar de su letargo invernal. Sin embargo, esta temporada tan ansiada también trae consigo la floración de un gran número de plantas y, con ella, la aparición de los síntomas alérgicos en miles de personas.",
		"content" => "<p class='p20 third-font-gray mt-4'>La llegada de la primavera es una de las estaciones más esperadas del año. Los días se hacen más largos, las temperaturas se vuelven más agradables y la naturaleza empieza a despertar de su letargo invernal. Sin embargo, esta temporada tan ansiada también trae consigo la floración de un gran número de plantas y, con ella, la aparición de los síntomas alérgicos en miles de personas.</p>
		<p class='p15 third-font-gray mt-4'>Es cierto que la primavera es una de las estaciones de mayor impacto de los pólenes y, en consecuencia, de mayor presencia de alergias. De hecho, en España, casi el 30% de la población padece algún tipo de alergia y parece que ese número aumentará en los próximos años como consecuencia de diferentes factores medioambientales. Por lo tanto, es importante tomar medidas para minimizar los efectos de esta alergia.</p>
		<p class='p15 third-font-gray mt-4'>El polen es el principal responsable de los síntomas alérgicos en esta época del año. Este problema crónico, además, suele influir enormemente en el día a día del paciente, especialmente en las épocas de mayor polinización de las plantas a las que es sensible. De hecho, el polen se puede convertir en una auténtica tortura para los alérgicos: provoca estornudos, picor de ojos, lagrimeo ocular, tos… Incluso, en casos extremos, puede producir eccemas o habones en la piel de la persona cuando ésta entra en contacto directo con las plantas productoras del polen al que es alérgico.</p>
		<p class='p15 third-font-gray mt-4'>Por si fuera poco, una misma persona puede tener alergia a uno o distintos pólenes a la vez, por lo que los expertos recomiendan acudir a un alergólogo que realice un estudio completo de los factores que provocan la enfermedad. Desde el Hospital San Juan de Dios de Sevilla, os ofrecemos algunos consejos y pautas para que las personas alérgicas puedan sobrellevar esta época del año de la mejor manera posible y puedan salir a la calle sin que ello suponga un verdadero tormento.</p>
		<p class='p15 third-font-gray mt-4'>Entre las recomendaciones para prevenir los síntomas de la alergia, la primera y más importante es identificar el problema. Es imprescindible que la persona conozca los pólenes a los que es alérgica y sepa identificar las plantas que los producen para tomar medidas preventivas. Una vez identificados los alérgenos, se recomienda frenar la exposición utilizando mascarillas o filtros nasales que eviten que se respiren los granos de polen y gafas de sol que obstaculicen la entrada de polen a los ojos. Además, en épocas de alta polinización, se recomienda el uso de lágrimas artificiales para limpiar e hidratar bien los ojos.</p>
		<p class='p15 third-font-gray mt-4'>Por supuesto, seguir estas recomendaciones puede ayudar a reducir los síntomas de la alergia primaveral, pero también es importante tener en cuenta algunos factores adicionales.</p>
		<p class='p15 third-font-gray mt-4'>Por ejemplo, se sabe que el cambio climático está afectando a la floración de las plantas y, por lo tanto, a la temporada de alergias. Según un estudio publicado en la revista The Lancet Planetary Health, las concentraciones de polen de la ambrosía, una planta que produce un polen muy alergénico, aumentarán en un 60% en algunas regiones de Europa para el año 2060.</p>
		<p class='p15 third-font-gray mt-4'>Además, la contaminación del aire también puede empeorar los síntomas de la alergia. Los contaminantes pueden dañar las células de la nariz y los pulmones, lo que hace que las personas sean más susceptibles a los alérgenos. Por lo tanto, es importante evitar lugares con alta contaminación del aire, especialmente durante los días en que los niveles de polen son altos.</p>
		<p class='p15 third-font-gray mt-4'>Por otro lado, las alergias primaverales pueden ser un signo de que el sistema inmunológico está debilitado. Por lo tanto, es importante mantener un estilo de vida saludable para fortalecer el sistema inmunológico y reducir los síntomas de la alergia. Algunas recomendaciones para lograr esto son hacer ejercicio regularmente, dormir lo suficiente, mantener una dieta equilibrada y reducir el estrés.</p>
		<p class='p15 third-font-gray mt-4'>En última instancia, si los síntomas de la alergia primaveral son graves y afectan significativamente la calidad de vida, es importante buscar atención médica. Los alergólogos pueden realizar pruebas para identificar los alérgenos específicos y recomendar tratamientos efectivos, como la inmunoterapia.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Profesionales de primer nivel</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Es importante obtener un buen diagnóstico de la alergia y conocer toda la información posible acerca de su comportamiento. Los 3 pilares más importantes son:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Prevención. Es muy complicado protegerse totalmente de los alérgenos, ya que esto supondría no salir de casa. Lo que sí resulta útil es conocer los meses de mayor polinización para intentar adaptar los planes teniéndolo en cuenta. Además, no hay que olvidar ponerse las gafas de sol después de un día de lluvia porque puede originarse una mayor polinización.</li>
		<li class='mt-2'>Tratamiento. Una vez diagnosticada la alergia, es importante mantener los tratamientos preventivos y sintomáticos. En caso necesario, también hay que tener disponible la terapia de rescate.</li>
		<li class='mt-2'>Inmunización. El pilar de la alergología es la inmunoterapia, más conocida como vacuna de la alergia. Su objetivo es conseguir la inmunización del paciente, es decir, eliminar su hipersensibilidad. Antes de prescribir una inmunoterapia, realizamos una historia clínica para conseguir un diagnóstico muy específico que nos permite valorar los tratamientos más adecuados.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, trabajamos para ofrecer al paciente la atención más rápida y eficaz, ya que consideramos que toda la agilización que se haga en la detección de la alergia es tiempo ganado desde el punto de vista médico. Para ello, contamos con los equipamientos más modernos y la tecnología más actualizada, yendo así a la vanguardia de otros centros, por lo que si tienes cualquier tipo de alergia o algún síntoma común no dudes en consultar a nuestra alergóloga Fátima Jurado Palma. </p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa en cualquiera de nuestras especialidades médicas desde el siguiente enlace https://sjdsevilla.com/pedir-cita desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud. En el Hospital San Juan de Dios de Sevilla trabajamos con las principales aseguradoras y contamos con plazos reducidos para tus consultas. </p>
		",
		"feature" => false,
		"page_title" => "Alergias primaverales: recomendaciones para su prevención",
		"page_description" => "En nuestro Hospital, priorizamos la atención médica rápida y eficiente para la detección y tratamiento de alergias."
	],
	"manuel-gonzalez" => (object) [
		"fecha" => "Jueves, 23 de marzo de 2023",
		"title_noticia" => "Manuel González, acude al II Encuentro Empresarial sobre Responsabilidad Social Corporativa",
		"img_main" => "/files/img/blog/encuentro_empresarios_rsc_ribamar_3.jpg",
		"short_notice" => "Nuestro director gerente Manuel González, ha acudido en la mañana de hoy al II Encuentro Empresarial sobre la Responsabilidad Social Corporativa, donde ha podido dar su visión sobre este tema.",
		"content" => "<p class='p20 third-font-gray mt-4'>Nuestro director gerente Manuel González, ha acudido en la mañana de hoy al II Encuentro Empresarial sobre la Responsabilidad Social Corporativa, donde ha podido dar su visión sobre este tema.</p>
		<p class='p15 third-font-gray mt-4'>La bienvenida del encuentro ha sido a cargo de la directora de Ribamar, Marta Valdés, y María del Mar Rull, Secretaria General de FP y Tecnologías Avanzadas de la Junta de Andalucía, ha sido la encargada de inaugurar la sesión.</p>
		<p class='p15 third-font-gray mt-4'>En la mesa redonda, han participado Manuela Villena, gerente de Relaciones Institucionales de Bidafarma; Manuel González, director-gerente del Hospital San Juan de Dios Sevilla; y Francisco Viguera, director general del Grupo Ybarra; y Jesús Martínez Benito, delegado Sur de Informativos Mediaset, como moderador.</p>
		<p class='p15 third-font-gray mt-4'>En el turno de Manuel González, director gerente de nuestro hospital, ha asegurado que “un evento como este no hubiera sido posible hace 30 años por la implantación de la política del buen trato en las empresas y la consideración del cuidado al medio ambiente. Llevamos algunos años en Sevilla pero nuestra orden cuenta con más de 500 años atendiendo a los más desfavorecidos, y no sólo aportándoles tratamiento médico, sino también tratándolos como una verdadera familia a través del programa Respiro”. Involucrarse socialmente es fundamental, razón por la que el Hospital San Juan de Dios de Sevilla desde que abrió sus puertas comenzó a atender a refugiados de Ucrania.</p>
		<p class='p15 third-font-gray mt-4'>Manuel González ha explicado también que este año han generado más de 130 puestos de trabajo en el Hospital San Juan de Dios de Sevilla y esperan que en este 2023 continúen pasando por sus instalaciones alumnos de Formación Profesional, entre las que destacan las alumnas de Ribamar, que por su formación personal más allá de la técnica marcan la diferencia, añadiendo “Hay que seguir trabajando en la FP para generar actividad empresarial, generar riqueza que revierta en el futuro de nuestra tierra”.</p>
		<p class='p15 third-font-gray mt-4'>Además, ha añadido que algunos de sus proveedores que son PYMES colaboran con la institución mediante el voluntariado de sus empleados. Trabajadores de empresas como Jiménez Maña Recambios y Grupo Cuatrogasa de fabricación de guantes y material sanitario, con los que realizan sesiones de formación para poder llevar a cabo esa labor social.</p>
		<p class='p15 third-font-gray mt-4'>Concluyó su intervención indicando “A veces es suficiente para ser responsable comprar en el comercio local para ayudar a los proveedores cercanos y reducir la huella evitando la importación de ciertos productos”. </p>
		<p class='p15 third-font-gray mt-4'>Al encuentro también han asistido la responsable de Calidad, Experiencia Paciente y Relaciones Institucionales, Herminia Pérez Álvarez y Rocío Ruíz Andana, Directora de Personas y Valores. </p>
		<div class='row'>
		<div class='col-12 col-md-6'>
			<img src='/files/img/blog/encuentro_empresarios_rsc_ribamar.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		<div class='col-12 col-md-6 mt-3 mt-md-0'>
			<img src='/files/img/blog/encuentro_empresarios_rsc_ribamar2.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		</div>
		", 
		"feature" => false,
		"page_title" => "Encuentro Empresarial sobre Responsabilidad Social Corporativa",
		"page_description" => "El director del Hospital Manuel Gonzalez, ha acudido en el día de hoy al II Encuentro Empresarial sobre Responsabilidad Social Corporativa."
	],
	"nueva-unidad-de-mama" => (object) [
		"fecha" => "Viernes, 17 de marzo de 2023",
		"title_noticia" => "Nueva Unidad de Mama",
		"img_main" => "/files/img/blog/sj_unidad_de_mama.jpg",
		"short_notice" => "El Hospital San Juan de Dios de Sevilla, junto con HT Médica, ha creado la nueva Unidad de Mama para la atención y diagnóstico integral y precoz del cáncer de mama formado por un equipo multidisciplinar.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla, junto con HT Médica, ha creado la nueva Unidad de Mama para la atención y diagnóstico integral y precoz del cáncer de mama formado por un equipo multidisciplinar.</p>
		<p class='p15 third-font-gray mt-4'>La detección temprana del cáncer de mama es fundamental para salvar vidas. De hecho, se estima que el 90% de las mujeres que reciben un diagnóstico precoz de cáncer de mama sobreviven a este tipo de tumor. Por eso, desde el Hospital San Juan de Dios de Sevilla y en conjunto con el equipo de HT Médica, hemos creado la nueva Unidad de Mama. Trabajamos para cuidar de tu salud ofreciéndote un diagnóstico integral, precoz y certero gracias a la combinación de las técnicas más avanzadas en radiología digital y anatomía patológica.</p>
		<p class='p15 third-font-gray mt-4'>Nuestro objetivo es ofrecer un servicio integral para la detección precoz del cáncer de mama, y es por ello que hemos creado nuestro modelo de atención humanizada. Este modelo ofrece en una única consulta la valoración por parte del ginecólogo y las pruebas de imagen necesarias para la detección temprana del cáncer de mama, como mamografía 3D, ecografía mamaria y/o resonancia magnética. De esta manera, se reduce el tiempo de espera para la obtención de resultados y la toma de decisiones.</p>
		<p class='p15 third-font-gray mt-4'>La mamografía 3D es una técnica innovadora que permite una mayor precisión en la detección temprana del cáncer de mama, ya que proporciona imágenes tridimensionales de la mama. Además, es menos invasiva y molesta que la mamografía convencional. Por otro lado, la ecografía mamaria y la resonancia magnética son técnicas complementarias que permiten obtener información adicional para un diagnóstico más preciso.</p>
		<p class='p15 third-font-gray mt-4'>La nueva Unidad de Mama está compuesta por los mejores profesionales y las técnicas más avanzadas en radiología digital y anatomía patológica. Nos aseguramos de que nuestros pacientes reciban una atención personalizada y un seguimiento cercano durante todo el proceso.</p>
		<p class='p15 third-font-gray mt-4'>La Unidad de Mama del Hospital San Juan de Dios de Sevilla y HT Médica está comprometida con la salud de las mujeres y la detección temprana del cáncer de mama.</p>
		<p class='p15 third-font-gray mt-4'>En el acto participarán parte de los componentes de la nueva Unidad de Mama entre los que se encuentran la Dra. Mª Luisa Franco, ginecóloga del Hospital San Juan de Dios de Sevilla y responsable de la Unidad de Mama, la Dra. Fátima Martín, ginecóloga, el Dr. Fernando Barragán médico especialista en radiodiagnóstico de HT Médica y el Dr. Alejandro Ruiz Moya, cirujano plástico y jefe del equipo de cirugía plástica del Hospital San Juan de Dios de Sevilla.</p>
		<p class='p15 third-font-gray mt-4'>Puedes inscríbirte desde el siguiente enlace <a href='https://sjdsevilla.com/unidad-de-mama' class='link-blog'>sjdsevilla.com/unidad-de-mama</a> <br>
		¡Te esperamos! </p>
		", 
		"feature" => false,
		"page_title" => "Nueva Unidad de Mama",
		"page_description" => "Prevención y diagnóstico de cualquier problema relacionado con la mama, formado por un equipo multidisciplinar con los mejores profesionales."
	],
	"nueva-unidad-de-cirugia-de-la-obesidad" => (object) [
		"fecha" => "Jueves, 16 de marzo de 2023",
		"title_noticia" => "Incorporamos la nueva Unidad de Cirugía de la Obesidad ",
		"img_main" => "/files/img/blog/unidad-obesidad-san-juan-dios-sevilla.jpg",
		"short_notice" => "La unidad está liderada por el doctor Antonio Barranco, reconocido especialista en cirugía bariátrica",
		"content" => "<p class='p20 third-font-gray mt-4'>La unidad está liderada por el doctor Antonio Barranco, reconocido especialista en cirugía bariátrica</p>
		<p class='p15 third-font-gray mt-4'>La obesidad es una enfermedad crónica que ha adquirido una dimensión pandémica en todos los países. Según la Organización Mundial de la Salud (OMS), la prevalencia de la obesidad ha aumentado de forma muy acelerada desde 1980 entre el 30 y el 70%, siendo la población adulta de la Unión Europea en la que más ha crecido, situándose actualmente en torno a un 55-60% de personas con sobrepeso (incluyendo adultos y menores), de los cuales un 15% aproximado, padece obesidad. A nivel mundial, es la segunda causa de muerte evitable después del tabaco.</p>
		<p class='p15 third-font-gray mt-4'>Con el objetivo de ayudar a estos pacientes a mejorar su salud, calidad y años de vida, el Hospital San Juan de Dios de Sevilla ha creado una unidad específica de cirugía de la obesidad, para tratar este tipo de casos, dirigida por el Dr. Antonio Barranco, reconocido especialista en el campo de la cirugía bariátrica.</p>
		<p class='p15 third-font-gray mt-4'>La unidad de obesidad del Hospital San Juan de Dios de Sevilla pone a disposición de los pacientes, diferentes técnicas por laparoscopia, como son el Tubo o Manga gástrica, y el Bypass gástrico. Así como Cirugías de Revisión realizadas tras el fallo con reganancia de peso de técnicas endoscópicas como el Balón gástrico, Endomanga, método Apollo, Pose, etc… o cirugías previas. El responsable de esta Unidad explica que, para ello, “es fundamental trabajar en un hospital de primer nivel como es el de San Juan de Dios de Sevilla, con un equipo multidisciplinar, protocolos de seguridad, recursos médicos y materiales de máxima garantía”.</p>
		<p class='p15 third-font-gray mt-4'>Las personas con obesidad tardan una media de seis años en consultar con el profesional sanitario, derivando esto en una peor evolución y pronóstico de su enfermedad. Esto viene motivado por causas como la estigmatización que se auto infringe el paciente por no tener hábitos saludables o la escasa disponibilidad de recursos para abordar la enfermedad, entre otros. Por ello, el doctor Barranco apunta que 'los únicos tratamientos demostrados científicamente eficaces a largo plazo para la bajada de peso son la dieta acompañada de una actividad física periódica y la cirugía de la obesidad en caso de necesitarse, pero es importante que el usuario sea consciente de su situación'.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Profesionales de primer nivel</strong></b></p>
		<p class='p15 third-font-gray mt-4'>El doctor Antonio Barranco posee una experiencia de más de 20 años en intervenciones de cirugía de la obesidad, habiendo intervenido a más de 1.000 pacientes. Además, es autor de numerosas ponencias, publicaciones y comunicaciones, e imparte cursos de formación tanto a residentes de cirugía general como a cirujanos nacionales e internacionales. También es miembro de la Asociación de Cirujanos Española (AEC), de la Sociedad Española de Cirugía de la Obesidad (SECO) y de la International Federation for the Surgery of Obesity and Metabolic Disorders (IFSO).</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa en cualquiera de nuestras especialidades médicas desde el siguiente enlace https://sjdsevilla.com/pedir-cita desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud. En el Hospital San Juan de Dios de Sevilla trabajamos con las principales aseguradoras y contamos con plazos reducidos para tus consultas.</p>
		", 
		"feature" => false,
		"page_title" => "Incorporamos la nueva Unidad de Cirugía de la Obesidad",
		"page_description" => "El Hospital San Juan de Dios de Sevilla ha incluido su nueva Unidad de Cirugia de la Obesidad dirigida por el reputado doctor Antonio Barranco, que es especialista en cirugía bariátrica."
	],

	"certificacion-agencia-de-calidad-sanitaria" => (object) [
		"fecha" => "Martes, 14 de marzo de 2023",
		"title_noticia" => "Certificación Agencia Sanitaria de Andalucía",
		"img_main" => "/files/img/blog/certificado-acsa-san-juan-dios-sevilla-2-min.jpg",
		"short_notice" => "Tras estrenar sus nuevas instalaciones, el histórico hospital sevillano vuelve a ratificar su compromiso con la calidad, al renovar su certificación con la ACSA",
		"content" => "<p class='p20 third-font-gray mt-4'>Tras estrenar sus nuevas instalaciones, el histórico hospital sevillano vuelve a ratificar su compromiso con la calidad, al renovar su certificación con la ACSA</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla ha recibido una nueva certificación de calidad por parte de la Agencia de Calidad Sanitaria de Andalucía (ACSA), entidad de la Consejería de Salud y Consumo encargada de impulsar la calidad y la mejora continua en el sistema sanitario e integrada en la Fundación Progreso y Salud. El hospital ya había conseguido este reconocimiento en 2007 y 2020, y ahora vuelve a renovarlo tras trasladar su actividad asistencial a las nuevas instalaciones inauguradas en marzo del año pasado.</p>
		<p class='p15 third-font-gray mt-4'>Esta certificación reconoce la calidad de los procesos desarrollados por el hospital para ofrecer los mejores servicios a sus pacientes y demuestra el compromiso de su equipo con la mejora continua. La obtención de este distintivo garantiza que la actividad del hospital se ajusta a los estándares de calidad definidos en el manual de certificación de la ACSA y que evalúan aspectos referidos a la organización de la actividad, la accesibilidad y continuidad de la atención, los derechos de los usuarios o la seguridad de los procesos.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
			<img src='/files/img/blog/certificado-acsa-san-juan-dios-sevilla-min.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		<div class='col-12 col-md-6 mt-3 mt-md-0'>
			<img src='/files/img/blog/certificado-acsa-san-juan-dios-sevilla-3-min.jpg' alt='image' class='blog-img height-100 mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>El acto de entrega de esta distinción, que se ha celebrado en el propio centro sevillano, ha contado con la asistencia de la delegada territorial de Salud y Consumo en Sevilla, Regina Serrano, del director gerente de la Fundación Progreso y Salud, Gonzalo Balbontín, del director de la ACSA, José Ignacio del Río, así como del equipo directivo y de una representación de los profesionales del hospital.</p>
		<p class='p15 third-font-gray mt-4'>Durante el acto, el director gerente del Hospital San Juan de Dios de Sevilla, Manuel González, el director médico, Miguel Sánchez Dalp, y la coordinadora de calidad, Herminia Pérez, han recogido en representación de todo el equipo el certificado que acredita la finalización del proceso de certificación con la ACSA, culminado con la obtención del nivel ‘Avanzado’.</p>
		<p class='p15 third-font-gray mt-4'>El proceso de certificación ha servido para evidenciar fortalezas y debilidades del trabajo que los profesionales del centro desarrollan a diario, permitiendo identificar áreas de mejora sobre las cuales trabajar para ofrecer unos servicios de mayor calidad a sus pacientes.</p>
		<p class='p15 third-font-gray mt-4'>Del mismo modo, el equipo evaluador ha puesto en valor aspectos de la actividad de la unidad que han sido considerados verdaderas fortalezas, destacando en particular iniciativas como la unidad de respiro familiar o la coordinación con el área de Trabajo social de la Orden Hospitalaria San Juan de Dios para la gestión del voluntariado. Asimismo, el hospital dispone de un sistema de prescripción electrónica que permite la impresión de la etiqueta ya cumplimentada para los medicamentos de administración endovenosa y gestiona de forma eficaz el control de los servicios de soporte que influyen en el funcionamiento de las instalaciones y los equipamientos.</p>
		<div class='row'>
			<div class='col-12 col-md-6'>
				<img src='/files/img/blog/certificado-acsa-san-juan-dios-sevilla-4-min.jpg' alt='image' class='blog-img height-100 mt-3'>
			</div>
			<div class='col-12 col-md-6 mt-3 mt-md-0'>
				<img src='/files/img/blog/certificado-acsa-san-juan-dios-sevilla-5.jpg' alt='image' class='blog-img height-100 mt-3'>
			</div>
		</div>
		<p class='p15 third-font-gray mt-4'><b><strong>Certificación de la Agencia de Calidad Sanitaria de Andalucía</strong></b></p>	
		<p class='p15 third-font-gray mt-4'>La Orden Hospitalaria de San Juan de Dios cuenta actualmente con diecisiete centros y servicios certificados por la Agencia de Calidad Sanitaria de Andalucía: seis hospitales, en Bormujos, Córdoba, Granada, Jerez, Málaga y Sevilla; tres unidades, en concreto Medicina Interna, Radiología y Ginecología del Hospital San Juan de Dios del Aljarafe; cuatro centros de atención infantil temprana, en Córdoba, Granada, Jerez y Sevilla; y cuatro servicios residenciales, en Granada, Jerez, Málaga y Sevilla.</p>	
		<p class='p15 third-font-gray mt-4'>La Agencia de Calidad Sanitaria de Andalucía es una entidad de evaluación y certificación que pertenece a la Consejería de Salud y Consumo y está integrada en la Fundación Progreso y Salud. Su actividad de certificación se dirige a los centros y unidades sanitarias y de servicios sociales, a las competencias de los profesionales sanitarios y a la formación continuada, según el modelo de certificación del Sistema Sanitario Público de Andalucía, buscando siempre la excelencia en la atención sanitaria y favoreciendo una cultura de la mejora continua. Los estándares de la ACSA para la certificación de centros y unidades están reconocidos por organismos de acreditación nacional e internacional como la ENAC o la International Society for Quality in Healthcare (Isqua). Para más información sobre la ACSA: <a href='http://www.juntadeandalucia.es/agenciadecalidadsanitaria' class='link-blog'>www.juntadeandalucia.es/agenciadecalidadsanitaria.</a></p>	
		", 
		"feature" => false,
		"page_title" => "Certificación Agencia Sanitaria de Andalucía",
		"page_description" => "Recientemente hemos renovado nuestro Certificado de Calidad Avanzada y estamos orgullosos"
	],
	"orden-de-san-juan-de-dios" => (object) [
		"fecha" => "Jueves, 09 de marzo de 2023",
		"title_noticia" => "La Orden de San Juan de Dios continúa con la ayuda en Ucrania",
		"img_main" => "/files/img/blog/ucrania4.jpg",
		"short_notice" => "Hasta ahora, la Orden Hospitalaria en España ha recaudado más de 400.000 euros a través de ‘Emergencia Ucrania’...",
		"content" => "<p class='p20 third-font-gray mt-4'>Hasta ahora, la Orden Hospitalaria en España ha recaudado más de 400.000 euros a través de ‘Emergencia Ucrania’, una campaña que mantendrá en vistas de que no hay perspectivas de alcanzar la paz en un horizonte cercano</p>
		<p class='p15 third-font-gray mt-4'>Desde el soporte más básico, como alimentos, ropa de abrigo o medicinas, hasta la entrega de materiales que dinamicen el tiempo libre de los menores o la habilitación de espacios donde cargar las baterías de los móviles</p>
		<p class='p15 third-font-gray mt-4'>Más de 30.000 personas desplazadas atendidas hasta ahora, distribución de medicinas, alimentos y abrigo, gestión de alojamiento, dinamización del tiempo libre de los menores, localización de familiares en los lugares de destino. Estos son solo algunos apuntes acerca de la labor que la Orden Hospitalaria de San Juan de Dios está llevando a cabo desde Polonia, punto de coordinación de la ayuda internacional que está recibiendo para ayudar a las personas refugiadas de la guerra de Ucrania.</p>				
		<p class='p15 third-font-gray mt-4'>El conflicto desatado por Rusia en Ucrania ha entrado en su segundo año, con un recrudecimiento de los combates en ciudades como Bajmut, al este del país, “lo que ha vuelto a incrementar el número de personas desplazadas y, como consecuencia, San Juan de Dios está incrementando la asistencia que presta”, ha explicado esta semana el Hno. Pawel Kulka desde Polonia.</p>
		<img class='blog-img mt-3' src='/files/img/blog/ucrania1.jpg' alt='image'>
		<p class='p15 third-font-gray mt-4'>Las ayudas que la Orden presta en territorio ucraniano toma formas muy diferentes, adaptándose a las nuevas necesidades derivadas del conflicto. A estas alturas, San Juan de Dios ha distribuido 500 unidades de baterías móviles, y decenas de generadores y cocinas de gas y estufas de parafina, debido a que los cortes de luz son constantes y el suministro eléctrico es uno de los problemas más serios que diariamente afronta la población, junto con la escasez de alimentos. </p>
		<p class='p15 third-font-gray mt-4'>A unas dos horas en coche desde la frontera entre Polonia y Ucrania, se llega hasta la localidad de Drohobich, donde cuatro hermanos de San Juan de Dios gestionan un centro social desde el que prestan ayuda a cientos de mujeres y niños que llegan exhaustos cada semana. Además de lo puramente esencial –comida y ropa de abrigo– se les facilita un espacio donde cargar sus móviles y se les trata de ayudar con otras necesidades; algunas, físicas; otras, emocionales. Por otro lado, también se han donado varios vehículos necesarios para el traslado de heridos y fallecidos, entre ellos dos ambulancias y un coche fúnebre. </p>
		<p class='p15 third-font-gray mt-4'>Esta intensa actividad se realiza en estrecha colaboración con la Parroquia de San Bartolomé Apóstol, además de otras entidades como Cáritas, lo que ha permitido ampliar el radio de acción y llegar a tantas personas refugiadas en este primer año de guerra. Muestra de ello es el apoyo periódico que se presta a los niños y adolescentes acogidos en la escuela-orfanato del pueblo de Dolhe, al sur de Leópolis, así como la distribución de 4.000 kits infantiles entre niños y niñas refugiados con alimentos y material de dibujo.</p>
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>‘Emergencia Ucrania’, la campaña de la Orden que ha movilizado una gran ayuda</span></h2>
		<p class='p15 third-font-gray mt-4'>Toda esta ayuda se ha podido sufragar con los fondos recibidos a través de la campaña internacional de San Juan de Dios ‘Emergencia en Ucrania’, lanzada por la Orden Hospitalaria el 4 de marzo de 2022, y que en España lleva 402.000 euros recaudados. Una cifra alcanzada gracias a la colaboración de 900 personas y entidades donantes, entre ellos 36 centros de San Juan de Dios. El director General de la Orden en España, Juan José Afonso, señala que “está en el ADN de la Orden acompañar en el dolor y aliviarlo, más allá de las fronteras. Lo que está sucediendo en Ucrania no solo preocupa y compete a la Orden, sino que nos conmueve y nos mueve como una institución que siempre está al lado de quienes más nos necesitan, más allá de banderas y credos, más allá de cualquier división en los mapas. Por ello, la campaña puesta en marcha por San Juan de Dios y coordinada desde España conjuntamente con la Oficina de Misiones y Cooperación de la Curia General, y a la que se han sumado los centros de Portugal, Francia, Italia y otros países, pretende acompañar y aliviar, en la medida en la que es viable, a toda esa población vulnerable que escapa al horror de un conflicto armado”.</p>
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>La ONGD de la Orden se desplaza a uno de los destinos de las ayudas</span></h2>
		<p class='p15 third-font-gray mt-4'>La organización Juan Ciudad ONGD, que coordina la campaña en nuestro país, ha visitado en dos ocasiones Drohobich, una ciudad en la que el flujo de personas que huyen de la guerra es tal, que ha incrementado notablemente su población y, con ella, sus necesidades. “La situación en Ucrania va a peor y por eso desde San Juan de Dios tenemos que seguir comprometidos con el pueblo ucraniano, porque aún no se sabe cuándo acabará guerra, y después habrá un largo periodo de reconstrucción”, afirmó desde Drohobich el director de esta ONGD, Gonzalo Sales.</p>
		<p class='p15 third-font-gray mt-4'>Durante este viaje, motivado por la entrega de un camión de bomberos que la Orden ha donado a la ciudad, Sales estuvo acompañado por el Superior Provincial de Orden Hospitalaria en Polonia y Ucrania, el Hno. Francis Salezy; el Superior del centro de Drohobich, el Hno. Lawrence Iwanczuck; y el Hno. Pawel Kulka, quienes se reunieron con distintas autoridades locales, que agradecieron enormemente la ayuda que está brindando San Juan de Dios al pueblo ucraniano. Además, tuvieron ocasión de conocer los doce pisos de nueva construcción destinados a familias refugiadas; un proyecto en el que colabora San Juan de Dios con la dotación del equipamiento sanitario y menaje.</p>
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Acogida de refugiados ucranianos en España</span></h2>
		<p class='p15 third-font-gray mt-4'>Por otra parte, en este primer año que ha transcurrido desde que comenzó la guerra, San Juan de Dios ha acogido en distintos centros de España a cerca de 430 personas refugiadas de ucrania, que inicialmente fueron acogidas en el Programa de Emergencia y, posteriormente, aquellas que quisieron se han incorporado al Programa de Acogida y Protección Internacional de la Orden Hospitalaria.</p>
		<p class='p15 third-font-gray mt-4'>Un programa que forma parte del Sistema de Acogida del Ministerio de Inclusión, Seguridad Social y Migraciones, y tiene el objetivo de acoger y favorecer la integración social y laboral de personas que han tenido que huir de sus países por la violencia o los conflictos armados. Con la inclusión de estas personas ucranianas, desde el 2022 hasta ahora este programa de San Juan de Dios cuenta con más de 900 personas acogidas en 13 centros de España, de las cuales más de la mitad son de Ucrania y el resto proviene de otros países de América Latina, Siria y Afganistán.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla, seguimos aportando nuestro grano de arena en relación al conflicto de Ucrania y continuamos con la acogida de refugiados en nuestro hospital. </p>
		<div class='row'>
			<div class='col-12 col-md-6'>
				<img src='/files/img/blog/ucrania2.jpg' alt='image' class='blog-img height-100 mt-3'>
			</div>
			<div class='col-12 col-md-6 mt-3 mt-md-0'>
				<img src='/files/img/blog/ucrania3.jpg' alt='image' class='blog-img height-100 mt-3'>
			</div>
		</div>", 
		"feature" => false,
		"page_title" => "La Orden de San Juan de Dios continúa con la ayuda en Ucrania",
		"page_description" => "La Orden Hospitalaria de San Juan de Dios, continúa con la ayuda a los refugiados ucranianos."
	],
	"dia-internacional-de-las-mujeres" => (object) [
		"fecha" => "Miércoles, 03 de marzo de 2023",
		"title_noticia" => "8 de marzo, Festividad de San Juan de Dios y Día Internacional de las Mujeres",
		"img_main" => "/files/img/blog/dia-san-juan-dios-sevilla.jpg",
		"short_notice" => "San Juan de Dios lanza ‘Hospitalidad en red’, una campaña audiovisual que redefine el concepto de red social.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>San Juan de Dios lanza ‘Hospitalidad en red’, una campaña audiovisual que redefine el concepto de red social.</span></h2>

		<p class='p15 third-font-gray mt-4'>La Orden ha querido explicar, a través de la figura de una mujer enfermera cómo San Juan de Dios que es una institución que, casi cinco siglos después de fundarse, sigue hoy atendiendo a las personas más vulnerables de la sociedad, haciendo un símil con las Redes Sociales de nuestro tiempo.</p>
		<p class='p15 third-font-gray mt-4'>‘Hospitalidad en red’ pretende acercar a los más jóvenes los valores de San Juan de Dios, una red revolucionaria y moderna desde su origen, que integra y protege a través de la Hospitalidad, la Responsabilidad, el Respeto, la Calidad y la Espiritualidad.</p>
		<p class='p15 third-font-gray mt-4'>En marzo, coincidiendo con el mes de San Juan de Dios, fundador de la Institución, la Orden Hospitalaria de San Juan de Dios Provincia de España ha lanzado la campaña audiovisual ‘Hospitalidad en red’ reivindicando los valores que han vertebrado a la organización desde hace casi cinco siglos, logrando actualizarlos en función de los tiempos y los lugares en el mundo en donde lleva a cabo su actividad sanitaria, sociosanitaria y social.</p>
		<p class='p15 third-font-gray mt-4'>Cada 8 de marzo, la Orden Hospitalaria celebra el día de su fundador, San Juan de Dios, un hombre que nació y murió este mismo día en 1495 y 1550, respectivamente. Desde que a principios del siglo XVI aquel hombre, conocido como Juan Ciudad y de origen portugués, recorriera las calles de Granada socorriendo a personas pobres y enfermas en una acción de absoluta solidaridad y altruista, la Orden Hospitalaria de San Juan de Dios se ha extendido por todo el mundo, llevando a cabo su misión de prestar atención sanitaria y social a las personas más vulnerables en los 5 continentes, a través de sus más de 400 centros.</p>
		<p class='p15 third-font-gray mt-4'>Por ello, este año la institución ha querido lanzar una campaña audiovisual que relate cómo, después de casi cinco siglos, el mensaje del fundador ha ido transmitiendo a través de todos aquellos que, con su trabajo, tiempo o donativo, han hecho más grande y más fuerte la red social más social de todas, como explican. Por ello, con esta campaña San Juan de Dios también ha querido poner en valor la figura de los profesionales, voluntarios y donantes.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Una mujer enfermera, depositaria y transmisora del legado de San Juan de Dios</strong></b></p>
		<p class='p15 third-font-gray mt-4'>En el relato de la campaña, la Orden ha concentrado la identificación con todas aquellas personas que forman parte de San Juan de Dios en la figura de una enfermera, mujer, pues siguen teniendo una amplísima representación entre los profesionales de San Juan de Dios en centros hospitalarios y sociosanitarios en España. Se trata, además, de una suma a la celebración del día de la Mujer, efeméride que coincide con la celebración de la festividad del fundador de la Orden, el 8 de marzo. La figura de la enfermera simboliza también a San Juan de Dios, a quién se le considera uno de los precursores de la enfermería moderna y que es patrón de esta profesión.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Una campaña que acerca los valores de la Orden a los más jóvenes</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Con la campaña ‘Hospitalidad en red’, San Juan de Dios juega con el léxico y establece un paralelismo entre las redes sociales, tal y como se le conocen actualmente, y lo que es “una verdadera red social, la más social de todas”, una red que protege a los que más lo necesitan. Todo ello, para acercar los valores de la institución a un adolescente, hijo de la protagonista que, cada vez más atento y sorprendido, escucha a su madre.</p>
		<p class='p15 third-font-gray mt-4'>La enfermera explica que “todo comenzó como comienzan estas grandes ideas, con un fundador al que tachaban de loco y que levantó el proyecto de sus sueños con un crowdfunding”, refiriéndose a San Juan de Dios, aquel hombre que recogía a pobres y enfermos de Granada en el siglo XVI y que se valía de las limosnas para poder llevar a cabo esa asistencia.</p>
		<p class='p15 third-font-gray mt-4'>“Es una red porque está formada por miles de personas que cada día persiguen el mismo objetivo. Y es social porque todo lo que hacen lo hacen pensando en los demás”, continúa describiendo mientras enseña imágenes en una tableta digital a su hijo de la labor que desarrolla San Juan de Dios en sus hospitales, centros de atención a la discapacidad, salud mental, mayores, infancia, etc.</p>
		<p class='p15 third-font-gray mt-4'>Continuando con el argot digital, subraya que “la clave aquí es que se comparte, pero a lo bestia”, y lo que se comparte es tiempo, retos virales “pero de los difíciles”, mientras aparece una imagen real de un enfermo de Covid-19 saliendo de UCI aplaudido por los sanitarios. “Y no se bloquea a nadie, porque se piensa que todo el mundo tiene mucho que aportar”, haciendo referencia a personas que sufren el estigma de la enfermedad mental o la discapacidad, colectivos por los que la Orden lleva trabajando históricamente, para su inclusión real en todos los ámbitos de la sociedad. Esta red, según la profesional sanitaria protagonista de esta campaña, “está llena de personas a las que, cuando las conoces, las quieres seguir, pero al fin del mundo”.</p>
		<p class='p15 third-font-gray mt-4'>A continuación os facilitamos el vídeo completo:</p>
		<div class='d-flex justify-content-center'>
		<iframe width='560' height='315' src='https://www.youtube.com/embed/3fbwE1iuFEA' title='San Juan de Dios, Hospitalidad en Red' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
		</div>
		<p class='p15 third-font-gray mt-4'>Este video está disponible en la plataforma Youtube adaptado para personas sordomudas y en los 4 idiomas co-oficiales del estado:</p>
		<p class='p15 third-font-gray mt-4'>Castellano: <a href='https://youtu.be/3fbwE1iuFEA' class='link-blog'>https://youtu.be/3fbwE1iuFEA</a></p>
		<p class='p15 third-font-gray mt-4'>Catalán: <a href='https://youtu.be/fgSkJB1BCSE' class='link-blog'>https://youtu.be/fgSkJB1BCSE</a></p>
		<p class='p15 third-font-gray mt-4'>Euskera: <a href='https://youtu.be/UMo8YEFlAM0' class='link-blog'>https://youtu.be/UMo8YEFlAM0</a></p>
		<p class='p15 third-font-gray mt-4'>Gallego: <a href='https://youtu.be/Lzv9zlL2dyw' class='link-blog'>https://youtu.be/Lzv9zlL2dyw</a></p>
		",
		"feature" => false,
		"page_title" => "Festividad de San Juan de Dios",
		"page_description" => "Con motivo del día de San Juan de Dios, nuestra Orden Hospitalaria ha lanzado la campaña “Hospitalidad en red” para acercar a los más jóvenes nuestros valores."	
	],
	"dia-mundial-de-la-obesidad" => (object) [
		"fecha" => "Viernes, 03 de marzo de 2023",
		"title_noticia" => "Día Mundial de la Obesidad",
		"img_main" => "/files/img/blog/dia-mundial-obesidad-san-juan-dios-sevilla.jpg",
		"short_notice" => "El Día Mundial de la Obesidad se celebra cada 4 de marzo con el objetivo de crear conciencia sobre esta enfermedad crónica y su impacto en la salud de la población mundial.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>El Día Mundial de la Obesidad se celebra cada 4 de marzo con el objetivo de crear conciencia sobre esta enfermedad crónica y su impacto en la salud de la población mundial.</span></h2>

		<p class='p15 third-font-gray mt-4'>La obesidad es un problema de salud pública global que afecta a personas de todas las edades, géneros y orígenes étnicos. Según la Organización Mundial de la Salud (OMS), en 2016, más de 1.900 millones de adultos tenían sobrepeso y de ellos, más de 650 millones eran obesos.</p>
		<p class='p15 third-font-gray mt-4'>La obesidad se define como una acumulación excesiva de grasa corporal que puede ser perjudicial para la salud. Se produce cuando la ingesta calórica es mayor que el gasto energético del cuerpo. La obesidad es un factor de riesgo para una variedad de enfermedades crónicas como la diabetes tipo 2, enfermedades cardiovasculares, enfermedades respiratorias, problemas articulares y algunos tipos de cáncer.</p>	
		<p class='p15 third-font-gray mt-4'>La prevención de la obesidad es crucial para reducir el riesgo de enfermedades crónicas y mejorar la calidad de vida de las personas. Aquí te presentamos algunos consejos que pueden ayudarte a prevenir la obesidad:</p>
		<p class='p15 third-font-gray mt-4'>	-	Adopta un estilo de vida saludable</p>
		<p class='p15 third-font-gray mt-4'>La obesidad no es solo un problema de dieta, sino también de estilo de vida. Adoptar un estilo de vida saludable que incluya una dieta equilibrada y actividad física regular puede ayudarte a prevenir la obesidad. Trata de comer una variedad de alimentos saludables como frutas, verduras, cereales integrales, proteínas magras y grasas saludables. Limita el consumo de alimentos procesados, ricos en grasas y azúcares añadidos.</p>
		<p class='p15 third-font-gray mt-4'>	-	Haz ejercicio regularmente</p>
		<p class='p15 third-font-gray mt-4'>El ejercicio es una parte importante de un estilo de vida saludable y puede ayudarte a prevenir la obesidad. Trata de hacer ejercicio regularmente durante al menos 30 minutos al día. Puedes caminar, correr, andar en bicicleta, nadar o hacer cualquier otra actividad que disfrutes. Además, trata de incorporar más actividad física en tu rutina diaria, como subir escaleras en lugar de tomar el ascensor o caminar en lugar de conducir.</p>
		<p class='p15 third-font-gray mt-4'>	-	Mantén un peso saludable</p>
		<p class='p15 third-font-gray mt-4'>Mantener un peso saludable es esencial para prevenir la obesidad. Si tienes sobrepeso u obesidad, trabaja con un profesional de la salud para desarrollar un plan de pérdida de peso adecuado. Trata de perder peso gradualmente y de manera saludable, no más de 1-2 libras por semana. Una vez que alcances tu peso objetivo, asegúrate de mantenerlo con un estilo de vida saludable.</p>
		<p class='p15 third-font-gray mt-4'>	-	Limita el consumo de alcohol</p>
		<p class='p15 third-font-gray mt-4'>El consumo excesivo de alcohol puede aumentar el riesgo de obesidad. El alcohol es rico en calorías y puede contribuir a un aumento de peso no deseado. Si bebes alcohol, trata de limitar la cantidad que consumes y opta por opciones más saludables como el vino tinto o la cerveza ligera.</p>
		<p class='p15 third-font-gray mt-4'>	-	Duerme lo suficiente</p>
		<p class='p15 third-font-gray mt-4'>La falta de sueño puede aumentar el riesgo de obesidad. La falta de sueño puede afectar las hormonas que regulan el hambre y la saciedad, lo que puede llevar a comer en exceso y al aumento de peso. Trata de dormir al menos durante 7-8 horas diarias de manera ininterrumpida.</p>
		<p class='p15 third-font-gray mt-4'>En conclusión, el Día Mundial de la Obesidad es una oportunidad para crear conciencia sobre los peligros de la obesidad y la importancia de prevenirla. Adoptar un estilo de vida saludable que incluya una dieta saludable y actividad física regular, junto con el abordaje de factores subyacentes, es fundamental para prevenir y controlar la obesidad y mejorar la salud en general.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla, disponemos del mejor equipo para el tratamiento de la obesidad y el sobrepeso. Ofertamos, desde la especialidad de <a href='https://sjdsevilla.com/endocrino-sevilla' class='link-blog'>endocrinología</a>, un programa específico para personas que quieran tener un peso y una alimentación adecuada, llamado “Peso y Salud”, que atienden de manera multidisciplinar endocrinólogos, dietistas, nutricionistas y psicólogos, que pretenden abordar de manera integral la relación con la comida y plantear soluciones globales.</p>
		<p class='p15 third-font-gray mt-4'>También disponemos, desde la especialidad de <a href='https://sjdsevilla.com/cirugia-bariatrica-sevilla' class='link-blog'>cirugía bariátrica</a> dirigida por el Dr. Antonio Barranco, todas las operaciones relacionadas con la obesidad como el bypass gástrico, manga gástrica y manga gástrica. </p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud en cualquiera de nuestras especialidades médicas disponibles.</p>
		",
		"feature" => false,
		"page_title" => "Día Mundial de la Obesidad",
		"page_description" => "El Hospital San Juan de Dios de Sevilla, facilita unos consejos para la prevención de la obesidad que cada vez es más común en nuestra sociedad."	
	],
		"dia-conciencia-del-papiloma" => (object) [
		"fecha" => "Miércoles, 01 de marzo de 2023",
		"title_noticia" => "Día Internacional de la Concienciación del Virus del Papiloma Humano",
		"img_main" => "/files/img/blog/papiloma-humano-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "El virus del papiloma humano (VPH) es una infección viral de transmisión sexual que afecta a millones de personas en todo el mundo.",
		"content" => "
		<p class='p15 third-font-gray mt-4'>Con motivo del Día Internacional de la Concienciación del Virus del Papiloma Humano, el próximo 4 de marzo, desde el área de ginecología del Hospital San Juan de Dios de Sevilla, os facilitamos todos los detalles de esta enfermedad, cómo afecta y cómo prevenirla, así como el tratamiento de la misma.</p>
		<p class='p15 third-font-gray mt-4'>El virus del papiloma humano (VPH) es una infección viral de transmisión sexual que afecta a millones de personas en todo el mundo. Según la Organización Mundial de la Salud, se estima que el VPH es responsable de alrededor del 5% de todos los cánceres en todo el mundo, incluyendo cáncer de cuello uterino, cáncer de pene, cáncer de ano, y algunos cánceres de cabeza y cuello. Afortunadamente, hay formas de prevenir la infección y reducir el riesgo de desarrollar cáncer.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Prevención del VPH</strong></b></p>
		<p class='p15 third-font-gray mt-4'>La mejor manera de prevenir la infección por VPH es mediante la vacunación. Actualmente, hay tres vacunas disponibles que protegen contra los tipos de VPH que causan la mayoría de los cánceres relacionados con el VPH. Estas vacunas son seguras y efectivas, y se recomiendan para todas las personas, especialmente para adolescentes y adultos jóvenes. La vacunación es más efectiva si se realiza antes de que la persona tenga relaciones sexuales, pero aún así puede ser beneficiosa en personas que ya han tenido relaciones sexuales.</p>
		<p class='p15 third-font-gray mt-4'>Además de la vacunación, hay otras medidas preventivas que pueden reducir el riesgo de contraer VPH y otros tipos de infecciones de transmisión sexual (ITS). Estas medidas incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Practicar sexo seguro: El uso correcto y consistente de condones de látex o poliuretano puede reducir el riesgo de contraer VPH y otras ITS. Sin embargo, los condones no protegen completamente contra el VPH, ya que el virus puede estar presente en áreas que no están cubiertas por el condón.</li>
		<li class='mt-2'>Limitar la cantidad de parejas sexuales: Cuantas más parejas sexuales tenga una persona, mayor será su riesgo de contraer VPH y otras ITS. Reducir el número de parejas sexuales puede reducir el riesgo de contraer VPH.</li>
		<li class='mt-2'>Realizarse exámenes regulares: Es importante que las mujeres se realicen exámenes regulares de Papanicolaou y pruebas de VPH según lo recomendado por su médico. Estas pruebas pueden detectar cambios anormales en las células del cuello uterino que pueden indicar la presencia de VPH y pueden ayudar a prevenir el cáncer de cuello uterino.</li>
		<li class='mt-2'>Evitar el consumo de tabaco: Fumar puede debilitar el sistema inmunológico y aumentar el riesgo de desarrollar cáncer relacionado con el VPH.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Tratamiento del VPH</strong></b></p>
		<p class='p15 third-font-gray mt-4'>En la mayoría de los casos, el VPH no causa ningún síntoma y desaparece por sí solo sin causar ningún problema de salud. Sin embargo, en algunos casos, el VPH puede persistir y provocar cambios anormales en las células del cuello uterino, que pueden convertirse en cáncer de cuello uterino si no se tratan.</p>
		<p class='p15 third-font-gray mt-4'>El tratamiento del VPH depende del tipo de problema de salud que cause. Si el VPH causa verrugas genitales, estas pueden tratarse con medicamentos tópicos o procedimientos quirúrgicos. Si el VPH causa cambios anormales en las células del cuello uterino, el tratamiento puede incluir procedimientos para eliminar las células anormales. Estos procedimientos incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Conización: Este procedimiento implica la eliminación de una porción del cuello uterino que contiene células anormales. Se puede realizar con un cuchillo o un láser.</li>
		<li class='mt-2'>Cirugía láser: Este procedimiento utiliza un láser para eliminar las células anormales del cuello uterino.</li>
		<li class='mt-2'>Electrocauterización: Este procedimiento utiliza una corriente eléctrica para quemar las células anormales del cuello uterino.</li>
		<li class='mt-2'>Crioterapia: Este procedimiento implica la congelación de las células anormales del cuello uterino para destruirlas.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si tienes alguna consulta relacionada con el Virus del Papiloma Humano (VPH) o cualquier otro tipo de enfermedad de transmisión sexual, no dudes en solicitar cita con nuestro departamento de <a href='https://sjdsevilla.com/ginecologo-sevilla' class='link-blog'>ginecología</a> que está dirigido por la Dra. María Luisa Franco Marquez. </p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitarla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud en cualquiera de nuestras especialidades médicas disponibles. </p>
		",
		"feature" => false,
		"page_title" => "Concienciación del Virus del Papiloma Humano",
		"page_description" => "Conoce todos los detalles sobre el Virus del Papiloma Humano (VPH) que tanto afecta a la población."	
	],
	"traumatismo-craneoencefalico" => (object) [
		"fecha" => "Viernes, 24 de febrero de 2023",
		"title_noticia" => "Traumatismo craneoencefálico: consecuencias y cómo actuar",
		"img_main" => "/files/img/blog/traumatismo-craneoencefalico-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "En el siguiente artículo conoceremos qué son, cómo se producen y cómo actuar ante los mismos.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>En el siguiente artículo conoceremos qué son, cómo se producen y cómo actuar ante los mismos.</span></h2>
		<p class='p15 third-font-gray mt-4'>Un traumatismo en la cabeza, ya bien sea producido por un accidente de manera fortuita, puede ser tan simple como que únicamente afecte al cuero cabelludo, como grave y que afecte a el cráneo o al cerebro.</p>
		<p class='p15 third-font-gray mt-4'>El traumatismo craneoencefálico es cualquier traumatismo que se produce en la cabeza, y puede ser superficial, si afecta únicamente al cuero cabelludo, y si es más intenso, puede llegar a afectar al cráneo o al cerebro. En la mayoría de los casos, es un abultamiento superficial ya que el cráneo está formado por un conjunto de huesos que protegen al cerebro, pero en los casos en los que el traumatismo sea más importante, puede producirse una lesión del cerebro.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo se producen?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>El traumatismo craneal puede producirse en cualquier circunstancia en la que podamos golpearnos la cabeza, aunque entre las causas más frecuentes se pueden destacar los accidentes de tráfico, las caídas fortuitas, las agresiones o peleas, o accidentes de trabajo, en el hogar o practicando deporte.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Consecuencias de los traumatismos</strong></b></p>
		<p class='p15 third-font-gray mt-4'>En los casos que el traumatismo haya sido de poca intensidad, la persona que lo ha sufrido, presentará dolor leve de cabeza y posiblemente un abultamiento localizado. Puede ir asociado a pérdida de conocimiento, pero en el caso que se presente, será de corta duración (menos de 15 minutos). En estos casos mayoritarios, se ha podido sufrir una sacudida del cerebro, pero sin llegar a causar ninguna lesión cerebral.</p>
		<p class='p15 third-font-gray mt-4'>En otros casos puede existir una lesión interna, ya sea de la estructura ósea (cráneo) o del órgano interno, el cerebro. Además, los síntomas pueden presentarse tras haber sufrido el golpe, o bien pueden aparecer al cabo de unas horas incluso días. Es posible también que exista una lesión del cerebro sin que exista daño en el cráneo.</p>
		<p class='p15 third-font-gray mt-4'>Es importante saber que cuando existe una lesión interna, es decir a nivel cerebral, la persona que ha sufrido el golpe presenta los siguientes síntomas:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Pérdida de conocimiento de más de 15 minutos de duración.</li>
		<li class='mt-2'>Tamaño desigual de las pupilas.</li>
		<li class='mt-2'>Hematoma facial.</li>
		<li class='mt-2'>Sangran los oídos.</li>
		<li class='mt-2'>Vómitos, rigidez en la zona posterior del cuello o dolor intenso de cabeza.</li>
		<li class='mt-2'>Somnolencia, confusión, pérdida de conocimiento.</li>
		<li class='mt-2'>Convulsiones.</li>
		<li class='mt-2'>Falta de coordinación.</li>
		<li class='mt-2'>Alteración en el habla.</li>
		<li class='mt-2'>Falta de movilidad en alguna parte del cuerpo.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo debemos actuar ante un traumatismo craneal?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Si se presentan algunos de los síntomas anteriormente expuestos, debemos avisar de inmediato al servicio de urgencias médicas para solicitar una ambulancia y la persona pueda ser trasladada lo antes posible a un centro sanitario para realizarle las pruebas necesarias y descartar cualquier tipo de lesión interna.</p>
		<p class='p15 third-font-gray mt-4'>Mientras esperamos a los servicios de emergencias, debemos realizar los siguientes pasos:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Observar la respiración y la circulación. Si la persona no respira y no tiene pulso, en caso de conocerse las maniobras de reanimación cardiopulmonar (RCP), deben iniciarse las mismas.</li>
		<li class='mt-2'>Si la persona respira y tiene pulso pero está inconsciente, no podemos movilizarla ya que podría tener una lesión en la columna vertebral que puede agravarse por el hecho del movimiento.</li>
		<li class='mt-2'>Si tiene alguna herida que sangre, debemos intentar contener la misma. Si la herida está en la cabeza, no podemos realizar una presión fuerte, únicamente es recomendable cubrir la herida con gasas.</li>
		<li class='mt-2'>Si está vomitando, se debe evitar que la persona pueda ahogarse con su propio vómito, para ello hay que girar la cabeza, el cuello y el cuerpo.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si el traumatismo craneal es leve, durante las primeras 24 horas tras sufrir el golpe en la cabeza, debemos vigilar la aparición de alguno de los síntomas anteriores. En caso que no aparezcan, si la persona está durmiendo, debemos despertarla cada 2 o 3 horas para comprobar que reacciona de manera correcta. En el caso de tener dolor de cabeza se puede tomar paracetamol, evitando siempre la aspirina o cualquier otro antiinflamatorio.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Qué no debemos hacer ante un traumatismo?</strong></b></p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Si hay algún objeto que sobresale de la herida, no debemos sacarlo bajo ningún concepto. </li>
		<li class='mt-2'>En el caso que la persona herida lleve casco y haya sospechas de traumatismo craneal grave, no retirar el casco.</li>
		<li class='mt-2'>No tomar bebidas con alcohol tras un golpe fuerte en la cabeza.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Para consultas o imprevistos relacionados con traumatismos craneoencefálicos puedes acudir al Hospital San Juan de Dios de Sevilla, donde disponemos del servicio de urgencias 24 horas, los 365 días del año. </p>
		<p class='p15 third-font-gray mt-4'>También puedes solicitar cita previa desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a>  desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud en cualquiera de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> disponibles.</p>

		",
		"feature" => false,
		"page_title" => "Traumatismo craneoencefálico: consecuencias y cómo actuar",
		"page_description" => "Os facilitamos toda la información sobre los traumatismos craneoencefálicos, las consecuencias y cómo actuar ante este tipo de situaciones."	
	],
	"fortalecer-sistema-inmunologico" => (object) [
		"fecha" => "Miércoles, 22 de febrero de 2023",
		"title_noticia" => "Claves para fortalecer tu sistema inmunológico",
		"img_main" => "/files/img/blog/sistema-inmunologico-san-juan-dios-sevilla.jpg",
		"short_notice" => "Desde el Hospital San Juan de Dios de Sevilla os facilitamos algunos consejos para mantener un buen sistema inmunitario",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Desde el Hospital San Juan de Dios de Sevilla os facilitamos algunos consejos para mantener un buen sistema inmunitario</span></h2>
		<p class='p15 third-font-gray mt-4'>Durante estos meses, es muy común escuchar y ver a personas con síntomas de gripe o resfriado. Una de las mejores maneras de prevenirlo, además de permanecer en la tranquilidad de tu casa, es reforzando tu sistema inmunológico. ¿Y cómo debemos hacerlo? Según un estudio del Instituto Whitehead en Estados Unidos, la fortaleza de nuestras defensas depende de un 75% de los hábitos de vida que llevamos a cabo.</p>
		<p class='p15 third-font-gray mt-4'>Esto significa, que realizar actividad física de manera periódica, mantener los niveles de estrés bajos y llevar una dieta equilibrada y saludable, contribuyen a mantener el equilibrio en nuestro sistema inmunológico. Según un informe de la OMS sobre dietas, nutrición y prevención de enfermedades crónicas, se aseguró que con una dieta abundante en frutas y hortalizas, ricas en micronutrientes que fortalecen el sistema inmunitario, se puede ayudar a las defensas naturales del organismo a defenderse de las enfermedades infecciosas que durante esta época del año están más presentes.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo fortalecer el sistema inmunitario?</strong></b></p>	
		<p class='p15 third-font-gray mt-4'>La labor del sistema inmunitario, es principalmente actuar como una barrera de defensa de nuestro organismo contra todo agente extraño. Desde el Hospital San Juan de Dios de Sevilla, os facilitamos unos breves consejos para fortalecer nuestro sistema inmunitario, aunque primero te invitamos a quererte a ti mismo, cuidarte y protegerte.</p>	
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Reir para subir las defensas: la risa tiene múltiples beneficios para el sistema inmunitario, ya que es un síntoma de bienestar que puede ser una buena medicina para tu salud. Los especialistas aseguran que reír fortalece el sistema inmunológico y reduce la ansiedad.</li>
		<li class='mt-2'>Alimentación saludable en pro de tus defensas: Los alimentos con antioxidantes, además de prevenir enfermedades, retrasan el proceso de envejecimiento y protegen tu cuerpo de artritis, alergias, gripe y resfriados comunes, y por supuesto, suben las defensas. ¿Cuáles son los alimentos que contienen antioxidantes? Son muchos entres los que podemos destacar el aguacate, salmón, legumbres, cítricos; frutas como fresas, naranja y mandarina y alimentos ricos en zinc como los huevos y los cereales.</li>	
		<li class='mt-2'>Mantén una vida sexual activa: el sexo es un antihistamínico natural que ayuda al cuerpo a protegerse de determinadas enfermedades entre las que se destaca la depresión, el insomnio y la gripe entre otros.</li>
		<li class='mt-2'>Dormir bien: dormir entre siete y ocho horas es esencial para mantener una buena salud. Es importante, ya que la melatonina, que estimula las células inmunológicas, trabaja durante la noche. Si te es difícil conciliar el sueño o te despiertas varias veces durante la noche, te recomendamos que contactes con nuestros especialistas.</li>
		<li class='mt-2'>Ejercitarse tanto como sea posible: más allá de tener una buena capacidad cardiovascular y de estar en forma, ejercitarse con frecuencia contribuye a estimular el sistema inmunológico. Comienza a ejercitarte poco a poco y sigue una rutina de ejercicios a diario. Puedes realizarlo tanto en la calle, el gimnasio o tu propia casa pero es esencial para el fortalecimiento inmunológico y para mantener una buena salud.</li>
		<li class='mt-2'>La meditación: sólo 20 minutos de meditación diarios, tiene múltiples beneficios para el cuerpo y la salud y ayuda a combatir la depresión, fortalecer el sistema inmune y reducir el estrés, por lo que es muy recomendable esta práctica.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si tienes algún problema inmunitario o simplemente quieres mejorar tu sistema inmunológico, puedes solicitar tu cita previa en el Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> Disponemos de multitud de <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> y trabajamos con tiempos reducidos, así como con las <a href='https://sjdsevilla.com/companias' class='link-blog'>principales aseguradoras.</a></p>	
		",
		"feature" => false,
		"page_title" => "Claves para fortalecer tu sistema inmunológico",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla, os dejamos unos consejos para mantener un buen sistema inmunitario. Si tienes algún problema inmunitario solicita cita previa con nosotros. "	
	],

	"alimentos-estado-de-animo-y-estres" => (object) [
		"fecha" => "Lunes, 20 de febrero de 2023",
		"title_noticia" => "Relación entre los alimentos y el estrés",
		"img_main" => "/files/img/blog/alimentacion-estres-san-juan-de-dios.jpg",
		"short_notice" => "En el siglo XXl, el estrés es una de las principales situaciones que sufren la mayoría de personas en España y el mundo, y es que ¿quién no está estresado actualmente?",
		"content" => "
		<p class='p15 third-font-gray mt-4'>En el siglo XXl, el estrés es una de las principales situaciones que sufren la mayoría de personas en España y el mundo, y es que ¿quién no está estresado actualmente? Compaginar el trabajo, con los estudios, la familia, los amigos, el deporte, las tareas domésticas…parece todo un reto poder encajar todas las piezas de este entramado que llamamos vida sin olvidarnos de ninguna, sin que una parte se vea más perjudicada que otra.</p>
		<p class='p15 third-font-gray mt-4'>Estamos tan acostumbrados a esto, que lo hemos normalizado, y nos hemos incluso olvidado de qué significa el estrés.</p>
		<p class='p15 third-font-gray mt-4'>“El estrés es una tensión provocada por una situación agobiante que origina reacciones psicosomáticas”</p>
		<p class='p15 third-font-gray mt-4'>¡Así es! Es una respuesta adaptativa de nuestro cuerpo, que se desarrollaba ya en la edad prehistórica cuando el hombre tenía que cazar o se encontraba en peligro y su vida dependía de ello. El hombre ha evolucionado manteniendo esta sensación de alerta ante una situación desafiante, pero lo que antes se conocía como un estado puntual, que cedía al desaparecer el estímulo, ahora no es así, y hablamos de estrés crónico.</p>
		<p class='p15 third-font-gray mt-4'>El estrés crónico es considerado la enfermedad del siglo XXl, según expertos, que lo atribuyen al estilo de vida tan frenético de la actualidad y que provoca multitud de enfermedades.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Hay relación entre la alimentación y el estrés y estado de ánimo?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>La respuesta es ¡por supuesto!, ya que los nutrientes presentes en los alimentos son el motor que nos mueve y la fuente de nuestra energía, así que siempre serán nuestra prioridad. Además, en la situación de estrés y bajo estado de ánimo, no afecta a todos por igual. Por un lado, hay gente que tiene menos apetito, y por el otro, están aquellos que responden comiendo más. Por lo tanto, afectan a nuestra saciedad y apetito, y a qué elecciones alimentarias hacemos.</p>
		<p class='p15 third-font-gray mt-4'>Alguna vez habrás escuchado que el chocolate negro influye en la felicidad,  El cacao, aumenta los niveles de serotonina, la conocida hormona de la felicidad. Por lo tanto, actúa como antidepresivo natural y disminuye los niveles de estrés.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Otros alimentos que ayudan a reducir el estrés</strong></b></p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Los cereales integrales son fuente rica de dos aminoácidos, los pequeños ladrillos que forman las proteínas, llamados triptófano y lisina, que nuevamente aumentan los niveles de serotonina en el cuerpo.</li>
		<li class='mt-2'>Los plátanos y las pipas de girasol también destacan por su buena cantidad de triptófano.</li>
		<li class='mt-2'>Las nueces contienen ácidos grasos omega-3, esenciales también para la síntesis de la serotonina.</li>
		<li class='mt-2'>Los espárragos tienen niveles muy altos de ácido fólico y de triptófano, sustancias asociadas al bienestar, por segregar serotonina y endorfinas.</li>
		<li class='mt-2'>El salmón contiene proteínas de alta calidad además de omega-3, que ya hemos mencionado su importante función.</li>
		<li class='mt-2'>Las legumbres contienen vitamina B6, que permite que la serotonina viaje por el organismo.</li>
		<li class='mt-2'>Los cítricos tienen grandes cantidades de vitamina C, importante para crear neurotransmisores del placer y bienestar como la dopamina, noradrenalina y serotonina.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita previa en el Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> para cualquier duda o consulta relacionada con el estrés o la alimentación y para cualquier consulta médica que necesites. Disponemos de multitud de <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> y trabajamos con tiempos reducidos, así como con las <a href='https://sjdsevilla.com/companias' class='link-blog'>principales aseguradoras.</a></p>
		",
		"feature" => false,
		"page_title" => "Relación entre los alimentos y el estrés",
		"page_description" => "En este artículo, descubriremos la relación entre el estrés, el estado de ánimo y la alimentación."	
	],

	"sesion-acogida-sjd" => (object) [
		"fecha" => "Viernes, 17 de febrero de 2023",
		"title_noticia" => "Sesión de acogida empleados Hospital San Juan de Dios de Sevilla",
		"img_main" => "/files/img/blog/acogida-san-juan-dios-sevilla-3.jpg",
		"short_notice" => "Los días 14 y 15 de febrero, ha tenido lugar en el Hospital San Juan de Dios de Sevilla la sesión de acogida para los empleados de nuestro Hospital.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'> Los días 14 y 15 de febrero, ha tenido lugar en el Hospital San Juan de Dios de Sevilla la sesión de acogida para los empleados de nuestro Hospital.</span></h2>
		<p class='p15 third-font-gray mt-4'>Trabajadores que recientemente se han incorporado al Hospital y la Residencia San Juan de Dios de Sevilla o que ya formaban parte del equipo del Hospital, pertenecientes a todas las categorías profesionales, fueron convocados los días 14 y 15 de febrero a la Sesión de Acogida Institucional a Trabajadores que celebra la Orden Hospitalaria San Juan de Dios dentro del Plan de Acogida de los referidos centros, y que se enmarca en el desarrollo del Modelo de Gestión Integral de Personas de la Provincia Bética.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla-2.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla-6.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>La sesión formativa, dirigida por el Hermano Guillermo García, se realizó en dos bloques, el primero versó sobre la Institución, los Principios y Valores de la Orden y la figura de San Juan de Dios. Esta sesión, pretende trasladar a los trabajadores del Hospital San Juan de Dios de Sevilla, argumentos prácticos para el desarrollo de sus funciones, las características y singularidad del trabajo en el Hospital y una aproximación a un concepto esencial para la Institución, la Hospitalidad, ejercida desde los valores de calidad, respeto, responsabilidad y espiritualidad, al estilo de San Juan de Dios.</p>
		<p class='p15 third-font-gray mt-4'>Tras la finalización del primer bloque, los trabajadores y el equipo directivo tuvieron una pequeña pausa, en la que pudieron intercambiar experiencias.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla-43.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla-7.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>Se continuó el segundo bloque explicando los aspectos asistenciales y las líneas de atención que se prestan tanto desde la Orden Hospitalaria, como desde el Hospital San Juan de Dios de Sevilla y participaron el director gerente Manuel González Suárez, Herminia Pérez, responsable de Calidad, Experiencia del Paciente y Recursos Institucionales, y Rocío Ruíz, Directora de Personas y Valores.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla, trabajamos a diario para ofrecer la mejor atención sanitaria. Disponemos de la mayoría de especialidades médicas y trabajamos con las principales aseguradoras. Puedes solicitar tu cita desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a>, desde el teléfono 955 045 999, a través de Whatsapp en el nº 607 919 025 o en la APP SJD Salud.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/acogida-san-juan-dios-sevilla-8_2.jpg' alt='image' class='blog-img mt-3' style='max-width: 464px;'>
		</div>
		</div>
		",
		"feature" => false,
		"page_title" => "Sesión de acogida de empleados",
		"page_description" => "Durante los días 14 y 15 de febrero ha tenido lugar una sesión de acogida para los empleados de nuestro Hospital."
	],
	"dia-mundial-cancer-infantil" => (object) [
		"fecha" => "Miércoles, 15 de febrero de 2023",
		"title_noticia" => "15 de febrero, Día Mundial del Cáncer Infantil",
		"img_main" => "/files/img/blog/dia-mundia-cancer-infantil-san-juan-dios-sevilla.jpg",
		"short_notice" => " En el día de hoy 15 de febrero, se celebra el Día Mundial del Cáncer Infantil, un problema que afecta a más de 1000 niños al año en España.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'> En el día de hoy 15 de febrero, se celebra el Día Mundial del Cáncer Infantil, un problema que afecta a más de 1000 niños al año en España.</span></h2>
		<p class='p15 third-font-gray mt-4'>El cáncer es una enfermedad que puede afectar a cualquier persona, independientemente de su edad, género o raza. Sin embargo, cuando se trata de cáncer infantil, la situación es aún más preocupante, ya que los niños son vulnerables y necesitan una atención especializada. Es por eso que el Día Mundial del Cáncer Infantil, que se celebra cada 15 de febrero, es una oportunidad para crear conciencia sobre esta enfermedad y la necesidad de prevenirla y tratarla adecuadamente.</p>
		<p class='p15 third-font-gray mt-4'>El cáncer infantil es una enfermedad que se origina en las células del cuerpo de un niño. Aunque es relativamente raro, el cáncer infantil es la segunda causa de muerte en niños entre 1 y 14 años de edad, después de los accidentes. Los tipos de cáncer infantil más comunes incluyen la leucemia, los tumores cerebrales y los linfomas. Afortunadamente, gracias a los avances en el diagnóstico y el tratamiento, muchos niños pueden sobrevivir al cáncer infantil.</p>
		<p class='p15 third-font-gray mt-4'>Sin embargo, la lucha contra el cáncer infantil no se trata solo de tratamiento, sino también de prevención. Es por eso que el tema del Día Mundial del Cáncer Infantil de este año es \"Juntos por una cura más saludable\". La idea detrás de este tema es que la prevención y el tratamiento del cáncer infantil deben ser un esfuerzo colaborativo que involucre a todos los actores relevantes, desde los padres y los cuidadores hasta los médicos, los investigadores y los responsables políticos.</p>
		<p class='p15 third-font-gray mt-4'>La prevención del cáncer infantil implica una serie de medidas, como una dieta saludable, la actividad física, la limitación de la exposición a sustancias tóxicas y la protección contra la radiación y otros factores ambientales. Además, es importante garantizar que los niños reciban todas las vacunas recomendadas, ya que algunas infecciones pueden aumentar el riesgo de cáncer infantil.</p>
		<p class='p15 third-font-gray mt-4'>El diagnóstico temprano también es esencial en la lucha contra el cáncer infantil. Los padres y los cuidadores deben estar atentos a los signos y síntomas de la enfermedad, que pueden incluir fatiga, fiebre, pérdida de peso, dolor de huesos o articulaciones, y moretones o hemorragias inusuales. Si se detecta algún síntoma, es importante llevar al niño al médico de inmediato para un diagnóstico y tratamiento adecuados.</p>
		<p class='p15 third-font-gray mt-4'>El tratamiento del cáncer infantil puede incluir una combinación de cirugía, quimioterapia y radioterapia. También existen terapias dirigidas y terapias inmunológicas que pueden ayudar a tratar el cáncer infantil. Sin embargo, el tratamiento puede ser difícil y agotador, tanto para el niño como para su familia. Es por eso que es importante contar con un equipo de atención médica especializado en cáncer infantil que pueda brindar apoyo y asesoramiento a los padres y cuidadores.</p>
		<p class='p15 third-font-gray mt-4'>Además del tratamiento médico, es importante abordar las necesidades emocionales y psicológicas de los niños y sus familias durante el tratamiento del cáncer infantil. Muchos niños y sus familias pueden experimentar estrés, ansiedad o depresión por lo que es necesario implementar un plan de acción para abordar este tipo de problemáticas y hacer que este tipo de situaciones sea más llevadero para nuestros pequeños.</p>
		<p class='p15 third-font-gray mt-4'>Al conmemorarse el Día Mundial del Cáncer Infantil, desde el Hospital San Juan de Dios de Sevilla abogamos por una mayor conciencia social y solidaridad a fin de lograr una mejora en la calidad de vida de los niños afectados por el cáncer.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita previa en cualquiera de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> a través del teléfono 955 045 999, vía Whatsapp en el teléfono 607 919 025 o en la APP SJD Salud.</p>
		",
		"feature" => false,
		"page_title" => "15 de febrero, Día Mundial del Cáncer Infantil",
		"page_description" => "Día Mundial del Cáncer Infantil, que se celebra cada 15 de febrero, y que es una oportunidad para crear conciencia sobre esta enfermedad."
	],
	"visita-general-canonica" => (object) [
		"fecha" => "Martes, 14 de febrero de 2023",
		"title_noticia" => "Visita Canónica General de la Orden de San Juan de Dios",
		"img_main" => "/files/img/blog/visita_general_martes14.jpg",
		"short_notice" => "Desde el pasado viernes 10, ha tenido lugar la visita canónica por parte de los visitadores que forman parte del Consejo General tanto a la residencia de Sagasta como al Hospital San Juan de Dios de Sevilla.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Desde el pasado viernes 10, ha tenido lugar la visita canónica por parte de los visitadores que forman parte del Consejo General tanto a la residencia de Sagasta como al Hospital San Juan de Dios de Sevilla.</span></h2>
		<p class='p15 third-font-gray mt-4'>Desde este pasado lunes 16 de enero, tiene lugar la visita canónica general a la Provincia San Juan de Dios de España por parte del Superior General de la Orden Hospitalaria de San Juan de Dios, el hermano Jesús Etayo, al que acompañarán en calidad de visitadores dos de los hermanos que forman parte del Consejo General: Joaquín Erra y José Augusto Gaspar. Estos, a su vez, contarán con tres hermanos que harán de Secretarios de la Visita, y que son el Hno. Ramón Castejón, el Hno. Miguel Martín y el Hno. Ángel López.</p>
		<p class='p15 third-font-gray mt-4'>Dada la magnitud de la Provincia de España de la Orden de San Juan de Dios, cada uno visitará una parte del total de 80 centros, y luego realizarán conjuntamente la Visita a la Curia Provincial en Madrid y el acto de clausura. En palabras del Superior General, “la Visita Canónica es, sobre todo, un tiempo de conocimiento, acompañamiento y encuentro del Gobierno General con toda la Familia Hospitalaria de San Juan de Dios, con las Provincias, comunidades y obras apostólicas de la Orden”.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_1.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_2.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>Por ello, algunos de los objetivos principales que persigue esta ronda de encuentros por todo el territorio consisten en acompañar la vida de la Orden en los lugares donde desempeña su misión hospitalaria; conocer de primera mano la realidad de los centros y comunidades de San Juan de Dios; valorar e iluminar la realidad de cada una de ellos; y animar y proyectar su futuro siguiendo el carisma del Fundador.</p>
		<p class='p15 third-font-gray mt-4'>La Visita Canónica General es un evento importante para la institución, ya que propicia espacios de escucha, reflexión y diálogo del Gobierno General con los Comités de Dirección, las comunidades religiosas, los Equipo de Pastoral, los Comités de Ética, los colaboradores, etc. La organización del programa en cada lugar corre a cargo de los propios centros, que igualmente han colaborado en la elaboración de un informe con los datos más relevantes de su actividad.</p>
		<p class='p15 third-font-gray mt-4'>La Orden está presente en el mundo en 52 países con casi 400 centros y 160 comunidades, que a su vez se organizan en torno a 20 Provincias religiosas. Todas ellas reciben la Visita Canónica que se celebrará en el sexenio comprendido entre 2019 y 2024 bajo el lema “Salir con pasión a promover la hospitalidad”.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_3.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_4.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'>En Sevilla, el pasado día 10 de febrero, el Hno. Ángel López junto con el Hno. Agusto Gaspar, y el hermano superior de nuestro Hospital, Guillermo García, al igual que el equipo directivo del Hospital San Juan de Dios de Sevilla, realizaron la visita canónica en la residencia de mayores de la Orden de San Juan de Dios en la Calle Sagasta. Durante la visita, realizaron un recorrido por todas las instalaciones y tuvieron una jornada de convivencia con los distintos residentes y trabajadores del centro para conocer de primera mano su funcionamiento. Tras la finalización de la misma, se reunió el equipo directivo junto con el Hno. Ángel López, Hno. Augusto Gaspar y el Hno. Guillermo donde pudieron compartir las impresiones y poner en común todo lo relativo a la visita. </p>
		<p class='p15 third-font-gray mt-4'>En el día de hoy, 13 de febrero, se ha realizado la visita canónica a el Hospital San Juan de Dios de Sevilla, donde han podido visitar las nuevas instalaciones y comprobar el funcionamiento del nuevo Hospital, así como los espacios dedicados a el Centro de Atención Infantil Temprana y la residencia de Hermanos que también se encuentra en este emplazamiento. Por último, y ya en el salón de actos, el Hno. Augusto dedicó unas palabras a todo el equipo del Hospital resaltando los valores de la Orden. Finalizó la jornada con un acto en el que el comité directivo, pudo dar a conocer al Hno. Augusto el funcionamiento del hospital y las acciones que se están llevando a cabo desde el mismo para la consecución de los valores de la Orden.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_9.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/visita_general_martes14_8.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		",
		"feature" => false,
		"page_title" => "Visita Canónica General de la Orden de San Juan de Dios",
		"page_description" => "El pasado jueves y viernes tuvimos la visita canónica en el Hospital San Juan de Dios de Sevilla y en nuestra residencia de la calle Sagasta."
	],

	"consejos-prevenir-diabetes" => (object) [
		"fecha" => "Viernes, 10 de febrero de 2023",
		"title_noticia" => "5 consejos para la prevención de la diabetes",
		"img_main" => "/files/img/blog/consejos-diabetes-san-juan-de-dios.jpg",
		"short_notice" => "La diabetes es una enfermedad crónica que afecta a millones de personas en todo el mundo.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>La diabetes es una enfermedad crónica que afecta a millones de personas en todo el mundo. </span></h2>
		<p class='p15 third-font-gray mt-4'>Se caracteriza por un aumento en los niveles de azúcar en la sangre y puede tener graves consecuencias para la salud si no se trata adecuadamente</p>
		<p class='p15 third-font-gray mt-4'>Afortunadamente, existen medidas que puedes tomar para prevenir o retrasar la aparición de la diabetes. Os facilitamos 5 consejos para la prevención de la diabetes:</p>
		<p class='p15 third-font-gray mt-4'>1. Mantén una dieta saludable: Una dieta equilibrada que incluya alimentos ricos en nutrientes es esencial para prevenir la diabetes. Trata de limitar el consumo de alimentos procesados y azúcares añadidos, y en su lugar, elige alimentos frescos y naturales como frutas, verduras, granos integrales y proteínas magras. Además, trata de controlar tus porciones y evita comer en exceso. Los alimentos con un alto contenido de fibra promueven la pérdida de peso y reducen el riesgo de sufrir diabetes. Come una variedad de alimentos saludables con un alto contenido de fibra, por ejemplo: frutas, vegetales sin almidón, hortalizas de hojas verdes y coliflor, legumbres, cereales, pastas y panes integrales, etc.</p>
		<p class='p15 third-font-gray mt-4'>2. Hacer ejercicio regularmente: El ejercicio es esencial para mantener un peso saludable y controlar los niveles de azúcar en la sangre. Intenta hacer 30 minutos o más de ejercicio aeróbico moderado a intenso, como caminar a paso ligero, nadar, andar en bicicleta o correr, la mayoría de los días, durante un total de al menos 150 minutos por semana. Los ejercicios de resistencia, si se hacen de 2 a 3 veces por semana, aumentan la fortaleza, el equilibrio y la capacidad de mantener una vida activa. El entrenamiento de resistencia comprende levantamiento de pesas, yoga y calistenia.</p>
		<p class='p15 third-font-gray mt-4'>3. Controlar el peso: El sobrepeso y la obesidad son factores de riesgo importantes para la diabetes. Si tienes sobrepeso, trata de perder peso gradualmente y de manera saludable a través de una dieta equilibrada y el ejercicio. La American Diabetes Association (Asociación Americana de la Diabetes) recomienda que las personas con prediabetes bajen al menos del 7% al 10% de su peso para prevenir el avance de la enfermedad. Cuanto más peso bajes, mayores beneficios lograrás.</p>
		<p class='p15 third-font-gray mt-4'>4. Dejar de fumar: El tabaquismo es perjudicial para la salud en general y aumenta el riesgo de desarrollar diabetes. Si fumas, dejar de hacerlo es una de las mejores cosas que puedes hacer para prevenir la enfermedad. Habla con nuestros especialistas sobre programas y tratamientos que puedan ayudarte a dejar de fumar.</p>
		<p class='p15 third-font-gray mt-4'>5. Omite las dietas relámpago y toma decisiones más saludables. Muchas dietas relámpago, como las dietas del índice glucémico, las dietas cetogénicas o las dietas paleolíticas, pueden ayudarte a perder peso. Sin embargo, hay muy poca investigación acerca de los beneficios a largo plazo de estas dietas o su beneficio en la prevención de la diabetes.</p>
		<p class='p15 third-font-gray mt-4'>Tu objetivo de dieta debería ser perder peso y luego mantener un peso más saludable de ahí en adelante. Por lo tanto, las decisiones de una alimentación saludable deben incluir una estrategia que puedas mantener como un hábito para toda la vida.</p>
		<p class='p15 third-font-gray mt-4'>Habla con tu médico sobre tus inquietudes y cómo prevenir la diabetes. El médico verá con buenos ojos tu esfuerzo por prevenir la diabetes y podría darte más sugerencias, de acuerdo con tus antecedentes médicos y otros factores.</p>
		<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios de Sevilla, disponemos del mejor equipo de endocrinos, liderados por el Dr. Alfonso Manuel Soto, que tiene disponible su programa Peso y Salud para trabajar todo lo relacionado con la nutrición y los problemas endocrinos. Puedes solicitar cita previa desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> en el teléfono 955 045 999, en la APP SJD Salud o contactando vía Whatsapp en el teléfono 607 919 025.</p>
		",
		"feature" => false,
		"page_title" => "5 consejos para la prevención de la diabetes",
		"page_description" => "En el artículo de hoy, os presentamos unos consejos para la prevención y para sobrellevar la diabetes."
	],
	"mesa-informativa-hepaticos" => (object) [
		"fecha" => "Miércoles, 08 de febrero de 2023",
		"title_noticia" => "Visita Asociación Andaluza de Trasplantados Hepáticos",
		"img_main" => "/files/img/blog/mesa_informativa_transplantes_hepaticos42.jpg",
		"short_notice" => "Hemos tenido el privilegio de contar en el día de hoy en el Hospital San Juan de Dios de Sevilla con la Asociación Andaluza de Trasplantados Hepáticos",
		"content" => "
		<p class='p15 third-font-gray mt-4'>En el día de hoy, en el Hospital San Juan de Dios de Sevilla, ha tenido lugar una “Mesa Informativa de la Asociación Andaluza de Trasplantados Hepáticos” donde han participado el director médico de nuestro hospital, Miguel Ángel Sánchez Dalp, Francisco Javier Consegliere, director de enfermería y el presidente de la Asociación de Trasplantados Hepáticos, Juan Gordillo Gaviño. También estuvo presente el Dr. Miguel Ángel Gómez Bravo, que es un reputado cirujano especializado en cirugías de patologías del hígado, del páncreas, de la vesícula biliar y vías biliares y que también forma parte del equipo del Hospital San Juan de Dios de Sevilla. </p>
		<p class='p15 third-font-gray mt-4'>En el siguiente artículo, os facilitamos todos los detalles respecto a las enfermedades hepáticas, sus síntomas, causas y diagnóstico.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Qué son las enfermedades o problemas hepáticos?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>El hígado es un órgano que se encuentra justo debajo de la caja torácica en el lado derecho del abdomen. Su función principal y esencial para el organismo es digerir los alimentos y eliminar las sustancias tóxicas del organismo.</p>
		<p class='p15 third-font-gray mt-4'>Los problemas hepáticos son una variedad de afecciones que afectan al hígado, uno de los órganos más importantes del cuerpo que cumple varias funciones vitales, como filtrar toxicidad, producir bilis y almacenar nutrientes. Algunas de las afecciones hepáticas incluyen hepatitis, cirrosis y enfermedad hepática grasa no alcohólica.</p>
		<p class='p15 third-font-gray mt-4'>Las enfermedades hepáticas más frecuentes son la hepatitis A, B o C, la cirrosis, el carcinoma hepatocelular, la ictericia, el hígado graso y la hemocromatosis.</p>
		<p class='p15 third-font-gray mt-4'>La enfermedad hepática puede ser heredada (genética), aunque también pueden ser causadas por una variedad de factores que dañan el hígado, como los virus, el consumo de alcohol y la obesidad.</p>
		<p class='p15 third-font-gray mt-4'>Con el tiempo, las afecciones que dañan el hígado pueden provocar cicatrización (cirrosis), esto causa insuficiencia hepática que es una afección potencialmente mortal, pero si el  tratamiento se inicia de manera temprana, puede dar al hígado tiempo para sanar.</p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos2.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos3.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'><b><strong>Síntomas de la enfermedad hepática</strong></b></p>
		<p class='p15 third-font-gray mt-4'>La enfermedad hepática no siempre causa signos y síntomas perceptibles. Si se presentan signos y síntomas de enfermedad hepática, estos pueden incluir los siguientes:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Color amarillento en los ojos y piel (ictericia)</li>
		<li class='mt-2'>Hinchazón y dolor abdominal</li>
		<li class='mt-2'>Hinchazón en las piernas y en los tobillos</li>
		<li class='mt-2'>Picazón en la piel</li>
		<li class='mt-2'>Orina de color oscuro</li>
		<li class='mt-2'>Color pálido de las heces</li>
		<li class='mt-2'>Fatiga crónica</li>
		<li class='mt-2'>Náuseas o vómitos</li>
		<li class='mt-2'>Pérdida del apetito</li>
		<li class='mt-2'>Tendencia a que aparezcan moretones con facilidad</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Causas de la enfermedad hepática</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Existen distintos factores de riesgo que aumentan el riesgo de que una persona padezca una enfermedad hepática. Algunos de ellos serían los siguientes:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Consumo excesivo de bebidas alcohólicas</li>
		<li class='mt-2'>Consumo de drogas </li>
		<li class='mt-2'>Tatuajes o piercings realizados en locales no regulados</li>
		<li class='mt-2'>Relaciones sexuales sin protección</li>
		<li class='mt-2'>Diabetes</li>
		<li class='mt-2'>Obesidad</li>
		<li class='mt-2'>Exposición prolongada a productos químicos</li>
		</ul>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos4.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos5.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		<p class='p15 third-font-gray mt-4'><b><strong>Diagnóstico de la enfermedad</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Descubrir la causa y extensión de la lesión hepática es importante para indicar un tratamiento. El médico comenzará realizando un exámen físico minucioso, basándose en el historial médico.</p>
		<p class='p15 third-font-gray mt-4'>Para el diagnóstico de la enfermedad, pueden realizarse los siguientes tipos de prueba, que el especialista recomendará en función de la gravedad que detecte en el paciente:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Análisis de sangre. Se puede usar un conjunto de análisis de sangre conocido como análisis de la función hepática para diagnosticar la enfermedad hepática. Se pueden hacer otros análisis de sangre para detectar afecciones genéticas o problemas hepáticos específicos.</li>
		<li class='mt-2'>Pruebas por imágenes. Una ecografía, una resonancia magnética o una tomografía computarizada, puede mostrar daño en el hígado.</li>
		<li class='mt-2'>Estudio de una muestra de tejido. La extracción de una muestra de tejido (biopsia) del hígado puede ayudar a diagnosticar la enfermedad hepática y a buscar signos de daño hepático. Este método se realiza usando una aguja larga que se introduce en la piel para tomar o extraer una muestra de tejido que posteriormente es enviada a un laboratorio para su análisis.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Qué especialista se encarga de tratar este tipo de enfermedades?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Los especialistas encargados de tratar las enfermedades hepáticas son aquellos especialistas especializados en el aparato digestivo, que además del hígado, se encargan del tratamiento de enfermedades relacionadas con el tracto gastrointestinal, el páncreas o las vías biliares.</p>
		<p class='p15 third-font-gray mt-4'>La unidad de aparato digestivo del Hospital San Juan de Dios de Sevilla está liderada por el Dr. José Manuel Infantes Hernández y la Dra. Rocío Llorca Fernández. Puedes solicitar cita previa en la especialidad de <a href='https://sjdsevilla.com/digestivo-sevilla' class='link-blog'>aparato digestivo</a> o en cualquier de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas disponibles</a> llamando al +34 955 045 999 o desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		<div class='row'>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos6.jpg' alt='image' class='blog-img mt-3'>
		</div>
		<div class='col-12 col-md-6'>
		<img src='/files/img/blog/mesa_informativa_transplantes_hepaticos7.jpg' alt='image' class='blog-img mt-3'>
		</div>
		</div>
		",
		"feature" => false,
		"page_title" => "Visita Asociación Andaluza de Trasplantados Hepáticos",
		"page_description" => "El dia 8 de febrero, en el Hospital San Juan de Dios de Sevilla, ha venido a visitarnos la Asociación Andaluza de Trasplantados Hepáticos que ha tenido la oportunidad de montar una mesa informativa. "
	],
	"la-quimioterapia" => (object) [
		"fecha" => "Lunes, 06 de febrero de 2023",
		"title_noticia" => "La quimioterapia: efectos secundarios y cómo prevenirlos",
		"img_main" => "/files/img/blog/quimioterapia-san-juan-dios-sevilla.jpg",
		"short_notice" => "Con motivo del día Mundial Contra el Cáncer, desde el Hospital San Juan de Dios de Sevilla, os facilitamos unos consejos para paliar o disminuir los efectos secundarios producidos por la quimioterapia y que pueden ayudar a mejorar la calidad de vida de las personas que han pasado o estén pasando por este proceso.",
		"content" => "
		<p class='p15 third-font-gray mt-4'>Con motivo del día Mundial Contra el Cáncer, desde el Hospital San Juan de Dios de Sevilla, os facilitamos unos consejos para paliar o disminuir los efectos secundarios producidos por la quimioterapia y que pueden ayudar a mejorar la calidad de vida de las personas que han pasado o estén pasando por este proceso.</p>
		<p class='p15 third-font-gray mt-4'>La quimioterapia es un tratamiento común utilizado para tratar diversos tipos de cáncer. Sin embargo, también puede causar efectos secundarios indeseados que pueden afectar la calidad de vida de un paciente. Os facilitamos una lista de algunos de los efectos secundarios más comunes de la quimioterapia y cómo abordarlos.</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Fatiga: La fatiga es uno de los efectos secundarios más comunes de la quimioterapia. Puede ser difícil para el paciente sentirse energizado y realizar sus actividades diarias. Se recomienda hacer ejercicio muy moderado (como pasear o andar a un ritmo medio) y dormir lo suficiente para ayudar a combatir la fatiga.</li>
		<li class='mt-2'>Náuseas y vómitos: La quimioterapia puede causar náuseas y vómitos, especialmente en las primeras horas después de recibir el ciclo. Se recomienda comer comidas pequeñas y frecuentes y evitar comidas pesadas antes de la quimioterapia. También es importante beber suficiente agua y evitar alimentos grasos.</li>
		<li class='mt-2'>Pérdida de apetito: La quimioterapia puede disminuir el apetito, lo que puede hacer que sea difícil para el paciente mantenerse bien alimentado. Se recomienda comer alimentos ricos en proteínas y calorías para ayudar a mantener el peso.</li>
		<li class='mt-2'>Pérdida de cabello: La quimioterapia puede causar la pérdida de cabello, que puede ser una experiencia traumática para algunos pacientes. Se pueden usar pelucas, bandas y otros accesorios para ayudar a cubrir la pérdida de cabello.</li>
		<li class='mt-2'>Infecciones: La quimioterapia puede debilitar el sistema inmunológico, lo que aumenta el riesgo de infecciones. Se recomienda evitar el contacto con personas enfermas y lavarse las manos con frecuencia para ayudar a prevenir infecciones.</li>
		<li class='mt-2'>Problemas de la piel: La quimioterapia puede causar sequedad, picazón y otros problemas de la piel. Se recomienda usar cremas hidratantes y evitar la exposición prolongada al sol.</li>
		<li class='mt-2'>Problemas de la boca: La quimioterapia puede causar sequedad y dolor en la boca, así como infecciones bucales. Se recomienda mantener la boca limpia y húmeda y evitar alimentos ácidos.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Además de todos estos efectos secundarios, que son los más comunes, pueden darse otros problemas derivados de la quimioterapia. Es importante recordar que los efectos secundarios de la quimioterapia son temporales y generalmente disminuyen después de que finaliza el tratamiento. Si los síntomas son graves o interfieren en la vida diaria, es importante hablar con un especialista para obtener más ayuda.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita previa en el Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> para cualquier duda o consulta relacionada con la quimioterapia o para cualquier consulta médica que necesites. Disponemos de multitud de <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> y trabajamos con tiempos reducidos, así como con las principales aseguradoras.</p>
		",
		"feature" => false,
		"page_title" => "La quimioterapia: efectos secundarios y cómo prevenirlos",
		"page_description" => "Os presentamos unos consejos para paliar o disminuir los efectos secundarios de la quimioterapia y que pueden ayudar a mejorar nuestra calidad de vida."
	],
	"dia-internacional-cancer" => (object) [
		"fecha" => "Viernes, 03 de febrero de 2023",
		"title_noticia" => "4 de febrero, Día Internacional contra el Cáncer",
		"img_main" => "/files/img/blog/dia-mundia-cancer-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "El 4 de febrero, se celebra el Día Mundial contra el Cáncer promovido por el Centro Internacional de Investigaciones sobre el Cáncer (CIIC), la Unión Internacional contra el Cáncer (UICC) y la Organización Mundial de la Salud.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>Conociendo lo que es el cáncer, sus factores de riesgo, síntomas y tratamientos</h2>
		<p class='p15 third-font-gray mt-4'>El 4 de febrero, se celebra el Día Mundial contra el Cáncer promovido por el Centro Internacional de Investigaciones sobre el Cáncer (CIIC), la Unión Internacional contra el Cáncer (UICC) y la Organización Mundial de la Salud. El objetivo de este día es aumentar la concienciación y movilizar a la sociedad para el avance en la prevención y el control de esta enfermedad que está tan presente en nuestra sociedad.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Qué es el cáncer?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Todos hemos oído hablar de cáncer, y la mayoría de nosotros, probablemente conocemos a personas con esta enfermedad o que la han padecido y que causa tanto temor. Pero ¿sabemos realmente qué es el cáncer?</p>
		<p class='p15 third-font-gray mt-4'>El cáncer es una enfermedad que hace que un grupo de células del organismo crezcan de manera anómala e incontrolada dando lugar a un bulto o masa. Ocurre en todos los cánceres excepto en la leucemia (cáncer en la sangre). Si no se trata con la antelación suficiente, el tumor o bulto puede invadir el tejido anexo al tumor, y puede provocar metástasis en distintos puntos del organismo y se disemina a otros órganos o tejidos.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Factores de riesgo</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Existen muchos tipos de cáncer que una persona puede desarrollar, debido a causas múltiples. En muchos casos, los factores de riesgo no pueden modificarse, pero alrededor de un tercio de los casos de cáncer pueden evitarse reduciendo los factores de riesgo principales.</p>
		<p class='p15 third-font-gray mt-4'>Los factores de riesgo que no modificables son la edad o la genética y algunos que sí podemos controlar son, entre otros:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Alimentación y dieta.</li>
		<li class='mt-2'>Ejercicio físico y actividad.</li>
		<li class='mt-2'>Consumo de alcohol, tabaco y drogas.</li>
		<li class='mt-2'>Determinadas infecciones.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Además de estos factores de riesgo, que son directos, también podemos encontrar factores de riesgo indirectos como pueden ser la contaminación, la polución o la exposición laboral a elementos nocivos como el amianto, alquitrán, arsénico, etc..</p>
		<p class='p15 third-font-gray mt-4'><b><strong>El cáncer en cifras</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Aproximadamente se estima que uno de cada dos hombres y una de cada tres mujeres tendrá cáncer en algún momento de su vida. Cada año se diagnostican en el mundo más de 14 millones de casos nuevos y la enfermedad provoca 9,6 millones de muertes al año.</p>
		<p class='p15 third-font-gray mt-4'>Los nuevos casos de cáncer han seguido un aumento progresivo durante los últimos años. En 2021, último año analizado por las estadísticas, en España aparecieron 285.530 casos nuevos según cifras de la Asociación Española contra el Cáncer y supusieron un 2,36% más respecto al año anterior.</p>
		<img src='/files/img/blog/grafico-evolucion-de-casos-de-cancer.png' alt='image' class='mx-auto d-block img-blog-responsive'>
		<p class='p15 third-font-gray mt-4'>El tipo de cáncer más común tanto en hombres como en mujeres en España durante el año 2021 fue el de colon y recto, seguido por el de próstata en hombres y el de mama en mujeres.</p>
		<img src='/files/img/blog/casos-clinicos-cancer.png' alt='image' class='mx-auto d-block img-blog-responsive'>
		<p class='p15 third-font-gray mt-4'><b><strong>Futuras estimaciones</b></strong></p>
		<p class='p15 third-font-gray mt-4'>La Sociedad Española de Oncología Médica (SEOM) presentó el 1 de febrero de 2022 los datos del informe 'El cáncer en España en 2022', en el que se prevé que se diagnostiquen 280.100 casos nuevos, con mayor predominancia en hombres (166.066) que en mujeres (120.035), y en estos datos no se ha tenido en cuenta el efecto de la COVID en los tumores.</p>
		<p class='p15 third-font-gray mt-4'>La Sociedad Española de Oncología Médica (SEOM) en los datos del informe “El cáncer en España en 2022”, prevé que durante el año 2023 se diagnostiquen casi 300.000 casos nuevos, con mayor predominancia de los hombres sobre las mujeres.</p>
		<p class='p15 third-font-gray mt-4'>Entre los tumores más frecuentes, las entidades han señalado que será el de colón y recto el predominante con más de 43.000 casos nuevos, seguido del cáncer de mama (34.000), pulmón (31.000) y próstata (30.884). Por sexo, el tumor más frecuente en hombres será el de próstata, con más de 31.000 casos, seguido por el tumor de colón y recto (26.000) y pulmón (22.000). En el caso de las mujeres, el tumor más repetido será el de mama, seguido por el de colon y recto, además del cáncer de pulmón, que será el tercero más diagnosticado.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Síntomas más significativos</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Existen diversos tipos de cánceres y obviamente los síntomas varían de una persona a otra, pero también es cierto que algunos síntomas son muy significativos y hay que prestarles atención. La presencia de estos síntomas no es sinónimo de padecer cáncer, no obstante se deben tener en cuenta:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Bultos o masas extrañas en cualquier parte del cuerpo</li>
		<li class='mt-2'>Fatiga, falta de aire, tos o cansancio</li>
		<li class='mt-2'>Hemorragias o sangrados imprevistos</li>
		<li class='mt-2'>Falta de apetito o pérdida de peso repentina</li>
		<li class='mt-2'>Dolor</li>
		<li class='mt-2'>Cambios en un lunar o manchas en la piel</li>
		<li class='mt-2'>Sudores nocturnos intensos</li>
		<li class='mt-2'>Complicaciones al orinar, tragar o al realizar cualquier necesidad fisiológica</li>
		<li class='mt-2'>Cambios en las mamas</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Técnicas y tratamientos del cáncer</b></strong></p>
		<p class='p15 third-font-gray mt-4'>La detección temprana en el cáncer adquiere una importancia fundamental , y esto permite que existan determinadas pruebas que diagnostiquen la enfermedad en fases muy tempranas, aumentando la probabilidad de curación, como es el caso de los exámenes de cáncer de pulmón, mama, próstata, colorrectal y cervical entre otros.</p>
		<p class='p15 third-font-gray mt-4'>Dependiendo del tipo de cáncer y el estado en el que se encuentre, así como la salud del paciente, se pueden emplear distintas técnicas y tratamientos entre las que podemos destacar:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Cirugía</li>
		<li class='mt-2'>Quimioterapia</li>
		<li class='mt-2'>Radioterapia</li>
		<li class='mt-2'>Inmunoterapia</li>
		<li class='mt-2'>Terapia génica</li>
		<li class='mt-2'>Hormonoterapia</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla estamos comprometidos a la lucha contra el cáncer y ofrecemos un abordaje integral del mismo que abarca tanto pruebas diagnósticas, como tratamientos y cirugías.</p>
		<p class='p15 third-font-gray mt-4'>Además contamos con todas las <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a>, tanto si acudes con seguro privado,
		 ya que trabajamos con las <a href='https://sjdsevilla.com/companias' class='link-blog'>principales aseguradoras</a>, como de manera particular. Puedes solicitar tu cita con cualquiera de 
		 nuestros especialistas desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> o bien llamando directamente al teléfono 
		 +34 955 045 999.</p>
		
		",
		"feature" => false,
		"page_title" => "4 de febrero, Día Internacional contra el Cáncer",
		"page_description" => "El día 4 de febrero se celebra el Día Mundial contra el Cáncer. En este artículo os facilitamos toda la información sobre qué es el cáncer."
	],
	"alejandro-ruiz-moya" => (object) [
		"fecha" => "Miércoles, 01 de febrero de 2023",
		"title_noticia" => "Alejandro Ruiz Moya, jefe de equipo de cirugía plástica",
		"img_main" => "/files/img/blog/dr-ruiz-molla-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "El Dr. Alejandro Ruiz Moya es especialista en Cirugía Plástica, Reparadora y Estética, pertenece a la Sociedad Española de Cirugía Plástica (SECPRE) y al Real Colegio de Médicos de Sevilla. Cuenta con una dilatada experiencia tanto en cirugía estética como reparadora y microcirugía, compaginando ambas disciplinas.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>El Dr. Ruiz Moya se incorpora como jefe de equipo a la especialidad de cirugía plástica, reparadora y estética en el Hospital San Juan de Dios de Sevilla.</h2>
		<p class='p15 third-font-gray mt-4'>El Dr. Alejandro Ruiz Moya es especialista en Cirugía Plástica, Reparadora y Estética, pertenece a la Sociedad Española de Cirugía Plástica (SECPRE) y al Real Colegio de Médicos de Sevilla. Cuenta con una dilatada experiencia tanto en cirugía estética como reparadora y microcirugía, compaginando ambas disciplinas.</p>
		<p class='p15 third-font-gray mt-4'>El Dr. Ruiz Moya es Doctor en Medicina cum laude por la Universidad de Sevilla, y se ha formado en centros nacionales e internacionales de reconocido prestigio, como Nueva York, Madrid o Barcelona. Además, cuenta con una reconocida trayectoria científica, con numerosas publicaciones en revistas científicas internacionales y libros, así como premios internacionales a sus estudios. Su enfoque en la investigación y la innovación le permite ofrecer a sus pacientes los tratamientos más avanzados y efectivos disponibles.</p>
		<p class='p15 third-font-gray mt-4'>Destaca por su habilidad para combinar técnicas médicas avanzadas con un enfoque cuidadoso y personalizado para cada paciente. Se asegura de comprender las expectativas y necesidades individuales de cada paciente antes de recomendar un tratamiento específico. Su objetivo es ayudar a cada paciente a mejorar su autoestima y confianza a través de una cirugía plástica exitosa.</p>
		<p class='p15 third-font-gray mt-4'>Desarrolla su actividad de Cirugía Plástica y Estética en Sevilla en la Clínica Mapfre Luis Montoto, el Hospital Quirón Infanta Luisa, en Almendralejo en la Clínica Vivanta y actualmente en el Hospital San Juan de Dios de Sevilla . Buscando siempre resultados naturales, posee amplia experiencia en cirugía mamaria (aumento de pecho, reducción, mastopexia o elevación, etc), corporal (liposucción, abdominoplastia, cirugía genital, etc) y facial (blefaroplastia, rinoplastia, otoplastia, etc).</p>
		<p class='p15 third-font-gray mt-4'>En 2021 es nominado en los Doctoralia Awards 2021 entre los mejores cirujanos especialistas en España en la modalidad de Cirugía Plástica, Estética y Reparadora.</p>
		<p class='p15 third-font-gray mt-4'>Si está interesado en mejorar su apariencia física y sentirse más seguro y confiado, el Dr. Alejandro Ruiz Moya es el mejor profesional a tener en cuenta. Para obtener más información sobre sus servicios y para programar una consulta, puede solicitar cita previa en la especialidad de <a href='https://sjdsevilla.com/cirugia-plastica-sevilla' class='link-blog'>cirugía plástica, reparadora y estética</a> desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> o bien contactando en el teléfono 955 045 999.</p>
		",
		"feature" => false,
		"page_title" => "Alejandro Ruiz Moya, jefe de equipo de cirugía plástica",
		"page_description" => "El Dr. Alejandro Ruiz Moya es actualmente jefe de equipo de cirugía plástica del Hospital San Juan de Dios de Sevilla."
	],
	"los-ictus" => (object) [
		"fecha" => "Lunes, 30 de enero de 2023",
		"title_noticia" => "Los ictus: síntomas, prevención y tratamiento",
		"img_main" => "/files/img/blog/ictus-blog-san-juan-dios-sevilla.jpg",
		"short_notice" => "Un ictus es una emergencia médica que se produce cuando el suministro de sangre al cerebro se interrumpe.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>Conoce todos los detalles respecto a los ictus, sus síntomas y tratamientos, así como la prevención</h2>
		<p class='p15 third-font-gray mt-4'>Un ictus es una emergencia médica que se produce cuando el suministro de sangre al cerebro se interrumpe. Esto puede ser debido a la obstrucción de un vaso sanguíneo o a un derrame cerebral. Los ictus son una de las principales causas de discapacidad y muerte en todo el mundo.</p>
		<p class='p15 third-font-gray mt-4'>Los síntomas de un ictus incluyen debilidad en un lado del cuerpo, dificultad para hablar o entender el lenguaje, visión borrosa en un ojo, dificultad para caminar o mantener el equilibrio, y dolor de cabeza intenso sin causa aparente.</p>
		<p class='p15 third-font-gray mt-4'>Si experimenta estos síntomas, es importante buscar atención médica de inmediato, ya que un tratamiento temprano puede reducir el daño cerebral y mejorar las posibilidades de recuperación.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Tratamiento contra el ictus</strong></b></p>
		<p class='p15 third-font-gray mt-4'>El paciente con ictus debe ser atendido por el servicio de Neurología, que es la especialidad médica encargada de tratar este tipo de problemática. Respecto al tratamiento contra el ictus, se trata principalmente en disolver los trombos que se han formado tras sufrirlo. Puede realizarse de diferentes formas:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Tratamiento farmacológico. Se aplican fármacos fibrinolíticos (rt-PA) por vía venosa y, a veces, arterial.</li>
		<li class='mt-2'>Tratamiento quirúrgico. En ocasiones, será necesario realizar una intervención quirúrgica para extirpar la placa de ateroma formada o dilatar la arteria mediante una angioplastia con stent. Se introduce un catéter cuya punta termina en un pequeño balón inflable que, al hincharse, comprime la placa contra las paredes arteriales.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si el ictus es hemorrágico, el tratamiento adecuado es la embolización del aneurisma con colis, sustancias que taponan las arterias dañadas e impiden que vuelva a romperse. También habrá que tratar y prevenir los factores de riesgo para evitar la aparición de nuevos episodios: hipertensión arterial, enfermedades cardiacas, diabetes mellitus, etc.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Prevención del ictus</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Hay varias formas de prevenir un ictus. Primero, es importante mantener un estilo de vida activo y saludable. Esto incluye hacer ejercicio regularmente, seguir una dieta saludable y limitar el consumo de alcohol y tabaco. También es importante controlar los factores de riesgo para el ictus, como la presión arterial alta, el colesterol alto y la diabetes.</p>
		<p class='p15 third-font-gray mt-4'>Otro factor importante en la prevención del ictus es el control del estrés. El estrés crónico puede aumentar la presión arterial y aumentar el riesgo de sufrir un ictus. Por lo tanto, es importante encontrar maneras de manejar el estrés, como la meditación, el yoga o la terapia.</p>
		<p class='p15 third-font-gray mt-4'>Además, es importante dormir suficientes horas cada noche. La privación del sueño puede aumentar el riesgo de sufrir un ictus, así como otros problemas de salud como la hipertensión y la obesidad. Por lo tanto, es importante tratar de obtener entre 7 y 9 horas de sueño cada noche.</p>
		<p class='p15 third-font-gray mt-4'>Otro factor importante en la prevención del ictus es el control de los factores de riesgo cardiovasculares. Estos incluyen hipertensión, enfermedad cardíaca, fibrilación auricular y antecedentes familiares de ictus. Es importante trabajar con su médico para controlar estos factores y reducir su riesgo de sufrir un ictus.</p>
		<p class='p15 third-font-gray mt-4'>Finalmente, es importante conocer los signos y síntomas de un ictus y actuar de inmediato si se experimentan. La rápida identificación y tratamiento de un ictus puede reducir el daño cerebral y mejorar las posibilidades de recuperación.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita con cualquiera de nuestros especialistas, así como en cualquiera de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		<p class='p15 third-font-gray mt-4'>Trabajamos con las principales aseguradoras y contamos con plazos reducidos en citas médicas.</p>
		",
		"feature" => false,
		"page_title" => "Los ictus: síntomas, prevención y tratamiento",
		"page_description" => "En el artículo de hoy, conoceremos todos los detalles respecto a los ictus, cómo y porque se producen, sus síntomas y tratamientos y cómo prevenirlos. "
	],
	"ocho-consejos-prevenir-dolor" => (object) [
		"fecha" => "Viernes, 27 de enero de 2023",
		"title_noticia" => "Consejos para prevenir el dolor cervical, lumbar y dorsal",
		"img_main" => "/files/img/blog/consejos-dolor-espalda-san-juan-dios-sevilla.jpg",
		"short_notice" => "El dolor en la columna vertebral es un problema común que puede afectar a la calidad de vida de las personas.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>Desde el Hospital San Juan de Dios de Sevilla os facilitamos unos consejos para los dolores de espalda y aprender a prevenirlos</h2>
		<p class='p15 third-font-gray mt-4'>El dolor en la columna vertebral es un problema común que puede afectar a la calidad de vida de las personas. El dolor cervical, dorsal y lumbar puede ser causado por una variedad de factores, como la mala postura, el estrés, la sobrecarga de trabajo, el sedentarismo y lesiones. Sin embargo, existen varios consejos que pueden ayudar a prevenir o aliviar el dolor en la columna vertebral.</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Practique una buena postura: Mantener una buena postura al sentarse, caminar y levantar objetos pesados ​​puede ayudar a aliviar el dolor en la columna vertebral. Es importante mantener la columna vertebral recta y evitar inclinarse hacia adelante o hacia atrás.</li>
		<li class='mt-2'>Realice ejercicios de fortalecimiento: Los ejercicios de fortalecimiento para la espalda y los abdominales pueden ayudar a fortalecer los músculos que sostienen la columna vertebral y prevenir lesiones.</li>
		<li class='mt-2'>Realice ejercicios de estiramiento: Los ejercicios de estiramiento pueden ayudar a aliviar la tensión en los músculos y mejorar la flexibilidad de la columna vertebral.</li>
		<li class='mt-2'>Evite estar sentado o de pie por períodos prolongados: El estar sentado o de pie por períodos prolongados puede causar tensiones y dolores en la columna vertebral. Es importante cambiar de posición con regularidad y moverse para evitar la rigidez.</li>
		<li class='mt-2'>Use una almohada adecuada: Una almohada adecuada puede ayudar a mantener una buena postura durante el sueño y aliviar el dolor en la columna vertebral.</li>
		<li class='mt-2'>Evite el sobrepeso: El sobrepeso puede aumentar el estrés en la columna vertebral y contribuir al dolor. Mantener un peso saludable puede ayudar a aliviar el dolor en la columna vertebral.</li>
		<li class='mt-2'>Descansar adecuadamente: El sueño es esencial para la recuperación y el bienestar general del cuerpo. El no obtener suficiente sueño o tener una mala calidad del sueño puede contribuir al dolor en la columna vertebral.</li>
		<li class='mt-2'>Considere la terapia física: Si el dolor en la columna vertebral no mejora con los cambios en el estilo de vida, la terapia física puede ser beneficiosa. Los fisioterapeutas pueden ayudar a aliviar el dolor y mejorar la movilidad.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cuándo acudir a nuestro médico?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Se aconseja acudir al especialista cuando se presenten los siguientes síntomas:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>El dolor persiste después de varias semanas de molestias.</li>
		<li class='mt-2'>El dolor es intenso y no mejora con el descanso.</li>
		<li class='mt-2'>El dolor ocasiona problemas de vejiga o intestino.</li>
		<li class='mt-2'>El dolor está acompañado por fiebre.</li>
		<li class='mt-2'>Aparece después de una caída, un golpe en la espalda o cualquier otra lesión.</li>
		<li class='mt-2'>El dolor viene acompañado de una pérdida de peso importante sin causa aparente.</li>
		<li class='mt-2'>Provoca debilidad, entumecimiento u hormigueo en brazos o piernas.</li>
		<li class='mt-2'>El dolor se extiende a una o ambas piernas o brazos.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>En conclusión, el dolor en la columna vertebral puede ser causado por una variedad de factores, pero hay varios consejos que pueden ayudar a prevenir o aliviar el dolor en la columna cervical, dorsal y lumbar. Practicar una buena postura, realizar ejercicios de fortalecimiento y estiramiento, evitar estar sentado o de pie por períodos prolongados, usar una almohada adecuada, evitar el sobrepeso, descansar adecuadamente y considerar la terapia física son algunas de las medidas que pueden ayudar a reducir el dolor en la columna vertebral. Es importante siempre consultar a un profesional de la salud si el dolor es persistente o si se presentan otros síntomas.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla, disponemos de los mejores especialistas para el tratamiento de los dolores de las cervicales, lumbares y dorsales, así como todas las <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> disponibles para cualquier tipo de consulta de salud. Puedes solicitar tu cita previa desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		",
		"feature" => false,
		"page_title" => "Consejos para prevenir el dolor cervical, lumbar y dorsal",
		"page_description" => "Desde el Hospital San Juan de Sevilla, os dejamos unos consejos para prevenir los dolores de espalda que tanto afectan a la calidad de vida de las personas. "
	],

	"consejos-cuidar-corazon" => (object) [
		"fecha" => "Miércoles, 25 de enero de 2023",
		"title_noticia" => "Consejos médicos para el cuidado del corazón",
		"img_main" => "/files/img/blog/consejos-cuidados-corazon-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "El corazón es uno de los órganos más importantes del cuerpo humano, ya que es responsable de bombear sangre a través del cuerpo y suministrar oxígeno y nutrientes a las células.",
		"content" => "<h2 class='h2 third-font-gray mt-4'>Cómo prevenir enfermedades cardíacas y mejorar la salud del corazón</h2>
		<p class='p15 third-font-gray mt-4'>El corazón es uno de los órganos más importantes del cuerpo humano, ya que es responsable de bombear sangre a través del cuerpo y suministrar oxígeno y nutrientes a las células. Sin embargo, debido a factores como la mala alimentación, el sedentarismo y el estrés, el corazón puede verse afectado por enfermedades cardíacas. Por ello es importante tomar medidas para prevenir estas enfermedades y mejorar la salud del corazón.</p>
		<p class='p15 third-font-gray mt-4'>A continuación, presentamos algunos consejos por parte de nuestros profesionales para mejorar la forma y el cuidado del corazón:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Controlar la presión arterial: La hipertensión es uno de los principales factores de riesgo para enfermedades cardíacas. Por lo tanto, es importante controlar regularmente la presión arterial y mantenerla en un nivel saludable (menos de 120/80 mm Hg).</li>
		<li class='mt-2'>Mantener un peso saludable: El sobrepeso y la obesidad aumentan el riesgo de enfermedades cardíacas. Por lo tanto, es importante mantener un peso saludable mediante una dieta equilibrada y ejercicio regular.</li>
		<li class='mt-2'>Controlar los niveles de colesterol: El colesterol alto también es un factor de riesgo para enfermedades cardíacas. Por lo tanto, es importante controlar los niveles de colesterol mediante una dieta saludable y, si es necesario, medicamentos.</li>
		<li class='mt-2'>Dejar de fumar: El tabaquismo es uno de los principales factores de riesgo para enfermedades cardíacas. Por lo tanto, es importante dejar de fumar para reducir el riesgo de enfermedad cardíaca.</li>
		<li class='mt-2'>Controlar la diabetes: La diabetes también es un factor de riesgo para enfermedades cardíacas. Por lo tanto, es importante controlar la diabetes mediante una dieta saludable, ejercicio regular y, si es necesario, medicamentos.</li>
		<li class='mt-2'>Realizar ejercicio regularmente: El ejercicio regular ayuda a mejorar la salud cardiovascular y a reducir el riesgo de enfermedad cardíaca. Se recomienda realizar al menos 30 minutos de ejercicio aeróbico de moderado a vigoroso, al menos cinco días a la semana.</li>
		<li class='mt-2'>Dormir bien: El sueño es esencial para la salud del corazón. Es importante dormir al menos 7 horas cada noche para mantener una buena salud cardiovascular.</li>
		<li class='mt-2'>Evitar el estrés: El estrés puede aumentar el riesgo de enfermedades cardíacas. Es importante aprender técnicas de relajación y manejar el estrés de manera efectiva.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Respecto a la alimentación, es otro de los factores importantes para evitar cualquier tipo de enfermedad cardiaca y mantener una buena salud del corazón. Para ello os facilitamos los siguientes consejos alimenticios:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Limitar o reducir el consumo de sal: consumir demasiada sal puede causar una presión arterial alta, por ello regular el consumo de sal es primordial para la salud del corazón.</li>
		<li class='mt-2'>Elegir fuente de proteínas con bajo contenido en grasa: como la carne magra, pescados, carne de aves, productos lácteos de bajo contenido en grasa y huevo, que nos aportan las mejores proteínas.</li>
		<li class='mt-2'>Limitar la ingesta de grasas no saludables: hay que limitar la cantidad de grasas saturadas y trans ya que ayuda a reducir los niveles de colesterol en sangre y disminuir el riesgo de enfermedad de las arterias coronarias.</li>
		<li class='mt-2'>Elige cereales integrales: los granos integrales son una buena fuente de fibra y otros de los nutrientes que cumplen un papel en la regulación de la presión arterial y la salud del corazón.</li>
		<li class='mt-2'>Comer más vegetales y frutas: las verduras y frutas, contienen sustancias que pueden ayudar a prevenir las enfermedades cardiovasculares. Este tipo de alimentos tienen pocas calorías y son ricos en fibra dietética.</li>
		<li class='mt-2'>Controlar el tamaño de las porciones: es importante saber la cantidad, así como la calidad de lo que comes.</li>
		<li class='mt-2'>Planificar tus menús diarios: es importante planificar tus menús siguiendo los consejos anteriormente mencionados y esto te ayudará a obtener los nutrientes que el cuerpo necesita.</li>
		<li class='mt-2'>Date un gusto de vez en cuando: es importante permitirte algún capricho, pero no es excusa para renunciar a un plan de alimentación saludable.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si tienes algún problema relacionado con el corazón, con tu dieta o simplemente quieres consultar con un especialista, en el Hospital San Juan de Dios de Sevilla tenemos disponible la <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidad</a> de <a href='https://sjdsevilla.com/cardiologo-sevilla' class='link-blog'>cardiología</a> que está dirigida por el Dr. Mariano Ruiz Borrell, y la especialidad de <a href='https://sjdsevilla.com/endocrino-sevilla' class='link-blog'>endocrinología</a> dirigida por el Dr. Alfonso Manuel Soto Moreno.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita con cualquier de nuestros especialistas, así como en cualquiera de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		<p class='p15 third-font-gray mt-4'></p>
		",
		"feature" => false,
		"page_title" => "Consejos médicos para el cuidado del corazón",
		"page_description" => ""
	],
	"lactancia-materna" => (object) [
		"fecha" => "Lunes, 23 de enero de 2023",
		"title_noticia" => "Todo lo que necesitas saber sobre la lactancia materna",
		"img_main" => "/files/img/blog/pediatria-san-juan-dios-leche-materna.jpg",
		"short_notice" => "La lactancia materna es la forma de alimentación que da a los niños el mejor comienzo posible en la vida.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>La lactancia materna es la forma de alimentación que da a los niños el mejor comienzo posible en la vida.</h2>
		<p class='p15 third-font-gray mt-4'>La leche materna es única. Es un líquido vivo que está especialmente diseñado para el recién nacido y lactante, que cambia, toma a toma, día a día y mes a mes, para satisfacer sus necesidades. Además, proporciona defensas activas frente a la infección.</p>
		<p class='p15 third-font-gray mt-4'>Todas estas características no existen en las fórmulas artificiales y es por ello que la Organización Mundial de Salud recomienda la Lactancia Materna de manera exclusiva durante los primeros seis meses de vida y, después, mantener la lactancia junto con alimentación variada que la complemente hasta, al menos, dos años.</p>
		<p class='p15 third-font-gray mt-4'>Nuestro programa de promoción de la lactancia materna, se basa tanto en las recomendaciones de la iniciativa hospital amigo de los niños de la OMS y Unicef, como del comité de lactancia materna de la Asociación Española de Pediatría, desde donde se han elaborado todas nuestras recomendaciones.</p>
		<p class='p15 third-font-gray mt-4'>Es por ello que desde nuestro<b><strong> Servicio de Pediatría del Hospital San Juan de Dios de Sevilla </b></strong> apoyamos, promovemos y fomentamos la lactancia materna.</p>
		<p class='p15 third-font-gray mt-4'>Para ello disponemos de información actualizada y por escrito, que se entrega a las madres y embarazadas después de su atención tanto en consultas externas como en urgencias, y personal capacitado para transmitir y explicar esta información a las madres y embarazadas que acudan a nuestro centro.</p>
		<p class='p15 third-font-gray mt-4'>La lactancia materna, se recomienda de forma exclusiva durante los <b><strong> primeros 6 meses de vida </b></strong> ya que:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Disminuye el número y la gravedad de muchas infecciones como: Gastroenteritis, Otitis, Bronquiolitis.</li>
		<li class='mt-2'>Disminuye el riesgo de asma alérgica, dermatitis atópica, enfermedad celíaca, enfermedad inflamatoria intestinal.</li>
		<li class='mt-2'>Disminuye la incidencia de obesidad y diabetes tipo I.</li>
		<li class='mt-2'>Disminuye el riesgo de muerte súbita del lactante.</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>Sin ninguna duda, el mejor alimento para el recién nacido es la lactancia materna. Dar el pecho al bebé se ha relacionado con una disminución de infecciones respiratorias, otitis y diarreas, así como con un menor riesgo de muerte súbita del lactante. Actualmente se recomienda la lactancia materna exclusiva (dar únicamente el pecho) durante los primeros 6 meses de vida de los niños.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Lactancia materna a demanda</b></strong></p>
		<p class='p15 third-font-gray mt-4'>La mejor forma de dar el pecho es a demanda, ello es, amamantar sin horarios ni tiempos de duración de las tomas prefijados.</p>
		<p class='p15 third-font-gray mt-4'>La lactancia materna a demanda consiste en dar el pecho al bebé siempre que este dé muestras de que necesita mamar, tanto de día como por la noche. Es decir, no tiene horarios establecidos, el horario de cada toma lo señala el bebé cuando tiene hambre.</p>
		<p class='p15 third-font-gray mt-4'>No hace falta establecer un horario fijo ni esperar entre 3 y 4 horas, entre toma y toma. Un bebé puede necesitar mamar con más frecuencia porque no come mucho en cada toma.</p>
		<p class='p15 third-font-gray mt-4'>Asimismo, la duración de cada toma también la establece el bebé. Los recién nacidos maman más despacio, por eso sus tomas suelen ser más largas que las de los bebés más mayores. Según va creciendo la duración de las tomas suele disminuir, porque es capaz de conseguir en menos tiempo la cantidad de leche que necesita.</p>
		<p class='p15 third-font-gray mt-4'>Algunos bebés maman pocas veces al día con unas tomas largas. En cambio, otros maman muchas veces al día en tomas más cortas.</p>
		<p class='p15 third-font-gray mt-4'>En cuanto a despertarles por las noches para darles de mamar, cuando se trata de bebés sanos que aumentan de peso bien, no es necesario despertarles para darles el pecho. Ellos mismos se despertarán cuando quieran comer. Sin embargo, es conveniente que los recién nacidos no pasen más de tres horas sin alimentarse, incluso por la noche.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Se puede organizar la lactancia materna?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>La madre es quien interpreta las necesidades del bebé con los movimientos o el llanto. Si el niño mama, aunque en realidad no tenga hambre, tampoco pasa nada.</p>
		<p class='p15 third-font-gray mt-4'>En cualquier caso, en la lactancia a demanda, la madre puede regular en cierta medida el momento de dar el pecho al bebé cuando este ya tiene unos 3 meses. Antes de los 3 meses los bebés suelen necesitar que la toma sea más inmediata.</p>
		<p class='p15 third-font-gray mt-4'>En realidad, cuando la lactancia está bien instaurada, la madre conoce las necesidades de su bebé y sabe qué margen tiene para adelantar o retrasar la toma al momento más adecuado para ambos.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cuántas tomas suelen hacer los niños?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Durante el primer mes de vida es conveniente que el bebé haga entre ocho y 12 tomas cada día. El hecho de amamantar al bebé frecuentemente favorece la producción de leche durante las primeras semanas.</p>
		<p class='p15 third-font-gray mt-4'>Hasta que la producción de leche se regularice, conviene amamantar al bebé “a demanda”, probablemente entre cada hora y media y tres horas. Conforme los recién nacidos van creciendo, necesitan mamar menos frecuentemente y es posible que desarrollen una pauta de lactancia más predecible.</p>
		<p class='p15 third-font-gray mt-4'>Es normal que los bebés realicen “tomas agrupadas”, es decir, que coman varias veces seguidas y luego, pasen varias horas sin comer. Durante los primeros días de vida, es posible que se amamanten incluso cada hora o varias veces en una hora, especialmente por la tarde y por la noche.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo se cuenta cada cuánto toma el bebé?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Los intervalos entre tomas se cuentan desde el momento en que el bebé empieza a mamar hasta el inicio de la próxima toma. La sensación de las madres, sobre todo al principio, es que están amamantando al bebé durante las 24 horas del día, lo que es completamente normal.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cuánto tiempo duran las tomas de pecho?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Es conveniente que el bebé determine la duración de la toma. Él sabe cuándo ha tenido suficiente y se despegará solo de la mama. Si se le quita del pecho antes de que esté listo, puede que no reciba la cantidad de leche que necesita, que no tome la leche rica en calorías del final de la toma y que se vaya reduciendo la cantidad de leche que se produce.</p>
		<p class='p15 third-font-gray mt-4'>Hay muchos factores que influyen en el tiempo que duran las tomas:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Si ya se ha producido la subida de la leche y está regularizada.</li>
		<li class='mt-2'>Si el reflejo de eyección es inmediato o no.</li>
		<li class='mt-2'>Si el flujo de la leche es lento o rápido.</li>
		<li class='mt-2'>Si se está colocando correctamente el bebé en el pecho.</li>
		<li class='mt-2'>Si el bebé “va al grano” o remolonea un poco antes de ponerse “manos a la obra”.</li>
		<li class='mt-2'>Si el bebé está adormilado o se distrae con facilidad.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>La duración de las tomas también depende de la edad. La mayoría de las sesiones de amamantamiento de los recién nacidos duran entre 20 y 45 minutos. Sin embargo, a menudo están somnolientos y es necesario tener paciencia y perseverancia durante este período. Conforme van creciendo, los niños van adquiriendo mayor destreza, por lo que pueden tardar solamente entre cinco y 10 minutos en vaciar cada pecho.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo saber cuándo el bebé tiene hambre?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Conviene amamantar al bebé ante los primeros signos de hambre, cuando comienza con movimientos de la cabeza, buscando el pecho y antes de que llore y se altere por lo que luego es difícil tranquilizarle.</p>
		<p class='p15 third-font-gray mt-4'>De todos modos, también es importante tener en cuenta que cada vez que llora un bebé, no tiene que ser necesariamente porque tiene hambre. A veces necesitan que los abracen o que les cambien los pañales. También pueden llorar por un exceso de estimulación, por aburrimiento o porque tienen frío o calor.</p>
		<p class='p15 third-font-gray mt-4'>Las señales de que un bebé tiene hambre incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Mover la cabeza de un lado al otro.</li>
		<li class='mt-2'>Abrir la boca.</li>
		<li class='mt-2'>Sacar la lengua.</li>
		<li class='mt-2'>Llevarse las manos y los puños a la boca.</li>
		<li class='mt-2'>Fruncir los labios como si fuera a succionar.</li>
		<li class='mt-2'>Restregar la boca contra los pechos de su madre.</li>
		<li class='mt-2'>Mostrar el reflejo de búsqueda del pecho (girar la boca hacia algo que le está acariciando o tocando la mejilla).</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Cuando el bebé está saciado comienza con succiones lentas, a mostrar pérdida del interés por el pecho y apartarse de él, por lo que en cuanto aparezcan se puede dar por finalizada la toma.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Con qué frecuencia hay que cambiar de pecho?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Para mantener una buena producción de leche en ambos pechos y evitar que se congestione uno de ellos, lo que puede resultar doloroso, es importante alternar entre ambos pechos y procurar que mame de los dos cada día. El tiempo que un bebé mama de cada pecho difiere entre bebés y entre madres. Algunos pueden quedarse satisfechos tras mamar durante cinco minutos de cada pecho, mientras que otros necesitan mamar 10 o 15 minutos de cada pecho.</p>
		<p class='p15 third-font-gray mt-4'>Hay expertos recomiendan ofrecer ambos pechos en cada toma, alternando el pecho que se ofrece primero en tomas consecutivas. Sin embargo, últimamente algunos especialistas en lactancia materna están recomendando ofrecer solamente un pecho en cada toma e ir alternándolos en tomas consecutivas.</p>
		<p class='p15 third-font-gray mt-4'>En cualquier caso, es importante hacerlo de la forma más cómoda para ambos.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo saber si está recibiendo suficiente leche materna?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Se sabe que el bebé está recibiendo suficiente leche materna si:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Hace cacas frecuentemente. Por lo general, las deposiciones son blandas y pasan de un color negro a marrón, y a amarillo mostaza en los primeros cinco días. El ritmo intestinal de los bebés que se alimentan con leche materna es variable, pero a partir del tercer día de vida, por lo general, harán como mínimo entre 2 y 5 deposiciones al día. Luego esto varía, algunos bebés hacen caca todos los días, mientras que otros lo hacen cada varios días.</li>
		<li class='mt-2'>También hay patrones de pañales mojados: día 1 = un pañal mojado; día 2 = dos pañales mojados; día 3 = tres pañales mojados y así sucesivamente. A partir del sexto día de vida mojará entre 6 y 8 pañales al día (una vez que aumente su producción de leche, la orina empapará el pañal).</li>
		<li class='mt-2'>La orina tiene un color pálido.</li>
		<li class='mt-2'>Se puede oír cuando traga la leche.</li>
		<li class='mt-2'>Está tranquilo y relajado después de comer.</li>
		<li class='mt-2'>Aumenta de peso. Durante los primeros cinco días de vida, muchos bebés pueden llegar a perder entre el 7 y el 10 % del peso que tenían al nacer. Los bebés nacen con reservas de grasa y generalmente recuperan el peso al cumplir dos semanas de vida. La alimentación frecuente y durante todo el día ayudará a prevenir una pérdida de peso importante.</li>
		<li class='mt-2'>Los senos están más blandos después de alimentar al niño.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cuáles son las ventajas de la alimentación con leche materna?</b></strong></p>
		<p class='p15 third-font-gray mt-4'>Para las mujeres:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Previene las hemorragias postparto, ya que la succión del bebé facilita que el útero recupere su tamaño inicial y disminuye la posibilidad de anemia.</li>
		<li class='mt-2'>Favorece la recuperación del peso pre-embarazo.</li>
		<li class='mt-2'>Produce bienestar emocional y proporciona una oportunidad única de vínculo afectivo madre-hijo.</li>
		<li class='mt-2'>Reduce el riesgo de cáncer de mama y de ovario.</li>
		<li class='mt-2'>Mejora el contenido en calcio de los huesos al llegar a la menopausia.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Para el recién nacido y el niño lactante:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Protege frente a las infecciones respiratorias, otitis, infecciones gastrointestinales e incluso urinarias.</li>
		<li class='mt-2'>Protege frente al Síndrome de Muerte Súbita del Lactante.</li>
		<li class='mt-2'>El amamantamiento proporciona contacto físico a los bebés lo que les ayuda a sentirse más seguros, cálidos y consolados.</li>
		<li class='mt-2'>Los niños amamantados tienen un mejor desarrollo dental con menos problemas de ortodoncia y caries.</li>
		<li class='mt-2'>Potencia el desarrollo intelectual gracias a que la leche materna tiene componentes específicos que son fundamentales para el desarrollo del cerebro.</li>
		<li class='mt-2'>La leche materna se digiere mejor y tiene efectos positivos a largo plazo sobre la salud del niño disminuyendo el riesgo de que padezca alergias, diabetes, enfermedad celíaca, enfermedad inflamatoria intestinal, obesidad, hipertensión o cifras altas de colesterol.</li>
		<li class='mt-2'>Parece tener cierta protección frente a linfomas y algunos otros tipos de cáncer.</li>
		<li class='mt-2'>La leche humana es el alimento de elección para todos los niños, incluidos los prematuros, los gemelos y los niños enfermos.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Para la sociedad y el medio ambiente:</b></strong></p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Es gratuita. Supone un ahorro en concepto de fórmulas artificiales, biberones y otros utensilios usados en la preparación de las fórmulas.</li>
		<li class='mt-2'>Al disminuir las infecciones y la gravedad de las mismas reduce los gastos médicos y los problemas laborales y familiares que dichas enfermedades suponen para los padres y la sociedad. Reduce el uso de recursos humanos y materiales de la sanidad y si los niños enferman, se recuperan antes.</li>
		<li class='mt-2'>La leche materna es un recurso natural que no contamina y protege el medio ambiente ya que no produce residuos, ni necesita envases ni tratamientos especiales que requieran gasto energético en su elaboración ni emisiones de CO2.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Para cualquier consulta respecto a la leche materna o relacionada con el recién nacido, puedes consultar con nuestro departamento de <a href='https://sjdsevilla.com/pediatria-sevilla' class='link-blog'>pediatría</a> del Hospital San Juan de Dios de Sevilla solicitando tu cita haciendo click <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>aquí</a> o bien contactar en el teléfono 955 045 999.</p>
		",
		"feature" => false,
		"page_title" => "Todo lo que necesitas saber sobre la lactancia materna",
		"page_description" => "En este artículo te contamos todo lo que debes saber sobre la lactancia y las distintas casuísticas que pueden darse."
	],
	"principales-alergias" => (object) [
		"fecha" => "Viernes, 20 de enero de 2023",
		"title_noticia" => "Las principales alergias y cómo prevenirlas",
		"img_main" => "/files/img/blog/alergias-prevencion-san-juan-de-dios.jpg",
		"short_notice" => "Las alergias son reacciones anormales del sistema inmunológico ante sustancias que normalmente no causan problemas en la mayoría de las personas.",
		"content" => "
		<h2 class='h2 primary-font-blue mt-5'>Entendiendo los síntomas y causas de las alergias para evitar su aparición</h2>
		<p class='p15 third-font-gray mt-4'>Las alergias son reacciones anormales del sistema inmunológico ante sustancias que normalmente no causan problemas en la mayoría de las personas. Aunque las alergias pueden variar en gravedad, pueden ser incómodas y a veces peligrosas si no se tratan adecuadamente. Conociendo las principales alergias y cómo prevenirlas puede ayudar a reducir el riesgo de sufrir una reacción alérgica.</p>
		<p class='p15 third-font-gray mt-4'>Una de las alergias más comunes es la alergia al polen. Los síntomas de esta alergia incluyen estornudos, congestión nasal, ojos llorosos y picazón en la nariz. La mejor forma de prevenir esta alergia es evitando estar al aire libre durante los períodos de alta concentración de polen, manteniendo las ventanas y puertas cerradas en casa y en el coche, y duchándose y cambiando de ropa después de haber estado al aire libre.</p>
		<p class='p15 third-font-gray mt-4'>Otra alergia común es la alergia a los ácaros del polvo. Los ácaros del polvo se encuentran en la ropa de cama, alfombras y muebles tapizados, y pueden causar síntomas como congestión nasal, estornudos y ojos llorosos. Para prevenir esta alergia, se recomienda mantener la casa limpia y libre de polvo, utilizar un limpiador de aire, y lavar las sábanas y las almohadas con agua caliente al menos una vez a la semana.</p>
		<p class='p15 third-font-gray mt-4'>La alergia alimentaria es otra forma común de alergia. Los alimentos más comunes que causan alergias son los frutos secos, los pescados, el huevo y la leche. Los síntomas de esta alergia incluyen hinchazón, urticaria, dificultad para respirar y dolor abdominal. Para prevenir las alergias alimentarias, es importante evitar los alimentos que se sabe que causan alergias, leer cuidadosamente las etiquetas de los alimentos, y estar preparado para tratar una reacción alérgica rápidamente si ocurre.</p>
		<p class='p15 third-font-gray mt-4'>La alergia a las mascotas es otra forma común de alergia. Los síntomas de esta alergia incluyen congestión nasal, estornudos y ojos llorosos. Para prevenir esta alergia, se recomienda evitar tener mascotas en el hogar o limitar el tiempo que se pasa con las mascotas.</p>
		<p class='p15 third-font-gray mt-4'>Aunque no es posible evitar completamente las alergias, existen medidas preventivas que pueden ayudar a reducir el riesgo de desarrollarlas y a aliviar los síntomas. Algunas de estas medidas incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Evitar el contacto con sustancias alergénicas conocidas.</li>
		<li class='mt-2'>Limpiar regularmente la casa para reducir la cantidad de ácaros del polvo y otros alérgenos en el ambiente.</li>
		<li class='mt-2'>Usar un purificador de aire o un limpiador de aire para reducir la cantidad de partículas alergénicas en el aire.</li>
		<li class='mt-2'>Tomar antihistamínicos o inmunomoduladores previamente recomendado por un especialista.</li>
		<li class='mt-2'>Consultar a un especialista si se sospecha de una alergia. El especialista puede realizar pruebas para determinar la causa de la alergia y recomendar el tratamiento adecuado.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>En conclusión, las alergias son un problema de salud cada vez más común, pero existen medidas preventivas que pueden ayudar a reducir el riesgo de desarrollarlas y aliviar los síntomas. Es importante evitar el contacto con sustancias alergénicas conocidas, mantener limpio el ambiente y consultar a un especialista si se sospecha de una alergia. Con estas medidas, se puede reducir significativamente el riesgo de sufrir una alergia.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla y dentro de las <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a>, disponemos del servicio de <a href='https://sjdsevilla.com/alergologo-sevilla' class='link-blog'>alergología</a> dirigido por la Dra. Fátima Jurado Palma. Puedes solicitar tu cita previa haciendo click <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>aquí</a> o contactando directamente en el 955 045 999. </p>
		",
		"feature" => false,
		"page_title" => "Las principales alergias y cómo prevenirlas",
		"page_description" => "En este artículo, hablaremos sobre las principales alergias, así como sus causas y cómo prevenirlas. Son un problema de salud cada vez más común y que en épocas de primavera se acrecentan. "
	],

	"origen-insomnio" => (object) [
		"fecha" => "Miércoles, 18 de enero de 2023",
		"title_noticia" => "El insomnio, origen y recomendaciones para mejorarlo",
		"img_main" => "/files/img/blog/insomnio-recomendaciones-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "El insomnio es uno de los trastornos de sueño más frecuentes y que se manifiesta en problema recurrente a la hora de conciliar el sueño o con interrupciones frecuentes del ciclo de sueño por la noche, que en muchas ocasiones dificulta o impide volver a dormir.",
		"content" => "
		<p class='p15 third-font-gray mt-4'>El insomnio es uno de los trastornos de sueño más frecuentes y que se manifiesta en problema recurrente a la hora de conciliar el sueño o con interrupciones frecuentes del ciclo de sueño por la noche, que en muchas ocasiones dificulta o impide volver a dormir.</p>
		<p class='p15 third-font-gray mt-4'>El sueño es una actividad reparadora que nuestro organismo necesita para que nuestro cuerpo funcione de manera adecuada. Los trastornos del sueño no son una enfermedad grave, sin embargo, las consecuencias de no tener de manera habitual un sueño adecuado si pueden serlo: cansancio, dificultad para concentrarse, irritabilidad, agotamiento físico, etc.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿Por qué se produce?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Existen diferentes trastornos del sueño y dependiendo de la edad es más probable que se produzcan unos u otros. Los podemos clasificar en dos grupos:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Disomnias: son alteraciones en la cantidad y calidad del sueño, como insomnio, hipersomnia, trastornos del ritmo sueño-vigilia, miedo a dormir. Este tipo de alteraciones se producen habitualmente durante la adolescencia o la edad adulta.</li>
		<li class='mt-2'>Parasomnias: son alteraciones que aparecen durante el sueño como las pesadillas, los terrores nocturnos, sonambulismo y enuresis. Son más comunes durante la infancia o la adolescencia.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'><b><strong>Recomendaciones para mejorar la calidad del sueño</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Estas son algunas de las rutinas que podemos llevar a cabo para mejorar la calidad del sueño y prevenir de esta manera el insomnio:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'><b><strong>Seguir un horario de sueño:</strong></b> No dedicar más de ocho horas a dormir. La cantidad de sueño recomendada para un adulto sano es de siete horas, como mínimo. La mayoría de las personas no necesitan dormir más de ocho horas para descansar bien. Acuéstate y levántate a la misma hora todos los días, incluidos los fines de semana. Si no te duermes en los 20 minutos posteriores a acostarte, sal de la habitación y haz algo relajante. Lee o escucha música relajante. Vuelve a la cama cuando estés cansado. Repite este procedimiento la cantidad de veces que necesites, pero continúa manteniendo tu horario de sueño y horario para despertarte.</li>
		<li class='mt-2'><b><strong>Prestar atención a lo que comes y bebes:</strong></b>No debes irte a la cama con hambre ni demasiado lleno. Evita las comidas pesadas o abundantes un par de horas antes de acostarte. El malestar puede mantenerte despierto. También ten cuidado con la nicotina, la cafeína y el alcohol. Los efectos estimulantes de la nicotina y la cafeína tardan horas en desaparecer y pueden interferir con el sueño. Además, aunque el alcohol puede hacer que te sientas somnoliento al comienzo, puede interrumpir el sueño más tarde en la noche.</li>
		<li class='mt-2'><b><strong>Crear un ambiente agradable de descanso:</strong></b> Mantén tu habitación fresca, oscura y silenciosa. La exposición a la luz durante la noche podría hacer más difícil que te duermas. Evita el uso prolongado de pantallas emisoras de luz justo antes de acostarte. Prueba usar cortinas oscurecedoras, tapones para los oídos, un ventilador u otros dispositivos para crear un ambiente acorde a tus necesidades. Hacer actividades relajantes antes de acostarte, como darte un baño o utilizar técnicas de relajación, puede promover un mejor sueño.</li>
		<li class='mt-2'><b><strong>Limitar las siestas diurnas:</strong></b> Las siestas largas durante el día pueden interferir con el sueño nocturno. Limita las siestas a no más de una hora y evita dormir la siesta tarde. Si trabajas por la noche, puede que debas tomar una siesta tarde en el día antes del trabajo para ayudar a compensar la falta de sueño.</li>
		<li class='mt-2'><b><strong>Realizar actividad física como parte de tu rutina diaria:</strong></b> La actividad física regular puede promover un sueño mejor. Sin embargo, evita hacer actividad demasiado cerca de la hora de acostarte. Pasar tiempo al aire libre todos los días también podría ayudarte a prevenir el insomnio.</li>
		<li class='mt-2'><b><strong>Controla las preocupaciones:</strong></b> Intenta resolver tus preocupaciones o inquietudes antes de acostarte. Anota lo que tienes en mente y luego déjalo para mañana. El manejo del estrés podría servirte de ayuda. Comienza con lo básico, cómo organizarte, establecer prioridades y delegar tareas. La meditación también puede aliviar la ansiedad.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Si tienes problemas de insomnio, recuerda que en el Hospital San Juan de Dios de Sevilla tenemos disponible todas las <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades médicas</a> y entre ellas la especialidad de <a href='https://sjdsevilla.com/neurologo-sevilla' class='link-blog'>neurología</a> que está encargada del estudio y tratamiento de este trastorno.</p>
		",
		"feature" => false,
		"page_title" => "El insomnio, origen y recomendaciones para mejorarlo",
		"page_description" => "Conoce que es el insomnio, cómo se origina, así como algunas recomendaciones para mejorarlo a quienes lo padecen. Es uno de los trastornos de sueño más frecuentes. "
	],

	"dia-contra-la-depresion" => (object) [
		"fecha" => "Lunes, 16 de enero de 2023",
		"title_noticia" => "Día Mundial contra la Depresión",
		"img_main" => "/files/img/blog/depresion-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "Comprendiendo los factores de riesgo y aprendiendo cómo prevenir la depresión.",
		"content" => "<h2 class='h2 third-font-gray mt-4'>Comprendiendo los factores de riesgo y aprendiendo cómo prevenir la depresión.</h2>
		<p class='p15 third-font-gray mt-4'>El Día Mundial contra la Depresión se celebra el 13 de enero de cada año con el objetivo de concientizar a la población sobre la importancia de la prevención, detección temprana y tratamiento de la depresión. La depresión es un trastorno mental que afecta a millones de personas en todo el mundo, y es una de las principales causas de discapacidad en el mundo.</p>
		<p class='p15 third-font-gray mt-4'>La prevención de la depresión es esencial, ya que puede ayudar a reducir el riesgo de desarrollar esta enfermedad. Una de las formas más eficaces de prevenir la depresión es comprender los factores de riesgo que pueden aumentar la probabilidad de desarrollarla. Estos factores incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Antecedentes familiares de depresión</li>
		<li class='mt-2'>Historial de trastornos mentales</li>
		<li class='mt-2'>Estresores significativos, como la pérdida de un ser querido, un divorcio o un cambio en el trabajo</li>
		<li class='mt-2'>Abuso de sustancias</li>
		<li class='mt-2'>Problemas físicos o enfermedades crónicas</li>
		</ul>
		
		<p class='p15 third-font-gray mt-4'>Es una enfermedad compleja que puede manifestarse de diferentes maneras, pero tiene algunos rasgos comunes que pueden ayudar a identificarla.</p>
		<p class='p15 third-font-gray mt-4'>Uno de los síntomas más comunes es el estado de ánimo triste o deprimido. Las personas con depresión pueden sentirse desesperadas, vacías o inútiles, y pueden perder interés en las actividades que antes disfrutaban. También pueden experimentar cambios en el apetito y el sueño, como comer demasiado o demasiado poco, o tener dificultades para dormir o despertarse temprano.</p>
		<p class='p15 third-font-gray mt-4'>Otro síntoma común de la depresión es la falta de energía y motivación. Las personas con depresión pueden sentirse cansadas y agotadas, incluso después de dormir varias horas. Pueden tener dificultad para concentrarse o tomar decisiones, y pueden sentir que no tienen la capacidad de hacer las cosas que antes podían hacer fácilmente.</p>
		<p class='p15 third-font-gray mt-4'>La depresión también puede afectar el pensamiento, la percepción y el comportamiento de una persona. Las personas con depresión pueden tener pensamientos negativos o pesimistas sobre sí mismas, el futuro o la vida en general. Pueden tener dificultad para ver el lado positivo de las cosas y pueden sentir que no hay esperanza. También pueden experimentar cambios en su comportamiento, como retirarse socialmente o tener dificultad para controlar sus emociones.</p>
		<p class='p15 third-font-gray mt-4'>La depresión puede acompañarse de síntomas físicos como dolores y molestias. Pueden sentir dolores de cabeza, dolores musculares, o dolores en el cuerpo en general.</p>
		<p class='p15 third-font-gray mt-4'>Hay varias estrategias eficaces que se pueden utilizar para prevenir la depresión. Estos incluyen:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Ejercicio regular: El ejercicio ha demostrado ser eficaz en la reducción de los síntomas de depresión. El ejercicio aumenta la liberación de endorfinas, que son sustancias químicas en el cerebro que pueden mejorar el estado de ánimo.</li>
		<li class='mt-2'>Atención a la salud física: Es importante llevar una dieta saludable, obtener suficiente sueño y evitar el abuso de sustancias.</li>
		<li class='mt-2'>Conectarse con los demás: La conexión social es importante para prevenir la depresión. Es importante rodearse de personas positivas y apoyo, y hacer tiempo para las relaciones significativas.</li>
		<li class='mt-2'>Buscar ayuda: Si se siente deprimido o ansioso, es importante buscar ayuda. La terapia y los medicamentos pueden ser eficaces en el tratamiento contra la depresión.</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>Hay que dejar claro que esto son solo pautas, pero es prioritario que un paciente que pueda tener síntomas de padecer depresión acuda a un especialista lo antes posible, para que le procure un tratamiento acorde a su estado.</p>
		<p class='p15 third-font-gray mt-4'>Es importante recordar que la depresión es una enfermedad tratable y que no hay vergüenza en buscar ayuda.</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla estamos comprometidos con dicha enfermedad que tanto daño está haciendo a la sociedad y animamos a cualquier persona que pueda estar pasando por cualquiera de estas situaciones solicite ayuda.</p>
		",
		"feature" => false,
		"page_title" => "Día Mundial contra la Depresión",
		"page_description" => "Comprende los factores de riesgo y aprende como prevenir la depresión. Sigue los siguientes consejos."
	],
	"fatima-jurado-palma" => (object) [
		"fecha" => "Viernes, 13 de enero de 2023",
		"title_noticia" => "Fátima Jurado Palma, jefa de equipo de alergología",
		"img_main" => "/files/img/blog/fatima-jurado-palma-alergologa.jpg",
		"short_notice" => "La Dra. Fátima Jurado Palma es Licenciada en Medicina y Cirugía por la Universidad de Sevilla en el año 2006.",
		"content" => "<h2 class='h2 third-font-gray mt-4'>La Dra. Fátima Jurado Palma es Licenciada en Medicina y Cirugía por la Universidad de Sevilla en el año 2006.</h2>
		<p class='p15 third-font-gray mt-4'>Se formó como especialista en  Alergología e Inmunología Clínica en los años 2007-2011, en el Hospital Universitario Virgen Macarena de Sevilla.</p>
		<p class='p15 third-font-gray mt-4'>Durante el año 2007 realizó los cursos de Doctorado por el Departamento de Cirugía de la Universidad de Sevilla, y posteriormente obtiene el Diploma de Estudios Avanzados con el título “ Reacciones alérgicas durante la anestesia” en el año 2010, ambos con la calificación de Sobresaliente.</p>
		<p class='p15 third-font-gray mt-4'>Posee el título del Máster en Metodología de investigación en Ciencias de la Salud por la Universidad de Huelva (Año 2012) y el título de Experto Universitario en Trastornos Funcionales Digestivos y Alergia Alimentaria Pediátrica (año 2019).</p>
		<p class='p15 third-font-gray mt-4'>Se formó durante su residencia en provocaciones y desensibilizaciones con alimentos en niños alérgicos a leche y huevo en el Hospital Infantil Universitario Niño Jesús de Madrid (2010). </p>
		<p class='p15 third-font-gray mt-4'>Se ha centrado en los últimos años fundamentalmente en la población pediátrica y estudio de alergias alimentarias.
		<p class='p15 third-font-gray mt-4'>Es miembro de la Sociedad Andaluza de Alergología e Inmunología Clínica, de la Sociedad Española de Alergología e Inmunología Clínica así como del Real e Ilustre Colegio Oficial de Médicos de Sevilla.</p>
		<p class='p15 third-font-gray mt-4'>Ha participado en diversas sesiones, talleres, pósters y comunicaciones orales en congresos, así como asistencia a  múltiples cursos y jornadas de formación específica en diferentes áreas de la especialidad.</p>

		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita en la especialidad de <a href='https://sjdsevilla.com/alergologo-sevilla' class='link-blog'>alergología</a> con la doctora Fátima Jurado Palma desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		",
		"feature" => false,
		"page_title" => "Fátima Jurado Palma, jefa de equipo de alergología",
		"page_description" => "La Dra. Fátima Jurado Palma es jefa de equipo de alergología. Si tienes problemas alérgicos, no dudes en pedir tu cita."
	],
	"primeros-auxilios-y-rcp" => (object) [
		"fecha" => "Miércoles, 11 de enero de 2023",
		"title_noticia" => "Primeros auxilios y RCP: lo que necesitas saber",
		"img_main" => "/files/img/blog/primeros-auxilios-rcp-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "Desde el Hospital San Juan de Dios de Sevilla, sabemos la importancia que tiene saber actuar ante una situación de emergencia, por ello, os facilitamos toda la información respecto a primeros auxilios y cómo realizar una reanimación cardiopulmonar en casos de emergencia.",
		"content" => "<h2 class='h2 third-font-gray mt-4'>Aprende cómo actuar en caso de emergencia para salvar vidas</h2>
		<p class='p15 third-font-gray mt-4'>Desarrollo:</p>
		<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios de Sevilla, sabemos la importancia que tiene saber actuar ante una situación de emergencia, por ello, os facilitamos toda la información respecto a primeros auxilios y cómo realizar una reanimación cardiopulmonar en casos de emergencia.</p>
		<p class='p15 third-font-gray mt-4'>Los primeros auxilios y la reanimación cardiopulmonar (RCP) son habilidades esenciales que todos deberíamos tener. Saber cómo actuar rápidamente en caso de emergencia puede salvar vidas y mejorar las posibilidades de recuperación de una persona. En este artículo, vamos a revisar los conceptos básicos de los primeros auxilios y la RCP y cómo aplicarlos en situaciones de emergencia.</p>
		<p class='p15 third-font-gray mt-4'>Los primeros auxilios son los cuidados inmediatos que se brindan a una persona que ha sufrido una lesión o una enfermedad. Estos cuidados incluyen medidas para controlar la pérdida de sangre, evitar el shock y prevenir la aparición de infecciones. Los primeros auxilios también incluyen la aplicación de hielo y vendajes para reducir el dolor y la inflamación.</p>
		<p class='p15 third-font-gray mt-4'>La RCP es un conjunto de técnicas que se utilizan para reanimar a una persona que ha sufrido un paro cardíaco. El objetivo de la RCP es restaurar la respiración y la circulación sanguínea en el cuerpo. La RCP se realiza mediante la compresión del tórax y la ventilación de los pulmones con una máscara de ventilación o una bolsa de resucitación.</p>
		<p class='p15 third-font-gray mt-4'>En caso de emergencia, es importante mantener la calma y actuar rápidamente. Si alguien se ha lesionado, es esencial llamar al servicio de emergencia (112) de inmediato. Mientras esperas a que lleguen los servicios de emergencia, puedes brindar primeros auxilios y RCP si es necesario.</p>
		<p class='p15 third-font-gray mt-4'>Cuando brindes primeros auxilios, es importante asegurarte de que la persona esté en un lugar seguro y no se exponga a ningún riesgo adicional. También debes asegurarte de que la persona esté respirando antes de prestarle los primeros auxilios. Si la persona no está respirando, debes comenzar a hacerle RCP inmediatamente.</p>
		<p class='p15 third-font-gray mt-4'>Cómo realizar una RCP:</p>
		
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Llama al servicio de emergencia (112) de inmediato.</li>
		<li class='mt-2'>Asegúrate de que la persona esté en un lugar seguro y no se exponga a ningún riesgo adicional.</li>
		<li class='mt-2'>Verifica si la persona está respirando. Si no lo está, comienza a hacer RCP inmediatamente.</li>
		<li class='mt-2'>Coloca a la persona en una posición plana en el suelo.</li>
		<li class='mt-2'>Coloca tus manos en el centro del tórax de la persona y comienza a hacer compresiones. Las compresiones deben ser profundas y rápidas, con un ritmo de 100 compresiones por minuto.</li>
		<li class='mt-2'>Cada 30 compresiones, realiza una ventilación con una máscara de ventilación o una bolsa de resucitación.</li>
		<li class='mt-2'>Continúa con las compresiones y las ventilaciones hasta que lleguen los servicios de emergencia o la persona comience a respirar por sí misma.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>En resumen, la RCP y los primeros auxilios son habilidades esenciales que pueden salvar vidas en una emergencia. Es importante saber cómo actuar rápidamente y con confianza.</p>
		",
		"feature" => false,
		"page_title" => "Primeros auxilios y RCP: lo que necesitas saber",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla os facilitamos las claves más importantes a la hora de aplicar primeros auxilios o realizar una reanimación cardiopulmonar."
	],
	"patologias-mas-frecuentes" => (object) [
		"fecha" => "Lunes, 09 de enero de 2023",
		"title_noticia" => "Patologías más frecuentes atendidas desde el servicio de pediatría",
		"img_main" => "/files/img/blog/blog-consulta-pediatra.jpg",
		"short_notice" => "Son muchas las patologías que se dan, y en muchas ocasiones, entre los más pequeños. Sobre todo, tras la vuelta al cole, por el incremento del riesgo de infecciones frecuentes en la infancia y en la primera etapa escolar que comprende la escolarización en escuelas infantiles o guarderías y los cursos de infantil en los colegios.",
		"content" => "<p class='p15 third-font-gray mt-4'>Son muchas las patologías que se dan, y en muchas ocasiones, entre los más pequeños. Sobre todo, tras la vuelta al cole, por el incremento del riesgo de infecciones frecuentes en la infancia y en la primera etapa escolar que comprende la escolarización en escuelas infantiles o guarderías y los cursos de infantil en los colegios. En ellas, los niños de 0 a 6 años tienen aún el sistema inmunológico en desarrollo y son más vulnerables al contagio de enfermedades como la gastroenteritis, los catarros o las conjuntivitis.</p>
		<p class='p15 third-font-gray mt-4'>Las enfermedades más frecuentes que sufren los niños en las primeras etapas de escolarización no suelen ser de gravedad y es habitual que tengan su pico más alto los primeros meses tras las vacaciones de verano, es decir, septiembre y octubre, aunque es cierto que estas patologías pueden aparecer en cualquier momento del curso escolar. Entre las enfermedades más comunes de la infancia y en la etapa infantil de los colegios se encuentran:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Catarro: es la más habitual de todas. Como síntomas es común la congestión nasal, mucosidad e incluso fiebre. La mayoría de los bebés en las guarderías tienen entre 8 y 12 resfriados al año. Suelen ser el primer paso a otras infecciones más graves.</li>
		<li class='mt-2'>Faringoamigdalitis: se caracteriza por fiebre, dolor de garganta y ganglios en el cuello. Se puede acompañar de mucosidad nasal, tos y ronquera. El 70-80% de las faringitis son víricas y el resto son bacterianas.</li>
		<li class='mt-2'>Otitis: las otitis son una de las principales consecuencias de los catarros. La otitis media aguda es una de las patologías más frecuentes en la infancia. El 90% de la población infantil sufre menos de un episodio de otitis antes de los 5 años. En los más pequeños se puede notar porque lloran más de lo normal, se frotan el oído o no duermen bien. Cuando son mayores manifiestan dolor. Pueden causar fiebre y supuración del oído.</li>
		<li class='mt-2'>Conjuntivitis: se trata de la inflamación de la conjuntiva de los ojos y de una enfermedad muy contagiosa y común entre los niños. La conjuntivitis puede ser de origen bacteriano o vírico y se manifiesta con ojos rojos, lagrimeo, sensación de cuerpo extraño, picor y legañas.</li>
		<li class='mt-2'>Bronquiolitis: se trata de una enfermedad muy común en la infancia, propia de los meses fríos, cuyo principal responsable es el virus respiratorio sincitial (VRS). Los niños más pequeños son los más vulnerables. Puede confundirse con un catarro o gripe, pero a medida que avanza, los pequeños suelen tener pitidos en el pecho, y dificultades para respirar o incluso tragar.</li>
		<li class='mt-2'>Enfermedad boca-mano-pie: se trata de una enfermedad viral contagiosa. Es muy común de uno a cinco años. Se presenta en forma de ampollas o erupciones leves en los pies, las manos, el área de la boca y la nariz, así como la región pélvica donde se coloca el pañal. Además, el niño puede presentar dolor de cabeza o garganta y pérdida de apetito. En los casos más graves pueden aparecer úlceras en la boca y la garganta, fiebre o gastroenteritis.</li>
		<li class='mt-2'>Roséola: también se conoce como sexta enfermedad o exantema súbito, y suele afectar a niños de entre tres meses y tres años de edad y está causada por un virus, siendo más frecuente en otoño y primavera. Suele iniciarse con fiebre alta y pueden aparecer lesiones en mucosas o síntomas catarrales. Cuando la fiebre cesa, aparece en el tronco, o también el resto del cuerpo, una erupción cutánea en forma de granos de entre 3 y 5 mm de diámetro de color sonrosado.</li>
		<li class='mt-2'>Gastroenteritis: se trata de una patología común en la etapa infantil causada sobre todo por virus y se manifiesta con diarrea, de comienzo brusco, acompañada de síntomas como náuseas, vómitos fiebre o dolor abdominal. Es importante extremar las medidas de higiene en los cambios de pañal y en el baño para evitar el contagio.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Estas son algunas de las enfermedades más frecuentes durante las etapas escolares de la población infantil (0-6 años) aunque puede haber otras. Por ello, es importante seguir unas adecuadas medidas de prevención, sobre todo encaminadas a favorecer la higiene, y consultar al pediatra para que establezca las pautas y el tratamiento más adecuado a seguir en cada caso.</p>
		<p class='p15 third-font-gray mt-4'>Síntomas/signos de alerta más frecuentes por lo que se debe consultar al pediatra:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Fiebre (sobre todo si es mayor de 39 grados).</li>
		<li class='mt-2'>Tos y mucosidad (más aún si se acompaña de rechazo a la alimentación o dificultad para respirar).</li>
		<li class='mt-2'>Lesiones en la piel (sobre todo si no desaparecen al presionarlas) o picores.</li>
		<li class='mt-2'>Secreción ocular o por oídos.</li>
		<li class='mt-2'>Dolor de garganta, barriga u oídos.</li>
		<li class='mt-2'>Irritabilidad o llanto inconsolable en un niño pequeño.</li>
		<li class='mt-2'>Inapetencia, rechazo a la alimentación o decaimiento.</li>
		<li class='mt-2'>Vómitos y diarreas.</li>
		<li class='mt-2'>Traumatismos craneales en lactantes (aunque no tengan ningún síntoma) o por caída desde más de un metro a cualquier edad.</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>El equipo de <a href='https://sjdsevilla.com/pediatria-sevilla' class='link-blog'>pediatría</a> del Hospital San Juan de Dios de Sevilla nos recomienda acudir al centro si aparecen alguno de estos síntomas, bien acudiendo a urgencias, o solicitando cita previa a través del siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> o acudiendo directamente a consulta externas.</p>
		",
		"feature" => false,
		"page_title" => "Patologías atendidas desde el servicio de pediatría",
		"page_description" => "Os facilitamos las patologías más frecuentes que atendemos desde el servicio de pediatría."
	],
	"gestion-integral" => (object) [
		"fecha" => "Jueves, 05 de enero de 2023",
		"title_noticia" => "Fides, nuestro protocolo de gestión integral para los pacientes",
		"img_main" => "/files/img/blog/servicio-fides-san-juan-dios-sevilla-2.jpg",
		"short_notice" => "El nuevo sistema del Hospital San Juan de Dios Sevilla facilita todos los trámites a los usuarios, desde gestiones administrativas hasta la resolución de dudas y consultas",
		"content" => "<h2 class='h2 third-font-gray mt-4'>El nuevo sistema del Hospital San Juan de Dios Sevilla facilita todos los trámites a los usuarios, desde gestiones administrativas hasta la resolución de dudas y consultas</h2>
		<p class='p15 third-font-gray mt-4'>El paciente y las familias serán atendidos desde el inicio del proceso y las 24 horas del día.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios continúa con su proceso de modernización y dinamización de todas las gestiones. El centro hospitalario de Sevilla ha integrado <b><strong>Fides</strong></b>, un novedoso modelo de gestión que ayuda a los pacientes con los <b><strong>trámites administrativos y las dudas</strong></b> que surgen cuando se necesita algún tipo de Asistencia Sanitaria.</p>
		<p class='p15 third-font-gray mt-4'>Se busca que todas las personas que visiten el Hospital San Juan de Dios encuentren una <b><strong>atención completa y de calidad,</strong></b> con un servicio personalizado desde el primer minuto con atención Pre-asistencial, durante su estancia y un control personalizado Post-asistencial. Con este gestor, nuestro objetivo es ayudar en todo momento a los pacientes y ofrecer un asesoramiento completo por parte del personal especializado.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Ventajas del protocolo Fides</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Fides establece un vínculo prioritario con el usuario, que hace que siempre se sienta <b><strong>acompañado y sin obstáculos</strong></b> para acceder al centro hospitalario. El paciente tendrá una relación directa e inmediata con su <b><strong>Health Manager</strong></b> o Gestor Fides, que podríamos decir que es como  tener a un conocido, amigo o familiar atendiendote cuando lo necesites. Con ello, ofrecemos exclusividad, personalización y agilizar la atención, a la vez que innovamos en nuestros procedimientos para adaptarnos a las nuevas demandas que han aparecido con las nuevas generaciones, cada día más digitalizadas.</p>
		<p class='p15 third-font-gray mt-4'>A través de este sistema, recibirás un trato único y cercano. Además, de ser necesario, podríamos aconsejarte en qué medicación tomarte sí tienes algún problema y sin que te tengas que mover de casa. En Fides encuentras todos los servicios del hospital y mediante email, sms o llamada telefónica puedes contactar directamente con tu Gestor. Con él/ella de una forma personalizada puedes contactar las 24 horas del día. Puedes pedir desde una primera cita médica, a pedir una revisión o cambiar alguna cita.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>¿A quién va dirigido?</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Es una plataforma dirigida a todos los usuarios y familias y que ofrece <b><strong>gratuitamente</strong></b> el Hospital San Juan de Dios Sevilla. Este servicio lo puedes pedir directamente al centro, o bien, el propio centro lo recomendará a los pacientes y familias, que son realmente los que necesitan y aprovechan de este programa.</p>
		<p class='p15 third-font-gray mt-4'>En muchas ocasiones los usuarios necesitan de una asistencia continuada. Para ello, los pacientes reciben una llamada semanalmente para saber cómo se encuentran o por si necesitan algo o quieren una consulta presencial con un especialista concreto.</p>
		<p class='p15 third-font-gray mt-4'><b><strong>Servicio de Urgencias 24 horas</strong></b></p>
		<p class='p15 third-font-gray mt-4'>Somos conscientes de que en ocasiones es imprescindible realizar la visita de forma presencial, para lo que contamos con nuestro servicio de urgencias en Sevilla. De esta forma, el modelo de gestión Fides complementa nuestro servicio de urgencias 24h, agilizando la atención a los pacientes, siempre que sea posible el trámite de forma online. Así mismo contamos con servicio de UCI de forma ininterrumpida.</p>
		<p class='p15 third-font-gray mt-4'>Estamos en el <a href='https://sjdsevilla.com/contacto' class='link-blog'>barrio de Nervión, en Avenida Eduardo Dato, 42.</a> Disponemos de <b><strong>parking</strong></b> para que el aparcamiento no sea ningún contratiempo. Sí lo prefieres, puedes venir en autobús (líneas 5, 22, 32 y 52), en metro (paradas Gran Plaza y Sánchez Pizjuán) y próximamente en Metrocentro.</p>
		<p class='p15 third-font-gray mt-4'>Disponemos de seis plantas, multitud de profesionales sanitarios, la mejor tecnología, <a href='https://sjdsevilla.com/nuestro-centro/instalaciones' class='link-blog'>salas de quirófano, pruebas diagnósticas y amplias habitaciones.</a></p>
		<p class='p15 third-font-gray mt-4'>Además, en nuestro centro hospitalario de Sevilla disponemos de convenios con las <b><strong>principales aseguradoras.</strong></b> Trabajamos con Mapfre, Caser Seguros, Sanitas, Fiatc, Plus Ultra Seguros, Seguros Bilbao, Catalana Occidente, Norte Hispania, Aegon, Divina Pastora y Generali.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios es tu centro de siempre pero, ahora, con unas renovadas instalaciones y las mejores prestaciones.</p>
		<p class='p15 third-font-gray mt-4'>Fides se trata de un proyecto innovador y pionero que se pone a disposición de todos los usuarios que llegan al hospital. El propio paciente o familiar tendrá siempre un lugar donde llamar o contactar en cualquier momento. La experiencia con esta plataforma que sigue mejorando cada día para dar un mejor servicio, es muy positiva.</p>
		<p class='p15 third-font-gray mt-4'>Si aún no cuentas con Fides, puedes solicitarlo llamando directamente al Hospital San Juan de Dios Sevilla o preguntando por él a cualquier profesional del centro.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar consulta con cualquiera de nuestras <a href='https://sjdsevilla.com/servicios' class='link-blog'>especialidades</a> desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a></p>
		<div class='row'>
			<div class='col-12 col-md-6'>
			<img src='/files/img/blog/fides-san-juan-de-dios-sevilla.jpg' alt='image' class='blog-img mt-3'>
			</div>
			<div class='col-12 col-md-6'>
			<img src='/files/img/blog/servicio-fides-san-juan-de-dios-sevilla.jpg' alt='image' class='blog-img mt-3'>
			</div>
		</div>
		",
		"feature" => false,
		"page_title" => "Fides, nuestro protocolo de gestión integral para los pacientes",
		"page_description" => "Disponemos del servicio FIDES, un gestor personal que facilita todos los trámites a los usuarios de nuestro hospital."
	],
	"recien-nacidos" => (object) [
		"fecha" => "Martes, 03 de enero de 2023",
		"title_noticia" => "Los recién nacidos, características y cuidados generales",
		"img_main" => "/files/img/blog/recien-nacidos.jpg",
		"short_notice" => "La llegada a casa de un recién nacido plantea muchas dudas respecto a su cuidado y a la normalidad de ciertas características propias de ellos. Conocer algunas de las características normales y comunes que pueden aparecer nos sería de mucha ayuda y nos tranquilizará. Podemos distinguir en función de la zona del cuerpo los siguientes signos",
		"content" => "<p class='p15 third-font-gray mt-4'>La llegada a casa de un recién nacido plantea muchas dudas respecto a su cuidado y a la normalidad de ciertas características propias de ellos. Conocer algunas de las características normales y comunes que pueden aparecer nos sería de mucha ayuda y nos tranquilizará. Podemos distinguir en función de la zona del cuerpo los siguientes signos:</p>
	   <ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'><span class='text-dark'>En la piel:</span> descamación, manchas oscuras, restos blanquecinos, manchas de color rojo o granos blanquecinos.</li>
		<li class='mt-2'><span class='text-dark'>En las mamas:</span> ingurgitación (telarquia de los primeros días), salida de secreción blanquecina (leche de brujas o galactorrea del recién nacido). </li>
		<li class='mt-2'><span class='text-dark'>En las uñas:</span> uñas largas y parcialmente rotas en sus extremos.</li>
		<li class='mt-2'><span class='text-dark'>En los genitales:</span> fimosis y adherencia balano-prepuciales, labios mayores abultados, salida del orificio vaginal de secreción mucosa, pequeño sangrado vaginal y restos blanquecinos.</li>
		<li class='mt-2'><span class='text-dark'>En los ojos:</span> secreciones amarillentas. 
		</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Todos estos signos son normales y pueden ocurrirle a cualquier recién nacido, además pueden producirse hipos, estornudos o pequeños ruidos nasales al dormir, así como un patrón de actividad y sueños variables.</p>
		<p class='p15 third-font-gray mt-4'>También es importante conocer lo cuidados generales de un recién nacido entre los cuales podemos destacar los siguientes:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>En los primeros días, no es necesario el baño diario (sobre todo si aún no se le ha caído el cordón umbilical) y hay que evitar que sea prolongado (no más de 10 minutos).</li>
		<li class='mt-2'>Para el baño utilizar geles y champús suaves (sin perfumes), neutros o con pH fisiológico. También se pueden utilizar geles de avena o parafina. Para enjabonar es recomendable usar las manos y no usar esponjas. Para secar, tratar de no frotar con toalla, prestando especial atención a los pliegues.</li>
		<li class='mt-2'>Mantener la zona del cordón umbilical limpia y seca. No es necesario el uso de antisépticos. Utilizar para ello los geles habituales de baño, poniendo una gasa seca alrededor del cordón si todavía no se ha caído.</li>
		<li class='mt-2'>Tras el baño, aplicar cremas hidratantes de alto contenido en grasa (emolientes) sobre la piel, en la cantidad y con la frecuencia necesaria para que permanezca bien hidratada.</li>
		<li class='mt-2'>En el área del pañal, debemos usar cremas que actúen como barrera que no incluyan sustancias irritativas. El cambio de pañal debe realizarse con frecuencia, como mínimo después de cada toma o cada vez que se note sucio.</li>
		<li class='mt-2'>Evitar la exposición solar directa en los primeros años de vida, utilizando cremas con factor de protección de 50 o más.</li>
		<li class='mt-2'>Evitar las prendas de lana y de fibra, siendo preferible emplear el algodón, sobre todo en aquellas que estén en contacto directo con la piel. Se debe procurar no abrigar en exceso al niño y no ponerle ropa ajustada.</li>
		<li class='mt-2'>Las uñas pueden cortarse, en lo posible con cortauñas. No deben introducirse bastoncillos en el conducto auditivo.</li>
	   </ul>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar consulta con el servicio de <a href='https://sjdsevilla.com/pediatria-sevilla' class='link-blog'>pediatría</a> del Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> </p>
	   	",
		"feature" => false,
		"page_title" => "Los recién nacidos, características y cuidados generales",
		"page_description" => "Os facilitamos algunos consejos para el cuidado general de los recién nacidos, así como algunas características normales que pueden aparecer."
	],
	"consejos-generales" => (object) [
		"fecha" => "Viernes, 30 de diciembre de 2022",
		"title_noticia" => "Consejos para manener una buena salud en la infancia",
		"img_main" => "/files/img/blog/consejos-generales-blog.jpg",
		"short_notice" => "Son ilimitados los consejos de salud para mantener una buena salud en los niños, es por ello que desde el servicio de pediatría del Hospital San Juan de Dios nos facilitan algunos de los consejos más importante que es conveniente fomentar entre los más pequeños",
		"content" => "<p class='p15 third-font-gray mt-4'>Son ilimitados los consejos de salud para mantener una buena salud en los niños, es por ello que desde el servicio de pediatría del Hospital San Juan de Dios nos facilitan algunos de los consejos más importante que es conveniente fomentar entre los más pequeños, entre los que se encuentran los siguientes:</p>
		<ul class='third-font-gray mt-3 p15'>
		 <li class='mt-2'>La vacunación: es una base fundamental y que ayuda a brindar inmunidad antes de que los pequeños estén expuestos a enfermedades que podrían convertirse en mortales. Hay enfermedades que antes originaban una gran mortalidad, y que ahora están erradicadas en todo el mundo, como el sarampión o la viruela, y otras, casi erradicadas o controladas, como la hepatitis B o la difteria. Especial importancia merecen, a partir del ya casi finalizado año 2022, la campaña de vacunación frente a la gripe y COVID-19, debido a la situación que seguimos atravesando tras la pandemia.</li>
		 <li class='mt-2'>Los hábitos saludables son de suma importancia seguidos durante el crecimiento del niño. La alimentación, el deporte, el descanso o sueño, evitar el sedentarismo y las pantallas, o la infancia sin humo, son recomendaciones de suma importancia para la salud de los niños y de cara también a su futuro crecimiento.</li>
		 <li class='mt-2'>La lactancia materna, que es base fundamental del crecimiento y desarrollo neuropsicológico de los recién nacidos. Son muchos los artículos que hablan sobre este tema, pero lo cierto es que la leche materna es el alimento ideal para el bebé. Proporciona no sólo los nutrientes y la hidratación necesarios, sino que, además, proporciona el apego y el cariño que tanto madre e hijo necesitan en esa etapa tan frágil y sensible de la vida. Gracias a ello, ayuda a prevenir infecciones gastrointestinales y respiratorias, obesidad, diabetes, leucemia, alergias, cáncer infantil, hipertensión y colesterol alto. Además de reforzar la autoestima, aumentar el coeficiente intelectual y disminuir muchos trastornos del neurodesarrollo entre otros.</li>
		 <li class='mt-2'>No podemos finalizar sin mencionar las revisiones o controles de salud, como base para la promoción de la salud y prevención de enfermedades, que engloba a todos los conceptos anteriores. En estas consultas, además de dar pautas para una vida saludable, se pueden detectar alteraciones en el crecimiento y desarrollo e identificar enfermedades en fases tempranas. En ellas, no solo se valorará su desarrollo físico, psicológico y social, sino que también el objetivo es lograr la mayor y mejor salud en todos los aspectos: preventivos, curativos y paliativos, lo que llamamos una atención integral. Como guía, hasta los 12 meses de edad, las revisiones médicas en niños deben hacerse mensualmente, a partir del año trimestralmente, y una vez pasado los 2 años, la frecuencia será al menos anual.  </li>
		 </ul>
		 <p class='p15 third-font-gray mt-4'>Puedes solicitar consulta con cualquiera de nuestras  especialidades desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> </p>
		 ",
		"feature" => false,
		"page_title" => "Consejos para manener una buena salud en la infancia",
		"page_description" => "Os facilitamos algunos consejos importantes para mantener una buena salud en la etapa infantil. Estos consejos han sido redactados por la unidad de pediatría del Hospital San Juan de Dios de Sevilla. "
	],
	"consejos-nuestro-pediatra" => (object) [
		"fecha" => "Lunes, 26 de diciembre de 2022",
		"title_noticia" => "El estreptococo, qué es y cómo prevenirlo",
		"img_main" => "/files/img/blog/bronquilitis-san-juan-dios-sevilla.jpg",
		"short_notice" => "El servicio de Pediatría del Hospital San Juan de Dios de Sevilla llama a la calma por la alarma producida en Reino Unido por infecciones por estreptococo del grupo A (Streptococcus pyogenes).",
		"content" => "<p class='p15 third-font-gray mt-4'>El servicio de Pediatría del Hospital San Juan de Dios de Sevilla llama a la calma por la alarma producida en Reino Unido por infecciones por estreptococo del grupo A (Streptococcus pyogenes).</p>
						<p class='p15 third-font-gray mt-4'>En los primeros días de diciembre de 2022, Reino Unido publicaba un informe en el que se comunicó un notable aumento precoz, comparado con años anteriores, de infecciones debido a la bacteria Streptococcus pyogenes. </p>
						<p class='p15 third-font-gray mt-4'>En España, ya se ha notificado un aumento de casos, la mayoría leves. A raíz de este hecho, la Consejería de Salud y Consumo de la Junta de Andalucía, a través de la vigilancia en Salud Pública de la dirección General de Salud Pública y Ordenación Farmacéutica, declaró esta infección como un evento de interés en Salud Pública (al no ser actualmente una enfermedad de declaración obligatoria). </p>
						<p class='p15 third-font-gray mt-4'>Desde la misma Consejería aseguran que no hay motivos para la alarma, ya que es una enfermedad habitual tanto en Andalucía como en España, provocada por una bacteria conocida, de rápido diagnóstico, que puede tratarse con antibióticos y que en la mayoría de los casos cursa de manera leve. </p>
						<p class='p15 third-font-gray mt-4'>En definitiva, el estreptococo que se está detectando no es una nueva cepa sino la de siempre y la manera de actuar contra él no debe cambiar. Su diagnóstico y tratamiento sigue siendo el mismo e igual de efectivo.  </p>
						<p class='p15 third-font-gray mt-4'>El Dr. Juan Carlos Vargas, jefe de equipo del servicio de pediatría, nos explica lo que debemos saber sobre esta infección: </p>
						<p class='p15 third-font-gray mt-4'>El estreptococo del grupo A, es una bacteria que vive con nosotros, habitualmente en la garganta, en estado portador (no da síntomas). Cuando produce síntomas, la mayoría de las veces es por infecciones leves que no representan gravedad, y sobre todo se da en las edades comprendidas entre los 3 y los 15 años.</p>
						<p class='p15 third-font-gray mt-4'>Entre estas infecciones, la amigdalitis y la faringitis son las más comunes, pero también el impétigo, la escarlatina, la otitis y sinusitis por esta bacteria son frecuentes. </p>
						<p class='p15 third-font-gray mt-4'>Sin embargo, esta misma bacteria puede dar otras infecciones de mayor gravedad, pero muchos menos frecuentes, como pueden ser las neumonías, fascitis necrotizante, shock tóxico estreptocócico o meningitis. </p>
						<p class='p15 third-font-gray mt-4'>Todos estos cuadros, ya ampliamente conocidos entre los pediatras, sabemos cómo diagnosticarlos y tratarlos desde hace tiempo. </p>
						<p class='p15 third-font-gray mt-4'>El estreptococo se transmite por vía aérea, al igual que la gripe, por contacto directo con secreciones o gotitas de personas infectadas que se impulsan al toser, o por objetos contaminados con estas secreciones.  </p>
						<p class='p15 third-font-gray mt-4'>El diagnóstico de infección por estreptococo se hace por los síntomas y por un test de detección rápida que se realiza rápidamente al pasar un hisopo por la garganta. Tienen una sensibilidad bastante alta, por lo que podremos asegurar el uso de antibióticos, o no, según su resultado. </p>
						<p class='p15 third-font-gray mt-4'>Algunas de las recomendaciones establecidas por el área de pediatría del Hospital San Juan de Dios de Sevilla son las siguientes: </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'></span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Mantener la calma y estar alerta ante cualquier signo de empeoramiento indicado por nuestro pediatra, de cualquier infección de las vías altas. </li>
						<li class='mt-2'>Se recomienda la vacunación de la gripe, a todos los niños entre 6 meses y 5 años, para evitar sobreinfecciones o coinfecciones respiratorias de esta enfermedad, que potencialmente pueden agravarla. </li>
						<li class='mt-2'>Mantener una correcta higiene de manos y el uso de la mascarilla para minimizar el riesgo de infección. </li>
						<li class='mt-2'>Aislamiento domiciliario, sin acudir al colegio, a todo niño con infección confirmada por estreptococo, hasta llevar al menos 24 horas con tratamiento antibiótico, para evitar la diseminación y el aumento de casos. </li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar cita con el servicio de pediatría del Hospital San Juan de Dios de Sevilla desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita' class='link-blog'>https://sjdsevilla.com/pedir-cita</a> </p>",
		"feature" => false,
		"page_title" => "El estreptococo, qué es y cómo prevenirlo",
		"page_description" => "Hoy en consejos de nuestro pediatra, os traemos un artículo sobre el estreptococo, qué es y como prevenirlo, así como algunas recomendaciones para evitar la enfermedad o sobrellevarla. "
	],


	"testimonio_de_daisy_yau" => (object) [
		"fecha" => "Viernes, 23 de diciembre de 2022",
		"title_noticia" => "Testimonios de nuestros pacientes: Daisy Yau",
		"img_main" => "/files/img/blog/mr-mrs-yau.jpg",
		"short_notice" => "Hoy os dejamos la entrevista realizada a Daisy Yau, una paciente americana que acudió de urgencias al Hospital San Juan de Dios de Sevilla tras sufrir un problema de salud cuando se encontraba en Sevilla. Gracias a su seguro de salud pudo acudir a nuestro Hospital y tuvimos el placer de que nos comentase su experiencia la cual os dejamos a continuación.",
		"content" => "<p class='p20 third-font-gray mt-4'>Hoy os dejamos la entrevista realizada a Daisy Yau, una paciente americana que acudió de urgencias al Hospital San Juan de Dios de Sevilla tras sufrir un problema de salud cuando se encontraba en Sevilla. Gracias a su seguro de salud pudo acudir a nuestro Hospital y tuvimos el placer de que nos comentase su experiencia la cual os dejamos a continuación. </p>
		<p class='p15 third-font-gray mt-4'>Daisy Yau fue cofundadora y alta ejecutiva de un banco comunitario de Nueva York durante 18 años y asistente ejecutiva en el condado de Westhester, un suburbio de la ciudad de Nueva York.</p>

		<p class='p15 third-font-gray mt-4'><b><strong>¿Qué le parecen el edificio y las instalaciones de nuestro hospital? ¿Cumplen con sus expectativas?</strong></b></p>
		
		<p class='p15 third-font-gray mt-4'>En relación a su pregunta comprobamos de primera mano que el hospital se desinfecta a fondo todos los días. Es importante que el hospital no esté abarrotado de pacientes, ya que minimiza la posibilidad de infección o contaminación cruzada. Ha superado con creces mis expectativas basándome en toda mi experiencia, desde la atención hacia mi persona, pasando por revisar con el cirujano jefe y el jefe de medicina interna mi diagnóstico, recomendaciones, opciones y procedimientos quirúrgicos, hasta recibir un informe postoperatorio detallado en inglés, así como el cuidado atento y cariñoso de tres enfermeras y un médico que me atendieron en la UCI. Todo ello con el apoyo de un gestor de atención al paciente que habla inglés y que está disponible en todo momento a través de llamadas tanto para ayudar o explicar cualquier necesidad del paciente a el departamento que fuese. 
		El gestor de atención al paciente también se encargó de las reclamaciones de pago directamente con el seguro y de recopilar los registros médicos y de tomografía computarizada antes del alta. No creo que pueda encontrar una experiencia hospitalaria tan completa y satisfactoria en ningún lugar de Estados Unidos. 
		</p>
		
		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo fue su experiencia en nuestras urgencias?</strong></b></p>

		<p class='p15 third-font-gray mt-4'>En primer lugar, no estaba abarrotado, y por tanto la atención fue inmediata. Me facilitaron rápidamente un chequeo, radiografías y un tratamiento. Tanto los médicos como las enfermeras son muy profesionales y eficientes. </p>

		<p class='p15 third-font-gray mt-4'><b><strong>¿La habitación era cómoda y de su agrado?</strong></b></p>

		<p class='p15 third-font-gray mt-4'>Las habitaciones son espaciosas y cuentan con un sofá cama para cualquier familiar o amigo que asista. También se ofrecen tres comidas bastante deliciosas. Todas las habitaciones están muy limpias y perfectamente desinfectadas. </p>

		<p class='p15 third-font-gray mt-4'><b><strong>¿Cómo ha sido el trato recibido por parte del Hospital, tanto por parte del personal como por parte del equipo médico? </strong></b></p>

		<p class='p15 third-font-gray mt-4'>Lo describiría con cariño, especialmente el equipo médico y quirúrgico, las enfermeras de la UCI y el gestor de pacientes. Muy receptivos, complacientes, comunicativos y comprometidos a ofrecer la mejor atención que conocen. 	</p>



		<p class='p15 third-font-gray mt-4'><b><strong>En su opinión, ¿está preparado el Hospital para atender a pacientes internacionales?	</strong></b></p>

		<p class='p15 third-font-gray mt-4'>Absolutamente. Los mejores cirujanos/médicos trabajan y/o colaboran con hospitales estadounidenses como los hospitales Mount Sinay Sloan Kettering de Nueva York. Tienen una gran reputación en España. El cirujano jefe, es actualmente Vicepresidente de la Asociación Española de Cirujanos.  		</p>



		<p class='p15 third-font-gray mt-4'><b><strong>¿Ha podido comunicarse en inglés con el personal del Hospital fácilmente? </strong></b></p>

		<p class='p15 third-font-gray mt-4'>Muchos cirujanos, médicos y enfermeras hablan bien inglés. En cualquier caso, Google Translate facilita la comunicación. El gestor de pacientes está a disposición en cualquier momento para ayudarte a comunicar cualquier necesidad o problema concreto.</p>



		<p class='p15 third-font-gray mt-4'><b><strong>¿Algo más que quieras comentarnos respecto a tu experiencia? </strong> </b></p>

		<p class='p15 third-font-gray mt-4'>Es la primera vez que acudo a un hospital en España y estoy asombrado de experimentar servicios hospitalarios tan profesionales y atentos fuera de Estados Unidos. Estaré toda mi vida agradecida al Hospital San Juan de Dios de Sevilla por los servicios prestados. 		</p>

		
		<img src='/files/img/blog/testimonioDeDaisyYau1.jpg' alt='image' class='blog-img mt-3'>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita en cualquiera de nuestras especialidades desde el siguiente  <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>enlace</a></p>",
		"feature" => false,
		"page_title" => "Testimonios de nuestros pacientes: Daisy Yau",
		"page_description" => "Entrevista realizada a Daisy Yau, una paciente americana que acudió de urgencia a nuestro hospital."	
	],
	"irene_jara_lopez" => (object) [
		"fecha" => "Miércoles, 21 de diciembre de 2022",
		"title_noticia" => "Irene Jara López, jefa de equipo de hematología y hemoterapia ",
		"img_main" => "/files/img/blog/irene-jara-lopez-hematologa-edi.png",
		"short_notice" => "La Dra. Irene Jara López es Licenciada en Medicina y Cirugía por la Facultad de Medicina de la Universidad de Sevilla y cursó dichos estudios del año 1990 a 1996.",
		"content" => "<p class='p20 third-font-gray mt-4'>La Dra. Irene Jara López es Licenciada en Medicina y Cirugía por la Facultad de Medicina de la Universidad de Sevilla y cursó dichos estudios del año 1990 a 1996.</p>
		<p class='p15 third-font-gray mt-4'>Ha sido alumna interna del departamento de Farmacología, Pediatría y Radiología, nombrada mediante oposición durante el curso 94/95, desarrollando dicha actividad en el Servicio de Pediatría del Hospital Universitario Virgen del Rocío.</p>

		<p class='p15 third-font-gray mt-4'>Realizó la especialidad de Hematología y Hemoterapia vía MIR en el Hospital Virgen del Rocío durante el periodo comprendido entre mayo de 1997 y mayo de 2001, obteniendo una calificación en la misma de destacada.</p>
		
		<p class='p15 third-font-gray mt-4'>Se doctoró en Medicina con calificación de sobresaliente “Cum Laude” por la Facultad de Medicina de la Universidad de Sevilla en abril de 2002 por el trabajo de investigación titulado<i> “Relación entre tiempo de almacenamiento de los concentrados de hematíes y morbilidad en pacientes sometidos a cirugía cardíaca”</i>.</p>
		
		<p class='p15 third-font-gray mt-4'>Respecto a su experiencia laboral, la Dra. Irene Jara López podemos destacar la siguiente: </p>

		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>La adquirida durante los cuatro años de formación como Médico Interno Residente.</li>
		<li class='mt-2'>1 Julio-30 septiembre 2001:  Facultativo Especialista de Área (F.E.A.) en el Hospital Universitario Virgen del Rocío, realizando labor asistencial fundamentalmente en Banco de Sangre y Consultas externas y Sección de Anemias.</li>
		<li class='mt-2'>1 Julio-31 agosto 2002: Facultativo Especialista de Área en el Hospital Universitario Virgen del Rocío, en la sección de Laboratorio/Banco de Sangre, Hematología Clínica de Adultos y Hematología Clínica de Hospital Infantil. </li>
		</ul>

		<p class='p15 third-font-gray mt-4'>En la actualidad, ejerce como facultativa especialista en el área de Hematología y Hemoterapia en el Hospital San Juan de Dios Aljarafe desde el 23 de septiembre de 2002 y también en dicho hospital ha ejercido como secretaria del Comité de Transfusión Hospitalario y Responsable de Hemovigilancia de la Comisión de Seguridad Clínica desde 2002 hasta 2015.  </p>

		<p class='p15 third-font-gray mt-4'>Desde la apertura del nuevo Hospital San Juan de Dios de Sevilla es jefe de servicio de la especialidad de <a class='enlace' href='https://sjdsevilla.com/hematologo-sevilla' target='_blank'>Hematología y Hemoterapia</a></p>

		<p class='p15 third-font-gray mt-4'>Durante mayo de 2010 y mayo de 2011 fue cooperante sanitaria y voluntaria con la ONG Salud para Todos (promovida por la Orden Hospitalaria de San Juan de Dios) en  St John of God Hospital de Asafo (Ghana).		</p>
		<p class='p15 third-font-gray mt-4'>Ha participado en multitud de congresos tanto a nivel internacional, nacional y regional, así como ha publicado en diversas revistas médicas nacionales e internacionales. También ha formado parte de numerosas conferencias, protocolos de investigación y participado en capítulos de libros. 		</p>
		<p class='p15 third-font-gray mt-4'>Fue premiada por la Sociedad Española de Transfusión Sanguínea al mejor trabajo en el área de Transfusión e Inmunomodulación por el conjunto de comunicaciones presentadas en el XII Congreso Nacional de  la SETS 2001, con título “Influencia del tiempo de almacenamiento de los concentrados de hematíes en la morbilidad postquirúrgica de pacientes sometidos a cirugía cardíaca”. </p>
		
		
		
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con la Dra. Irene Jara López desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'></a></p>",

		"feature" => false,
		"page_title" => "Irene Jara López, jefa de equipo de hematología y hemoterapia",
		"page_description" => "La Dra. Irene Jara López es actualmente jefa de equipo de hematología y hemoterapia del Hospital San Juan de Dios de Sevilla."	
	],
	"antonio _luna_alcala" => (object) [
		"fecha" => "Martes, 20 de diciembre de 2022",
		"title_noticia" => "Antonio Luna, jefe de equipo de radiología",
		"img_main" => "/files/img/blog/antonio-luna-alcala-radiologia.png",
		"short_notice" => "El Dr. Antonio Luna Alcalá es licenciado en Medicina por la Universidad de Granada y posteriormente estudió la especialidad de radiología en el Hospital Gregorio Marañon de Madrid.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Dr. Antonio Luna Alcalá es licenciado en Medicina por la Universidad de Granada y posteriormente estudió la especialidad de radiología en el Hospital Gregorio Marañon de Madrid. Para ampliar sus conocimientos de la especialidad y en resonancia magnética, realizó estancias formativas en los departamentos de Radiología de Duke Medical Center (Duke University, Durham, NC) y Brigham and Women's Hospital (Harvard University, Boston, Ma). </p>
		<p class='p15 third-font-gray mt-4'>Tras la realización de su residencia, centró su trabajo en la imagen abdominal y cardíaca, compartiendolas con labores asistenciales y de gestión.</p>

		<p class='p15 third-font-gray mt-4'>En relación a la educación podemos destacar lo siguiente: </p>

		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Nombrado educador del año de la Radiological Society of North America en 2018, 2019 y 2020. </li>
		<li class='mt-2'>Participación como conferenciante en más de 200 congresos nacionales e internacionales. </li>
		<li class='mt-2'>Ha sido profesor asociado de radiología en el departamento de Radiología del Hospital Universitario de Cleveland hasta el pasado año.</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>Respecto a la experiencia sobre la investigación podemos destacar lo siguiente: </p>

		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Ha escrito más de 70 artículos sobre radiología y otras especialidades, participado en más de 30 capítulos de libros y ha sido editor en 14 libros de la especialidad.</li>
		<li class='mt-2'>Obtuvo sobresaliente Cum Laude en su tesis sobre modelos avanzados de difusión con RM para la detección de cáncer de próstata en el departamento de Radiología de la Universidad de Málaga.</li>
		<li class='mt-2'>Ha participado en más de 50 proyectos de investigación, siendo en 5 de ellos investigador principal. </li>
		<li class='mt-2'>Ha recibido más de 40 premios en congresos nacionales e internacionales por presentaciones educativas y científicas.</li>
		<li class='mt-2'>Ha dirigido más de 25 cursos educativos de la especialidad y 4 cursos online de la SERAM (Sociedad Española de Radiología Médica).</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>Actualmente forma parte de varios comités educativos de la RSNA y de la investigación de la ECR y además es miembro de la SERAM, SEDIA, SERME, ESR y RSNA entre otras. </p>

		<p class='p15 third-font-gray mt-4'>Actualmente, es el Director Médico de HT-médica, donde desarrollan su profesión bajo los criterios de especialización, eficiencia y calidad.</p>

		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con el Dr. Luna Alcalá Llamas desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",

		"feature" => false,
		"page_title" => "Antonio Luna, jefe de equipo de radiología",
		"page_description" => "El Dr. Antonio Luna Alcalá es actualmente jefe de equipo de radiología del Hospital San Juan de Dios de Sevilla."	
	],
	"luis_manuel_granados_llamas" => (object) [
		"fecha" => "Viernes, 16 de diciembre de 2022",
		"title_noticia" => "Luis Manuel Granados, jefe de equipo de anestesiología y reanimación",
		"img_main" => "/files/img/blog/luis-manuel-granados-anestesiologo.jpg",
		"short_notice" => "El Dr. Luis Manuel Granados Llamas es Licenciado en Medicina y Cirugía en la Facultad de Medicina de la Universidad de Sevilla desde 1987 a 1992, siendo alumno adscrito al Hospital Militar de Sevilla durante los tres últimos años de su formación.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Dr. Luis Manuel Granados Llamas es Licenciado en Medicina y Cirugía en la Facultad de Medicina de la Universidad de Sevilla desde 1987 a 1992, siendo alumno adscrito al Hospital Militar de Sevilla durante los tres últimos años de su formación.</p>
		<p class='p15 third-font-gray mt-4'>Tras superar el MIR, realizó la especialidad de Anestesiología, Reanimación y Terapéutica del Dolor en el Hospital Universitario Virgen del Rocío de Sevilla entre los años 1993 a 1997.</p>
		<p class='p15 third-font-gray mt-4'>Como especialista, desde el año 1997 a 2006, compaginó su actividad en el sistema público de salud en los hospitales Infanta Elena de Huelva, el hospital de Minas de Riotinto y el Hospital Universitario Virgen del Rocío, y en diversos hospitales privados del área de Sevilla.</p>
		
		<p class='p15 third-font-gray mt-4'>Como actividad formativa, el Dr. Granados ha sido tutor de residentes de la especialidad de anestesiología y reanimación en el Hospital Virgen del Rocío, en el ámbito público, y desde el año 2006 se dedica única y exclusivamente tanto a la formación como al desarrollo de su profesión en el ámbito privado.</p>

		<p class='p15 third-font-gray mt-4'>Ha participado en numerosos artículos y publicaciones, recibiendo el premio de la mejor comunicación en la XL reunión de la Asociación Andaluza-Extremeña de Anestesiología, Reanimación y Terapéutica del Dolor.</p>

		<p class='p15 third-font-gray mt-4'>También es perteneciente a las siguientes asociaciones y sociedades: </p>

		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Asociación Andaluza Extremeña de Anestesiología y Reanimación.</li>
		<li class='mt-2'>Sociedad Española de Anestesiología y Reanimación.</li>
		<li class='mt-2'>Asociación Profesional Sevillana Anestesiología y Reanimación.</li>
		<li class='mt-2'>Miembro Honorario Sociedad Bonaerense de Medicina Crítica.</li>
		<li class='mt-2'>Federación Española de Asociaciones Profesionales de Anestesiología.</li>
		</ul>

		<p class='p15 third-font-gray mt-4'>Actualmente es jefe de equipo de <a class='enlace' href='https://sjdsevilla.com/anestesia-sevilla' target='_blank'>Anestesiología y Reanimación</a> del <a class='enlace' href='https://sjdsevilla.com/' target='_blank'>Hospital San Juan de Dios de Sevilla</a>.</p>

		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con el Dr. Luis Manuel Granados Llamas desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",

		"feature" => false,
		"page_title" => "Luis Manuel Granados (anestesiología)",
		"page_description" => "El Dr. Luis Manuel Granado Llamas es actualmente jefe de equipo de anestesiología y reanimación del Hospital San Juan de Dios de Sevilla."	
	],
	"bronquiolitis" => (object) [
		"fecha" => "Miércoles, 14 de diciembre de 2022",
		"title_noticia" => "La broquiolitis, qué es y cómo prevenirla",
		"img_main" => "/files/img/blog/bronquiolitis-consejos-pediatra-blog.jpg",
		"short_notice" => "Comienza la temporada de frío, y con ella una de las infecciones más frecuentes en los niños pequeños, la bronquiolitis, que está saturando las urgencias de muchos hospitales en toda España. ",
		"content" => "<p class='p20 third-font-gray mt-4'>Comienza la temporada de frío, y con ella una de las infecciones más frecuentes en los niños pequeños, la bronquiolitis, que está saturando las urgencias de muchos hospitales en toda España.</p>
		<p class='p15 third-font-gray mt-4'>La bronquiolitis es una infección respiratoria de las vías aéreas pequeñas que están en los pulmones (bronquiolos). Está causada por muchos virus, pero el responsable principal es el Virus Respiratorio Sincitial (VRS).</p>
		<p class='p15 third-font-gray mt-4'>Afecta sobre todo a menores de 2 años (pico 2-6 meses), la mayoría con cuadros leves, y se contagia igual que cualquier catarro, por medio de la tos y mucosidad. </p>
		
		<p class='p15 third-font-gray mt-4'>Para su diagnóstico no hace ninguna prueba, se hace solo con los síntomas que presenta el niño. Estos pueden variar mucho, pero habitualmente comienzan como un catarro o resfriado con mucosidad, tos leve y a veces fiebre. Después de 2-3 días puede empeorar la tos y la respiración, haciéndose esta más agitada (se marcan las costillas y el abdomen se mueve mucho) apareciendo ruidos en el pecho.</p>

		<p class='p15 third-font-gray mt-4'>Aunque la mayoría de las veces son cuadros leves, en raras ocasiones puede necesitar ingreso hospitalario, para observación y administración de oxígeno (por gafas nasales). Esto es debido a que la inflamación y producción de mucosidad dificultan la respiración y el paso de aire hacia los pulmones.</p>
		
		<p class='p15 third-font-gray mt-4'>El curso natural de la bronquiolitis puede durar entre 7-10 días, pero la tos, puede durar entre 2-4 semanas. Entre el segundo y tercer día es cuando se produce su empeoramiento.</p>

		<p class='p15 third-font-gray mt-4'>Es importante que sepamos reconocer bien los síntomas y signos que pueden tener nuestros niños y que nos deben alertar  para acudir al pediatra o a urgencias:</p>

		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Si tiene muchos ruidos en el pecho (silbidos o pitos) y respira cada vez más rápido.</li>
		<li class='mt-2'>Si respira con dificultad, cada vez más deprisa, se le marcan las costillas, mueve mucho el abdomen, se le hunde el pecho o deja de respirar durante segundos (pausas de apnea).</li>
		<li class='mt-2'>Si presenta mal estado general, esta irritable, adormilado, quejoso, pálido o con labios y uñas azuladas o moradas.</li>
		<li class='mt-2'>Si se fatiga mucho con las tomas, a tal punto que casi no come, vomita frecuentemente, o apenas moja pañales.</li>
		<li class='mt-2'>Si tiene fiebre alta (más de 39.5 - 40ºc) y de difícil control.</li>
		</ul>
						
		<p class='p15 third-font-gray mt-4'>Además, habrá que vigilarlos más de cerca y estar más alerta, si su hijo es menor de 3 meses, prematuro, o presenta algún problema de base en el corazón (cardiopatía) o los pulmones (displasia pulmonar, FQ), porque el riesgo de bronquiolitis grave es mayor.</p>

		<p class='p15 third-font-gray mt-4'>El pediatra valorará la gravedad del cuadro, pero la mayoría de las veces se trata tomando las siguientes medidas:</p>
		
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Mantenga al niño algo incorporado, elevando la cabecera de la cama o cuna 30º al dormir (le ayudará a respirar mejor).</li>
		<li class='mt-2'>Los lavados nasales con suero fisiológico (o solución salina) y aspirado de secreciones siempre que precise, y preferiblemente, antes de comer y/o dormir.</li>
		<li class='mt-2'>Ofrecer líquidos (leche o agua) de forma regular y en pequeñas tomas para mantener una buena hidratación.</li>
		<li class='mt-2'>Debe realizar las tomas más pequeñas y más frecuente (de líquidos y/o alimentos blandos), evitará que el niño se fatigue.</li>
		<li class='mt-2'>Administrar antitérmicos solo si tiene fiebre (más de 38º).</li>
		<li class='mt-2'>Procurar un ambiente tranquilo y libre de humo de cigarrillo.</li>
		<li class='mt-2'>Controles por el pediatra, en las primeras 24, 48 y 72 horas (más si tiene riesgo de hacer una bronquiolitis grave, su pediatra se lo dirá).</li>
		</ul>
		
		<p class='p15 third-font-gray mt-4'>Es importante recordar:</p>
		
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>La mayoría de las bronquiolitis son leves y se pasan en casa en unos 7-10 días (aunque la tos puede durar 2 semanas más).</li>
		<li class='mt-2'>El tratamiento, como en casi todas las infecciones víricas, es sintomático (es decir, con las medidas antes mencionadas: lavados nasales, tomas frecuentes, antitérmicos…).</li>
		<li class='mt-2'>En la actualidad, no existe ningún medicamento que cure la bronquiolitis. No son útiles: los antibióticos, los jarabes para la tos, los mucolíticos o los corticoides (salvo por indicación médica).</li>
		<li class='mt-2'>Algunos niños, tras padecer una bronquiolitis, pueden presentar episodios sucesivos de sibilancias con tos, que recuerdan el cuadro inicial.</li>
		</ul>
		
		<p class='p15 third-font-gray mt-4'>Recuerda que puedes pedir cita con nuestros pediatras desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>Servicio de cita previa - Hospital San Juan de Dios</a> o bien llamando al 955 045 999.</p>",

		"feature" => false,
		"page_title" => "La broquiolitis, qué es y cómo prevenirla",
		"page_description" => "Os traemos un artículo sobre la bronquiolitis, qué es y cómo prevenirla, así como detectar los síntomas más comunes."	
	],
	"jose_bernabeu_wittel" => (object) [
		"fecha" => "Lunes, 12 de diciembre de 2022",
		"title_noticia" => "José Bernabeu Wittel, jefe de equipo de dermatología",
		"img_main" => "/files/img/blog/jose_bernabeu_wittel.jpg",
		"short_notice" => "Licenciado en Medicina y Cirugía, se especializó vía MIR por el Hospital Universitario Virgen del Rocío. Además de su labor asistencial, se ha centrado en la investigación científica, principalmente de la patología dermatológica pediátrica y las anomalías vasculares.",
		"content" => "<p class='p20 third-font-gray mt-4'>Licenciado en Medicina y Cirugía, se especializó vía MIR por el Hospital Universitario Virgen del Rocío. Además de su labor asistencial, se ha centrado en la investigación científica, principalmente de la patología dermatológica pediátrica y las anomalías vasculares.</p>
		<p class='p15 third-font-gray mt-4'>Cuenta con más de 50 publicaciones en revistas nacionales e internacionales y es miembro de la Junta Directiva de la Academia Española de Dermatología y Venereología y del Grupo Español de Dermatología Pediátrica.</p>
		<p class='p15 third-font-gray mt-4'>Actualmente es jefe del equipo de dermatología del Hospital San Juan de Dios de Sevilla. </p>
		
		<p class='p15 third-font-gray mt-4'>Es experto en dermatitis atópica, que es la afección inflamatoria y crónica de la piel que causa picazón severo, en alergias infantiles, en malformaciones vasculares (lesiones de nacimiento o formaciones congénitas) y en el uso del láser vascular para de forma rápida y eficaz, eliminar lesiones vasculares en cualquier zona del cuerpo o rostro.</p>

		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con el Dr. José Bernabeu desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",

		"feature" => false,
		"page_title" => "José Bernabeu Wittel, jefe de equipo de dermatología",
		"page_description" => "El Dr. José Bernabeu Wittel es actualmente jefe de equipo de dermatología del Hospital San Juan de Dios de Sevilla."	
	],

	"mariano_ruiz_borrell" => (object) [
		"fecha" => "Viernes, 09 de diciembre de 2022",
		"title_noticia" => "Mariano Ruiz Borrell, jefe de equipo de cardiología ",
		"img_main" => "/files/img/blog/ruiz_borrell_mariano.jpg",
		"short_notice" => "El Dr. Mariano Ruiz Borrell es Licenciado en Medicina y Cirugía por la Universidad de Sevilla en el año 1988, superando su examen de licenciatura en el mismo año con sobresaliente. Posteriormente completó el programa de Doctorado por la Universidad de Sevilla y suficiencia investigadora en 1990.",
		"content" => "<p class='p20 third-font-gray mt-4'>Realizó la especialidad de Cardiología vía MIR en el año 1995 en el Hospital Universitario Virgen del Rocío.</p>
		<p class='p15 third-font-gray mt-4'>Respecto a su experiencia profesional, realiza su residencia en el Hospital Universitario Virgen del Rocío desde el año 1991 al año 1995.</p>
		<p class='p15 third-font-gray mt-4'>Desde mayo de 2003 hasta la actualidad ejerce en el Hospital San Juan de Dios Aljarafe y desde el año 2007 es coordinador de la especialidad de Cardiología en dicho hospital.</p>
		
		<p class='p15 third-font-gray mt-4'>También desde junio de 2006 a abril de 2007 formó parte del equipo de cardiología del Hospital Virgen de las Montañas de Villamartín en Cádiz.</p>
		<p class='p15 third-font-gray mt-4'>Actualmente y desde la apertura del nuevo Hospital San Juan de Dios de Sevilla, es jefe del equipo de cardiología del Hospital San Juan de Dios de Sevilla.</p>
		<p class='p15 third-font-gray mt-4'Es responsable del Grupo de Desarrollo e Implantación del proceso de Insuficiencia Cardíaca en el distrito Aljarafe, así como miembro del grupo de trabajo del programa COMPARTE (Programa de Atención Compartida para enfermos crónicos) de este mismo distrito.</p>
		<p class='p15 third-font-gray mt-4'>Es miembro de la Comisión de Trasplante del Hospital San Juan de dios Aljarafe.</p>
		<p class='p15 third-font-gray mt-4'>Además ha sido vocal ejecutivo de la Sociedad Andaluza de Cardiología durante los años 2001 a 2003 y durante los años 2010 a 2012 y presidente del XLVII Congreso de la Sociedad Andaluza de Cardiología en mayo de 2011.</p>
		<p class='p15 third-font-gray mt-4'>Ha asistido a numerosos congresos de cardiología tanto regionales, nacionales e internacionales durante la actividad como residente así como reuniones y simposium de interés científico y formativo en cardiología.</p>
		<p class='p15 third-font-gray mt-4'>En total ha participado en 34 comunicaciones a congresos: 23 a congresos regionales, 10 a congresos nacionales y una a congreso internacional.</p>",

		"feature" => false,
		"page_title" => "Mariano Ruiz Borrell, jefe de equipo de cardiología",
		"page_description" => "El Dr. Mariano Ruiz Borrell es actualmente el jefe de equipo de cardiología del Hospital San Juan de de Dios de Sevilla. Es un reconocido doctor que cuenta con más de 28 años de experiencia. "	
	],
	"beatriz_albarracin_arjona" => (object) [
		"fecha" => "Miércoles, 07 de diciembre de 2022",
		"title_noticia" => "Beatriz Albarracín, jefa de equipo de cirugía oral y maxilofacial",
		"img_main" => "/files/img/blog/beatriz_albarracin_arjona.jpg",
		"short_notice" => "La Dra. Beatriz Albarracín Arjona es Licenciada en Medicina por la Universidad de Navarra y cursó su especialidad en Cirugía Oral y Maxilofacial en el Servicio de Cirugía Oral y Maxilofacial en el Hospital Universitario Virgen del Rocío de Sevilla.",
		"content" => "<p class='p20 third-font-gray mt-4'>Ha realizado el máster universitario en Medicina Estética y Antienvejecimiento en la Universidad Complutense de Madrid, así como el máster universitario en Investigación Médica Clínica en la Universidad Miguel Hernández de Alicante.</p>
		<p class='p15 third-font-gray mt-4'>Se subespecializó en Cirugía Craneofacial con estancias en la Unidad de Cirugía del Sueño en la Universidad de Stanford (California) así como en la Unidad de Malformaciones Craneofaciales Infantiles del Hospital 12 de octubre de Madrid.</p>
		<p class='p15 third-font-gray mt-4'>Ha asistido a más de 50 cursos, tanto nacionales como internacionales, relacionados con la Cirugía Oral y Maxilofacial e Implantología.</p>
		
		<p class='p15 third-font-gray mt-4'>Actualmente está cursando el Doctorado en Reconstrucción Labial.</p>
		<p class='p15 third-font-gray mt-4'>Dispone de experiencia tanto en el sector privado, como facultativa especialista en Cirugía Maxilofacial y Cirugía Estética Facial, así como en el sector público, en el servicio de Cirugía Oral y Maxilofacial del Hospital Virgen del Rocío de Sevilla y el Hospital Puerta del Mar de Cádiz.</p>
		<p class='p15 third-font-gray mt-4'Como docente ha participado en más de 15 sesiones de Cirugía Oral y Maxilofacial e Implantología, así como sesiones interdepartamentales y cursos hospitalarios.</p>
		<p class='p15 third-font-gray mt-4'>Como investigadora ha realizado más de comunicaciones en congresos nacionales e internacionales, logrando dos premios por dichas comunicaciones.</p>
		<p class='p15 third-font-gray mt-4'>Actualmente pertenece a varias sociedades científicas como son la Sociedad Española de Cirugía Oral y Maxilofacial y de Cabeza y Cuello (SECOM), la Sociedad Española de Cirugía Plástica Facial (SECPF), la División Clínica Cráneo Maxilofacial de AO Foundation (AOCMF) y de la Asociación Andaluza de Cirugía Oral y Maxilofacial (AACOMF).</p>
		<p class='p15 third-font-gray mt-4'>Actualmente es jefe de servicio de cirugía oral y maxilofacial del Hospital San Juan de Dios de Sevilla, y en su equipo se encuentra también el Dr. Pablo Manuel Rodriguez Jara.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con la Dra. Beatriz Albarracin desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",

		"feature" => false,
		"page_title" => "Beatriz Albarracín, jefa de equipo de cirugía oral y maxilofacial",
		"page_description" => "La Dra. Beatriz Albarracín Arjona es actualmente la jefa de equipo de cirugía oral y maxilofacial del Hospital San Juan de Dios de Sevilla."	
	],
	"jovenes_usuarios_san_juan" => (object) [
		"fecha" => "Lunes, 05 de diciembre de 2022",
		"title_noticia" => "Luchando contra la diversidad funcional",
		"img_main" => "/files/img/blog/jovenes_usuarios_san_juan.jpg",
		"short_notice" => "Chicos y chicas con discapacidad de la Ciudad San Juan de Dios de Alcalá de Guadaíra han organizado un acto para visibilizar las barreras a las que se enfrenta su colectivo y para pedir la colaboración de la sociedad y las instituciones a través de la lectura del manifiesto ‘A mí no me digas que no se puede’",
		"content" => "<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>El presentador Manu Sánchez, en el nuevo Hospital San Juan de Dios de Nervión, las deportistas con diversidad funcional Susana Marín, Lucía Utrilla y Rocío Brey en el Hospital del Aljarafe, y Juani Calceteiro de los Cantores de Híspalis, en la Ciudad San Juan de Dios de Alcalá de Guadaíra, han participado en la lectura de este manifiesto apoyando las reivindicaciones de las personas con discapacidad.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Los centros de la Orden Hospitalaria San Juan de Dios de la provincia de Sevilla –Ciudad San Juan de Dios de Alcalá de Guadaíra, nuevo Hospital San Juan de Dios de Nervión, y Hospital San Juan de Dios del Aljarafe- se han unido este viernes para amplificar el mensaje de apoyo a la inclusión hacia las personas con diversidad funcional en el marco del Día Internacional de las personas con Discapacidad. </p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>En estos tres centros sevillanos de la Orden, jóvenes con diversidad funcional, usuarios del centro de Alcalá, han leído el manifiesto ‘A mí no me digas que no se puede’, que lleva el título de una comparsa escrita por Kike El Remolino y que pone de relieve la necesidad de este colectivo de obtener los apoyos necesarios por parte de las administraciones públicas y la sociedad para ser recibir un trato igualitario real. Con esta acción de sensibilización, el colectivo de personas con discapacidad ha querido llevar su mensaje más allá de su propio centro, trasladándose a otros puntos de la provincia de Sevilla que les permitiesen difundir su mensaje en otros entornos de atención sanitaria y sociosanitaria para amplificar sus voces. </p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>En el nuevo Hospital San Juan de Dios de Sevilla, el presentador y humorista Manu Sánchez ha acompañado a los chicos y chicas de la Ciudad San Juan de Dios que se han desplazado hasta allí. El periodista sevillano ha participado en la lectura del manifiesto “para hablar de diversidad, y de la necesidad de que todos y todas encontremos nuestro lugar en el mundo, un lugar que tiene que traducirse en derechos: derecho de formar parte activa en la vida de nuestro barrio, de nuestro entorno más cercano, en el derecho a encontrar un puesto de trabajo digno, a tener voz en la vida pública de nuestros pueblos y ciudades, en el derecho de reclamar los derechos de las personas con diversidad funcional y que se tengan en cuenta” según recoge el manifiesto.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Las tres deportistas con discapacidad del Consejo Superior de Deportes Susana Marín, Lucía Utrilla y Rocío Brey, han acompañado a los chicos y chicas con diversidad funcional que se han desplazado hasta el Hospital San Juan de Dios del Aljarafe para compartir la lectura de este manifiesto, gesto que ha llevado a cabo también el cantante Juani Calceteiro, de los Cantores de Híspalis, en la Ciudad San Juan de Dios de Alcalá de Guadaíra. En la lectura, todos ellos han suscrito que “nos sumamos a esta iniciativa para visibilizar esta realidad y hacer valer las capacidades de todos ellos que son amigos, primos, hermanos, hijos, que podemos llegar a ser nosotros en un momento dado. Y quiero decir en voz alta y clara: ¡A mí no me digas que no se puede!” </p>
		<h2>Un manifiesto que quiere ser una llamada de atención</h2>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>En esta emotiva lectura, han participado también las direcciones de los centros, así como usuarios de los hospitales y personal sanitario, que han querido reivindicar que “la inclusión real y plena debe ser un objetivo que la sociedad debe plantearse de manera firme, más allá de la celebración de días como hoy, que nos sirven para llamar la atención y poner de manifiesto que queda mucho trabajo por hacer. Se trata de un compromiso que no solo atañe a estas personas y a sus familiares, sino en el que se tienen que involucrar administraciones públicas, instituciones y organizaciones privadas, y cada uno de nosotros”.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Durante el acto, todos los centros han proyectado un vídeo grabado por los jóvenes de la Ciudad San Juan de Dios, en el que pueden verse escenas de su trabajo diario en los diferentes recursos de atención a la diversidad funcional con los que cuentan. Junto a los terapeutas, profesores y cuidadores, los usuarios desarrollan una labor diaria para adquirir las herramientas necesarias que les permitan alcanzar el mayor grado de autonomía posible y formar parte activa de la sociedad.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Como broche final, todos los participantes en este acto, han salido a los exteriores de los hospitales para protagonizar una suelta de globos en nombre de todas aquellas personas que, como ellos, luchan cada día para derribar las barreras, visibles e invisibles, a las que tienen que enfrentarse.</p>
		<h2>Cualquier persona puede necesitar apoyos en la vida diaria en algún momento</h2>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>La última Encuesta de Discapacidad, Autonomía personal y Situaciones de Dependencia del Instituto Nacional de Estadística (INE) revelaba que 4,38 millones de personas residentes en hogares afirmaron tener discapacidad o limitación en el año 2020. De ellos, la comunidad de Andalucía arroja una cifra de 104,5 personas con discapacidad (mayores de 6 años) por cada 1000 habitantes, situándose entre las diez comunidades autónomas con mayor tasa de población con diversidad funcional.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>La discapacidad, según el manifiesto elaborado por los jóvenes usuarios de San Juan de Dios, no califica a la persona, sino que se trata de una circunstancia que puede afectar a cualquiera, “porque en cualquier momento de nuestra vida, cada uno de nosotros y nosotras podemos presentar limitaciones o necesitar de apoyos para desenvolvernos en nuestra vida diaria”, afirman.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Según datos del INE, un total de 1,58 millones de personas con discapacidad estaban en el año 2020 en edad de trabajar y casi una de cada cuatro indicó tener un empleo. En el ámbito escolar, cuatro de cada 10 niños con discapacidad entre seis y 15 años afirmaron haberse sentido discriminados. El 24,6% alguna vez, el 9,8% muchas veces y el 4,5% constantemente. Y entre los mayores de 16 años con discapacidad que realizaron algún tipo de estudio, la percepción de discriminación afectó a dos de cada 10.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Por ello, desde la Orden Hospitalaria han subrayado que “continuaremos trabajando para lograr una sociedad más justa, solidaria, cohesionada e inclusiva, siendo parte activa de las entidades que trabajan por la eliminación de barreras físicas, sociales, visibles e invisibles, así como aquellos obstáculos que dificultan la autonomía de las personas con diversidad funcional”.</p>
		<h2>Diversidad de centros y proyectos al servicio de las personas con discapacidad en España</h2>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>La atención a las personas con discapacidad es uno de los ámbitos originarios de la Orden Hospitalaria desde que se fundara en Granada, hace casi 500 años, durante los que ha dado respuesta en cada momento a las diferentes necesidades.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>La actividad en discapacidad en San Juan de Dios se realiza a través de una red nacional de 24 centros y dispositivos con más de 4.400 plazas entre residenciales, pisos tutelados por profesionales sanitarios y terapeutas, colegios de educación especial, dispositivos que fomentan el empleo, talleres ocupacionales y centros de día para atender las demandas concretas de las personas con discapacidad y responder a las necesidades que presentan en las diferentes etapas de la vida. </p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>Esta red de recursos se encuentra en Andalucía, Asturias, Canarias, Castilla y León, Cataluña, Galicia y Madrid y para ello cuenta con más de 2.600 trabajadores especializados en este ámbito de atención.</p>
		<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'></p>

		<div class='row'>
		<div class='col'><img class='img-fluid' src='/files/img/blog/jovenes_usuarios_san_juan_fondo1.jpg'></img></div>
		<div class='col'><img class='img-fluid' src='/files/img/blog/jovenes_usuarios_san_juan_fondo2.jpg'></img></div>
		<div class='col'><img class='img-fluid' src='/files/img/blog/jovenes_usuarios_san_juan_fondo3.jpg'></img></div>
		
		</div>

		",
		"feature" => false,
		"page_title" => "Luchando contra la diversidad funcional",
		"page_description" => "Jóvenes usuarios de San Juan de Dios con diversidad funcional ponen de relieve la importancia de la inclusión social, con la lectura de un manifiesto en el que participó el humorista Manu Sánchez."	
	],
	"felix-vinuela-fernandez" => (object) [
		"fecha" => "Viernes, 02 de diciembre de 2022",
		"title_noticia" => "Félix Viñuela, jefe de equipo de neurología",
		"img_main" => "/files/img/blog/felix_vinuela_fernandez.jpg",
		"short_notice" => "El Dr. Félix Viñuela Fernández es un reconocido especialista en Neurología, centrándose principalmente en trastornos de la memoria, deterioro cognitivo, enfermedad del Alzheimer y demencias.",
		"content" => "<p class='p20 third-font-gray mt-4' style='text-align: justify;'>
		El Dr. Félix Viñuela Fernández es un reconocido especialista en Neurología, centrándose principalmente en trastornos de la memoria, deterioro cognitivo, enfermedad del Alzheimer y demencias. 
		</p>
		<p class='p15 third-font-gray mt-4'style='text-align: justify;' >Nacido en Sevilla, es Licenciado en Medicina y Cirugía por la Universidad de Navarra en 1997 y se especializó en Neurología, haciendo el doctorado en medicina por la Universidad de Sevilla en 1997. 
		</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Es coordinador de la Unidad de Deterioro Cognitivo del Hospital Universitario Virgen Macarena desde el año 1997 hasta la actualidad y es compañero de investigación (research fellow) de Dementia Research Group del Queen Square Hospital de Londres.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>También ejerce como director de la Unidad de Neurociencias en el Hospital Victoria Eugenia y como neurólogo en su propia consulta privada.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Actualmente imparte la asignatura \"Patología médica del sistema endocrino, Reumatología, Nefrología y sistema nervioso\" en la Universidad de Sevilla. Además, ha publicado libros y escrito capítulos en libros de su especialidad.
		</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Ha participado en multitud de publicaciones, conferencias y congresos respecto a su especialidad, destacando las siguientes publicaciones y colaboraciones: </p>
		<ul class='third-font-gray mt-3 p15'>
			<li class='mt-2'>Publicación del libro \"Medida funcional compuesta para la esclerosis múltiple” en forma de manual multimedia\" (2001).</li>
			<li class='mt-2'>Capítulo del libro \"Alteraciones del esquema corporal\" (2001).</li>
			<li class='mt-2'>Capítulo de libro \"Trastornos de las funciones visuoespacial y constructiva\" (2007).</li>
			<li class='mt-2'>Capítulo de libro \"Dialoguismo y palabra bivocal: los personajes dostoyevskianos desde la perspectiva bajtiniana\" (2007).</li>
		</ul>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Ha sido presidente de la Sociedad Andaluza de Neurología desde los años 2015 a 2017 y es miembro de la Sociedad Española de Neurología desde el año 1993 hasta la actualidad.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Entre sus principales consultas y enfermedades tratadas se encuentran las siguientes: </p>
		<ul class='third-font-gray mt-3 p15'>
			<li class='mt-2'>Epilepsia.</li>
			<li class='mt-2'>Enfermedad de Parkinson.</li>
			<li class='mt-2'>Cefalea.</li>
			<li class='mt-2'>Demencia.</li>
			<li class='mt-2'>Ictus.</li>
			<li class='mt-2'>Migraña.</li>
			<li class='mt-2'>Alzheimer.</li>
			<li class='mt-2'>Esclerosis múltiple.</li>
			<li class='mt-2'>Temblor.</li>
			<li class='mt-2'>Neuralgia.</li>
		</ul>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Actualmente es jefe de servicio de neurología del Hospital San Juan de Dios de Sevilla, y en su equipo se encuentran Francisco José Hernández Ramos, Rafael Pérez Noguera y Francisco Manuel Sánchez Caballero. </p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Puedes solicitar cita previa con el Dr. Félix Viñuela desde el siguiente enlace <a class='link-blog' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>

		",
		"feature" => false,
		"page_title" => "Féliz Viñuela, jefe de equipo de neurología",
		"page_description" => "El Dr. Félix Viñuela es actualmente jefe de equipo de neurología del Hospital San Juan de Dios de Sevilla."	
	],
	"ramon-ruiz" => (object) [
		"fecha" => "Miércoles, 30 de noviembre de 2022",
		"title_noticia" => "Ramón Ruiz Mesa, jefe de servicio de oftalmología",
		"img_main" => "/files/img/blog/RUIZ-MESA-RAMON.jpg",
		"short_notice" => "El Dr. Ramón Ruiz Mesa, es Licenciado en Medicina y Cirugía por la Universidad de Granada desde el año 1991. Se especializó en Oftalmología en el Hospital del SAS de Jerez de la Frontera...",
		"content" => "<p class='p20 third-font-gray mt-4'>El Dr. Ramón Ruiz Mesa, es Licenciado en Medicina y Cirugía por la Universidad de Granada desde el año 1991. Se especializó en Oftalmología en el Hospital del SAS de Jerez de la Frontera y posteriormente complementa su formación en Madrid, Sevilla y Londres. </p>
		<p class='p15 third-font-gray mt-4'>Es profesor de oftalmología en la Universidad Europea de Madrid, así como trainer, de las principales novedades tecnológicas de la especialidad en el área geográfica de América de habla hispana. </p>
		<p class='p15 third-font-gray mt-4'>Su actividad investigadora se ha desarrollado principalmente en el implante de lentes intraoculares de última generación, participando en numerosos estudios premarket y trials con las principales compañías del sector oftalmológico como son Alcon, Abbott, Physiol, Ophtec… </p>
		
		<p class='p15 third-font-gray mt-4'>También ha centrado su actividad investigadora en la cirugía refractiva para la corrección de la miopía, hipermetropía, astigmatismo y vista cansada, así como en la cirugía de la catarata, tratada mediante las técnicas más avanzadas, precisas, seguras y novedosas utilizadas en la actualidad. Además realiza también tratamientos mínimamente invasivos para el tratamiento del glaucoma.</p>
		<p class='p15 third-font-gray mt-4'>Autor de más de dos libros como autor principal de temática de cirugía faco refractiva, además ha colaborado en más de 10 capítulos de diferentes libros relacionados con la misma materia. Ha participado en más de 200 comunicaciones en conferencias en congresos nacionales e internacionales. </p>
		<p class='p15 third-font-gray mt-4'>Actualmente pertenece al board de las revistas internacionales, Journal of Emmetropia e Indian Journal of Ophthalmology.</p>
		<p class='p15 third-font-gray mt-4'>Pertenece a la Junta Directiva de la Sociedad Española de Cirugía Implanto Refractiva (SECOIR) y Junta Directiva de la Sociedad Española de Oftalmología (SEO). 
		Además también es miembro de la Sociedad Europea de Cirugía de Cataratas y Refractiva (ESCRS) y de la Sociedad Americana de Cirugía de Cataratas y Refractiva (ASCRS).
		</p>
		<p class='p15 third-font-gray mt-4'>Sus principales consultas se centran en la corrección de la miopía, hipermetropía, astigmatismo y el tratamiento quirúrgico de la catarata, ambas cirugías mediante el láser de femtosegundo.</p>
		<p class='p15 third-font-gray mt-4'>Actualmente es jefe de servicio de oftalmología del Hospital San Juan de Dios de Sevilla, y en su equipo se encuentran Miguel Ángel Díaz Del Rio, Adrián Hernández Martínez, Julia Jordano Almoguera, Pilar Llavero Valero, Fredy Eduardo Molina y Ernesto Pereira Delgado.</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa con el Dr. Ruiz Mesa desde el siguiente enlace</p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>cita previa</a> con el Dr. Ruiz Mesa desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p><style>.blog-img-header{object-position: top;}</style>",

		"feature" => false,
		"page_title" => "Ramón Ruiz Mesa, jefe de servicio de oftalmología",
		"page_description" => "El Dr. Ramón Ruiz Mesa es actualmente jefe del equipo de oftalmología del Hospital San Juan de Dios de Sevilla."	
	],
	"sevilla-quiere-metro" => (object) [
		"fecha" => "Lunes, 28 de noviembre de 2022",
		"title_noticia" => "“Sevilla quiere metro” y nuestro Hospital unen fuerzas",
		"img_main" => "/files/img/blog/sevilla-quiere-metro.jpeg",
		"short_notice" => "La Asociación Sevilla Quiere Metro constata las sinergias con el Hospital San Juan de Dios en el desarrollo de la red completa del Metro de Sevilla.",
		"content" => "<p class='p20 third-font-gray mt-4 lh-lg' style='text-align: justify;'>El Director Gerente del Hospital San Juan de Dios Sevilla, Manuel González Suárez y su equipo directivo se han reunido el pasado día 3 de noviembre por espacio de una hora y media con la Asociación Sevilla Quiere Metro, representada por su presidente, Manuel Alejandro Moreno Cano, su Tesorero, Víctor Aguilar, y su secretario, Enrique de Álava.
		</p>
		<p class='p15 third-font-gray mt-4 lh-lg'style='text-align: justify;' >El Director Gerente constata una gran sinergia con la Asociación en los valores relacionados con la mejora en la sostenibilidad y la cohesión social que el Metro aporta. Sevilla debe superar la desigualdad social que afecta a la ciudad y su área metropolitana, y el Metro debe ser visto como una excelente oportunidad de desarrollo. Esta sinergia está alineada con los valores de la Orden San Juan de Dios, entre los que destaca la gran labora social que se realiza desde Hospital San Juan de Dios Sevilla, principalmente con niños, a través del Centro de Atención Infantil Temprana, y personas mayores, y que permitiría acercar a las personas más desfavorecidas de una manera más directa a través de la red de metro.
		</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Además, serviría para conectar con el resto de entidades hospitalarias y generar así un núcleo hospitalario mucho más accesible, tanto para personas en situación de vulnerabilidad, que serían las más beneficiadas, como para el resto de sevillanos, que llevan tanto tiempo demandando la construcción del tan prometido metro.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>El Hospital mostró también su interés en poner a su disposición de la asociación su salón de actos para organizar eventos en los que la Asociación Sevilla Quiere Metro pueda dialogar con la sociedad sevillana acerca de su visión de los retos que tiene Andalucía en cuanto a movilidad, sostenibilidad y cohesión social.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>Por último, el Director Gerente firmó el manifiesto de adhesión al Manifiesto por el metro de Sevilla, al que ya se han adherido numerosas entidades e instituciones de nuestra ciudad y área metropolitana entre las que se encuentra el Real Betis Balompié, los Colegios Profesionales de ingeniería, arquitectura y abogacía, empresas como Ybarra o pinturas Eurotex, el CC Lagoh, el Consejo de Bandas Cofrades, entre las que se incluyen Bandas como la Banda de la Cruz Roja, o la A.M. Redención. El Director Gerente justifica la firma porque el metro aporta esperanza de que exista una oportunidad de desarrollo en un área altamente deprimida.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>La asociación “Sevilla Quiere Metro” es una entidad completamente apolítica y constructiva que trabaja con ilusión para que Sevilla y su área metropolitana tengan la red de Metro que necesita urgentemente. Está formada por cerca de 5500 personas y cuenta con la simpatía y el apoyo explícito de una base social cada vez más extensa.</p>
		<p class='p15 third-font-gray mt-4' style='text-align: justify;'>El Hospital anima a sus trabajadores y usuarios a seguir a la Asociación en redes sociales (Twitter: @sevquieremetro; Instagram: @sevillaquieremetro), y a inscribirse en el formulario de inscripción que pueden encontrar en <a href='https://www.sevillaquieremetro.org' Target='_blank'>www.sevillaquieremetro.org</a>  </p>
		<img class='blog-img mt-3' src='/files/img/blog/sevilla_quiere_metro_img_final.jpeg'></img>
		",
		"feature" => false,
		"page_title" => "“Sevilla quiere metro” y nuestro Hospital unen fuerzas",
		"page_description" => "El Hospital San Juan de Dios de Sevilla y la asociación 'Sevilla quiere metro' unen fuerzas para mejorar la sostenibilidad y la cohesión social que el metro aporta a la ciudadanía. "	
	],
	"antonio-barranco" => (object) [
		"fecha" => "Viernes, 25 de noviembre de 2022",
		"title_noticia" => "Antonio Barranco Moreno, jefe de equipo de cirugía bariátrica",
		"img_main" => "/files/img/blog/antonio-barranco-cirugia-bariatrica.jpg",
		"short_notice" => "Antonio José Barranco Moreno, es un experto en Cirugía General, con especialización en Cirugía Laparoscópica y del Aparato Digestivo. Es Licenciado en Medicina y Cirugía por la Universidad de Sevilla y realizó el doctorado en Medicina también en dicha Universidad. Se especializó en Cirugía General y del Aparato Digestivo en el Hospital Universitario de Canarias.",
		"content" => "<p class='p20 third-font-gray mt-4 lh-lg'>Antonio José Barranco Moreno, es un experto en Cirugía General, con especialización en Cirugía Laparoscópica y del Aparato Digestivo.
		Es Licenciado en Medicina y Cirugía por la Universidad de Sevilla y realizó el doctorado en Medicina también en dicha Universidad. Se especializó en Cirugía General y del Aparato Digestivo en el Hospital Universitario de Canarias.
		</p>
		<p class='p15 third-font-gray mt-4 lh-lg'>El Doctor Antonio Barranco Moreno es un reputado especialista en Cirugía Bariátrica que cuenta con más de quince años de experiencia. Dispone del Diploma de Competencia del Programa de Formación de la Sociedad Española de Cirugía de la Obesidad (SECO) que reconoce una experiencia de más de cinco años y más de 100 intervenciones realizadas con éxito en el Hospital Universitario Virgen del Rocío de Sevilla. Asimismo, es autor de numerosas ponencias, publicaciones y comunicaciones. Además, imparte cursos de formación tanto a residentes de Cirugía General como a cirujanos nacionales e internacionales. Por todo ello, el Dr. Barranco es un especialista de primer nivel.
		También es miembro de la Asociación de Cirujanos Española, de la Sociedad Española de Cirugía de la Obesidad y de la European Hernia Society.
		</p>
		<p class='p15 third-font-gray mt-4'>Entre sus principales consultas e intervenciones, el Dr. Barranco destaca en las siguientes: </p>
		<ul class='third-font-gray mt-3 p15'>
			<li>Bypass</li>
			<li>Laparoscopia</li>
			<li>Obesidad</li>
			<li>Reducción estomago</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>cita previa</a> con el Dr. Barranco desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",
		"feature" => false,
		"page_title" => "Antonio Barranco Moreno, jefe de equipo de cirugía bariátrica",
		"page_description" => "El Dr. Antonio Barranco Moreno, es actualmente jefe de equipo de la especialidad de cirugía bariátrica del Hospital San Juan de Dios de Sevilla."	
	],
	"fernando-nebrera" => (object) [
		"fecha" => "Miércoles, 23 de noviembre de 2022",
		"title_noticia" => "Fernando Nebrera Navarro, jefe de equipo de medicina interna",
		"img_main" => "/files/img/blog/fernando-nebrera-navarro-medicina-interna.jpg",
		"short_notice" => "El doctor Fernando Nebrera Navarro es licenciado en Medicina y Cirugía por la Universidad de Sevilla desde el año 2004, especializándose en Medicina Interna en Granada en el año 2010...",
		"content" => "<p class='p20 third-font-gray mt-4'>El doctor Fernando Nebrera Navarro es licenciado en Medicina y Cirugía por la Universidad de Sevilla desde el año 2004, especializándose en Medicina Interna en Granada en el año 2010. Está colegiado en Sevilla, además de estar afiliado a la Sociedad Española de Medicina Interna (SEMI) y la Sociedad Andaluza de Enfermedades Infecciosas (SAEI).</p>
		<p class='p15 third-font-gray mt-4'>Realizó el periodo MIR en el Hospital Virgen de las Nieves de Granada, desde mayo de 2005 a mayo de 2010 que coordinó con el Servicio de Enfermedades Infecciosas, sección de Enfermedades Tropicales y Patología del Inmigrante, en el Hospital Ramón y Cajal de Madrid durante los meses de octubre y diciembre de 20099.</p>
		<p class='p15 third-font-gray mt-4'>Como experiencia profesional podemos destacar su participación como Facultativo Especialista de Área en distintos centro y hospitales entre los que podemos destacar los siguientes: </p>
		<ul class='third-font-gray mt-3 p15'>
			<li>FEA (Facultativo Especialista de Área) adjunto al servicio de Medicina Interna del Hospital de Baza durante las fechas de 19 de Enero a 24 Marzo de 2011, realizando trabajos de planta y guardias.</li>
			<li>FEA adjunto al servicio de Medicina Interna del Hospital de Formentera desde el uno de abril de 2011 hasta Junio 2017, con desempeño de trabajo en planta, consulta externa, e interconsultor de Urgencias, con realización de guardias localizadas, y con especial desempeño en áreas como ecografía clínica, con realización de más de 100 ecografías al año, y enfermedades infecciosas.
			</li>
			<li>Desempeñó el puesto de Coordinador Médico del Hospital de Formentera desde Mayo 2015 hasta Noviembre de 2016.</li>
			<li>Actividad privada como Especialista en Medicina Interna y realización de ecografías en “Centro Médico Formentera” desde Septiembre 2012 hasta la fecha actual, de forma puntual.</li>
			<li>FEA de Medicina Interna en el Hospital de Alta Resolución de Écija durante el mes de Marzo 2021, en el área de consultas.</li>
			<li>Facultativo adscrito al Servicio de <a class='enlace' href='https://sjdsevilla.com/medicina-interna-sevilla' target='_blank'>Medicina Interna</a> del Hospital VITHAS Aljarafe a tiempo completo desde Julio 2017 hasta Febrero 2022, desempeñando labor en planta y consultas externas.</li>
			<li>Jefe de Servicio de Medicina Interna desde Febrero 2022 hasta la actualidad en el Hospital San Juan de Dios de Sevilla.</li>
		</ul>
		<p class='p15 third-font-gray mt-4'>Como actividad docente podemos destacar la tutela de MIR y estudiantes de medicina, locales, nacionales y extranjeros durante los años 2006-2010 y la tutorización de médicos MIR en el Hospital de Alarcón en el área formativa ecografía clínica. 
		También ha sido organizador del I del Ciclo de Sesiones de Actualización para médicos y enfermeros del Hospital de Formentera.</p>
		<p class='p15 third-font-gray mt-4'>Además, ha colaborado en diversos estudios de investigación, así como participado en numerosos congresos. </p>
		<p class='p15 third-font-gray mt-4'>Puedes solicitar tu <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>cita previa</a> con el Dr. Nebrera desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p>",
		"feature" => false,
		"page_title" => "Fernando Nebrera Navarro, jefe de equipo de medicina interna",
		"page_description" => "El Dr. Fernando Nebrera Navarro es actualmente el jefe de equipo de medicina interna del Hospital San Juan de Dios de Sevilla y es todo un referente en este área. "	
	],
	"dia-mundial-de-la-infancia" => (object) [
		"fecha" => "Lunes, 21 de noviembre de 2022",
		"title_noticia" => "20 de noviembre, Día Mundial de la Infancia",
		"img_main" => "/files/img/blog/20NovNew.jpg",
		"short_notice" => "El 20 de noviembre de 1959, la Asamblea General de la ONU aprueba la Declaración de los Derechos del Niño. Finalmente, el 20 de noviembre de 1989, se aprueba el texto final, y entraba en vigor al año siguiente, en la Convención sobre los Derechos del Niño...",
		"content" => "<p class='p15 third-font-gray mt-4'>El 20 de noviembre de 1959, la Asamblea General de la ONU aprueba la Declaración de los Derechos del Niño. Finalmente, el 20 de noviembre de 1989, se aprueba el texto final, y entraba en vigor al año siguiente, en la Convención sobre los Derechos del Niño, cuyo cumplimiento sería obligatorio para todos los países que la ratificaron. </p>
		<p class='p15 third-font-gray mt-4'>UNICEF es la principal organización internacional que se encarga de proteger los derechos de la infancia basándose en esta Convención sobre los Derechos del Niño. Esta Convención, la más universal de los tratados internacionales, establece una serie de derechos para los niños y las niñas, incluidos los relativos a la vida, la salud y la educación, el derecho a jugar, a la vida familiar, a la protección frente a la violencia y la discriminación, y a que se escuchen sus opiniones.</p>
		<img class='blog-img mt-3' src='/files/img/blog/20NovNew-1.jpg' alt='image'>
		<p class='p15 third-font-gray mt-4'>Todos los miembros de nuestra sociedad —padres y madres, personal docente y sanitario, dirigentes gubernamentales, líderes religiosos, personalidades de la política, el mundo empresarial, la sociedad civil y los medios de comunicación— desempeñan un papel clave en el bienestar de la infancia.</p>
		<p class='p15 third-font-gray mt-4'>Así, este Día Mundial nos ofrece un punto de partida para llevar a cabo medidas inspiradoras para defender, promover y celebrar los derechos del niño a través de diálogos y acciones que construirán un mundo mejor para los niños. </p>
		<p class='p15 third-font-gray mt-4'>Es por ello que tanto Naciones Unidas como UNICEF y el <strong>Hospital San Juan de Dios de Sevilla</strong> recuerdan en este día que todos los niños tienen derecho a la salud, la educación y la protección. </p>
		<p class='p15 third-font-gray mt-4'>El <strong>Día Mundial del Niño</strong> es una oportunidad para crear conciencia en las escuelas y en la sociedad en general para que todos los niños y niñas estén protegidos, seguros, con salud y educación, independientemente del lugar de su nacimiento o procedencia.</p>
		<p class='p15 third-font-gray mt-4'>Dedicar un día mundial a la infancia sirve para hacer un llamamiento a las necesidades de los más pequeños, así como reconocer la labor de las personas y profesionales que trabajan a favor de los niños y niñas.</p>
		<p class='p15 third-font-gray mt-4'>Entre todos los derechos reconocidos en la Convención de 1989 destacamos los más importantes e imprescindibles para que todos los niños crezcan en paz y alegría:</p>
		<ul class='third-font-gray mt-3 p15'>
		<li class='mt-2'>Derecho a la vida: Los niños tienen el derecho a vivir su infancia y poder crecer y desarrollarse como seres humanos hasta llegar a la edad adulta.
		</li>
		<li class='mt-2'>Derecho a tener una familia: Los niños tienen derecho a desarrollarse en el seno de la familia, a ser acogidos y no ser ignorados por ella.
		</li>
		<li class='mt-2'>Derecho a una identidad, nombre y nacionalidad: los niños tienen derecho a poseer una identidad oficial, es decir, a tener un nombre, un apellido, una nacionalidad y a conocer la identidad de sus progenitores.</li>
		<li class='mt-2'>Derecho a la salud: todos los niños tienen derecho a la salud física y mental, así como a recibir atención médica de calidad, con la finalidad de prevenir, proteger y tratar su salud, así como su seguridad social.</li>
		<li class='mt-2'>Derecho a la educación: a una educación básica y gratuita que les permita desarrollarse como individuos sin discriminación de ningún tipo.	</li>
		<li class='mt-2'>Derecho a jugar: los niños tienen derecho a jugar, a imaginar y fantasear, ya que los juegos fomentan el desarrollo físico e intelectual y los prepara para vivir en sociedad.</li>
		<li class='mt-2'>Derecho a la nutrición y alimentación: todo niño debe recibir una alimentación básica, duradera, accesible, ya que es esencial para el desarrollo físico e intelectual.</li>
		<li class='mt-2'>Derecho a la protección y a no trabajar: no deberá permitirse al niño trabajar antes de la edad mínima adecuada ya que puede perjudicar su salud e impedir su desarrollo físico, mental o moral.</li>
		<li class='mt-2'>Derecho a expresarse y ser escuchado: de este modo aprenderán a comunicarse, a expresar sus emociones, el sentido crítico y a hablar.</li>
		<li class='mt-2'>Derecho a la igualdad: todos los niños disfrutarán de los derechos anunciados en la Convención de 1989.</li>
		</ul>
		<img class='blog-img mt-3' src='/files/img/blog/20NovNew-2.jpg' alt='image'>
		<p class='p15 third-font-gray mt-4'>Desde el área de pediatría del Hospital San Juan de Dios Sevilla trabajamos para que todos los niños y niñas disfruten de los derechos reconocidos internacionalmente y por ello nos dedicamos a todos los cuidados del niño, desde revisiones o consultas externas a demanda, hasta consultas administrativas del tipo certificados médicos y atención en Urgencias pediátricas. Además, para un servicio más completo, trabajamos con procedimientos y protocolos de prevención, clave en estas edades.</p>
		<p class='p15 third-font-gray mt-4'>También en el Hospital San Juan de Dios Sevilla, y en pro de la defensa de los niños y niñas y del cumplimiento de sus derechos, contamos con el Centro de Atención Infantil Temprana, donde proporcionamos los servicios y experiencias necesarias para favorecer el correcto desarrollo y bienestar de los niños y su familia. Nuestro objetivo es atender lo más rápido posible las necesidades transitorias o permanentes que presentan los niños con trastornos en su desarrollo o que tienen el riesgo de padecerlos.</p>
		<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla y el servicio de pediatría comprometidos con los derechos de todos los niños;</p>
		<p class='p15 third-font-gray mt-4'>Porque todos tienen derecho a una educación y salud dignas…</p>
		<p class='p15 third-font-gray mt-4'>Porque son nuestra energía, nuestro orgullo y nuestro futuro…</p>
		<p class='p15 third-font-gray mt-4'>Porque vivir y sentir como ellos, es importante para nosotros…</p>",
		"feature" => false,
		"page_title" => "20 de noviembre, Día Mundial de la Infancia",
		"page_description" => "El Día Mundial de la Infancia nos ofrece un punto de partida para llevar a cabo medidas para defender y celebrar los derechos del niño."
	],
	"pedro-morales" => (object) [
		"fecha" => "Viernes, 18 de noviembre de 2022",
		"title_noticia" => "Pedro Morales y Boris García, jefes de equipo de Traumatología",
		"img_main" => "/files/img/blog/pedro-morales-traumatologo.jpg",
		"short_notice" => "Pedro Morales Sánchez, junto con el Dr. Boris García, es licenciado en medicina y cirugía por la Universidad de Sevilla, especializándose en cirugía ortopédica y traumatología...",
		"content" => "<p class='p15 third-font-gray mt-4'>Pedro Morales Sánchez, junto con el Dr. Boris García, es licenciado en medicina y cirugía por la Universidad de Sevilla, especializándose en cirugía ortopédica y traumatología. Ha desarrollado su actividad profesional en relación con la articulación de rodilla y cadera, así como su tratamiento y su estudio, gestionado principalmente las principales cirugías: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Cirugía protésica</li>
						<li class='mt-2'>Cirugía artroscópica</li>
						<li class='mt-2'>Cirugía de preservación ósea de la cadera</li>
						<li class='mt-2'>Cirugía de cadera</li>
						<li class='mt-2'>Cirugía de rodilla</li>
						<li class='mt-2'>Artroscopia</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Posee Diferentes formaciones entre las que destaca un fellowship en EEUU, en el Children´s Hospital de Iowa y en Toronto, Canadá, en el Hospital for Sick Children.</p>
						<p class='p15 third-font-gray mt-4'>Entre 2005 y 2015 ha trabajado en el Hospital Juan Ramón Jiménez. Ha realizado sus prácticas hospitalarias en dicho hospital y una vez terminada la especialidad, continuó trabajando como cirujano ortopédico en la unidad de cadera y ortopedia pediátrica. Durante los años 2010 y 2014 ha realizado numerosas cirugías protésicas de rodilla y cadera, artroscopias de rodilla y cadera, además de numerosas cirugías de revisión de prótesis de cadera y cirugías ortopédicas pediátricas.</p>
						<p class='p15 third-font-gray mt-4'>Ha sido jefe y coordinador de la Unidad de Ortopedia Pediátrica en el Hospital Juan Ramón Jiménez desde mayo de 2010 hasta noviembre de 2014, así como responsable y coordinador de la Unidad de Cirugía y Cadera y de la Unidad de Cirugía Artroscópica de Cadera en el mismo hospital. </p>
						<p class='p15 third-font-gray mt-4'>En el periodo de 2013 y 2014 también ha trabajado en el Hospital San Juan de Dios Aljarafe, Sevilla, donde realizó intervenciones de la lista de espera de dicho centro, principalmente operaciones de rodilla y cadera. </p>
						<p class='p15 third-font-gray mt-4'>Durante los años 2014 y 2016, ha trabajado en el Bournemouth Hospital, en Bournemouth, Reino Unido, donde realizó una beca de investigación sobre cirugía de rodilla y realizó numerosas sustituciones de rodilla y ligamentos.</p>
						<p class='p15 third-font-gray mt-4'>Desde 2016 forma parte del Departamento de Cirugía Ortopédica y Traumatología en la Clinique des Grainetières, Saint Amand Montrond, Francia. Forma parte de la SATO, Sociedad Andaluza de Traumatología y Ortopedia y de la SECOT, Sociedad Española de Traumatología y Ortopedia.</p>
						<p class='p15 third-font-gray mt-4'>Actualmente, junto con el Dr. Boris García, es jefe del servicio de traumatología del Hospital San Juan de Dios Sevilla.</p>
						<p class='p15 third-font-gray mt-4'>El doctor Boris García Benitez, nacido en Sevilla, es licenciado en medicina y cirugía por la Universidad de Sevilla y se especializó en cirugía ortopédica y traumatología. </p>
						<p class='p15 third-font-gray mt-4'>Se ha dedicado desde hace más de 10 años a la patología de cadera y rodilla, tanto en la cirugía protésica como en la artroscopia y actualmente es un referente a nivel nacional tanto en las operaciones tanto de rodilla como de cadera.
						</p>
						<p class='p15 third-font-gray mt-4'>Ha realizado más de 132 comunicaciones orales tanto en congresos nacionales como internacionales. También ha participado en más de 260 comunicaciones tipo póster en diferentes congresos a nivel mundial. </p>
						<p class='p15 third-font-gray mt-4'>Ha realizado más de 132 comunicaciones orales tanto en congresos nacionales como internacionales. También ha participado en más de 260 comunicaciones tipo póster en diferentes congresos a nivel mundial. </p>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar cita previa para la especialidad de traumatología desde el siguiente enlace <a class='enlace' href='https://sjdsevilla.com/pedir-cita' target='_blank'>sjdsevilla.com/pedir-cita</a></p><style>.blog-img-header{object-position: top;}</style>",
		"feature" => false,
		"page_title" => "Pedro Morales y Boris García, jefes de equipo de Traumatología",
		"page_description" => "Pedro Morales y Boris García, son actualmente jefes del servicio de traumatología del Hospital San Juan de Dios de Sevilla."
	],
	"entrevista-a-Manuel-Gonzalez" => (object) [
		"fecha" => "Miercoles, 16 de noviembre de 2022",
		"title_noticia" => "Entrevista a Manuel González en Onda Cero",
		"img_main" => "/files/img/blog/entrevita-manuel-gonzalez-0.jpg",
		"short_notice" => "El pasado 2 de noviembre, nuestro director gerente, Manuel González Suárez, acudió a una entrevista con la cadena de radio Onda Cero, en la cual pudo dar a conocer todo lo relativo al nuevo Hospital San Juan de Dios Sevilla. Os dejamos...",
		"content" => "<p class='p15 third-font-gray mt-4'>El pasado 2 de noviembre, nuestro director gerente, Manuel González Suárez, acudió a una entrevista con la cadena de radio Onda Cero, en la cual pudo dar a conocer todo lo relativo al nuevo Hospital San Juan de Dios Sevilla. Os dejamos con la transcripción de la misma:</p>
		<p class='p15 third-font-gray mt-4'>La orden San Juan de Dios lleva muchos años con nosotros prestando una atención sanitaria muy necesaria, diferente y completa que forma parte de la historia de nuestra ciudad. Hoy, han dado un paso adelante y han puesto a disposición ciudadana unas modernas instalaciones hospitalarias que nos gustaría conocer más en profundidad.</p>
		<p class='p15 third-font-gray mt-4'><bold>Para empezar, vamos a hacer un poquito de historia. ¿Cómo surge la orden en Sevilla y cuales son los principales valores que la rigen?</bold></p>
		<p class='p15 third-font-gray mt-4'>Realmente, la orden está presente en Sevilla desde el siglo XVI, aunque la última etapa comienza en 1943, cuando una comunidad de hermanos se instala en las Huertas de Nervión, sobre el chalet Villa Amalia, y abre su primera casa para atender a niños con polio. Esta etapa más reciente es la que perdura a día de hoy.</p>
		<p class='p15 third-font-gray mt-4'><bold>Esta orden lleva muchos años dando servicios a la comunidad, de hecho su lema es “Estuvimos, estamos, estaremos”. ¿Cómo se ha mantenido la orden en el tiempo con esa tradición?</bold></p>
		<p class='p15 third-font-gray mt-4'>Se ha mantenido a base de adaptarse a las necesidades cambiantes de la sociedad. Como decía, nuestra casa empezó atendiendo a niños con polio, que, afortunadamente y con el desarrollo de la vacuna y la desaparición de dicha enfermedad, hace que el hospital gire a un hospital quirúrgico, muy traumatológico, de inicio para tratar las secuelas de la polio y que con la apertura del hospital de Bormujos, siguió atendiendo fundamentalmente a pacientes de cuidados paliativos y medicina interna. A finales de los últimos 10 años, viendo que seguía habiendo necesidad de camas hospitalarias, se hace el nuevo proyecto que convierte al hospital en uno médico quirúrgico de gran complejidad para atender a todas las etapas de la vida. Con esta nueva casa, lo que se hace es manifestar el compromiso de la institución por seguir estando y dando servicio a la sociedad sevillana. </p>
		<p class='p15 third-font-gray mt-4'><bold>Nuevas y modernas instalaciones instaladas en el edificio antiguo. ¿Qué destacarías de esas nuevas instalaciones?</bold></p>
		<p class='p15 third-font-gray mt-4'>Sobre todo que están pensadas para atender con calidad a los pacientes. Los espacios comunes tan amplios, la luminosidad, el confort también para la familia y acompañantes. También se cuida mucho el confort a la hora de trabajar para los profesionales. Por ejemplo, en los metros que ocupan los controles, la zona de estar y de descanso para las guardias. Está lleno de detalles que hacen que se note que es un hospital de San Juan de Dios.</p>
		<p class='p15 third-font-gray mt-4'><bold>¿Con qué certificados de calidad y tecnologías cuenta el hospital? Porque, evidentemente, es tremendamente moderno y por ello, tiene que tener también lo último.</bold></p>
		<p class='p15 third-font-gray mt-4'>Estamos certificados por la Agencia de Calidad Sanitaria de Andalucía y estamos en proceso de varias certificaciones, como la ISO, y el Sistema de Gestión Ambiental. Realmente, en la dotación tecnológica estamos hablando de la última tecnología en todas sus dimensiones, como por ejemplo, la resonancia de tres teslas con realidad virtual o un tac de 124 cortes con baja radiación. Pero realmente, cualquier hospital nuevo hoy en día, se abre con todas las tecnologías disponibles. Yo creo que la gran tecnología que aportamos es el modelo de atención integrado a las personas. Un modelo que no solo cubre las necesidades físicas, sino también las psicológicas, las espirituales y las religiosas. Eso es lo que nos hace diferentes, porque nuestra vocación es estar cerca de la sociedad y de las personas a las que cuidamos. Cuando no se puede curar, cuidar y acompañar.</p>
		<p class='p15 third-font-gray mt-4'><bold>Insistimos en que hay una moderna tecnología que sirve para dar cobertura a diferentes servicios y especialidades, ¿como cuáles? ¿Qué servicios ofrece este nuevo hospital?</bold></p>
		<p class='p15 third-font-gray mt-4'>Bueno son muchos. Desde servicios de traumatología, urología, otorrinolaringología, oftalmología. También hay especialidades médicas como aparatos digestivos, cardiología. Realmente es un viraje del hospital, convirtiéndonos en un hospital general que aborda todas las necesidades. También con urgencias 24 horas y una UCI dotada de toda la tecnología. Por lo tanto, es un viraje absoluto en la cartera de servicios, pero manteniendo el modelo de atención integral a la persona. </p>
		<p class='p15 third-font-gray mt-4'><bold>Vamos a hablar del servicio FIDES. ¿Qué es exactamente ese servicio, en qué consiste y cuáles son los principales beneficiarios? </bold></p>
		<p class='p15 third-font-gray mt-4'>El servicio FIDES, viene del origen etimológico de la palabra fidelidad y compromiso, es un servicio orientado a las personas más vulnerables y con mayoir necesidad. Hemos ido viendo en el desarrollo y la planificación del nuevo centro, que hay grupos de personas que se están quedando razonablemente marginadas por el impacto de las nuevas tecnologías. Personas mayores, con limitaciones tecnológicas y a veces, que viven en soledad. Para estas personas tenemos este sistema donde se le asigna un gestor FIDES, que pueden contactar con él directamente por teléfono móvil, por correo electrónico o por Whatsapp, y acompaña a las personas en su trayecto en el centro y también, gestiona todas sus necesidades asistenciales presentes y futuras. Creemos que era necesario instalarlo y por ahora, está teniendo una acogida enorme. </p>
		<p class='p15 third-font-gray mt-4'><bold>Por último Manuel, ¿con qué aseguradoras trabaja el hospital San Juan de Dios de Sevilla?  </bold></p>
		<p class='p15 third-font-gray mt-4'>Trabajamos con todas las principales aseguradoras. Con alguna estamos todavía en fase de incorporación, pero es previsible que en los próximos meses contemos con la totalidad de ellas. Esta es otra novedad, que hasta ahora solo trabajábamos para el Servicio Andaluz de Salud, pero incorporamos esta tendencia a la sociedad donde, casi un 30% de los sevillanos tienen compañías aseguradoras, y es un servicio nuevo que ofertamos a estos usuarios y como decía, nuestra misión es acompañar a la sociedad y por eso tenemos que abrirnos a estas nuevas tendencias sociales. </p>
		<img class='blog-img mt-3' src='/files/img/blog/entrevista-manuel-gonzalez-1.jpg' alt='image'>
		<p class='p15 third-font-gray mt-4'><bold>Puedes escuchar el audio de la entrevista completa aquí:</bold></p>
		<audio class='w-100 mt-3' src='/files/audios-entrevistas/MD1_03-11_ETV_MANUEL_GONZALEZ_HOSPITAL.MP3' controls>
			<p>Tu navegador no soporta la reproducción nativa de audio. Tal vez quieras pasarte a un navegador moderno con más características, con el fin de poder escuchar el archivo de audio.</p>
		</audio>
		",
		"feature" => false,
		"page_title" => "Entrevista a Manuel González en Onda Cero",
		"page_description" => "El pasado 2 de noviembre, nuestro director gerente, Manuel González Suárez, acudió a una entrevista en la emisora de radio Onda Cero."
	],
	"jaime-ruiz-clemente" => (object) [
		"fecha" => "Lunes, 14 de Noviembre de 2022",
		"title_noticia" => "Jaime Ruiz Clemente, jefe de equipo de otorrinolaringología",
		"img_main" => "/files/img/blog/jaime-ruiz-otorrino-san-juan-dios-sevilla.jpg",
		"short_notice" => "El doctor Jaime Ruiz Clemente es licenciado en Medicina y Cirugía por la Universidad de Córdoba y realizó la especialidad vía MIR de Otorrinolaringología y patología cérvico-facial en el Hospital Universitario Virgen Macarena de Sevilla...",
		"content" => "<p class='p15 third-font-gray mt-4'>El doctor Jaime Ruiz Clemente es licenciado en Medicina y Cirugía por la Universidad de Córdoba y realizó la especialidad vía MIR de Otorrinolaringología y patología cérvico-facial en el Hospital Universitario Virgen Macarena de Sevilla. </p>
						<p class='p15 third-font-gray mt-4'>Tras finalizar su periodo formativo comenzó a trabajar como facultativo especialista en el servicio de otorrinolaringología del hospital San Juan de Dios del Aljarafe (Bormujos-Sevilla), desarrollando funciones asistenciales en el ámbito de la otorrinolaringología general, pero fundamentalmente en los ámbitos de la cirugía otológica, la cirugía endoscópica nasosinusal, la cirugía de glándulas salivales y la patología quirúrgica de la vía lagrimal, del cual formó parte de la unidad de patología quirúrgica de la vía lagrimal.</p>
						<p class='p15 third-font-gray mt-4'>También ha realizado cursos de doctorado en el departamento de Cirugía en la Facultad de Medicina de la Universidad de Sevilla, entre 2000 y 2003 en materia de ‘Investigación en patología y cirugía otorrinolaringológica’.</p>
						<p class='p15 third-font-gray mt-4'>En 2006 se incorporó como facultativo especialista a la unidad de otorrinolaringología del Hospital Vithas Sevilla.</p>
						<p class='p15 third-font-gray mt-4'>Ha sido ponente en el curso de instrucción titulado “Enfermedad por reflujo gastroesofágico atípica manifestaciones ORL” en el LV Congreso Nacional de la SEORL de San Sebastián.</p>
						<p class='p15 third-font-gray mt-4'>En su continuo interés por la especialidad médica que ejerce, Jaime Ruiz Clemente viene asistiendo a numerosos congresos y cursos de formación en los ámbitos de la cirugía otológica, la cirugía endoscópica nasosinusal, la cirugía cervical y de glándulas salivales.</p>
						<p class='p15 third-font-gray mt-4'>Actualmente es jefe de equipo del equipo de <a class='link-blog' href='https://sjdsevilla.com/otorrino-sevilla'>otorrinolaringología</a> del Hospital San Juan de Dios Sevilla y San Juan de Dios Aljarafe.</p>",
		"feature" => false,
		"page_title" => "Jaime Ruiz Clemente, jefe de equipo de otorrinolaringología",
		"page_description" => "El Dr. Jaime Ruiz Clemente es actualmente jefe del equipo de otorrinolaringología del Hospital San Juan de Dios de Sevilla y San Juan de Dios de Aljarafe. "
	],
	"antonio-lopez" => (object) [
		"fecha" => "Viernes, 11 de noviembre de 2022",
		"title_noticia" => "Antonio López González, un referente mundial en la neurocirugía",
		"img_main" => "/files/img/blog/antonio-lopez-neurocirujano.jpg",
		"short_notice" => "El Dr. Antonio López González, neurocirujano del Hospital San Juan de Dios Sevilla, cursó estudios de Medicina en la Universidad de Granada y posteriormente el doctorado en la Universidad de Sevilla.",
		"content" => "<p class='p15 third-font-gray mt-4'>El Dr. Antonio López González, neurocirujano del Hospital San Juan de Dios Sevilla, cursó estudios de Medicina en la Universidad de Granada y posteriormente el doctorado en la Universidad de Sevilla.</p>
		<p class='p15 third-font-gray mt-4'>Su formación especializada tuvo lugar en el Hospital Universitari i Politècnic La Fe de Valencia, siendo posteriormente ampliada mediante la realización de un Fellowship en Microneurocirugía y Neurocirugía Vascular en Helsingin Yliopistollinen Sairaala (HUS, Hospital Universitario de Helsinki, Finlandia) con el Prof. Juha Hernesniemi. </p>
		<p class='p15 third-font-gray mt-4'>Posee formación y entrenamiento en Microcirugía y Neurocirugía Vascular Cerebral, el cual realizó en el Departamento de Neurocirugía del Stroke Center del Hospital Teishinkai de Sapporo, Japón, con el Prof. Rokuya Tanikawa, además de formación y entrenamiento en Microcirugía y Neurocirugía Vascular en el Barrow Neurological Institute, Phoenix, EE.UU. con el Prof. Robert Spetzler. </p>
		<p class='p15 third-font-gray mt-4'>También ha realizado formación específica en cirugía mínimamente invasiva de la columna vertebral en el Centro Médico ABC de Ciudad de México.</p>
		<p class='p15 third-font-gray mt-4'>A lo largo de sus 17 años de experiencia, ha desarrollado su actividad como neurocirujano en el Hospital Universitari i Politècnic la Fe de Valencia y actualmente lo hace en la unidad intercentros de Neurocirugía de los hospitales Virgen del Rocío, Virgen Macarena de Sevilla y el Hospital San Juan de Dios Sevilla. </p>
		<p class='p15 third-font-gray mt-4'>Realiza, entre otras, la valoración y cirugía de las lesiones vasculares del cerebro y médula; cirugía de la base del cráneo; tratamiento quirúrgico de las afecciones tumorales cerebrales y raquimedulares; así como tratamiento de las alteraciones del líquido cefalorraquídeo. Destaca también su dedicación a la valoración, seguimiento y tratamiento quirúrgico de las lesiones de toda la columna vertebral y raíces nerviosas haciendo hincapié en la realización de técnicas de mínima invasión.</p>
		<p class='p15 third-font-gray mt-4'>A nivel científico ha publicado múltiples artículos en revistas científicas y ejerce de revisor de publicaciones neuroquirúrgicas internacionales de primer nivel.</p>
		<p class='p15 third-font-gray mt-4'>Por todo ello el Dr. Antonio López González es un referente mundial en la especialidad de neurocirugía.</p>",
		"feature" => false,
		"page_title" => "Antonio Lopez González (neurocirujano)",
		"page_description" => "El Dr. Antonio López González es actualmente jefe de equipo de neurocirugía del Hospital San Juan de Dios de Sevilla."
	],
	"las-jornada-de-puertas-abiertas" => (object) [
		"fecha" => "Miércoles, 09 de Noviembre de 2022",
		"title_noticia" => "Éxito en las jornadas de puertas abiertas de nuestro Hospital",
		"img_main" => "/files/img/blog/san-juan-de-dios-sevilla-puertas-abiertas.jpg",
		"short_notice" => "El pasado 22 y 29 de octubre se organizó en el Hospital San Juan de Dios Sevilla la I Jornada de Puertas Abiertas que sirvieron para dar a conocer nuestras nuevas instalaciones y servicios disponibles a los usuarios que acudieron a la misma...",
		"content" => "<p class='p15 third-font-gray mt-4'>El pasado 22 y 29 de octubre se organizó en el Hospital San Juan de Dios Sevilla la I Jornada de Puertas Abiertas que sirvieron para dar a conocer nuestras nuevas instalaciones y servicios disponibles a los usuarios que acudieron a la misma.</p>
						<p class='p15 third-font-gray mt-4'>El objetivo principal de esta Jornada de Puertas Abiertas fue informar sobre las  características del nuevo Hospital San Juan de Dios Sevilla y las diferentes actividades asistenciales, docentes e investigadoras que aquí se llevan a cabo, de la mano tanto del director Manuel González Suárez, como de su equipo directivo, que acompañaron a los asistentes en todo momento durante el recorrido. </p>
						<p class='p15 third-font-gray mt-4'>Durante la visita, los asistentes pudieron comprobar de primera mano las nuevas instalaciones del Hospital San Juan de Dios Sevilla, comenzando por la recepción en la planta principal y continuando, en la misma planta, por la sala de admisiones.</p>
						<p class='p15 third-font-gray mt-4'>El recorrido continuó por el área de Urgencias 24 horas, accediendo a través de la zona de admisión y continuando por la sala de exploración, observación y valoración del paciente. Esta zona del hospital, ya ha atendido a pacientes con síndrome febril, catarros o dolencias musculares en niños, así como atención traumatológica, digestiva, cardíaca o neurológicas en adultos entre otras consultas.</p>
						<p class='p15 third-font-gray mt-4'>Posteriormente, en la misma planta, los asistentes conocieron de primera mano el área de radiología, TAG y resonancia magnética, así como los equipamientos usados para las pruebas diagnósticas con los que está dotado el Hospital San Juan de Dios Sevilla y que son pioneros en tecnología. Destaca los equipos de Resonancia Magnética (RM) de 3 Tesla, así como el TAC de 164 cortes. </p>
						<img class='blog-img mt-3' src='/files/img/blog/san-juan-de-dios-sevilla-puertas-abiertas2.jpg' alt='image'>
						<p class='p15 third-font-gray mt-4'>Siguiendo con el recorrido, los asistentes continuaron por la primera planta donde se encuentran las consultas externas, el salón de actos y la capilla. </p>
						<p class='p15 third-font-gray mt-4'>Se continuó el recorrido por las plantas 4 y 5, donde los asistentes pudieron visitar el área de hospitalización y las habitaciones. </p>
						<p class='p15 third-font-gray mt-4'>El recorrido finalizó en el nuevo parking del hospital, el cual dispone de 3 plantas y cuenta con una capacidad para 250 coches y 50 motos, así como aparcamientos disponibles para vehículos para personas con movilidad reducida y patinetes eléctricos o bicicletas.</p>
						<p class='p15 third-font-gray mt-4'>Las jornadas fueron todo un éxito y reunieron a más de 60 personas que pudieron comprobar de primera mano el funcionamiento y las instalaciones del nuevo Hospital San Juan de Dios Sevilla, que ya es un referente en la ciudad. </p>",
		"feature" => false,
		"page_title" => "Éxito en las jornadas de puertas abiertas de nuestro Hospital",
		"page_description" => "Durante el fin de semana, se ha celebrado en nuestro hospital la I jornada de puertas abiertas, que han sido todo un éxito."
	],
	"miguel-angel-gomez-bravo" => (object) [
		"fecha" => "Lunes, 07 de Noviembre de 2022",
		"title_noticia" => "Miguel Ángel Gómez Bravo, jefe de equipo de cirugía general",
		"img_main" => "/files/img/blog/miguel-angel-gomez-bravo-cirugia-general.jpg",
		"short_notice" => "El Dr. Gómez Bravo es Licenciado en Medicina y Cirugía en la Facultad de Medicina de Badajoz (Universidad de Extremadura) y cursó sus estudios durante los años 1981-1987...",
		"content" => "<p class='p15 third-font-gray mt-4'>El Dr. Gómez Bravo es Licenciado en Medicina y Cirugía en la Facultad de Medicina de Badajoz (Universidad de Extremadura) y cursó sus estudios durante los años 1981-1987. Ha sido especialista en Cirugía General y del Aparato Digestivo en el Hospital Universitario Virgen del Rocío de Sevilla entre 1989 y 1993.</p>
						<p class='p15 third-font-gray mt-4'>Es jefe de sección y responsable de la unidad de cirugía del hígado, vías biliares, páncreas y trasplantes de órganos digestivos del Hospital Universitario Virgen del Rocío de Sevilla desde el año 2008. También es formador del Sistema de Formación de Especialistas (M.I.R) del HH. UU. Virgen del Rocío desde junio de 2006.  </p>
						<p class='p15 third-font-gray mt-4'>Además es profesor asociado de la Universidad de Sevilla, en el departamento de cirugía, desde el curso 2006/2007. También ha sido presidente de la Sociedad Andaluza de Trasplantes de Órganos y Tejidos y coordinador nacional de la sección de HPB de la Asociación Española de Cirujanos. </p>
						<p class='p15 third-font-gray mt-4'>Ha participado en más de 200 artículos tanto en publicaciones nacionales como internacionales, así como ha llevado a cabo más de 10 proyectos de investigación en el área de trasplantes.</p>
						<p class='p15 third-font-gray mt-4'>Ha colaborado también en la Red Cooperativa de Investigación en Trasplante y en las estrategias para optimizar los resultados en donaciones y trasplantes.  </p>
						<p class='p15 third-font-gray mt-4'>Junto con el Dr. Miguel Ángel Gómez Bravo y dentro del equipo de cirugía general del Hospital San Juan de Dios Sevilla, se encuentran la Dra. Rosa María Jiménes Rodríguez, el Dr. José Tinoco González y el Dr. Carlos González de Pedro. </p>
						<img class='blog-img mt-3' src='/files/img/blog/quirofano-hospital-san-juan-de-dios-sevilla.jpg' alt='image'>",
		"feature" => false,
		"page_title" => "Miguel Ángel Gómez Bravo, jefe de equipo de cirugía general",
		"page_description" => "El Dr. Miguel Ángel Gómez Bravo es actualmente jefe del equipo de cirugía general del Hospital San Juan de Dios de Sevilla. Está especializado en cirugía del hígado, vías biliares y páncreas. "
	],
	"alfonso-manuel-soto" => (object) [
		"fecha" => "Viernes, 04 de Noviembre de 2022",
		"title_noticia" => "Alfonso Manuel Soto, jefe de equipo de endocrinología",
		"img_main" => "/files/img/blog/dr-alfonso-soto-moreno-ancho.jpg",
		"short_notice" => "El Dr. Alfonso Manuel Soto Moreno es licenciado en medicina por la Universidad de Sevilla desde el año 1996 y cuenta con el MIR desde el año 1997...",
		"content" => "<p class='p15 third-font-gray mt-4'>El Dr. Alfonso Manuel Soto Moreno es licenciado en medicina por la Universidad de Sevilla desde el año 1996 y cuenta con el MIR desde el año 1997. Tras finalizar su carrera universitaria, se especializó en endocrinología y nutrición debido a su vocación para el trato directo con los pacientes. </p>
						<p class='p15 third-font-gray mt-4'>Su vida laboral se ha desarrollado siempre en el Hospital Virgen del Rocío, en el cual empezó como endocrinólogo de base, y desde el 2012 hasta día de hoy como jefe de servicio de esta especialidad, compaginándolo siempre con la práctica clínica. En el Hospital San Juan de Dios Sevilla, también es jefe de servicio de la especialidad de endocrinología.  </p>
						<p class='p15 third-font-gray mt-4'>El Dr. Soto, ha participado en más de 20 ensayos clínicos internacionales de nuevas moléculas como investigador principal y en otros tantos como colaborador. En investigación traslacional, la que se realiza en laboratorio, ha gestionado 3 proyectos como investigador principal, los cuales han sido financiados por el Instituto de Salud Carlos III y la Consejería de Salud. Además ha realizado más de 100 publicaciones científicas, 50 de ellas como primer autor y jefe de grupo. </p>
						<p class='p15 third-font-gray mt-4'>Entre las consultas más destacadas atendidas por el Dr. Soto, se encuentran enfermedades muy prevalentes como la obesidad, la diabetes  y los problemas tiroideos, a otras más específicas como los trastornos hormonales hipofisarios, ováricos o adrenales por ejemplo.</p>
						<p class='p15 third-font-gray mt-4'>Entre las actividades más relevantes que realiza en la Orden destacamos las siguientes:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Consulta Dr Soto Moreno (segunda opinión y casos complejos)</li>
						<li class='mt-2'>Programa Peso y salud</li>
						<li class='mt-2'>Consulta Endocrinología General </li>
						</ul>",
		"feature" => false,
		"page_title" => "Alfonso Manuel Soto, jefe de equipo de endocrinología",
		"page_description" => "El Dr. Alfonso Manuel Soto es actualmente jefe del equipo multidisciplinar del servicio de endocrinología."
	],
	"juan-carlos-vargas-perez" => (object) [
		"fecha" => "Miércoles, 02 de Noviembre de 2022",
		"title_noticia" => "Juan Carlos Vargas, jefe de equipo de pediatría",
		"img_main" => "/files/img/blog/VARGAS PEREZ, JUAN CARLOS.JPG",
		"short_notice" => "El Dr. Juan Carlos Vargas Pérez, es Licenciado en Medicina por la Universidad de Buenos Aires en 2003 y finalizó su formación como Especialista en Pediatría en el Hospital La Fe de Valencia en 2008, para afianzarse posteriormente como profesional en Andalucía.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Dr. Juan Carlos Vargas Pérez, es Licenciado en Medicina por la Universidad de Buenos Aires en 2003 y finalizó su formación como Especialista en Pediatría en el Hospital La Fe de Valencia en 2008, para afianzarse posteriormente como profesional en Andalucía.</p>
						<p class='p15 third-font-gray mt-4'>Cuenta con catorce años de carrera profesional, con experiencia laboral en distintos centros sanitarios de Andalucía (Servicio de Pediatría del Hospital Comarcal La Merced de Osuna, Instituto Hispalense de Pediatría, Hospital QuironSalud de Sevilla, Servicio de Cuidados Críticos y Urgencias del Hospital San Juan de Dios del Aljarafe) respaldan su amplia trayectoria.  </p>
						<p class='p15 third-font-gray mt-4'>Desde hace más de 5 años, forma parte de nuestra Orden Hospitalaria San Juan de Dios Sevilla, destacando su compromiso con la sociedad y los más pequeños.</p>
						<p class='p15 third-font-gray mt-4'>Dentro de su amplia formación profesional:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Master en Pediatría de Atención Primaria (Universidad Complutense de Madrid). 2021</li>
						<li class='mt-2'>Experto en Infectología Pediátrica Básica (Universidad Rey Juan Carlos). 2018</li>
						<li class='mt-2'>Master Universitario en Urgencias Pediátricas (Universidad Católica de Valencia San Vicente Mártir). 2017</li>
						<li class='mt-2'>Experto Universitario en Urgencias Pediátricas (Universidad Católica de Valencia San Vicente Mártir). 2016</li>
						<li class='mt-2'>MEDICO PUERICULTOR (Acreditado por Real e Ilustre Colegio Oficial de Médicos de Madrid). 2009</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Entre las actividades más relevantes que realiza en la Orden destacamos las siguientes:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Consulta de Revisión de salud (programa de control de salud de niño sano).</li>
						<li class='mt-2'>Consulta de patología banal no urgente a demanda.</li>
						<li class='mt-2'>Consulta pediátrica administrativa: certificados médicos para la escolarización o ingreso a guardería, para comedores escolares en caso de alergia alimenticia, y en la dispensación de recetas.</li>
						<li class='mt-2'>Atención en Urgencias pediátricas.</li>
						<li class='mt-2'>Coordinador del servicio de pediatría del Hospital San Juan de Dios Sevilla.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Junto con el Dr. Vargas y dentro del equipo de pediatría del Hospital San Juan de Dios Sevilla, se encuentran la Dra. Marta Cano Cabrera, la Dra. María López Marcos y la Dra. María Sánchez Moreno.  </p>
						<div class='row'>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/Foto identificativa - Marta Cano.jpeg' alt='image'><p class='p12 third-font-gray mt-2'>Dra. Marta Cano Cabrera</p></div>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/Captura de pantalla 2022-11-02 a las 12.35.59.png' alt='image'><p class='p12 third-font-gray mt-2'>Dra. María López Marcos</p></div>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/Captura de pantalla 2022-11-02 a las 12.35.59.png' alt='image'><p class='p12 third-font-gray mt-2'>Dra. María Sánchez Moreno</p></div>
						</div>",
		"feature" => false,
		"page_title" => "Juan Carlos Vargas, jefe de equipo de pediatría",
		"page_description" => "El Dr. Juan Carlos Vargas, es jefe de equipo de pediatría del Hospital San Juan de Dios de Sevilla."
	],
	"cancer-de-prostata" => (object) [
		"fecha" => "Lunes, 31 de Octubre de 2022",
		"title_noticia" => "Todo lo que debes saber sobre el cáncer de próstata",
		"img_main" => "/files/img/blog/cancer-prostata-blog.jpg",
		"short_notice" => "¿Qué es el cáncer de próstata?, Signos, síntomas y cómo prevenirlo...",
		"content" => "<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Qué es el cáncer de próstata?, Signos, síntomas y cómo prevenirlo</span></h2>
						<p class='p15 third-font-gray mt-4'>La próstata es una glándula que pertenece al sistema reproductor masculino, está localizada justo debajo de la vejiga y delante del recto. Su tamaño es como el de una nuez y rodea una parte de la uretra. La glándula prostática produce un fluido que forma parte del semen.</p>
						<p class='p15 third-font-gray mt-4'>El cáncer de próstata  es el tumor más frecuente en varones y constituye la segunda causa de mortalidad por cáncer en varones (por detrás del cáncer de pulmón y colorrectal). Su incidencia aumenta con la edad, ya que se desarrolla principalmente en varones de edad avanzada. </p>
						<p class='p15 third-font-gray mt-4'>Un 90% de los casos se diagnostican en mayores de 65 años y la edad media de diagnóstico es a los 75 años. A medida que los hombres avanzan en edad, la próstata puede agrandarse y bloquear la uretra o vejiga, ocasionando dificultad para orinar o interferir con la función sexual. Este problema se conoce como hiperplasia prostática benigna  y se corrige principalmente con cirugía.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Factores de riesgo</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Edad: La edad es el principal factor de riesgo para el cáncer de próstata. El riesgo de desarrollar un cáncer de próstata empieza a aumentar a partir de los 50 años en hombres de raza blanca y a partir de los 40 años en hombres de raza negra o con historia familiar de cáncer de próstata. La edad media de presentación es de 65 años.</li>
						<li class='mt-2'>Raza: El cáncer de próstata es más frecuente en hombres de raza de color que en hombres de otras razas. Además, los hombres de color tienen una mayor probabilidad de ser diagnosticados en una etapa avanzada, y tienen más del doble de probabilidad de morir de cáncer de próstata en comparación con los hombres blancos. La tasa más baja de cáncer de próstata se observa en individuos de raza asiática.</li>
						<li class='mt-2'>Historia familiar: El cáncer de próstata tiene un importante componente genético. Aquellos hombres que tienen un familiar de primer grado diagnosticado de cáncer de próstata tienen más probabilidad de desarrollar dicha enfermedad. En el cáncer de próstata hereditario la edad de aparición del cáncer es más precoz, y a menudo los pacientes tienen familiares de primer grado afectados de este tipo de cáncer. </li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Métodos diagnósticos</span></h2>
						<p class='p15 third-font-gray mt-4'>Tacto rectal: Consiste en un examen mediante el cual el médico inserta un dedo dentro de un guante lubricado en el recto y palpa la próstata a través de la pared rectal en busca de nódulos o áreas anormales. Este examen es incómodo, pero no es doloroso y lleva muy poco tiempo realizarlo.</p>
						<p class='p15 third-font-gray mt-4'>Determinación de los niveles en sangre de PSA: Prueba de laboratorio que mide las concentraciones de este marcador en sangre. Es una sustancia producida específicamente por la próstata que se puede encontrar en mayor cantidad en la sangre de los hombres que tienen cáncer de próstata.</p>
						<p class='p15 third-font-gray mt-4'>Biopsia prostática guiada por ecografía transrectal: Es un procedimiento que consiste en insertar en el recto una sonda que tiene aproximadamente el tamaño de un dedo para examinar la próstata. La sonda emite ondas sonoras en el recto que rebotan en la próstata y crean ecos que son captados por la sonda. Un ordenador convierte el patrón de ecos en una imagen blanca y negra de la próstata.</p>
						<p class='p15 third-font-gray mt-4'>RNM pélvica multiparamétrica: Procedimiento en que se utiliza un imán, ondas de radio y un ordenador para crear una serie de fotografías detalladas de zonas internas del cuerpo. Puede ser útil para localizar el tumor primario y valorar la extensión. También se utilizará en los pacientes que precisen segunda biopsia por elevación persistente de PSA. </p>
						<img class='blog-img mt-3' src='/files/img/blog/cancer-de-prostata-blog2.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Tratamiento del cáncer de próstata</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Vigilancia activa: la vigilancia activa se usa como tratamiento en el caso de hombres de edad avanzada que no tienen signos o síntomas ni otras afecciones, y hombres a los que se les encontró cáncer de próstata durante un examen de detección.</li>
						<li class='mt-2'>Cirugía: Se utilizan los siguientes tipos cirugía:</li>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Prostatectomía radical abierta: se hace una incisión en la parte inferior del abdomen o en el perineo. La cirugía se realiza a través de la incisión.</li>
						<li class='mt-2'>Prostatectomía radical laparoscópica: se realizan varios pequeños cortes en la pared del abdomen. Se introduce a través de una de las incisiones un laparoscopio que sirve como guía para la operación.</li>
						<li class='mt-2'>Prostatectomía radical laparoscópica asistida por robot: Se realizan varias incisiones pequeñas en la pared del abdomen, al igual que en la prostatectomía laparoscópica. La cámara ofrece al cirujano una vista tridimensional de la próstata y las estructuras que la rodean.</li>
						<li class='mt-2'>Linfadenectomía pélvica: cirugía para extirpar los ganglios linfáticos de la pelvis.</li>
						<li class='mt-2'>Resección transuretral de la próstata: procedimiento quirúrgico para extirpar tejido de la próstata mediante un resectoscopio que se introduce a través de la uretra. </li>
						</ul>
						<li class='mt-2'>Radioterapia y terapia con radiofármacos: La radioterapia es un tratamiento del cáncer para el que se usan rayos X u otros tipos de radiación para destruir células cancerosas o impedir la multiplicación de las mismas.</li>
						<li class='mt-2'>Terapia hormonal: La terapia hormonal es un tratamiento del cáncer que elimina hormonas o bloquea su acción, e impide la multiplicación de células cancerosas. Es conocida como terapia de privación de andrógenos.</li>
						<li class='mt-2'>La quimioterapia:  tratamiento del cáncer en el que se usan medicamentos para interrumpir la formación de células cancerosas, ya sea mediante su destrucción o para impedir su multiplicación.</li>
						<li class='mt-2'>La terapia dirigida: es un tipo de tratamiento para el que se utilizan medicamentos u otras sustancias a fin de identificar y atacar células cancerosas específicas. Causan menos daño a las células normales que la quimioterapia o la radioterapia.</li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Signos y síntomas del cáncer de próstata</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Flujo de orina débil o interrumpido</li>
						<li class='mt-2'>Urgencia repentina de orinar</li>
						<li class='mt-2'>Necesidad frecuente de orinar (en especial, de noche)</li>
						<li class='mt-2'>Dificultad para empezar el flujo de orina</li>
						<li class='mt-2'>Dificultad para vaciar la vejiga por completo</li>
						<li class='mt-2'>Dolor o ardor al orinar</li>
						<li class='mt-2'>Sangre en la orina o el semen</li>
						<li class='mt-2'>Dolor de espalda, cadera o pelvis que no desaparece.</li>
						<li class='mt-2'>Falta de aire, mucho cansancio, latidos rápidos del corazón, mareo o piel pálida a causa de anemia.</li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Consejos para prevenir el cáncer de próstata</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Elegir una alimentación baja en grasas</li>
						<li class='mt-2'>Comer más grasas vegetales que animales </li>
						<li class='mt-2'>Incrementar la cantidad de frutas y verduras que se come a diario</li>
						<li class='mt-2'>Comer pescado </li>
						<li class='mt-2'>Reducir la cantidad de lácteos </li>
						<li class='mt-2'>Mantener un peso saludable</li>
						<li class='mt-2'>Hacer ejercicio al menos 5 días a la semana </li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Durante el mes de noviembre, puedes solicitar tu revisión gratuita de la próstata en el Hospital San Juan de Dios Sevilla. Puedes hacerlo desde el siguiente enlace <a class='span-bold link-blog' href='https://sjdsevilla.com/pedir-cita'>https://sjdsevilla.com/pedir-cita</a></p>",
		"feature" => false,
		"page_title" => "Todo lo que debes saber sobre el cáncer de próstata",
		"page_description" => "¿Qué es el cáncer de próstata? Factores de riesgo, métodos diagnósticos, tratamiento, signos y síntomas y consejos para prevenirlo. "
	],
	"equipo-de-urologia" => (object) [
		"fecha" => "Viernes, 28 de Octubre de 2022",
		"title_noticia" => "Jaime Bachiller Burgos, un referente en la especialidad de urología",
		"img_main" => "/files/img/blog/mejor-urologo-sevilla.jpg",
		"short_notice" => "El Doctor Jaime Bachiller Burgos es un referente en Urología a nivel nacional. Licenciado en Medicina y Cirugía por la Universidad de Sevilla...",
		"content" => "<p class='p12 third-font-gray mt-2'>Dr. Jaime Bachiller Burgos. Jefe de servicio de urología Hospital San Juan de Dios.</p>
						<p class='p15 third-font-gray mt-5'>El Doctor Jaime Bachiller Burgos es un referente en Urología a nivel nacional. Licenciado en Medicina y Cirugía por la Universidad de Sevilla, realizando en el mismo centro el doctorado, es el Jefe de servicio de Urología en el Hospital San Juan de Dios Sevilla perteneciente a la orden de San Juan de Dios, a la que se encuentra muy vinculado. Es profesor de cirugía laparoscópica urológica en el Centro de Mínima Invasión de Cáceres y responsable del área de seguridad del paciente en el Hospital San Juan de Dios.</p>
						<p class='p15 third-font-gray mt-4'>En el año 2009 recibió el premio de Diario Médico «Mejor idea sanitaria» por la cirugía laparoscópica del cáncer de próstata por puerto único. En el 2010 recibió también el premio de su Hospital «Excelencia Investigadora». También colabora con el observatorio de seguridad del paciente en las estrategias de implementación de la seguridad en el ámbito quirúrgico. Miembro de las Sociedades Española y Andaluza de Urología, así como de Andrología.</p>
						<p class='p15 third-font-gray mt-4'>Por todo esto, el Dr. Bachiller Burgos es un médico de primer nivel y podemos destacar entre sus principales especialidades e intervenciones las siguientes: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Prostatectomía (extirpación de la próstata)</li>
						<li class='mt-2'>Cáncer de riñón</li>
						<li class='mt-2'>Hipertrofia benigna de próstata</li>
						<li class='mt-2'>Laparoscopia urológica</li>
						<li class='mt-2'>Litotricia láser</li>
						<li class='mt-2'>Litotricia extracorpórea</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Puedes solicitar tu cita con el Dr. Jaime Bachiller Burgos para tu consulta o revisión urológica en el Hospital San Juan de Dios Sevilla <a href='https://sjdsevilla.com/pedir-cita'>aquí.</a></p>
						<p class='p15 third-font-gray mt-4'>Junto con el Dr. Bachiller y dentro del equipo de urología del Hospital San Juan de Dios Sevilla, se encuentran el Dr. José Rafael Lama Paniego, la Dra. Mercedes Rocío Leanez Jiménez y el Dr. José Javier Alonso Flores. </p>
						<div class='row'>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/urologos-en-sevilla.JPG' alt='image'><p class='p12 third-font-gray mt-2'>Dr. José Javier Alonso Flores</p></div>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/urologo-sevilla.JPG' alt='image'><p class='p12 third-font-gray mt-2'>Dr. José Rafael Lama Paniego</p></div>
						<div class='col-12 col-lg-4'><img class='blog-img mt-3' src='/files/img/blog/urologo-sevilla-sanitas.JPG' alt='image'><p class='p12 third-font-gray mt-2'>Dra. Mercedes Rocío Leanez Jiménez</p></div>
						</div>",
		"feature" => false,
		"page_title" => "Jaime Bachiller Burgos (urología)",
		"page_description" => "El Doctor Jaime Bachiller Burgos es un referente en Urología a nivel nacional. Actualmente es jefe de equipo de urología del Hospital San Juan de Dios de Sevilla.  "
	],
	"virus-respiratorios" => (object) [
		"fecha" => "Martes, 25 de Octubre de 2022",
		"title_noticia" => "Gripe y otros virus respiratorios",
		"img_main" => "/files/img/blog/san-juan-de-dios-sevilla-vacunacion-adultos.jpg",
		"short_notice" => "La gripe es una enfermedad vírica altamente contagiosa y que produce epidemias cada año en otoño e invierno...",
		"content" => "<h2 class='h2 primary-font-blue mt-5'>Qué es, síntomas y prevención<span class='span-medium'></span></h2>
						<p class='p15 third-font-gray mt-4'>La gripe es una enfermedad vírica altamente contagiosa y que produce <span class='span-bold'>epidemias</span> cada año en otoño e invierno. Cada año se producen entre 3 y 5 millones de casos graves por gripe, y entre 290.000 y 650.000 muertes por gripe a nivel mundial. En España fallecen cada año entre 4.000 y 15.000 personas por gripe, y en Andalucía aproximadamente entre 500 y 2000 personas, según el año.</p>
						<p class='p15 third-font-gray mt-4'>La Gripe es una enfermedad causada por un <span class='span-bold'>virus</span>, los antibióticos no resultan efectivos para combatirla y su uso puede crear resistencias a estos fármacos. El tratamiento efectivo consiste en reposo, hidratación adecuada, y si fuese necesario, algún medicamento para paliar los síntomas, como antitérmicos o analgésicos.</p>
						<p class='p15 third-font-gray mt-4'>El virus de la gripe <span class='span-bold'>se transmite con facilidad</span> de persona a persona a través de gotitas de saliva que expulsamos al toser, estornudar o hablar y por propagación indirecta al entrar en contacto con manos u otros objetos contaminados. El mecanismo es muy similar al de los coronavirus.</p>
						<p class='p15 third-font-gray mt-4'>Los síntomas habituales que produce la gripe son muy similares a los que da el COVID-19 y otros muchos virus respiratorios (rinovirus, adenovirus, parainfluenza…), de tal forma que es imposible dar un diagnóstico de certeza solo con las manifestaciones clínicas. La única forma de poder hacerlo es mediante la realización de pruebas diagnósticas, como la PCR, el test del antígeno, etc.</p>
						<p class='p15 third-font-gray mt-4'>De esta forma, una persona con <span class='span-bold'>síntomas de infección respiratoria</span> debe contactar con el sistema sanitario para descartar COVID-19. De estos pacientes, aquellos casos que son debidos a la gripe, podrían haber sido evitados por la vacunación.</p>
						<p class='p15 third-font-gray mt-4'>Además, una misma persona podría padecer a la vez <span class='span-bold'>gripe y COVID-19</span>, cuya combinación es muy probable que sea peor que padecer cada infección de forma separada.</p>
						<p class='p15 third-font-gray mt-4'>Todas estas razones, junto a otras, van a favor de la vacunación de la gripe más que nunca durante esta campaña</p>
						<p class='p15 third-font-gray mt-4'>En la gran mayoría de los casos se comporta como una enfermedad leve, de la que finalmente se recuperará sin problemas. No obstante, <span class='span-bold'>conviene consultar al pediatra si:</span></p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>La fiebre es elevada o persistente.</li>
						<li class='mt-2'>El niño está muy irritable o adormilado.</li>
						<li class='mt-2'>El niño tiene mal aspecto general o dificultad para respirar.</li>
						<li class='mt-2'>Si le aparece una erupción en la piel</li>
						</ul>
						<img class='blog-img mt-3' src='/files/img/blog/san-juan-dios-sevilla-vacunacion.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Cómo podemos prevenir el contagio?</span></h2>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'></span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='mt-2'>Mantener una buena higiene de manos.</li>
						<li class='mt-2'>No compartir bebidas y utensilios</li>
						<li class='mt-2'>Taparse la boca al toser o estornudar.</li>
						<li class='mt-2'>Usar pañuelos desechables.</li>
						<li class='mt-2'>Empleo de mascarillas.</li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Cómo podemos prevenir ingresos hospitalarios y las formas severas tanto por gripe como por COVID?</span></h2>
						<p class='p15 third-font-gray mt-4'>Además de previniendo el contagio, <span class='span-bold'>con la vacunación</span>. Especial importancia merecen, a partir de este año 2022, <span class='span-bold'>la <a class='link-blog' href='/blog/campana-de-vacunacion'>campaña de vacunación</a> frente a la Gripe y COVID-19</span>, debido a la situación de pandemia por COVID-19 que seguimos atravesando.</p>
						<p class='p15 third-font-gray mt-4'>En el <a class='link-blog span-bold' href='/actualidad'>blog de actualidad</a> del <span class='span-bold'>Hospital San Juan de Dios Sevilla</span>, puedes comprobar toda la información relativa a las campañas de vacunación tanto en la población infantil, embarazadas y resto de edades. </p>",
		"feature" => false,
		"page_title" => "Gripe y otros virus respiratorios",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla, os facilitamos toda la información relacionada con la gripe. Qué es, sus síntomas y cómo prevenirla. "
	],
	"campana-de-vacunacion" => (object) [
		"fecha" => "Lunes, 24 de Octubre de 2022",
		"title_noticia" => "Campaña de vacunación antigripal en población infantil y embarazadas",
		"img_main" => "/files/img/blog/san-juan-de-dios-vacunacion-infantil-pediatria-embarazada.jpg",
		"short_notice" => "Para esta campaña 2022 en Andalucía, una de las medidas que se han adoptado es dar el paso con la vacunación antigripal sistemática de todos los niños y niñas...",
		"content" => "<p class='p15 primary-font-blue mt-5'><span class='span-medium600'>Vacunación antigripal sistemática en población infantil</span></p>
						<p class='p15 third-font-gray mt-4'>Para esta campaña 2022 en Andalucía, una de las medidas que se han adoptado es dar el paso con la vacunación antigripal sistemática de todos los niños y niñas de entre 6 meses y 59 meses de edad, es decir, hasta los 4 años y 11 meses, como recomienda la OMS, ya que:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li mt-2>Es el grupo poblacional con mayor incidencia de gripe.</li>
						<li mt-2> Tienen la misma incidencia de hospitalizaciones que las personas mayores.</li>
						<li mt-2>Tienen un papel crucial en la transmisión del virus al resto de la comunidad.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Por lo que esta temporada aún con más motivación, se ha incluido esta medida para protegerlos a ellos y como medida de salud pública para proteger a las personas mayores y/o con factores de riesgo de presentar una enfermedad grave.</p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Recordar que a partir del 17 de octubre ya pueden empezar a vacunarse.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Se puede administrar a la vez que otras vacunas del calendario. Recordar que la vacunación antigripal no está autorizada en menores de 6 meses.</p>
						<img class='blog-img mt-3' src='/files/img/blog/san-juan-de-dios-vacunacion-infantil-pediatria-embarazada-blog.jpg' alt='image'>
						<p class='p15 primary-font-blue mt-5'><span class='span-medium600'>Vacunación antigripal y por COVID en embarazadas</span></p>
						<p class='p15 third-font-gray mt-4'>Si quieres estar tranquil@ y tener a tu niño recién nacido protegido, se recomienda la vacunación antigripal y de la dosis de recuerdo de COVID-19, ya sea primer o segundo recuerdo, a todas las embarazadas, en cualquier trimestre de la gestación.</p>
						<p class='p15 third-font-gray mt-4'>También se recomienda durante el puerperio, en los primeros 6 meses tras el parto si no se vacunaron durante el embarazo en la misma campaña vacunal.</p>",
		"feature" => false,
		"page_title" => "Campañas de vacunación antigripal",
		"page_description" => "Se recomienda la vacunación antigripal y de la dosis de recuerdo de COVID-19, ya sea primer o segundo recuerdo, a todas las embarazadas."
	],
	"renovada-zona-infantil-pediatria" => (object) [
		"fecha" => "Viernes, 21 de Octubre de 2022",
		"title_noticia" => "La renovada zona infantil y de pediatría de San Juan de Dios Sevilla",
		"img_main" => "/files/img/blog/atencion-temprana-san-juan-de-dios-sevilla.jpg",
		"short_notice" => "En la unidad de pediatría de San Juan de Dios Sevilla ofrecemos una atención integral completa gracias al nuevo equipamiento en manos de los mejores profesionales",
		"content" => "<p class='p20 third-font-gray mt-4'>En la unidad de pediatría de San Juan de Dios Sevilla ofrecemos una atención integral completa gracias al nuevo equipamiento en manos de los mejores profesionales</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla ofrece una atención integral infantil en su área de <span class='span-bold'></span>pediatría</span>, desde niños recién nacidos hasta adolescentes. Realizamos controles de salud, <span class='span-bold'></span>urgencias infantiles</span> e intervenciones, entre otros servicios. Así mismo se realizan pruebas convencionales, donde no solo se valora el desarrollo físico, psicológico y social de los más pequeños, sino también otros aspectos preventivos para favorecer el correcto desarrollo. </p>
						<p class='p15 third-font-gray mt-4'>La vinculación del centro con los más pequeños se remonta a los inicios del hospital. Cuando se abrió en 1943, ya se cuidaban a los niños desprotegidos y enfermos. Posteriormente, en 2009, el centro hospitalario dio un paso más con la apertura del <a class='link-blog span-bold' href='/infantil-temprana'>Centro de Atención Infantil Temprana</a>, que en la actualidad se ha convertido en un centro de referencia en toda Andalucía. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Nuestra unidad de pediatría</span></h2>
						<p class='p15 third-font-gray mt-4'>En nuestras nuevas instalaciones contamos con una <span class='span-bold'>zona infantil</span> dedicada y pensada para los más pequeños. Tanto en la zona de Urgencias, como en las consultas de pediatría, hemos incluido decoración infantil en paredes y suelos, así como juegos y peluches. El objetivo es reducir el estrés de los niños y crear un ambiente acogedor, donde se sientan lo más confortable posible.</p>
						<p class='p15 third-font-gray mt-4'>El equipo de pediatría del Hospital San Juan de Dios Sevilla está compuesto por María López, Mariló Moreno, Marta Cano, María Sánchez y Juan Carlos Vargas, coordinador del servicio. Un equipo multidisciplinar y ampliamente cualificado, cuya fortaleza es el extraordinario trabajo en equipo, clave para el correcto diagnóstico y cuidado de los pacientes pediátricos. </p>
						<p class='p15 third-font-gray mt-4'>Como destacamos, Juan Carlos Vargas lidera este equipo. Es especialista en pediatría y médico puericultor. Cuenta con más de quince años de experiencia en distintos centros sanitarios de Sevilla, como el Hospital Comarcal La Merced de Osuna o en el Instituto Hispalense de Pediatría.</p>
						<img class='blog-img mt-3' src='/files/img/blog/san-juan-de-dios-sevilla-pediatria.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Actividades, procedimientos y protocolos</span></h2>
						<p class='p15 third-font-gray mt-4'>El <span class='span-bold'>área de pediatría del Hospital San Juan de Dios Sevilla</span> se dedica a todos los cuidados del niño, desde revisiones o consultas externas a demanda, hasta consultas administrativas del tipo certificados médicos y atención en Urgencias pediátricas. Además, para un servicio más completo, trabajamos con procedimientos y protocolos de prevención, clave en estas edades. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Centro de Atención Infantil Temprana</span></h2>
						<p class='p15 third-font-gray mt-4'>En el Centro de Atención Infantil Temprana proporcionamos los servicios y experiencias necesarias para favorecer el correcto desarrollo y bienestar de los niños y su familia. Nuestro objetivo es atender lo más rápido posible las necesidades transitorias o permanentes que presentan los niños con <span class='span-bold'>trastornos en su desarrollo</span> o que tienen el <span class='span-bold'>riesgo de padecerlos.</span></p>
						<p class='p15 third-font-gray mt-4'>Para ello, contamos con  un equipo multidisciplinar (psicología, logopedia, terapia ocupacional, fisioterapia y educación infantil) que trabaja conjuntamente para abordar la situación desde diferentes puntos de vista, ofreciendo una atención integral personalizada.</p>",
		"feature" => false,
		"page_title" => "Zona infantil y pediatría",
		"page_description" => "Desde la unidad de pediatría de San Juan de Dios Sevilla ofrecemos una atención integral completa gracias al nuevo equipamiento en manos de los mejores profesionales"
	],
	"dia-internacional-cancer-mama" => (object) [
		"fecha" => "Miércoles, 19 de Octubre de 2022",
		"title_noticia" => "19 Octubre. Día Internacional del Cáncer de Mama",
		"img_main" => "/files/img/blog/cancer-de-mama-san-juan-dios-sevilla.jpg",
		"short_notice" => "Qué es, síntomas, detección y consejos de nuestros profesionales",
		"content" => "<p class='p20 third-font-gray mt-4'>Qué es, síntomas, detección y consejos de nuestros profesionales </p>
						<p class='p15 third-font-gray mt-4'>El cáncer de mama es una enfermedad de la glándula mamaria que se produce cuando las células de la mama crecen y se multiplican sin control, teniendo como resultado la formación de un tumor. A pesar de ser una enfermedad que se desarrolla mayoritariamente en mujeres, también afecta a los hombres, donde el porcentaje de este tipo de cáncer está en torno al 0,5% y el 1%. </p>
						<p class='p15 third-font-gray mt-4'>Este tipo de cáncer puede comenzar en distintas partes de la mama, entre las cuales diferenciamos las siguientes: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Lobulillos: glándulas que producen la leche.</li>
						<li>Conductos: tubos que transportan la leche al pezón.</li>
						<li>Tejido conectivo: rodea y sostiene todas las partes de la mama.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>La mayor parte de los cánceres suelen comenzar en los lobulillos o conductos. Este tipo de cáncer puede también diseminarse a otras partes del cuerpo, denominándose en este caso como metástasis. </p>
						<p class='p15 third-font-gray mt-4'>En relación a los tipos más comunes de cáncer de mama podemos destacar los siguientes: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Carcinoma lobulillar infiltrante: las células cancerosas se generan en los lobulillos y posteriormente se diseminan a los tejidos mamarios más cercanos, pudiendo también extenderse a otras partes del cuerpo. </li>
						<li>Carcinoma ductal infiltrante: las células cancerosas se originan en los conductos y salen de ellos multiplicándose en otros tejidos mamarios. Al igual que el carcinoma lobulillar infiltrante, puede diseminarse hacia otras partes del cuerpo. </li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Síntomas del cáncer de mama</span></h2>
						<p class='p15 third-font-gray mt-4'>Los signos de advertencia o síntomas del cáncer de mama pueden ser distintos en cada persona e incluso en algunas personas no tienen ningún tipo de signos o síntomas.</p>
						<p class='p15 third-font-gray mt-4'>Podemos enumerar los siguientes síntomas como lo más comunes en este tipo de cáncer: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Bulto en la mama o debajo del brazo.</li>
						<li>Cambio en el tamaño o la forma de la mama.</li>
						<li>Irritación, desprendimiento de la piel, formación de costras en la piel que rodea al pezón o la piel de la mama. </li>
						<li>Inversión del pezón o llaga en dicha zona. </li>
						<li>Enrojecimiento o orificios en la piel que se encuentra sobre la mama como si fuese la piel de una naranja. </li>
						<li>Dolor en la mama que no desaparece. Aunque el dolor no es generalmente un síntoma de cáncer de mama, se debe comunicar de inmediato al médico. </li>
						</ul>
						<img class='blog-img mt-3' src='/files/img/blog/cancer-de-mama-san-juan-dios.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Detección del cáncer de mama</span></h2>
						<p class='p15 third-font-gray mt-4'>Las pruebas de detección del cáncer de mama se utilizan para detectar de manera precoz, signos o síntomas de esta enfermedad. Este tipo de pruebas no pueden prevenir la enfermedad, pero sí que pueden ayudar a encontrar el cáncer en sus etapas iniciales, cuando es más fácil de tratar. </p>
						<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla recomendamos que las mujeres de 50 años en adelante, se hagan una mamografía cada dos años. En el resto de edades, sobre todo en las comprendidas entre los 40 y 49 años, las mujeres deben sopesar los beneficios y riesgos de las pruebas de detección para decidir si deben empezar con la prevención antes de los 50 años de edad. </p>
						<p class='p15 third-font-gray mt-4'>En relación a las pruebas de detección podemos destacar principalmente la mamografía, que es un radiografía de las mamas, y que es la mejor manera de detectar el cáncer de mama de manera precoz, así como la resonancia magnética en la que se toman fotos de las mamas a través de imanes y ondas de radio.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Recomendaciones de nuestro profesionales</span></h2>
						<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla en colaboración con nuestros especialistas y profesionales, facilitamos una serie de recomendaciones para evitar este tipo de enfermedad: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Controlar el peso: el exceso de peso y la obesidad aumentan considerablemente el riesgo de padecer cáncer de mama por lo que es necesario mantener un control sobre el mismo. </li>
						<li>No fumar: existe un vínculo directo entre el tabaquismo y dicha enfermedad, por lo que se recomienda evitar esta práctica, especialmente en mujeres premenopáusicas. </li>
						<li>Restringir el consumo de alcohol: a mayor ingesta de alcohol, mayor es el riesgo de padecer cáncer de mama, por lo que es recomendable no abusar ni consumir diariamente cualquier tipo de alcohol.</li>
						<li>Realizar actividad física: ayuda a mantener un peso saludable y reduce la posibilidad de padecer cáncer de mama. Es recomendable realizar un mínimo de 150 minutos a la semana de actividad física moderada o 75 minutos de actividad aeróbica intensa.  </li>
						<li>Amamantamiento de hijos: la lactancia tiene un papel muy importante en la prevención y mientras más tiempo amamantes a tu hijo, mayor será el efecto protector. </li>
						<li>Alimentación saludable: dieta equilibrada rica en fruta, verduras y pescado, evitando el consumo excesivo de grasas. </li>
						<li>Realizar una autoexploración mamaria mensual a partir de los 20 años, preferiblemente a partir del quinto día de la menstruación. </li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Desde Hospital San Juan de Dios Sevilla trabajamos diariamente en la prevención, diagnóstico y tratamiento de este tipo de cáncer, por ello ponemos a disposición de todos los usuarios nuestros servicios y un equipo profesional multidisciplinar cualificado para cualquier consulta relacionada con esta enfermedad. Puedes solicitar tu cita desde el siguiente enlace <a href='https://sjdsevilla.com/pedir-cita'><span class='link-blog span-bold'>https://sjdsevilla.com/pedir-cita</span></a> </p>",
		"feature" => false,
		"page_title" => "19 Octubre. Día Internacional del Cáncer de Mama",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla os explicamos qué es el cáncer de mama, síntomas, como detectarlo y consejos de nuestros profesionales."
	],
	"nuestra-obra-social" => (object) [
		"fecha" => "Miércoles, 19 de Octubre de 2022",
		"title_noticia" => "Nuestra Obra Social y nuestro compromiso con los más desfavorecidos",
		"img_main" => "/files/img/blog/obra-social-san-juan-dios.jpg",
		"short_notice" => "En 2021 hemos contribuido a mejorar las condiciones de vida de más de 1.000 personas, realizando más de 3.700 atenciones sociales",
		"content" => "<p class='p20 third-font-gray mt-4'>En 2021 hemos contribuido a mejorar las condiciones de vida de más de 1.000 personas, realizando más de 3.700 atenciones sociales</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Nuestra Orden, comprometida con los más desfavorecidos</span></h2>
						<p class='p15 third-font-gray mt-4'>La Orden de San Juan de Dios es una institución sin ánimo de lucro y de carácter internacional que tiene su origen en la figura de Juan Ciudad, un hombre que no solo revolucionó el mundo de los cuidados sanitarios, siendo el precursor de la Enfermería, sino que también impulsó la dignificación de los colectivos más desfavorecidos de su época gracias a su manera de tratar y atender a las personas con escasos recursos.</p>
						<p class='p15 third-font-gray mt-4'>Con Juan de Dios como inspiración, la Orden Hospitalaria lleva casi 500 años dedicándose a la atención sanitaria, sociosanitaria, social​, docente e investigadora a través de diversos dispositivos, entre los que se incluyen hospitales, centros de salud mental, centros para personas con discapacidad, para personas mayores y para personas en situación de vulnerabilidad y exclusión social.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Nuestra Obra Social</span></h2>
						<p class='p15 third-font-gray mt-4'>En 2021, desde el Hospital San Juan de Dios Sevilla, hemos contribuido a mejorar las condiciones de vida de más de 1000 personas, realizando más de 3700 atenciones sociales. </p>
						<p class='p15 third-font-gray mt-4'>Nuestra Obra Social crece gracias al compromiso y colaboración de nuestros socios, personas voluntarias, empresas amigas y simpatizantes que posibilitan la continuidad de la atención de las personas en situación de vulnerabilidad y riesgo de exclusión social, especialmente de los menores y las personas mayores. </p>
						<p class='p15 third-font-gray mt-4'>La aportación del voluntariado es clave en las tareas de acompañamiento y humanización en la asistencia, dando apoyo a la Obra Social, en el ámbito de Cooperación Internacional y en aquellas acciones básicas necesarias para el adecuado desarrollo en nuestros programas y proyectos. </p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla, continúa trabajando para seguir dando respuesta a necesidades insuficientemente atendidas, siendo el objetivo conseguir una sociedad más justa y solidaria. </p>
						<img class='blog-img mt-3' src='/files/img/blog/Captura de pantalla 2022-10-19 a las 11.37.52.png' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Destino de nuestros fondos y distribución de ayudas</span></h2>
						<p class='p15 third-font-gray mt-4'>En el año 2021, se han destinado desde el Hospital San Juan Dios Sevilla un total de 144.655€ a Programas Sociales y de Cooperación Internacional. Con ello damos cobertura a las necesidades básicas, de atención y sociosanitarias de aquellas personas que se encuentran en riesgo de exclusión social. Acuden a nuestro centro bien por iniciativa propia, o derivados de cualquier entidad pública o privada. </p>
						<p class='p15 third-font-gray mt-4'>En el Hospital San Juan de Dios Sevilla contamos con los siguientes programas sociales: </p>
						<p class='p15 third-font-gray mt-4'>Urgencia social: sus beneficiarios son personas en situación sin hogar, desempleo o trabajo precario, con dificultad para cubrir los gastos básicos o gastos extraordinarios. Las principales acciones que se llevan a cabo desde este programa son: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Ayuda para gastos personales</li>
						<li>Atención bucodental</li>
						<li>Ayuda al transporte</li>
						<li>Farmacia social</li>
						<li>Pobreza energética</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Atención Social a la Infancia: es un programa dirigido a familias con menores de 0 a 14 años que no disponen de medios para cubrir las necesidades básicas. Se llevan a cabo las siguientes acciones: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Higiene y alimentación infantil</li>
						<li>Transporte escolar</li>
						<li>Ayudas básicas a la infancia </li>
						<li>Ropero infantil</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Garantía alimentaria: con este programa se garantiza la cobertura de necesidades básicas respecto a la alimentación para familiar vulnerables, fomentando así una mayor autonomía de las mismas. Entre las acciones destacamos:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Dietas para usuarios y acompañantes</li>
						<li>Aportaciones para economatos externos</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Prestaciones sociosanitarias benéficas: a través de este programa se cofinancia estancias residenciales de mayores en situación de vulnerabilidad y con escasos recursos económicos. Destacamos: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li>Unidad de Respiro Familiar</li>
						<li>Atención domiciliaria</li>
						<li>Acompañamiento</li>
						<li>Plazas residenciales</li>
						<li>Material ortoprotésico</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>Desde el Hospital San Juan de Dios Sevilla os animamos a colaborar con nosotros. Puedes realizarlo desde el siguiente enlace <a href='https://sjdsevilla.com/solidaridad' class='link-blog span-medium600'>https://sjdsevilla.com/solidaridad</a> a través de los medios disponibles. Puedes también consultar de manera detallada nuestras memorias anuales para comprobar dónde van destinados nuestros fondos recaudados. </p>",
		"feature" => false,
		"page_title" => "Nuestra Obra Social y compromiso",
		"page_description" => "En 2021, desde el Hospital San Juan de Dios Sevilla, hemos contribuido a mejorar las condiciones de vida de más de 1000 personas, realizando más de 3700 atenciones sociales."
	],
	"alimentacion-complementaria" => (object) [
		"fecha" => "Lunes, 17 de Octubre de 2022",
		"title_noticia" => "Alimentación complementaria y hábitos alimenticios en la infancia",
		"img_main" => "/files/img/blog/ninas-escuela-sentadas-banco-patio-escuela-comiendo-loncheras_169016-13552.webp",
		"short_notice" => "El Servicio de pediatría del Hospital San Juan de Dios de Sevilla, ha elaborado unas recomendaciones y/o directrices según las distintas etapas de la infancia, tanto para niños como padres.",
		"content" => "<p class='p20 third-font-gray mt-4'>El Servicio de pediatría del Hospital San Juan de Dios de Sevilla, ha elaborado unas recomendaciones y/o directrices según las distintas etapas de la infancia, tanto para niños como padres. Surge como una guía para favorecer una alimentación lo más completa, saludable y natural posible, pero, sobre todo, que se adapte a cada estructura familiar.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Alimentación complementaria (6 meses a 2 años)</span></h2>
						<p class='p15 third-font-gray mt-4'>¿Sabías que la <span class='span-bold'>alimentación complementaria (AC)</span> se considera el proceso por el cual se ofrece al lactante mayor de 6 meses alimentos (sólidos o líquidos) distintos de la <span class='span-bold'>leche materna (LM)</span> o de una <span class='span-bold'>Fórmula Adaptada infantil (FA)</span> como complemento y no como sustitución de esta?</p>
						<p class='p15 third-font-gray mt-4'>Y, aunque en los últimos años las recomendaciones de cómo hacerlo han cambiado mucho y existen diferentes métodos, no se ha demostrado que ninguno sea mejor que otro. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Consejos y puntos claves de la alimentación complementaria</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='my-2'>No iniciar la AC antes de los 4 - 6 meses. Los nuevos alimentos “complementan” a la leche materna, no la sustituyen.</li>
						<li class='my-2'>No existe un orden estricto, ni alimentos mejores que otros para empezar (aunque es preferible los ricos en hierro y zinc).</li>
						<li class='my-2'>Utilizar alimentos cocinados en casa, diversificando las técnicas y preparaciones culinarias.</li>
						<li class='my-2'>Aumentar progresivamente la consistencia de los alimentos y nunca ofrecerle trozos grandes o de consistencia dura (para evitar atragantamientos).</li>
						<li class='my-2'>Permitir que el niño tome la iniciativa, manipule los alimentos y aprenda habilidades (darle cuchara y vaso).</li>
						<li class='my-2'>A los 12 meses ya puede consumir lo mismo que el resto de la familia, evitando los alimentos con riesgo de atragantamiento.</li>
						<li class='my-2'>No prefijar horarios rígidos ni la cantidad a comer. La cantidad la decide el niño. Nunca hay que forzarlos.</li>
						<li class='my-2'>Evitar alimentos superfluos. No es necesario añadir sal, azúcar, edulcorantes ni miel durante el primer año.</li>
						<li class='my-2'>Se recomienda introducir los alimentos durante el día, uno en uno y separados al menos por 7 días (tolerancia y aceptación).</li>
						<li class='my-2'>Procurar que sea en un lugar tranquilo, cerca de la mesa y con toda la familia.</li>
						</ul>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Alimentación del niño entre los 2- 5 años</span></h2>
						<p class='p15 third-font-gray mt-4'>Esta época es clave para establecer buenos hábitos de alimentación y debe predominar la variedad de alimentos más que la cantidad. Algunos consejos útiles son:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='my-2'><span class='span-bold'>Desayunar en familia:</span> Un lácteo suele ser la base: leche, yogur o queso. Incluir pan o cereales, con un chorro de aceite, una rodaja de tomate, un poco de jamón. Y completar con un poco de fruta o zumo natural. Algún día puede haber: huevos, churros, bizcocho. Algo saludable a media mañana: fruta, un trozo de queso, un bocadillo pequeño o un yogurt. Para beber, mejor agua.</li>
						<li class='my-2'><span class='span-bold'>El almuerzo: </span>En la mesa familiar o en el comedor escolar. Con platos pequeños. Hagamos un plato imaginario con tres partes: una para los vegetales, otra para las féculas (arroz, patatas o pasta) o el pan y la tercera para la carne o el pescado. Los guisos tradicionales son así: potajes, lentejas, menestras… El mejor postre es la fruta.</li>
						<li class='my-2'><span class='span-bold'>Meriendas: </span>Ricas y sanas pero pequeñitas. Un bocadillo de pan crujiente, pero pequeño, con queso, embutido, atún, etc. Un vasito de leche o un yogur o una fruta. Aunque sea muy poco, ¡que sea algo saludable!</li>
						<li class='my-2'><span class='span-bold'>Cenar variado: </span>Una sopa caliente en invierno. Pescado o huevo si se tomó carne a mediodía. Un poco de verdura como guarnición. Un poco de ensalada. Si apetece, otra ración de leche y… ¡a la cama!</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>En definitiva, en está época de la infancia es importante un menú variado, donde se incluya frutas y verduras a diario, así como para beber, procurar que siempre sea con agua</p>
						<img class='blog-img mt-3' src='/files/img/blog/lindo-bebe-comiendo-solo_23-2148742683.jpeg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Alimentación en mayores de 6 años</span></h2>
						<p class='p15 third-font-gray mt-4'>En esta etapa los niños están muy influenciados por los compañeros y la publicidad, así como tienen más autonomía para decidir. Por ello es necesario mantener los buenos hábitos en casa y facilitamos los siguientes consejos para su consecución:</p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='my-2'><span class='span-bold'>Desayuno completo: </span>Debe incluir lácteos, pan o cereales y fruta. Así tiene energía, proteínas y vitaminas. Esto mejora el rendimiento en la escuela.</li>
						<li class='my-2'><span class='span-bold'>A media mañana: </span>El recreo es para jugar. Mejor algo que se coma rápido como un bocadillo o una fruta. Y agua para beber. </li>
						<li class='my-2'><span class='span-bold'>El almuerzo; cuanto más variado mejor: </span>Calculen que el plato tiene tres partes: una para los vegetales, otra para las féculas (arroz, patatas o pasta) o el pan, y la tercera para la carne o el pescado. Las cantidades aumentan un poco más que en etapas anteriores. El mejor postre es la fruta o medio vaso de zumo natural. Que participen en las tareas de poner, quitar y servir la mesa y si es posible, comer con la televisión apagada. </li>
						<li class='my-2'><span class='span-bold'>Merienda: </span>debe ser rica y sana. Un bocadillo crujiente. Un vaso de leche, un yogur o alguna pieza de fruta. </li>
						<li class='my-2'><span class='span-bold'>Cenar: </span>debe ser variada, en familia y ¡sin la tele! Una sopa caliente en invierno o ensalada en verano. Huevos, pescado o carne, con un poco de verdura como guarnición. Fruta y, si apetece, otra ración de leche.</li>
						</ul>
						<p class='p15 third-font-gray mt-4'>En definitiva, los padres deben enseñar a comer sano en todas las edades y en las distintas situaciones que se puedan presentar, teniendo en cuenta lo siguiente: </p>
						<ul class='third-font-gray mt-3 p15'>
						<li class='my-2'>El propio ejemplo de los padres. </li>
						<li class='my-2'>Planificando un menú variado semanal.</li>
						<li class='my-2'>Explicando por qué se compra un producto o se guisa de cierta manera.</li>
						<li class='my-2'>Con la despensa llena de alimentos saludables y vacía de “tentaciones”.</li>
						<li class='my-2'>Estimulando a que colaboren en la cocina y en la compra.</li>
						</ul>",
		"feature" => false,
		"page_title" => "Hábitos alimenticios en la infancia",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla, ha elaborado unas recomendaciones y/o directrices según las distintas etapas de la infancia, tanto para niños como padres."
	],
	"campana-vacunacion" => (object) [
		"fecha" => "Viernes, 14 de Octubre de 2022",
		"title_noticia" => "Campaña de vacunación Covid-19 y segunda dosis",
		"img_main" => "/files/img/blog/hospital-san-juan-de-dios-sevilla-vacuna.jpeg",
		"short_notice" => "Debido a la situación que seguimos atravesando de pandemia por COVID-19...",
		"content" => "<p class='p20 third-font-gray mt-4'>Debido a la situación que seguimos atravesando de pandemia por COVID-19, se realiza un llamamiento muy especial a la colaboración de la población para la vacunación frente a gripe y/o de 2ª dosis de recuerdo COVID-19 a la población diana, tanto por el bien personal como por el de toda la sociedad.</p>
						<p class='p15 third-font-gray mt-4'>Estar vacunado lo antes posible frente a ambas infecciones es muy importante, ya que se sabe que <span class='span-bold'>la coinfección de gripe y COVID-19 en una persona presenta mayor riesgo de fallecimiento</span> que ambas infecciones por separado.</p>
						<p class='p15 third-font-gray mt-4'>Así pues, de cara a la próxima onda epidémica de gripe y COVID-19, todos los organismos sanitarios oficiales internacionales y nacionales han recomendado la vacunación antigripal anual y una nueva dosis de recuerdo (que para algunos sería la cuarta inoculación) de la vacuna contra la COVID-19, especialmente para la población  de mayor riesgo de complicaciones, así como para los profesionales sanitarios y sociosanitarios.</p>
						<p class='p15 third-font-gray mt-4'>El <span class='span-bold'>3 de octubre de 2022 arranca en Andalucía la campaña de vacunación</span> frente a la gripe y la 2ª dosis de recuerdo de COVID-19, para toda la población más susceptible a estas infecciones y a sus complicaciones.</p>
						<p class='p15 third-font-gray mt-4'>La vacunación se realizará de forma escalonada, empezando por los <span class='span-bold'>más vulnerables.</span></p>
						<p class='p15 third-font-gray mt-4'><span class='span-bold'>En esta campaña, una de las novedades más relevantes será la vacunación antigripal de toda la población infantil de entre 6 y 59 meses (hasta 4 años y 11 meses) que comenzará el 17 de octubre.</span></p>
						<p class='p15 third-font-gray mt-4'>Se aprovechará para la revisión y actualización de la <span class='span-bold'>vacunación frente al neumococo</span> en caso de ser necesario.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Cronograma escalonado para vacunación frente a gripe y covid-19</span></h2>
						<ul class='third-font-gray mt-3 p15'>
						<li class='my-2'><span class='span-bold'>A partir del 3 octubre 2022:</span> personas internas en residencias de mayores y centros de discapacidad; mayores de 80 años; profesionales sanitarios y sociosanitarios.</li>
						<li class='my-2'><span class='span-bold'>A partir del 17 de octubre:</span> 65-79 años; 6-59 meses; personas entre 60 meses y 64 años con patologías crónicas; grandes dependientes en sus domicilios y cuidadores profesionales; embarazadas.</li>
						<li class='my-2'><span class='span-bold'>A partir del 24 de octubre:</span> otros grupos profesionales (fuerzas y cuerpos de seguridad, granjas, instituciones penitenciarias…). Personas de 60 a 64 no incluidas en otros grupos: solo vacuna COVID-19.</li>
						<li class='my-2'><span class='span-bold'>A partir de diciembre (en función de disponibilidad de dosis):</span> Convivientes domiciliarios de personas mayores de 65 años, de enfermos crónicos y de embarazadas.</li>
						</ul>
						<img class='blog-img mt-3' src='/files/img/blog/san-juan-dios-sevilla-vacunacion-.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Diez razones principales para vacunarse frente a la gripe - covid-19 en esta campaña:</span></h2>
						<ol class='third-font-gray mt-3 p15'>
						<li class='my-2'>La temporada de gripe puede adelantarse y ser más agresiva de lo habitual por el menor contacto con el virus durante los dos últimos años.</li>
						<li class='my-2'>La mayoría de las personas de la población diana recibió la última dosis de vacuna de COVID-19 hace más de 9 meses.</li>
						<li class='my-2'>La inmunidad frente a la COVID-19 disminuye con el tiempo, sobre todo frente a las nuevas variantes que van surgiendo, por lo que es crucial que las personas con mayor riesgo reciban una dosis de recuerdo para reforzarla.</li>
						<li class='my-2'>La coinfección de gripe y COVID-19 presenta mayor riesgo de muerte que ambas infecciones por separado.</li>
						<li class='my-2'>La población diana con indicación para la vacunación anual de gripe, tanto vulnerables por edad como por patologías o situaciones de riesgo, es prácticamente la misma que para la COVID-19. Ambas vacunas se pueden administrar el mismo día. </li>
						<li class='my-2'>Las vacunas disponibles de COVID-19 incluyen la variante circulante predominante en la actualidad en España (Ómicron BA.5). </li>
						<li class='my-2'>Las vacunas frente a la gripe empleadas son tetravalentes, contienen 4 antígenos, dos frente a virus de la cepa A y dos frente a virus de la cepa B. Son actualmente las más completas y con ello las que pueden aportar mayor protección y eficacia.</li>
						<li class='my-2'>Como novedad, en esta campaña se vacunará frente a la gripe a todos los niños y niñas de entre 6 y 59 meses, para protegerles a ellos y al resto de la comunidad. </li>
						<li class='my-2'>El embarazo es una situación de riesgo para gripe y COVID-19 graves, tanto para la embarazada como para el lactante en sus primeros meses de vida, por lo que cobra mayor relevancia la vacunación.</li>
						<li class='my-2'>Se recomienda aprovechar la oportunidad de vacunar frente a neumococo, en caso de estar indicada, en el mismo acto vacunal que la gripe y/o COVID-19, para añadir protección frente a la enfermedad invasora por neumococo y la neumonía.</li>
						</ol>
						<p class='p15 third-font-gray mt-4'>De forma progresiva, se irá habilitando la posibilidad de solicitar cita por los canales habituales: la web de <span class='span-bold'>ClicSalud+</span>, la <span class='span-bold'>App de Salud Andalucía</span>, la <span class='span-bold'>App de Salud Responde</span>, vía <span class='span-bold'>telefónica (Salud Responde)</span> o contactando con su <span class='span-bold'>centro sanitario.</span></p>",
		"feature" => false,
		"page_title" => "Campaña de vacunación Covid-19 y segunda dosis",
		"page_description" => "Diez razones principales para vacunarse frente a la gripe - covid-19 en esta campaña y cronograma escalonado para vacunación."
	],
	"campana-de-sensibilizacion" => (object) [
		"fecha" => "Martes, 11 de Octubre de 2022",
		"title_noticia" => "Campaña de sensibilización de mayores en Andalucía",
		"img_main" => "/files/img/blog/hospital-san-juan-de-dios-monologos.jpg",
		"short_notice" => "La campaña nacional de sensibilización ‘Monólogos de La Vida Misma’, presentada por San Juan de Dios en Andalucía...",
		"content" => "<p class='p20 mt-4'>La campaña nacional de sensibilización ‘Monólogos de La Vida Misma’, presentada por San Juan de Dios en Andalucía, ofrece propuestas para combatir la soledad no deseada, aislamiento y exclusión social de las personas mayores.</p>
						<p class='p20 mt-4'>De los 2 millones de personas mayores que viven solas en España, más del 50% reconoce sentir soledad, según el Estudio CIS-Imserso de 2018.</p>
						<p class='p15 third-font-gray mt-4'>3 de octubre de 2022, Andalucía.- La Orden Hospitalaria de San Juan de Dios ha presentado en Andalucía la campaña nacional de sensibilización ‘Monólogos de La Vida Misma’, que da voz a las personas mayores y la situación de soledad no deseada, aislamiento y exclusión social en que viven muchas de ellas, animándonos a realizar pequeños gestos que pueden cambiar esta realidad.</p>
						<p class='p15 third-font-gray mt-4'>“La soledad no deseada es una de las caras más dolorosas y no siempre reconocidas de la vulnerabilidad”, afirmó Juan José Afonso, director general de San Juan de Dios en España, quien destacó que esta campaña es un llamamiento a la sociedad. “Con esta iniciativa hacemos público algo que está en nuestro ADN y que cada día se lleva a cabo en cada centro de San Juan de Dios, de manera íntima y callada: reconocer a la persona vulnerable y situarla en el centro de todo, con mucha responsabilidad, con todo el respeto y, sobre todo, ofreciéndole nuestra hospitalidad sin reservas”. </p>
						<p class='p15 third-font-gray mt-4'>En el acto de presentación, que ha tenido lugar en Granada, la ciudad donde nació la institución hace casi 500 años, han intervenido Carmen, Emilio y Lola, tres personas mayores que han compartido sus vivencias. Sus testimonios han sido grabados en vídeo y pueden verse en los canales de la campaña, mostrando la importancia del intercambio generacional y de los pequeños gestos. Compartir una café, un paseo, una conversación… algo tan sencillo como eso puede suponer un cambio radical en el día a día de las personas que sufren soledad no deseada.</p>
						<p class='p15 third-font-gray mt-4'>Zapata Tenor, cantante de ópera y monologuista, es embajador de la campaña y ha ejercido de maestro de ceremonias en la presentación. El artista considera la campaña absolutamente necesaria, porque estas personas mayores “no solo se sienten solas, sino que viven una soledad real, ya que pasan muchas horas y muchos días sin hablar con nadie, sin compañía…”.</p>
						<p class='p15 third-font-gray mt-4'>En la jornada se celebró una mesa redonda en la que intervino Isabel Ródenas, médica especialista en Geriatría del Hospital San Rafael de Granada y vocal de la Sociedad Andaluza de Geriatría y Gerontología, y describió la soledad no deseada como “un sentimiento de desesperanza, de tristeza y de desamparo que lo vemos frecuente, no solo en los mayores sino en personas jóvenes y de mediana edad. Es un problema social importante que además tiene consecuencias sobre la salud física y cognitiva”.</p>
						<p class='p15 third-font-gray mt-4'>También participó Jordi Ramón, enfermero especialista en salud mental del Parc Sanitari Sant Joan de Déu e impulsor de una investigación sobre soledad no deseada en personas mayores. En su estudio, detectó que ante el contexto de ansiedad, depresión y distimia en que se encontraron a muchos de los pacientes mayores de 65 años, el abordaje sanitario era un aumento de fármacos para tratarlos. </p>
						<p class='p15 third-font-gray mt-4'>En este contexto, Jordi Ramón y su equipo pusieron en marcha espacios comunitarios en centros cívicos y otros espacios para fomentar las relaciones de las personas mayores con el resto del barrio o vecindario, quedando demostrado que “la soledad no deseada no es un problema sanitario sino social, por este motivo es importante abordarlo desde este punto de vista social-comunitario”.</p>
						<p class='p15 third-font-gray mt-4'>Paloma Pérez, responsable de solidaridad del Hospital San Juan de Dios de Sevilla y técnica del programa de acompañamiento de mayores, resaltó la labor del voluntariado. Una figura que cobra una especial relevancia en este ámbito. San Juan de Dios cuenta con más de 4.500 personas voluntarias, de las cuales un 22% está vinculado al ámbito de las personas mayores.</p>
						<img class='blog-img mt-3' src='/files/img/blog/hospital-san-juan-de-dios-monologos-1.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Sensibilización para luchar contra la soledad de los mayores</span></h2>
						<p class='p15 third-font-gray mt-4'>Diana Casellas, responsable del Área de Sensibilización de San Juan de Dios en España, recordó que “la crisis provocada por la COVID-19 y sus consecuencias han puesto de relieve la necesidad de hacer crecer la conciencia ciudadana hacia el colectivo de personas mayores”. Además, explicó que la soledad no deseada ha aumentado notablemente en los últimos años, y no sólo afecta al bienestar psicológico de las personas, sino que se asocia a peores niveles de salud y mayor riesgo de mortalidad. Es también uno de los principales factores de riesgo de maltrato hacia las personas mayores.</p>
						<p class='p15 third-font-gray mt-4'>Por su parte, la Delegada Territorial en Granada de Inclusión Social, Juventud, Familias e Igualdad, Matilde Ortiz, ha destacado que ahora, más que nunca, se hacen necesarias campañas como estas donde se pone de manifiesto el problema de la soledad no deseada de las personas mayores. “Realmente la soledad no deseada supone un riesgo grave de salud pública que afecta a una cantidad significativa de personas y aumenta el riesgo de desarrollar demencia y otras afecciones”. Por último, y en esta misma línea, la Concejala de Derechos Sociales, Mayores y Planes de Integración y Transparencia de Granada, Nuria Gutiérrez, ha resaltado la soledad no deseada como una segunda pandemia que estamos viviendo. “Es crucial la detección de mayores en situación de soledad no deseada y aislamiento, empoderándolos y dotándolos de una nutrida red social para combatir esta pandemia que va unida al cambio demográfico que estamos sufriendo”.</p>",
		"feature" => false,
		"page_title" => "Campaña de sensibilización de mayores en Andalucía",
		"page_description" => "La campaña nacional de sensibilización 'Monólogos de La Vida Misma' ofrece propuestas para combatir la soledad, el aislamiento y exclusión."
	],
	"del-medio-ambiente" => (object) [
		"fecha" => "Viernes, 07 de Octubre de 2022",
		"title_noticia" => "El Hospital San Juan de Dios Sevilla cuida de ti y del medio ambiente",
		"img_main" => "/files/img/planta43.jpeg",
		"short_notice" => "Las renovadas instalaciones del Hospital San Juan de Dios en Sevilla han sido diseñadas y dotadas con el equipamiento necesario para optimizar al máximo la energía con el mínimo impacto medioambiental",
		"content" => "<p class='p20 mt-4'>Las renovadas instalaciones del Hospital San Juan de Dios en Sevilla han sido diseñadas y dotadas con el equipamiento necesario para optimizar al máximo la energía con el mínimo impacto medioambiental</p>
						<p class='p15 third-font-gray mt-4'>Hemos implementado en nuestro centro hospitalario un sistema de climatización con tecnología geotérmica, paneles fotovoltaicos y ascensores que utilizan la mínima energía, entre otras medidas para hacer del centro sanitario un espacio más sostenible.</p>
						<p class='p15 third-font-gray mt-4'>Para ello, el <span class='span-medium600'>nuevo edificio del Hospital San Juan de Dios Sevilla</span> sigue una estrategia verde, donde se busca que el impacto medioambiental sea el mínimo posible. La correcta gestión de residuos y el consumo responsable de recursos son claves para hacer de nuestro centro hospitalario un espacio más responsable con el medio ambiente.</p>
						<p class='p15 third-font-gray mt-4'>Por una parte, se optimizan los recursos y se impulsan políticas de ahorro energético, como el consumo de agua. Por otra parte, el centro dispone de diversos sistemas para manipular y gestionar los diferentes residuos que se generan en el día a día, priorizando la regla de las 3R: Reducción, Reutilización y Reciclaje. Gracias a diversas iniciativas emprendidas y como muestra del compromiso, el hospital dispone de acreditaciones en este ámbito.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Climatización del hospital</span></h2>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla ha instalado el sistema de geotermia en los sistemas de climatización del centro. De esta forma, se aprovecha la energía del propio terreno a través de intercambios con pozos, lo que permite reducir el uso de energía eléctrica y, por tanto, reducir la huella de carbono. Además, cuenta con un sistema de gestión de la producción de climatización dotado con equipos con capacidad de recuperación de calor. Este doble sistema permite que, en caso de avería, siempre funcione uno sin menoscabar la eficiencia y sostenibilidad.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Control del consumo en el centro hospitalario</span></h2>
						<p class='p15 third-font-gray mt-4'>Otro de los puntos a tener en cuenta es el sistema de gestión centralizado, que permite monitorizar todos los indicadores asociados a los distintos consumos gracias a que el hospital es un centro altamente sensorizado para controlar el gasto energético. Además, se han instalado paneles fotovoltaicos en la cubierta del edificio. Esta instalación permite la producción de energía eléctrica y de agua caliente.</p>
						<p class='p15 third-font-gray mt-4'>Asimismo, en la construcción del <span class='span-medium600'>nuevo edificio de San Juan de Dios en Sevilla</span> se han utilizado materiales aislantes que minimizan el consumo en climatización y permiten que se mantenga una temperatura estable y óptima. </p>
						<p class='p15 third-font-gray mt-4'>En cuanto a los ascensores, en el trayecto de descenso se genera energía que se deriva a la red eléctrica del hospital para su autoconsumo.</p>
						<p class='p15 third-font-gray mt-4'>También disponemos de tecnología LED en todas las fuentes de iluminación del centro sanitario. El consumo energético es muy bajo comparado con la iluminación utilizada anteriormente, suponiendo un ahorro de hasta un 80% de energía. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Parking adaptado a vehículos eléctricos</span></h2>
						<p class='p15 third-font-gray mt-4'>La zona de aparcamiento del Hospital San Juan de Dios de Sevilla dispone de tres plantas de parking. Tiene una capacidad de 250 coches y 50 motos, así como estacionamiento disponible para vehículos de movilidad personal como <span class='span-medium600'>patinetes eléctricos o bicicletas.</span></p>
						<p class='p15 third-font-gray mt-4'>Además, para aquellos que prefieren utilizar el transporte público, debemos mencionar que nuestro centro sanitario se encuentra muy cerca de las paradas de autobuses y metro.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Amplias zonas verdes</span></h2>
						<p class='p15 third-font-gray mt-4'>En el marco de nuestro compromiso con el medio ambiente, dentro del proyecto de renovación de las instalaciones hospitalarias, hemos incluido amplias zonas verdes en el exterior. Estas, además de contribuir a una mayor sostenibilidad, se han convertido en una zona de descanso y desconexión que hacen más agradable la visita a nuestro centro.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Creemos en la sostenibilidad</span></h2>
						<p class='p15 third-font-gray mt-4'>En la Orden de San Juan de Dios creemos y defendemos un futuro sostenible. La sostenibilidad se ha convertido en uno de los grandes retos de la sociedad y, por supuesto, también de los hospitales. El nuevo centro médico San Juan de Dios de Sevilla es un modelo de eficiencia energética que utiliza el mínimo de los recursos posibles.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Cómo llegar al hospital San Juan de Dios</span></h2>
						<div class='mapouter blog-map'><div class='gmap_canvas blog-map-canvas'><iframe class='blog-map-iframe' width='100%' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=san%20juan%20de%20dios%20sevilla&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://fmovies-online.net'></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href='https://www.embedgooglemap.net'>google maps on my web site</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>",
		"feature" => false,
		"page_title" => "Comprometidos con el medio ambiente",
		"page_description" => "Las renovadas instalaciones del Hospital San Juan de Dios en Sevilla han sido diseñadas y dotadas para optimizar al máximo la energía."
	],
	"urgencias-24-horas" => (object) [
		"fecha" => "Miércoles, 05 de Octubre de 2022",
		"title_noticia" => "Urgencias 24 horas Hospital San Juan de Dios de Sevilla",
		"img_main" => "/files/img/blog-urgencias2.jpg",
		"short_notice" => "Nuestro amplio equipo de profesionales médicos están disponibles durante 24 horas, los 365 días del año.",
		"content" => "<p class='p15 third-font-gray mt-4'>Se trata de un nuevo servicio del <span class='span-bold'>Hospital San Juan de Dios Sevilla</span> cuya finalidad es dar asistencia médica y quirúrgica a los pacientes que requieren de una atención inmediata. Nuestro servicio de Urgencias es ininterrumpido, las <span class='span-bold'>24 horas del día</span> y los 365 días del año, siempre atendido por un equipo multidisciplinar cualificado que ofrece una atención eficaz y cercana a pacientes y familiares.</p>
						<p class='p15 third-font-gray mt-4'>Pueden acudir usuarios de todas edades y no se requiere de cita médica previa, pero es importante que el paciente solo acuda acompañado por una persona, para preservar la intimidad de los usuarios.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿A qué pacientes va dirigido nuestro servicio de Urgencias 24h?</span></h2>
						<p class='p15 third-font-gray mt-4'>La asistencia en Urgencias está destinada única y exclusivamente para usuarios que necesitan una atención inminente. Si no necesita de una atención rápida, se recomienda pedir directamente <a href='/pedir-cita'><span class='link-blog span-bold'>cita médica</span></a> con el especialista que corresponda, para los cuales, contamos con citas en plazos muy reducidos. Es fundamental cuidarnos entre todos y pensar en los pacientes que realmente requieren de este servicio. El orden de prioridad lo marca la gravedad, no el orden de llegada.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Servicios de Urgencias 24h</span></h2>
						<p class='p15 third-font-gray mt-4'>En el <span class='span-bold'>Hospital San Juan de Dios Sevilla</span> atendemos todas las urgencias médicas de cualquier especialidad. Tenemos todos los medios para ofrecerte todo lo que necesitas cuando requieras de esta área. Esta zona del hospital, ubicada en la planta cero, se puso en marcha en mayo de 2022 y ya ha atendido a pacientes con síndrome febril, catarros o dolencias musculares en niños, así como atención traumatológica, digestiva, cardíaca o neurológicas en adultos, citando algunos ejemplos.</p>
						<p class='p15 third-font-gray mt-4'>Hay que destacar la zona de laboratorio, que cuenta con la última tecnología disponible. Esto nos permite realizar cualquier tipo de prueba diagnóstica, reduciendo así el tiempo de atención y de espera.</p>
						<img class='blog-img mt-3' src='/files/img/blog-urgencias.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Equipos multidisciplinares a tu disposición </span></h2>
						<p class='p15 third-font-gray mt-4'>Ponemos a disposición de los pacientes un completo y cualificado equipo de profesionales para que la atención médica sea inmediata. Actualmente, en esta área trabajan más de 50 personas y está encabezado por Adrián Martínez, jefe de esta unidad de Urgencias 24h.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Guía del usuario</span></h2>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios de Sevilla tiene un protocolo asistencial de Urgencias 24h que pasamos a detallar:</p>
						<ul><li class='third-font-gray mt-3 p15'>Acceso a la zona de admisión.</li>
						<li class='third-font-gray mt-3 p15'>Valoración y exploración del paciente.</li>
						<li class='third-font-gray mt-3 p15'>Realización de pruebas y administración de tratamientos.</li>
						<li class='third-font-gray mt-3 p15'>Diagnóstico.</li>
						<li class='third-font-gray mt-3 p15'>Seguimiento.</li></ul>
						<p class='p15 third-font-gray mt-4'>En función de los resultados y la evolución del paciente, el médico decide si puede marcharse a su domicilio con un tratamiento específico, si precisa ingreso en planta o pasa a un área de mayor nivel de cuidados (tratamientos cortos u observación).</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Indicadores de tiempo</span></h2>
						<p class='p15 third-font-gray mt-4'>Los tiempos de asistencia en <span class='span-bold'>Urgencias 24h</span> cambian en función de la afluencia de pacientes y de la gravedad que presenten. La prioridad de los profesionales es siempre atender primero a los más graves. En momentos puntuales de alta demanda, el tiempo de espera puede aumentar, no obstante siempre intentamos atender con la mayor brevedad posible.</p>",
		"feature" => false,
		"page_title" => "Urgencias 24 horas Hospital San Juan de Dios de Sevilla",
		"page_description" => "Nuestro servicio de Urgencias es ininterrumpido, las 24 horas del día y los 365 días del año."
	],
	"companias-aseguradoras" => (object) [
		"fecha" => "Jueves, 23 de Septiembre de 2022",
		"title_noticia" => "Trabajamos con las principales aseguradoras",
		"img_main" => "/files/img/hospital-privado-sevilla.jpg",
		"short_notice" => "Sabemos la importancia que tiene encontrar un seguro médico que cubra todas tus necesidades...",
		"content" => "<p class='p15 third-font-gray mt-4'>Sabemos la importancia que tiene encontrar un seguro médico que cubra todas tus necesidades. Por eso, trabajamos con las principales compañías aseguradoras y mutuas entre las que podemos destacar Mapfre, Aegon, Generali, Catalan Occidente, Caser, Sanitas, Fiact y Divina Pastora.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Conoces las ventajas de contar con un seguro de salud?</span></h2>
						<p class='p15 third-font-gray mt-4'>En San Juan de Dios Sevilla, así como en la mayoría de centros sanitarios privados, contar con un seguro médico que te cubra a ti y tu familia suele conllevar ventajas. La principal ventaja que podríamos destacar es el ahorro.</p>
						<p class='p15 third-font-gray mt-4'>Si cuentas con un seguro de salud no tendrás que realizar desembolsos a la hora de acudir a una consulta médica, ya que este se hace cargo de los gastos en nuestro hospital. Tendrás siempre a tu disposición a los mejores especialistas para solucionar cualquier problema de salud que pueda sufrir algún miembro de tu familia. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Citas previas con plazos reducidos</span></h2>
						<p class='p15 third-font-gray mt-4'>Cuentes o no con un seguro de salud, en nuestro <span class='span-medium600'>centro sanitario en Sevilla</span> contarás con <a href='/pedir-cita'><span class='link-blog'>citas previas</span></a> con plazos reducidos. Actualmente las listas de espera en la sanidad pública pueden llegar a ser muy largas, teniendo que esperar, incluso, varios meses para poder recibir la atención médica necesaria, un problema que se ha visto agravado por la crisis del Covid-19. En el Hospital San Juan de Dios tienes la tranquilidad de saber que la respuesta será muy rápida, siendo tu cita asignada entre 1 y 6 días a partir de tu solicitud.</p>
						<p class='p15 third-font-gray mt-4'></p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Los mejores especialistas a tu disposición</span></h2>
						<p class='p15 third-font-gray mt-4'>En nuestro centro sanitario en Sevilla podrás elegir al especialista por el que deseas ser atendido. Igualmente tendrás la posibilidad de elegir al doctor que prefieras para pedir una segunda opinión sobre tu caso.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Qué ocurre si no tienes un seguro médico contratado?</span></h2>
						<p class='p15 third-font-gray mt-4'>En el <span class='span-medium600'>Hospital San Juan de Dios de Sevilla</span> la sanidad privada no es de uso exclusivo para personas aseguradas con una póliza médica. Si no tienes un seguro de salud privado también puedes ser atendido por nuestros especialistas.</p>
						<p class='p15 third-font-gray mt-4'>Se tiende a pensar que la única forma de acceder a nuestros servicios es contratar un seguro médico, pero eso no es así. Es importante que no te dejes llevar por falsas creencias y debes saber que el acceso a la sanidad privada es actualmente más sencillo, flexible y cómodo, aunque no cuentes con un seguro de salud privado.</p>
						<p class='p15 third-font-gray mt-4'>Al acceder a nuestro centro de forma independiente, sin contar con una póliza de seguros,  solo tendrás que pagar por los servicios que recibes, ya sean consultas o pruebas médicas. No hay cuotas, copagos, carencias ni limitaciones.</p>
						<img class='blog-img mt-3' src='/files/img/seguro-medico-sevilla.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>¿Qué te ofrece el Hospital San Juan de Dios?</span></h2>
						<p class='p15 third-font-gray mt-4'>Con o sin aseguradora, podrás disfrutar de la mejor atención sanitaria, sin esperas, además de ser atendidos por profesionales de renombre que tienen a su disposición tecnología innovadora. Todo ello, en unas instalaciones sanitarias recientemente renovadas en el centro de Sevilla.</p>
						<p class='p15 third-font-gray mt-4'>Uno de los grandes valores que rigen la actividad diaria del hospital para ofrecer a los ciudadanos el mejor servicio posible es la calidad asistencial. Nuestro principal compromiso es ofrecer una atención sanitaria de calidad que garantice la seguridad, respeto, igualdad y satisfacción de todos los ciudadanos.</p>
						<p class='p15 third-font-gray mt-4'>Disfruta de la comodidad que te proporciona disponer de una habitación individual y contar con la compañía de un familiar durante las 24 horas del día. Nos comprometemos a que tu estancia en nuestras instalaciones sea lo más confortable posible.</p>
						<p class='p15 third-font-gray mt-4'>El hospital San Juan de Dios de Sevilla está acreditado por la Agencia de Calidad Sanitaria de Andalucía (ACSA) con una certificación de calidad avanzada. Esto demuestra su compromiso con uno de sus valores fundamentales, el de calidad, con el que se pretende garantizar resultados satisfactorios para el usuario y los profesionales del Hospital.</p>
						<p class='p15 third-font-gray mt-4'>Además, contamos con una amplia cartera de servicios médicos, desde Medicina General, Pediatría, Nutrición o Ginecología, hasta Cirugía General, Psiquiatría, Análisis Clínicos o Rehabilitación, entre otras. Para acompañarte en todas las etapas de la vida, ponemos a disposición un Centro de Atención Infantil Temprana que cuenta con el certificado de calidad óptima, otorgado por la ACSA. Este reconocimiento lo convierte en uno de los cinco centros andaluces que cuentan con este aval a la calidad de su atención a los más pequeños, con uno de los cumplimientos de los estándares de calidad más elevados de la región.</p>
						<img class='blog-img mt-3' src='/files/img/Calidad-de-atención-a-los-más-pequeños-1600-x-875.jpg' alt='image'>
						<p class='p15 third-font-gray mt-4'>Si estás pensando en contratar un seguro privado de salud para tu familia es importante que estés bien informado sobre la oferta existente en la actualidad. Aunque uno de los aspectos más importantes es el precio, no debes olvidar consultar las coberturas que cada compañía te ofrece para poder encontrar la póliza que mejor se adapte a tus necesidades.</p>
						<p class='p15 third-font-gray mt-4'>Disponer de un seguro médico te dará la tranquilidad de saber que vas a estar siempre protegido frente a cualquier problema médico que pueda surgir. Además, obtendrás una respuesta rápida, algo que cada día se hace más complicado en la sanidad pública debido a las largas listas de espera.</p>",
		"feature" => false,
		"page_title" => "Trabajamos con las principales aseguradoras",
		"page_description" => "Desde el Hospital San Juan de Dios de Sevilla, trabajamos con las principales aseguradoras. Consulta la tuya.",

	],
	"lesiones-deportivas" => (object) [
		"fecha" => "Jueves, 15 de Septiembre de 2022",
		"title_noticia" => "¿Cómo prevenir las lesiones deportivas?",
		"img_main" => "/files/img/Head-Como-prevenir.jpg",
		"short_notice" => "De la mano de la unidad de traumatología del Hospital San Juan de Dios Sevilla...",
		"content" => "<p class='p20 third-font-gray mt-4'>La práctica deportiva se ha multiplicado en los últimos años entre la población y, como consecuencia, las lesiones han aumentado.</p>
						<p class='p20 third-font-gray mt-4'>De la mano de la unidad de traumatología del Hospital San Juan de Dios Sevilla, hablamos sobre algunas de las lesiones deportivas más comunes y cómo evitarlas.</p>
						<p class='p15 third-font-gray mt-4'>El deporte amateur está de moda. Cada día vemos a más personas que salen a la calle y los parques a hacer deporte, desde ciclistas y runners, hasta aquellos más aventureros que se animan con la escalada o el piragüismo, por ejemplo.</p>
						<p class='p15 third-font-gray mt-4'>Sin embargo, en muchas ocasiones no se realizan los calentamientos previos necesarios a la actividad física o no se cuenta con el equipo adecuado para realizarla, entre otros. Estas situaciones han dado lugar a un aumento en las lesiones deportivas en los últimos tiempos. Por ello, queremos hacer un repaso por las lesiones deportivas más comunes y cómo podemos prevenirlas.</p>
						<p class='p15 third-font-gray mt-4'>Este tipo de lesiones afectan a personas de todas las edades, independiente del deporte que realicen. Sin embargo, es más probable sufrir una lesión en personas con más edad, deportistas principiantes que nunca hayan realizado deportes o tras un cambio de actividad deportiva. Son muchos los motivos, aunque en cualquier caso, hay que cuidar todos los detalles y, siempre que vayas a comenzar a realizar un deporte, te recomendamos informarte y ponerte en manos de especialistas y/o entrenadores que te ayuden y apoyen, sobre todo si nunca has practicado la modalidad deportiva a realizar.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Lesiones deportivas más habituales</span></h2>
						<p class='p15 third-font-gray mt-4'>Al Hospital San Juan de Dios Sevilla llegan todo tipo de lesiones. Entre las más comunes están la <span class='span-medium600'>rotura de ligamentos,</span> meniscos o bursitis. Por otro lado, entre las dolencias  musculares más habituales podemos encontrar el <span class='span-medium600'>codo del tenista,</span> codo del golfista y el <span class='span-medium600'>pulgar del esquiador.</span></p>
						<p class='p15 third-font-gray mt-4'>Los <span class='span-medium600'>traumatólogos</span> inciden en la importancia de prestar atención a las dolencias y molestias que puedan aparecer. En muchas ocasiones, simplemente serán las conocidas agujetas pero, en otros, puede que se trate de un indicativo a tener en cuenta para ser tratado a tiempo y que no empeore la posible lesión. Si las </p>
						<p class='p15 third-font-gray mt-4'>molestias aparecen, es importante consultar a un especialista. En estos casos, la mejor opción es pedir <a href='/pedir-cita'><span class='link-blog'>cita médica</span></a con un traumatólogo.</p>
						<img class='blog-img mt-3' src='/files/img/Lesiones dep.jpg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Nuestro equipo de especialistas en traumatología y lesiones deportivas</span></h2>
						<p class='p15 third-font-gray mt-4'>En el <span class='span-medium'>Hospital San Juan de Dios Sevilla</span> disponemos de un equipo de traumatología con una amplia trayectoria en medicina deportiva. La unidad está dividida en especialidades, por lo que somos capaces de abarcar y dar servicio para tratar diferentes dolencias. Al ser tratado por un experto en la materia, disfrutarás de una asistencia de calidad y enfocada en la enfermedad o zona de la lesión, sin necesidad de ser derivado a otra unidad. Además, al contar con un equipo multidisciplinar, contarás con la evaluación de varios expertos si fuera necesario, con diferentes puntos de vista que ayudarán a la evaluación global previa y posterior tratamiento personalizado.</p>
						<p class='p15 third-font-gray mt-4'>En nuestro centro hospitalario en Sevilla ofrecemos un servicio sanitario integral. Nuestros profesionales te ayudarán a recuperarte de tus lesiones deportivas para que puedas volver a la actividad en el menor tiempo posible. Puedes pedir cita médica llamando al 954 939 300, a través de nuestra  app móvil SDJ Salud o mediante <a href='/pedir-cita'><span class='link-blog'>cita online.</span></a> Además, en el Hospital de la Orden San Juan de Dios en Nervión contamos con el servicio de <a href='/urgencias-sevilla'><span class='link-blog'>Urgencias 24 horas,</span></a> los 365 días del año.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>La prevención,  un factor clave en las lesiones deportivas</span></h2>
						<p class='p15 third-font-gray mt-4'>Aunque seguro que lo has escuchado muchas veces, es muy importante tener presente que la prevención es fundamental a la hora de evitar lesiones deportivas. Es especialmente relevante para las personas que comienzan una nueva modalidad deportiva. </p>
						<p class='p15 third-font-gray mt-4'>Si es tu caso, recuerda que es importante comenzar el entrenamiento de forma progresiva, seguir los consejos de entrenadores o especialistas en la actividad que vayas a practicar y contar con un correcto cuadro de calentamiento y estiramientos para realizar antes y después de hacer deporte. Además, es importante conocer las limitaciones personales y no realizar sobreesfuerzos, así como seguir una alimentación equilibrada e hidratarte continuamente.</p>
						<p class='p15 third-font-gray mt-4'>Los beneficios de hacer deporte para nuestra salud son innumerables, siempre y cuando se haga de una forma segura y responsable. Hay muchas <span class='span-medium600'>lesiones deportivas</span> que se producen a causa de una mala praxis y, otras, por accidente. Sea cual sea tu caso, en nuestro centro hospitalario puedes encontrar el especialista que necesitas. Si has sufrido una lesión o tienes molestias musculares, no dudes en ponerte en manos de nuestros profesionales.</p>",
		"feature" => false,
		"page_title" => "¿Cómo prevenir las lesiones deportivas?",
		"page_description" => "De la mano de la unidad de traumatología del Hospital San Juan de Dios de Sevilla, hablamos sobre algunas de las lesiones deportivas más comunes y cómo evitarlas.",

	],
	"localizacion" => (object) [
		"fecha" => "Miércoles, 7 de Septiembre de 2022",
		"title_noticia" => "Hospital San Juan de Dios de Sevilla, localización y nuevas instalaciones",
		"img_main" => "/files/img/blog-san-juan-de-dios.jpg",
		"short_notice" => "Nuestras nuevas instalaciones hacen que la experiencia en el centro hospitalario sea lo más cómoda y acogedora posible...",
		"content" => "<p class='p15 third-font-gray mt-5'>Disponemos de tres plantas de parking para que el aparcamiento no sea ningún problema si necesitas acudir al Hospital San Juan de Dios Sevilla.</p>
						<p class='p15 third-font-gray mt-4'>Nuestras nuevas instalaciones hacen que la experiencia en el centro hospitalario sea lo más cómoda y acogedora posible. Disponemos de todas las especialidades, urgencias 24 horas y trabajamos con las aseguradoras más reconocidas del país.</p>
						<p class='p15 third-font-gray mt-4'>El Hospital San Juan de Dios Sevilla es una apuesta segura. A su privilegiada ubicación en el <span class='span-medium600'>barrio de Nervión</span>, hay que sumarle la gran cartera de servicios y las <span class='span-medium600'>nuevas instalaciones</span> que fueron inauguradas el pasado mes de marzo. Siempre con el mejor trato, cercanía y excelentes profesionales.</p>
						<p class='p15 third-font-gray mt-4'>El centro hospitalario se encuentra en una exquisita ubicación, en una de las zonas de Sevilla más reconocidas y demandadas como es el barrio de Nervión, muy cerca del <span class='span-medium600'>estadio Ramón Sánchez Pizjuán</span> y el centro comercial Nervión Plaza. El centro de la ciudad o la Plaza de España están a diez minutos del Hospital San Juan de Dios Sevilla.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Magnífico parking</span></h2>
						<p class='p15 third-font-gray mt-4'>Desde hace unos meses, los pacientes del hospital en Sevilla disponen de plazas de aparcamiento para que su visita al centro sea más cómoda y accesible. Hay en total tres plantas (-2, -3 y -4) dedicadas al estacionamiento de vehículos. Tiene capacidad para 250 coches y 45 motos. Además, disponen de zonas para vehículos de movilidad personal, como patinetes eléctricos o bicicletas.</p>
						<p class='p15 third-font-gray mt-4'>Actualmente, al parking del Hospital San Juan de Dios Sevilla se debe acceder por la calle Marqués de Nervión, aunque pronto también habrá entrada y salida por la calle San Juan de Dios. Al tratarse de un parking público, los vecinos del barrio y personas que así lo deseen, podrán acceder a estos aparcamientos contribuyendo a la promoción de la movilidad de la zona.</p>
						<img class='blog-img mt-3' src='/files/img/parking-blog.jpeg' alt='image'>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Cómo llegar al hospital San Juan de Dios</span></h2>
						<div class='mapouter blog-map'><div class='gmap_canvas blog-map-canvas'><iframe class='blog-map-iframe' width='100%' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=san%20juan%20de%20dios%20sevilla&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://fmovies-online.net'></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href='https://www.embedgooglemap.net'>google maps on my web site</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
						<p class='p15 third-font-gray mt-4'>Al centro hospitalario también se puede llegar cómodamente en transporte público. En las líneas de autobús 5, 22, 32, 52, A4, B3 y B4 de Tussam, en las paradas de Metro Sevilla de Nervión y Gran Plaza y, próximamente, en Metro Centro. También puedes acudir en taxi y otras empresas dedicadas al transporte.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Un centro sanitario moderno y renovado</span></h2>
						<p class='p15 third-font-gray mt-4'>En marzo se abrieron las <span class='span-medium600'>nuevas instalaciones del Hospital San Juan de Dios Sevilla.</span> En total, hay seis plantas con un equipamiento de última generación para ofrecer el mejor servicio sanitario a los pacientes y los tratamientos médicos más avanzados.</p>
						<p class='p15 third-font-gray mt-4'>En la planta cero se encuentran las zonas de información, admisión, radiología, urgencias, cafetería y la especialidad de pediatría, con el Centro de Atención Infantil Temprana. Si subimos a la primera planta están las consultas externas, salas admisión y habitaciones de hospitalización, además de un espléndido salón de actos y la capilla. En el segundo nivel, las habitaciones de hospitalización y el laboratorio y, en la tercera, el área quirúrgica, URPA, UCI y endoscopia. Las plantas cuarta, quinta y sexta están dedicadas a habitaciones de hospitalización.</p>
						<p class='p15 third-font-gray mt-4'>En definitiva, en Hospital San Juan de Dios Sevilla encontrarás un centro sanitario integral, capacitado para cubrir las diferentes necesidades de cada paciente. Para ello, disponemos de una amplia cartera de especialidades médicas como son pediatría, traumatología y cirugía ortopédica, otorrinolaringología, cardiología o neurología, entre otras. Puedes consultar todos los <a href='/servicios'><span class='link-blog'>servicios sanitarios aquí.</span></a></p> 
						<p class='p15 third-font-gray mt-4'>Además, en mayo comenzamos a ofrecer el servicio de atención de <span class='span-medium600'>Urgencias 24 horas</span> todos los días del año. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Aseguradoras</span></h2>
						<p class='p15 third-font-gray mt-4'>En el hospital San Juan de Dios Sevilla atendemos pacientes particulares y privados y trabajamos con las <span class='span-medium600'>principales compañías aseguradoras y mutuas.</span></p>
						<p class='p15 third-font-gray mt-4'>En nuestro afán de seguir ofreciendo la mejor atención  a los pacientes y todas las facilidades posibles, nuestro hospital en Sevilla continúa ampliando los acuerdos y ya contamos con convenios con Caser Seguros, Mapfre, Sanitas, Fiatc Seguros, Plus Ultra, Seguros Bilbao, Catalana Occidente, Norte Hispania y Generali. </p>
						<p class='p15 third-font-gray mt-4'>Si tu aseguradora no aparece en el listado, puedes ponerte en contacto llamando al 954 93 93 00. Para cualquier duda, consulta o solicitud, también puedes visitarnos o ponerte en <a href='/contacto'><span class='link-blog'>contacto a través de nuestra web.</span></a></p>",
		"feature" => false,
		"page_title" => "Localización y nuevas instalaciones",
		"page_description" => "Nuestras nuevas instalaciones hacen que la experiencia en el centro hospitalario sea lo más cómoda y acogedora posible.",
	],
	"detalles" => (object) [
		"fecha" => "Viernes, 26 de Agosto de 2022",
		"title_noticia" => "Área quirúrgica Hospital San Juan de Dios de Sevilla",
		"img_main" => "/files/img/blog.png",
		"short_notice" => "Hospital San Juan de Dios Sevilla ponemos al servicio de todos los usuarios nuestra unidad quirúrgica...",
		"content" => "<p class='p15 third-font-gray mt-4'>Nuestro renovado centro sanitario dispone de cinco quirófanos de grandes dimensiones y tecnología de última generación en manos de los mejores especialistas.</p>
						<p class='p15 third-font-gray mt-4'>Desde el <span class='span-medium600'>Hospital San Juan de Dios Sevilla</span> ponemos al servicio de todos los usuarios nuestra unidad quirúrgica,  equipada con la tecnología y materiales necesarios para realizar todo tipo de intervenciones, de cualquier especialidad. Tanto como paciente como acompañante, encontrarás en nuestro centro sanitario todo lo necesario para que el paso por nuestras instalaciones o la estancia sea lo más confortable posible, siempre de la mano de los mejores profesionales.</p>
						<p class='p15 third-font-gray mt-4'>En nuestras instalaciones encontrarás una zona destinada a intervenciones menores (CMA) y otra con la tecnología necesaria para reproducir <span class='span-medium600'>cirugías en directo</span> o grabar vídeos para formaciones o congresos, de gran valor para nuestros especialistas. Esta última está ubicada en la tercera planta, junto a la zona de URPA, UCI y endoscopias. </p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Un servicio sanitario integral</span></h2>
						<p class='p15 third-font-gray mt-4'>En nuestro centro hospitalario de Sevilla contamos con tiempos de espera muy reducidos. Disponemos de todos los medios técnicos y humanos para que la atención sea rápida y de calidad. En este sentido, ofrecemos citas para nuestros especialistas en plazos reducidos, entre 1 y 6 días, dependiendo de la especialidad, siendo esta una media de tiempo más reducida que en otros centros hospitalarios. Para los casos en los que es necesaria hospitalización, contamos con amplias habitaciones -algunas de ellas de 50 metros cuadrados- y equipadas con la mejor tecnología para realizar un seguimiento de su evolución y recuperación.</p>
						<img class='blog-img mt-3' src='/files/img/blog2.png' alt='image'>
						<p class='p15 third-font-gray mt-4'>Además, contamos con servicio de <a href='/urgencias-sevilla'><span class='link-blog'>Urgencias 24 horas</span></a>, los 365 días del año. Los responsables de esta área son Miguel Ángel Bravo, responsable de la especialidad de cirugía general y del aparato digestivo, y Carmen Barroso, supervisora del área quirúrgica.</p>
						<p class='p15 third-font-gray mt-4'>De forma previa a la intervención, contamos con los equipos más avanzados para la diagnosis del paciente, desde ecografías, radiografías y análisis, hasta cualquier tipo de estudio personalizado necesario para el correcto diagnóstico. Todo el diagnóstico lo realizamos en el propio centro hospitalario, sin necesidad de derivar a nuestros pacientes a otras instalaciones médicas. </p>
						<p class='p15 third-font-gray mt-4'>Durante la intervención se verán beneficiados de la última tecnología y de las manos expertas de nuestros especialistas. En cuanto al postoperatorio, nuestros expertos realizan un seguimiento pormenorizado de la evolución del paciente, ayudándoles en todo momento para una pronta recuperación.</p>
						<h2 class='h2 primary-font-blue mt-5'><span class='span-medium'>Área quirúrgica con la mejor tecnología y máxima seguridad</span></h2>
						<p class='p15 third-font-gray mt-4'>Además de unas renovadas instalaciones para mejorar la experiencia en el centro pacientes y familiares, hemos incorporado tecnología innovadora que facilita a nuestros especialistas ver la zona interna donde están operando, algo de vital importancia para actuar con mayor seguridad. Y es que a veces los cirujanos tienen lejos del alcance de su visión el área sobre la que tienen que intervenir y deben guiarse apoyándose en nuevas tecnologías. En este marco, con los nuevos equipos, pueden utilizar técnicas de imagen para realizar cirugías, como el uso de indocianina, un colorante que permite ver, en tiempo real, la zona que se está operando cuando se activa la visión en el monitor.</p>
						<img class='blog-img mt-3' src='/files/img/blog3.png' alt='image'>
						<p class='p15 third-font-gray mt-4'>También hay que mencionar el sistema de <span class='span-medium600'>esterilización</span> que utiliza el Hospital San Juan de Dios Sevilla, ya que la esterilización de productos sanitarios es una actividad imprescindible y de máxima relevancia para la prevención de riesgos en los centros sanitarios, ya que de ella depende de forma directa toda el área quirúrgica, así como muchos otros servicios que, en mayor o menor medida, utilizan materiales estériles. En este sentido, a diferencia de otros centros, cuenta con  un circuito cerrado, aislando las zonas y materiales utilizados -o “sucios”, sin esterilización- de las zonas y materiales esterilizados, listos para su uso. </p>
						<p class='p15 third-font-gray mt-4'> Con todo ello, el Hospital San Juan de Dios podríamos considerar que tiene el área quirúrgica más completa de Sevilla. Realizamos intervenciones programadas, contamos con servicio de urgencias y hacemos intervenciones ambulatorias. Además, atendemos consultas externas para una <a href='/servicios'><span class='link-blog'>amplia gama de especialidades</span></a> que puedes consultar aquí. Así mismo, contamos con una zona de hospitalizaciones y parking público a disposición de todos. </p>
						<p class='p15 third-font-gray mt-4'>En cuanto a nuestras consultas, debemos mencionar que contamos con convenios con las principales <a href='/companias'><span class='link-blog'>compañías aseguradoras y mutuas.</span></a> También recibimos pacientes derivados de otros hospitales, como Hospital Virgen del Rocío y Hospital Virgen Macarena, para todo tipo de servicios e intervenciones.</p>
						<p class='p15 third-font-gray mt-4'>Si lo necesitas, <a href='/pedir-cita'><span class='link-blog'>consúltanos o pida cita online aquí,</span></a> estamos encantados de atenderte. </p>",
		"feature" => false,
		"page_title" => "Área quirúrgica Hospital San Juan de Dios de Sevilla",
		"page_description" => "Conoce todos los detalles del área quirúrgica del nuevo Hospital San Juan de Dios de Sevilla. Disponemos de cinco quirófanos de grandes dimensiones y tecnología de última generación",
	],
];
