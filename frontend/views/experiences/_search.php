<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ExperiencesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container" >
<div class="experiences-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'start_at') ?>

    <?= $form->field($model, 'end_at') ?>

    <?= $form->field($model, 'namecompany') ?>

    <?php // echo $form->field($model, 'aboutjob') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
