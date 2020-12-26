<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\customer\AddressRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'building')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'receiver_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
