<?php

use common\models\Order;
use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
                'class' => \yii\bootstrap4\LinkPager::class
        ],
        'columns' => [
            [
                    'attribute' => 'id',
                'contentOptions' => ['style' => 'width:80px;']
            ],
            [
                    'attribute' => 'fullname',
                    'content' => function ($model) {
                        return $model->firstname. " " . $model->lastname;
                    },
            ],
            'total_price:currency',
            //'email:email',
            //'transaction_id',
            [
               'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', Order::getStatusLabels(),[
                        'class' => 'form-control',
                    'prompt' => 'All'
                ]),
                'format' => ['orderStatus']
            ],
            'created_at:datetime',
            //'created_by',

            [
                    'class' => 'common\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'contentOptions' => [
                        'class' => 'td-actions'
                ]
            ],
        ],
    ]); ?>


</div>
