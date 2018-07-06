<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use \common\models\Countries;

/* @var $this yii\web\View */
/* @var $model common\models\Clients */

function getStatuses() {
    return [1 => 'Active', 2 => 'Inactive', 3 => 'Blacklisted'];
}

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-view">

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
            'user_id',
            'name',
            [
                "label" => "Status",
                "value" => getStatuses()[$model->status]
            ],
            [
                "label" => "Country",
                "value" => Countries::find()->where(["id" => $model->country])->one()->name
            ],
            'note:ntext',
        ],
    ]) ?>

</div>
