<?php
	$config['useragent'] = 'CodeIgniter';
	$config['mailpath'] = '/usr/sbin/sendmail';
	$config['charset'] = 'iso-8859-1';  
	$config['wordwrap'] = TRUE;        
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = '';//hostname
	$config['smtp_port'] = 587;       
	$config['smtp_user'] = '';//SMTP_USER;
	$config['smtp_pass'] = '';//SMTP_PASS;  
	$config['crlf'] = "\r\n";
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html';
	$config['MIME-Version'] = "1.0\r\n";
	$config['X-Mailer']     = "PHP".phpversion()."\r\n";
	$config['X-Priority']   = "3\r\n";
	$config['Content-Type'] = "text/html";

?>
