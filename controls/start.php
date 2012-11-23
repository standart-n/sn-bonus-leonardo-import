<?php class start extends sn {

function __construct() {
	self::engine();
}

function engine() {
	if (self::getControls()) {
		import::engine();
	}
}

function getControls() {
	foreach (array("url","import","parser") as $key) {
		if (!file_exists(project."/controls/".$key.".php")) return false;
		require_once(project."/controls/".$key.".php");
		sn::cl($key);
	}
	return true;	
}


} ?>
