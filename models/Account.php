<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Account extends Model
{
    public $account_id;
    public $account_name;
    public $email;
    public $password;
    public $avatar;
    public $register;


    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'Account';
    }
    public function rules()
    {
        return [
            [['account_id', 'account_name', 'email', 'password', 'avatar', 'register'], 'required'],
            // email has to be a valid email address
            [['email'], 'unique'],
            [['email'], 'email'],

           
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'account_id' => 'Account Id',
            'account_name' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'avatar' => 'Avatar',
            'register' => 'Verify Account',
        ];
    }
}