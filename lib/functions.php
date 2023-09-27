<?php
/**
 * Check if remote file exists, saving the cost of the HTTP transfer
 * @param  String  $url   Absolute remote path
 * @return Bool
 */
function remote_file_exists($url) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); # handles 301/2 redirects
	curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $httpCode == 200 ? true : false;
}

/**
 * Convert hexdec color string to rgb(a) string
 * @param  String  $color   Hexadecimal color
 * @param  boolean $opacity
 * @return String           Rgb(a) color
 */
function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	//Return default if no color provided
	if (empty($color))
		return $default; 

	//Sanitize $color if "#" is provided 
	if ($color[0] == '#') {
		$color = substr($color, 1);
	}

	//Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array($color[0].$color[1], $color[2].$color[3], $color[4].$color[5]);
	} elseif (strlen($color) == 3 ) {
		$hex = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb = array_map('hexdec', $hex);

	//Check if opacity is set(rgba or rgb)
	if ($opacity) {
		if (abs($opacity) > 1) $opacity = 1.0;
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

	//Return rgb(a) color string
	return $output;
}
/**
 * Lee el contenido de un directorio
 * @param String $dir: Ruta del directorio
 * @param String|Array $filter: Extension o array de extensiones permitidas sin punto (.)
 * @param Boolean $random: orden aleatorio de elementos
 */
function read_files($dir, $filter = "", $random = false) {
	$files = [];
	$mydir = opendir($dir);
	$i = 0;
	while ($file = readdir($mydir)) {
		$ext = substr($file, strrpos($file, ".")+1);
		if (!is_dir($file) && (
			!$filter
			|| (gettype($filter) == 'string' && $ext == $filter)
			|| (gettype($filter) == 'array' && in_array(strtolower($ext), $filter))
		)) {
			$files[$i++] = $file;
		}
	}
	if ($random) shuffle($files);
	else sort($files);
	return $files;
}

/**
 * Ordena un array multidimensional
 * @param Array $m: El array a ordenar
 * @param String $ordenar: campo del subarray por el que se va a ordenar
 * @param String $dir: dirección de ordenamiento (ASC o DESC)
 */
function ordenar($m, $ordenar, $dir) {
	usort($m, create_function('$item1, $item2', '$cmp1=$cmp2=null;if(gettype($item1)=="array") $cmp1=$item1[\'' . $ordenar . '\'];else if(gettype($item1)=="object") $cmp1=$item1->' . $ordenar . ';else $cmp1="0";if(gettype($item2)=="array") $cmp2=$item2[\'' . $ordenar . '\'];else if(gettype($item2)=="object") $cmp2=$item2->' . $ordenar . ';else $cmp2="0";return strtoupper($cmp1) ' . ($dir === 'ASC' ? '>' : '<') . ' strtoupper($cmp2);'));
	return $m;
}

function chmodDir($src, $chmod) {
	$dir = opendir($src);
	if (!is_dir($dir)) return false;
	while (false !== ($file = readdir($dir))) {
		if (($file != '.') && ($file != '..')) {
			if (is_dir($src . '/' . $file)) {
				chmodDir($src, $chmod);
			}
			chmod($src . '/' . $file, $chmod);
		}
	}
	closedir($dir); 
} 

function copyDir($src, $dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while (false !== ($file = readdir($dir))) {
		if (($file != '.') && ($file != '..')) {
			if (is_dir($src . '/' . $file)) {
				copyDir($src . '/' . $file,$dst . '/' . $file);
			} else {
				copy($src . '/' . $file,$dst . '/' . $file);
			}
		}
	}
	closedir($dir); 
} 

function deleteDir($dirPath) {
	if (!is_dir($dirPath)) {
		throw new InvalidArgumentException("$dirPath must be a directory");
	}
	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		$dirPath .= '/';
	}
	$files = glob($dirPath . '{,.}*', GLOB_BRACE | GLOB_MARK);
	foreach ($files as $file) {
		if (substr($file, -2) != "./") {
			if (is_dir($file)) {
				deleteDir($file);
			} else {
				unlink($file);
			}
		}
	}
	rmdir($dirPath);
}

/**
 * Get a string between two strings, they are not included in the final result
 * @param String $input: original string
 * @param String $start: start string
 * @param String $end: end string
 */
function get_between($input, $start, $end) {
	$substr = substr($input, strlen($start)+strpos($input, $start), (strlen($input) - strpos($input, $end))*(-1));
	return $substr;
}
/**
 * Parser xml
 * @param String $content: all xml content
 * @param String $parentlabel: object type which xml content
 */
function parser_xml($filename, $parentlabel) {
	$data = implode("", file($filename));
	$parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($parser, $data, $values, $tags);
	xml_parser_free($parser);
	
	foreach ($tags as $key => $val) {
		if ($key == $parentlabel) {
			$objectranges = $val;
			for ($i=0; $i<count($objectranges); $i+=2) {
				$offset = $objectranges[$i] + 1;
				$len = $objectranges[$i + 1] - $offset;
				$tdb[] = parseObject(array_slice($values, $offset, $len));
			}
		} else {
			continue;
		}
	}
	return $tdb;
}

function parseObject($mvalues) {
	for ($i=0; $i<count($mvalues); $i++) {
		$obj[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
	}
	return $obj;
}

/**
 * Validate a given mail with regular expression
 * Only check the mail structure: ??????@?????.???
 * @param String $mail
 */
function validateMail($mail) {
	$regex = "/^([a-z0-9+_]|\-|\.)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i";
	if (strpos($mail, '@') AND strpos($mail, '.')){
		return preg_match($regex, $mail);
	}
}

// Function to get the user IP address
function getUserIP() {
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function getCountryFromIp() {
	$ip = getUserIP();
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
	return !empty($details->country) ? $details->country : 'ES';
}

/**
 * Devuelve los datos mas relevantes del navegador cliente
 */
function getBrowser() {
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";
	
	//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
	} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
	} elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
	}

	// Next get the name of the useragent yes seperately and for good reason
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	} elseif (preg_match('/Firefox/i',$u_agent)) {
		$bname = 'Mozilla Firefox';
		$ub = "Firefox";
	} elseif(preg_match('/Chrome/i',$u_agent)) {
		$bname = 'Google Chrome';
		$ub = "Chrome";
	} elseif(preg_match('/Safari/i',$u_agent)) {
		$bname = 'Apple Safari';
		$ub = "Safari";
	} elseif(preg_match('/Opera/i',$u_agent)) {
		$bname = 'Opera';
		$ub = "Opera";
	} elseif(preg_match('/Netscape/i',$u_agent)) {
		$bname = 'Netscape';
		$ub = "Netscape";
	}

	// finally get the correct version number
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
	')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue

	}

	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			$version= $matches['version'][0];
		} else {
			$version= $matches['version'][1];
		}
	} else {
		$version= $matches['version'][0];
	}

	// check if we have a number
	if ($version == null || $version == "") { $version = "?"; }
	
	return [
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'   => $pattern
	];
}