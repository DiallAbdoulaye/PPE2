<?php

 $file = fopen('password.htaccess', 'r');
	  $rows = [];
	  while (!feof($file)) {
		$ligne = fgets($file);
		var_dump($ligne);
		$datas = explode(';', $ligne);
		var_dump($datas);
	  }
	  fclose($file);

?>