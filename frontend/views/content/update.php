<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\content */


$this->title = 'Update Content: ' . $model->id;
?>
<div class="container" >
<div class="content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
