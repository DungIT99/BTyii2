<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Experiences */

$this->title = 'Update Experiences: ' . $model->id;

?>
<div class="container"  >
<div class="experiences-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
