
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\content */
$this->title ='Content';
?>
<div class="container" >
<div class="content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
