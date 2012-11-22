<?php class import extends sn {
	
public static $data;
public static $tmp_name;
public static $file_size;
public static $file_type;
public static $file_error;
public static $exp;

function __construct() {

}

function engine() {
	if (self::loadParams()) {
		if (self::loadData()) {
			self::showData();
		}
	}
	if (self::$exp) {
		echo self::$exp;
	}
}

function loadParams() {
	if (isset($_FILES)) {
		if (isset($_FILES['data'])) {
			if (isset($_FILES['data']['type'])) {
				self::$file_type=$_FILES['data']['type'];
			} else { 
				self::$exp="data[type] is null";
			}
			if (isset($_FILES['data']['tmp_name'])) {
				self::$tmp_name=$_FILES['data']['tmp_name'];
			} else { 
				self::$exp="tmp_name is null";
			}
			if (isset($_FILES['data']['error'])) {
				self::$file_error=$_FILES['data']['error'];
			} else { 
				self::$exp="error on upload";
			}
			if (isset($_FILES['data']['size'])) {
				self::$file_size=$_FILES['data']['size'];
			} else { 
				self::$exp="file_size is null";
			}
			if (!self::$file_error) {
				if ((self::$tmp_name) && (self::$file_type) && (self::$file_size)) {
					if (self::$file_size>0) {
						return true;
					} else { 
						self::$exp="file_size is zero";
					}
				}
			}
		} else { 
			self::$exp="file not uploaded";
		} 
	}
	return false;
}

function loadData() {
	if (self::$tmp_name) {
		if (file_exists(self::$tmp_name)) {
			self::$data=file_get_contents(self::$tmp_name);
			return true;
		} else { 
			self::$exp="tmp file is not exists";
		}
	}
	return false;
}

function showData() {
	if (self::$data) {
		echo self::$data;
	} else { 
		self::$exp="data is null";
	}
}

} ?>
