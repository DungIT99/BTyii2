<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\customers;

/**
 * Signup form
 */
class CustomerSingup extends Model
{
   
    public $email;
    public $password;
    public $created_at;
    public $updated_at;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                ['email', 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 'targetClass' => '\common\models\customers', 'message' => 'This email address has already been taken.'],
                ['password', 'required'],
                ['password', 'string', 'min' => 6],
                ['created_at', 'string'],
                ['updated_at', 'string'],
            ];
      
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    { 
        if (!$this->validate()) {
            return null;
        }
        
        $user = new customers();
     
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() ;

    }

 /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    // protected function sendEmail($user)
    // {
    //     return Yii::$app
    //         ->mailer
    //         ->compose(
    //             ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
    //             ['user' => $user]
    //         )
    //         ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
    //         ->setTo($this->email)
    //         ->setSubject('Account registration at ' . Yii::$app->name)
    //         ->send();
    // }
}
