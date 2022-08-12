<?php

namespace app\controllers;

use app\models\Category;
use app\models\Account;
use Yii;
use yii\web\Controller;
use yii\web\Request;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['username'])){
            return $this->goBack(['account/login']);
        }
        $listcategory= new Category();
        $listcategory=Category::find()->all();
       // echo var_dump($listcategory);exit;  
        return $this->render('index',['list'=>$listcategory]);
    }

    public function actionAdd()
    {
        $cate = new Category();
        $session = Yii::$app->session;
        $session->open();
        $account = new Account();
        $account = Account::find()->where(['account_name'=>$session['username']])->one();
        $id = $account->account_id;
        if ($cate->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Category');
            $cate_name = $request['category_name'];
            $type = $request['type'];
            Yii::$app->db->createCommand()
                ->insert('Category',[
                    'category_name'=>$cate_name,
                    'type'=>$type,
                    'account_id'=>$id,
                ])->execute();
            Yii::$app->getSession()->setFlash('success', 'You has been add category successfully.');
            return $this->redirect('index');        
        }      
        return $this ->render('add',['cate'=>$cate]);
    }
    public function actionEdit()
    {
        $id = $_GET['category_id'];
        $edit = new Category();
        $edit = Category::find()->where(['category_id'=>$id])->all();
        $edit1=new Category();
        if ($edit1->load(Yii::$app->request->post())){
            $request = Yii::$app->request->post('Category');
            $cate_name = $request['category_name'];
            $type = $request['type'];
            Category::updateAll(['category_name'=>$cate_name,'type'=>$type],['category_id'=>$id]);
            Yii::$app->getSession()->setFlash('success', 'You has been update category successfully.');
            return $this->redirect('index');     
        }    
        return $this->render('edit',['edit'=>$edit]);
    }
   
    public function actionDelete()
    {
        $id = $_GET['category_id'];
        $delete = Category::findOne($id);
        $delete->delete();
        return $this->render('index');
    }

}    