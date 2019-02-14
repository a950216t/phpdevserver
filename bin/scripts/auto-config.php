<?php
require(dirname(__FILE__) . "/common.php");
$PHPDEVSERVER_HOME = dirname(dirname(dirname(__FILE__)));

echo "** Auto Config phpdevserver **" . PHP_EOL . PHP_EOL;
// copy all template config file
echo "Configuring PHP default settings ... ";

// copy php56 php.ini
if(false === file_exists("{$PHPDEVSERVER_HOME}/php56/php.ini")) {
    copy("{$PHPDEVSERVER_HOME}/php56/php.ini-development" ,"{$PHPDEVSERVER_HOME}/php56/php.ini" );
}
// copy php56 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/php56" , "{$PHPDEVSERVER_HOME}/php56");

// copy php70 php.ini
if(false === file_exists("{$PHPDEVSERVER_HOME}/php70/php.ini")) {
    copy("{$PHPDEVSERVER_HOME}/php70/php.ini-development" ,"{$PHPDEVSERVER_HOME}/php70/php.ini" );
}
// copy php70 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/php70" , "{$PHPDEVSERVER_HOME}/php70");


// copy php71 php.ini
if(false === file_exists("{$PHPDEVSERVER_HOME}/php71/php.ini")) {
    copy("{$PHPDEVSERVER_HOME}/php71/php.ini-development" ,"{$PHPDEVSERVER_HOME}/php71/php.ini" );
}
// copy php71 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/php71" , "{$PHPDEVSERVER_HOME}/php71");


// copy php72 php.ini
if(false === file_exists("{$PHPDEVSERVER_HOME}/php72/php.ini")) {
    copy("{$PHPDEVSERVER_HOME}/php72/php.ini-development" ,"{$PHPDEVSERVER_HOME}/php72/php.ini" );
}
// copy php72 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/php72" , "{$PHPDEVSERVER_HOME}/php72");

// copy php73 php.ini
if(false === file_exists("{$PHPDEVSERVER_HOME}/php73/php.ini")) {
    copy("{$PHPDEVSERVER_HOME}/php73/php.ini-development" ,"{$PHPDEVSERVER_HOME}/php73/php.ini" );
}
// copy php73 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/php73" , "{$PHPDEVSERVER_HOME}/php73");

// replace ioncube loader path
echo "Configuring PHP ioncube loader module ... ";
$ini_file = array(
	"{$PHPDEVSERVER_HOME}/php56/conf.cli.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/ioncube_loader_win_5.6.dll" ,
	"{$PHPDEVSERVER_HOME}/php56/conf.apache.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/ioncube_loader_win_5.6.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.cli.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/ioncube_loader_win_7.0.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.apache.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/ioncube_loader_win_7.0.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.cli.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/ioncube_loader_win_7.1.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.apache.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/ioncube_loader_win_7.1.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.cli.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/ioncube_loader_win_7.2.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.apache.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/ioncube_loader_win_7.2.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.cli.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php73/ext/ioncube_loader_win_7.3.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.apache.d/10-ioncube.ini"    => "{$PHPDEVSERVER_HOME}/php73/ext/ioncube_loader_win_7.3.dll"
);

foreach($ini_file as $k => $v) {
    preg_replace_file(
	$k ,
	'/zend_extension.*=.*/i',
	"zend_extension = " . realpath($v) . PHP_EOL
    );
}
echo "OK" . PHP_EOL;

// replace zend-opecache path
echo "Configuring PHP zend-opcache module ... ";
$ini_file = array(
	"{$PHPDEVSERVER_HOME}/php56/conf.cli.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php56/conf.apache.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.cli.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.apache.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.cli.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.apache.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.cli.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.apache.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.cli.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php73/ext/php_opcache.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.apache.d/10-opcache.ini"    => "{$PHPDEVSERVER_HOME}/php73/ext/php_opcache.dll"
);

foreach($ini_file as $k => $v) {
    preg_replace_file(
	$k ,
	'/zend_extension.*=.*/i',
	"zend_extension = " . realpath($v) . PHP_EOL
    );
}
echo "OK" . PHP_EOL;

// replace zendguardloader path
echo "Configuring PHP zendguardloader module ... ";
$ini_file = array(
	"{$PHPDEVSERVER_HOME}/php56/conf.cli.d/12-ZendGuardLoader.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/ZendLoader.dll" ,
	"{$PHPDEVSERVER_HOME}/php56/conf.apache.d/12-ZendGuardLoader.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/ZendLoader.dll"
);

foreach($ini_file as $k => $v) {
    preg_replace_file(
	$k ,
	'/zend_extension.*=.*/i',
	"zend_extension = " . realpath($v) . PHP_EOL
    );
}
echo "OK" . PHP_EOL;

// replace xdebug path
echo "Configuring PHP xdebug module ... ";
$ini_file = array(
	"{$PHPDEVSERVER_HOME}/php56/conf.cli.d/11-xdebug.ini"       => "{$PHPDEVSERVER_HOME}/php56/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php56/conf.apache.d/11-xdebug.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.cli.d/11-xdebug.ini"       => "{$PHPDEVSERVER_HOME}/php70/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.apache.d/11-xdebug.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.cli.d/11-xdebug.ini"       => "{$PHPDEVSERVER_HOME}/php71/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.apache.d/11-xdebug.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.cli.d/11-xdebug.ini"       => "{$PHPDEVSERVER_HOME}/php72/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.apache.d/11-xdebug.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.cli.d/11-xdebug.ini"       => "{$PHPDEVSERVER_HOME}/php73/ext/php_xdebug.dll" ,
	"{$PHPDEVSERVER_HOME}/php73/conf.apache.d/11-xdebug.ini"    => "{$PHPDEVSERVER_HOME}/php73/ext/php_xdebug.dll"
);
foreach($ini_file as $k => $v) {
	preg_replace_file(
		$k ,
		'/zend_extension.*=.*/i',
		"zend_extension = " . realpath($v) . PHP_EOL
	);
}
echo "OK" . PHP_EOL;

// replace sourceguardian path
echo "Configuring PHP sourceguardian module ... ";
$ini_file = array(
	"{$PHPDEVSERVER_HOME}/php56/conf.cli.d/88-sourceguardian.ini"       => "{$PHPDEVSERVER_HOME}/php56/ext/ixed.5.6.win" ,
	"{$PHPDEVSERVER_HOME}/php56/conf.apache.d/88-sourceguardian.ini"    => "{$PHPDEVSERVER_HOME}/php56/ext/ixed.5.6.win" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.cli.d/88-sourceguardian.ini"       => "{$PHPDEVSERVER_HOME}/php70/ext/ixed.7.0.win" ,
	"{$PHPDEVSERVER_HOME}/php70/conf.apache.d/88-sourceguardian.ini"    => "{$PHPDEVSERVER_HOME}/php70/ext/ixed.7.0.win" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.cli.d/88-sourceguardian.ini"       => "{$PHPDEVSERVER_HOME}/php71/ext/ixed.7.1.win" ,
	"{$PHPDEVSERVER_HOME}/php71/conf.apache.d/88-sourceguardian.ini"    => "{$PHPDEVSERVER_HOME}/php71/ext/ixed.7.1.win" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.cli.d/88-sourceguardian.ini"       => "{$PHPDEVSERVER_HOME}/php72/ext/ixed.7.2.win" ,
	"{$PHPDEVSERVER_HOME}/php72/conf.apache.d/88-sourceguardian.ini"    => "{$PHPDEVSERVER_HOME}/php72/ext/ixed.7.2.win"
);
foreach($ini_file as $k => $v) {
	preg_replace_file(
		$k ,
		'/extension.*=.*/i',
		"extension = " . realpath($v) . PHP_EOL
	);
}
echo "OK" . PHP_EOL;

// copy phpMyAdmin config.sample.php to config.php
echo "Configuring phpMyAdmin ... ";
$conf_file = "{$PHPDEVSERVER_HOME}/phpmyadmin/config.inc.php";
$sample_file = "{$PHPDEVSERVER_HOME}/phpmyadmin/config.sample.inc.php";
if(!file_exists($conf_file)) {
	copy($sample_file , $conf_file);
	preg_replace_file(
		$conf_file ,
		"/\\\$cfg\\[\\'blowfish_secret\\'\\].*=.*/i",
		"\$cfg['blowfish_secret'] = '" .md5(time()). "';"
	);
}

echo "OK" . PHP_EOL;


echo "Configuring Apache24 ... ";
// copy Apache24 config file
copyfolder("{$PHPDEVSERVER_HOME}/bin/scripts/templates/Apache24" , "{$PHPDEVSERVER_HOME}/Apache24");
$conf_file = "{$PHPDEVSERVER_HOME}/Apache24/conf/httpd.conf";
/*
if(file_exists($conf_file)) {
	preg_replace_file(
		$conf_file ,
		"/%__PHPDEVSERVER__%/i",
		cpath($PHPDEVSERVER_HOME)
	);
}*/
if(file_exists($conf_file)) {
	preg_replace_file(
		$conf_file ,
		'/Define SRVROOT \"\/Apache24\"/i',
		'Define SRVROOT "' . cpath($PHPDEVSERVER_HOME) . '/Apache24"'
	);
} 

echo "OK" . PHP_EOL;

// Replace all php fcgid setting
echo "Configuring PHP as Apache fcgid module ... ";
$php_version = @getenv("PHPDEVSERVER_PHP_VERSION");
if(!$php_version) {
    $php_version = "php56";
}
config_apache_php_module($PHPDEVSERVER_HOME , $php_version);

echo "OK" . PHP_EOL;


echo "Configuring phpMyAdmin as Apache alias path ... ";
$conf_file = "{$PHPDEVSERVER_HOME}/Apache24/conf.d/51-phpmyadmin.conf";

preg_replace_file(
	$conf_file ,
	"/Alias.*\\/phpmyadmin.*/",
	"Alias /phpmyadmin " . "\"" . cpath("{$PHPDEVSERVER_HOME}/phpmyadmin") . "\""
);


preg_replace_file(
	$conf_file ,
	"/<Directory \\\".*\\\">/i",
	"<Directory \"" . cpath("{$PHPDEVSERVER_HOME}/phpmyadmin") . "\">"
);
echo "OK" . PHP_EOL;



$registry = new Registry();
$ORIG_PATH = $registry->read('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\Path');
if(!$ORIG_PATH) {
    $ORIG_PATH = getenv("PATH");
    if(!$ORIG_PATH) {
        $ORIG_PATH = "";
    }
}

// CHECK IF NEED Modify PATH
$paths = explode(";" , $ORIG_PATH);
$need_modify_path = true;
foreach($paths as $p) {
    if(strpos($p , '%PHPDEVSERVER_PATH%') !== false) {
        $need_modify_path = false;
        break;
    }
}




// SET Env: PHPDEVSERVER_PHP_VERSION
if(!getenv("PHPDEVSERVER_PHP_VERSION")) {
    putenv("PHPDEVSERVER_PHP_VERSION=php56");
}


putenv(
    "PHPDEVSERVER_PATH=" ."{$PHPDEVSERVER_HOME}\\".getenv("PHPDEVSERVER_PHP_VERSION")
    . ";{$PHPDEVSERVER_HOME}\\bash"
    . ";{$PHPDEVSERVER_HOME}\\Apache24\\bin"
    . ";{$PHPDEVSERVER_HOME}\\bin"
    . ";{$PHPDEVSERVER_HOME}\\ImageMagick\\6.9.3-7-vc11-x86\\bin"
);
putenv("PHP_INI_SCAN_DIR={$PHPDEVSERVER_HOME}\\" . getenv("PHPDEVSERVER_PHP_VERSION") .'\conf.cli.d' );
putenv("MAGICK_HOME={$PHPDEVSERVER_HOME}\\ImageMagick\\6.9.3-7-vc11-x86\\bin");

// $registry->write('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\PHPDEVSERVER_PHP_VERSION' , getenv("PHPDEVSERVER_PHP_VERSION") , "REG_SZ");
// $registry->write('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\PHPDEVSERVER_PATH' , getenv("PHPDEVSERVER_PATH") , "REG_EXPAND_SZ");
// $registry->write('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\PHP_INI_SCAN_DIR' , getenv("PHP_INI_SCAN_DIR") , "REG_SZ");
// $registry->write('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\MAGICK_HOME' , getenv("MAGICK_HOME") , "REG_SZ");
system("setx /M PHPDEVSERVER_PHP_VERSION " .getenv("PHPDEVSERVER_PHP_VERSION"));
system("setx /M PHPDEVSERVER_PATH \"" . getenv("PHPDEVSERVER_PATH")) . "\"";
system("setx /M PHP_INI_SCAN_DIR \"" .getenv("PHP_INI_SCAN_DIR")) . "\"";
system("setx /M MAGICK_HOME \"" .getenv("MAGICK_HOME")) ."\"";

if($need_modify_path === true) {
    putenv("PATH=" .getenv("PATH") . ";" . "%PHPDEVSERVER_PATH%");
    system( escapeshellcmd ( "setx /M PATH \"{$ORIG_PATH};%PHPDEVSERVER_PATH%\"") );
    // $registry->write('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment\Path' , $ORIG_PATH.";%PHPDEVSERVER_PATH%" , "REG_EXPAND_SZ");
}

echo "Register System Variable ... OK" . PHP_EOL;

$startup_path = getenv("ProgramData") . "\\Microsoft\\Windows\\Start Menu\\Programs\\StartUp" ;
$apachemon_path = "{$PHPDEVSERVER_HOME}\\Apache24\\bin\\ApacheMonitor.exe";
if(file_exists($startup_path)) {
    // Make ApacheMonitor Link to StartUp
    system("MKLINK \"{$startup_path}\\ApacheMonitor\"  \"$apachemon_path\" ");
    // echo "MKLINK \"$apachemon_path\"  \"{$startup_path}\\ApacheMonitor\"";
    echo "Make ApacheMonitor link to Boot StartUp ... OK" . PHP_EOL;
}

