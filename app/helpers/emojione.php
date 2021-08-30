<?php 
require app_path()."/emojione/autoload.php";
if(!function_exists('toImage')){
	function toImage($args){
		return Emojione\Emojione::toImage($args);
	}
}