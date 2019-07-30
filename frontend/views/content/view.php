<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\content */

$this->title ='Content';

\yii\web\YiiAsset::register($this);
?>
<div class="container" >
<div class="content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('View', ['index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userId',
            'file',
            'description',
        ],
    ]) ?>

</div>
</div>
