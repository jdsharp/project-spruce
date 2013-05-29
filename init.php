<?php
// Alias this for us
define('DS', DIRECTORY_SEPARATOR);

set_include_path( '.' . PATH_SEPARATOR . dirname(__FILE__) . DS . 'includes' . PATH_SEPARATOR . get_include_path());

require_once('app.php');
