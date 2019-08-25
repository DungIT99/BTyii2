<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
?>
 <div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

 

    <?= $form->field($model, 'username')->textInput(['multiple' => true]) ?>
    <?= $form->field($model, 'filea')->textarea(['id'=>'content']) ?>
 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php


 ?>
</div>
