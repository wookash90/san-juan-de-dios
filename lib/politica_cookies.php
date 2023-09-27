<link rel="stylesheet" href="<?= $base_url;?>/src/css/cookieconsent.css" />
<script src="<?= $base_url;?>/src/js/cookieconsent.js"></script>
<script>
var cc = initCookieConsent()
cc.run({
	autorun: true,				
	delay: 0,
	current_lang: '<?= $idioma;?>',
	autoclear_cookies: true,
	cookie_expiration: 365,
	
	onAccept: function(cookies) {
		var analytics_id = '<?= !empty($app_analytics_id) ? $app_analytics_id : '';?>'
		if (analytics_id && cc.allowedCategory('analytics_cookies')) {
			cc.loadScript('https://www.googletagmanager.com/gtag/js?id='+analytics_id, function() {
				window.dataLayer = window.dataLayer || []
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date())
				gtag('config', analytics_id)
			})
		}
	},
	
	languages: {
		en: {
			consent_modal: {
				title:  "I use cookies",
				description:  'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only upon approval. <a aria-label="Cookie policy" class="cc-link" href="#">Read more</a>',
				primary_btn: {
					text: 'Accept',
					role: 'accept_all' //'accept_selected' or 'accept_all'
				},
				secondary_btn: {
					text: 'Settings',
					role: 'settings' //'settings' or 'accept_necessary'
				}
			},
			settings_modal: {
				title: 'Cookie preferences',
				save_settings_btn: "Save settings",
				accept_all_btn: "Accept all",
				cookie_table_headers: [
					{col1: "Name" },
					{col2: "Domain" },
					{col3: "Expiration" },
					{col4: "Description" },
					{col5: "Type" }
				],
				blocks : [
					{
						title: "Cookie usage",
						description: 'I use cookies to ensure the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want.'
					}, {
						title: "Strictly necessary cookies",
						description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly.',
						toggle: {
							value: 'necessary_cookies',
							enabled : true,
							readonly: true
						},
						cookie_table: [
							{
								col1: 'PHPSESSID',
								col2: '<?= $_SERVER['HTTP_HOST'];?>',
								col3: 'Session',
								col4: 'Used by PHP to manage the user session',
								col5: 'Session cookie'
							}
						]
					}, {
						title: "Analytics cookies",
						description: 'These cookies cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you.',
						toggle: {
							value : 'analytics_cookies',
							enabled : false,
							readonly: false
						},
						cookie_table: [
							<?php if (!empty($app_analytics_id)) { ?>
							{
								col1: '_ga',
								col2: 'google.com',
								col3: '2 years',
								col4: 'Used by Analitycs to distinguish users',
								col5: 'Permanent cookie'
							}, {
								col1: '_gid',
								col2: 'google.com',
								col3: '1 day',
								col4: 'Used by Analitycs to distinguish users',
								col5: 'Permanent cookie'
							}, {
								col1: '_gat',
								col2: 'google.com',
								col3: '1 minute',
								col4: 'Used by Analitycs to throttle request rate',
								col5: 'Permanent cookie'
							},
							<?php } ?>
						]
					}, {
						title: "More information",
						description: 'For any queries in relation to this policy on cookies and your choices, please <a class="cc-link" href="mailto:<?= $conf_mail;?>"><?= $conf_mail;?></a>.',
					}
				]
			}
		},
		es: {
			consent_modal: {
				title:  "Aviso sobre las cookies",
				description:  'Con su consentimiento, usamos cookies o tecnologías similares para almacenar, acceder y procesar datos personales como su visita en este sitio web. Puede retirar otorgar su consentimiento u oponerse al procesamiento tratamiento de datos basado en intereses legítimos en cualquier momento haciendo clic en "Configurar" o en nuestra Política de Cookies en este sitio web.<br /><a aria-label="Política de cookies" class="cc-link" href="<?= $base_url;?>/politica-de-cookies">Leer más</a>',
				primary_btn: {
					text: 'Aceptar',
					role: 'accept_all' //'accept_selected' or 'accept_all'
				},
				secondary_btn: {
					text: 'Configurar',
					role: 'settings' //'settings' or 'accept_necessary'
				}
			},
			settings_modal: {
				title: 'Configuración de cookies',
				save_settings_btn: "Guardar",
				accept_all_btn: "Aceptar todas",
				cookie_table_headers: [
					{col1: "Nombre" },
					{col2: "Dominio" },
					{col3: "Expiración" },
					{col4: "Descripción" },
					{col5: "Tipo" }
				],
				blocks : [
					{
						title: "Uso de cookies",
						description: 'Utilizamos cookies para garantizar las funcionalidades básicas del sitio web y para mejorar su experiencia online. Puede optar por participar o no en cada categoría cuando lo desee.'
					}, {
						title: "Cookies necesarias",
						description: 'Estas cookies son esenciales para el correcto funcionamiento del sitio web. Sin estas cookies, esta web no funcionaría correctamente.',
						toggle: {
							value: 'necessary_cookies',
							enabled : true,
							readonly: true
						},
						cookie_table: [
							{
								col1: 'PHPSESSID',
								col2: '<?= $_SERVER['HTTP_HOST'];?>',
								col3: 'Sesión',
								col4: 'Usada por PHP para manejar la sesión de usuario',
								col5: 'Cookie de sesión'
							}
						]
					}, {
						title: "Cookies analíticas",
						description: 'Estas cookies recopilan información sobre cómo utiliza el sitio web, qué páginas visitó y en qué enlaces hizo clic. Todos los datos son anónimos y no se pueden utilizar para identificarlo.',
						toggle: {
							value : 'analytics_cookies',
							enabled : false,
							readonly: false
						},
						cookie_table: [
							<?php if (!empty($app_analytics_id)) { ?>
							{
								col1: '_ga',
								col2: 'google.com',
								col3: '2 años',
								col4: 'La usa Analytics para distinguir a los usuarios',
								col5: 'Cookie permanente'
							}, {
								col1: '_gid',
								col2: 'google.com',
								col3: '1 día',
								col4: 'La usa Analytics para distinguir a los usuarios',
								col5: 'Cookie permanente'
							}, {
								col1: '_gat',
								col2: 'google.com',
								col3: '1 minuto',
								col4: 'La usa Analytics para limitar el porcentaje de solicitudes',
								col5: 'Cookie permanente'
							},
							<?php } ?>
						]
					}, {
						title: "Más información",
						description: 'Si tiene dudas sobre esta política de cookies, puede contactar con <?= $conf_empresa;?> en <a class="cc-link" href="mailto:<?= $conf_mail;?>"><?= $conf_mail;?></a>.',
					}
				]
			}
		}
	}
})
</script>