<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;


class Transaction extends ActiveRecord
{
    private $transaction_id;
    private $payment;
    private $wallet_id;
    private $category_id;
    private $date;
   

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
            'category_id' => 'Category',
            'date' => 'Date',
        ];
    }
}