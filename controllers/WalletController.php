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
            Yii::$app->getSession()->setFlash('success', 'You has been update wallet successfully.');
            return $this->redirect('index');     
        }    
        return $this->render('edit',['edit'=>$edit]);
    }
    public function actionSetcurrentwallet(){
        $wallet= new Wallet();
        $wallet= Wallet::find()->all();
        $wallet1= new Wallet();
        if ($wallet1->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Wallet');
            $name = $request['description'];
            $wallet1 = Wallet::find()->where(['wallet_id'=>$name])->all();
            return $this->render('currentwallet',['wallet'=>$wallet1]);
        }
        return $this->render('setcurrentwallet',['wallet'=>$wallet]);
    }

    public function actionTransfermoney()
    {
        $wallet_id = $_GET['wallet_id'];
        $wallet= new Wallet();
        $wallet= Wallet::find()->all();
        $wallet1=new Wallet();
        if ($wallet1->load(Yii::$app->request->post())){
            $request = Yii::$app->request->post('Wallet');
            $balance = $request['balance'];
            $wallettransfer = Wallet::findOne($wallet_id);
            if($wallettransfer['balance'] < $balance){
                echo "<script>
                        alert('Số dư không đủ! Vui lòng nhập lại!');
                        window.location='index';
                    </script>";
            }else{
                $newBalance = $wallettransfer['balance'] - $balance;
                $name = $request['description'];
                $wallettransfered=Wallet::findOne($name);
                $newBalanced =  $wallettransfered['balance'] + $balance;
                Wallet::updateAll(['balance'=>$newBalance],['wallet_id'=>$wallet_id]);
                Wallet::updateAll(['balance'=>$newBalanced],['wallet_id'=>$name]);
                return $this->redirect('index');
            }
            
        }
        return $this->render('transfermoney',['wallet'=>$wallet]);
    }
    public function actionAddmoney(){
        $wallet = new Wallet();
        $wallet_id = $_GET['wallet_id'];
        $wallet = Wallet::find()->where(['wallet_id'=>$wallet_id])->all();
        $wallet1= new Wallet();
        if ($wallet1->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Wallet');
            $newmoney = $request['balance'];
            $balance=Wallet::findOne($wallet_id);
            $newBalance = $newmoney + $balance['balance'];
            Wallet::updateAll(['balance'=>$newBalance],['wallet_id'=>$wallet_id]);
            echo "<script>
                        alert('Bạn đã nạp tiền thành công!');
                        window.location='setcurrentwallet';
                    </script>";
        }
        return $this->render('addmoney',['wallet'=>$wallet]);
    }

   
}    