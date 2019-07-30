<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container" >
<div class="experiences-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'start_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namecompany')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aboutjob')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
