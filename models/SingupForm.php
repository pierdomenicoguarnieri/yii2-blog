<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\BaseVarDumper;

class SingupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules(){
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 8],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function singup(){
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();

        if($user->save()){
            return true;
        }

        \Yii::error("User was not saved " . BaseVarDumper::dumpAsString($user->errors));
        return false;
    }
}