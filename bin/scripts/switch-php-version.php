<?php
require(dirname(__FILE__) . "/common.php");

if(!isset($_SERVER['argv'][1])) {
    exit;
}

$version = $_SERVER['argv'][1];

$PHPDEVSERVER_HOME = dirname(dirname(dirname(__FILE__)));

$imagick_version = "";

switch($version) {
	case "php70":
	case "php71":
		$imagick_version = "6.9.3-7-vc14-x64";
	break;
	case "php72":
	case "php73":
		$imagick_version = "7.0.7-11-vc15-x64";
	break;
	default:
		$imagick_version = "6.9.3-7-vc11-x86";
}


putenv("PHPDEVSERVER_PHP_VERSION={$version}");
system("setx /M PHPDEVSERVER_PHP_VERSION " .getenv("PHPDEVSERVER_PHP_VERSION"));

putenv(
    "PHPDEVSERVER_PATH=" ."{$PHPDEVSERVER_HOME}\\".getenv("PHPDEVSERVER_PHP_VERSION")
    . ";{$PHPDEVSERVER_HOME}\\bash"
    . ";{$PHPDEVSERVER_HOME}\\Apache24\\bin"
    . ";{$PHPDEVSERVER_HOME}\\bin"
    . ";{$PHPDEVSERVER_HOME}\\ImageMagick\\{$imagick_version}"
);
system("setx /M PHPDEVSERVER_PATH \"" . getenv("PHPDEVSERVER_PATH")) ."\"";

putenv("PHP_INI_SCAN_DIR={$PHPDEVSERVER_HOME}\\" . getenv("PHPDEVSERVER_PHP_VERSION") .'\conf.cli.d' );
system("setx /M PHP_INI_SCAN_DIR \"" .getenv("PHP_INI_SCAN_DIR")) . "\"";

system("setx /M PHPDEVSERVER_PHP_VERSION " .getenv("PHPDEVSERVER_PHP_VERSION"));
// config apache
config_apache_php_module($PHPDEVSERVER_HOME , getenv("PHPDEVSERVER_PHP_VERSION"));