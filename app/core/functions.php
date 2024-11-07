<?php

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function esc($str)
{
	return htmlspecialchars($str);
}


function redirect($path)
{
	header("Location: " . ROOT . "/" . $path);
	die;
}


function old_value($key, $default = '')
{
	if (!empty($_POST[$key])) {
		return $_POST[$key];
	}

	return $default;
}


function user($key = '')
{
	if (!empty($_SESSION['USER'])) {
		if (empty($key)) {
			return $_SESSION['USER'];
		}

		if (!empty($_SESSION['USER']->$key)) {
			return $_SESSION['USER']->$key;
		}
	}

	return '';
}
