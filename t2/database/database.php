<?php
/*PHPCLOUD*/
/*
	$name = get_cfg_var('zend_developer_cloud.db.username');
	$host = get_cfg_var('zend_developer_cloud.db.host');
	$pass = get_cfg_var('zend_developer_cloud.db.password');
	$app = get_cfg_var('zend_developer_cloud.db.name');
	
	mysql_connect($host, $name, $pass);
	mysql_select_db($app);
*/
/* PHPFOG*/
/*
mysql_connect(
  $server = getenv('MYSQL_DB_HOST'),
  $username = getenv('MYSQL_USERNAME'),
  $password = getenv('MYSQL_PASSWORD'));
mysql_select_db(getenv('MYSQL_DB_NAME'));
*/
/*Localhost*/
	mysql_connect("localhost","root","");
	mysql_select_db("app");
	
	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error".mysql_error()));
		return $a;
	}
?>