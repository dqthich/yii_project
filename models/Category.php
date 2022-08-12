<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;


class Category extends ActiveRecord
{
    private $category_id;
    private $category_name;
    private $type;
    private $account_id;
   

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
            [['category_name', 'type',], 'required'],
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Id',
            'category_name' => 'Name',
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

    
}