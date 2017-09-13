<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\Response;

use yii\db\ActiveRecord;

use app\models\BackendRoot;

use app\components\Auth;

class ManagerController extends \yii\web\Controller
{
	public function init()
	{
	    $authority=Yii::$app->session->get("authority");
	    $autharr=json_decode($authority);
	    $key=0;
	    for($i=0; $i <count($autharr) ; $i++){
	    	if($autharr[$i]->title=="Manager"){
	    		$key=1;
	    	}	    	
	    }
	    if($key==0){
	    	$this->redirect(['index/main']);
	    }
	}
    public function actionIndex()
    {
    	$auth=Auth::AuthCheck();
    	$this->getView()->title = 'Manager';
    	$rooter = BackendRoot::find()->orderBy('id Desc')->all();
        return $this->render('index',['model'=>$rooter,'auth'=>$auth]);
    }
}
