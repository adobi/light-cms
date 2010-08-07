<?php  

function dump($var, $label = null, $echo = true) 
{

		$label = ($label === null) ? '' : rtrim($label) . ' ';

		ob_start();

		var_dump($var);

		$output = ob_get_clean();

		$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

		$output = '<pre>' . $label . $output . '</pre>';

		if($echo) echo $output;

		return $output;
}


?>