<?php

function autoloadGui($class)
{
	$file = BP."helper/gui{$class}.inc.php";
	if (is_readable($file)) {
		require $file;
	}
}

spl_autoload_register("autoloadModel");
