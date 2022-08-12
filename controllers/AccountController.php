<?php

namespace app\controllers;
use  yii\web\Session;
use app\models\Account;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
$session = Yii::$app->session;
$session->open();
class AccountController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Account();
        if ($model->load(Yii::$app->request->post())) {
           $request = Yii::$app->request->post('Account');
           $username = $request['account_name'];
           $password = $request['password'];
           if($model->login($username, $password)== true)
           {
                $session = Yii::$app->session;
                $session->open();
                $session['username']= $username ;
                return $this->goBack(['site/index']);
           }else{     
                echo "Đăng nhập thất bại"; exit;      
            }   
        }
        return $this->render('login', [
            'model' => $model,
        ]);      
    }

    public function actionSignup()
    {
        $model = new Account();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            if(!$model->save()){
                print_r($model->getErrors()); 
            }else{
                Yii::$app->getSession()->setFlash('success', 'You has been register successfully.');
                return $this->redirect('login');
            }   
        }
        return $this->render('signup',['model'=> $model]);
    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->open();
        if(isset($session['username'])){
            unset($session['username']);      
        }
        return $this->goHome();
    }
}