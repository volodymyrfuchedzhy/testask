<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

use \common\models\Countries;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;

function getStatuses() {
    return [1 => 'Active', 2 => 'Inactive', 3 => 'Blacklisted'];
}
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add client', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                "attribute" => "status",
                "label" => "Status",
                'value' => function ($data) {
                    $statuses = getStatuses();
                    return $statuses[$data->status];
                },
                "filter" => getStatuses()
            ],
            [
                "attribute" => "country",
                "label" => "Country",
                'value' => function ($data) {
                    return Countries::find()->where(["id" => $data->country])->one()->name;
                },
                "filter" => ArrayHelper::map(Countries::find()->all(), "id", "name")
            ],
            //'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
