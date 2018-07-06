<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use \common\models\Clients;
use \common\models\PaymentMethods;

/* @var $this yii\web\View */
/* @var $model common\models\ClientPaymentMethodLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-payment-method-link-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'client_id')->dropDownList(
        ArrayHelper::map(Clients::find()->where(["user_id" => Yii::$app->user->id])->all(), "id", "name"),
        ["prompt" => "Choose client"]
    )->label("Client")?>

    <?= $form->field($model, 'payment_method_id')->dropDownList(
        ArrayHelper::map(PaymentMethods::find()->where(["user_id" => Yii::$app->user->id])->all(), "id", "name"),
        ["prompt" => "Choose payment method"]
    )->label("Payment method")?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
