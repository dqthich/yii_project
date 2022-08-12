<?php

namespace app\controllers;

use app\models\Category;
use app\models\Transaction;
use app\models\Wallet;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


class TransactionController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['username'])){
            return $this->goBack(['account/login']);
        }
        $trans=Yii::$app->db->createCommand("SELECT * FROM Transaction as a, Category as b, Wallet as c Where a.category_id=b.category_id and a.wallet_id=c.wallet_id")->queryAll();  
        $object = (object) $trans;
        return $this->render('index',['object'=>$object]);
    }

    public function actionAdd()
    {
        $trans = new Transaction();
        $wallet = new Wallet();
        $cate = new Category();
        $wallet = Wallet::find()->all();
        $cate = Category::find()->all();
        if ($trans->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Transaction');
            $payment = $request['payment'];
            $wallet_id = $request['wallet_id'];
            $category_id = $request['category_id'];
            $date = $request['date'];
            Yii::$app->db->createCommand()
                ->insert('Transaction',[
                    'payment'=>$payment,
                    'wallet_id'=>$wallet_id,
                    'category_id'=>$category_id,
                    'date'=>$date,
                ])->execute();
            Yii::$app->getSession()->setFlash('success', 'You has been add transaction successfully.');
            return $this->redirect('index');
        }         
        return $this->render('add',['trans'=>$trans,
                                    'wallet'=>$wallet,
                                    'cate'=>$cate
                            ]);
    }
    public function actionEdit()
    {
        $id =  $_GET['transaction_id'];
        $trans = new Transaction();
        $trans = Transaction::find()->where(['transaction_id'=>$id])->all();
        $wallet = new Wallet();
        $cate = new Category();
        $wallet = Wallet::find()->all();
        $cate = Category::find()->all();
        $trans1=new Transaction();
        if ($trans1->load(Yii::$app->request->post())){
            $request = Yii::$app->request->post('Transaction');
            $payment = $request['payment'];
            $wallet_id = $request['wallet_id'];
            $category_id = $request['category_id'];
            $date = $request['date'];
            Transaction::updateAll(['payment'=>$payment,'wallet_id'=>$wallet_id,'category_id'=>$category_id,'date'=>$date],['transaction_id'=>$id]);
            Yii::$app->getSession()->setFlash('success', 'You has been update transaction successfully.');
            return $this->redirect('index');     
        }    
        return $this->render('edit',['trans'=>$trans,
                                    'wallet'=>$wallet,
                                    'cate'=>$cate
                            ]);
    }

    public function actionDelete()
    {
        $id = $_GET['transaction_id'];
        $delete = Transaction::findOne($id);
        $delete->delete();
        return $this->render('index');
    }
}    