<?php

namespace app\models;
use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\base\Model;

class Account extends ActiveRecord implements IdentityInterface
{
    private $account_id;
    private $account_name;
    private $email;
    private $password;
    private $avatar;
    private $register;
    private $_user = false;
    public $remember = true;

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
           [['account_name', 'email', 'password'], 'required'],
            //email has to be a valid email address
            ['email', 'email'],
            ['email', 'unique'],
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
            'remember' => 'Remember',
            'avatar' => 'Avatar',
            'register' => 'Verify Account',
        ];
    }

   // Kiem tra dang nhap
    public function login($username, $password)
    {
        $dong = Account::find()->where(['account_name'=>$username, 'password'=>$password])->count();
            if($dong==1){
                return true;
            }else{
                return false;
            }

    }

    

    // public function login()
    // {
    //     echo var_dump($this->getUser());
       
    //     if ($this->validate()) {
    //         return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            
    //     }
    //     return false;
    // }
   
    public function getUser()
    {
        Yii::warning($this->account_name,'account_log');
        
        echo var_dump($this->account_name);
        if ($this->_user === false) {
            $this->_user = Account::findByUsername($this->account_name);
        }
        return $this->_user;
    }
    public static function findByUsername($username)
    {
        return static::findOne(['account_name'=>$username]);
        
    }

    public static function findIdentity($id)
    {
       // return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
      //  return Account::findOne(['access_token'=>$token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
       // return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
     //   return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
      //  return $this->getAuthKey() === $authKey;
    }
    
    // public function validatePassword($password)
    // {
    //     return $this->password === $password;
    // }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
