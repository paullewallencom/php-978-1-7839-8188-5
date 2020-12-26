<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\customer\AddressRecord */

$this->title = 'Create Address Record';
$this->params['breadcrumbs'][] = ['label' => 'Address Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
