

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use frontend\assets\SingupAsset;
SingupAsset::register($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CustomerSingup;


$this->title = 'Signup';
?>
<div id="login-box">

<?php $form = ActiveForm::begin(['id' => 'signup']); ?>
  <div class="left">
  <?= $form->field($model, 'email')->textInput() ?>
  <?= $form->field($model, 'password')->passwordInput() ?>
   
    <div class="form-group">
    <input type="submit" value="singup" style="width:89% "><br/>
    </div>

  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <?=yii\authclient\widgets\AuthChoice::widget([
    'baseAuthUrl'=>['site/auth']
      ]);
      ?>
  </div>
  <div class="or">OR</div>

 
  <?php ActiveForm::end(); ?>

</div>
