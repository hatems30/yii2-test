<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Channel Wind Deductibles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="channel-wind-deductible-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Rate Channel Wind Deductible', ['rate'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'wind_deductible_buy_back_limit',
            'deductible',
            'base_rate',
            'credit_modification',
            'debit_modification',
             'premium_price',
      

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
