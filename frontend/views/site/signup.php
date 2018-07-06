<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

use \common\models\Countries;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'subscription_type')->dropDownList(
                    [1 => "Company", 2 => "Individual"],
                    ["prompt" => "Choose subscription type"]
                )->label("Subscription type")?>

                <?= $form->field($model, 'company_name')->textInput()->label("Company") ?>

                <?= $form->field($model, 'full_name')->textInput()->label("Your name") ?>

                <?= $form->field($model, 'country')->dropDownList(
                    ArrayHelper::map(Countries::find()->all(), "id", "name"),
                    ["prompt" => "Choose country"]
                )?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'confirm_password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
