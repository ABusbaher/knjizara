<?php

class Config{
    // ZA DEFINISANJE PUTANJE //
	public static function get($path){
		$result = $GLOBALS['config'];
		$path = explode("/", $path);
		foreach($path as $part){
			if(isset($result[$part]))
				$result = $result[$part];
		}
		return $result;
	}
}