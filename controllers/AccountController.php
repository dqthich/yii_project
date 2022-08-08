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

class AccountController extends Controller
{
    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }
    //     $model = new Account();
    //     if ($model->load(Yii::$app->request->post())) {
    //        // echo var_dump($model);
    //        $request = Yii::$app->request->post('Account');
    //        $username = $request['account_name'];
    //        $password = $request['password'];
    //        if($model->login($username, $password)== true)
    //        {
    //            // return $this->redirect(Yii::$app->homeUrl);
    //            // echo $username;
    //             return $this->goBack(['site/index'],['username'=>$username]);
    //        }else{
                
    //             echo "Đăng nhập thất bại"; exit;      
    //         }
        
    //     }
    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
          
    // }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Account();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

   

    public function actionSignup()
    {
        $model = new Account();
        if ($model->load(Yii::$app->request->post())) {
        //    Yii::$app->db->createCommand()->insert('Account', [
        //     'account_name' => $model ->account_name,
        //     'email' => $model ->email,
        //     'password' => $model ->password,
        //     ])->execute();

            
            // echo var_dump($model);
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
        Yii::$app->user->logout();

        return $this->goHome();
    }
}