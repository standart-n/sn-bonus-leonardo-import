<?php class parser extends sn {
	
function __construct() {

}

function parseData() {
	if (import::$data) {
		foreach (explode("\r\n",import::$data) as $line) {
			if (self::pareLine($line)) {
				
			}
		}
	}
}

function parseLine($line=null,$ms=array(),$error=array()) {
	if ($line) {
		if (strlen($line)>10) {
			$ms=explode(";",$line);
		}
	}
	return false;
}


} ?>
