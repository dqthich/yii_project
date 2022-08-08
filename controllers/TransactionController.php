<?php

namespace app\controllers;

use app\models\Account;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TransactionController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}    