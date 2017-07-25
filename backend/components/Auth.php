<?php
namespace app\components;

use yii;
use yii\web\Response;

class Auth 
{
	public static function AuthCheck(){
		$controllerID = Yii::$app->controller->id;
		// $actionID = Yii::$app->controller->action->id;

		$authority=Yii::$app->session->get("authority");
	    $autharr=json_decode($authority);
	    $auth=0;
	    for($i=0; $i <count($autharr) ; $i++){
	    	if($autharr[$i]->title==$controllerID){
	    		$auth=$autharr[$i]->auth;
	    	}	    	
	    }	    
		return $auth;
	} 

}


