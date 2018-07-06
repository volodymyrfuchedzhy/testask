<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

use \common\models\PaymentMethodTypes;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaymentMethodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment methods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-methods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create cpayment method', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                "attribute" => "type",
                "label" => "Payment method type",
                'value' => function ($data) {
                    return PaymentMethodTypes::find()->where(["id" => $data->type])->one()->name;
                },
                "filter" => ArrayHelper::map(PaymentMethodTypes::find()->all(), "id", "name")
            ],
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
