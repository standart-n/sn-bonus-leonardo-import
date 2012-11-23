<?php class sql extends sn {
	
public static $action;
public static $tm;
public static $callback;

function __construct() {
	
}

function cardExists($s="") {
	$s="select id,card from leo_cards where (card=".line::$card.")";
	return $s;
}

function pwdExists($s="") {
	$s="select id,card from leo_pwd where (card=".line::$card.")";
	return $s;
}

function insertCard($s="") {
	$s.="insert into leo_cards ";
	$s.="(name,card,summ,bonus_all,bonus_used,bonus_exists,post_tm) values ";
	$s.="('".line::$name."',".line::$card.",".line::$summ.",".line::$bonus_all.",".line::$bonus_used.",".line::$bonus_exists.",".tobase::$tm.")";
	return $s;
}

function updateCard($s="") {
	$s.="update leo_cards set ";
	$s.="name='".line::$name."', ";
	$s.="summ=".line::$summ.", ";
	$s.="bonus_all=".line::$bonus_all.", ";
	$s.="bonus_used=".line::$bonus_used.", ";
	$s.="bonus_exists=".line::$bonus_exists.", ";
	$s.="edit_tm=".tobase::$tm." ";
	$s.="where (1=1) ";
	$s.="and (card=".line::$card.")";
	return $s;
}

function insertPwd($s="") {
	$s.="insert into leo_pwd ";
	$s.="(card,password,post_tm) values ";
	$s.="(".line::$card.",'".line::$password."',".tobase::$tm.")";
	return $s;
}

function updatePwd($s="") {
	$s.="update leo_cards set ";
	$s.="card=".line::$card.", ";
	$s.="password='".line::$password."', ";
	$s.="edit_tm=".tobase::$tm." ";
	$s.="where (1=1) ";
	$s.="and (card=".line::$card.")";
	return $s;
}

function gentm($s="") { $tm=time();
	$s.="insert into leo_tm ";
	$s.="(dt,d,t,year,tm) values ";
	$s.="(NOW(),NOW(),NOW(),NOW(),".$tm.")";
	return $s;
}

} ?>
