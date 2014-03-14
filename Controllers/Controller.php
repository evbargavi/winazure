<?php 
class Controller
{
	function loadModel($model_class, $model_obj)
	{
		require_once(file_exists(ABS_PATH.'Models/'.$model_class.'.php')?'Models/Classes/'.$model_class.'.php':'../Models/Classes/'.$model_class.'.php');
		if (class_exists($model_class)){
			$this->$model_obj =  new $model_class;
			return true;
		}
		else
			return false;
	}
}?>