<?php

	$f = fopen('php://stdin', 'r');
	while ($line = fgets($f)) {
		$matches = array();
		if( preg_match_all('/#[A-F0-9]{6}/i',$line,$matches) > 0 ) {
			foreach($matches[0] as $match) {
				$line = str_replace($match,invert_hex($match),$line);
			}
		}
		$matches = array();
		if( preg_match_all('/rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})[^\)]*\)/i',$line,$matches,PREG_SET_ORDER) > 0 ) {
			//print_r($matches);
			foreach($matches as $match) {
				$line = str_replace($match[0],invert_rgba($match),$line);
			}
		}
		echo $line;
	}
	
	
	function invert_hex($hex) {
		list($r,$g,$b) = str_split(substr($hex,1),2);
		
		$r = str_pad(base_convert((255 - base_convert($r,16,10)),10,16), 2, "0", STR_PAD_LEFT);
		$g = str_pad(base_convert((255 - base_convert($g,16,10)),10,16), 2, "0", STR_PAD_LEFT);
		$b = str_pad(base_convert((255 - base_convert($b,16,10)),10,16), 2, "0", STR_PAD_LEFT);
		
		return '#'.$r.$b.$g;
	}
	
	function invert_rgba($rgba) {
		//receives an array, where 0 is the string, and 1-3 are the first 3 args
		// returns the new string
		
		$pieces = explode(',',$rgba[0]);
		$end = $pieces[3];
		
		$r = (255 - $rgba[1]);
		$g = (255 - $rgba[2]);
		$b = (255 - $rgba[3]);
		
		return "rgba( $r , $g , $b , $end";
	}

?>