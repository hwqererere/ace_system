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

class MamagerController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$rooter = BackendMenu::find()->all();
        return $this->render('index',["list"=>$rooter]);
    }

}
