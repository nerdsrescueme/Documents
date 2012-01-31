<?php

/**
* Document compiler
*
* The document compiler reads all files within subfolders, performing two
* operations on the data.
*
* 1. Reads metadata document and provides this data to the markdown files
* 2. Compiles all markdown documents into one file applying metadata settings
*
* @author    Nerds, Rescue Me!
* @link      http://nerdsrescue.me
*/

ini_set('error_reporting', '-1');
ini_set('display_errors', '1');

define('ROOT',    __DIR__ . '/');
define('VENDOR',  ROOT . '_vendor/');
define('DATA',    ROOT . '_data/');
define('COMPILE', isset($_GET['compile']) ? $_GET['compile'] : false);
define('COMPILE_DIR', ROOT . COMPILE . '/');
define('COMPILE_TO',  ROOT . 'Compiled/');

$ignore  = array('Compiled', '_vendor', '_data', '.git', '.', '..');


if (COMPILE === false)
{
	$handle  = opendir(ROOT);
	$choices = array();
	
	while (false !== ($entry = readdir($handle)))
	{
		if ( !in_array($entry, $ignore) and is_dir(ROOT . $entry))
		{
			$choices []= $entry;
		}
	}
	
	closedir($handle);
	unset($ignore, $handle, $entry);

	require DATA . 'choose.php';
}
else
{
	$handle = opendir(COMPILE_DIR);
	$data   = '';

	while (false !== ($entry = readdir($handle)))
	{
		if ( !in_array($entry, $ignore) and file_exists(COMPILE_DIR . $entry))
		{
			$data .= trim(file_get_contents(COMPILE_DIR . $entry)) . str_repeat(PHP_EOL, 2);
		}
	}

	closedir($handle);
	unset($ignore, $handle, $entry);

	require VENDOR . 'markdown.php';
	file_put_contents(COMPILE_TO.COMPILE.'.html', Markdown($data));
	unset($data);

	echo 'File successfully compiled and written to ' . COMPILE_TO.COMPILE.'.html';
}


