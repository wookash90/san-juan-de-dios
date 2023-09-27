<?php $url = substr($_SERVER["PHP_SELF"], strrpos($_SERVER["PHP_SELF"], "/") + 1);
$canonical = $_SERVER['REQUEST_URI'];
if ($url == "blog.php" && strpos($_SERVER['REQUEST_URI'], "?") !== false) {
	$canonical = '/blog/'.$_GET['n'];
}
if ($url == "especialidad.php" && strpos($_SERVER['REQUEST_URI'], "?") !== false) {
	$canonical = '/'.$_GET['e'];
}
if (isset($canonicalNoticia)) {
	$canonical = $canonicalNoticia;
}

header("Content-Type: text/html; charset=UTF-8");
require_once "$base_dir/lib/app_data.php";
if (!empty($login_required)) require "$base_dir/lib/login.php";

ini_set("display_errors", empty($produccion));
error_reporting(!empty($produccion) ? 0 : E_ALL);
$seconds_to_cache = !empty($seconds_to_cache) ? $seconds_to_cache : 0;
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
header("Expires: $ts");
if ($seconds_to_cache) {
	header("Pragma: public");
	header("Cache-control: max-age=$seconds_to_cache");
} else {
	header("Pragma: no-cache");
	header("Cache-Control: no-cache, must-revalidate");
} ?>
<!DOCTYPE html>
<html lang="<?= !empty($idioma) ? $idioma : 'es'; ?>">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0" />
	<?php if($page_description) { ?>
	<meta name="description" content="<?= $page_description?>">
	<?php } else { ?>
	<meta name="description" content="Hospital San Juan De Dios Sevilla">
	<?php } ?>
	<?php if($meta_keywords) {?>
	<meta name="keywords" content="<?= $meta_keywords?>">
	<?php } else { ?>
	<meta name="keywords" content="Hospital San Juan De Dios Sevilla">
	<?php } ?>
	<?php if(isset($canonicalNoticia)) {?>
		<link rel="canonical" href="<?=  $canonical; ?>" />
	<?php } else { ?>
		<link rel="canonical" href="<?= ($https ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $canonical; ?>" />
		<?php } ?>
	<?php 
	if ($url === "index.php") {
		$meta_title = "Hospital San Juan de Dios De Sevilla";
		$meta_desc = $web_desc;
	} else if ($url === "aviso-legal.php") {
		$meta_title = "Hospital San Juan de - Dios Aviso Legal";
		$meta_desc = $web_desc;
	} else if ($url === "politica-de-privacidad.php") {
		$meta_title = "Hospital San Juan de Dios - Política de privacidad";
		$meta_desc = $web_desc;
	}
	//  else if ($url === "especialidad.php" && !empty($elem) && !empty($seoTitle) && !empty($seoMeta)) {
	// 	$meta_title = $seoTitle;
	// 	$meta_desc =  $seoMeta;
	// } 
	else { //Por defecto para el resto de paginas
		$meta_desc = '';
		if (!empty($elem)) {
			if (!empty($elem->title)) $meta_title = $elem->title;
			$meta_desc = '';
			if (!empty($elem->subtitle)) $meta_desc .= $elem->subtitle . ".";
			if (!empty($elem->intro)) $meta_desc .= " " . $elem->intro;
			if (!$meta_desc && !empty($elem->body)) $meta_desc .= substr(strip_tags($elem->body), 0, 255);
			if (!$meta_desc && !empty($elem->notas)) $meta_desc .= substr(strip_tags($elem->notas), 0, 255);
		}
		$meta_title = !empty($meta_title) ?  "$meta_title  $web_title" : $web_title;
		if (!$meta_desc) $meta_desc = $web_desc;
	} ?>
	<title><?= $meta_title; ?></title>
	<meta name="title" content="<?= $meta_title; ?>" />
	<meta property="og:title" content="<?= $meta_title; ?>" />
	<meta property="og:description" content="<?= $meta_desc; ?>" />
	<meta name="twitter:title" content="<?= $meta_title; ?>" />
	<meta name="twitter:description" content="<?= $meta_desc; ?>">

	<meta property="og:type" content="<?= isset($elem->subtitle) ? 'article' : 'website'; ?>" />
	<meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:image" id="meta_rrss_img" content="<?= !empty($elem->img) ? $cc->get_img_path() . $elem->img : (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/files/img/logo.svg'; ?>" />
	<meta property="og:locale" content="<?= !empty($localizacion) ? $localizacion : 'es_ES'; ?>" />
	<meta property="og:site_name" content="<?= $web_title; ?>" />

	<meta name="author" content="<?= $web_author; ?>" />
	<?php if (!empty($web_geo)) { ?>
		<meta name="geo.region" content="<?= $web_geo['region']; ?>" />
		<meta name="geo.placename" content="<?= $web_geo['location']; ?>" />
		<meta name="geo.position" content="<?= $web_geo['lat']; ?>;<?= $web_geo['lng']; ?>" />
		<meta name="ICBM" content="<?= $web_geo['lat']; ?>, <?= $web_geo['lng']; ?>" />
	<?php } ?>

	<meta name="robots" content="<?= !empty($produccion) ? 'index,follow' : 'noindex,nofollow'; ?>" />

	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="application-name" content="<?= $meta_title; ?>" />
	<link rel="icon" sizes="192x192" href="<?= $base_url; ?>/files/img/touch-icon.png" />

	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-title" content="<?= $meta_title; ?>" />
	<link rel="apple-touch-icon" href="<?= $base_url; ?>/files/img/touch-icon.png" />

	<meta name="msapplication-TileImage" content="<?= $base_url; ?>/files/img/touch-icon.png" />
	<meta name="msapplication-TileColor" content="<?= $theme_color; ?>" />
	<meta name="msapplication-tap-highlight" content="no" />
	<meta name="msapplication-square310x310logo" content="<?= $base_url; ?>/files/img/touch-icon.png" />

	<link rel="shortcut icon" href="<?= $base_url; ?>/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?= $base_url ?>/src/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?= $base_url ?>/src/css/style.css">
	<link rel="stylesheet" href="<?= $base_url ?>/src/slick/slick/slick.css">
	<!--[if lt IE 10]>
	<div class="alert alert-danger" role="alert">Esta web no soporta su versión de Internet Explorer. Por favor, actualice su navegador.</div>
	<![endif]-->
	<?php require "$base_dir/lib/analytics.php"; ?>

	<!-- Xandr Universal Pixel - Initialization (include only once per page) -->
	<script>
		! function(e, i) {
			if (!e.pixie) {
				var n = e.pixie = function(e, i, a) {
					n.actionQueue.push({
						action: e,
						actionValue: i,
						params: a
					})
				};
				n.actionQueue = [];
				var a = i.createElement("script");
				a.async = !0, a.src = "//acdn.adnxs.com/dmp/up/pixie.js";
				var t = i.getElementsByTagName("head")[0];
				t.insertBefore(a, t.firstChild)
			}
		}(window, document);
		pixie('init', '4b9fcc74-f688-4fbd-917b-623cdf9f233c');
	</script>

	<!-- Xandr Universal Pixel - PageView Event -->
	<script>
		pixie('event', 'PageView');
	</script>
	<noscript><img src="https://ib.adnxs.com/pixie?pi=4b9fcc74-f688-4fbd-917b-623cdf9f233c&e=PageView&script=0" width="1" height="1" style="display:none" /></noscript>

	<!-- Xandr Universal Pixel - Initialization (include only once per page) -->
	<script>
		! function(e, i) {
			if (!e.pixie) {
				var n = e.pixie = function(e, i, a) {
					n.actionQueue.push({
						action: e,
						actionValue: i,
						params: a
					})
				};
				n.actionQueue = [];
				var a = i.createElement("script");
				a.async = !0, a.src = "//acdn.adnxs.com/dmp/up/pixie.js";
				var t = i.getElementsByTagName("head")[0];
				t.insertBefore(a, t.firstChild)
			}
		}(window, document);
		pixie('init', '4b9fcc74-f688-4fbd-917b-623cdf9f233c');
	</script>

	<!-- Xandr Universal Pixel - Lead Event -->
	<script>
		pixie('event', 'Lead');
	</script>

	<noscript><img src="https://ib.adnxs.com/pixie?pi=4b9fcc74-f688-4fbd-917b-623cdf9f233c&e=Lead&script=0" width="1" height="1" style="display:none" /></noscript>

	<!-- Meta Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '698370534974152');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=698370534974152&ev=PageView&noscript=1" /></noscript>
	<!-- End Meta Pixel Code -->
	<meta name="facebook-domain-verification" content="54a2ps66g3lcux8iiyufde9d867koa" />
</head>

<body>