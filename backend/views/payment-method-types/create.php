<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PaymentMethodTypes */

$this->title = 'Create cpayment method type';
$this->params['breadcrumbs'][] = ['label' => 'Payment method types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-method-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
