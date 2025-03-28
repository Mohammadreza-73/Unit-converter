<?php

function assets(string $path = ''): string
{
	return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . $path;
}

if (! function_exists('dd')) {
	function dd($var): void
	{
		echo "<pre style= 'direction: ltr; text-align: left;position: relative;z-index: 1;background: #fff;width: 60%;display: flex;justify-content: center;align-items: center;padding: 20px 0;margin: 10% auto;border-radius: 5px;border-left: 3px solid #4ab74a;box-shadow: 5px 5px 20px rgba(0,0,0,0.5);'>";
		print_r($var);
		echo "</pre>";
		exit;
	}
}

