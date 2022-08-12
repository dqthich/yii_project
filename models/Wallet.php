<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;


class Wallet extends ActiveRecord
{
    private $wallet_id;
    private $balance;
    private $description;
    private $id_account;
    
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