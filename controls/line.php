<?php class line extends sn {
	
public static $action;
public static $response;
public static $callback;
public static $error;
public static $valid;
public static $exp;

public static $username;
public static $password;
public static $pwd;
public static $name;
public static $lastname;
public static $firstname;
public static $patronymic;
public static $email;

public static $card;
public static $summ;
public static $bonus_all;
public static $bonus_used;
public static $bonus_exists;

function __construct() {

}

function checkLine() {
	self::$response=array();
	self::$valid=array();
	self::$error=false;
	if (self::validate()) { return true; }
	return false;
}

function validate() {
	self::checkName(0,"name");
	self::checkCard(1,"card");
	self::checkSumm(2,"summ");
	self::checkBonus(3,"bonus_all");
	self::checkBonus(4,"bonus_used");
	self::checkBonus(5,"bonus_exists");
	//self::checkPassword(6,"password");
	if (sizeof(self::$valid)>0) { return false; } else { return true; }
}

function checkName($id=null,$type=null,$value=null,$exp=null,$error=true) {
	if (!isset(parser::$line_ms[$id])) { $exp="отсутствуют данные!"; } else {
		$value=iconv("cp1251","utf-8",strval(trim(parser::$line_ms[$id])));
	}
 	if (!isset($value)) { $exp="отсутствуют данные!"; } else {
		if (($value=="") || ($value=="")) { $exp="ничего не указано!"; } else {
			if (strlen($value)<2) { $exp="слишком короткое значение!"; } else {
				if (strlen($value)>100) { $exp="слишком длинное значение!"; } else {						
					$error=false;
					self::$name=$value;
				}
			}
		}
	}
	if ((($error) && ($exp)) || (!$type)) {
		self::$valid[$type]["exp"]=$exp;
		self::$valid[$type]["value"]=$value;
		self::$valid[$type]["error"]=true;		
	}
}

function checkCard($id=null,$type=null,$value=null,$exp=null,$error=true) {
	if (!isset(parser::$line_ms[$id])) { $exp="отсутствуют данные!"; } else {
		$value=intval(trim(parser::$line_ms[$id]));
	}
 	if (!isset($value)) { $exp="отсутствуют данные!"; } else {
		if (strlen(strval($value))<4) { $exp="слишком короткое значение!"; } else {
			if (strlen(strval($value))>20) { $exp="слишком длинное значение!"; } else {						
				$error=false;
				self::$card=$value;
			}
		}
	}
	if ((($error) && ($exp)) || (!$type)) {
		self::$valid[$type]["exp"]=$exp;
		self::$valid[$type]["value"]=$value;
		self::$valid[$type]["error"]=true;		
	}
}

function checkSumm($id=null,$type=null,$value=null,$exp=null,$error=true) {
	if (!isset(parser::$line_ms[$id])) { $exp="отсутствуют данные!"; } else {
		$value=round(floatval(trim(parser::$line_ms[$id])),2);
	}
 	if (!isset($value)) { $exp="отсутствуют данные!"; } else {
		//if (strlen(strval($value))<1) { $exp="слишком короткое значение!"; } else {
			if (strlen(strval($value))>20) { $exp="слишком длинное значение!"; } else {						
				$error=false;
				self::$summ=$value;
			}
		//}
	}
	if ((($error) && ($exp)) || (!$type)) {
		self::$valid[$type]["exp"]=$exp;
		self::$valid[$type]["value"]=$value;
		self::$valid[$type]["error"]=true;		
	}
}

function checkBonus($id=null,$type=null,$value=null,$exp=null,$error=true) {
	if (!isset(parser::$line_ms[$id])) { $exp="отсутствуют данные!"; } else {
		$value=intval(trim(parser::$line_ms[$id]));
	}
 	if (!isset($value)) { $exp="отсутствуют данные!"; } else {
		if (strlen(strval($value))<1) { $exp="слишком короткое значение!"; } else {
			if (strlen(strval($value))>20) { $exp="слишком длинное значение!"; } else {						
				$error=false;
				if ($type) {
					switch($type) {
						case "bonus_all":
							self::$bonus_all=$value;
						break;
						case "bonus_used":
							self::$bonus_used=$value;
						break;
						case "bonus_exists":
							self::$bonus_exists=$value;
						break;
					}
				}
				
			}
		}
	}
	if ((($error) && ($exp)) || (!$type)) {
		self::$valid[$type]["exp"]=$exp;
		self::$valid[$type]["value"]=$value;
		self::$valid[$type]["error"]=true;		
	}
}

function checkPassword($id=null,$type=null,$value=null,$exp=null,$error=true) {
	if (!isset(parser::$line_ms[$id])) { $exp="отсутствуют данные!"; } else {
		$value=strval(trim(parser::$line_ms[$id]));
	}
 	if (!isset($value)) { $exp="отсутствуют данные!"; } else {
		if (($value=="") || ($value=="")) { $exp="ничего не указано!"; } else {
			if (strlen(strval($value))<1) { $exp="слишком короткое значение!"; } else {
				if (strlen(strval($value))>20) { $exp="слишком длинное значение!"; } else {						
					$error=false;
					self::$pwd=$value;
					self::$password=sha1(sha1($value));
				}
			}
		}
	}
	if ((($error) && ($exp)) || (!$type)) {
		self::$valid[$type]["exp"]=$exp;
		self::$valid[$type]["value"]=$value;
		self::$valid[$type]["error"]=true;		
	}
}
 

} ?>
