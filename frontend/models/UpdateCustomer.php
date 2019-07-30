<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\customers;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class UpdateCustomer extends Model
{
    public $firstname;
    public $lastname;
    public $phone;
    public $birthday;
    public $image;
    public $email;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\customers',
            'message' => 'This email address has already been taken.',
            'when' => function ($model){
                    return $model->email != Yii::$app->user->identity->email;
                }
            ],
            [['firstname', 'lastname', 'phone', 'email'], 'required'],
            ['image', 'required',
             'when' => function ($model) {
                return Yii::$app->user->identity->image == '';
            },
             'whenClient' => "function (attribute, value) {
                return $('#image').val() == '';
            }"],
            [['firstname', 'lastname','email'], 'string', 'max' => 255,],
            [['birthday'], 'string', 'max' => 100],
            [['phone'],'integer'],
            [['image'], 'file', 'extensions' => ' png,jpg'],
        ];
    }
    public function updateCus($id)
    {
      
       if (!$this->validate()) {
        
        return null;
    }
         $customer = new UpdateCustomer();
        Yii::$app->db->createCommand("UPDATE customers SET firstname = '$this->firstname', lastname ='$this->lastname', phone='$this->phone' 
        , birthday='$this->birthday', image='$this->image', email ='$this->email' WHERE id=$id")
        ->execute();
      
    }
    public function getCus($id){
        $customer = new customers();
        $cus = $customer::find()->where(['id'=>$id])->all();
        return $cus;
    }
   public function insertCus($session){
    $customer = new customers();
    $customer->email = $session['email'];
    $customer->firstname = $session['name'];
    return $customer->save();
   }

  
}
