<?php

function autocargar($classname){
	include 'controller/' . $classname . '.php';
}

//spl_autoload_register('autocargar');

spl_autoload_register('autocargar');
