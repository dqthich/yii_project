<?php

namespace app\controllers;

use app\models\Category;
use app\models\Transaction;
use app\models\Wallet;
use Symfony\Polyfill\Ctype\Ctype;
use Yii;
use yii\db\conditions\LikeCondition;
use yii\filters\AccessControl;
use yii\web\Controller;


class TransactionController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $cate = new Category();
        $trans1 = new Transaction();
        if(!isset($session['username'])){
            return $this->goBack(['account/login']);
        }
        $trans=Yii::$app->db->createCommand("SELECT * FROM Transaction as a, Category as b, Wallet as c 
                                Where a.category_id=b.category_id and a.wallet_id=c.wallet_id")->queryAll();  
        $object = (object) $trans;
        return $this->render('index',['object'=>$object,'trans'=>$cate,'tran'=>$trans1]);
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
            $update=Wallet::findOne($wallet_id);
            $newBalance =  $update['balance'] - $payment;
            if( $update['balance'] < $payment){
                echo "<script>
                alert('Số dư trong ví không đủ! Vui lòng nhập lại!');
                window.location='index';
                </script>";
            }else{
                Yii::$app->db->createCommand()
                    ->insert('Transaction',[
                        'payment'=>$payment,
                        'wallet_id'=>$wallet_id,
                        'category_id'=>$category_id,
                        'date'=>$date,
                    ])->execute();
                $newBalance =  $update['balance'] - $payment;
                Wallet::updateAll(['balance'=>$newBalance],['wallet_id'=>$wallet_id]);
                Yii::$app->getSession()->setFlash('success', 'You has been add transaction successfully.');
                return $this->redirect('index');
            }       
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
            $update = Wallet::findOne($wallet_id);
            $moneyinwallet= $update['balance'];
            $moneycurrent = Transaction::findOne($id);
            if($moneycurrent['payment'] > $payment){
                $uptomoney = $moneycurrent['payment'] - $payment;
                $moneynew = $moneyinwallet + $uptomoney;
                Wallet::updateAll(['balance'=>$moneynew],['wallet_id'=>$wallet_id]);
            }else{
                $downtomoney = $payment - $moneycurrent['payment'];
                $moneynew = $moneyinwallet - $downtomoney;
                Wallet::updateAll(['balance'=>$moneynew],['wallet_id'=>$wallet_id]);
            }
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
        return $this->redirect('index');
    }
    public function actionSearch()
    {
        $cate = new Category();
        $trans1 = new Transaction();
        if ($cate->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Category');
            $request1= Yii::$app->request->post('Transaction');
            $search = $request['category_name'];
            $search1= $request1['date'];
            $trans=Yii::$app->db->createCommand("SELECT * FROM Category as a, Transaction as b, Wallet as c 
                                    Where a.category_id=b.category_id and b.wallet_id=c.wallet_id and 
                                            b.date like '%$search1%' and a.category_name like '%".$search."%' ")->queryAll();
            return $this->render('index',['object'=>$trans,'trans'=>$cate, 'tran'=>$trans1]);  
        }
    }
}    