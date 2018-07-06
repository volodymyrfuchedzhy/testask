<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientPaymentMethodLink */

$this->title = 'Update Client Payment Method Link: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client Payment Method Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-payment-method-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
