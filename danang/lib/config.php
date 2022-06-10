<?php if(!defined('_lib')) die("Error");

	error_reporting(0);
	$config_url=$_SERVER["SERVER_NAME"].'';

	$config['database']['servername'] = 'localhost';

	

	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'demo';


	$config['database']['refix'] = 'table_';
	$_SESSION['ckfinder_baseUrl']=$config_url;
	
	$ip_host = '';
	$mail_host = '';
	$pass_mail = '';

	$config['lang']=array(''=>'Tiếng Việt');
	$config['phi']=0;
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>