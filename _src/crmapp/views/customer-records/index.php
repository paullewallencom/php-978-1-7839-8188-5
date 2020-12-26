<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\customer\CustomerRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'birth_date',
                'format' => ['date', 'jS M, Y'],
            ],
            [
                'attribute' => 'country',
                'label' => 'Addresses',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->addresses as $address) {
                            $result .= $address->fullAddress . "\n\n";
                        }
                        return $result;
                    }
            ],
            [
                'attribute' => 'email',
                'label' => 'Emails',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->emails as $email) {
                            $result .= $email->address . "\n\n";
                        }
                        return $result;
                    }
            ],
            [
                'attribute' => 'phone',
                'label' => 'Phones',
                'format' => 'paragraphs',
                'value' => function ($model) {
                        $result = '';
                        foreach ($model->phones as $phone) {
                            $result .= $phone->number . "\n\n";
                        }
                        return $result;
                    }
            ],

            [
                'class' => 'app\utilities\AuditColumn',
                'attribute' => 'id'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
