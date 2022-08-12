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
use app\models\Wallet;

class WalletController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['username'])){
            return $this->goBack(['account/login']);
        }
        $wallet= new Wallet();
        $wallet=Wallet::find()->all();
       // echo var_dump($wallet);exit; 
        return $this->render('index',['wallet'=>$wallet]);
    }
    public function actionAdd()
    {
        $wallet = new Wallet();
        $session = Yii::$app->session;
        $session->open();
        $account = new Account();
        $account = Account::find()->where(['account_name'=>$session['username']])->one();
        $id = $account->account_id;
        if ($wallet->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Wallet');
            $balance = $request['balance'];
            $des = $request['description'];
            Yii::$app->db->createCommand()
                ->insert('Wallet',[
                    'balance'=>$balance,
                    'description'=>$des,
                    'id_account'=>$id,
                ])->execute();
            Yii::$app->getSession()->setFlash('success', 'You has been add wallet successfully.');
            return $this->redirect('index');        
        }      
        return $this ->render('add',['wallet'=>$wallet]);
    }

    public function actionEdit()
    {
        $id = $_GET['wallet_id'];
        $edit = new Wallet();
        $edit = Wallet::find()->where(['wallet_id'=>$id])->all();
        $edit1=new Wallet();
        if ($edit1->load(Yii::$app->request->post())){
            $request = Yii::$app->request->post('Wallet');
            $balance = $request['balance'];
            $des = $request['description'];
            Wallet::updateAll(['balance'=>$balance,'description'=>$des],['wallet_id'=>$id]);
            Yii::$app->getSession()->setFlash('success', 'You has been update category successfully.');
            return $this->redirect('index');     
        }    
        return $this->render('edit',['edit'=>$edit]);
    }
   
}    