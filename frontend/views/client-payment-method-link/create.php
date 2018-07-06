<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ClientPaymentMethodLink */

$this->title = 'Create Client Payment Method Link';
$this->params['breadcrumbs'][] = ['label' => 'Client payment method', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-payment-method-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
