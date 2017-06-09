<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\Response;

use yii\captcha\Captcha;
use yii\captcha\CaptchaAction;
use yii\captcha\CaptchaValidator;
use yii\db\ActiveRecord;

use app\models\BackendRoot;

class IndexController extends \yii\web\Controller
{	
	public function actions()
    {
        return [
            'captcha' => [                
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0xFFFFFF, 
                'maxLength'=>'4',       // 最多生成几个字符
                'minLength'=>'2',       // 最少生成几个字符
                'height'=>'40',                
            ],            

        ];
    }

    public function actionIndex()
    {
    	$msg="";
    	$this->getView()->title = \Yii::t('app','Login'); 
    	if(isset(Yii::$app->session['rooter']) && isset(Yii::$app->session['rootid']) && isset(Yii::$app->session['power'])){
            if(Yii::$app->session['rooter']!="" && Yii::$app->session['rootid']!="" && Yii::$app->session['power']!=""){
                $this->redirect(['index/main']);
            }
        }
        
        if(isset($_POST['BackendRoot']['username']) && isset($_POST['BackendRoot']["password"])){
            $rooter = BackendRoot::find()->where(['username' => $_POST['BackendRoot']['username'],'password'=>md5($_POST['BackendRoot']["password"])])->one();
            if(count($rooter)==1){                
                Yii::$app->session->set("rooter",$rooter->username);  
                Yii::$app->session->set("rootid",$rooter->id);  
                Yii::$app->session->set("authority",$rooter->authority);  
                // Act::rootloginactive();
                $this->redirect(['index/main']);
            }else{

              $msg=\Yii::t('app','no user');
            }
        }else{
            $msg=\Yii::t('app','Please full');
        }
        $model = new BackendRoot();
        return $this->render('index',['model'=>$model,'msg'=>$msg]); 
        
    }

    public function actionLoginout()
    {
        Yii::$app->session->remove('rooter');
        Yii::$app->session->remove('rootid');
        Yii::$app->session->remove('authority');
        $this->redirect(['index/index']);
    }
    public function actionMain()
    {
    	$this->getView()->title = \Yii::t('app','Dashboard'); 
    	return $this->render('main'); 
    }

    

}
