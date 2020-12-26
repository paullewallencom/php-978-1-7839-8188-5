<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\customer\CustomerRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-record-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?php if (!$model->isNewRecord):?>

    <h2>Phones</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getPhones(),
                'pagination' => false
            ]),
        'columns' => [
            'number',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'phones',
                'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Add New', ['phones/create', 'relation_id' => $model->id]),
                'template' => '{update}{delete}',
            ]
        ]
    ]);?>

    <h2>Addresses</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider(
                ['query' => $model->getAddresses(), 'pagination' => false]
            ),
        'columns' => [
            [
                'label' => 'Address',
                'value' => function ($model) {
                        return implode(', ',
                            array_filter(
                                $model->getAttributes(
                                    ['country', 'state', 'city', 'street', 'building', 'apartment'])));
                    }
            ],
            'purpose',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'addresses',
                'template' => '{update}{delete}',
                'header' => Html::a(
                        '<i class="glyphicon glyphicon-plus"></i>&nbsp;Add New',
                        ['addresses/create', 'relation_id' => $model->id]
                    ),
            ],
        ],
    ]);?>

    <h2>Emails</h2>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider(
                ['query' => $model->getEmails(), 'pagination' => false]
            ),
        'columns' => [
            'address',
            'purpose',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'controller' => 'emails',
                'template' => '{update}{delete}',
                'header' => Html::a(
                        '<i class="glyphicon glyphicon-plus"></i>&nbsp;Add New',
                        ['emails/create', 'relation_id' => $model->id]
                    ),
            ],
        ],
    ]);?>

    <?php endif?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
