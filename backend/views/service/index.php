<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сервисы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index container box">

    <br>

    <p>
        <?= Html::a('Создать услуг', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категория услуг', ['service-category/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->category->title;
                }
            ],
            'title',
            'title_ru',
            'title_en',
            //'url:url',
            //'url_ru:url',
            //'url_en:url',
            //'meta_title',
            //'meta_title_ru',
            //'meta_title_en',
            //'meta_description',
            //'meta_description_ru',
            //'meta_description_en',
            //'description:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            //'filename',
            //'created_date',
            //'status',
            //'view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
