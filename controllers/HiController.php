<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Hi;

class HiController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionUser()
    {
        $model = new Hi();
        $model->setUser('Luka', 'LukaVietNam.net', 'Luka@VietNam.net');
        echo "Thông tin user <br>" . $model->getUser();
    }
}