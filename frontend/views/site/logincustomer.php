<?php
use frontend\assets\SingupAsset;
SingupAsset::register($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>
<div id="login-box">

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
  <div class="left">
  <?= $form->field($model, 'email')->textInput(['id' => 'email']) ?>
                <?= $form->field($model, 'password')->passwordInput(['id' => 'password']) 
                ?>
<div >
 If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
  <br>
 Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
</div>
    <div class="form-group">
    <input type="submit" value="Login" style="width:89% "><br/>
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
