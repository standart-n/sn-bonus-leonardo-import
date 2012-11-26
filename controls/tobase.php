<?php class tobase extends sn {
	
public static $tm;
public static $error;
public static $line_ms;

	
function __construct() {

}

function checkLine() {
	if (self::cardExists()) {
		self::updateCard();
	} else {
		self::insertCard();
	}
	
	if (self::pwdExists()) {
		self::updatePwd();
	} else {
		self::insertPwd();
	}	
}

function cardExists() {
	if (query(sql::cardExists(),$ms)) {
		if (sizeof($ms)>0) {
			return true;
		}
	}
	return false;
}

function pwdExists() {
	if (query(sql::pwdExists(),$ms)) {
		if (sizeof($ms)>0) {
			return true;
		}
	}
	return false;
}

function insertCard() {	
	if (query(sql::insertCard())) {
		return true;
	}
	return false;
}

function updateCard() {
	if (query(sql::updateCard())) {
		return true;
	}
	return false;
}

function insertPwd() {
	if (query(sql::insertpwd())) {
		return true;
	}
	return false;
}

function updatePwd() {
	if (query(sql::updateCard())) {
		return true;
	}
	return false;
}


function gentm() {
	if (query(sql::gentm())) {
		self::$tm=mysql_insert_id();
		if (self::$tm>0) {
			return true;
		}
	}
	return false;
}

} ?>
