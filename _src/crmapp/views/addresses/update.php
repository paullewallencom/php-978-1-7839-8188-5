<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\customer\AddressRecord */

$this->title = 'Update Address Record: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Address Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
