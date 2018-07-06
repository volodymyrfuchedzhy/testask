<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use \common\models\PaymentMethodTypes;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentMethods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-methods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        ArrayHelper::map(PaymentMethodTypes::find()->all(), "id", "name"),
        ["prompt" => "Choose cpayment method type"]
    )->label("Payment method type")?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
