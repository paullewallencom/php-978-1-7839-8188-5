<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\customer\CustomerRecord */

$this->title = 'Create Customer Record';
$this->params['breadcrumbs'][] = ['label' => 'Customer Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
