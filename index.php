<?php
define ('BASEPATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
//prado framework
$framework=dirname(dirname(__FILE__)) .'/framework_332/pradolite.php';
require_once ($framework);
$application = new TApplication;
$application->run();
?>
