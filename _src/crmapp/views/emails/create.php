<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\customer\EmailRecord */

$this->title = 'Create Email Record';
$this->params['breadcrumbs'][] = ['label' => 'Email Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
