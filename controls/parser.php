<?php class parser extends sn {
	
public static $error;
public static $line_ms;

	
function __construct() {
	self::$line_ms=array();
	self::$error=array();
}

function parseData() {
	if (import::$data) {
		if (!tobase::gentm()) { return false; }		
		foreach (explode("\r\n",import::$data) as $line) {
			if (self::parseLine($line)) {
				tobase::checkLine();
				print_r(self::$line_ms);
			/*} else {
				echo "[";
				var_dump(line::$valid);
				echo "]";*/
			}
		}
		echo "done...";
	}
}

function parseLine($line=null,$ms=array(),$error=array()) {
	if ($line) {
		if ($line!="") {
			if (strlen($line)>10) {
				self::$line_ms=explode(";",$line);
				if (line::checkLine()) {
					return true;
				}
			}
		}
	}
	return false;
}


} ?>
