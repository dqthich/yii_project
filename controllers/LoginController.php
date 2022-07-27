<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Account;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $model = new Account();
        return $this->render('index',['model'=>$model]);
    }
   
}