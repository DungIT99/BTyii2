<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Experiences */

$this->title = 'Create Experiences';
?>
<div class="container" >
<div class="experiences-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
