<?php $base_dir = dirname(__FILE__);
require "$base_dir/vendor/autoload.php";

$detect = new Detection\MobileDetect;
if ($detect->isiOS()) {
	header("Location: https://apps.apple.com/es/app/san-juan-de-dios-salud/id1475463946");
	exit;
} else if ($detect->isAndroidOS()) {
	header("Location: https://play.google.com/store/apps/details?id=dist.com.appasistencial");
	exit;
} else {
	header("Location: https://{$_SERVER['HTTP_HOST']}");
	exit;
}