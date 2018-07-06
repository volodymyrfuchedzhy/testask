<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use \common\models\Clients;
use \common\models\PaymentMethods;

/* @var $this yii\web\View */
/* @var $model common\models\ClientPaymentMethodLink */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client payment method', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-payment-method-link-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                "label" => "Client",
                "value" => Clients::find()->where(["id" => $model->client_id])->one()->name
            ],
            [
                "label" => "Payment method",
                "value" => PaymentMethods::find()->where(["id" => $model->payment_method_id])->one()->name
            ]
        ],
    ]) ?>

</div>
