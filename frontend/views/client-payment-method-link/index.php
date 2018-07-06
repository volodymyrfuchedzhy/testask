<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

use \common\models\Clients;
use \common\models\PaymentMethods;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientPaymentMethodLinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients payment methods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-payment-method-link-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add client payment method', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                "attribute" => "client_id",
                "label" => "Client",
                'value' => function ($data) {
                    return Clients::find()->where(["id" => $data->client_id, "user_id" => Yii::$app->user->id])->one()->name;
                },
                "filter" => ArrayHelper::map(Clients::find()->where(["user_id" => Yii::$app->user->id])->all(), "id", "name")
            ],
            [
                "attribute" => "payment_method_id",
                "label" => "Payment method",
                'value' => function ($data) {
                    return PaymentMethods::find()->where(["id" => $data->payment_method_id, "user_id" => Yii::$app->user->id])->one()->name;
                },
                "filter" => ArrayHelper::map(PaymentMethods::find()->where(["user_id" => Yii::$app->user->id])->all(), "id", "name")
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
