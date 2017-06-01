<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\Response;

use yii\db\ActiveRecord;

use app\models\BackendMenu;

class RootController extends \yii\web\Controller
{
	public function init()
	{
	    $this->enableCsrfValidation = false;//关闭表单验证
	}
    public function actionIndex()
    {
    	$this->getView()->title = \Yii::t('app','Authority'); 
        return $this->render('root');
    }

    public function actionGetlist()
    {
    	$rooter = BackendMenu::find()->all();
    	foreach ($rooter as $key ) {
    		$list[]=array(
    			'link'=>$key['link'],
    			'title'=>\Yii::t('app',$key['title']),
    			'fid'=>$key['fid'],
    			'id'=>$key['id']
    		);
    	}
    	echo json_encode($list);
    }
    public function actionAdd()
    {    	
    	if(isset($_POST["title"]) && isset($_POST['link']) && isset($_POST['fid'])){
    		$db = \Yii::$app->db->createCommand(); 
    		$db->insert('backend_menu' , ['link'=>$_POST["link"],'title'=>$_POST["title"],'fid'=>$_POST["fid"]] )->execute();
    	}else{    		
    	}

    	$rooter = BackendMenu::find()->all();
    	foreach ($rooter as $key ) {
    		$list[]=array(
    			'link'=>$key['link'],
    			'title'=>\Yii::t('app',$key['title']),
    			'fid'=>$key['fid'],
    			'id'=>$key['id']
    		);
    	}
    	echo json_encode($list);   	
    }

    public function actionDel()
    {
    	if(isset($_POST["id"])){
    		if($_POST["id"]>0){
    			BackendMenu::deleteAll('id = '.$_POST["id"]);    			
    		}
    	}else{    		
    	}
    	$rooter = BackendMenu::find()->all();
    	foreach ($rooter as $key ) {
    		$list[]=array(
    			'link'=>$key['link'],
    			'title'=>\Yii::t('app',$key['title']),
    			'fid'=>$key['fid'],
    			'id'=>$key['id']
    		);
    	}
    	echo json_encode($list);   	
    }

}
