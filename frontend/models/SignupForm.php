<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $subscription_type;
    public $company_name;
    public $full_name;
    public $country;
    public $username;
    public $email;
    public $password;
    public $confirm_password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['subscription_type', 'trim'],
            ['subscription_type', 'required'],
            ['subscription_type', 'integer'],

            ['company_name', 'trim'],
            ['company_name', 'required', 'when' => function($model){
                return $model->subscription_type == 1;
            }, 'whenClient' => "function (attribute, value) {
                return $('#signupform-subscription_type').val() == 1;
            }", 'message' => 'Company name cannot be blank.'],
            ['company_name', 'string', 'max' => 255],

            ['full_name', 'trim'],
            ['full_name', 'required'],
            ['full_name', 'string', 'min' => 2, 'max' => 255],

            ['country', 'trim'],
            ['country', 'required'],
            ['country', 'integer'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirm_password', 'required'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => "Password and its' confirmation must be same."],
            ['confirm_password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        
        $user = new User();
        $user->subscription_type = $this->subscription_type;
        $user->company_name = $this->company_name;
        $user->full_name = $this->full_name;
        $user->country = $this->country;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
