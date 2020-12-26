<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\customer\PhoneRecord */

$this->title = 'Create Phone Record';
$this->params['breadcrumbs'][] = ['label' => 'Phone Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
