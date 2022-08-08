<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Category extends Model
{
    public $category_id;
    public $category_name;
    public $type;
    public $account_id;
   

    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'Category';
    }
    public function rules()
    {
        return [
            [['category_id', 'category_name', 'type', 'account_id'], 'required'],
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category Id',
            'category_name' => 'Category Name',
            'type' => 'Type',
            'account_id' => 'Account Id',
        ];
    }
    public function addCategory()
    {
        $account = new Category();
        $account ->account_name = $this ->account_name;
        $account ->email = $this ->email;
        $account ->password = $this ->password;

        return $account->save() ? $account : null;
        
    }

    public function listCategory()
    {

    }

    public function editCategory($id)
    {

    }

    public function deleteCategory($id)
    {

    }
}