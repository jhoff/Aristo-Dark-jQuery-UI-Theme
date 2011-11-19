<?php

	$f = fopen('php://stdin', 'r');
	while ($line = fgets($f)) {
		$line = str_replace('581D1D','6D2942',$line); // - 18 - color light
		$line = str_replace('350809','460A1F',$line); // - 18 - color dark
		$line = str_replace('481616','5C1F35',$line); // - 1  - slider background
		$line = str_replace('8C3334','A0467C',$line); // - 3  - calendar active background / border
		$line = str_replace('EC9999','F2ABDF',$line); // - 1  - calendar selected color
		$line = str_replace('D16364','DC79BC',$line); // - 2  - calendar active text-shadow
		$line = str_replace('DA9696','E3A8BD',$line); // - 3  - borders
		echo $line;
	}