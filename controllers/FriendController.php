<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Hi;

class FriendController extends Controller
{
    public function actionIndex()
    { 
       return $this->render('index');
    }
    
}