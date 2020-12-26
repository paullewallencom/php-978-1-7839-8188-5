<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Address Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Address Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'purpose',
            'country',
            'state',
            'city',
            // 'street',
            // 'building',
            // 'apartment',
            // 'receiver_name',
            // 'postal_code',
            // 'customer_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
