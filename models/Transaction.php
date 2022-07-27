<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Category extends Model
{
    public $transaction_id;
    public $payment;
    public $wallet_id;
    public $category_id;
    public $date;
   

    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'Transaction';
    }
    public function rules()
    {
        return [
            [['transaction_id', 'payment', 'wallet_id', 'category_id', 'date'], 'required'],
            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction Id',
            'payment' => 'Payment',
            'wallet_id' => 'Wallet Id',
            'category_id' => 'Category Id',
            'date' => 'Date',
        ];
    }
}