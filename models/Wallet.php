<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Wallet extends Model
{
    public $wallet_id;
    public $balance;
    public $description;
    public $id_account;
    
    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'Wallet';
    }
    public function rules()
    {
        return [
            [['wallet_id', 'balance', 'description', 'id_account'], 'required'],
                       
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'wallet_id' => 'Wallet Id',
            'balance' => 'Balance',
            'description' => 'Description',
            'id_account' => 'Account Id',
            
        ];
    }
}