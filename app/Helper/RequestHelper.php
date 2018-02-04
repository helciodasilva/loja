<?php namespace loja\Helper;

use Request;

class RequestHelper{

	public static function saveImage($request){
		if ($request->hasFile('file')) {
			$dir = 'uploads/';
			$extension = strtolower($request->file('file')->getClientOriginalExtension());
			$fileName = str_random() . '.' . $extension;
			$request->file('file')->move($dir, $fileName);
			return $fileName;
		}
	}
	
}