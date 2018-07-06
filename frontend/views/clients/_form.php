<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use \common\models\Countries;
/* @var $this yii\web\View */
/* @var $model common\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [1 => 'Active', 2 => 'Inactive', 3 => 'Blacklisted'],
        ["prompt" => "Choose status"]
    )?>

    <?= $form->field($model, 'country')->dropDownList(
        ArrayHelper::map(Countries::find()->all(), "id", "name"),
        ["prompt" => "Choose country"]
    )?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
