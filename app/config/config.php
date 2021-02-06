<?php

// Directory Separator
define('DS', DIRECTORY_SEPARATOR);

// APP path
define('APP', dirname(dirname(__FILE__)));
define('CONF', APP . DS . 'config' . DS);
define('LIB', APP . DS . 'libs' . DS);

// MVC paths
define('CONTROLLER', APP . DS . 'controllers' . DS);
define('MODEL', APP . DS . 'models' . DS);
define('VIEW', APP . DS . 'views' . DS);

// DB INFO
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', '5fr_prepa');

// URL ROOT
define('DIR', 'preparation-php');
define('URLROOT', 'http://omagh/' . DIR);

// SITE NAME
define('SITENAME', 'PREPA EXAMS');
