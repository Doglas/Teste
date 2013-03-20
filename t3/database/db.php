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
/*Localhost*/
	mysql_connect("localhost","root","");
	mysql_select_db("loja");
	
	function dbConsulta($sql){
		($a = mysql_query($sql)) or (die ("error: ".mysql_error()));
		return $a;
	}
?>