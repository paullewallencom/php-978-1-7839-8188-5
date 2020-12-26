<?php
/**
 * @var Customer $model
 */
use app\models\customer\Customer;

echo \yii\widgets\DetailView::widget(
    [
        'model' => $model,
        'attributes' => [
            ['attribute' => 'name'],
            ['attribute' => 'birth_date', 'value' => $model->birth_date->format('Y-m-d')],
            'notes:text',
            ['label' => 'Phone Number', 'attribute' => 'phones.0.number']
        ]
    ]);
