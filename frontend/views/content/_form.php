<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;


AppAsset::register($this);

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\content */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container" >
<div class="content-form">

    <?php $form = ActiveForm::begin( ['options'=>['enctype'=>'multipart/form-data']]); ?>

  
    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
